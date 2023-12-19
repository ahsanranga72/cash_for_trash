<?php

namespace Modules\AdminModule\app\Http\Controllers\Admin;

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
        $orders = $this->order->with('customer', 'agent')->latest()->paginate(10);
        return view('adminmodule::order.list', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show($id)
    {
        $order = $this->order->with('customer', 'agent', 'address', 'location', 'product')->findOrFail($id);
        return view('adminmodule::order.show', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('adminmodule::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
