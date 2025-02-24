@extends('dashboard.layout.app')
@section('title','Category')
@section('content')
   <!-- start page title -->
   <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Countries List</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">DashBoard</a></li>
                    </li>
                    <li class="breadcrumb-item active">Countries</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Countries List</h4>
             
                <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Name in English</th>
                            <th>Name in Arabic</th>
                            <th>Sign</th>
                            <th>Price in KWD</th>
                           <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($data as $item)
                        <tr>

                            <td><img src="{{asset('countries/'.$item->logo)}}" alt=""></td>

                            <td>{{$item['name:en']}}</td>
                            <td>{{$item['name:ar']}}</td>
                            <td>{{$item->sign}}</td>
                            <td><input type="number" value="{{$item->currency}}" class="form-control" onchange="updateCurrency( event , {{$item->id}})" ></td>

                             <td>
                                <a href="{{route('admin.country.edit',$item->id)}}" class="btn btn-primary"><i class="fa fa-pen"></i></a>
                                <a href="{{route('admin.country.delete',$item->id)}}" class="btn btn-danger delete-confirm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


@endsection
@section('scripts')
<script>
    $('#datatable-buttons').DataTable();
</script>
<script>
    function updateCurrency(e, id)
    {
        currency = e.target.value
        // console.log(currency);
    
        $.ajax({
            type: 'GET',
            url: "{{route('admin.country.update-currency')}}",
            data: {id:id , currency:currency},
            dataType: 'JSON',
            success: function (results) {
                toastr.success('Done', 'success');
            },
            error:function(result){
                console.log(result);
                toastr.error('Error Accure', 'Error');  

            }
        });
    }
</script>

@endsection