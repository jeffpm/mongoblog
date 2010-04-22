<?php
	$m = new Mongo();
	$collection = $m->blogsite->users;
	
if (!isset($_POST['submit'])) {
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>mongoblog - login</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
	</head>
	
	<body>
	<div id="container">
		<?php include "header.php"; include "sidebar.php"; ?>
	<div id="mainContent">
	<H1>mongoblog - login</H1>
	
	<table cellpadding="5" cellspacing="10">
		<form method="post" action="<?php echo $PHP_SELF;?>">
		<tr>
			<td align="right">
				<label for="username">Enter Username:</label>
				<input type="text" id="username" name="username" /><br />
			</td>
		</tr>
		
		<tr>
			<td align="right">
				<label for="password">Enter Password:</label>
				<input type="password" id="password" name="password" /><br />
			</td>
		</tr>
		
		<tr>
			<td align="right">
				<input type="submit" value="submit" name="submit">
			</td>
		</tr>
		</form>
	</table>
	</div>
	<?php include("footer.php"); ?>
	</div>
	</body>	
	</html>
<?php
}
else 
{	
	$username = $_POST["username"];
	$password = $_POST["password"];
  
	$cursor = $collection->find()->sort(array('_id' => -1));
	$userFound = false;
	$correctCombo = false;
	$name = "";
	while($cursor->hasNext() && $userFound == false){
		$post = $cursor->getNext();
		if($post["username"] == $username){
			$userFound = true;
			if($post["password"] == $password){
				$correctCombo = true;
				$name = $post["firstname"]." ".$post["lastname"];
			}
		}
	}
	
	if(!$userFound || !$correctCombo){
	?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>mongoblog - login</title>
			<link href="style.css" rel="stylesheet" type="text/css" />
		</head>
		
		<body>
		<div id="container">
			<?php include "header.php"; include "sidebar.php"; ?>
		<div id="mainContent">
		<H1>mongoblog - login</H1>
		
		<table cellpadding="5" cellspacing="10">
		<form method="post" action="<?php echo $PHP_SELF;?>">
		Username/password combination not found.
		<tr>
			<td align="right">
				<label for="username">Enter Username:</label>
				<input type="text" id="username" name="username" /><br />
			</td>
		</tr>
		
		<tr>
			<td align="right">
				<label for="password">Enter Password:</label>
				<input type="password" id="password" name="password" /><br />
			</td>
		</tr>
		
		<tr>
			<td align="right">
				<input type="submit" value="submit" name="submit">
			</td>
		</tr>
		</form>
		</table>
		</div>
		<?php include("footer.php"); ?>
		</div>
		</body>	
		</html>
			
		<?php
	}else
	{
		?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
		  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<HTML xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
		<HEAD>
		<TITLE>Log In </TITLE>
		<link rel="stylesheet" type="text/css" href="style.css" />
		</HEAD>
		<body>
		<div id="container">
			<?php include "header.php"; include "sidebar.php"; ?>
		<div id="mainContent">
		<H1>mongoblog - login</H1>
		<p>
		<?php echo "Thank you for logging in, $name."; ?>
		</p>
		<br />
		<a href="index.php">home page</a>
		<br />
		</body>
		</div>	
			<?php include("footer.php"); ?>
		</div>
		</html>
		<?php
		$_SESSION['username'] = $name;  //$firstname." ".$lastname
	}
}
?>