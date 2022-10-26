<?php

namespace App\controllers;

require_once "core/Controller.php";

use App\core\Controller;

class HomeController extends Controller {
    public function showHomePage() {
        // GET /
        // Shows the home page
        
        $this->view("home");
    }

    public function postCallback() {
        // POST callback
        
        if (isset($_POST['logout']))
        {
            unset($_SESSION['loggedInUser']);
            unset($_SESSION['isAdmin']);
            $this->redirectTo("home");
        }
        
        else if (isset($_POST['login']))
        {
            $this->redirectTo('login');
        }
        else if (isset($_POST['register']))
        {
            $this->redirectTo("register");
        }
    }
}

?>