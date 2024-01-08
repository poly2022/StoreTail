<?php
include('../Interface/Header.php');
include('../BusinessLayer/Book/bookBL.php');
include('conectionBD.php');

class SearchBook {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getBooks() {
        if(isset($_POST['Submit-Search'])){
            $search = mysqli_real_escape_string($this->conn, $_POST['search']);
        $sql = "SELECT id, title, cover_url, access_level FROM books Where title LIKE '%$search%'";
        $result = $this->conn->query($sql);
}
        $books_Search = [];

        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $book = new BookBL($row['id'], $row['title'], $row['cover_url'], $row['access_level']);
                $books_Search[] = $book;
            }
        }
    
        return $books_Search;
    }
}
