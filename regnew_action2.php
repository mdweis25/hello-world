<?php
  $mysqli = new mysqli("localhost", "user", "pwd", "table");
  if($mysqli->connect_error) {
    exit('Could not connect');
  }
  $sql = "SELECT email FROM user_info WHERE email = ?";
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param("s", $_GET['q']);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($email);
  $stmt->fetch();
  $stmt->close();
  echo $email;
?>
