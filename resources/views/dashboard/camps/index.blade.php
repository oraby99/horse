@extends('dashboard.layout.app')
@section('title','Camps')
@section('content')
<style>
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }

    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #2196F3;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }
</style>
   <!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">camps List</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">DashBoard</a></li>
                    <li class="breadcrumb-item active">camps</li>
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
                <h4 class="card-title">camps List</h4>
                <div class="text-center mb-3">
                    <a href="{{ route('admin.camp.create') }}" class="btn btn-primary">Add Camp <i
                            class="fa fa-plus"></i></a>
                </div>
                <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Name in Arabic</th>
                            <th>Name in English</th>
                            <th>Location</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{$item['name:en']}}</td>
                            <td>{{$item['name:ar']}}</td>
                            <td>{{$item->country->name}}</td>
                            <td>{{$item->category->name}}</td>
                            <td>
                                <input type="checkbox" id="switch-{{$item->id}}" switch="none" onchange="toggleData({{$item->id}})" {{$item->is_active == true ? 'checked' : ''}}  />
                                <label for="switch-{{$item->id}}" data-on-label="On" data-off-label="Off"></label>
                            </td>
                            <td>
                                <a href="{{route('admin.camp.show',$item->id)}}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                <a href="{{route('admin.camp.edit',$item->id)}}" class="btn btn-primary "><i class="fa fa-pen"s></i></a>
                                <a href="{{route('admin.camp.delete',$item->id)}}" class="btn btn-danger delete-confirm"><i class="fa fa-trash"></i></a>
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
@section('scripts')
    <script>
        $(document).ready(function () {
            $('.toggle-switch').change(function () {
                var id = $(this).data('id');
                var status = $(this).prop('checked') ? 1 : 0;

                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.camp.toggle') }}',
                    data: {
                        id: id,
                        status: status,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function (data) {
                        console.log('Status updated successfully');
                    },
                    error: function (error) {
                        console.log(error);
                        console.error('Error updating status');
                    },
                });
            });
        });
    </script>

<script>
    function toggleData(id)
    {
        $.ajax({
            type: 'GET',
            url: "{{route('admin.camp.toggle')}}",
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

@endsection
