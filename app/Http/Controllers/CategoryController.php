<?php

namespace App\Http\Controllers;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;


use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoryRequest $request) 
    {
        $data = $request->validated();
        Category::create($data);

        return redirect('/');
    }
}
