<?php include '../config.php'; ?>
<?php include 'a_header.php'; ?>
<?php
$db=new mysqli("$dbhost","$dbuser","$dbpass");
$db->select_db("$dbname");
$query="select * from student";
$result=$db->query($query);
//find number of rows
$num_rows=$result->num_rows;


?>
<head>
<style>
td{ text-align:center; }
#info{
color:red;
top:5px;
position:fixed;
}
</style>
<center>
</head>

<?php
//student info
if(isset($_GET['s_id'])){

$db=new mysqli("$dbhost","$dbuser","$dbpass");
$db->select_db("$dbname");
$query="select * from student";
$result2=$db->query($query);
$num_rows=$result2->num_rows;
$stu_id=$_GET['s_id'];
echo "<h2>Student Information</h2>";
echo "<table border=\"1\"></tr><td>Student ID</td><td width=\"180\">Student Name</td><td>Depertment</td><td>Mobile</td></tr>";
for($i=0;$i<$num_rows;$i++){
$row2=$result2->fetch_row();
if($stu_id==$row2[0]){echo "<tr><td>$row2[0]</td><td width=\"180\">$row2[1]</td><td>$row2[2]</td><td>$row2[3]</td></tr>";}
}
echo "</table>";
$query="select * from issue";
$result6=$db->query($query);
$num_rows6=$result6->num_rows;

echo "<h2>Book History</h2>";
echo "<table border=\"1\">";
echo "<tr><td>Book-ID</td><td>Issue Date</td><td>Returned</td></tr>";
for($i=0;$i<$num_rows6;$i++){ $row6=$result6->fetch_row();if($row6[0]==$stu_id){
																				
																				echo "<tr>";
																				echo "<td>$row6[1] </td><td width=\"200\">$row6[2]</td>";
																				if($row6[3]==1){echo "<td><font color=\"green\">Yes</font></td>"; }
																				else {echo "<td><font color=\"red\">No</font></td>"; }
																				echo "</tr>";
																				}
							} echo "</table><br>"; include '../footer.php'; exit();
}

?>


<br>
<h2>Student/CardHolder List</h2>
Total Member: <?php echo $num_rows; ?>
<table border="1">
<tr>
<td>S.ID</td>
<td>Name</td>
<td>Depertment</td>
<td>Mobile</td>
</tr>



<?php
for($i=0;$i<$num_rows;$i++)
{
    //fetch  row
    $row=$result->fetch_row();
	echo "<tr>";
    echo "<td width=\"60\"><a href=\"?s_id=$row[0]\">$row[0]</a></td>" ; 
	echo "<td width=\"200\">$row[1]</td>" ;
	echo "<td width=\"30\">$row[2]</td>" ;
	echo "<td width=\"30\">$row[3]</td>" ;
	echo "</tr>";
}	
echo "</table>";	
?>
<br>

<?php include '../footer.php'; ?>
</center>
