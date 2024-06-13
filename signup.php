<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="box">
        <?php
            session_start();
            if(isset($_SESSION['msg'])) {
            echo "<div class='text-danger text-center'>". $_SESSION['msg']."</div>";
    }
    unset($_SESSION['msg']);
    ?>
        <form action="signup_process.php" method="POST">
            <input type="firstname" name="firstname" placeholder="FIRSTNAME" class="form-control my-2">
            <input type="lastname" name="lastname" placeholder="LASTNAME" class="form-control my-2">
            <input type="email" name="email" placeholder="E-MAIL" class="form-control my-2">
            <input type="password" name="password" placeholder="PASSWORD" class="form-control my-2">
            <!-- <input type="text" name="phonenumber" placeholder="PHONENUMBER"> -->
            <input type="address" name="address" placeholder="ADDRESS">
            <input type="submit" name="submit" value="REGISTER HERE">
            <!-- <button type="submit" name="" value="signup here">SUBMIT</button> -->
        </form>
        </div>

    </div>
</body>
</html>