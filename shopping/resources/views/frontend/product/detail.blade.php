@extends('frontend.layouts_guest.master')
@section('title')
    <title>Product detail</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
    <style>
        /* body{
    margin-top:20px;
    background:#eee;
} */

@media (min-width: 0) {
    .g-mr-15 {
        margin-right: 1.07143rem !important;
    }
}
@media (min-width: 0){
    .g-mt-3 {
        margin-top: 0.21429rem !important;
    }
}
.bg-color{
    background-color: #eee;
}

.g-height-50 {
    height: 50px;
}

.g-width-50 {
    width: 50px !important;
}

@media (min-width: 0){
    .g-pa-30 {
        padding: 2.14286rem !important;
    }
}

.g-bg-secondary {
    background-color: #fafafa !important;
}

.u-shadow-v18 {
    box-shadow: 0 5px 10px -6px rgba(0, 0, 0, 0.15);
}

.g-color-gray-dark-v4 {
    color: #777 !important;
}

.g-font-size-12 {
    font-size: 0.85714rem !important;
}

.media-comment {
    margin-top:20px
}
    </style>
@endsection

@section('js')
    <script src="{{ asset('home/home.js') }}"></script>
    
@endsection

@section('content')
<section>
    <div class="container">
        <div class="row">
            {{-- // side bar --}}
            @include('frontend.components_guest.sidebar')
            
            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{ $product->feature_image_path }}" alt="" />
                            <h3>ZOOM</h3>
                        </div>
                       
                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                            <h2>{{ $product->name }}</h2>
                            <img src="images/product-details/rating.png" alt="" />
                            <span>
                                <span>{{ number_format($product->price)  }} <i class="fa-solid fa-dong-sign"></i></span>
                                {{-- <label>Quantity:</label>
                                <input type="number" value="1" /> --}}
                                <a 
                                    data-url="{{ route('product.add-to-cart',['id'=>$product->id ]) }}"
                                    class="btn btn-default add-to-cart add-to-cart-list"
                                >
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to cart
                                </a>
                            </span>
                            <p><b>Availability:</b> In Stock</p>
                            <p><b>Condition:</b> New</p>
                            <p><b>Brand:</b> E-SHOPPER</p>
                            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->
                
                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#details" data-toggle="tab">Details</a></li>
                            <li><a href="#tag" data-toggle="tab">Tag</a></li>
                            <li class=""><a href="#reviews" data-toggle="tab">Comment</a></li>
                            <li class="active"><a href="#all_reviews" data-toggle="tab">All Reviews ({{ $product->reviews->count() }})</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="details" >
                            @foreach ($product->productImages as $prodImg)
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ $prodImg->image_path }}" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                        <div class="tab-pane fade" id="tag" >
                            @foreach ($product->tags as $tagItem)
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <h2  style="background-color: beige">{{ $tagItem->name }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                        <div class="tab-pane fade " id="reviews" >
                            @if (auth()->user() != null)
                                <div class="col-sm-12">
                                
                                    <p class="h3" style="color: coral">Each of your comments helps us improve the quality better and better</p>
                                    <p><b>Write Your Review</b></p>
                                    
                                    <form action="{{ route('product.review',['id'=> $product->id]) }}" method="post">
                                        @csrf
                                        <span>
                                            <input type="text" placeholder="{{ auth()->user()->name }}" disabled/>
                                            <input type="email" placeholder="{{ auth()->user()->email }}" disabled/>
                                        </span>
                                        <textarea name="content" ></textarea>
                                        <b>Rating: </b> <input type="number" min="1" max="5" name="number_star" required> <i class="fa-solid fa-star" style="color:yellow"></i>
                                        <button type="submit" class="btn btn-default pull-right">
                                            Bình luận
                                        </button>
                                    </form>
                                </div>
                            @else
                                <a class="btn btn-primary" href="{{ route('customer-login') }}"> Vui lòng đăng nhập để bình luận! </a>
                            @endif
                            
                        </div>
                        
                        <div class="tab-pane fade active in" id="all_reviews" >
                            <div class="col-sm-12">
                                <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
                                <div class="container">
                                   
                                    <div class="row">
                                        @foreach ($product->reviews as $review)
                                        <div class="col-md-8" >
                                            <div class="media g-mb-30 media-comment">
                                                <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30" style="padding:0 !important">
                                                <div class="g-mb-15 bg-color">
                                                   
                                                    <h5 class="h5 g-color-gray-dark-v1 mb-0" style="color:orangered"><i class="fa-regular fa-user"></i>&nbsp;{{ $review->user->name }}</h5>
                                                    <span class="g-color-gray-dark-v4 g-font-size-12">5 days ago</span>
                                                </div>
                                            
                                                <p class="bg-color">
                                                    @for ($i = 1; $i <= $review->number_star; $i++)
                                                    <i class="fa-solid fa-star" style="color:yellow"></i>
                                                    @endfor
                                                    <br>
                                                    {{ $review->content }}
                                                </p>

                                                <ul class="list-inline d-sm-flex my-0">
                                                    <li class="list-inline-item g-mr-20">
                                                    <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                                        <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                                                        178
                                                    </a>
                                                    </li>
                                                    <li class="list-inline-item g-mr-20">
                                                    <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                                        <i class="fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3"></i>
                                                        34
                                                    </a>
                                                    </li>
                                                    <li class="list-inline-item ml-auto">
                                                    <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                                        <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                                                        Reply
                                                    </a>
                                                    </li>
                                                </ul>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                   
                                    
                                </div>
                               
                            </div>
                        </div>
                        
                    </div>
                </div><!--/category-tab-->
                
                <!--recommended_items-->
                @include('frontend.home.components.recommended_product')
                <!--/recommended_items-->
            </div>
        </div>
    </div>
</section>
@endsection