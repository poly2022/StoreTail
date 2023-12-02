<?php
// Controller/UserController.php
require_once("../DataAccessLayer/conectionBD.php");

class UserController {
    private $db;

    public function __construct($conn) {
        $this->db = $conn;
    }

    public function registerUser($first_name, $last_name, $user_name, $email, $password, $confirm_password) {
        // Lógica de validação
        $flag_password = false;
        // ...

        if ($flag_password) {
            return "Senha diferente!";
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (user_types_id, first_name, last_name, user_name, email, password) VALUES (1, '$first_name', '$last_name', '$user_name', '$email', '$password')";
            $result = $this->db->query($sql);

            if ($result) {
                return "Parabéns $first_name! Realizou o seu registo com sucesso.";
            } else {
                return "Dados não inseridos!";
            }
        }
    }
}
?>
