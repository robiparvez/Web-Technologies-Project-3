<?php

require_once("connect.php");
checkLoginWithType(1);
	
	

?>
<html>
	<body>
		<h3>View Student Details</h3>
		<form method=post >
			<table border=1 cellspacing=0 >
				<tr>
					<td>ID</td>
					<td>Name</td>
					<td>Address</td>
					<td>Phone</td>
					<td>Email</td>
				</tr>
				<?php
					$query=mysql_query("SELECT * FROM student_has_course WHERE course_id='".getCourseId()."'");
					while($data=mysql_fetch_array($query, MYSQL_BOTH)){
				?>
					<tr>
						<td><?=$data['student_id']?></td>
						<td><?=getUserName($data['student_id'])?></td>
						<td><?=getUserAddress($data['student_id'])?></td>
						<td><?=getUserPhone($data['student_id'])?></td>
						<td><?=getUserEmail($data['student_id'])?></td>
					</tr>
				<?php
					}
				?>
			</table>
			<br/>
			
			<input type=submit name=submit value=Submit />
		</form>
	
		<a href="home.php">Home</a><br/>
	</body>
</html>