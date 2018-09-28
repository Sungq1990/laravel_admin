@extends('layout._back')

@section('content-header')
    <h1><i class='fa fa-dashboard'></i>控制台</h1>
    @stop

    @section('content')
            <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-home"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">新增楼盘/明细数</span>
                    <span class="info-box-number">{{$cnt}}</span>
                    <span class="info-box-number">{{$detail_cnt}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-car"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">车牌摇号最新期数</span>
                    <span class="info-box-number">{{$issue}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-jpy"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">车牌竞价最新数据</span>
                    <span class="info-box-text" style="font-weight:bold">期数:{{$bInfo['issue']}}</span>
                    <span class="info-box-text" style="font-weight:bold">个人:{{$bInfo['personal_price']}}</span>
                    <span class="info-box-text" style="font-weight:bold">单位:{{$bInfo['company_price']}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-signal"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text" style="font-size: 12px;">新增楼盘摇号/中签数</span>
                    <span class="info-box-number">{{$lcnt}}</span>
                    <span class="info-box-number">{{$lucky_cnt}}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <canvas id="front" width="300" height="150"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-primary">
                <canvas id="blog" width="300" height="150"></canvas>
            </div>
        </div>
    </div>

    <div class="row">
        <ol class="breadcrumb">
            <i class='fa fa-exclamation-triangle'></i>蜘蛛监控
        </ol>

        <div class="box box-primary">
            <div class="box-body table-responsive" style="min-height: 300px;font-weight:bold;">
                <table class="table table-hover table-bordered">
                    <thead>
                    <!--tr-th start-->
                    <tr>
                        <th style="border-right: 1px solid #ddd;">创建时间</th>
                        <th style="border-right: 1px solid #ddd;">请求地址</th>
                        <th style="border-right: 1px solid #ddd;">HTTP状态码</th>
                        <th style="border-right: 1px solid #ddd;">错误信息</th>
                    </tr>
                    </thead>
                    <!--tr-th end-->
                    <tbody>
                    @foreach( $s_mon as $key => $value  )
                        <tr>
                            <td>{{ $value['created_at'] }}</td>
                            <td>{{ $value['url'] }}</td>
                            <td>{{ $value['error_code'] }}</td>
                            <td>{{ $value['error_message'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('extraPlugin')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js" type="text/javascript"></script>
    <script>
        var ctx_front_uv = document.getElementById("front").getContext('2d');
        var ctx_front_pv = document.getElementById("blog").getContext('2d');
        var front_pv_data = {
            labels: [{{implode(',',$frontStat['day'])}}],
            datasets: [{
                label: 'pv',
                borderColor: "rgb(255, 99, 132)",
                backgroundColor: "rgb(255, 99, 132)",
                fill: false,
                data: [
                    {{implode(',',$frontStat['pv'])}}
                ],
                yAxisID: 'y-axis-1'
            }]
        };
        var front_uv_data = {
            labels: [{{implode(',',$frontStat['day'])}}],
            datasets: [{
                label: 'uv',
                borderColor: "rgb(54, 162, 235)",
                backgroundColor: "rgb(54, 162, 235)",
                fill: false,
                data: [
                    {{implode(',',$frontStat['uv'])}}
                ],
                yAxisID: 'y-axis-1'
            }]
        };
        new Chart(ctx_front_uv, {
            type: 'line',
            data: front_uv_data,
            options: {
                responsive: true,
                hoverMode: 'index',
                stacked: false,
                title: {
                    display: true,
                    text: 'front.health666.club'
                },
                scales: {
                    yAxes: [{
                        type: 'linear',
                        display: true,
                        position: 'left',
                        id: 'y-axis-1'
                    }]
                }
            }
        });
        new Chart(ctx_front_pv, {
            type: 'line',
            data: front_pv_data,
            options: {
                responsive: true,
                hoverMode: 'index',
                stacked: false,
                title: {
                    display: true,
                    text: 'www.health666.club'
                },
                scales: {
                    yAxes: [{
                        type: 'linear',
                        display: true,
                        position: 'left',
                        id: 'y-axis-1'
                    }]
                }
            }
        });
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
