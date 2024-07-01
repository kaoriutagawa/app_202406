@extends('layouts.app')

@section('title', 'Update')

@section('content')
  <form action="{{ route('stock.update', $stock->id) }}" method="post">
    @csrf
    @method('PATCH')
    <div class="row justify-content-center">
      <div class="col-6">
        <h1 class="h3">Edit/Update</h1>
        <div class="mb-3">
          <label for="product_code" class="form-label text-muted">Product Code</label>
          <input type="number" name="product_code" id="product_code" class="form-control" autofocus value="{{ old('product_code', $stock->product_code) }}">
        </div>
  
        <div class="mb-3">
          <label for="name_of_product" class="form-label text-muted">Name of Product</label>
          <input type="text" name="name_of_product" class="form-control" value="{{ old('name_of_product', $stock->name_of_product) }}">
        </div>
  
        <div class="mb-3">
          <label for="quantity" class="form-label text-muted">Quantity</label>
          <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $stock->quantity) }}">
        </div>

        <div class="mb-3">
          <label for="price" class="form-label text-muted">Price</label>
          <input type="number" name="price" class="form-control" value="{{ old('price', $stock->price) }}">
        </div>

        <div class="mb-3">
          <label for="name_of_supplier" class="form-label text-muted">Name of supplier</label>
          <select name="name_of_supplier" id="" class="form-select">
            <option value="" disabled selected>Select a supplier</option>
            @foreach ($suppliers as $value => $label)
            <option value="{{ $value }}">{{ $label }}</option>
            @endforeach
          </select>
        </div>
         
        <button type="submit" class="mb-3 btn btn-success">Edit</button>
      </div>
    </div>
  </form>

   
@endsection