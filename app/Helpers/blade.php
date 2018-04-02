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


if (! function_exists('markdown')) {
    /**
     * Parse markdown content
     *
     * @param $content
     * @return string
     */
    function markdown($content)
    {
        return \Michelf\Markdown::defaultTransform($content);
    }
}


if (! function_exists('get_steem_pp')) {
    /**
     * Gets and fits Steemit profile picture
     *
     * @param string $profileImg
     * @param int $size
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    function get_steem_pp(string $profileImg, int $size = 100)
    {
        return url("image?src=".urlencode(sprintf("https://steemitimages.com/0x0/%s",$profileImg))."&size={$size}");
    }
}

