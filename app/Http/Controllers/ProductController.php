<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::with('category')->get();

        return view('product-page.product', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();

        return view('product-page.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required',
            'product_stock' => 'required|numeric',
            'product_price' => 'required|numeric',
            'product_description' => 'required',
            'category_id' => 'required'
        ]);

        Product::create([
            'name' => $validated['product_name'],
            'stock' => $validated['product_stock'],
            'price' => $validated['product_price'],
            'description' => $validated['product_description'],
            'category_id' => $validated['category_id']
        ]);

        return redirect('product-page/add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $id)
    {
        $data['categories'] = Category::all();
        $data['product'] = Product::find($id);

        return view('product-page.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'product_name' => 'required',
            'product_stock' => 'required|numeric',
            'product_price' => 'required|numeric',
            'product_description' => 'required',
            'category_id' => 'required'
        ]);

        Product::where('id', $id)->update([
            'name' => $validated['product_name'],
            'stock' => $validated['product_stock'],
            'price' => $validated['product_price'],
            'description' => $validated['product_description'],
            'category_id' => $validated['category_id']
        ]);

        return redirect('product-page/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('product-page/product');
    }
}
