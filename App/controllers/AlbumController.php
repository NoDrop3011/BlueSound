<?php

namespace App\controllers;

require_once "core/Controller.php";
require_once "core/Database.php";
require_once "models/AlbumModel.php";

use App\core\Controller;
use App\core\Database;
use App\core\AlbumModel;

class AlbumController extends Controller {

    public function showAlbumDetail(int $albumId) {
        // GET /album/<albumId>
        // Shows the home page

        $albumModel = new AlbumModel();
        $album = $albumModel->selectDaftarAlbumOrderASCById($albumId);
        var_dump($album);

        $this->view("album/detail", [
            "albumId" => $albumId
        ]);
    }
}

?>