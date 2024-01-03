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
    <div class="modal fade" id="AddAge_groupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Age Groups</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                </div>
                <form action="age_groupscode.php" method="POST">
                    <div class="modal-body">
                        <div class="form--group">
                            <label for="">
                                <Title></Title>
                            </label>
                        </div>
                        <div class="form--group">
                            <label for="">Age Groups</label>
                            <input type="text" id="age_group" name="age_group" class="form-control" placeholder="Age_group">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="addAge" name="addAge" class="btn btn-primary">Save</button>
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
                        <li class="breadcrumb-item active">Registered Age Group</li>
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
            <h3 class="card-title">Registered Age Group</h3>
            <a href="#" data-toggle="modal" data-target="#AddAge_groupModal" class="btn btn-primary btn-sm float-right">Add Age Group</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Age Group</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM age_groups";
                    $query_run = mysqli_query($con, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $row) {

                    ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['age_group']; ?></td>
                                <td>
                                    <a href="age_groups-edit.php?age_id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm ">Edit</a>
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

<?php
include('includes/footer.php');
?>
<!-- Delete Age -->

<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Age Groups</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>

            <form action="age_groupscode.php" method="POST">
                <div class="modal-body">
                    <input type="text" name="delete_id" class="delete_age_groups_id">
                    <p>
                        Are you sure, you want to delete this data?
                    </p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="DeleteAge" name="DeleteAge" class="btn btn-primary">Yes, Delete</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Age -->
<script>
    $(document).ready(function() {
        $('.deletebtn').click(function(e) {
            e.preventDefault();

            var age_groups_id = $(this).val();

            $('.delete_age_groups_id').val(age_groups_id);
            $('#DeleteModal').modal('show');
        });
    });
</script>