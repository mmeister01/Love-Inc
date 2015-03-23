<?php

require 'mysql.php';

$email = $_POST['email'];
$password = $_POST['pwd'];
$sql =
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    exit ("invalid_email");
}