<?php

namespace App;


use Models\FacebookUser;

class View
{
    private static function url()
    {
        return sprintf(
            "%s://%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['SERVER_NAME']
        );
    }

    private static function getLoader()
    {
        return new \Twig_Loader_Filesystem(TEMPLATE);
    }

    private static function getTwig()
    {
        $tw = new \Twig_Environment(self::getLoader(), array());

        $twig_gvars = include __DIR__ . '/configs/GlobalTemplateVariables.php';

        foreach ($twig_gvars as $gvar) {
            if (is_string($gvar[1]))
                $gvar[1] = str_replace("url", self::url(), $gvar[1]);

            $tw->addGlobal($gvar[0], $gvar[1]);
        }

        if (isset($_SESSION['user'])) {
            $tw->addGlobal('logged', $_SESSION['user'] != 0 ? 1 : 0);
            if ($_SESSION['user'] != 0)
                $tw->addGlobal('user', FacebookUser::query()->where('uid', $_SESSION['user'])->first());
        } else         $tw->addGlobal('logged', 0);


        return $tw;
    }

    public static function make($template_name, $variables = array())
    {
        return self::getTwig()->render($template_name, $variables);
    }
}