<?php
	require_once __DIR__ . "/../ConnectSupport/Implementation/MysqlDBImplementation.php";

	class UnitStudentModel{

		private $mysqli;

		public function __construct(){
			$this->mysqli = new MysqlDBImplementation("127.0.0.1", "8889", "DBLEARN", "root", "learn");
		}

		public function __destruct(){}

		public function titleAsign($IdAsign){
			$_SESSION['id'] = 1;
			$consult = "SELECT ASIGN.NOMBRE_ASIGN AS NombreAsign FROM ASIGN
						INNER JOIN TEMAS ON ASIGN.ID_ASIGN = TEMAS.ID_ASIGN
						LEFT JOIN FINAL ON TEMAS.ID_TEMAS = FINAL.ID_TEMAS
						LEFT JOIN REL_ALUMN_FINAL ON FINAL.ID_FINAL = REL_ALUMN_FINAL.ID_FINAL
						LEFT JOIN ALUMN ON REL_ALUMN_FINAL.ID_ALUMN = ALUMN.ID_ALUMN
						WHERE ASIGN.ID_ASIGN = {$IdAsign}";
			$result = $this->mysqli -> executeQuery($consult);
			return $result[0];
		}


		public function unitsStudent($IdAsign){
			$_SESSION['id'] = 1;
			$consult = "SELECT ASIGN.NOMBRE_ASIGN AS NombreAsign, ASIGN.ID_ASIGN AS IdAsign, TEMAS.ID_TEMAS AS IdTema, TEMAS.ICON_TEMAS AS ImgTema,
						TEMAS.NOMBRE_TEMAS AS NombreTema, TEMAS.TRIMESTRE_TEMAS AS TrimTema, TEMAS.ORDEN_TEMAS AS OrdenTema, FINAL.NOMBRE_FINAL,
						ALUMN.NOMBRE_ALUMN, (IF (REL_ALUMN_FINAL.PUNTOS_REL_ALUMN_FINAL IS NOT NULL,
										    IF((REL_ALUMN_FINAL.PUNTOS_REL_ALUMN_FINAL-20)>=0, 1, 0)
										    , NULL)) AS MitadFin
						FROM ASIGN
						INNER JOIN TEMAS ON ASIGN.ID_ASIGN = TEMAS.ID_ASIGN
						LEFT JOIN FINAL ON TEMAS.ID_TEMAS = FINAL.ID_TEMAS
						LEFT JOIN REL_ALUMN_FINAL ON FINAL.ID_FINAL = REL_ALUMN_FINAL.ID_FINAL
						LEFT JOIN ALUMN ON REL_ALUMN_FINAL.ID_ALUMN = ALUMN.ID_ALUMN
						WHERE ASIGN.ID_ASIGN = {$IdAsign} ORDER BY TEMAS.ORDEN_TEMAS ASC";
			$result = $this->mysqli -> executeQuery($consult);
			return $result;
		}

		public function passedQuarter($IdAsign){
			$_SESSION['id'] = 1;

			$createTempTable = "CREATE TEMPORARY TABLE IF NOT EXISTS DBLEARN.tempPassedQuarter(
							LAST_QUARTER INT,
							HALF_TOTAL_POSSIBLE INT,
							SUM_FIN_POINTS INT,
							POINTS_TO_PASS INT
						)ENGINE=InnoDB DEFAULT CHARSET=utf8";
			$result = $this->mysqli -> otherQuery($createTempTable);

			$insertQuery = "INSERT INTO DBLEARN.tempPassedQuarter (LAST_QUARTER) VALUES(
							(SELECT TEMAS.TRIMESTRE_TEMAS AS LastQuarter FROM REL_ALUMN_FINAL
							INNER JOIN FINAL ON REL_ALUMN_FINAL.ID_FINAL = FINAL.ID_FINAL
							INNER JOIN TEMAS ON FINAL.ID_TEMAS = TEMAS.ID_TEMAS
							INNER JOIN ASIGN ON TEMAS.ID_ASIGN = ASIGN.ID_ASIGN
							WHERE REL_ALUMN_FINAL.ID_ALUMN = 1 AND ASIGN.ID_ASIGN = {$IdAsign} GROUP BY ASIGN.ID_ASIGN))";
			$result = $this->mysqli -> modifyQuery($insertQuery);

			$lastQuarter = "SET @LastQuarter = (SELECT LAST_QUARTER FROM tempPassedQuarter)";
			$result = $this->mysqli -> otherQuery($lastQuarter);

			$insertQuery = "UPDATE DBLEARN.tempPassedQuarter
							SET HALF_TOTAL_POSSIBLE = (SELECT TRUNCATE((((SELECT COUNT(FINAL.ID_FINAL) AS NumeroDeTestFin FROM FINAL
							LEFT JOIN TEMAS ON FINAL.ID_TEMAS = TEMAS.ID_TEMAS
							LEFT JOIN ASIGN ON TEMAS.ID_ASIGN = ASIGN.ID_ASIGN
							WHERE ASIGN.ID_ASIGN = {$IdAsign} AND TEMAS.TRIMESTRE_TEMAS IN (SELECT @LastQuarter))*40)/2), 0)),
							SUM_FIN_POINTS = (SELECT SUM(REL_ALUMN_FINAL.PUNTOS_REL_ALUMN_FINAL) AS SumaPuntosFinTrimAsign FROM ALUMN
							INNER JOIN REL_ALUMN_FINAL ON ALUMN.ID_ALUMN = REL_ALUMN_FINAL.ID_ALUMN
							INNER JOIN FINAL ON REL_ALUMN_FINAL.ID_FINAL = FINAL.ID_FINAL
							INNER JOIN TEMAS ON FINAL.ID_TEMAS = TEMAS.ID_TEMAS
							INNER JOIN ASIGN ON TEMAS.ID_ASIGN = ASIGN.ID_ASIGN
							WHERE ASIGN.ID_ASIGN = {$IdAsign} AND TEMAS.TRIMESTRE_TEMAS IN (SELECT @LastQuarter))
							WHERE HALF_TOTAL_POSSIBLE IS NULL AND SUM_FIN_POINTS IS NULL";
			$result = $this->mysqli -> modifyQuery($insertQuery);

			$halfTotalPossible = "SET @HalfTotalPossible = (SELECT HALF_TOTAL_POSSIBLE FROM tempPassedQuarter)";
			$result = $this->mysqli -> otherQuery($halfTotalPossible);

			$sumFinPoints = "SET @SumFinPoints = (SELECT SUM_FIN_POINTS FROM tempPassedQuarter)";
			$result = $this->mysqli -> otherQuery($sumFinPoints);

			$insertQuery = "UPDATE DBLEARN.tempPassedQuarter
							SET POINTS_TO_PASS = (SELECT (SELECT @HalfTotalPossible)-(SELECT @SumFinPoints) AS PuntosHastaAprobar)";
			$result = $this->mysqli -> modifyQuery($insertQuery);


			$tempTable = "SELECT * FROM tempPassedQuarter";
			$result = $this->mysqli -> executeQuery($tempTable);

			return $result[0];

		}

	}
// $m = new UnitStudentModel();
// $result = $m->passedQuarter(1);
// print_r($result);

 ?>
