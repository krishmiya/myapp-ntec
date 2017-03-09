-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2016 at 10:13 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ntec`
--

-- --------------------------------------------------------

--
-- Table structure for table `agentcontact`
--

DROP TABLE IF EXISTS `agentcontact`;
CREATE TABLE IF NOT EXISTS `agentcontact` (
  `acId` int(11) NOT NULL AUTO_INCREMENT,
  `uId` int(11) NOT NULL DEFAULT '0',
  `agentName` varchar(150) NOT NULL DEFAULT 'NA',
  `address` varchar(250) NOT NULL DEFAULT 'NA',
  `telephone` varchar(10) NOT NULL DEFAULT 'NA',
  `fax` varchar(100) NOT NULL DEFAULT 'NA',
  `email` varchar(150) NOT NULL DEFAULT 'NA',
  PRIMARY KEY (`acId`),
  KEY `uId` (`uId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agentcontact`
--

INSERT INTO `agentcontact` (`acId`, `uId`, `agentName`, `address`, `telephone`, `fax`, `email`) VALUES
(1, 12, 'Agent Name', 'Address', '0221077296', '0221077296', 'cwsc@gmail.com'),
(2, 13, 'Krishan', '59 Edgewater Dr, Pakuranga', '0221079049', '0221077296', 'tiz0000340@myntec.ac.nz');

-- --------------------------------------------------------

--
-- Table structure for table `appstatus`
--

DROP TABLE IF EXISTS `appstatus`;
CREATE TABLE IF NOT EXISTS `appstatus` (
  `asId` int(11) NOT NULL AUTO_INCREMENT,
  `uId` int(11) NOT NULL,
  `cspId` int(11) NOT NULL,
  `currentDate` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`asId`),
  KEY `cspId_2` (`cspId`),
  KEY `uId_2` (`uId`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appstatus`
--

INSERT INTO `appstatus` (`asId`, `uId`, `cspId`, `currentDate`, `status`) VALUES
(1, 10, 1, '2016-09-02', 1),
(5, 10, 3, '2016-09-03', 1),
(6, 10, 4, '2016-09-03', 1),
(7, 14, 3, '2016-09-03', 2),
(8, 10, 5, '2016-09-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

DROP TABLE IF EXISTS `campus`;
CREATE TABLE IF NOT EXISTS `campus` (
  `camId` int(11) NOT NULL AUTO_INCREMENT,
  `campusName` varchar(50) NOT NULL,
  PRIMARY KEY (`camId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`camId`, `campusName`) VALUES
(1, 'Auckland'),
(2, 'Christchurch'),
(3, 'Hawke''s Bay'),
(4, 'Tauranga'),
(5, 'Wellington'),
(6, ''),
(7, 'Auckland edit');

-- --------------------------------------------------------

--
-- Table structure for table `citizenship`
--

DROP TABLE IF EXISTS `citizenship`;
CREATE TABLE IF NOT EXISTS `citizenship` (
  `cId` int(11) NOT NULL AUTO_INCREMENT,
  `citizenshipName` varchar(100) NOT NULL,
  PRIMARY KEY (`cId`)
) ENGINE=InnoDB AUTO_INCREMENT=239 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `citizenship`
--

INSERT INTO `citizenship` (`cId`, `citizenshipName`) VALUES
(1, 'Afghans'),
(2, 'Albanians'),
(3, 'Algerians'),
(4, 'Americans'),
(5, 'Andorrans'),
(6, 'Angolans'),
(7, 'Anguillian'),
(8, 'Antiguan/Barbudan'),
(9, 'Argentines'),
(10, 'Armenians'),
(11, 'Arubans'),
(12, 'Australians'),
(13, 'Austrians'),
(14, 'Azerbaijanis'),
(15, 'Bahamians'),
(16, 'Bahrainis'),
(17, 'Bangladeshis'),
(18, 'Barbadians'),
(19, 'Belarusians'),
(20, 'Belgians'),
(21, 'Belizeans'),
(22, 'Beninese'),
(23, 'Bermudians'),
(24, 'Bhutanese'),
(25, 'Bolivian'),
(26, 'Dutch'),
(27, 'Bosniaks'),
(28, 'Botswanan'),
(29, 'Norwegian'),
(30, 'Brazilians'),
(31, 'Bruneian'),
(32, 'Bulgarian'),
(33, 'Burkinese'),
(34, 'Burundians'),
(35, 'Cambodians'),
(36, 'Cameroonians'),
(37, 'Canadians'),
(38, 'Cape Verdeans'),
(39, 'Caymanian'),
(40, 'Central African'),
(41, 'Chadians'),
(42, 'Chileans'),
(43, 'Chinese'),
(44, 'Christmas Islander'),
(45, 'Cocossian/Cocos/Islandian'),
(46, 'Colombians'),
(47, 'Comorians'),
(48, 'Congolese'),
(49, 'Congolese'),
(50, 'Cook Islander'),
(51, 'Costa Ricans'),
(52, 'Croatians'),
(53, 'Cubans'),
(54, 'Dutch'),
(55, 'Cypriots'),
(56, 'Czechs'),
(57, 'Danes'),
(58, 'Djiboutian'),
(59, 'Dominicans'),
(60, 'Dominicans (Republic)'),
(61, 'Ecuadorians'),
(62, 'Egyptians'),
(63, 'Salvadorean'),
(64, 'Equatorial Guinean\r\nEquatoguinean'),
(65, 'Eritrean'),
(66, 'Estonian'),
(67, 'Ethiopians'),
(68, 'Falkland Islander'),
(69, 'Faroese'),
(70, 'Fijians'),
(71, 'Finnish'),
(72, 'French'),
(73, 'French'),
(74, 'Gabonese'),
(75, 'Gambian'),
(76, 'Georgian'),
(77, 'German'),
(78, 'Ghanaian'),
(79, 'Gibraltar'),
(80, 'Greeks'),
(81, 'Grenadians'),
(82, 'Grenadian'),
(83, 'French'),
(84, 'Guamanian'),
(85, 'Guatemalan'),
(86, 'Guineans'),
(87, 'Guinea-Bissau nationals'),
(88, 'Guyanese'),
(89, 'Haitians'),
(90, 'Vatican'),
(91, 'Hondurans'),
(92, 'Hong Kong'),
(93, 'Hungarians'),
(94, 'Icelanders'),
(95, 'Indians'),
(96, 'Indonesians'),
(97, 'Iranians'),
(98, 'Iraqis'),
(99, 'Irish'),
(100, 'Israelis'),
(101, 'Italians'),
(102, 'Ivoirians'),
(103, 'Jamaicans'),
(104, 'Japanese'),
(105, 'Jordanians'),
(106, 'Kazakhs'),
(107, 'Kenyans'),
(108, 'I-Kiribati'),
(109, 'Kosovars'),
(110, 'Kuwaitis'),
(111, 'Kyrgyzs'),
(112, 'Lao'),
(113, 'Latvians'),
(114, 'Lebanese'),
(115, 'Basotho'),
(116, 'Liberians'),
(117, 'Libyans'),
(118, 'Liechtensteiners'),
(119, 'Lithuanians'),
(120, 'Luxembourgers'),
(121, 'Macanese'),
(122, 'Macedonians'),
(123, 'Madagascan'),
(124, 'Malawians'),
(125, 'Malaysians'),
(126, 'Maldivians'),
(127, 'Malians'),
(128, 'Maltese'),
(129, 'Marshallese'),
(130, 'Martinican'),
(131, 'Mauritanian'),
(132, 'Mauritians'),
(133, 'Mahoran'),
(134, 'Mexicans'),
(135, 'Micronesian'),
(136, 'Moldovans'),
(137, 'Monégasque or Monacan'),
(138, 'Mongolians'),
(139, 'Montenegrins'),
(140, 'Montserratian'),
(141, 'Moroccans'),
(142, 'Mozambican'),
(143, 'Burmese'),
(144, 'Namibians'),
(145, 'Nauruan'),
(146, 'Nepalese'),
(147, 'Dutch'),
(148, 'Dutch'),
(149, 'New Caledonians'),
(150, 'New Zealanders'),
(151, 'Nicaraguans'),
(152, 'Nigeriens'),
(153, 'Nigeriens'),
(154, 'Niuean'),
(155, 'Norfolk Islander'),
(156, 'North Korean'),
(157, 'Northern Mariana Islander'),
(158, 'Norwegian'),
(159, 'Omani'),
(160, 'Pakistani'),
(161, 'Palauans'),
(162, 'Panamanians'),
(163, 'Papua New Guineans'),
(164, 'Paraguayans'),
(165, 'Peruvians'),
(166, 'Filipino'),
(167, 'Pitcairn Islander'),
(168, 'Poles'),
(169, 'French Polynesian'),
(170, 'Portuguese'),
(171, 'Puerto Ricans'),
(172, 'Qatari'),
(173, 'Réunionnais'),
(174, 'Romanians'),
(175, 'Russians'),
(176, 'Rwandans'),
(177, 'British'),
(178, 'Kittitian / Nevisian'),
(179, 'St Lucians'),
(180, 'French'),
(181, 'Saint Vincentian / Vincentian'),
(182, 'Samoan'),
(183, 'Sammarinese'),
(184, 'Sao Tomean'),
(185, 'Saudis'),
(186, 'Senegalese'),
(187, 'Serbian'),
(188, 'Seychellois'),
(189, 'Sierra Leonian'),
(190, 'Singaporean'),
(191, 'St. Maartener'),
(192, 'Slovak'),
(193, 'Slovenian'),
(194, 'Solomon Islander'),
(195, 'Somalis'),
(196, 'South Africans'),
(197, 'South Georgian/South Sandwich Islander'),
(198, 'South Korean'),
(199, 'Sudanese'),
(200, 'Spaniards'),
(201, 'Sri Lankans'),
(202, 'Sudanese'),
(203, 'Surinamese'),
(204, 'Norwegian'),
(205, 'Swazi'),
(206, 'Swedish'),
(207, 'Swiss'),
(208, 'Syrian'),
(209, 'Taiwanese'),
(210, 'Tadjik'),
(211, 'Tanzanian'),
(212, 'Thai'),
(213, 'Timorese'),
(214, 'Togolese'),
(215, 'Tokelauans'),
(216, 'Tongan'),
(217, 'Trinidad and Tobago'),
(218, 'Tunisian'),
(219, 'Turkish'),
(220, 'Turkoman'),
(221, 'British Overseas Territories Citizen'),
(222, 'Tuvaluan'),
(223, 'Ugandan'),
(224, 'Ukrainian'),
(225, 'Emirati'),
(226, 'Briton'),
(227, 'US'),
(228, 'Uruguayan'),
(229, 'Uzbek'),
(230, 'Vanuatuan'),
(231, 'Venezuelan'),
(232, 'Vietnamese'),
(233, 'British Overseas Territories Citizen'),
(234, 'Polynesians'),
(235, 'Yemeni'),
(236, 'Zambian'),
(237, 'Zimbabwean'),
(238, 'Xk');

-- --------------------------------------------------------

--
-- Table structure for table `contactdetails`
--

DROP TABLE IF EXISTS `contactdetails`;
CREATE TABLE IF NOT EXISTS `contactdetails` (
  `cdId` int(11) NOT NULL AUTO_INCREMENT,
  `uId` int(11) NOT NULL,
  `address` varchar(250) NOT NULL DEFAULT 'NA',
  `telephone` varchar(10) NOT NULL DEFAULT 'NA',
  `fax` varchar(100) NOT NULL DEFAULT 'NA',
  `email` varchar(150) NOT NULL DEFAULT 'NA',
  PRIMARY KEY (`cdId`),
  KEY `uId` (`uId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactdetails`
--

INSERT INTO `contactdetails` (`cdId`, `uId`, `address`, `telephone`, `fax`, `email`) VALUES
(1, 12, '59 Edgewater Dr, Pakuranga', '0221077296', '0221077296', 'nimesh.dawatagolla@gmail.com'),
(2, 13, '59 Edgewater Dr, Pakuranga', '0221079049', '0221077296', 'tiz0000341@myntec.ac.nz');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `cntId` int(11) NOT NULL AUTO_INCREMENT,
  `countryName` varchar(100) NOT NULL,
  PRIMARY KEY (`cntId`)
) ENGINE=MyISAM AUTO_INCREMENT=240 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`cntId`, `countryName`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'American Samoa'),
(5, 'Andorra'),
(6, 'Angola'),
(7, 'Anguilla'),
(8, 'Antigua and Barbuda'),
(9, 'Argentina'),
(10, 'Armenia'),
(11, 'Aruba'),
(12, 'Australia'),
(13, 'Austria'),
(14, 'Azerbaijan'),
(15, 'Bahamas'),
(16, 'Bahrain'),
(17, 'Bangladesh'),
(18, 'Barbados'),
(19, 'Belarus'),
(20, 'Belgium'),
(21, 'Belize'),
(22, 'Benin'),
(23, 'Bermuda'),
(24, 'Bhutan'),
(25, 'Bolivia'),
(26, 'Bonaire'),
(27, 'Bosnia-Herzegovina'),
(28, 'Botswana'),
(29, 'Bouvet Island'),
(30, 'Brazil'),
(31, 'Brunei'),
(32, 'Bulgaria'),
(33, 'Burkina Faso'),
(34, 'Burundi'),
(35, 'Cambodia'),
(36, 'Cameroon'),
(37, 'Canada'),
(38, 'Cape Verde'),
(39, 'Cayman Islands'),
(40, 'Central African Republic'),
(41, 'Chad'),
(42, 'Chile'),
(43, 'China'),
(44, 'Christmas Island'),
(45, 'Cocos (Keeling) Islands'),
(46, 'Colombia'),
(47, 'Comoros'),
(48, 'Congo, Democratic Republic of the (Zaire)'),
(49, 'Congo, Republic of'),
(50, 'Cook Islands'),
(51, 'Costa Rica'),
(52, 'Croatia'),
(53, 'Cuba'),
(54, 'Curacao'),
(55, 'Cyprus'),
(56, 'Czech Republic'),
(57, 'Denmark'),
(58, 'Djibouti'),
(59, 'Dominica'),
(60, 'Dominican Republic'),
(61, 'Ecuador'),
(62, 'Egypt'),
(63, 'El Salvador'),
(64, 'Equatorial Guinea'),
(65, 'Eritrea'),
(66, 'Estonia'),
(67, 'Ethiopia'),
(68, 'Falkland Islands'),
(69, 'Faroe Islands'),
(70, 'Fiji'),
(71, 'Finland'),
(72, 'France'),
(73, 'French Guiana'),
(74, 'Gabon'),
(75, 'Gambia'),
(76, 'Georgia'),
(77, 'Germany'),
(78, 'Ghana'),
(79, 'Gibraltar'),
(80, 'Greece'),
(81, 'Greenland'),
(82, 'Grenada'),
(83, 'Guadeloupe (French)'),
(84, 'Guam (USA)'),
(85, 'Guatemala'),
(86, 'Guinea'),
(87, 'Guinea Bissau'),
(88, 'Guyana'),
(89, 'Haiti'),
(90, 'Holy See'),
(91, 'Honduras'),
(92, 'Hong Kong'),
(93, 'Hungary'),
(94, 'Iceland'),
(95, 'India'),
(96, 'Indonesia'),
(97, 'Iran'),
(98, 'Iraq'),
(99, 'Ireland'),
(100, 'Israel'),
(101, 'Italy'),
(102, 'Ivory Coast (Cote D`Ivoire)'),
(103, 'Jamaica'),
(104, 'Japan'),
(105, 'Jordan'),
(106, 'Kazakhstan'),
(107, 'Kenya'),
(108, 'Kiribati'),
(109, 'Kosovo'),
(110, 'Kuwait'),
(111, 'Kyrgyzstan'),
(112, 'Laos'),
(113, 'Latvia'),
(114, 'Lebanon'),
(115, 'Lesotho'),
(116, 'Liberia'),
(117, 'Libya'),
(118, 'Liechtenstein'),
(119, 'Lithuania'),
(120, 'Luxembourg'),
(121, 'Macau'),
(122, 'Macedonia'),
(123, 'Madagascar'),
(124, 'Malawi'),
(125, 'Malaysia'),
(126, 'Maldives'),
(127, 'Mali'),
(128, 'Malta'),
(129, 'Marshall Islands'),
(130, 'Martinique (French)'),
(131, 'Mauritania'),
(132, 'Mauritius'),
(133, 'Mayotte'),
(134, 'Mexico'),
(135, 'Micronesia'),
(136, 'Moldova'),
(137, 'Monaco'),
(138, 'Mongolia'),
(139, 'Montenegro'),
(140, 'Montserrat'),
(141, 'Morocco'),
(142, 'Mozambique'),
(143, 'Myanmar'),
(144, 'Namibia'),
(145, 'Nauru'),
(146, 'Nepal'),
(147, 'Netherlands'),
(148, 'Netherlands Antilles'),
(149, 'New Caledonia (French)'),
(150, 'New Zealand'),
(151, 'Nicaragua'),
(152, 'Niger'),
(153, 'Nigeria'),
(154, 'Niue'),
(155, 'Norfolk Island'),
(156, 'North Korea'),
(157, 'Northern Mariana Islands'),
(158, 'Norway'),
(159, 'Oman'),
(160, 'Pakistan'),
(161, 'Palau'),
(162, 'Panama'),
(163, 'Papua New Guinea'),
(164, 'Paraguay'),
(165, 'Peru'),
(166, 'Philippines'),
(167, 'Pitcairn Island'),
(168, 'Poland'),
(169, 'Polynesia (French)'),
(170, 'Portugal'),
(171, 'Puerto Rico'),
(172, 'Qatar'),
(173, 'Reunion'),
(174, 'Romania'),
(175, 'Russia'),
(176, 'Rwanda'),
(177, 'Saint Helena'),
(178, 'Saint Kitts and Nevis'),
(179, 'Saint Lucia'),
(180, 'Saint Pierre and Miquelon'),
(181, 'Saint Vincent and Grenadines'),
(182, 'Samoa'),
(183, 'San Marino'),
(184, 'Sao Tome and Principe'),
(185, 'Saudi Arabia'),
(186, 'Senegal'),
(187, 'Serbia'),
(188, 'Seychelles'),
(189, 'Sierra Leone'),
(190, 'Singapore'),
(191, 'Sint Maarten'),
(192, 'Slovakia'),
(193, 'Slovenia'),
(194, 'Solomon Islands'),
(195, 'Somalia'),
(196, 'South Africa'),
(197, 'South Georgia and South Sandwich Islands'),
(198, 'South Korea'),
(199, 'South Sudan'),
(200, 'Spain'),
(201, 'Sri Lanka'),
(202, 'Sudan'),
(203, 'Suriname'),
(204, 'Svalbard and Jan Mayen Islands'),
(205, 'Swaziland'),
(206, 'Sweden'),
(207, 'Switzerland'),
(208, 'Syria'),
(209, 'Taiwan'),
(210, 'Tajikistan'),
(211, 'Tanzania'),
(212, 'Thailand'),
(213, 'Timor-Leste (East Timor)'),
(214, 'Togo'),
(215, 'Tokelau'),
(216, 'Tonga'),
(217, 'Trinidad and Tobago'),
(218, 'Tunisia'),
(219, 'Turkey'),
(220, 'Turkmenistan'),
(221, 'Turks and Caicos Islands'),
(222, 'Tuvalu'),
(223, 'Uganda'),
(224, 'Ukraine'),
(225, 'United Arab Emirates'),
(226, 'United Kingdom'),
(227, 'United States'),
(228, 'Uruguay'),
(229, 'Uzbekistan'),
(230, 'Vanuatu'),
(231, 'Venezuela'),
(232, 'Vietnam'),
(233, 'Virgin Islands'),
(234, 'Wallis and Futuna Islands'),
(235, 'Yemen'),
(236, 'Zambia'),
(237, 'Zimbabwe'),
(238, 'Xk'),
(239, '');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `crsId` int(11) NOT NULL AUTO_INCREMENT,
  `sId` int(11) NOT NULL,
  `mcId` int(11) DEFAULT '0',
  `courseName` varchar(100) NOT NULL,
  PRIMARY KEY (`crsId`),
  KEY `sId` (`sId`),
  KEY `sId_2` (`sId`),
  KEY `mcId` (`mcId`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`crsId`, `sId`, `mcId`, `courseName`) VALUES
(1, 1, 3, ''),
(2, 1, 3, 'Diploma in Business Accounting - Level 7'),
(3, 2, 4, 'National Certificate in Adult Education and Training - Level 4'),
(4, 2, 4, 'National Certificate in Adult Education and Training - Level 5'),
(5, 3, 2, 'Diploma of Business Management - Level 5'),
(6, 3, 2, 'Diploma of Business Management (Advanced) - Level 6'),
(7, 2, 2, 'Diploma in Business - Level 7'),
(8, 2, 2, 'Diploma in Business Management (Small to Medium Enterprises) - Level 7'),
(9, 2, 2, 'Diploma in Business Management (Information Technology) - Level 7'),
(10, 2, 2, 'Diploma in Business Management (Tourism & Hospitality) - Level 7'),
(11, 2, 0, 'Diploma in Technology Management - Level 7'),
(12, 2, 0, 'Diploma in Communication - Level 5'),
(13, 2, 0, 'Diploma in Communication - Level 6'),
(14, 2, 6, 'New Zealand Certificate in Cookery - Level 3'),
(15, 3, 6, 'New Zealand Certificate in Cookery - Level 4'),
(16, 3, 6, 'New Zealand Diploma in Cookery (Advanced) - Level 5'),
(17, 3, 0, 'Diploma in Electronics - Level 6'),
(18, 4, 0, 'Certificate in General English'),
(19, 4, 0, 'Certificate in General English + IELTS Preparation '),
(20, 5, 0, 'New Zealand Certificate in English Language - Level 4'),
(21, 5, 5, 'Diploma in Health Services Management - Level 7'),
(22, 7, 5, 'National Diploma in Hospitality (Management) - Level 5'),
(23, 7, 5, 'National Diploma in Hospitality (Operational Management) - Level 5'),
(24, 8, 1, 'New Zealand Diploma in Information Technology Technical Support - Level 5'),
(25, 6, 1, 'National Diploma in Computing - Level 5'),
(26, 6, 1, 'Diploma in Computing - Level 6'),
(27, 8, 1, 'Diploma in Computing (Software Development) - Level 7'),
(28, 9, 1, 'Diploma in Computing (Computer Networking) - Level 7'),
(29, 9, 1, 'Graduate Diploma in Information Technology - Level 7'),
(30, 10, 0, 'Barista Skills (Short Course) - Level 3'),
(31, 10, 0, 'Licence Controller Qualification (Short Course) - Level 4'),
(32, 11, 0, 'Certificate in University Preparation - Level 3'),
(33, 12, 0, 'DCL 7'),
(34, 1, 0, 'National Diploma in Computing - Level 6'),
(35, 6, 1, 'Diploma in Computing - Level 7'),
(36, 4, 1, 'aaa'),
(37, 7, 1, 'aaa'),
(38, 1, 1, 'bbb'),
(39, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `csp`
--

DROP TABLE IF EXISTS `csp`;
CREATE TABLE IF NOT EXISTS `csp` (
  `cspId` int(11) NOT NULL AUTO_INCREMENT,
  `uId` int(11) NOT NULL DEFAULT '0',
  `crsId` int(11) NOT NULL DEFAULT '0',
  `csp_comments` varchar(250) NOT NULL DEFAULT 'NA',
  `sign_date` date NOT NULL,
  `days_commencement` int(11) NOT NULL DEFAULT '0',
  `fac` int(11) NOT NULL DEFAULT '0',
  `inCharge_consult` int(11) NOT NULL DEFAULT '0',
  `office_comment` varchar(200) NOT NULL DEFAULT 'NA',
  `icd` int(11) NOT NULL DEFAULT '0',
  `hodCurrent` int(11) NOT NULL DEFAULT '0',
  `hodNew` int(11) NOT NULL DEFAULT '0',
  `refNumber` varchar(200) NOT NULL,
  `invoiceNo` varchar(50) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cspId`),
  KEY `uId` (`uId`),
  KEY `crsId` (`crsId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `csp`
--

INSERT INTO `csp` (`cspId`, `uId`, `crsId`, `csp_comments`, `sign_date`, `days_commencement`, `fac`, `inCharge_consult`, `office_comment`, `icd`, `hodCurrent`, `hodNew`, `refNumber`, `invoiceNo`, `status`) VALUES
(6, 12, 2, 'Why do you wish to change your campus/ school/ programme', '2016-09-10', 0, 0, 0, 'NA', 0, 0, 0, '10910126', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `currentprogramme`
--

DROP TABLE IF EXISTS `currentprogramme`;
CREATE TABLE IF NOT EXISTS `currentprogramme` (
  `cpId` int(11) NOT NULL AUTO_INCREMENT,
  `uId` int(11) NOT NULL DEFAULT '0',
  `crsId` int(11) NOT NULL DEFAULT '0',
  `proposedStartDate` date NOT NULL,
  `proposedFinishDate` date NOT NULL,
  PRIMARY KEY (`cpId`),
  KEY `uId` (`uId`),
  KEY `crsId` (`crsId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currentprogramme`
--

INSERT INTO `currentprogramme` (`cpId`, `uId`, `crsId`, `proposedStartDate`, `proposedFinishDate`) VALUES
(1, 12, 25, '2016-08-31', '2016-09-02'),
(2, 13, 25, '2015-11-20', '2016-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `emergencycontacthome`
--

DROP TABLE IF EXISTS `emergencycontacthome`;
CREATE TABLE IF NOT EXISTS `emergencycontacthome` (
  `echId` int(11) NOT NULL AUTO_INCREMENT,
  `uId` int(11) NOT NULL DEFAULT '0',
  `name` varchar(250) NOT NULL DEFAULT 'NA',
  `relationship` varchar(100) NOT NULL DEFAULT 'NA',
  `address` varchar(200) NOT NULL DEFAULT 'NA',
  `telephone` varchar(10) NOT NULL DEFAULT 'NA',
  `email` varchar(150) NOT NULL DEFAULT 'NA',
  PRIMARY KEY (`echId`),
  KEY `uId` (`uId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emergencycontacthome`
--

INSERT INTO `emergencycontacthome` (`echId`, `uId`, `name`, `relationship`, `address`, `telephone`, `email`) VALUES
(1, 12, 'Senawirathne', 'Father', 'Track 17/09,Onegama,Polonnaruwa', '0277911468', 'senawirathne@gmail.com'),
(2, 13, 'Krishan', 'Friend', '59 Edgewater Dr, Pakuranga', '0221079049', 'tiz0000340@myntec.ac.nz');

-- --------------------------------------------------------

--
-- Table structure for table `emergencycontactnz`
--

DROP TABLE IF EXISTS `emergencycontactnz`;
CREATE TABLE IF NOT EXISTS `emergencycontactnz` (
  `ecnzId` int(11) NOT NULL AUTO_INCREMENT,
  `uId` int(11) NOT NULL DEFAULT '0',
  `name` varchar(250) NOT NULL DEFAULT 'NA',
  `relationship` varchar(100) NOT NULL DEFAULT 'NA',
  `address` varchar(200) NOT NULL DEFAULT 'NA',
  `telephone` varchar(10) NOT NULL DEFAULT 'NA',
  `email` varchar(150) NOT NULL DEFAULT 'NA',
  PRIMARY KEY (`ecnzId`),
  KEY `uId` (`uId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emergencycontactnz`
--

INSERT INTO `emergencycontactnz` (`ecnzId`, `uId`, `name`, `relationship`, `address`, `telephone`, `email`) VALUES
(1, 12, 'Nishanthan', 'House Owner', '59 Edgewater Dr, Pakuranga', '0211299961', 'nishanthan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `finishprogramme`
--

DROP TABLE IF EXISTS `finishprogramme`;
CREATE TABLE IF NOT EXISTS `finishprogramme` (
  `fpId` int(11) NOT NULL AUTO_INCREMENT,
  `uId` int(11) NOT NULL DEFAULT '0',
  `crsId` int(11) NOT NULL DEFAULT '0',
  `nzqaLevel` varchar(10) NOT NULL DEFAULT '0',
  `camId` int(11) NOT NULL DEFAULT '0',
  `proposedStartDate` date NOT NULL,
  `proposedFinishDate` date NOT NULL,
  PRIMARY KEY (`fpId`),
  KEY `uId` (`uId`),
  KEY `camId` (`camId`),
  KEY `crsId` (`crsId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `maincourse`
--

DROP TABLE IF EXISTS `maincourse`;
CREATE TABLE IF NOT EXISTS `maincourse` (
  `mcId` int(11) NOT NULL AUTO_INCREMENT,
  `mainDescription` varchar(200) NOT NULL,
  PRIMARY KEY (`mcId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maincourse`
--

INSERT INTO `maincourse` (`mcId`, `mainDescription`) VALUES
(1, 'IT'),
(2, 'BS'),
(3, 'ACC'),
(4, 'AE'),
(5, 'HC'),
(6, 'Cookery');

-- --------------------------------------------------------

--
-- Table structure for table `oldcourse`
--

DROP TABLE IF EXISTS `oldcourse`;
CREATE TABLE IF NOT EXISTS `oldcourse` (
  `ocId` int(11) NOT NULL AUTO_INCREMENT,
  `uId` int(11) NOT NULL DEFAULT '0',
  `crsId` int(11) NOT NULL DEFAULT '0',
  `proposedStartDate` date NOT NULL,
  `proposedFinishDate` date NOT NULL,
  PRIMARY KEY (`ocId`),
  KEY `uId` (`uId`),
  KEY `crsId` (`crsId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personaldetails`
--

DROP TABLE IF EXISTS `personaldetails`;
CREATE TABLE IF NOT EXISTS `personaldetails` (
  `pdId` int(11) NOT NULL AUTO_INCREMENT,
  `uId` int(11) NOT NULL,
  `preferredName` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `gender` int(11) NOT NULL,
  `cId` int(11) NOT NULL,
  `cntId` int(11) NOT NULL,
  `ppNumber` varchar(15) NOT NULL,
  `ppIssueDate` date NOT NULL,
  `ppExpiryDate` date NOT NULL,
  `ppVisaDate` date NOT NULL,
  `insurence` varchar(50) NOT NULL,
  `iIssueDate` date NOT NULL,
  `iExpiryDate` date NOT NULL,
  `disaDescription` varchar(200) DEFAULT 'NA',
  PRIMARY KEY (`pdId`),
  KEY `uId` (`uId`),
  KEY `cId` (`cId`),
  KEY `cntId` (`cntId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personaldetails`
--

INSERT INTO `personaldetails` (`pdId`, `uId`, `preferredName`, `dob`, `gender`, `cId`, `cntId`, `ppNumber`, `ppIssueDate`, `ppExpiryDate`, `ppVisaDate`, `insurence`, `iIssueDate`, `iExpiryDate`, `disaDescription`) VALUES
(1, 12, 'Krishan', '1988-08-10', 1, 201, 201, 'N3083130', '2016-08-01', '2016-08-02', '2016-08-03', 'N456', '2016-08-04', '2016-08-05', 'NA'),
(2, 13, 'Pooh', '1988-05-10', 2, 201, 201, 'N123', '2010-09-01', '2020-09-01', '2016-10-20', 'N456', '2015-11-20', '2017-11-20', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

DROP TABLE IF EXISTS `school`;
CREATE TABLE IF NOT EXISTS `school` (
  `sId` int(11) NOT NULL AUTO_INCREMENT,
  `camId` int(11) NOT NULL,
  `schoolName` varchar(100) NOT NULL,
  PRIMARY KEY (`sId`),
  KEY `camId` (`camId`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`sId`, `camId`, `schoolName`) VALUES
(1, 1, 'National Technology Institute'),
(2, 1, 'National Technology Collage'),
(3, 1, 'National Institute of Education'),
(4, 1, 'National Engineering Institute'),
(5, 2, 'National Institute of Education'),
(6, 2, 'National Technology Institute'),
(7, 2, 'Concordia Institute of Business'),
(8, 3, 'The College of Future Learning NZ'),
(9, 3, 'National Institute of Education'),
(10, 4, 'National Institute of Education'),
(11, 3, 'National Technology Institute'),
(12, 5, 'National Institute of Education'),
(13, 4, 'National Technology Institute'),
(14, 0, 'School Name'),
(15, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `secondarystudies`
--

DROP TABLE IF EXISTS `secondarystudies`;
CREATE TABLE IF NOT EXISTS `secondarystudies` (
  `ssId` int(11) NOT NULL AUTO_INCREMENT,
  `uId` int(11) NOT NULL,
  `cntId` int(11) NOT NULL,
  `qualification` varchar(250) NOT NULL,
  `institution` varchar(250) NOT NULL,
  `dateCompleted` date NOT NULL,
  PRIMARY KEY (`ssId`),
  KEY `uId` (`uId`),
  KEY `cntId` (`cntId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `secondarystudies`
--

INSERT INTO `secondarystudies` (`ssId`, `uId`, `cntId`, `qualification`, `institution`, `dateCompleted`) VALUES
(1, 12, 201, 'HNDIT', 'SLIATE', '2011-06-10'),
(2, 13, 201, 'HQG', 'Institution', '2010-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `secondyearapp`
--

DROP TABLE IF EXISTS `secondyearapp`;
CREATE TABLE IF NOT EXISTS `secondyearapp` (
  `syaId` int(11) NOT NULL AUTO_INCREMENT,
  `uId` int(11) NOT NULL,
  `crsId` int(11) NOT NULL,
  `sign_date` date NOT NULL,
  `proposedStartDate` date DEFAULT NULL,
  `proposedFinishDate` date DEFAULT NULL,
  `avgMarks` double NOT NULL DEFAULT '0',
  `attendance` double NOT NULL DEFAULT '0',
  `ieltsDate` date DEFAULT NULL,
  `schlrShip` double NOT NULL DEFAULT '0',
  `discount` double NOT NULL,
  `criterion` double NOT NULL DEFAULT '0',
  `fee` int(11) NOT NULL DEFAULT '0' COMMENT 'original tution fee',
  `resourseFee` double NOT NULL DEFAULT '0',
  `insuranceFee` double NOT NULL DEFAULT '0',
  `refNumber` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`syaId`),
  KEY `crsId` (`crsId`),
  KEY `uId` (`uId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `secondyearapp`
--

INSERT INTO `secondyearapp` (`syaId`, `uId`, `crsId`, `sign_date`, `proposedStartDate`, `proposedFinishDate`, `avgMarks`, `attendance`, `ieltsDate`, `schlrShip`, `discount`, `criterion`, `fee`, `resourseFee`, `insuranceFee`, `refNumber`, `status`) VALUES
(1, 12, 26, '2016-09-04', NULL, NULL, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, '1', 1),
(2, 12, 26, '2016-09-04', NULL, NULL, 0, 0, NULL, 0, 0, 0, 0, 0, 0, '20913042', 0);

-- --------------------------------------------------------

--
-- Table structure for table `signature`
--

DROP TABLE IF EXISTS `signature`;
CREATE TABLE IF NOT EXISTS `signature` (
  `sigId` int(11) NOT NULL AUTO_INCREMENT,
  `uId` int(11) NOT NULL,
  `sigPath` varchar(250) NOT NULL,
  PRIMARY KEY (`sigId`),
  KEY `uId` (`uId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tertiarystudies`
--

DROP TABLE IF EXISTS `tertiarystudies`;
CREATE TABLE IF NOT EXISTS `tertiarystudies` (
  `tsId` int(11) NOT NULL AUTO_INCREMENT,
  `uId` int(11) NOT NULL,
  `cntId` int(11) NOT NULL,
  `qualification` varchar(250) NOT NULL,
  `institution` varchar(250) NOT NULL,
  `dateCompleted` date NOT NULL,
  PRIMARY KEY (`tsId`),
  KEY `uId` (`uId`),
  KEY `cntId` (`cntId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tertiarystudies`
--

INSERT INTO `tertiarystudies` (`tsId`, `uId`, `cntId`, `qualification`, `institution`, `dateCompleted`) VALUES
(1, 12, 150, 'DCL-7', 'NTI', '2016-11-20'),
(2, 13, 150, 'Highest qualification gained', 'NTI', '2016-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uId` int(11) NOT NULL AUTO_INCREMENT,
  `stuId` varchar(20) NOT NULL COMMENT 'if not a student stuId is 0',
  `camId` int(11) NOT NULL DEFAULT '0' COMMENT 'if camId 0,Main Admin',
  `mcId` int(11) NOT NULL DEFAULT '0',
  `firstName` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `usrType` int(11) NOT NULL DEFAULT '0' COMMENT 'if usrType is 0,it is a student',
  `passConfirm` int(11) NOT NULL DEFAULT '0' COMMENT 'if passConfirm 0 user not verify the email',
  `token` varchar(150) NOT NULL DEFAULT 'NA',
  PRIMARY KEY (`uId`),
  UNIQUE KEY `email` (`email`) USING BTREE,
  KEY `camId` (`camId`),
  KEY `stuId_2` (`stuId`),
  KEY `mcId` (`mcId`),
  KEY `stuId_3` (`stuId`),
  KEY `stuId_4` (`stuId`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uId`, `stuId`, `camId`, `mcId`, `firstName`, `lastName`, `email`, `password`, `usrType`, `passConfirm`, `token`) VALUES
(1, '0', 0, 0, 'Krishan', 'Dawatagolla', 'nimesh.dawatagolla@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, '202cb962ac59075b964b07152d234b70'),
(2, '0', 1, 0, 'Nimesh', 'Dawatagolla', 'nimesh.dawatagolla@yahoo.com', '202cb962ac59075b964b07152d234b70', 1, 1, 'd4cd0dabcf4caa22ad92fab40844c786'),
(3, '0', 2, 0, 'Eranda', 'Pattapola', 'erapatt@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, '6fa90eb25d717d7b1a1bc2c10f746086'),
(4, '0', 3, 0, 'Buddi', 'Landebandara', 'buddi@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, '683f32db855cbf82527682ef040b8505'),
(5, '0', 1, 1, 'Purnima', 'Harshani', 'pooh@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, '2af1f8297c0942e05ceed09d6d9ff663'),
(6, '0', 2, 1, 'Buddika', 'Dawatagolla', 'nimshnee@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, 'e2d45811d48845ce0139604c7d1a0be1'),
(7, '0', 1, 3, 'Gothamee', 'Dawatagolla', 'gotti@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, 'f779ea9ed075f4c7b26c5cbddba77b8e'),
(8, '0', 1, 0, 'Faculty Admin in Charge', 'Auckland', 'faica@gmail.com', '202cb962ac59075b964b07152d234b70', 6, 1, '98a5d602d1026507c272fa641e3f96bd'),
(9, '0', 2, 0, 'Faculty Admin in Charge', 'Christchurch', 'faicc@gmail.com', '202cb962ac59075b964b07152d234b70', 6, 1, 'd22a905569bcd934f722000ac7bccaa6'),
(10, '0', 1, 0, 'Consultation with student', 'Auckland', 'cwsa@gmail.com', '202cb962ac59075b964b07152d234b70', 3, 1, '87817776ba5d997bfcbafdb658cd0efc'),
(11, '0', 2, 0, 'Consultation with student', 'Christchurch', 'cwsc@gmail.com', '202cb962ac59075b964b07152d234b70', 3, 1, 'f69e20f37260cf4bbf04deb34ef5df59'),
(12, 'tiz0000340', 1, 1, 'Krishantha', 'Dawatagolla', 'tiz0000340@myntec.ac.nz', '202cb962ac59075b964b07152d234b70', 0, 1, '64101e9534533a0ace741b8c398337fa'),
(13, 'tiz0000341', 2, 1, 'Purnima', 'Harshani', 'tiz0000341@myntec.ac.nz', '202cb962ac59075b964b07152d234b70', 0, 1, '2a61544e9a0ed6dca0e15df560052dc2'),
(14, '0', 0, 0, 'International Counsellor ', 'Director', 'icd@gmail.com', '202cb962ac59075b964b07152d234b70', 9, 1, '278baded2c3b8a3a9780d64b6ad4eb0d'),
(15, 'tiz0000342', 1, 2, 'Eranda', 'Pattapola', 'era@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 1, '202cb962ac59075b964b07152d234b70'),
(16, 'tiz0000343', 2, 2, 'Buddi', 'Ravihara', 'ravi@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 1, '202cb962ac59075b964b07152d234b70'),
(17, '0', 1, 0, 'Nikki', 'Johnson', 'nikki@gmail.com', '202cb962ac59075b964b07152d234b70', 2, 1, '202cb962ac59075b964b07152d234b70');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
