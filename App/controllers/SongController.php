<?php

namespace App\controllers;

require_once "core/Controller.php";
require_once "core/Database.php";
require_once "models/SongModel.php";

use App\core\Controller;
use App\core\Database;
use App\core\SongModel;

class SongController extends Controller {

    public function showSongDetail(int $songId) {
        // GET /song/<songId>
        // Shows the home page

        $songModel = new SongModel();
        $song = $songModel->selectById($songId);
        var_dump($song);

        $this->view("song/detail", [
            "songId" => $songId
        ]);
    }
}

?>