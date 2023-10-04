<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $slider;
    private $category;
    private $product;
    public function __construct(
        Slider $slider,
        Category $category,
        Product $product
    ) {
        $this->slider = $slider;
        $this->category = $category;
        $this->product = $product;
    }
    public function index()
    {
        $sliders = $this->slider->latest()->get();
        $categoryParents = $this->category->Where('parent_id', 0)->get();
        // product for feature product
        $productsFeature = $this->product->latest()->take(6)->get();
        // product for recommended items
        $productsRecommended = $this->product->latest('views_count', 'desc')->take(6)->get();
        return view('frontend.home.home', compact(
            'sliders',
            'categoryParents',
            'productsFeature',
            'productsRecommended'
        ));
    }
}
