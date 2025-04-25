@extends('dashboard.layout.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Add User</h4>
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
            <form class="card-body" id="myForm" method="post" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
                @csrf
                <h4 class="card-title">Add User</h4>
                <div class="row mb-3">

                    <div class="col-md-6 mb-4">
                        <label>Name <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" id="">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col-md-6 mb-4">
                        <label>Email <span class="text-danger">*</span> </label>
                        <input type="email" class="form-control" name="email" value="{{old('email')}}" id="">
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>


                    
                    <div class="col-md-12 mb-4">
                        <label>Phone <span class="text-danger">*</span> </label>
                        <input type="tel" class="form-control" name="phone" value="{{old('phone')}}" id="">
                        @error('phone')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
            
                    <div class="col-md-6 mb-4">
                        <label>password</label>
                        <input type="password" class="form-control" name="password" value="{{old('password')}}" id="">
                        @error('password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                    
                    
                    <div class="col-md-6 mb-4">
                        <label>password Confirmation</label>
                        <input type="password" class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}" id="">
                        @error('password_confirmation')
                        <span class="text-danger">{{$message}}</span>
                         @enderror
                    </div>
                
                    

                    <div class="col-md-12 mb-4">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image" value="{{old('image')}}" id="">
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
