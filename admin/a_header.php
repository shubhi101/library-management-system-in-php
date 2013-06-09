<?php
session_start();
include '../config.php';
if($_SESSION["name"]!=$salt)
{
	header("location: login.php");
}
?>
<html>
	<title>Admin : <?php echo "$name";?></title>
    <link rel="stylesheet" type="text/css" href="style.css" />
	<link href="form.css" rel="stylesheet">
	<script src="scripts/wufoo.js"></script>
	<center><h1>Admin CP Of <?php echo "$name"; ?></h1></center>
	
<center><a href="index.php" class="button">Home</a>
<a href="a_book.php" class="button">Add Book</a>
<a href="out.php" class="button">Out</a>
<a href="student.php" class="button">student</a>
<a href="a_student.php" class="button">Add Student</a>
<a href="logout.php" class="button">Logout</a></center><br>
<center><div id="box">