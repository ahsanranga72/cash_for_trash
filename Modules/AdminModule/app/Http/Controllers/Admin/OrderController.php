<?php

namespace Modules\AdminModule\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\AdminModule\app\Models\Product;
use Modules\FrontendModule\app\Models\Order;

class OrderController extends Controller
{
    private $order;
    private $product;

    public function __construct(Order $order, Product $product)
    {
        $this->order = $order;
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     */
    public function list($status)
    {
        $orders = $this->order;

        if($status != ORDER_STATUS['all']){
            $orders = $orders->where('status', $status);
        }

        $orders = $orders->with('customer', 'agent')->latest()->paginate(10);

        return view('adminmodule::order.list', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show($id)
    {
        $order = $this->order->with('customer', 'agent', 'address', 'location')->findOrFail($id);
        $order['products'] = $this->product->whereIn('id', json_decode($order->product_ids, true))->get();
        return view('adminmodule::order.show', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function status_change(Request $request, $id)
    {
        $order = $this->order->findOrFail($id);
        $order->status = $request['order_status'];
        $order->save();

        return back()->with('success', DEFAULT_200_UPDATE['message']);
    }
}
