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
    'bot' => env('STEEM_BOT', 'dngo-io'),
    'account' => env('STEEM_ACCOUNT','dngo'),
    'about' => env('STEEM_ABOUT','https://steemit.com/dngo-io/@dngo-io/dngo-and-dngo-books-proje-tanitimi'),
    'rules' => env('STEEM_RULES','rules'),
    'how_to' => env('STEEM_HOW_TO',''),


    'tag' => env('STEEM_TAG','dngo-io'),

];
