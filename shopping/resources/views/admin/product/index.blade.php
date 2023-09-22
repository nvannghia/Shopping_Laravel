@extends('layouts.admin')

@section("title")
    <title>Trang chủ - Product</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/product/index/list.css') }}">
@endsection
@section('js')
    <script src="{{ asset("vendors/sweetAlert2/cdn.jsdelivr.net_npm_sweetalert2@11") }}"></script>
    <script src="{{ asset('admins/main.js') }}"></script>
@endsection

@section('content')
  <div class="content-wrapper">
    @include('partials.content-header',['name'=>'product', 'key'=>'list'])
    
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('products.create') }}" class="btn btn-primary float-right m-2">Add New Product</a>
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tên sản phẩm</th>
                  <th scope="col">Giá</th>
                  <th scope="col">Hình ảnh</th>
                  <th scope="col">Danh mục</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)    
                <tr id="pid{{ $product->id }}">
                  <th scope="row"> {{ $product->id }}</th>
                  <td>{{ $product->name }}</td>
                  <td>{{ number_format((int)$product->price) }} vnd</td>
                  <td>
                    <img 
                      class="product_img_150_100"
                      src="{{ asset("$product->feature_image_path") }}" 
                      alt="{{ $product->name }}" 
                    >
                  </td>
                  <td> 
                    {{ optional($product->category)->name }}   {{-- eloquant model, optinal(): return null if dont have any obj match --}}
                  <td>
                    <div class="d-flex">
                      <a 
                        href="{{ route("products.edit",['id'=>$product->id]) }}" 
                        class="btn btn-info mr-3">
                        Edit
                      </a>
                      <a 
                        href="" 
                        class="btn btn-danger action_delete"
                        data-url="{{ route("products.delete",['id'=>$product->id]) }}"
                        >
                        Delete
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-md-12 d-flex justify-content-center mt-3">
             {{ $products->links() }}
          </div> 
        </div>
      </div>
    </div>
  </div>

@endsection



