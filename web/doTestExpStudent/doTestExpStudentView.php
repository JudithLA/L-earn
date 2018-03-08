<?php
	require __DIR__."/../Commons/Commons.php";

	class DoTestExpStudentView{

		public function __construct(){}
		public function __destruct(){}

		public function genTestExp() {
			$resultHTML = "
				<!DOCTYPE html>
					<html>
					<head>
						<meta charset='utf-8'>
						<title>L-EARN | Test de entrenamiento</title>
						<link rel='stylesheet' type='text/css' href='style/styleStudent.css'>
						<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
						<script src='js/functionsDoTestExpStudent.js'></script>
					</head>
					<body>
						" . Commons::headerStudent() . "
						<div class='content'>
							<div id='breadcrumb'></div>
							<div id='test'>
								<div id='steps' class='steps'>
									<span id='step-0'>Inicio</span>
									<span id='step-1'>1</span>
									<span id='step-2'>2</span>
									<span id='step-3'>3</span>
									<span id='step-4'>4</span>
									<span id='step-5'>5</span>
									<span id='step-6'>6</span>
									<span id='step-7'>7</span>
									<span id='step-8'>8</span>
									<span id='step-9'>9</span>
									<span id='step-10'>10</span>
								</div>
								<div id='test-do' class='test-do'></div>
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
