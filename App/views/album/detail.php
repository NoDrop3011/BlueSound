<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Album</title>
    <?php
        require_once("./utils/Getter.php");
        dependenciesGenerator([], ["../style/albumDetail.css"]);  
    ?>
</head>
<body>
    <h1><?php echo $data["album"]["judul"]?></h1>
    <div>
        <img src="/storage/<?php echo $data["album"]["image_path"]?>" width="250" height="250">
    </div>
    <br>
    <p>Artist : <?php echo $data["album"]["penyanyi"]?></p>
    <p>Release Date : <?php echo $data["album"]["tanggal_terbit"]?></p>
    <p>Genre : <?php echo $data["album"]["genre"]?></p>
    <p>Total Duration : 
        <?php 
            $minutes = intdiv($data["album"]["total_duration"], 60);
            $seconds = $data["album"]["total_duration"] % 60;
            echo $minutes . " m " . $seconds . " s";
        ?>
    </p>
    <p>
        List of songs: 
        <br>
        <?php
            $no = 1;
            foreach ($data["songs"] as $song) {
                echo $no . ". ";
                echo $song["judul"];
                echo "<br>";
                $no++;
            }
        ?>
    </p>
    <br>
</body>