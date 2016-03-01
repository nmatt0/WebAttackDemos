<?php

$isAdmin = false;

$c = $_COOKIE['isAdmin'];
if($c == '1'){
    $isAdmin = true;
}

if($isAdmin){
    print "you are the admin! winning.";
}else{
    print "you are not the admin... no cookies for you ;)";
}
setcookie("isAdmin","0");


?>
