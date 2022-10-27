<?php

namespace App\routes;

require_once "core/Routes.php";

use App\core\Routes;

class AlbumRoutes extends Routes {
    protected function defineRoutes(): void {
        $this->get("albums/(?P<albumId>\d+)", "AlbumController", "showAlbumDetail");
        $this->put("albums/(?P<albumId>\d+)", "AlbumController", "updateAlbum");
        $this->delete("albums/(?P<albumId>\d+)", "AlbumController", "deleteAlbum");

        $this->get("albums", "AlbumController", "showAlbums");
        $this->get("api/albums", "AlbumController", "getPaginatedAlbumData");
    }
}

?>