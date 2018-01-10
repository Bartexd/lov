<?php

namespace Controllers;

use App\View;
use Models\Controllers\News;
use Models\Gallery;

class home implements Controller
{

    public function index($args = [])
    {
//        $last = Gallery::query()->insertGetId(["thumb_url" => "",
//                                  "photos_uid" => 1]);
//
//        $title = "";
//
//        \Models\News::query()->create(["user_id" => 1,
//                                       "gallery_id" => $last,
//                                       "title" => $title,
//                                       "subtitle" => "",
//                                       "content-short" => "<p></p>",
//                                       "content-long" => "<p></p>"]);






        return View::make("home.twig",
                          ["news" => News::getNewsPage(1),
                           "how_many_pages" => News::how_many_pages(),
                           "current_page" => 1]);
    }

    public function indexPage($args = [])
    {
        return View::make("home.twig", ["news" => News::getNewsPage($args['id']),
                                        "how_many_pages" => News::how_many_pages(),
                                        "current_page" => $args['id']]);
    }

    public function create($args = [])
    {
        // TODO: Implement create() method.
    }

    public function update($args = [])
    {
        // TODO: Implement update() method.
    }

    public function delete($args = [])
    {
        // TODO: Implement delete() method.
    }

    public function post($args = [])
    {
        // TODO: Implement post() method.
    }

    public function patch($args = [])
    {
        // TODO: Implement patch() method.
    }

    public function get($args = [])
    {
        // TODO: Implement get() method.
    }
}