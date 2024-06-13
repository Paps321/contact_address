<?php
require 'connection.php';
session_start();
// echo 'processing';
// print_r($_POST);

if(isset($_POST['submit'])){
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    // $phonenumber = $_POST['phonenmuber'];
    $address = $_POST['address'];
    
    $query = "SELECT * FROM contact_address_table WHERE `email` = '$email'";
    // echo "hello";

    $dbconn = $connection-> query($query);
    if($dbconn){
        if($dbconn -> num_rows > 0){
            $_SESSION['msg'] = 'Email already exists';
            //echo "Email already exists";
            header('location: signup.php');

        } else{
        $hashedp = password_hash($password, PASSWORD_DEFAULT);
            // echo 'No user found';
            // print_r($dbconn);
            $query = "INSERT INTO `contact_address_table` (`firstname`, `lastname`,`email`, `password`,  `address`) VALUES ('$firstName', '$lastName', '$email', '$hashedp', '$address')";
            $dbconnection = $connection -> query($query);
            if($dbconnection){
                //  echo 'Registration successful';
                $_SESSION['msg'] = 'Registration successful';
                header('location: log-in.php');
                
            } 
            else{
                //  echo 'Registration failed';
                $_SESSION['msg'] = 'Registration failed';
                header('location:signup.php');
            }
        }
    } else {
        echo "Not selected";
    }

    // $hashp = password_hash($password, PASSWORD_DEFAULT);
    // // echo $hashp;
    // $query = "INSERT INTO student_table (`firstname`, `lastname`, `email`, `address`, `password`) VALUES ('$firstName', '$lastName', '$email', '$address', '$hashp')";
    // $dbconnection = $connection->query($query);
    // if($dbconnection){
    //     echo $dbconnection;
    // } else{
    //     echo 'Not inserted';
    // }

} else{
    header('location:signup.php');
}


// echo ($assoc['email']);
/*echo "<br>";
echo " <strong> <i>Firstname: " . $firstName;
echo "<br>";

echo " Lastname: " . $lastName;
echo "<br>";

echo " Password: " . $password;
echo "<br>";

echo " Email: " . $email;
echo "<br>";

echo " Address: " . $address;*/

if(isset($_POST['submit_contact_address'])){
    $client_name = $_POST['client_name'];
    $client_phonenumber = $_POST['client_phonenumber'];
    $client_address = $_POST['client_address'];
    $id = $_SESSION['user_id'];

    $query = "INSERT INTO `recipient_contact_table`(`name`, `phonenumber`, `address`, `id`) VALUES ('$client_name', '$client_phonenumber', '$client_address', '$id')";
    $dbconnection = $connection-> query($query);

    if($dbconnection){
        // $_SESSION['response'] = 'Contact address saved successfully';
        header('location: dashboard.php');
    }
    else{
        // $_SESSION['response'] = 'Contact address could not be saved';
        header('location: dashboard.php');

    }
}
?>

