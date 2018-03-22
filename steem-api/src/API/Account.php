<?php
namespace SteemAPI;

class Account extends Query
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

        return parent::call($request);
    }
}