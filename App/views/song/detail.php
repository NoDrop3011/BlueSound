<h1>Detail of song with id <?php echo $data["song"]["song_id"]?></h1>

<img src="/storage/<?php echo $data["song"]["image_path"]?>">
<br>
Title: <?php echo $data["song"]["judul_lagu"]?>
<br>
Part of <a href="/albums/<?php echo $data["song"]["album_id"]?>"><?php echo $data["song"]["judul_album"]?></a>
<br>
Artist: <?php echo $data["song"]["penyanyi"]?>
<br>
Release Date: <?php echo $data["song"]["tanggal_terbit"]?>
<br>
Genre: <?php echo $data["song"]["genre"]?>
<br>
Duration: <?php echo $data["song"]["duration"]?>s
<br>
<audio controls>
    <source src="/storage/<?php echo $data["song"]["audio_path"]?>">
</audio>