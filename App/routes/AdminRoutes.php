<?php

namespace App\routes;

require_once "core/Routes.php";

use App\core\Routes;

class AdminRoutes extends Routes {
    protected function defineRoutes(): void {
        $this->get("index.php/users", "AdminController", "showUsersPage");
        $this->get("index.php/api/users", "AdminController", "getPaginatedUserData");
    }
}

?>