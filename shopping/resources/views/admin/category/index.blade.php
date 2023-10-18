@extends('layouts.admin')

@section("title")
    <title>Trang Chủ - Category</title>
@endsection

@section('content')
  <div class="content-wrapper">
    @include('partials.content-header',['name'=>'category', 'key'=>'list'])
   
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('categories.create') }}" class="btn btn-primary float-right m-2">Add New Category</a>
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category)
                <tr>
                  <th scope="row"> {{ $category->id }} </th>
                  <td>{{ $category->name }}</td>
                  <td>
                    <div class="d-flex">
                      <a href="{{ route('categories.edit',['id'=>$category->id]) }}" class="btn btn-info mr-3">Edit</a>
                      <form action="{{ route('categories.delete',['id'=>$category->id]) }}" method="post">
                        @csrf
                        <button onclick="return confirm('Xóa thiệt hả?')" class ="btn btn-danger">Delete</button>
                      </form>
                    </div>
                  </td>
                @endforeach

                </tr>
                
              </tbody>
            </table>
          </div>
          <div class="col-md-12 d-flex justify-content-center mt-3">
            {{ $categories->links() }}
          </div> 
        </div>
      </div>
    </div>
    
  </div>
@endsection



