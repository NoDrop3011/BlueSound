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

    public function addAlbumToList($judul, $penyanyi, $total_duration, $image_path, $tanggal_terbit, $genre){
        $query = "INSERT INTO album 
                (judul, penyanyi, total_duration, image_path, tanggal_terbit, genre)
                VALUES ($judul, $penyanyi, $total_duration, $image_path, $tanggal_terbit, $genre)";

        $this->db->prepare($query);

        $this->db->bind("judul", $judul);

        $this->db->bind("penyanyi", $penyanyi);

        $this->db->bind("total_duration", $total_duration);

        $this->db->bind("image_path", $image_path);

        $this->db->bind("tanggal_terbit", $tanggal_terbit);

        $this->db->bind("genre", $genre);

        $this->db->execute();

        return $this->db->fetch();
    }

    public function deleteAlbumFromList($id) {
        $query = "DELETE FROM album
                WHERE album_id = :id";

        $this->db->prepare($query);

        $this->db->bind("id", $id);

        $this->db->execute();

        return $this->db->fetch();
    }
}