@extends('dashboard.layout.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Add Plan</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">DashBoard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.plan.index') }}">Plan</a>
                    </li>
                    <li class="breadcrumb-item active">Add Plan</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <form class="card-body" id="myForm" method="post" action="{{ route('admin.plan.store') }}" >
                @csrf
                <h4 class="card-title">Add Plan</h4>
                <div class="row mb-3">

                @foreach(config('translatable.locales') as $locale)
                    <div class="col-md-6 mb-4">
                            <label>Name in {{$locale}} : <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" name="{{$locale}}[name]" value="" id="">
                        </div>
                @endforeach
                @foreach(config('translatable.locales') as $locale)
                <div class="col-md-6 mb-4">
                        <label>Description in {{$locale}} : <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" name="{{$locale}}[description]" value="" id="">
                </div>
            @endforeach
            <div class="col-md-6 mb-4">
                <label>Time: <span class="text-danger">*</span> </label>
                <input type="number" class="form-control" name="time" value="" id="">
            </div>
            <div class="col-md-6 mb-4">
                <label>Price : <span class="text-danger">*</span> </label>
                <input type="number" class="form-control" name="price" value="" id="">
           </div>
                </div>
                <button type="submit" id="submit" class="btn btn-info waves-effect waves-light"
                    style="margin-top:20px">Save</button>
                <a href="{{ route('admin.plan.index') }}" class="btn btn-light waves-effect"
                    style="margin-top:20px">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
