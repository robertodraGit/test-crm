@extends('layouts.app')
@section('content')
<div class="row">
    <div class="offset-md-10 col-md-2">
      <a href="{{ route('customers.index') }}" class="btn btn-primary btn-block"><- Go back</a>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Company</th>
            <th scope="col" colspan="2" class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
            <tr>
              <th scope="row">{{ $customer->id }}</th>
              <td>{{ $customer->first_name }}</td>
              <td>{{ $customer->last_name }}</td>
              <td>{{ $customer->email }}</td>
              <td>{{ $customer->phone }}</td>
              <td>{{ $customer->company }}</td>
              <td><a href="{{ route('customers.edit', $customer) }}">[Edit]</a></td>
              <td><a href="#" onclick="event.preventDefault(); document.getElementById('delete-customer-{{ $customer->id }}-form').submit();">[Delete]</a></td>
  
              <form id="delete-customer-{{ $customer->id }}-form" action="{{ route('customers-delete', $customer -> id) }}" method="GET" style="display: none;">
                  @method('GET')
                  @csrf
              </form>
            </tr>
        </tbody>
      </table>
    </div>
  </div>

  <br>

  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col" colspan="2">Description</th>
            <th scope="col">Cost</th>
            <th scope="col">Created at</th>
            <th scope="col" colspan="2" class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                <th scope="row">{{ $order->id }}</th>
                <td>{{ $order->title }}</td>
                <td>{{ $order->description }}</td>
                <td>{{ $order->cost }}</td>
                <td>{{ $order->created_at }}</td>
                <td><a href="{{ route('orders.edit', $order) }}">[Edit]</a></td>
                <td><a href="#" onclick="event.preventDefault(); document.getElementById('delete-order-{{ $order->id }}-form').submit();">[Delete]</a></td>
    
                <form id="delete-order-{{ $order->id }}-form" action="{{ route('orders-delete', $order -> id) }}" method="GET" style="display: none;">
                    @method('GET')
                    @csrf
                </form>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
@stop
