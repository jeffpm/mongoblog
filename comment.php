<?php
	$m = new Mongo();
	$collection = $m->blogsite->posts;
	$postid = $_GET['id'];
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Comment</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
<?php include "header.php"; include "sidebar.php"; ?>
<div id="mainContent">
<?php
	$collection = $m->blogsite->comments;
	$query = array( "name" => "test"); /* The value you are searching for */
	$cursor = $collection->find( $query );
	$stack=array();
	while( $cursor->hasNext() ) {
		//var_dump( $cursor->getNext() );     /* These two lines just dump each result */
		//echo "<br />";
		array_push($stack, $cursor->getNext()); /* This line adds each result to an array */
	}
	echo "<table>";
	echo "<tr><th>Name</th><th>Comment</th><th>Date</th></tr>";
	for ($i=0; $i<count($stack); $i++){
		$thisPage=$stack[$i];
		$pageid=$thisPage["pageid"];
		$name=$thisPage["name"];
		$comment=$thisPage["comment"];
		$date=$thisPage["date"];
	echo "<tr><td>$name</td><td>$comment</td><td>$date</td></tr>";
	}
	echo "</table>";

if (!isset($_POST['submit'])) {
?>
<form method="post" action="<?php comment.php?>" enctype="multipart/form-data">
			<table>
			<tr><td>
				<label for="name">Name:</label>
				<td><input type="text" id="name" name="name" /> <br /></td>
			</td></tr>
			<tr><td>
				<label for="name">Comment:</label>
				<td><textarea id="comment" name="comment" rows="3" cols="50" ></textarea></td>
			</td></tr>
			<tr><td>
				<input type="submit" value="Submit Comment" name="submit" />
			</td></tr>
			</form>
        </table>
</div>
<?php 
}
else
{
		$collection = $m->blogsite->comments;
		$name = $_POST['name'];
		$comment =$_POST['comment'];
		$date=date("Y-m-d");
		$doc=array("postid" => $postid, "name" => $name, "comment" => $comment, "date" => $date);
		$collection->insert( $doc );
}
?>

<?php include "footer.php"; ?>

</div>
</body>
</html>