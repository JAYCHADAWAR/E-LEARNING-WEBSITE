<html>
<head>
<!---<link rel="stylesheet" type="text/css" href="IWPadminpage.css">-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<script>
$(document).ready(function(){

$("#stid").focus(function(){
$("#stid").css("border","2px solid orange");
});
});
</script>
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
.search
{
width:450px;
margin-left:50px;
margin-bottom:70px;
}
.search1
{
border-color:green;
outline:none;
float:left;
border:3px solid #32e17c;
height:40px;

width:350px;
border-radius:10px 10px 10px 10px;
}
.se
{
float:left;
border:3px solid #32e17c ;
height:40px;
border-radius:0px 10px 10px 0px;
background-color:#32e17c;
outline:none;
}
.sdf{
padding:10px;
display:flex;
justify-content:center;
width:400px;
margin-bottom:20px;
}
#stid{
margin-bottom:20px;
width:150px;
padding:5px;
outline:none;
border:1px solid black;
}
.dels
{

margin-bottom:20px;
width:60px;
background-color:blue;
border:none;
padding:7px;
color:white;
outline:none;
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
<a href="#">logout</a>
</div>
</div>
<div class="content">
<!--<form action="#" class="search">-->
<div class="search">
 <input class="search1" type="text" placeholder="search by student id" id="si" onkeyup="searchfun()">
 <!--<button class="se">search</button>-->
 <!--<button class="se"><i style="font-size:24px" class="fa">&#xf002;</i></button>-->
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
$query="select * from user";
$result=mysqli_query($conn,$query);
?>
<h6 style="width:60%; background-color:grey; font-size:30px; margin-bottom:20px;">STUDENTS<span
id="sd"></span></h6>
<table id="mt">
<tr>
 <th>student id</th>
 <th>student name</th>

 <th>email id</th>
 <th>action</th>
</tr>
<?php
while($rows=mysqli_fetch_assoc($result))
{
?>
<tr>
<td><?php echo $rows['Userid']; ?></td>
<td><?php echo $rows['username']; ?></td>
<td><?php echo $rows['emailid']; ?></td>
<td><form action="" method="post">
<input type="hidden" name="id" value='<?php echo $rows["Userid"]; ?>'>
<button type="submit" class="delr" name="delete" value="Delete"><i class="fas fa-trash"></i></button>
</form>
</td>
</tr>
<?php
}
?>
</table>
</div>
</div>
<?php
if(isset($_POST['delete']))
{
$id=$_POST['id'];

$query="DELETE FROM user WHERE Userid='$id'";
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
function searchfun()
{
let filter=document.getElementById("si").value;
console.log(filter);
let mt=document.getElementById('mt');
let tr=mt.getElementsByTagName('tr');

for(var i=0;i<tr.length;i++)
{
let td=tr[i].getElementsByTagName('td')[0];
if(td)
{
let tv=td.textContent;
if(tv.indexOf(filter)>-1)
{
tr[i].style.display="";
}
else{
tr[i].style.display="none";
}
 }
}
}
</script>
</body>
</html>