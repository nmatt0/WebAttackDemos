<?php

$is_ie = false;
$ua = $_SERVER['HTTP_USER_AGENT'];
if(strpos($ua,"MSIE 8.0")){
	$is_ie = true;
}

if($is_ie){
	print "access granted2";
}else{
	print "access denied! You aren't using IE 8...";
}


?>
