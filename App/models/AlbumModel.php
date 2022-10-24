<?php

namespace App\core;

require_once "core/Database.php";

use App\core\Database;

class AlbumModel {
    public static $table = 'album';
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function selectAllAlbum(){
        $query = "SELECT judul, penyanyi, tanggal_terbit, genre 
                FROM " . AlbumModel::$table . 
                "ORDER BY judul ASC, tanggal_terbit DESC 
                LIMIT 10";

        $this->db->prepare($query);

        $this->db->execute();

        return $this->db->fetchAll();
    }

    public function selectDaftarAlbumById($id) {
        $query = "SELECT judul, penyanyi, tanggal_terbit, genre 
                FROM" . AlbumModel::$table . 
                "WHERE album_id = :id";

        $this->db->prepare($query);

        $this->db->bind(":album_id", $id);

        $this->db->execute();

        return $this->db->fetch();
    }

    public function selectDaftarAlbumOrderASCById($id) {
        $query = "SELECT judul, penyanyi, tanggal_terbit, genre 
                FROM " . AlbumModel::$table . "
                WHERE album_id = :id
                ORDER BY judul ASC LIMIT 10";

        $this->db->prepare($query);

        $this->db->bind(":album_id", $id);

        $this->db->execute();

        return $this->db->fetch();
    }

    public function selectJudulAlbumOrderASCById($id) {
        $query = "SELECT judul 
                FROM " . AlbumModel::$table .  
                "WHERE album_id = :id
                ORDER BY judul ASC";

        $this->db->prepare($query);

        $this->db->bind(":album_id", $id);

        $this->db->execute();

        return $this->db->fetch();
    }

    public function addAlbumToList($data){
        $query = "INSERT INTO " . AlbumModel::$table .
                " VALUES (NULL, :judul, :penyanyi, :total_duration, :image_path, :tanggal_terbit, :genre)";

        $this->db->prepare($query);

        $this->db->bind(":judul", $data['judul']);

        $this->db->bind(":penyanyi", $data['penyanyi']);

        $this->db->bind(":total_duration", $data['total_duration']);

        $this->db->bind(":image_path", $data['image_path']);

        $this->db->bind(":tanggal_terbit", $data['tanggal_terbit']);

        $this->db->bind(":genre", $data['genre']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteAlbumFromList($id) {
        $query = "DELETE FROM " . AlbumModel::$table .
               " WHERE album_id = :id";

        $this->db->prepare($query);

        $this->db->bind(':album_id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateAlbum($data) {
        $query = "UPDATE " . AlbumModel::$table . " SET
                    judul = :judul,
                    penyanyi = :penyanyi,
                    total_duration = :total_duration,
                    image_path = :image_path,
                    tanggal_terbit = :tanggal_terbit,
                    genre = :genre
                WHERE album_id = :album_id";

        $this->db->prepare($query);

        $this->db->bind(":album_id", $data['album_id']);

        $this->db->bind(":judul", $data['judul']);

        $this->db->bind(":penyanyi", $data['penyanyi']);

        $this->db->bind(":total_duration", $data['total_duration']);

        $this->db->bind(":image_path", $data['image_path']);

        $this->db->bind(":tanggal_terbit", $data['tanggal_terbit']);

        $this->db->bind(":genre", $data['genre']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}