-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2019 a las 10:19:48
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cadxela_biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adeudos`
--

CREATE TABLE `adeudos` (
  `id_adeudo` int(10) UNSIGNED NOT NULL COMMENT 'Llave primaria del adeudo',
  `matricula_estudiante` varchar(10) NOT NULL COMMENT 'Matrícula del estudiante que generó el adeudo',
  `id_libro` int(10) UNSIGNED NOT NULL COMMENT 'Identificador del libro que adeuda el estudiante',
  `descripcion` varchar(255) NOT NULL COMMENT 'Descripción breve del motivo del adeudo utilizando como máximo 255 caracteres',
  `fecha_adeudo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha y hora relativo al epoch en que se generó el adeudo. Este campo se genera al momento de insertar el registro',
  `fecha_reposicion` timestamp NULL DEFAULT NULL COMMENT 'Fecha y hora relativo al epoch en que se repuso el libro que se adeudaba. Si el campo es nulo, entonces significa que el estudiante aún tiene el adeudo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla que registra los adeudos que se han generado';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `id_autor` int(10) UNSIGNED NOT NULL COMMENT 'Llave primaria del autor',
  `nombre` varchar(255) NOT NULL COMMENT 'Nombre del autor',
  `apellidos` varchar(255) NOT NULL COMMENT 'Apellidos del autor'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catálogo de autores de libros';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores_x_libro`
--

CREATE TABLE `autores_x_libro` (
  `id_libro` int(10) UNSIGNED NOT NULL COMMENT 'Identificador del libro al que se le asignará el autor',
  `id_autor` int(10) UNSIGNED NOT NULL COMMENT 'Identificador del autor que se asignará al libro'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(10) UNSIGNED NOT NULL COMMENT 'Llave primaria de la categoría',
  `categoria` varchar(255) NOT NULL COMMENT 'Nombre de la categoría'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catálogo de categorías para libros.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(10) UNSIGNED NOT NULL COMMENT 'Llave primaria del empleado',
  `nombre` varchar(255) NOT NULL COMMENT 'Nombre del empleado',
  `apellidos` varchar(255) NOT NULL COMMENT 'Apellidos del empleado',
  `rol` tinyint(3) UNSIGNED NOT NULL COMMENT 'Rol del empleado. 0 = administrador, 1 = bibliotecario',
  `email` varchar(255) NOT NULL COMMENT 'E-mail del empleado. Usado para acceder al sistema',
  `password` varchar(64) NOT NULL COMMENT 'Password del empleado usado para acceder al sistema. Encriptado con SHA-256'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla que contiene a los empleados registrados en el sistema';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `matricula` varchar(10) NOT NULL COMMENT 'La matrícula (de 10 caracteres) del estudiante es la clave primaria del registro, es decir, es única y es referenciada en otras tablas',
  `nombre` varchar(255) NOT NULL COMMENT 'Nombre del estudiante',
  `apellidos` varchar(255) NOT NULL COMMENT 'Apellidos del estudiante',
  `password` varchar(64) NOT NULL COMMENT 'Password del estudiante para acceder al sistema. Encriptado con SHA-256',
  `activo` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT ' Bandera que indica si el estudiante se encuentra activo en el sistema o si se encuentra dado de baja. 1 = activo, 0 = dado de baja. Default = 1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla que guarda los estudiantes que han sido registrados.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(10) UNSIGNED NOT NULL COMMENT 'Llave primaria del libro',
  `titulo` varchar(255) NOT NULL COMMENT 'Título del libro',
  `id_categoria` int(10) UNSIGNED NOT NULL COMMENT 'Identificador de la categoría a la que pertenece el libro',
  `paginas` int(10) UNSIGNED NOT NULL COMMENT 'Cantidad de páginas del libro',
  `activo` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Bandera que indica si el libro se encuentra disponible en el sistema para préstamos o si se encuentra dado de baja en el sistema. 1 = activo, 0 = dado de baja. Default = 1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla que contiene el catálogo de libros de la biblioteca.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id_prestamo` int(10) UNSIGNED NOT NULL COMMENT 'Llave primaria del préstamo',
  `matricula_estudiante` varchar(10) NOT NULL COMMENT 'Matrícula del estudiante que pidió el préstamo del libro',
  `id_libro` int(10) UNSIGNED NOT NULL COMMENT 'Identificador del libro que se está prestando',
  `fecha_prestamo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha y hora relativo al epoch en que se realizó el préstamo. Se genera al momento de crear el registro',
  `fecha_limite` timestamp NULL DEFAULT NULL COMMENT 'Fecha y hora relativo al epoch para el tiempo límite de entrega. La fecha límite se debe generar enseguida después de insertar el registro realizando un update en el modelo',
  `fecha_devolucion` timestamp NULL DEFAULT NULL COMMENT 'Fecha y hora relativo al epoch que representa el momento en que se realizó la devolución del libro. Es un campo nulo que debe ser actualizado cuando el estudiante devuelva el libro. Si el valor es nulo, significa que el estudiante aún no ha devuelto el libro.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adeudos`
--
ALTER TABLE `adeudos`
  ADD PRIMARY KEY (`id_adeudo`),
  ADD KEY `matricula_estudiante` (`matricula_estudiante`),
  ADD KEY `id_libro` (`id_libro`);

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `autores_x_libro`
--
ALTER TABLE `autores_x_libro`
  ADD KEY `id_libro` (`id_libro`),
  ADD KEY `id_autor` (`id_autor`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`matricula`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id_prestamo`),
  ADD KEY `matricula_estudiante` (`matricula_estudiante`),
  ADD KEY `id_libro` (`id_libro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adeudos`
--
ALTER TABLE `adeudos`
  MODIFY `id_adeudo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria del adeudo';

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id_prestamo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria del préstamo';

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adeudos`
--
ALTER TABLE `adeudos`
  ADD CONSTRAINT `adeudos_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id_libro`),
  ADD CONSTRAINT `adeudos_ibfk_2` FOREIGN KEY (`matricula_estudiante`) REFERENCES `estudiantes` (`matricula`);

--
-- Filtros para la tabla `autores_x_libro`
--
ALTER TABLE `autores_x_libro`
  ADD CONSTRAINT `autores_x_libro_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id_libro`),
  ADD CONSTRAINT `autores_x_libro_ibfk_2` FOREIGN KEY (`id_autor`) REFERENCES `autores` (`id_autor`);

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id_libro`),
  ADD CONSTRAINT `prestamos_ibfk_2` FOREIGN KEY (`matricula_estudiante`) REFERENCES `estudiantes` (`matricula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
