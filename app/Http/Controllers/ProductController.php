<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index() 
    {
        $products = Product::where('available', false)->paginate(10);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::get();

        return view('products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        info($request);
        $data = $request->validated();
        $product = Product::create($data);

        $product->categories()->attach($request->categories);

        return redirect('/');
    }

    public function show($id)
    {
        $product = Product::with('categories')->findOrFail($id);
        info($product);
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
