<?php

$valid = false;
$valid_msg = '';
$test = '';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['ip'])){
            $ip = $_POST['ip'];
            $cmd = "ping -c 1 ".$ip;
            $valid_msg = shell_exec($cmd);
            $valid = true;
    }
}

?>
<p>ping a machine with this tool...</p>
<form action="/demo4.php" method="post">
ip:<br>
<input type="text" name="ip"><br><br><br>
<input type="submit" value="Submit">
</form>
<?php
if($valid){
    echo "<p>ping result</p>";
    echo "<p>$valid_msg</p>";
}
?>

