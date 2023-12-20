<?php

namespace Modules\FrontendModule\app\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\AgentModule\app\Models\Location;

class AgentController extends Controller
{
    private $location;

    public function __construct(Location $location)
    {
        $this->location = $location;
    }
    /**
     * Display a listing of the resource.
     */
    public function request_form()
    {
        $locations = $this->location->active()->get();
        return view('frontendmodule::agent.request-form', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function request_form_submit(Request $request)
    {
        
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
