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
		public function testPasoCuatroModel($tipoTest, $test, $titulo, $descripcion,  $tema){
			if (strcmp($tipoTest, 'Entrenamiento') == 0){
						$mysqli = new MysqlDBImplementation(/*"localhost", "8889", "DBLEARN", "root", "learn"*/);
						$consult = "INSERT INTO ENTRE (NOMBRE_ENTRE, DESCR_ENTRE, ID_TEMAS) VALUES ('{$titulo}', '{$descripcion}', '{$tema}')";

						$checkQuery = "SELECT MAX(ID_ENTRE) AS ID_TEST FROM ENTRE WHERE NOMBRE_ENTRE ='{$titulo}'";
						$mysqli->modifyQuery($consult);
			        $result = $mysqli->executeQuery($checkQuery);
			} else {
						$mysqli = new MysqlDBImplementation(/*"localhost", "8889", "DBLEARN", "root", "learn"*/);
						$consult = "INSERT INTO FINAL (NOMBRE_FINAL, DESCR_FINAL, ID_TEMAS) VALUES ('{$titulo}', '{$descripcion}', '{$tema}')";

						$checkQuery = "SELECT MAX(ID_FINAL) AS ID_TEST FROM FINAL WHERE NOMBRE_FINAL ='{$titulo}'";
						$mysqli->modifyQuery($consult);
			        	$result = $mysqli->executeQuery($checkQuery);
			}
			return $result;
		}


		// Primera pregunta
		public function testPasoSeisModel($enunciado, $s1, $idTest, $tipoTest){
			if ($tipoTest === 'Entrenamiento'){
						$mysqli = new MysqlDBImplementation(/*"localhost", "8889", "DBLEARN", "root", "learn"*/);
						$consult = "INSERT INTO PREGU_ENTRE (ENUNCIADO_PREGU_ENTRE, ID_ENTRE) VALUES ('{$enunciado}', '{$idTest}')";
						$checkQuery = "SELECT MAX(ID_PREGU_ENTRE) AS ID_TEST FROM PREGU_ENTRE WHERE ENUNCIADO_PREGU_ENTRE ='{$enunciado}'";
						$mysqli->modifyQuery($consult);
						$result = $mysqli->executeQuery($checkQuery);


						foreach ($s1 as $key => $row) {
						    $texto = $row[0];
								$peso = $row[1];
								$correcta = $row[2];
								$consult = "INSERT INTO RESPU_ENTRE (TEXTO_RESPU_ENTRE, PESO_RESPU_ENTRE, CORRECTA_RESPUE_ENTRE, ID_PREGU_ENTRE) VALUES ('{$texto}', '{$peso}', {$correcta} , '{$result[0]['ID_TEST']}')";
								var_dump($consult);
								$mysqli->modifyQuery($consult);
						}
			} else{
						$mysqli = new MysqlDBImplementation(/*"localhost", "8889", "DBLEARN", "root", "learn"*/);
						$consult = "INSERT INTO PREGU_FINAL (ENUNCIADO_PREGU_FINAL, ID_FINAL) VALUES ('{$enunciado}', '{$idTest}')";
						$checkQuery = "SELECT MAX(ID_PREGU_FINAL) AS ID_TEST FROM PREGU_FINAL WHERE ENUNCIADO_PREGU_FINAL ='{$enunciado}'";
						$mysqli->modifyQuery($consult);
						$result = $mysqli->executeQuery($checkQuery);


						foreach ($s1 as $key => $row) {
								$texto = $row[0];
								$peso = $row[1];
								$correcta = $row[2];
								$consult = "INSERT INTO RESPU_FINAL (TEXTO_RESPU_FINAL, PESO_RESPU_FINAL, CORRECTA_RESPUE_FINAL, ID_PREGU_FINAL) VALUES ('{$texto}', '{$peso}', {$correcta} , '{$result[0]['ID_TEST']}')";
var_dump($consult);
								$mysqli->modifyQuery($consult);
						}

				}

				return;

}



}










 ?>
