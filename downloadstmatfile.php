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
$fid=$_SESSION['facidofc'];
$cid=$_SESSION['courid'];
$query="select * from videos where Subtopic_name='$sname' && facultyid='$fid' &&
course_id='$cid'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);
$c=$_SESSION['coursechoname'];
$m=$row['material'];
$filename=basename($m);
$filepath="C:/xampp/htdocs/IWP/media/".$c.'/'.$_SESSION['facidofc'].'/'.$sname.'/'.$filename;
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
echo "filenotexist";
}
}
?>