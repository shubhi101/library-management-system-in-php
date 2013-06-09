<?php include '../config.php'; ?>
<?php include 'a_header.php'; ?>
<?php
if(isset($_POST['submit'])){
$id=$_POST['id'];
$name=$_POST['name'];
$dept=$_POST['dept'];
$mobile=$_POST['mobile'];
//cheeck is Exist
$db=new mysqli("$dbhost","$dbuser","$dbpass");
		$db->select_db("$dbname");																		
		//ready to insert data
		$val=0;
		$query="select * from student";
		$result=$db->query($query);
		$num_rows=$result->num_rows;
		for($i=0;$i<$num_rows;$i++){ 
									$row=$result->fetch_row(); 
									 
									if ($id==$row[0]) {echo " Student Exist On This ID"; exit();}
								   }

//add
$db=new mysqli("$dbhost","$dbuser","$dbpass");
		$db->select_db("$dbname");																		
		//ready to insert data
		if($db->query("insert into student (id,name,dept,mobile) values ('$id', '$name', '$dept', '$mobile')")){
		echo "<center>added</center>";}
		else { echo "failed"; }
}
?>

<form action="<?php $_PHP_SELF ?>" method="POST">
<center>
<br>
<table border="1">

<tr><td>Student Name</td><td><input type="text" name="name" value="" required></td></tr>
<tr><td>Student ID</td><td><input type="text" name="id" value="" required></td></tr>
<tr><td>Depertment</td><td><input type="text" name="dept" value="" required></td></tr>
<tr><td>Mobile</td><td><input type="text" name="mobile" value="" required></td></tr>
<tr><td></td><td><input type="submit" name="submit" value="ADD"/></td></tr>
</table>
</form>
</br>
<?php include '../footer.php'; ?>
</center>
