<?php

require_once("connect.php");
checkLoginWithType(1);
	
	$studentId="";
	$errorMessage="";
	$successMessage="";
	
	if(isset($_POST['submit'])){
		$studentId=$_POST['studentId'];
		
		$errorMessage="";
		
		if($errorMessage==""){
			$query=mysql_query("SELECT * FROM user WHERE id='$studentId' AND type='2' LIMIT 1");
			if(mysql_num_rows($query)!=1){
				$errorMessage="No student exists";
			}else{
				$query=mysql_query("SELECT * FROM student_has_course WHERE student_id='$studentId' AND course_id='".getCourseId()."' LIMIT 1");
				if(mysql_num_rows($query)==1){
					$errorMessage="Student already enlisted";
				}else{
					$totalStudent=mysql_num_rows(mysql_query("SELECT * FROM student_has_course WHERE course_id='".getCourseId()."'"));
					if($totalStudent==40){
						$errorMessage="40 Student Reached";
					}else{
						mysql_query("INSERT INTO student_has_course (student_id,course_id) VALUES('$studentId','".getCourseId()."')");
						$successMessage="Success";
					}
				}
			}
		}
	}

?>
<html>
	<body>
		<h3>Add Student To Course</h3>
		<p><font color=red><?=$errorMessage?></font></p>
		<p><font color=green><?=$successMessage?></font></p>
		<form method=post >
			<table>
				<tr>
					<td>Id</td>
					<td><input type=text name=studentId value="<?=$studentId?>"/></td>
				</tr>
				<tr>	
					<td></td>
					<td><input type=submit name=submit value="Add Student To Course" /></td>
				</td>
			</table>
		</form>
	
		<a href="home.php">Home</a><br/>
	</body>
</html>