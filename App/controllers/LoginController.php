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
        // Shows the home page
        
        $this->view("login");
    }

    public function loginCheck() {
        // POST
        // show home page
        // $this->view("home");
        $username = $_POST['username'];
        $password = $_POST['password'];
        $ user = new UserModel()
        if ($username == 'aaa' && $password == 'bbb')
        {
            console_log("true");
        }
        else
        {
            console_log("false");
        }
        $this->view("login");
    }   
}

?>