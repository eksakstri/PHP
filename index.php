<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
</head>
<body>
    <div>
        <h1>WELCOME</h1>
        <h3>Please register yourself here</h3>
    </div>
    <div class="form">
        <form action = "signin.php" method = "POST" onsubmit = "return check()">
            <h3>CREATE A NEW ACCOUT</h3>
            <input type="text" class = "field" id = "naam" name = "Name" onchange = "return naam()" placeholder = "ENTER YOUR NAME">
            <br><br>
            <input type="text" class = "field" id = "phone"  name = "phone" onchange = "return phone()" placeholder = "ENTER YOUR PHONE NUMBER">
            <br><br>
            <select id="gender" name="Gender" aria-placeholder="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            <br><br>
            <input type="text" class = "field" id = "email" name = "email" onchange = "return email()" placeholder = "ENTER YOUR EMAIL">
            <br><br>
            <input type="text" class = "field" id = "username" name = "username" placeholder = "ENTER YOUR USERNAME" onkeyup = "return valid()"><div id="valid"></div>
            <br><br>
            <input type="password" class = "field" id = "password" name = "password" onchange = "return password()" onfocus = "return show()" onfocusout = "return hode()" placeholder = "ENTER PASSWORD">
            <span id="pass">Password must be of 8-20 characters.</span>
            <br><br>
            <input type="password" class = "field" id = "cpassword" name = "cpassword" onchange = "return cpassword()" placeholder = "CONFIRM YOUR PASSWORD">
            <br><br>
            <input type="submit" value="Sign Up" id='signup'>
            <br><br>
        </form>
    </div>
    <div class="foot">
        <h2>If you already registered click <a href="login.php">here</a>
    </div>
    <script src = "signin.js"></script>
</body>
</html>
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
}

if($_SESSION['username']!=null){
    header("Location:home.php");
}
?>