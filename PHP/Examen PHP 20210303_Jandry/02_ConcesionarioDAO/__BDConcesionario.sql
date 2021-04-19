-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 01:13 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `concesionario`
--
CREATE DATABASE IF NOT EXISTS `concesionario` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `concesionario`;
-- --------------------------------------------------------

--
-- Table structure for table `coche`
--
CREATE TABLE `coche` (
                      `id` int(11) NOT NULL,
                      `matricula` varchar(7) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

DROP TABLE IF EXISTS `coche`;
CREATE TABLE `coche` (
  `id` int(11) NOT NULL,
  `matricula` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `coche`
--

INSERT INTO `coche` (`id`, `matricula`, `modelo`, `precio`) VALUES
(2, '2244GPT', 'Renault Megane', 16000),
(3, '1112GGG', 'Peugeot 1005', 24000),
(5, '5500DYB', 'Audi A5', 58000),
(8, '3366BCD', 'Seat León', 18000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coche`
--
ALTER TABLE `coche`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coche`
--
ALTER TABLE `coche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;