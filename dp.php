<?php session_start(); ?>
<?php
    if (isset($_POST['submit'])){
        $file = $_FILES['file'];
        $filename = $_FILES['file']['name'];
        $filetemp = $_FILES['file']['temp'];
        $filesize = $_FILES['file']['size'];
        $filerror = $_FILES['file']['error'];
        $filetype = $_FILES['file']['type'];
        $filexist = explode('.', $filename);
        $fileactual = strtolower(end($filexist));
        $allow = array('jpg', 'jpeg', 'png');
        $username = $_SESSION['username'];
        print_r($file);
        if (in_array($fileactual, $allow)){
            if ($filerror == 0){
                if ($filesize < 1000000){
                    $filenew = $username.".".$fileactual;
                    $fileplace = '/home/saksham/Desktop/PHP'.$filenew;
                    if (move_uploaded_file($filetemp, $filend)){
                        echo "Done";
                        $_SESSION['image'] = $filenew;
                        header("Location:home.php");
                        $mysqli = mysqli_connect("%", "fisrt_year", "First_pass@1", "first_db");
                        $op = $mysqli -> query("UPDATE pictures SET image = '".$filenew."' WHERE username = '".$username."'");
                    }
                    else {
                        echo "no";
                    }
                }
                else {
                    echo "Files too big";
                }
            }
            else {
                echo "Pick";
            }
        }
    }
?>