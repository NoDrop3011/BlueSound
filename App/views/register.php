<h1>Ini register page bang :v</h1>

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

<form method=POST>
  <label for="username">Username</label>
  <br>
  <input type="text" id="username" name="username" onkeyup="checkUnique(this.value, 'Username') ; validate()"> 
  <span id="unique_Username"></span>
  <br>
  <label for="email">E-mail</label>
  <br>
  <input type="text" id="email" name="email" onkeyup="checkUnique(this.value, 'Email') ; validate()">
  <span id="unique_Email"></span>
  
  <br>
  <label for="password">Password</label>
  <br>
  <input type="password" id="password" name="password" onkeyup="validate()">
  <br>
  <label for="confirmPassword">Confirm Password</label>
  <br>
  <input type="password" id="confirmPassword" name="confirmPassword" onkeyup="validate()">
  <br>
  <br>
  <input type="submit" value="Submit" id="submitButton">
</form>