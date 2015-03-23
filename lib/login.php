<?php
$email = $_POST['email'];
$password = $_POST['pwd'];
if(!filter_input($email, FILTER_VALIDATE_EMAIL)){
    exit ("invalid_email");
}