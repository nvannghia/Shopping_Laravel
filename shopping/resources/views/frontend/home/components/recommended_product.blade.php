<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">recommended items</h2>
    
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
                @foreach ($productsRecommended as $key => $value)
                    @if($key % 3 == 0)
                    <div class="item {{ $key == 0 ? 'active' : '' }}">	
                    @endif
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ $value->feature_image_path }}" alt="" />
                                        <h2>{{ number_format($value->price) }}<i class="fa-solid fa-dong-sign"></i></h2>
                                        <p>
                                            <a href="{{ route('product.detail', ['id'=>$value->id]) }}">
                                                {{ $value->name }}
                                            </a>
                                    </p>
                                        <a 
                                            href=""
                                            data-url="{{ route('product.add-to-cart',['id'=>$value->id ]) }}""
                                            class="btn btn-default add-to-cart"
                                        >
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @if($key % 3 == 2)
                    </div>
                    @endif
                @endforeach
            
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>			
    </div>
</div><!--/recommended_items-->