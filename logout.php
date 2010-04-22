<?php
	session_start();
	session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>mangoblog - logout</title>
			<link href="style.css" rel="stylesheet" type="text/css" />
			<script LANGUAGE="JavaScript">
			function redirection() {
				setTimeout("location.href='index.php'", 1000);
			}
		</script>
		</head>
		<body onLoad = "redirection()">
		<div id="container">
			<?php include "header.php"; include "sidebar.php"; ?>
		<div id="mainContent">
		<H1>logout</H1>
		<div>	
			<p>Logged out. Redirecting to homepage in a second...</p>
			<p>If that does not work, click <a href="index.php">here</a>.</p>
		</div>
	</div>
	<?php include("footer.php"); ?>
</div>
</body>
</html>