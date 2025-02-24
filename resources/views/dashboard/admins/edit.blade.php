@extends('dashboard.layout.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Edit Admin</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">DashBoard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.admin.index') }}">Admin</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Admin</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <form class="card-body" id="myForm" method="post" action="{{ route('admin.admin.update',$data->id) }}" enctype="multipart/form-data">
                @csrf
                <h4 class="card-title">Edit Admin</h4>
                <div class="row mb-3">

                    <div class="col-md-6 mb-4">
                        <label>Name: <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" name="name" value="{{$data['name']}}" id="">
                    </div>
                    <div class="col-md-6 mb-4">
                        <label>Email : <span class="text-danger">*</span> </label>
                        <input type="email" class="form-control" name="email" value="{{$data['email']}}" id="">
                   </div>

                   <div class="col-md-6 mb-4">
                    <label>Phone: <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" name="phone" value="{{$data['phone']}}" id="">
                </div>
                <div class="col-md-6 mb-4">
                    <label>Password : <span class="text-danger">*</span> </label>
                    <input type="password" class="form-control" name="password" value="" id="">
               </div>

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
