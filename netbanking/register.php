<html>
<head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
<script src="assets/js/bootstrap.min.js"></script>
<script>
</script>
<style>
body{
  margin:0;
  padding:0;
  background:url(register.jpg);
  background-size: cover;
  background-position: center;
  font-family: sans-serif;
  background-repeat: no-repeat;
  background-attachment: fixed;
}
.header {
overflow: hidden;
padding: 10px 10px;
background: rgba(0,0,0,1);
background-repeat: no-repeat;
text-align: center;
color: white;
}
.login:hover {
  box-shadow: 0 0 50px black;
}
.login{
  width: 400px;
  height: 655px;
  background: rgba(0,0,0,.75);
  color:#fff;
  top:50%;
  left:50%;
  position: absolute;
  transform: translate(-50%,-50%);
  box-sizing: border-box;
  padding: 20px 10px;
}
h1{
  margin: 0;
  padding: 0,0,10px;
  text-align: center;
  font-size: 22px;
}
.login p{
  margin: 0;
  padding: 0;
  font-weight: bold;
  text-align: center;
}
.login input{
  width: 100%;
  margin-bottom: 20px;
}
.login input[type="text"],input[type="password"],input[type="checkbox"]
{
  border: none;
  border-bottom: 1px solid #fff;
  background: transparent;
  outline: none;
  height: 40px;
  color: #fff;
  font-size: 16px;
}
.login input[type="submit"]
{
  border:none;
  outline: none;
  height: 40px;
  background: #1c8adb;
  color:#fff;
  font-size: 18px;
  border-radius: 20px;
}
.login input[type="submit"]:hover
{
  cursor: pointer;
  height: 40px;
  background: #39dc79;
  color:#000;
}

</style>
<script>
function validateForm()
{
var firstname = $("#firstname").val();
var lastname = $("#lastname").val();
var mailid = $("#mailid").val();
var adharno = $("#adharno").val();
var panno = $("#panno").val();
var password = $("#password").val();
var check = $("#check").val();
if(firstname == "" && lastname == "" && mailid == "" && adharno == "" && panno == "" && password == "" ){
    $("#firstnameError").html("Please Enter Your firstname");
    $("#lastnameError").html("Please Enter Your lastname");
    $("#mailidError").html("Please Enter Your mailid");
    $("#adharnoError").html("Please Enter Your adharno");
    $("#pannoError").html("Please Enter Your panno");
    $("#passwordError").html("Please Enter Your password");

    return false;
}
if(firstname == ""){
  $("#firstnameError").html("Please Enter Your firstname");
  return false;
}
else if(lastname == ""){
  $("#lastnameError").html("Please Enter Your lastname");
  return false;
}
  else if(mailid == ""){
    $("#mailidError").html("Please Enter Your mailid");
    return false;
}
else if(adharno == ""){
  $("#adharnoError").html("Please Enter Your adharno");
  return false;
}
else if(panno == ""){
  $("#pannoError").html("Please Enter Your panno");
  return false;
}
else if(password == ""){
  $("#passwordError").html("Please Enter Your password");
  return false;
}
}
function clearfirstnameError(){
    $("#firstnameError").html("");
}
function clearlastnameError(){
    $("#lastnameError").html("");
}
function clearmailidError(){
    $("#mailidError").html("");
}
function clearadharnoError(){
    $("#adharnoError").html("");
}
function clearpannoError(){
    $("#pannoError").html("");
}
function clearpasswordError(){
    $("#passwordError").html("");
}
</script>

</head>
<body>
<div class="header"> NET BANKING REGISTRATION</div>
<div class="login">


<form action="reg_insert.php" method="post">


        <input type="text"  name="firstname" id="firstname" onfocus="clearfirstnameError()" placeholder="FIRST_NAME">
<p class="text-danger" id="firstnameError"></p>

        <input type="text"  name="lastname" id="lastname" onfocus="clearlastnameError()" placeholder="LAST_NAME">
<p class="text-danger" id="lastnameError"></p>

        <input type="text"   name="mailid" id="mailid" onfocus="clearmailidError()" placeholder="MAIL_ID">
<p class="text-danger" id="mailidError"></p>

        <input type="text"  name="adharno" id="adharno" onfocus="clearadharnoError()" placeholder="ADHAR_NUMBER">
<p class="text-danger" id="adharnoError"></p>

        <input  type="text"  name="panno" id="panno" onfocus="clearpannoError()" placeholder="PAN_NUMBER">
<p class="text-danger" id="pannoError"></p>

        <input  type="password"  name="password" id="password" onfocus="clearpasswordError()" placeholder="PASSWORD">
<p class="text-danger" id="passwordError"></p>
        <p> You Must Pay 500 For Account opening</p>
        <input type="checkbox" name="balance" value="500" >

        <input type="submit"  value="Register" onClick="return validateForm()">

</form>
</div>

</body>
</html>
