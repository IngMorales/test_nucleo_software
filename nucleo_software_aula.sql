CREATE DATABASE IF NOT EXISTS `nucleo_software_aula` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `nucleo_software_aula`;

CREATE TABLE IF NOT EXISTS `menu` (
  `idmenu` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `icono` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `url` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idmenu`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`idmenu`, `nombre`, `icono`, `url`, `estado`) VALUES
(1, 'Estudiantes', 'nav-icon fas fa-users', '#', 1),
(2, 'Cursos', 'nav-icon fas fa-bookmark', '#', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submenu`
--

CREATE TABLE IF NOT EXISTS `submenu` (
  `idsubmenu` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `icono` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `url` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `fk_menu` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsubmenu`) USING BTREE,
  KEY `llave_menu_submenu_idx` (`fk_menu`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `submenu`
--

INSERT INTO `submenu` (`idsubmenu`, `nombre`, `icono`, `url`, `fk_menu`, `estado`) VALUES
(1, 'Crear Estudiante', 'far fa-circle nav-icon', 'crear-estudiante', 1, 1),
(2, 'Gestionar Estudiante', 'far fa-circle nav-icon', 'gestionar-estudiante', 1, 1),
(3, 'Asignar Curso', 'far fa-circle nav-icon', 'asignar-curso', 1, 1),
(4, 'Crear Curso', 'far fa-circle nav-icon', 'crear-curso', 2, 1),
(5, 'Gestionar Curso', 'far fa-circle nav-icon', 'gestionar-curso', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test_courses`
--

CREATE TABLE IF NOT EXISTS `test_courses` (
  `c_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT 'Course name',
  `credits` smallint(6) DEFAULT '1' COMMENT 'Academic credits',
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `test_courses`
--

INSERT INTO `test_courses` (`c_id`, `name`, `credits`) VALUES
(1, 'Open sea survival', 10),
(2, 'GENETIC MANIPULATION', 100),
(3, 'Crocodile training', 2),
(4, 'Advanced mapalé dancing', 4),
(5, 'METAVERSE EXTREME SPORTS', 5),
(7, 'Matematicas', 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test_courses_x_student`
--

CREATE TABLE IF NOT EXISTS `test_courses_x_student` (
  `cxs_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `c_id` int(10) UNSIGNED NOT NULL,
  `s_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`cxs_id`),
  KEY `FK_test_1_idx` (`s_id`),
  KEY `FK_test_2_idx` (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `test_courses_x_student`
--

INSERT INTO `test_courses_x_student` (`cxs_id`, `c_id`, `s_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 2, 3),
(4, 3, 2),
(5, 4, 7),
(6, 5, 7),
(7, 1, 4),
(8, 1, 8),
(9, 2, 5),
(10, 3, 3),
(11, 5, 3),
(12, 2, 12),
(14, 4, 12),
(17, 3, 12),
(20, 1, 2),
(21, 3, 13),
(22, 5, 13),
(23, 1, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test_students`
--

CREATE TABLE IF NOT EXISTS `test_students` (
  `s_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `lv_id` smallint(6) DEFAULT NULL COMMENT 'Level or grade',
  `grupo` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Student group or classroom',
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `geolocation` varchar(200) DEFAULT NULL COMMENT 'String containing latitude and longitude',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `test_students`
--

INSERT INTO `test_students` (`s_id`, `first_name`, `last_name`, `lv_id`, `grupo`, `email`, `phone_number`, `geolocation`, `status`) VALUES
(1, 'Aitor', 'Menta', 1, 'A', 'aitor@google.com', '345346-54', '10.253652685182912,-75.34695290787532', 1),
(2, 'SOILA', 'PUERTA DEL CORRAL', 1, 'B', 'sp@nasa.gov', '6244566', '10.249488499691639,-75.3477954475428', 1),
(3, 'Pere', 'Gil', 1, 'A', 'PERE@SAMSUNG.COM', '73563456', '10.249799123271258,-75.34925152563993', 0),
(4, 'Aquiles', 'Pinto Cuadros', 2, 'A', 'aquiles@amazon.com', '456345634', '-11.329163673002578,-101.05707217964823', 1),
(5, 'Aitor', 'Tilla', 2, 'A', 'aitor@fbi.gov', '5345355', '6.173310260137041,-75.33102681081111', 1),
(6, 'Elba', 'Surero', 2, 'B', 'elba@area51.org', '456654 ext 2', '10.250401717562466,-75.35398133602904', 1),
(7, 'LOLA', 'MENTO', 3, 'C', 'lola@facebook.com', '555555', '10.249548377811047,-75.34752227877071', 0),
(8, 'Helen', 'Chufe', 3, 'C', 'HELEN@APPLE.COM', '666666', '6.171133491565565,-75.33362885177205', 1),
(9, 'Carlos', 'Mario', 4, 'B', 'carlosmario@gmail.com', '6664444', '6.171133491565565,-75.33362885177205', 1),
(12, 'Ing. Aldair', 'Morales Cuéllar', 3, 'B', 'al-dair12@hotmail.es', '3103199146', '6.171133491565565,-75.33362885177205', 0),
(13, 'Pablo', 'Castro', 2, 'B', 'pablocastro@gmail.com', '45124514', '6.171133491565565,-75.33362885177205', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `submenu`
--
ALTER TABLE `submenu`
  ADD CONSTRAINT `llave_menu_submenu` FOREIGN KEY (`fk_menu`) REFERENCES `menu` (`idmenu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `test_courses_x_student`
--
ALTER TABLE `test_courses_x_student`
  ADD CONSTRAINT `FK_test_1` FOREIGN KEY (`s_id`) REFERENCES `test_students` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_test_2` FOREIGN KEY (`c_id`) REFERENCES `test_courses` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;
