@extends('layouts.admin')

@section("title")
    <title>Sửa Setting</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   @include('partials.content-header',['name' => 'Setting', 'key' => 'edit' ])
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('setting.update',['id'=>$setting->id]) }}" method="post">
                  @csrf
                    <div class="mb-3">
                        <label class="form-label"> Config Key</label>
                        <input type="text" 
                                class="form-control @error('config_key') is-invalid @enderror" 
                                placeholder="Key" 
                                name = "config_key"
                                value = {{ old('name') ?? $setting->config_key }}
                        >
                        <p class="font-weight-bold text-danger"> {{ $errors->first('config_key') }}</p>
                    </div>
                    <div class="mb-3">
                      <label class="form-label"> Config Value</label>
                        @if (request()->has('type') && request()->type === 'text')
                              <input type="text" 
                                    class="form-control @error('config_value') is-invalid @enderror" 
                                    placeholder="Value" 
                                    name = "config_value"
                                    value = {{ old('name') ?? $setting->config_value}}
                              >
                        @elseif(request()->type === 'textarea')
                              <textarea 
                                    class="form-control @error('config_value') is-invalid @enderror" 
                                    placeholder="Value" 
                                    name = "config_value"
                                    rows="5"
                              >{{ old('name') ?? $setting->config_value}}</textarea>
                        @endif
                        <p class="font-weight-bold text-danger"> {{ $errors->first('config_value') }}</p>
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



