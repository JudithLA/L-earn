<?php
// Solicitamos el archivo de conexión a BBDD
require_once __DIR__ . "/Implementation/MysqlDBImplementation.php";

		//creamos clase
class testTeacherModel{

		//Constructor (crea la clase)
		public function __construct(){}

		//Destructor (Destruye la clase)
		public function __destruct(){}

		// Muestra las asignaturas que tiene ese profesor
		public function testPasoUnoModel($idUser){
				$mysqli = new MysqlDBImplementation(/*"localhost", "8889", "DBLEARN", "root", "learn"*/);
				// $query = "SELECT ID_ASIGN, NOMBRE_ASIGN, NIVEL_ASIGN FROM ASIGN WHERE ID_PROFE = '{$idUser}'";
				$query = "SELECT ASIGN.ID_ASIGN, ASIGN.NOMBRE_ASIGN, CURSO.NIVEL_CURSO FROM ASIGN
											INNER JOIN REL_CURSO_ASIGN ON ASIGN.ID_ASIGN = REL_CURSO_ASIGN.ID_ASIGN
											INNER JOIN CURSO ON REL_CURSO_ASIGN.ID_CURSO = CURSO.ID_CURSO
											INNER JOIN PROFE ON ASIGN.ID_PROFE = PROFE.ID_PROFE
											WHERE PROFE.ID_PROFE = '{$idUser}'
											GROUP BY ASIGN.NOMBRE_ASIGN, CURSO.NIVEL_CURSO
											ORDER BY CURSO.NIVEL_CURSO";
				$result = $mysqli->executeQuery($query);

				return $result;


				// "SELECT ASIGN.ID_ASIGN, ASIGN.NOMBRE_ASIGN, CURSO.NIVEL_CURSO FROM ASIGN
				// 	INNER JOIN REL_CURSO_ASIGN ON ASIGN.ID_ASIGN = REL_CURSO_ASIGN.ID_ASIGN
				// 	INNER JOIN CURSO ON REL_CURSO_ASIGN.ID_CURSO = CURSO.ID_CURSO
				// 	INNER JOIN PROFE ON ASIGN.ID_PROFE = PROFE.ID_PROFE
				// 	WHERE PROFE.ID_PROFE = 1 GROUP BY ASIGN.NOMBRE_ASIGN, CURSO.NIVEL_CURSO ORDER BY CURSO.NIVEL_CURSO"

		}


		// Hay que hay un controlador para mostrar el nivel de las asignaturas o es el anterior?

		// Muestra los temas de la asignatura
		public function testPasoDosModel($asign){
				$mysqli = new MysqlDBImplementation(/*"localhost", "8889", "DBLEARN", "root", "learn"*/);
				$query = "SELECT * FROM TEMAS WHERE ID_ASIGN = '{$asign}'";
				$result = $mysqli->executeQuery($query);


				return $result;

		}


		// Elige test final o test de entrenamiento e introduce el nombre del test
		public function testPasoCuatroModel($test, $titulo, $descripcion,  $tema){
			if ($test = 'Entrenamiento'){
						$mysqli = new MysqlDBImplementation(/*"localhost", "8889", "DBLEARN", "root", "learn"*/);
						$consult = "INSERT INTO ENTRE (NOMBRE_ENTRE, DESCR_ENTRE, ID_TEMAS) VALUES ('{$titulo}', '{$descripcion}', '{$tema}')";
						$checkQuery = "SELECT MAX(ID_ENTRE) AS ID_TEST FROM ENTRE WHERE NOMBRE_ENTRE ='{$titulo}'";
						$mysqli->modifyQuery($consult);
			        	$result = $mysqli->executeQuery($checkQuery);
			} else {
						$mysqli = new MysqlDBImplementation(/*"localhost", "8889", "DBLEARN", "root", "learn"*/);
						$query = "INSERT INTO FINAL (NOMBRE_FINAL, DESCR_FINAL, ID_TEMAS) VALUES ('{$titulo}', '{$descripcion}', '{$tema}')";
						$checkQuery = "SELECT MAX(ID_FINAL) AS ID_TEST FROM FINAL WHERE NOMBRE_FINAL ='{$titulo}'";
						$mysqli->modifyQuery($consult);
			        	$result = $mysqli->executeQuery($checkQuery);
			}
			return $result;
		}


		// Primera pregunta
		// public function testPasoCincoModel($idUser){
		// }






	}










 ?>
