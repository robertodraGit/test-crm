@extends('layouts.app')
@section('content')
  <form action="{{ route('orders.update', $order) }}" method="POST">
    @csrf
    @method('PUT')
    @include('orders._form')
    <label for="customer_id">Customer:</label>
    <select name="customer_id">
        @foreach ($customers as $c)
            <option value="{{$c -> id}}"
                @if ($order -> customer -> id == $c -> id)
                    selected
                @endif
                >
                {{$c -> first_name}}
                {{$c -> last_name}}
            </option>
        @endforeach
    </select>
    <br>
    <label for="tags[]">Tags:</label>
    <br>
    @foreach ($tags as $tag)
        <input 
        type="checkbox" 
        name="tags[]" 
        value="{{ $tag -> id }}"
        @if ($order -> tags -> contains($tag -> id))
            checked
        @endif
        >
        {{ $tag -> name }} <br>
    @endforeach
    <br>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
@stop
