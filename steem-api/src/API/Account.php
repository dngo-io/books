<?php
namespace SteemAPI;

class Account extends Query
{
    /**
     * Get accounts
     *
     * @param array $accounts
     * @return array
     */
    public function accounts(array $accounts)
    {
        $request = [
            'route' => 'get_accounts',
            'query' =>
                [
                    'names' => $accounts,
                ]
        ];

        return parent::call($request);
    }

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

    /**
     * Get account count
     *
     * @return array
     */
    public function accountCount()
    {
        $request = [
            'route' => 'get_account_count'
        ];

        return parent::call($request);
    }
}