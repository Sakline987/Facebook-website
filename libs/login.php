<?php
include dirname(__FILE__)."/functions.php";
$Facebook = new Facebook;

if (isset($_POST["login"]) AND $_SERVER['REQUEST_METHOD'] == 'POST') {
    $email =  $_POST ["email"];
    $pass = md5($_POST ["pass"]);

    $data = $Facebook-> signIn($email, $pass); 

    echo $data;


}