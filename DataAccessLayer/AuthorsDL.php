<?php

include('../BusinessLayer/Author/Author.php');
include('conectionBD.php');

class AuthorsDL {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAuthors() {
        $sql = "SELECT id, first_name, last_name, description, author_photo_url, nationality FROM authors";
        $result = $this->conn->query($sql);

        $authors = [];

        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $author =   new Author($row['id'], $row['first_name'], $row['last_name'], $row['description'], $row['author_photo_url'], $row['nationality']);
                $authors[] = $author;
            }
        }

        return $authors;
    }
}
