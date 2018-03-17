<?php

if (! function_exists('format_date')) {
    /**
     * Date formatting
     *
     * @param string $time
     * @param string $format
     * @return false|string
     */
    function format_date($time, $format = 'M d, Y')
    {
        return date($format, strtotime($time));
    }
}