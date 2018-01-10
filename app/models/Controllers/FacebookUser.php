<?php
/**
 * Created by PhpStorm.
 * User: School
 * Date: 13.12.2017
 * Time: 16:20
 */

namespace Models\Controllers;


class FacebookUser extends \Models\FacebookUser
{

    static function exist($first_name, $last_name, $email)
    {
        return self::where('first_name', '=', $first_name)
                   ->where('last_name', '=', $last_name)
                   ->where('email', '=', $email)->count() == 1 ? true : false;
    }

    static function createUser($first_name, $last_name, $email, $picture, $ip)
    {
        if (!self::exist($first_name, $last_name, $email)) {
            return self::insertGetId([
                             "first_name" => $first_name,
                             "last_name" => $last_name,
                             "email" => $email,
                             "picture" => $picture,
                             "ip_address" => $ip
                         ]);

        }
        return self::where('first_name', '=', $first_name)
                   ->where('last_name', '=', $last_name)
                   ->where('email', '=', $email)->first()['uid'];
    }

}