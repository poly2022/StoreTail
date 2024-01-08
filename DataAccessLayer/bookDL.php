<?php

include('../BusinessLayer/Book/bookBL.php'); // Inclui a classe BookBL da camada de negócios
include('conectionBD.php'); // Inclui arquivo de conexão com o banco de dados

class BookDL {
    private $conn; // Propriedade para armazenar a conexão com o banco de dados

    // Construtor da classe que recebe uma conexão como parâmetro
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Método para obter informações dos livros a partir do banco de dados
    public function getBooks() {
        // Consulta SQL para selecionar informações básicas dos livros da tabela 'books'
        $sql = "SELECT id, title, cover_url, access_level FROM books";
        $result = $this->conn->query($sql); // Executa a consulta usando a conexão

        $books = []; // Array para armazenar os objetos de livro

        // Verifica se a consulta foi bem-sucedida e se há resultados
        if ($result && $result->num_rows > 0) {
            // Loop pelos resultados obtidos
            while($row = $result->fetch_assoc()) {
                // Cria um novo objeto BookBL para cada registro retornado da consulta
                $book = new BookBL($row['id'], $row['title'], $row['cover_url'], $row['access_level']);
                $books[] = $book; // Adiciona o objeto de livro ao array $books
            }
        }

        return $books; // Retorna o array de objetos de livro
    }
}