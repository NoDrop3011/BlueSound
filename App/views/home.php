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
    ?>
    <div class="contents">
    <div class="song-filter-form">
        <select class="song-filter-genre" name="genres" id="genres">
            <option value="Genre">Genre</option>
            <option value="Pop">Pop</option>
            <option value="Rock">Rock</option>
            <option value="Jazz">Jazz</option>
            <option value="Metal">Metal</option>
        </select>
        <form>
            <input class="song-filter-year" type="number" name="song-year" id="song-year" placeholder="Song's Created Year">
        </form>
    </div>
        <table class="song-lists" id="song-lists">
            <thead>
                <tr class="song-field flex-justify-between">
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genres</th>
                    <th>Year's Created</th>
                </tr>
            </thead>
            <tbody id="dynamic-song-container">
                
            </tbody>
            <div class="pagination-buttons center">
                <button class="before-button" id="before-button">
                    <img src="./storage/propertiesImage/arrow-up-white.svg">
                </button>
                <button class="after-button" id="after-button">
                    <img src="./storage/propertiesImage/arrow-down-white.svg">
                </button>
            </div>
        </table> 
        <div class="pagination-buttons center">
            <button class="before-button" id="before-button">
                <img src="./storage/propertiesImage/arrow-up-white.svg">
            </button>
            <button class="after-button" id="after-button">
                <img src="./storage/propertiesImage/arrow-down-white.svg">
            </button>
        </div>
    </div>
</body>
</html>