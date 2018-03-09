<?php
//creamos clase de view
	class RegisterTeacherView{


	//Constructor (crea la clase)
	public function __construct(){}

	//Destructor (Destruye la clase)
	public function __destruct(){}

	//creación de método que te devuelve el HTML
	public function genRegister() {
		//variable con el HTML –¡! con comillas simples–y habría que devolver esa variable
		$resultHTML = "
    <!DOCTYPE html>
      <html>
  <head>
    <meta charset='utf-8'>
    <link rel='stylesheet' type='text/css' href='style/styleRegisterTeacher.css'>
    <script src='js/jquery-3.2.1.min.js'></script>
    <script src='js/loginProfe.js'></script>
    <title>Registro | L-Earn</title>

    <style>
      
      
    </style>
  </head>
  <body>

    <div id='paso1' class='boxRegister on'>
      <img src='img/login.png'>
      <form class='formLogin'>
        <h1 class='titleBoxLogin'>Register</h1>
        <input type='text' id='name' name='name' placeholder='name'>
        <input type='text' id='email' name='email' placeholder='email'>
        <input type='text' id='password' name='password' placeholder='password'>

        <button class='buttonLogin' id='btn_register' type='button'>Registrarme</button>
      </form>
        <div class='msgError linkRegister'></div>
    </div>


    <div id='paso2'>
      <div id='box_profe' class='box_register_type'>
        <img src='img/teacher.png'>
        <p class='titleBoxLogin'>Profesor</p>
      </div>
      <div id='box_alumno' class='box_register_type'>
        <img src='img/alumno.png'>
        <p class='titleBoxLogin'>Alumno</p>
      </div>
    </div>

	</body>
	<script src='js/jquery-3.2.1.min.js'></script>
	<script src='js/loginProfe.js'></script>
</html>

		";
		return $resultHTML;
	}

	//creación de método que te devuelve el HTML
	public function genSelect($centers) {

		$resultHTML = "
			<div id='paso3'>
			<img src='img/centro.png'>
			<p class='title_section titleBoxLogin'>Centro</p>
			<select id ='centros'>";
			foreach ($centers as $row) {
				 $resultHTML.= "<option value='{$row['ID_CENTR']}'>{$row['NOMBRE_CENTR']}</option>";
			}
			$resultHTML .=	"</select> <button class='boton buttonLogin'>Siguiente</button> </div>";
			return $resultHTML;
	}


	//creación de método que te devuelve el HTML
	public function genCurso($centers) {
		$resultHTML = "
			<div id='paso4'>
			<p class='title_section titleBoxLogin'>Mis alumnos son de</p>
			<div class='flexRow flexWrap box-curso boxWrap'>";
			foreach ($centers as $row) {
				 $resultHTML.= "<div class='item-curso subBoxCurso' data-curso='{$row['NIVEL_CURSO']}'><p>{$row['NIVEL_CURSO']}º E.S.O.</p></div>";
			}
			$resultHTML .=	"</div></div>";
			return $resultHTML;
	}


	//creación de método que te devuelve el HTML
	public function genLetra($letra) {

		$resultHTML = "
			<div id='paso5'>
			<p class='title_section titleBoxLogin'>Crea tu grupo</p>
			<div class='flexRow flexWrap box-curso boxWrap'>";
			foreach ($letra as $row) {
				 $resultHTML.= "<div class='item-curso subBoxCurso' data-letra='{$row['LETRA_CURSO']}'><p>{$row['LETRA_CURSO']}</p></div>";
			}
			$resultHTML .=	"</div></div>";
			return $resultHTML;
	}

	//creación de método que te devuelve el HTML
	public function genAsign($new) {

		$resultHTML = "
			<div id='paso6'>
			<p class='title_section titleBoxLogin'>Elige tu asignatura</p>
			<div class='flexRow flexWrap box-asign boxWrap'>";
			foreach ($new as $row) {
				 $resultHTML.= "<div class='item-asign subBoxCurso' data-asign='{$row['ID_ASIGN']}'><p>{$row['NOMBRE_ASIGN']}</p></div>";
			}
			$resultHTML .=	"</div></div>";
			return $resultHTML;
	}


// modalFinal($_SESSION['id'], $_SESSION['id_asign'],$_SESSION['nivel_curso'],$_SESSION['letra_curso']);
	//creación de método que te devuelve el HTML
	public function modalFinal($data_asign, $data_curso, $data_profe) {

		$resultHTML = "
			<div id='paso7'>
			<img src='img/enhorabuena.png'>";
			foreach ($data_profe as $row) {
				 $resultHTML.= "<div class='item-asign titleBoxLogin'>¡Enhorabuena!<br>{$row['NOMBRE_PROFE']}</div>";
			};
			$resultHTML.= "<div class='flexRow flexWrap box-asign flexColumnEnhorabuena'> <div class='item-asign subTitleEnhorabuena'>Has creado</div>";
			
			foreach ($data_asign as $row) {
				 $resultHTML.= "<div class='subBoxCurso'>{$row['NOMBRE_ASIGN']}<br>";
			}
			foreach ($data_curso as $row) {
				 $resultHTML.= "{$row['NIVEL_CURSO']}º {$row['GRADO_CURSO']} {$row['LETRA_CURSO']}</div>";
			}
			$resultHTML .=	"</div></div>";
			return $resultHTML;
	}



	}

?>
