<?php

namespace App\Http\Controllers;

use App\Order_detail;
use App\Supplier_product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class Order_detailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //get all orders
        $orders=Order_detail::all();
        return response()->json([
            'message' => 'Successfully retrieved order details!'
        ], 200, $orders);
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
     * @return Order_detail
     */
    public function store(Request $request)
    {
        //save product_id
        //save supplier_id
        try {
            $oder_detail = new Order_detail();

            $oder_detail->order_id = $request['order_id'];
            $oder_detail->product_id = $request['product_id'];
            $oder_detail->save();
        } catch (QueryException $exception) {
            return response()->json("Server Error.Query Exception", 500);
        }
        return $oder_detail;
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
