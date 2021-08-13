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
$email=$_POST["email"];
$passwor=$_POST["pass"];
$phno=$_POST["phno"];
$sql="select * from faculty where faculty_emailid='$email'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$c=mysqli_num_rows($result);
if($c>0)
{
//echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
//unset($_POST['submit']);
$_SESSION['status']="FACULTY ALREADY ADDED WITH THIS EMAIL ID";
$_SESSION['scolor']="red";
header('Location:IWPfaculty.php');
}
else{
$sql = "INSERT INTO faculty (facultyname,faculty_emailid,faculty_pass,faculty_phno) VALUES ('$name','$email','$passwor','$phno')";
if ($conn->query($sql) === TRUE) {
 echo "New record created successfully";
 echo "<script>
 document.getElementById('addfacs').innerHTML='FACULTY SUCCESSFULLY ADDED';
document.getElementById('addfacs').style.color='green';
</script>";
 //echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
 $_SESSION['status']="FACULTY SUCCESSFULLY ADDED";
 $_SESSION['scolor']="green";
 header('Location:IWPfaculty.php');
}
else
{
 echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
}
?>