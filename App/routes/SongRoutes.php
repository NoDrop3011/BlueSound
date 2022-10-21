<?php

namespace App\routes;

require_once "core/Routes.php";

use App\core\Routes;

class SongRoutes extends Routes {
    protected function defineRoutes(): void {
        $this->get("index.php/songs/(?P<songId>\d+)", "SongController", "showSongDetail");
    }
}

?>