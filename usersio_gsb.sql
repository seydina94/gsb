-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 22 Janvier 2020 à 22:03
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `usersio_gsb`
--

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE `medecin` (
  `ID` int(11) NOT NULL,
  `ID_POSSEDE` int(11) NOT NULL,
  `NOM` varchar(255) DEFAULT NULL,
  `PRENOM` varchar(255) DEFAULT NULL,
  `ADRESSE` varchar(255) DEFAULT NULL,
  `VILLE_MEDECIN` varchar(255) NOT NULL,
  `CP_MEDECIN` int(5) NOT NULL,
  `TEL` varchar(32) DEFAULT NULL,
  `DEPARTEMENT` int(2) DEFAULT NULL,
  `PHOTO` varchar(255) DEFAULT 'images/portrait-medecin.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `medecin`
--

INSERT INTO `medecin` (`ID`, `ID_POSSEDE`, `NOM`, `PRENOM`, `ADRESSE`, `VILLE_MEDECIN`, `CP_MEDECIN`, `TEL`, `DEPARTEMENT`, `PHOTO`) VALUES
(1, 1, 'Garcion', 'Cedric', '69 Rue de la Juiverie', 'Nantes', 44100, '02 12 45 78 36', 44, 'images/portrait-medecin.jpg'),
(2, 2, 'Bertin', 'Ã‰lizabeth', '52 Rue de l\'Abreuvoir', ' Niort', 79000, '02 74 85 96 32', 44, 'images/portrait-medecin.jpg'),
(3, 3, 'Bousquet', 'Christine', '36 Rue des Cadeniers', 'Paris', 75000, '02 52 63 41 85', 35, 'images/portrait-medecin.jpg'),
(4, 4, 'CanÃ©vet', 'Paul', '75 Bd de Doulon', 'AlenÃ§on', 61000, '02 33 54 96 87', 35, 'images/portrait-medecin.jpg'),
(5, 5, 'Catoire', 'Georges', '26 Rue de l\'Ã‰chappÃ©e', 'Dijon', 21000, '02 85 52 41 45', 79, 'images/portrait-medecin.jpg'),
(6, 6, 'Pesta', 'Richard', '42 Rue des Ferblantiers', 'Lille', 59000, '02 52 45 55 21', 79, 'images/portrait-medecin.jpg'),
(7, 2, 'Tim', 'Vincent', '125 Rue de la Monnaie', 'Rennes', 35000, '02 02 25 19 24', 20, 'images/portrait-medecin.jpg'),
(8, 4, 'Korb', 'Owen', '53 Place des Garennes', 'Marseille', 13000, '02 54 52 51 53', 44, 'images/portrait-medecin.jpg'),
(9, 6, 'Forbes-Grifon', 'Michel', '83 Avenue des Amours', 'Aix-en-Provence', 13000, '02 98 56 18 24', 44, 'images/portrait-medecin.jpg'),
(10, 2, 'Linet', 'Teddy', '65 Places des Grands Coeurs', 'Nantes', 44120, '02 36 25 14 98', 35, 'images/portrait-medecin.jpg'),
(11, 3, 'Chaudet', 'Ramon', '2 rue des Bois DorÃ©', 'Nantes', 44000, '01 02 03 04 05', 1, 'images/portrait-medecin.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `motif`
--

CREATE TABLE `motif` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `motif`
--

INSERT INTO `motif` (`id`, `libelle`) VALUES
(1, 'Visite Annuelle'),
(2, 'Presentation d\'un nouveau medicament'),
(3, 'Sollicitation du medecin'),
(4, 'Visite bi-mensuelle');

-- --------------------------------------------------------

--
-- Structure de la table `rapport`
--

CREATE TABLE `rapport` (
  `ID` int(32) NOT NULL,
  `ID_REDIGER` int(32) NOT NULL,
  `ID_CONCERNE` int(32) NOT NULL,
  `DATERAPPORT` date NOT NULL,
  `MOTIF` int(255) DEFAULT NULL,
  `BILAN` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `rapport`
--

INSERT INTO `rapport` (`ID`, `ID_REDIGER`, `ID_CONCERNE`, `DATERAPPORT`, `MOTIF`, `BILAN`) VALUES
(12, 5, 2, '2014-04-24', 2, 'Le mÃ©decin visitÃ© a choisi de nous recontacter ultÃ©rieurement pour nous faire part de sa dÃ©cision.'),
(14, 4, 4, '2014-04-28', 4, 'Retour aprÃ¨s vers le mÃ©decin aprÃ¨s 15 jours pour vÃ©rifier sa satisfaction, jusqu\'Ã  prÃ©sent tout ce passe bien.'),
(15, 1, 1, '2014-02-24', 2, 'Nous avons rencontrÃ© le Docteur Garcion afin de lui proposer notre nouveau mÃ©dicament, MÃ©diator.\r\n'),
(16, 3, 6, '2014-03-11', 3, 'Nous avons sollicitÃ© le Dr. Pesta afin d\'avoir son accord pour diffuser notre nouveau mÃ©dicament Ã  ses patients, s\'ils rentrent dans les critÃ¨res.'),
(17, 2, 8, '2013-11-28', 1, 'Visite annuelle avec le Docteur Korb pour renouveler notre partenariat.'),
(18, 3, 11, '2014-05-20', 2, 'PrÃ©sentation d\'une heure du Durapirox avec le Docteur Chaudet.\r\nIl semble intÃ©ressÃ© et reviendra vers nous sous peu.'),
(19, 6, 5, '2014-06-18', 3, 'Le Docteur Catoire nous a contacter afin de connaÃ®tre nos nouveaux produits et voir lesquels pourrait l\'intÃ©resser.'),
(20, 5, 9, '2013-07-28', 4, 'L\'Ã©tude clinique mÃ©dicamenteuse se passe correctement, aucunes rÃ©actions allergÃ¨nes constater chez les patients du Dr. Forbes-Griffon'),
(21, 1, 10, '2013-08-18', 1, 'Cessation de toute activitÃ© avec le Dr. Linet, suite Ã  son changement de cabinet.'),
(22, 3, 3, '2013-09-26', 3, 'Le Dr. Bousquet souhaitait nous informer que des rÃ©actions inattendues sont survenus chez certains patients et que par consÃ©quent il souhaitait arrÃªter la diffusion de notre mÃ©dicament dans son cabinet, malgrÃ© le contrat prÃ©cÃ©demment signÃ©.');

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `ID` int(32) NOT NULL,
  `LIBELLE` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `specialite`
--

INSERT INTO `specialite` (`ID`, `LIBELLE`) VALUES
(1, 'Neurochirurgie'),
(2, 'OthopÃ©die'),
(3, 'GÃ©nÃ©raliste'),
(4, 'PÃ©do-psychatrie'),
(5, 'CancÃ©rologie'),
(6, 'Pneumologie'),
(7, 'MÃ©decine du sport'),
(8, 'Cardiologie');

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

CREATE TABLE `visiteur` (
  `ID` int(32) NOT NULL,
  `NOM` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `PRENOM` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `LOGIN` varchar(255) CHARACTER SET utf8 NOT NULL,
  `PASSWORD` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ADRESSE` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `VILLE` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `CP` int(11) NOT NULL,
  `MAIL` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DATEEMBAUCHE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `visiteur`
--

INSERT INTO `visiteur` (`ID`, `NOM`, `PRENOM`, `LOGIN`, `PASSWORD`, `ADRESSE`, `VILLE`, `CP`, `MAIL`, `DATEEMBAUCHE`) VALUES
(1, 'Martin', 'Ayden', 'martin1', '', '18 Bd des Anglais', 'Nantes', 44000, 'toto@toto.fr', '0000-00-00'),
(2, 'Dubois', 'Bradley', 'martin2', '202cb962ac59075b964b07152d234b70', '152 Bd des Américains', 'Nantes', 44000, 'toto@toto.fr', '0000-00-00'),
(3, 'Garnier', 'Lorenzo', 'martin3', '202cb962ac59075b964b07152d234b70', '92 Avenue des Champs', 'Fleury les Aubrais', 45400, 'toto@toto.fr', '0000-00-00'),
(4, 'Lopez', 'Jenny', 'martin4', '202cb962ac59075b964b07152d234b70', '32 Ruelle des Illuminés', 'Metz', 57000, 'toto@toto.fr', '0000-00-00'),
(5, 'Blanc', 'Alysson', 'martin5', '202cb962ac59075b964b07152d234b70', '93 Rue de la Soif', 'Rennes', 35000, 'blanc@blanc.com', '0000-00-00'),
(6, 'Girard', 'Alistair', 'martin6', '202cb962ac59075b964b07152d234b70', '52 Avenue de l\'étrange', 'Niort', 79000, '', '0000-00-00'),
(7, 'Pasco', 'Mathieu', 'mathieu', '202cb962ac59075b964b07152d234b70', '11, rue du gaie jean-louis', 'Rennes', 35700, 'tito@plot.fr', '0000-00-00'),
(8, 'Plissonneau', 'Valentin', 'val', '202cb962ac59075b964b07152d234b70', '15, rue de la joie', 'Nantes', 44000, 'moi@moi.moi', '0000-00-00'),
(9, 'Richard', 'Clément', 'clement', '202cb962ac59075b964b07152d234b70', '42, rue de l\'indice', 'New-York', 99011, 'tit@titi.fr', '0000-00-00'),
(11, 'Radjavelou', 'Randjith', 'randjith', 'randjith', '10 rue de Paris', 'Paris', 75019, 'randjith @gmail.com', '2019-01-01'),
(12, 'Diene', 'Seydina', 'seydina', 'seydina', '9 rue de Paris', 'Paris', 75000, 'seydina@gmail.com', '0000-00-00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_MEDECIN_SPECIALITE` (`ID_POSSEDE`);

--
-- Index pour la table `motif`
--
ALTER TABLE `motif`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rapport`
--
ALTER TABLE `rapport`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_RAPPORT_MEDECIN` (`ID_CONCERNE`),
  ADD KEY `FK_RAPPORT_VISITEUR` (`ID_REDIGER`),
  ADD KEY `FK_RAPPORT_MOTIF` (`MOTIF`);

--
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `visiteur`
--
ALTER TABLE `visiteur`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `motif`
--
ALTER TABLE `motif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `rapport`
--
ALTER TABLE `rapport`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `visiteur`
--
ALTER TABLE `visiteur`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD CONSTRAINT `medecin_ibfk_1` FOREIGN KEY (`ID_POSSEDE`) REFERENCES `specialite` (`ID`);

--
-- Contraintes pour la table `rapport`
--
ALTER TABLE `rapport`
  ADD CONSTRAINT `rapport_ibfk_1` FOREIGN KEY (`ID_CONCERNE`) REFERENCES `medecin` (`ID`),
  ADD CONSTRAINT `rapport_ibfk_2` FOREIGN KEY (`ID_REDIGER`) REFERENCES `visiteur` (`ID`),
  ADD CONSTRAINT `rapport_ibfk_3` FOREIGN KEY (`MOTIF`) REFERENCES `motif` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
