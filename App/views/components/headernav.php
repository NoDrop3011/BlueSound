<?php 
    $isLoggedIn = isset($_SESSION["loggedInUser"]);
    $userType = !$isLoggedIn ? "" : ($_SESSION["isAdmin"] ? "Admin" : "User");
?>

<nav>
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
            <p>List Album</p>
        </a>

        <?php if ($userType == "Admin"): ?>
            <a class="menu">
                <img src="../storage/propertiesImage/plus-circle.svg" alt="add-icon">
                <button onclick="location.href='/albums/add'">Add Album</button>
            </a>
            <a class="menu">
                <img src="../storage/propertiesImage/plus-circle.svg" alt="add-icon">
                <button onclick="location.href='/songs/add'">Add Song</button>
            </a>
            <a class="menu">
                <img src="../storage/propertiesImage/plus-circle.svg" alt="add-icon">
                <button onclick="location.href='/users'">User List</button>
            </a>
        <?php endif; ?>
    </div>
</nav>

<header class="flex-justify-between">
    <div class="search-bar">
        <img class="search-icon center" src="../storage/propertiesImage/search.svg" alt="search-icon">
        <form class="search-input-form center" method="get" action="/song">
            <input class="search-input" type="search" name="song-search" id="song-search" placeholder="What do you want to listen to?">
        </form>
    </div>

    <?php if ($isLoggedIn): ?>
        <?php $greet = "<h3> Hello, ".$_SESSION["loggedInUser"]. " (" . $userType .")" ."</h3>"; ?>
        <div class="user-account-bar center">
            <!-- <img src="../storage/propertiesImage/search-black.svg" alt="account-icon"> -->
            <h2><?php echo $greet?></h2>
        </div>
        <form method="post">
            <input type="submit" id="user-logout" value="Logout" name="logout"/>
        </form>
    <?php else: ?>
        <form method="get" action="/login">
            <input type="submit" id="user-logout" value="Login"/>
        </form>
        <form method="get" action="/register">
            <input type="submit" id="user-logout" value="Register"/>
        </form>
    <?php endif; ?>
</header>



