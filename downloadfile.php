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
$m=$row['material'];
$filename=basename($m);
$filepath="C:/xampp/htdocs/IWP/media/".$c.'/'.$_SESSION['logged_in_faculty_id'].'/'.$sname.'/'.$filename;
if(!empty($filename) && file_exists($filepath))
{
/*header("Content-Disposition:attachment; filename=".urlencode($filename));
$fb=fopen($filename,"r");
while(!feof($fb))
{
echo fread($fb,8192);
flush();
}
fclose($fb);*/
header('content-description: file transfer'); 
header('content-type: application/octet-stream'); 
header('content-disposition: attachment; filename="'.urlencode($filename).'"' );
 header('expires: 0'); 
 header('cache-control: must-revalidate, post-check=0, pre-check=0');
 header('pragma: public');
 header('content-length: ' . filesize($filename)); 
 ob_clean();
 flush(); 
 readfile($filename);
 exit;
}
else
{
echo "filenotexist";
}
}
?>
<a href="/media/css/1/into to css/introcss.jpg" download>download</a>