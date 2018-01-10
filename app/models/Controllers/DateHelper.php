<?php
/**
 * Created by PhpStorm.
 * User: School
 * Date: 02.01.2018
 * Time: 18:49
 */

namespace Models\Controllers;


class DateHelper
{

    public function convert($created_at){
        $stt = strtotime($created_at);

        $year = Date("Y", $stt);
        $month = Date("n", $stt);
        $day = Date("j", $stt);

        switch ($month){
            case 1:
                $month = "Styczeń";
                break;
            case 2:
                $month = "Luty";
                break;
            case 3:
                $month = "Marzec";
                break;
            case 4:
                $month = "Kwiecień";
                break;
            case 5:
                $month = "Maj";
                break;
            case 6:
                $month = "Czerwiec";
                break;
            case 7:
                $month = "Lipiec";
                break;
            case 8:
                $month = "Sierpień";
                break;
            case 9:
                $month = "Wrzesień";
                break;
            case 10:
                $month = "Październik";
                break;
            case 11:
                $month = "Listopad";
                break;
            case 12:
                $month = "Grudzień";
                break;
        }



        echo "$day $month $year";
    }
}