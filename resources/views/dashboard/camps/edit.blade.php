@extends('dashboard.layout.app')
@section('css')
<link rel="stylesheet" href="{{asset('assets/css/multi_image.css')}}">
<link href="{{asset('assets/libs/spectrum-colorpicker2/spectrum.min.css')}}" rel="stylesheet" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/css/multi_image.css')}}">

@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Edit Camps</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">DashBoard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.camp.index') }}">Camps</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Camps</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <form class="card-body " id="myForm" method="post" action="{{ route('admin.camp.update',$data->id) }}" enctype="multipart/form-data">
                @csrf
                <h4 class="card-title">Edit Camp</h4>
                <div class="row mb-3">

                @foreach(config('translatable.locales') as $locale)
                    <div class="col-md-6 mb-4">
                            <label>Name in {{$locale}} : <span class="text-danger">*</span> </label> 
                            <input type="text" class="form-control" name="{{$locale}}[name]"  value="{{$data['name:'.$locale]}}" id="">
                    </div>

                    @error($locale.'[name]')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror

                @endforeach

              
                
        
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="">Categories <span class="text-danger"></span></label>
                        <select name="category_id"  class="form-control" id="">
                            <option value="" >Select Category</option>
                            @foreach ($categories as $cat )
                                <option value="{{old('category_id',$cat->id)}}" {{$data->category_id == $cat->id ? 'selected' : ''}}>{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    @error('category_id')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>  
                
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="">Countries <span class="text-danger"></span></label>
                        <select name="country_id"  class="form-control" id="">
                            <option value="" >Select Category</option>
                            @foreach ($countries as $cat )
                                <option value="{{old('country_id',$cat->id)}}" {{$data->country_id == $cat->id ? 'selected' : ''}}>{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    @error('country_id')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>  

                @foreach(config('translatable.locales') as $locale)
                <div class="col-md-6 mb-4">
                        <label>Description in {{$locale}} : <span class="text-danger">*</span> </label> 
                        <input type="text"  name="{{$locale}}[description]" value="{{$data['description:'.$locale]}}" autocomplete="on" class="input-tags_{{$locale}}" id="">
                </div>
                @endforeach

                <div class="col-md-12 mb-4">
                    <div class="from-group">
                        <div class="upload__box">
                            <div class="upload__btn-box">
                                <label for="">Image <span class="text-danger">*</span></label>
                                <input type="file" multiple=""  name="images[]" value="old('images')" data-max_length="20" id="files" class="upload__inputfile form-control">
                            </div>
                            <div class="content-image mb-4 mt-4">
                                <label for="">Old Images</label>
                                @foreach ($data->images as $image )
                                <img src="{{asset('uploads/camps/'.$image)}}" width="150px" height="150px" alt="">
                               @endforeach
                       
                            </div>
                            <div class="upload__img-wrap"></div>
                          </div>
                    </div>
                </div>

               
                
                <div class="col-md-12 mb-4">
                    <div class="form-group">
                        <label for="">Videos <span class="text-danger"></span></label>
                        <input type="file" name="videos[]" value="{{old('videos')}}"  multiple class="form-control" id="">
                    </div>
                </div>

                <div class="col-md-12 mb-4">
                    <label for="">Number of Levels </label>
                    <input type="number" id="level_number" onchange="contianer()" class="form-control" name="" id="">
                </div>
                <div class="col-md-12">
                    <div class="row" id="container_inputs">
                        @foreach ($data->campLevel as $item )
                        <div class="col-md-3">
                            <div class="mb-3">
                                <input type="text" name="level[]" class="form-control " id="" value="{{$item->level}}" placeholder="Enter Level Name" >
                            </div>
                            <div class="mb-3">
                                <input type="text" name="level_total[]" class="form-control " id="" value="{{$item->total}}" placeholder="Enter Price" >
                            </div>
                        </div>
                        @endforeach   
                    </div>
                  
                </div>

                <div class="col-md-12 mb-4">
                    <label for="">Number of Sports </label>
                    <input type="number" id="sport_number" onchange="sportContianer()" class="form-control" name="" id="">
                </div>
                <div class="col-md-12">
                    <div class="row" id="sport_container_inputs">
                        @foreach ($data->campSport as $item )
                        <div class="col-md-3">
                            <div class="mb-3">
                                <input type="text" name="sport[]" class="form-control" value="{{$item->name}}" id="" placeholder="Enter Level Name" >
                            </div>
                            <div class="mb-3">
                                <input type="text" name="sport_total[]" class="form-control" value="{{$item->total}}" id="" placeholder="Enter Price" >
                            </div>
                        </div>
                        @endforeach   
                    </div>
                  
                </div>
                <!-- end row -->
                </div>
                <button type="submit" id="submit" class="btn btn-info waves-effect waves-light"
                    style="margin-top:20px">Save</button>
                <a href="{{ route('admin.camp.index') }}" class="btn btn-light waves-effect"
                    style="margin-top:20px">Cancel</a>
            </form>
        </div>
    </div> <!-- end col -->
</div>
@endsection
@section('scripts')
<script src="{{asset('assets/js/multi_file.js')}}"></script>
<script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>

<script>
     new TomSelect(".input-tags_en",{
        persist: false,
        createOnBlur: true,
        create: true
        });
    new TomSelect(".input-tags_ar",{
        persist: false,
        createOnBlur: true,
        create: true
        });
    function contianer()
    {
        let inputval = $('#level_number').val();
        html = ''
        for(let i = 0; i<inputval ; i++)
        {
            html += `
            <div class="col-md-3">
                <div class="mb-3">
                    <input type="text" name="level[]" class="form-control " id="" placeholder="Enter Level Name" >
                </div>
                <div class="mb-3">
                    <input type="text" name="level_total[]" class="form-control " id="" placeholder="Enter Price" >
                </div>
            </div>
            `
        }

        $('#container_inputs').html(html);
        

    }

    function sportContianer()
    {
        let inputval = $('#sport_number').val();
        html = ''
        for(let i = 0; i<inputval ; i++)
        {
            html += `
            <div class="col-md-3">
                <div class="mb-3">
                    <input type="text" name="sport[]" class="form-control " id="" placeholder="Enter Level Name" >
                </div>
                <div class="mb-3">
                    <input type="text" name="sport_total[]" class="form-control " id="" placeholder="Enter Price" >
                </div>
            </div>
            `
        }

        $('#sport_container_inputs').html(html);
        

    }
</script>
@endsection