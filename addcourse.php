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
if(isset($_POST['submit']))
{
$name =$_POST["name"];
$sq="select * from courses where Course_name='$name'";
$result=mysqli_query($conn,$sq);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$c=mysqli_num_rows($result);
if($c>0)
{
$_SESSION['stacou']="COURSE ALREADY ADDED";
$_SESSION['coucolor']="red";
header('Location:IWPcourses.php');
}
else
{
$sql = "INSERT INTO courses (Course_name) VALUES ('$name')";
$path="C:/xampp/htdocs/IWP/media/".$name;
if(!is_dir($path))
{
mkdir($path,0777,true);

}
if ($conn->query($sql) === TRUE) {
$_SESSION['stacou']="COURSE ADDED";
$_SESSION['coucolor']="green";
header('Location:IWPcourses.php');
 
 
}
else
{
 echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
}
?>