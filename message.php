<?php session_start();?>
<?php
    $username = $_SESSION['username'];
    $usernaem1 = $_SESSION['username1'];
    $mysqli = mysqli_connect("%", "fisrt_year", "First_pass@1", "first_db");
    $op = $mysqli -> query("SELECT msg, time FROM (SELECT * FROM msg WHERE usernameFrom = '{$username1}') AS custom WHERE usernameTo = '{$username}' ORDER BY time DESC limit 1");
    while ($row = $op -> fetch_assoc()){
        $x = $row['msg'];
        $time = $row['time'];
    }
    if (((int)$time)+4>time()){
        echo $username1 .":".$x."<br>";
    }
    else {
        echo "";
    }
?>