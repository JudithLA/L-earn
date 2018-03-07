<?php
	require_once __DIR__ . "/../ConnectSupport/Implementation/MysqlDBImplementation.php";

	class DoTestFinStudentModel{

		private $mysqli;

		public function __construct(){
			$this->mysqli = new MysqlDBImplementation("127.0.0.1", "8889", "DBLEARN", "root", "learn");
		}
		public function __destruct(){}

		public function finTestName($IdTestFin){
			// $_SESSION['id'] = 1;
			$consult = "SELECT ASIGN.ID_ASIGN AS IdAsign, ASIGN.NOMBRE_ASIGN AS NombreAsign, TEMAS.ID_ASIGN AS IdTema,
						TEMAS.ORDEN_TEMAS AS OrdenTema, FINAL.NOMBRE_FINAL AS NombreFin, FINAL.DESCR_FINAL AS DescripcionFin FROM ASIGN
						INNER JOIN TEMAS ON ASIGN.ID_ASIGN = TEMAS.ID_ASIGN
						INNER JOIN FINAL ON TEMAS.ID_TEMAS = FINAL.ID_TEMAS
						WHERE FINAL.ID_FINAL = {$IdTestFin}";
			$result = $this->mysqli -> executeQuery($consult);
			return $result[0];
		}


		public function finQuestions($IdTestFin){
			// $_SESSION['id'] = 1;
			$consult = "SELECT PREGU_FINAL.ID_PREGU_FINAL AS PreguIdFin, PREGU_FINAL.ENUNCIADO_PREGU_FINAL AS PreguntaFin FROM FINAL
						INNER JOIN PREGU_FINAL ON FINAL.ID_FINAL = PREGU_FINAL.ID_FINAL
						WHERE FINAL.ID_FINAL = {$IdTestFin} ORDER BY PREGU_FINAL.ID_PREGU_FINAL ASC";
			$result = $this->mysqli -> executeQuery($consult);
			return $result;
		}


		public function finResponses($IdTestFin){
			// $_SESSION['id'] = 1;
			$consult = "SELECT RESPU_FINAL.ID_RESPU_FINAL AS RespuIdFin, RESPU_FINAL.TEXTO_RESPU_FINAL AS RespuestaFin,
						RESPU_FINAL.PESO_RESPU_FINAL AS PesoFin, RESPU_FINAL.CORRECTA_RESPUE_FINAL AS CorrectaFin FROM FINAL
						INNER JOIN PREGU_FINAL ON FINAL.ID_FINAL = PREGU_FINAL.ID_FINAL
						INNER JOIN RESPU_FINAL ON PREGU_FINAL.ID_PREGU_FINAL = RESPU_FINAL.ID_PREGU_FINAL
						WHERE FINAL.ID_FINAL = 1 ORDER BY PREGU_FINAL.ID_PREGU_FINAL ASC";
			$result = $this->mysqli -> executeQuery($consult);
			return $result;
		}




	}
// $m = new DoTestFinStudentModel();
// $result = $m->finTestName(1);
// print_r($result);
 ?>
