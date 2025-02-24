@extends('dashboard.layout.app')
@section('title','Users')
@section('content')
   <!-- start page title -->
   <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Users List</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">DashBoard</a></li>
                    </li>
                    <li class="breadcrumb-item active">Users</li>
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
                <h4 class="card-title">Users List</h4>

                <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Link</th>
                            <th>Is Verified</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($data as $item)
                        <tr>
                            <td>
                                <img class="rounded-circle header-profile-user" src="{{$item->image == null ? asset('default.png') : asset('uploads/users/'.$item->image)}}" alt="Header Avatar">
                            </td>

                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->link}}</td>
                            <td>
                                @if ($item->is_verified == true)
                                    <span class="bg-success badge me-2">Verified</span>
                                @else
                                    <span class="bg-danger badge me-2">Not Verified</span>
                                @endif
                            </td>
                            <td>
                                <input type="checkbox" id="switch-{{$item->id}}" switch="none" onchange="toggleData({{$item->id}})" {{$item->deleted_at == null ? 'checked' : ''}}  />
                                <label for="switch-{{$item->id}}" data-on-label="On" data-off-label="Off"></label>
                            </td>
                             <td>
                                <a href="{{route('admin.user.edit',$item->id)}}" class="btn btn-info"><i class="fa fa-pen"></i></a>
                                <a href="{{route('admin.user.show',$item->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                <a href="{{route('admin.user.delete',$item->id)}}" class="btn btn-danger delete-confirm"><i class="fa fa-trash"></i></a>

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
        url: "{{route('admin.user.toggle')}}",
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
