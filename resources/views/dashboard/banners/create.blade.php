@extends('dashboard.layout.app')
@section('css')
<link rel="stylesheet" href="{{asset('assets/css/multi_image.css')}}">
<link href="{{asset('assets/libs/spectrum-colorpicker2/spectrum.min.css')}}" rel="stylesheet" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Add Banners</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">DashBoard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.banner.index') }}">Banners</a>
                    </li>
                    <li class="breadcrumb-item active">Add Banners</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <form class="card-body" id="myForm" method="post" action="{{ route('admin.banner.store') }}" enctype="multipart/form-data">
                @csrf
                <h4 class="card-title">Add Banners</h4>
                <div class="row mb-3">                
                    <div class="col-md-12 mb-4">
                        <div class="from-group">
                            <div class="upload__box">
                                <div class="upload__btn-box">
                                    <label for="">Image <span class="text-danger">*</span></label>
                                    <input type="file" multiple="" required name="images[]" value="old('images')" data-max_length="20" id="files" class="upload__inputfile form-control">
                                </div>
                                <div class="upload__img-wrap"></div>
                              </div>
                        </div>
                    </div>
    
                
                        
                <!-- end row -->
                </div>
                <button type="submit" id="submit" class="btn btn-info waves-effect waves-light"
                    style="margin-top:20px">Save</button>
                <a href="{{ route('admin.banner.index') }}" class="btn btn-light waves-effect"
                    style="margin-top:20px">Cancel</a>
            </form>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->

@endsection
@section('scripts')
<script src="{{asset('assets/js/multi_file.js')}}"></script>

@endsection
