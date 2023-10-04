<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $product = Product::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image_path' => $product->feature_image_path,
                'quantity' => 1
            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }

    public function showCart()
    {
        $categoryParents = Category::Where('parent_id', 0)->get(); // for header
        $cartItems = session()->get('cart');
        return view('frontend.cart.cart', compact('categoryParents', 'cartItems'));
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            //re-render view (to update total price ...)
            $cartItems = session()->get('cart');
            //pass categoryParent fors header
            $categoryParents = Category::Where('parent_id', 0)->get();
            $cart_component = view('frontend.cart.cart', compact('cartItems', 'categoryParents'))->render();
            return response()->json([
                'cart_component' => $cart_component,
                'code' => 200
            ], 200);
        }
        return response()->json([
            'code' => 500,
            'message' => 'Failed'
        ], 500);
    }
}
