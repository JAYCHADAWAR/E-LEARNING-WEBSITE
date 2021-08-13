<?php
session_start();
?>
<html>
<style>
 body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}
input[type=text], select, textarea {
 width: 100%;
 padding: 12px;
 border: 1px solid #ccc;
 border-radius: 4px;
 box-sizing: border-box;
 margin-top: 6px;
 margin-bottom: 16px;
 resize: vertical;
}
input[type=submit] {
 background-color: #04AA6D;

 color: white;
 padding: 12px 20px;
 border: none;
 border-radius: 4px;
 cursor: pointer;
}
input[type=submit]:hover {
 background-color: #45a049;
}
.form {
 border-radius: 5px;
 background-color: aliceblue;
 padding: 20px;
 }
 
 </style>
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

<body style="margin-left: 300px; margin-right: 300px;">
 <h1 style="text-align: center; background-color: aliceblue; color: "> Feedback Form </h1>
 
 <form action="#" method="post">
 
 <div class="form">
 
 <label for="fname">Name</label>
 <input type="text" id="name" name="name" placeholder="Your name..">
 <label for="lname">E-Mail <span id="ee"></span></label>
 <input type="text" id="email" name="email" placeholder="Your email address..">
 
 <p> PLEASE RATE THE FOLLOWING AND COMMENT IF ANY ISSUES FOR THE FOLLOWING : </p>
 
 <label for="q1">1.THE PLATFORM ?</label>
 <br><br>
 <input type="radio" id="rating-5" name="rating" value="5" />
 <label for="rating-5">5</label><br>
 <input type="radio" id="rating-4" name="rating" value="4" />
 <label for="rating-4">4</label><br>
 <input type="radio" id="rating-3" name="rating" value="3" />
 <label for="rating-3">3</label><br>
 <input type="radio" id="rating-2" name="rating" value="2" />
 <label for="rating-2">2</label><br>
 <input type="radio" id="rating-1" name="rating" value="1" />
 <label for="rating-1">1</label><br>
 <input type="radio" id="rating-0" name="rating" value="0"/>

 <label for="rating-0">0</label>
 
 <br><br>
 <label for="q1">2. WORKING OF THE VIDOES ?</label>
 <br><br>
 <input type="radio" id="rating-5" name="ratingv" value="5" />
 <label for="rating-5">5</label>
 <br>
 <input type="radio" id="rating-4" name="ratingv" value="4" />
 <label for="rating-4">4</label>
 <br>
 <input type="radio" id="rating-3" name="ratingv" value="3" />
 <label for="rating-3">3</label>
 <br>
 <input type="radio" id="rating-2" name="ratingv" value="2" />
 <label for="rating-2">2</label>
 <br>
 <input type="radio" id="rating-1" name="ratingv" value="1" />
 <label for="rating-1">1</label>
 <br>
 <input type="radio" id="rating-0" name="ratingv" value="0" />
 <label for="rating-0">0</label>
 
 <br>
 <br>
 
 <label for="q1">3. GIVING QUIZES ?</label>
 <br><br>

 <input type="radio" id="rating-5" name="ratingq" value="5" />
 <label for="rating-5">5</label><br>
 <input type="radio" id="rating-4" name="ratingq" value="4" />
 <label for="rating-4">4</label><br>
 <input type="radio" id="rating-3" name="ratingq" value="3" />
 <label for="rating-3">3</label><br>
 <input type="radio" id="rating-2" name="ratingq" value="2" />
 <label for="rating-2">2</label><br>
 <input type="radio" id="rating-1" name="ratingq" value="1" />
 <label for="rating-1">1</label><br>
 <input type="radio" id="rating-0" name="ratingq" value="0"/>
 <label for="rating-0">0</label>
 
 <br>
 <br>
 
 <label for="q1">4. DONLOADING MATERIALS ?</label>
 <br><br>
 <input type="radio" id="rating-5" name="ratingm" value="5" />
 <label for="rating-5">5</label><br>
 <input type="radio" id="rating-4" name="ratingm" value="4" />
 <label for="rating-4">4</label><br>
 <input type="radio" id="rating-3" name="ratingm" value="3" />
 <label for="rating-3">3</label><br>
 <input type="radio" id="rating-2" name="ratingm" value="2" />
 <label for="rating-2">2</label><br>
 <input type="radio" id="rating-1" name="ratingm" value="1" />
 <label for="rating-1">1</label><br>
 <input type="radio" id="rating-0" name="ratingm" value="0"/>
 <label for="rating-0">0</label>
 

 <br>
 <br>
 
 <label for="q1">5. TEACHING METHODS ?</label>
 <br><br>
 <input type="radio" id="rating-5" name="ratingt" value="5" />
 <label for="rating-5">5</label><br>
 <input type="radio" id="rating-4" name="ratingt" value="4" />
 <label for="rating-4">4</label><br>
 <input type="radio" id="rating-3" name="ratingt" value="3" />
 <label for="rating-3">3</label><br>
 <input type="radio" id="rating-2" name="ratingt" value="2" />
 <label for="rating-2">2</label><br>
 <input type="radio" id="rating-1" name="ratingt" value="1" />
 <label for="rating-1">1</label><br>
 <input type="radio" id="rating-0" name="ratingt" value="0"/>
 <label for="rating-0">0</label>
 
 <br><br>
 <label for="subject">Comment</label>
 <textarea id="comment" name="comment" placeholder="Write something.."
style="height:200px"></textarea>
 
 <br><br>
 <input type="submit" name="submitfe" value="Submit">
 
</div>
 </form> 
<?php
$ui=$_SESSION['logged_in_user_id'];
?>

 
<?php
if(isset($_POST['submitfe']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$sql="select * from user where emailid='$email'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$c=mysqli_num_rows($result);
if($c==1)
{
if(!empty($_POST['rating']) && !empty($_POST['ratingv']) && !empty($_POST['ratingq']) &&
!empty($_POST['ratingm']))
{
$c=0;
$ratingp=$_POST['rating'];
$ratingv=$_POST['ratingv'];
$ratingq=$_POST['ratingq'];
$ratingm=$_POST['ratingm'];
$ratingt=$_POST['ratingt'];
$comment=$_POST['comment'];
$q="INSERT INTO feedback (name,emailid,platform,videosw,gquiz,dmat,tmethd,comment) VALUES
('$name','$email','$ratingp','$ratingv','$ratingq','$ratingm','$ratingt','$comment')";
if ($conn->query($q) === TRUE) {
 echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
 }
 else
 {
 echo "Error: " . $q . "<br>" . $conn->error;
 } 

}
else
{
echo "please check all the question";
}
}
else
{
echo "<script>document.getElementById('ee').innerHTML='Enter the registered email-id';
document.getElementById('ee').style.color='red';
</script>";
}
}
?>
</body>
</html>