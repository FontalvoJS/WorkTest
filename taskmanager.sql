-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2023 a las 07:03:51
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taskmanager`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_post` datetime NOT NULL,
  `dateToFinish` datetime NOT NULL,
  `status` enum('pending','standby','finished') NOT NULL
) ;

--
-- Volcado de datos para la tabla `tasks`
--

INSERT INTO `tasks` (`id`, `id_user`, `title`, `description`, `date_post`, `dateToFinish`, `status`) VALUES
(48, 33, 'Autenticación y Registro', 'Validar datos de inicio de sesión y registro', '2023-09-11 06:52:25', '2023-09-10 23:52:00', 'finished'),
(49, 33, 'Patrón MVC', 'Patrón de diseño de software', '2023-09-11 06:53:10', '2023-09-10 14:53:00', 'finished'),
(50, 33, 'Estados de las tareas', 'Stand By, Pending y Finished', '2023-09-11 06:53:47', '2023-09-10 14:53:00', 'finished'),
(51, 33, 'Log out', 'Cierre de sesión', '2023-09-11 06:54:18', '2023-09-10 23:54:00', 'finished'),
(52, 33, 'Presentación de la prueba técnica', 'Enviar el link y conectarse a la llamada virtual', '2023-09-11 06:55:31', '2023-09-11 12:00:00', 'pending'),
(53, 33, 'Crear documentación para instalar el programa', 'Debe indicar los pasos necesarios para poder instalar este programa', '2023-09-11 06:56:29', '2023-09-10 23:56:00', 'pending'),
(54, 33, 'Probar todas las funciones de WorkTest', 'Antes de empezar la evaluación', '2023-09-11 06:59:58', '2023-09-11 09:00:00', 'standby');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL
) ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `date_created`) VALUES
(33, 'Andrés Fontalvo', 'mejia_andres@hotmail.es', '$2y$10$zgl.E.VwZE9/YQDXvmTew.715PFgdILKUMIDJflezfB0m1YdK4UVW', '2023-09-11 06:48:31');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
