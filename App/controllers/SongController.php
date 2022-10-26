<?php

namespace App\controllers;

require_once "core/Controller.php";
require_once "models/SongModel.php";
require_once "utils/Debug.php";

use App\core\Controller;
use App\core\SongModel;

class SongController extends Controller {

    public function showSongDetail(int $songId) {
        // GET /songs/<songId>

        // Shows the song detail page of song with id songId

        $song = (new SongModel())->selectById($songId);

        if (!$song) $this->defaultRedirect();
        
        $this->view("song/detail", [
            "song" => $song
        ]);
    }

    public function updateSong(int $songId) {
        // PUT /songs/<songId>

        // Updates a song with id songId
        // Admin only

        $isAdmin = true;
        if (!$isAdmin) {
            http_response_code(403);
        }

        $songModel = new SongModel();
        $song = $songModel->selectById($songId);

        if (!$song) $this->redirectTo("/songs");
        
        $songModel->updateSong($songId, $_POST, $_FILES);

        $this->redirectTo("/songs/" . (string)$songId);
    }

    public function deleteSong(int $songId) {
        // DELETE /songs/<songId>
        
        // Deletes a song with id songId
        // Admin only

        $isAdmin = true;
        if (!$isAdmin) {
            http_response_code(403);
            die();
        }
        
        $songModel = new SongModel();
        $song = $songModel->selectById($songId);

        if (!$song) $this->redirectTo("/songs");

        $songModel->deleteSong($songId);

        $this->redirectTo("/");
    }

    public function showSongs() {
        // GET /songs
        // URL parameters: searchkey (string, search input by user)

        // Shows search result of songs based on search key

        $genres = (new SongModel())->getAllGenres();
        if (!$genres) $genres = [];

        if (isset($_GET["searchkey"])) {
            $this->view("song/index", [
                "searchkey" => $_GET["searchkey"],
                "genres" => $genres
            ]);
        }
        else {
            $this->view("song/index", [
                "genres" => $genres
            ]);
        }
    }

    public function getPaginatedSongData() {
        // GET /api/songs
        // URL parameters: 
        // searchkey (string, search input by user), base (string (all | title | artist | year), search base)
        // titleorder (int (-1 | 0 | 1), order by title), yearorder (int (-1 | 0 | 1), order by year)
        // genre(array, filter by genre), page (int, current page)

        // Returns JSON containing data of song and totalPages
        // Song data: song_id, judul, penyanyi, tahun terbit, genre

        $page = 1;
        if (isset($_GET["page"])) $page = $_GET["page"];

        $rowPerPage = 10;

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

        $songs = (new SongModel())->selectAll(
            $page,
            $rowPerPage,
            $searchKey,
            $base,
            $titlesort,
            $yearsort,
            $genre
        );

        echo json_encode($songs);
    }
}

?>