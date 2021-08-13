<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
crossorigin="anonymous"/>
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
bottom-margin:50%;
}
.navbar a
{
text-decoration:none;
display:block;
padding:8px 8px 8px 8px;
 color:#002D62;
}

a:hover {
 background-color:#002D62;
 color:white;
 width:100%;
 }
.content {
width:100%;
margin:30px;
}
table,th,td{
border:1px solid black;
border-collapse:collapse;
padding:15px;
border:none;
border
-bottom:1px solid black;
}
th,td {
width:200px;
text-align:start;
}
.af{
width:100%;
display:flex;
justify-content:center;
padding:10px;
margin-bottom:10px;

}
#subtopicname,#esubtopicname,#quizlink,#courseid,#facultyid{
margin-bottom:10px;
border:1px solid #DDDDDD;
outline:none;
padding:5px;
width:300px;
}
#subtopicname:focus,#esubtopicname:focus,#quizlink:focus,#courseid:focus,#facultyid:focus{
box-shadow:0 0 5px rgba(81,203,238,1);
border:1px solid rgba(81,203,238,1);
outline:none;
}
.bt{
padding-left:10px;
padding-right:10px;
padding-top:5px;
padding-bottom:5px;
background-color:blue;
color:white;
border:1px solid blue;
outline:none;
}
.bt:hover{
color:blue;
background-color:white;
border:1px solid blue;
}

.delr{
background-color:white;
outline:none;
border:none;
}
</style>
</head>
<body>
<div class="heading">
<h4>E-LEARNING FACULTY AREA</h4>
</div>
<div class="division">
<div class="sidebar">
<div class="navbar">
<a href="IWPfacultyhomepage.php">home</h1>
<a href="IWPfacultyprofile.php">view profile</h1>
<a href="facultylogout.php">logout</a>
</div>
</div>
<div class="content">
<!--<table border=1px solid black>
<tr>
<th> course name</th>
<th> subtopic name</th>
<th> video link</th>
<th>video image</th>
<th> material link</th>
</tr>
</table>-->

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
$b=$_SESSION['logged_in_faculty_id'];//loggedin faculty id
$c=$_SESSION['course'];//coursename
$q="select * from courses where Course_name='$c'";
$r=mysqli_query($conn,$q);
$rows=mysqli_fetch_assoc($r);
$cid=$rows['Course_id'];
?>
<?php
$query="select * from videos where Course_id='$cid' && facultyid='$b'";
$result=mysqli_query($conn,$query);
?>
<?php
$qu="select * from videos where Course_id='$cid' && facultyid='$b'";
$re=mysqli_query($conn,$qu);
?>
<?php

$que="select * from videos where Course_id='$cid' && facultyid='$b'";
$res=mysqli_query($conn,$que);
?>
<br>
<h1 style="text-align:center">EDIT SUBTOPIC</h1><br><br><br>
<br><br>
</select>
<div class="af">
<form action="" method="post" enctype="multipart/form-data">
<h3 id="vu" style="text-align:center">EDIT VIDEO</h3><br><br>
<select name="course" id="course" class="s"><br><br>
<?php
while($row=mysqli_fetch_assoc($result))
{
?>
<option value="<?php echo $row['Subtopic_name']; ?>"><?php echo $row['Subtopic_name']; ?></option>
<?php
}
?>
</select>
<br><br>
<label for="subtopicvideo">UPLOAD VIDEO:</label><br><br>
<input type="file" id="subtopicvideo" placeholder="subtopicvideo" name="evideo" required><br><br>
<input type="submit" name="evid" value="update" class="bt">

</form>
</div>
<br><br>
<?php
if(isset($_POST['evid']))
{
$such=$_POST['course'];
//$newvi=$_POST['evideo'];
//echo $newvi;
$videofile=basename($_FILES["evideo"]["name"]);
$pat="C:/xampp/htdocs/IWP/media/$c/".$_SESSION['logged_in_faculty_id'].'/'.$such;
$targetpath=$pat.'/'.$videofile;
if(move_uploaded_file($_FILES["evideo"]["tmp_name"],$targetpath))
{
$altvi="UPDATE videos SET video='$videofile' WHERE Subtopic_name='$such' && facultyid='$b' &&
Course_id='$cid'";
if($conn->query($altvi)===TRUE)
{
header("Location:videoup.php");
}
else{
echo "error";
}
}
}
if(isset($_SESSION['videoupdate']))
{
$vup=$_SESSION['videoupdate'];
echo "<script>document.getElementById('vu').innerHTML='$vup';
Vit, Vellore Page 104
document.getElementById('vu').style.color='green';
</script>";
unset($_SESSION['videoupdate']);
}
?>
<div class="af">
<form action="" method="post" enctype="multipart/form-data">
<h3 id="mu" style="text-align:center">EDIT MATERIAL</h3><br><br>
<select name="course" id="course" class="s"><br><br>
<?php
while($rowww=mysqli_fetch_assoc($re))
{
?>
<option value="<?php echo $rowww['Subtopic_name']; ?>"><?php echo $rowww['Subtopic_name'];
?></option>
<?php
}
?>
</select><br><br>
<label for="subtopic material">UPLOAD MATERIAL:</label>
<br><br>
<input type="file" id="subtopic material" placeholder="subtopic material" name="esubmat"
required><br><br>
<input type="submit" name="ematerial" value="update" class="bt">

</form>
</div>
<br><br>
<?php
if(isset($_POST['ematerial']))
{
$such=$_POST['course'];
//$newvi=$_POST['evideo'];
//echo $newvi;
$ematfile=basename($_FILES["esubmat"]["name"]);
$pat="C:/xampp/htdocs/IWP/media/$c/".$_SESSION['logged_in_faculty_id'].'/'.$such;
$targetpath=$pat.'/'.$ematfile;
if(move_uploaded_file($_FILES["esubmat"]["tmp_name"],$targetpath))
{
$altvi="UPDATE videos SET material='$ematfile' WHERE Subtopic_name='$such' && facultyid='$b'
&& Course_id='$cid'";
if($conn->query($altvi)===TRUE)
{
header("Location:mateup.php");
}
else{
echo "error in updating..";
}
}
}
if(isset($_SESSION['matupdate']))
{
$mup=$_SESSION['matupdate'];
echo "<script>document.getElementById('mu').innerHTML='$mup';
document.getElementById('mu').style.color='green';
</script>";

unset($_SESSION['matupdate']);
}
?>
<div class="af">
<form action="" method="post">
<h3 id="qu" style="text-align:center">EDIT QUIZ LINK</h3><br><br>
<select name="course" id="course" class="s"><br><br>
<?php
while($roww=mysqli_fetch_assoc($res))
{
?>
<option value="<?php echo $roww['Subtopic_name']; ?>"><?php echo $roww['Subtopic_name'];
?></option>
<?php
}
?>
</select><br><br>
<input type="text" id="quizlink" name="quiz" placeholder="quizlink" required><br><br>
<input type="submit" name="equizlink" value="update" class="bt">
</form>
</div>
<br><br>
<?php
if(isset($_POST['equizlink']))
{

$such=$_POST['course'];
$quiz=$_POST['quiz'];
$altvi="UPDATE videos SET quiz='$quiz' WHERE Subtopic_name='$such' && facultyid='$b' &&
Course_id='$cid'";
if($conn->query($altvi)===TRUE)
{
 echo "record updated";
}
else{
echo "error in updating..";
}
}
?>
<h1 id="as" style="text-align:center">ADD SUBTOPIC</h1><br><br>
<div class="af">
<form action="#" method="post" onsubmit="return validate()" enctype="multipart/form-data">
<input type="text" id="courseid" placeholder="courseid" value="<?php echo $rows['Course_id'];?>"
required><br><br>
<input type="text" id="facultyid" placeholder="facultyid" value="<?php echo $b;?>" required><br><br>
<input type="text" id="subtopicname" placeholder="subtopicname" name="sname" required><br><br>
<label for="subtopicvideo">UPLOAD VIDEO:</label><br><br>
<input type="file" id="subtopicvideo" name="svideo" placeholder="subtopicvideo" required><br><br>
<label for="subtopic material">UPLOAD MATERIAL:</label>
<br><br>
<input type="file" id="subtopic material" name="smat" placeholder="subtopic material"><br><br>
<input type="text" id="quizlink" name="slink" placeholder="quizlink" ><br><br>
<label for="subtopic material">VIDEO IMAGE:</label>

<br><br>
<input type="file" name="vimage" id="videoimage"><br><br>
<input type="submit" name="submit" class="bt" value="Add">
</form>
</div>
<?php
if(isset($_POST['submit']))
{
$name=$_POST['sname'];
$checsub="select * from videos WHERE Subtopic_name='$name' && facultyid='$b' &&
Course_id='$cid'";
$resub=mysqli_query($conn,$checsub);
$rocout=mysqli_fetch_array($resub,MYSQLI_ASSOC);
$csub=mysqli_num_rows($resub);
if($csub!=0)
{
echo "<p style='color:red'>Change the name of subtopic there is a subtopic with the same
name.</p>";
}
else{
//$video=$_POST['svideo'];
//$mat=$_POST['smat'];
$quiz=$_POST['slink'];
//$image=$_POST['vimage'];
$path="C:/xampp/htdocs/IWP/media/$c/".$_SESSION['logged_in_faculty_id'].'/'.$name;
if(!is_dir($path))
{
mkdir($path,0777,true);
}
 
$videofile=basename($_FILES["svideo"]["name"]);
$matfile=basename($_FILES["smat"]["name"]);

$imv=basename($_FILES["vimage"]["name"]);
$targetpath=$path.'/'.$videofile;
$targetmatpath=$path.'/'.$matfile;
$targetimpath=$path.'/'.$imv;
$fileimType=pathinfo($targetimpath,PATHINFO_EXTENSION);//get the file extension.
$allowtype=array('jpg','png','jpeg','jfif');
$filemaType=pathinfo($targetmatpath,PATHINFO_EXTENSION);//get the file extension.
$allowmatype=array('pdf','docx');
if(in_array($fileimType,$allowtype) && in_array($filemaType,$allowmatype))
{
if(move_uploaded_file($_FILES["svideo"]["tmp_name"],$targetpath) &&
move_uploaded_file($_FILES["vimage"]["tmp_name"],$targetimpath) &&
move_uploaded_file($_FILES["smat"]["tmp_name"],$targetmatpath))
{
$q="INSERT INTO videos
(Subtopic_name,facultyid,course_id,video_image,quiz,material,video) VALUES
('$name','$b','$cid','$imv','$quiz','$matfile','$videofile')";
if ($conn->query($q) === TRUE) {
 
 echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
 }
 else
 {
 echo "Error: " . $q . "<br>" . $conn->error;
 }
}
}
else
{
echo "allowed type=jpg,jpeg,png,jfif for image";
echo " allowed types=pdf,docx for files.";
}

 
}
}
?>
<br><br>
<!--<h5>Delete Subtopic<h5><br><br><br>
<input type="text" id="courseid" placeholder="courseid"><br><br>
<input type="text" id="facultyid" placeholder="facultyid"><br><br>
<input type="text" id="subtopicname" placeholder="subtopicname"><br><br>
<input type="submit" value="delete">-->
<br><br>
<h6 style="width:60%; background-color:grey; font-size:30px; margin-bottom:20px;">subtopics
courseid:aka</h6>
<table id="mt">
<tr>
 <th>subtopic name</th>
 <th>video</th>
 <th>material</th>
 <th>quiz</th>
 <th>video image</th>
 <th>action</th>
</tr>
<?php
$query="select * from videos where Course_id='$cid' && facultyid='$b'";
$result=mysqli_query($conn,$query);
?>
<?php

while($rows=mysqli_fetch_assoc($result))
{
	$sname=$rows['Subtopic_name'];
 
 $fid=$_SESSION['logged_in_faculty_id'];
 //$queryy="select * from videos where Subtopic_name='$sname'";
 //$result=mysqli_query($conn,$queryy);
 //$row=mysqli_fetch_assoc($result);
 $videosfile=$rows['video'];
 $matfile=$rows['material'];
 $imgfile=$rows['video_image'];
 
 $videofilename=basename($videosfile);
 $imgfilename=basename($imgfile);
 $docsfilename=basename($matfile);
?>
<tr>
 <td><?php echo $rows['Subtopic_name']; ?></td>
 <?php
 //$path="C:/xampp/htdocs/IWP/media/$c/".$_SESSION['logged_in_faculty_id'].'/'.$rows['Subtopic_name'];
 
 
 ?>
 <!--<td><a href="downloadvideofile.php?subtopicname=<?php echo $rows['Subtopic_name'];?>">download</a></td>-->
<td><a href="<?php echo "./media/$c/$fid/$sname/".$videofilename;?>" download>download</a></td>
<td><a href="<?php echo "./media/$c/$fid/$sname/".$docsfilename;?>" download>download</a></td>
<td><a href="<?php echo $rows['quiz'];?>">view</a></td>
<td><a href="<?php echo "./media/$c/$fid/$sname/".$imgfilename;?>" download>download</a></td>
 <!--<td><a href="downloadfile.php?subtopicname=<?php echo $rows['Subtopic_name'];?>">download</a></td>
 <td><a href="<?php echo $rows['quiz'];?>">view</a></td>
 <td><a href="downloadimgfile.php?subtopicname=<?php echo $rows['Subtopic_name'];?>">download</a></td>-->
 <td>
 <form action="" method="post">
 <input type="hidden" value='<?php echo $rows['Subtopic_name'];?>' name="id">
 
 <button type="submit" name="delete" class="delr"><i class="fas fa-trash-alt"></i></button>
 </form>
 </td>
</tr>
<?php
}
?>
<?php
if(isset($_POST['delete']))
{
$id=$_POST['id'];
echo $id;

$query="DELETE FROM videos WHERE Subtopic_name='$id' && facultyid='$b' && course_id='$cid'";
if($conn->query($query)==TRUE)
{
?>
<?php
echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
}
else
{
echo "Error: " . $query . "<br>" . $conn->error;
echo "unable to delete";
}
}
?>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
function del(c)
{
var x=$(c).closest("tr").find("td:first-child").text();
console.log(x);
}
</script>
<script>
function validate()
{

var sn=document.getElementById("subtopicname");
if(!sn.value.match(/^[A-Za-z][a-zA-Z ]+$/))
{
alert("name should only contain alphabets");
return false;
}
if(sn.value.length<3)
{
alert("length of subtopic name should be greater than 3");
return false;
}
else
{
document.getElementById("as").innerHTML="SUBTOPIC ADDED";
document.getElementById("as").style.color="green";
return true;
}
}
</script>


</body>
</html>
