<?php
session_start();
include('config/dbcon.php');

if (isset($_POST['acceptbtn'])) {
    $users_id = $_POST['users_id'];

    // Update plans_id to 1 for the specified user
    $update_query = "UPDATE subscriptions SET plans_id = 1, start_date = NOW() WHERE users_id = $users_id";
    $update_query_run = mysqli_query($con, $update_query);

    if ($update_query_run) {
        // Plans_id and start_date updated successfully
        echo "<script>alert('Update successful!');</script>";
        header("Location: new_premium.php");
    } else {
        // Handle update error
        echo "Error updating plans_id: " . mysqli_error($con);
    }
} else {
    // Handle missing form submission
    echo "Form not submitted.";
}



if (isset($_POST['rejectbtn'])) {
    $users_id = $_POST['users_id'];

    // Delete the user from the subscriptions table
    $delete_query = "DELETE FROM subscriptions WHERE users_id = $users_id";
    $delete_query_run = mysqli_query($con, $delete_query);

    if ($delete_query_run) {
        // User rejected and removed successfully
        echo "<script>alert('User rejected and removed from subscriptions!');</script>";
        header("Location: new_premium.php");
    } else {
        // Handle deletion error
        echo "Error deleting user: " . mysqli_error($con);
    }
} else {
    // Handle missing form submission
    echo "Form not submitted.";
}


if (isset($_POST['revokebtn'])) {
    $users_id = $_POST['users_id'];

    // Delete the user from the subscriptions table
    $delete_query = "DELETE FROM subscriptions WHERE users_id = $users_id";
    $delete_query_run = mysqli_query($con, $delete_query);

    if ($delete_query_run) {
        // User rejected and removed successfully
        echo "<script>alert('User rejected and removed from subscriptions!');</script>";
        header("Location: new_premium.php");
    } else {
        // Handle deletion error
        echo "Error deleting user: " . mysqli_error($con);
    }
} else {
    // Handle missing form submission
    echo "Form not submitted.";
}
?>
?>








?>