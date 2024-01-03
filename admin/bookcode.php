<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['addBook']))
{
    $title = $_POST['title'];
    $description = $_POST['description'];
    $genre_id = $_POST['genre_id'];
    $cover_url = $_POST['cover_url'];
    $read_time = $_POST['read_time'];
    $age_groups_id = $_POST['age_groups_id'];
    $is_active = $_POST['is_active'];
    $access_level = $_POST['access_level'];

    $book_query = "INSERT INTO books (title,description,genre_id,cover_url,read_time,age_groups_id,is_active,access_level) VALUES ('$title','$description','$genre_id','$cover_url','$read_time','$age_groups_id','$is_active','$access_level')";
    $book_query_run = mysqli_query($con, $book_query);

    if($book_query_run)
    {
        $_SESSION['status'] = "Book Added Successfully";
        header("Location: book.php");
    }
    else
    {   
        $_SESSION['status'] = "Book Added Failed";
        header("Location: book.php");
    }
}

if(isset($_POST['UpdateBook']))
{
    $book_id = $_POST['book_id'];
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $genre_id = $_POST['genre_id'];
    $cover_url = mysqli_real_escape_string($con, $_POST['cover_url']);
    $read_time = $_POST['read_time'];
    $age_groups_id = $_POST['age_groups_id'];
    $is_active = $_POST['is_active'];
    $access_level = $_POST['access_level'];

    $query = "UPDATE books SET title = '$title', description = '$description', genre_id = '$genre_id', cover_url = '$cover_url', read_time = '$read_time', age_groups_id = '$age_groups_id', is_active = '$is_active', access_level = '$access_level' WHERE id = '$book_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Book Updated Successfully";
        header("Location: book.php");
    }
    else
    {   
        $_SESSION['status'] = "Book Update Failed: " . mysqli_error($con);
        header("Location: book.php");
    }
}

if(isset($_POST['DeleteBook']))
{
    $book_id = $_POST['delete_id'];
 

    $query = "DELETE FROM books WHERE id = '$book_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Book Deleted Successfully";
        header("Location: book.php");
    }
    else
    {   
        $_SESSION['status'] = "Book Deleted Failed";
        header("Location: book.php");
    }
}
?>