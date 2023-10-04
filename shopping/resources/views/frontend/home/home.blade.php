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
        <!--slider-->
        @include('frontend.home.components.slider')
        <!--/slider-->
        <section>
            <div class="container">
                <div class="row">
                    {{-- component Sidebar --}}
                    @include('frontend.components_guest.sidebar')
                    
                    <div class="col-sm-9 padding-right">
                        {{-- component feature product --}}
                       @include('frontend.home.components.feature_product')
                        
                       {{-- component category tab --}}
                       @include('frontend.home.components.category_tab')
                        
                       {{-- component recommeded items --}}
                       @include('frontend.home.components.recommended_product');
                        
                    </div>
                </div>
            </div>
        </section>
    @endsection
