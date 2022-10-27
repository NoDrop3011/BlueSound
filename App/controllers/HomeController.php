<?php

namespace App\controllers;

require_once "core/Controller.php";
require_once "models/SongModel.php";

use App\core\Controller;
use App\models\SongModel;

class HomeController extends Controller {
    public function showHomePage() {
        // GET /
        // Shows the home page
        $song = new SongModel();
        $songs = $song->getSongHomePage();
        $this->view("home", [
            "songs" => $songs
        ]);
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