<?php session_start(); ?>
<?php
if (isset($_COOKIE['usernsme'])){
    $username = $_COOKIE['username'];
    $mysqli = mysqli_connect("%", "fisrt_year", "First_pass@1", "first_db");
    $op = $mysqli->query("SELECT * FROM user WHERE username = '".$username."'");

    while ($row = $op->fetch_assoc()){
        $username = $row['username'];
        $phone = $row['phone'];
        $gender = $row['gender'];
        $naam = $row['naam'];
        $email = $row['email'];
        $password = $row['password'];
    }
    $_SESSION['username'] = $username;
    $_SESSION['phone'] = $phone;
    $_SESSION['naam'] = $naam;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $_SESSION['gender'] = $gender;
}

if($_SESSION['username']!=null){
    header("Location:home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="form">
        <form action="lg.php" method="POST" name = "login">
            <input type = "text" name = "username" palceholder = "USERNAME">
            <br><br>
            <input type = "password" name = "password" palceholder = "PASSWORD">
            <br><br>
            <input type = "checkbox" id = "RM" name = "RM" value = "RM">
            <label for = "RM">Remember Me</lable>
            <input type = "submit" value = "sign in ">
        </form>
    </div> 
    <div class="foot">
        <h2>If you are not yet registered click <a href="index.php">here</a>
    </div>
</body>
</html>