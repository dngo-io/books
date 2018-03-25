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

if (! function_exists('parse_md')) {
    /**
     * Parse markdown content
     *
     * @param $content
     * @return string
     */
    function parse_md($content)
    {
        $api = app('Parsedown');

        return $api->text($content);
    }
}

