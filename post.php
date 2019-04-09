<?php

class Post {

    public $date = '';
    public $popname = '';

    // @todo replace with reference to user model
    public $username = '';
    public $text = ''; 

    public $rawPost = '';

    public function __construct($rawPost = null) {
        if (null !== $rawPost) {
            $parsedPost = $this->parsePost($rawPost);
            $this->$date = $parsedPost['date'];
            $this->$popname = $parsedPost['popname'];
            $this->$username = $parsedPost['username'];
            $this->$text = $parsedPost['text'];
            $this->$raw = $parsedPost['raw'];
        }
    }

    public function parseUserline($raw) {
        return [];
    }
    /**
     * transforms a text for a post into it's component parts
     * 
     *
     * @param string $rawPost
     * @return array
     */
    public function parsePost($rawPost) {
        $post = [];
        $post['raw'] = $rawPost;
        $explodedPost = explode("\n", $rawPost);

        // user / popname
        if ((strlen($explodedPost[1]) > 0)) {
            $post['username'] = $explodedPost[1];
        }

        // date
        if (strlen($explodedPost[0]) > 0) {
            $post['date'] = $explodedPost[0];
        }
        
        var_dump($post);
        return $post;
    }
}