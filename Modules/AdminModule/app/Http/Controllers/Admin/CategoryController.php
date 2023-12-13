<?php

namespace Modules\AdminModule\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\AdminModule\app\Models\Category;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = $this->category->when($request->has('search'), function ($query) use ($request) {
            $key = explode(' ', $request['search']);
            foreach ($key as $value) {
                $query->Where('name', 'like', "%{$value}%");
            }
        })->latest()->paginate(10);

        return view('adminmodule::category.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminmodule::category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:50',
        ]);

        $category = $this->category;
        $category->name = $request['name'];
        $category->is_active = 1;
        $category->save();

        return redirect()->route('admin.products.category.index')->with('success', DEFAULT_200_STORE['message']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = $this->category->findOrFail($id);
        return view('adminmodule::category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:50',
        ]);

        $category = $this->category->findOrFail($id);
        $category->name = $request['name'];
        $category->is_active = 1;
        $category->save();

        return redirect()->route('admin.products.category.index')->with('success', DEFAULT_200_UPDATE['message']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = $this->category->where(['id' => $id])->first();
        $category->delete();
        session()->flash('success', DEFAULT_200_DELETE['message']);
        return back();
    }

    public function status_update(string $id): JsonResponse
    {
        $this->category->where('id', $id)->update(['is_active' => !$this->category->find($id)->is_active]);
        return response()->json(response_structure(DEFAULT_200_UPDATE), 200);
    }
}
