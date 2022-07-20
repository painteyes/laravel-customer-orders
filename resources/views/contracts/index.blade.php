@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-12">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Customer ID</th>
          <th scope="col">Orderd ID</th>
          <th scope="col">Created at</th>
        </tr>
      </thead>
      <tbody>
        @foreach($contracts as $contract)
          <tr>
            <th scope="row">{{ $contract->id }}</th>
            <td>{{ $contract->customer_id }}</td>
            <td>{{ $contract->order_id }}</td>
            <td>{{ $contract->created_at }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    {{ $contracts->links() }}
  </div>
</div>

@stop
