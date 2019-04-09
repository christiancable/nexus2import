<?php


class Topic
{
    CONST POSTSTART = "\e\1";
    
    private $rawPosts = [];
    private $posts = [];

    function __construct($raw) {
        $this->rawPosts = $this->split($raw);
        $this->posts = $this->parsePosts($this->rawPosts);
	}

    public static function split($raw) {
        $allPosts = explode("\e\1", $raw);
        return $allPosts;
    }

    public function parsePosts($posts) {
        return array_map(function($post) {
            $parsedPost = new Post($post);
            return $parsedPost;
        }, $posts);
    }

    public function getPosts() {
        return $this->posts;
    }

    public function getRawPosts() {
        return $this->rawPosts;
    }
}
