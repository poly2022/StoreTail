<?php 
class UserService {
  
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function getUserProfile($id) {
        $query = "SELECT * FROM users WHERE id = '$id'";
        $result = mysqli_query($this->conexao, $query);

        if ($result) {
            $profileData = mysqli_fetch_assoc($result);
            return $profileData;
        } else {
            return false;
        }
    }

    // Adicione métodos adicionais conforme necessário
}
?>