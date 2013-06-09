<title>Installing LMS</title>
<center><h1>Installing LMS</h1><h3><a href="?act=1">Delete</a> This File After Installion</h3></center>
<?php include '../config.php'; ?>
<?php
if(isset($_GET['act'])){
if(unlink('test.htm')){echo "deleted"; exit;}
else { echo "Please Delete Install.php Manually<br>"; }
					  }
$con = mysql_connect("$dbhost","$dbuser","$dbpass");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

// Create database
if (mysql_query("CREATE DATABASE $dbname",$con))
  {
  echo "<font color=\"green\">Database created</font><br>";
  }
else
  {
  echo "<font color=\"red\">Error creating database: </font>" . mysql_error();
  }

// Create table Book
mysql_select_db($dbname, $con);
// Create Table book
$sql = "CREATE TABLE book
(
id int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(id),
aurther text,
quantity text,
now text,
name text
)";
// Create Table issue
$sql1 = "CREATE TABLE issue
(
s_id int,
b_id int,
date text,
val int
)";
// Create Table student
$sql2 = "CREATE TABLE student
(
id int,
name text,
dept text,
mobile text
)";
// Execute query Book
if(mysql_query($sql,$con)){ echo "<br><font color=\"green\">Table Name book Created</font>"; }
else { echo "<br><font color=\"red\">Table Name book Creation Failed</font>"; }

// Execute query Issue
if(mysql_query($sql1,$con)){ echo "<br><font color=\"green\">Table Name issue Created</font>"; }
else { echo "<br><font color=\"red\">Table Name issue Creation Failed</font>"; }

// Execute query student
if(mysql_query($sql2,$con)){ echo "<br><font color=\"green\">Table Name student Created</font>"; }
else { echo "<br><font color=\"red\">Table Name student Creation Failed</font>"; }
mysql_close($con);


?> 