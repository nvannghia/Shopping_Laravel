@extends('layouts.admin')

@section("title")
    <title>Trang Chủ - Menu</title>
@endsection

@section('content')
  <div class="content-wrapper">
    @include('partials.content-header',['name'=>'Menu', 'key'=>'list'])
    
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('menus.create') }}" class="btn btn-primary float-right m-2">Add new menu</a>
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tên menu</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($menus as $menu)
                <tr>
                  <th scope="row"> {{ $menu->id }} </th>
                  <td>{{ $menu->name }}</td>
                  <td>
                    <div class="d-flex">
                      <a href="{{ route('menus.edit',['id'=> $menu->id]) }}" class="btn btn-info mr-3">Edit</a>
                      <a 
                        href="{{ route('menus.delete',['id'=>$menu->id]) }}"  
                        class="btn btn-danger" 
                        onclick="return confirm('Việc xóa này CÓ THỂ xóa cả các danh mục con, Bạn chắc chứ?')">
                        Delete
                      </a>
                    </div>
                  </td>
                @endforeach

                </tr>
                
              </tbody>
            </table>
          </div>
          <div class="col-md-12">
            {{ $menus->links() }}
          </div> 
        </div>
      </div>
    </div>
    
  </div>
@endsection



