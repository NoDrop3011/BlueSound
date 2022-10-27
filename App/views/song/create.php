<h1>Create Song</h1>

<form method="POST" action="/songs" enctype="multipart/form-data">
    Title: <input type="text" name="judul">
    <br>
    Album: 
    <select name="album_id">
        <option value="NULL">-</option>
        <?php foreach ($data["albums"] as $album): ?>
            <option value="<?php echo $album["album_id"]?>">
                <?php echo $album["judul"]?>
            </option>
        <?php endforeach; ?>
    </select>
    <br>
    Artist: <input type="text" name="penyanyi">
    <br>
    Release Date: <input type="date" name="tanggal_terbit">
    <br>
    Genre: <input type="text" name="genre">
    <br>
    Image: <input type="file" name="image">
    <br>
    Audio: <input type="file" name="audio">
    <br>
    <button type="submit">Create</button>
</form>