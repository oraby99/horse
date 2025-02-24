@extends('dashboard.layout.app')
@section('content')

   <div class="row">
    

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Product List</h4>
              
                <table id="datatable-buttons" class="datatable-buttons table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Name in English</th>
                            <th>Name in Arabic</th>
                            <th>Deliver Time</th>
                            <th>Price</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($data->product as $item)
                        <tr>
                            <td>{{$item['name:en']}}</td>
                            <td>{{$item['name:ar']}}</td>
                            <td>{{$item->deliver_time}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{optional($item->category)->name}}</td>
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