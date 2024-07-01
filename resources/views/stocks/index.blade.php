@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="row justify-content-center">

  <div class="col-6">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h3>Add stocks</h3>
      <a href="{{ route('stock.show') }}" class="btn btn-info btn-sm text-white">See all stocks</a>
  </div>
  

    <form action="{{ route('stock.store') }}" method="post">
      @csrf

      <div class="mb-3">
        <label for="product_code" class="form-label text-muted">Product Code</label>
        <input type="number" name="product_code" id="product_code" class="form-control" autofocus>
        @error('product_code')
        <p class="text-danger small">{{ $message }}</p>
        @enderror        
      </div>

      <div class="mb-3">
        <label for="name_of_product" class="form-label text-muted">Name of Product</label>
        <input type="text" name="name_of_product" class="form-control">
        @error('name_of_product')
         <p class="text-danger small">{{ $message }}</p>
        @enderror
      </div>


      <div class="mb-3">
        <label for="quantity" class="form-label text-muted">Quantity</label>
        <input type="number" name="quantity" class="form-control">
        @error('quantity')
         <p class="text-danger small">{{ $message }}</p>
        @enderror
     </div>

     <div class="mb-3">
      <label for="price" class="form-label text-muted">Price</label>
      <input type="number" name="price" class="form-control">
      @error('price')
       <p class="text-danger small">{{ $message }}</p>
      @enderror
   </div>


      <div class="mb-3">
        <label for="name_of_supplier" class="form-label text-muted">Name of supplier</label>
        <select name="name_of_supplier" id="" class="form-select">
          <option value="" disabled selected>Select a supplier</option>
          @foreach ($suppliers as $value => $label)
              <option value="{{ $value }}">{{ $label }}</option>
          @endforeach
        </select>
      
        @error('name_of_supplier')
          <p class="text-danger small">{{ $message }}</p>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary w-100 mb-3">Save</button>

    </form>

  </div>

</div>

@endsection