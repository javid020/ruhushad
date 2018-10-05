<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Analytics\AnalyticsFacade as Analytics;
use Spatie\Analytics\Period;

class AnalyticsController extends Controller
{
    public function index() {

        $arrayOfPageAndViews = array();
        $arrayOfUsers = array();

        $browsers = Analytics::fetchTopBrowsers(Period::days(30), 10);
        $totalVisitors = Analytics::fetchTotalVisitorsAndPageViews(Period::days(0));
        $pageViews = Analytics::fetchVisitorsAndPageViews(Period::days(0));

        foreach ($pageViews as $pageView) {
            $arrayOfPageAndViews[$pageView['pageTitle']] = $pageView['pageViews'];
        }
        $theMaxPageViewAndTitle = array_keys($arrayOfPageAndViews, max($arrayOfPageAndViews));


        $totalUsersTillNow = Analytics::fetchTotalVisitorsAndPageViews(Period::years(1));

        foreach ($totalUsersTillNow as $total) {
            array_push($arrayOfUsers, $total['visitors']);
        }

        $numberOfUsersTillNow = array_sum($arrayOfUsers);


        $data = array(
            'browsers' => $browsers,
            'totalVisitors' => $totalVisitors,
            'theMaxPageViewAndTitle' => $theMaxPageViewAndTitle,
            'numberOfUsersTillNow' => $numberOfUsersTillNow
        );


        return view('vendor.backpack.base.dashboard')->with($data);
    }
}
