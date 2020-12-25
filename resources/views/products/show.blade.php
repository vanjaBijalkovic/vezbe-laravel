@extends('layouts.app')

@section('title', 'Products')

@section('content')
<h1>Products</h1>
    <div>
        <a href="/products/{{$product->id}}/edit">
            {{ $product->name }}
        </a>
    </div>
    <br>
    <div>
        {{ $product->description }}
    </div>
    <div>
        <ul>
            @foreach($product->categories as $category)
                <li>
                    {{ $category->name }}
                </li>
            @endforeach
        </ul>
    </div>
    <div>
        {{ $product->available == 0 ? 'Available' : 'Not' }}
    </div>
@endsection
