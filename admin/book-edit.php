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
                        <li class="breadcrumb-item active">Edit Registered Books</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Content Header (Page header) -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> Edit Registered Book
            </h3>
            <a href="book.php" class="btn btn-danger btn-sm float-right">BACK</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="bookcode.php" method="POST">
                        <div class="modal-body">
                            <?php
                            if (isset($_GET['book_id'])) 
                            {
                                $book_id = $_GET['book_id'];
                                $query = "SELECT * FROM books WHERE id= '$book_id' LIMIT 1" ;
                                $query_run = mysqli_query($con, $query);

                                if(mysqli_num_rows($query_run) > 0 )
                                {
                                    foreach($query_run as $row)
                                    {
                                        ?>
                                            <input type="text" name = "book_id" value="<?php echo $row['id']; ?> ">
                                            <div class="form--group">
                                                <label for="">Title</label>
                                                <input type="text" name="title" value="<?php echo $row['title']; ?>" class="form-control" placeholder="Title">
                                            </div>
                                            <div class="form--group">
                                                <label for="">Description</label>
                                                <input type="text" name="description" value="<?php echo $row['description']; ?>" class="form-control" placeholder="Description">
                                            </div>
                                            <div class="form--group">
                                                <label for="">Genre</label>
                                                <input type="text" name="genre_id"  value="<?php echo $row['genre_id']; ?>" class="form-control" placeholder="Genre">
                                            </div>
                                            <div class="form--group">
                                                <label for="">Cover</label>
                                                <input type="text" name="cover_url"  value="<?php echo $row['cover_url']; ?>" class="form-control" placeholder="Cover url">
                                            </div>
                                            <div class="form--group">
                                                <label for="">Read Time</label>
                                                <input type="text" name="read_time"  value="<?php echo $row['read_time']; ?>" class="form-control" placeholder="Read time">
                                            </div>
                                            <div class="form--group">
                                                <label for="">Age Groups ID</label>
                                                <input type="text" name="age_groups_id"  value="<?php echo $row['age_groups_id']; ?>" class="form-control" placeholder="Age groups id">
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
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo "<h4>No Record Found.</h4>";
                                }
                            
                            }
                            ?>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="UpdateBook" id="UpdateBook" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    include('includes/footer.php');
    ?>