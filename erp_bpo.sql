-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 06 Décembre 2018 à 09:55
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `erp_bpo`
--

-- --------------------------------------------------------

--
-- Structure de la table `cvtheque`
--

CREATE TABLE `cvtheque` (
  `CV_ID` int(11) NOT NULL,
  `RECRUTEMENT_ID` int(11) DEFAULT NULL,
  `CV_NOM` varchar(150) DEFAULT NULL,
  `CV_NOM_FICHIER` varchar(150) DEFAULT NULL,
  `CV_TAILLE` varchar(150) DEFAULT NULL,
  `CV_CHEMIN` varchar(150) DEFAULT NULL,
  `CV_DATEUPLOAD` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cvtheque`
--

INSERT INTO `cvtheque` (`CV_ID`, `RECRUTEMENT_ID`, `CV_NOM`, `CV_NOM_FICHIER`, `CV_TAILLE`, `CV_CHEMIN`, `CV_DATEUPLOAD`) VALUES
(3, 9, 'razafy', 'cv9_razafy.pdf', '643606', '/upload/cv/SCHEMA INFRASTRUCTURE BPO-V1.pdf', '2018-03-21 15:13:11'),
(4, 9, 'rajo rakoto', 'cv9_rajo rakoto.pdf', '643606', 'upload/cv/cv9_rajo rakoto.pdf', '2018-03-21 15:16:19'),
(5, 9, 'alanealane', 'cv9_alanealane.pdf', '2914243', 'upload/cv/cv9_alanealane.pdf', '2018-03-21 15:48:17');

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `DEPT_ID` int(11) NOT NULL,
  `DEPT_NOM` varchar(150) DEFAULT NULL,
  `DEPT_SITE` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `departement`
--

INSERT INTO `departement` (`DEPT_ID`, `DEPT_NOM`, `DEPT_SITE`) VALUES
(1, 'Informatique ', 'BPO '),
(2, 'Recrutement', 'BPO');

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

CREATE TABLE `droit` (
  `DROIT_ID` int(11) NOT NULL,
  `DROIT_RECRUTEMENT` int(11) DEFAULT '0',
  `DROIT_UTILISATEUR` int(11) DEFAULT '0',
  `DROIT_STATISTIQUE` int(11) DEFAULT '0',
  `DROIT_ENREGISTREMENT` int(11) DEFAULT '0',
  `USER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `droit`
--

INSERT INTO `droit` (`DROIT_ID`, `DROIT_RECRUTEMENT`, `DROIT_UTILISATEUR`, `DROIT_STATISTIQUE`, `DROIT_ENREGISTREMENT`, `USER_ID`) VALUES
(1, NULL, 1, 1, 1, 1),
(2, NULL, NULL, 0, 0, 2),
(3, 1, 1, 1, 0, 3),
(4, NULL, NULL, 0, 0, 4),
(6, 1, NULL, 0, 0, 9),
(7, NULL, NULL, 0, 0, 10),
(8, NULL, NULL, NULL, NULL, 12),
(9, NULL, NULL, NULL, NULL, 13);

-- --------------------------------------------------------

--
-- Structure de la table `recrutement`
--

CREATE TABLE `recrutement` (
  `RECRUTEMENT_DEBUT` date DEFAULT NULL,
  `RECRUTEMENT_ABANDON` int(11) DEFAULT '0',
  `RECRUTEMENT_ID` int(11) NOT NULL,
  `USER_ID` int(11) DEFAULT NULL,
  `RECRUTEMENT_POSTE` varchar(250) DEFAULT NULL,
  `RECRUTEMENT_CAMPAGNE` mediumtext,
  `RECRUTEMENT_NOMBRE` int(11) DEFAULT NULL,
  `RECRUTEMENT_TYPE_CONTRAT` varchar(250) DEFAULT NULL,
  `RECRUTEMENT_HORAIRE_MENSUEL` varchar(150) DEFAULT NULL,
  `RECRUTEMENT_DEMANDEUR` varchar(75) DEFAULT NULL,
  `RECRUTEMENT_QUALIFICATION` mediumtext,
  `RECRUTEMENT_COMPETENCE` mediumtext,
  `RECRUTEMENT_ATOUT` mediumtext,
  `RECRUTEMENT_DEADLINE` date DEFAULT NULL,
  `RECRUTEMENT_TRAITE` int(11) DEFAULT '0',
  `RECRUTEMENT_MOTIF_ABANDON` mediumtext,
  `RECRUTEMENT_CLOTURE` int(11) NOT NULL DEFAULT '0',
  `RECRUTEMENT_DATE_DEMANDE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `recrutement`
--

INSERT INTO `recrutement` (`RECRUTEMENT_DEBUT`, `RECRUTEMENT_ABANDON`, `RECRUTEMENT_ID`, `USER_ID`, `RECRUTEMENT_POSTE`, `RECRUTEMENT_CAMPAGNE`, `RECRUTEMENT_NOMBRE`, `RECRUTEMENT_TYPE_CONTRAT`, `RECRUTEMENT_HORAIRE_MENSUEL`, `RECRUTEMENT_DEMANDEUR`, `RECRUTEMENT_QUALIFICATION`, `RECRUTEMENT_COMPETENCE`, `RECRUTEMENT_ATOUT`, `RECRUTEMENT_DEADLINE`, `RECRUTEMENT_TRAITE`, `RECRUTEMENT_MOTIF_ABANDON`, `RECRUTEMENT_CLOTURE`, `RECRUTEMENT_DATE_DEMANDE`) VALUES
('2018-02-27', 0, 4, 1, 'IT PROD', 'Informatique', 4, 'CDD 3mois puis CDI', '168 h plus shift quelques fois le week end', 'rija', 'Connaissances en BDD Mysql ,\r\nACCESS , EXCEL, \r\n\r\n', 'BACC +4  en informatique\r\nspécialité système et réseau\r\n', 'Dynamique, \r\nsociable, \r\napte à travailler sous pression', '2018-03-09', 1, '0', 0, '2018-02-22 15:20:01'),
(NULL, 1, 5, 1, 'IT MANAGER', 'Informatique', 1, 'CDD 6 mois puis CDI', 'comme il veut', 'rija', 'Aucune qualification requise', 'bien ', 'aucun pour le moment', '2018-02-23', 0, 'Nous n\'avons pas de budget pour le moment', 2018, '2018-02-22 15:47:41'),
(NULL, 1, 6, 1, 'AGENT CALL', 'IT PROSPECT', 20, 'CDD 3 mois puis CDI', '168', 'rija', 'Bon niveau français', '  connaissance en informatique', 'bonne elocution', '2018-03-22', 0, 'ce n\'est pas possible', 2018, '2018-02-23 09:17:26'),
('2018-03-19', 0, 7, 1, 'AGENT ABP', 'ABP', 2, 'CDD 6 mois puis CDI', '140h', 'rija', 'Français courant', '  bien', 'aucun pour le moment', '2018-02-23', 1, NULL, 0, '2018-02-23 09:33:15'),
(NULL, 1, 8, 4, 'IT PROD', 'Informatique', 1, 'CDD 6 mois puis CDI', '168 h plus shift quelques fois le week end', 'Tanjona', 'installation systeme d\'exploitation', ' compétences ', 'bonne condition physique pour combattre les méchants comme fabrice', '2018-03-15', 0, 'attendons la fin du mois', 2018, '2018-02-28 13:41:28'),
('2018-03-09', 0, 9, 4, 'agent prod', 'esokia', 3, 'CDD 3mois puis CDI', '172h mensuel', 'Tanjona', 'Juste ce qui est nécessaire', 'pas besoin de grande compétence', 'tu auras plein d\'atouts', '2018-03-14', 1, NULL, 0, '2018-03-02 15:53:48'),
(NULL, 0, 10, 10, 'IT PROD', 'Informatique', 3, 'CDD 6 mois puis CDI', '172h mensuel', 'Fabrice', 'BlaBlaBlaBlaBlaBlaBlaBlaBlaBlaBlaBla', 'test testtesttesttesttesttest testtesttesttesttest', 'test atout', '2018-03-30', 0, NULL, 0, '2018-03-17 13:25:24'),
(NULL, 0, 11, 1, 'Assistant technique', 'Redaction du web', 3, 'CDD 6 mois puis CDI', '168 h plus shift quelques fois le week end', 'rija', 'Bon niveau de français\r\nBacc+3 minimum\r\n2 ans d\'expérience', 'Bon niveau de lecture', 'apte à travailler sous pression', '2018-04-11', 0, NULL, 0, '2018-03-19 08:53:02');

-- --------------------------------------------------------

--
-- Structure de la table `smsapi`
--

CREATE TABLE `smsapi` (
  `id_sms` int(11) NOT NULL,
  `sms_emetteur` varchar(75) DEFAULT NULL,
  `sms_dest` varchar(250) DEFAULT NULL,
  `sms_tel` varchar(75) NOT NULL,
  `sms_codeIBAN` varchar(250) NOT NULL,
  `sms_email` varchar(75) NOT NULL,
  `sms_contenu` text NOT NULL,
  `USER_ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sms_modele`
--

CREATE TABLE `sms_modele` (
  `id_modele` int(11) NOT NULL,
  `contenu_modele` text NOT NULL,
  `createur_modele` varchar(50) NOT NULL,
  `date_heure_creation_modele` datetime NOT NULL,
  `nom_modele` varchar(50) NOT NULL,
  `emetteur_modele` varchar(75) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sms_modele`
--

INSERT INTO `sms_modele` (`id_modele`, `contenu_modele`, `createur_modele`, `date_heure_creation_modele`, `nom_modele`, `emetteur_modele`) VALUES
(1, 'Votre envoi "X1" en provenance de "X2" ne peut être livré. afin de procéder aux déclarations douanières, faites nous parvenir la facture commerciale du contenu de votre envoi ; à défaut une facture pro forma http://www.chronopost.fr/sites/default/files/atoms/files/facture_pro_forma.pdf ou une facture de transaction PayPal. A l\'adresse douane.import@chronopost.fr', 'rija', '2018-11-02 10:23:13', 'Chronopost', 'Chronopost');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `USER_ID` int(11) NOT NULL,
  `DEPT_ID` int(11) DEFAULT NULL,
  `USER_MATRICULE` varchar(15) DEFAULT NULL,
  `USER_NOMCOMPLET` varchar(250) DEFAULT NULL,
  `USER_LOGIN` varchar(20) DEFAULT NULL,
  `USER_MDP` varchar(15) DEFAULT NULL,
  `USER_LASTACTIVITY` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `USER_MAIL` varchar(150) NOT NULL,
  `USER_POSTE` varchar(250) NOT NULL,
  `USER_SEXE` varchar(10) NOT NULL,
  `USER_ACTIF` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`USER_ID`, `DEPT_ID`, `USER_MATRICULE`, `USER_NOMCOMPLET`, `USER_LOGIN`, `USER_MDP`, `USER_LASTACTIVITY`, `USER_MAIL`, `USER_POSTE`, `USER_SEXE`, `USER_ACTIF`) VALUES
(1, 1, '917/17', 'RAKOTOMALALA Rijanavalona Eddy', 'rija', '1111', '2018-11-06 10:59:24', 'r.rakotomalala@bpooceanindien.com', 'Développeur web', 'homme', 1),
(2, 2, '772/15', 'Misa ANDRIANAVALONA', 'Misa', '1111', '2018-10-23 10:13:05', 'a.misa@bpooceanindien.com', 'Chargée de Recrutement', 'femme', 0),
(3, NULL, '901/01', 'RANDRIANARIJAONA Noro', 'Noro', '1111', '2018-10-23 10:17:59', 'n.randrianarijaona@bpooceanindien.com', 'Responsable production', 'femme', 1),
(4, NULL, '903/17', 'RANALINARIVO Tanjona', 'Tanjona', '', '2018-03-16 11:45:06', 't.ranalinarivo@bpooceanindien.com', 'Informaticien', 'homme', 0),
(9, NULL, '845/15', 'Miandry Lalaina', 'lalaina', '1111', '2018-10-23 10:13:27', 'lalaina@bpooceanindien.com', 'Responsable informatique', 'homme', 1),
(10, NULL, '663/16', 'Vonjiniaina Fabrice', 'Fabrice', '1111', '2018-03-29 06:31:05', 'fabrice@bpooceanindien.com', 'Informaticien', 'homme', 1),
(11, NULL, '000/18', 'homeplus', 'homeplus', '1234', '2018-10-24 08:25:20', 'aucun@mail.com', 'campagne', 'homme', 1),
(13, NULL, '001/18', 'assuredirect', 'assuredirect', '1234', '2018-11-06 10:55:00', 'r.ridjy@gmail.com', 'campagne', 'homme', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cvtheque`
--
ALTER TABLE `cvtheque`
  ADD PRIMARY KEY (`CV_ID`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`DEPT_ID`);

--
-- Index pour la table `droit`
--
ALTER TABLE `droit`
  ADD PRIMARY KEY (`DROIT_ID`);

--
-- Index pour la table `recrutement`
--
ALTER TABLE `recrutement`
  ADD PRIMARY KEY (`RECRUTEMENT_ID`);

--
-- Index pour la table `smsapi`
--
ALTER TABLE `smsapi`
  ADD PRIMARY KEY (`id_sms`);

--
-- Index pour la table `sms_modele`
--
ALTER TABLE `sms_modele`
  ADD PRIMARY KEY (`id_modele`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cvtheque`
--
ALTER TABLE `cvtheque`
  MODIFY `CV_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `DEPT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `droit`
--
ALTER TABLE `droit`
  MODIFY `DROIT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `recrutement`
--
ALTER TABLE `recrutement`
  MODIFY `RECRUTEMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `smsapi`
--
ALTER TABLE `smsapi`
  MODIFY `id_sms` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `sms_modele`
--
ALTER TABLE `sms_modele`
  MODIFY `id_modele` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
