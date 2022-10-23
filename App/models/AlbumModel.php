<?php

namespace App\core;

require_once "core/Database.php";

use App\core\Database;

class AlbumModel {
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function selectDaftarAlbumById($id) {
        $query = "SELECT judul, penyanyi, tanggal_terbit, genre 
                FROM album 
                WHERE album_id = :id";

        $this->db->prepare($query);

        $this->db->bind("id", $id);

        $this->db->execute();

        return $this->db->fetch();
    }

    public function selectDaftarAlbumOrderASCById($id) {
        $query = "SELECT judul, penyanyi, tanggal_terbit, genre 
                FROM album 
                WHERE album_id = :id
                ORDER BY judul ASC";

        $this->db->prepare($query);

        $this->db->bind("id", $id);

        $this->db->execute();

        return $this->db->fetch();
    }

    public function selectJudulAlbumOrderASCById($id) {
        $query = "SELECT judul 
                FROM album 
                WHERE album_id = :id
                ORDER BY judul ASC";

        $this->db->prepare($query);

        $this->db->bind("id", $id);

        $this->db->execute();

        return $this->db->fetch();
    }
}