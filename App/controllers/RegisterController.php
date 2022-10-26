<?php

namespace App\controllers;

require_once "core/Controller.php";
require_once "models/UserModel.php";

#debug
require_once "utils/Debug.php";

use App\core\Controller;
use App\core\UserModel;

class RegisterController extends Controller {
    public function showRegisterPage() {
        // GET /
        if (isset($_SESSION['loggedInUser']))
        {
            $this->redirectTo("home");
        }
        else
        {
            $this->view("register");
        }
    }

    public function registerSubmit() {
        // POST
        // TODO:
        // AJAX not implemented
        // password hash not implemented
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = new UserModel();
        if (!$user->isEmailOrUsernameExist($email, $username))
        {
            $user->addUser($email, $password, $username);
            $_SESSION["loggedInUser"] = $username;
            $this->redirectTo("home");
        }
        else
        {
            $this->redirectTo("register");
        }

    }   

    public function checkUsername() {
        $username = $_GET["Username"];
        $user = new UserModel();
        if (!preg_match('/^[a-zA-Z0-9_]{1,}$/', $username))
        {
            echo "INVALID USERNAME";
        }
        else if($user->isUsernameExist($username))
        {
            echo "NOT AVAILABLE";
        }
        else
        {
            echo "OK";
        }
    }

    public function checkEmail() {
        $email = $_GET["Email"];
        $user = new UserModel();
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            echo "INVALID EMAIL ";
        }
        else if($user->isEmailExist($email))
        {
            echo "NOT AVAILABLE";
        }
        else
        {
            echo "OK";
        }
    }
}
?>