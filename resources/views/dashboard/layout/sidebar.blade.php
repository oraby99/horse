<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{asset('assets/images/users/person.jpg')}}" alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">Admin</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i>
                    Online</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{route('admin')}}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin.country.index')}}" class="waves-effect">
                        <i class="ri-map-pin-line"></i>
                        <span>Countries</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin.category.index')}}" class="waves-effect">
                        <i class="ri-creative-commons-line"></i>
                        <span>Categories</span>
                    </a>
                </li>


                <li>
                    <a href="{{route('admin.plan.index')}}" class="waves-effect">
                        <i class="ri-building-3-line"></i>
                        <span>Plans</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin.admin.index')}}" class="waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Admins</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin.user.index')}}" class="waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Users</span>
                    </a>
                     
                </li>
                
                <li>
                    <a href="{{route('admin.product.index')}}" class="waves-effect">
                        <i class="ri-product-hunt-line"></i>
                        <span>Products</span>
                    </a>
                </li>


                
                <li>
                    <a href="{{route('admin.order.index')}}" class="waves-effect">
                        <i class="ri-money-dollar-box-line"></i>
                        <span>Orders</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.advertisment.index')}}" class="waves-effect">
                        <i class="ri-advertisement-line"></i>
                        <span>Advertisments</span>
                    </a>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-creative-commons-line"></i>
                        <span>Camps</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.camp.index')}}">All Camps</a></li>
                        <li><a href="{{route('admin.camp.registration')}}">Registration</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('admin.banner.index')}}" class="waves-effect">
                        <i class="ri-money-dollar-box-line"></i>
                        <span>Banners</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
