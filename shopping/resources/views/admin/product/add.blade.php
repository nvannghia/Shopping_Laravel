@extends('layouts.admin')

@section("title")
    <title>Add product</title>
@endsection

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   @include('partials.content-header',['name' => 'product', 'key' => 'Add' ])
    <!-- /.content-header -->

    <!-- Main content -->
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
      @csrf
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                    <div class="mb-3">
                    <label class="form-label">Tên sản phẩm</label>
                    <input type="text" 
                            class="form-control @error('name') is-invalid @enderror" 
                            placeholder="Nhập tên sản phẩm" 
                            name = "name"
                            value= "{{ old('name') }}" 
                    >
                    <p class="text-danger font-weight-bold">{{ $errors->first('name') }}</p>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Giá sản phẩm</label>
                      <input type="text" 
                              class="form-control @error('price') is-invalid @enderror" 
                              placeholder="Nhập giá sản phẩm" 
                              name = "price"
                              value= "{{ old('price') }}"
                      >
                      <p class="text-danger font-weight-bold">{{ $errors->first('price') }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"> Ảnh đại diện </label>
                        <input type="file" 
                                class="form-control-file" 
                                placeholder="Nhập hình sản phẩm" 
                                name = "feature_image_path"
                        >
                    </div>

                    <div class="mb-3">
                        <label class="form-label"> Ảnh chi tiết </label>
                        <input type="file" 
                                multiple
                                class="form-control-file" 
                                placeholder="Nhập hình sản phẩm" 
                                name = "image_path[]"
                        >
                    </div>
                    

                    <div class="form-group">
                        <label>Chọn danh mục</label> <br>
                        <select class="form-control category_select_choose @error('category_id') is-invalid @enderror" 
                                name ="category_id" 
                        >
                          <option value="" disabled selected hidden>Chọn danh mục</option>
                           {!! $htmlOption !!} {{--{!!  !!} : dùng để in ra string trong select --}}
                        </select>
                        <p class="text-danger font-weight-bold">{{ $errors->first('category_id') }}</p>
                    </div>

                    <div class="form-group">
                      <label> Chọn tag cho sản phẩm</label>
                      <select name ="tags[]" class="form-control tags_select_choose"  multiple="multiple">

                      </select>
                    </div>  
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Nhập nội dung</label>
                <textarea  class="form-control tinymce @error('content') is-invalid @enderror" 
                  rows="10" 
                  name="content" 
                  >
                  {{ old('content') }}
                </textarea>
                <p class="text-danger font-weight-bold">{{ $errors->first('content') }}</p>
              </div>
            </div>

            <div class="col-md-12 mb-2">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  </form>
    <!-- /.content -->
  </div>
  
@endsection

@section('js')
  <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
  <script src="https://cdn.tiny.cloud/1/eet0uhh6j3ah9cvb86hjjrs0xiqrob5oqci87t8dtotxfwqj/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> {{--  tinymce 5 --}}
  <script src="{{ asset('admins/product/add/add.js') }}"></script>
@endsection


