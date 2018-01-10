<?php

namespace Controllers;


use App\View;

class news implements Controller
{

    public function delete($args = [])
    {
        // TODO: Implement delete() method.
    }

    public function index($args = [])
    {

        return View::make("news.twig",
                          ["news" => \Models\News::query()->where('news_id','=', $args['id'])->first(),
                           "status" => isset($_GET['status']) ? 1 : 0]);
    }

    public function get($args = [])
    {
        // TODO: Implement get() method.
    }

    public function post($args = [])
    {
        // TODO: Implement post() method.
    }

    public function patch($args = [])
    {
        // TODO: Implement patch() method.
    }

    public function update($args = [])
    {
        // TODO: Implement update() method.
    }
}