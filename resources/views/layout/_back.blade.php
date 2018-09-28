@extends('layout._base')

@section('hacker_header')

@stop

@section('title') 工作门户 @stop

@section('meta')
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
@stop

@section('head_css')
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Font Awesome Icons -->
    <link href="{{ asset('lib/font-awesome/4.3.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Ionicons -->
    <link href="{{ asset('lib/ionicons/2.0.1/css/ionicons.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <link href="{{ asset('dist/css/yascmf.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css"/>
    <!--
    <link href="{{ asset('dist/css/skins/skin-black.min.css') }}" rel="stylesheet" type="text/css" />
    -->
    <link href="{{ asset('plugins/iCheck/all.css') }}" rel="stylesheet" type="text/css"/>
    <!--
    <link href="{{ asset('plugins/iCheck/flat/blue.css') }}" rel="stylesheet" type="text/css" />
    -->
    @stop

    @section('head_js')
            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <![endif]-->
    @parent
@stop

@section('body_attr') class="skin-black sidebar-mini"@stop

@section('body')

        <!--侦测是否启用JavaScript脚本-->
<noscript>
    <style type="text/css">
        .noscript {
            width: 100%;
            height: 100%;
            overflow: hidden;
            background: #000;
            color: #fff;
            position: absolute;
            z-index: 99999999;
            background-color: #000;
            opacity: 1.0;
            filter: alpha(opacity=100);
            margin: 0 auto;
            top: 0;
            left: 0;
        }

        .noscript h1 {
            font-size: 36px;
            margin-top: 50px;
            text-align: center;
            line-height: 40px;
        }

        html {
            overflow-x: hidden;
            overflow-y: hidden;
        }

        /*禁止出现滚动条*/
    </style>
    <div class="noscript">
        <h1>
            您的浏览器不支持JavaScript，请启用后重试！
        </h1>
    </div>
</noscript>

<!--wrapper start-->
<div class="wrapper">

    @include('widgets.main-header')

    @include('widgets.main-sidebar')

            <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            @section('content-header')
            @show{{-- 内容导航头部 --}}

        </section>

        <!-- Main content -->
        <section class="content">

            @section('content')
            @show{{-- 内容主体区域 --}}

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Main Footer -->
    {{--<footer class="main-footer">--}}
    {{--<!-- To the right -->--}}
    {{--<div class="pull-right hidden-xs">--}}
    {{--后台模版基于 <a href="https://github.com/almasaeed2010/AdminLTE">AdminLTE</a>--}}
    {{--</div>--}}
    {{--<!-- Default to the left -->--}}
    {{--<strong>Copyright &copy; 2015-{{ date('Y') }} </strong>--}}
    {{--</footer>--}}

    @stop

    @section('afterBody')
            <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">

        @include('widgets.control-sidebar')

    </aside><!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class='control-sidebar-bg'></div>
</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.3 -->
<script src="{{ asset('plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/app.min.js') }}" type="text/javascript"></script>

<!-- Slimscroll -->
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>

@section('extraPlugin')
@show{{-- 引入额外依赖JS插件 --}}

<script type="text/javascript">
    $(document).ready(function () {
        $('.sidebar-menu a').each(function (index, element) {
            if (element.href == location.href.split('?')[0]) {
                $(element).parent().addClass('active');
                $(element).parent().parent().addClass('active');
                $(element).parent().parent().addClass('menu-open');
                $(element).parent().parent().css('display', 'block');
            }
        })
    })
</script>

@section('extraSection')
@show{{-- 补充额外的一些东东，不一定是JS，可能是HTML --}}

@stop


@section('hacker_footer')

@stop
