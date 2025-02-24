@extends('dashboard.layout.app')
@section('title','Category')
@section('content')
   <!-- start page title -->
   <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Categories List</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">DashBoard</a></li>
                    </li>
                    <li class="breadcrumb-item active">Categories</li>
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
                <h4 class="card-title">Categories List</h4>
               <div class="text-center mb-3">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Add Category <i
                            class="fa fa-plus"></i></a>
                </div>
                <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name in English</th>
                            <th>Name in Arabic</th>
                            <th>Parent</th>
                           <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($data as $item)
                        <tr>

                            <td><img src="{{asset('uploads/categories/'.$item->image)}}" class="img-thumbnail" width="150px" height="100px" alt=""></td>

                            <td>{{$item['name:en']}}</td>
                            <td>{{$item['name:ar']}}</td>
                            <td>{{optional($item->parent)->name}}</td>
                             <td>
                                <a href="{{route('admin.category.edit',$item->id)}}" class="btn btn-primary"><i class="fa fa-pen"></i></a>
                              @if ($item->parent_id != null)
                              <a href="{{route('admin.category.delete',$item->id)}}" class="btn btn-danger delete-confirm"><i class="fa fa-trash"></i></a>                                  
                              @endif
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