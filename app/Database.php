<?php

namespace App;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    /**
     * Database constructor.
     */
    function __construct()
    {

        $capsule = new Capsule;

        $capsule->addConnection([
            "driver" => DBDRIVER,
            "host" => DBHOST,
            "database" => DBNAME,
            "username" => DBUSER,
            "password" => DBPASS,
            "charset" => "utf8",
            "collation" => "utf8_polish_ci",
            "prefix" => "",
        ]);


        $capsule->bootEloquent();
    }
}