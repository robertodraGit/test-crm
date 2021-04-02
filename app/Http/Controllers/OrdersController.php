<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create')->withOrder(new Order);
    }

    public function store(Request $request)
    {
        $order = Order::create($request -> all());
        return redirect() -> route('orders.edit', $order) -> withMessage('Order created succesfully.');
    }

    // public function show($id)
    // {
    //     //
    // }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));

    }

    public function update(Request $request, Order $order)
    {
        $order->update($request->all());

        return redirect()->route('orders.edit', $order)->withMessage('Order updated successfully.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order -> delete();

        return redirect()->route('orders.index')->withMessage('Order deleted successfully');
    }
}
