<?php
	// Clase de la Vista
	require __DIR__."/../Commons/Commons.php";

	class TestStudentView{

		public function __construct(){}
		public function __destruct(){}

		public function genTestUnit() {
			$resultHTML = "
				<!DOCTYPE html>
					<html>
					<head>
						<meta charset='utf-8'>
						<title>L-EARN | Test del tema</title>
						<link rel='stylesheet' type='text/css' href='style/styleStudent.css'>
						<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
						<script src='js/functionsTestStudent.js'></script>
					</head>
					<body>
						" . Commons::headerStudent() . "
						<div class='content'>
							<div id='breadcrumb'></div>
							<h2 id='title'></h2>
							<div id='reticule'></div>
						</div>
						" . Commons::footer() . "
					</body>
					</html>
			";
			return $resultHTML;
		}

	}

?>
