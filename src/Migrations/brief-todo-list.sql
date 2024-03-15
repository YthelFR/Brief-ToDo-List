-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 15 mars 2024 à 13:02
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `brief-todo-list`
--

-- --------------------------------------------------------

--
-- Structure de la table `tdl_category`
--

DROP TABLE IF EXISTS `tdl_category`;
CREATE TABLE IF NOT EXISTS `tdl_category` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tdl_category`
--

INSERT INTO `tdl_category` (`ID`, `NAME`) VALUES
(1, 'Personnel'),
(2, 'Travail'),
(3, 'Famille'),
(4, 'Amis');

-- --------------------------------------------------------

--
-- Structure de la table `tdl_priority`
--

DROP TABLE IF EXISTS `tdl_priority`;
CREATE TABLE IF NOT EXISTS `tdl_priority` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tdl_priority`
--

INSERT INTO `tdl_priority` (`ID`, `NAME`) VALUES
(1, 'Faible'),
(2, 'Importante'),
(3, 'Urgente');

-- --------------------------------------------------------

--
-- Structure de la table `tdl_task`
--

DROP TABLE IF EXISTS `tdl_task`;
CREATE TABLE IF NOT EXISTS `tdl_task` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `DESCRIPTION` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `DATE` datetime NOT NULL,
  `ID_USER` int NOT NULL,
  `ID_PRIORITY` int NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Tasks_User_FK` (`ID_USER`),
  KEY `Tasks_Priority0_FK` (`ID_PRIORITY`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tdl_task_has_category`
--

DROP TABLE IF EXISTS `tdl_task_has_category`;
CREATE TABLE IF NOT EXISTS `tdl_task_has_category` (
  `ID_CATEGORY` int NOT NULL,
  `ID_TASK` int NOT NULL,
  PRIMARY KEY (`ID_CATEGORY`,`ID_TASK`),
  KEY `Categorise_Tasks0_FK` (`ID_TASK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tdl_user`
--

DROP TABLE IF EXISTS `tdl_user`;
CREATE TABLE IF NOT EXISTS `tdl_user` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `LASTNAME` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `FIRSTNAME` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `PASSWORD` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `MAIL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `MAIL` (`MAIL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tdl_task`
--
ALTER TABLE `tdl_task`
  ADD CONSTRAINT `Tasks_Priority0_FK` FOREIGN KEY (`ID_PRIORITY`) REFERENCES `tdl_priority` (`ID`),
  ADD CONSTRAINT `Tasks_User_FK` FOREIGN KEY (`ID_USER`) REFERENCES `tdl_user` (`ID`);

--
-- Contraintes pour la table `tdl_task_has_category`
--
ALTER TABLE `tdl_task_has_category`
  ADD CONSTRAINT `Categorise_Category_FK` FOREIGN KEY (`ID_CATEGORY`) REFERENCES `tdl_category` (`ID`),
  ADD CONSTRAINT `Categorise_Tasks0_FK` FOREIGN KEY (`ID_TASK`) REFERENCES `tdl_task` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
