<?php
session_start();
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="IWPadminform.css">
</head>
<body>
<div class="container">
<h1 style="text-align:center" id="stat">Forgot Password</h1>
<form action="passwordreset.php" method="post">
<div class="e">
<input type="email" id="email" name="email" placeholder="EMAIL-ID" autocomplete="off">
</div>
<br><br>
<input type="submit" name="sub" value="submit" class="signin">
<br><br>
</form>
<?php
if(isset($_SESSION['stat']))
{
$cg=$_SESSION['stat'];
echo "<script>document.getElementById('stat').innerHTML='$cg';
document.getElementById('stat').style.color='red';
</script>";
unset($_SESSION['stat']);
}
?>

</div>
</body>
</html>
