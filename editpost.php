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
<title>edit post</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="container">
<?php include "header.php"; include "sidebar.php"; ?>
<div id="mainContent">
<?php
if (isset($_POST['submit'])) {
	$postid = $_GET['id'];
	$postid=new Mongoid($postid);
	$title = $_POST['title'];
	$blog =$_POST['blog'];
	$date=date("Y-m-d");
	$collection = $m->blogsite->posts;
	$collection->update(array("_id" => $postid), array('$set' => 
													   array('title' => $title, 'date' => $date, 'content' => $blog)
													   )
							  );
	$collection->update(array("_id" => $postid), array('$push' => array('title' => $title)));
	echo "Post updated, redirecting...<meta http-equiv=\"refresh\" content=\"4;url=post.php?id=$postid\">";
}else{
$boolean=false;
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
	}else{
		$boolean=false;
	}
}else{
	$boolean=false;
}
if($boolean){
?>
<form method="post" action="<?php $PHP_SELF;?>">
<table>
				<tr><td valign="center">
					<label for="title"><b>Title:</b></label>
					<td>
					<textarea id="title" name="title" rows="1" cols="50" style="resize: none;"><?php echo $post['title']; ?></textarea></td>
					
				</td></tr>
				<tr><td valign="top">
					<label for="name"><b>Content:</b></label>
					<td><textarea id="blog" name="blog" rows="20" cols="50" style="resize: none;"><?php echo $post['content']; ?></textarea></td>
				</td></tr>
				<tr><td/><td><center>
					<input type="submit" value="Submit Blog" name="submit" />
				</center></td></tr>
				</form>
			</table>
</form>
<?php 
}else{
?>
Error. Redirecting. <meta http-equiv="refresh" content="3;url=index.php">
<?php 
}
}
?>
<div style="clear:both;"></div>
</div>
<?php include "footer.php"; ?>

</div>
</body>
</html>