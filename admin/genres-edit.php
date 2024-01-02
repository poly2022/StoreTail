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
                        <li class="breadcrumb-item active">Edit Registered Genre</li>
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
            <h3 class="card-title"> Edit Registered Genre
            </h3>
            <a href="genres.php" class="btn btn-danger btn-sm float-right">BACK</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="genrescode.php" method="POST">
                        <div class="modal-body">
                            <?php
                            if (isset($_GET['genre_id'])) 
                            {
                                $genre_id = $_GET['genre_id'];
                                $query = "SELECT * FROM genres WHERE id= '$genre_id' LIMIT 1" ;
                                $query_run = mysqli_query($con, $query);

                                if(mysqli_num_rows($query_run) > 0 )
                                {
                                    foreach($query_run as $row)
                                    {
                                        ?>
                                            <input type="text" name = "genre_id" value="<?php echo $row['id']; ?> ">
                                            <div class="form--group">
                                                <label for="">Genre</label>
                                                <input type="text" name="genre" value="<?php echo $row['genre']; ?>" class="form-control" placeholder="Genre">
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
                            <button type="submit" name="UpdateGenre" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    include('includes/footer.php');
    ?>