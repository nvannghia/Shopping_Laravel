@extends('frontend.layouts_guest.master')
    @section('title')
        <title>Order| Purchase</title>
    @endsection

    @section('css')
        <link rel="stylesheet" href="{{ asset('home/home.css') }}">
        
    @endsection

    @section('js')
        <script src="{{ asset('home/home.js') }}"></script>
		

    @endsection

	@section('content')
    <div class="container">
        @if (auth()->user() != null)
            @if ($orders->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mã đơn hàng</th>
                            <th scope="col">Ngày đặt</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Xem chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <th scope="row">{{ $order->id }}</th>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ number_format($order->amount)  }} đ</td>
                            <td>
                                <a href="{{ route('orders.detail', ['id'=>$order->id]) }}">Xem chi tiết đơn hàng</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h1 style="text-align: center; color:orange" >Bạn chưa đặt đơn hàng nào!  
                    <a href="{{ route('home.index') }}" style="text-decoration: underline"> Mua sắm </a>
                </h1>
            @endif
           
        @else
            <h1 style="text-align: center; color:orange" >Vui lòng 
                <a href="{{ route('customer-login') }}" style="text-decoration: underline">đăng nhập </a>
                để xem các đơn hàng đã đặt 
            </h1>
        @endif
    </div>
	@endsection
