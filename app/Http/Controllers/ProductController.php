<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() 
    {
        $products = Product::where('available', false)->paginate(1);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        Product::create($data);

        return redirect('/');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    public function update($id, ProductRequest $request) 
    {   
        $data = $request->validated();
        $product = Product::updateOrCreate([
            'id' => $id
        ], array_merge($data, ['available' => $request->available ]));

        info($product);

        return redirect('/');
    }   
}
