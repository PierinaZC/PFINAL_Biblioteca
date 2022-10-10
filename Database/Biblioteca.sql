/*CREAR UNA BASE DE DATOS LLAMADA BIBLIOTECA*/
CREATE  DATABASE biblioteca;
/*USAMOS LA BD BIBLIOTECA*/
USE  biblioteca;
/*CREAR TABLAS*/
/*ALUMNO*/
CREATE TABLE `alumno` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombres` varchar(45) DEFAULT NULL,
  `id_carrera` int DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefono` int DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FKTipoCarrera_idx` (`id_carrera`),
  CONSTRAINT `FKTipoCarrera` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id`)
) ;
/*INSERTAR REGISTRO*/
INSERT INTO `alumno` (`id`, `nombres`, `id_carrera`, `direccion`, `email`, `telefono`)
 VALUES ('1', 'Pierina', '1', 'Av.Alisos', 'pieri@gmail.com', '987456321');
/*SELECCIONAR LA TABLA*/
SELECT * FROM alumno;
/*CARRERA*/
CREATE TABLE `carrera` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
);
/*INSERTAR REGISTRO*/
INSERT INTO `biblioteca`.`carrera` (`id`, `nombre`, `estado`) VALUES ('4', 'Diseñador gráfico', '1');
INSERT INTO `biblioteca`.`carrera` (`id`, `nombre`, `estado`) VALUES ('5', 'Biología humana', '1');
INSERT INTO `biblioteca`.`carrera` (`id`, `nombre`) VALUES ('6', 'Psicólogia','1');
INSERT INTO `biblioteca`.`carrera` (`id`, `nombre`) VALUES ('7', 'Ingeniero industrial','1');
INSERT INTO `biblioteca`.`carrera` (`id`, `nombre`) VALUES ('8', 'Ingeniero civil','1');
INSERT INTO `biblioteca`.`carrera` (`id`, `nombre`) VALUES ('9', 'Arquitectura','1');
INSERT INTO `biblioteca`.`carrera` (`id`, `nombre`) VALUES ('10', 'Estudios Internacionales','1');
/*SELECCIONAR LA TABLA*/
SELECT * FROM carrera;
/*LIBROS*/
CREATE TABLE `libro` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `id_autor` int DEFAULT NULL,
  `id_editorial` int DEFAULT NULL,
  `id_categoria` int DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FKTipoAutor_idx` (`id_autor`),
  KEY `FKTipoEditorial_idx` (`id_editorial`),
  KEY `FKTipoCategoria_idx` (`id_categoria`),
  CONSTRAINT `FKTipoAutor` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id`),
  CONSTRAINT `FKTipoCategoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`),
  CONSTRAINT `FKTipoEditorial` FOREIGN KEY (`id_editorial`) REFERENCES `editorial` (`id`)
) ;
/*INSERTAR REGISTRO*/
INSERT INTO `biblioteca`.`libro` (`id`, `titulo`, `id_autor`, `id_editorial`, `id_categoria`, `estado`) VALUES ('1', '100 Años de Soledad', '1', '1', '2', '1');
/*SELECCIONAR LA TABLA*/
SELECT * FROM libro;
/*AUTOR*/
CREATE TABLE `autor` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `fnac` DATE NULL,
  `estado` TINYINT(1) DEFAULT '1',
  PRIMARY KEY (`id`));
  /*INSERTAR REGISTRO*/
  INSERT INTO `biblioteca`.`autor` (`id`, `nombre`, `fnac`, `estado`) VALUES ('1', 'Gabriel García Márquez', '1927/03/06', '1');
/*SELECCIONAR LA TABLA*/
SELECT * FROM autor;
/*CATEGORIA*/
CREATE TABLE `categoria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `estado` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`));
/*INSERTAR REGISTRO*/
INSERT INTO `biblioteca`.`categoria` (`id`, `nombre`, `estado`) VALUES ('1', 'Arte', '1');
INSERT INTO `biblioteca`.`categoria` (`id`, `nombre`, `estado`) VALUES ('2', 'Literatura', '1');
INSERT INTO `biblioteca`.`categoria` (`id`, `nombre`, `estado`) VALUES ('3', 'Ciencias Aplcadas', '1');
INSERT INTO `biblioteca`.`categoria` (`id`, `nombre`, `estado`) VALUES ('4', 'Religion', '1');
INSERT INTO `biblioteca`.`categoria` (`id`, `nombre`, `estado`) VALUES ('5', 'Psicologia', '1');
INSERT INTO `biblioteca`.`categoria` (`id`, `nombre`, `estado`) VALUES ('6', 'Geografia', '1');
INSERT INTO `biblioteca`.`categoria` (`id`, `nombre`, `estado`) VALUES ('7', 'Historia', '1');
INSERT INTO `biblioteca`.`categoria` (`id`, `nombre`, `estado`) VALUES ('8', 'Ciencias Sociales ', '1');
INSERT INTO `biblioteca`.`categoria` (`id`, `nombre`, `estado`) VALUES ('9', 'Diccionarios', '1');
INSERT INTO `biblioteca`.`categoria` (`id`, `nombre`, `estado`) VALUES ('10', 'Enciclopedias', '1');
/*SELECCIONAR LA TABLA*/
SELECT * FROM categoria;
/*EDITORIAL*/
CREATE TABLE `editorial` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `direccion` VARCHAR(45) NULL,
  `estado` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`));
/*INSERTAR REGISTRO*/
INSERT INTO `biblioteca`.`editorial` (`id`, `nombre`, `direccion`, `estado`) VALUES ('1', 'Editorial Sudamericana', 'Buenas Aires', '1');
/*SELECCIONAR LA TABLA*/
SELECT * FROM editorial;
/*PRESTAMO*/
CREATE TABLE `prestamo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_alumno` int DEFAULT NULL,
  `id_libro` int DEFAULT NULL,
  `fechaPrestamo` date DEFAULT NULL,
  `horaPrestamo` time DEFAULT NULL,
  `id_tipo_prestamo` int DEFAULT NULL,
  `fechaEntrega` date DEFAULT NULL,
  `horaEntrega` time DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FKTipoAlumno_idx` (`id_alumno`),
  KEY `FKTipoLibro_idx` (`id_libro`),
  KEY `FKTipoPrestamo_idx` (`id_tipo_prestamo`),
  CONSTRAINT `FKTipoAlumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id`),
  CONSTRAINT `FKTipoLibro` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id`),
  CONSTRAINT `FKTipoPrestamo` FOREIGN KEY (`id_tipo_prestamo`) REFERENCES `tipo_prestamo` (`id`)
) ;
/*SELECCIONAR LA TABLA*/
SELECT * FROM prestamo;
/*TIPO PRESTAMO*/
CREATE TABLE `tipo_prestamo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NULL,
  `estado` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`));
/*INSERTAR REGISTRO*/
INSERT INTO `biblioteca`.`tipo_prestamo` (`id`, `tipo`, `estado`) VALUES ('1', 'Domiciliario', '1');
INSERT INTO `biblioteca`.`tipo_prestamo` (`id`, `tipo`, `estado`) VALUES ('2', 'Normal', '1');
/*SELECCIONAR LA TABLA*/
SELECT * FROM tipo_prestamo;
