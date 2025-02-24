@extends('dashboard.layout.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Add Admins</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">DashBoard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.admin.index') }}">Admins</a>
                    </li>
                    <li class="breadcrumb-item active">Add Admins</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <form class="card-body" id="myForm" method="post" action="{{ route('admin.admin.store') }}" >
                @csrf
                <h4 class="card-title">Add Admins</h4>
                <div class="row mb-3">

            <div class="col-md-6 mb-4">
                <label>Name: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" name="name" value="" id="">
            </div>
            <div class="col-md-6 mb-4">
                <label>Email : <span class="text-danger">*</span> </label>
                <input type="email" class="form-control" name="email" value="" id="">
           </div>

           <div class="col-md-6 mb-4">
            <label>Phone: <span class="text-danger">*</span> </label>
            <input type="text" class="form-control" name="phone" value="" id="">
        </div>
        <div class="col-md-6 mb-4">
            <label>Password : <span class="text-danger">*</span> </label>
            <input type="password" class="form-control" name="password" value="" id="">
       </div>
                </div>
                <button type="submit" id="submit" class="btn btn-info waves-effect waves-light"
                    style="margin-top:20px">Save</button>
                <a href="{{ route('admin.admin.index') }}" class="btn btn-light waves-effect"
                    style="margin-top:20px">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
