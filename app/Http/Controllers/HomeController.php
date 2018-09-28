<?php

namespace App\Http\Controllers;

use App\Models\HBModels\YaohaoDetailModel;
use App\Models\HBModels\HouseDetailModel;
use App\Models\HBModels\BiddingModel;
use App\Models\HBModels\HouseLuckyConfigModel;
use App\Models\HBModels\HouseExplainModel;
use App\Models\HBModels\HouseLuckyModel;
use App\Services\HomeService;

class HomeController extends CommonController
{

    /**
     * @param YaohaoDetailModel $cModel
     * @param HouseDetailModel $hModel
     * @param BiddingModel $bModel
     * @param HouseLuckyConfigModel $lModel
     * @param HouseExplainModel $eModel
     * @param HouseLuckyModel $hlModel
     * @param HomeService $service
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(
        YaohaoDetailModel $cModel,
        HouseDetailModel $hModel,
        BiddingModel $bModel,
        HouseLuckyConfigModel $lModel,
        HouseExplainModel $eModel,
        HouseLuckyModel $hlModel,
        HomeService $service
    ) {
        //最新期数
        $issue = $cModel->getCurrentIssue();
        //今日新增楼盘
        $cnt = $hModel->getNewly();
        //今日新增楼盘明细
        $detail_cnt = $eModel->getNewly();
        //最新车牌竞价
        $bInfo = $bModel->getLastInfo(['issue', 'personal_price', 'company_price']);
        //摇号楼盘新增
        $lcnt = $lModel->getNewly();
        //摇号楼盘中签数新增
        $lucky_cnt = $hlModel->getNewly();
        //爬虫监控
        $s_mon = $service->getSpiderMonitor();
        //front
        $frontStat = $service->getSiteData(config('baidu_tongji.front_site_id'));
        //获取今日天气
        $weather = $service->getWeather();
        request()->session()->put('weather', $weather);
        request()->session()->save();

        $ret = [
            'issue' => $issue,
            'cnt' => $cnt,
            'detail_cnt' => $detail_cnt,
            'bInfo' => $bInfo,
            'lcnt' => $lcnt,
            'lucky_cnt' => $lucky_cnt,
            'frontStat' => $frontStat,
            's_mon' => $s_mon
        ];
        return view('admin.home.index', $ret);
    }
}
