{{-- widget.main-header --}}

<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ route('pub.home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Admin</b>Admin</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b style="margin-right: 2px;">Admin</b>工作门户</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a title="个人中心" href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{ asset('dist/img/avatar.png') }}"
                             class="user-image" alt="个人中心"/>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs"> 欢迎您:&nbsp; admin</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{ asset('dist/img/avatar.png') }}"
                                 class="img-circle" alt="User Image"/>
                            <p>
                                <small>Be Happy</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">消息</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">任务</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">好友</a>
                            </div>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="{{route('logout')}}" class="btn btn-default btn-flat">退出</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<style>
    th, td {
        border: 1px solid black;
        text-align: center;
    }

    table thead tr {
        text-align: center;
        background-color: #f4f4f4;
    }

</style>