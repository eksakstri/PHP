<?php session_start();?>
<?php
    if($_SESSION['username'] == null){
        header("Location:login.php");
    }
    $mysqli = mysqli_connect("%", "fisrt_year", "First_pass@1", "first_db");
    $username = $_SESSION['username'];
    $op = $mysqli->query("SELECT * FROM user WHERE username != '{$username}'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHAT</title>
</head>
<body>
    <form action = "chatscr.php" method = "POST">
        <h3>HERE ARE YOUR FRIENDS</h3>
        <?php while ($row = mysqli_fetch_assoc($op)){ ?>
        <option value = <?php echo $row['username']; ?>> <?php echo $row['naam']; ?></option>
        <?php } ?>
        <input type = "submit" name = "submit">
    </form>
    <a href = "home.php">Back to home page</a>
</body>
</html>