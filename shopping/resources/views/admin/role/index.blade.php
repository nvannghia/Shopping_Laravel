@extends('layouts.admin')

@section("title")
    <title>Trang Chủ - Role</title>
@endsection
@section("css")
<link rel="stylesheet" href="">
@endsection
@section('js')
  <script src="{{ asset("vendors/sweetAlert2/cdn.jsdelivr.net_npm_sweetalert2@11") }}"></script>
   <script src="{{ asset('admins/main.js') }}"></script>
@endsection
@section('content')
  <div class="content-wrapper">
    @include('partials.content-header',['name'=>'Role', 'key'=>'list'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('role.create') }}" class="btn btn-primary float-right m-2">Add new Role</a>
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Vai trò</th>
                  <th scope="col">Mô tả vai trò</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($roles as $role)
                  <tr>
                    <th scope="row"> {{ $role->id }} </th>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->display_name }}</td>
                    <td>
                      <div class="d-flex">
                        <a href="{{ route('role.edit', ['id' => $role->id ]) }}" class="btn btn-info mr-3">Edit</a>
                        <a 
                          href=""
                          data-url="{{ route('role.delete',['id' => $role->id]) }}"
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
            {{ $roles->links() }}
          </div> 
        </div>
      </div>
    </div>
    
  </div>
@endsection



