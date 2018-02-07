<?php
// Solicitamos el archivo de conexión a BBDD
require_once __DIR__ . "/Implementation/MysqlDBImplementation.php";

		//creamos clase
class RegisterTeacherModel{

		//Constructor (crea la clase)
		public function __construct(){}

		//Destructor (Destruye la clase)
		public function __destruct(){}


		public function createTeacher($pickName,$pickEmail,$pickPass){

					$mysqli = new MysqlDBImplementation(/*"localhost", "8889", "DBLEARN", "root", "learn"*/);
					$query = "SELECT COUNT(*) as PROFE_CREATED FROM PROFE WHERE EMAIL_PROFE = '{$pickEmail}' limit 1";
					$result = $mysqli->executeQuery($query);
					// Inicializamos
					$id = 0;


					if($result [0]['PROFE_CREATED'] == 0){
							$consult = "INSERT INTO PROFE (NOMBRE_PROFE, EMAIL_PROFE, CONTRASENA_PROFE) VALUES ('{$pickName}', '{$pickEmail}', '{$pickPass}')";
							$checkQuery = "SELECT ID_PROFE FROM PROFE WHERE EMAIL_PROFE = '{$pickEmail}'";

			        // modifyQuery es para UPDATE, INSERT y DELETE
							$mysqli->modifyQuery($consult);

			        // executeQuery es para SELECT
			        $result = $mysqli->executeQuery($checkQuery);
							$id = $result[0]['ID_PROFE'];
					}
					return $id;
		}


		public function selectCenter(){
					$mysqli = new MysqlDBImplementation(/*"localhost", "8889", "DBLEARN", "root", "learn"*/);
					$query = "SELECT ID_CENTR, NOMBRE_CENTR FROM CENTR";
					$result = $mysqli->executeQuery($query);
					return $result;
		}


		public function updateCenter($idCenter){

					$mysqli = new MysqlDBImplementation(/*"localhost", "8889", "DBLEARN", "root", "learn"*/);
					$query = "UPDATE PROFE SET ID_CENTR = '{$idCenter}' WHERE ID_PROFE = '{$_SESSION['id']}'";
					$result = $mysqli->modifyQuery($query);
					$query = "SELECT DISTINCT NIVEL_CURSO FROM CURSO WHERE ID_CENTR = '{$idCenter}'";

					$result = $mysqli->executeQuery($query);

					return $result;
		}

		public function selectIdCursoModel($curso){
		$mysqli = new MysqlDBImplementation(/*"localhost", "8889", "DBLEARN", "root", "learn"*/);
		$query_insert = "INSERT INTO CURSO (NIVEL_CURSO, GRADO_CURSO, ID_CENTR) VALUES('{$curso}', 'E.S.O', '{$_SESSION['idCenter']}')";
		$result = $mysqli->modifyQuery($query_insert);
		$query = "SELECT MAX(ID_CURSO) as id_curso FROM CURSO WHERE ID_CENTR = '{$_SESSION['idCenter']}' AND NIVEL_CURSO = {$curso}";
		$result = $mysqli->executeQuery($query);

		return $result;
		}

		public function selectLetraModel($curso){
			$mysqli = new MysqlDBImplementation(/*"localhost", "8889", "DBLEARN", "root", "learn"*/);
			$query = "SELECT DISTINCT LETRA_CURSO FROM CURSO WHERE ID_CENTR = '{$_SESSION['idCenter']}' AND NIVEL_CURSO = {$curso}";
			$result = $mysqli->executeQuery($query);

			return $result;
		}

		public function selectAsignModel($curso){
			$mysqli = new MysqlDBImplementation(/*"localhost", "8889", "DBLEARN", "root", "learn"*/);
			$query_insert = "UPDATE CURSO SET LETRA_CURSO = '{$_SESSION['letra_curso']}' WHERE ID_CURSO = '{$_SESSION['id_curso']}' AND ID_CENTR = '{$_SESSION['idCenter']}'";
			$result = $mysqli->modifyQuery($query_insert);
			$query = "SELECT DISTINCT NOMBRE_ASIGN, ID_ASIGN FROM ASIGN WHERE NIVEL_ASIGN = '{$curso}'";
			$result = $mysqli->executeQuery($query);
			return $result;
		}

		public function insertAsignModel($asign){
			$mysqli = new MysqlDBImplementation(/*"localhost", "8889", "DBLEARN", "root", "learn"*/);
			$query_insert = "INSERT INTO ASIGN (ID_PROFE, NOMBRE_ASIGN, NIVEL_ASIGN) SELECT '{$_SESSION['id']}', NOMBRE_ASIGN, NIVEL_ASIGN FROM ASIGN WHERE ID_ASIGN ='{$asign}'";
			$result = $mysqli->modifyQuery($query_insert);
			$query = "INSERT INTO REL_CURSO_ASIGN (ID_CURSO, ID_ASIGN) SELECT '{$_SESSION['id_curso']}', MAX(ID_ASIGN) FROM ASIGN WHERE ID_PROFE ='{$_SESSION['id']}'";
			$result = $mysqli->modifyQuery($query);
			$query_select = "SELECT MAX(ID_ASIGN) as id_asign FROM ASIGN WHERE ID_PROFE ='{$_SESSION['id']}'";
			$result = $mysqli->executeQuery($query_select);
			return $result;
		}

		public function selectAsign(){
			$mysqli = new MysqlDBImplementation(/*"localhost", "8889", "DBLEARN", "root", "learn"*/);
			$query = "SELECT NOMBRE_ASIGN FROM ASIGN WHERE ID_ASIGN = '{$_SESSION['id_asign']}' AND ID_PROFE = '{$_SESSION['id']}'";
			$result = $mysqli->executeQuery($query);
			return $result;
		}

		public function selectCurso(){
			$mysqli = new MysqlDBImplementation(/*"localhost", "8889", "DBLEARN", "root", "learn"*/);
			$query = "SELECT NIVEL_CURSO, LETRA_CURSO, GRADO_CURSO FROM CURSO WHERE ID_CURSO = '{$_SESSION['id_curso']}' AND ID_CENTR = '{$_SESSION['idCenter']}'";
			$result = $mysqli->executeQuery($query);
			return $result;
		}

		public function selectProfe(){
			$mysqli = new MysqlDBImplementation(/*"localhost", "8889", "DBLEARN", "root", "learn"*/);
			$query = "SELECT NOMBRE_PROFE FROM PROFE WHERE ID_PROFE = '{$_SESSION['id']}'";
			$result = $mysqli->executeQuery($query);
			return $result;
		}


	}










 ?>
