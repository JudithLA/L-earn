<?php 
//model gestiona datos a través de conexión con bbdd y querys

	// Incluimos el archivo con la conexión a base de datos
	require_once __DIR__ . "/../ConnectSupport/Implementation/MysqlDBImplementation.php";

	//creamos clase de Model
	class HomeTeacherModel{

		//CONN1º cuando tenemos varias funciones, definimos la conexión en el método Construct para que todas las funciones puedan tirar de ella. Creamos un atributo.
		//CONN2º accedemos al atributo y le pasamos el objeto de MysqlDBImplementation. Creamos un objeto de la clase MysqlDBImplementation y abrimos una conexión a bbdd con los perímetros (host, puerto, nombre de base de datos, usuario, contraseña) [	$this-> mysqli = new MysqlDBImplementation("localhost", "8888", "DBLEARN", "root", "learn");]. De esta forma, cuando en Controller.php se instancie la clase del Modelo, se construirá la clase con esta conexión
		//CONN3º al ejecutar la query con el método executeQuery, llamamos al 
		private $mysqli;

		//Constructor (crea la clase)
		public function __construct(){
			//CONN2ºle pasamos al atributo mysqli el objeto. Creamos un objeto de la clase MysqlDBImplementation y abrimos una conexión a bbdd con los perímetros (host, puerto, nombre de base de datos, usuario, contraseña). De esta forma, cuando en Controller.php se instancie la clase del Modelo, se construirá la clase con esta conexión
			$this-> mysqli = new MysqlDBImplementation("127.0.0.1", "8889", "DBLEARN", "root", "learn");
		}

		//Destructor (Destruye la clase)
		public function __destruct(){}		

		// Método para conectar con base de datos y ejecutar una query que muestre los grupos a los que imparte clases el profesor
		public function TeacherGroups(){

			// Como vamos a tener más de una función, para que todas mamen de la misma conexión lo subimos a nivel de los constructores/destructores, pero lo hacemos como atributo. //Creamos un objeto de la clase MysqlDBImplementation y abrimos una conexión a bbdd con los perímetros (host, puerto, nombre de base de datos, usuario, contraseña)
			//$mysqli = new MysqlDBImplementation("localhost", "8888", "DBLEARN", "root", "learn");
			//este session sirve para falsear el profesor
			$_SESSION['id'] = 5;
			// Definimos la query
			$consult = "SELECT CURSO.NIVEL_CURSO AS GroupLevel, GRUPO.LETRA_GRUPO AS GroupLetter, GRUPO.ID_GRUPO  AS GroupId FROM GRUPO
				INNER JOIN CURSO ON GRUPO.ID_CURSO=CURSO.ID_CURSO
				INNER JOIN CENTR ON CURSO.ID_CENTR=CENTR.ID_CENTR
				INNER JOIN PROFE ON CENTR.ID_CENTR=PROFE.ID_CENTR WHERE ID_PROFE='{$_SESSION ["id"]}'";

			//creamos una clase $result donde, mediante el objeto mysqli, almacenaremos los resultados de la query "$consult".
			//estos resultados serán obtenidos mediante el acceso al atributo $mysqli del método executeQuery(), que está incorporado en MysqlDBImplementation.php, 
			$result = $this->mysqli -> executeQuery($consult);

			//devolvemos resultado del executeQuery a través de la clase que habíamos instanciado
			return $result;

//¿ESTO DE INICIALIZAR A 0 POR QUÉ NO?
			//inicialiamos id =0, porque si no hay resultados no nos devolvería 0 al controlador sino "vacío" y daría fallo
			//$id = 0;
			//recorremos toda las filas de la tabla con el metodo mysqli_fecth_assoc() //le pasamos al método nuestra query ($result)
			// while($row = mysqli_fetch_assoc($result)){
				//almacenamos en $id el resultado de la query &consult (valor del campo ID_PRO)
				//será cero si no encuantra ningúna fila con NOM_PRO=name y CON_PRO=password
				//$id = $row["ID_PRO"];}
		}


	}
	


 ?>