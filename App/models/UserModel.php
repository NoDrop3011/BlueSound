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

    public function isUserExist($username, $password) : bool
    {
        $query = "SELECT * FROM user where username = '". $username ."' and password = '" . $password . "'";
        $this->db->prepare($query);
        $this->db->execute();
        $totalRows = $this->db->rowCount();
        return $totalRows > 0;
    }

    public function isUsernameExist($username) : bool 
    {
        $query = "SELECT * FROM user where username = '". $username . "'";
        $this->db->prepare($query);
        $this->db->execute();
        $totalRows = $this->db->rowCount();
        return $totalRows > 0;
    }

    public function isEmailExist($email) : bool
    {
        $query = "SELECT * FROM user where email = '". $email . "'";
        $this->db->prepare($query);
        $this->db->execute();
        $totalRows = $this->db->rowCount();
        return $totalRows > 0;
    }

    public function isEmailOrUsernameExist($email, $username) : bool
    {
        $query = "SELECT * FROM user where username = '". $username . "' or email = '".$email."'";
        $this->db->prepare($query);
        $this->db->execute();
        $totalRows = $this->db->rowCount();
        return $totalRows > 0;
    }

    public function addUser($email, $password, $username) : void {
        $query = "INSERT INTO user 
        (email, password, username, isAdmin) 
        VALUES ('".$email."','".$password."','".$username."', FALSE)";
        $this->db->prepare($query);
        $this->db->execute();
    }
}