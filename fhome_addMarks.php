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
		<h3>Add Marks</h3>
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
				</tr>
				<?php
					$query=mysql_query("SELECT * FROM student_has_course WHERE course_id='".getCourseId()."'");
					while($data=mysql_fetch_array($query, MYSQL_BOTH)){
				?>
					<tr>
						<td><?=$data['student_id']?></td>
						<td><?=getUserName($data['student_id'])?></td>
						<td><input type=text name=mark[] value=<?=$data[2]?> /></td>
						<td><input type=text name=mark[] value=<?=$data[3]?> /></td>
						<td><input type=text name=mark[] value=<?=$data[4]?> /></td>
						<td><input type=text name=mark[] value=<?=$data[5]?> /></td>
						<td><input type=text name=mark[] value=<?=$data[6]?> /></td>
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