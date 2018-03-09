<?php
class  Commons{

	public static function footer(){
		$footerHTML = "
		<footer >
			<div class='content'>
				<div>
					<h4>Contacto</h4>
					<a href='mailto:contacto@learn.com'>contacto@learn.com</a>
				</div>
				<div id='copy'>
					<span>&copy; L-earn 2017-" . @date("Y") . "</span>
				</div>
			</div>
		</footer>";
		return $footerHTML;
	}

// homeTeacher HEADER
	public static function teacherHeader(){
	$teacherHeaderHTML = "
		<header>
			<nav>
				<ul>
					<li><a href='../homeTeacher/homeTeacher.php'>Alumnos</a></li>
					<li><a href='../teacherSubjects/teacherSubjects.php'>Asignaturas</a></li>
					<li><a href='../teacherTests/teacherTests.php'>Tests</a></li>

				</ul>
			</nav>

			<div class='header-profile'>"
				. $_SESSION['teacherName']
				. $_SESSION['teacherSurname'] .
				"


				<!--		----------- DESCOMENTAR ----------
				<img src='"
				. $_SESSION['imgStu'] .
				"' alt='Imagen del usuario'>
				-->



			</div>
		</header>
		";
	return $teacherHeaderHTML;
	}

	public static function headerStudent(){
		$headerHTML = "
		<header>
			<div class='content'>
				<a href='http://localhost:8888/L-earn/web/homeStudent/homeStudent.php' id='logo'>
					<h1>L-EARN</h1>
				</a>
				<div id='menu-wrapper'>
					<div id='menu'>
						<nav>
							<ul>
								<li><a href='http://localhost:8888/L-earn/web/asignStudent/asignStudent.php'>Tests</a></li>
								<li><a href='http://localhost:8888/L-earn/web/rewardsStudent/rewardsStudent.php'>Recompensas</a></li>
							</ul>
						</nav>
					</div>
					<div id='user'>
						<span id='headPoints'>" . $_SESSION['finPoints'] . "</span><span id='headPoints-type'> PTOS.</span>
						<span id='headPercent'>" . $_SESSION['percentage'] . "</span><span id='headPercent-type'> % EXP.</span>
						<span>" . $_SESSION['nameStu'] . $_SESSION['surnameStu'] . "</span>
						<img src='" . $_SESSION['imgStu'] . "' alt='Imagen del usuario'>
					</div>
				</div>
				<div id='closeSession'><a href='http://localhost:8888/L-earn/web/loginTeacher/loginLearn.html'>Cerrar sesión</a></div>
			</div>
		</header>";
		return $headerHTML;
	}

}

?>
