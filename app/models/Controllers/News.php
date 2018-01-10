<?php

namespace Models\Controllers;

class News extends \Models\News
{

    public static function getNewsPage($page = 1)
    {
        return self::latest()->skip(($page - 1) * APP_NEWS_PER_PAGE)->take(APP_NEWS_PER_PAGE)->get();
    }

    public static function createNews($user_id,
                                      $title,
                                      $Scontent,
                                      $Lcontent = "",
                                      $subtitle = "",
                                      $gallery_id = 0)
    {
        return self::create(["user_id" => $user_id,
                             "gallery_id" => $gallery_id,
                             "title" => $title,
                             "subtitle" => $subtitle,
                             "content-short" => $Scontent,
                             "content-long" => $Lcontent]);
    }
    public static function how_many_pages()
    {
        return ceil(self::count()/APP_NEWS_PER_PAGE);
    }
}