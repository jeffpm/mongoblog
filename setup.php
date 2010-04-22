<?php
	$m = new Mongo();
	$m->blogsite->dropCollection("posts");
	$collection = $m->blogsite->posts;
	$doc=array("title" => "My First Blog Post", 
			   "author" => "Chris R",
			   "date" => "2010-04-09",
			   "content" => "This is my first blog post for Team 1's NoSQL project!, it's awesome, I know");
	$collection->insert( $doc );
	$doc=array("title" => "My Second Blog Post", 
			   "author" => "Chris R",
			   "date" => "2010-04-10",
			   "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae tellus libero. Ut et velit id lacus vehicula hendrerit ut quis dolor. Praesent vel quam et velit ornare aliquet. Nunc lacinia tincidunt quam, eget vestibulum diam pellentesque viverra. Maecenas ac mauris at nisi fringilla fringilla vitae ac augue. Morbi feugiat tellus sed massa eleifend sagittis. Cras lectus tortor, interdum sed viverra quis, tincidunt id nibh. Fusce eu sapien quam, ut sodales justo. Nulla sollicitudin venenatis erat at imperdiet. Donec fermentum velit in eros aliquam vel posuere ante tincidunt. Phasellus et turpis et tortor consequat molestie. Proin ligula odio, tincidunt in fermentum convallis, faucibus vitae nulla. Vestibulum iaculis imperdiet elit at tristique. Curabitur sit amet purus nisi, pulvinar congue nibh. Aliquam nec tellus nisi, non auctor neque. Curabitur a sapien mauris, in dapibus nisl. Vivamus fermentum elit vitae augue molestie tristique.");
	$collection->insert( $doc );
	$doc=array("title" => "Jeff's Blog Post", 
			   "author" => "Jeff",
			   "date" => "2010-04-11",
			   "content" => "Phasellus luctus, augue sed adipiscing adipiscing, erat erat gravida purus, eu interdum arcu orci ut est. Suspendisse et neque metus, adipiscing tincidunt magna. Cras consectetur, elit a adipiscing bibendum, lorem dolor interdum nulla, ac sollicitudin nisl justo vel sem. Vestibulum gravida est sit amet lacus elementum et fringilla mi mattis. Nulla facilisi. Proin ac turpis pharetra dolor tempor vulputate. Maecenas sit amet ullamcorper est. Aenean lacinia massa sollicitudin nisl mollis egestas. Morbi nulla tellus, placerat et congue vel, tristique vel nibh. Sed at quam sem, interdum eleifend orci. Nunc lacinia rhoncus lacinia. Maecenas eget neque quam. Donec at velit sit amet arcu varius dignissim eget quis nulla. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin sapien erat, varius a volutpat vel, dictum nec eros. Fusce vel odio lacus, id scelerisque neque.");
	$collection->insert( $doc );
	$doc=array("title" => "Another Blog Post", 
			   "author" => "Chris R",
			   "date" => "2010-04-11",
			   "content" => "Donec vel nibh ac nunc porta ullamcorper. Pellentesque est libero, consequat quis vehicula in, elementum quis dolor. In mauris dolor, gravida a congue id, dapibus vel nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec accumsan mi sed dui tristique ultricies. Nunc quam sem, mattis fermentum sagittis at, pellentesque vitae nisi. Duis malesuada rutrum sem, eu vehicula diam viverra vitae. Quisque odio lectus, cursus sit amet bibendum eu, tempus ac lacus. Phasellus non turpis non est fringilla euismod. Curabitur sit amet orci neque, vitae tempor felis. Quisque lobortis vestibulum tempus. Vestibulum blandit hendrerit orci viverra vehicula. Sed varius feugiat tellus, sed tempor orci gravida non. Nulla facilisi. Sed tristique, leo nec molestie bibendum, lacus libero tincidunt mi, quis pellentesque arcu eros eu lorem.");
	$collection->insert( $doc );
	$doc=array("title" => "More stuff!", 
			   "author" => "Jessica",
			   "date" => "2010-04-11",
			   "content" => "Etiam ut augue eu nisi ultricies sollicitudin vel ac ipsum. Praesent sed diam tellus, ut venenatis leo. Vivamus libero ligula, porta vel gravida eu, tincidunt sed augue. Nulla eu nunc id est faucibus suscipit non sed lorem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus id elit orci. Nullam felis lorem, mollis id interdum quis, luctus eget enim. Maecenas laoreet, est ac blandit pellentesque, eros turpis lacinia nisi, a auctor felis sem et urna. Curabitur interdum eleifend dui. Nullam in velit sit amet tortor porta pretium a ac nulla. Quisque consectetur, odio vehicula imperdiet elementum, dui quam vehicula metus, bibendum vestibulum turpis nulla ac enim. Aenean mollis condimentum tincidunt. Praesent nec rutrum urna. Fusce condimentum felis sit amet nisi dapibus ullamcorper. Sed leo nulla, rhoncus ut laoreet ac, fringilla ac eros.");
	$collection->insert( $doc );
	$doc=array("title" => "Filler Post", 
			   "author" => "Katherine",
			   "date" => "2010-04-12",
			   "content" => "Sed volutpat mi quis felis auctor quis condimentum sem volutpat. Nullam in mi quam. Donec congue porttitor quam vitae tempor. Donec eget tellus sit amet tortor eleifend ullamcorper. Nullam a velit sit amet lacus placerat tincidunt at non purus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis suscipit accumsan lacus a egestas. Nullam pretium lacinia erat vitae aliquet. Etiam varius sem non dui elementum eu dapibus urna ultricies. Praesent tincidunt rhoncus ante, eget aliquet metus tristique eget. Praesent tellus felis, facilisis ut feugiat sed, ultricies accumsan orci. Nam adipiscing convallis ante, eu malesuada tellus luctus at.");
	$collection->insert( $doc );
	$doc=array("title" => "Another post", 
			   "author" => "Jessica",
			   "date" => "2010-04-12",
			   "content" => "Etiam ut augue eu nisi ultricies sollicitudin vel ac ipsum. Praesent sed diam tellus, ut venenatis leo. Vivamus libero ligula, porta vel gravida eu, tincidunt sed augue. Nulla eu nunc id est faucibus suscipit non sed lorem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus id elit orci. Nullam felis lorem, mollis id interdum quis, luctus eget enim. Maecenas laoreet, est ac blandit pellentesque, eros turpis lacinia nisi, a auctor felis sem et urna. Curabitur interdum eleifend dui. Nullam in velit sit amet tortor porta pretium a ac nulla. Quisque consectetur, odio vehicula imperdiet elementum, dui quam vehicula metus, bibendum vestibulum turpis nulla ac enim. Aenean mollis condimentum tincidunt. Praesent nec rutrum urna. Fusce condimentum felis sit amet nisi dapibus ullamcorper. Sed leo nulla, rhoncus ut laoreet ac, fringilla ac eros.");
	$collection->insert( $doc );
	$doc=array("title" => "Another Blog Post", 
			   "author" => "Chris R",
			   "date" => "2010-04-12",
			   "content" => "Donec vel nibh ac nunc porta ullamcorper. Pellentesque est libero, consequat quis vehicula in, elementum quis dolor. In mauris dolor, gravida a congue id, dapibus vel nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec accumsan mi sed dui tristique ultricies. Nunc quam sem, mattis fermentum sagittis at, pellentesque vitae nisi. Duis malesuada rutrum sem, eu vehicula diam viverra vitae. Quisque odio lectus, cursus sit amet bibendum eu, tempus ac lacus. Phasellus non turpis non est fringilla euismod. Curabitur sit amet orci neque, vitae tempor felis. Quisque lobortis vestibulum tempus. Vestibulum blandit hendrerit orci viverra vehicula. Sed varius feugiat tellus, sed tempor orci gravida non. Nulla facilisi. Sed tristique, leo nec molestie bibendum, lacus libero tincidunt mi, quis pellentesque arcu eros eu lorem.");
	$collection->insert( $doc );
	$doc=array("title" => "More stuff!", 
			   "author" => "Jessica",
			   "date" => "2010-04-13",
			   "content" => "Etiam ut augue eu nisi ultricies sollicitudin vel ac ipsum. Praesent sed diam tellus, ut venenatis leo. Vivamus libero ligula, porta vel gravida eu, tincidunt sed augue. Nulla eu nunc id est faucibus suscipit non sed lorem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus id elit orci. Nullam felis lorem, mollis id interdum quis, luctus eget enim. Maecenas laoreet, est ac blandit pellentesque, eros turpis lacinia nisi, a auctor felis sem et urna. Curabitur interdum eleifend dui. Nullam in velit sit amet tortor porta pretium a ac nulla. Quisque consectetur, odio vehicula imperdiet elementum, dui quam vehicula metus, bibendum vestibulum turpis nulla ac enim. Aenean mollis condimentum tincidunt. Praesent nec rutrum urna. Fusce condimentum felis sit amet nisi dapibus ullamcorper. Sed leo nulla, rhoncus ut laoreet ac, fringilla ac eros.");
	$collection->insert( $doc );
	$doc=array("title" => "Filler Post", 
			   "author" => "Katherine",
			   "date" => "2010-04-13",
			   "content" => "Sed volutpat mi quis felis auctor quis condimentum sem volutpat. Nullam in mi quam. Donec congue porttitor quam vitae tempor. Donec eget tellus sit amet tortor eleifend ullamcorper. Nullam a velit sit amet lacus placerat tincidunt at non purus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis suscipit accumsan lacus a egestas. Nullam pretium lacinia erat vitae aliquet. Etiam varius sem non dui elementum eu dapibus urna ultricies. Praesent tincidunt rhoncus ante, eget aliquet metus tristique eget. Praesent tellus felis, facilisis ut feugiat sed, ultricies accumsan orci. Nam adipiscing convallis ante, eu malesuada tellus luctus at.");
	$collection->insert( $doc );
	$doc=array("title" => "Another post", 
			   "author" => "Jessica",
			   "date" => "2010-04-13",
			   "content" => "Etiam ut augue eu nisi ultricies sollicitudin vel ac ipsum. Praesent sed diam tellus, ut venenatis leo. Vivamus libero ligula, porta vel gravida eu, tincidunt sed augue. Nulla eu nunc id est faucibus suscipit non sed lorem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus id elit orci. Nullam felis lorem, mollis id interdum quis, luctus eget enim. Maecenas laoreet, est ac blandit pellentesque, eros turpis lacinia nisi, a auctor felis sem et urna. Curabitur interdum eleifend dui. Nullam in velit sit amet tortor porta pretium a ac nulla. Quisque consectetur, odio vehicula imperdiet elementum, dui quam vehicula metus, bibendum vestibulum turpis nulla ac enim. Aenean mollis condimentum tincidunt. Praesent nec rutrum urna. Fusce condimentum felis sit amet nisi dapibus ullamcorper. Sed leo nulla, rhoncus ut laoreet ac, fringilla ac eros.");
	$collection->insert( $doc );
	
	
	
	
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>