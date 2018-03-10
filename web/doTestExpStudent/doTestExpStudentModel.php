<?php
	require_once __DIR__ . "/../ConnectSupport/Implementation/MysqlDBImplementation.php";

	class DoTestExpStudentModel{

		private $mysqli;

		public function __construct(){
			$this->mysqli = new MysqlDBImplementation("127.0.0.1", "8889", "DBLEARN", "root", "learn");
		}
		public function __destruct(){}

		public function expTestName($IdTestExp){
			$consult = "SELECT ASIGN.ID_ASIGN AS IdAsign, ASIGN.NOMBRE_ASIGN AS NombreAsign, TEMAS.ID_ASIGN AS IdTema,
						TEMAS.ORDEN_TEMAS AS OrdenTema, ENTRE.NOMBRE_ENTRE AS NombreEntre, ENTRE.DESCR_ENTRE AS DescripcionEntre FROM ASIGN
						INNER JOIN TEMAS ON ASIGN.ID_ASIGN = TEMAS.ID_ASIGN
						INNER JOIN ENTRE ON TEMAS.ID_TEMAS = ENTRE.ID_TEMAS
						WHERE ENTRE.ID_ENTRE = {$IdTestExp}";
			$result = $this->mysqli -> executeQuery($consult);
			return $result[0];
		}

		public function entreQuestions($IdTestExp){
			$consult = "SELECT PREGU_ENTRE.ID_PREGU_ENTRE AS PreguIdEntre, PREGU_ENTRE.ENUNCIADO_PREGU_ENTRE AS PreguntaEntre FROM ENTRE
						INNER JOIN PREGU_ENTRE ON ENTRE.ID_ENTRE = PREGU_ENTRE.ID_ENTRE
						WHERE ENTRE.ID_ENTRE = {$IdTestExp} ORDER BY PREGU_ENTRE.ID_PREGU_ENTRE ASC";
			$result = $this->mysqli -> executeQuery($consult);
			return $result;
		}

		public function entreResponses($IdTestExp){
			$consult = "SELECT RESPU_ENTRE.ID_RESPU_ENTRE AS RespuIdEntre, RESPU_ENTRE.TEXTO_RESPU_ENTRE AS RespuestaEntre,
						RESPU_ENTRE.PESO_RESPU_ENTRE AS PesoEntre, RESPU_ENTRE.CORRECTA_RESPUE_ENTRE AS CorrectaEntre FROM ENTRE
						INNER JOIN PREGU_ENTRE ON ENTRE.ID_ENTRE = PREGU_ENTRE.ID_ENTRE
						INNER JOIN RESPU_ENTRE ON PREGU_ENTRE.ID_PREGU_ENTRE = RESPU_ENTRE.ID_PREGU_ENTRE
						WHERE ENTRE.ID_ENTRE = {$IdTestExp} ORDER BY PREGU_ENTRE.ID_PREGU_ENTRE ASC";
			$result = $this->mysqli -> executeQuery($consult);
			return $result;
		}

		public function insertResultTestExp($date, $IdTestExp, $expPoints){
			$_SESSION['id'] = 1;

			$consult = "INSERT INTO REL_ALUMN_ENTRE (FECHA_REL_ALUMN_ENTRE, ID_ALUMN, ID_ENTRE) VALUES
						(DATE('{$date}'), '{$_SESSION["id"]}', {$IdTestExp})";
			$result = $this->mysqli -> modifyQuery($consult);

			$consult = "UPDATE ALUMN SET EXPERIENCIA_ALUMN = EXPERIENCIA_ALUMN + {$expPoints} WHERE ID_ALUMN = '{$_SESSION["id"]}'";
			$result = $this->mysqli -> modifyQuery($consult);

			$consult = "SELECT TRUNCATE((ALUMN.EXPERIENCIA_ALUMN*100)/(SELECT COUNT(ENTRE.ID_ENTRE)*4 AS TotalExperience FROM ENTRE
        				INNER JOIN TEMAS ON ENTRE.ID_TEMAS = TEMAS.ID_TEMAS
        				INNER JOIN ASIGN ON TEMAS.ID_ASIGN = ASIGN.ID_ASIGN), 2) AS Percentage
						FROM ALUMN WHERE ALUMN.ID_ALUMN = '{$_SESSION["id"]}'";
			$result = $this->mysqli -> executeQuery($consult);
			$percentage = $result[0]['Percentage'];
			$_SESSION['percentage'] = $percentage;
			return $_SESSION['percentage'];

		}

		public function updateFinalPoints($expPoints){
			$_SESSION['id'] = 1;

			$consult  = "UPDATE ALUMN SET PUNTOS_ALUMN = PUNTOS_ALUMN + {$expPoints} WHERE ID_ALUMN = '{$_SESSION["id"]}'";
			$result = $this->mysqli -> modifyQuery($consult);
			$_SESSION['finPoints'] += $expPoints;

			return $_SESSION['finPoints'];

		}


	}

 ?>
