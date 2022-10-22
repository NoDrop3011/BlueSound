<?php

namespace App\core;

require_once "core/Database.php";

use App\core\Database;

class UserModel {
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function selectAll($currentPage, $rowPerPage) {
        // Returns array containing data (username and email of user) and totalPages
        // Paginated, max $rowPerPage users in each page

        $query = "SELECT username, email
            FROM user";

        $this->db->prepare($query);
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
        $this->db->execute();
        $users = $this->db->fetchAll();

        if (!$users) {
            return array(
                "data" => array(),
                "totalPages" => $totalPages
            );
        } else {
            return array(
                "data" => $users,
                "totalPages" => $totalPages
            );
        } 
    }
}