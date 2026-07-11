<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::latest()->paginate(3);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->category_id = $request->input('category_id');
        $product->price = $request->input('price');
        $product->stock = $request->input('quantity');
        $product->description = $request->input('description');
        $product->save();

        return redirect()->back();
    }


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $category_name = Category::find($product->category_id);
        return view('admin.products.edit', compact('product', 'categories', 'category_name'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        'name'        => 'required|string|max:255',
        'quantity'    => 'required|integer|min:0',
        'price'       => 'required|numeric|min:0',
        'category_id' => 'required|exists:categories,id',
        'description' => 'nullable|string',
    ]);

    $product = Product::findOrFail($id);

    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->category_id = $request->input('category_id');
    $product->description = $request->input('description');

    $product->stock = $request->input('quantity');

    $product->save();

    return redirect('products');
    }



    public function destroy( $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back();
    }
}
