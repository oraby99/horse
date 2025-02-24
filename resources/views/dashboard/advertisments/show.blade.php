@extends('dashboard.layout.app')
@section('content')
@section('css')
<link rel="stylesheet" href="{{asset('assets/css/multi_image.css')}}">
<link href="{{asset('assets/libs/spectrum-colorpicker2/spectrum.min.css')}}" rel="stylesheet" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
@endsection
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Show Advertisment</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">DashBoard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.advertisment.index') }}">Advertisment</a>
                    </li>
                    <li class="breadcrumb-item active">Show Advertisment</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <form class="card-body " id="myForm" method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                @csrf
                <h4 class="card-title">Show Advertisment</h4>
                <div class="row mb-3">

                    <div class="col-md-12 mb-4">
                            <label>Name : <span class="text-danger">*</span> </label>
                            <input type="text" disabled class="form-control" name="name" required value="{{$data->name}}" id="">
                    </div>

                    @error('name')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror


                <div class="col-md-12 mb-4">
                    <label>Price : <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" name="price" disabled value="{{$data->price}}" id="">

                    @error('price')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>



                <div class="col-md-12 mb-4">
                    <div class="form-group">
                        <label for="">Categories <span class="text-danger"></span></label>
                        <input type="text" class="form-control" disabled value="{{$data->category->name}}" name="" id="">
                </div>


                <div class="col-md-12 mb-4">
                    <div class="form-group">
                        <label for="">Type <span class="text-danger"></span></label>
                        <input type="text" class="form-control" disabled value="{{$data->type}}" name="" id="">
                </div>


                <div class="col-md-12 mb-4">
                    <div class="form-group">
                        <label for="">Advertisment Type <span class="text-danger"></span></label>
                        <input type="text" class="form-control" disabled value="{{$data->ads_type}}" name="" id="">
                </div>

                <div class="col-md-12 mb-4">
                    <div class="form-group">
                        <label for="">Plan <span class="text-danger"></span></label>
                        <input type="text" class="form-control" disabled value="{{$data->plan->name}}" name="" id="">
                     </div>

                    @error('category_id')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="row">
                    {{-- @foreach(config('translatable.locales') as $locale) --}}
                    <div class="col-md-12 mb-4">
                            <label>Description : <span class="text-danger">*</span> </label>
                            <textarea name="description" class="form-control" id="" cols="30" rows="10">{{$data->description}}</textarea>
                    </div>
                {{-- @endforeach --}}

                </div>

                <div class="col-md-6 mb-4">
                    <label>Location : <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" disabled value="{{$data->location}}" name="" id="">
                </div>

                @if ($data->type == 'horse')
                <div class="col-md-6 mb-4">
                    <label> Age : <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" disabled value="{{$data->age}}" name="" id="">
                </div>

                @endif
                @if (!empty($data->images))
                <div class="col-md-12 mb-4">
                    <div class="form-group">
                        <div class="content-image mb-4 mt-4">
                            <label for="">Images</label>

                            @foreach ($data->images as $image)
                                <img src="{{ asset('uploads/advertisments/'.$image) }}" width="150px" height="150px" alt="">
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif


            @if (!empty($data->videos))
            <div class="col-md-12 mb-4">
                <div class="form-group">
                    <div class="content-image mb-4 mt-4">
                        <label for="">Video</label>

                        @foreach ($data->videos as $image)
                        <video width="320" height="240" autoplay muted>
                            <source src="{{asset('uploads/vidoes/'.$image)}}" type="video/mp4">
                          </video>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif


                {{-- <div class="col-md-12 mb-4">
                    <div class="form-group">
                        <label for="">Videos <span class="text-danger"></span></label>
                        <input type="file" name="videos[]" value="{{old('videos')}}"  multiple class="form-control" id="">
                    </div>
                </div> --}}




                <!-- end row -->
                </div>
                <a href="{{ route('admin.advertisment.index') }}" class="btn btn-light waves-effect"
                    style="margin-top:20px">Back</a>
            </form>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->

@endsection
@section('scripts')


@endsection
