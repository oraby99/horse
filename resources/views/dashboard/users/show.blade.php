@extends('dashboard.layout.app')
@section('content')
<div class="row justify-content-center align-items-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mx-5 ">
                    <img class="d-flex me-3 rounded-circle img-thumbnail avatar-lg" src="{{$data->image != null ? asset('uploads/users/'.$data->image) : asset('default.png') }}" alt="{{$data->name}}">
                    <div class="flex-grow-1">
                        <h5 class="mt-0 font-size-18 mb-1">{{$data->name}}</h5>
                        <p class="text-muted font-size-14">{{$data->phone}}</p>
                    </div>
                </div>
            </div>
        </div> 
    </div>
   </div>

   <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Addresses List</h4>
              
                <table id="datatable-buttons" class="datatable-buttons table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Area</th>
                            <th>Piece</th>
                            <th>Street</th>
                            <th>House Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data->address as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->city}}</td>
                                <td>{{$item->area}}</td>
                                <td>{{$item->piece}}</td>
                                <td>{{$item->street}}</td>
                                <td>{{$item->house_number}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->


    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Advertisments List</h4>
              
                <table id="datatable-buttons" class="datatable-buttons table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Title in Arabic</th>
                            <th>Title in English</th>
                            <th>Price</th>
                            <th>Location</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th>Advertisment Type</th>
                            <th>Plan</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data->advertisment as $item)
                        <tr>

                           
                            <td>{{$item['title:en']}}</td>
                            <td>{{$item['title:ar']}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->location}}</td>
                            <td>{{optional($item->category)->name}}</td>
                            <td>{{$item->type}}</td>
                            <td>
                                @if ($item->ads_type == 'normal')
                                    <span class="bg-info badge me-2">Normal</span>
                                @elseif ($item->ads_type == 'fixed')
                                    <span class="bg-info badge me-2">Fixed</span>
                                @else
                                    <span class="bg-warning badge me-2">Special</span>
                                @endif
                            </td>
                            <td>{{$item->plan->name}}</td>
                            <td>{{$item->phone}}</td>
                            <td>
                                <input type="checkbox" id="switch1" switch="none" onchange="toggleData({{$item->id}})" {{$item->is_active == true ? 'checked' : ''}}  />
                                <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                            </td>
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

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Orders List</h4>
              
                <table id="datatable-buttons" class="datatable-buttons table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
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
                        @foreach ($data->order as $item)
                        <tr>

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
                                 <a href="{{route('admin.order.show',$item->id)}}" class="btn btn-info"><i class="fa fa-eye"></i></a>
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
    $('.datatable-buttons').DataTable();
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