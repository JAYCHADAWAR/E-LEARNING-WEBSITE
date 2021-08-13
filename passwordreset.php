<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
?>
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
function send_password_reset($namefac,$gemail,$tok)
{
 $mail = new PHPMailer(true);
try
{

 
 $mail->isSMTP(); 
$mail->Host = 'smtp.gmail.com'; 
$mail->SMTPAuth = true; 
$mail->Username = 'chadawarjay@gmail.com'; 
$mail->Password = 'Jay@123456789@@'; 
$mail->SMTPSecure = 'tls'; 
 $mail->Port = 587; 
 
 $mail->setFrom('chadawarjay@gmail.com', 'jay');
 $mail->addAddress('chadawarjay@gmail.com', $namefac); 
 
 
 $mail->isHTML(true); 
 $mail->Subject = 'Reset password Notification';
$email_template="<h3>you are recieving this mail beacuse we recieved a password reset request for your
account.</h3>
<a href='http://localhost/IWP/changepasswordfac.php'?token=$tok&email=$gemail'>click
me</a>";
 $mail->Body = $email_template;
 
 $mail->send();
}
catch (Exception $e) {
 echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

 
}
if(isset($_POST['sub']))
{
$tok=md5(rand());
$email=$_POST['email'];
$check="select * from faculty WHERE faculty_emailid='$email'";
$check_run=mysqli_query($conn,$check);
if(mysqli_num_rows($check_run)>0)
{
$row=mysqli_fetch_array($check_run);
$namefac=$row['facultyname'];
$gemail=$row['faculty_emailid'];
echo $gemail;
$update_token="UPDATE faculty SET token='$tok' WHERE faculty_emailid='$gemail' LIMIT 1";
 
 if($conn->query($update_token)===TRUE)
{
send_password_reset($namefac,$gemail,$tok);
$_SESSION['stat']="we emailed u a password reset link";
 header("Location:resetfacultypassword.php");
}
else
{
echo "problem in sending mail";

}
}
 else{
 $_SESSION['stat']="no email found";
 header("Location:resetfacultypassword.php");
}
}
?>