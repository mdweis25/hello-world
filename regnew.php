<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style3.css">
</head>
<?php
  $usernameErr = $emailErr = $pwdErr = $pwdcnfmErr = "";
  $username = $email = $pwd = $pwdcnfm = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
      $usernameErr = "Username is required";
    } else {
      $username = test_input($_POST["username"]);
      if (!preg_match("/^(?=\S{4,})[A-Za-z0-9_]+$/",$username)) {
        $usernameErr = "Username must be at least 4 letters long, only letters and numbers allowed";
      } else {
        $usernameErr = "Username requirements met!";
      }
    }
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      } else {
        $emailErr = "Email requirements met!";
      }
    }
    if (empty($_POST["pwd"])) {
      $pwdErr = "Password is required";
    } else {
      $pwd = test_input($_POST["pwd"]);
      if (!preg_match("/^(?=\S{8,})[A-Za-z0-9]+$/",$pwd)) {
        $pwdErr = "Invalid password format";
      } else {
        $pwdErr = "Password requirements met!";
      }
      if (empty($_POST["pwdcnfm"])) {
        $pwdcnfmErr = "Passwords do not match";
      } else {
        if ($_POST["pwd"] == $_POST["pwdcnfm"]) {
          $pwdcnfmErr = "Passwords match!";
        } else {
          $pwdcnfmErr = "Passwords do not match";
        }
      }
    }
  }
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  echo $usernameErr;
  echo "<br>";
  echo $emailErr;
  echo "<br>";
  echo $pwdErr;
  echo "<br>";
  echo $pwdcnfmErr;
  echo "<br><br>";
  foreach ($_POST as $item) {
    echo $item;
    echo "<br>";
  }
  echo "<br>";
?>
<body>
  <div id="txtHint"><br></div>
  <div id="txtHint2"><br></div>
  <script>
  loadDoc();
  function loadDoc() {
    var xhttp;
    var str = "";
    var str2 = "";
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
        var resp = this.responseText;
        if (str == this.responseText) {
          if (!this.responseText == "") {
            document.getElementById("txtHint").innerHTML = "Username is unavailable";
          } else {
            document.getElementById("txtHint").innerHTML = "Username available!";
          }
        }
      }
    };
    xhttp.open("GET", "regnew_action.php?q="+str, true);
    xhttp.send();
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint2").innerHTML = this.responseText;
        var resp = this.responseText;
        if (str2 == this.responseText) {
          if (!this.responseText == "") {
            document.getElementById("txtHint2").innerHTML = "Email is already registered";
          } else {
            document.getElementById("txtHint2").innerHTML = "Email not yet registered!";
          }
        }
      }
    };
    xhttp.open("GET", "regnew_action2.php?q="+str2, true);
    xhttp.send();
  }
  </script>
</body>
</html>
