<?php
session_start();
?>
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
$name=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['emai'];
$m=$_POST['text'];
$sql="INSERT INTO contactus (Firstname,Lastname,emild_id,message) VALUES
('$name','$lname','$email','$m')";
if ($conn->query($sql) === TRUE) {
 echo "New record created successfully";
 $_SESSION['contactussuc']="Successfully submitted";
 $_SESSION['contactcolor']="green";
 header("Location:IWP.php");
}
else
{
 echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
?>