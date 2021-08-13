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
outline:0;*/
float:left;
border:3px solid #32e17c;
height:40px;
width:350px;
border-radius:10px 0px 0px 10px;
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
<div class="content">
<h6 style="width:60%; background-color:grey; font-size:30px; margin-bottom:20px;">STUDENT
FEEDBACK</h6>
<?php
$q="select * from feedback";
$r=mysqli_query($conn,$q);
?>
<table>
<tr>
 <th>user name</th>
 <th>emaild</th>
 <th>platform review</th>
 <th>course video review</th>
 <th>quiz review</th>
 <th>material download review</th>
 <th>teaching review</th>
 <th>comment</th>
</tr>
<?php
while($rows=mysqli_fetch_assoc($r))
{

?>
<tr>
<td><?php echo $rows['name'];?></td>
<td><?php echo $rows['emailid'];?></td>
<td><?php echo $rows['platform'];?></td>
<td><?php echo $rows['videosw'];?></td>
<td><?php echo $rows['gquiz'];?></td>
<td><?php echo $rows['dmat'];?></td>
<td><?php echo $rows['tmethd'];?></td>
<td><?php echo $rows['comment'];?></td>
</tr>
<?php
}
?>
 
</table>
 </div>
</div>
</body>
</html>