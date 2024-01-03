<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['addGenre']))
{
    $genre = $_POST['genre'];

    $genre_query = "INSERT INTO genres (genre) VALUES ('$genre')";
    $genre_query_run = mysqli_query($con, $genre_query);

    if($genre_query_run)
    {
        $_SESSION['status'] = "Genre Added Successfully";
        header("Location: genre.php");
    }
    else
    {   
        $_SESSION['status'] = "Genre Added Failed";
        header("Location: genre.php");
    }
}

if(isset($_POST['UpdateGenre']))
{
    $genre_id = $_POST['genre_id'];
    $genre = $_POST['genre'];

    $query = "UPDATE genres SET genre = '$genre'  WHERE id = '$genre_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Genre Update Successfully";
        header("Location: genres.php");
    }
    else
    {   
        $_SESSION['status'] = "Genre Update Failed";
        header("Location: genres.php");
    }
}
?>