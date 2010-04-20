<?php
	$m = new Mongo();
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
	$collection = $m->blogsite->blogs;

	$query = array( "pageid" => 1 ); /* The value you are searching for */
	$cursor = $collection->find( $query );
	$stack=array();
	while( $cursor->hasNext() ) {
		array_push($stack, $cursor->getNext()); /* This line adds each result to an array */
	}
	$thisPage=$stack[0];
	$comments=$thisPage["comments"];
	$temp=array();

while(current($comments)!=NULL){
	$temp=current($comments);
	echo $temp["user"]." : ".$temp["comment"]."<br />";
	next($comments);
}

	echo "<table>";
	echo "<tr><th>Name</th><th>Comment</th><th>Date</th></tr>";
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
		$collection = $m->blogsite->blogs;
		$name = $_POST['name'];
		$comment =$_POST['comment'];
		$date=date("Y-m-d");
		$collection->update(array("pageid" => 1), array('$push' => array('comments' => array('user' => $name, 'comment' => $comment, 'date'=>$date))));
}
?>

<?php include "footer.php"; ?>

</div>
</body>
</html>