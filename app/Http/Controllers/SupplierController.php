<?php

namespace App\Http\Controllers;

use App\Product;
use App\Supplier;
use App\Supplier_product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //
        //get all  suppliers
        $suppliers=Supplier::all();

        return response()->json(array(
            'message' => 'Successfully fetched all suppliers!',
            'data'=> $suppliers
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
            'name' => 'required|string'
        ]);
        $supplier = new Supplier([
            'name' => $request->name
        ]);
        $supplier->save();
        //calls the store method in Supplier_product to save product_id and supplier_id
        if(isset($supplier)){
            try {
                $supplier_product= (new Supplier_product())->store($request);
            } catch (QueryException $exception) {
                return response()->json("Server Error " . $exception->getMessage(), 500);
            }
        }

        return response()->json([
            'message' => 'Successfully created Supplier!',
            'data'=>$supplier
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
        //get supplier by id
        $supplier= Supplier::find($id);
        return response()->json([
            'message' => 'Successfully fetched supplier!'
        ], 200 ,$supplier);
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
        //update supplier
        $supplier = Supplier::find($id)([
            'name' => $request->name
        ]);
        $supplier->update();
        //calls the store method in Supplier_product to save product_id and supplier_id
        if(isset($supplier)){
            try {
                $supplier_product= Supplier_product::find($id)->update($request);
            } catch (QueryException $exception) {
                return response()->json("Server Error " . $exception->getMessage(), 500);
            }
        }

        return response()->json([
            'message' => 'Successfully updated Suppplier Details!'
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
        //delete supplier
        $supplier= Supplier::find($id);
        $supplier->delete();
        return response()->json(
            [
                'message' => 'Successfully Deleted Supplier!'
            ],  200
        );
    }
}
