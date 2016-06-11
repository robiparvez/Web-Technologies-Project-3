<?php

require_once("connect.php");
checkLoginWithType(0);

?>
<html>
	<body>
		<h3>Admin Home</h3>
		
		<a href="ahome_addTeacher.php">Add Teacher</a><br/>
		<a href="ahome_addStudent.php">Add Student</a><br/>
		<a href="logout.php">Logout</a><br/>
	</body>
</html>