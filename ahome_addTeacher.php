<?php

require_once("connect.php");
checkLoginWithType(0);

	$name="";
	$id="";
	$errorMessage="";
	$successMessage="";
	$courseName="";
	
	if(isset($_POST['addTeacher'])){
		$name=$_POST['name'];
		$id=$_POST['id'];
		$password=$_POST['password'];
		$courseName=$_POST['courseName'];
		$address=$_POST['address'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$type=1;
		
		if($name=="") $errorMessage="Insert name";
		if($id=="") $errorMessage="Insert id";
		
		if($errorMessage==""){
			$query=mysql_query("SELECT * FROM user WHERE id='$id' LIMIT 1");
			if(mysql_num_rows($query)==1){
				$errorMessage="Id Exists";
			}else{
				mysql_query("INSERT INTO user (id,name,password,type,address,phone,email) VALUES('$id','$name','$password','$type','$address','$phone','$email')");
				mysql_query("INSERT INTO course VALUES('','$courseName')");
				$courseId=mysql_insert_id();
				mysql_query("INSERT INTO user_teaches_course VALUES('$id','$courseId')");
				$successMessage="Success";
			}
		}
	}

?>
<html>
	<body>
		<h3>Add Teacher</h3>
		<p><font color=red><?=$errorMessage?></font></p>
		<p><font color=green><?=$successMessage?></font></p>
		<form method=post >
			<table>
				<tr>
					<td>Name</td>
					<td><input type=text name=name value="<?=$name?>"/></td>
				</tr>
				<tr>
					<td>Id</td>
					<td><input type=text name=id value="<?=$id?>"/></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type=password name=password /></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><input type=text name=address /></td>
				</tr>
				<tr>
					<td>Phone</td>
					<td><input type=text name=phone /></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type=text name=email /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td> </td>
				</tr>
				<tr>
					<td>Course Name: </td>
					<td><input type=text name=courseName /></td>
				</tr>
				<tr>	
					<td></td>
					<td><input type=submit name=addTeacher value="Add Teacher" /></td>
				</td>
			</table>
		</form>
	
		<a href="ahome.php">Home</a><br/>
	</body>
</html>