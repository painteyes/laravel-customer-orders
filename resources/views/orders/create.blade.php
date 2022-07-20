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

  <form action="{{ route('orders.store') }}" method="POST">
    @csrf
    @include('orders._form')
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
  
@stop
