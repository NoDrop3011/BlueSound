<h1>Home page</h1>

<?php
    if (isset($_SESSION["loggedInUser"]))
    {
        $greet = "<h3> Hello, ".$_SESSION["loggedInUser"]."</h3>";
        echo $greet;
        echo "<br>";
        echo '<form method="post">
              <input type="submit" value="Logout" name="logout"/>
              </form>';  
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