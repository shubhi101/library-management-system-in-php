<?php include '../config.php'; ?>
<?php include 'a_header.php'; ?>


<?php
$db=new mysqli("$dbhost","$dbuser","$dbpass");
$db->select_db("$dbname");
$query="select * from book";
$result=$db->query($query);
//find number of rows
$num_rows=$result->num_rows;


?>


<center>
<center>
<br>
<table border="1">
<tr>
<td>Book ID</td>
<td>Book Name</td>
<td>Arthur</td>
<td>Quantity</td>
<td>Stoke</td>
<td>Issue</td>
</tr>



<?php
$total=0;
$tstoke=0;
$tout=0;
for($i=0;$i<$num_rows;$i++)
{
    //fetch  row
    $row=$result->fetch_row();
	$total=$total+$row[2];
	echo "<tr>";
    echo "<td width=\"60\">$row[0]</td>" ; 
	echo "<td width=\"200\">$row[4]</td>" ;
	echo "<td width=\"200\">$row[1]</td>" ;
	echo "<td width=\"30\">$row[2]</td>" ;
	$stoke=$row[2]-$row[3];
	$tstoke=$tstoke+$stoke;
	$tout=$total-$tstoke;
	echo "<td width=\"30\">$stoke</td>" ;
	if($stoke!=0){
	echo "<td width=\"30\"><a href=\"issue.php?id=$row[0]\">Issue</a></td>";}
	else{
	echo "<td width=\"30\">Stoke Out</td>";
	}
	echo "</tr>";
}	
echo "</table>";	
?>
</center><br>
<center>Now We Have : <?php echo $num_rows; ?> Defferent Books >> Total <?php echo $total; ?> Books And Total Stoke : <?php echo $tstoke; ?> >> Total Out : <?php echo $tout; ?></center>
</br>
</div>
<?php include '../footer.php'; ?>
</center>