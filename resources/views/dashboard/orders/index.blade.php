@extends('dashboard.layout.app')
@section('title','Orders')
@section('content')
   <!-- start page title -->
   <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Orders List</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">DashBoard</a></li>
                    </li>
                    <li class="breadcrumb-item active">Orders</li>
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
                <h4 class="card-title">Orders List</h4>
               <div class="text-center mb-3">
                </div>
                <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Order Number</th>
                            <th>Order Status</th>
                            <th>Payment Status</th>
                            <th>Shipment Status</th>
                            <th>User Email</th>
                            <th>User Phone</th>
                            <th>Created At</th>
                            <th>Total in Kwd</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($data as $index => $item)
                        <tr>

                           <td>{{$index + 1 }}</td>
                            <td>{{$item->order_number}}</td>
                            <td>
                                @if ($item->order_status == 'pending')
                                    <span class="bg-warning badge me-2">Pending</span>
                                @elseif ($item->order_status == 'canceled')
                                    <span class="bg-danger badge me-2">Canceled</span>
                                @else
                                    <span class="bg-success badge me-2">Completed</span>
                                @endif
                            </td>

                            <td>
                                @if ($item->payment_status == 'pending')
                                    <span class="bg-warning badge me-2">Pending</span>
                                @elseif ($item->payment_status == 'canceled')
                                    <span class="bg-danger badge me-2">Canceled</span>
                                @else
                                    <span class="bg-success badge me-2">Completed</span>
                                @endif
                            </td>

                            
                            <td>
                                @if ($item->shipment_status == true)
                                    <span class="bg-warning badge me-2">Completed</span>
                                @else
                                    <span class="bg-success badge me-2">Pending</span>
                                @endif
                            </td>
                           
                            <td>{{$item->user->email}}</td>
                            <td>{{$item->user->phone}}</td>
                            <td>{{ $item->created_at}}</td>
                            
                            <td>{{$item->total}}</td>
                            <td>
                                <a href="{{route('admin.advertisment.show',$item->id)}}" class="btn btn-info"><i class="fa fa-eye"></i></a>
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
    function toggleData(id)
    {
        $.ajax({
            type: 'GET',
            url: "{{route('admin.advertisment.toggle')}}",
            data: {id:id},
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