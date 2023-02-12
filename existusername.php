<?php 
    $A = $_REQUEST["A"];
    $mysqli = mysqli_connect("%", "fisrt_year", "First_pass@1", "first_db");
    $username = $A;
    $result=$mysqli->query("SELECT username FROM user WHERE username='". $A ."'");
    while($row=$result->fetch_assoc()){
        $user = $row['username'];
    }
    if($A == $user){
        $x = "USERNAME ALREADY EXIST!!!";
    }
    else{
        $x = '';
    }
    echo $x;
?>