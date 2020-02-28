<?php

namespace App\Http\Controllers;

use App\Product;
use App\Supplier_product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SupplierProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($id)
    {
        $id='supplier_id';
        //
        $get_products=Product::find($id);
        $supplier_product= Supplier_product::get()->where( 'supplier_id', $id);
        return response()->json(array(
            'message' => 'Successfully fetched  supplier products!',
            'data'=> $supplier_product
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
        //save product_id
        //save supplier_id
        try {
            $supplier_product = new Supplier_product();

            $supplier_product->product_id = $request['product_id'];
            $supplier_product->supplier_id = $request['supplier_id'];
            $supplier_product->save();
        } catch (QueryException $exception) {
            return response()->json("Server Error.Query Exception", 500);
        }

        return $supplier_product;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        //
        $supplier_product= Supplier_product::all($id)->where('supplier_id', $id);
        return response()->json(array(
            'message' => 'Successfully fetched all suppliers!',
            'data'=> $supplier_product
        ), 200);

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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
