@extends('frontend.layouts_guest.master')
    @section('title')
        <title>Home page</title>
    @endsection

    @section('css')
        <link rel="stylesheet" href="{{ asset('home/home.css') }}">
        
    @endsection

    @section('js')
        <script src="{{ asset('home/home.js') }}"></script>
    @endsection

    @section('content')
	<section>
		<div class="container">
			<div class="row">
				{{-- sidebar component --}}
				@include('frontend.components_guest.sidebar')
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						@foreach ($products as $prod)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="{{ $prod->feature_image_path }}" alt="" />
										<h2>{{ number_format($prod->price) }} <i class="fa-solid fa-dong-sign"></i></h2>
										<p>
											<a href="{{ route('product.detail', ['id'=>$prod->id]) }}">
												{{ $prod->name }}
											</a>
										</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay" style="opacity: 0.85">
										<div class="overlay-content">
											<h2>{{ number_format($prod->price) }} <i class="fa-solid fa-dong-sign"></i></h2>
											<p>
												<a href="{{ route('product.detail', ['id'=>$prod->id]) }}">
													{{ $prod->name }}
												</a>
											</p>
											<a 
												href="" 
												class="btn btn-default add-to-cart"
												data-url="{{ route('product.add-to-cart',['id' => $prod->id]) }}"
											>
												<i class="fa fa-shopping-cart"></i>
												Add to cart
											</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
					</div><!--features_items-->
						<ul class="pagination">
							{{ $products->links() }}
						</ul>
				</div>
			</div>
		</div>
	</section>
    @endsection







	
	
	
