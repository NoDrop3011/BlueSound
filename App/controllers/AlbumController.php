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
        // Shows the home page

        $albumModel = new AlbumModel();
        $album = $albumModel->selectDaftarAlbumOrderASCById($albumId);
        var_dump($album);

        $this->view("album/detail", [
            "albumId" => $albumId
        ]);
    }

    // public function addAlbumToList(string $judulAlbum, string $penyanyi, int $total_duration, string $image_path, string $tanggal_terbit, string $genre){
    //     $albumModel = new AlbumModel();
    //     $album = $albumModel->addAlbumToList($judulAlbum, $penyanyi, $total_duration, $image_path, $tanggal_terbit, $genre);
    //     var_dump($album);

    //     $this->
    // }


}

?>