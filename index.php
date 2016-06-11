<?php

	require_once("connect.php");
	
	isLoggedInGotoHome();
	
	if(isset($_POST['login'])){
		$id=$_POST['id'];
		$password=$_POST['password'];
		
		login($id,$password);
		
	}
	
?>
<html>
	<head>
	</head>
	
	<body>
		<h3>Welcome to Varsity Management System</h3>
		
		<p><font color=red><?=isset($_GET['error'])?"Incorrect Username or Password":""?></font></p>
		<form method=post >
			<table>
				<tr>
					<td>Id</td>
					<td><input type=text name=id /></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type=password name=password /></td>
				</tr>
				<tr>	
					<td></td>
					<td><input type=submit name=login value=Login /></td>
				</td>
			</table>
		</form>
		
	</body>
</html>