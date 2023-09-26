@extends('layouts.admin')

@section("title")
    <title>Thêm role</title>
@endsection

@section('js')
    <script>
        $('.checkbox_wrapper').on('click',function(){
            $(this).parents('.card').find('.checkbox_children').prop('checked',$(this).prop('checked'));
        });

        // check all
        $('.check_all').on('click',function(){
            $('.checkbox_wrapper, .checkbox_children').prop('checked', $(this).prop('checked'));
        });
    </script>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   @include('partials.content-header',['name' => 'Role', 'key' => 'edit' ])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <form action="{{ route('role.update', ['id' => $role->id]) }}" method="post">
                @csrf
                <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label"> Nhập tên vai trò</label>
                            <input type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    placeholder="Nhập tên danh mục" 
                                    name = "name"
                                    value = {{ old('name') ?? $role->name}}
                            >
                            <p class="font-weight-bold text-danger"> {{ $errors->first('name') }}</p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"> Mô tả vai trò</label>
                            <textarea
                                    class="form-control @error('display_name') is-invalid @enderror" 
                                    placeholder="Mô tả" 
                                    name = "display_name"
                                    rows="4"
                            >{{ old('display_name') ?? $role->display_name }}</textarea>
                            <p class="font-weight-bold text-danger"> {{ $errors->first('display_name') }}</p>
                        </div>
                </div>
                <div class="col-md-12">
                    <input type="checkbox" class="check_all" id="check_all" style="scale: 2">
                    <label for="check_all" class="h3 text-info"> &nbsp; Tất cả quyền</label>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="row">
                        @foreach ($permissionParents as $permissionParent)
                            <div class="card">
                                <h5 class="card-header bg-info">
                                    <input 
                                        type="checkbox"  
                                        class="checkbox_wrapper" 
                                        style="scale: 2"
                                        id="id{{ $permissionParent->id }}"
                                    >
                                    <label for="id{{ $permissionParent->id }}"> 
                                        &nbsp; Module {{ $permissionParent->name }}
                                    </label>
                                </h5>
                                <div class="row">
                                    @foreach ($permissionParent->permissionsChildren as $permissionChildren)
                                        <div class="card-body col-md-3">
                                            <p class="card-text">
                                                <input 
                                                    {{ $permissionsOfRole->contains('id',$permissionChildren->id) ? 'checked' : '' }}
                                                    class="checkbox_children"
                                                    type="checkbox" 
                                                    value="{{ $permissionChildren->id }}" 
                                                    name="permission_id[]"  
                                                    style="scale:1.5"
                                                    id="id{{ $permissionChildren->id }}"
                                                >
                                                <label 
                                                    for="id{{ $permissionChildren->id }}" 
                                                    class="font-weight-normal">
                                                    {{ $permissionChildren->display_name }}
                                                </label>
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Submit</button>
            </form>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection



