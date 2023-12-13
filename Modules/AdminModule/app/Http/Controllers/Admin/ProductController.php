<?php

namespace Modules\AdminModule\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\AdminModule\app\Models\Category;
use Modules\AdminModule\app\Models\Product;

class ProductController extends Controller
{
    private $product;
    private $category;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = $this->product->with('category')->when($request->has('search'), function ($query) use ($request) {
            $key = explode(' ', $request['search']);
            foreach ($key as $value) {
                $query->Where('name', 'like', "%{$value}%");
            }
        })->latest()->paginate(10);

        return view('adminmodule::product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->category->active()->get();
        return view('adminmodule::product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'category_id' => 'required',
            'price' => 'required|integer',
        ]);

        $product = $this->product;
        $product->name = $request['name'];
        $product->category_id = $request['category_id'];
        $product->price = $request['price'];
        $product->is_active = 1;
        $product->save();

        return redirect()->route('admin.products.index')->with('success', DEFAULT_200_STORE['message']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = $this->product->with('category')->findOrFail($id);
        $categories = $this->category->active()->get();
        return view('adminmodule::product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'category_id' => 'required',
            'price' => 'required|integer',
        ]);

        $product = $this->product->findOrFail($id);
        $product->name = $request['name'];
        $product->category_id = $request['category_id'];
        $product->price = $request['price'];
        $product->is_active = 1;
        $product->save();

        return redirect()->route('admin.products.index')->with('success', DEFAULT_200_UPDATE['message']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = $this->product->where(['id' => $id])->first();
        $product->delete();
        session()->flash('success', DEFAULT_200_DELETE['message']);
        return back();
    }

    public function status_update(string $id): JsonResponse
    {
        $this->product->where('id', $id)->update(['is_active' => !$this->product->find($id)->is_active]);
        return response()->json(response_structure(DEFAULT_200_UPDATE), 200);
    }
}
