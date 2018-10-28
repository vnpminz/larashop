<div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <!-- /input-group -->
                </li>
                {{-- <li>
                    <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li> --}}
                @can('employee')
                <li>
                    <a href="{{route('trang-chu')}}"><i class="fa fa-beer"></i> Trang chủ<span class="fa arrow"></span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-shield fa-flip-vertical"></i> Category<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/category/danhsach">List Category</a>
                        </li>
                        <li>
                            <a href="admin/category/them">Add Category</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Brand<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/brand/danhsach">List Brand</a>
                        </li>
                        <li>
                            <a href="admin/brand/them">Add Brand</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-cube fa-fw"></i> Product<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/product/danhsach">List Product</a>
                        </li>
                        <li>
                            <a href="admin/product/them">Add Product</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-shield"></i> Slider<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/slide/danhsach">List Slider</a>
                        </li>
                        <li>
                            <a href="admin/slide/them">Add Slider</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-check-square"></i> Order<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/order/danhsach">List Order</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                @endcan
                @can('admin')
                <li>
                    <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/user/danhsach">List User</a>
                        </li>
                        <li>
                            <a href="admin/user/them">Add User</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                @endcan
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>