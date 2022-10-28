<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlueSound</title>
    <?php 
        require_once "components/dependenciesIncluder.php";
        addHeaderNavDependencies();
    ?>
</head>
<body>
    <?php require_once "components/headernav.php"; 
        require_once("./utils/getSong.php");
        dependenciesGenerator([], ["../style/home.css"]);
    ?>
    <div class="contents">
        <table class="song-lists" id="song-lists">
            <tbody id="dynamic-song-container">
                <div class=row>;
                <?php $data["songs"][0]["judul"];
                    foreach ($data["songs"] as $song) {
                        $image = "<img src='/storage/" . $song["image_path"] . "' height= 200px width= 200px>";
                        echo '<div class=column>';
                        echo $image;
                        echo '<div class="font-song">';
                        echo $song["judul"];
                        echo " - ";
                        echo $song['penyanyi'];
                        echo '</div>';
                        echo '</div>';
                    }
                ?>
                </div>;
            </tbody>
        </table> 
    </div>
</body>
</html>