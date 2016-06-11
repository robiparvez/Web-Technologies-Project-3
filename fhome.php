<?php

require_once("connect.php");
checkLoginWithType(1);

?>
<html>
	<body>
		<h3>Teacher Home</h3>
		
		
		<h5>Course: <?=getCourseName()?></h5>
		
		<a href="fhome_addStudentToCourse.php">Add Student To Course</a><br/>
		<a href="fhome_addMarks.php">Add Marks</a><br/>
		<a href="fhome_giveAttendance.php">Give Attendance</a><br/>
		<a href="fhome_viewStudentDetails.php">View Student Details</a><br/>
		<a href="fhome_viewTotalMarks.php">View Total Marks</a><br/>
		<a href="fhome_changePassword.php">Change Password</a><br/>
		
		<br/>
		<br/>
		
		<a href="logout.php">Logout</a><br/>
	</body>
</html>