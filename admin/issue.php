
<?php include '../config.php'; ?>
<?php include 'a_header.php'; ?>
<?php
if(isset($_GET['id'])){
$b_id=$_GET['id'];
}

if(isset($_GET['submit'])){
$b_id=$_GET['b_id'];
$s_id=$_GET['s_id'];
echo "Book ID: $b_id || Student ID: $s_id || ";
$date=date('d'."/" .'m' ."/" .'Y');
//cheek for Student
$db=new mysqli("$dbhost","$dbuser","$dbpass");
		$db->select_db("$dbname");																		
		//ready to insert data
		$val=0;
		$query="select * from student";
		$result=$db->query($query);
		$num_rows=$result->num_rows;
		for($i=0;$i<$num_rows;$i++){ 
									$row=$result->fetch_row(); 
									 
									if ($s_id==$row[0]) {echo " Student Name:$row[1]"; goto issue; }
									
								   }
								   echo " Student Don't Exist";  Exit();
								   

//Issue Book
issue:
$db=new mysqli("$dbhost","$dbuser","$dbpass");
		$db->select_db("$dbname");																		
		//ready to insert data
		$val=0;
		$query="select * from issue";
		$result=$db->query($query);
		$num_rows=$result->num_rows;
		for($i=0;$i<$num_rows;$i++){
									$row=$result->fetch_row();
									if($row[0]==$s_id && $row[1]==$b_id && $row[3]==0){echo "<br><font color=\"red\">This Student Allrady Have This Book </font>"; exit(); }	
									}
									
										if($db->query("insert into issue (s_id,b_id,date,val) values ('$s_id', '$b_id', '$date', '$val')")){echo "><font color=\"green\"><br>Added Into Issue BookList</font>";}
										
		
//update Book List
$query="select * from book";
$result=$db->query($query);
//find number of rows
$num_rows=$result->num_rows;
for($i=0;$i<$num_rows;$i++)
							{
							$row=$result->fetch_row();
							if($b_id==$row[0]){
							                   echo "<br>Book ID: $row[0] <br> Book Name: $row[4]<br>Aurther: $row[1]";
											   $update=$row[3]+1;
											   $query="select * from book";
											   if($db->query("UPDATE book SET now = '$update' WHERE id = '$row[0]'")){ echo "<br>Book List Updated"; }
											   }
							}	
		
exit;
}
?>

<center>
<form type="get" action="<?php $_PHP_SELF ?>">
<table border="0">
<tr>
	<td><input type="hidden" name="b_id" value="<?php echo $b_id; ?>"></td>
	<td><input type="text" name="s_id" value="" required>(Student ID)</td>
	<td><input type="submit" name="submit" value="Issue"></td>
</tr>
</table>
</form>
</center>

<?php include '../footer.php'; ?>