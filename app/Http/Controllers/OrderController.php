<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $order = DB::table('order')
            ->join('product', 'product.id', '=', 'order.product_id')
            ->join('users', 'users.id', '=', 'order.user_id')
            ->select('order.id', 'product.product_name', 'users.first_name', 'users.last_name', 'order.price')
            ->get();

        $ordersummary = DB::table('order')
            ->join('product', 'product.id', '=', 'order.product_id')
            ->join('users', 'users.id', '=', 'order.user_id')
            ->select('order.product_id', 'product.product_name', DB::raw('COUNT(order.product_id) as quantity'), DB::raw('SUM(order.price) as price'))
            ->groupBy('order.product_id', 'product.product_name')
            ->get();


        return view('order.index', compact('order', 'ordersummary'));
    }

    public function orderDetails()
    {
        $ordersummary = DB::table('order')
            ->join('product', 'product.id', '=', 'order.product_id')
            ->join('users', 'users.id', '=', 'order.user_id')
            ->select('order.product_id', 'product.product_name', DB::raw('COUNT(order.product_id) as quantity'), DB::raw('SUM(order.price) as price'))
            ->groupBy('order.product_id', 'product.product_name')
            ->get();
        return $ordersummary;
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
