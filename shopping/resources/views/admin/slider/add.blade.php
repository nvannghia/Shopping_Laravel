@extends('layouts.admin')

@section("title")
    <title>Thêm slider</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   @include('partials.content-header',['name' => 'Slider', 'key' => 'add' ])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('slider.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="mb-3">
                        <label class="form-label"> Nhập tên slider</label>
                        <input type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                placeholder="Nhập tên danh mục" 
                                name = "name"
                                value = {{ old('name') }}
                        >
                        <p class="font-weight-bold text-danger"> {{ $errors->first('name') }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"> Nhập mô tả</label>
                        <textarea
                                class="form-control @error('description') is-invalid @enderror" 
                                placeholder="Mô tả" 
                                name = "description"
                                rows="4"
                        >{{ old('description') }}</textarea>
                        <p class="font-weight-bold text-danger"> {{ $errors->first('description') }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Chọn ảnh làm slider</label>
                        <input type="file" 
                                class="form-control @error('image') is-invalid @enderror" 
                                name = "image"
                        >
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection



