<?php

include dirname(__FILE__)."/functions.php";

session_start();

$Facebook = new Facebook;

if ($_SERVER ['REQUEST_METHOD'] == "POST" AND isset($_POST["post"])) {
$name=  $_SESSION['name'];
$pic=   $_SESSION['pic'] ;
$post =   $_POST['postcontent'];
   

    $postimg= $_FILES['postimage']['name'];
    $pic_tmp = $_FILES['postimage']['tmp_name'];

     $ex = explode (".",$postimg);
     $ext = strtolower(end($ex));

$upin = md5(time().$postimg).'.'.$ext;
$time = date("F d, Y");

$Facebook->userpost($name, $pic, $post, $upin, $time, $pic_tmp);
   
}

?>