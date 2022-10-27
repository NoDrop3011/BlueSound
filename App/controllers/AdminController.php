<?php

namespace App\controllers;

require_once "core/Controller.php";
require_once "models/UserModel.php";

use App\core\Controller;
use App\models\UserModel;

class AdminController extends Controller {

    public function showUsersPage() {
        // GET /index.php/users
        
        // Shows users page
        // Admin only

        $isAdmin = isset($_SESSION["isAdmin"]) ? $_SESSION["isAdmin"] : false;
        if (!$isAdmin) {
            $this->defaultRedirect();
        }
        else {
            $this->view("admin/users");
        }
    }

    public function getPaginatedUserData() {
        // GET /index.php/api/users
        // URL parameters: page (int, current page)

        // Returns JSON containing data (username and email of user) and totalPages
        // Admin only

        $isAdmin = isset($_SESSION["isAdmin"]) ? $_SESSION["isAdmin"] : false;
        if (!$isAdmin) {
            http_response_code(404);
            die();
        }
        else {
            $page = 1;
            if (isset($_GET["page"])) $page = $_GET["page"];
    
            $rowPerPage = 20;
    
            $users = (new UserModel())->selectAll($page, $rowPerPage);
    
            echo json_encode($users);
        }
    }
}

?>