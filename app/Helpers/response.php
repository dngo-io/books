<?php

if (! function_exists('select2fy')) {
    /**
     * Make simple arrays select2 friendly
     *
     * @param array $array
     * @return array
     */
    function select2fy(array $array)
    {
        $return = [];

        foreach ($array as $item) {
            $return[] = [
                'id' => $item,
                'text' => $item,
            ];
        }

        return $return;
    }
}

if (! function_exists('remote_path')) {
    /**
     * Fix remote file location
     *
     * @param string $file
     * @return string
     */
    function remote_path(string $file)
    {
        return starts_with($file, '/') ? substr($file, 1, strlen($file)) : $file;
    }
}

if (! function_exists('downloadable')) {
    /**
     * Elect files
     *
     * @param array $files
     * @return array
     */
    function downloadable(array $files)
    {
        $download = [];

        foreach ($files as $file)
        {
            foreach ($file as $key => $item)
            {
                if(in_array($key, ['text','zip', 'hypertext']))
                {
                    $download[] = [
                        'type' => str_replace(['hypertext', 'text'], ['html', 'doc'], $key),
                        'file' => basename($item),
                        'path' => $item,
                    ];
                }

            }
        }

        return $download;
    }
}
