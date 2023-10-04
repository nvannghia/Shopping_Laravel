<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Features Items</h2>
    @foreach($productsFeature as $product)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{ $product->feature_image_path }}" alt="" />
                        <h2>{{number_format( $product->price) }} <i class="fa-solid fa-dong-sign"></i></h2>
                        <p>{{ $product->name }}</p>
                        <a 
                            href=""
                            data-url="{{ route('product.add-to-cart',['id'=>$product->id ]) }}"
                            class="btn btn-default add-to-cart"
                        >
                            <i class="fa fa-shopping-cart"></i>
                            Add to cart
                        </a>
                    </div>
                    <div class="product-overlay" style="opacity: 0.85 !important">
                        <div class="overlay-content" >
                            <h2>{{number_format( $product->price) }} <i class="fa-solid fa-dong-sign"></i></h2>
                            <p>
                                <a href="{{ route('product.detail', ['id'=>$product->id]) }}" style="color:white">
                                    {{ $product->name }}
                                </a>
                            </p>
                            <a 
                                href="" 
                                data-url="{{ route('product.add-to-cart',['id'=>$product->id ]) }}"
                                class="btn btn-default add-to-cart"
                            >
                                <i class="fa fa-shopping-cart"></i>
                                   Add to cart
                            </a>
                        </div>
                    </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
</div><!--features_items-->