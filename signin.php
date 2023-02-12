<? session_start();?>
<?php
    $mysqli = mysqli_connect("%", "fisrt_year", "First_pass@1", "first_db");
    $name = $_POST['Name'];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $gender = $_POST["gender"];
    $username = $_POST["username"];
    if (mysqli_connect_errno()){
        echo "Failed to connect to mysql";
    }
    else {
        echo "";
    }
    $op = $mysqli -> query ("SELECT passowrd FROM user WHERE username = '".$username."'");
    if ($op -> num_rows>0){
        header("Location:index.php");
    }
    else {
        $op = $mysqli -> query ("INSERT INTO user(naam, phone, gender, email, username, password) VALUES ('".$name."', '".$phone."', '".$gender."', '".$email."', '".$username."', '".$password."')");
        $_SESSION['name'] = $_POST["Name"];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["phone"] = $_POST["phone"];
        $_SESSION["gender"] = $_POST["gender"];
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["password"] = $_POST["password"];
        $op = $mysqli -> query("INSERT INTO pictures(username) VALUES ('".$username."')");
        $_SESSION["image"] = 'img1.jpg';
        header("Location:home.php"); 
    }
    echo "<br>";
?>
