<h1>Home page</h1>
<br>
<br>

<?php
    if (isset($_SESSION["loggedInUser"]))
    {
        echo '<form method="post">
              <input type="submit" value="Logout" name="logout"/>
              </form>';
    }
    else
    {
        echo '<form method="post">
              <input type="submit" value="Login" name="login"/>
              </form>';
    }
?>
