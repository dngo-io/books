<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Steem Defaults
    |--------------------------------------------------------------------------
    |
    */

    'node' => env('STEEM_NODE', 'https://steemd-int.steemit.com'),
    /**
     * ALTERNATIVES
     *
     * - https://gtg.steem.house:8090/
     * - https://steemd.steemitdev.com/
     * - https://steemd-int.steemit.com/
     * - https://seed.bitcoiner.me/
     * - https://steemd.privex.io/
     */
    'account' => env('STEEM_ACCOUNT'),
    'about' => env('STEEM_ABOUT'),
    'rules' => env('STEEM_RULES'),
    'how_to' => env('STEEM_HOW_TO'),

];
