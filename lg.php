<?php session_start();?>
<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mysqli = mysqli_connect("%", "fisrt_year", "First_pass@1", "first_db");
    $op = $mysqli->query("SELECT * FROM user WHERE username = '" . $username ."'");
    $o_p = $mysqli->query("SELECT * FROM pictures WHERE username = '" . $username ."'");
    
    while ($row = $op -> fetch_assoc()){
        $user = $row['username'];
        $pass = $row['password'];
        $name = $row['naam'];
        $email = $row['email'];
        $gender = $row['gender'];
        $phone = $row['phone'];
    }
    
    while ($row = $o_p -> fetch_assoc()){
        $dp = $row['dp'];
    }

    if ($user == $username && $pass == $password){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['gender'] = $gender;
        $_SESSION['phone'] = $phone;
        if (isset($_POST['RM'])){
            $a = 'username';
            $b = $username;
            $c = time() + (60*60);
            setcookie($a, $b, $c);
        }
        header("Location:home.php");
    }
    else
    {
        header("Location:login.php");
    }
?>
