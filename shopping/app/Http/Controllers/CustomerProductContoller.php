<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CustomerProductContoller extends Controller
{
    private $category;
    private $product;
    public function __construct(Category $cate, Product $prod)
    {
        $this->category = $cate;
        $this->product = $prod;
    }
    public function productDetail($id)
    {
        $product = $this->product->find($id);
        // increment views_countwhen customer click for detail
        $product->increment('views_count');
        $categoryParents = $this->category->Where('parent_id', 0)->get();
        // product for componene recommended items
        $productsRecommended = $this->product->latest('views_count', 'decs')->take(6)->get();
        return view('frontend.product.detail', compact(
            'categoryParents',
            'product',
            'productsRecommended'
        ));
    }
}
