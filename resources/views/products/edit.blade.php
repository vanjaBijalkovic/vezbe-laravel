@extends('layouts.app')

@section('title', 'Products')

@section('content')
<h1>Products</h1>
<form method="POST" action="/products/{{ $product->id }}/update">
  @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $product->name }}">
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Write here:</label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{$product->description}}</textarea>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="available" name="available" value="1">
    <label class="form-check-label" for="available">Is sold</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
