<?php
session_start();
if(!(isset($_SESSION['logedin'])))
{
  header('location: index.php');
}
require('database.php');
$email = $_SESSION['logedin'];
$EnquiryQuery = "SELECT ac_no FROM netbanking WHERE mail_id='$email'";
$EnquiryResult = mysqli_query($con,$EnquiryQuery) or die(mysqli_error($con));
$result = mysqli_fetch_array($EnquiryResult);

$EnquiryQuery = "SELECT first_name FROM netbanking WHERE mail_id='$email'";
$EnquiryResult = mysqli_query($con,$EnquiryQuery) or die(mysqli_error($con));
$name = mysqli_fetch_array($EnquiryResult);
?>
<html>
<head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
<script src="assets/js/bootstrap.min.js"></script>
  <style>
  body{

    margin:0;
    padding:0;
    background: url(home.jpg);
    background-size: cover;
    background-position: center;
    font-family: sans-serif;

  }
  .deposit{
    width: 350px;
    height: 350px;
    background: rgba(0,0,0,0.5);
    color:#fff;
    top:51%;
    left:35%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 20px 10px;
  }
  .transfer{
    width: 350px;
    height: 350px;
    background: rgba(0,0,0,0.5);
    color:#fff;
    top:51%;
    left:65%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 20px 10px;
  }
  .transfer input{
    width: 100%;
    margin-bottom: 20px;
  }
  .transfer input[type="text"]
  {
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
  }
  .transfer input[type="submit"]
  {
    border:none;
    outline: none;
    height: 40px;
    background: #1c8adb;
    color:#fff;
    font-size: 18px;
    border-radius: 20px;
  }
  .transfer input[type="submit"]:hover
  {
    cursor: pointer;
    height: 40px;
    background: #39dc79;
    color:#000;
  }
  .deposit input{
    width: 100%;
    margin-bottom: 20px;
  }
  .deposit input[type="text"],input[type="checkbox"]
  {
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
  }
  .deposit input[type="submit"]
  {
    border:none;
    outline: none;
    height: 40px;
    background: #1c8adb;
    color:#fff;
    font-size: 18px;
    border-radius: 20px;
  }
  .deposit input[type="submit"]:hover
  {
    cursor: pointer;
    height: 40px;
    background: #39dc79;
    color:#000;
  }
  h1{
    margin: 0;
    padding: 0,0,10px;
    text-align: center;
    font-size: 22px;
    color: gold;
  }
  .header {
  overflow: hidden;
  background-color: #BA93EF;
  padding: 10px 10px;
  background: rgba(0,0,0,0.5);

}

.header a {
  float: right;
  color: white;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  line-height: 25px;
  border-radius: 4px;
}
.header h1 {
  float: left;
  color: white;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  line-height: 25px;
  border-radius: 4px;
}
.deposit:hover {
  box-shadow: 0 0 35px gold;
}
.transfer:hover {
  box-shadow: 0 0 35px gold;
}
  </style>
</head>

<body>
  <div class="header">
    <h1>NAME : <?php echo $name['first_name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Account Number : <?php echo $result['ac_no']; ?> .</h1>
    <a href="logout.php">logout</a>
  </div>

<div class="deposit">
  <form action="deposit.php" method="post">
  <h1>cash deposit</h1><br><br>
  select your accountnumber <input type ="checkbox" value="<?php echo $result['ac_no']; ?>" name="acno" /><br>
    enter amount<input type="text" name="amount"><br><br>
    <input type="submit" value="deposit">
  </form>
</div>

<div class="transfer">
  <form action="transfer.php" method="post">
  <h1>Transfer Money</h1><br><br>
  enter account number<input type="text"  name="acno"><br>
    enter amount<input type="text" name="amount"><br>
    <input type="hidden" name="sender" value="<?php echo $result['ac_no']; ?>"><br>
    <input type="submit" value="transfer">
  </form>
</div>


</body>
</html>
