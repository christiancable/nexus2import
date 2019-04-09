<?php

require 'post.php';
require 'topic.php';


$rawPosts = file_get_contents('IDEAS');

$topic = new Topic($rawPosts);

var_dump($topic->getPosts());
