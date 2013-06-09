<?php include '../config.php'; ?>
<?php include 'a_header.php'; ?>
<body>
<center>

<?php
//book back
if(isset($_GET['back'])){
$db=new mysqli("$dbhost","$dbuser","$dbpass");
$db->select_db("$dbname");
$query="select * from issue";
$result2=$db->query($query);
$num_rows=$result2->num_rows;
$stu_id=$_GET['sid'];
$book_id=$_GET['bid'];
for($i=0;$i<$num_rows;$i++){
$row2=$result2->fetch_row();
$val=1;
if($stu_id==$row2[0] && $book_id==$row2[1]){ if($db->query("UPDATE issue SET val = '$val' WHERE s_id = '$stu_id' AND b_id = '$book_id'")){ echo "<br>Tacking Back - DONE"; }}
}
$query="select * from book";
$result5=$db->query($query);
//find number of rows
$num_rows5=$result5->num_rows;
for($i=0;$i<$num_rows5;$i++){
                           $row5=$result5->fetch_row(); 
						   
						   if($row5[0]==$book_id){ $now=$row5[3]-1; if($db->query("UPDATE book SET now = '$now' WHERE id = '$book_id'")){ echo "<br>Tacking Back - DONE"; }}
							}

}
?>
<?php
$db=new mysqli("$dbhost","$dbuser","$dbpass");
$db->select_db("$dbname");
$query1="select * from issue";
$result1=$db->query($query1);
//find number of rows
$num_rows=$result1->num_rows;
$date=date('d'."/" .'m' ."/" .'Y');
?><br>
<h2>All Issue Book List</h2>
<table border="1">
<tr>
	<td>Student-ID</td>
	<td>Book-ID</td>
	<td>Issue-Date</td>
	<td>Day</td>
	<td>Take_Book</td>
</tr>
<?php
$query="select * from issue";
$result=$db->query($query);
for($i=0;$i<$num_rows;$i++)
{
    //fetch  row
    $row=$result->fetch_row();
	if($row[3]==0){
	$diff=abs($date - $row[2]);
	echo "<tr>";
	echo "<td><a href=\"student.php?s_id=$row[0]\" target=\"_blank\">$row[0]</a></td>";
	echo "<td>$row[1]</td>";
	echo "<td>$row[2]</td>";
	if($diff>=7){echo "<td><font color=\"red\">outdated</font></td>" ; }
	else {echo "<td>$diff</td>" ;}
	echo "<td><a href=\"?back=1&sid=$row[0]&bid=$row[1]\">Back</a></td>";
	echo "</tr>";
	
	}
	
}
echo "</table></br>";
	
?>
<?php include '../footer.php'; ?>
</center>