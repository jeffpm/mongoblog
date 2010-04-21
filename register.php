<?php
	$m = new Mongo();
	$collection = $m->blogsite->users;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>mongoblog - register</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
	<?php include "header.php"; include "sidebar.php"; ?>
<div id="mainContent">
<H1>mongoblog - register</H1>

<?php
//Collect the variables from the form
$username = $_POST["username"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$password = $_POST["password"];
$password2 = $_POST["password2"];
$email = $_POST["email"];

//If the submit button wasn't pressed, show the form
if (!isset($_POST['submit'])) {
?>
		<table cellpadding="1" cellspacing="10">
		<form method="post" action="<?php echo $PHP_SELF;?>">
		<tr>
			<td align="right">	
				<label for="username">username:</label>
				<input type="text" id="username" name="username" /><br />
			</td>
		</tr>
		<tr>
			<td align="right">
				<label for="password">password:</label>
				<input type="password" id="password" name="password" /><br />
			</td>
		</tr>
		<tr>
			<td align="right">
				<label for="password">reenter password:</label>
				<input type="password" id="password2" name="password2" /><br />
			</td>
		</tr>
		<tr>
			<td align="right">
				<label for="firstname">first name:</label>
				<input type="text" id="firstname" name="firstname" /><br />
			</td>
		</tr>
		<tr>
			<td align="right">
				<label for="lastname">last name:</label>
				<input type="text" id="lastname" name="lastname" /><br />
			</td>
		</tr>
		<tr>
			<td align="right">
				<label for="email">email:</label>
				<input type="text" id="email" name="email" /><br />
			</td>
		</tr>
		<tr>
			<td align="right">
				<input type="submit" value="submit" name="submit">
				</form>
			</td>
		</tr>
	</table>
<?php
}
else {

	//if one of the fields was blank, show the form again
	
	$cursor = $collection->find()->sort(array('_id' => -1));
	$usernameTaken = false;
	while($cursor->hasNext() && $usernameTaken == false){
		$post = $cursor->getNext();
		if($post["username"] == $username){
			$usernameTaken = true;
		}
	}
	if (empty($username)|| empty($firstname)|| empty($lastname)|| empty ($password)|| empty($password2) || empty($email) || $password != $password2 || $usernameTaken){
	?>
			<table cellpadding="1" cellspacing="10">
			<form method="post" action="<?php echo $PHP_SELF;?>">
			<tr>
				<td align="right">
					<?php
					
					//display error message for username field
					echo "<label for=\"username\">username:</label>";
					if($usernameTaken){
						echo "<input type=\"text\" id=\"username\" name=\"username\" />";
						echo "</td><td>username already exists";
					}
					elseif(empty($username)){
						echo "<input type=\"text\" id=\"username\" name=\"username\" />";
						echo "</td><td>enter username";
					}
					else{
						echo "<input type=\"text\" id=\"username\" name=\"username\" value=\"$username\" />";
					}
					?>
				</td>
			</tr>
			<tr>
				<td align="right">
					<?php
					//display error message for password field
					echo "<label for=\"password\">password:</label>";
					echo "<input type=\"password\" id=\"password\" name=\"password\" />";
					echo "</td><td>enter password";
					?>
				</td>	
			</tr>
			<tr>
				<td align="right">
					<?php
					//display error message for password field
					echo "<label for=\"password2\">reenter password:</label>";
					echo "<input type=\"password\" id=\"password2\" name=\"password2\" />";
					echo "</td><td>reenter password";
					?>
				</td>	
			</tr>
			<tr>
				<td align="right">
					<?php
					//display error message for first name field
					echo "<label for=\"firstname\">first name:</label>";
					if (empty($firstname)){
						echo "<input type=\"text\" id=\"firstname\" name=\"firstname\" />";
						echo "</td><td>enter first name";
					}
					else{
						echo "<input type=\"text\" id=\"firstname\" name=\"firstname\" value=\"$firstname\" />";
					}
					?>
				</td>
			</tr>
			<tr>
				<td align="right">
					<?php
					//display error message for last name field
					echo "<label for=\"lastname\">last name:</label>";
					if (empty($lastname)){
						echo "<input type=\"text\" id=\"lastname\" name=\"lastname\" />";
						echo "</td><td>enter last name";
					}
					else{
					echo "<input type=\"text\" id=\"lastname\" name=\"lastname\" value=\"$lastname\" />";
					}
					?>
				</td>
			</tr>
			<tr>
				<td align="right">
					<?php
					//display error messager for email field
					echo "<label for=\"email\">email:</label>";
					if (empty($email)){
						echo "<input type=\"text\" id=\"email\" name=\"email\" />";
						echo "</td><td>enter email";
					}
					else{
					echo "<input type=\"text\" id=\"email\" name=\"email\" value=\"$email\" />";
					}
					?>
				</td>
			</tr>
			<tr>
				<td align="center">
					<?php
					echo "<input type=\"submit\" value=\"submit\" name=\"submit\">";
					echo "</form>";
					?>
				</td>
			</tr>
			</table>
		<?php
	//if everything was filled in correctly, add the entry to the database
}else{
	$cursor = $collection->find()->sort(array('_id' => -1));
	
	$newUser = array("username" => "$username",
					 "password" => "$password",
					 "firstname" => "$firstname",
					 "lastname" => "$lastname",
					 "email" => "$email");
	
	$collection->insert($newUser);
	
	?>
	<table cellpadding="5" cellspacing="10">
	<tr>
		<td>
			<label>Thank you for creating an account.</label>
			<br />
			<a href="index.php?id=1">home page</a>
		</td>
	</tr>
	</table>
	<?php
	}
}
?>
	
<br />
</div>
<?php include "footer.php"; ?>

</div>
</body>
</html>