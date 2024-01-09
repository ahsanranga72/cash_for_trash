<?php

namespace Modules\FrontendModule\app\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\AdminModule\app\Models\Product;
use Modules\AgentModule\app\Models\Agent;
use Modules\AgentModule\app\Models\Location;
use Modules\FrontendModule\app\Models\Order;

class OrderController extends Controller
{
    private $order;
    private $agent;
    private $location;
    private $product;

    public function __construct(Order $order, Agent $agent, Location $location, Product $product)
    {
        $this->order = $order;
        $this->agent = $agent;
        $this->location = $location;
        $this->product = $product;
    }

    public function sell_request()
    {
        if (empty(session('cart', []))) {
            return redirect()->route('products.rate')->withErrors('Please add products first.');
        }
        $products = $this->product->whereIn('id', session('cart', []))->get();
        $locations = Location::whereHas('agent', function ($query) {
            $query->whereNotNull('location_id');
        })->get();

        return view('frontendmodule::customer.sell-request', compact('locations', 'products'));
    }
    /**
     * Display a listing of the resource.
     */
    public function order_submit(Request $request)
    {
        $request->validate([
            'address_id' => 'required',
            'location_id' => 'required',
        ]);

        $order = $this->order;
        $order->user_id = auth()->user()->id;
        $order->product_ids = json_encode(session('cart', []));
        $order->address_id = $request['address_id'];
        $order->location_id = $request['location_id'];
        $order->agent_id = $this->agent->where('location_id', $request['location_id'])->first()->id ?? 0;

        $imagePaths = [];
        if ($request->hasFile('trash_images')) {
            foreach ($request->file('trash_images') as $image) {
                $imagePaths[] = image_uploader('order/', 'png', $image, null);
            }
        }
        $order->images = json_encode($imagePaths);
        $order->trash_weight = $request['trash_weight'];
        $order->customer_note_1 = $request['customer_note_1'];
        $order->save();

        session()->forget('cart');

        return redirect()->route('home')->with('success', ORDER_SUBMIT_200['message']);
    }

    public function add_to_cart(Request $request)
    {
        $productId = $request->input('product_id');
        $cart = session()->get('cart', []);

        if (!in_array($productId, $cart)) {
            $cart[] = $productId;
        }

        session(['cart' => $cart]);

        return response()->json(['success' => true]);
    }

    public function remove_from_cart(Request $request)
    {
        $productId = $request->input('product_id');
        $cart = session()->get('cart', []);

        $key = array_search($productId, $cart);
        if ($key !== false) {
            unset($cart[$key]);
        }

        session(['cart' => array_values($cart)]);

        return response()->json(['success' => true]);
    }

    public function product_remove_from_cart($id)
    {
        $cart = session()->get('cart', []);

        $key = array_search($id, $cart);
        if ($key !== false) {
            unset($cart[$key]);
        }

        session(['cart' => array_values($cart)]);

        return back()->with(['success' => 'Successfully removed.']);
    }
}
