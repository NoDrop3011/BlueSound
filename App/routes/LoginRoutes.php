<?php

namespace App\routes;

require_once "core/Routes.php";

use App\core\Routes;

class LoginRoutes extends Routes {
    protected function defineRoutes(): void {
        $this->get("index.php/login", "LoginController", "showLoginPage");
    }
}

?>