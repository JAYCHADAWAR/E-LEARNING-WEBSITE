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
border-color:green;
border-radius:30px;
outline:none;
float:left;
border:3px solid #32e17c;
height:40px;
width:350px;
border-radius:10px 10px 10px 10px;
}
Vit, Vellore Page 216
.se
{
float:left;
border:3px solid #32e17c ;
height:40px;
border-radius:0px 10px 10px 0px;
background-color:#32e17c;
outline:none;
}
.af{
width:50%;
display:flex;
justify-content:center;
padding:10px;
margin-bottom:10px;
}
.heading1
{
width:50%;
display:flex;
justify-content:center;
}
#addfac
{
margin-top:20px;
width:60px;
margin-bottom:20px;

background-color:blue;
border:none;
padding:7px;
color:white;
outline:none;
}
#fname,#emid,#pass,#phno{
margin-bottom:10px;
border:1px solid #DDDDDD;
outline:none;
padding:5px;
width:300px;
}
.fdf{
padding:10px;
justify-content:center;
width:400px;
margin-bottom:20px;
}
.fdf h1
{
margin-bottom:10px;
}
#ftid{
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
.fdff{
width:800px;
display:flex;
justify-content:center;
}
.delr{
background-color:white;
outline:none;
border:none;
}
#fname:focus,#emid:focus,#pass:focus,#phno:focus
{
box-shadow:0 0 5px rgba(81,203,238,1);
border:1px solid rgba(81,203,238,1);
outline:none;
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
<div class="content">
<!--<form action="#" class="search">-->
<div class="search">
<input class="search1" type="text" placeholder="search by faculty id" id="si" onkeyup="searchfun()">
 </div>
 <!--<button class="se">search</button>-->
 <!--<button class="se"><i style="font-size:24px" class="fa">&#xf002;</i></button>-->
<div class="heading1">

<h1 id="addfacs">Add Faculty</h1>
</div>
<div class="af">
<form action="addfac.php" class="addfaculty" id="addf" onsubmit="return validate()" method="post">
<label for="fname">NAME:</label>
<br>
<input type="text" id="fname" name="name" required>
<br>
<label for="emid">email id:</label>
<br>
<input type="email" id="emid" name="email" required>
<br>
<label for="pass">password</label>
<br>
<input type="password" id="pass" name="pass" required>
<br>
<label for="phno">Mobile Number:</label>
<br>
<input type="text" id="phno" name="phno" required>
<br>
<input type="submit" name="submit" value="add" id="addfac">
</form>
</div>
<!---<div class="fdff">
<div class="fdf">
<!----------------<h1>delete faculty </h1>
<form action="#">
<input type="text" id="ftid" placeholder="faculty id">
<br>
<button class="dels">Delete</button>
Vit, Vellore Page 221
</form>
</div>
</div>-->
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
if(isset($_SESSION['status']))
{
$chj=$_SESSION['status'];
$color=$_SESSION['scolor'];
echo "<script>document.getElementById('addfacs').innerHTML='$chj';
document.getElementById('addfacs').style.color='$color';
</script>";
//echo $_SESSION['status'];
unset($_SESSION['status']);
unset($_SESSION['scolor']);
}
?>
<?php
$query="select * from faculty";

$result=mysqli_query($conn,$query);
?>
<h6 style="width:60%; background-color:grey; font-size:30px; margin-bottom:20px;">FACULTY</h6>
<table id="mt">
<tr>
 <th>faculty id</th>
 <th>faculty name</th>
 <th>faculty phone number</th>
 <th>email id</th>
 <th>action</th>
</tr>
<?php
while($rows=mysqli_fetch_assoc($result))
{
?>
<tr>
<td><?php echo $rows['facultyid']; ?></td>
<td><?php echo $rows['facultyname']; ?></td>
<td><?php echo $rows['faculty_phno']; ?></td>
<td><?php echo $rows['faculty_emailid']; ?></td>
<td><form action="" method="post">
<input type="hidden" name="id" value='<?php echo $rows["facultyid"]; ?>'>
<button type="submit" class="delr" name="delete" value="Delete"><i class="fas fa-trash"></i></button>
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
$query="DELETE FROM faculty WHERE facultyid='$id'";
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
</table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
/*function del(c)
{
var x=$(c).closest("tr").find("td:first-child").text();
console.log(x);
}*/
</script>
<script>
function validate()
{
var ph=document.getElementById("phno");
var un=document.getElementById("fname");
var pas=document.getElementById("pass");
if(isNaN(ph.value)||((ph.value.length<10)||(ph.value.length>10)))
{
alert("phone number should only contain numbers");
return false;
}
else if(un.value.length<3||un.value.length>20)
{
alert("length of user name should be between 3 and 20 characters");
return false;
}
else if(!un.value.match(/^[A-Za-z\s]+$/))
{
alert("name should contain only contain alphabets");
return false;
}
else if(pas.value.length<6||pas.value.length>15)
{
alert("password should be of 6 to 15 characters long");
return false;
}
else{
/*document.getElementById("phno").value='';
document.getElementById("fname").value='';
document.getElementById("pass").value='';
document.getElementById("emid").value='';
document.getElementById("phno").value='';
return true;
*/
}
}
</script>
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
</div>
</body>
</html>
