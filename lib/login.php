<?php
session_start();

error_reporting(0);

if($_POST['logout']){
    session_destroy();
    exit('logout');
}

require 'mysql.php';

$email = $_POST['email'];
$password = $_POST['pwd'];
$sql = "SELECT * FROM `user` WHERE `email`='$email'";
$result = mysqli_query($con, $sql);

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    exit ("invalid_email");
}
if(!$result){
    exit("email_not_found");
}

$row = mysqli_fetch_array($result);

if(!password_verify($password,$row['password'])){
    exit('wrong_password');
}

if(password_verify($password,$row['password'])){
    $_SESSION['loggedin']=true;
    $_SESSION['userid'] = $row['id'];
    exit('ok');
}