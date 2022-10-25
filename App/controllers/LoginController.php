<?php

namespace App\controllers;

require_once "core/Controller.php";
require_once "models/UserModel.php";

#debug
require_once "utils/Debug.php";

use App\core\Controller;
use App\core\UserModel;

class LoginController extends Controller {
    public function showLoginPage() {
        // GET /
        if (isset($_SESSION['loggedInUser']))
        {
            $this->redirectTo("home");
        }
        else
        {
            $this->view("login");
        }
    }

    public function loginCheck() {
        // POST
        // show home page
        // $this->view("home");
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = new UserModel();
        if (!isset($_SESSION['loggedInUser']) && $user->isUserExist($username, $password))
        {
            $_SESSION['loggedInUser'] = $username;
            $this->redirectTo("home");
        }
        else
        {
            $this->view("login");
        }
    }   
}

?>