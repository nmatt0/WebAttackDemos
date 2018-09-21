<?php

$error = false;
$error_msg = '';
$valid = false;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['username']) && isset($_POST['password'])){
	if($_POST['username'] != '' && $_POST['password'] != ''){
		$valid = true;
		}else{
        		$error = true;
        		$error_msg = "didn't fill out required fields";
    		}
	}
}
?>
<p>Please Login</p>
<form action="/example.php" method="post">
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
}
?>

