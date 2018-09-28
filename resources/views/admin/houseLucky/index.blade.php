@extends('layout._back')

@section('content-header')
    @parent
    <h5>
    </h5>
    <ol class="breadcrumb">
        <li><a href="{{ route('pub.home') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">楼盘管理 - 楼盘中签列表</li>
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
            <form class="form-inline" action="{{ route('pub.houseLucky.index') }}" method="get">
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
                    <th style="border-right: 1px solid #ddd;">楼盘别名</th>
                    <th style="border-right: 1px solid #ddd;">摇号结果</th>
                    <th style="border-right: 1px solid #ddd;">PDF地址</th>
                    <th style="border-right: 1px solid #ddd;">官网详情</th>
                    <th style="border-right: 1px solid #ddd;">中签数</th>
                    <th style="border-right: 1px solid #ddd;">软删除</th>
                </tr>
                </thead>
                <!--tr-th end-->
                <tbody>
                @foreach( $list as $key => $value  )
                    <tr>
                        <td>{{ $value['id'] }}</td>
                        <td style="width: 200px">{{ $value['name']  }}</td>
                        <td style="width: 200px">{{ $value['alias']  }}</td>
                        <td>{{ $value['status'] == 0 ? '进行中':'结束' }}</td>
                        @if(empty($value['url']))
                            <td></td>@else
                            <td><a href="{{$value['url']}}" target="_blank">点击查看PDF</a></td>@endif
                        <td><a href="https://www.hz-notary.com/lottery/detail?lottery.id={{$value['union_id']}}" target="_blank">点击查看</a></td>
                        <td>{{ $value['num']  }}</td>
                        <td><a style="cursor:pointer;" onclick="del('{{$value['union_id']}}')"><i
                                        class="fa fa-fw fa-trash-o" title="删除"></i>删除&nbsp;
                            </a></td>
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
    <script>
        function del(id) {
            if (confirm("你确认删除此楼盘?")) {
                var url = '{{ route('pub.houseLucky.del') }}' + "/" + id;
                window.location.href = url;
            }
        }

    </script>
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