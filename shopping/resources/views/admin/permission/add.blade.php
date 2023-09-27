@extends('layouts.admin')

@section("title")
    <title>Tạo Permission</title>
@endsection

@section('js')
    <script>
        $('.check_all').on('click',function(){
            $('.module_children').prop('checked', $(this).prop('checked'));
        });
    </script>
@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   @include('partials.content-header',['name' => 'Permission', 'key' => 'add' ])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12"> 

                @if (session('successMsg'))
                    <div class="alert alert-success">{{ session('successMsg') }}</div>
                @endif

                <form action="{{ route('permission.store') }}" method="post">
                  @csrf
                    <div class="form-group">
                        <label>Chọn phân quyền cha</label> <br>
                        <select class="form-control" name="module_parent" >
                            <option selected="true" disabled="disabled">Chọn tên module</option>
                            @foreach (config('permissions.table_module') as $table_name)
                                <option value="{{ $table_name }}">{{ $table_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div>
                            <input type="checkbox" class="check_all" name="check_all" id="check_all" style="scale: 1.8">
                            <label for="check_all" class="h3"> 	&nbsp; Check all</label>
                            <hr>
                        </div>
                        
                        <div class="row">
                            @foreach (config('permissions.module_children') as $module_item)
                                <div class="col-md-3">
                                    <input 
                                        class="module_children"
                                        style="scale: 1.4" 
                                        type="checkbox" 
                                        value="{{ $module_item }}"
                                        name="module_children[]"
                                    >
                                    <label class="font-weight-normal" for="">{{ $module_item }}</label>
                                </div>
                            @endforeach
                        </div>
                        
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



