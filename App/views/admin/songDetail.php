<h1>Detail of song with id <?php echo $data["song"]["song_id"]?></h1>

<img src="/storage/<?php echo $data["song"]["image_path"]?>">
<br>
<audio id="audio-control" controls>
    <source src="/storage/<?php echo $data["song"]["audio_path"]?>">
</audio>

<form method="POST" action="/songs/<?php echo $data["song"]["song_id"]?>" enctype="multipart/form-data">
    <input type="text" name="_method" value="PUT" hidden>
    Title: <input type="text" name="judul" value="<?php echo $data["song"]["judul_lagu"]?>">
    <br>
    Album: 
    <select name="album_id">
        <?php foreach ($data["albums"] as $album): ?>
            <option value="<?php echo $album["album_id"]?> "
                <?php if ($data["song"]["album_id"] == $album["album_id"]) echo "selected" ?>>
                <?php echo $album["judul"]?>
            </option>
        <?php endforeach; ?>
    </select>
    <br>
    Artist: <input type="text" name="penyanyi" value="<?php echo $data["song"]["penyanyi"]?>">
    <br>
    Release Date: <input type="date" name="tanggal_terbit" value="<?php echo $data["song"]["tanggal_terbit"]?>">
    <br>
    Genre: <input type="text" name="genre" value="<?php echo $data["song"]["genre"]?>">
    <br>
    <input type="file" name="image">
    <br>
    <input type="file" name="audio">
    <br>
    <button type="submit">Update</button>
</form>


<form method="POST" action="/songs/<?php echo $data["song"]["song_id"]?>">
    <input type="text" name="_method" value="DELETE" hidden>
    <button type="submit">Delete</button>
</form>

<script>
    audioControl = document.getElementById("audio-control");
    audioControl.onplay = function() {
        console.log("i am being played");
    }
</script>