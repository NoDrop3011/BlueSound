<?php

namespace App\controllers;

require_once "core/Controller.php";
require_once "core/Database.php";
require_once "models/AlbumModel.php";

use App\core\Controller;
use App\core\Database;
use App\core\AlbumModel;

class AlbumController extends Controller {

    public function showAllAlbum(){
        $albumModel = new AlbumModel();
        $album = $albumModel->selectAllAlbum();
        var_dump($album);

        $this->view("album/detail", [
        ]);
    }

    public function showAlbumDetail(int $albumId) {
        // GET /album/<albumId>
        // Shows the album detail page of album with id albumId

        $album = (new AlbumModel())->selectById($albumId);

        $dur = shell_exec("ffmpeg -i storage/".$album["audio_path"]." 2>&1");
        preg_match("/Duration: (.{2}):(.{2}):(.{2})/", $dur, $duration);
        var_dump($duration);

        if (!$album) $this->defaultRedirect();
        
        $this->view("album/detail", [
            "album" => $album
        ]);
    }

    public function showAlbums() {
        // GET /index.php/albums
        // URL parameters: searchkey (string, search input by user)

        // Shows search result of albums based on search key

        $genres = (new AlbumModel())->getAllGenres();
        if (!$genres) $genres = [];

        if (isset($_GET["searchkey"])) {
            $this->view("album/index", [
                "searchkey" => $_GET["searchkey"],
                "genres" => $genres
            ]);
        }
        else {
            $this->view("album/index", [
                "genres" => $genres
            ]);
        }
    }
    
    public function getPaginatedAlbumData() {
        // GET /index.php/api/albums
        // URL parameters: 
        // searchkey (string, search input by user), base (string (all | title | artist | year), search base)
        // titleorder (int (-1 | 0 | 1), order by title), yearorder (int (-1 | 0 | 1), order by year)
        // genre(array, filter by genre), page (int, current page)

        // Returns JSON containing data of album and totalPages
        // Album data: album_id, judul, penyanyi, tahun terbit, genre

        $page = 1;
        if (isset($_GET["page"])) $page = $_GET["page"];

        $rowPerPage = 1;

        $searchKey = "";
        if (isset($_GET["searchkey"])) $searchKey = $_GET["searchkey"];

        $base = "all";
        if (isset($_GET["base"])) $base = $_GET["base"];

        $titlesort = "none";
        if (isset($_GET["titleorder"])) $titlesort = $_GET["titleorder"];

        $yearsort = "none";
        if (isset($_GET["yearorder"])) $yearsort = $_GET["yearorder"];

        $genre = [];
        if (isset($_GET["genre"]) && $_GET["genre"] != "") {
            $genre = explode(",", $_GET["genre"]);
        }

        $albums = (new AlbumModel())->selectAll(
            $page,
            $rowPerPage,
            $searchKey,
            $base,
            $titlesort,
            $yearsort,
            $genre
        );

        echo json_encode($albums);
    }

}

?>