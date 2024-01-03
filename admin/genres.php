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
    <div class="modal fade" id="AddGenreModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Genre</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                </div>
                <form action="genrescode.php" method="POST">
                    <div class="modal-body">
                        <div class="form--group">
                            <label for="">
                                <Title></Title>
                            </label>
                        </div>
                        <div class="form--group">
                            <label for="">Genre</label>
                            <input type="text" id="genre" name="genre" class="form-control" placeholder="Genre">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="addGenre" name="addGenre" class="btn btn-primary">Save</button>
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
                        <li class="breadcrumb-item active">Registered Genres</li>
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
            <h3 class="card-title">Registered Genre</h3>
            <a href="#" data-toggle="modal" data-target="#AddGenreModal" class="btn btn-primary btn-sm float-right">Add Genre</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Genre</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM genres";
                    $query_run = mysqli_query($con, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $row) {

                    ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['genre']; ?></td>
                                <td>
                                    <a href="genres-edit.php?genre_id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm ">Edit</a>
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
<!-- Delete User -->

<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Genre</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>

            <form action="genrescode.php" method="POST">
                <div class="modal-body">
                    <input type="text" id="delete_id" name="delete_id" class="delete_genre_id">
                    <p>
                        Are you sure, you want to delete this data?
                    </p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="DeleteGenre" name="DeleteGenre" class="btn btn-primary">Yes, Delete</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete User -->
<script>
    $(document).ready(function() {
        $('.deletebtn').click(function(e) {
            e.preventDefault();

            var genre_id = $(this).val();

            $('.delete_genre_id').val(genre_id);
            $('#DeleteModal').modal('show');
        });
    });
</script>