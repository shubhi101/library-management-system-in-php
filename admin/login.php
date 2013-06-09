<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Admin Login</title>
</head>
<body><center><br><br><br><br><br>
<div style="width:400px;height:300px;-webkit-border-radius: 12px;-moz-border-radius: 12px;border-radius: 12px;background-color:#F5F5F5;
-webkit-box-shadow: #142E2E 5px 5px 5px;-moz-box-shadow: #142E2E 5px 5px 5px; box-shadow: #142E2E 5px 5px 5px;">



<h1>Site Admin</h1><br><br>

	
	
	
	<form action="confirm.php" method="post">
		<h1>Login Page</h1>
		
		<?php
			if(isset($_REQUEST["msg"]))
			{
				$tmp=$_REQUEST["msg"];
				if($tmp==1)
				{
					echo "<font color=\"red\">";
					echo "Wrong Username and/or Password.<br /><br />";
					echo "</font>";
				}
			}
			?>
		
		
		Username: <input type="text" name="a1" id="" /> <br />
		Password: <input type="password" name="a2" id="" /> <br />
		<input type="submit" value="Login" />
	</form>
	
	
</div>	
<br>&copy Saiful Islam
<center>	
</body>
</html>