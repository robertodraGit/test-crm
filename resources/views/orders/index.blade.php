@extends('layouts.app')

@section('content')
<div class="row">
  <div class="offset-md-10 col-md-2">
    <a href="{{ route('orders.create') }}" class="btn btn-primary btn-block">+ New Order</a>
  </div>
</div>

<br>

<div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Customer ID</th>
            <th scope="col">Title</th>
            <th scope="col" colspan="1">Description</th>
            <th scope="col">Cost</th>
            <th scope="col">Created at</th>
            <th scope="col" colspan="2" class="text-center">Actions</th>
          </tr>
        </thead>
        @if (empty($orders))
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
                
        @else
            <tbody>
              <tr>
                <th scope="row">No orders yet.</th>
              </tr>
            </tbody>                
        @endif
      </table>
    </div>
</div>

@if (empty($orders))
    <div class="row">
        <div class="col-md-12">
        {{ $orders->links() }}
        </div>
    </div>
@endif

@stop
