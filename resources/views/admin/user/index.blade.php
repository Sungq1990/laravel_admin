@extends('layout._back')

@section('content-header')
    @parent
    <h5>
    </h5>
    <ol class="breadcrumb">
        <li><a href="{{ route('pub.home') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">用户管理 - 用户列表</li>
    </ol>

@stop

@section('content')

    @if(Session::has('message'))
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> 提示！</h4>
            {{ Session::get('message') }}
        </div>
    @endif

    <div class="box box-primary">

        <div class="box-header with-border">
            <form class="form-inline" action="{{ route('pub.user.index') }}" method="get">
                <div class="input-group">
                    <input type="text" class="form-control pull-right" name="search" value="{{ Input::get('search') }}"
                           style="width: 150px;" placeholder="用户名称">
                    <div class="input-group-btn">
                        <button id="id_search" class="btn btn-default"><i class="fa fa-search"> 查询</i></button>
                    </div>
                </div>
            </form>
        </div>

        <div class="box-body table-responsive" style="min-height: 300px;font-weight:bold;">
            <table class="table table-hover table-bordered">
                <thead>
                <!--tr-th start-->
                <tr>
                    <th style="border-right: 1px solid #ddd;">用户编号</th>
                    <th style="border-right: 1px solid #ddd;">姓名</th>
                    <th style="border-right: 1px solid #ddd;">身份证</th>
                    <th style="border-right: 1px solid #ddd;">银行卡</th>
                </tr>
                </thead>
                <!--tr-th end-->
                <tbody>
                <tr>
                    <td>1</td>
                    <td>xxxxxxx</td>
                    <td>8888888888</td>
                    <td>6666666666</td>
                </tr>
                </tbody>
            </table>


        </div><!-- /.box-body -->
        {{--<div class="box-footer clearfix">--}}
            {{--{!! $pageList->render() !!}--}}
            {{--<ul class="pagination">--}}
                {{--<li class="disabled"><a>共 {{$pageList->lastPage()}} 页, {{$pageList->total()}} 条记录</a></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    </div>

@stop

@section('extraPlugin')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">

    <script type="text/javascript" src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
@stop

@section('filledScript')
    <!--function document 内的 js -->

    {{--});--}}
    {{--$(".select2").select2();--}}

    {{--$(".select2").val(['0','1','3','2']).trigger('change')--}}


@stop

{{--@section('afterBody')--}}
{{--@parent--}}
{{--@stop--}}