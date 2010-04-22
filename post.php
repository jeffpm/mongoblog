<?php
	session_start();
	$m = new Mongo();
	$collection = $m->blogsite->posts;
	$postid = $_GET['id'];
	$postid=new Mongoid($postid);
	
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
if (!isset($_POST['submit'])) {

	$collection = $m->blogsite->posts;

	$query = array( "_id" => $postid ); /* The value you are searching for */
	$cursor = $collection->find( $query );
	$stack=array();
	
	while( $cursor->hasNext() ) {
		array_push($stack, $cursor->getNext()); /* This line adds each result to an array */
	
	$thisPage=$stack[0];
	$author=$thisPage["author"];
	$title=$thisPage["title"];
	$date=$thisPage["date"];
	$content=$thisPage["content"];
}
?>
<?php
echo " <br> Post By: $author <br> <br>";

echo "Title: $title <br> <br>";

echo "Date: $date <br> <br>";

echo "$content <br> <br>";

?>

<?php
	$collection = $m->blogsite->posts;

	$query = array( "_id" => $postid ); /* The value you are searching for */
	$cursor = $collection->find( $query );
	$stack=array();
	while( $cursor->hasNext() ) {
		array_push($stack, $cursor->getNext()); /* This line adds each result to an array */
	}
	$thisPage=$stack[0];
	$comments=$thisPage["comments"];
	if ($comments!=NULL){
	$comments=array_reverse($comments);
	}
	$temp=array();

if($comments!=NULL){
	echo "<table>";
	echo "<tr><th>Name</th><th>Comment</th><th>Date</th></tr>";

while(current($comments)!=NULL){
	$temp=current($comments);
	$user=$temp["user"];
	$comment=$temp["comment"];
	$date=$temp["date"];
	echo "<tr><td>$user</td><td>$comment</td><td>$date</td>";
	//echo $temp["user"]." : ".$temp["comment"]."<br />";
	next($comments);
}
	echo "</table>";
}


	?>
<form method="post" action="<?php echo $PHP_SELF;?>" enctype="multipart/form-data">
			<table>
			<tr><td>
				<label for="name">Name:</label>
				<td><input type="text" id="name" name="name" /> <br /></td>
			</td></tr>
			<tr><td>
				<label for="name">Comment:</label>
				<td><textarea id="comment" name="comment" rows="3" cols="40" ></textarea></td>
			</td></tr>
			<tr><td>
				<input type="submit" value="Submit Comment" name="submit" />
			</td></tr>
			</form>
        </table>
        <div style="clear:both;"></div>
</div>
<?php 
}
else
{		

		$collection = $m->blogsite->posts;
		$name = $_POST['name'];
		$comment =$_POST['comment'];
		$date=date("Y-m-d");
		
		$collection->update(array("_id" => $postid), array('$push' => array('comments' => array('user' => $name, 'comment' => $comment, 'date'=>$date))));
		
	$collection = $m->blogsite->posts;

	$query = array( "_id" => $postid ); /* The value you are searching for */
	$cursor = $collection->find( $query );
	$stack=array();
	
	while( $cursor->hasNext() ) {
		array_push($stack, $cursor->getNext()); /* This line adds each result to an array */
	
	$thisPage=$stack[0];
	$author=$thisPage["author"];
	$title=$thisPage["title"];
	$date=$thisPage["date"];
	$content=$thisPage["content"];
}
echo " <br> Post By: $author <br> <br>";

echo "Title: $title <br> <br>";

echo "Date: $date <br> <br>";

echo "$content <br> <br>";

	$collection = $m->blogsite->posts;

	$query = array( "_id" => $postid ); /* The value you are searching for */
	$cursor = $collection->find( $query );
	$stack=array();
	while( $cursor->hasNext() ) {
		array_push($stack, $cursor->getNext()); /* This line adds each result to an array */
	}
	$thisPage=$stack[0];
	$comments=$thisPage["comments"];
	if ($comments!=NULL){
	$comments=array_reverse($comments);
	}
	$temp=array();

if($comments!=NULL){
	echo "<table>";
	echo "<tr><th>Name</th><th>Comment</th><th>Date</th></tr>";

while(current($comments)!=NULL){
	$temp=current($comments);
	$user=$temp["user"];
	$comment=$temp["comment"];
	$date=$temp["date"];
	echo "<tr><td>$user</td><td>$comment</td><td>$date</td>";
	//echo $temp["user"]." : ".$temp["comment"]."<br />";
	next($comments);
}
	echo "</table>";
}
?>
<form method="post" action="<?php echo $PHP_SELF;?>" enctype="multipart/form-data">
			<table>
			<tr><td>
				<label for="name">Name:</label>
				<td><input type="text" id="name" name="name" /> <br /></td>
			</td></tr>
			<tr><td>
				<label for="name">Comment:</label>
				<td><textarea id="comment" name="comment" rows="3" cols="40" ></textarea></td>
			</td></tr>
			<tr><td>
				<input type="submit" value="Submit Comment" name="submit" />
			</td></tr>
			</form>
        </table>
<?php
}
?>
</div>


