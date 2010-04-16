<?php
	$m = new Mongo();
	$collection = $m->blogsite->posts;
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>mongoblog</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
<?php include "header.php"; include "sidebar.php"; ?>
<div id="mainContent">
<H1>mongoblog</H1>
<?php
if(is_numeric($_GET['id'])){
					$skipby=$_GET['id'];					
					}else if($_GET['id']<0){
						$skipby=1;
					}else{
						$skipby=1;
					}
					
$skip=9*($skipby-1);
if($skip>$collection->count()){
	$skipby=1;
	$skip=0;
}
//$cursor = $collection->find()->skip($skip);
//$cursor->sort(array('_id' => -1));
$cursor = $collection->find()->sort(array('_id' => -1));
if($skipby-1>0 AND $skipby!=NULL){
	$cursor->skip($skip);
}
$cursor->limit(9);
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
<div id="prev"><?php if(9*($skipby)<=$collection->count()){ echo "<a href=\"?id=".($skipby+1)."\">Previous Entries</a>";} ?></div>
<div id="next"><?php if(($skipby-1)>0){ echo "<a href=\"?id=".($skipby-1)."\">Newer Entries</a>";} ?></div> 
<br />
</div>
<?php include "footer.php"; ?>

</div>
</body>
</html>