<?php

require_once("connect.php");
checkLoginWithType(2);

?>
<html>
	<body>
		<h3>Teacher Home</h3>
		
		
		<h5>Course: <?=getCourseName()?></h5>
		
		<a href="shome_viewCourses.php">View Courses</a><br/>
		<a href="shome_viewMarks.php">View Marks</a><br/>
		<a href="shome_editInfo.php">Edit Info</a><br/>
		<a href="shome_changePassword.php">Change Password</a><br/>
		
		<br/>
		<br/>
		
		<a href="logout.php">Logout</a><br/>
	</body>
</html>