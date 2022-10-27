<?php
    if (isset($_SESSION["loggedInUser"]))
    {
        echo '<head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>BlueSound</title>
            <link rel="stylesheet" href="../style/global.css">
            </head>';
        require_once("./utils/Getter.php");
        dependenciesGenerator([], ["../style/home.css"]);
        $userType = $_SESSION["isAdmin"] ? "Admin" : "User";
        $greet = "<h3> Hello, ".$_SESSION["loggedInUser"]. " (" . $userType .")" ."</h3>";
        if($userType=="User"){
            echo '<nav>
                    <a class="blueSound-anchor center">
                        <h1>BlueSound</h1>
                    </a>
                    <div class="menu-options">
                        <a class="menu">
                            <img src="../storage/propertiesImage/home.svg" alt="search-icon">
                            <p>Home</p>
                        </a>
                        <a class="menu">
                            <img src="../storage/propertiesImage/album.svg" alt="album-icon">
                            <p>Album</p>
                        </a>
                    </div>
                </nav>';
            echo '<header class="flex-justify-between">
            <div class="search-bar">
                <img class="search-icon center" src="../storage/propertiesImage/search.svg" alt="search-icon">
                <form class="search-input-form center" method="get" action="/song">
                    <input class="search-input" type="search" name="song-search" id="song-search" placeholder="What do you want to listen to?">
                </form>
            </div>
            <div class="user-account-bar center">
                <!-- <img src="../storage/propertiesImage/search-black.svg" alt="account-icon"> -->';
            echo "<h2>";
            echo $greet;
            echo "</h2>";
            echo "</div>";
            echo '<form method="post">
                <input type="submit" id="user-logout" value="Logout" name="logout"/>
                </form>';
            echo "</header>";
        }else{
            echo '<nav>
                    <a class="blueSound-anchor center">
                        <h1>BlueSound</h1>
                    </a>
                    <div class="menu-options">
                        <a class="menu">
                            <img src="../storage/propertiesImage/home.svg" alt="search-icon">
                            <p>Home</p>
                        </a>
                        <a class="menu">
                            <img src="../storage/propertiesImage/album.svg" alt="list-icon">
                            <button>List Album</button>
                        </a>
                        <a class="menu">
                            <img src="../storage/propertiesImage/plus-circle.svg" alt="add-icon">
                            <button onclick="location.href=\'/albums/add\'">Add Album</button>
                        </a>
                        <a class="menu">
                            <img src="../storage/propertiesImage/plus-circle.svg" alt="add-icon">
                            <button onclick="location.href=\'/songs/add\'">Add Song</button>
                        </a>
                    </div>
                </nav>';
            echo '<header class="flex-justify-between">
            <div class="search-bar">
                <img class="search-icon center" src="../storage/propertiesImage/search.svg" alt="search-icon">
                <form class="search-input-form center" method="get" action="/song">
                    <input class="search-input" type="search" name="song-search" id="song-search" placeholder="What do you want to listen to?">
                </form>
            </div>
            <div class="user-account-bar center">
                <!-- <img src="../storage/propertiesImage/search-black.svg" alt="account-icon"> -->';
            echo "<h2>";
            echo $greet;
            echo "</h2>";
            echo "</div>";
            echo '<form method="post">
                <input type="submit" id="user-logout" value="Logout" name="logout"/>
                </form>';
            echo "</header>";

            echo "<body>";
            echo $data["songs"][0]["judul"];

            echo "AAAA";

            foreach ($data["songs"] as $song) {
                echo "<br>";
                echo $song["judul"];
            }
            echo "</body>";
        }
    }
    else
    {
        echo '<form method="post">
              <input type="submit" value="Login" name="login"/>
              </form>';
        echo '<form method="post">
              <input type="submit" value="Register" name="register"/>
              </form>';
    }
    echo "<body>";
            echo $data["songs"][0]["judul"];
            echo "AAAA";
            foreach ($data["songs"] as $song) {
                echo "<br>";
                echo $song["judul"];
            }
            echo "</body>";
?>
