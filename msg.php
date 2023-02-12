<?php session_start()?>
<?php
    $username = $_SESSION['username'];
    $username1 = $_SESSION['username1'];
    $msg =$_POST['msg'];
    $mysqli = mysqli_connect("%", "fisrt_year", "First_pass@1", "first_db");
    $op = $mysqli -> query ("INSERT INTO msg(usernameFrom, usernameTo, msg, time) VALUES ('".$username."', '".$username1."', \"".$msg."\", ".time().")");
    echo $msg;
?>