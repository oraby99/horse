@extends('layout.app')
@section('body_class','rtcl_listing-template-default single single-rtcl_listing postid-2068 wp-custom-logo rtcl rtcl-page rtcl-single-no-sidebar rtcl-no-js ehf-header ehf-footer ehf-template-classima ehf-stylesheet-classima header-style-2 footer-style-1 banner-enabled has-sidebar right-sidebar elementor-default elementor-kit-2161')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.3/viewer.min.css" integrity="sha512-zdX1vpRJc7+VHCUJcExqoI7yuYbSFAbSWxscAoLF0KoUPvMSAK09BaOZ47UFdP4ABSXpevKfcD0MTVxvh0jLHQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .rtcl img.rtcl-thumbnail{
        max-height:350px ;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <br><h3>{{$product->name}}</h3>
            <img src="{{ asset('uploads/products/' . $product->images[0]) }}" class="card-img-top" alt="...">
        </div>
        <div class="col-lg-6">
            <h3 style="margin-top: 100px">{{$product->price}}</h3>
            <p>{{$product->description}}</p><br><br><br>
            <form action="{{ route('addToCart', $product) }}" method="post">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="price" value="{{ $product->price }}">
                @csrf
                @method('POST')

                <select required name="size" id="" class="form-control mb-4">
                    @php
                        $sizes = explode(',', $product->size);
                    @endphp
                    <option value="">select size</option>
                    @foreach ($sizes as $si)
                        <option value="{{ $si }}">{{ $si }}</option>
                    @endforeach
                </select>

                <select required name="color" id="" class="form-control mb-4 multiple">
                    @php
                        $colors =  $product->colors;
                    @endphp
                    <option value="">select color</option>
                    @foreach ($colors as $color)
                        <option value="{{ $color }}">{{ $color }}</option>
                    @endforeach
                </select>

                <input class="form-control" type="number" name="qantity" value="1" min="1">

                <button type="submit" class="CartBtn w-100">
                    <p style="margin-top: 10px" class="text">Add to Cart</p>
                    <span class="IconContainer">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" fill="rgb(17, 17, 17)" class="cart"><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"></path></svg>
                    </span>
                </button>
            </form>

        </div>
    </div>
</div>

@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.1/viewer.min.js"></script>
<script>
     $(document).ready(function() {
        const imageElements = document.querySelectorAll('.image-viewer');
        imageElements.forEach((element) => {
            new Viewer(element);
        });
    });

    function addFavourite(id)
	{
	    $.ajax({
	        type: 'GET',
	        url: "{{route('ads.fav.create')}}",
	        data: {id:id},
	        dataType: 'JSON',
	        success: function (results) {
	            toastr.success('Advertisment Added To Favourite', 'success');
	        },
	        error:function(result){
	            console.log(result);
	            toastr.error('Error Accure', 'Error');

	        }
	    });
	}
</script>
@endsection
