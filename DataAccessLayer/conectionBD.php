<?php
// $servername = "localhost";
// $database = "store_tail";
// $username = "root";
// $password = "";

// $conexao = new mysqli($servername, $username, $password, $database);
// if ($conexao->connect_errno) {
//   echo "Falha ao conectar: (" . $conexao->connect_errno . ")" . $conexao->connect_error;
// }
// else
// "Conectado!";
?>
<?php
// session_start();
// $host = "localhost";
// $user = "root";
// $pwd = "";
// $db = "store_tail";
// $conexao = mysqli_connect($host, $user, $pwd) or die ("Não consegui fazer a conexão a base de dados");
// mysqli_select_db($conexao,$db);

?>
<?php
// DataAccessLayer/conectionBD.php

class Database {
    private $conexao;

    public function __construct() {
        $this->conexao = mysqli_connect("localhost", "root", "", "store_tail");
        if (!$this->conexao) {
            die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
        }
    }

    public function query($sql) {
        return mysqli_query($this->conexao, $sql);
    }

    public function fetchAssoc($result) {
        return mysqli_fetch_assoc($result);
    }
}
?>
