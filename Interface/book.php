<?php

include('../DataAccessLayer/conectionBD.php');

include('../DataAccessLayer/bookDL.php');

$bookDL = new BookDL($conexao);
$books = $bookDL->getBooks();
?>
<?php foreach ($books as $book) : ?>
    <div class="col h-80">
        <div class="card h-80 border-0 ">
            <div style="height: 250px; overflow: hidden;">
                <img src="<?php echo $book->getCoverUrl(); ?>" class="card-img-top img-fluid" style="object-fit: cover; height: 100%;" alt="...">
            </div>
            <div class="card-footer" style="background-color: rgba(0, 0, 0, 0.5); color: white; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">
                <small class="text-body-secondary"><?php echo $book->getTitle(); ?></small>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <?php if ($book->getAccessLevel() === '0') : ?>
                    <a href="read.php" class="btn btn-read mt-2" style="background-color: #E95A0C; color: white;">Read</a>
                <?php else : ?>
                    <a href="preview.php" class="btn btn-read mt-2" style="background-color: #E95A0C; color: white; position: relative; padding-left: 30px;">
                        <i class="fas fa-lock" style="position: absolute; left: 0px; top: 50%; transform: translateY(-50%); background-color: black; padding: 9px; border-top-left-radius: 4px; border-bottom-left-radius: 4px;"></i>
                        Preview
                    </a>
                <?php endif; ?>
            </div>
        </div>

    </div>
<?php endforeach; ?>