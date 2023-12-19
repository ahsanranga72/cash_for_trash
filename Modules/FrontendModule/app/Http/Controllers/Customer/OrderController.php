<?php

namespace Modules\FrontendModule\app\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\AgentModule\app\Models\Agent;
use Modules\AgentModule\app\Models\Location;
use Modules\FrontendModule\app\Models\Order;

class OrderController extends Controller
{
    private $order;
    private $agent;
    private $location;

    public function __construct(Order $order, Agent $agent, Location $location)
    {
        $this->order = $order;
        $this->agent = $agent;
        $this->location = $location;
    }

    public function sell_request()
    {
        $locations = $this->location->active()->get();
        return view('frontendmodule::customer.sell-request', compact('locations'));
    }
    /**
     * Display a listing of the resource.
     */
    public function order_submit(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'address_id' => 'required',
            'location_id' => 'required',
        ]);

        $order = $this->order;
        $order->user_id = auth()->user()->id;
        $order->product_id = $request['product_id'];
        $order->address_id = $request['address_id'];
        $order->location_id = $request['location_id'];
        $order->agent_id = $this->agent->where('location_id', $request['location_id'])->first()->id ?? 0;
        $order->save();

        return redirect()->route('home')->with('success', ORDER_SUBMIT_200['message']);
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
