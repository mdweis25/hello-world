<?php
  $mysqli = new mysqli("localhost", "root", "jXH2NysE7EBx9Q3e21", "user_accounts");
  if($mysqli->connect_error) {
    exit('Could not connect');
  }
  $sql = "SELECT name, pwd, email, joindate FROM user_info WHERE name = ?";
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param("s", $_GET['q']);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($name, $pwd, $email, $joindate);
  $stmt->fetch();
  $stmt->close();
  echo "<table>";
  echo "<tr>";
  echo "<th>name</th>";
  echo "<td>" . $name . "</td>";
  echo "<th>pwd</th>";
  echo "<td>" . $pwd . "</td>";
  echo "<th>email</th>";
  echo "<td>" . $email . "</td>";
  echo "<th>joindate</th>";
  echo "<td>" . $joindate . "</td>";
  echo "</tr>";
  echo "</table>";
?>
