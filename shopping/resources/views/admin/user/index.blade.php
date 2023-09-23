@extends('layouts.admin')

@section("title")
    <title>Trang Chủ - User</title>
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
    @include('partials.content-header',['name'=>'User', 'key'=>'list'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('user.create') }}" class="btn btn-primary float-right m-2">Add new user</a>
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr>
                    <th scope="row"> {{ $user->id }} </th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                      <div class="d-flex">
                        <a href="" class="btn btn-info mr-3">Edit</a>
                        <a 
                          href=""
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
            {{ $users->links() }}
          </div> 
        </div>
      </div>
    </div>
    
  </div>
@endsection



