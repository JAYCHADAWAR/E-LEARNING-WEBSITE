<?php
session_start();
$_SESSION["videoupdate"]="Record Updated";
header("Location:IWPfacultycourses.php");
?>