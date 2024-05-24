<?php

if (!function_exists('p')) {
    function p($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}
if (!function_exists('get_formatted_date')) {
    function get_formatted_date($date, $format)
    {
        $formatted_date = date($format, strtotime($date));
        return $formatted_date;
    }
}
