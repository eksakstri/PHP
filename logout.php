<?php session_start();?>
<?php
    $_SESSION['username'] = null;
    $_SESSION['phone'] = null;
    $_SESSION['naam'] = null; 
    $_SESSION['email'] = null;  
    $_SESSION['password'] = null;
    $_SESSION['gender'] = null;
    header("Location:login.php");
    if (isset($_COOKIE['username'])){
        setcookie('username', 'f', time() - 30000);
    }
?>