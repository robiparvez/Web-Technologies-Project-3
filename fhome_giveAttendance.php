<?php

require_once("connect.php");
checkLoginWithType(1);
	
	if(isset($_POST['addClass'])){
		if($_POST['date']!="" && $_POST['date']!="0000-00-00"){
			mysql_query("INSERT INTO class VALUES('','".getCourseId()."','".$_POST['date']."')");
		}
	}
	if(isset($_POST['deleteClass'])){
		mysql_query("DELETE FROM class WHERE course_id='".getCourseId()."' AND date='".$_POST['date']."' LIMIT 1");
	}
	
	if(isset($_POST['submit'])){
		$query=mysql_query("SELECT * FROM student_has_course WHERE course_id='".getCourseId()."'");
		while($data=mysql_fetch_array($query, MYSQL_BOTH)){
			$subQuery=mysql_query("SELECT * FROM class WHERE course_id='".getCourseId()."' ORDER BY date ASC");
			while($subData=mysql_fetch_array($subQuery, MYSQL_BOTH)){
				if(isset($_POST[$data['student_id']."checkboxattendance".$subData['id']])){
					mysql_query("UPDATE student_attended_class SET attendance='1' WHERE student_id='".$data['student_id']."' AND class_id='".$subData['id']."' LIMIT 1");
				}else{
					mysql_query("UPDATE student_attended_class SET attendance='0' WHERE student_id='".$data['student_id']."' AND class_id='".$subData['id']."' LIMIT 1");
				}
			}
		}
	}

?>
<html>
	<body>
		<h3>Give Attendance</h3>
		<form method=post >
			Add class<br/>
			Date: <input type=date name=date />
			<input type=submit name=addClass value="Add Class" />
		</form>
		<form method=post >
			Delete class<br/>
			Date: <input type=date name=date />
			<input type=submit name=deleteClass value="Delete Class" />
		</form>
		
		<form method=post >
			<table border=1 cellspacing=0 >
				<tr>
					<td>ID</td>
					<td>Name</td>
					<?php
						$query=mysql_query("SELECT * FROM class WHERE course_id='".getCourseId()."' ORDER BY date ASC");
						while($data=mysql_fetch_array($query, MYSQL_BOTH)){
					?>
						<td><?=$data['date']?></td>
					<?php
						}
					?>
				</tr>
				<?php
					$query=mysql_query("SELECT * FROM student_has_course WHERE course_id='".getCourseId()."'");
					while($data=mysql_fetch_array($query, MYSQL_BOTH)){
						$subQuery=mysql_query("SELECT * FROM class WHERE course_id='".getCourseId()."' ORDER BY date ASC");
					?>
					<tr>
						<td><?=$data['student_id']?></td>
						<td><?=getUserName($data['student_id'])?></td>
					<?php
						while($subData=mysql_fetch_array($subQuery, MYSQL_BOTH)){
							$subSubQuery=mysql_query("SELECT * FROM student_attended_class WHERE student_id='".$data['student_id']."' AND class_id='".$subData['id']."' LIMIT 1");
							$checked=false;
							if(mysql_num_rows($subSubQuery)==0){
								mysql_query("INSERT INTO student_attended_class VALUES('".$data['student_id']."','".$subData['id']."','0')");
							}else{
								$subSubData=mysql_fetch_array($subSubQuery);
								if($subSubData[2]==1) $checked=true;
							}
					?>
						<td align=center >
							<input type=checkbox name=<?=$data['student_id']."checkboxattendance".$subData['id']?> <?=$checked?"checked":""?> value="1"/>
						</td>
					<?php
						}
					?>
					<tr>
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