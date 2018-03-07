<?php
require_once __DIR__ . "/../Commons/Commons.php";

class TeacherTestsView{

	public function __construct(){}
	public function __destruct(){}	

	public function viewTeacherTests(){
		$resultHTML = "
			<!DOCTYPE html>
			<html>
			<head>
			<meta charset='utf-8'>
				<title></title>
				<link rel='stylesheet' type='text/css' href='style/styleStudent.css'>
				<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
				<script src='js/teacherSubjectsFunctions.js'></script>
			</head>
			<body>
			".Commons::teacherHeader()."

			<div class='main teacherTests'>
				<div id='teacherTests-list'>
					<div class='teacherTests-list-crear'><a href=''>AÑADIR NUEVA ASIGNATURA</a></div>	
				</div>
			</div>
			".Commons::footer()."

			</body>
			</html>
		";
		return $resultHTML;
	}
}
?>