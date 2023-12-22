<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            "name" => "required",
            "phone" => "required",
            "address" => "required",
            "city" => "required",
            "method" => "required"
        ]);

        $order = new Order;
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->city = $request->city;
        $order->method = $request->method;
        $order->user_id = auth()->id();
        $order->save();

        $carts = Cart::where('user_id', auth()->id())->get();
        foreach ($carts as $cart) {
            $orderDetail = new OrderDetail;
            $orderDetail->title = $cart->product->title;
            $orderDetail->price = $cart->product->price;
            $orderDetail->qty = $cart->qty;
            $orderDetail->size = $cart->size;
            $orderDetail->color = $cart->color;
            $orderDetail->product_id = $cart->product_id;
            $orderDetail->order_id = $order->id;
            $orderDetail->save();
        }

        Cart::where('user_id', auth()->id())->delete();
        return redirect('/')->with('success', 'Successfully order completed!');
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
