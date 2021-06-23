-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-12-2020 a las 14:18:12
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `Proyecto`
--
CREATE DATABASE IF NOT EXISTS `Proyecto` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Proyecto`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Generos`
--

CREATE TABLE `Generos` (
                             `id` int(11) NOT NULL,
                             `nombre` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Generos`
--

INSERT INTO `Generos` (`id`, `nombre`) VALUES
(1, 'Pop'),
(2, 'Electronica'),
(3, 'R&B'),
(4, 'Rap'),
(5, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Artista`
--

CREATE TABLE `Artista` (
                           `id` int(11) NOT NULL,
                           `nombre` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                           `apellidos` varchar(80) DEFAULT NULL,
                           `edad` varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                           `estrella` tinyint(1) NOT NULL DEFAULT 0,
                           `cancionId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Artista`
--

INSERT INTO `Artista` (`id`, `nombre`, `apellidos`, `edad`, `estrella`, `cancionId`) VALUES
(1, 'Martin', 'Garrix', '23', 0, 1),
(2, 'Marc', 'Seguí', '21', 0, 2),
(3, 'Billie', 'Elish', '19', 1, 3),
(4, 'Recyled', 'J', '25', 1, 4),
(5, 'Xavibo', '', '23', 0, 5),
(6, 'Olivia', 'Rodrigo', '24', 1, 6);

--
-- Estructura de tabla para la tabla 'Usuario'
--

CREATE TABLE `Usuario` (
                        `id` int(11) NOT NULL,
                        `identificador` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
                        `contrasenna` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
                        `codigoCookie` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
                        `caducidadCodigoCookie` timestamp NULL DEFAULT NULL,
                        `tipoUsuario` int(11) NOT NULL,
                        `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
                        `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`id`, `identificador`, `contrasenna`, `codigoCookie`, `caducidadCodigoCookie`, `tipoUsuario`, `nombre`, `apellidos`) VALUES
(1, 'admin', 'a', NULL, NULL, 0, 'Admin', ''),
(2, 'usuario1', 'u1', NULL, NULL, 0, 'Usuario', '1'),
(3, 'usuario2', 'u2', NULL, NULL, 0, 'Usuario', '2');

--
-- Estructura de tabla para la tabla `Canciones`
--
CREATE TABLE `Canciones` (
                            `id` int(11) NOT NULL,
                            `nombre` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                            `generoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Canciones`
--

INSERT INTO `Canciones` (`id`, `nombre`, `generoId`) VALUES
(1, 'Animals', 1),
(2, 'Uh', 1),
(3, 'bad guy', 1),
(4, 'Maravilla', 4),
(5, 'Badtrip', 4),
(6, 'fovorite crime', 1);

--
-- Estructura de tabla para la tabla `PlaylistCancion`
--
CREATE TABLE `PlaylistCancion` (
                            `id` int(11) NOT NULL,
                            `cancionId` int(11) NOT NULL,
                            `playlistId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `PlaylistCancion`
--

INSERT INTO `PlaylistCancion` (`id`, `cancionId`, `playlistId`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 2),
(4, 1, 2),
(5, 1, 3),
(6, 1, 3);

--
-- Estructura de tabla para la tabla `Playlist`
--
CREATE TABLE `Playlist` (
                        `id` int(11) NOT NULL,
                        `nombre`varchar(45),
                        `usuarioId` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Playlist`
--

INSERT INTO `Playlist` (`id`,`nombre`, `usuarioId`) VALUES
(1, 'PlayList1', 1),
(1, 'PlayList2', 2),
(1, 'PlayList3', 3);


-- Indices de la tabla `Caciones`
--
ALTER TABLE `Canciones`
    ADD PRIMARY KEY (`id`),
    ADD KEY `fk_generoIdIdx` (`generoId`);

--
-- Indices de la tabla `Generos`
--
ALTER TABLE `PlaylistCancion`
    ADD PRIMARY KEY (`id`);
    ADD KEY `fk_cancionIdIdx` (`cancionId`);

--
-- Indices de la tabla `Playlist`
--
ALTER TABLE `Playlist`
    ADD PRIMARY KEY (`id`);
    ADD KEY `fk_usuarioIdIdx` (`usuarioId`);


--
-- Indices de la tabla `Generos`
--
ALTER TABLE `Generos`
    ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Artista`
--
ALTER TABLE `Artista`
    ADD PRIMARY KEY (`id`),
    ADD KEY `fk_cancionIdIdx` (`cancionId`);


--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `identificador` (`identificador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Canciones`
--
ALTER TABLE `Canciones`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Playlist`
--
ALTER TABLE `Playlist`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `PlaylistCancion`
--
ALTER TABLE `PlaylistCancion`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `Generos`
--
ALTER TABLE `Generos`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `Artista`
--
ALTER TABLE `Artista`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;


--
-- Filtros para la tabla `Artista`
--
ALTER TABLE `Artista`
    ADD CONSTRAINT `fk_cancionId` FOREIGN KEY (`cancionId`), FOREIGN KEY (`CancionId`) REFERENCES `Generos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;