<?php

include dirname (__FILE__)."/config.php";

class Facebook{
    private $host = HOST;
    private $user = USER;
    private $pass = PASS;
    private $db = DB;
    public $pdo ;

public function __construct(){
    try {
       $conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this ->user,$this->pass);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $this->pdo=$conn;
    } catch (PDOException $err) {
       echo "Your pdo connection is failed".$err->getMessage();
    }
}

public function createAccount($name,$email,$pass,$gender,$dob,$upn,$pic_tmp ){

// $sql = "INSERT INTO user_info(name,email,pass,gender,dob,pic)VALUES('$name','$email','$pass','$gender','$dob','$upn')";

//   $data =  $this->pdo->query($sql);
  
    $sql = "INSERT INTO user_info(name,email,pass,gender,dob,pic)VALUES(?,?,?,?,?,?)";
    $data =  $this->pdo->prepare($sql);
    $info = array($name,$email,$pass,$gender,$dob,$upn);
    $data -> execute($info);
    move_uploaded_file( $pic_tmp, "uploads/". $upn);
  }

  public function signIn($email, $pass){

    $sql ="SELECT * FROM user_info WHERE   email ='$email' AND pass = '$pass'";
    $data = $this ->pdo->prepare($sql);
    $data->execute();

    if ($data->rowCount() == 1) {

      session_start();

      while ($info = $data->fetch(PDO::FETCH_OBJ)) {
        $_SESSION['name'] = $info->name;
        $_SESSION['pic'] = $info->pic;
      }



        header("location: ../home.php");
    }     else {
       header ("location: ../index.php");
    }

 
    // print_r($info);
  } public function  userpost($name, $pic, $post, $upin, $time, $pic_tmp){
    $sql = "INSERT INTO user_data(name,pic,post,postimage,time)VALUES(?,?,?,?,?)";
    $data =  $this->pdo->prepare($sql);
    $info = array($name,$pic,$post,$upin,$time);
    $data -> execute($info);
    move_uploaded_file( $pic_tmp, "../uploads/". $upin);


    if ($data ) {
      header("location: ../home.php");
    } else {
      header("location: ../home.php");
    }
  
  }

  public function ShowUserPost(){

    $sql = "SELECT * FROM user_data";
    $data = $this ->pdo->prepare($sql);
    $data->execute();
    return $data;

  }

}

?>

