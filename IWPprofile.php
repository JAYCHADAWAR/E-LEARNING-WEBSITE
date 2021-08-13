<?php
session_start();
?>
<html>
<head>

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-
AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
crossorigin="anonymous"/>
<style>
*{
padding:0;
margin:0;
}
body{
position:relative;
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
background-color:;
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
.uploadimage
{

 padding:8px;
 margin-top:15px;
 background-color:#007FFF;
 border:none;
 margin-bottom:20px;
 
}
table,th,td{
border:1px solid black;
border-collapse:collapse;
padding:15px;
border:none;
border-bottom:1px solid black;
}
th,td
{
width:200px;
text-align:start;
}
.cn{
position:absolute;
width:400px;
display:flex;
justify-content:center;
border:1px solid black;
padding:20px;
top:300px;
left:600px;
display:none;
}
.e{
position:absolute;
width:400px;
display:flex;
justify-content:center;
border:1px solid black;
padding:20px;
top:300px;
left:600px;
display:none; }
.cancel {
margin-top:20px;
margin-right:10px;
float:right;
color:red;
background-color:white;
border:none;
outline:none; }
.save{
margin-top:20px;
margin-right:10px;
color:green;
float:right;
background-color:white;
border:none;

outline:none;
}
#n
{
outline:none;
margin-top:10px;
border:none;
border-bottom:2px solid green;
}
.l
{
margin-top:20px;
background-color:red;
padding:5px;
color:white;
}
#propic
{
margin-bottom:30px;
}
.fape{
	color:blue;
}
</style>
</head>
<body>
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
$aid=$_SESSION["admin_id"];
?>
<div class="heading">
<h4>ELEARNING ADMIN AREA</h4>
</div>
<div class="division">
<div class="sidebar">
<div class="navbar">
<a href="IWPadminpage.php">Dashboard</a>
<a href="IWPstudent.php">students</a>
<a href="IWPfaculty.php">faculty</a>
<a href="IWPcourses.php">courses</a>
<a href="IWPcontactus.php">contact us</a>
<a href="IWPfeedback.php">Feedback</a>
<a href="IWPannouncement.php">Announcement</a>
<a href="IWPprofile.php">View Profile</a>
<a href="adminlogout.php">logout</a>
</div>

</div>
<div class="content">
<?php
$qimq="select * from admin where admin_id='$aid'";
$res=mysqli_query($conn,$qimq);
$rowsim=mysqli_fetch_assoc($res);
?>
 <img id="propic" width="220" height="277" src="./adminprofile/<?php echo $aid;?>/<?php echo
$rowsim['admin_photo'];?>" alt="profile">
<br>
<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="profilepic"><br><br>
<input type="submit" name="sub" value="change profile" class="l">
</form>
<div class="info">
<table>
<tr>
 <th>name</th>
 <td><?php echo $rowsim['admin_name'];?></td>
 <td><button style="border:none;background-color:white;outline:none; border-radius:2px;" id="editname"><i class="fa fa-pencil fape" aria-hidden="true" ></button></i></td>
</tr>
<tr>
 <th>email id </th>
 <td><?php echo $rowsim['admin_emailid'];?></td>
 <td><button style="border:none;background-color:white;outline:none; border-radius:2px;" id="emailid"><i class="fa fa-pencil fape" aria-hidden="true"></button></i></td>
</tr>
<tr>

 <th>ID</th>
 <td><?php echo $aid;?></td>
 
</tr>
</table>
<?php
if(isset($_SESSION['admin_id']))
{
if(isset($_POST['sub']))
{
$path="C:/xampp/htdocs/IWP/adminprofile/".$_SESSION['admin_id'];
if(!is_dir($path))
{
mkdir($path,0777,true);
}
$imv=basename($_FILES["profilepic"]["name"]);
$targetimpath=$path.'/'.$imv;
if(move_uploaded_file($_FILES["profilepic"]["tmp_name"],$targetimpath))
{
$q="UPDATE admin SET admin_photo='$imv' WHERE Admin_id='$aid'";
if($conn->query($q)===TRUE)
{
echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
}
else{
echo "error";
}

}
}
}
?>
</div>
<div class="cn" id="cn">
<form action="#" method="post">
<label for="n">Enter your name:</label>
<br>
<input type="text" name="name" id="n">
<br>
<button class="cancel" id="canceln">cancel</button>
<input class="save" id="save" name="save" value="save" type="submit">
</div>
</form>
<?php
if(isset($_POST['save']))
{
$name=$_POST['name'];
$chname="UPDATE admin SET admin_name='$name' WHERE Admin_id='$aid'";
if($conn->query($chname)===TRUE)
{

echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
}
else{
echo "error";
}
}
?>
</div>
<div class="e" id="e">
<form action="#" method="post">
<label for="n">Enter your emailid:</label>
<br>
<input type="text" name="email" id="n">
<br>
<button class="cancel" id="cancele">cancel</button>
<input class="save" id="savee" name="savee" value="save" type="submit">
</div>
</form>
<?php
if(isset($_POST['savee']))
{
$email=$_POST['email'];
$chname="UPDATE admin SET admin_emailid='$email' WHERE Admin_id='$aid'";
if($conn->query($chname)===TRUE)

{
echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
}
else{
echo "error";
}
}
?>
</div>
<script>
var x=document.getElementById("cn");
var y=document.getElementById("e");
var name=document.getElementById("editname");
var c=document.getElementById("canceln");
var s=document.getElementById("save");
var ce=document.getElementById("cancele");
var se=document.getElementById("savee");
c.onclick=function()
{
x.style.display="none";
}
ce.onclick=function()
{
e.style.display="none";
}
s.onclick=function()
{

x.style.display="none";
}
se.onclick=function()
{
e.style.display="none";
}
editname.onclick=function(){
x.style.display="block";
}
emailid.onclick=function(){
e.style.display="block";
}
</script>
</body>
</html>