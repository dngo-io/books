<?php
namespace SteemAPI;


class Account
{
    /**
     * Get follow count
     *
     * @param string $account Account name
     * @return array
     */
    public function followCount(string $account)
    {
        $request = [
            'route' => 'get_follow_count',
            'query' =>
                [
                    'account' => $account,
                ]
        ];

        return $request;
    }

}