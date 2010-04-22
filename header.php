<div id="header">
<table width=780px>
<?php
if(isset($_SESSION['username'])){
	?> 
<tr><td width="70%"><H1><a href="./">mangoblog</a></H1></td>
<td width="15%"><a href="./postblog.php">compose</a></td>
<td width="15%"><a href="./logout.php">logout</a></td></tr>
<?php }else{ ?>
<tr><td width="70%"><H1><a href="./">mangoblog</a></H1></td>
<td width="15%"><a href="./login.php">login</a></td>
<td width="15%"><a href="./register.php">register</a></td></tr>
<?php }?>
</table>
</div>