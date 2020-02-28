<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //view all available products
        $product=Product::all();

        return response()->json(array(
            'message' => 'Successfully fetched all products!',
            'data'=> $product
        ), 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Save new products
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'quantity' => 'required|string'
        ]);
        $product = new Product([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity
        ]);
        $product->save();

        return response()->json([
            'message' => 'Successfully created Product!'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        //get single product
        $product=Product::find($id);
        return response()->json([
            'message' => 'Successfully Fetched Product!'
        ], 200, $product);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        //update product
        $product = Product::get($id)([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity
        ]);
        $product->update();

        return response()->json([
            'message' => 'Successfully updated Product!'
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        //delete product

        $product = Product::find($id);
        $product->delete();

        return response()->json([
            'message' => 'Successfully Deleted Product!'
        ], 200);

    }
}
