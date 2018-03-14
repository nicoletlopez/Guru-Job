<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    static function formatDate($theDate){
        $format = 'Y-m-d';
        $date = DateTime::createFromFormat($format, $theDate);
        return $date->format('F j, Y');
    }
    static function unformatDate($theDate){
        $format='F j, Y';
        $date=DateTime::createFromFormat($format,$theDate);
        return $date->format('Y-m-d');
    }
    static function formatDateTime($theDate){
        $format = 'Y-m-d H:i:s';
        $date = DateTime::createFromFormat($format, $theDate);
        return $date->format('F j, Y \a\t H:i a');
    }
    function numberToDays($num)
    {

        if ($num === 0) {
            return 'TBH';
        }

        $days = array();

        if ($num >= 64) {
            array_push($days, "Sun");
            $num -= 64;
        }

        if ($num >= 32) {
            array_push($days, "Mon");
            $num -= 32;
        }

        if ($num >= 16) {
            array_push($days, "Tue");
            $num -= 16;
        }

        if ($num >= 8) {
            array_push($days, "Wed");
            $num -= 8;
        }

        if ($num >= 4) {
            array_push($days, "Thu");
            $num -= 4;
        }

        if ($num >= 2) {
            array_push($days, "Fri");
            $num -= 2;
        }

        if ($num >= 1) {
            array_push($days, "Sat");
            $num -= 1;
        }

        return $days;
    }
}
