<?php

if (!function_exists('get_today')) {
    function get_today()
    {
        if (!function_exists('jdate')) {
            include_once public_path('files/jdf.php');
        }
        $w = date('w');
        switch ($w) {
            case 1:
                $w = 'دوشنبه';
                break;
            case 2:
                $w = 'سه شنبه';
                break;
            case 3:
                $w = 'چهارشنبه';
                break;
            case 4:
                $w = 'پنجشنبه';
                break;
            case 5:
                $w = 'جمعه';
                break;
            case 6:
                $w = 'شنبه';
                break;
            case 7:
                $w = 'یکشنبه';
                break;
            default:
                $w = "";
                break;
        }
        $today = date("Y-m-d");
        $today = strtotime($today);
        $today = jdate('Y/m/d', $today);
        echo $today . ' - ' . $w;
    }
}