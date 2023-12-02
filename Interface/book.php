<?php

include('../DataAccessLayer/conectionBD.php');

include('../DataAccessLayer/bookDL.php');

$bookDL = new BookDL($conexao);
$books = $bookDL->getBooks();
?>
<?php foreach ($books as $book) : ?>
    <div class="col">
        <div class="card h-80">
            <img src="<?php echo $book->getCoverUrl(); ?>" class="card-img-top" alt="...">
            <div class="card-footer" style="background-color: rgba(0, 0, 0, 0.5); color: white;">
                <small class="text-body-secondary"><?php echo $book->getTitle(); ?></small>
            </div>
        </div>
        <?php if ($book->getAccessLevel() === 'public') : ?>
            <a href="#" class="btn btn-read mt-2" style="background-color: #E95A0C; color: white;">Read</a>
        <?php else : ?>
            <a href="pagina_de_preview.php" class="btn btn-preview mt-2" style="background-color: #E95A0C; color: white;">Preview</a>
        <?php endif; ?>
    </div>
<?php endforeach; ?>
