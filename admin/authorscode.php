<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['addAuthors']))
{
    $firstname = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $description = $_POST['description'];
    $author_photo_url = $_POST['author_photo_url'];
    $nationality = $_POST['nationality'];

    $author_query = "INSERT INTO authors (first_name,last_name,description,author_photo_url,nationality) VALUES ('$firstname','$last_name','$description','$author_photo_url','$nationality')";
    $author_query_run = mysqli_query($con, $author_query);

    if($author_query_run)
    {
        $_SESSION['status'] = "Book Added Successfully";
        header("Location: authors.php");
    }
    else
    {   
        $_SESSION['status'] = "Book Added Failed";
        header("Location: authors.php");
    }
}

if(isset($_POST['UpdateAuthor']))
{
    $author_id = $_POST['author_id'];
    $firstname = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $description = $_POST['description'];
    $author_photo_url = $_POST['author_photo_url'];
    $nationality = $_POST['nationality'];

    $query = "UPDATE authors firstname = '$firstname', last_name = '$last_name' , description = '$description' , author_photo_url = '$author_photo_url' , nationality = '$nationality'  WHERE id = '$author_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Author Update Successfully";
        header("Location: authors.php");
    }
    else
    {   
        $_SESSION['status'] = "Author Update Failed";
        header("Location: authors.php");
    }
}
?>