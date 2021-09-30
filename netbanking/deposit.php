<?php
require('database.php');
$acno = $_POST['acno'];
$amount = $_POST['amount'];


$EnquiryQuery = "SELECT ac_balance FROM netbanking WHERE ac_no='$acno'";
$EnquiryResult = mysqli_query($con,$EnquiryQuery) or die(mysqli_error($con));
$result = mysqli_fetch_array($EnquiryResult);
$main_balance=$amount+$result['ac_balance'];

$query = "UPDATE netbanking SET ac_balance='$main_balance' WHERE ac_no = '$acno'";
$query_success = mysqli_query($con,$query);
if($query_success){
header('location: home.php');
}
else{
  echo mysqli_error($con);
}


 ?>
