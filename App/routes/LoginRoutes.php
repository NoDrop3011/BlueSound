<?php

namespace App\routes;

require_once "core/Routes.php";

use App\core\Routes;

class LoginRoutes extends Routes {
    protected function defineRoutes(): void {
        //           url                controller       callback function
        // GET method setup
        $this->get("index.php/login", "LoginController", "showLoginPage");

        // POST method setup
        $this->post("index.php/login", "LoginController", "loginCheck");
    }
}

?>