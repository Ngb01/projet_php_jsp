-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 06 avr. 2018 à 07:02
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_php_jsp`
--

-- --------------------------------------------------------

--
-- Structure de la table `compatible`
--

DROP TABLE IF EXISTS `compatible`;
CREATE TABLE IF NOT EXISTS `compatible` (
  `CODECOURS` char(32) NOT NULL,
  `CODECOURS_1` char(32) NOT NULL,
  PRIMARY KEY (`CODECOURS`,`CODECOURS_1`),
  KEY `FK_COMPATIBLE_COURS1` (`CODECOURS_1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `composercontrat`
--

DROP TABLE IF EXISTS `composercontrat`;
CREATE TABLE IF NOT EXISTS `composercontrat` (
  `CODECOURS` char(32) NOT NULL,
  `IDCONTRAT` char(32) NOT NULL,
  PRIMARY KEY (`CODECOURS`,`IDCONTRAT`),
  KEY `FK_COMPOSERCONTRAT_CONTRATS` (`IDCONTRAT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contrats`
--

DROP TABLE IF EXISTS `contrats`;
CREATE TABLE IF NOT EXISTS `contrats` (
  `IDCONTRAT` int(32) NOT NULL AUTO_INCREMENT,
  `DUREE` int(4) DEFAULT NULL,
  `ETATCONTRAT` char(32) DEFAULT NULL,
  PRIMARY KEY (`IDCONTRAT`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contrats`
--

INSERT INTO `contrats` (`IDCONTRAT`, `DUREE`, `ETATCONTRAT`) VALUES
(1, 5, 'En cours'),
(2, 4, 'En cours'),
(3, 5, 'En cours'),
(4, 3, 'En cours'),
(5, 4, 'En cours');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `CODECOURS` varchar(32) NOT NULL,
  `LIBELLECOURS` char(32) DEFAULT NULL,
  `NBECTS` int(4) DEFAULT NULL,
  PRIMARY KEY (`CODECOURS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`CODECOURS`, `LIBELLECOURS`, `NBECTS`) VALUES
('BTSA001', 'Sciences des plantes', 50),
('BTSA002', 'Elevage', 30),
('DUTG001', 'Economie', 30),
('DUTG002', 'Gestion', 35),
('LBIO001', 'Micro-biologie', 50),
('LBIO002', 'Chimie organique', 40),
('LRIF3GC01', 'Developpement d\'applications web', 50),
('LRIF3GC02', 'Securite', 30),
('LRIF3GC03', 'Gestion de projet', 40),
('LRIF3GC04', 'Reseaux', 30),
('LRIF3GC05', 'Anglais', 20),
('LRIF3GC06', 'Programmation', 40),
('LRIF3GC07', 'Droit', 20),
('LRIF3GC08', 'Communication', 20),
('LRIF3GC09', 'Maths', 10),
('MM001', 'Algèbre', 40),
('MM002', 'Mathématiques appliquées', 68);

-- --------------------------------------------------------

--
-- Structure de la table `demandesfinancieres`
--

DROP TABLE IF EXISTS `demandesfinancieres`;
CREATE TABLE IF NOT EXISTS `demandesfinancieres` (
  `REFDEMFIN` int(32) NOT NULL AUTO_INCREMENT,
  `DATEDEPOTDEMFIN` date DEFAULT NULL,
  `ETATDEMFIN` char(32) DEFAULT NULL,
  `MONTANTACCORDE` bigint(5) DEFAULT NULL,
  PRIMARY KEY (`REFDEMFIN`)
) ENGINE=InnoDB AUTO_INCREMENT=988 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demandesfinancieres`
--

INSERT INTO `demandesfinancieres` (`REFDEMFIN`, `DATEDEPOTDEMFIN`, `ETATDEMFIN`, `MONTANTACCORDE`) VALUES
(123, '2018-11-14', 'A faire', 12500),
(159, '2018-07-05', 'Fini', 4450),
(321, '2018-08-12', 'A faire', 10750),
(456, '2018-02-28', 'En cours', 8300),
(654, '2018-05-18', 'En cours', 6400),
(789, '2018-04-06', 'Fini', 4100),
(987, '2018-10-26', 'Fini', 3200);

-- --------------------------------------------------------

--
-- Structure de la table `demandesmobilites`
--

DROP TABLE IF EXISTS `demandesmobilites`;
CREATE TABLE IF NOT EXISTS `demandesmobilites` (
  `REFDEMMOB` int(32) NOT NULL AUTO_INCREMENT,
  `DATEDEPOTDEMMOB` date DEFAULT NULL,
  `ETATDEMMOB` char(32) DEFAULT NULL,
  PRIMARY KEY (`REFDEMMOB`)
) ENGINE=InnoDB AUTO_INCREMENT=987654322 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demandesmobilites`
--

INSERT INTO `demandesmobilites` (`REFDEMMOB`, `DATEDEPOTDEMMOB`, `ETATDEMMOB`) VALUES
(123456789, '2018-03-12', 'A faire'),
(147258369, '2018-09-05', 'Fait'),
(321654987, '2018-05-30', 'Fait'),
(369852147, '2018-02-20', 'En cours'),
(789456123, '2018-10-17', 'En cours'),
(963852741, '2018-12-10', 'A faire'),
(987654321, '2018-06-24', 'En cours');

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Structure de la table `diplomesactuels`
--

DROP TABLE IF EXISTS `diplomesactuels`;
CREATE TABLE IF NOT EXISTS `diplomesactuels` (
  `CODEDIP` int(31) NOT NULL,
  `NUMETUDIANT` varchar(128) NOT NULL,
  PRIMARY KEY (`NUMETUDIANT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `diplomesactuels`
--

INSERT INTO `diplomesactuels` (`CODEDIP`, `NUMETUDIANT`) VALUES
(2, '1'),
(2, '2'),
(4, '3'),
(3, '4'),
(5, '5'),
(4, '7');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE IF NOT EXISTS `etudiants` (
  `NUMETUDIANT` varchar(128) NOT NULL,
  `NOMET` char(32) DEFAULT NULL,
  `PRENOMET` char(32) DEFAULT NULL,
  `EMAIL` char(32) DEFAULT NULL,
  `CV` char(32) DEFAULT NULL,
  PRIMARY KEY (`NUMETUDIANT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`NUMETUDIANT`, `NOMET`, `PRENOMET`, `EMAIL`, `CV`) VALUES
('1', 'BASCOUL', 'Thomas', 'thomasbascoul@outlook.fr', 'cvToto'),
('2', 'SAUSSOL', 'Guillaume', 'guigui@outlook.fr', 'cvGuigui'),
('3', 'ANGEL', 'Sébastien', 'bast@hotmail.fr', ''),
('4', 'HIOT', 'Tim', 'theteam@orange.fr', 'cvTimmy'),
('5', 'CHAUVET', 'Marine', 'lavoyageuse@sfr.fr', 'cvMama'),
('7', 'CHAUVET', 'Sophie', 'sophie@mail.fr', 'sophieCV');

-- --------------------------------------------------------

--
-- Structure de la table `impliqueu`
--

DROP TABLE IF EXISTS `impliqueu`;
CREATE TABLE IF NOT EXISTS `impliqueu` (
  `NOMU` char(50) NOT NULL,
  `INTITULEP` char(32) NOT NULL,
  PRIMARY KEY (`NOMU`,`INTITULEP`),
  KEY `FK_IMPLIQUEU_PROGRAMMES` (`INTITULEP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `impliqueu`
--

INSERT INTO `impliqueu` (`NOMU`, `INTITULEP`) VALUES
('INSA', 'APUI'),
('Paul Sabatier', 'APUI'),
('INSA', 'Erasmus'),
('Jean Jaures', 'Erasmus'),
('TBS', 'Erasmus'),
('Capitole', 'MICEFA'),
('TBS', 'MICEFA');

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Structure de la table `progdiplome`
--

DROP TABLE IF EXISTS `progdiplome`;
CREATE TABLE IF NOT EXISTS `progdiplome` (
  `CODECOURS` char(32) NOT NULL,
  `CODEDIP` char(32) NOT NULL,
  PRIMARY KEY (`CODECOURS`,`CODEDIP`),
  KEY `FK_PROGDIPLOME_DIPLOMES` (`CODEDIP`),
  KEY `FK_PROGDIPLOME_CODECOURS` (`CODECOURS`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `progdiplome`
--

INSERT INTO `progdiplome` (`CODECOURS`, `CODEDIP`) VALUES
('DUTG001', '1'),
('DUTG002', '1'),
('DUTG003', '1'),
('DUTG004', '1'),
('DUTG005', '1'),
('BTSA001', '2'),
('BTSA002', '2'),
('LRIF3GC01', '3'),
('LRIF3GC02', '3'),
('LRIF3GC03', '3'),
('LRIF3GC04', '3'),
('LRIF3GC05', '3'),
('LRIF3GC06', '3'),
('LRIF3GC07', '3'),
('LRIF3GC08', '3'),
('LRIF3GC09', '3'),
('MM001', '4'),
('MM002', '4'),
('LBIO001', '5'),
('LBIO002', '5');

-- --------------------------------------------------------

--
-- Structure de la table `programmes`
--

DROP TABLE IF EXISTS `programmes`;
CREATE TABLE IF NOT EXISTS `programmes` (
  `INTITULEP` char(32) NOT NULL,
  `EXPLICATION` char(200) DEFAULT NULL,
  PRIMARY KEY (`INTITULEP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `programmes`
--

INSERT INTO `programmes` (`INTITULEP`, `EXPLICATION`) VALUES
('APUI', 'Agence de placement universitaire mondiale\r\n'),
('Erasmus', 'Echange Europe'),
('MICEFA', 'Lien universites Paris USA');

-- --------------------------------------------------------

--
-- Structure de la table `universites`
--

DROP TABLE IF EXISTS `universites`;
CREATE TABLE IF NOT EXISTS `universites` (
  `NOMU` char(50) NOT NULL,
  `ADRESSEPOSTU` char(100) DEFAULT NULL,
  `ADRESSEWEBU` char(50) DEFAULT NULL,
  `ADRESSEELECTU` char(50) DEFAULT NULL,
  PRIMARY KEY (`NOMU`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `universites`
--

INSERT INTO `universites` (`NOMU`, `ADRESSEPOSTU`, `ADRESSEWEBU`, `ADRESSEELECTU`) VALUES
('Capitole', '2 Rue du Doyen-Gabriel-Marty 31042 Toulouse', 'http://www.ut-capitole.fr', 'scolarite.generale@ut-capitole.fr'),
('INSA', '135 Avenue de Rangueil 31077 Toulouse', 'https://www.insa-toulouse.fr', 'secretarait general@insa-toulouse.fr'),
('Jean Jaures', '5 allees Antonio Machado 31058 Toulouse', 'http://www.univ-tlse2.fr', 'secretariat.general@univ-tlse2.fr'),
('Paul Sabatier', '118 route de Narbonne 31062 Toulouse', 'http://www.univ-tlse3.fr', 'secretariat.general@univ-tlse3.fr'),
('TBS', '1 Place Alphonse Jourdain 31068 Toulouse', 'http://www.tbs-education.fr', 'scolarite.generale@tbs-toulouse.fr');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
