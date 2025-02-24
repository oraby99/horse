@extends('dashboard.layout.app')
@section('title','Registeration')
@section('content')

   <!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Registeration List</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">DashBoard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.camp.index') }}">Camps</a>
                    <li class="breadcrumb-item active">Registeration</li>
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
                <h4 class="card-title">Camps List</h4>
                <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Camp</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Ride With Trainer</th>
                            <th>Have Horse</th>
                            <th>Rider level</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td><a href="{{route('admin.camp.edit',$item->camp_id)}}">{{$item->camp->name}}</a></td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->age}}</td>
                            <td>{{$item->ride_with_trainer == true ? 'True' : 'False'}}</td>
                            <td>{{$item->have_horse == true ? 'True' : 'False'}}</td>
                            <td>{{$item->rider_level}}</td>
                            <td>{{$item->total}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Total : {{ $data->sum('camp_level_sum_total') + $data->sum('camp_sport_sum_total') }} KWD</td>
                        </tr>
                    </tfoot>
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
