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
$name =$_POST["username"];
$email=$_POST["emailsid"];
$passwor=$_POST["upassword"];
$cpass=$_POST["confirmpassword"];
$phno=$_POST["mno"];
$sql="select * from user where emailid='$email'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$c=mysqli_num_rows($result);
if($c>0)
{

echo "<h1>Choose another email-id</h1>";
}
else{
$sql = "INSERT INTO user (username,emailid,password,confirmpassword,phonenumber)
VALUES ('$name','$email','$passwor','$cpass','$phno')";
if ($conn->query($sql) === TRUE) {
 echo "New record created successfully";
 header("Location:IWP.php");
}
else
{
 echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
}
?>