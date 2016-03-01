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

function is_valid($cookie){
    $v = false;
    $f = fopen("csrf.txttxt", "r");
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
$test = '';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_COOKIE['csrf'])){
        $v = is_valid($_COOKIE['csrf']);
        if($v){
            if($_POST['username'] == 'admin' && $_POST['password']){
                $valid = true;
            }else{
                $error = true;
                $error_msg = "username and/or password incorrect";
            }
        }
    }else{
        if(!isset($_POST['csrf_token'])){
            $error = true;
            $error_msg = "csrf token failed!";
        }else{
            $error = true;
            $error_msg = "didn't fill out required fields";
        }
    }
}else{
    //get
    $c = get_cookie();
    setcookie('csrf',$c);
    save_cookie($c);
    save_session($c);
}


?>
<p>hint: admin,admin</p>
<form action="/demo/demo3.php" method="post">
username:<br>
<input type="text" name="username"><br>
password:<br>
<input type="password" name="password" ><br><br>
<input type="submit" value="Submit">
</form>
<?php
if($error){
    echo "<p>error: ".$error_msg."</p>";
}
if($valid){
    echo "<p>login success!</p>";
    echo '<a href="/demo/demo4.php"><p>goto demo4</p></a>';
}
?>

