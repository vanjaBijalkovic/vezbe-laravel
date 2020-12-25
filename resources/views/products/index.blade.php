@extends('layouts.app')

@section('title', 'Products')

@section('content')
<h1>Products</h1>
<ul>
  @foreach ($products as $product)
    <li>
      <a href="/products/{{ $product->id }}">
        {{$product->name}}
      </a>
    </li>
  @endforeach

  {{ $products->links() }}
</ul>
@endsection
