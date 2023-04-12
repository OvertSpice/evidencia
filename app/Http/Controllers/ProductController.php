<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index', [
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosProducts = request()->except('_token');

        if($request->hasFile('image')){
            $datosProducts['image'] = $request->file('image')->store('uploads','public');
        }

        product::insert($datosProducts);
        return response()->json($datosProducts);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product=product::findOrFail($id);
        return view('product.edit', compact('product') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $datosProducts=request()->except('_token','_method');
        if($request->hasFile('image'))
        {
            $products=products::findOrFail($id);
            Storage::delete('public/'.$products->image);
            $datosProducts['image']=$request->file('image')->store('uploads','public');
        }

        Products::where('id','=',$id)->update($datosProducts);

        $products=products::findOrFail($id);
        return view('products/edit', compact('products'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $products=products::findOrFail($id);

        if(Storage::delete('public/'.$products->Foto))
        {
            products::destroy($id);
        }
        return redirect('products');
    }
}
