@extends('dashboard.layout.app')
@section('title', 'Dashboard')
@section('css')
<link rel="stylesheet" href="{{asset('assets/libs/charts/charts.css')}}">
@endsection
@section('content')
 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li> --}}
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-truncate font-size-14 mb-2">Total Users</p>
                        <h4 class="mb-2">{{$users}}</h4>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-primary rounded-3">
                            <i class="ri-user-3-line font-size-24"></i>  
                        </span>
                    </div>
                </div>                                            
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->
    <!-- end col -->
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-truncate font-size-14 mb-2">Advertisments</p>
                        <h4 class="mb-2">{{$advertisments}}</h4>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-success rounded-3">
                            <i class="ri-article-line font-size-24"></i>
                        </span>
                    </div>
                </div>                                              
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->

    
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-truncate font-size-14 mb-2">Products</p>
                        <h4 class="mb-2">{{$products}}</h4>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-secondary rounded-3">
                            <i class="ri-product-hunt-line font-size-24"></i>
                        </span>
                    </div>
                </div>                                              
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-truncate font-size-14 mb-2">Camps</p>
                        <h4 class="mb-2">{{$camps}}</h4>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-danger rounded-3">
                            <i class="ri-calendar-event-line font-size-24"></i>
                        </span>
                    </div>
                </div>                                              
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->
  <!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-md-3">

        <div class="card">
            <div class="card-title text-center p-2">
                Advertisment Type        
            </div>
            <div class="card-body py-0 px-2">
                {{-- <div id="area_chart" class="apex-charts" dir="ltr"></div> --}}
                <canvas id="status-chart"></canvas>
            </div>
        </div><!-- end card -->
    </div> 


    <div class="col-md-3">

        <div class="card">
            <div class="card-title text-center p-2">
                Advertisment Status        
            </div>
            <div class="card-body py-0 px-2">
                {{-- <div id="area_chart" class="apex-charts" dir="ltr"></div> --}}
                <canvas id="ads-status-chart"></canvas>
            </div>
        </div><!-- end card -->
    </div> 

</div>
@endsection
@section('scripts')
<script src="{{asset('assets/libs/charts/charts.js')}}"></script>
<script>

const getAdsType = async () => {
        const response = await fetch('{{route('admin.get-ads_type')}}');
        const data = await response.json();
        return data;
    };

const getAdsStatus = async () => {
        const response = await fetch('{{route('admin.get-ads_status')}}');
        const data = await response.json();
        return data;
    };


const StatusChart = async ()=>{
        const data =  await getAdsType();
        console.log(data);
        const ctx = document.getElementById('status-chart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Fixed', 'Special','Normal'],
                datasets: [{
                    data: [data.fixed, data.special,data.normal],
                    backgroundColor: ['#5438DC', '#0097a7','#f32f53'],
                }]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    text: 'Advertisment Type',
                },
                animation: {
                    animateScale: true,
                    animateRotate: true,
                },
            }
        });

    }

    const AdsStatusChart = async ()=>{
        const data =  await getAdsStatus();
        console.log(data);
        const ctx = document.getElementById('ads-status-chart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Pending', 'Approved','Expire'],
                datasets: [{
                    data: [data.pending, data.aproved,data.expire],
                    backgroundColor: ['#5438DC', '#0097a7','#f32f53'],
                }]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    text: 'Advertisment Type',
                },
                animation: {
                    animateScale: true,
                    animateRotate: true,
                },
            }
        });

    }
    StatusChart()
    AdsStatusChart()
</script>
@endsection
