@extends('layouts.app')
@section('content')
  <form action="{{ route('orders.store') }}" method="POST">
    @csrf
    @include('orders._form')
    <label for="customer_id">Customer:</label>
    <select name="customer_id">
        @foreach ($customers as $c)
            <option value="{{$c -> id}}">
                {{$c -> first_name}}
                {{$c -> last_name}}
            </option>
        @endforeach
    </select>
    <br>
    <label for="tags[]">Tags:</label>
    <br>
    @foreach ($tags as $tag)
        <input type="checkbox" name="tags[]" value="{{ $tag -> id }}">
        {{ $tag -> name }} <br>
    @endforeach
    <br>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
@stop
