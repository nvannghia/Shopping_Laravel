@extends('layouts.admin')

@section("title")
    <title>Trang Chủ - Slider</title>
@endsection
@section("css")
<link rel="stylesheet" href="{{ asset('admins/slider/index/index.css') }}">
@endsection
@section('js')
    <script src="{{ asset("vendors/sweetAlert2/cdn.jsdelivr.net_npm_sweetalert2@11") }}"></script>
    <script src="{{ asset('admins/main.js') }}"></script>
@endsection
@section('content')
  <div class="content-wrapper">
    @include('partials.content-header',['name'=>'Slider', 'key'=>'list'])
    
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('slider.create') }}" class="btn btn-primary float-right m-2">Add new slider</a>
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tên slider</th>
                  <th scope="col">Mô tả</th>
                  <th scope="col">Hình ảnh</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sliders as $slider)
                  <tr>
                    <th scope="row"> {{ $slider->id }} </th>
                    <td>{{ $slider->name }}</td>
                    <td>{{ $slider->description }}</td>
                    <td>
                      <img src="{{ asset($slider->image_path) }}" 
                        alt="{{ $slider->image_name }}"
                        class="slider_img_150_100"
                      >
                    </td>
                    <td>
                      <div class="d-flex">
                        <a href="{{ route('slider.edit',['id' => $slider->id]) }}" class="btn btn-info mr-3">Edit</a>
                        <a 
                          href=""
                          data-url = "{{ route('slider.delete',['id' => $slider->id ]) }}"
                          class="btn btn-danger action_delete" 
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
            {{ $sliders->links() }}
          </div> 
        </div>
      </div>
    </div>
    
  </div>
@endsection



