<?php
/**
 * Created by PhpStorm.
 * User: School
 * Date: 21.12.2017
 * Time: 22:37
 */

namespace Models\Controllers;


class SiteRouteHelper
{
    private static function url(){
        return sprintf(
            "%s://%s/",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['SERVER_NAME']
        );
    }

    public static function find($site_id)
    {
        $g = \Models\Sites::query()->where('uid', $site_id)->limit(1)->get()->first();

        $ret[0] = $g['route_name'];
        $ret[1] = $g['site_title'];

        return $ret;
    }

    public static function li($site_id)
    {
        $g = \Models\Sites::query()->where('uid', $site_id)->limit(1)->get()->first();

        echo "<li><a href=\"" . self::url() . $g['route_name'] . "\">" . $g['site_title'] . "</a></li>";
    }

}