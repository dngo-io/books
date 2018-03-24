<?php

if (! function_exists('reputation')) {
    /**
     * Calculates Steem reputation
     * ((log10(abs(reputation))-9)9)+25
     *
     * @param array $account
     * @return int
     */
    function reputation(array $account)
    {
        $reputation_level = 25;
        $neg = false;
        $rep = array_get($account,'reputation');

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
     * @param array $author
     * @param bool $reputation
     * @return string
     */
    function author(array $author, $reputation = true)
    {
        $return = "@".array_get($author, 'name');

        if($reputation === true)
        {
            $return .= ' ('.reputation($author).')';
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

if (! function_exists('voting_power')) {
    /**
     * Display voting power
     *
     * @see https://steemit.com/utopian-io/@stoodkev/steem-js-for-dummies-1-how-to-calculate-the-current-voting-power
     *
     * @param array $account
     * @return float
     */
    function voting_power($account)
    {
        $last_vote_time = array_get($account, 'last_vote_time');
        $voting_power   = array_get($account, 'voting_power');

        $now  = \Carbon\Carbon::now()->timestamp;
        $ago  = $now - strtotime($last_vote_time);

        $vpow = $voting_power + (10000 * $ago / 432000);
        $vpow = round($vpow / 100,2);

        if($vpow > 100)
        {
            $vpow = 100;
        }

        return $vpow;
    }
}

if (! function_exists('voting_power')) {
    /**
     * Display voting power
     *
     * @param array $account
     * @return float
     */
    function voting_power($account)
    {
        $now  = \Carbon\Carbon::now();
        $ago  = $now - strtotime(array_get($account, 'last_vote_time'));
        $vpow = array_get($account, 'voting_power') + (10000 * $ago / 432000);
        $vpow = round($vpow,2);

        return $vpow;
    }
}

