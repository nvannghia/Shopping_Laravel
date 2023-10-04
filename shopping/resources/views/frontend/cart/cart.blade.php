@extends('frontend.layouts_guest.master')
    @section('title')
        <title>Cart</title>
    @endsection

    @section('css')
        <link rel="stylesheet" href="{{ asset('home/home.css') }}">
        
    @endsection

    @section('js')
        <script src="{{ asset('home/home.js') }}"></script>
		<script>

			function cartUpdate(event){
				event.preventDefault();
				let urlUpdate = $('.update_cart_url').data('url');
				let idItemUpdate = $(this).data('id');
				let quantity = $(this).parents('tr').find('input.cart_quantity_input').val();
				
				$.ajax({
					type: "GET",
					url: urlUpdate,
					data: {id: idItemUpdate, quantity: quantity },
					success: function (response) {
						if(response.code === 200){
							$('.cart_wrapper').html(response.cart_component);
						}
					},
					error: function(response){
						if(response.code === 500){
							alert('Exception:', exception);
						}
					}
				});
			}



			$(function(){
				$('.cart_quantity_update').on('click', cartUpdate);
			});

		</script>

    @endsection

	@section('content')
		<div class="cart_wrapper">
			@include('frontend.cart.components.cart_list_item')
		</div>
	@endsection
