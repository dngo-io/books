<?php

namespace Steem;

class Operations
{

    /**
     * Vote
     *
     * @param string $voter     Voting user
     * @param string $author    Up-voted user
     * @param string $permalink Permalink of the post
     * @param int    $weight    Voting weight
     * @return array
     */
    public function vote(string $voter, string $author, string $permalink, int $weight)
    {
        $request = [
            'operations' =>
                [
                    [
                        'vote',
                        [
                            'voter'    => $voter,
                            'author'   => $author,
                            'permlink' => $permalink,
                            'weight'   => (int) $weight,
                        ]
                    ]
                ]
        ];

        return $request;
    }

    /**
     * New post
     *
     * @param string $author The author who is posting
     * @param string $title  Post title, the permalink is gonna be created by title
     * @param string $body   Body of the post
     * @param array  $tags   Array of tags
     * @param string $app    Name of the application in use for the post
     * @return array
     */
    public function post(string $author, string $title, string $body, array $tags, string $app = '')
    {
        $first_tag = Helpers::slug(array_shift($tags));
        $shorty    = Helpers::limit($title, 35);
        $permalink = Helpers::slug($shorty).'-'.time();
        $metadata  = [];

        if (count($tags) > 0)
        {
            $metadata['tags'] = $tags;
        }
        if (!empty($app))
        {
            $metadata['app'] = $app;
        }

        $metadata  = json_encode($metadata);
        $request   = [
            'operations' =>
                [
                    [
                        'comment',
                        [
                            'parent_author'   => '',
                            'parent_permlink' => $first_tag,
                            'author'          => $author,
                            'permlink'        => $permalink,
                            'title'           => $title,
                            'body'            => $body,
                            'json_metadata'   => empty($metadata) ? '' : $metadata
                        ]
                    ]
                ]
        ];

        return $request;
    }

    /**
     * New comment
     *
     * @param string $parent_author   Original poster or "parent author"
     * @param string $parent_permlink Original post permalink or "parent permalink"
     * @param string $author          The author who is posting
     * @param string $permlink        Permalink for the comment
     * @param string $body            Body of the post
     * @param string $app             Name of the application in use for the post
     * @return array
     */
    public function comment(string $parent_author, string $parent_permlink, string $author, string $permlink, string $body, string $app = '')
    {
        $permlink  = Helpers::limit($permlink, 35);
        $permalink = Helpers::slug($permlink).'-'.time();
        $metadata  = [];

        if (!empty($app))
        {
            $metadata['app'] = $app;
        }

        $metadata  = json_encode($metadata);
        $request   = [
            'operations' =>
                [
                    [
                        'comment',
                        [
                            'parent_author'   => $parent_author,
                            'parent_permlink' => $parent_permlink,
                            'author'          => $author,
                            'permlink'        => $permalink,
                            'title'           => '',
                            'body'            => $body,
                            'json_metadata'   => empty($metadata) ? '' : $metadata
                        ]
                    ]
                ]
        ];

        return $request;
    }
}