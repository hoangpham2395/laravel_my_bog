<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class AdminCategoryController extends Controller
{
    public function all()
    {
    	$categories = Category::with('posts')->paginate(5);

    	return view('admin.category.all', compact('categories'));
    }

    public function create() 
    {
    	return view('admin.category.create');
    }

    public function edit($category_id)
    {
    	$category = Category::find($category_id);

    	return view('admin.category.edit', compact('category'));
    }
}
