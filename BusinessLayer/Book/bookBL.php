<?php

class BookBL {
    private $id;
    private $title;
    private $cover_url;
    private $access_level;

    public function __construct($id, $title, $cover_url, $access_level) {
        $this->id = $id;
        $this->title = $title;
        $this->cover_url = $cover_url;
        $this->access_level = $access_level;
    }

    public function getID() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getCoverUrl() {
        return $this->cover_url;
    }

    public function getAccessLevel() {
        return $this->access_level;
    }
}