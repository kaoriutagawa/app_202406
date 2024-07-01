@extends('layouts.app')

@section('title', 'shopping')

@section('content')

  <div class="row justify-content-center">
    <div class="col-6">
      <h3>at Cart</h3>
        <table class="table border-1">
          <th class="bg-dark text-white">Name of Product</th>
          <th class="bg-dark text-white">Quantity</th>
          <th class="bg-dark text-white">Price</th>

          <tr>
            <td>{{ $stock->name_of_product }}</td>
            <td>{{ $stock->quantity }}</td>
            <td>{{ $stock->price }}</td>      
          </tr>
      </table>
    </div>
    
  </div>

  <div class="row justify-content-center">
    <div class="col-6">
      <form action="{{ route('stock.purchase', $stock->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="row justify-content-center">
          <div class="col-6-container">
            <h2>How many do you want to buy?</h2>
            <div class="mb-3">
              <label for="buy" class="form-label text-muted">Quantity </label>
              <input type="number" name="buy" class="form-control" value="{{ old('buy') }}">
              @error('buy')
              <p class="text-danger small">{{ $message }}</p>
              @enderror   
            </div>

            <button type="submit" class="mb-3 btn btn-warning text-white w-100">see other products</button>

            <a href="{{ route('stock.payment') }}" class="btn btn-success text-white w-100">Payment</a>
       
        
          </div>

        </div>
      </form>
    </div>
  </div>

  
@endsection