<?php
require "connection.php";
session_start();
//print_r($_SESSION['user_id']);
$id = $_SESSION['user_id'];

$query = "SELECT * FROM contact_address_table WHERE id = $id";
//print_r($id);
$con = $connection-> query($query);
$user = $con->fetch_assoc();
//print_r($user);

$firstName = $user['firstname'];
$lastName = $user['lastname'];

// fetching the note

$contact_address_query = "SELECT * FROM recipient_contact_table WHERE id = $id";
$dbconn = $connection-> query($contact_address_query);
$client_contact_address_table = $dbconn -> fetch_all();
// print_r($note);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="col-10 mx-auto shadow p-2">
        <div class="row">
            <?php
                if(isset($_SESSION['response'])){
                    echo "<div class='alert alert-success fs-5'>" . $_SESSION['response']. "</div>";

                }
            ?>
    <div class="col-3 shadow"></div>
    <div class="col-8 shadow py-3">
        
        <p>welcome to dashboard, <?php echo $firstName  ?> <span class="text-primary"></span>  </p>
        
        <form action="signup_process.php" method="post">
        <input type="client_namet" name="client_name" placeholder="NAME" class="form-control my-2">
        <input type="client_phonenumber" name="client_phonenumber" placeholder="PHONENUMBER" class="form-control my-2">
        <input type="client_address" name="client_address" placeholder="ADDRESS" class="form-control my-2">
        <input type="submit" name="submit_contact_address" value="Save" class="btn btn-dark">
        </form>
        
            <?php
                foreach ($client_contact_address_table as $each){
                    echo '<br>';
                    foreach($each as $key=> $value){
                        echo " " . $value;
                    }
                }
            
            ?>

    </div>

        </div>
    </div>
</body>
</html>