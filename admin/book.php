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
    <div class="modal fade" id="AddBookModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                </div>
                <form action="bookcode.php" method="POST">
                    <div class="modal-body">
                        <div class="form--group">
                            <label for="">
                                <Title></Title>
                            </label>
                        </div>
                        <div class="form--group">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title">
                        </div>
                        <div class="form--group">
                            <label for="">Description</label>
                            <input type="text" name="description" class="form-control" placeholder="Description">
                        </div>
                        <div class="form--group">
                            <label for="">Genre</label>
                            <input type="text" name="genre_id" class="form-control" placeholder="Genre">
                        </div>
                        <div class="form--group">
                            <label for="">Cover</label>
                            <input type="text" name="cover_url" class="form-control" placeholder="Cover url">
                        </div>
                        <div class="form--group">
                            <label for="">Read Time</label>
                            <input type="text" name="read_time" class="form-control" placeholder="Read time">
                        </div>
                        <div class="form--group">
                            <label for="">Age Groups ID</label>
                            <input type="text" name="age_groups_id" class="form-control" placeholder="Age groups id">
                        </div>
                        <div class="form--group">
                            <label for="">Is Active</label>
                            <select name="is_active" id="is_active">
                                <option value="1">True</option>
                                <option value="0">False</option>
                            </select>
                        </div>
                        <div class="form--group">
                            <label for="">Access Level</label>
                            <select name="access_level" id="access_level">
                                <option value="0">Standard</option>
                                <option value="1">Premium</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="addBook" class="btn btn-primary">Save</button>
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
                        <li class="breadcrumb-item active">Registered Books</li>
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
            <h3 class="card-title">Registered Book</h3>
            <a href="#" data-toggle="modal" data-target="#AddBookModal" class="btn btn-primary btn-sm float-right">Add Book</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Genre</th>
                        <th>Cover</th>
                        <th>Read Time</th>
                        <th>Age Groups ID</th>
                        <th>Is Active</th>
                        <th>Access Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM books";
                    $query_run = mysqli_query($con, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $row) {

                    ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['genre_id']; ?></td>
                                <td><img src="<?php echo $row['cover_url']; ?>" alt="Cover Image" style="width: 60px; height: 60px;"></td>
                                <td><?php echo $row['read_time']; ?></td>
                                <td><?php echo $row['age_groups_id']; ?></td>
                                <td><?php echo $row['is_active']; ?></td>
                                <td><?php echo $row['access_level']; ?></td>
                                <td>
                                    <a href="book-edit.php?book_id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm ">Edit</a>
                                    <button type="button" value= "<?php echo $row['id']; ?>"  class="btn btn-danger btn-sm deletebtn ">Delete</button>
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

<!-- Delete Book -->

<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                </div>

                <form action="bookcode.php" method="POST">
                    <div class="modal-body">
                        <input type="text" name="delete_id" class="delete_book_id">
                        <p>
                            Are you sure, you want to delete this data?
                        </p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="DeleteBook" id="DeleteBook" class="btn btn-primary">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Delete Book -->
<?php
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
<script>
    $(document).ready(function(){
        $('.deletebtn').click(function(e){
            e.preventDefault();

            var book_id = $(this).val();

            $('.delete_book_id').val(book_id);
            $('#DeleteModal').modal('show');
        });
    });
</script>