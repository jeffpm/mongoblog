<div id="sidebar">
<h3>Posts</h3>
<?php
	function returnMonth($in){
		if($in==1)
			return "January";
		else if($in==2)
			return "February";
		else if($in==3)
			return "March";
		else if($in==4)
			return "April";
		else if($in==5)
			return "May";
		else if($in==6)
			return "June";
		else if($in==7)
			return "July";
		else if($in==8)
			return "August";
		else if($in==9)
			return "September";
		else if($in==10)
			return "October";
		else if($in==11)
			return "November";
		else if($in==12)
			return "December";	
	}
	$m = new Mongo();
	$collection = $m->blogsite->posts;
	$cursor = $collection->find()->sort(array('_id' => -1));
	
	$final=array();
	$years=array();
	$months=array();
	$temp=array();
	$tempMonth=array();;
	$Ycounter=-1;
	$Mcounter=0;
	$counter=0;
	$tempstring;
	while( $cursor->hasNext() ) {
	$post=$cursor->getNext();
	$string=$post['date'];
	$Mid=$post['_id'];
	$Title=$post['title'];
	
	$thisyear=substr($string, 0, strpos($string, "-"));
	if($Ycounter==-1){
		array_push($years, $thisyear);
		$Ycounter++;
		echo "$thisyear <br />";
	}
	//handle months
	$thismonth=substr($string, strpos($string, "-")+1, strlen($string)-1);
	$thismonth=substr($thismonth, 0, strpos($thismonth, "-"));
	$thismonth=(int)$thismonth;
	if($Mcounter!=0){
		if($Mcounter!=$thismonth){
			$Mcounter=$thismonth;
			$thismonth=returnMonth($thismonth);
			$months[$Mcounter]=$tempMonth;
			$tempMonth=array();
			echo "$tempstring";
			$tempstring.="&nbsp;&nbsp;&nbsp;<a href=\\\"post.php?id=$Mid\\\">$Title </a><br />";
			array_push($months, $Mcounter);
			array_push($tempMonth, $tempstring);
		}else{
			$tempstring.="&nbsp;&nbsp;&nbsp;<a href=\\\"post.php?id=$Mid\\\">$Title </a><br />";
		}
	}else{
		$Mcounter=$thismonth;
		array_push($months, $Mcounter);
		$thismonth=returnMonth($thismonth);
		$tempstring.="&nbsp;&nbsp;&nbsp;<a href=\\\"post.php?id=$Mid\\\">$Title </a><br />";
	}
	//handle new years
	if(!in_array("$thisyear", $years, TRUE)){
		array_push($years, $thisyear);
		$months=array();
		$tempMonth=array();
		$Ycounter++;
		echo "$thisyear <br />";
	}
	
	}
	$months=array_reverse($months);
	$tempMonth=array_reverse($tempMonth);
	array_push($tempMonth, $tempstring);
	for ($i=0; $i<count($tempMonth); $i++){
		$currentMonth=array_pop($months);
		$thisM=returnMonth($currentMonth);
		echo "&nbsp;<a href=\"#\" onclick=\"collapse_menu(menu".($i+1).", ".$i.")\"><img src=\"darrow.png\"></a>&nbsp;<a href=\"#\" onclick=\"collapse_menu(menu".($i+1).", ".$i.")\">".$thisM."</a><br /><span id=\"menu".($i+1)."\"></span>";
		//echo "&nbsp;&nbsp;&nbsp;<a href=\"#\" onclick=\"collapse_menu(menu".($i+1).", ".$i.")\"><img src=\"darrow.png\"></a><br />";
	}

	
?>
</div>
<script language="javascript">
var on_off=new Array();
var menu_code=new Array();


<?php
$numMenues=0;
for ($i=0; $i<count($tempMonth); $i++){
	$string=array_pop($tempMonth);
	echo "menu_code[".$i."]=\"".$string."\";";
	$numMenues++;
}
echo "number_of_menus=$numMenues;";
?>

//Everything below this notice is the code that expands and collapses the menus. Do NOT edit.
for (loop=0; loop<number_of_menus; loop++){
 on_off[loop]=0;
}

function collapse_menu(menu_id, menu_number){
  if (on_off[menu_number]==0){
    menu_id.innerHTML=menu_code[menu_number];
    on_off[menu_number]=1;
  }else{
    menu_id.innerHTML="";
    on_off[menu_number]=0;
  }
}
<?php if($numMenues>0){?>collapse_menu(menu<?php echo "$numMenues"; ?>, 0);<?php }?>
</script>