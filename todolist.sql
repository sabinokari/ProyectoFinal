-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2023 a las 23:47:59
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `todolist`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertartareas` (`TA` VARCHAR(100), `COM` TINYINT)   BEGIN
INSERT INTO TAREAS (TAREA,COMPLETADA)
VALUES(TA,COM);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuarionuevo` (`ID` INT, `NOM` VARCHAR(30), `APE` VARCHAR(30), `CARG` VARCHAR(30), `DNI` INT, `TELEF` VARCHAR(9), `USU` VARCHAR(20), `CONTRA` VARCHAR(20))   BEGIN
INSERT INTO USUARIO 
VALUES(ID, NOM, APE, CARG, DNI, TELEF, USU, CONTRA);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(11) NOT NULL,
  `tarea` varchar(255) NOT NULL,
  `completada` tinyint(1) NOT NULL DEFAULT 0,
  `prioridad` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `tarea`, `completada`, `prioridad`) VALUES
(11, 'trabajar', 0, 'Normal'),
(12, 'Jugar', 0, 'Alta'),
(13, 'Manejar', 0, 'medio'),
(16, 'Manejar', 1, 'Normal'),
(17, 'Jugarr', 1, 'Alta'),
(35, 'nueva tarea', 1, 'Media'),
(36, 'Tarea Nueva', 1, 'Alta'),
(37, 'Manejar', 1, 'Normal'),
(38, 'Bailarrrr', 1, 'Media');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  `dni` int(11) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contrasenia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido`, `cargo`, `dni`, `telefono`, `usuario`, `contrasenia`) VALUES
(1, 'Sabino', 'Kari', 'Operador', 43434343, '756354625', 'admin', 'admin'),
(2, 'Jean Carlo', 'Bueleje', 'Gerente', 43434312, '545454545', 'jbuleje', '123456'),
(3, 'Harry', 'Quino', 'Asistente', 34234234, '33242342|', 'hquino', '123456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
