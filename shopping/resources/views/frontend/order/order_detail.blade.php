@extends('frontend.layouts_guest.master')
    @section('title')
        <title>Order| Detail</title>
    @endsection

    @section('css')
        <link rel="stylesheet" href="{{ asset('home/home.css') }}">
        
    @endsection

    @section('js')
        <script src="{{ asset('home/home.js') }}"></script>
		

    @endsection

	@section('content')
    <section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
						
						</tr>
					</thead>
					<tbody>
                        @foreach ($order_detail as $ord)
                        <tr>
							<td class="cart_product">
								<a href=""><img src="{{ $ord->feature_image_path }}" alt="" width="120px"></a>
							</td>
							<td class="cart_description" style="text-align: center">
								<h4><a href="{{ route('product.detail', ['id' => $ord->id]) }}">{{ $ord->name }}</a></h4>
							</td>
							<td class="cart_price">
								<p>{{ number_format($ord->price)}} <i class="fa-solid fa-dong-sign"></i></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
								
									<input class="cart_quantity_input" type="text" name="quantity" value="{{ $ord->pivot->quantity }}" disabled autocomplete="off" size="2">
									
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{ number_format($ord->price * $ord->pivot->quantity)}} <i class="fa-solid fa-dong-sign"></i></p>
							</td>
							
						</tr>
                        @endforeach
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	@endsection
