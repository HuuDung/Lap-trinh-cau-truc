<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Storage::url(auth()->user()->avatar) }}" class="img-circle" alt="User Image">
                </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            @if(Auth::user()->isAdmin())
                <li class="header">ADMIN OPTIONS</li>
                <li class="active treeview menu-open">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Admin Options</span>
                        <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.member.index') }}"><i class="fa fa-circle-o"></i>
                                List Member</a>
                        </li>
                        <li><a href="{{ route('admin.product-administration.index') }}"><i class="fa fa-circle-o"></i>
                                List Product</a>
                        </li>
                        <li><a href="{{ route('admin.product-administration.create') }}"><i class="fa fa-circle-o"></i>
                                Create Product</a>

                    </ul>
                </li>
            @endif
            <li class="header">USER OPTIONS</li>
            <li class="active treeview menu-open">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>User Options</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('cart.index') }}"><i class="fa fa-circle-o"></i>
                            My cart</a>
                    </li>
                    <li><a href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i>
                            Profile</a>
                    </li>
                    <li><a href="{{ route('add.balance') }}"><i class="fa fa-circle-o"></i>
                            Add Balance</a>
                    </li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>
                            History</a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>