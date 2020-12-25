@extends('layouts.app')

@section('title', 'Products')

@section('content')
<h1>Create Product</h1>
<form method="POST" action="/products">
  @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Write here:</label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"></textarea>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="available" name="available" value="1">
    <label class="form-check-label" for="available">Is sold</label>
  </div>

  <select multiple="multiple" name="categories[]" id="categories">
    @foreach($categories as $category)
      <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
  </select>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
