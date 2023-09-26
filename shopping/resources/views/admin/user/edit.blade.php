@extends('layouts.admin')

@section("title")
    <title>Sửa User</title>
@endsection

@section('css')
  <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
  <style>
    .select2-selection__choice{
      background-color: #6610f2 !important;
    }
  </style>
@endsection

@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script>
      $('.role_select').select2({
        'placeholder' : 'Chọn vai trò',
      });
    </script>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   @include('partials.content-header',['name' => 'User', 'key' => 'edit' ])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('user.update',['id'=>$user->id]) }}" method="post" >
                  @csrf
                    <div class="mb-3">
                        <label class="form-label"> Nhập tên người dùng</label>
                        <input type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                placeholder="Nhập tên người dùng" 
                                name = "name"
                                value = "{{ old('name') ?? $user->name  }}"
                        >
                        <p class="font-weight-bold text-danger"> {{ $errors->first('name') }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"> Nhập email</label>
                        <input type="text" 
                                class="form-control @error('email') is-invalid @enderror" 
                                placeholder="Nhập email" 
                                name = "email"
                                value = {{ old('email') ?? $user->email }}
                        >
                        <p class="font-weight-bold text-danger"> {{ $errors->first('email') }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"> Nhập mật khẩu</label>
                        <input type="text" 
                                class="form-control @error('password') is-invalid @enderror" 
                                placeholder="Nhập mật khẩu" 
                                name = "password"
                        >
                        <p class="font-weight-bold text-danger"> {{ $errors->first('password') }}</p>
                    </div>

                    <div class="mb-3">
                      <label class="form-label"> Chọn vai trò</label>
                      <select class="form-select role_select" name="role_id[]" multiple>
                        @foreach ($roles as $role)
                          <option 
                              value="{{ $role->id }}"  
                              {{ $rolesOfUser->contains('id',$role->id) ? 'selected' : '' }}  >
                              {{ $role->name }}
                          </option>
                        @endforeach
                      </select>
                      <p class="font-weight-bold text-danger"> {{ $errors->first('role_id') }}</p>
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



