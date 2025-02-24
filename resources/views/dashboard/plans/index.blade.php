@extends('dashboard.layout.app')
@section('title','Plans')
@section('content')
   <!-- start page title -->
   <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Plans List</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">DashBoard</a></li>
                    </li>
                    <li class="breadcrumb-item active">Plans</li>
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
                <h4 class="card-title">Plans List</h4>
               <div class="text-center mb-3">
                    <a href="{{ route('admin.plan.create') }}" class="btn btn-primary">Add Plans <i
                            class="fa fa-plus"></i></a>
                </div>
                <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Description in English</th>
                            <th>Description in Arabic</th>
                            <th>Name in English</th>
                            <th>Name in Arabic</th>
                            <th>Price</th>
                            <th>Time</th>
                            <th>Type</th>

                           <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{$item['description:en']}}</td>
                            <td>{{$item['description:ar']}}</td>
                            <td>{{$item['name:en']}}</td>
                            <td>{{$item['name:ar']}}</td>
                            <td>{{$item['price']}}</td>
                            <td>{{$item['time']}}</td>
                            <td>

                                @if ($item->type == 'normal')
                                <span class="bg-success badge me-2">Normal</span>
                                @elseif ($item->type == 'fixed')
                                    <span class="bg-info badge me-2">Fixed</span>
                                @elseif($item->type == 'special')
                                    <span class="bg-warning badge me-2">Special</span>
                                @endif
                            </td>
                             <td>
                                <a href="{{route('admin.plan.edit',$item->id)}}" class="btn btn-primary"><i class="fa fa-pen"></i></a>
                                <a href="{{route('admin.plan.delete',$item->id)}}" class="btn btn-danger delete-confirm"><i class="fa fa-trash"></i></a>
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
@endsection
