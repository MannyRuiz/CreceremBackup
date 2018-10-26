-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2018 a las 03:03:33
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_anterior`
--

CREATE TABLE `curso_anterior` (
  `id` int(11) NOT NULL,
  `id_alumno` int(8) DEFAULT NULL,
  `escolaridad` varchar(240) DEFAULT NULL,
  `grado` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_alumno`
--

CREATE TABLE `datos_alumno` (
  `id` int(11) NOT NULL,
  `num_control` varchar(20) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `apellido_p` varchar(60) DEFAULT NULL,
  `apellido_m` varchar(60) DEFAULT NULL,
  `domicilio` varchar(255) DEFAULT NULL,
  `telefono` varchar(10) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datos_alumno`
--

INSERT INTO `datos_alumno` (`id`, `num_control`, `nombre`, `apellido_p`, `apellido_m`, `domicilio`, `telefono`, `fecha_nacimiento`) VALUES
(1, '13680255', 'Manuel', 'Ruiz', 'Cedillo', 'Plan de Ayala 830, Amatitlán, 62410 Cuernavaca, Mor.', '7355555555', '1994-10-09'),
(2, '13680111', 'Rafael', 'Nadal', 'Parera', 'loremasñdkmasdlkasda sdlaskd alsdka sdlaksdnapsokd asldma sdlajsd ', '7774444444', '1998-07-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuela_anterior`
--

CREATE TABLE `escuela_anterior` (
  `id` int(11) NOT NULL,
  `id_alumno` int(8) DEFAULT NULL,
  `nombre_escuela` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `escuela_anterior`
--

INSERT INTO `escuela_anterior` (`id`, `id_alumno`, `nombre_escuela`, `direccion`, `telefono`) VALUES
(1, 1, 'Instituto Tecnológico de Cuautla', 'Libramiento Cuautla-Oaxaca S/N, Juan Morales, 62745 Cuautla, Mor.', '01 735 353 6496');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `nombre_evento` varchar(200) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `lugar` varchar(50) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_termino` date DEFAULT NULL,
  `coachId` int(3) NOT NULL,
  `id_sede` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `nombre_evento`, `color`, `lugar`, `fecha_inicio`, `fecha_termino`, `coachId`, `id_sede`) VALUES
(1, 'Evento 1', 'purple', 'CU', '2018-08-13', '2018-08-16', 0, 0),
(2, 'Evento 2', 'blue', 'CU', '2018-09-14', '2018-09-19', 0, 0),
(3, 'Evento 3', 'green', 'CU', '2018-08-15', '2018-08-18', 0, 0),
(4, 'Evento Agosto-Septiembre', 'purple', 'DF', '2018-08-31', '2018-09-04', 0, 0),
(5, 'Evento lokoshon', 'lightgreen', 'TX', '2018-08-15', '2018-08-18', 0, 0),
(6, 'Evento Primero Único Internacional', '#F4F4F4', 'TX', '2018-08-02', '2018-08-07', 0, 0),
(7, 'Evento de esta semana', 'lightsalmon', 'CU', '2018-08-21', '2018-08-23', 0, 0),
(8, 'Evento Dallas del 23 al 26', 'lightblue', 'TX', '2018-08-23', '2018-08-26', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_tomadas`
--

CREATE TABLE `materias_tomadas` (
  `id` int(11) NOT NULL,
  `id_alumno` int(8) DEFAULT NULL,
  `nombre_materia` varchar(150) DEFAULT NULL,
  `calificacion` int(3) DEFAULT NULL,
  `actual` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materias_tomadas`
--

INSERT INTO `materias_tomadas` (`id`, `id_alumno`, `nombre_materia`, `calificacion`, `actual`) VALUES
(1, 1, 'Química', 86, b'1'),
(2, 1, 'Física', 78, b'1'),
(3, 1, 'Calculo Diferencial', 100, b'0'),
(4, 1, 'Ecuaciones Diferenciales', 78, b'0'),
(5, 1, 'Programación Multiparadigmas', 96, b'0'),
(6, 1, 'Investigacion de Operaciones', 88, b'1'),
(7, 2, 'Física', 77, b'1'),
(8, 2, 'Ciencias Naturales', 100, b'1'),
(9, 2, 'Química', 78, b'1'),
(10, 2, 'Geografía', 88, b'1'),
(11, 2, 'Diseño Web', 94, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `tipo_de_rol` varchar(30) DEFAULT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `tipo_de_rol`, `avatar`) VALUES
(1, 'Superadministrador', ''),
(2, 'Administrador', ''),
(3, 'Contralor', ''),
(4, 'Contador', ''),
(5, 'Staff', ''),
(6, 'Staff Interno', ''),
(7, 'Coach', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `abbr` varchar(5) DEFAULT NULL,
  `backgroundColor` varchar(50) DEFAULT NULL,
  `visualizar` int(1) NOT NULL,
  `desactivar` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id`, `nombre`, `abbr`, `backgroundColor`, `visualizar`, `desactivar`) VALUES
(2, 'Ciudad de México', 'DF', 'rgba(3,24,133,0.25)', 1, 0),
(4, 'Dallas, Texas, E.E.U.U.', 'TX', 'rgba(133,214,233,0.25)', 1, 0),
(10, 'Cuautla, Morelos', 'CU', 'rgba(233,24,233,0.25)', 1, 0),
(16, 'Guanajuato', 'GTO', '#cae337', 0, 1),
(18, 'Tijuana, Baja California', 'TJ', 'lightgreen', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutores`
--

CREATE TABLE `tutores` (
  `id` int(11) NOT NULL,
  `id_alumno` int(8) DEFAULT NULL,
  `nombre_tutor` varchar(150) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `correo` varchar(250) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tutores`
--

INSERT INTO `tutores` (`id`, `id_alumno`, `nombre_tutor`, `direccion`, `correo`, `telefono`, `tipo`) VALUES
(1, 1, 'Clancy Wiggum', 'Autopista Cuautla-Oaxtepec Km 31.900, Tierra Larga ', 'jefegorgory@gmail.com', '744345343', 'Padre'),
(2, 1, 'Coronel Ardilla', 'Camino Real a Tetelcingo Calderon, 23, 62751 Tierra Larga, Mor.', 'coro@gmail.com', '7351288475', 'Familiar'),
(3, 2, 'Raúl Gonzalez Blanco', 'Boulevard Lomas Blancas #234 Colonia Centro', 'raul@realmadrid.com', '7358448569', 'Familiar'),
(4, 2, 'Sebastián Nadal Gomez', '742 Evergreen Terrace', 'nadi@hotmail.com', '7352141268', 'Padre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `rol` int(1) NOT NULL,
  `sede` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `correo`, `nombre`, `rol`, `sede`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@crecerem.com', 'Administrador', 1, 1),
(2, 'mannytareas', '79e92fb5190903988172699a7b340a28', 'manny@gmail.com', 'Manuel Ruiz', 5, 0),
(3, 'pedrito', 'f4f7a23ff803c53f00f33b508a61fa36', 'manns@gmail.com', 'manuel ruiz', 7, 0),
(4, 'asldkasdlaskd alsdkma sdlaskd', 'f67c2bcbfcfa30fccb36f72dca22a817', 'madmas@gmam.com', 'asdkasmd asldkmasd', 7, 0),
(5, 'pollito', '9141e7a09a65b6f3c16e6e44ecf5aaf2', 'mamamam@mgail.com', 'manuelRiaozacs', 5, 0),
(6, 'Cedillo', '79e92fb5190903988172699a7b340a28', 'aañsdlmasdñlamsd@gmail.com', 'Manuel Ruiz', 6, 0),
(7, 'james13', '3e9d1dae9f9979cb905a863e9f820415', 'james13@hotmail.com', 'james brown', 5, 0),
(8, 'UcantCMe', 'ea20576bf7784fe2600f91a24a1c792d', 'johny13@gmail.com', 'John Cena', 7, 0),
(9, 'maniponchis', '8329068afc543e3927147edde0b00bca', 'pipipipipi@gmail.com', 'ManuelPonchis', 6, 0),
(10, 'poniloco', '7434fafe9980dfc097fb979ba9e14812', 'man@gmail.com', 'poni ruiz', 5, 0),
(11, 'danicali', '79e92fb5190903988172699a7b340a28', 'calidani@gmail.com', 'Dani California', 4, 0),
(12, 'raul7', '85738572271b1cedfd4f27f8a5654335', 'raul@gmail.com', 'Raul Gonzalez', 5, 0),
(13, 'johnWayne', '6a3e0ab7044ec91deb12658d02f34144', 'madlaksdm@gmail.com', 'Somos Animaniacs', 1, 0),
(14, 'theeagleone', '95f72e4740fb033b2b4b32614cbe8224', 'thenotoriouskhalabib@gmail.com', 'Khabib McGregor', 3, 0),
(15, 'Ramoncito11', '783658607764b8ce72442293714da4bc', 'ramonio11@hotmail.com', 'Ramoncito Morales', 6, 0),
(16, 'Oligiroud', 'b4ed0b319c009b29ac3141c6aa964b87', 'giri@gmail.com', 'Oliver Giroud', 4, 0),
(17, 'asdasd', '7434fafe9980dfc097fb979ba9e14812', 'asdmail@gmail.com', 'asd@gmail.com', 1, 0),
(18, 'DWhite', 'b4ed0b319c009b29ac3141c6aa964b87', 'dwhite@gmail.com', 'Dana White', 3, 0),
(19, 'JWay', 'b4ed0b319c009b29ac3141c6aa964b87', 'jjj@gmail.com', 'JohnWayne', 6, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso_anterior`
--
ALTER TABLE `curso_anterior`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datos_alumno`
--
ALTER TABLE `datos_alumno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `escuela_anterior`
--
ALTER TABLE `escuela_anterior`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materias_tomadas`
--
ALTER TABLE `materias_tomadas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tutores`
--
ALTER TABLE `tutores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso_anterior`
--
ALTER TABLE `curso_anterior`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datos_alumno`
--
ALTER TABLE `datos_alumno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `escuela_anterior`
--
ALTER TABLE `escuela_anterior`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `materias_tomadas`
--
ALTER TABLE `materias_tomadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tutores`
--
ALTER TABLE `tutores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
