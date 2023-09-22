@extends('layouts.admin')

@section("title")
    <title>Trang Chủ - Setting</title>
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
    @include('partials.content-header',['name'=>'Setting', 'key'=>'list'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="dropdown ">
              <button class="btn btn-primary mb-2 float-right dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Add new setting
              </button>
              <ul class="dropdown-menu bg-info" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{ route('setting.create'). '?type=text' }}">Text</a></li>
                <li><a class="dropdown-item" href="{{ route('setting.create'). '?type=textarea' }}">TextArea</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Config Key</th>
                  <th scope="col">Config Value</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($settings as $setting)
                  <tr>
                    <th scope="row"> {{ $setting->id }} </th>
                    <td>{{ $setting->config_key }}</td>
                    <td>{{ $setting->config_value }}</td>
                    <td>
                      <div class="d-flex">
                        <a href="{{ route('setting.edit',['id'=>$setting->id]).'?type='. $setting->type }}" class="btn btn-info mr-3">Edit</a>
                        <a 
                          href=""
                          data-url = "{{ route('setting.delete',['id'=>$setting->id]) }}"
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
            {{ $settings->links() }}
          </div> 
        </div>
      </div>
    </div>
    
  </div>
@endsection



