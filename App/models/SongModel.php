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

    public function selectAll($currentPage, 
        $rowPerPage, 
        $searchKey = "", 
        $base = "all", 
        $titleSort = 0, 
        $yearSort = 0,
        $genre = []) {

        // Returns array containing data of song and totalPages
        // Song data: song_id, judul, penyanyi, tahun terbit, genre
        // Paginated, max $rowPerPage users in each page

        $query = "SELECT song_id, judul, penyanyi, YEAR(tanggal_terbit) as tahun_terbit, genre
            FROM song ";

        if ($genre || $searchKey) {
            $query .= "WHERE ";
        }

        if ($genre) {
            $query .= "(";

            $genreLength = count($genre);
            for ($i = 0; $i < $genreLength; $i++) {
                $query .= "genre = '" . $genre[$i];
                if ($i != $genreLength - 1) {
                    $query .= "' OR ";
                }
                else {
                    $query .= "') ";
                }
            }

            if ($searchKey) {
                $query .= " AND ";
            }
        }

        if ($searchKey) {
            if ($base == "title") {
                $query .= "judul LIKE CONCAT('%', :searchKey, '%') ";
            }
            else if ($base == "artist") {
                $query .= "penyanyi LIKE CONCAT('%', :searchKey, '%') ";
            }
            else if ($base == "year") {
                $query .= "YEAR(tanggal_terbit) LIKE CONCAT('%', :searchKey, '%') ";
            }
            else {
                $query .= "(judul LIKE CONCAT('%', :searchKey, '%') OR penyanyi LIKE CONCAT('%', :searchKey, '%') OR YEAR(tanggal_terbit) LIKE CONCAT('%', :searchKey, '%')) ";
            }
        }

        if ($titleSort != 0) {
            $query .= "ORDER BY judul ";
            if ($titleSort == 1) {
                $query .= "ASC, ";
            }
            else {
                $query .= "DESC, ";
            }

            $query .= "YEAR(tanggal_terbit) ";

            if ($yearSort == 0 || $yearSort == 1) {
                $query .= "ASC ";
            }
            else {
                $query .= "DESC ";
            }
        }
        else {
            $query .= "ORDER BY YEAR(tanggal_terbit) ";
            if ($yearSort == 0 || $yearSort == 1) {
                $query .= "ASC, ";
            }
            else {
                $query .= "DESC, ";
            }
            $query .= "judul ASC";
        }
        
        $this->db->prepare($query);
        if ($searchKey) {
            $this->db->bind(":searchKey", $searchKey);
        }
        $this->db->execute();
        $totalRows = $this->db->rowCount();
        $totalPages = (int)ceil($totalRows / $rowPerPage);

        if (!$totalRows) return array (
            "data" => array(),
            "totalPages" => 0
        );

        $offset = ($currentPage-1) * $rowPerPage;
        $paginatedQuery = $query . " LIMIT " . $rowPerPage . " OFFSET " . $offset;

        $this->db->prepare($paginatedQuery);
        if ($searchKey) {
            $this->db->bind(":searchKey", $searchKey);
        }
        $this->db->execute();
        $songs = $this->db->fetchAll();

        if (!$songs) {
            return array(
                "data" => array(),
                "totalPages" => $totalPages
            );
        } else {
            return array(
                "data" => $songs,
                "totalPages" => $totalPages
            );
        } 
    }

    public function selectById($id) {
        $query = "SELECT song_id, 
            s.judul as judul_lagu, 
            penyanyi, 
            tanggal_terbit, 
            genre, duration, 
            audio_path, 
            image_path, 
            s.album_id, 
            a.judul as judul_album
            FROM 
                (SELECT * 
                    FROM song
                    WHERE song_id = :id) as s
                LEFT JOIN
                (SELECT album_id, judul
                    FROM album) as a
                ON s.album_id = a.album_id
                ";

        $this->db->prepare($query);
        $this->db->bind(":id", $id);
        $this->db->execute();

        return $this->db->fetch();
    }

    public function getAllGenres() {
        $query = "SELECT DISTINCT genre
            FROM song";

        $this->db->prepare($query);
        $this->db->execute();
        $rows = $this->db->fetchAll();

        if (!$rows) return [];

        $genres = [];

        foreach($rows as $row) {
            array_push($genres, $row["genre"]);
        }

        return $genres;
    }
}