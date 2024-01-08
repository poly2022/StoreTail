<?php

class BookBL {
    // Propriedades para armazenar os dados dos livros
    private $id;
    private $title;
    private $cover_url;
    private $access_level;

    // Construtor da classe que recebe as informações do livro como parâmetros (informações da base de dados)
    public function __construct($id, $title, $cover_url, $access_level) {
        // Atribui os valores recebidos aos atributos da classe
        $this->id = $id;
        $this->title = $title;
        $this->cover_url = $cover_url;
        $this->access_level = $access_level;
    }

    // Métodos para obter cada informação específica do livro
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