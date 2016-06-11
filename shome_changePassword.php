<?php

require_once("connect.php");
checkLoginWithType(2);
	
	$errorMessage="";
	$successMessage="";
	if(isset($_POST['submit'])){
		$query=mysql_query("SELECT * FROM user WHERE id='".$_SESSION['user_id']."' AND password='".$_POST['oldpassword']."' LIMIT 1");
		if(mysql_num_rows($query)!=1){
			$errorMessage="Old password does not match";
		}else{
			mysql_query("UPDATE user SET password='".$_POST['newpassword']."' WHERE id='".$_SESSION['user_id']."' LIMIT 1");
			$successMessage="Success";
		}
	}
	

?>
<html>
	<body>
		<h3>Change Password</h3>
		<p><font color=red><?=$errorMessage?></font></p>
		<p><font color=green><?=$successMessage?></font></p>
		<form method=post >
			<table border=1 cellspacing=0 >
				<tr>
					<td>Old Password</td>
					<td><input type=password name=oldpassword /></td>
				</tr>
				<tr>
					<td>New Password</td>
					<td><input type=password name=newpassword /></td>
				</tr>
			</table>
			<br/>
			
			<input type=submit name=submit value=Submit />
		</form>
	
		<a href="home.php">Home</a><br/>
	</body>
</html>