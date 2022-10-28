<?php 
      require_once "components/dependenciesIncluder.php";
      addHeaderNavDependencies();
?>

<!-- <h1>BlueSound</h1> -->
<?php require_once "components/headernav.php"; ?>
<div class="main-container">
  <form method=POST>
    <div class="username-div">
      <label for="username" style="color:white">Username</label><br>
      <input type="text" id="input-form" name="username">
    </div>
    <div class="password-div">
      <label for="password" style="color:white">Password</label>
      <br> 
      <input type="password" id="input-form" name="password"> <br>
      <br>
    </div>
    <div class="submit-form-div">
      <input type="submit" id="submit-form" value="Log in">
    </div>
    <div class = "border"></div>
    <p class="footer-text">Don't have an account?</p>
    <button type="button" class="footer-button" onclick="location.href='/register'">Register to BlueSound</button>
  </form>
</div>