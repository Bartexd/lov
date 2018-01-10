<?php
/**
 * Created by PhpStorm.
 * User: School
 * Date: 21.12.2017
 * Time: 21:54
 */

namespace Controllers;


use App\View;

class sites implements Controller
{

    public function delete($args = [])
    {
        // TODO: Implement delete() method.
    }

    public function index($args = [])
    {
        // TODO: Implement index() method.
    }

    public function get($args = [])
    {
        $q = \Models\Sites::query()->where("route_name", $args["site"])->first();

        return $q == null ? View::make("404.twig") : View::make("site.twig",["site" => $q]);
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