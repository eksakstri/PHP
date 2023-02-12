<?php session_start(); ?>
<?php
    if ($_SESSION['username'] == null){
        header("Location:login.php");
    }
    $_SESSION['username1'] = $_POST['chat'];
    $username = $_SESSION['username'];
    $username1 = $_SESSION['username1'];
    $mysqli = mysqli_connect("%", "fisrt_year", "First_pass@1", "first_db");
    $op = $mysqli -> query("SELECT usernameFrom, msg FROM msg WHERE usernameFrom IN ('{$username}', '{$username1}') AND usernameTo IN ('{$username}', '{$username1}') ORDER BY time ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHAT | <?php echo $_SESSION['username1']; ?></title>
</head>
<body>
    <div id = "chat">
    <?php
    while ($row = $result -> fetch_assoc()){
        $user = $row['usernameFrom'];
        $msg = $row['msg'];
        $chat = '';
        if ($user == $username){
            $array = str_split($msg);
            foreach ($array as $char){
                if ($char == '<'){
                    $char = '&lt';
                    $chat = $chat.$char;
                }
                else if ($char == '>'){
                    $char = '&gt';
                    $chat = $chat.$char;
                }
                else {
                    $chat = $chat.$char;
                }
            }
            echo "You : ".$chat. "<br>";
        }
        else {
            $array = str_split($msg);
            foreach ($array as $char){
                if ($char == '<'){
                    $char = '&lt';
                    $chat = $chat.$char;
                }
                else if ($char == '>'){
                    $char = '&gt';
                    $chat = $chat.$char;
                }
                else {
                    $chat = $chat.$char;
                }
            }
            echo $user .":".$chat. "<br>";
        }
    }
    ?>
    </div>
    <input type = "text" id = "msg" name = "msg" placeholder = "Type here">
    <br><br>
    <input type = "submit" value = "Send" onclick = "return send()">
    <a href = "chat.php">BACK</a>
    <script src="chat.js"></script>
</body>
</html>