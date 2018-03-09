<?php
	require __DIR__."/../Commons/Commons.php";

	class AsignStudentView{

		public function __construct(){}
		public function __destruct(){}

		public function genAsignStudent() {

			$resultHTML = "
				<!DOCTYPE html>
					<html>
					<head>
						<meta charset='utf-8'>
						<title>L-EARN | Asignaturas del alumno</title>
						<link rel='stylesheet' type='text/css' href='http://localhost:8888/L-earn/web/Commons/styles/commonStyleStudent.css'>
						<link rel='stylesheet' type='text/css' href='http://localhost:8888/L-earn/web/asignStudent/style/styleStudent.css'>
						<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
						<script src='js/functionsAsignStudent.js'></script>
					</head>
					<body>
						" . Commons::headerStudent() . "
						<div class='content'>
							<div>
								<h2>Mis asignaturas</h2>
								<div id='reticule'>

								</div>
							</div>
						</div>
						" . Commons::footer() . "
					</body>
					</html>
			";
			return $resultHTML;
		}

	}

?>
