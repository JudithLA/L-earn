<?php
class  Commons{

	public static function footer(){
		$footerHTML = "
		<footer class= 'l col12'>
			<div class='content'>
				<div>
					<h4>Contacto</h4>
					<a href='mailto:contacto@learn.com'>contacto@learn.com</a>
				</div>
				<div id='copy'>
					<span>&copy; L-earn 2017-" . date("Y") . "</span>
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
					<li><a href='../teacherAsign/teacherAsign.php'>Asignaturas</a></li>
					<li><a href='../teacherTests/teacherTests.php'>Tests</a></li>

				</ul>
			</nav>

			<div class='header-profile'>"
				. $_SESSION['teacherName'] 
				. $_SESSION['teacherSurname'] .
				"<img src='"
				. $_SESSION['imgStu'] .
				"' alt='Imagen del usuario'>
			
			</div>
		</header>
		";
	return $teacherHeaderHTML;
	}

	public static function headerStudent(){
		$headerHTML = "
		<header>
			<div class='content'>
				<a href='http://localhost:8888/L-earn/web/homeStudent/homeStudent.php'>
					<h1>L-EARN</h1>
				</a>
				<nav>
					<ul>
						<li><a href='#'>Tests</a></li>
						<li><a href='http://localhost:8888/L-earn/web/rewardsStudent/rewardsStudent.php'>Recompensas</a></li>
					</ul>
				</nav>
				<span id='headPoints'>" . $_SESSION['finPoints'] . "</span>
				<span id='headPercent'>" . $_SESSION['percentage'] . "</span>
				<span>" . $_SESSION['nameStu'] . $_SESSION['surnameStu'] . "</span>
				<img src='" . $_SESSION['imgStu'] . "' alt='Imagen del usuario'>
			</div>
		</header>";
		return $headerHTML;
	}

}

?>
