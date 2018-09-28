@extends('layout._back')

@section('content-header')
    @parent
    <ol class="breadcrumb">
        <li><a href="{{ route('pub.home') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="{{ route('pub.house.index') }}">楼盘管理</a></li>
        <li class="active">编辑</li>
    </ol>
@stop

@section('content')

    @if(Session::has('message'))
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon icon fa fa-warning"></i> 提示！</h4>
            {{ Session::get('message') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> 警告！</h4>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">编辑</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('pub.house.update') }}" method="post" id="houseEdit">
            <input name="_method" type="hidden" value="post">
            <input name="unionId" type="hidden" value="{{ $detail['unionId'] }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="box-body">
                <div class="form-group">
                    <label for="detail.name" class="col-sm-2 control-label">名称:</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="detail.name" data="{{ $detail['name'] }}"
                               value="{{ $detail['name'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="detail.status" class="col-sm-2 control-label">状态:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="detail.status" data="{{ $detail['status'] }}"
                               value="{{ $detail['status'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="detail.house_type" class="col-sm-2 control-label">主力户型:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="detail.house_type"
                               data="{{ $detail['house_type'] }}"
                               value="{{ $detail['house_type'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="detail.price" class="col-sm-2 control-label">均价:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="detail.price" data="{{ $detail['price'] }}"
                               value="{{ $detail['price'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="detail.number" class="col-sm-2 control-label">房源套数:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="detail.number" data="{{ $detail['number'] }}"
                               value="{{ $detail['number'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="detail.rate" class="col-sm-2 control-label">无房户倾斜比例:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="detail.rate" data="{{ $detail['rate'] }}"
                               value="{{ $detail['rate'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="detail.doorsill" class="col-sm-2 control-label">摇号门槛:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="detail.doorsill" data="{{ $detail['doorsill'] }}"
                               value="{{ $detail['doorsill'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="detail.lottery_time" class="col-sm-2 control-label">摇号时间:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="detail.lottery_time"
                               data="{{ $detail['lottery_time'] }}"
                               value="{{ $detail['lottery_time'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="detail.register_time" class="col-sm-2 control-label">登记时间:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="detail.register_time"
                               data="{{ $detail['register_time'] }}"
                               value="{{ $detail['register_time'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="detail.telephone" class="col-sm-2 control-label">售楼电话:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="detail.telephone"
                               data="{{ $detail['telephone'] }}"
                               value="{{ $detail['telephone'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="detail.longitude" class="col-sm-2 control-label">经度:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="detail.longitude"
                               data="{{ $detail['longitude'] }}"
                               value="{{ $detail['longitude'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="detail.latitude" class="col-sm-2 control-label">维度:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="detail.latitude"
                               data="{{ $detail['latitude'] }}"
                               value="{{ $detail['latitude'] }}">
                    </div>
                </div>
                @foreach( $explain as $item )
                    <div class="form-group">
                        <label for="explain.telephone" class="col-sm-2 control-label">{{$item['key']}}:</label>
                        <div class="col-sm-10">
                        <textarea rows="5" cols="20" class="form-control" data="{{ $item['value'] }}"
                                  name="explain.{{$item['id']}}">{{$item['value']}}</textarea>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="box-footer">
                <div class="form-group ">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button type="button"
                                onclick="window.location.href='{{redirect()->back()->getTargetUrl()}}' "
                                class="btn btn-default">取消
                        </button>
                        <button type="submit" id="id_submit" class="btn btn-primary"><i class="fa fa-check"> 保存</i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop

@section('extraPlugin')
    <script>
        $("#houseEdit").submit(function () {
            var canSub = false;
            $("form div.box-body input,form div.box-body textarea").each(function () {
                var val = $(this).val();
                var data = $(this).attr('data');
                if (val == data) {
                    $(this).attr("disabled", true);
                } else {
                    canSub = true;
                }
            })
            if (!canSub) {
                window.event.returnValue = false;
                $("form div.box-body input,form div.box-body textarea").each(function () {
                    $(this).removeAttr("disabled");
                })
            }
        });
    </script>
@stop

@section('filledScript')

@stop
