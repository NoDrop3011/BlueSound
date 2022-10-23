<?php

namespace App\controllers;

require_once "core/Controller.php";

use App\core\Controller;

class LoginController extends Controller {
    public function showLoginPage() {
        // GET /
        // Shows the home page
        
        $this->view("login");
    }
}

?>