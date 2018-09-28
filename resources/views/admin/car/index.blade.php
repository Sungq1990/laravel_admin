@extends('layout._back')

@section('content-header')
    @parent
    <h5>
    </h5>
    <ol class="breadcrumb">
        <li><a href="{{ route('pub.home') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">汽车摇号管理 - 车牌竞价</li>
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
        <canvas id="myChart" width="600" height="300"></canvas>
    </div>
@stop

@section('extraPlugin')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js" type="text/javascript"></script>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var data = {
            labels: [{{implode(',',array_column($list,'issue'))}}],
            datasets: [{
                label: '个人竞价价格',
                borderColor: "rgb(255, 99, 132)",
                backgroundColor: "rgb(255, 99, 132)",
                fill: false,
                data: [
                    {{implode(',',array_column($list,'personal_price'))}}
                ],
                yAxisID: 'y-axis-1',
            }, {
                label: '公司竞价价格',
                borderColor: "rgb(54, 162, 235)",
                backgroundColor: "rgb(54, 162, 235)",
                fill: false,
                data: [
                    {{implode(',',array_column($list,'company_price'))}}
                ],
                yAxisID: 'y-axis-2'
            }]
        };
        var myChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                hoverMode: 'index',
                stacked: false,
                title: {
                    display: true,
                    text: '汽车竞价'
                },
                scales: {
                    yAxes: [{
                        type: 'linear',
                        display: true,
                        position: 'left',
                        id: 'y-axis-1'
                    }, {
                        type: 'linear',
                        display: true,
                        position: 'right',
                        id: 'y-axis-2',
                        gridLines: {
                            drawOnChartArea: false
                        }
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