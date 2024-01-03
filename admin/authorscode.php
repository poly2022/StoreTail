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
        $_SESSION['status'] = "Author Added Successfully";
        header("Location: authors.php");
    }
    else
    {   
        $_SESSION['status'] = "Author Added Failed";
        header("Location: authors.php");
    }
}

if(isset($_POST['UpdateAuthor']))
{
    $author_id = mysqli_real_escape_string($con, $_POST['author_id']);
    $firstname = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $author_photo_url = mysqli_real_escape_string($con, $_POST['author_photo_url']);
    $nationality = mysqli_real_escape_string($con, $_POST['nationality']);

    $query = "UPDATE authors SET first_name = '$firstname', last_name = '$last_name' , description = '$description' , author_photo_url = '$author_photo_url' , nationality = '$nationality'  WHERE id = '$author_id'";
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


if(isset($_POST['DeleteAuthors']))
{
    $author_id = $_POST['delete_id'];
 

    $query = "DELETE FROM authors WHERE id = '$author_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Book Deleted Successfully";
        header("Location: authors.php");
    }
    else
    {   
        $_SESSION['status'] = "Book Deleted Failed";
        header("Location: authors.php");
    }
}
?>