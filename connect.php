<?php

mysql_connect("localhost","root","");
mysql_select_db("wfc");
session_start();

function login($id,$password){
	$query=mysql_query("SELECT * FROM user WHERE id='$id' AND password='$password' LIMIT 1");
	if(mysql_num_rows($query)==1){
		$data=mysql_fetch_array($query);
		$_SESSION['user_id']=$data[0];
		$_SESSION['user_name']=$data[1];
		$_SESSION['user_type']=$data[3];
		header("Location: home.php");
		return;
	}
	header("Location: index.php?error");
}
function isLoggedIn(){
	if(isset($_SESSION['user_id'])) return true;
	else return false;
}
function isLoggedInGotoHome(){
	if(isLoggedIn()) header("Location: home.php");;
	
}
function checkLogin(){
	if(!isset($_SESSION['user_id'])){
		header("Location: login.php");
	}
}
function checkLoginWithType($type){
	if(!isset($_SESSION['user_id']) || $_SESSION['user_type']!=$type){
		header("Location: login.php");
	}
}
function logout(){
	unset($_SESSION['user_id']);
	session_destroy();
	header("Location: index.php");
}
function getCourseId(){
	$query=mysql_query("SELECT * FROM user_teaches_course WHERE user_id='".$_SESSION['user_id']."' LIMIT 1");
	$data=mysql_fetch_assoc($query);
	$courseId=$data['course_id'];
	return $courseId;
}
function getCourseName(){
	$query=mysql_query("SELECT * FROM course WHERE id='".getCourseId()."' LIMIT 1");
	$data=mysql_fetch_assoc($query);
	$courseName=$data['name'];
	return $courseName;
}
function getCourseName2($id){
	$query=mysql_query("SELECT * FROM course WHERE id='".$id."' LIMIT 1");
	$data=mysql_fetch_assoc($query);
	$courseName=$data['name'];
	return $courseName;
}
function getUserName($id){
	$query=mysql_query("SELECT * FROM user WHERE id='".$id."' LIMIT 1");
	$data=mysql_fetch_assoc($query);
	return $data['name'];
}
function getUserAddress($id){
	$query=mysql_query("SELECT * FROM user WHERE id='".$id."' LIMIT 1");
	$data=mysql_fetch_assoc($query);
	return $data['address'];
}
function getUserPhone($id){
	$query=mysql_query("SELECT * FROM user WHERE id='".$id."' LIMIT 1");
	$data=mysql_fetch_assoc($query);
	return $data['phone'];
}
function getUserEmail($id){
	$query=mysql_query("SELECT * FROM user WHERE id='".$id."' LIMIT 1");
	$data=mysql_fetch_assoc($query);
	return $data['email'];
}
function best2QuizMark($q1,$q2,$q3,$q4){
	$list=array($q1,$q2,$q3,$q4);
	for($i=1;$i<4;$i++){
		for($j=0;$j<4-$i;$j++){
			if($list[$j]>$list[$j+1]){
				$temp=$list[$j];
				$list[$j]=$list[$j+1];
				$list[$j+1]=$temp;
			}
		}
	}
	return $list[3]+$list[2];
}

?>