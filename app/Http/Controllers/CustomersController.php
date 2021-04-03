<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        return view('customers.index')->withCustomers(Customer::paginate(10));
    }

    public function create()
    {
        return view('customers.create')->withCustomer(new Customer);
    }

    public function store(Request $request)
    {
        $customer = Customer::create($request->all());

        return redirect()->route('customers.edit', $customer)->withMessage('Customer created successfully.');
    }

    public function show($id) {
        $customer = Customer::findOrFail($id);
        $tot_orders = Order::all();
        $orders = [];

        foreach ($tot_orders as $order) {
            if($order -> customer_id === $customer -> id) {
                $orders[] = $order;
            }
        }

        return view('customers.show', compact('customer', 'orders'));
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $customer->update($request->all());

        return redirect()->route('customers.edit', $customer)->withMessage('Customer updated successfully.');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer -> delete();

        return redirect()->route('customers.index')->withMessage('Customer deleted successfully');
    }
}
