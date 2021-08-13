<html>
<head>
<link rel="stylesheet" type="text/css" href="IWPadminform.css">
</head>
<body>
<div class="container">
<h1 style="text-align:center">change password</h1>
<form action="" method="post">
<div class="e">
<input type="email" id="email" name="email" placeholder="EMAIL-ID" autocomplete="off">
</div>
<br>
<input type="password" id="pass" name="pass" placeholder="NEW_PASSWORD" autocomplete="off">
<br>
<br>
<input type="password" id="npass" name="npass" placeholder="CONFIRM_NEW_PASSWORD"
autocomplete="off"><span id="er"></span><br><br>
<input type="submit" name="submit" class="signin">
<br><br>
</form>
</div>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elearning";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}
?>
<?php
if(isset($_POST['submit']))
{
$email=$_POST['email'];
$pass=$_POST['pass'];
$npass=$_POST['npass'];
$check="select * from faculty WHERE faculty_emailid='$email'";
$check_run=mysqli_query($conn,$check);
$count=mysqli_num_rows($check_run);
if($count>0)
{
if($pass===$npass)
{
$uppass="UPDATE faculty SET faculty_pass='$pass' WHERE
faculty_emailid='$email'";
if($conn->query($uppass)===TRUE)

{
echo "<h3>your password has been successfull updated <a
href='IWPfacultylogin.php'>click here</a> to goto faculty login page</h3>";
}
 else{
 echo $conn->error; 
}
}
else
{
echo "<script>
document.getElementById('er').innerHTML='new password and confirm password
should be same';
document.getElementById('er').style.color='red';</script>";
}
}
}
?>
</body>
</html>
