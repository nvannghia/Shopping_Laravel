@extends('layouts.admin')

@section("title")
    <title>Edit</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'Menu', 'key'=>'edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('menus.create') }}" class="btn btn-primary float-right m-2">Add New Menu</a>
          </div>
          <div class="col-md-6">
            <form action="{{ route('menus.update',['id'=>$menu->id]) }}" method="post">
                @csrf
                <label> Tên menu:</label>
                    <input type="text"
                           class="form-control" 
                           name="name" 
                           value="{{ $menu->name }}"
                    >

                  <div class="form-group">
                    <label>Chọn menu cha</label> <br>
                        <select class="form-control" name ="parent_id" >
                            <option value="0">Chọn menu cha</option>
                            {!! $optionSelect !!}
                        </select>
                  </div>
                <button class="btn btn-primary mt-3">Submit</button>
            </form>
          </div>
        
        
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection



