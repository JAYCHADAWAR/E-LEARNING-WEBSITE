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
?>
<?php
if(isset($_POST['start']))
{
$_SESSION['facidofc']=$_POST['f'];
$_SESSION['courid']=$_POST['c'];
$cid=$_POST['c'];
$r="select * from courses where Course_id='$cid'";
$res=mysqli_query($conn,$r);
$row=mysqli_fetch_assoc($res);
$_SESSION['coursechoname']=$row['Course_name'];
 
header("Location:IWPvideos.php");
}
?>
