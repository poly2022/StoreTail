<?php
session_start();
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- User Modal -->
    <div class="modal fade" id="AddUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                </div>
                <form action="registeredcode.php" method="POST">
                    <div class="modal-body">
                        <div class="form--group">
                            <label for="">User Type</label>
                            <select name="user_type_id" class="form-control">
                                <option value="guest">Guest</option>
                                <option value="common">Common</option>
                                <option value="admin">Admin</option>
                                <option value="client">Client</option>
                            </select>
                        </div>
                        <div class="form--group">
                            <label for="">Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="FirstName">
                            <input type="text" name="last_name" class="form-control" placeholder="LastName">
                        </div>
                        <div class="form--group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form--group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form--group">
                            <label for="">User Name</label>
                            <input type="text" name="user_name" class="form-control" placeholder="User Name">
                        </div>
                        <div class="form--group">
                            <label for="">Photo</label>
                            <input type="file" name="user_photo_url" class="form-control" placeholder="Photo">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="addUser" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


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
                        <li class="breadcrumb-item active">Registered Users</li>
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
            <h3 class="card-title">Registered User
            </h3>
            <a href="#" data-toggle="modal" data-target="#AddUserModal" class="btn btn-primary btn-sm float-right">Add User</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Type</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>User Name</th>
                        <th>Photo</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM users";
                    $query_run = mysqli_query($con, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $row) {

                    ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['user_types_id']; ?></td>
                                <td><?php echo $row['first_name']; ?></td>
                                <td><?php echo $row['last_name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['user_name']; ?></td>
                                <td><img src="<?php echo $row['user_photo_url']; ?>" alt="user Image" style="width: 60px; height: 60px;"></td>
                                <td>
                                    <a href="registered-edit.php?user_id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm ">Edit</a>
                                    <button type="button" value="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm deletebtn ">Delete</button>
                                </td>
                            <?php
                        }
                    } else {
                            ?>
                            <tr>
                                <td>No Record Found</td>
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

<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>

            <form action="registeredcode.php" method="POST">
                <div class="modal-body">
                    <input type="text" name="delete_id" class="delete_user_id">
                    <p>
                        Are you sure, you want to delete this data?
                    </p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="deleteUserbtn" class="btn btn-primary">Yes, Delete</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete User -->

<?php
include('includes/footer.php');
?>
<script>
    $(document).ready(function() {
        $('.deletebtn').click(function(e) {
            e.preventDefault();

            var user_id = $(this).val();

            $('.delete_user_id').val(user_id);
            $('#DeleteModal').modal('show');
        });
    });
</script>