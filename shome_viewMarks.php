<?php

require_once("connect.php");
checkLoginWithType(2);
	
	

?>
<html>
	<body>
		<h3>View Marks</h3>
		<table border=1 cellspacing=0 >
			<tr>
				<td>Course Id</td>
				<td>Name</td>
				<td>Quiz 1 (20)</td>
				<td>Quiz 2 (20)</td>
				<td>Quiz 3 (20)</td>
				<td>Improvement Quiz (20)</td>
				<td>Term (40)</td>
				<td>Attendance (20)</td>
				<td>Total (100)</td>
			</tr>
			<?php
				$query=mysql_query("SELECT * FROM student_has_course WHERE student_id='".$_SESSION['user_id']."'");
				while($data=mysql_fetch_array($query)){
					$subQuery=mysql_query("SELECT * FROM class WHERE course_id='".$data[1]."' ORDER BY date ASC");
					$totalClass=mysql_num_rows($subQuery);
					$attendedClass=0;
					while($subData=mysql_fetch_array($subQuery, MYSQL_BOTH)){
						if(mysql_num_rows(mysql_query("SELECT * FROM student_attended_class WHERE class_id='".$subData['id']."' AND student_id='".$_SESSION['user_id']."' AND attendance='1' LIMIT 1"))==1){
							$attendedClass++;
						}
					}
					$attendanceMark=(($attendedClass*1.0)/$totalClass)*20;
				?>
				<tr>
					<td><?=$data[1]?></td>
					<td><?=getCourseName2($data[1])?></td>
					<td><?=$data[2]?></td>
					<td><?=$data[3]?></td>
					<td><?=$data[4]?></td>
					<td><?=$data[5]?></td>
					<td><?=$data[6]?></td>
					<td><?=$attendanceMark?></td>
					<td><?=best2QuizMark($data[2],$data[3],$data[4],$data[5])+$data[6]+$attendanceMark?></td>
				</tr>
				<?php
				}
			?>
		</table>
	
		<a href="home.php">Home</a><br/>
	</body>
</html>