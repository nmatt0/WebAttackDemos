<?php

function get_cookie(){
    return rand();
}

function save_session($cookie){
    $f = fopen("session.txttxt", 'a');
    fwrite($f, $cookie.PHP_EOL);
    fclose($f);
}

$error = false;
$error_msg = '';
$valid = false;
$test = '';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['username']) && isset($_POST['password'])){
        if($_POST['username'] == 'admin' && $_POST['password'] == 'admin'){
            $valid = true;
        }else{
            $error = true;
            $error_msg = "username and/or password incorrect";
        }
    }else{
        $error = true;
        $error_msg = "didn't fill out required fields";
    }
}else{
    //get
    $c = get_cookie();
    save_session($c);
}

?>
<p>hint: admin,admin</p>
<form action="/demo3.php" method="post">
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
    echo '<a href="/demo4.php"><p>goto demo4</p></a>';
}
?>

