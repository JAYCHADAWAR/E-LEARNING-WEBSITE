<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="IWPadminform.css">
 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
crossorigin="anonymous"/>
</head>
<body>
<div class="container">
<h1 style="text-align:center">ADMIN LOGIN</h1>
<form action="#" method="post">
<div class="e">
<input type="email" id="email" name="email" placeholder="EMAIL-ID">
</div>
<div class="p">
<input type="password" id="password" name="pass" placeholder="PASSWORD">

</div>
<input name="adsub" class="signin" type="submit" value="signin">
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
if(isset($_POST['adsub']))
{
$emailid=$_POST['email'];
$pass=$_POST['pass'];
$query="select * from admin where admin_emailid='$emailid' && password='$pass'";
$result=mysqli_query($conn,$query);
$roq=mysqli_fetch_array($result,MYSQLI_ASSOC);
$count=mysqli_num_rows($result);
if($count==1)

{
$_SESSION['admin_id']=$roq['Admin_id'];
echo $roq['Admin_id'];
$_SESSION['logged_in_admin_name']=$roq['admin_name'];
print_r($_SESSION);
 header("Location:IWPadminpage.php");
}
else
{
echo "bad";
}
 
}
?>
</body>
</html>
