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
					<span>&copy; L-earn " . date("Y") . "</span>
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
					<li><a href=''>Alumnos</a></li>
					<li><a href=''>Asignaturas</a></li>
					<li><a href=''>Tests</a></li>

				</ul>
			</nav>
		</header>
		";
	return $teacherHeaderHTML;
	}
}

?>