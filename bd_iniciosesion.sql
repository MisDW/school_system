-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-07-2024 a las 18:25:40
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_iniciosesion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrer`
--

CREATE TABLE `carrer` (
  `id` int(100) NOT NULL,
  `carrera` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrer`
--

INSERT INTO `carrer` (`id`, `carrera`) VALUES
(1, 'Desarrollo de Software'),
(2, 'Logistica'),
(3, 'Mecatronica'),
(4, 'Nanotecnologia'),
(5, 'Mantenimiento'),
(6, 'Lengua Inglesa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `classroom`
--

CREATE TABLE `classroom` (
  `id` int(100) NOT NULL,
  `nombre_salon` varchar(100) NOT NULL,
  `usuario_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partial`
--

CREATE TABLE `partial` (
  `id` int(100) NOT NULL,
  `usuario_id` int(100) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `parcial1` int(3) NOT NULL,
  `parcial2` int(3) NOT NULL,
  `parcial3` int(3) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `id` int(100) NOT NULL,
  `id-profesor` int(100) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `fecha-final` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha-creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_classroom` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `id` int(2) NOT NULL,
  `tipo_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`id`, `tipo_usuario`) VALUES
(0, 'Aspirante'),
(1, 'Admin'),
(2, 'Docente'),
(3, 'Alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subject`
--

CREATE TABLE `subject` (
  `id` int(100) NOT NULL,
  `nombre_materia` varchar(50) NOT NULL,
  `usuario_id` int(100) NOT NULL,
  `role_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `subject`
--

INSERT INTO `subject` (`id`, `nombre_materia`, `usuario_id`, `role_id`) VALUES
(1, 'ESPAÑOL', 29, 3),
(2, 'ESTADISTICAS', 29, 3),
(3, 'APLICACIONES WEB', 29, 3),
(4, 'APLICACIONES WEB', 30, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `tipo_usuario` int(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `carrera` int(100) NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `correo`, `contraseña`, `tipo_usuario`, `status`, `carrera`, `direccion`) VALUES
(24, 'ricardin', 'ricardin@gmail.com', '$2y$10$k5kIUTodgtnyCTPTabDih.LT4J3KlmdexnX7yCDapFLldCLykLQq.', 1, 'activo', 0, ''),
(28, 'Chuy', 'chuy@gmail.com', '$2y$10$sUv6X8uGJtOxl63foAq6LuxbgTpxIfmRoWpRaETXwm09d9bxfNKYe', 3, 'activo', 0, ''),
(29, 'Lalo Hernandez', 'lalo@gmail.com', '$2y$10$JsOiM/DVYLnIakO11CwRJ.07ZO.XrSWq9QIwS6WKOBziwfQUa0ifq', 3, 'activo', 0, ''),
(33, 'Jesus Alejandro Vera', 'vera@gmail.com', '$2y$10$TPouL3dwBUpqE/esrw00ZuifC3/aJu1ro.wV.WuQDPAx2wOsjRp8K', 2, '', 0, ''),
(34, 'adwad', 'dawd@awdaw', '$2y$10$JiJlD7N6XXUgvbaivHZZme4oecT31QuyP32IJJwM222P35oV5BZg.', 4, '', 0, ''),
(35, 'awdawd', 'awd@glsmd', '$2y$10$wU0K2Aar40KN0ogy6SJuZusCVkx1r44Q/IoVaeJBMMGcIvkvRJNB2', 4, '', 0, ''),
(36, 'adaw', 'awdawd@mgmail.com', '$2y$10$pwKHQvA33tiIlC36okzEpexyGlVg08uTHxoc0wLwETDl9sI141Dlq', 1, '', 0, ''),
(37, 'adawd', 'awdawd@mgmail.com', '$2y$10$lsJvZKGQikiWdAOqOB8NO.U8xEhirhpJ.az2Q2aX1Gwp7jfO4M3xS', 3, '', 0, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `partial`
--
ALTER TABLE `partial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subject`
--
ALTER TABLE `subject`
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
-- AUTO_INCREMENT de la tabla `classroom`
--
ALTER TABLE `classroom`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `partial`
--
ALTER TABLE `partial`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
