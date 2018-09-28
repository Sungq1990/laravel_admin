@extends('layout._back')

@section('content-header')
    @parent
    <h5>
    </h5>
    <ol class="breadcrumb">
        <li><a href="{{ route('pub.home') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">监控 - 爬虫报错列表</li>
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
        <div class="box-body table-responsive" style="min-height: 300px;font-weight:bold;">
            <table class="table table-hover table-bordered">
                <thead>
                <!--tr-th start-->
                <tr>
                    <th style="border-right: 1px solid #ddd;">创建时间</th>
                    <th style="border-right: 1px solid #ddd;">请求地址</th>
                    <th style="border-right: 1px solid #ddd;">请求数据</th>
                    <th style="border-right: 1px solid #ddd;">HTTP状态码</th>
                    <th style="border-right: 1px solid #ddd;">错误信息</th>
                </tr>
                </thead>
                <!--tr-th end-->
                <tbody>
                @foreach( $list as $key => $value  )
                    <tr>
                        <td>{{ $value['created_at'] }}</td>
                        <td>{{ $value['url'] }}</td>
                        <td>{{ $value['data'] }}</td>
                        <td>{{ $value['error_code'] }}</td>
                        <td>{{ $value['error_message'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div><!-- /.box-body -->
        <div class="box-footer clearfix">
            {!! $pageList->render() !!}
            <ul class="pagination">
                <li class="disabled"><a>共 {{$pageList->lastPage()}} 页, {{$pageList->total()}} 条记录</a></li>
            </ul>
        </div>
    </div>

@stop

@section('extraPlugin')
    <style>
        table thead tr {
            background-color: #f4f4f4;
        }
    </style>
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