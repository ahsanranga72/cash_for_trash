<?php

namespace Modules\AgentModule\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\AgentModule\app\Models\Location;

class LocationController extends Controller
{
    private $location;

    public function __construct(Location $location)
    {
        $this->location = $location;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $locations = $this->location->when($request->has('search'), function ($query) use ($request) {
            $key = explode(' ', $request['search']);
            foreach ($key as $value) {
                $query->Where('area_name', 'like', "%{$value}%");
            }
        })->latest()->paginate(10);

        return view('agentmodule::admin.location.list', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agentmodule::admin.location.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'area_name' => 'required',
            'district' => 'required',
            'police_station' => 'required',
            'post_code' => 'required',
        ]);

        $location = $this->location;
        $location->area_name = $request['area_name'];
        $location->district = $request['district'];
        $location->police_station = $request['police_station'];
        $location->post_code = $request['post_code'];
        $location->is_active = 1;
        $location->save();

        return redirect()->route('admin.agent.locations.index')->with('success', DEFAULT_200_STORE['message']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $location = $this->location->findOrFail($id);
        return view('agentmodule::admin.location.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'area_name' => 'required',
            'district' => 'required',
            'police_station' => 'required',
            'post_code' => 'required',
        ]);

        $location = $this->location->findOrFail($id);
        $location->area_name = $request['area_name'];
        $location->district = $request['district'];
        $location->police_station = $request['police_station'];
        $location->post_code = $request['post_code'];
        $location->save();

        return redirect()->route('admin.agent.locations.index')->with('success', DEFAULT_200_UPDATE['message']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $location = $this->location->where(['id' => $id])->first();
        $location->delete();
        session()->flash('success', DEFAULT_200_DELETE['message']);
        return back();
    }

    public function status_update(string $id): JsonResponse
    {
        $this->location->where('id', $id)->update(['is_active' => !$this->location->find($id)->is_active]);
        return response()->json(response_structure(DEFAULT_200_UPDATE), 200);
    }
}
