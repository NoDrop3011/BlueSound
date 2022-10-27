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
                            <img src="../storage/propertiesImage/album.svg" alt="search-icon">
                            <p>Search</p>
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
                <form class="search-input-form center">
                    <input class="search-input" type="search" name="song-search" id="song-search" placeholder="What do you want to listen to?">
                </form>
            </div>
            <div class="account-bar center">
                <!-- <img src="../storage/propertiesImage/search-black.svg" alt="account-icon"> -->';
            echo "<h2>";
            echo $greet;
            echo "</h2>";
            echo "</div>";
            echo '<form method="post">
                <input type="submit" id="Logout" value="Logout" name="logout"/>
                </form>';
            echo "</header>";
            echo "<br>";
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
                            <img src="../storage/propertiesImage/album.svg" alt="search-icon">
                            <p>Search</p>
                        </a>
                        <a class="menu">
                            <img src="../storage/propertiesImage/album.svg" alt="album-icon">
                            <p>Album</p>
                        </a>
                    </div>
                </nav>';
            echo '<header class="flex-justify-between">
            <div class="add-album-button">
                <form method="post">
                    <input type="submit" id="add-album" value="Add Album" name="add-album"/>
                </form>
            </div>
            <div class="add-song-button">
                <form method="post">
                    <input type="submit" id="add-song" value="Add Song" name="add-song"/>
                </form>
            </div>
            <div class="account-bar center">
                <!-- <img src="../storage/propertiesImage/search-black.svg" alt="account-icon"> -->';
            echo "<h2>";
            echo $greet;
            echo "</h2>";
            echo "</div>";
            echo '<form method="post">
                <input type="submit" id="Logout" value="Logout" name="logout"/>
                </form>';
            echo "</header>";
            echo "<br>";
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
?>
