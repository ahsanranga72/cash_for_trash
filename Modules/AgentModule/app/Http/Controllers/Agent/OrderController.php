<?php

namespace Modules\AgentModule\app\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\FrontendModule\app\Models\Order;

class OrderController extends Controller
{
    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }
    /**
     * Display a listing of the resource.
     */
    public function list($status)
    {
        $orders = $this->order->where('agent_id', auth()->user()->agent->id);

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
        $order = $this->order->with('customer', 'agent', 'address', 'location', 'product')->findOrFail($id);
        return view('agentmodule::order.show', compact('order'));
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
