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
          <script src='js/jquery-3.2.1.min.js'></script>
          <script src='js/loginProfe.js'></script>
          <title>NUEVO REGISTRO</title>

          <style>
            #paso1.on { display: block;}
            #paso1, #paso2 { display: none; }
            #paso2.on { display: block; height: 100vh; position: relative;}
            #paso2 .title_section { position: absolute; z-index: 999; top: 10vh; left: 50%; transform: translateX(-50%); text-align: center; font-family: 'Helvetica', sans-serif; font-size: 100px; color: #FFF; }
            .box_register_type { width: 50%; height: 100vh; display: flex; justify-content: center; align-items: center; cursor: pointer;}
            .box_register_type p { font-family: 'Helvetica', sans-serif; font-size: 30px; font-weight: bold; color: #FFF;}
            #box_profe { background-color: rgb(24, 37, 101); }
            #box_alumno { background-color:rgb(111, 50, 129); }
          </style>
        </head>
        <body>

          <div id='paso1' class='on'>
            <form>
              <input type='text' id='name' name='name' placeholder='name'>
              <input type='text' id='email' name='email' placeholder='email'>
              <input type='text' id='password' name='password' placeholder='password'>

              <button id='btn_register' type='button'>Registrarme</button>
            </form>
              <div class='msgError'></div>
          </div>


          <div id='paso2'>
            <p class='title_section'>¿Qué eres?</p>
            <div id='box_profe' class='box_register_type'>
              <p>Profesor</p>
            </div>
            <div id='box_alumno' class='box_register_type'>
              <p>Alumno</p>
            </div>
          </div>

        </body>
      </html>

		";
		return $resultHTML;
	}

	//creación de método que te devuelve el HTML
	public function genSelect($centers) {

		
		$resultHTML = "
			<div id='paso3'>
				<p class='title_section'>Elige tu centro</p>
				<select>";
				foreach ($centers as $row) {
					 $resultHTML.= "<option value='{$row['ID_CENTR']}'>{$row['NOMBRE_CENTR']}</option>";
				}

			$resultHTML .=	"</select> </div>";
			return $resultHTML;
	}

	}

?>
