-- Datos de los centros:
-- Nombre del centro, Comunidad Autónoma, Municipio, Código Postal
INSERT INTO CENTR (NOMBRE_CENTR, COMUNIDAD_CENTR, MUNICIPIO_CENTR, CP_CENTR) VALUES
('', '', '', 0);


-- Datos de los cursos:
-- Nivel del curso (ejemplo: 1º E. S. O.), ID de centro existente
INSERT INTO CURSO (NIVEL_CURSO, ID_CENTR) VALUES
('', 0);

-- Datos de los grupos:
-- Letra del grupo (ejemplo: A, B), ID de curso existente
INSERT INTO GRUPO (LETRA_GRUPO, ID_CURSO) VALUES
('', 0);


-- Datos de los alumnos:
-- Nombre del alumno, apellido del alumno, email del alumno, contraseña del alumno, puntos de experiencia, puntos finales, imagen del alumno, ID de grupo existente
INSERT INTO ALUMN (NOMBRE_ALUMN, APELLIDO_ALUMN, EMAIL_ALUMN, CONTRASENA_ALUMN, EXPERIENCIA_ALUMN, PUNTOS_ALUMN, IMG_ALUMN, ID_GRUPO) VALUES
('', '', '', '', 0, 0, 'web/img/nombredelaimagen.jpg', 0);

-- Datos de los profesores:
-- Nombre del profesor, apellido del profesor, email del profesor, contraseña del profesor, imagen del profesor, ID de centro existente
INSERT INTO ALUMN (NOMBRE_PROFE, APELLIDO_PROFE, EMAIL_PROFE, CONTRASENA_PROFE, IMG_PROFE, ID_CENTR) VALUES
('', '', '', '', 'web/img/nombredelaimagen.jpg', 0);


-- Datos de las asignaturas:
-- Nombre de la asignatura, ID de profesor existente
INSERT INTO ASIGN (NOMBRE_ASIGN, ID_PROFE) VALUES
('', 0);

-- Datos de los temas:
-- Nombre del tema, Trimestre del tema (ejemplo: 1, 2, 3), ID de asignatura existente
INSERT INTO TEMAS (NOMBRE_TEMAS, TRIMESTRE_TEMAS, ID_ASIGN) VALUES
('', 1, 0);
