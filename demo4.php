<?php

function get_cookie(){
    return rand();
}

function save_cookie($cookie){
    $f = fopen("csrf.txttxt", 'a');
    fwrite($f, $cookie.PHP_EOL);
    fclose($f);
}
function save_session($cookie){
    $f = fopen("session.txttxt", 'a');
    fwrite($f, $cookie.PHP_EOL);
    fclose($f);
}

function is_valid_session($cookie){
    $v = false;
    $f = fopen("session.txttxt", "r");
    while (($line = fgets($f)) !== false) {
        if($cookie == trim($line)){
            $v = true;
        }
    }
    fclose($f);
    return $v;
}

$error = false;
$error_msg = '';
$valid = false;
$valid_msg = '';
$test = '';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['ip']) && isset($_COOKIE['csrf'])){
        $v = is_valid_session($_COOKIE['csrf']);
        if($v){
            $ip = $_POST['ip'];
            $cmd = "ping -c 1 ".$ip;
            $valid_msg = shell_exec($cmd);
            $valid = true;
        }
    }else{
        $error = true;
        $error_msg = "error....";
    }
}else{
    if(isset($_COOKIE['csrf'])){
        $v= is_valid_session($_COOKIE['csrf']);
        if(!$v){
            header('Location: /demo/demo3.php');
        }
    }else{
        header('Location: /demo/demo3.php');
    }
    //get
    //$c = get_cookie();
    //setcookie('csrf',$c);
    //save_cookie($c);
    //save_session($c);
}


?>
<p>ping a machine with this tool...</p>
<form action="/demo/demo4.php" method="post">
ip:<br>
<input type="text" name="ip"><br><br><br>
<input type="submit" value="Submit">
</form>
<?php
if($error){
    echo "<p>error: ".$error_msg."</p>";
}
if($valid){
    echo "<p>ping result</p>";
    echo "<p>$valid_msg</p>";
}
?>

