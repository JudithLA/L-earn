<?php
	require_once __DIR__ . "/../ConnectSupport/Implementation/MysqlDBImplementation.php";

	class TestStudentModel{

		private $mysqli;

		public function __construct(){
			$this->mysqli = new MysqlDBImplementation("127.0.0.1", "8889", "DBLEARN", "root", "learn");
		}

		public function __destruct(){}


		public function testUnitEntre($IdUnit){
			// $_SESSION['id'] = 1;
			$consult = "SELECT ASIGN.NOMBRE_ASIGN AS NombreAsign, TEMAS.NOMBRE_TEMAS AS NombreTema, ENTRE.NOMBRE_ENTRE AS NombreEntre
						FROM ASIGN
						INNER JOIN TEMAS ON ASIGN.ID_ASIGN = TEMAS.ID_ASIGN
						INNER JOIN ENTRE ON TEMAS.ID_TEMAS = ENTRE.ID_TEMAS
						WHERE TEMAS.ID_TEMAS = {$IdUnit}";
			$result = $this->mysqli -> executeQuery($consult);
			return $result;
		}

		public function testUnitFinal($IdUnit){
			$consult = "SELECT ASIGN.NOMBRE_ASIGN AS NombreAsign, TEMAS.NOMBRE_TEMAS AS NombreTema, FINAL.NOMBRE_FINAL AS NombreFinal
						FROM ASIGN
						INNER JOIN TEMAS ON ASIGN.ID_ASIGN = TEMAS.ID_ASIGN
						INNER JOIN FINAL ON TEMAS.ID_TEMAS = FINAL.ID_TEMAS
						WHERE TEMAS.ID_TEMAS = {$IdUnit}";
			$result = $this->mysqli -> executeQuery($consult);
			return $result;
		}
// nombre asignatura, titulo tema (2x), titulo todos los test del tema, si es entrenamiento o final, si está aprobado/suspenso/sin hacer

	}
// $m = new TestStudentModel();
// $result = $m->testUnitFinal(1);
// print_r($result);
 ?>
