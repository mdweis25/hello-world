<!DOCTYPE html>
<?php
	$cookie_name = "user";
	$cookie_value = "Alex Porter";
	$count = "count";
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
?>
<html>
	<head>
	</head>
	<body>
		<?php
			if(!isset($_COOKIE[$cookie_name])) {
				echo "Cookie named '" . $cookie_name . "' is not set!";
			} else {
 				echo "Cookie '" . $cookie_name . "' is set!<br>";
 				echo "Value is: " . $_COOKIE[$cookie_name];
			}
		?>
		<br><br>
		<?php
			if(!isset($_COOKIE[$count])) {
				echo "Cookie 'count' is not set!<br>";
			} else {
				echo "Cookie 'count' is set!<br>";
				echo "Value is: " . $_COOKIE[$count];
			}
		?>
		<br><br>
		<?php
			if(count($_COOKIE) > 0) {
				echo "Cookies are enabled.";
			} else {
				echo "Cookies are disabled.";
			}
			echo "Cookie count:";
			$var = count($_COOKIE);
			echo $var;
		?>
	</body>
</html>
