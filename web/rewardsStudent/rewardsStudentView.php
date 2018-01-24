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
						<link rel='stylesheet' type='text/css' href='style/styleStudent.css'>
						<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
						<script src='js/functionsRewards.js'></script>
					</head>
					<body>
						" . Commons::headerStudent() . "
						<div class='content'>
							<div>
								<h2>Consigue tu premio</h2>
								<div id='rewards'>

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
