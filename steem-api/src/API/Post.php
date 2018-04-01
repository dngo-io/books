<?php
namespace SteemAPI;


class Post extends Query
{
    /**
     * Get content
     *
     * @param string $author    Author's account name
     * @param string $permalink Post's permalink
     * @return array
     */
    public function getContent(string $author, string $permalink)
    {
        $request = [
            'route' => 'get_content',
            'query' =>
                [
                    'author'   => $author,
                    'permlink' => $permalink,
                ]
        ];

        return parent::call($request);
    }

    /**
     * Get votes
     *
     * @param string $author    Author's account name
     * @param string $permalink Post's permalink
     * @return array
     */
    public function getVotes(string $author, string $permalink)
    {
        $request = self::getContent($author, $permalink);

        if(isset($request['active_votes']) && is_array($request['active_votes']))
        {
            return $request['active_votes'];
        }

        return [];
    }

    /**
     * Get content replies
     *
     * @param string $author    Author's account name
     * @param string $permalink Post's permalink
     * @return array
     */
    public function getContentReplies(string $author, string $permalink)
    {
        $request = [
            'route' => 'get_content_replies',
            'query' =>
                [
                    'author'   => $author,
                    'permlink' => $permalink,
                ]
        ];

        return parent::call($request);
    }

    /**
     * Get all content replies
     *
     * @param string $author    Author's account name
     * @param string $permalink Post's permalink
     * @return array
     */
    public function getContentAllReplies(string $author, string $permalink)
    {
        $request = $this->getContentReplies($author, $permalink);

        foreach ($request as $key => $item)
        {
            if($item['children'] > 0)
                $request[$key]['replies'] = $this->getContentAllReplies($item['author'], $item['permlink']);
            else
                $request[$key]['replies'] = [];
        }

        return $request;
    }
}