@extends('dashboard.layout.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Add Area</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">DashBoard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('areas.index') }}">Areas</a>
                    </li>
                    <li class="breadcrumb-item active">Add Area</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <form class="card-body" id="myForm" method="post" action="{{ route('areas.store') }}" >
                @csrf
                <h4 class="card-title">Add Area</h4>
                
            <div class="col-md-6 mb-4">
                <label>Name: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" name="name" value="" id="">
            </div>
         
                </div>
                <button type="submit" id="submit" class="btn btn-info waves-effect waves-light"
                    style="margin-top:20px">Save</button>
                <a href="{{ route('areas.index') }}" class="btn btn-light waves-effect"
                    style="margin-top:20px">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
