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
     * Get followers
     *
     * @param string $following     Account name
     * @param string $startFollower Account name from followers for pagination
     * @param string $followType    Follow type
     * @param int    $limit         Size of array for pagination
     * @return array
     */
    public function followers(string $following, string $startFollower = null, string $followType = null, int $limit = null)
    {
        $startFollower = is_null($startFollower) ? ''     : $startFollower;
        $followType    = is_null($followType)    ? 'blog' : $followType;
        $limit         = is_null($limit)         ? 10     : $limit;

        $request = [
            'route' => 'get_followers',
            'query' =>
                [
                    'following'     => $following,
                    'startFollower' => $startFollower,
                    'followType'    => $followType,
                    'limit'         => $limit,
                ]
        ];

        return parent::call($request);
    }

    /**
     * Get following
     *
     * @param string $follower      Account name
     * @param string $startFollower Account name from followers for pagination
     * @param string $followType    Follow type
     * @param int    $limit         Size of array for pagination
     * @return array
     */
    public function following(string $follower, string $startFollower = null, string $followType = null, int $limit = null)
    {
        $startFollower = is_null($startFollower) ? ''     : $startFollower;
        $followType    = is_null($followType)    ? 'blog' : $followType;
        $limit         = is_null($limit)         ? 10     : $limit;

        $request = [
            'route' => 'get_following',
            'query' =>
                [
                    'follower'      => $follower,
                    'startFollower' => $startFollower,
                    'followType'    => $followType,
                    'limit'         => $limit,
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