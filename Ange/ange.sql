-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Jeu 31 Janvier 2013 à 08:18
-- Version du serveur: 5.5.16
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `ange`
--

-- --------------------------------------------------------

--
-- Structure de la table `courrier`
--

CREATE TABLE IF NOT EXISTS `courrier` (
  `idcourrier` varchar(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `datearrive` date NOT NULL,
  `expediteur` varchar(200) NOT NULL,
  `objet` text NOT NULL,
  `dateretourfixer` date NOT NULL,
  `suite` text,
  `transfert` int(11) NOT NULL DEFAULT '0',
  `supprimer` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idcourrier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `courrier`
--

INSERT INTO `courrier` (`idcourrier`, `iduser`, `datearrive`, `expediteur`, `objet`, `dateretourfixer`, `suite`, `transfert`, `supprimer`) VALUES
(' 023/ANGE', 9, '2013-01-16', 'COFAD MANAGEMENT', 'Lettre relative Ã  la confirmation des sÃ©minaires de formation du mois de fÃ©vrier Ã  avril 2013', '2013-01-31', 'Aucun', 0, 0),
('010/DEIE', 9, '2013-01-14', 'MinistÃ¨re DÃ©lÃ©guÃ© auprÃ¨s du MAEP chargÃ© des Infrastructures Rurales', 'Lettre transmettant le rapport dÃ©finitif de l''ouverture de la piste Fazao-Tassi et de rÃ©habilitation de la piste Akonta-Fazao', '2013-01-28', 'Aucun', 0, 0),
('011/DEIE', 9, '2013-01-16', 'SociÃ©tÃ© OLIP TOGO', 'Lettre transmettant les rapports finaux de l''EIES du projet de construction d''une station TOTAL Ã  AdÃ©tikopÃ©', '0000-00-00', 'Aucun', 0, 0),
('012/DEIE', 9, '2013-01-16', 'SociÃ©tÃ© ROK PLAST TOGO SARLU', 'Lettre transmettant les rapports dÃ©finitifs du projet de construction d''une usine de fabrication de tuyaux PVC et tuyaux pression Ã  Agbodrafo', '0000-00-00', 'Aucun', 0, 0),
('013/DEIE', 9, '2013-01-17', 'SociÃ©tÃ© WATTE-RA SARL', 'Lettre transmettant le rapport provisoire d''EIES du projet d''implantation d''une unitÃ© de traitement et de transformation de la biomasse sÃ¨che', '0000-00-00', 'Aucun', 0, 0),
('014/DEIE', 9, '2013-01-17', 'ALFO-GROUP', 'Lettre transmettant le rapport provisoire d''EIES du projet d''exploitation et de concassage de gneiss sous forme de gravier Ã  Badja.', '2013-01-31', 'Aucun', 0, 0),
('015/DEIE', 9, '2013-01-18', 'CEET', 'Lettre transmettant les rapports provisoires du projet d''Ã©lectrification transfrontaliÃ¨re des communautÃ©s rurales au Nord du Togo Ã  partir du BÃ©nin et au Sud Ã  partir du Ghana par les Cabinets BEGE et IRAF', '0000-00-00', 'Aucun', 0, 0),
('016/DEIE', 9, '2013-01-18', 'PURISE', 'BE du CD du rapport final de l''audit des activitÃ©s achevÃ©es et en cours d''exÃ©cution', '0000-00-00', 'Aucun', 0, 0),
('017/ANGE', 9, '2013-01-14', 'PHAROM INFORMATIQUE', 'Entretien et installation d''un anti-virus sur le poste de secrÃ©tariat', '0000-00-00', 'Aucun', 0, 0),
('017/DEIE', 9, '2013-01-18', 'SOCIETE NOSITO SARL', 'Lettre transmettant les termes de rÃ©fÃ©rence du projet de construction d''une usine de fabrication de tuyaux PVC, iso orange et emballages plastiques biodÃ©gradables', '0000-00-00', 'Aucun', 0, 0),
('018/ANGE', 9, '2013-01-14', 'Monsieur KODJO KudadzÃ©', 'Demande de congÃ©', '0000-00-00', 'Transmettre au DAF ANGE', 0, 0),
('018/DEIE', 9, '2013-01-21', 'MDMAEPIR', 'Lettre transmettant les rapports finaux de FAZAO-TASSI', '0000-00-00', 'Aucun', 0, 0),
('019/ANGE', 9, '2013-01-14', 'Monsieur KPENGUIE Palakipawi', 'Demande de permission d''absence pour les 16 et 17 janvier 2013', '0000-00-00', 'Avis favorable ', 0, 0),
('019/DEIE', 9, '2013-01-22', 'SOCIETE NINA SARL', 'Lettre transmettant les termes de rÃ©fÃ©rence de l''audit environnemental de la sociÃ©tÃ© NINA SARL', '0000-00-00', 'Aucun', 0, 0),
('020/DEIE', 9, '2013-01-21', 'JAT CONSULTING', 'Lettre transmettant les termes de rÃ©fÃ©rence de l''EIES du projet d''ajout d''une ligne de production d''emballages plastiques biodÃ©gradables par la sociÃ©tÃ© AFRIPLAST', '0000-00-00', 'Aucun', 0, 0),
('021/ANGE', 9, '2013-01-15', 'GBH GROUP', 'Lettre relative Ã  la demande d''audience pour installation d''une usine au Togo', '0000-00-00', 'Aucun', 0, 0),
('021/DEIE', 9, '2013-01-22', 'Monsieur PALI Solim, Consultant EIES', 'Lettre transmettant l''avis de projet et les termes de rÃ©fÃ©rence du projet d''installation d''une unitÃ© de production de bÃ©ton prÃªt Ã  emploi par la sociÃ©tÃ© JELCEM TOGO', '0000-00-00', 'Aucun', 0, 0),
('022/ANGE', 9, '2013-01-16', 'COFAD MANAGEMENT', 'Lettre relative au programme de formation de 2013', '0000-00-00', 'Aucun', 1, 0),
('024/ANGE', 9, '2013-01-16', 'Intitut Africain de Perfectionnement en Informatique (IAPI) ', 'Lettre transmettant le programme de formation de 2013', '2013-01-31', 'Aucun', 0, 0),
('025/ANGE', 9, '2013-01-16', 'Mairie de LomÃ©', 'Lettre relative au projet d''implantation du futur centre d''enfouissement technique des dÃ©chets. RÃ©union de restitution des Ã©tudes de la phase 2 Ã©tape 2 : l''APS du projet PEUL', '2013-01-18', 'Aucun', 0, 0),
('026/ANGE', 9, '2013-01-16', 'TOGOTELECOM', 'Facture du mois de novembre 2012', '2013-01-10', 'Aucun', 0, 0),
('027/ANGE', 9, '2013-01-16', 'AutoritÃ© de RÃ©gulation des MarchÃ©s Publics', 'bordereau d''envoi du rapport provisoire du cadre de gestion environnementale et sociale du projet WARCIP-TOGO', '2013-01-18', 'Aucun', 0, 0),
('028/ANGE', 9, '2013-01-16', 'Agence FranÃ§aise de DÃ©veloppement (AFD)', 'Lettre relative Ã  l''arrÃªt de l''exploitation de la nouvelle fosse d''AgoÃ¨ NyivÃ© du projet PEUL I et II', '2013-01-18', 'Aucun', 0, 0),
('029/ANGE', 9, '2013-01-16', 'ARMP', 'Lettre relative au recouvrement de la taxe parafiscale', '2013-01-18', 'Aucun', 0, 0),
('030/ANGE', 9, '2013-01-17', 'MinistÃ¨re de l''Economie et des Finances ', 'Lettre relative Ã  l''Ã©laboration du PPM de 2013', '2013-01-18', 'Aucun', 0, 0),
('031/ANGE', 9, '2013-01-17', 'SG-MERF', 'Soit transmis de la lettre NÂ° 013/DREFP du 11 janvier 2013 relative au dÃ©dommagement du bÃ¢timent abritant les bureaux de la Direction PrÃ©fectorale de l''Environnement d''AniÃ© et ses 2 piÃ¨ces jointes ', '2013-01-18', 'Aucun', 0, 0),
('032/ANGE', 9, '2013-01-18', 'Docteur KARA-PEKETI Koffi', ' Lettre relative Ã  la consultation sur la convention NÂ° 187 sur l''analyse de la lÃ©gislation et de la pratique nationale au Togo de cette convention', '0000-00-00', 'Aucun', 0, 0),
('033/ANGE', 9, '2013-01-18', 'Direction de la Faune et Chasse', 'Soit transmis du compte rendu relatif Ã  l''abattage d''un crocodile de la mare GamÃ©gblÃ© Ã  AgbÃ©louvÃ©', '0000-00-00', 'Aucun', 0, 0),
('034/ANGE', 9, '2013-01-18', 'Monsieur ABALO La-N''bana', 'Demande de stage ', '0000-00-00', 'Aucun', 0, 0),
('035/ANGE', 9, '2013-01-18', 'Monsieur DJAGBA Kanatine ', 'Demande de stage ', '0000-00-00', 'Aucun', 0, 0),
('036/ANGE', 9, '2013-01-21', 'Correspondance Rapide IngÃ©nieurie en DÃ©veloppement Durable et Environnement (IDDE)', 'Lettre transmettant le document sur le projet de Centre de Gestion IntÃ©grÃ©e des DÃ©chets ', '0000-00-00', 'Aucun', 0, 0),
('037/ANGE', 9, '2013-01-21', 'MPDAT', 'Lettre relative Ã  l''atelier de restitution de l''Ã©tude d''opportunitÃ© du projet de facilitation du commerce et du transport sur le corridor Abidjan-Lagos', '0000-00-00', 'Aucun', 0, 0),
('038/ANGE', 9, '2013-01-21', 'MEAHV ', 'ArrÃªtÃ© portant organisation du ministÃ¨re de l''eau, de l''assainissement et de l''hydraulique villageoise', '0000-00-00', 'Aucun', 0, 0),
('039/ANGE', 9, '2013-01-22', 'SOFRECO ', 'Lettre de demande de congÃ©s de madame Sophie PELLETIER', '0000-00-00', 'Aucun', 0, 0),
('040/ANGE', 9, '2013-01-22', 'MinitÃ¨re du Commerce et de la Promotion du Secteur PrivÃ©', 'Lettre relative Ã  l''invitation Ã  la cÃ©rÃ©monie de lancement officiel du Centre de Formation des Entreprises (CFE) ', '0000-00-00', 'Aucun', 0, 0),
('041/ANGE', 9, '2013-01-22', 'Monsieur BOUARI Abdoul-RaÃ¯mi', 'Demande de stage', '0000-00-00', 'Aucun', 0, 0),
('042/ANGE', 9, '2013-01-24', 'DAC-MERF', 'Lettre relative Ã  la situation sur les programmes et projets', '0000-00-00', 'Aucun', 0, 0),
('043/ANGE', 9, '2013-01-24', 'ARMP', 'Lettre relative au recouvrement de la taxe parafiscale', '0000-00-00', 'Aucun', 0, 0),
('044/ANGE', 9, '2013-01-24', 'MinistÃ¨re de l''Economie et des Finances', 'Lettre relative au rappel de la rÃ©glementation rÃ©gissant la demande et l''utilisation des vÃ©hicules administratifs dans le cadre des missions officielles', '0000-00-00', 'Aucun', 0, 0),
('045/ANGE', 9, '2013-01-24', 'MERF', 'Lettre de la Direction de l''Environnement adressÃ©e Ã  monsieur TOSSOU relative au projet d''amÃ©nagement du bassin de Todman Ã  LomÃ© en vue de la pisciculture ', '0000-00-00', 'Aucun', 0, 0),
('046/ANGE', 9, '2013-01-24', 'DE', 'CR adressÃ© Ã  la MERF sur le projet d''amÃ©nagement du bassin de Todman Ã  LomÃ© en vue de la pisciculture', '0000-00-00', 'Aucun', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `transfert`
--

CREATE TABLE IF NOT EXISTS `transfert` (
  `idtransfert` int(11) NOT NULL AUTO_INCREMENT,
  `idcourrier` varchar(11) NOT NULL,
  `datetransfert` date NOT NULL,
  `receveur` varchar(200) NOT NULL,
  `objet` text NOT NULL,
  `dateretourfixer` date NOT NULL,
  `dateretour` date NOT NULL,
  `suitedonnee` text NOT NULL,
  `supprimer` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idtransfert`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `transfert`
--

INSERT INTO `transfert` (`idtransfert`, `idcourrier`, `datetransfert`, `receveur`, `objet`, `dateretourfixer`, `dateretour`, `suitedonnee`, `supprimer`) VALUES
(1, '022/ANGE', '2013-01-22', 'Paul Kudadze KODJO', 'Pour disposition a prendre', '2013-01-28', '0000-00-00', 'Aucune / Pas de suite pour le moment', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `droit` varchar(20) NOT NULL,
  `droitnotification` varchar(10) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`iduser`, `nom`, `prenom`, `sexe`, `pseudo`, `passwd`, `droit`, `droitnotification`, `etat`) VALUES
(7, 'KODJO', 'Paul Kudadze', 'Homme', 'admin', 'admin', 'admin', 'toutes', 1),
(9, 'SOSSOU', 'hÃ©lÃ¨ne', 'Femme', 'akouavi', 'ange100l', 'rw', 'toutes', 1),
(10, 'DG', 'Dg', 'Homme', 'dgange', 'angetg', 'rw', 'toutes', 1),
(11, 'EKOUE', 'Dede ahoefa', 'Femme', 'ministre', 'angetg', 'r', 'courrier', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
