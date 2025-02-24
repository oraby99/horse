@extends('dashboard.layout.app')
@section('title','Banners')
@section('content')
   <!-- start page title -->
   <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Banners List</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">DashBoard</a></li>
                    </li>
                    <li class="breadcrumb-item active">Banners</li>
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
                <h4 class="card-title">Banners List</h4>
               <div class="text-center mb-3">
                    <a href="{{ route('admin.banner.create') }}" class="btn btn-primary">Add Banners <i
                            class="fa fa-plus"></i></a>
                </div>
                <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            
                            <th>Image</th>
                            <th>Order</th>

                           <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td><img src="{{asset('uploads/banners/'.$item->image)}}" class="img-thumbnail" width="150px" height="100px" alt=""></td>
                            <td><input type="text"  name="order" required onchange="editOrder({{$item->id}},event)" value="{{$item->order}}" class="form-control"></td>

                            <td>
                                <a href="{{route('admin.banner.edit',$item->id)}}" class="btn btn-primary"><i class="fa fa-pen"></i></a>
                                <a href="{{route('admin.banner.delete',$item->id)}}" class="btn btn-danger delete-confirm"><i class="fa fa-trash"></i></a>
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
    function editOrder(id,e)
    {
        order = e.target.value;
        $.ajax({
            type: 'GET',
            url: "{{route('admin.banner.edit.order')}}",
            data: {id:id,order:order},
            dataType: 'JSON',
            success: function (results) {
                toastr.success('Done', 'Order Update');
            },
            error:function(result){
                console.log(result);
                toastr.error('Error Accure', 'Error');
            }
        });
    }
</script>
@endsection
