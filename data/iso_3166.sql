-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-10-2015 a las 12:51:23
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iso_3166_1`
--

DROP TABLE IF EXISTS `iso_3166_1`;
CREATE TABLE IF NOT EXISTS `iso_3166_1` (
  `alpha_2` char(2) NOT NULL,
  `alpha_3` char(3) NOT NULL,
  `numeric` smallint(5) unsigned NOT NULL,
  `continent_alpha_2` char(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `official_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`alpha_2`),
  UNIQUE KEY `IDX_ALPHA_3` (`alpha_3`),
  UNIQUE KEY `IDX_NUMERIC` (`numeric`),
  KEY `IDX_CONTINENT` (`continent_alpha_2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `iso_3166_1`
--

INSERT INTO `iso_3166_1` (`alpha_2`, `alpha_3`, `numeric`, `continent_alpha_2`, `name`, `official_name`) VALUES
('AD', 'AND', 20, 'EU', 'Andorra', 'Principality of Andorra'),
('AE', 'ARE', 784, 'AS', 'United Arab Emirates', NULL),
('AF', 'AFG', 4, 'AS', 'Afghanistan', 'Islamic Republic of Afghanistan'),
('AG', 'ATG', 28, 'NA', 'Antigua and Barbuda', NULL),
('AI', 'AIA', 660, 'NA', 'Anguilla', NULL),
('AL', 'ALB', 8, 'EU', 'Albania', 'Republic of Albania'),
('AM', 'ARM', 51, 'AS', 'Armenia', 'Republic of Armenia'),
('AO', 'AGO', 24, 'AF', 'Angola', 'Republic of Angola'),
('AQ', 'ATA', 10, 'AN', 'Antarctica', NULL),
('AR', 'ARG', 32, 'SA', 'Argentina', 'Argentine Republic'),
('AS', 'ASM', 16, 'OC', 'American Samoa', NULL),
('AT', 'AUT', 40, 'EU', 'Austria', 'Republic of Austria'),
('AU', 'AUS', 36, 'OC', 'Australia', NULL),
('AW', 'ABW', 533, 'NA', 'Aruba', NULL),
('AX', 'ALA', 248, 'EU', 'Ã…land Islands', NULL),
('AZ', 'AZE', 31, 'AS', 'Azerbaijan', 'Republic of Azerbaijan'),
('BA', 'BIH', 70, 'EU', 'Bosnia and Herzegovina', 'Republic of Bosnia and Herzegovina'),
('BB', 'BRB', 52, 'NA', 'Barbados', NULL),
('BD', 'BGD', 50, 'AS', 'Bangladesh', 'People''s Republic of Bangladesh'),
('BE', 'BEL', 56, 'EU', 'Belgium', 'Kingdom of Belgium'),
('BF', 'BFA', 854, 'AF', 'Burkina Faso', NULL),
('BG', 'BGR', 100, 'EU', 'Bulgaria', 'Republic of Bulgaria'),
('BH', 'BHR', 48, 'AS', 'Bahrain', 'Kingdom of Bahrain'),
('BI', 'BDI', 108, 'AF', 'Burundi', 'Republic of Burundi'),
('BJ', 'BEN', 204, 'AF', 'Benin', 'Republic of Benin'),
('BL', 'BLM', 652, 'NA', 'Saint BarthÃ©lemy', NULL),
('BM', 'BMU', 60, 'NA', 'Bermuda', NULL),
('BN', 'BRN', 96, 'AS', 'Brunei Darussalam', NULL),
('BO', 'BOL', 68, 'SA', 'Bolivia, Plurinational State of', 'Plurinational State of Bolivia'),
('BQ', 'BES', 535, 'SA', 'Bonaire, Sint Eustatius and Saba', 'Bonaire, Sint Eustatius and Saba'),
('BR', 'BRA', 76, 'SA', 'Brazil', 'Federative Republic of Brazil'),
('BS', 'BHS', 44, 'NA', 'Bahamas', 'Commonwealth of the Bahamas'),
('BT', 'BTN', 64, 'AS', 'Bhutan', 'Kingdom of Bhutan'),
('BV', 'BVT', 74, 'AN', 'Bouvet Island', NULL),
('BW', 'BWA', 72, 'AF', 'Botswana', 'Republic of Botswana'),
('BY', 'BLR', 112, 'EU', 'Belarus', 'Republic of Belarus'),
('BZ', 'BLZ', 84, 'NA', 'Belize', NULL),
('CA', 'CAN', 124, 'NA', 'Canada', NULL),
('CC', 'CCK', 166, 'AS', 'Cocos (Keeling) Islands', NULL),
('CD', 'COD', 180, 'AF', 'Congo, The Democratic Republic of the', NULL),
('CF', 'CAF', 140, 'AF', 'Central African Republic', NULL),
('CG', 'COG', 178, 'AF', 'Congo', 'Republic of the Congo'),
('CH', 'CHE', 756, 'EU', 'Switzerland', 'Swiss Confederation'),
('CI', 'CIV', 384, 'AF', 'CÃ´te d''Ivoire', 'Republic of CÃ´te d''Ivoire'),
('CK', 'COK', 184, 'OC', 'Cook Islands', NULL),
('CL', 'CHL', 152, 'SA', 'Chile', 'Republic of Chile'),
('CM', 'CMR', 120, 'AF', 'Cameroon', 'Republic of Cameroon'),
('CN', 'CHN', 156, 'AS', 'China', 'People''s Republic of China'),
('CO', 'COL', 170, 'SA', 'Colombia', 'Republic of Colombia'),
('CR', 'CRI', 188, 'NA', 'Costa Rica', 'Republic of Costa Rica'),
('CU', 'CUB', 192, 'NA', 'Cuba', 'Republic of Cuba'),
('CV', 'CPV', 132, 'AF', 'Cape Verde', 'Republic of Cape Verde'),
('CW', 'CUW', 531, 'SA', 'CuraÃ§ao', 'CuraÃ§ao'),
('CX', 'CXR', 162, 'AS', 'Christmas Island', NULL),
('CY', 'CYP', 196, 'AS', 'Cyprus', 'Republic of Cyprus'),
('CZ', 'CZE', 203, 'EU', 'Czech Republic', NULL),
('DE', 'DEU', 276, 'EU', 'Germany', 'Federal Republic of Germany'),
('DJ', 'DJI', 262, 'AF', 'Djibouti', 'Republic of Djibouti'),
('DK', 'DNK', 208, 'EU', 'Denmark', 'Kingdom of Denmark'),
('DM', 'DMA', 212, 'NA', 'Dominica', 'Commonwealth of Dominica'),
('DO', 'DOM', 214, 'NA', 'Dominican Republic', NULL),
('DZ', 'DZA', 12, 'AF', 'Algeria', 'People''s Democratic Republic of Algeria'),
('EC', 'ECU', 218, 'SA', 'Ecuador', 'Republic of Ecuador'),
('EE', 'EST', 233, 'EU', 'Estonia', 'Republic of Estonia'),
('EG', 'EGY', 818, 'AF', 'Egypt', 'Arab Republic of Egypt'),
('EH', 'ESH', 732, 'AF', 'Western Sahara', NULL),
('ER', 'ERI', 232, 'AF', 'Eritrea', 'the State of Eritrea'),
('ES', 'ESP', 724, 'EU', 'Spain', 'Kingdom of Spain'),
('ET', 'ETH', 231, 'AF', 'Ethiopia', 'Federal Democratic Republic of Ethiopia'),
('FI', 'FIN', 246, 'EU', 'Finland', 'Republic of Finland'),
('FJ', 'FJI', 242, 'OC', 'Fiji', 'Republic of Fiji'),
('FK', 'FLK', 238, 'SA', 'Falkland Islands (Malvinas)', NULL),
('FM', 'FSM', 583, 'OC', 'Micronesia, Federated States of', 'Federated States of Micronesia'),
('FO', 'FRO', 234, 'EU', 'Faroe Islands', NULL),
('FR', 'FRA', 250, 'EU', 'France', 'French Republic'),
('GA', 'GAB', 266, 'AF', 'Gabon', 'Gabonese Republic'),
('GB', 'GBR', 826, 'EU', 'United Kingdom', 'United Kingdom of Great Britain and Northern Ireland'),
('GD', 'GRD', 308, 'NA', 'Grenada', NULL),
('GE', 'GEO', 268, 'AS', 'Georgia', NULL),
('GF', 'GUF', 254, 'SA', 'French Guiana', NULL),
('GG', 'GGY', 831, 'EU', 'Guernsey', NULL),
('GH', 'GHA', 288, 'AF', 'Ghana', 'Republic of Ghana'),
('GI', 'GIB', 292, 'EU', 'Gibraltar', NULL),
('GL', 'GRL', 304, 'NA', 'Greenland', NULL),
('GM', 'GMB', 270, 'AF', 'Gambia', 'Republic of the Gambia'),
('GN', 'GIN', 324, 'AF', 'Guinea', 'Republic of Guinea'),
('GP', 'GLP', 312, 'NA', 'Guadeloupe', NULL),
('GQ', 'GNQ', 226, 'AF', 'Equatorial Guinea', 'Republic of Equatorial Guinea'),
('GR', 'GRC', 300, 'EU', 'Greece', 'Hellenic Republic'),
('GS', 'SGS', 239, 'AN', 'South Georgia and the South Sandwich Islands', NULL),
('GT', 'GTM', 320, 'NA', 'Guatemala', 'Republic of Guatemala'),
('GU', 'GUM', 316, 'OC', 'Guam', NULL),
('GW', 'GNB', 624, 'AF', 'Guinea-Bissau', 'Republic of Guinea-Bissau'),
('GY', 'GUY', 328, 'SA', 'Guyana', 'Republic of Guyana'),
('HK', 'HKG', 344, 'AS', 'Hong Kong', 'Hong Kong Special Administrative Region of China'),
('HM', 'HMD', 334, 'AN', 'Heard Island and McDonald Islands', NULL),
('HN', 'HND', 340, 'NA', 'Honduras', 'Republic of Honduras'),
('HR', 'HRV', 191, 'EU', 'Croatia', 'Republic of Croatia'),
('HT', 'HTI', 332, 'NA', 'Haiti', 'Republic of Haiti'),
('HU', 'HUN', 348, 'EU', 'Hungary', 'Hungary'),
('ID', 'IDN', 360, 'AS', 'Indonesia', 'Republic of Indonesia'),
('IE', 'IRL', 372, 'EU', 'Ireland', NULL),
('IL', 'ISR', 376, 'AS', 'Israel', 'State of Israel'),
('IM', 'IMN', 833, 'EU', 'Isle of Man', NULL),
('IN', 'IND', 356, 'AS', 'India', 'Republic of India'),
('IO', 'IOT', 86, 'AS', 'British Indian Ocean Territory', NULL),
('IQ', 'IRQ', 368, 'AS', 'Iraq', 'Republic of Iraq'),
('IR', 'IRN', 364, 'AS', 'Iran, Islamic Republic of', 'Islamic Republic of Iran'),
('IS', 'ISL', 352, 'EU', 'Iceland', 'Republic of Iceland'),
('IT', 'ITA', 380, 'EU', 'Italy', 'Italian Republic'),
('JE', 'JEY', 832, 'EU', 'Jersey', NULL),
('JM', 'JAM', 388, 'NA', 'Jamaica', NULL),
('JO', 'JOR', 400, 'AS', 'Jordan', 'Hashemite Kingdom of Jordan'),
('JP', 'JPN', 392, 'AS', 'Japan', NULL),
('KE', 'KEN', 404, 'AF', 'Kenya', 'Republic of Kenya'),
('KG', 'KGZ', 417, 'AS', 'Kyrgyzstan', 'Kyrgyz Republic'),
('KH', 'KHM', 116, 'AS', 'Cambodia', 'Kingdom of Cambodia'),
('KI', 'KIR', 296, 'OC', 'Kiribati', 'Republic of Kiribati'),
('KM', 'COM', 174, 'AF', 'Comoros', 'Union of the Comoros'),
('KN', 'KNA', 659, 'NA', 'Saint Kitts and Nevis', NULL),
('KP', 'PRK', 408, 'AS', 'Korea, Democratic People''s Republic of', 'Democratic People''s Republic of Korea'),
('KR', 'KOR', 410, 'AS', 'Korea, Republic of', NULL),
('KW', 'KWT', 414, 'AS', 'Kuwait', 'State of Kuwait'),
('KY', 'CYM', 136, 'NA', 'Cayman Islands', NULL),
('KZ', 'KAZ', 398, 'AS', 'Kazakhstan', 'Republic of Kazakhstan'),
('LA', 'LAO', 418, 'AS', 'Lao People''s Democratic Republic', NULL),
('LB', 'LBN', 422, 'AS', 'Lebanon', 'Lebanese Republic'),
('LC', 'LCA', 662, 'NA', 'Saint Lucia', NULL),
('LI', 'LIE', 438, 'EU', 'Liechtenstein', 'Principality of Liechtenstein'),
('LK', 'LKA', 144, 'AS', 'Sri Lanka', 'Democratic Socialist Republic of Sri Lanka'),
('LR', 'LBR', 430, 'AF', 'Liberia', 'Republic of Liberia'),
('LS', 'LSO', 426, 'AF', 'Lesotho', 'Kingdom of Lesotho'),
('LT', 'LTU', 440, 'EU', 'Lithuania', 'Republic of Lithuania'),
('LU', 'LUX', 442, 'EU', 'Luxembourg', 'Grand Duchy of Luxembourg'),
('LV', 'LVA', 428, 'EU', 'Latvia', 'Republic of Latvia'),
('LY', 'LBY', 434, 'AF', 'Libya', 'Libya'),
('MA', 'MAR', 504, 'AF', 'Morocco', 'Kingdom of Morocco'),
('MC', 'MCO', 492, 'EU', 'Monaco', 'Principality of Monaco'),
('MD', 'MDA', 498, 'EU', 'Moldova, Republic of', 'Republic of Moldova'),
('ME', 'MNE', 499, 'EU', 'Montenegro', 'Montenegro'),
('MF', 'MAF', 663, 'NA', 'Saint Martin (French part)', NULL),
('MG', 'MDG', 450, 'AF', 'Madagascar', 'Republic of Madagascar'),
('MH', 'MHL', 584, 'OC', 'Marshall Islands', 'Republic of the Marshall Islands'),
('MK', 'MKD', 807, 'EU', 'Macedonia, Republic of', 'The Former Yugoslav Republic of Macedonia'),
('ML', 'MLI', 466, 'AF', 'Mali', 'Republic of Mali'),
('MM', 'MMR', 104, 'AS', 'Myanmar', 'Republic of Myanmar'),
('MN', 'MNG', 496, 'AS', 'Mongolia', NULL),
('MO', 'MAC', 446, 'AS', 'Macao', 'Macao Special Administrative Region of China'),
('MP', 'MNP', 580, 'OC', 'Northern Mariana Islands', 'Commonwealth of the Northern Mariana Islands'),
('MQ', 'MTQ', 474, 'NA', 'Martinique', NULL),
('MR', 'MRT', 478, 'AF', 'Mauritania', 'Islamic Republic of Mauritania'),
('MS', 'MSR', 500, 'NA', 'Montserrat', NULL),
('MT', 'MLT', 470, 'EU', 'Malta', 'Republic of Malta'),
('MU', 'MUS', 480, 'AF', 'Mauritius', 'Republic of Mauritius'),
('MV', 'MDV', 462, 'AS', 'Maldives', 'Republic of Maldives'),
('MW', 'MWI', 454, 'AF', 'Malawi', 'Republic of Malawi'),
('MX', 'MEX', 484, 'NA', 'Mexico', 'United Mexican States'),
('MY', 'MYS', 458, 'AS', 'Malaysia', NULL),
('MZ', 'MOZ', 508, 'AF', 'Mozambique', 'Republic of Mozambique'),
('NA', 'NAM', 516, 'AF', 'Namibia', 'Republic of Namibia'),
('NC', 'NCL', 540, 'OC', 'New Caledonia', NULL),
('NE', 'NER', 562, 'AF', 'Niger', 'Republic of the Niger'),
('NF', 'NFK', 574, 'OC', 'Norfolk Island', NULL),
('NG', 'NGA', 566, 'AF', 'Nigeria', 'Federal Republic of Nigeria'),
('NI', 'NIC', 558, 'NA', 'Nicaragua', 'Republic of Nicaragua'),
('NL', 'NLD', 528, 'EU', 'Netherlands', 'Kingdom of the Netherlands'),
('NO', 'NOR', 578, 'EU', 'Norway', 'Kingdom of Norway'),
('NP', 'NPL', 524, 'AS', 'Nepal', 'Federal Democratic Republic of Nepal'),
('NR', 'NRU', 520, 'OC', 'Nauru', 'Republic of Nauru'),
('NU', 'NIU', 570, 'OC', 'Niue', 'Niue'),
('NZ', 'NZL', 554, 'OC', 'New Zealand', NULL),
('OM', 'OMN', 512, 'AS', 'Oman', 'Sultanate of Oman'),
('PA', 'PAN', 591, 'NA', 'Panama', 'Republic of Panama'),
('PE', 'PER', 604, 'SA', 'Peru', 'Republic of Peru'),
('PF', 'PYF', 258, 'OC', 'French Polynesia', NULL),
('PG', 'PNG', 598, 'OC', 'Papua New Guinea', 'Independent State of Papua New Guinea'),
('PH', 'PHL', 608, 'AS', 'Philippines', 'Republic of the Philippines'),
('PK', 'PAK', 586, 'AS', 'Pakistan', 'Islamic Republic of Pakistan'),
('PL', 'POL', 616, 'EU', 'Poland', 'Republic of Poland'),
('PM', 'SPM', 666, 'NA', 'Saint Pierre and Miquelon', NULL),
('PN', 'PCN', 612, 'OC', 'Pitcairn', NULL),
('PR', 'PRI', 630, 'NA', 'Puerto Rico', NULL),
('PS', 'PSE', 275, 'AS', 'Palestine, State of', 'the State of Palestine'),
('PT', 'PRT', 620, 'EU', 'Portugal', 'Portuguese Republic'),
('PW', 'PLW', 585, 'OC', 'Palau', 'Republic of Palau'),
('PY', 'PRY', 600, 'SA', 'Paraguay', 'Republic of Paraguay'),
('QA', 'QAT', 634, 'AS', 'Qatar', 'State of Qatar'),
('RE', 'REU', 638, 'AF', 'RÃ©union', NULL),
('RO', 'ROU', 642, 'EU', 'Romania', NULL),
('RS', 'SRB', 688, 'EU', 'Serbia', 'Republic of Serbia'),
('RU', 'RUS', 643, 'EU', 'Russian Federation', NULL),
('RW', 'RWA', 646, 'AF', 'Rwanda', 'Rwandese Republic'),
('SA', 'SAU', 682, 'AS', 'Saudi Arabia', 'Kingdom of Saudi Arabia'),
('SB', 'SLB', 90, 'OC', 'Solomon Islands', NULL),
('SC', 'SYC', 690, 'AF', 'Seychelles', 'Republic of Seychelles'),
('SD', 'SDN', 729, 'AF', 'Sudan', 'Republic of the Sudan'),
('SE', 'SWE', 752, 'EU', 'Sweden', 'Kingdom of Sweden'),
('SG', 'SGP', 702, 'AS', 'Singapore', 'Republic of Singapore'),
('SH', 'SHN', 654, 'AF', 'Saint Helena, Ascension and Tristan da Cunha', NULL),
('SI', 'SVN', 705, 'EU', 'Slovenia', 'Republic of Slovenia'),
('SJ', 'SJM', 744, 'EU', 'Svalbard and Jan Mayen', NULL),
('SK', 'SVK', 703, 'EU', 'Slovakia', 'Slovak Republic'),
('SL', 'SLE', 694, 'AF', 'Sierra Leone', 'Republic of Sierra Leone'),
('SM', 'SMR', 674, 'EU', 'San Marino', 'Republic of San Marino'),
('SN', 'SEN', 686, 'AF', 'Senegal', 'Republic of Senegal'),
('SO', 'SOM', 706, 'AF', 'Somalia', 'Federal Republic of Somalia'),
('SR', 'SUR', 740, 'SA', 'Suriname', 'Republic of Suriname'),
('SS', 'SSD', 728, 'AF', 'South Sudan', 'Republic of South Sudan'),
('ST', 'STP', 678, 'AF', 'Sao Tome and Principe', 'Democratic Republic of Sao Tome and Principe'),
('SV', 'SLV', 222, 'NA', 'El Salvador', 'Republic of El Salvador'),
('SX', 'SXM', 534, 'NA', 'Sint Maarten (Dutch part)', 'Sint Maarten (Dutch part)'),
('SY', 'SYR', 760, 'AS', 'Syrian Arab Republic', NULL),
('SZ', 'SWZ', 748, 'AF', 'Swaziland', 'Kingdom of Swaziland'),
('TC', 'TCA', 796, 'NA', 'Turks and Caicos Islands', NULL),
('TD', 'TCD', 148, 'AF', 'Chad', 'Republic of Chad'),
('TF', 'ATF', 260, 'AN', 'French Southern Territories', NULL),
('TG', 'TGO', 768, 'AF', 'Togo', 'Togolese Republic'),
('TH', 'THA', 764, 'AS', 'Thailand', 'Kingdom of Thailand'),
('TJ', 'TJK', 762, 'AS', 'Tajikistan', 'Republic of Tajikistan'),
('TK', 'TKL', 772, 'OC', 'Tokelau', NULL),
('TL', 'TLS', 626, 'AS', 'Timor-Leste', 'Democratic Republic of Timor-Leste'),
('TM', 'TKM', 795, 'AS', 'Turkmenistan', NULL),
('TN', 'TUN', 788, 'AF', 'Tunisia', 'Republic of Tunisia'),
('TO', 'TON', 776, 'OC', 'Tonga', 'Kingdom of Tonga'),
('TR', 'TUR', 792, 'EU', 'Turkey', 'Republic of Turkey'),
('TT', 'TTO', 780, 'NA', 'Trinidad and Tobago', 'Republic of Trinidad and Tobago'),
('TV', 'TUV', 798, 'OC', 'Tuvalu', NULL),
('TW', 'TWN', 158, 'AS', 'Taiwan, Province of China', 'Taiwan, Province of China'),
('TZ', 'TZA', 834, 'AF', 'Tanzania, United Republic of', 'United Republic of Tanzania'),
('UA', 'UKR', 804, 'EU', 'Ukraine', NULL),
('UG', 'UGA', 800, 'AF', 'Uganda', 'Republic of Uganda'),
('UM', 'UMI', 581, 'OC', 'United States Minor Outlying Islands', NULL),
('US', 'USA', 840, 'NA', 'United States', 'United States of America'),
('UY', 'URY', 858, 'SA', 'Uruguay', 'Eastern Republic of Uruguay'),
('UZ', 'UZB', 860, 'AS', 'Uzbekistan', 'Republic of Uzbekistan'),
('VA', 'VAT', 336, 'EU', 'Holy See (Vatican City State)', NULL),
('VC', 'VCT', 670, 'NA', 'Saint Vincent and the Grenadines', NULL),
('VE', 'VEN', 862, 'SA', 'Venezuela, Bolivarian Republic of', 'Bolivarian Republic of Venezuela'),
('VG', 'VGB', 92, 'NA', 'Virgin Islands, British', 'British Virgin Islands'),
('VI', 'VIR', 850, 'NA', 'Virgin Islands, U.S.', 'Virgin Islands of the United States'),
('VN', 'VNM', 704, 'AS', 'Viet Nam', 'Socialist Republic of Viet Nam'),
('VU', 'VUT', 548, 'OC', 'Vanuatu', 'Republic of Vanuatu'),
('WF', 'WLF', 876, 'OC', 'Wallis and Futuna', NULL),
('WS', 'WSM', 882, 'OC', 'Samoa', 'Independent State of Samoa'),
('YE', 'YEM', 887, 'AS', 'Yemen', 'Republic of Yemen'),
('YT', 'MYT', 175, 'AF', 'Mayotte', NULL),
('ZA', 'ZAF', 710, 'AF', 'South Africa', 'Republic of South Africa'),
('ZM', 'ZMB', 894, 'AF', 'Zambia', 'Republic of Zambia'),
('ZW', 'ZWE', 716, 'AF', 'Zimbabwe', 'Republic of Zimbabwe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iso_3166_continents`
--

DROP TABLE IF EXISTS `iso_3166_continents`;
CREATE TABLE IF NOT EXISTS `iso_3166_continents` (
  `alpha_2` varchar(2) NOT NULL,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`alpha_2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `iso_3166_continents`
--

INSERT INTO `iso_3166_continents` (`alpha_2`, `name`) VALUES
('AF', 'Africa'),
('AN', 'Antarctica'),
('AS', 'Asia'),
('EU', 'Europe'),
('NA', 'North america'),
('OC', 'Oceania'),
('SA', 'South america');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `iso_3166_1`
--
ALTER TABLE `iso_3166_1`
  ADD CONSTRAINT `iso_3166_1_ibfk_1` FOREIGN KEY (`continent_alpha_2`) REFERENCES `iso_3166_continents` (`alpha_2`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
