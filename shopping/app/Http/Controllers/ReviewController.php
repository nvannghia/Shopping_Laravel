<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function reivew(Request $request, $id)
    {
        $review = new Review();
        $review->content = $request->content;
        $review->number_star = $request->number_star;
        $review->product_id = $id;
        $review->user_id = auth()->user()->id;
        $review->save();
        return redirect()->route('product.detail', ['id' => $id]);
    }
}
