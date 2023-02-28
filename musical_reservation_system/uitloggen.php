<html>
<head>
<link rel="stylesheet" href="./styles.css">
<?php
	setcookie("ingelogd", "0", time() - (86400 * 30), "/");
	if(!isset($_COOKIE["ingelogd"])) {
		$rol = 0;
	} else {
		$value = explode('-', $_COOKIE["ingelogd"]);
		$rol = $value[0];
	}
	header("Refresh:0; url=../index.php");
?>
</head>
<body>
</body>
</html>