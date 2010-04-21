<?php
	$m = new Mongo();
	$collection = $m->blogsite->posts;
	$postid = $_GET['id'];
	$author=$_SESSION['user'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Post Blog</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
<?php include "header.php"; include "sidebar.php"; ?>
<div id="mainContent">

<?php
	$collection = $m->blogsite->posts;
	$query = array( "title" => "date"); /* The value you are searching for */
	$cursor = $collection->find( $query );
	$stack=array();
	while( $cursor->hasNext() ) {
		//var_dump( $cursor->getNext() );     /* These two lines just dump each result */
		//echo "<br />";
		array_push($stack, $cursor->getNext()); /* This line adds each result to an array */
	}
	echo "<table>";
	echo "<tr><th>Title</th><th>Blog</th><th>Date</th></tr>";
	for ($i=0; $i<count($stack); $i++){
		$thisPage=$stack[$i];
		$pageid=$thisPage["pageid"];
		$title=$thisPage["title"];
		$blog=$thisPage["blog"];
		$date=$thisPage["date"];
	echo "<tr><td>$title</td><td>$blog</td><td>$date</td></tr>";
	}
	echo "</table>";

if (!isset($_POST['submit'])) {
?>
<form method="post" action="<?php postblog.php?>" enctype="multipart/form-data">
			<table>
			<tr><td>
				<label for="title"><b>Title:</b></label>
				<td>
				<textarea id="title" name="title" rows="1" cols="50"></textarea></td>
				
			</td></tr>
			<tr><td>
				<label for="name"><b>Post Blog:</b></label>
				<td><textarea id="blog" name="blog" rows="20" cols="50" ></textarea></td>
			</td></tr>
			<tr><td/><td><center>
				<input type="submit" value="Submit Blog" name="submit" />
			</center></td></tr>
			</form>
        </table>
</div>
<?php 
}
else
{
		$collection = $m->blogsite->posts;
		$title = $_POST['title'];
		$blog =$_POST['blog'];
		$date=date("Y-m-d");
		$doc=array("author" => $author, "title" => $title, "blog" => $blog, "date" => $date);
		$collection->insert( $doc );
}
?>

<?php include "footer.php"; ?>

</div>
</body>
</html>