<?php
	session_start();
	$m = new Mongo();
	$usercollec = $m->blogsite->users;
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>mangoblog - login</title>
			<link href="style.css" rel="stylesheet" type="text/css" />
		</head>
		
		<body>
		<div id="container">
			<?php include "header.php"; include "sidebar.php"; ?>
		<div id="mainContent">
		<H1>login</H1>
		
<?php if (!isset($_POST['submit'])) { ?>
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
    <div style="clear:both;"></div>
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
	
	$userFound = false;
	$name = "";

	/* query for user with same username and password */
	$query = array("username" => $username, "password" => $password); 
	$cursor = $usercollec->find( $query );
	$stack = array();
	while( $cursor->hasNext() )
		array_push($stack, $cursor->getNext()); 
	
	if($stack != NULL){
		$stack = $stack[0];
		$name = $stack["firstname"]." ".$stack["lastname"];
		$userFound = true;
	}
	
	/*$cursor = $usercollec->find();
	while($cursor->hasNext() && $userFound == false){
		$post = $cursor->getNext();
		if($post["username"] == $username){
			$userFound = true;
			$name = $post["firstname"]." ".$post["lastname"];
		}
	}*/
	
	if($userFound == false){
	?>
		
		
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
        <div style="clear:both;"></div>
		</div>
		<?php include("footer.php"); ?>
		</div>
		</body>	
		</html>
			
		<?php
	}else
	{
		?>
		<p>
		<?php echo "Thank you for logging in, $name."; ?>
		</p>
		<p>
		<a href="index.php">home page</a>
		</p>
		
        <div style="clear:both;"></div>

		</div>	
			<?php include("footer.php"); ?>
		</div>
        </body>
		</html>
		<?php
		$_SESSION['username'] = $name;  //$firstname." ".$lastname
	}
}
?>