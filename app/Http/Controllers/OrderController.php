<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Orderontroller;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Orders;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('orders.index', [
            'orders' => Order::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orders.create', [
            'orders' => new Order,
            'products' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosOrders = request()->except('_token');
        
        order::insert($datosOrders);

        DB::table('products')
        ->where('id', $request->product_id)
        ->decrement('stock', $request->quantity); 

        return response()->json($datosOrders);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $order=order::findOrFail($id);
        $products=products::all();
        return view('orders.edit', ['orders' => $orders, 'products' => $products]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $datosOrders=request()->except('_token','_method');

        Orders::where('id','=',$id)->update($datosOrders);

        $orders=orders::findOrFail($id);
        return view('orders/edit', compact('orders'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $orders=orders::findOrFail($id);
        orders::destroy($id);
        return redirect('orders');
    }
}
