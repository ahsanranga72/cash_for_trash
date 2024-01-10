<?php

namespace Modules\FrontendModule\app\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\AdminModule\app\Models\Product;
use Modules\FrontendModule\app\Models\CustomerAddress;
use Modules\FrontendModule\app\Models\Order;

class DashboardController extends Controller
{
    private $order;
    private $customer_address;

    public function __construct(Order $order, CustomerAddress $customer_address)
    {
        $this->order = $order;
        $this->customer_address = $customer_address;
    }
    /**
     * Display a listing of the resource.
     */
    public function dashboard($slug)
    {
        if ($slug === 'orders') {
            $orders = $this->order->where('user_id', auth()->user()->id)->with('address')->get();
            foreach($orders as $order)
            {
                $order['products'] = Product::whereIn('id', json_decode($order->product_ids, true))->get();
            }
            return view('frontendmodule::customer.dashboard', compact('orders'));
        }

        if ($slug === 'addresses') {
            $customer_addresses = $this->customer_address->get();
            return view('frontendmodule::customer.dashboard', compact('customer_addresses'));
        }

        if ($slug === 'profile') {
            $user = auth()->user();
            return view('frontendmodule::customer.dashboard', compact('user'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontendmodule::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('frontendmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('frontendmodule::edit');
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
