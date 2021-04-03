<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Tag;
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
        $tags = Tag::all();
        $customers = Customer::all();
        return view('orders.create', compact('tags', 'customers'))->withOrder(new Order);
    }

    public function store(Request $request)
    {
        $customer = Customer::findOrFail($request['customer_id']);
        $order = Order::make($request -> all());
        $order -> customer() -> associate($customer);
        $order -> save();

        $tags = Tag::findOrFail($request['tags']);
        $order -> tags() -> attach($tags);

        // dd($order);

        return redirect() -> route('orders.edit', $order) -> withMessage('Order created succesfully.');
    }

    // public function show($id)
    // {
    //     //
    // }

    public function edit(Order $order)
    {
        $order = Order::findOrFail($order -> id);
        $tags = Tag::all();
        $customers = Customer::all();

        return view('orders.edit', compact('order', 'tags', 'customers'));
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
