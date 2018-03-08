<?php
	// Incluimos el archivo con la conexión a BBDD
	require_once __DIR__ . "/../ConnectSupport/Implementation/MysqlDBImplementation.php";

	// Clase del Modelo
	class HomeStudentModel{

		// Creamos un atributo
		private $mysqli;

		// Constructor (crea la clase)
		public function __construct(){
			// Creamos un objeto de la clase MysqlDBImplementation, se lo pasamos al atributo $mysqli y abrimos conexión con base de datos
			// Parámetros: host, puerto, nombre de base de datos, usuario, contraseña
			$this->mysqli = new MysqlDBImplementation("127.0.0.1", "8889", "DBLEARN", "root", "learn");

		}

		//Destructor (destruye la clase)
		public function __destruct(){}

		public function infoStudent(){
			$_SESSION['id'] = 1;

			$consult = "SELECT CONCAT(NOMBRE_ALUMN, ' ') AS Name, CONCAT(SUBSTRING(APELLIDO_ALUMN, 1, 1), '.') AS FirstSurname,
						IMG_ALUMN FROM ALUMN WHERE ID_ALUMN = '{$_SESSION["id"]}'";
			$result = $this->mysqli -> executeQuery($consult);

			$_SESSION['nameStu'] = $result[0]['Name'];
			$_SESSION['surnameStu'] = $result[0]['FirstSurname'];
			$_SESSION['imgStu'] = $result[0]['IMG_ALUMN'];


		}

		// Método consultar la BBDD y obtener el porcentaje de los puntos de experiencia total del alumno entre todas sus asignaturas
		public function percentageStudentExpPoints(){
			$_SESSION['id'] = 1;
			// Definimos la query
			// Habrá que modificar el ID_ALUMN por '{$_SESSION ["id"]}'
			$consult = "SELECT TRUNCATE((ALUMN.EXPERIENCIA_ALUMN*100)/(SELECT COUNT(ENTRE.ID_ENTRE)*4 AS TotalExperience FROM ENTRE
        				INNER JOIN TEMAS ON ENTRE.ID_TEMAS = TEMAS.ID_TEMAS
        				INNER JOIN ASIGN ON TEMAS.ID_ASIGN = ASIGN.ID_ASIGN), 2) AS Percentage
						FROM ALUMN WHERE ALUMN.ID_ALUMN = '{$_SESSION["id"]}'";

			// Llamada al método executeQuery() mediante el acceso al atributo $mysqli para ejecutar la query en la BBDD
			// Almacenamos en $result los resultados de la query "$consult"
			$result = $this->mysqli -> executeQuery($consult);

			// Almacenamos el resultado de la query (valor del resultado de la operación Percentage)
			$percentage = $result[0]['Percentage'];

			return $percentage;
		}

		// Método consultar la BBDD y obtener los puntos finales totales del alumno
		public function studentFinPoints(){

			$_SESSION['id'] = 1;
			// Definimos la query
			// Habrá que modificar el ID_ALUMN por '{$_SESSION ["id"]}'
			$consult = "SELECT PUNTOS_ALUMN AS Points FROM ALUMN WHERE ID_ALUMN = '{$_SESSION["id"]}'";

			// Llamada al método executeQuery() mediante el acceso al atributo $mysqli para ejecutar la query en la BBDD
			// Almacenamos en $result los resultados de la query "$consult"
			$result = $this->mysqli -> executeQuery($consult);

			// Almacenamos el resultado de la query (únicamente el valor del campo PUNTOS_ALUMN)
			$finalPoints = $result[0]['Points'];

			return $finalPoints;
		}

		public function nextTest(){
			$_SESSION['id'] = 1;

			$createTempTable1 = "CREATE TEMPORARY TABLE IF NOT EXISTS DBLEARN.lasTest
								SELECT REL_ALUMN_FINAL.ID_FINAL AS IdLastTestDone, REL_ALUMN_FINAL.FECHA_REL_ALUMN_FINAL AS DateLastTestDone,
								TEMAS.ICON_TEMAS AS ImgTema, ASIGN.ID_ASIGN AS IdAsign, ASIGN.NOMBRE_ASIGN AS NombreAsign FROM ALUMN
								INNER JOIN REL_ALUMN_FINAL ON ALUMN.ID_ALUMN = REL_ALUMN_FINAL.ID_ALUMN
								INNER JOIN FINAL ON REL_ALUMN_FINAL.ID_FINAL = FINAL.ID_FINAL
								INNER JOIN TEMAS ON FINAL.ID_TEMAS = TEMAS.ID_TEMAS
								INNER JOIN ASIGN ON TEMAS.ID_ASIGN = ASIGN.ID_ASIGN
								WHERE ALUMN.ID_ALUMN = '{$_SESSION["id"]}' GROUP BY ASIGN.ID_ASIGN ORDER BY REL_ALUMN_FINAL.FECHA_REL_ALUMN_FINAL DESC";
			$result = $this->mysqli -> otherQuery($createTempTable1);

			$createTempTable2 = "CREATE TEMPORARY TABLE IF NOT EXISTS DBLEARN.nextTest
								SELECT AvailableTest.IdNextFinal, AvailableTest.IdAsign  FROM
								(SELECT FINAL.ID_FINAL AS IdNextFinal, ASIGN.ID_ASIGN as IdAsign FROM FINAL
								INNER JOIN TEMAS ON FINAL.ID_TEMAS = TEMAS.ID_TEMAS
								INNER JOIN ASIGN ON TEMAS.ID_ASIGN = ASIGN.ID_ASIGN
								) AS AvailableTest
								INNER JOIN
								(SELECT MAX(REL_ALUMN_FINAL.ID_FINAL) AS IdLastTestDone, ASIGN.ID_ASIGN AS IdAsign FROM REL_ALUMN_FINAL
								INNER JOIN FINAL ON REL_ALUMN_FINAL.ID_FINAL = FINAL.ID_FINAL
								INNER JOIN TEMAS ON FINAL.ID_TEMAS = TEMAS.ID_TEMAS
								INNER JOIN ASIGN ON TEMAS.ID_ASIGN = ASIGN.ID_ASIGN
								WHERE REL_ALUMN_FINAL.ID_ALUMN = '{$_SESSION["id"]}' GROUP BY ASIGN.ID_ASIGN) AS LastTestDone ON AvailableTest.IdNextFinal > LastTestDone.IdLastTestDone AND LastTestDone.IdAsign = AvailableTest.IdAsign
								GROUP BY LastTestDone.IdAsign;";
			$result = $this->mysqli -> otherQuery($createTempTable2);

			$tempTableResult = "SELECT * FROM DBLEARN.lasTest
							INNER JOIN DBLEARN.nextTest ON DBLEARN.lasTest.IdAsign = DBLEARN.nextTest.IdAsign";
			$result = $this->mysqli -> executeQuery($tempTableResult);

			return $result;

		}
	}
// $m = new HomeStudentModel();
// $result = $m->nextTest();
// print_r($result);
 ?>
