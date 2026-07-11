<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{


    public function myOrders()
{
$orders = Order::where('user_id', Auth::id())->with('products')->latest()->paginate(3);    return view('admin.orders.index', compact('orders'));
}
    public function index()
    {
        $orders = Order::latest()->paginate(3);
        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all();
        return view('admin.orders.create', compact('products'));
    }


    public function store(Request $request)
    {
        $request->validate([
        'customer_name'  => 'required|string|max:255',
        'customer_email' => 'required|email|max:255',
        'products'       => 'required|array',
        'products.*'     => 'required|exists:products,id',
        'quantities'     => 'required|array',
        'quantities.*'   => 'required|integer|min:1',
        'total_price'    => 'required|numeric',
    ]);

    $order = Order::create([
        'customer_name'  => $request->customer_name,
        'customer_email' => $request->customer_email,
        'total_price'    => $request->total_price,
        'user_id'        => Auth::id(),
    ]);

    $syncData = [];
    foreach ($request->products as $index => $productId) {
        $product = Product::find($productId);
        $quantity = $request->quantities[$index];

        $syncData[$productId] = [
            'quantity' => $quantity,
            'price'    => $product->price
        ];
    }

    $order->products()->sync($syncData);

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
        $order = Order::with('products')->findOrFail($id);

        $products = Product::all();

        return view('admin.orders.edit', compact('order', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        'customer_name'  => 'required|string|max:255',
        'customer_email' => 'required|email|max:255',
        'products'       => 'required|array',
        'products.*'     => 'required|exists:products,id',
        'quantities'     => 'required|array',
        'quantities.*'   => 'required|integer|min:1',
        'total_price'    => 'required|numeric',
    ]);

    $order = Order::findOrFail($id);

    $order->customer_name = $request->input('customer_name');
    $order->customer_email = $request->input('customer_email');
    $order->total_price = $request->input('total_price');
    $order->user_id = Auth::id();
    $order->save();

    $syncData = [];
    foreach ($request->products as $index => $productId) {
        $product = Product::find($productId);

        $syncData[$productId] = [
            'quantity' => $request->quantities[$index],
            'price'    => $product->price
        ];
    }

    $order->products()->sync($syncData);

    return redirect('orders');
    }



    public function destroy( $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->back();
    }
}


