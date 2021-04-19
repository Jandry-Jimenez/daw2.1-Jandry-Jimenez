-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-11-2020 a las 12:42:54
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: musica
--
CREATE DATABASE IF NOT EXISTS musica DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE musica;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla categoria
--

DROP TABLE IF EXISTS genero;
CREATE TABLE IF NOT EXISTS genero (
                                        id int(11) NOT NULL AUTO_INCREMENT,
                                        nombre varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                                        cancionId int(11) NOT NULL,
                                        PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Datos para la tabla genero
--

TRUNCATE TABLE genero;

INSERT INTO genero (id, nombre, categoriaId) VALUES
(1, 'Electronica', 2),
(2, 'Pop', 3),
(3, 'Rap', 5),
(4, 'Trap', 6);

TRUNCATE TABLE genero;

--
-- Estructura de tabla para la tabla artista
--


DROP TABLE IF EXISTS artista;
CREATE TABLE IF NOT EXISTS artista (
                                       id int(11) NOT NULL AUTO_INCREMENT,
                                       nombre varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                                       apellidos varchar(80) DEFAULT NULL,
                                       edad varchar(3) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                                       estrella tinyint(1) NOT NULL DEFAULT 0,
                                       cancionId int(11) NOT NULL,
                                       PRIMARY KEY (id),
                                       KEY fk_categoriaIdIdx (cancionId)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

TRUNCATE TABLE artista;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO artista (id, nombre, apellidos, edad, estrella, categoriaId) VALUES
(1, 'Martin', 'Garrix', 23, 1, 3),
(2, 'Kid', 'Keo', 25, 1, 1),
(3, 'Beyoncé', NULL, 39, 1, 1),
(4, 'TheWeeknd', NULL, 30, 0, 8),
(5, 'Recyceld J', NULL, 27, 1, 2),
(6, 'Miranda',NULL, 21, 0, 3);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS cancion;
CREATE TABLE IF NOT EXISTS cancion (
                                         id int(11) NOT NULL AUTO_INCREMENT,
                                         nombre varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                                         anio varchar(4) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                                         PRIMARY KEY (id),
    									 cancionId int(11) NOT NULL,
                                         KEY fk_categoriaIdIdx (cancionId)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

TRUNCATE TABLE cancion;

--
-- Volcado de datos para la tabla `persona`
--
INSERT INTO cancion (id, nombre, anio) VALUES
(1, 'Animals', 2017),
(2, 'Ki Ki Ki' , 2020),
(3, 'Run The World', 2011),
(4, 'Can´t Feel My Face', 2018),
(5, 'Cadena', 2019),
(6, 'Destello', 2019);
--
-- Volcado de datos para la tabla `persona`
--
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `persona`
--
ALTER TABLE genero
    ADD CONSTRAINT fk_categoriaId FOREIGN KEY (categoriaId) REFERENCES genero (id) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;