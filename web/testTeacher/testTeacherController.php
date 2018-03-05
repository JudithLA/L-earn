<?php
require_once __DIR__ . "/testTeacherModel.php";
require_once __DIR__ . "/testTeacherView.php";


class testTeacherController {

				//Constructor (crea la clase)
				/*function __construct(){

				}

				//Destructor (Destruye la clase)
				function __destruct(){

				}*/


				public function welcomeTestController(){
									$view = new testTeacherView();
									return $view->welcomeTestView();
				}

				public function testPasoUnoController(){
					  	$idUser = 1;
						$model = new testTeacherModel();
						$asign = $model -> testPasoUnoModel($idUser);
						$view = new testTeacherView();
						$select = $view -> testPasoUnoView($asign);
						$cent['status'] = 'OK';
						$cent['html'] = $select;
						return $cent;
				}



				// Muestra los temas de la asignatura
				public function testPasoDosController(){
					$asign = $_POST['asign'];
					$nivel = $_POST['nivel'];
					$model = new testTeacherModel();
					$temas = $model -> testPasoDosModel($asign);
					$view = new testTeacherView();
					$select = $view -> testPasoDosView($temas);
					$cent['status'] = 'OK';
					$cent['html'] = $select;
					return $cent;
				}


				// Elige entre test final|entrenamiento y asigna un titulo al test
				public function testPasoTresController(){
					$tema = $_POST['tema'];
					$view = new testTeacherView();
					$select = $view -> testPasoTresView();
					$cent['status'] = 'OK';
					$cent['html'] = $select;
					return $cent;
				}


				// Inserta si se trata de un test de entrenamiento o final
				public function testPasoCuatroController(){
					$test = $_POST['test'];
					$titulo = $_POST['titulo'];
					$descripcion = $_POST['descripcion'];
					$tema = $_POST['tema'];

					$model = new testTeacherModel();
					$vista = $model -> testPasoCuatroModel($test, $titulo, $descripcion, $tema);
					$view = new testTeacherView();
					$select = $view -> testPasoCuatroView($vista);
					$cent['status'] = 'OK';
					$cent['html'] = $select;
					return $cent;
				}


				// Pintar primera pregunta del test
				public function testPasoCincoController(){
					$view = new testTeacherView();
					$select = $view -> testPasoCincoView($vista);
					$cent['status'] = 'OK';
					$cent['html'] = $select;
					return $cent;
				}

				// Primera pregunta del test
				// public function testPasoCincoController(){
				// 	$tipoTest = $_POST['tipoTest'];
				// 	$titulo = $_POST['titulo'];
				// 	$tema = $_POST['tema'];
				//
				// 	$model = new testTeacherModel();
				// 	$vista = $model -> testPasoCincoModel($tipoTest, $titulo, $tema);
				// 	$view = new testTeacherView();
				// 	$select = $view -> testPasoCincoView($vista);
				// 	$cent['status'] = 'OK';
				// 	$cent['html'] = $select;
				// 	return $cent;
				// }

				// Pintar primera pregunta del test
				public function testPasoSeisController(){
					$enunciado = $_POST['enunciado'];
					$s1 = $_POST['s1'];
					$model = new testTeacherModel();
					$vista = $model -> testPasoSeisModel($enunciado, $s1);
					$view = new testTeacherView();
					$select = $view -> testPasoSeisView($vista);
					$cent['status'] = 'OK';
					$cent['html'] = $select;
					return $cent;

				}











}
?>
