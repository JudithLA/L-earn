 CREATE DATABASE IF NOT EXISTS DBLEARN DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE DBLEARN;

CREATE TABLE IF NOT EXISTS CENTR (

	ID_CENTR INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

	NOMBRE_CENTR VARCHAR (50) CHARACTER SET utf8,

	COMUNIDAD_CENTR VARCHAR (40) CHARACTER SET utf8,

	MUNICIPIO_CENTR VARCHAR (40) CHARACTER SET utf8,

	CP_CENTR SMALLINT (5)

)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS PROFE (

	ID_PROFE INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

	NOMBRE_PROFE VARCHAR (40) CHARACTER SET utf8,

	APELLIDO_PROFE VARCHAR (100) CHARACTER SET utf8,

	EMAIL_PROFE VARCHAR (100) CHARACTER SET utf8,

	CONTRASENA_PROFE VARCHAR (8) CHARACTER SET utf8,

	IMG_PROFE VARCHAR (120) CHARACTER SET utf8,

	ID_CENTR INT,

	FOREIGN KEY (ID_CENTR) REFERENCES CENTR (ID_CENTR)

)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS CURSO (

	ID_CURSO INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

	NIVEL_CURSO VARCHAR (20) CHARACTER SET utf8,

	ID_CENTR INT,

	FOREIGN KEY (ID_CENTR) REFERENCES CENTR (ID_CENTR)

)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS ASIGN (

	ID_ASIGN INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

	NOMBRE_ASIGN VARCHAR (100) CHARACTER SET utf8,

	ID_PROFE INT,

	FOREIGN KEY (ID_PROFE) REFERENCES PROFE (ID_PROFE)

)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS TEMAS (

	ID_TEMAS INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

	NOMBRE_TEMAS TEXT CHARACTER SET utf8,

	ICON_TEMAS VARCHAR (120) CHARACTER SET utf8,

	TRIMESTRE_TEMAS VARCHAR(1) CHARACTER SET utf8,

	ID_ASIGN INT,

	FOREIGN KEY (ID_ASIGN) REFERENCES ASIGN (ID_ASIGN)

)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS GRUPO (

	ID_GRUPO INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

	LETRA_GRUPO VARCHAR (1) CHARACTER SET utf8,

	ID_CURSO INT,

	FOREIGN KEY (ID_CURSO) REFERENCES CURSO (ID_CURSO)

)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS REL_GRUPO_ASIGN (
	ID_GRUPO INT,

	ID_ASIGN INT,

	FOREIGN KEY (ID_GRUPO) REFERENCES GRUPO (ID_GRUPO),

	FOREIGN KEY (ID_ASIGN) REFERENCES ASIGN (ID_ASIGN)

)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS ALUMN (

	ID_ALUMN INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

	NOMBRE_ALUMN VARCHAR (40) CHARACTER SET utf8,

	APELLIDO_ALUMN VARCHAR (100) CHARACTER SET utf8,

	EMAIL_ALUMN VARCHAR (100) CHARACTER SET utf8,

	CONTRASENA_ALUMN VARCHAR (8) CHARACTER SET utf8,

	EXPERIENCIA_ALUMN INT,

	PUNTOS_ALUMN INT,

  	IMG_ALUMN VARCHAR (120) CHARACTER SET utf8,

	ID_GRUPO INT,

	FOREIGN KEY (ID_GRUPO) REFERENCES GRUPO (ID_GRUPO)

)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS FINAL (

	ID_FINAL INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

	NOMBRE_FINAL VARCHAR (200) CHARACTER SET utf8,

	DESCR_FINAL TEXT CHARACTER SET utf8,

	ID_TEMAS INT,

	FOREIGN KEY (ID_TEMAS) REFERENCES TEMAS (ID_TEMAS)

)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS ENTRE (

	ID_ENTRE INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

	NOMBRE_ENTRE VARCHAR (200) CHARACTER SET utf8,

	DESCR_ENTRE TEXT CHARACTER SET utf8,

	ID_TEMAS INT,

	FOREIGN KEY (ID_TEMAS) REFERENCES TEMAS (ID_TEMAS)

)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS REL_ALUMN_ENTRE (

	ID_REL_ALUMN_ENTRE INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

	FECHA_REL_ALUMN_ENTRE DATE,

	ID_ALUMN INT,

	ID_ENTRE INT,

	FOREIGN KEY (ID_ALUMN) REFERENCES ALUMN (ID_ALUMN),

	FOREIGN KEY (ID_ENTRE) REFERENCES ENTRE (ID_ENTRE)

)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS REL_ALUMN_FINAL (

	ID_REL_ALUMN_FINAL INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

	PUNTOS_REL_ALUMN_FINAL INT,

	ID_ALUMN INT,

	ID_FINAL INT,

	FOREIGN KEY (ID_ALUMN) REFERENCES ALUMN (ID_ALUMN),

	FOREIGN KEY (ID_FINAL) REFERENCES FINAL (ID_FINAL)

)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS PREGU_ENTRE (

	ID_PREGU_ENTRE INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

	ENUNCIADO_PREGU_ENTRE TEXT CHARACTER SET utf8,

	ID_ENTRE INT,

	FOREIGN KEY (ID_ENTRE) REFERENCES ENTRE (ID_ENTRE)


)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS PREGU_FINAL (

	ID_PREGU_FINAL INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

	ENUNCIADO_PREGU_FINAL TEXT CHARACTER SET utf8,

	ID_FINAL INT,

	FOREIGN KEY (ID_FINAL) REFERENCES FINAL (ID_FINAL)

)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS RESPU_ENTRE (

	ID_RESPU_ENTRE INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

	TEXTO_RESPU_ENTRE TEXT CHARACTER SET utf8,

	PESO_RESPU_ENTRE TINYINT,

	CORRECTA_RESPUE_ENTRE BIT,

	ID_PREGU_ENTRE INT,

	FOREIGN KEY (ID_PREGU_ENTRE) REFERENCES PREGU_ENTRE (ID_PREGU_ENTRE)

)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS RESPU_FINAL (

	ID_RESPU_FINAL INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

	TEXTO_RESPU_FINAL TEXT CHARACTER SET utf8,

	PESO_RESPU_FINAL TINYINT,

	CORRECTA_RESPUE_FINAL BIT,

	ID_PREGU_FINAL INT,

	FOREIGN KEY (ID_PREGU_FINAL) REFERENCES PREGU_FINAL (ID_PREGU_FINAL)

)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


INSERT INTO CENTR (NOMBRE_CENTR, COMUNIDAD_CENTR, MUNICIPIO_CENTR, CP_CENTR) VALUES
('I.E.S. Alameda de Osuna', 'Comunidad de Madrid', 'Madrid', 28042),
('I.E.S. Alfredo Kraus', 'Comunidad de Madrid', 'Madrid', 28022),
('I.E.S. Antonio Domínguez Ortiz', 'Comunidad de Madrid', 'Madrid', 28038),
('I.E.S. Avenida de los Toreros', 'Comunidad de Madrid', 'Madrid', 28028),
('I.E.S. Beatriz Galindo', 'Comunidad de Madrid', 'Madrid', 28001),
('I.E.S. Blas de Otero', 'Comunidad de Madrid', 'Madrid', 28024),
('I.E.S. Cardenal Herrera Oria', 'Comunidad de Madrid', 'Madrid', 28034),
('I.E.S. Cervantes', 'Comunidad de Madrid', 'Madrid', 28012),
('I.E.S. Ciudad de Jaen', 'Comunidad de Madrid', 'Madrid', 28041),
('I.E.S. Ciudad de los Poetas', 'Comunidad de Madrid', 'Madrid', 28039),
('I.E.S. Conde Orgaz', 'Comunidad de Madrid', 'Madrid', 28043),
('I.E.S. Fortuny', 'Comunidad de Madrid', 'Madrid', 28010),
('I.E.S. Francisco de Goya', 'Comunidad de Madrid', 'Madrid', 28017),
('I.E.S. Francisco de Quevedo', 'Madrid', 'Madrid', 28037),
('I.E.S. Gabriel García Márquez', 'Madrid', 'Madrid', 28033),
('I.E.S. García Morato', 'Madrid', 'Madrid', 28044),
('I.E.S. Gran Capitán', 'Madrid', 'Madrid', 28005),
('I.E.S. Gomez Moreno', 'Madrid', 'Madrid', 28037),
('I.E.S. Isaac Newton', 'Madrid', 'Madrid', 28035),
('I.E.S. Joaquín Rodrigo', 'Madrid', 'Madrid', 28032),
('I.E.S. Joaquín Turina', 'Madrid', 'Madrid', 28003),
('I.E.S. Juan de la Cierva', 'Madrid', 'Madrid', 28005),
('I.E.S. Juan de Castilla', 'Madrid', 'Madrid', 28030),
('I.E.S. La Estrella', 'Madrid', 'Madrid', 28007),
('I.E.S. Lope de Vega', 'Madrid', 'Madrid', 28015),
('I.E.S. Manuel Fraga Iribarne', 'Madrid', 'Madrid', 28050),
('I.E.S. Mariano José de Larra', 'Madrid', 'Madrid', 28047),
('I.E.S. María Rodrigo', 'Madrid', 'Madrid', 28051),
('I.E.S. Mirasierra', 'Madrid', 'Madrid', 28034),
('I.E.S. Nuestra Señora de la Almudena', 'Madrid', 'Madrid', 28039),
('I.E.S. Pedro Salines', 'Madrid', 'Madrid', 28026),
('I.E.S. Príncipe Felipe', 'Madrid', 'Madrid', 28029),
('I.E.S. Ramiro de Maeztu', 'Madrid', 'Madrid', 28006),
('I.E.S. Ramón y Cajal', 'Madrid', 'Madrid', 28050),
('I.E.S. Rey Pastor', 'Madrid', 'Madrid', 28030),
('I.E.S. San Cristobal de los Ángeles', 'Madrid', 'Madrid', 28021),
('I.E.S. San Isidro', 'Madrid', 'Madrid', 28005),
('I.E.S. San Juan Bautista', 'Madrid', 'Madrid', 28043),
('I.E.S. Santamarta', 'Madrid', 'Madrid', 28016),
('I.E.S. Tirso de Molina', 'Madrid', 'Madrid', 28038),
('I.E.S. Valdebernardo', 'Madrid', 'Madrid', 28032),
('I.E.S. Villa de Vallecas', 'Madrid', 'Madrid', 28031),
('I.E.S. Villablanca', 'Madrid', 'Madrid', 28032);


INSERT INTO CURSO (NIVEL_CURSO, ID_CENTR) VALUES
('1º E. S. O.', 1),
('2º E. S. O.', 1),
('3º E. S. O.', 1),
('4º E. S. O.', 1),
('1º E. S. O.', 2),
('2º E. S. O.', 2),
('3º E. S. O.', 2),
('4º E. S. O.', 2),
('1º E. S. O.', 3),
('2º E. S. O.', 3),
('3º E. S. O.', 3),
('4º E. S. O.', 3),
('1º E. S. O.', 4),
('2º E. S. O.', 4),
('3º E. S. O.', 4),
('4º E. S. O.', 4),
('1º E. S. O.', 5),
('2º E. S. O.', 5),
('3º E. S. O.', 5),
('4º E. S. O.', 5),
('1º E. S. O.', 6),
('2º E. S. O.', 6),
('3º E. S. O.', 6),
('4º E. S. O.', 6),
('1º E. S. O.', 7),
('2º E. S. O.', 7),
('3º E. S. O.', 7),
('4º E. S. O.', 7),
('1º E. S. O.', 8),
('2º E. S. O.', 8),
('3º E. S. O.', 8),
('4º E. S. O.', 8),
('1º E. S. O.', 9),
('2º E. S. O.', 9),
('3º E. S. O.', 9),
('4º E. S. O.', 9),
('1º E. S. O.', 10),
('2º E. S. O.', 10),
('3º E. S. O.', 10),
('4º E. S. O.', 10),
('1º E. S. O.', 11),
('2º E. S. O.', 11),
('3º E. S. O.', 11),
('4º E. S. O.', 11),
('1º E. S. O.', 12),
('2º E. S. O.', 12),
('3º E. S. O.', 12),
('4º E. S. O.', 12),
('1º E. S. O.', 13),
('2º E. S. O.', 13),
('3º E. S. O.', 13),
('4º E. S. O.', 13);


INSERT INTO GRUPO (LETRA_GRUPO, ID_CURSO) VALUES
('A', 1),
('B', 1),
('A', 2),
('B', 2),
('A', 3),
('B', 3),
('A', 4),
('B', 4),
('A', 5),
('B', 5),
('A', 6),
('B', 6),
('A', 7),
('B', 7),
('A', 8),
('B', 8),
('A', 9),
('B', 9),
('A', 10),
('B', 10),
('A', 11),
('B', 11),
('A', 12),
('B', 12),
('A', 13),
('B', 13);


INSERT INTO ALUMN (NOMBRE_ALUMN, APELLIDO_ALUMN, EMAIL_ALUMN, CONTRASENA_ALUMN, EXPERIENCIA_ALUMN, PUNTOS_ALUMN, IMG_ALUMN, ID_GRUPO) VALUES
('Lola', 'Pérez', 'lolaperez@gmail.com', 'cont5678', 4, 1200, 'web/img/alumno1.jpg', 1),
('Raúl', 'González', 'raulitog@gmail.com', 'cont5678', 6, 1520, 'web/img/alumno2.jpg', 1),
('Elena', 'Rodríguez', 'e.rodriguez@gmail.com', 'cont5678', 7, 800, 'web/img/alumno3.jpg', 1),
('María', 'Alonso', 'maria.alonso@gmail.com', 'cont5678', 3, 1654, 'web/img/alumno4.jpg', 1),
('Roberto', 'García', 'robertoG@gmail.com', 'cont5678', 8, 1935, 'web/img/alumno5.jpg', 1),

('Álvaro', 'Sánchez', 'a.sanchez1@gmail.com', 'cont5678', 8, 1735, 'web/img/alumno6.jpg', 2),
('Sofia', 'Santos', 'sofiasantos@gmail.com', 'cont5678', 6, 1408, 'web/img/alumno7.jpg', 2),
('Adrian', 'Martinez', 'a.martinez@gmail.com', 'cont5678', 4, 1735, 'web/img/alumno8.jpg', 2),
('Mario', 'Pascual', 'marioPascual@gmail.com', 'cont5678', 5, 1103, 'web/img/alumno9.jpg', 2),

('Lola', 'Pérez', 'lolaperez@gmail.com', 'cont5678', 255, 1200, 'web/img/alumno1.jpg', 3),
('Raúl', 'González', 'raulitog@gmail.com', 'cont5678', 61, 1520, 'web/img/alumno2.jpg', 3),
('Elena', 'Rodríguez', 'e.rodriguez@gmail.com', 'cont5678', 40, 800, 'web/img/alumno3.jpg', 3),
('María', 'Alonso', 'maria.alonso@gmail.com', 'cont5678', 82, 1654, 'web/img/alumno4.jpg', 3),
('Roberto', 'García', 'robertoG@gmail.com', 'cont5678', 95, 1935, 'web/img/alumno5.jpg', 3),

('Lola', 'Pérez', 'lolaperez@gmail.com', 'cont5678', 255, 1200, 'web/img/alumno1.jpg', 4),
('Raúl', 'González', 'raulitog@gmail.com', 'cont5678', 61, 1520, 'web/img/alumno2.jpg', 4),
('Elena', 'Rodríguez', 'e.rodriguez@gmail.com', 'cont5678', 40, 800, 'web/img/alumno3.jpg', 4),
('María', 'Alonso', 'maria.alonso@gmail.com', 'cont5678', 82, 1654, 'web/img/alumno4.jpg', 4),
('Roberto', 'García', 'robertoG@gmail.com', 'cont5678', 95, 1935, 'web/img/alumno5.jpg', 4),

('Lola', 'Pérez', 'lolaperez@gmail.com', 'cont5678', 255, 1200, 'web/img/alumno1.jpg', 5),
('Raúl', 'González', 'raulitog@gmail.com', 'cont5678', 61, 1520, 'web/img/alumno2.jpg', 5),
('Elena', 'Rodríguez', 'e.rodriguez@gmail.com', 'cont5678', 40, 800, 'web/img/alumno3.jpg', 5),
('María', 'Alonso', 'maria.alonso@gmail.com', 'cont5678', 82, 1654, 'web/img/alumno4.jpg', 5),
('Roberto', 'García', 'robertoG@gmail.com', 'cont5678', 95, 1935, 'web/img/alumno5.jpg', 5),

('Lola', 'Pérez', 'lolaperez@gmail.com', 'cont5678', 255, 1200, 'web/img/alumno1.jpg', 6),
('Raúl', 'González', 'raulitog@gmail.com', 'cont5678', 61, 1520, 'web/img/alumno2.jpg', 6),
('Elena', 'Rodríguez', 'e.rodriguez@gmail.com', 'cont5678', 40, 800, 'web/img/alumno3.jpg', 6),
('María', 'Alonso', 'maria.alonso@gmail.com', 'cont5678', 82, 1654, 'web/img/alumno4.jpg', 6),
('Roberto', 'García', 'robertoG@gmail.com', 'cont5678', 95, 1935, 'web/img/alumno5.jpg', 6),

('Lola', 'Pérez', 'lolaperez@gmail.com', 'cont5678', 255, 1200, 'web/img/alumno1.jpg', 7),
('Raúl', 'González', 'raulitog@gmail.com', 'cont5678', 61, 1520, 'web/img/alumno2.jpg', 7),
('Elena', 'Rodríguez', 'e.rodriguez@gmail.com', 'cont5678', 40, 800, 'web/img/alumno3.jpg', 7),
('María', 'Alonso', 'maria.alonso@gmail.com', 'cont5678', 82, 1654, 'web/img/alumno4.jpg', 7),
('Roberto', 'García', 'robertoG@gmail.com', 'cont5678', 95, 1935, 'web/img/alumno5.jpg', 7),

('Lola', 'Pérez', 'lolaperez@gmail.com', 'cont5678', 255, 1200, 'web/img/alumno1.jpg', 8),
('Raúl', 'González', 'raulitog@gmail.com', 'cont5678', 61, 1520, 'web/img/alumno2.jpg', 8),
('Elena', 'Rodríguez', 'e.rodriguez@gmail.com', 'cont5678', 40, 800, 'web/img/alumno3.jpg', 8),
('María', 'Alonso', 'maria.alonso@gmail.com', 'cont5678', 82, 1654, 'web/img/alumno4.jpg', 8),
('Roberto', 'García', 'robertoG@gmail.com', 'cont5678', 95, 1935, 'web/img/alumno5.jpg', 8),

('Lola', 'Pérez', 'lolaperez@gmail.com', 'cont5678', 255, 1200, 'web/img/alumno1.jpg', 9),
('Raúl', 'González', 'raulitog@gmail.com', 'cont5678', 61, 1520, 'web/img/alumno2.jpg', 9),
('Elena', 'Rodríguez', 'e.rodriguez@gmail.com', 'cont5678', 40, 800, 'web/img/alumno3.jpg', 9),
('María', 'Alonso', 'maria.alonso@gmail.com', 'cont5678', 82, 1654, 'web/img/alumno4.jpg', 9),
('Roberto', 'García', 'robertoG@gmail.com', 'cont5678', 95, 1935, 'web/img/alumno5.jpg', 9),

('Lola', 'Pérez', 'lolaperez@gmail.com', 'cont5678', 255, 1200, 'web/img/alumno1.jpg', 10),
('Raúl', 'González', 'raulitog@gmail.com', 'cont5678', 61, 1520, 'web/img/alumno2.jpg', 10),
('Elena', 'Rodríguez', 'e.rodriguez@gmail.com', 'cont5678', 40, 800, 'web/img/alumno3.jpg', 10),
('María', 'Alonso', 'maria.alonso@gmail.com', 'cont5678', 82, 1654, 'web/img/alumno4.jpg', 10),
('Roberto', 'García', 'robertoG@gmail.com', 'cont5678', 95, 1935, 'web/img/alumno5.jpg', 10);


INSERT INTO PROFE (NOMBRE_PROFE, APELLIDO_PROFE, EMAIL_PROFE, CONTRASENA_PROFE, IMG_PROFE, ID_CENTR) VALUES
('Alfonso', 'Muñoz', 'alfonsomuñoz@gmail.com', 'cont5678', 'web/img/profe1.jpg', 1),
('Emilia', 'HernÁndez', 'e.Hernandez@gmail.com', 'cont5678', 'web/img/profe2.jpg', 1),
('Gabriel', 'Márquez', 'gabrielMarquez@gmail.com', 'cont5678', 'web/img/profe3.jpg', 1),
('Isabel', 'Ordóñez', 'isabelordoñez@gmail.com', 'cont5678', 'web/img/profe4.jpg', 1),

('Alfonso', 'Muñoz', 'alfonsomuñoz@gmail.com', 'cont5678', 'web/img/profe1.jpg', 2),
('Emilia', 'HernÁndez', 'e.Hernandez@gmail.com', 'cont5678', 'web/img/profe2.jpg', 2),
('Gabriel', 'Márquez', 'gabrielMarquez@gmail.com', 'cont5678', 'web/img/profe3.jpg', 2),
('Isabel', 'Ordóñez', 'isabelordoñez@gmail.com', 'cont5678', 'web/img/profe4.jpg', 2),

('Alfonso', 'Muñoz', 'alfonsomuñoz@gmail.com', 'cont5678', 'web/img/profe1.jpg',3),
('Emilia', 'HernÁndez', 'e.Hernandez@gmail.com', 'cont5678', 'web/img/profe2.jpg',3),
('Gabriel', 'Márquez', 'gabrielMarquez@gmail.com', 'cont5678', 'web/img/profe3.jpg',3),
('Isabel', 'Ordóñez', 'isabelordoñez@gmail.com', 'cont5678', 'web/img/profe4.jpg', 3);


INSERT INTO ASIGN (NOMBRE_ASIGN, ID_PROFE) VALUES
('Lengua castellana y literatura', 1),
('Inglés', 1),
('Matemáticas', 2),
('Biología y Geología', 2),
('Física y Química', 2),
('Ciencias Sociales', 3),
('Música', 3),
('Matemáticas', 4),
('Biología y Geología', 4),
('Lengua castellana y literatura', 5),
('Valores Éticos', 5),
('Matemáticas', 6),
('Tecnología', 6),
('Educación Física', 7),
('Biología y Geología', 7),
('Educación plástica y audiovisual', 8),
('Lengua Castellana y Literatura', 9),
('Latín', 9),
('Economía', 10),
('Matemáticas', 10),
('Biología y Geología', 11),
('Ciencias Sociales', 12);


INSERT INTO TEMAS (NOMBRE_TEMAS, TRIMESTRE_TEMAS, ID_ASIGN) VALUES
('El lenguaje literario', 1, 1),
('La narración, el lenguaje oral/ escrito, primitivas, derivadas y géneros literarios', 1, 1),
('Género nominal, sustantivos. Escribir carta y épica castellana', 1, 1),
('Descripción. Adjetivos, forma y uso', 1, 1),

('El lenguaje literario', 1, 5),
('La narración, el lenguaje oral/ escrito, primitivas, derivadas y géneros literarios', 1, 5),
('Género nominal, sustantivos. Escribir carta y épica castellana', 1, 5),
('Descripción. Adjetivos, forma y uso', 1, 5),

('El lenguaje literario', 1, 9),
('La narración, el lenguaje oral/ escrito, primitivas, derivadas y géneros literarios', 1, 9),
('Género nominal, sustantivos. Escribir carta y épica castellana', 1, 9),
('Descripción. Adjetivos, forma y uso', 1, 9),

('Los números primos', 1, 2);


INSERT INTO ENTRE (NOMBRE_ENTRE, DESCR_ENTRE, ID_TEMAS) VALUES
('Título de test de entrenamiento 1', 'Descripción de test de entrenamiento 1', 1),
('Título de test de entrenamiento 2', 'Descripción de test de entrenamiento 2', 13);

INSERT INTO FINAL (NOMBRE_FINAL, DESCR_FINAL, ID_TEMAS) VALUES
('Título de test de final', 'Descripción de test de final', 1);

INSERT INTO PREGU_ENTRE (ENUNCIADO_PREGU_ENTRE, ID_ENTRE) VALUES
('¿Qué escritor no pertenece a la Generación del 27?', 1),
('¿Qué es la Generación del 27?', 1),
('¿Quién escribió «La Colmena»?', 1),
('¿Qué escritora no es española?', 1),
('¿Qué libro no es del siglo XX?', 1),
('¿Cuál de estos libros no escribió Benito Pérez Galdós?', 1),
('¿Qué poema escribió Federico García Lorca?', 1),
('¿Qué escritora es la máxima representante del nturalismo en España?', 1),
('¿Cómo se llamaba la compañía teatral de Federico García Lorca?', 1),
('¿Quién escribió «Nada»?', 1),
('2 ¿Qué escritor no pertenece a la Generación del 27?', 2),
('2 ¿Qué es la Generación del 27?', 2),
('2 ¿Quién escribió «La Colmena»?', 2),
('2 ¿Qué escritora no es española?', 2),
('2 ¿Qué libro no es del siglo XX?', 2),
('2 ¿Cuál de estos libros no escribió Benito Pérez Galdós?', 2),
('2 ¿Qué poema escribió Federico García Lorca?', 2),
('2 ¿Qué escritora es la máxima representante del nturalismo en España?', 2),
('2 ¿Cómo se llamaba la compañía teatral de Federico García Lorca?', 2),
('2 ¿Quién escribió «Nada»?', 2);

INSERT INTO PREGU_FINAL (ENUNCIADO_PREGU_FINAL, ID_FINAL) VALUES
('FINAL ¿Qué escritor no pertenece a la Generación del 27?', 1),
('FINAL ¿Qué es la Generación del 27?', 1),
('FINAL ¿Quién escribió «La Colmena»?', 1),
('FINAL ¿Qué escritora no es española?', 1),
('FINAL ¿Qué libro no es del siglo XX?', 1),
('FINAL ¿Cuál de estos libros no escribió Benito Pérez Galdós?', 1),
('FINAL ¿Qué poema escribió Federico García Lorca?', 1),
('FINAL ¿Qué escritora es la máxima representante del nturalismo en España?', 1),
('FINAL ¿Cómo se llamaba la compañía teatral de Federico García Lorca?', 1),
('FINAL ¿Quién escribió «Nada»?', 1);

INSERT INTO RESPU_ENTRE (TEXTO_RESPU_ENTRE, PESO_RESPU_ENTRE, CORRECTA_RESPUE_ENTRE, ID_PREGU_ENTRE) VALUES
('Respuesta 1', 1, 0, 1),
('Respuesta 2', 2, 0, 1),
('Respuesta 3', 3, 0, 1),
('Respuesta 4', 4, 1, 1),
('Respuesta 1', 1, 0, 2),
('Respuesta 2', 2, 0, 2),
('Respuesta 3', 3, 0, 2),
('Respuesta 4', 4, 1, 2),
('Respuesta 1', 1, 0, 3),
('Respuesta 2', 2, 0, 3),
('Respuesta 3', 3, 0, 3),
('Respuesta 4', 4, 1, 3),
('Respuesta 1', 1, 0, 4),
('Respuesta 2', 2, 0, 4),
('Respuesta 3', 3, 0, 4),
('Respuesta 4', 4, 1, 4),
('Respuesta 1', 1, 0, 5),
('Respuesta 2', 2, 0, 5),
('Respuesta 3', 3, 0, 5),
('Respuesta 4', 4, 1, 5),
('Respuesta 1', 1, 0, 6),
('Respuesta 2', 2, 0, 6),
('Respuesta 3', 3, 0, 6),
('Respuesta 4', 4, 1, 6),
('Respuesta 1', 1, 0, 7),
('Respuesta 2', 2, 0, 7),
('Respuesta 3', 3, 0, 7),
('Respuesta 4', 4, 1, 7),
('Respuesta 1', 1, 0, 8),
('Respuesta 2', 2, 0, 8),
('Respuesta 3', 3, 0, 8),
('Respuesta 4', 4, 1, 8),
('Respuesta 1', 1, 0, 9),
('Respuesta 2', 2, 0, 9),
('Respuesta 3', 3, 0, 9),
('Respuesta 4', 4, 1, 9),
('Respuesta 1', 1, 0, 10),
('Respuesta 2', 2, 0, 10),
('Respuesta 3', 3, 0, 10),
('Respuesta 4', 4, 1, 10),
('Respuesta 1', 1, 0, 11),
('Respuesta 2', 2, 0, 11),
('Respuesta 3', 3, 0, 11),
('Respuesta 4', 4, 1, 11),
('Respuesta 1', 1, 0, 12),
('Respuesta 2', 2, 0, 12),
('Respuesta 3', 3, 0, 12),
('Respuesta 4', 4, 1, 12),
('Respuesta 1', 1, 0, 13),
('Respuesta 2', 2, 0, 13),
('Respuesta 3', 3, 0, 13),
('Respuesta 4', 4, 1, 13),
('Respuesta 1', 1, 0, 14),
('Respuesta 2', 2, 0, 14),
('Respuesta 3', 3, 0, 14),
('Respuesta 4', 4, 1, 14),
('Respuesta 1', 1, 0, 15),
('Respuesta 2', 2, 0, 15),
('Respuesta 3', 3, 0, 15),
('Respuesta 4', 4, 1, 15),
('Respuesta 1', 1, 0, 16),
('Respuesta 2', 2, 0, 16),
('Respuesta 3', 3, 0, 16),
('Respuesta 4', 4, 1, 16),
('Respuesta 1', 1, 0, 17),
('Respuesta 2', 2, 0, 17),
('Respuesta 3', 3, 0, 17),
('Respuesta 4', 4, 1, 17),
('Respuesta 1', 1, 0, 18),
('Respuesta 2', 2, 0, 18),
('Respuesta 3', 3, 0, 18),
('Respuesta 4', 4, 1, 18),
('Respuesta 1', 1, 0, 19),
('Respuesta 2', 2, 0, 19),
('Respuesta 3', 3, 0, 19),
('Respuesta 4', 4, 1, 19),
('Respuesta 1', 1, 0, 20),
('Respuesta 2', 2, 0, 20),
('Respuesta 3', 3, 0, 20),
('Respuesta 4', 4, 1, 20);

INSERT INTO RESPU_FINAL (TEXTO_RESPU_FINAL, PESO_RESPU_FINAL, CORRECTA_RESPUE_FINAL, ID_PREGU_FINAL) VALUES
('Respuesta 1', 1, 0, 1),
('Respuesta 2', 2, 0, 1),
('Respuesta 3', 3, 0, 1),
('Respuesta 4', 4, 1, 1),
('Respuesta 1', 1, 0, 2),
('Respuesta 2', 2, 0, 2),
('Respuesta 3', 3, 0, 2),
('Respuesta 4', 4, 1, 2),
('Respuesta 1', 1, 0, 3),
('Respuesta 2', 2, 0, 3),
('Respuesta 3', 3, 0, 3),
('Respuesta 4', 4, 1, 3),
('Respuesta 1', 1, 0, 4),
('Respuesta 2', 2, 0, 4),
('Respuesta 3', 3, 0, 4),
('Respuesta 4', 4, 1, 4),
('Respuesta 1', 1, 0, 5),
('Respuesta 2', 2, 0, 5),
('Respuesta 3', 3, 0, 5),
('Respuesta 4', 4, 1, 5),
('Respuesta 1', 1, 0, 6),
('Respuesta 2', 2, 0, 6),
('Respuesta 3', 3, 0, 6),
('Respuesta 4', 4, 1, 6),
('Respuesta 1', 1, 0, 7),
('Respuesta 2', 2, 0, 7),
('Respuesta 3', 3, 0, 7),
('Respuesta 4', 4, 1, 7),
('Respuesta 1', 1, 0, 8),
('Respuesta 2', 2, 0, 8),
('Respuesta 3', 3, 0, 8),
('Respuesta 4', 4, 1, 8),
('Respuesta 1', 1, 0, 9),
('Respuesta 2', 2, 0, 9),
('Respuesta 3', 3, 0, 9),
('Respuesta 4', 4, 1, 9),
('Respuesta 1', 1, 0, 10),
('Respuesta 2', 2, 0, 10),
('Respuesta 3', 3, 0, 10),
('Respuesta 4', 4, 1, 10);

INSERT INTO REL_GRUPO_ASIGN (ID_GRUPO, ID_ASIGN) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2);

INSERT INTO REL_ALUMN_ENTRE (FECHA_REL_ALUMN_ENTRE, ID_ALUMN, ID_ENTRE) VALUES
(DATE('2017-11-01'), 1, 1);

INSERT INTO REL_ALUMN_FINAL (PUNTOS_REL_ALUMN_FINAL, ID_ALUMN, ID_FINAL) VALUES
(430, 1, 1);