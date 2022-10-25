<?php

namespace App\routes;

require_once "core/Routes.php";

use App\core\Routes;

class HomeRoutes extends Routes {
    protected function defineRoutes(): void {
        $this->get("", "HomeController", "showHomePage");
        $this->patch("", "HomeController", "showHomePage");
        $this->post("", "HomeController", "postCallback");
    }
}

?>