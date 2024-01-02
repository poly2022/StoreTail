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
    <div class="modal fade" id="AddAuthorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add authors</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                </div>
                <form action="registeredcode.php" method="POST">
                    <div class="modal-body">
                        <div class="form--group">
                            <label for="">Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="FirstName">
                            <input type="text" name="last_name" class="form-control" placeholder="LastName">
                        </div>
                        <div class="form--group">
                            <label for="">Description</label>
                            <input type="text" name="description" class="form-control" placeholder="Description">
                        </div>
                        <div class="form--group">
                            <label for="">Photo</label>
                            <input type="file" name="author_photo_url" class="form-control" placeholder="Photo">
                        </div>
                        <div class="form--group">
                            <label for="">Nationality</label>
                            <input type="text" name="nationality" class="form-control" placeholder="Nationality">
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
                        <li class="breadcrumb-item active">Registered Authors</li>
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
            <h3 class="card-title">Registered Authors
            </h3>
            <a href="#" data-toggle="modal" data-target="#AddAuthorModal" class="btn btn-primary btn-sm float-right">Add Authors</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Description</th>
                        <th>Photo</th>
                        <th>Nationality</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM authors";
                    $query_run = mysqli_query($con, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $row) {

                    ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['first_name']; ?></td>
                                <td><?php echo $row['last_name']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><img src="<?php echo $row['author_photo_url']; ?>" alt="Author Photo" style="width: 60px; height: 60px;"></td>
                                <td><?php echo $row['nationality']; ?></td>
                                <td>
                                    <a href="authors-edit.php?author_id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm ">Edit</a>
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

<!-- Delete Authors -->

<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Author</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>

            <form action="authorscode.php" method="POST">
                <div class="modal-body">
                    <input type="text" name="delete_id" class="delete_author_id">
                    <p>
                        Are you sure, you want to delete this data?
                    </p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="deleteAuthorbtn" class="btn btn-primary">Yes, Delete</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Authors -->

<script>
    $(document).ready(function() {
        $('.deletebtn').click(function(e) {
            e.preventDefault();

            var author_id = $(this).val();

            $('.delete_authors_id').val(author_id);
            $('#DeleteModal').modal('show');
        });
    });
</script>