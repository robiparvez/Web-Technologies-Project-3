<?php

require_once("connect.php");
checkLoginWithType(1);
	
	if(isset($_POST['submit'])){
		
		$query=mysql_query("SELECT * FROM student_has_course WHERE course_id='".getCourseId()."'");
		$count=0;
		while($data=mysql_fetch_array($query, MYSQL_BOTH)){
			$studentId=$data['student_id'];
			$courseId=$data['course_id'];
			mysql_query("UPDATE student_has_course SET 
				quiz1='".$_POST['mark'][$count]."', 
				quiz2='".$_POST['mark'][$count+1]."', 
				quiz3='".$_POST['mark'][$count+2]."', 
				improvementQuiz='".$_POST['mark'][$count+3]."', 
				term='".$_POST['mark'][$count+4]."' 
			WHERE student_id='$studentId' AND course_id='$courseId' LIMIT 1");
			$count+=5;
		}
	}

?>
<html>
	<body>
		<h3>View Total Marks</h3>
		<form method=post >
			<table border=1 cellspacing=0 >
				<tr>
					<td>ID</td>
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
					$query=mysql_query("SELECT * FROM student_has_course WHERE course_id='".getCourseId()."'");
					while($data=mysql_fetch_array($query, MYSQL_BOTH)){
						$subQuery=mysql_query("SELECT * FROM class WHERE course_id='".getCourseId()."' ORDER BY date ASC");
						$totalClass=mysql_num_rows($subQuery);
						$attendedClass=0;
						while($subData=mysql_fetch_array($subQuery, MYSQL_BOTH)){
							if(mysql_num_rows(mysql_query("SELECT * FROM student_attended_class WHERE class_id='".$subData['id']."' AND student_id='".$data['student_id']."' AND attendance='1' LIMIT 1"))==1){
								$attendedClass++;
							}
						}
						$attendanceMark=(($attendedClass*1.0)/$totalClass)*20;
						
				?>
					<tr>
						<td><?=$data['student_id']?></td>
						<td><?=getUserName($data['student_id'])?></td>
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
			<br/>
			
			<input type=submit name=submit value=Submit />
		</form>
	
		<a href="home.php">Home</a><br/>
	</body>
</html>