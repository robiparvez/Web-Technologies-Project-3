<?php

require_once("connect.php");
checkLoginWithType(2);

	$errorMessage="";
	$successMessage="";
	
	if(isset($_POST['submit'])){
		if($_POST['name']==""){
			$errorMessage="Enter name";
		}else{
			mysql_query("UPDATE user SET name='".$_POST['name']."',address='".$_POST['address']."',email='".$_POST['email']."',phone='".$_POST['phone']."' WHERE id='".$_SESSION['user_id']."' LIMIT 1");
			$successMessage="Success";
		}
	}
	
	
	
	$query=mysql_query("SELECT * FROM user WHERE id='".$_SESSION['user_id']."' LIMIT 1");
	$data=mysql_fetch_array($query, MYSQL_BOTH);
	$id=$data['id'];
	$name=$data['name'];
	$address=$data['address'];
	$email=$data['email'];
	$phone=$data['phone'];

?>
<html>
	<body>
		<h3>Edit Info</h3>
		<p><font color=red><?=$errorMessage?></font></p>
		<p><font color=green><?=$successMessage?></font></p>
		<form method=post ><table border=1 cellspacing=0 >
			<tr>
				<td>Id</td>
				<td><?=$id?></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type=text name=name value=<?=$name?> /></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><input type=text name=address value="<?=$address?>" /></td>
			</tr>
			<tr>
				<td>Phone</td>
				<td><input type=text name=phone value="<?=$email?>" /></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type=text name=email value="<?=$phone?>" /></td>
			</tr>
		</table>
		<input type=submit name=submit value=Update /></form>
	
		<a href="home.php">Home</a><br/>
	</body>
</html>