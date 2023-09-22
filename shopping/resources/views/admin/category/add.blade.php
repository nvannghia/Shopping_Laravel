@extends('layouts.admin')

@section("title")
    <title>Trang Chủ</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   @include('partials.content-header',['name' => 'category', 'key' => 'Add' ])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('categories.store') }}" method="post">
                  @csrf
                    <div class="mb-3">
                    <label class="form-label">Tên danh mục</label>
                    <input type="text" 
                            class="form-control" 
                            placeholder="Nhập tên danh mục" 
                            name = "name"
                    >
                    </div>
                    <div class="form-group">
                        <label>Chọn danh mục cha</label> <br>
                        <select class="form-control" name ="parent_id" >
                            <option value="0">Chọn danh mục cha</option>
                           {!! $htmlOption !!} {{--{!!  !!} : dùng để in ra string trong select --}}
                        </select>
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



