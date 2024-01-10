<?php

class Author {
    private $id;
    private $First_name;
    private $Last_name;
    private $description;
    private $author_photo_url;
    private $nationality;

    public function __construct($id, $First_name, $Last_name, $description, $author_photo_url, $nationality) {
        $this->id = $id;
        $this->First_name = $First_name;
        $this->Last_name = $Last_name;
        $this->description = $description;
        $this->author_photo_url = $author_photo_url;
        $this->nationality = $nationality;
    }

    public function getid() {
        return $this->id;
    }

    public function getFirst_name() {
        return $this->First_name;
    }

    public function getLast_name() {
        return $this->Last_name;
    }

    public function getdescription() {
        return $this->description;
    }

    public function getauthor_photo_url() {
        return $this->author_photo_url;
    }

    public function getnationality() {
        return $this->nationality;
    }
}