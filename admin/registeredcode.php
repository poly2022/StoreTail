<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['addUser']))
{
    $firstname = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_photo_url = $_POST['user_photo_url'];
    
    // Certifique-se de que o campo no formulário corresponde ao nome do campo na tabela
    $user_type_id = $_POST['user_type_id'];

    $user_types_mapping = [
        'guest' => 1,
        'common' => 2,
        'admin' => 3,
        'client' => 4
    ];

    // Depuração: verifique se $user_type_id está sendo enviado corretamente
    echo "User Type ID: " . $user_type_id;

    if(isset($user_types_mapping[$user_type_id])) {
        // Depuração: verifique se $user_type_id está mapeado corretamente
        echo "Mapped User Type ID: " . $user_types_mapping[$user_type_id];

        // Use o valor mapeado do user_type para o user_type_id
        $user_type_id = $user_types_mapping[$user_type_id];

        $user_query = "INSERT INTO users (first_name,last_name,user_name,email,password,user_photo_url,user_type_id) VALUES ('$firstname','$last_name','$user_name','$email','$password','$user_photo_url','$user_type_id')";
        $user_query_run = mysqli_query($con, $user_query);

        if($user_query_run)
        {
            $_SESSION['status'] = "User Added Successfully";
            header("Location: registered.php");
        }
        else
        {   
            $_SESSION['status'] = "User Registration Failed";
            header("Location: registered.php");
        }
    }
    else
    {
        // Tipo de usuário fornecido não é válido
        $_SESSION['status'] = "Invalid User Type";
        header("Location: registered.php");
    }
}

if(isset($_POST['UpdateUser']))
{
    $user_id = $_POST['user_id'];
    $user_type_id = $_POST['user_type_id'];
    $firstname = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_photo_url = $_POST['user_photo_url'];

    $query = "UPDATE users user_type_id = '$user_type_id', firstname = '$firstname' , last_name = '$last_name' , user_name = '$user_name' ,email = '$email' , password = '$password' ,user_photo_url = '$user_photo_url'  WHERE id = '$book_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "User Update Successfully";
        header("Location: user.php");
    }
    else
    {   
        $_SESSION['status'] = "User Update Failed";
        header("Location: user.php");
    }
}
?>