<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="IWP.css">
 <meta name="viewport" content="width=device-width,initial-scale=1">
 
<style>
#h1cou{
text-align:center;
}
</style>
</head>
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
$ui=$_SESSION['logged_in_user_id'];
?> 

 
<body style="background-color:rgb(0 255 203)">
<section class="navsection">
 <div class="logo">
 <h1>E-learning</h1>
 </div>
 <nav>
 
 <a href="IWPstudentp.php">home</a>
 
 <a href="userlogout.php">sign out</a>
 <button id="v1" class="v1">view profile</button><!--JAVASCRIPT FILE NOT LINKED SO VIEW
PROFILE WILL NOT WORK-->
 </nav>
 <div class="vp-modal" id="vp-modal">
 <div class="content2">
 <div class="close2">+</div>
 <br>
 <div class="ppp">
 <?php
$qimq="select * from user where Userid='$ui'";
$res=mysqli_query($conn,$qimq);
$rowsim=mysqli_fetch_assoc($res);
?>
 <img id="myprofile" src="./userprofile/<?php echo $ui;?>/<?php echo $rowsim['profile'];?>"
alt="profile" width="80" height="100">
 </div>
 <br><br>
 <div class="ppp">
 <p><?php echo "Name:".$_SESSION['logged_in_user_name'];?></p>

 
 </div><br>
 <div class="fop">
 <p><?php echo "Email-id:".$rowsim['emailid'];?></p>
</div><br>
 <form action="" method="post" style="margin-top:10px" enctype="multipart/form-data">
 <div class="fop">
 <input type="file" style="width:130px;border:none;margin-bottom:2px" name="profilepic">
</div>
 <br>
<div class="fop">
 <input type="submit" value="change profile" style="width:130px;background-color:red;color:white" name="subpro">
 </div>
 </form>
 </div>
</div>
</section>
<?php
//print_r($_SESSION);
$cid=$_SESSION['courid'];
$fid=$_SESSION['facidofc'];
$uid=$_SESSION['logged_in_user_id'];
?>
<section class="mode">
<div class="playarea">
<div class="play" id="play">
<video id="myvideo" width="500" height="250" controls>
 <source src="./media/bootstrap/17/introtobootstrap/video.mp4" type="video/mp4">
</video>
</div>
</div>
<section class="videos">

<h1 style="text-transform:capitalize"><?php echo $_SESSION['coursechoname'];?></h1>
<?php
$cname=$_SESSION['coursechoname'];
$sql="select * from videos where Course_id='$cid' && facultyid='$fid'";
$res=mysqli_query($conn,$sql);
?>
<?php
while($rows=mysqli_fetch_assoc($res))
{
?>
<div class="video1">
<div class="left-side">
 <div class="image">
 <img src="./media/<?php echo $cname;?>/<?php echo $fid;?>/<?php echo $rows['Subtopic_name'];?>/<?php echo $rows['video_image'];?>" width="120" height="190"/>
 
 </div>
 </div>
<div class="right-side">
 <div class="title">
 <h4 style="text-transform:capitalize"><?php echo $rows['Subtopic_name'];?></h4>
 </div>
 <br><br>
 <div class="downloadM">
 <a href="./media/<?php echo $cname;?>/<?php echo $fid;?>/<?php echo $rows['Subtopic_name'];?>/<?php echo $rows['material'];?>"  download>download</a>
 <button id="vplay" class="vplay" onclick="playthevideo('./media/<?php echo $cname;?>/<?php echo
$fid;?>/<?php echo $rows['Subtopic_name'];?>/<?php echo $rows['video'];?>')">play</button>
 </div>
 <div class="quiz">
 <!--<a style="text-decoration:none" href="<?php echo $rows['quiz'];?>">Quiz</a>-->

 
 <a href="<?php echo $rows['quiz'];?>">Quiz</a>
 </div>
</div>
</div>
<?php
}
?>
</section>
</section>
<script src="IWPvideos.js" type="text/javascript"></script>
</body>
</html>