<?php
session_start();
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">New Premium Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php
    if (isset($_SESSION['status'])) {
        echo "<h4>" . $_SESSION['status'] . "</h4>";
        unset($_SESSION['status']);
    }

    ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">New Premium Users
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Plan</th>
                        <th>Accept</th>
                        <th>Reject</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query = "SELECT subscriptions.*, users.user_name FROM subscriptions
                            JOIN users ON subscriptions.users_id = users.id
                            WHERE subscriptions.plans_id = 2";
                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $row) {
                            ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['users_id']; ?></td>
                                <td><?php echo $row['user_name']; ?></td>
                                <td><?php echo ($row['plans_id'] == 2) ? 'Standby' : ''; ?></td>
                                <td>
                                    <form action="new_premiumcode.php" method="post">
                                        <input type="hidden" name="users_id" value="<?php echo $row['users_id']; ?>">
                                        <button type="submit" name="acceptbtn" class="btn btn-info btn-sm">Accept</button>
                                    </form>
                                </td>                                
                                 <td>
                                 <form action="new_premiumcode.php" method="post">
                                        <input type="hidden" name="users_id" value="<?php echo $row['users_id']; ?>">
                                        <button type="submit" name="rejectbtn" class="btn btn-danger btn-sm deletebtn ">Reject</button>
                                    </form>
                                </td>

                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="4">No Record Found</td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Delete User -->

<

<!-- Delete User -->

<?php
include('includes/footer.php');
?>
