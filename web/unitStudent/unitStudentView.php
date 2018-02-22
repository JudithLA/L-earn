<?php
	// Clase de la Vista
	require __DIR__."/../Commons/Commons.php";

	class UnitStudentView{

		public function __construct(){}
		public function __destruct(){}

		public function unitsAsignStu($resultQueryUnits){
			$unitsAsign = "
							<h2>" . $element['NombreAsign'] . "</h2>
							<div id='reticule'>
							";
			foreach ($resultQueryUnits as $element){
				$unitsAsign .="
								<a href='../testStudent/testStudent.php?action=getTestUnit&UnitId=" . $element['IdTema'] . "' class='unit'>
									<img src=" . $element['ImgTema'] . " alt='Imagen del tema " . $element['NombreTema'] . "'>
									<div class=''>" . $element['NombreTema'] . "</div>
								</a>
							";
			}
			$unitsAsign .="</div>";

			return $unitsAsign;
		}


		public function genUnitsStudent($resultQueryUnits, $resultQueryQuarter) {
			// var_dump($resultQueryQuarter);
			// echo $resultQueryQuarter["LAST_QUARTER"];

			// $lastQuarter = $resultQueryQuarter["LAST_QUARTER"];
			// echo $lastQuarter;
			//
			// $currentQuarter = 0;
			// if ($currentQuarter <=$lastQuarter) {
			// 	// $dom = new DOMDocument;
			// 	$thisQuarter = getElementsByTagName("a");
			// 	$thisQuarter->setAttribute('class', 'currentQuarter');
			// 	echo $thisQuarter;
			// }
			// else{
			// 	$nextQuarter = getElementsByTagName("a");
			// 	$nextQuarter->setAttribute('class', 'disabledQuarter');
			// 	echo $nextQuarter;
			// }

			$resultHTML = "
				<!DOCTYPE html>
					<html>
					<head>
						<meta charset='utf-8'>
						<title>Temas de las asignaturas del alumno</title>
						<link rel='stylesheet' type='text/css' href='style/styleStudent.css'>
						<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
						<script src='js/functionsUnitStudent.js'></script>
					</head>
					<body>
						" . Commons::headerStudent() . "
						<div class='content'>
							<div class='l col9'>
								<div>
									" . $this->unitsAsignStu($resultQueryUnits) . "
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
