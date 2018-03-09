<?php

	require __DIR__."/../Commons/Commons.php";

	class RewardsStudentView{

		public function __construct(){}

		public function __destruct(){}

		public function genRewardsHTML() {

			$resultHTML = "
				<!DOCTYPE html>
					<html>
					<head>
						<meta charset='utf-8'>
						<title>Recompensas</title>
						<link rel='stylesheet' type='text/css' href='http://localhost:8888/L-earn/web/Commons/styles/commonStyleStudent.css'>
						<link rel='stylesheet' type='text/css' href='http://localhost:8888/L-earn/web/rewardsStudent/style/styleStudent.css'>
						<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
						<script src='js/functionsRewards.js'></script>
					</head>
					<body>
						" . Commons::headerStudent() . "
						<div id='content-wrapper' class='content'>
							<h2>Consigue tu premio</h2>
							<div id='reticule'>

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
