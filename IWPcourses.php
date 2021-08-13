<?php
session_start();
?>
<html>
<head>
<!---<link rel="stylesheet" type="text/css" href="IWPadminpage.css">-->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
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
margin-bottom:50px;
}
.search1
{
/*border-color:green;
border-radius:30px;
outline:none;*/
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
.cdf,.addcourse{
padding:10px;
width:400px;
margin-bottom:20px;
padding-top:20px;
 }
.cd{
margin-bottom:20px;
margin-top:20px;
width:150px;
padding:5px;
outline:none;
border:1px solid #DDDDDD; }
.but {
margin-top:20px;
margin-bottom:20px;
width:60px;
background-color:blue;
border:none;
padding:7px;
color:white;
outline:none; }
.ac {
text-align:center;
width:800px; }
.m{
width:800px;

display:flex;
justify-content:center;
}
.delr{
background-color:white;
outline:none;
border:none;
}
input[type="text"]:focus
{
box-shadow:0 0 5px rgba(81,203,238,1);
border:1px solid rgba(81,203,238,1);
outline:none;
}
.tra
{
	color:red;
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
<a href="adminlogout.php">logout</a>
</div>
</div>
<div class="content" action="#">
 <div class="search">
 <input class="search1" type="text" placeholder="search by course name" id="si" onkeyup="searchfun()">
</div>
<div class="addcourse">
<h1 class="ac" id="ac">Add Course</h1>
<br>
<div class="m">
<form action="addcourse.php" method="post" onsubmit="return val()">
<input type="text" name="name" class="cd" id="cname" placeholder="course name">
<br>
<input type="submit" value="Add" name="submit" class="but">
</form>
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
if(isset($_SESSION['stacou']))
{
$chj=$_SESSION['stacou'];
$color=$_SESSION['coucolor'];
echo "<script>document.getElementById('ac').innerHTML='$chj';
document.getElementById('ac').style.color='$color';
</script>";
//echo $_SESSION['status'];
unset($_SESSION['stacou']);
unset($_SESSION['coucolor']);
}
?>
<?php
$query="select * from courses";
$result=mysqli_query($conn,$query);
?>
<h6 style="width:60%; background-color:grey; font-size:30px; margin-bottom:20px;">COURSES</h6>
<table id="mt">
<tr>
 <th>course id</th>

 <th>course name</th>
 <th>action</th>
</tr>
<?php
while($rows=mysqli_fetch_assoc($result))
{
?>
<tr>
<td><?php echo $rows['Course_id']; ?></td>
<td><?php echo $rows['Course_name']; ?></td>
<td>
<form action="" method="post">
<input type="hidden" name="id" value='<?php echo $rows["Course_id"]; ?>'>
<button type="submit" class="delr" name="delete" value="Delete"><i class="fas fa-trash tra"></i></button>
</form>
</td>
</tr>
<?php
}
?>
</table>
</div>
<?php
if(isset($_POST['delete']))
{
$id=$_POST['id'];
$query="DELETE FROM courses WHERE Course_id='$id'";
if($conn->query($query)==TRUE)
{
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
function del(c)
{
var x=$(c).closest("tr").find("td:first-child").text();
console.log(x);
}
</script>
<script>
function val()
{

var cn=document.getElementById("cname");
if(cn.value.length<3)
{
alert("length of course name should be greater than 3");
return false;
}
if(!cn.value.match(/^[A-Za-z\s]+$/))
{
alert("course name should only contain alphabets");
return false;
}
else
{
}
}
</script>
<script>
function searchfun()
{
let filter=document.getElementById("si").value;
console.log(filter);
let mt=document.getElementById('mt');
let tr=mt.getElementsByTagName('tr');
for(var i=0;i<tr.length;i++)
{
let td=tr[i].getElementsByTagName('td')[1];
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
</script>
</body>
</html>