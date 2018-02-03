<?php
	require_once __DIR__ . "/../ConnectSupport/Implementation/MysqlDBImplementation.php";

	class TestStudentModel{

		private $mysqli;

		public function __construct(){
			$this->mysqli = new MysqlDBImplementation("127.0.0.1", "8889", "DBLEARN", "root", "learn");
		}

		public function __destruct(){}


		public function asignStudent(){
			$_SESSION['id'] = 1;
			$consult = "SELECT TEMAS.ICON_TEMAS AS ImgTema, ASIGN.NOMBRE_ASIGN AS NombreAsign, ASIGN.ID_ASIGN AS IdAsign FROM ALUMN
						INNER JOIN REL_ALUMN_FINAL ON ALUMN.ID_ALUMN = REL_ALUMN_FINAL.ID_ALUMN
						INNER JOIN FINAL ON REL_ALUMN_FINAL.ID_FINAL = FINAL.ID_FINAL
						INNER JOIN TEMAS ON FINAL.ID_TEMAS = TEMAS.ID_TEMAS
						INNER JOIN ASIGN ON TEMAS.ID_ASIGN = ASIGN.ID_ASIGN
						WHERE ALUMN.ID_ALUMN = '{$_SESSION["id"]}' ORDER BY NombreAsign ASC";
			$result = $this->mysqli -> executeQuery($consult);
			return $result;
		}


	}
// $m = new TestStudentModel();
// $result = $m->asignStudent();
// print_r($result);
 ?>
