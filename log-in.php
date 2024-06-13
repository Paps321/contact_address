<?php
require 'connection.php';
session_start();

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    //print_r($_POST);
    $query = "SELECT * FROM contact_address_table WHERE email = '$email'";
    $dbconn = $connection-> query($query);
     //print_r($dbconn );
    if($dbconn){
        if($dbconn->num_rows > 0){
            $user = $dbconn-> fetch_assoc();
            $hashedP = $user['password'];
            $verify = password_verify($password, $hashedP);
            if($verify){
                $_SESSION['user_id'] = $user['id'];
                header('location: dashboard.php');
            }
            else{
                $_SESSION['response'] = 'Invalid Password';
                header('location: log-in.php');
            }
        }
        else{
            $_SESSION['response'] = 'Email not found';
            header('location: log-in.php');
        }
    }
   else{
        $_SESSION['response'] = 'Db connection error';

   }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php 
            if(isset($_SESSION['response'])){
                echo "<div class='alert alert-success fs-5'>" . $_SESSION['response'] . "</div>";
            }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<input type="text" name="email" placeholder="E-mail">
<input type="text" name="password" placeholder="Password">
<input type="submit" type="submit" name="submit" value="Login">
</form>
</div>
</body>
</html>