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
 
 $emailid=$_POST["emailid"];
$pass=$_POST["pass"];
$sql="select * from user where emailid='$emailid' and password='$pass'";
$result=mysqli_query($conn,$sql);
$roq=mysqli_fetch_array($result,MYSQLI_ASSOC);
$count=mysqli_num_rows($result);
if($count==1)
{
echo "<h1>loginbckcb</h1>";
$_SESSION['logged_in_user_id']=$roq['Userid'];
$_SESSION['logged_in_user_name']=$roq['username'];
 header("Location:IWPstudentp.php");
}
else
{
echo "INVALID USERNAME PASSWORD";
}
 
 
?>