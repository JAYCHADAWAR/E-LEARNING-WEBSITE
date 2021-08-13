<?php
session_start();
$_SESSION["quizupdate"]="Record Updated";
header("Location:IWPfacultycourses.php");
?>