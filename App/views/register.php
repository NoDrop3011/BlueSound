<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
          password = document.getElementById('input-form-password').value;
          confirmPassword = document.getElementById('input-form-confirmPassword').value;
          valid = unique_Username === "OK" 
                  && unique_Email === "OK"
                  && password === confirmPassword
                  && unique_Username.length !== 0 
                  && unique_Email.length !== 0
                  && password.length !== 0
                  && confirmPassword.length !== 0;
          if (unique_Username)
          {
            if (unique_Username !== "OK")
            {
              document.getElementById('input-form-username').style.borderColor = "red";
            }
            else
            {
              document.getElementById('input-form-username').style.borderColor = "LawnGreen";
            }
          }

          if (unique_Email)
          {
            if (unique_Email !== "OK")
            {
              document.getElementById('input-form-email').style.borderColor = "red";
            }
            else
            {
              document.getElementById('input-form-email').style.borderColor = "LawnGreen";
            }
          }

          if (valid)
          {
            document.getElementById("input-form-username").style.borderColor = 'LawnGreen';
            document.getElementById('input-form-email').style.borderColor = "LawnGreen";
            document.getElementById("submit-form").disabled = false;
            document.getElementById("submit-form").enabled = true;
          }
          else
          {

            document.getElementById("submit-form").enabled = false;
            document.getElementById("submit-form").disabled = true;
          }
      }

      window.onload = function() {
          validate();
        }
      setInterval(validate, 50);
    </script>
    <?php 
          require_once "components/dependenciesIncluder.php";
          addHeaderNavDependencies();
    ?>
  </head>
  <h1>Register to BlueSound</h1>

  <body>
    <?php require_once "components/headernav.php"; ?>
    <div class="main-container-register">
      
      <form method=POST>

      <div class="username-div">
        <label for="username" style="color:white">Username</label>
        <br>
        <input type="text" id="input-form-username" name="username" onkeyup="checkUnique(this.value, 'Username') ; validate()"> 
        <span id="unique_Username"></span>
      </div>

      <br>

      <div class="email-div">
        <label for="email" style="color:white">E-mail</label>
        <br>
        <input type="text" id="input-form-email" name="email" onkeyup="checkUnique(this.value, 'Email') ; validate()">
        <span id="unique_Email"></span>
      </div>

      <br>
      <div class="register-password-div">
        <label for="password" style="color:white">Password</label>
        <br>
        <input type="password" id="input-form-password" name="password" onkeyup="validate()">
      </div>

      <br>
      
      <div class="confirm-password-div">
        <label for="confirmPassword"style="color:white">Confirm Password</label>
        <br>
        <input type="password" id="input-form-confirmPassword" name="confirmPassword" onkeyup="validate()">
        <br>
      </div>
      
      <br>
      <div class="register-submit-form-div">
        <input type="submit" value="Register" id="submit-form">
      </div>
      <div class = "register-border"></div>
      <p class="register-footer-text">Already on BlueSound?</p>
      <button type="button" class="register-footer-button" onclick="location.href='/login'">Log in to BlueSound</button>
      </form>
    </div>
  </body>

</html>
