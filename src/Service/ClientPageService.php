<?php
/**
 * Created by PhpStorm.
 * User: x
 * Date: 2019-03-06
 * Time: 14:45
 */

namespace X1024\Laravel\Services;


use X1024\Laravel\Utils\Common;

class ClientPageService extends ServiceBase
{

    public function loadPage($key)
    {
//        if ($page = ClientPage::normal()->whereAppType(ClientPage::AppType_WXApp)->where('key', $key)
//            ->apiSelect()
//            ->first()) {
//
//            $page->modules = ClientPageModule::normal()->where('page_id', $page->id)->apiSelect()->withContents()->orderByDesc('sort')->get();
//        }
//        return $page;
    }


    public static function makePageMode($title, $navigationBarFrontColor = null, $navigationBarBackgroundColor = null, $backgroundColor = null, $backgroundTextStyle = null)
    {
        $pageMode = [];
        $navigationBar = [];

        Common::setTrueValue($pageMode, 'title', $title);
        Common::setTrueValue($navigationBar, 'frontColor', $navigationBarFrontColor);
        Common::setTrueValue($navigationBar, 'backgroundColor', $navigationBarBackgroundColor);
        Common::setTrueValue($pageMode, 'navigationBar', $navigationBar);
        Common::setTrueValue($pageMode, 'backgroundColor', $backgroundColor);
        Common::setTrueValue($pageMode, 'backgroundTextStyle', $backgroundTextStyle);

        return $pageMode;
    }
}