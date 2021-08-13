<?php
session_start();
?>
<html>
<head>
<style>
*{
padding:0;
margin:0;
}
.heading

{
width:100%;
display:flex;
align-items:center;
background-color:blue;
height:40px;
}
h1{
margin-top:10px;
}
.division
{
width:100%;
display:flex;
}
.sidebar
{
padding:25px;

width:15%;
padding-left:50px;
}
.navbar a
{
text-decoration:none;
display:block;
padding:8px 8px 8px 8px;
 color:#002D62;
}
a:hover
{
 background-color:#002D62;
 color:white;
 width:100%;
 
}
.content
{
width:100%;
margin:30px;
}
#coursename{
margin-bottom:20px;
}
input[type="text"]
{
padding:6px;
outline:none;
}
label{
margin-top:20px;
padding-left:10px;
padding-right:10px;
display:tabel;
padding-top:5px;
padding-bottom:5px;

}
#sb:hover{
background-color:white;
border:1px solid blue;
}
input[type="file"]
{
display:none;
}
#sb{
margin-top:20px;
padding-left:10px;
padding-right:10px;
padding-top:5px;
padding-bottom:5px;
}
.courses
{
padding:10px;
background-color:blue;
overflow:scroll;
height:600px;
}
.card
{
background-color:rgba(34, 49, 63, 1);
width:100%;
height:500px;
overflow:scroll;
Vit, Vellore Page 88
}
.cards
{
width:20%;
background-color:white;
margin:20px;
display:inline-block;
}
.image{
background-color:red;
width:100%;
height:20%;
}
.title
{
text-align:center;
}
#vc
{
margin-left:40%;
margin-bottom:20px;
margin-top:20px;
padding-left:10px;
padding-right:10px;
padding-top:5px;
padding-bottom:5px;
background-color:blue;
outline:none;
color:white;
}
.x
{
margin-top:50px;
}
#ac
{
background-color:grey;
margin-bottom:10px;
}
.s
{
width:150px;
padding:5px;
}
</style>
</head>
<body>
<div class="heading">
 <h4>Faculty Homepage</h4>
</div>
<div class="division">
 <div class="sidebar">
 <div class="navbar">
 <a href="IWPfacultyhomepage.php">home</h1>

 <a href="IWPfacultyprofile.php">view profile</h1>
 <a href="facultylogout.php">logout</a>
 </div>
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
?>
<?php
$b=$_SESSION['logged_in_faculty_id'];
$q="select * from coursefac where facultyid='$b'";
$r=mysqli_query($conn,$q);
?>
<div class="content">
<h1>Courses</h1>
<section class="courses">
<?php
while($rows=mysqli_fetch_assoc($r))
{
?>
<div class="cards">
 <div class="image">
<?php
$cname=$rows['Course_name'];
//$path='C:/xampp/htdocs/IWP/media/$cname/'.$_SESSION['logged_in_faculty_id'];
$path='./media/'.$cname.'/'.$_SESSION['logged_in_faculty_id'];
$cl=$rows['courselogo'];
?>
<img src="./media/<?php echo $cname;?>/<?php echo $b;?>/<?php echo $cl;?>" width="233" height="125"/>
</div>
<div class="title">
<h1><?php echo $rows['Course_name']; ?></h1>
</div>
<div class="cb">
<form action="" method="post">
<input name="vc" type="hidden" value="<?php echo $rows['Course_name'];?>" type="submit">
<input id="vc" type="submit" name="view" value="view">
</form>
</div>
</div>
<?php
}
?>
</section>
<?php
if(isset($_POST['view']))
{
$ccourse=$_POST['vc'];
$_SESSION["course"]=$ccourse;
header("Location:IWPfacultycourses.php");
}
?>
<!------------------------------------------form------------------------>
<?php
$query="select * from courses";
$result=mysqli_query($conn,$query);

?>
<div class="x">
<h1 id="ac">ADD COURSE</h1>
<form action="" method="post" onsubmit="return val()" enctype="multipart/form-data">
<!--<input type="text" id="coursename" placeholder="course name">-->
<select name="course" id="course" class="s">
<?php
while($rows=mysqli_fetch_assoc($result))
{
?>
<option value="<?php echo $rows['Course_name']; ?>"><?php echo $rows['Course_name']; ?></option>
<?php
}
?>
</select><br><br>
<div class="l">
<label style="color:white;background:blue">UPLOAD LOGO
<input type="file" name="logo" id="logo"></label>
</div> 
<br>
<div class="l">
 <input type="text" name="link" placeholder="link" id="link">
</div>
 
<br>
<input type="submit" name="submit" id="sb" value="Add">
</form>
</div>
</div>
</div>

<?php
if(isset($_SESSION['chofaccou']))
{
$chj=$_SESSION['chofaccou'];
$color=$_SESSION['faccoucolo'];
echo "<script>document.getElementById('ac').innerHTML='$chj';
document.getElementById('ac').style.color='$color';
</script>";
//echo $_SESSION['status'];
unset($_SESSION['chofaccou']);
unset($_SESSION['faccoucolo']);
}
?>
<?php
if(isset($_POST['submit']))
{
$coursename=$_POST['course'];
$ciiid="select * from courses where Course_name='$coursename'";
$coures=mysqli_query($conn,$ciiid);
$rocid=mysqli_fetch_array($coures,MYSQLI_ASSOC);
 $courseid=$rocid["Course_id"];
//$logo=$_POST['logo'];
$link=$_POST['link'];
$f=$_SESSION['logged_in_faculty_id'];
$checcou="select * from coursefac where Course_id='$courseid' && facultyid='$f'";
$rlt=mysqli_query($conn,$checcou);
 $roccw=mysqli_fetch_array($rlt,MYSQLI_ASSOC);
 $nor=mysqli_num_rows($rlt);
if($nor>0)
{
$_SESSION['chofaccou']="course already chosen";

$_SESSION['faccoucolo']="red";
}
else
{
$path="C:/xampp/htdocs/IWP/media/$coursename/".$_SESSION['logged_in_faculty_id'];//check ifgiven faculty id folder is made or not in the course.
if(!is_dir($path))
{
mkdir($path,0777,true);
}
$filename=basename($_FILES["logo"]["name"]);//get the uploaded file base name.
$targetpath=$path.'/'.$filename;//now this file should be saved in the given faculty folder.
$fileType=pathinfo($targetpath,PATHINFO_EXTENSION);//get the file extension.
$allowtype=array('jpg','png','jpeg','jfif');
if(in_array($fileType,$allowtype))
{
if(move_uploaded_file($_FILES["logo"]["tmp_name"],$targetpath))
{
$c="select * from courses where Course_name='$coursename'";
 $result=mysqli_query($conn,$c);
 $roq=mysqli_fetch_array($result,MYSQLI_ASSOC);
 $y=$roq["Course_id"];
 $query="INSERT INTO coursefac (Course_id,Course_name,facultyid,courselogo,link) VALUES
('$y','$coursename','$f','$filename','$link')";
 if ($conn->query($query) === TRUE) {
 
 echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
 }
 else
 {
 echo "Error: " . $query . "<br>" . $conn->error;
 }

 $conn->close();
}
}
}
}
?>
<script>
function val()
{
var cn=document.getElementById("coursename").value;
var l=/^[A-Za-z]+$/;
if(cn.length<3)
{
alert("course name should be greater than 3 characters");
return false;
}
if(cn.length>3 && cn.match(l))
{
document.getElementById("ac").innerHTML="course sccessfully added";
//document.getElementById("coursename").value='';
document.getElementById("ac").style.color="green";
//document.getElementById("logo").value='';
//document.getElementById("link").value='';
//return true;
}
else
{
return false;
}
}
</script>
</body>
</html>