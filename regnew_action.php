<?php
  $mysqli = new mysqli("localhost", "user", "pwd", "table");
  if($mysqli->connect_error) {
    exit('Could not connect');
  }
  $sql = "SELECT name FROM user_info WHERE name = ?";
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param("s", $_GET['q']);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($name);
  $stmt->fetch();
  $stmt->close();
  echo $name;
?>
