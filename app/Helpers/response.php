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

        foreach ($array as $item)
        {
            $return[] = [
                'id'   => $item,
                'text' => $item,
            ];
        }

        return $return;
    }
}