@extends('layouts.admin')

@section("title")
    <title>Edit</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'category', 'key'=>'edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('categories.create') }}" class="btn btn-primary float-right m-2">Add New Category</a>
          </div>
          <div class="col-md-6">
            <form action="{{ route('categories.update',['id'=>$data->id]) }}" method="get">
                @csrf
                <label> Tên danh mục:</label>
                    <input type="text"
                           class="form-control" 
                           name="name" 
                           value="{{ $data->name }}"
                    >

                  <div class="form-group">
                    <label>Chọn danh mục cha</label> <br>
                        <select class="form-control" name ="parent_id" >
                            <option value="0">Chọn danh mục cha</option>
                            {!! $htmlOption !!}
                        </select>
                  </div>
                <button class="btn btn-primary mt-3">Sửa</button>
            </form>
          </div>
        
        
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection



