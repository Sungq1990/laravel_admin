{{-- widget.main-sidebar --}}

        <!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dist/img/avatar.png') }}" class="img-circle"
                     alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>{{"admin"}}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">主导航栏</li>
            <li>
                <a href="{{ route('pub.home') }}"><i class='fa fa-dashboard'></i><span>控制台</span></a>
            </li>
            <!--含子节点 且当前状态为active 的一级导航节点-->
            <!--内容管理 treeview-->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-home"></i>
                    <span>用户管理</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('pub.user.index') }}"><i class="fa fa-list"></i>用户列表</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
