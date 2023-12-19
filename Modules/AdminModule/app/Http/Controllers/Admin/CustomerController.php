<?php

namespace Modules\AdminModule\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     */
    public function list(Request $request)
    {
        $customers = $this->user->Type(CUSTOMER)->when($request->has('search'), function ($query) use ($request) {
            $key = explode(' ', $request['search']);
            foreach ($key as $value) {
                $query->Where('first_name', 'like', "%{$value}%");
            }
        })->latest()->paginate(10);
        return view('adminmodule::customer.list', compact('customers'));
    }

    public function destroy($id)
    {
        $user = $this->user->where(['id' => $id])->first();
        foreach($user->addresses as $address)
        {
            $address->delete();
        }
        $user->delete();
        session()->flash('success', DEFAULT_200_DELETE['message']);
        return back();
    }
}
