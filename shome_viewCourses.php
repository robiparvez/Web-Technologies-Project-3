<?php

require_once("connect.php");
checkLoginWithType(2);
	
	

?>
<html>
	<body>
		<h3>View Course Details</h3>
		<table border=1 cellspacing=0 >
			<tr>
				<td>Course Id</td>
				<td>Name</td>
				<td>Teacher Name</td>
				<td>Email</td>
				<td>Phone</td>
				
				
			</tr>
			<?php
				$query=mysql_query("SELECT course_id FROM student_has_course WHERE student_id='".$_SESSION['user_id']."'");
				while($data=mysql_fetch_array($query)){
					$subQuery=mysql_query("SELECT * FROM user_teaches_course WHERE course_id='".$data[0]."' LIMIT 1");
					$subData=mysql_fetch_array($subQuery);
					$teacherId=$subData[0];
					$subQuery=mysql_query("SELECT * FROM user WHERE id='".$teacherId."' LIMIT 1");
					$subData=mysql_fetch_array($subQuery, MYSQL_BOTH);
				?>
				<tr>
					<td><?=$data[0]?></td>
					<td><?=getCourseName2($data[0])?></td>
					<td><?=$subData['name']?></td>
					<td><?=$subData['email']?></td>
					<td><?=$subData['phone']?></td>
				</tr>
				<?php
				}
			?>
		</table>
	
		<a href="home.php">Home</a><br/>
	</body>
</html>