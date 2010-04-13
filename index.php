<?php
	$m = new Mongo();
	$collection = $m->blogsite->posts;
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>mongoBlog</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
<div id="main">
<?php include "header.php"; include "sidebar.php"; ?>
<div id="mainContent">
<?php
$cursor = $collection->find()->limit(9);
$cursor->sort(array('_id' => -1));
$stack=array();
while( $cursor->hasNext() ) {
	$post=$cursor->getNext();
	echo "<p class=\"post\">";
	echo "<a href=\"post.php?id=".$post["_id"]."\">".$post["title"]." by ".$post["author"].", ". $post["date"]."</a> <br />";
	$content = $post["content"];
	if(strlen($content)>100){
					$temp=strpos($content, " ", 95);
					$description=substr($content, 0, $temp);
					if(($description[strlen($content)-1]==",") 
					   or 
					   ($description[strlen($content)-1]=="."))
					
					{
						$description=substr($content, 0, $temp-1)."..";
					}else{
						$description=substr($content, 0, $temp)."..";
					}
				}
	echo "$description <br /> </p>";
}

?>
</div>
</div>
<?php include "footer.php"; ?>

</div>
</body>
</html>