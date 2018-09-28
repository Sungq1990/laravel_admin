@extends('layout._back')

@section('content-header')
    @parent
    <h5>
    </h5>
    <ol class="breadcrumb">
        <li><a href="{{ route('pub.home') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">楼盘管理 - 摇号楼盘列表</li>
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
            <form class="form-inline" action="{{ route('pub.house.index') }}" method="get">
                <div class="input-group">
                    <input type="text" class="form-control pull-right" name="search" value="{{ Input::get('search') }}"
                           style="width: 150px;" placeholder="楼盘名称">
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
                    <th style="border-right: 1px solid #ddd;">编号</th>
                    <th style="border-right: 1px solid #ddd;">楼盘</th>
                    <th style="border-right: 1px solid #ddd;">状态</th>
                    <th style="border-right: 1px solid #ddd;">预览图片</th>
                    <th style="border-right: 1px solid #ddd;">均价(元/平米)</th>
                    <th style="border-right: 1px solid #ddd;">主力户型</th>
                    <th style="border-right: 1px solid #ddd;">房源套数</th>
                    <th style="border-right: 1px solid #ddd;">操作</th>
                </tr>
                </thead>
                <!--tr-th end-->
                <tbody>
                @foreach( $list as $key => $value  )
                    <tr>
                        <td>{{ $value['id'] }}</td>
                        <td style="width: 200px">{{ $value['name']  }}</td>
                        <td style="color: {{$value['color']}}">{{ $value['status'] }}</td>
                        <td><img style="width: 100px;height: 50px" src="{{ $value['qiniu_img']  }}" alt=""/></td>
                        <td>{{ $value['price']  }}</td>
                        <td style="width: 150px">{{ $value['house_type']  }}</td>
                        <td>{{ $value['number']  }}</td>
                        <td><a style="margin-right: 10px;"
                               href="{{ route('pub.house.edit') }}/{{ $value['unionId'] }}"><i
                                        class="fa  fa-fw fa-edit" title="编辑"></i>编辑&nbsp;</a></td>
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