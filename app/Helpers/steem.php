<?php

if (! function_exists('reputation')) {
    /**
     * Calculates Steem reputation
     * ((log10(abs(reputation))-9)9)+25
     *
     * @param array|object $account
     * @return int
     */
    function reputation($account)
    {
        $reputation_level = 25;
        $neg = false;

        $rep = array_get($account,'reputation');

        if(is_null($rep))
        {
            $rep = array_get($account,'author_reputation');

            if(is_null($rep))
            {
                return 0;
            }
        }

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

if (! function_exists('source_to_account')) {
    /**
     * Get account name from the source
     *
     * @param array|object $author
     * @return string
     */
    function source_to_account($author)
    {
        $return = '';

        if(is_array($author))
        {
            $return .= array_get($author, 'name');

            if(!$return)
            {
                $return .= array_get($author, 'account');
            }
            if(!$return)
            {
                $return .= array_get($author, 'author');
            }
        } else {
            $return = $author->getAccount();
        }

        return $return;
    }
}

if (! function_exists('author')) {
    /**
     * Display author's name with @
     *
     * @param array|object $author
     * @param bool $reputation
     * @return string
     */
    function author($author, bool $reputation = true)
    {
        $return = source_to_account($author);

        $return = "@{$return}";

        $rep    = reputation($author);

        if($reputation === true && $rep > 0)
        {
            $return .= ' ('.$rep.')';
        }

        return $return;
    }
}

if (! function_exists('payout')) {
    /**
     * Display payout,
     *
     * @param  string $payout
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

if (! function_exists('member_since')) {
    /**
     * Display voting power
     *
     * @param array $account
     * @return float
     */
    function member_since($account)
    {
        $created = array_get($account, 'created');

        return format_date($created);
    }
}

if (! function_exists('is_upvoted')) {
    /**
     * Checks if the user liked the post
     *
     * @param array|object $account Account object or array
     * @param array        $votes   active_votes array
     * @return bool
     */
    function is_upvoted($account, $votes)
    {
        $account = source_to_account($account);

        if(is_array($votes))
        {
            foreach ($votes as $vote)
            {
                if(array_get($vote, 'voter') == $account)
                {
                    return true;
                }
            }
        }

        return false;
    }
}

if (! function_exists('is_commented')) {
    /**
     * Checks if the user commented to the post
     *
     * @param array|object $account  Account object or array
     * @param array        $comments Comment array
     * @return bool
     */
    function is_commented($account, $comments)
    {
        $_account = source_to_account($account);

        if(is_array($comments))
        {
            foreach ($comments as $comment)
            {
                if(array_get($comment, 'author') == $_account)
                {
                    return true;
                }

                if(is_commented($account, $comment) === true)
                {
                    return true;
                }
            }
        }

        return false;
    }
}

