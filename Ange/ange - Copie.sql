-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Ven 23 Août 2013 à 14:45
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
(' 023/ANGE', 9, '2013-01-16', 'COFAD MANAGEMENT', 'Lettre relative Ã  la confirmation des sÃ©minaires de formation du mois de fÃ©vrier Ã  avril 2013', '2013-01-31', 'A classer dans les archives du Responsabe Information, Formation, Education (RIFE) pour exploitation en temps opprtun', 0, 0),
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
('022/DEIE', 9, '2013-01-24', 'PURISE', 'Lettre transmettant les rapports finaux du projet de de rÃ©alisation de mini-systÃ¨mes autonomes dâ€™Alimentation en Eau Potable des zones pÃ©ri urbaines \nde la ville de LomÃ©\n', '0000-00-00', 'Aucun', 0, 0),
('023/ANGE', 9, '2013-01-16', 'COFAD MANAGEMENT', 'Lettre relative Ã  la confirmation des sÃ©minaires de formations du mois de fÃ©vrier Ã  avril 2013', '0000-00-00', 'Aucun', 1, 0),
('023/DEIE', 9, '2013-01-25', 'SociÃ©tÃ© GLOBAL WORLD TRADING (GWT)', 'Lettre transmettant l''avis de projet et les termes de rÃ©fÃ©rence du projet de construction d''une unitÃ© de stockage et d''emplissage de gaz de pÃ©trole liquÃ©fiÃ© (GPL)', '0000-00-00', 'Aucun', 0, 0),
('024/ANGE', 9, '2013-01-16', 'Intitut Africain de Perfectionnement en Informatique (IAPI) ', 'Lettre transmettant le programme de formation de 2013', '2013-01-31', 'Aucun', 0, 0),
('024/DEIE', 9, '2013-01-25', 'JAT CONSULTING ', 'Lettre transmettant les rapports finaux de l''audit environnemental de la carriÃ¨re de Nanergou exploitÃ©e par la sociÃ©tÃ©  EBOMAF', '0000-00-00', 'Aucun', 0, 0),
('025/ANGE', 9, '2013-01-16', 'Mairie de LomÃ©', 'Lettre relative au projet d''implantation du futur centre d''enfouissement technique des dÃ©chets. RÃ©union de restitution des Ã©tudes de la phase 2 Ã©tape 2 : l''APS du projet PEUL', '2013-01-18', 'Aucun', 0, 0),
('025/DEIE', 9, '2013-01-29', 'JAT CONSULTING', 'Lettre relative Ã  l''abandon de la procÃ©dure d''Ã©valuation du rapport de SAD DÃ©vÃ©go', '0000-00-00', 'Aucun', 0, 0),
('026/ANGE', 9, '2013-01-16', 'TOGOTELECOM', 'Facture du mois de novembre 2012', '2013-01-10', 'Aucun', 0, 0),
('026/DEIE', 9, '2013-01-29', 'MinistÃ¨re des Travaux Publics', 'Lettre relative Ã  la validation de l''EIES des travaux de dÃ©doublement de la route SokodÃ©-Kara-CinkassÃ© (CU 9)', '0000-00-00', 'Aucun', 0, 0),
('027/ANGE', 9, '2013-01-16', 'AutoritÃ© de RÃ©gulation des MarchÃ©s Publics', 'bordereau d''envoi du rapport provisoire du cadre de gestion environnementale et sociale du projet WARCIP-TOGO', '2013-01-18', 'Aucun', 0, 0),
('027/DEIE', 9, '2013-01-29', 'Direction de l''Environnement', 'Soit transmis de la copie de la lettre du projet d''amÃ©nagement du bassin de Todman Ã  LomÃ©', '0000-00-00', 'Aucun', 0, 0),
('028/ANGE', 9, '2013-01-16', 'Agence FranÃ§aise de DÃ©veloppement (AFD)', 'Lettre relative Ã  l''arrÃªt de l''exploitation de la nouvelle fosse d''AgoÃ¨ NyivÃ© du projet PEUL I et II', '2013-01-18', 'Aucun', 0, 0),
('028/DEIE', 9, '2013-01-31', 'SocitÃ© Togolaise de Handling S.A. ', 'Lettre transmettant les TdR de l''audit environnemental ', '0000-00-00', 'Aucun', 0, 0),
('029/ANGE', 9, '2013-01-16', 'ARMP', 'Lettre relative au recouvrement de la taxe parafiscale', '2013-01-18', 'Aucun', 0, 0),
('029/DEIE', 9, '2013-01-31', 'JAT CONSULTING', 'Lettre d''accusÃ© rÃ©ception et accord pour le comitÃ© de suivi stratÃ©gique de SIFEE', '0000-00-00', 'Aucun', 0, 0),
('030/ANGE', 9, '2013-01-17', 'MinistÃ¨re de l''Economie et des Finances ', 'Lettre relative Ã  l''Ã©laboration du PPM de 2013', '2013-01-18', 'Aucun', 0, 0),
('030/DEIE', 9, '2013-01-31', 'ENI TOGO', 'Lettre transmettant le rapport hebdomadaire relatif aux opÃ©ration de forage du puits Kara 1', '0000-00-00', 'Aucun', 0, 0),
('031/ANGE', 9, '2013-01-17', 'SG-MERF', 'Soit transmis de la lettre NÂ° 013/DREFP du 11 janvier 2013 relative au dÃ©dommagement du bÃ¢timent abritant les bureaux de la Direction PrÃ©fectorale de l''Environnement d''AniÃ© et ses 2 piÃ¨ces jointes ', '2013-01-18', 'Aucun', 0, 0),
('031/DEIE', 9, '2013-01-31', 'ENI TOGO', 'Lettre transmettant le rapport hebdomadaire relatif aux opÃ©rations de forage du puits Kara 1', '0000-00-00', 'Aucun', 0, 0),
('032/ANGE', 9, '2013-01-18', 'Docteur KARA-PEKETI Koffi', ' Lettre relative Ã  la consultation sur la convention NÂ° 187 sur l''analyse de la lÃ©gislation et de la pratique nationale au Togo de cette convention', '0000-00-00', 'Aucun', 0, 0),
('032/DEIE', 9, '2013-02-05', 'Agence FranÃ§aise de DÃ©veloppement (AFD)', 'Lettre relative au regret de faire partie du comitÃ© de suivi stratÃ©gique d''organisation du SIFEE', '0000-00-00', 'Aucun', 0, 0),
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
('046/ANGE', 9, '2013-01-24', 'DE', 'CR adressÃ© Ã  la MERF sur le projet d''amÃ©nagement du bassin de Todman Ã  LomÃ© en vue de la pisciculture', '0000-00-00', 'Aucun', 0, 0),
('047/ANGE', 9, '2013-01-25', 'Direction GÃ©nÃ©rae de la Planification et du DÃ©veloppement', 'Lettre relative Ã  la rÃ©union de prise de contact avec la mission BOAD', '0000-00-00', 'Aucun', 0, 0),
('048/ANGE', 9, '2013-01-29', 'MinistÃ¨re de la Promotion de la Femme', 'Lettre relative au tÃ©moignage de la sincÃ¨re reconnaissance pour la participation remarquable du MERF au forum de la femme Ã  KpalimÃ©', '0000-00-00', 'Aucun', 0, 0),
('049/ANGE', 9, '2013-01-29', 'Monsieur DANDOGA Kokou MawulÃ© Gilles', 'Lettre relative Ã  la demande de stage', '0000-00-00', 'Aucun', 0, 0),
('050/ANGE', 9, '2013-01-29', 'UNION EUROPEENNE ', 'Lettre relative Ã  la facilitÃ© de coopÃ©ration technique III dans les demandes d''appui technique pour la mobilisation des financements verts', '0000-00-00', 'Aucun', 0, 0),
('051/ANGE', 9, '2013-01-31', 'ARMP', 'Bordereau d''envoi de la copie de la dÃ©cision nÂ° 001/ARMP/DG/2013 du 28/01/13 portant dÃ©lÃ©gation de signature d''attestation de paiement de la redevance de rÃ©gulation ', '0000-00-00', 'Aucun', 0, 0),
('052/ANGE', 9, '2013-01-31', 'Direction de l''Environnement', 'Soit transmis de la demande de stage bÃ©nÃ©vole de monsieur BOUARI Abdoul-RaÃ¯mi', '0000-00-00', 'Aucun', 0, 0),
('053/ANGE', 9, '2013-02-01', 'JAT CONSULTING', 'Lettre transmettant les documents finaux des guides  ', '0000-00-00', 'Aucun', 0, 0),
('054/ANGE', 9, '2013-02-01', 'Association des Usagers du Service Public Togolais (AUSEP-TOGO)', 'Lettre relative Ã  une demande de collaboration avec le PNADE', '0000-00-00', 'Aucun', 0, 0),
('055/ANGE', 9, '2013-02-05', 'TOGOTELECOM', 'Facture du mois de dÃ©cembre 2012 ', '0000-00-00', 'Aucun', 0, 0),
('056/ANGE', 9, '2013-02-05', 'MAN ET MAN ENTREPRISE ', 'Lettre d''invitation Ã  la consultation publique des parties prenantes au projet "MDP : Programme de Fours AmÃ©liorÃ©s Man and Man Entreprise"', '0000-00-00', 'Aucun', 0, 0),
('057/ANGE', 9, '2013-02-05', 'SG-MERF', 'Soit transmis de la lettre nÂ° 0487//MEF/SG/DGTCP/RGT/2013 du 31 janvier 2013 relative au recensement des prestation payantes de l''Etat', '0000-00-00', 'Aucun', 0, 0),
('058/ANGE', 9, '2013-02-05', 'ARMP', 'Note circulaire reltive Ã  la prÃ©paration des audits des marchÃ©s publics passÃ©s en 2011', '0000-00-00', 'Aucun', 0, 0),
('059/ANGE', 9, '2013-02-05', 'CAB-MERF', 'MÃ©mo Ã  l''attention de la ministre relatif au plan de communication du PNADE', '0000-00-00', 'Aucun', 0, 0),
('060/ANGE', 9, '2013-02-05', 'MinistÃ¨re du DÃ©veloppement Ã  Base, de l''Artisanat, de la Jeunesse et de l''Emploi des Jeunes ', ' ArrÃªtÃ© interministÃ©riel portant application du DÃ©cret nÂ° 2012-005/PR du 29 fÃ©vrier 2012 relatifs aux comitÃ© de dÃ©veloppement Ã  la base (CDB)', '0000-00-00', 'Aucun', 0, 0),
('061/ANGE', 9, '2013-02-05', 'ARMP', 'Lettre relative Ã  l''atelier de formation sur la prÃ©paration des dossiers de demande de propositions', '0000-00-00', 'Aucun', 0, 0),
('062/ANGE', 9, '2013-02-05', 'MinistÃ¨re de l''Agriculture, de l''Elevage et de la PÃªche', 'Lettre relative Ã  la mission de suivi et de coordination des travaux du recensement de l''Agriculture sur le terrain', '0000-00-00', 'Aucun', 0, 0),
('063/ANGE', 9, '2013-02-05', 'Madame KONTRE Kpatissa', 'Demande de congÃ©s annuels ', '0000-00-00', 'Aucun', 0, 0),
('064/ANGE', 9, '2013-02-06', 'Monsieur ALFA Essohanam ', 'Demande de stage ', '0000-00-00', 'Aucun', 0, 0),
('065/ANGE', 9, '2013-02-07', 'DAC-MERF', 'Lettre relative Ã  la convocation des agents non recensÃ©s par la fonction publique ', '0000-00-00', 'Aucun', 0, 0),
('066/ANGE', 9, '2013-02-07', 'SG MinistÃ¨re de l''Urbanisme et de l''Habitat ', 'Bordereau d''envoi de l''arrÃªtÃ© ministÃ©riel nÂ° 012/MUH/SG relatif Ã  la crÃ©ation, organisation et fonctionnement du comitÃ© de pilotage du PPAB au Togo du 16 janvier 2013', '0000-00-00', 'Aucun', 0, 0),
('067/ANGE', 9, '2013-02-07', 'MERF', 'Lettre relative Ã  la demande de collecte des images ', '0000-00-00', 'Aucun', 0, 0),
('068/ANGE', 9, '2013-02-07', 'SG-MERF', 'Lettre relative au lancement officiel du PGICT', '0000-00-00', 'Aucun', 0, 0),
('069/ANGE', 9, '2013-02-07', 'Monsieur COULIBALEY Bogra', 'Demande de stage', '0000-00-00', 'Aucun', 0, 0),
('070/ANGE', 9, '2013-02-07', 'AE2D', 'Lettre transmettant la note d''information sur les activitÃ©s de l''AE2D', '0000-00-00', 'Aucun', 0, 0),
('071/ANGE', 9, '2013-02-11', 'Direction de l''Environnement', 'Soit transmis du rapport de mission sur l''identification de nouveaux sites pour la reconstitution des mangroves et le PV de la rÃ©union', '0000-00-00', 'Aucun', 0, 0),
('072/ANGE', 9, '2013-02-11', 'FERME AVICOLE VINOLIA S.A.', 'Lettre d''invitation Ã  la rÃ©union d''Ã©valuation du projet VINOLIA', '0000-00-00', 'Aucun', 0, 0),
('073/ANGE', 9, '2013-02-11', 'Direction de la Faune et Chasse', 'Lettre d''invitation Ã  la cÃ©rÃ©monie d''ouverture de la premiÃ¨re rÃ©union du comitÃ© de pilotage du projet PRAPT', '0000-00-00', 'Aucun', 0, 0),
('074/ANGE', 9, '2013-02-12', 'Direction de la Faune et Chasse', 'Lettre relative Ã  la rÃ©union d''examen et d''analyse des rapports d''Ã©tat des lieux et d''Ã©valuation de la stratÃ©gie pour la biodiversitÃ© de 2003', '0000-00-00', 'Aucun', 0, 0),
('075/ANGE', 9, '2013-02-12', 'MinistÃ¨re des Transports', 'ArrÃªtÃ© fixant les modalitÃ©s d''application du dÃ©cret nÂ° 91-88 du 29 mars 1991 relatif aux permis de conduire des vÃ©hicules automobiles ', '0000-00-00', 'Aucun', 0, 0),
('076/ANGE', 9, '2013-02-12', 'Projet de DÃ©veloppement Communautaire (PDC)', 'Lettre de demande d''appui pour la sÃ©lection de consultant chargÃ© de l''audit environnemental du PDC', '0000-00-00', 'Aucun', 0, 0),
('077/ANGE', 9, '2013-02-13', 'Monsieur ANUOUMOU Yao Messa', 'Demande de stage', '0000-00-00', 'Aucun', 0, 0),
('078/ANGE', 9, '2013-02-13', 'Commission des affectations et des dÃ©parts en formation (MERF)', 'Note de service portant dÃ©lai de transmission des demandes de dÃ©part en formation', '0000-00-00', 'Aucun', 0, 0),
('079/ANGE', 9, '2013-02-13', 'MinistÃ¨re de l''Economie et des Finances', 'Lettre relative Ã  la mise en place d''un tarif intÃ©grÃ© et invitation Ã  faire parvenir Ã  la Direction GÃ©nÃ©rale des Douanes, la liste des produits dont l''importation est soumise Ã  l''obtention d''une attestation', '0000-00-00', 'Aucun', 0, 0),
('080/ANGE', 9, '2013-02-13', 'MERF', 'Transmission du document de l''ONUDI pour suite Ã  donner', '0000-00-00', 'Aucun', 0, 0),
('081/ANGE', 9, '2013-02-14', 'GNTBTP', 'Lettre de demande de prestation de services ', '0000-00-00', 'Aucun', 0, 0),
('082/ANGE', 9, '2013-02-14', 'Projet de DÃ©veloppement Communautaire (PDC)', 'Note de service mettant en place une commission de sÃ©lection de consultant chargÃ© de l''audit environnemental du PDC', '0000-00-00', 'Aucun', 0, 0),
('083/ANGE', 9, '2013-02-15', 'Mademoiselle RAVEN KÃ©kÃ©li ', 'Certificat mÃ©dical de 24 heures pour la journÃ©e du 14', '0000-00-00', 'Aucun', 0, 0),
('084/ANGE', 9, '2013-02-18', 'Direction de la Planification (MERF)', 'Lettre relative Ã  l''organisation de la caravane nationale de l''environnement', '0000-00-00', 'Aucun', 0, 0),
('085/ANGE', 9, '2013-02-18', 'ITIE', 'Lettre relative Ã  la mission du validateur de la mise en Å“uvre de l''ITIE au Togo ', '0000-00-00', 'Aucun', 0, 0),
('086/ANGE', 9, '2013-02-20', 'OCLOO VISION', 'Lettre relative Ã  la une offre et proposition de services ', '0000-00-00', 'Aucun', 0, 0),
('087/ANGE', 9, '2013-02-20', 'OCLOO VISION', 'Facture annuelle pour hÃ©bergement de PACK FORMULE PRO', '0000-00-00', 'Aucun', 0, 0),
('088/ANGE', 9, '2013-02-20', 'OCLOO VISION', 'Facture pro-format d''un ordinateur, d''un disque dur externe, installation et paramÃ©trage des logiciels et autres Ã©quipements pour le site Web', '0000-00-00', 'Aucun', 0, 0),
('089/ANGE', 9, '2013-02-20', 'SYNPERF', 'Avis de rÃ©union ', '0000-00-00', 'Aucun', 0, 0),
('090/ANGE', 9, '2013-02-20', 'Direction de la Planification (MERF)', 'Lettre relative Ã  la certification du point de livraison qui sera dÃ©sormais pris en compte par l''ANGE', '0000-00-00', 'Aucun', 0, 0),
('091/ANGE', 9, '2013-02-20', 'Monsieur KPANI Komi SÃ©gbaya Vinyo', 'Lettre relative Ã  la plainte contre Monsieur AKUTSE FÃ©lix', '0000-00-00', 'Aucun', 0, 0),
('092/ANGE', 9, '2013-02-20', 'Direction des Eaux et ForÃªts ', 'Lettre d''invitation Ã  l''atelier national sur la gouvernance forestiÃ¨re ', '0000-00-00', 'Aucun', 0, 0),
('093/ANGE', 9, '2013-02-20', 'WAPCo', 'Lettre de demande d''entrevue ', '0000-00-00', 'Aucun', 0, 0),
('094/ANGE', 9, '2013-02-20', 'Direction de la Planification (MERF)', 'Lettre relative aux observations et contribution sur les rapports des statistiques', '0000-00-00', 'Aucun', 0, 0),
('095/ANGE', 9, '2013-02-21', 'ITIE', 'Lettre relative Ã  la troisiÃ¨me rÃ©union ordinaire du Conseil Nationale de Supervision ', '0000-00-00', 'Aucun', 0, 0),
('096/ANGE', 9, '2013-02-22', 'SCANTOGO', 'Lettre transmettant le rapport provisoire d''EIES du projet dâ€™installation de nouveaux Ã©quipements de manutention et de stockage de matiÃ¨res premiÃ¨res de ciment sur le site de CIMTOGO Ã  LomÃ© ', '0000-00-00', 'Aucun', 0, 0),
('097/ANGE', 9, '2013-02-22', 'GLOBAL VISION', 'Lettre de demande d''agrÃ©ment en tant que fournisseur et prestataire de service', '0000-00-00', 'Aucun', 0, 0),
('098/ANGE', 9, '2013-02-25', 'Direction GÃ©nÃ©rale du Travail et des Lois Sociales', 'Lettre de demande de sollicitation de Monsieur SANUSSI Sroudy pour un appui technique dans le cadre de l''Ã©valuation des risques professionnels dans l''entreprise ERS', '0000-00-00', 'Aucun', 0, 0),
('099/ANGE', 9, '2013-02-25', 'QUANTUM', 'Lettre  relative au renouvellement d''offre de services ', '0000-00-00', 'Aucun', 0, 0),
('100/ANGE', 9, '2013-02-26', 'ARMP', 'Bordereau d''envoi de la copie de l''arrÃªtÃ© fixant les modalitÃ©s et le circuit d''approbation des marchÃ©s publics ', '0000-00-00', 'Aucun', 0, 0),
('101/ANGE', 9, '2013-02-28', 'ITIE', 'Lettre d''invitation Ã  la prÃ©sentation officielle du rapport de l''ITIE Togo 2011', '0000-00-00', 'Aucun', 0, 0),
('102/ANGE', 9, '2013-02-28', 'Direction GÃ©nÃ©rae de la Planification et du DÃ©veloppement', 'Lettre transmettant l''aide mÃ©moire de la mission BOAD ', '0000-00-00', 'Aucun', 0, 0),
('103/ANGE', 9, '2013-02-28', 'SG-MERF', 'Lettre relative Ã  la mission de haut niveau sur la prÃ©vention et la gestion des catastrophes en provenance de la RÃ©publique du Congo ', '0000-00-00', 'Aucun', 0, 0),
('104/ANGE', 9, '2013-02-28', 'Monsieur GOUDEAGBE Edem EfoÃ©', 'Demande de stage ', '0000-00-00', 'Aucun', 0, 0),
('105/ANGE', 9, '2013-03-01', 'Direction Nationale du ContrÃ´le des MarchÃ©s Publics (DNCMP)', 'Lettre relative Ã  la validation du Plan de Passation des MarchÃ©s Publics (PPMP) ', '0000-00-00', 'Aucun', 0, 0),
('106/ANGE', 9, '2013-03-04', 'ENI TOGO', 'Lettre relative Ã  la demande d''accompagnement dans le cadre des mouvements transfrontiÃ¨res des dÃ©blais et de l''eau de rejet des installations de forage du puits Kara 1', '0000-00-00', 'Aucun', 0, 0),
('107/ANGE', 9, '2013-03-04', 'Synergie des CompÃ©tences pour le DÃ©veloppement en Afrique (SCDA)', 'Lettre relative Ã  la prÃ©sentation de notre vision et perspectives de collaboration', '0000-00-00', 'Aucun', 0, 0),
('108/ANGE', 9, '2013-03-04', 'MinistÃ¨re des Sports et des Loisirs', 'ArrÃªtÃ© modifiant l''arrÃªtÃ© nÂ°009/MSL/CAB du 30 juin 2009 portant nomination des membres du noyau ministÃ©riel de lutte contre le SIDA', '0000-00-00', 'Aucun', 0, 0),
('109/ANGE', 9, '2013-03-04', 'MinistÃ¨re des Transports (ASAIGE)', 'BE des copies de l''arrÃªtÃ© interministÃ©riel nÂ° 001/MTr/MSPC/MEF et arrÃªtÃ©s nÂ°002/MTr/CAB/ASAIGE 003/MTr/CAB/ASAIGE ', '0000-00-00', 'Aucun', 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `transfert`
--

INSERT INTO `transfert` (`idtransfert`, `idcourrier`, `datetransfert`, `receveur`, `objet`, `dateretourfixer`, `dateretour`, `suitedonnee`, `supprimer`) VALUES
(1, '022/ANGE', '2013-01-22', 'Paul Kudadze KODJO', 'Pour disposition a prendre', '2013-01-28', '0000-00-00', 'Aucune / Pas de suite pour le moment', 1),
(2, '023/ANGE', '2013-01-17', 'Monsieur KODJO KudazÃ©', 'Pour compÃ©tence ', '2013-01-31', '0000-00-00', 'Aucune / Pas de suite pour le moment', 0);

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
  `photo` varchar(1000) NOT NULL DEFAULT '',
  `etat` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`iduser`, `nom`, `prenom`, `sexe`, `pseudo`, `passwd`, `droit`, `droitnotification`, `photo`, `etat`) VALUES
(7, 'KODJO', 'Paul Kudadze', 'Homme', 'admin', 'admin', 'admin', 'toutes', 'images/photos/7.jpg', 1),
(9, 'SOSSOU', 'hÃ©lÃ¨ne', 'Femme', 'akouavi', 'ange100l', 'rw', 'toutes', '', 1),
(10, 'DG', 'Dg', 'Homme', 'dgange', 'angetg', 'rw', 'toutes', '', 1),
(11, 'EKOUE', 'Dede ahoefa', 'Femme', 'ministre', 'angetg', 'r', 'courrier', '', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
