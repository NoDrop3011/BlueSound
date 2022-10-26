<?php

namespace App\routes;

require_once "core/Routes.php";

use App\core\Routes;

class RegisterRoutes extends Routes {
    protected function defineRoutes(): void {
        //           url                controller       callback function
        // GET method setup
        $this->get("register", "RegisterController", "showRegisterPage");

        // POST method setup
        $this->post("register", "RegisterController", "registerSubmit");
    }
}

?>