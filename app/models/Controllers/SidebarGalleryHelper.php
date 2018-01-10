<?php
/**
 * Created by PhpStorm.
 * User: School
 * Date: 30.12.2017
 * Time: 21:26
 */

namespace Models\Controllers;


use Models\Settings;
use Models\SidebarGallery;

class SidebarGalleryHelper
{
    private static $gallery_id;
    private static $photos;


    function __construct()
    {
        self::$gallery_id = Settings::query()->select("value")->where("key", "=", "sidebar_gallery_display_id")->get()->first()["value"];
    }

    public static function get($gallery_id = -1)
    {
        if ($gallery_id == -1)
            self::$photos = SidebarGallery::query()->select("name", "url")->where("id", "=", self::$gallery_id)->get();
        else
            self::$photos = SidebarGallery::query()->select("name", "url")->where("id", "=", $gallery_id)->get();

        echo "<div class=\"slider\"><div>";

        foreach (self::$photos as $photo) {
            echo "<div><img src='" . $photo["url"] . "' alt=''></div>";
        }

        echo "</div></div>";
    }


}