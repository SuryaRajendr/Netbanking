<?php
require('database.php');
$acno = $_POST['acno'];
$amount = $_POST['amount'];
$sender=$_POST['sender'];

$EnquiryQuery = "SELECT ac_balance FROM netbanking WHERE ac_no='$sender'";
$EnquiryResult = mysqli_query($con,$EnquiryQuery) or die(mysqli_error($con));
$sender_balance = mysqli_fetch_array($EnquiryResult);
$sender_main_balance=$sender_balance['ac_balance']-$amount;

$EnquiryQuery = "SELECT ac_balance FROM netbanking WHERE ac_no='$acno'";
$EnquiryResult = mysqli_query($con,$EnquiryQuery) or die(mysqli_error($con));
$result = mysqli_fetch_array($EnquiryResult);
$main_balance=$amount+$result['ac_balance'];

if($sender_main_balance < 500)
{ echo "you must keep 500 on your account , this transaction make a below minimum balance so not allow to transfer this"; }
else {


$sender_query = "UPDATE netbanking SET ac_balance='$sender_main_balance' WHERE ac_no = '$sender'";
$sender_query_success = mysqli_query($con,$sender_query);

$query = "UPDATE netbanking SET ac_balance='$main_balance' WHERE ac_no = '$acno'";
$query_success = mysqli_query($con,$query);
if($query_success)
{


header('location: home.php');
}

else{
  echo mysqli_error($con);
}
}

 ?>
