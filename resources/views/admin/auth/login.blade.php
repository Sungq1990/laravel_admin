@extends('layout._base')

@section('hacker_header')

        <!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
@stop

@section('title') 登录 - 管理门户  @stop

@section('meta')
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
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
    <link href="{{ asset('plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css"/>
    @stop

    @section('head_js')
    <style>
        .login_background {
            background-image: url({{'http://resource.health666.club/admin_back_img.jpg' }});
            background-size: 100% 100%;
        }

        .login-box-body, .register-box-body {
            background: rgba(255, 255, 255, .15);
            padding: 20px;
            color: #444;
            border-top: 0;
            color: #666;
        }
    </style>
    @parent
@stop

@section('body_attr')
    {{--class="login-page"--}}
    {{--.login-page, .register-page--}}
    class ="login_background"

@stop

@section('body')

    <div class="login-box" style="opacity: 0.85;    background: #d2d6de;     position: relative; top: 100px;">
        <div class="login-logo">
            <a href="#"><b style="color:#333;">
                </b></a>
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg" style="  font-size: 30px;font-weight: 600;">管理门户</p>

            @if($errors->any())
                <div id="id_dev_error_server" class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> 警告！</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div id="id_dev_error" style="display: none;" class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> 警告！</h4>
                <ul>

                </ul>
            </div>


            <form id="id_form" method="post" action="{{ route('login') }}" accept-charset="utf-8">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="id_username" value="{{Input::old('email')}}"
                           maxlength="26" name="email" placeholder="用户名"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" id="id_pwd" maxlength="16" name="password"
                           placeholder="登录密码"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-4" style="width: 100%;    margin-bottom: 10px">
                        <button style="line-height: 25px;font-size: 16px; font-weight: bold;" type="button"
                                id="id_submit" class="btn btn-primary btn-block btn-flat"><i
                                    class="fa-long-arrow-righ"></i> 登录
                        </button>
                    </div><!-- /.col    -->
                </div>
            </form>
        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    @stop

    @section('afterBody')

            <!-- jQuery 2.1.3 -->
    <script src="{{ asset('plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('lib/md5/md5.js') }}"></script>




    <script>
        $(function () {
            $("#id_username").focus();

            document.onkeydown = function (e) {
                var ev = document.all ? window.event : e;
                if (ev.keyCode == 13) {
                    login();
                }
            }

            $("#id_submit").click(function () {
                login();
            });

            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });

        function login() {
            $("#id_dev_error_server").hide();
            var username = $("#id_username").val();
            var pwd = $("#id_pwd").val();

            if (!username) {
                $("#id_dev_error ul").empty();
                $("#id_dev_error").show();
                $("#id_dev_error ul").append("<li>用户名不能为空</li>");
                $("#id_username").focus();
                return false;
            }
            if (!pwd) {
                $("#id_dev_error ul").empty();
                $("#id_dev_error").show();
                $("#id_dev_error ul").append("<li>密码不能为空</li>");
                $("#id_pwd").focus();
                return false;
            }
            $("#id_dev_error ul").empty();
            $("#id_dev_error").hide();

            $("#id_pwd").val(hex_md5(username + pwd));
            $("#id_form").submit();
        }
    </script>
@stop

@section('hacker_footer')

@stop
