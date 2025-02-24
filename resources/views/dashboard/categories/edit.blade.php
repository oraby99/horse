@extends('dashboard.layout.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Edit Category</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">DashBoard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Category</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Category</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <form class="card-body" id="myForm" method="post" action="{{ route('admin.category.update',$data->id) }}" enctype="multipart/form-data">
                @csrf
                <h4 class="card-title">Edit Category</h4>
                <div class="row mb-3">

                @foreach(config('translatable.locales') as $locale)
                    <div class="col-md-6 mb-4">
                            <label>Name in {{$locale}} : <span class="text-danger">*</span> </label> 
                            <input type="text" class="form-control" name="{{$locale}}[name]" value="{{$data['name:'.$locale]}}" id="">
                        </div>

                @endforeach

                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="">Parent <span class="text-danger"></span></label>
                        <select name="parent_id" class="form-control" id="">
                            <option value="" >Select Category</option>
                            @foreach ($categories as $cat )
                                <option value="{{$cat->id}}" {{$data->parent_id == $cat->id ? 'selected' : ''}}>{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>    

                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="">Type <span class="text-danger"></span></label>
                        <select name="type" class="form-control" id="">
                            <option value="" >Select Type</option>
                            @foreach (config('category.type') as $type )
                                <option value="{{$type}}" {{$data->type == $type ? 'selected' : ''}}>{{$type}}</option>                            
                            @endforeach
                        </select>
                    </div>
                </div>    
                
                <div class="col-md-12 mb-4">
                    <div class="">
                        <div class="checkbox checkbox-primary mb-2">
                            <input id="has_child" type="checkbox"
                            {{$data->has_child == true ? 'checked' : ''}}
                                value="1" name="has_child" class="form-check-input" >
                            <label for="has_child">Is This Category Have Sub Category ?</label>
                        </div>
                    </div>
                </div> <!-- end col-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Image <span class="text-danger">*</span></label>
                        <input type="file" name="image"  class="form-control" id="">
                    </div>
                </div>
                <!-- end row -->
                </div>
                <button type="submit" id="submit" class="btn btn-info waves-effect waves-light"
                    style="margin-top:20px">Save</button>
                <a href="{{ route('admin.country.index') }}" class="btn btn-light waves-effect"
                    style="margin-top:20px">Cancel</a>
            </form>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->

@endsection
