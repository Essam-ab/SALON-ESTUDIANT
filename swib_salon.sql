-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2020 at 12:50 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swib_salon`
--

-- --------------------------------------------------------

--
-- Table structure for table `favoris`
--

CREATE TABLE `favoris` (
  `fav_id` int(11) NOT NULL,
  `fav_date_added` date DEFAULT NULL,
  `use_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fav_stand`
--

CREATE TABLE `fav_stand` (
  `fas_id` int(11) NOT NULL,
  `fav_id` int(11) DEFAULT NULL,
  `sta_id` int(11) DEFAULT NULL,
  `fas_dateAdded` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fav_video`
--

CREATE TABLE `fav_video` (
  `fvi_id` int(11) NOT NULL,
  `fav_id` int(11) DEFAULT NULL,
  `vie_id` int(11) DEFAULT NULL,
  `fas_dateAdded` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `live_stream`
--

CREATE TABLE `live_stream` (
  `live_id` int(11) NOT NULL,
  `live_nom` varchar(255) NOT NULL,
  `live_video` varchar(255) NOT NULL,
  `sta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `live_stream`
--

INSERT INTO `live_stream` (`live_id`, `live_nom`, `live_video`, `sta_id`) VALUES
(2, 'Estudiant TV', 'https://www.youtube.com/embed/BXdWVnQbkeY', 20);

-- --------------------------------------------------------

--
-- Table structure for table `message_chat`
--

CREATE TABLE `message_chat` (
  `mes_id` int(11) NOT NULL,
  `mes_sender_id` int(11) NOT NULL,
  `mes_receiver_id` int(11) NOT NULL,
  `mes_content` varchar(255) NOT NULL,
  `mes_status` varchar(10) NOT NULL DEFAULT 'not read',
  `mes_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_chat`
--

INSERT INTO `message_chat` (`mes_id`, `mes_sender_id`, `mes_receiver_id`, `mes_content`, `mes_status`, `mes_date`) VALUES
(50, 49, 42, 'qsdfqsdfq', 'read', '2020-03-25 21:20:36'),
(51, 49, 42, 'qsdffs', 'read', '2020-03-25 22:31:41'),
(52, 49, 42, 'qsdf', 'read', '2020-03-26 00:17:25'),
(53, 49, 44, 'qsdf', 'read', '2020-03-26 00:59:51'),
(54, 44, 44, 'qsdf', 'read', '2020-03-26 01:29:30'),
(55, 49, 44, 'qsdf', 'read', '2020-03-26 01:29:47'),
(56, 44, 44, 'esss', 'read', '2020-03-26 01:30:10'),
(57, 49, 89, 'hi there', 'read', '2020-03-26 02:44:00'),
(58, 89, 49, 'yo', 'read', '2020-03-26 02:44:57'),
(59, 49, 89, 'sdf', 'read', '2020-03-26 02:47:09'),
(60, 89, 49, 'yoo', 'read', '2020-03-26 02:48:39'),
(61, 49, 89, 'qsdf', 'read', '2020-03-26 02:51:36'),
(62, 89, 49, 'qsdf', 'read', '2020-03-26 02:51:47'),
(63, 49, 89, 'ok', 'read', '2020-03-26 02:56:39'),
(64, 89, 49, 'yea whatever man', 'read', '2020-03-26 02:58:20'),
(65, 89, 49, 'now', 'read', '2020-03-26 03:16:09'),
(66, 89, 49, 'test', 'read', '2020-03-26 04:04:24'),
(67, 49, 89, 'yo', 'read', '2020-03-26 04:05:28'),
(68, 89, 49, 'sdf', 'read', '2020-03-26 04:06:11'),
(69, 49, 89, 'hello i hope this works', 'read', '2020-03-26 04:07:39'),
(70, 89, 49, 'i dont think so', 'read', '2020-03-26 04:08:38'),
(71, 49, 89, 'damn it works dude', 'read', '2020-03-26 04:08:58'),
(72, 89, 49, 'oh my you\'re right', 'read', '2020-03-26 04:09:36'),
(73, 89, 49, 'yo dude', 'read', '2020-03-26 04:18:53'),
(74, 89, 49, 'oh well', 'read', '2020-03-26 04:20:26'),
(75, 89, 49, 'lol', 'read', '2020-03-26 04:26:57'),
(76, 49, 89, 'oh sorry dude', 'read', '2020-03-26 04:28:10'),
(77, 89, 49, 'np', 'read', '2020-03-26 04:28:47'),
(78, 89, 49, 'well', 'read', '2020-03-26 04:30:08'),
(79, 89, 49, 'hmm', 'read', '2020-03-26 04:32:33'),
(80, 49, 89, 'sorry again xD', 'read', '2020-03-26 04:35:21'),
(81, 89, 49, 'np i guess', 'read', '2020-03-26 04:35:41'),
(82, 49, 89, 'howdy', 'read', '2020-03-26 04:38:08'),
(83, 89, 49, 'my oh my', 'read', '2020-03-26 04:41:12'),
(84, 49, 89, 'ok dude', 'read', '2020-03-26 04:41:30'),
(85, 89, 49, 'ma man', 'read', '2020-03-26 04:44:15'),
(86, 49, 89, 'lol', 'read', '2020-03-26 04:44:42'),
(87, 49, 89, '?', 'read', '2020-03-26 04:51:33'),
(88, 89, 49, 'oh dude', 'read', '2020-03-26 04:51:48'),
(89, 89, 49, '..', 'read', '2020-03-26 04:53:35'),
(90, 49, 89, 'yo', 'read', '2020-03-26 04:58:06'),
(91, 89, 49, 'ok', 'read', '2020-03-26 05:03:46'),
(96, 42, 49, 'yo ma man', 'read', '2020-03-26 11:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `reg_id` int(11) NOT NULL,
  `reg_nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`reg_id`, `reg_nom`) VALUES
(1, 'Ariana'),
(2, 'Beja'),
(3, 'Ben Arous'),
(4, 'Bizerte'),
(5, 'Gabes'),
(6, 'Gafsa'),
(7, 'Jendouba'),
(8, 'Kairouan'),
(9, 'Kasserine'),
(10, 'Kebili'),
(11, 'Kef'),
(12, 'Mahdia'),
(13, 'Manouba'),
(14, 'Medenine	'),
(15, 'Monastir'),
(16, 'Nabeul'),
(17, 'Sfax'),
(18, 'Sidi Bouzid'),
(19, 'Siliana'),
(20, 'Sousse'),
(21, 'Tataouine'),
(22, 'Tozeur'),
(23, 'Tunis'),
(24, 'Zaghouan');

-- --------------------------------------------------------

--
-- Table structure for table `stand`
--

CREATE TABLE `stand` (
  `sta_id` int(11) NOT NULL,
  `sta_nom` varchar(255) NOT NULL,
  `sta_description` text,
  `sta_audio` varchar(255) DEFAULT NULL,
  `sta_image` varchar(255) DEFAULT NULL,
  `sta_logo` varchar(255) DEFAULT NULL,
  `sta_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stand`
--

INSERT INTO `stand` (`sta_id`, `sta_nom`, `sta_description`, `sta_audio`, `sta_image`, `sta_logo`, `sta_email`) VALUES
(1, 'Coach Stand', 'Cet espace est animÃ© par un conseiller en formation et en orientation scolaire et universitaire, dÃ©diÃ© pour l\'encadrement des Ã©tudiants dans le but de bien rÃ©ussir leur orientation universitaire ou dans leur choix de la formation professionnelle.\r\n\r\n', NULL, 'StandBackOffice/assets/img/uploads/stand%20coach.png', '', 'ridhachtioui@yahoo.fr'),
(10, 'L\'office allemand d\'Ã©changes universitaires(DAAD)', 'LÂ´office allemand d\'Ã©changes universitaires (DAAD) est l\'organisation des universitÃ©s allemandes pour l\'internationalisation du systÃ¨me des sciences et de l\'innovation. Il donne chaque annÃ©e des bourses Ã  environ 145.000 Ã©tudiants, chercheurs et professeurs universitaires dans le monde entier et encourage les partenariats entre les universitÃ©s. Le DAAD dispose dÂ´un rÃ©seau de 70 succursales et centres d\'information dans le monde entier. Depuis septembre 2012, le DAAD est reprÃ©sentÃ© Ã  Tunis avec un propre bureau. Le DAAD bureau Tunis prend en charge la tÃ¢che dâ€™informations sur les Ã©tudes, la recherche et sur l\'Ã©ventail des bourses. Il offre aussi une plateforme pour des questions relatives Ã  la coopÃ©ration avec des Ã©tablissements supÃ©rieurs allemands. ', 'Aufnahme Virtuelle Messe.m4a', 'StandBackOffice/assets/img/uploads/stand%20daad.png', NULL, 'info@daad.tn'),
(11, 'South Mediterranean University', 'La MSB et la MedTech font partie de La South Mediterranean University (SMU), premier pÃ´le dâ€™excellence acadÃ©mique anglophone en Tunisie offrant des programmes de Licence, dâ€™IngÃ©niorat, de Masters ainsi que des sÃ©minaires de perfectionnement de cadres en exercice. GrÃ¢ce Ã  la qualitÃ© acadÃ©mique de ses programmes diplÃ´mants la MSB et la MedTech ont fait de la Tunisie le troisiÃ¨me pays en Afrique Ã  dÃ©tenir des accrÃ©ditations internationales les plus prestigieuses (AMBA et EPAS). La SMU forme des entrepreneurs visionnaires aptes Ã  rÃ©ussir dans une Ã©conomie mondialisÃ©e. Plus d\'information sur www.smu.tn et tel 20698653.', 'Avenue Fattouma Bourguiba 7.m4a', 'StandBackOffice/assets/img/uploads/stand%20smu.png', NULL, 'contact@smu.tn'),
(12, 'ILCI Business school Paris', 'ILCI est une Ã©cole franco-chinoise avec 15 ans dâ€™histoire. Chez ILCI, vous avez des formations allant du Bachelor au Doctorate. Les formations sont : Marketing et Commerce International, Langue Marketing International France Afrique Chine, DÃ©veloppement dâ€™Affaires Internationales, Achat et Supply Chain, Communication et Marketing Digital, Luxe et Tourisme. Le petit plus câ€™est que nous sommes situÃ©s Ã  Place dâ€™Italie depuis 2017.', 'Le Wezer 24.m4a', 'StandBackOffice/assets/img/uploads/stand%20ilci.png', NULL, 'contact@ilci.fr'),
(13, 'UniversitÃ© Canada West', 'University Canada West is a contemporary independent university located in the heart of vibrant Vancouver. Established in 2004, UCW offers a range of career-focused programs including the Bachelor of Commerce, Bachelor of Arts in Business Communication, Associate of Arts and Master of Business Administration. Courses are offered at our downtown Vancouver campus and online too. Offering courses online brings flexibility to education, allowing those who may not have otherwise had the opportunity to gain respected qualifications.', 'Mot de bienvenu.mp3', 'StandBackOffice/assets/img/uploads/stand%20uniwest.png', NULL, 'mohamed.slama@ucanwest.ca'),
(14, 'School of hospitality Business and Management', 'SHBM Â« School of Hospitality Business and Management Â» est l\'Ã©cole de commerce et de gestion hÃ´teliÃ¨re de l\'UM6P. Elle est situÃ©e Ã  Ben Guerir, oÃ¹ l\'UM6P construit tout un Ã©cosystÃ¨me qui encouragera l\'innovation, la recherche appliquÃ©e et l\'esprit d\'entreprise dans le domaine de l\'hospitalitÃ©.  SHBM accueillera sa premiÃ¨re promotion dâ€™Ã©tudiants en Bachelor Hospitality Business and Management Ã  l\'automne 2020.', 'Shbm final audio.m4a', 'StandBackOffice/assets/img/uploads/stand_SHBM.png', NULL, 'mohamed.slama@ucanwest.ca'),
(15, 'RACUS-Groupe des UniversitÃ©s d\'Etat russes', 'Groupe des UniversitÃ©s dâ€™Etat russes RACUS vous offre lâ€™Ã©ducation supÃ©rieure de qualitÃ©. Les Ã©tudes sont disponibles en franÃ§ais, en anglais et en russe. Nous vous proposons un large choix de 500 programmes dâ€™Ã©tudes en mÃ©decine, en ingÃ©nierie, en Ã©conomie et en sciences humaines. On sâ€™occupe des inscriptions aux universitÃ©s dâ€™Etat russes de A Ã  Z et on assure le soutien et le suivi pendant les Ã©tudes en Russie.', 'RACUS message vocalique.mp3', 'StandBackOffice/assets/img/uploads/stand%20racus.png', NULL, 'education@racus.ru'),
(16, 'WIKI ACADEMY', 'Wiki Academy est une Ã©cole de formation qui a dÃ©localisÃ© des programmes de formation du CEGEP de st FÃ©licien en Tunisie pour lâ€™emploi au Canada.', 'wiki_academy.m4a', 'StandBackOffice/assets/img/uploads/stand%20wiki.png', NULL, 'contact@wikiacademy.com.tn'),
(17, 'Best University Services', 'Best-UNS est une agence de consulting et de conseil en Ã©tudes supÃ©rieures Ã  lâ€™Ã©tranger. Elle est agrÃ©Ã©e par le MinistÃ¨re de lâ€™Enseignement supÃ©rieur et de la recherche scientifique et elle est spÃ©cialisÃ©e dans la gestion des projets dâ€™Ã©tudes et des sÃ©jours en Allemagne.', 'Best-UNS.mp3', 'StandBackOffice/assets/img/uploads/stand%20best%20uni.png', NULL, 'contact@best-uns.com'),
(18, 'Campus France Tunisie', 'Campus France Tunisie est un service de lâ€™Institut franÃ§ais de Tunisie, opÃ©rateur de coopÃ©ration de lâ€™Ambassade de France en Tunisie qui sâ€™adresse Ã  tout Ã©tudiant rÃ©sidant en Tunisie (non ressortissant de lâ€™Espace Schengen). Nos Ã©quipes sont Ã  votre Ã©coute et vous accompagnent si vous envisagez de poursuivre vos Ã©tudes supÃ©rieures en France; ou vous y rendre pour dans le cadre d\'un concours ou un entretien de sÃ©lection.', 'compus_message bienvenue stand Cf.m4a', 'StandBackOffice/assets/img/uploads/Stand%20campus%20france.png', NULL, 'campusfrance.tunisie@institutfrancais-tunisie.com'),
(19, 'Eduinvest', 'Eduinvest est une agence spÃ©cialisÃ©e dans les Ã©tudes au Canada. Eduinvest va vous doter des meilleurs conseils en vous accompagnant dans toutes les Ã©tapes de votre dossier grÃ¢ce Ã  sa vaste connaissance des universitÃ©s et collÃ¨ges canadiens.', 'eduinvest_Enregistrement #2.m4a', 'StandBackOffice/assets/img/uploads/stand%20eduinvest.png', NULL, 'ridha.blel123@gmail.com'),
(20, 'Edufrance', 'Parce quâ€™il est important de vivre vos rÃªves, Edufrance vous accompagne dans la rÃ©alisation de votre projet dâ€™Ã©tude en France. Notre mission est de vous orienter et de vous conseiller dans toute votre dÃ©marche. On met Ã  votre disposition une Ã©quipe dâ€™experts pour vous guider dans vos choix de formation : Bac Pro, BTS, Licence Pro, Licence, Bachelor, Programme Grande Ã‰cole, PrÃ©pa et Cycle ingÃ©nieur, MBA , Master, Master SpÃ©cialisÃ© . On vous aide aussi dans la prÃ©paration du dossier de visa et Ã  trouver un logement !', 'edufrance.m4a', 'StandBackOffice/assets/img/uploads/stand%20Edufrance.png', NULL, 'info@edufrance.tn'),
(21, 'Polytech Intl ', '1/Polytech Intl - Ã©cole d\'ingÃ©nieur accrÃ©ditÃ©e EUR-ACE , domaines de formation: informatique , GÃ©nie Industriel , MÃ©catronique , IngÃ©nierie FinanciÃ¨re, Data Science et Architecture .<br> 2/ Law & Business School forme dans le Droit des Affaires , l\'Expertise Comptable et les Finances .   Des diplÃ´mes europÃ©ens et amÃ©ricains Ã  partir de Tunis Ã  des prix trÃ¨s rÃ©duits.', 'Rue Bayrout.m4a', 'StandBackOffice/assets/img/uploads/stand%20polytech%20intl.png', NULL, 'i.kacem@pi.tn'),
(22, 'UniversitÃ© Franco-Tunisienne pour lâ€™Afrique et la MÃ©diterranÃ©e', 'Lâ€™UniversitÃ© Franco-Tunisienne pour lâ€™Afrique et la MÃ©diterranÃ©e (UFTAM) propose un panel de formations construites par de prestigieuses universitÃ©s publiques franÃ§aises et tunisiennes assurÃ©es par des enseignants chercheurs Ã  la pointe de la recherche et de lâ€™innovation pour garantir lâ€™employabilitÃ© immÃ©diate de ses diplÃ´mÃ©s.', 'uftam_Voix 002.m4a', 'StandBackOffice/assets/img/uploads/stand%20uftam.png', NULL, 'contact@uftam.net');

-- --------------------------------------------------------

--
-- Table structure for table `stand_cheif`
--

CREATE TABLE `stand_cheif` (
  `che_id` int(11) NOT NULL,
  `use_username` varchar(30) NOT NULL,
  `sta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stand_cheif`
--

INSERT INTO `stand_cheif` (`che_id`, `use_username`, `sta_id`) VALUES
(4, 'Dr Renate Dieterich', 10),
(5, 'Slaha Ennajeh', 10),
(6, 'syrine mahjoubi', 10),
(7, 'chaima naimi', 10),
(8, 'imene benabid', 10),
(9, 'med fahkreddine', 13),
(10, 'Ksenia REMNEVA', 15),
(11, 'ons ben ounis', 16),
(12, 'leila alouane', 16),
(13, 'Ridha Chitoui', 1),
(14, 'campus france', 18),
(15, 'Rahma Bel Haj', 20),
(16, 'Mehdi Ayachi', 20),
(17, 'Tesnim Besaies', 20),
(18, 'Nerimen Riahi', 20),
(19, 'Monia Bouraoui', 20),
(20, 'Donia Malleh', 20),
(21, 'Nihel Gargouri', 20),
(22, 'Imene Kacem', 21),
(23, 'Wajdi Zaafrane', 21),
(24, 'Mohamed Hiraoui', 21),
(25, 'Amira Maazouz', 21),
(26, 'Manel Najar', 21),
(27, 'Faten Ben Aissa', 21),
(28, 'Arij  Hichri', 21),
(29, 'Mariem Chelly', 11),
(30, 'Selima Jouini', 11),
(31, 'Aymen Rachid', 11),
(32, 'Hedi Jamoussi', 11),
(35, 'Houda REDISSI', 22),
(36, 'Imen NAIMI', 22),
(37, 'Amel BENAZZA', 22),
(38, 'Samira KARRACH', 22),
(39, 'Adel BEN YOUSSEF', 22),
(40, 'Ridha Blel', 19),
(41, 'Med.Amine Blel', 19),
(42, 'Alya yahia', 12),
(43, 'Juliete Thang', 12),
(44, 'Ali Atmani', 12),
(45, 'William Thang', 12),
(46, 'Manel Midassi', 17),
(47, 'Sofien Refai', 17),
(48, 'Nizar Ben Mhamed', 17),
(49, 'Imane Haidar', 14);

-- --------------------------------------------------------

--
-- Table structure for table `stand_documentation`
--

CREATE TABLE `stand_documentation` (
  `doc_id` int(11) NOT NULL,
  `doc_nom` varchar(255) NOT NULL,
  `sta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stand_documentation`
--

INSERT INTO `stand_documentation` (`doc_id`, `doc_nom`, `sta_id`) VALUES
(3, 'catalogue LCI.pdf', 11),
(4, 'catalogue-licence-version-numerique.pdf', 11),
(5, 'catalogue-masters-2019.pdf', 11),
(6, 'EMBA.pdf', 11),
(7, 'GEST.pdf', 11),
(8, 'HEC-1.pdf', 11),
(9, 'medtech2017.pdf', 11),
(10, '2019_scholarshipsprogrammes_daad_st11.pdf', 10),
(11, 'Brochures DAAD pour les parents.pdf', 10),
(12, 'Liens utiles_DAAD.pdf', 10),
(13, 'Pocket Guide-DAAD.pdf', 10),
(14, ' Doctorate in Business Administration - ENGLISH.pdf', 12),
(15, ' Doctorate in Business Administration - FRANCAIS.pdf', 12),
(16, ' Fiche Bachelor LEA Marketing International.pdf', 12),
(17, ' MBA Dev d\'affaires internationales.pdf', 12),
(18, ' MBA Management des Industries du Luxe et du Tourisme - ENGLISH.pdf', 12),
(19, ' MBA Management des Industries du Luxe et du Tourisme - FRANCAIS.pdf', 12),
(20, ' MBA Marketing Digital et StratÃ©gies.pdf', 12),
(21, 'Bachelor Marketing et Commerce international.pdf', 12),
(22, 'UCW Brochure 2020_final.v3.pdf', 13),
(23, 'BROCHURE SHBM-Web use.pdf', 14),
(24, 'RACUS brochure.pdf', 15),
(25, 'depliant recto.pdf', 16),
(26, 'Plaquette Best-uns.pdf', 17),
(27, 'Ø§Ù„ØªÙ‘ÙˆØ¬ÙŠÙ‡ Ø§Ù„Ù…Ø¯Ø±Ø³ÙŠ ÙˆØ§Ù„Ø¬Ø§Ù…Ø¹ÙŠ.pdf', 1),
(28, 'CHOISIR2019_FRANCAIS_BD.pdf', 18),
(29, 'Dep proceÌdures dec 2019.pdf', 18),
(30, 'Brochure.pdf', 19),
(31, 'Flyer Edufrance.pdf', 20),
(32, 'DÃ‰PLIANT LBS 2020 web.pdf', 21),
(33, 'catalogue certifications PI.pdf', 21),
(34, 'dÃ©pliant PI 2020 web.pdf', 21),
(35, 'fiche filieÌ€re archi fini web.pdf', 21),
(36, 'fiche filiÃ¨re gind web.pdf', 21),
(37, 'fiche filiÃ¨re IRM fini web.pdf', 21),
(38, 'fiche filiÃ¨re Master expertise web .pdf', 21),
(39, 'fiche filiÃ¨re Master Marketing digital web.pdf', 21),
(40, 'fiche filieÌ€re meÌca fini web.pdf', 21),
(41, 'plaquette 3.pdf', 22),
(42, 'plaquette1.pdf', 22),
(43, 'plaquette2.pdf', 22),
(44, 'plaquette4.pdf', 22);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `use_id` int(11) NOT NULL,
  `use_auth` varchar(5) NOT NULL DEFAULT 'no',
  `use_f_name` varchar(50) NOT NULL,
  `use_l_name` varchar(50) NOT NULL,
  `tel` int(8) DEFAULT NULL,
  `region` int(11) NOT NULL,
  `use_username` varchar(30) NOT NULL,
  `use_email` varchar(50) NOT NULL,
  `use_password` varchar(255) NOT NULL,
  `use_niveau` varchar(30) NOT NULL,
  `user_logged` varchar(20) NOT NULL,
  `fav_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`use_id`, `use_auth`, `use_f_name`, `use_l_name`, `tel`, `region`, `use_username`, `use_email`, `use_password`, `use_niveau`, `user_logged`, `fav_id`) VALUES
(42, 'yes', 'Dr Renate', 'Dieterich', 0, 23, 'Dr Renate Dieterich', 'unknown@dieterich.com', '$2y$10$4XfkNFvKCeumFtaiSSxKZO5tB0oD8plt3nvJZLRQiavAbEShoXL5S', 'Enseignant', 'no', NULL),
(43, 'yes', 'Salha', 'Ennajeh', 0, 23, 'Salha Ennajeh', 'unknown@ennajeh.com', '$2y$10$cEc5gdWUuM3F.q.Dt34z/OYqKZkj74KTrq0MKCJZCtjoOquP8Jdxi', 'Enseignant', 'no', NULL),
(44, 'yes', 'syrine', 'mahjoubi', 0, 23, 'syrine mahjoubi', 'unknown@mahjoubi.com', '$2y$10$.XO4vcTCeUxXdUQO65MtceaEpPuGFZIk0jL1h8MmSEiaE/kKSA8OG', 'Enseignant', 'no', NULL),
(45, 'yes', 'chaima', 'naimi', 0, 23, 'chaima naimi', 'unknown@naimi.com', '$2y$10$czKG2OKEx6uRZXO3CR70FOIVJNg/1ydEEKSWm9rTETammUzXhADhK', 'Enseignant', 'no', NULL),
(46, 'yes', 'imene', 'benabid', 0, 23, 'imene benabid', 'unknown@benabid.com', '$2y$10$O6Ch1JTevurkmKaD/VMnJuFUmVH21wsLh1egpGU7rMCvfqyz/9PoK', 'Enseignant', 'no', NULL),
(47, 'yes', 'mohamed fahkreddine', 'ben slama', 0, 23, 'med fahkreddine', 'mohamed.slama@ucanwest.ca', '$2y$10$ii8hIAxBz3AyduklPD.EGebYdGJc3kcTT1Q6BlJV/lZI88eyhQWuS', 'Enseignant', 'no', NULL),
(49, 'yes', 'admin', 'admin', 0, 23, 'admin', 'unknown@admin.com', '$2y$10$CR5JE18WMhhYfSyVLKO21uySQc4q7Z8rgw76AAIdUSBiZrkReNwFC', 'Enseignant', 'no', NULL),
(50, 'yes', 'Ksenia', 'REMNEVA', 0, 23, 'Ksenia REMNEVA', 'unknown@REMNEVA.com', '$2y$10$gxXyby7vJyYDMTuiKAx0c.FB2SSpGNFGeLsS/XZcnnKlt5BfP8cTq', 'Enseignant', 'no', NULL),
(51, 'yes', 'ons', 'ben ounis', 0, 23, 'ons ben ounis', 'unknown@ounis.com', '$2y$10$BVh5jvLrD26eywCApjiaWea50F7cKdwT18YklSAJWnw6Mq7Y3e.0i', 'Enseignant', 'no', NULL),
(52, 'yes', 'leila', 'alouane', 0, 23, 'leila alouane', 'unknown@alouane.com', '$2y$10$B.c57D402zu1vSRU//Z58u3qi4Lwjb1W1iC5K7CA5ehRpPi5TX2o.', 'Enseignant', 'no', NULL),
(54, 'yes', 'Ridha', 'Chitoui', 0, 23, 'Ridha Chitoui', 'ridhachtioui@yahoo.fr', '$2y$10$j0NvAKF0YSO5diPVFBsUOu9NItFUklaxcsDB9MHyPU/bhIOlA3tbK', 'Enseignant', 'no', NULL),
(55, 'yes', 'campus', 'france', 0, 23, 'campus france', 'campusfrance.tunisie@institutfrancais-tunisie.com', '$2y$10$pjl/rzdbthDpoQcTEKFF5u7jWyNPimlZ9JYfjQon92WONQHVNy7zS', 'Enseignant', 'no', NULL),
(56, 'yes', 'Mehdi', 'Ayachi', 0, 23, 'Mehdi Ayachi', 'unknown@ayachi.com', '$2y$10$k6UpGL//afiV.eVX6yrOmuzvcMA6BiBquBKZTLR/v/KR30fjBLILu', 'Enseignant', 'no', NULL),
(57, 'yes', 'Tesnim ', 'Besaies', 0, 23, 'Tesnim Besaies', 'unknown@Besaies.com', '$2y$10$kF7tAGoP.JFJ/T0MmvOSQ.g.h//QR4RzxReEl178mbOj7wRi6Bdyu', 'Enseignant', 'no', NULL),
(58, 'yes', 'Rahma', 'Bel Haj Yahia', 0, 23, 'Rahma Bel Haj', 'unknown@Yahia.com', '$2y$10$g8NtlcZWsqWd2XZbotXz6u5foIu/9.NpQ4uonR7Vy6vhSdhaq9vqa', 'Enseignant', 'no', NULL),
(59, 'yes', 'Narimen ', 'Riahi', 0, 23, 'Narimen Riahi', 'unknown@Nerimen.com', '$2y$10$8H5.Gp0RqtcLLnZ0ZrYHGeIjX/lw0xgHnTsje.xbOUZ3Hn53dwHQ6', 'Enseignant', 'no', NULL),
(60, 'yes', 'Monia ', 'Bouraoui', 0, 23, 'Monia Bouraoui', 'unknown@Monia.com', '$2y$10$dcgXQFePi2dGNeTXjhcTv.71bEQyPH19zS2sa993u9awZAYyrSDBK', 'Enseignant', 'no', NULL),
(61, 'yes', 'Donia ', 'Malleh', 0, 23, 'Donia Malleh', 'unknown@Malleh.com', '$2y$10$bEg2Yp2dC0UshFa8eFf9luvw6l6MdBO2flVZfG4EQwr4Z6bzQhKwq', 'Enseignant', 'no', NULL),
(62, 'yes', 'Nihel ', 'Gargouri', 0, 23, 'Nihel Gargouri', 'unknown@Nihel.com', '$2y$10$.6ZwCHZ7/IMW.AjoJwKsmOc2JYZYChCc8wKhmR/dh1y79lE0f08Gi', 'Enseignant', 'no', NULL),
(63, 'yes', 'Imene ', 'Kacem', 0, 23, 'Imene Kacem', 'unknown@Kacem.com', '$2y$10$Cn6KcFab0Nwgye8t9lGfDeEb2ARBDtVZUONMWgbY8QNiX4K1X8nK.', 'Enseignant', 'no', NULL),
(64, 'yes', 'Wajdi ', 'Zaafrane', 0, 23, 'Wajdi Zaafrane', 'unknown@Zaafrane.com', '$2y$10$1TzKOnCJjYVFBopxfZPCp.k5LqoPFXRUFHpCezNeRHdlqRuep9V66', 'Enseignant', 'no', NULL),
(65, 'yes', 'Mohamed ', 'Hiraoui', 0, 23, 'Mohamed Hiraoui', 'unknown@Hiraoui.com', '$2y$10$gFbbhMN2R7aQmoPKide6me2085qB5n2HHUrXOfsPh2y7GpwOfiuoW', 'Enseignant', 'no', NULL),
(66, 'yes', 'Amira ', 'Maazouz', 0, 23, 'Amira_Maazouz', 'unknown@Maazouz.com', '$2y$10$z.nb8jBJclXIQiZ.B8gmXu53rEP8T1JDu1cW0ymt1Q1l9HxlwbCoi', 'Enseignant', 'no', NULL),
(67, 'yes', 'Manel ', 'Najar', 0, 23, 'Manel Najar', 'unknown@Najar.com', '$2y$10$kuZLCcINjr47xn9SUYmLa.NaA3BGCWsU.a3DJtlnG1MYQQrspUREa', 'Enseignant', 'no', NULL),
(68, 'yes', 'Faten ', 'Ben Aissa', 0, 23, 'Faten Ben Aissa', 'unknown@Aissa.com', '$2y$10$p/WNlU74ZvxEGe2GQgBAi.F.P5sW1oe7KEipJ/Zy253/NkiZhB0OC', 'Enseignant', 'no', NULL),
(69, 'yes', 'Arij ', 'Hichri', 0, 23, 'Arij  Hichri', 'unknown@Hichri.com', '$2y$10$ztCMvZWvaqlU4QgxjCuTlOjpXUMYxLFMq1ZG6fOalZGlg.T.pvPC.', 'Enseignant', 'no', NULL),
(70, 'yes', 'Mariem', 'Chelly', 0, 23, 'Mariem Chelly', 'unknown@Chelly.com', '$2y$10$lWRu0CCQoJx8x.eG.avQre5l.TCjngdlV9smbgBp6p3oyUAj79PFq', 'Enseignant', 'no', NULL),
(71, 'yes', 'Selima', 'Jouini', 0, 23, 'Selima Jouini', 'unknown@Jouini.com', '$2y$10$56WRvj5jn8W5AXXR0hJqO.Uay7g8FO7flbpXaTdsmG9gVcPz7EpCe', 'Enseignant', 'no', NULL),
(72, 'yes', 'Aymen', 'Rachid', 0, 23, 'Aymen Rachid', 'unknown@Rachid.com', '$2y$10$PfIXo1eyiruMLiP1kDKb9.VtrH7/M5rybJUhMtvse33jeDOJrionq', 'Enseignant', 'no', NULL),
(73, 'yes', 'Hedi', 'Jamoussi', 0, 23, 'Hedi Jamoussi', 'unknown@Jamoussi.com', '$2y$10$WJstvtmNd1m5xwu1yPWs2u2ZcLpTVox.p2dzklRYzMbQ0lhR3Fodu', 'Enseignant', 'no', NULL),
(74, 'yes', 'Houda', 'REDISSI', 0, 23, 'Houda REDISSI', 'unknown@REDISSI.com', '$2y$10$hmew9ZZEbpXzQbNkuwEufeozQI/C2DlYMW5InAQqlbfx6.DEudKM2', 'Enseignant', 'no', NULL),
(75, 'yes', 'Imen', 'NAIMI', 0, 23, 'Imen NAIMI', 'unknown@naimi-imen.com', '$2y$10$iuViL1PH8dTs.qrnIVFIBuCCBMvjrQ7qokY/35.Lqx8.35PQ.3OuO', 'Enseignant', 'no', NULL),
(76, 'yes', 'Amel', 'BENAZZA', 0, 23, 'Amel BENAZZA', 'unknown@BENAZZA.com', '$2y$10$MRbWuv0.7EnU2Zg4U9BaU.hVQN3H1rW8WbdXRWroh.DzXfOsaibj6', 'Enseignant', 'no', NULL),
(77, 'yes', 'Samira', 'KARRACH', 0, 23, 'Samira KARRACH', 'unknown@KARRACH.com', '$2y$10$2VH9rA6NiuVPgGZqYuFiRexsm8V4c5Y3qYBbhSauYVil8dT4W5wb.', 'Enseignant', 'no', NULL),
(78, 'yes', 'Adel', 'BEN YOUSSEF', 0, 23, 'Adel BEN YOUSSEF', 'unknown@YOUSSEF.com', '$2y$10$Ff6DDufLr9GKxRLXbbMBNOIUrWOxYz8XmomnNwBuggWOanOgqfZmi', 'Enseignant', 'no', NULL),
(79, 'yes', 'Ridha', 'Blel', 0, 23, 'Ridha Blel', 'unknown@Blel.com', '$2y$10$reEUZ.h9vuabnoZemAv5q.LAWqp.zUCoBbbxBuX6NfkF12jdg.Y1K', 'Enseignant', 'no', NULL),
(80, 'yes', 'Mohamed', 'Amine Blel', 0, 23, 'Med.Amine Blel', 'unknown@Amine-Blel.com', '$2y$10$icqY4oVpiaf0pd6Y2YpF3OTbJj2Cla02osdyiudfX3xqjOySGkjGW', 'Enseignant', 'no', NULL),
(81, 'yes', 'Alya', 'yahia', 0, 23, 'Alya yahia', 'unknown@Alya.com', '$2y$10$.X2RDVsfU4wv/EooywdXQuogSXXQOmHQ6nwpF9GEazYf1T3a73/YW', 'Enseignant', 'no', NULL),
(82, 'yes', 'Juliete', 'Thang', 0, 23, 'Juliete Thang', 'unknown@Thang.com', '$2y$10$E.EJKL3bH56H5Hka1cBCO.LAuNKGIWDG4w14w8XxHLO67wRu3X6xW', 'Enseignant', 'no', NULL),
(83, 'yes', 'Ali', 'Atmani', 0, 23, 'Ali Atmani', 'unknown@Atmani.com', '$2y$10$j4sIyBX4kMpL4xEnXY/CV.WsDKbr05NfUAvgo1ItWc/tRu.jAFXki', 'Enseignant', 'no', NULL),
(84, 'yes', 'William', 'Thang', 0, 23, 'William Thang', 'unknown@William.com', '$2y$10$0WdiyWbC5K5M89UxpD/7euHDWXV3d5q6Jy9cTi3gLCLfZnCB/CgCa', 'Enseignant', 'no', NULL),
(85, 'yes', 'Manel', 'Midassi', 0, 23, 'Manel Midassi', 'unknown@Midassi.com', '$2y$10$HfRM0zwSz7ANkIpGujyZXu2wLjo4ZC8gyrg4E2HKed3eVmdAsBMCW', 'Enseignant', 'no', NULL),
(86, 'yes', 'Sofien', 'Refai', 0, 23, 'Sofien Refai', 'unknown@Refai.com', '$2y$10$yfs1xRxs4TG7suM7aQDnzOqxIcnVLy1lNlgvS8FDEM1LVnd//Dj/.', 'Enseignant', 'no', NULL),
(87, 'yes', 'Nizar', 'Ben Mhamed', 0, 23, 'Nizar Ben Mhamed', 'unknown@Mhamed.com', '$2y$10$PMFuW/jaugacWTOcavsaZu9rstTIRuRivZY1tnNulzrZVv9JPnL4m', 'Enseignant', 'no', NULL),
(88, 'yes', 'Imane', 'Haidar', 0, 23, 'Imane Haidar', 'unknown@Haidar.com', '$2y$10$V0MjWpQZMLJjGOJCj9qsWuL0G1m56vEH8LrWTWgPBKXuJyVjgvPf2', 'Enseignant', 'no', NULL),
(89, 'no', 'test', 'test', 0, 23, 'test test', 'test@gmail.com', '$2y$10$b4XFg2liSOgpmWhaU23aHeydyvl3AAG9.Yuw9t.TRsGQYn426Moeq', 'Autre', 'yes', NULL),
(90, 'no', 'no', 'one', 20833787, 23, 'admin', 'noOne@gmail.com', '$2y$10$2wiqcWfS7lZE4JSbYXluE.azkbmVAN.OpRqCysCaDHwLDhLxWWpZy', 'Autre', 'no', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_stand`
--

CREATE TABLE `user_stand` (
  `id` int(11) NOT NULL,
  `use_id` int(11) NOT NULL,
  `sta_id` int(11) NOT NULL,
  `user_logged` varchar(10) DEFAULT NULL,
  `joined_at` date DEFAULT NULL,
  `left_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_stand`
--

INSERT INTO `user_stand` (`id`, `use_id`, `sta_id`, `user_logged`, `joined_at`, `left_at`) VALUES
(24, 49, 11, 'no', '2020-03-26', '2020-03-26'),
(25, 52, 16, 'no', '2020-03-25', '2020-03-25'),
(26, 52, 15, 'no', '2020-03-25', '2020-03-25'),
(27, 49, 10, 'no', '2020-03-26', '2020-03-26'),
(28, 49, 17, 'no', '2020-03-25', '2020-03-25'),
(29, 49, 15, 'no', '2020-03-25', '2020-03-25'),
(30, 42, 15, 'no', '2020-03-25', '2020-03-25'),
(31, 49, 18, 'no', '2020-03-25', '2020-03-25'),
(32, 49, 19, 'no', '2020-03-25', '2020-03-25'),
(33, 49, 14, 'no', '2020-03-26', '2020-03-26'),
(34, 49, 22, 'no', '2020-03-26', '2020-03-26'),
(35, 44, 10, 'no', '2020-03-26', '2020-03-26'),
(36, 89, 10, 'no', '2020-03-26', '2020-03-26'),
(37, 90, 10, 'no', '2020-05-27', NULL),
(38, 90, 11, 'no', '2020-05-27', '2020-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `videotheque`
--

CREATE TABLE `videotheque` (
  `vie_id` int(11) NOT NULL,
  `vie_nom` varchar(255) NOT NULL,
  `vie_video` varchar(255) DEFAULT NULL,
  `vie_type` varchar(10) NOT NULL DEFAULT 'path',
  `sta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videotheque`
--

INSERT INTO `videotheque` (`vie_id`, `vie_nom`, `vie_video`, `vie_type`, `sta_id`) VALUES
(18, 'MSB Master\'s Graduation Ceremony', 'https://www.youtube.com/embed/vXc5U3q8lMo', 'url', 11),
(19, 'MSB Master in Business Management, Career Prospectives', 'https://www.youtube.com/embed/VExCp1X0bU8', 'url', 11),
(20, 'Discover Medtech, the Engineering School at SMU', 'https://www.youtube.com/embed/U-k6qJYtiFs', 'url', 11),
(21, 'MSB MBM 2014 Graduation Ceremony', 'https://www.youtube.com/embed/3OHsbwMd7_A', 'url', 11),
(22, 'Presentation MSB MedTech (Jan-2015)', 'https://www.youtube.com/embed/J7pcQiMEQCU', 'url', 11),
(23, 'MSB MedTech Programs Overview (Feb-15)', 'https://www.youtube.com/embed/an9Wibxh27Y', 'url', 11),
(24, 'Discover MSB, the Business School at SMU', 'https://www.youtube.com/embed/tFAiym9CxJg', 'url', 11),
(26, 'Entrepreneurs Of the Future - Undergraduates 2015-2016', 'https://www.youtube.com/embed/36Zje7S9d80', 'url', 11),
(27, 'Discover LCI, the Language & Culture Institute at SMU', 'https://www.youtube.com/embed/YjcHX4ldwGg', 'url', 11),
(28, 'MSB UPM & MBM Graduation Ceremony 2017', 'https://www.youtube.com/embed/O3rZK54eB6c', 'url', 11),
(29, 'The German higher education system', 'https://www.youtube.com/embed/OWyhOfniFpk', 'url', 10),
(30, 'Student Stories: Bilel Kallel in Chemnitz', 'https://www.youtube.com/embed/B35iVtW1EU8', 'url', 10),
(31, 'ILCI Paris Gala 2020 - Promotion 2019', 'https://www.youtube.com/embed/UalvJ8oZ73o', 'url', 12),
(32, 'Bachelor of Arts in Business Communication', 'https://www.youtube.com/embed/bYYqgYgJq-k', 'url', 13),
(33, 'School of Hospitality Business and Management', 'https://www.youtube.com/embed/rn4fi5jpssE', 'url', 14),
(34, 'Wiki Academy', 'https://www.youtube.com/embed/PHEtI2a-g-g', 'url', 16),
(35, 'Ã‰tudier en Russie. Filieres medicales', 'https://www.youtube.com/embed/5nwniEbapGo', 'url', 15),
(36, 'Etudier en Russie. Filiers d\'ingÃ©nieur et techniques', 'https://www.youtube.com/embed/pjORVb4VoRQ', 'url', 15),
(37, 'Ã‰tudier en Russie. Filieres medicales', 'https://www.youtube.com/embed/nCHCyR4eHbE', 'url', 15),
(38, 'Etudier en Russie 2020/2021', 'https://www.youtube.com/embed/EHKhtb7IQWg', 'url', 15),
(39, 'Video#3', 'https://www.youtube.com/embed/RQNfHD4j4Og', 'url', 15),
(40, 'Video#1', 'https://www.youtube.com/embed/xsvkrQAhMsQ', 'url', 15),
(41, 'Saratov State Medical University french 1min', 'https://www.youtube.com/embed/13q-xzlhOTE', 'url', 15),
(42, 'Astrakhan State Medical University french 1min', 'https://www.youtube.com/embed/PSt0jQEepps', 'url', 15),
(43, 'Etudier en Russie avec RACUS UniversitÃ© dâ€™Etat de Tambov', 'https://www.youtube.com/embed/wteealM6SoI', 'url', 15),
(44, 'Best UNS', 'https://www.youtube.com/embed/b7WIi0E5jUU', 'url', 17),
(45, 'Les Ã©tudes d\'ingÃ©nieur FR STFR', 'https://www.youtube.com/embed/4NJc0E1GEk0', 'url', 18),
(46, 'Bienvenue en France 2019 FR', 'https://www.youtube.com/embed/hGdp8qh862w', 'url', 18),
(47, 'Interview 2 Samir VST FR VERSION FINALE', 'https://www.youtube.com/embed/3lm1gBchNbU', 'url', 18),
(48, 'Interview 3 Rodica VST FR VERSION FINALE', 'https://www.youtube.com/embed/lGR1wgOf0y0', 'url', 18),
(49, 'Interview 5 Marwan VST FR VERSION FINALE', 'https://www.youtube.com/embed/wIYwEY25Vbg', 'url', 18),
(50, 'Interview 9 Leah VST FR VERSION FINALE', 'https://www.youtube.com/embed/B1DE2L1VHwc', 'url', 18),
(51, 'Interview 10 Sandra VST FR VERSION FINALE', 'https://www.youtube.com/embed/H4kd7HI6aq8', 'url', 18),
(52, 'Interview 11 Isabelle VST FR VERSION FINALE', 'https://www.youtube.com/embed/plpOt-2A59g', 'url', 18),
(53, 'Etudier en Russie avec RACUS UniversitÃ© dâ€™Etat de Tambov', 'https://www.youtube.com/embed/wteealM6SoI', 'url', 18),
(54, 'Les Ã©tudes supÃ©rieures de management FR STFR', 'https://www.youtube.com/embed/V6-LhFanddU', 'url', 18),
(55, 'TRAILER CAMPUS FRANCE REALISE TON RÃŠVE MUSIC VFR1', 'https://www.youtube.com/embed/ZZXz9QcQMHw', 'url', 18),
(56, 'Interview Ridha Blel', 'https://www.youtube.com/embed/Y7Ci2Tqrg5U', 'url', 19),
(57, 'tÃ©moignage tv 1', 'https://www.youtube.com/embed/LeF_4CDeqUk', 'url', 20),
(58, 'caravane souvenir', 'https://www.youtube.com/embed/9kAz2LXeSPU', 'url', 20),
(59, 'Edufrance Tunisie', 'https://www.youtube.com/embed/oXfvqGApulM', 'url', 20),
(60, 'PrÃ©parez vous pour l\'Entretien CF via Skype', 'https://www.youtube.com/embed/JVZPaeQp4iE', 'url', 20),
(61, 'Polytech Intl Architecture', 'https://www.youtube.com/embed/WHN6lmfuWpI', 'url', 21),
(62, 'Une visite industrielle au profit des Ã©tudiants GÃ©nie Industriel de Polytech Intl Ã  Medica Sud.', 'https://www.youtube.com/embed/iDeJotZH3xc', 'url', 21),
(63, 'JournÃ©e BOSCH Ã  Polytech Intl', 'https://www.youtube.com/embed/aRaN5aV1bTM', 'url', 21),
(64, 'Forum des mÃ©tiers 3.0 Ã  Polytech Intl', 'https://www.youtube.com/embed/nlsN19XGo0M', 'url', 21),
(65, ' INNOVATION DAY ET VISION', 'https://www.youtube.com/embed/H8gFZRS0L2I', 'url', 21),
(66, 'CÃ©rÃ©monie de la remise des diplÃ´mes 2018', 'https://www.youtube.com/embed/HKSF20ErjSo', 'url', 21),
(67, 'JournÃ©e de l\'intÃ©gration des internationaux', 'https://www.youtube.com/embed/yAmMmzMKck4', 'url', 21),
(68, 'De la maquette physique au numÃ©rique', 'https://www.youtube.com/embed/He73kpEwDV4', 'url', 21),
(69, 'Workshop architecture Place Barcelone', 'https://www.youtube.com/embed/9I6RWdXrXXs', 'url', 21),
(70, 'Challenge Pi_ROBOTS 2.0 de Polytech Intl', 'https://www.youtube.com/embed/rwyKllh7JpI', 'url', 21),
(71, 'visite industrielle SOMEF', 'https://www.youtube.com/embed/jytBPQAdmxM', 'url', 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`fav_id`),
  ADD KEY `fk3_user` (`use_id`);

--
-- Indexes for table `fav_stand`
--
ALTER TABLE `fav_stand`
  ADD PRIMARY KEY (`fas_id`),
  ADD KEY `pk1_fav` (`fav_id`),
  ADD KEY `pk2_stand` (`sta_id`);

--
-- Indexes for table `fav_video`
--
ALTER TABLE `fav_video`
  ADD PRIMARY KEY (`fvi_id`),
  ADD KEY `pk2_fav` (`fav_id`),
  ADD KEY `pk2_videotheque` (`vie_id`);

--
-- Indexes for table `live_stream`
--
ALTER TABLE `live_stream`
  ADD PRIMARY KEY (`live_id`),
  ADD KEY `fk_live_sta` (`sta_id`);

--
-- Indexes for table `message_chat`
--
ALTER TABLE `message_chat`
  ADD PRIMARY KEY (`mes_id`),
  ADD KEY `fk4_user` (`mes_sender_id`),
  ADD KEY `fk5_user` (`mes_receiver_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `stand`
--
ALTER TABLE `stand`
  ADD PRIMARY KEY (`sta_id`);

--
-- Indexes for table `stand_cheif`
--
ALTER TABLE `stand_cheif`
  ADD PRIMARY KEY (`che_id`),
  ADD KEY `fk_che_sta` (`sta_id`);

--
-- Indexes for table `stand_documentation`
--
ALTER TABLE `stand_documentation`
  ADD PRIMARY KEY (`doc_id`),
  ADD KEY `fk1_sta_doc` (`sta_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`use_id`),
  ADD KEY `pk3_fav` (`fav_id`),
  ADD KEY `pk1_region` (`region`);

--
-- Indexes for table `user_stand`
--
ALTER TABLE `user_stand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk1_stand` (`sta_id`),
  ADD KEY `fk6_user` (`use_id`);

--
-- Indexes for table `videotheque`
--
ALTER TABLE `videotheque`
  ADD PRIMARY KEY (`vie_id`),
  ADD KEY `fk` (`sta_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `fav_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fav_stand`
--
ALTER TABLE `fav_stand`
  MODIFY `fas_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fav_video`
--
ALTER TABLE `fav_video`
  MODIFY `fvi_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `live_stream`
--
ALTER TABLE `live_stream`
  MODIFY `live_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message_chat`
--
ALTER TABLE `message_chat`
  MODIFY `mes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `stand`
--
ALTER TABLE `stand`
  MODIFY `sta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `stand_cheif`
--
ALTER TABLE `stand_cheif`
  MODIFY `che_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `stand_documentation`
--
ALTER TABLE `stand_documentation`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `use_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `user_stand`
--
ALTER TABLE `user_stand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `videotheque`
--
ALTER TABLE `videotheque`
  MODIFY `vie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `fk3_user` FOREIGN KEY (`use_id`) REFERENCES `user` (`use_id`);

--
-- Constraints for table `fav_stand`
--
ALTER TABLE `fav_stand`
  ADD CONSTRAINT `pk1_fav` FOREIGN KEY (`fav_id`) REFERENCES `favoris` (`fav_id`),
  ADD CONSTRAINT `pk2_stand` FOREIGN KEY (`sta_id`) REFERENCES `stand` (`sta_id`);

--
-- Constraints for table `fav_video`
--
ALTER TABLE `fav_video`
  ADD CONSTRAINT `pk2_fav` FOREIGN KEY (`fav_id`) REFERENCES `favoris` (`fav_id`),
  ADD CONSTRAINT `pk2_videotheque` FOREIGN KEY (`vie_id`) REFERENCES `videotheque` (`vie_id`);

--
-- Constraints for table `live_stream`
--
ALTER TABLE `live_stream`
  ADD CONSTRAINT `fk_live_sta` FOREIGN KEY (`sta_id`) REFERENCES `stand` (`sta_id`);

--
-- Constraints for table `message_chat`
--
ALTER TABLE `message_chat`
  ADD CONSTRAINT `fk4_user` FOREIGN KEY (`mes_sender_id`) REFERENCES `user` (`use_id`),
  ADD CONSTRAINT `fk5_user` FOREIGN KEY (`mes_receiver_id`) REFERENCES `user` (`use_id`);

--
-- Constraints for table `stand_cheif`
--
ALTER TABLE `stand_cheif`
  ADD CONSTRAINT `fk_che_sta` FOREIGN KEY (`sta_id`) REFERENCES `stand` (`sta_id`);

--
-- Constraints for table `stand_documentation`
--
ALTER TABLE `stand_documentation`
  ADD CONSTRAINT `fk1_sta_doc` FOREIGN KEY (`sta_id`) REFERENCES `stand` (`sta_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `pk1_region` FOREIGN KEY (`region`) REFERENCES `region` (`reg_id`),
  ADD CONSTRAINT `pk3_fav` FOREIGN KEY (`fav_id`) REFERENCES `favoris` (`fav_id`);

--
-- Constraints for table `user_stand`
--
ALTER TABLE `user_stand`
  ADD CONSTRAINT `fk1_stand` FOREIGN KEY (`sta_id`) REFERENCES `stand` (`sta_id`),
  ADD CONSTRAINT `fk6_user` FOREIGN KEY (`use_id`) REFERENCES `user` (`use_id`);

--
-- Constraints for table `videotheque`
--
ALTER TABLE `videotheque`
  ADD CONSTRAINT `fk` FOREIGN KEY (`sta_id`) REFERENCES `stand` (`sta_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
