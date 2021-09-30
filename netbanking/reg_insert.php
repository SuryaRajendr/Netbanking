
<?php

require('database.php');

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$mailid=$_POST['mailid'];
$adharno=$_POST['adharno'];
$panno=$_POST['panno'];
$password = $_POST['password'];
$password = md5($password);
$balance = $_POST['balance'];
$ac_no=rand();

$EnquiryQuery = "SELECT * FROM netbanking WHERE mail_id = '$mailid'";
$EnquiryResult = mysqli_query($con,$EnquiryQuery) or die(mysqli_error($con));
$result = mysqli_fetch_array($EnquiryResult);

if($result['mail_id'] == $mailid)
{
echo "This mail Id isalready used ..! not permission to vote again";
}
else{
  $query="INSERT INTO netbanking(first_name,last_name,mail_id,aadhar_card_no,pan_card_no,password,ac_balance,ac_no) VALUES('$firstname','$lastname','$mailid','$adharno','$panno','$password','$balance','$ac_no')";
 if(mysqli_query($con,$query))
            {

               header('Location:index.php');

            }
        else
         {
                echo "error".mysqli_error($con);
           }
}


?>
