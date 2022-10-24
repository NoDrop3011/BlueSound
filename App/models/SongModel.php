<?php

namespace App\core;

require_once "core/Database.php";

use App\core\Database;

class SongModel {
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function selectById($id) {
        $query = "SELECT song_id, penyanyi
            FROM song
            WHERE song_id = :id";

        $this->db->prepare($query);

        $this->db->bind("id", $id);
        
        $this->db->execute();

        return $this->db->fetch();
    }
}