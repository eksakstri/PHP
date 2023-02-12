<?php session_start(); ?>
<?php
    if ($_SESSION['username'] == null){
        header("Loaction:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page | <?php echo $_SESSION['username']; ?></title>
</head>
<body>
    <h3>YOUR PROFILE</h3>
    <p>Name : <?php echo $_SESSION['name'];?></p>
    <p>Mobile : <?php echo $_SESSION['phone'];?></p>
    <p>Email : <?php echo $_SESSION['email'];?></p>
    <img src = "<?php echo $_SESSION['image'];?>">
    <form action="dp.php" method = "POST" enctype = "multipart/form-data">
        <input type = "file" name = "file">
        <button type = "submit" name = "submit">Update dp</button>
    </form>
    <a href = "chat.php">CHAT</a>
    <a href = "logout.php">LOGOUT</a>
</body>
</html>