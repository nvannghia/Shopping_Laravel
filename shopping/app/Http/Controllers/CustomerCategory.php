<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CustomerCategory extends Controller
{
    public function index($slug, $id)
    {
        $categoryParents = Category::Where('parent_id', 0)->get();
        $products = Product::Where('category_id', $id)->paginate(6);
        return view('frontend.product.category.list', compact('categoryParents', 'products'));
    }
}
