@extends('layouts.app')

@section('title', 'Products')

@section('content')
<h1>Create Category</h1>
<form method="POST" action="/category">
  @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
