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
            <h4 class="mb-sm-0">Edit Products</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">DashBoard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Products</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Products</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <form class="card-body " id="myForm" method="post" action="{{ route('admin.product.update',$data->id) }}" enctype="multipart/form-data">
                @csrf
                <h4 class="card-title">Edit Products</h4>
                <div class="row mb-3">

                @foreach(config('translatable.locales') as $locale)
                    <div class="col-md-6 mb-4">
                            <label>Name in {{$locale}} : <span class="text-danger">*</span> </label> 
                            <input type="text" class="form-control" name="{{$locale}}[name]" required value="{{$data['name:'.$locale]}}" id="">
                    </div>

                    @error($locale.'[name]')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror

                @endforeach

                <div class="col-md-12 mb-4">
                    <label>Price : <span class="text-danger">*</span> </label> 
                    <input type="text" class="form-control" name="price" value="{{$data->price}}" id="">
                    
                    @error('price')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>

                
        
                <div class="col-md-12 mb-4">
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

                @foreach(config('translatable.locales') as $locale)
                <div class="col-md-6 mb-4">
                        <label>Description in {{$locale}} : <span class="text-danger">*</span> </label> 
                        <input type="text" required name="{{$locale}}[description]" value="{{$data['description:'.$locale]}}" autocomplete="on" class="input-tags_{{$locale}}" id="">
                </div>
                @endforeach

                <div class="col-md-6 mb-4">
                    <label>Sizes</label> 
                    <input type="text" required name="size" value="{{$data->size}}" autocomplete="on" class="input-tags_size" id="">
                </div>


                
                
                <div class="col-md-6 mb-4">
                    <label>Deliver Days</label> 
                    <input type="number" required name="deliver_time" value="{{$data->deliver_time}}" class="form-control" id="">
                </div>

                
                <div class="col-md-6 mb-4">
                    <label>Stock</label> 
                    <input type="number" required name="stock" value="{{old('stock',$data->stock)}}" class="form-control" id="">
                </div>

                <div class="col-md-6 mb-4">
                    <label>Security Stock</label> 
                    <input type="number" required name="security_stock" value="{{old('security_stock',$data->security_stock)}}" class="form-control" id="">
                </div>

                

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
                                <img src="{{asset('uploads/products/'.$image)}}" width="150px" height="150px" alt="">
                               @endforeach
                       
                            </div>
                            <div class="upload__img-wrap">
                            </div>

                          </div>
                    </div>
                </div>

               
                
                <div class="col-md-12 mb-4">
                    <div class="form-group">
                        <label for="">Videos <span class="text-danger"></span></label>
                        <input type="file" name="videos[]" value="{{old('videos')}}"  multiple class="form-control" id="">
                    </div>
                </div>

                @if (!empty($data->videos))
                <div class="col-md-12 mb-4">
                    <div class="form-group">
                        <div class="content-image mb-4 mt-4">
                            <label for="">Video</label>
    
                            @foreach ($data->videos as $image)
                            <video width="320" height="240" autoplay muted>
                                <source src="{{asset('uploads/videos/'.$image)}}" type="video/mp4">
                            </video>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

                <div class="col-md-12 mb-4">
                    <label for="">Number of Colors If Need </label>
                    <input type="number" id="color_number" onchange="contianer()" class="form-control" name="" id="">
                </div>
                <div class="col-md-12">
                    <div class="row" id="container_inputs">
                        @foreach ($data->colors as $color )
                        <div class="col-md-3">
                            <div class="mb-3">
                                <input type="text" name="colors[]" class="form-control colorpicker-togglepaletteonly" id="" value="{{$color}}">
                            </div>
                        </div>
                        @endforeach   
                    </div>
                    
                  
                </div>

                <!-- end row -->
                </div>
                <button type="submit" id="submit" class="btn btn-info waves-effect waves-light"
                    style="margin-top:20px">Save</button>
                <a href="{{ route('admin.product.index') }}" class="btn btn-light waves-effect"
                    style="margin-top:20px">Cancel</a>
            </form>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->

@endsection
@section('scripts')
<script src="{{asset('assets/js/multi_file.js')}}"></script>
<script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>
<script src="{{asset('assets/libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>
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

    new TomSelect(".input-tags_size",{
    persist: false,
    createOnBlur: true,
    create: true
    });
</script>

<script>
    function contianer()
    {
        let inputval = $('#color_number').val();
        html = ''
        for(let i = 0; i<inputval ; i++)
        {
            html += `
            <div class="col-md-3">
                <div class="mb-3">
                    <input type="text" name="colors[]" class="form-control colorpicker-togglepaletteonly" id="" value="#50a5f1">
                </div>
            </div>
            `
        }

        $('#container_inputs').html(html);
        $(".colorpicker-togglepaletteonly").spectrum();

    }
   </script>

<script>
    $(".colorpicker-togglepaletteonly").spectrum();
</script>


@endsection