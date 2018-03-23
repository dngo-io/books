<?php

if (! function_exists('reputation')) {
    /**
     * Calculates Steem reputation
     * ((log10(abs(reputation))-9)9)+25
     *
     * @param int $rep
     * @return int
     */
    function reputation(int $rep)
    {
        $reputation_level = 25;
        $neg = false;

        if ($rep < 0)
            $neg = true;

        if ($rep != 0)
        {
            $reputation_level = log10(abs($rep));
            $reputation_level = max($reputation_level - 9, 0);

            if ($reputation_level < 0)
                $reputation_level = 0;

            if ($neg)
                $reputation_level *= -1;

            $reputation_level = ($reputation_level*9) + 25;
        }

        return floor($reputation_level);
    }
}

if (! function_exists('author')) {
    /**
     * Display author's name with @
     *
     * @param string $author
     * @param null $reputation
     * @return string
     */
    function author(string $author, $reputation = null)
    {
        $return = "@{$author}";

        if(!is_null($reputation))
        {
            $return .= ' ('.reputation($reputation).')';
        }

        return $return;
    }
}

if (! function_exists('payout')) {
    /**
     * Display payout,
     *
     * @param string $payout
     * @return string
     */
    function payout($payout)
    {
        $payout = explode(' ', $payout);

        return '$ '.round($payout[0], 2);
    }
}