<?php

namespace App\routes;

require_once "core/Routes.php";

use App\core\Routes;

class SongRoutes extends Routes {
    protected function defineRoutes(): void {
        $this->get("songs/(?P<songId>\d+)", "SongController", "showSongDetail");
        $this->put("songs/(?P<songId>\d+)", "SongController", "updateSong");
        $this->delete("songs/(?P<songId>\d+)", "SongController", "deleteSong");
        
        $this->get("songs", "SongController", "showSongs");
        $this->get("api/songs", "SongController", "getPaginatedSongData");
    }
}

?>