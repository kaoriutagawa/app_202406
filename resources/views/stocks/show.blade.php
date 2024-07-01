@extends('layouts.app')

@section('title', 'All stocks')

@section('content')
  <div class="row justify-content-center">
    <div class="col-11">
        <table class="table border-1">
        <th class="bg-dark text-white">Date</th>
        <th class="bg-dark text-white">Product code</th>
        <th class="bg-dark text-white">Name of Product</th>
        <th class="bg-dark text-white">Quantity</th>
        <th class="bg-dark text-white">Price</th>
        <th class="bg-dark text-white">Name of supplier</th>
        <th class="bg-dark text-white"></th>
        <th class="bg-dark text-white"></th>
        <th class="bg-dark text-white"></th>

      @foreach ($stocks as $stock)
        <tr>
          <td>{{ $stock->created_at }}</td>
          <td>{{ $stock->product_code }}</td>
          <td>{{ $stock->name_of_product }}</td>
          <td>{{ $stock->quantity }}</td>
          <td>{{ $stock->price }}</td>
          <td>{{ $stock->name_of_supplier }}</td>

          <td><a href="{{ route('stock.edit', $stock->id ) }}" class="btn btn-warning btn-sm text-white" title="Edit"><i class="fa-solid fa-pen"></i></a>
          <td><form action="{{ route('stock.destroy', $stock->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" title="Delete"><i class="fa-solid fa-trash-can"></i></button>
          </td>
          <td><a href="{{ route('stock.buy', $stock->id ) }}" class="btn btn-success btn-sm text-white" title="Buy"><i class="fa-solid fa-cart-shopping"></i></a>
        </tr>
      

        @endforeach
      </table>
    </div>
  </div>

    
    
@endsection