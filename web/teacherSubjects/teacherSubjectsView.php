<?php
require_once __DIR__ . "/../Commons/Commons.php";

class TeacherSubjectsView{

	public function __construct(){}
	public function __destruct(){}	

// ---------------------------- FALTA ENLAZAR EL CREAR a las partes de Juju
	//creamos método que devuelva HTML
	public function viewTeacherSubjects(){
		$resultHTML = "
			<!DOCTYPE html>
			<html>
			<head>
			<meta charset='utf-8'>
				<title></title>
				<link rel='stylesheet' type='text/css' href='http://localhost:8888/L-earn/web/Commons/styles/commonStyleTeacher.css'>
				<link rel='stylesheet' type='text/css' href='style/style.css'>
				<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
				<script src='js/teacherSubjectsFunctions.js'></script>
			</head>
			<body>
			".Commons::teacherHeader()."

			<div class='main teacherSubjects'>
				<div id='teacherSubjects-list'>
					<div class='teacherSubjects-list-crear'><a href=''>AÑADIR NUEVA ASIGNATURA</a></div>	
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