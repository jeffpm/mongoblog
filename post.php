<?php
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
</div>


