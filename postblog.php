<?php
	session_start();
	$m = new Mongo();
	$collection = $m->blogsite->posts;
	$postid = $_GET['id'];
	$author=$_SESSION['username'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>post blog</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
<?php include "header.php"; include "sidebar.php"; ?>
<div id="mainContent">

<?php
if(isset($_SESSION['username'])){
	if (!isset($_POST['submit'])) {
	?>
	<form method="post" action="<?php $PHP_SELF; ?>" enctype="multipart/form-data">
				<table>
				<tr><td valign="center">
					<label for="title"><b>Title:</b></label>
					<td>
					<textarea id="title" name="title" rows="1" cols="50" style="resize: none;"></textarea></td>
					
				</td></tr>
				<tr><td valign="top">
					<label for="name"><b>Post Blog:</b></label>
					<td><textarea id="blog" name="blog" rows="20" cols="50" style="resize: none;"></textarea></td>
				</td></tr>
				<tr><td/><td><center>
					<input type="submit" value="Submit Blog" name="submit" />
				</center></td></tr>
				</form>
			</table>
            <div style="clear:both;"></div>
	</div>
	<?php 
	}
	else
	{
			$collection = $m->blogsite->posts;
			$title = $_POST['title'];
			$blog =$_POST['blog'];
			$date=date("Y-m-d");
			$doc=array("author" => $author, "title" => $title, "content" => $blog, "date" => $date);
			$collection->insert( $doc );
			
			echo "<p>Thank you for adding a post!</p><div style=\"clear:both;\"></div></div><div style=\"clear:both;\"></div>";
	}
}
else{
?>
	<p>
	<label>Please login to post.</label>
	</p>
	<p>
	<a href="index.php">home page</a>
	</p>
    </div>
    <div style="clear:both;"></div>
<?php 
}
?>	

<?php include "footer.php"; ?>

</div>
</body>
</html>