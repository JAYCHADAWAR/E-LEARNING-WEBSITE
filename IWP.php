<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
 <title>home</title>
 <link rel="stylesheet" type="text/css" href="IWP.css">
 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
crossorigin="anonymous"/>
 <meta name="viewport" content="width=device-width,initial-scale=1">
 
<style>
header{
background-image:url("back1.png");
background-repeat:no-repeat;
background-size:1700px;
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
<header>
 <section class="navsection">
 <div class="logo">
 <h1>E-learning</h1>
 </div>
 <nav>
 
 <a href="IWP.php"><i class="fas fa-home"></i>home</a>
 
 <a href="IWPfacultylogin.php">facultylogin</a>
 <a href="IWPadminform.php">adminlogin</a>
 <!--<a href="#">sign out</a>
<button id="v1"><i style="color:black" class="fa fa-user" aria-hidden="true"></i> view
profile</button>-->
 </nav>
 </section>
 
 <!--<form action="#" class="search">-->
 <input class="search1" type="text" id="seonk" placeholder="search for courses" onkeyup="sefun()">
 <!--<button class="se">search</button>-->
 <!--<button class="se"><i style="font-size:24px" class="fa">&#xf002;</i></button>-->
 <!--</form>-->
 
 <main>
 
 <div class="mai">
 <!--<h1>**content***</h1>
 <h2>**content**</h2>-->
 <button class="b1" id="b1">signup</button>
 <button class="b2" id="b2">login</button>
 
</div>
 </main>
 
 <div class="bg-modal" id="bg-modal">
 <div class="content">
 <div class="close">+</div>
 <form action="authenticate.php" method="post">
 <input type="email" placeholder="email" name="emailid" id="le">
 <input type="password" placeholder="password" name="pass" id="pe">
<input class="btn" id="btn" type="submit" name="login" value="submit"><br>
</form>
</div>
 </div>
<div class="bg-modal1" id="bg-modal1">
 <div class="content1">
 <div class="close1">+</div>
 <form name="signupform" id="signupform" action="signup.php" method="post" 
onsubmit="return signupval()">
 <input type="text" id="uname" placeholder="username" name="username" required>
<input type="email" id="email" placeholder="email" name="emailsid">
 <input type="password" id="password" placeholder="password" name="upassword">
<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
<input type="password" id="cpassword" placeholder="confirm password"
name="confirmpassword">
<span toggle="#cpassword" class="fa fa-fw fa-eye field-icon toggle-cpassword"></span>
<p id="cpe"></p>
<input type="text" id="pnum" placeholder="phone number" name="mno">
<p id="perror"></p>
<input type="submit" class="btn1" value="submit" id="sub" name="submit">
</form>
 </div>
 </div>
 <!--<div class="vp-modal" id="vp-modal">
 <div class="content2">
 <div class="close2">+</div>
 <div class="profile-photo">
 <img src="">
 </div>
 <div class="name">
 <h1></h1>
</div>
</div>-->
 
</header>
<!---------------------------cards-------------------------------->
<?php
$q="select * from coursefac";
$result=mysqli_query($conn,$q);
?>
<section class="card">
<?php
while($rows=mysqli_fetch_assoc($result))
{
$o=$rows['facultyid'];
$oo="select * from faculty where facultyid='$o'";
$reo=mysqli_query($conn,$oo);
$reoo=mysqli_fetch_assoc($reo);
$cname=$rows['Course_name'];
$cl=$rows['courselogo'];
?>
 <div class="cards" id="cars">
 <div class="image">
 <img src="./media/<?php echo $cname;?>/<?php echo $o;?>/<?php echo $cl;?>" width="300"
height="124" />
</div>
<div class="title" id="tit">
<?php echo "<h1 id='cname'>".$rows['Course_name']."</h1>";?>

</div>
<div class="facname">
<?php echo "<h4>".$reoo['facultyname']."</h4>";?>
</div>
<div class="cb">
<a href="<?php echo $rows['link'];?>" id="demo">DEMO</a>
</div>
 </div>
<?php
}?>
 
</section>
<section class="aboutus">
<h1 id="abouth1">ABOUT US</h1>
<div class="aboucon">
<p>The purpose of developing this website was to produce a learning management
system that could provide teaching materials and assessment tools for
students so that they could improve their abilities and assess them.<br>
The project explains about importance of the E- Learning Design
features and analyses various aspects. So, we need to figure out web
programming based application model implementation’s importance
for e-learning system, and which made an active research on following

manner: its working method, architecture design, Development tools
</p>
</div>
</section>
<section class="contactus">
<div class="contact">
<h1 id="ch1">CONTACT US</h1>
<span id="sucd"></span>
<form class="contactf" action="dcontact.php" method="post" onsubmit="return cv()">
<div class="f">
<input type="text" id="fname" class="fname" name="fname" placeholder="First Name"
autocomplete="on" required><span id="erfn"></span>
</div>
<div class="l">
<input type="text" id="lname" class="fname" name="lname" placeholder="Last Name" autocomplete="on"
required ><span id="erln"></span>
</div>
<div class="e">
<input type="email" id="emai" class="fname" name="emai" placeholder="Email Address"
autocomplete="on" required>
</div>
<div class="m">
<textarea id="text" class="text" name="text" placeholder="write something..."></textarea>
</div>
<input class="submitc" type="submit" name="submit" value="submit">
</form>
</div>

</section>
<?php
if(isset($_SESSION['contactussuc']))
{
$chj=$_SESSION['contactussuc'];
$color=$_SESSION['contactcolor'];
echo "<script>document.getElementById('ch1').innerHTML='$chj';
document.getElementById('ch1').style.color='$color';
</script>";
//echo $_SESSION['status'];
unset($_SESSION['contactussuc']);
unset($_SESSION['contactcolor']);
}
?>
<!--<script>
var modal = document.getElementById("bg-modal");
var modal1 = document.getElementById("bg-modal1");
var modal2=document.getElementById("vp-modal");
// Get the button that opens the modal
var bt = document.getElementById("b2");
var bt1= document.getElementById("b1");
var vp=document.getElementById("v1");
// Get the <span> element that closes the modal
var spa = document.getElementsByClassName("close")[0];
var spa1 = document.getElementsByClassName("close1")[0];
Vit, Vellore Page 25
var spa2=document.getElementsByClassName("close2")[0];
// When the user clicks on the button, open the modal
bt.onclick = function() {
 modal.style.display = "flex";
}
bt1.onclick = function() {
 modal1.style.display = "flex";
}
vp.onclick = function() {
 modal2.style.display = "flex";
}
// When the user clicks on <span> (x), close the modal
spa.onclick = function() {
 modal.style.display = "none";
}
spa1.onclick = function() {
 modal1.style.display = "none";
}
spa2.onclick = function() {
 modal2.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
 if (event.target == modal) {
 modal.style.display = "none";
 }
}
Vit, Vellore Page 26
</script>-->
<script>
function sefun()
{
var input,filter;
input=document.getElementById('seonk');
x=document.getElementsByClassName('cards');
 y=document.getElementsByClassName('title');
//y=document.getElementsByClassName('title');
//z=y.getElementsByTagName('h1');
//console.log(y.length);
for(var i=0;i<y.length;i++)
{
 var z=y[i].getElementsByTagName('h1').cname.textContent;
 console.log(z.indexOf(input.value));
 
 if(z.indexOf(input.value)>-1)
 {
 x[i].style.display="";
 }
 else
 {
 x[i].style.display="none";
 }
 
}
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(".toggle-password").click(function() {
 $(this).toggleClass("fa-eye fa-eye-slash");
var inv=$("#password");
 if (inv.attr("type") == "password") {
 inv.attr("type", "text");
 } else {
 inv.attr("type", "password");
 }
});
$(".toggle-cpassword").click(function() {
 $(this).toggleClass("fa-eye fa-eye-slash");
 
 var inc=$("#cpassword");
 if (inc.attr("type") == "password") {
 
 inc.attr("type", "text");
 } else {
 inc.attr("type", "password");
 }
});
</script>
<script src="IWP1.js"></script>
