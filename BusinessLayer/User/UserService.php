<?php
class UserService {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function getUserProfile($id) {
        $query = "SELECT * FROM users WHERE id = '$id'";
        $result = mysqli_query($this->conexao, $query);

        while ($registro = mysqli_fetch_assoc($result)) {
            $profileData = [
                'first_name' => $registro['first_name'],
                'last_name' => $registro['last_name'],
                'user_name' => $registro['user_name'],
                'email' => $registro['email'],
            ];
        }

        return $profileData;
    }
    }

   

?>