@extends('dashboard.layout.app')
@section('title','Advertisments')
@section('content')
   <!-- start page title -->
   <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Advertisments List</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">DashBoard</a></li>
                    </li>
                    <li class="breadcrumb-item active">Advertisments</li>
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
                <h4 class="card-title">Advertisments List</h4>
                <div class="text-center mb-3">
                    <a href="{{ route('admin.advertisment.create') }}" class="btn btn-primary">Add Advertisment <i
                            class="fa fa-plus"></i></a>
                </div>
                <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Name </th>
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

                    @foreach ($data as $item)
                        <tr>

                            <td>{{$item['name']}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->location}}</td>
                            <td>{{optional($item->category)->name}}</td>
                            <td>{{$item->type}}</td>
                            <td>
                                @if ($item->ads_type->value == 'normal')
                                    <span class="bg-success badge me-2">Normal</span>
                                @elseif ($item->ads_type->value == 'fixed')
                                    <span class="bg-info badge me-2">Fixed</span>
                                @elseif($item->ads_type->value == 'special')
                                    <span class="bg-warning badge me-2">Special</span>
                                @endif
                            </td>
                            <td>{{optional($item->plan)->name}}</td>
                            <td>{{$item->phone}}</td>
                            <td>
                                <input type="checkbox" id="switch-{{$item->id}}" switch="none" onchange="toggleData({{$item->id}})" {{$item->is_active == true ? 'checked' : ''}}  />
                                <label for="switch-{{$item->id}}" data-on-label="On" data-off-label="Off"></label>
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
