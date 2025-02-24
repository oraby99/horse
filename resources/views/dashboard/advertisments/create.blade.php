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
            <h4 class="mb-sm-0">Add Advertisments</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">DashBoard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Advertisments</a>
                    </li>
                    <li class="breadcrumb-item active">Add Advertisment</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <form class="card-body " id="myForm" method="post" action="{{ route('admin.advertisment.store') }}" enctype="multipart/form-data">
                @csrf
                <h4 class="card-title">Add Advertisments</h4>
                <div class="row mb-3">

                    <div class="col-md-6 mb-4">
                            <label>Name : <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" name="name" required value="{{old('name')}}" id="">
                    </div>
                    @error('name')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror

                <div class="col-md-6 mb-4">
                        <label>Description : <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" required name="description" value="{{old('description')}}" autocomplete="on" id="">
                </div>

                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="">Users <span class="text-danger"></span></label>
                        <select name="user_id"  class="form-control" id="">
                            <option value="" >Select User</option>
                            @foreach ($user as $cat )
                                <option value="{{old('user_id',$cat->id)}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('user_id')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="">country <span class="text-danger"></span></label>
                        <select name="country_id"  class="form-control" id="">
                            <option value="" >Select country</option>
                            @foreach ($country as $cat )
                                <option value="{{old('country_id',$cat->id)}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('country_id')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="">category <span class="text-danger"></span></label>
                        <select name="category_id"  class="form-control" id="">
                            <option value="" >Select category</option>
                            @foreach ($category as $cat )
                                <option value="{{old('category_id',$cat->id)}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="">plan <span class="text-danger"></span></label>
                        <select name="plan_id"  class="form-control" id="">
                            <option value="" >Select plan</option>
                            @foreach ($plan as $cat )
                                <option value="{{old('plan_id',$cat->id)}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('plan_id')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6 mb-4">
                    <label>Price : <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" name="price" value="{{old('price')}}" id="">

                    @error('price')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6 mb-4">
                    <label>location</label>
                    <input type="text"  name="location" value="{{old('location')}}" class="form-control" id="">
                </div>

                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="">advertisement type <span class="text-danger"></span></label>
                        <select name="ads_type"  class="form-control" id="">
                            <option value="" >Select type of advertisement</option>
                            <option value='normal'>{{'normal'}}</option>
                            <option value='special'>{{'special'}}</option>
                            <option value='fixed'>{{'fixed'}}</option>
                        </select>
                    </div>
                    @error('ads_type')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="">type <span class="text-danger"></span></label>
                        <select name="type"  class="form-control" id="">
                            <option value="" >Select type </option>
                            <option value='horse'>{{'horse'}}</option>
                            <option value='service'>{{'service'}}</option>
                        </select>
                    </div>
                    @error('type')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6 mb-4">
                    <label>phone</label>
                    <input type="text"  name="phone" value="{{old('phone')}}" class="form-control" id="">
                </div>

                <div class="col-md-6 mb-4">
                    <label>age</label>
                    <input type="number"  name="age" value="{{old('age')}}" class="form-control" id="">
                </div>

                <div class="col-md-12 mb-4">
                    <div class="from-group">
                        <div class="upload__box">
                            <div class="upload__btn-box">
                                <label for="">Image <span class="text-danger">*</span></label>
                                <input type="file" multiple=""  name="images[]" value="old('images')" data-max_length="20" id="files" class="upload__inputfile form-control">
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

                </div>
                <button type="submit" id="submit" class="btn btn-info waves-effect waves-light"
                    style="margin-top:20px">Save</button>
                <a href="{{ route('admin.advertisment.index') }}" class="btn btn-light waves-effect"
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
        $(".colorpicker-togglepaletteonly").spectrum({
            color: "#333"
        });

    }
   </script>

<script>
    $(".colorpicker-togglepaletteonly").spectrum({
    color: "#333"
});
</script>


@endsection
