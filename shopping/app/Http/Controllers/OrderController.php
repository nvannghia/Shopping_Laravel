<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{

    public function order(Request $request)
    {
        try {
            DB::beginTransaction();
            if (session()->has('cart')) {
                $carts = session()->get('cart');
                $amount = 0;
                foreach ($carts as $cartItem) {
                    $amount += $cartItem['price'] * $cartItem['quantity'];
                }

                $order = Order::create([
                    'amount' => $amount,
                    'city' => $request->city,
                    'district' => $request->district,
                    'ward' => $request->ward,
                    'phone_number' => $request->phone_number,
                    'delivery_note' => $request->delivery_note,
                    'user_id' => auth()->user()->id,
                ]);

                foreach ($carts as $keyItem => $cartItem) {
                    $order->products()->attach($keyItem, [
                        'unit_price' => $cartItem['price'],
                        'quantity' => $cartItem['quantity']
                    ]);
                }
            }
            //delete session when order success
            session()->forget('cart');
            DB::commit();
            return redirect()->route('product.show-cart')->with('msg', 'Đặt hàng thành công, mời bạn ');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error('Exception message: ' . $ex->getMessage() . ', Line: ' . $ex->getLine());
        }
    }

    public function listOrders()
    {
        $orders = new Collection();
        $categoryParents = Category::Where('parent_id', 0)->get(); // for header
        if (auth()->user() != null) {
            $user = auth()->user();
            //get orders list
            $orders = $user->orders;
            return view('frontend.order.purchase_order', compact('categoryParents', 'orders'));
        }
        return view('frontend.order.purchase_order', compact('categoryParents', 'orders'));
    }

    public function orderDetail($id)
    {
        $categoryParents = Category::Where('parent_id', 0)->get(); // for header
        $order = Order::find($id);
        $order_detail = $order->products;
        return view('frontend.order.order_detail', compact('categoryParents', 'order_detail'));
    }
}
