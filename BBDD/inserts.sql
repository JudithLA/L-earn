-- Datos de los centros:
-- Nombre del centro, Comunidad Autónoma, Municipio, Código Postal
INSERT INTO CENTR (NOMBRE_CENTR, COMUNIDAD_CENTR, MUNICIPIO_CENTR, CP_CENTR) VALUES
('I.E.S. Alameda de Osuna', 'Madrid', 'Madrid', 28042);
('I.E.S. Alfredo Kraus', 'Madrid', 'Madrid', 28022);
('I.E.S. Antonio Domínguez Ortiz', 'Madrid', 'Madrid', 28038);
('I.E.S. Avenida de los Toreros', 'Madrid', 'Madrid', 28028);
('I.E.S. Beatriz Galindo', 'Madrid', 'Madrid', 28001);
('I.E.S. Blas de Otero', 'Madrid', 'Madrid', 28024);
('I.E.S. Cardenal Herrera Oria', 'Madrid', 'Madrid', 28034);
('I.E.S. Cervantes', 'Madrid', 'Madrid', 28012);
('I.E.S. Ciudad de Jaen', 'Madrid', 'Madrid', 28041);
('I.E.S. Ciudad de los Poetas', 'Madrid', 'Madrid', 28039);
('I.E.S. Conde Orgaz', 'Madrid', 'Madrid', 28043);
('I.E.S. Fortuny', 'Madrid', 'Madrid', 28010);
('I.E.S. Francisco de Goya', 'Madrid', 'Madrid', 28017);



-- Datos de los cursos:
-- Nivel del curso (ejemplo: 1º E. S. O.), ID de centro existente
INSERT INTO CURSO (NIVEL_CURSO, ID_CENTR) VALUES
('1º E.S.O.', 1);

-- Datos de los grupos:
-- Letra del grupo (ejemplo: A, B), ID de curso existente
INSERT INTO GRUPO (LETRA_GRUPO, ID_CURSO) VALUES
('A', 1);


-- Datos de los alumnos:
-- Nombre del alumno, apellido del alumno, email del alumno, contraseña del alumno, puntos de experiencia, puntos finales, imagen del alumno, ID de grupo existente
INSERT INTO ALUMN (NOMBRE_ALUMN, APELLIDO_ALUMN, EMAIL_ALUMN, CONTRASENA_ALUMN, EXPERIENCIA_ALUMN, PUNTOS_ALUMN, IMG_ALUMN, ID_GRUPO) VALUES
('Lola', 'Perez', 'lolaperez@gmail.com', 'lolaLOLA', 55, 1200, 'web/img/alumno1.jpg', 1);
('Raul', 'Gonzalez', 'raulitog@gmail.com', 'raul2017', 61, 1520, 'web/img/alumno2.jpg', 1);
('Elena', 'Rodriguez', 'e.rodriguez@gmail.com', 'ELENITAelena', 40, 800, 'web/img/alumno3.jpg', 1);
('Maria', 'Alonso', 'maria.alonso@gmail.com', 'alonsomaria', 82, 1654, 'web/img/alumno4.jpg', 1);
('Roberto', 'Garcia', 'robertoG@gmail.com', 'ROBERTO99', 95, 1935, 'web/img/alumno5.jpg', 1);

-- Datos de los profesores:
-- Nombre del profesor, apellido del profesor, email del profesor, contraseña del profesor, imagen del profesor, ID de centro existente
INSERT INTO ALUMN (NOMBRE_PROFE, APELLIDO_PROFE, EMAIL_PROFE, CONTRASENA_PROFE, IMG_PROFE, ID_CENTR) VALUES
('Alfonso', 'Muñoz', 'alfonsomuñoz@gmail.com', 'alfMUÑOZ21', 'web/img/profe1.jpeg', 1);
('Emilia', 'Hernandez', 'E.Hernandez@gmail.com', 'eHERNANDEZ12', 'web/img/profe2.jpeg', 1);
('Gabriel', 'Márquez', 'GabrielMarquez@gmail.com', 'GABImarquez', 'web/img/profe3.jpeg', 1);
('Isabel', 'Ordoñez', 'IsabelOrdoñez@gmail.com', 'ISABELordoñez', 'web/img/profe4.jpeg', 1);
-- Datos de las asignaturas:
-- Nombre de la asignatura, ID de profesor existente
INSERT INTO ASIGN (NOMBRE_ASIGN, ID_PROFE) VALUES
('Lengua', 1);

-- Datos de los temas:
-- Nombre del tema, Trimestre del tema (ejemplo: 1, 2, 3), ID de asignatura existente
INSERT INTO TEMAS (NOMBRE_TEMAS, TRIMESTRE_TEMAS, ID_ASIGN) VALUES
('El lenguaje literario', 1, 1);
('La narración, el lenguaje oral/ escrito, primitivas, derivadas y géneros literarios', 1, 1);
('Género nominal, sustantivos. Escribir carta y épica castellana', 1, 1);
('Descripción. Adjetivos, forma y uso', 1, 1);

