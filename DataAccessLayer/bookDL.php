<?php

include('../BusinessLayer/Book/bookBL.php');
include('conectionBD.php');

class BookDL {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getBooks() {
        $sql = "SELECT title, cover_url, access_level FROM books";
        $result = $this->conn->query($sql);

        $books = [];

        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $book = new BookBL($row['title'], $row['cover_url'], $row['access_level']);
                $books[] = $book;
            }
        }

        return $books;
    }
}
