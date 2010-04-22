<?php
	session_start();
	$m = new Mongo();
	$postid = $_GET['id'];
	$postid=new Mongoid($postid);
	$author=$_SESSION['username'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="container">
<?php include "header.php"; include "sidebar.php"; ?>
<div id="mainContent">
<?php

$boolean=false;
$deleted=false;
if(isset($_SESSION['username'])){
	$collection = $m->blogsite->posts;
	$query = array( "_id" => $postid );
	$cursor = $collection->find($query);
	if($cursor->hasNext()){
		$post=$cursor->getNext();
		$author=$post["author"];
	}
	if($_SESSION['username']==$author){
		$boolean=true;
		if($_GET['yes']=="true"){
			$collection->remove(array('_id' => $postid), array("justOne" => true));
			$deleted=true;
			$boolean=false;
		}
	}else{
		$boolean=false;
	}
}else{
	$boolean=false;
}
if($deleted){
	?>
<br />Post deleted. Redirecting to main page.<meta http-equiv="refresh" content="3;url=index.php">
	<?php
}else if($boolean){
?>
<br />Are you sure you want to delete this post? <a href="<?php echo $PHP_SELF;?>?id=<?php echo $postid."&";?>yes=true">Yes</a> - <a href="./">No</a>
<?php 
}else{
?>
Error. Redirecting. <meta http-equiv="refresh" content="3;url=index.php">
<?php 
}

?>
<div style="clear:both;"></div>
</div>
<?php include "footer.php"; ?>

</div>
</body>
</html>