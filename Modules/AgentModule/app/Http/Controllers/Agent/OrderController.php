<?php

namespace Modules\AgentModule\app\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Mail\StatusMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
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
        $orders = $this->order->where('agent_user_id', auth()->id());

        if ($status != ORDER_STATUS['all']) {
            $orders = $orders->where('status', $status);
        }

        $orders = $orders->with('customer', 'agent')->latest()->paginate(10);

        return view('agentmodule::order.list', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show($id)
    {
        $order = $this->order->with('customer', 'agent', 'address', 'location')->findOrFail($id);
        $order['products'] = $this->product->whereIn('id', json_decode($order->product_ids, true))->get();

        return view('agentmodule::order.show', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function status_change(Request $request, $id)
    {
        $request->validate([
            'agent_note' => 'required', 
            'order_status' => 'required', 
        ]);

        $order = $this->order->findOrFail($id);
        $order->agent_note = $request['agent_note'];
        $order->status = $request['order_status'];
        $order->save();

        Mail::to($order->customer->email)->send(new StatusMail($order->status, $order->customer));

        return back()->with('success', DEFAULT_200_UPDATE['message']);
    }
}
