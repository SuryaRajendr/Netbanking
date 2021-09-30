<?php
session_start();
require('database.php');
$mailid = $_POST['mailid'];
$password = $_POST['password'];
$password = md5($password);

$query = "SELECT mail_id,password FROM netbanking WHERE mail_id = '$mailid' and password = '$password'";
$queryResult = mysqli_query($con,$query);
if($queryResult)
 {
  $result = mysqli_fetch_array($queryResult);
  if($password == $result['password'])
  {
    // echo $result['username']; exit();
    $_SESSION['logedin'] = $result['mail_id'];
    header('location: home.php');
  }
  else{
    echo 'password is wrong';
  }

}
else{
  echo 'mail_id is wrong';
}
 ?>
