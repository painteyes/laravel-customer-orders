@extends('layouts.app')
@section('content')

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('orders.update', $order) }}" method="POST">
    @csrf
    @method('PUT')
    @include('orders._form')
    <button type="submit" class="btn btn-warning">Update</button>
  </form>
@stop
