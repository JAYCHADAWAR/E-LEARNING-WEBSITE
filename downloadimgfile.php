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
if(!empty($_GET['subtopicname']))
{
$sname=$_GET['subtopicname'];

$query="select * from videos where Subtopic_name='$sname'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);
$c=$_SESSION['course'];
$m=$row['video_image'];
$filename=basename($m);
echo $filename;
$filepath="C:/media/".$c.'/'.$_SESSION['logged_in_faculty_id'].'/'.$sname.'/'.$filename;
if(!empty($filename) && file_exists($filepath))
{
header("Content-Disposition:attachment; filename=".urlencode($filename));
$fb=fopen($filename,"r");
while(!feof($fb))
{
echo fread($fb,8192);
flush();
}
fclose($fb);
}
else
{
echo "file does not exist";
}
}
?>