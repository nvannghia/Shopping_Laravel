@if (!empty($cartItems))
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info cart_delete" data-url="{{ route('product.delete-cart') }}">
                <table class="table table-condensed update_cart_url" data-url="{{ route('product.update-cart') }}">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description" style="text-align: center">Name</td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td>Delete</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp

                        @foreach ($cartItems as $id => $cartItem)
                        @php
                            $total += $cartItem['price'] * $cartItem['quantity'];
                        @endphp
                        <tr>
                            <td class="cart_product">
                                <img src="{{ $cartItem['image_path'] }}" alt="" width="120px">
                            </td>
                            <td class="cart_description" style="text-align: center">
                                <h4><a href="{{ route('product.detail', ['id'=> $id]) }}">{{ $cartItem['name'] }}</a></h4>
                            </td>
                            <td class="cart_price">
                                <p>{{ number_format($cartItem['price'] )}} <i class="fa-solid fa-dong-sign"></i></p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <input 
                                        class="cart_quantity_input" 
                                        type="number" name="quantity" 
                                        value="{{$cartItem['quantity'] }}"
                                        min="1"
                                        max="50"
                                    >
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{ number_format($cartItem['price'] *$cartItem['quantity'] )}} <i class="fa-solid fa-dong-sign"></i></p>
                            </td>
                            <td class="cart_delete">
                                <a 
                                    class="cart_quantity_update" 
                                    href=""
                                    title="update your cart"
                                    style="color:blue"
                                    data-id="{{ $id }}"
                                    
                                >
                                    <i class="fa-solid fa-pen-fancy"></i>
                                </a>
                                <a 
                                    class="cart_quantity_delete" 
                                    href=""
                                    title="delete this item"
                                    style="color:red"
                                    data-id="{{ $id }}"
                                >
                                    <i class="fa-solid fa-trash-arrow-up"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td class="cart_total" style="text-align: right" colspan="5">
                               <a 

                                    href="" 
                                    class="btn btn-primary delete_all_cart"
                                    data-url="{{ route('product.delete-cart-all') }}"
                                >
                                    Xóa hết giỏ hàng
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="cart_total" style="text-align: right" colspan="5">
                                <h3>Total all:</h3><p class="cart_total_price">{{ number_format($total) }} <i class="fa-solid fa-dong-sign"></i></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
    </section> <!--/#cart_items-->
@else
    @if (session('msg'))
        <h1 
            style="color: seagreen; text-align: center"
        >
            {{ session('msg') }} 
            <a href="{{ route('home.index') }}"> tiếp tục mua sắm!</a>
        </h1>
    @endif
    <h1 style="color: orange; text-align: center">Chưa có sản phẩm nào trong giỏ hàng!</h1>
@endif


