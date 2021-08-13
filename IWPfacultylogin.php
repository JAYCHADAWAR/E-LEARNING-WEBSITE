<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="IWPadminform.css">
</head>
<body>
<div class="container">
<h1 style="text-align:center">FACULTY LOGIN</h1>

<form action="#" method="post">
<div class="e">
<input type="email" id="email" name="email" placeholder="EMAIL-ID" autocomplete="off">
</div>
<div class="p">
<input type="password" id="password" name="password" placeholder="PASSWORD">
</div>
<input type="submit" name="submit" class="signin">
<br><br>
<a href="resetfacultypassword.php">forgot password?</a>
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
if(isset($_POST['submit']))
{
$email=$_POST["email"];
$pass=$_POST["password"];
$query="select * from faculty where faculty_emailid='$email' and faculty_pass='$pass'";
$result=mysqli_query($conn,$query);
$roq=mysqli_fetch_array($result,MYSQLI_ASSOC);
$count=mysqli_num_rows($result);
if($count==1)
{
$_SESSION['logged_in_faculty_id']=$roq['facultyid'];
$_SESSION['logged_in_faculty_name']=$roq['facultyname'];
 header("Location:IWPfacultyhomepage.php");
}
else
{
echo "<h1> invalid emailid and password</h1>";
}
 
}
?>
</body>
</html>