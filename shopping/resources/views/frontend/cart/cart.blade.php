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
			function cartUpdate (event) {
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
							alert('Update successful');
						}
					},
					error: function(response){
						if(response.code === 500){
							alert('Exception:', exception);
						}
					}
				});
			}

			function cartDelete(event){
				event.preventDefault();
				let urlDelete = $('.cart_delete').data('url');
				let idItemDelete = $(this).data('id');
				$.ajax({
					type: "GET",
					url: urlDelete,
					data: {id: idItemDelete },
					success: function (response) {
						if(response.code === 200){
							$('.cart_wrapper').html(response.cart_component);
							alert('Delete successful');
						}
					},
					error: function(response){
						if(response.code === 500){
							alert('Exception:', exception);
						}
					}
				});
			}

			function cartDeleteAll(event){
				event.preventDefault();
				let urlDeleteAll = $(this).data('url');
				$.ajax({
					type: "GET",
					url: urlDeleteAll,
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
				$(document).on('click', '.cart_quantity_update', cartUpdate);
				$(document).on('click', '.cart_quantity_delete', cartDelete);
				$(document).on('click', '.delete_all_cart', cartDeleteAll);
			})

		</script>

    @endsection

	@section('content')
		<div class="cart_wrapper">
			@include('frontend.cart.components.cart_list_item')
		</div>					
		@include('frontend.cart.components.check_out')
	@endsection
