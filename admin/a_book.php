<?php include '../config.php'; ?>
<?php include 'a_header.php'; ?>
<?php
if(isset($_POST['submit'])){
$b_name=$_POST['name'];
$a_name=$_POST['aurther'];
$qun=$_POST['qun'];
$now="0";
$db=new mysqli("$dbhost","$dbuser","$dbpass");
		$db->select_db("$dbname");																		
		//ready to insert data
		if($db->query("insert into book (aurther,quantity,now,name) values ('$a_name', '$qun', '$now', '$b_name')")){
		echo "added";}
		else { echo "failed"; }
}
?>

<form action="<?php $_PHP_SELF ?>" method="POST">
<center>
<br>
<table border="1">

<tr><td>Book Name</td><td><input type="text" name="name" value="" required></td></tr>
<tr><td>Aurther</td><td><input type="text" name="aurther" value="" required></td></tr>
<tr><td>Quantity</td><td><input type="text" name="qun" value="" required></td></tr>
<tr><td></td><td><input type="submit" name="submit" value="ADD"/></td></tr>
</table><br>
</form>

<?php include '../footer.php'; ?>
</center>
