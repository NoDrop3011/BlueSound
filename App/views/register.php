<?php
    require_once("./utils/Getter.php");
    dependenciesGenerator([], ["../style/auth.css"]);  
?>

<h1>BlueSound</h1>

<script>
function checkUnique(str, type) {
  if (str.length !== 0) {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("unique_" + type).innerHTML = this.responseText;
      }
    };
    request.open("GET", "api/register/check" + type + "?" + 
                  type + "=" + str);
    request.send();
  }
  else
  {
    document.getElementById("unique_" + type).innerHTML = ""
  }
}

function validate() { 
    unique_Username = document.getElementById('unique_Username').innerHTML; 
    unique_Email = document.getElementById('unique_Email').innerHTML;
    password = document.getElementById('password').value;
    confirmPassword = document.getElementById('confirmPassword').value;
    valid = unique_Username === "OK" 
            && unique_Email === "OK"
            && password === confirmPassword
            && unique_Username.length !== 0 
            && unique_Email.length !== 0
            && password.length !== 0
            && confirmPassword.length !== 0;
    if (valid)
    {
      document.getElementById("submitButton").disabled = false;
      document.getElementById("submitButton").enabled = true;
    }
    else
    {

      document.getElementById("submitButton").enabled = false;
      document.getElementById("submitButton").disabled = true;
    }
}

window.onload = function() {
    validate();
  }
setInterval(validate, 50);

</script>

<div class="main-container">
  <form method=POST>
    <div class="username-div">
      <label for="username">Username</label><br>
      <input type="text" id="input-form" name="username" onkeyup="checkUnique(this.value, 'Username')">
      <span id="unique_Username"></span>
    </div>
    <div class="email-div">
      <label for="email">Email</label><br>
      <input type="text" id="input-form" name="email" onkeyup="checkUnique(this.value, 'Email')">
      <span id="unique_Email"></span>
    </div>
    <div class="register-password-div">
      <label for="password">Password</label><br> 
      <input type="password" id="input-form" name="password" onkeyup="validate()">
    </div>
    <div class="confirm-password-div">
      <label for="confirmPassword">Confirm Password</label><br> 
      <input type="password" id="input-form" name="confirmPassword" onkeyup="validate()">
    </div>
    <div class="register-submit-form-div">
      <input type="submit" id="submit-form" value="Register">
    </div>
    <div class = "register-border"></div>
    <p class="register-footer-text">Already on BlueSound?</p>
    <button type="button" class="register-footer-button" onclick="location.href='/login'">Log in to BlueSound</button>
  </form>
</div>