<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
   <title>homepage</title>
   <link rel="stylesheet" type="text/css" href="IWP.css">
   <!--<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>-->
   <meta name="viewport" content="width=device-width,initial-scale=1">
   <style>
header{
background-image:url("back1.png");
background-repeat:no-repeat;
background-size:1700px;
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
<body>


<header>
   <section class="navsection">
      <div class="logo">
	  <h1>E-learning</h1>
	  </div>
	  <nav>
	  
	  <a href="IWP.html"><i class="fas fa-home"></i>home</a>
	  
	  
	  <a href="#">sign out</a>
	  <button id="an" style="margin-top:22px">announcement</button>
	  <button id="v1"><i style="color:black" class="fa fa-user" aria-hidden="true"></i> view profile</button>
	  </nav>
   </section>
   
 <?php 
$ui=$_SESSION['logged_in_user_id'];
?>  
      <input class="search1" type="text" id="seonk" placeholder="search for courses" onkeyup="sefun()">
	  <?php
	  $annq="select * from announcement";
	  $resann=mysqli_query($conn,$annq);
$rowann=mysqli_fetch_assoc($resann);
	  ?>
    <div class="ann">
	<?php echo $rowann['Description'];?>
	</div>
    
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
	  <img id="myprofile" src="./userprofile/<?php echo $ui;?>/<?php echo $rowsim['profile'];?>" alt="profile" width="80" height="100">
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
</header>

<?php 

if(isset($_POST['subpro']))
{
	$path="C:/xampp/htdocs/IWP/userprofile/".$_SESSION['logged_in_user_id'];
	if(!is_dir($path))
	{
		mkdir($path,0777,true);
	}
	$imv=basename($_FILES["profilepic"]["name"]);
	$targetimpath=$path.'/'.$imv;
	if(move_uploaded_file($_FILES["profilepic"]["tmp_name"],$targetimpath))
	{
		$q="UPDATE user SET profile='$imv' WHERE Userid='$ui'";
		if($conn->query($q)===TRUE)
	{
		echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
	}
	else{
		echo "error";
	}
	
	
}
}




?>


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


  <div class="cards">
    <div class="image">
	  <img src="./media/<?php echo $cname;?>/<?php echo $o;?>/<?php echo $cl;?>" width="300" height="190" />
	</div>
	<div class="title">
	<?php echo "<h1 style='text-transform:capitalize' id='cname'>".$rows['Course_name']."</h1>";?>
	
	</div> 
	<div class="facname">
	<?php echo "<h4>".$reoo['facultyname']."</h4>";?>
	</div>
	<div class="cb">
	<form action="" method="post">
	<input type="hidden" value="<?php echo $rows['facultyid'];?>" name="fi">
	<input type="hidden" value="<?php echo $rows['Course_id'];?>" name="ci">
	
	<input type="submit" style="width:100px;border:2px solid black" name="enroll"  value="enroll">
	</form>
	
	
	</div>
  </div>
<?php
}
?>
<?php
if(isset($_SESSION['enrollcourse']))
{
	//echo "<script>
	//alert('course alreday edm');</script>";
	echo "kjwebjkebdjkeb";
	unset($_SESSION['enrollcourse']);
}
?>

</section>
<?php
if(isset($_POST['enroll']))
{
$f=$_POST['fi'];
$c=$_POST['ci'];
$xce="select * from enrolledcourses where Userid='$ui' && facultyid='$f' && Course_id='$c'";
$rexce=mysqli_query($conn,$xce);
$roxce=mysqli_fetch_array($rexce,MYSQLI_ASSOC);
$norenroll=mysqli_num_rows($rexce);
if($norenroll>0)
{
	$_SESSION['enrollcourse']="course already enrolled under this faculty";
}
else
{
$r="INSERT INTO enrolledcourses (Course_id,facultyid,Userid) VALUES ('$c','$f','$ui')";
if ($conn->query($r) === TRUE) {
  
                echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
            } 
            else 
            {
                echo "Error: " . $r . "<br>" . $conn->error;
            }
}
}
?>
<!-----------------------------------------------ENROLLED SECTION----------------------------->
<br>
<?php 
$z="select * from enrolledcourses where  Userid='$ui'";
$res=mysqli_query($conn,$z);
?>

<h1 style="text-align:center;margin-top:10px">ENROLLED COURSES </h1>
<section class="card1">
<?php 
while($row=mysqli_fetch_assoc($res))
{
	$rr=$row['Course_id'];
	$t="select * from courses where Course_id='$rr'";
	$re=mysqli_query($conn,$t);
    $ro=mysqli_fetch_assoc($re);
	
	$ff=$row['facultyid'];
	$fff="select * from faculty where facultyid='$ff'";
	$facf=mysqli_query($conn,$fff);
	$facff=mysqli_fetch_assoc($facf);
	$cname=$ro['Course_name'];
	
	$q="select * from coursefac where facultyid='$ff'";
    $r=mysqli_query($conn,$q);
	$rows=mysqli_fetch_assoc($r);
	$cl=$rows['courselogo'];
	
?>

<div class="cards">
    <div class="image">
	  <img src="./media/<?php echo $cname;?>/<?php echo $ff;?>/<?php echo $cl;?>" width="301" height="125"/>
	</div>
	<div class="title">
	<h1 style="text-transform:capitalize"><?php echo $ro['Course_name'];?></h1>
	</div>
	<div class="cb">
	<form action="xyyy.php" method="post">
	<input type="hidden" value="<?php echo $row['facultyid'];?>" name="f">
	<input type="hidden" value="<?php echo $row['Course_id'];?>" name="c">
	<input type="submit" style="width:100px;border:2px solid black" name="start"  value="view">
	</form>
	
	
	
	
	</div>
  </div>
 <?php
}
?>
  
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
<form action="dcontactt.php" class="contactf" method="post" onsubmit="return cv()">
<div class="f">
<input type="text" id="fname" class="fname" name="fname" placeholder="First Name" autocomplete="on" required><span id="erfn"></span>
</div>
<div class="l">
<input type="text" id="lname" class="fname" name="lname" placeholder="Last Name" autocomplete="on" required><span id="erln"></span>


</div>
<div class="e">
<input type="email" id="emai" class="fname" name="emai" placeholder="Email Address" autocomplete="on" required>
</div>
<div class="m">
<textarea id="text" class="text" name="text">write something....</textarea>
</div>
<input  class="submitc" type="submit" value="submit" name="submit">
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function()
{
	$("#an").click(function(){
		$(".ann").toggle();
	});
});



</script>
<script>
/*$(document).ready(function()
{<!------------ce value will be taken from database  which will be based on number of courses enrolled------->
if(ce>1)
$("nav").append('<a href="IWPadminform.html">feedback</a>');
});*/
</script>
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

<?php
$feed="select * from enrolledcourses where Userid='$ui'";
$refee=mysqli_query($conn,$feed);
$rofee=mysqli_fetch_array($refee,MYSQLI_ASSOC);
$countcou=mysqli_num_rows($refee);
if($countcou>1)
{
	echo $countcou;
	?>
	<script>
$(document).ready(function(){
	$("nav").append('<a href="IWPfeedbackst.php">feedback</a>');
});
</script>
<?php
}
?>

<script src="IWPstudentp.js" type="text/javascript"></script>


</body>
</html>