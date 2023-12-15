<?php

namespace Modules\FrontendModule\app\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\AgentModule\app\Models\Location;
use Modules\FrontendModule\app\Models\CustomerAddress;

class AddressController extends Controller
{
    private $customer_address;
    private $location;

    public function __construct(CustomerAddress $customer_address, Location $location)
    {
        $this->customer_address = $customer_address;
        $this->location = $location;
    }

    public function select_address()
    {
        $locations = $this->location->active()->get();
        return view('frontendmodule::customer.address.select-address', compact('locations'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontendmodule::customer.address.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontendmodule::customer.address.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'address' => 'required',
        ]);

        $customer_address = $this->customer_address;
        $customer_address->user_id = auth()->user()->id;
        $customer_address->name = $request['name'];
        $customer_address->mobile = $request['mobile'];
        $customer_address->address = $request['address'];
        $customer_address->save();

        return redirect()->route('customer.addresses.select-address')->with('success', DEFAULT_200_STORE['message']);
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
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'address' => 'required',
        ]);

        $customer_address = $this->customer_address->find($id);
        $customer_address->name = $request['name'];
        $customer_address->mobile = $request['mobile'];
        $customer_address->address = $request['address'];
        $customer_address->save();

        return back()->with('success', DEFAULT_200_UPDATE['message']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->customer_address->find($id)->delete();
        return back()->with('success', DEFAULT_200_DELETE['message']);
    }
}
