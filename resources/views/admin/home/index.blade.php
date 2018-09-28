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
                    <span class="info-box-text">新增注册用户</span>
                    <span class="info-box-number">10000</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-car"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">新增订单</span>
                    <span class="info-box-number">100</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-jpy"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">活跃用户数</span>
                    <span class="info-box-number">10000</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-signal"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">成交额</span>
                    <span class="info-box-number">100000</span>
                </div>
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
                        <tr>
                            <td>2018-01-01 11:11:11</td>
                            <td>xxxxxx.com</td>
                            <td>403</td>
                            <td>xxxxxxxxxxxx</td>
                        </tr>
                        <tr>
                            <td>2018-01-01 11:11:11</td>
                            <td>xxxxxx.com</td>
                            <td>403</td>
                            <td>xxxxxxxxxxxx</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('extraPlugin')
    @stop

    @section('filledScript')

@stop
