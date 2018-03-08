<?php
	require_once __DIR__ . "/../ConnectSupport/Implementation/MysqlDBImplementation.php";

	class AsignStudentModel{

		private $mysqli;

		public function __construct(){
			$this->mysqli = new MysqlDBImplementation("127.0.0.1", "8889", "DBLEARN", "root", "learn");
		}
		public function __destruct(){}


		public function asignStudent(){
			$_SESSION['id'] = 1;
			$consult = "SELECT TEMAS.ICON_TEMAS AS ImgTema, ASIGN.NOMBRE_ASIGN AS NombreAsign, ASIGN.ID_ASIGN AS IdAsign FROM ASIGN
						INNER JOIN TEMAS ON ASIGN.ID_ASIGN = TEMAS.ID_ASIGN
						INNER JOIN REL_CURSO_ASIGN ON ASIGN.ID_ASIGN = REL_CURSO_ASIGN.ID_ASIGN
						INNER JOIN CURSO ON REL_CURSO_ASIGN.ID_CURSO = CURSO.ID_CURSO
						INNER JOIN ALUMN ON CURSO.ID_CURSO = ALUMN.ID_CURSO
						WHERE ALUMN.ID_ALUMN = '{$_SESSION["id"]}' GROUP BY ASIGN.ID_ASIGN ORDER BY NombreAsign ASC";
			$result = $this->mysqli -> executeQuery($consult);
			return $result;
		}

	}
 ?>
