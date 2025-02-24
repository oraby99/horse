@extends('dashboard.layout.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Edit User</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">DashBoard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">User</a>
                    </li>
                    <li class="breadcrumb-item active">Edit User</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <form class="card-body" id="myForm" method="post" action="{{ route('admin.user.update',$data->id) }}" enctype="multipart/form-data">
                @csrf
                <h4 class="card-title">Edit User</h4>
                <div class="row mb-3">

                    <div class="col-md-6 mb-4">
                        <label>Name <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" name="name" value="{{old('name',$data->name)}}" id="">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col-md-6 mb-4">
                        <label>Email <span class="text-danger">*</span> </label>
                        <input type="email" class="form-control" name="email" value="{{old('email',$data->email)}}" id="">
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>


                    
                    <div class="col-md-6 mb-4">
                        <label>Phone <span class="text-danger">*</span> </label>
                        <input type="tel" class="form-control" name="phone" value="{{old('phone',$data->phone)}}" id="">
                        @error('phone')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    
                    <div class="col-md-6 mb-4">
                        <label>link</label>
                        <input type="url" class="form-control" name="link" value="{{old('link',$data->link)}}" id="">
                        @error('link')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col-md-12 mb-4">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image" value="{{old('image',$data->image)}}" id="">
                        @error('image')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                </div>
                <button type="submit" id="submit" class="btn btn-info waves-effect waves-light"
                    style="margin-top:20px">Save</button>
                <a href="{{ route('admin.user.index') }}" class="btn btn-light waves-effect"
                    style="margin-top:20px">Cancel</a>
            </form>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->

@endsection
