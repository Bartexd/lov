<?php
/**
 * Created by PhpStorm.
 * User: School
 * Date: 29.11.2017
 * Time: 17:36
 */

namespace App;


class RouteMiddleware
{

    public static function call_controller($function, $parameter = null, $_ = null)
    {
        try {

            self::display_page(call_user_func($function,
                                               $parameter,
                                               $_));

        } catch (\Exception $e)
        {
            die($e->getMessage());
        }

    }


    private static function display_page($rendered_page)
    {
        echo $rendered_page;
    }

}