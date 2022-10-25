<h1>Detail of album with id <?php echo $data["album"]["album_id"]?></h1>

<img src="/storage/<?php echo $data["album"]["image_path"]?>">
<br>
Title: <?php echo $data["album"]["judul_lagu"]?>
<br>
Part of <a href="/albums/<?php echo $data["album"]["album_id"]?>"><?php echo $data["song"]["judul_album"]?></a>
<br>
<?php echo $data["album"]["penyanyi"]?>
<br>
<?php echo $data["album"]["tanggal_terbit"]?>
<br>
<?php echo $data["album"]["genre"]?>
<br>
<?php echo $data["album"]["duration"]?>s
<br>
<audio controls>
    <source src="/storage/<?php echo $data["album"]["audio_path"]?>">
</audio>
