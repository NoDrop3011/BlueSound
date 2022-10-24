<?php

namespace App\routes;

require_once "core/Routes.php";

use App\core\Routes;

class AlbumRoutes extends Routes {
    protected function defineRoutes(): void {
        $this->get("albums/(?P<albumId>\d+)", "AlbumController", "showAlbumDetail");
    }
}

?>