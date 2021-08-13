<?php
session_start();
$_SESSION["matupdate"]="Record Updated";
header("Location:IWPfacultycourses.php");
?>