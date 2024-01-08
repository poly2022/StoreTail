<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['addActivity']))
{
    $title = $_POST['title'];
    $description = $_POST['description'];

    $activity_query = "INSERT INTO activities (title,description) VALUES ('$title','$description')";
    $activity_query_run = mysqli_query($con, $activity_query);

    if($activity_query_run)
    {
        $_SESSION['status'] = "Activity Added Successfully";
        header("Location: activity.php");
    }
    else
    {   
        $_SESSION['status'] = "Activity Added Failed";
        header("Location: activity.php");
    }
}

if(isset($_POST['UpdateActivity']))
{
    $activity_id = $_POST['activity_id'];
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    $query = "UPDATE activities SET title = '$title', description = '$description' WHERE id = '$activity_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Activity updated successfully";
        header("Location: activity.php");
    }
    else
    {   
        $_SESSION['status'] = "Activity Update Failed: " . mysqli_error($con);
        header("Location: activity.php");
    }
}

if(isset($_POST['DeleteActivity']))
{
    $activity_id = $_POST['delete_id'];
 

    $query = "DELETE FROM activities WHERE id = '$activity_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Activity Deleted Successfully";
        header("Location: activity.php");
    }
    else
    {   
        $_SESSION['status'] = "Activity Deleted Failed";
        header("Location: activity.php");
    }
}
?>