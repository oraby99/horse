@extends('dashboard.layout.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Edit Country</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">DashBoard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.country.index') }}">Country</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Country</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <form class="card-body" id="myForm" method="post" action="{{ route('admin.country.update',$data->id) }}" enctype="multipart/form-data">
                @csrf
                <h4 class="card-title">Edit Country</h4>
                <div class="row mb-3">

                @foreach(config('translatable.locales') as $locale)
                    <div class="col-md-6">
                            <label>Name in {{$locale}} : <span class="text-danger">*</span> </label> 
                            <input type="text" class="form-control" name="{{$locale}}[name]" value="{{$data['name:'.$locale]}}" id="">
                        </div>

                @endforeach

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Sign <span class="text-danger">*</span></label>
                        <input type="text" name="sign" value="{{$data->sign}}" class="form-control" name="sign" id="">
                    </div>
                </div>


                
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Logo <span class="text-danger">*</span></label>
                        <input type="file" name="logo"  class="form-control" id="">
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
