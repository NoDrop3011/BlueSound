<!DOCTYPE html>
<html lang="en">
<div class="newalbum">
    <div class="containeralbum">
    <?php

    use App\controllers\AlbumController;

    require_once "controllers/AlbumController.php";
    $allAlbum = new AlbumController();
    $allAlbum->showAllAlbum();
    $count = mysqli_num_rows($music);
    ?>
    <h2>Recent Album</h2>
    <div class="queryrows">
        <?php
        if ($count >0){
        while ($row = mysqli_fetch_assoc($music)){
            ?>
            <div class="card">
                <figure class='cover'>
                <img src=<?php echo $row['Image_path']?> alt="Album">
                </figure>
                <div class="card-body">
                <h3><?php echo $row['judul'];?></h3>
                <div class="genreAlbum"><?php echo $row['penyanyi'];?></div>
                <p class="smallAtribute"><?php echo $row['genre'];?></p>
                <p class="smallAtribute"><?php echo date('d·m·y',strtotime($row['tanggal_terbit']));?></p>
                </div>
            </div>
        <?php
        }
        } ?>
    </div>
    </div>
</div>
</html>