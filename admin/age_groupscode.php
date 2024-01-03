<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['addAge_group']))
{
    $age_group = $_POST['age_group'];

    $age_group_query = "INSERT INTO age_groups (age_group) VALUES ('$age_group')";
    $age_group_query_run = mysqli_query($con, $age_group_query);

    if($age_group_query_run)
    {
        $_SESSION['status'] = "Age Group Added Successfully";
        header("Location: age_groups.php");
    }
    else
    {   
        $_SESSION['status'] = "Age Group Added Failed";
        header("Location: age_groups.php");
    }
}

if(isset($_POST['UpdateAgeGroup']))
{
    $age_id = $_POST['age_id'];
    $age_group = mysqli_real_escape_string($con, $_POST['age_group']);


    $query = "UPDATE age_groups SET age_group = '$age_group'  WHERE id = '$age_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Age Group Update Successfully";
        header("Location: age_groups.php");
    }
    else
    {   
        $_SESSION['status'] = "Age Group Update Failed";
        header("Location: age_groups.php");
    }
}
?>