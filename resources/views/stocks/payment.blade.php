@extends('layouts.app')

@section('title', 'Payment')

@section('content')
  <div class="row justify-content-center">
    <div class="col-6">
      <table class="table border-1">
        <thead>
            <tr>
                <th class="bg-dark text-white">Name of Product</th>
                <th class="bg-dark text-white">Quantity</th>
                <th class="bg-dark text-white">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stocks as $stock)
            <tr>
                <td>{{ $stock->name_of_product }}</td>
                <td>{{ $stock->quantity }}</td>
                <td>{{ $stock->price }}</td>
            </tr>
            @endforeach
            <tr class="h3 fw-bold bg-primary text-white">
                <td>Total</td>
                <td></td>
                <td>{{ $total_price }} yen</td>
            </tr>
        </tbody>
    </table>
    

        <button type="submit" class="btn btn-primary w-100">Let's go!</button>

    </div>
  </div>

    
    
@endsection