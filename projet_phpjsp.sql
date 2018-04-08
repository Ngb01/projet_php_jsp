-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 08 avr. 2018 à 12:02
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
-- Base de données :  `projet_phpjsp`
--

-- --------------------------------------------------------

--
-- Structure de la table `compatible`
--

DROP TABLE IF EXISTS `compatible`;
CREATE TABLE IF NOT EXISTS `compatible` (
  `CODECOURS` int(2) NOT NULL,
  `CODECOURS_1` int(2) NOT NULL,
  PRIMARY KEY (`CODECOURS`,`CODECOURS_1`),
  KEY `I_FK_COMPATIBLE_COURS` (`CODECOURS`),
  KEY `I_FK_COMPATIBLE_COURS1` (`CODECOURS_1`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `composercontrat`
--

DROP TABLE IF EXISTS `composercontrat`;
CREATE TABLE IF NOT EXISTS `composercontrat` (
  `CODECOURS` varchar(10) NOT NULL,
  `IDCONTRAT` int(2) NOT NULL,
  PRIMARY KEY (`CODECOURS`,`IDCONTRAT`),
  KEY `I_FK_COMPOSERCONTRAT_COURS` (`CODECOURS`),
  KEY `I_FK_COMPOSERCONTRAT_CONTRATS` (`IDCONTRAT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `composercontrat`
--

INSERT INTO `composercontrat` (`CODECOURS`, `IDCONTRAT`) VALUES
('LBIO001', 5),
('LBIO002', 5);

-- --------------------------------------------------------

--
-- Structure de la table `contrats`
--

DROP TABLE IF EXISTS `contrats`;
CREATE TABLE IF NOT EXISTS `contrats` (
  `IDCONTRAT` int(2) NOT NULL AUTO_INCREMENT,
  `CODEDIP` int(2) NOT NULL,
  `REFDEMMOB` int(2) NOT NULL,
  `INTITULEP` varchar(128) DEFAULT NULL,
  `DUREE` int(3) DEFAULT NULL,
  `ETATCONTRAT` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`IDCONTRAT`),
  KEY `I_FK_CONTRATS_DIPLOMES` (`CODEDIP`),
  KEY `I_FK_CONTRATS_DEMANDESMOBILES` (`REFDEMMOB`),
  KEY `I_FK_CONTRATS_PROGRAMMES` (`INTITULEP`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contrats`
--

INSERT INTO `contrats` (`IDCONTRAT`, `CODEDIP`, `REFDEMMOB`, `INTITULEP`, `DUREE`, `ETATCONTRAT`) VALUES
(6, 1, 1, 'ERASMUS', 10, 'Nouveau'),
(5, 5, 1, 'MICEFA', 4, 'En cours');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `CODECOURS` varchar(10) NOT NULL,
  `LIBELLECOURS` varchar(128) DEFAULT NULL,
  `NBECTS` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`CODECOURS`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`CODECOURS`, `LIBELLECOURS`, `NBECTS`) VALUES
('BTSA001', 'Sciences des plantes', '50'),
('BTSA002', 'Elevage', '30'),
('DUTG001', 'Economie', '30'),
('DUTG002', 'Gestion', '35'),
('LBIO001', 'Micro-biologie', '50'),
('LBIO002', 'Chimie organique', '40'),
('LRIF3GC01', 'Developpement d\'applications web', '50'),
('LRIF3GC02', 'Securite', '30'),
('LRIF3GC03', 'Gestion de projet', '40'),
('LRIF3GC04', 'Reseaux', '30'),
('LRIF3GC05', 'Anglais', '20'),
('LRIF3GC06', 'Programmation', '40'),
('LRIF3GC07', 'Droit', '20'),
('LRIF3GC08', 'Communication', '20'),
('LRIF3GC09', 'Maths', '10'),
('MM001', 'Algèbre', '40'),
('MM002', 'Mathématiques appliquées', '68');

-- --------------------------------------------------------

--
-- Structure de la table `demandesfinancieres`
--

DROP TABLE IF EXISTS `demandesfinancieres`;
CREATE TABLE IF NOT EXISTS `demandesfinancieres` (
  `REFDEMFIN` int(2) NOT NULL AUTO_INCREMENT,
  `IDCONTRAT` int(2) NOT NULL,
  `DATEDEPOTDEMFIN` date DEFAULT NULL,
  `ETATDEMFIN` varchar(128) DEFAULT NULL,
  `MONTANTACCORDE` int(10) DEFAULT NULL,
  PRIMARY KEY (`REFDEMFIN`),
  KEY `I_FK_DEMANDESFINANCIERES_CONTRATS` (`IDCONTRAT`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demandesfinancieres`
--

INSERT INTO `demandesfinancieres` (`REFDEMFIN`, `IDCONTRAT`, `DATEDEPOTDEMFIN`, `ETATDEMFIN`, `MONTANTACCORDE`) VALUES
(1, 5, '2018-04-17', 'Nouveau', 10000),
(2, 6, '2018-04-30', 'En attente', 20001);

-- --------------------------------------------------------

--
-- Structure de la table `demandesmobiles`
--

DROP TABLE IF EXISTS `demandesmobiles`;
CREATE TABLE IF NOT EXISTS `demandesmobiles` (
  `REFDEMMOB` int(2) NOT NULL AUTO_INCREMENT,
  `NUMETUDIANT` int(2) NOT NULL,
  `CODEDIP` int(2) NOT NULL,
  `DATEDEPOTDEMMOB` date DEFAULT NULL,
  `ETATDEMMOB` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`REFDEMMOB`),
  UNIQUE KEY `I_FK_DEMANDESMOBILES_ETUDIANTS` (`NUMETUDIANT`),
  KEY `I_FK_DEMANDESMOBILES_DIPLOMES` (`CODEDIP`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demandesmobiles`
--

INSERT INTO `demandesmobiles` (`REFDEMMOB`, `NUMETUDIANT`, `CODEDIP`, `DATEDEPOTDEMMOB`, `ETATDEMMOB`) VALUES
(1, 2, 2, '2018-04-11', 'Acceptée'),
(2, 1, 3, '2018-04-18', 'En attente'),
(3, 5, 2, '2018-04-03', 'Nouveau');

-- --------------------------------------------------------

--
-- Structure de la table `diplomes`
--

DROP TABLE IF EXISTS `diplomes`;
CREATE TABLE IF NOT EXISTS `diplomes` (
  `CODEDIP` int(2) NOT NULL AUTO_INCREMENT,
  `NOMU` varchar(128) NOT NULL,
  `INTITULEDIP` varchar(128) DEFAULT NULL,
  `ADRESSEWEBD` varchar(128) DEFAULT NULL,
  `NIVEAU` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`CODEDIP`),
  KEY `I_FK_DIPLOMES_UNIVERSITES` (`NOMU`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `diplomes`
--

INSERT INTO `diplomes` (`CODEDIP`, `NOMU`, `INTITULEDIP`, `ADRESSEWEBD`, `NIVEAU`) VALUES
(1, 'Capitole', 'DUT GEA', 'www.dut-paulsabatier.fr', 'BAC +2'),
(2, 'INSA', 'BTS Agriculture', 'www.laroque.fr', 'BAC +2'),
(3, 'Jean Jaures', 'Licence pro RTAI', 'www.licencepro.fr', 'BAC +3'),
(4, 'Paul Sabatier', 'Master Mathématiques', 'www.master.fr', 'BAC +5'),
(5, 'TBS', 'Licence Bio', 'http://www.paulsabatier.fr', 'BAC +3');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE IF NOT EXISTS `etudiants` (
  `NUMETUDIANT` int(2) NOT NULL AUTO_INCREMENT,
  `CODEDIP` int(2) NOT NULL,
  `NOMET` varchar(128) DEFAULT NULL,
  `PRENOMET` varchar(128) DEFAULT NULL,
  `EMAIL` varchar(128) DEFAULT NULL,
  `CV` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`NUMETUDIANT`),
  KEY `I_FK_ETUDIANTS_DIPLOMES` (`CODEDIP`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`NUMETUDIANT`, `CODEDIP`, `NOMET`, `PRENOMET`, `EMAIL`, `CV`) VALUES
(1, 2, 'BASCOUL', 'Thomas', 'thomasbascoul@outlook.fr', 'cvToto'),
(2, 2, 'SAUSSOL', 'Guillaume', 'guigui@outlook.fr', 'cvGuigui'),
(3, 4, 'ANGEL', 'Sébastien', 'bast@hotmail.fr', ''),
(4, 3, 'HIOT', 'Tim', 'theteam@orange.fr', 'cvTimmy'),
(5, 5, 'CHAUVET', 'Marine', 'lavoyageuse@sfr.fr', 'cvMama'),
(7, 7, 'CHAUVET', 'Sophie', 'sophie@mail.fr', 'sophieCV');

-- --------------------------------------------------------

--
-- Structure de la table `impliqueu`
--

DROP TABLE IF EXISTS `impliqueu`;
CREATE TABLE IF NOT EXISTS `impliqueu` (
  `NOMU` varchar(128) NOT NULL,
  `INTITULEP` varchar(128) NOT NULL,
  PRIMARY KEY (`NOMU`,`INTITULEP`),
  KEY `I_FK_IMPLIQUEU_UNIVERSITES` (`NOMU`),
  KEY `I_FK_IMPLIQUEU_PROGRAMMES` (`INTITULEP`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `impliqueu`
--

INSERT INTO `impliqueu` (`NOMU`, `INTITULEP`) VALUES
('Capitole', 'MICEFA'),
('INSA', 'APUI'),
('INSA', 'Erasmus'),
('Jean Jaures', 'Erasmus'),
('Paul Sabatier', 'APUI'),
('TBS', 'Erasmus'),
('TBS', 'MICEFA');

-- --------------------------------------------------------

--
-- Structure de la table `prodiplome`
--

DROP TABLE IF EXISTS `prodiplome`;
CREATE TABLE IF NOT EXISTS `prodiplome` (
  `CODEDIP` int(2) NOT NULL,
  `CODECOURS` varchar(10) NOT NULL,
  PRIMARY KEY (`CODEDIP`,`CODECOURS`),
  KEY `I_FK_PRODIPLOME_DIPLOMES` (`CODEDIP`),
  KEY `I_FK_PRODIPLOME_COURS` (`CODECOURS`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `prodiplome`
--

INSERT INTO `prodiplome` (`CODEDIP`, `CODECOURS`) VALUES
(1, 'DUTG001'),
(1, 'DUTG002'),
(1, 'DUTG003'),
(1, 'DUTG004'),
(1, 'DUTG005'),
(2, 'BTSA001'),
(2, 'BTSA002'),
(3, 'LRIF3GC01'),
(3, 'LRIF3GC02'),
(3, 'LRIF3GC03'),
(3, 'LRIF3GC04'),
(3, 'LRIF3GC05'),
(3, 'LRIF3GC06'),
(3, 'LRIF3GC07'),
(3, 'LRIF3GC08'),
(3, 'LRIF3GC09'),
(4, 'MM001'),
(4, 'MM002'),
(5, 'LBIO001'),
(5, 'LBIO002');

-- --------------------------------------------------------

--
-- Structure de la table `programmes`
--

DROP TABLE IF EXISTS `programmes`;
CREATE TABLE IF NOT EXISTS `programmes` (
  `INTITULEP` varchar(128) NOT NULL,
  `EXPLICATION` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`INTITULEP`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `NOMU` varchar(128) NOT NULL,
  `ADRESSEPOSTU` varchar(128) DEFAULT NULL,
  `ADRESSEWEBU` varchar(128) DEFAULT NULL,
  `ADRESSEELECTU` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`NOMU`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
