<?php
namespace SteemAPI;


class Post extends Query
{
    /**
     * Get content
     *
     * @param string $account Author's account name
     * @param string $permlink Post's permalink
     * @return array
     */
    public function getContent(string $author, string $permlink)
    {
        $request = [
            'route' => 'get_content',
            'query' =>
                [
                    'author'   => $author,
                    'permlink' => $permlink,
                ]
        ];

        return parent::call($request);
    }
}