<?php

class Article
{
    public $title;
    public $image;
    public $body;
    public $admin_id;

    public function __construct($title, $image, $body, $admin_id)
    {
        $this->title = $title;
        $this->image = $image;
        $this->body = $body;
        $this->admin_id = $admin_id;
    }
}
