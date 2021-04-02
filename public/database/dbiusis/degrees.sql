/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50505
Source Host           : 192.168.56.101:3306
Source Database       : dbiusis16

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-02-15 16:13:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `degrees`
-- ----------------------------
DROP TABLE IF EXISTS `degrees`;
CREATE TABLE `degrees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `college_id` int(10) unsigned NOT NULL,
  `degree` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `abbr` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `years` tinyint(3) unsigned NOT NULL,
  `active` tinyint(3) unsigned NOT NULL,
  `admission` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `degrees_college_id_foreign` (`college_id`)
) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of degrees
-- ----------------------------
INSERT INTO `degrees` VALUES ('1', '2', 'BS in Agriculture', 'BSA', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:28:43');
INSERT INTO `degrees` VALUES ('2', '6', 'BS in Agricultural Engineering', 'BSAE', '0', '5', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:28:45');
INSERT INTO `degrees` VALUES ('3', '2', 'BS in Forestry', 'BSForestry', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:28:46');
INSERT INTO `degrees` VALUES ('4', '2', 'BS in Development Communication', 'BSDC', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:28:46');
INSERT INTO `degrees` VALUES ('5', '2', 'BS in Home Technology', 'BSHT', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:28:47');
INSERT INTO `degrees` VALUES ('6', '3', 'BS in Marine Biology', 'BSMB', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:28:48');
INSERT INTO `degrees` VALUES ('7', '4', 'BS in Mathematics', 'BS MATH', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:28:49');
INSERT INTO `degrees` VALUES ('8', '4', 'BS in Computer Science', 'BSCS', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:28:49');
INSERT INTO `degrees` VALUES ('9', '4', 'BS in Biology', 'BS BIO', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:28:49');
INSERT INTO `degrees` VALUES ('10', '2', 'BS in Environmental Science', 'BS ENVI SCI', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:28:50');
INSERT INTO `degrees` VALUES ('11', '4', 'AB in Sociology', 'BA SOCIO', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:28:52');
INSERT INTO `degrees` VALUES ('12', '4', 'AB in English Studies (CA)', 'AB ENGL (CA)', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:29:01');
INSERT INTO `degrees` VALUES ('13', '5', 'BS in Accountancy', 'BS ACCT', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:29:02');
INSERT INTO `degrees` VALUES ('14', '5', 'BS in Economics', 'BS ECON', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:29:03');
INSERT INTO `degrees` VALUES ('15', '5', 'BS in Business Administration (MM)', 'BSBA-MM', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:29:04');
INSERT INTO `degrees` VALUES ('16', '2', 'BS in Agricultural Technology', 'BSAT', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:29:07');
INSERT INTO `degrees` VALUES ('17', '5', 'BS in Cooperative Management', 'BSCM', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:29:08');
INSERT INTO `degrees` VALUES ('18', '9', 'Bachelor in Secondary Education (English)', 'BSE (Engl)', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:29:10');
INSERT INTO `degrees` VALUES ('19', '9', 'Bachelor in Elementary Education', 'BEEd', '0', '4', '0', null, '0000-00-00 00:00:00', '2016-09-23 14:57:13');
INSERT INTO `degrees` VALUES ('20', '6', 'BS in Civil Engineering', 'BS CIV ENG', '0', '5', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:29:22');
INSERT INTO `degrees` VALUES ('21', '6', 'BS in Electrical Engineering', 'BSEE', '0', '5', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:29:21');
INSERT INTO `degrees` VALUES ('22', '6', 'BS in Mechanical Engineering', 'BS MECH ENG', '0', '5', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:29:24');
INSERT INTO `degrees` VALUES ('23', '6', 'BS in Chemical Engineering', 'BS CHEM ENG', '0', '5', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:29:24');
INSERT INTO `degrees` VALUES ('24', '6', 'BS in Ceramic Engineering', 'BS CER ENG', '0', '5', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:29:26');
INSERT INTO `degrees` VALUES ('25', '6', 'BS in Computer Engineering', 'BS COMP ENG', '0', '5', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:29:26');
INSERT INTO `degrees` VALUES ('26', '6', 'BS in Electronics Engineering', 'BSECE', '0', '5', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:29:27');
INSERT INTO `degrees` VALUES ('27', '3', 'BS in Fisheries', 'BSF', '0', '4', '0', '1', '0000-00-00 00:00:00', '2018-02-09 15:29:28');
INSERT INTO `degrees` VALUES ('28', '7', 'BS in Nursing', 'BSN', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:29:29');
INSERT INTO `degrees` VALUES ('29', '7', 'BS in Physical Therapy', 'BSPT', '0', '5', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:29:29');
INSERT INTO `degrees` VALUES ('30', '7', 'BS in Pharmacy', 'BS PHARM', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:29:29');
INSERT INTO `degrees` VALUES ('31', '8', 'BS in Industrial Education', 'BSIE', '0', '4', '0', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `degrees` VALUES ('32', '8', 'BS in Industrial Technology', 'BSIT', '0', '4', '0', null, '0000-00-00 00:00:00', '2016-09-23 14:55:13');
INSERT INTO `degrees` VALUES ('33', '1', 'Doctor of Philosophy in Rural Development', 'PhD (Rural Devt)', '2', '2', '1', null, '0000-00-00 00:00:00', '2017-07-27 13:56:38');
INSERT INTO `degrees` VALUES ('34', '1', 'Doctor of Education', 'EdD', '2', '2', '0', null, '0000-00-00 00:00:00', '2017-07-27 13:56:42');
INSERT INTO `degrees` VALUES ('35', '1', 'Master of Arts in Education', 'MAEd', '1', '2', '0', null, '0000-00-00 00:00:00', '2017-07-27 13:57:02');
INSERT INTO `degrees` VALUES ('36', '1', 'Master of Education', 'MEd', '1', '2', '0', null, '0000-00-00 00:00:00', '2017-07-27 13:57:05');
INSERT INTO `degrees` VALUES ('37', '1', 'Master of Arts in Public Administration', 'MAPA', '1', '2', '0', null, '0000-00-00 00:00:00', '2017-07-27 13:57:07');
INSERT INTO `degrees` VALUES ('38', '1', 'Master in Public Administration', 'MPA', '1', '2', '0', null, '0000-00-00 00:00:00', '2017-07-27 13:57:08');
INSERT INTO `degrees` VALUES ('39', '1', 'Master of Science in Rural Development', 'MSRD', '1', '2', '0', null, '0000-00-00 00:00:00', '2017-07-27 13:57:09');
INSERT INTO `degrees` VALUES ('40', '1', 'Master of Rural Development', 'MRD', '1', '2', '0', null, '0000-00-00 00:00:00', '2017-07-27 13:57:10');
INSERT INTO `degrees` VALUES ('41', '1', 'Master of Arts in Nursing', 'MAN', '1', '2', '0', null, '0000-00-00 00:00:00', '2017-07-27 13:57:13');
INSERT INTO `degrees` VALUES ('42', '1', 'Master in Nursing', 'MN', '1', '2', '0', null, '0000-00-00 00:00:00', '2017-07-27 13:57:14');
INSERT INTO `degrees` VALUES ('43', '1', 'Master of Science in Agriculture', 'MSA', '1', '2', '0', null, '0000-00-00 00:00:00', '2017-07-27 13:57:15');
INSERT INTO `degrees` VALUES ('44', '1', 'Master of Agriculture', 'MAgri', '1', '2', '0', null, '0000-00-00 00:00:00', '2017-07-27 13:57:17');
INSERT INTO `degrees` VALUES ('45', '1', 'Master of Science in Agroforestry', 'MSAgroF', '1', '2', '0', null, '0000-00-00 00:00:00', '2017-07-27 13:57:18');
INSERT INTO `degrees` VALUES ('46', '1', 'Graduate Diploma', 'GD', '1', '2', '0', null, '0000-00-00 00:00:00', '2017-07-27 13:57:19');
INSERT INTO `degrees` VALUES ('47', '9', 'Short-Term Programs', 'STP', '0', '4', '0', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `degrees` VALUES ('48', '2', 'Bachelor of Agricultural Technology', 'BAT', '0', '4', '1', null, '0000-00-00 00:00:00', '2016-09-23 14:53:10');
INSERT INTO `degrees` VALUES ('49', '2', 'Diploma of Agricultural Technology', 'DAT', '0', '0', '0', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `degrees` VALUES ('50', '2', 'Forest Ranger', 'FR', '0', '2', '0', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `degrees` VALUES ('51', '2', 'Technical Homemaking', 'TH', '0', '2', '0', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `degrees` VALUES ('52', '2', 'Associate  in Home Technology', 'AHT', '0', '2', '0', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `degrees` VALUES ('53', '2', 'Associate in Technical Homemaking', 'ATH', '0', '2', '0', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `degrees` VALUES ('54', '4', 'BS in Chemistry', 'BSChem', '0', '4', '0', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `degrees` VALUES ('55', '8', 'Diploma of Technology', 'DT', '0', '2', '0', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `degrees` VALUES ('56', '8', 'General Radio Communication Operator', 'GRCO', '0', '2', '0', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `degrees` VALUES ('57', '8', 'Certificate of Technology', 'CT', '0', '2', '0', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `degrees` VALUES ('58', '5', 'BS in Accounting Technology', 'BSAT', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:29:56');
INSERT INTO `degrees` VALUES ('59', '4', 'AB in English Language', 'ABEL', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:29:55');
INSERT INTO `degrees` VALUES ('60', '5', 'BS in Entrepreneurship', 'BS ENTREP', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:29:59');
INSERT INTO `degrees` VALUES ('61', '5', 'BS in Business Administration (HRDM)', 'BSBA-HRDM', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:29:59');
INSERT INTO `degrees` VALUES ('62', '5', 'BS in Tourism Management', 'BSTM', '0', '4', '0', '0', '0000-00-00 00:00:00', '2018-02-09 15:30:07');
INSERT INTO `degrees` VALUES ('63', '5', 'BS in Hospitality Management', 'BSHM', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:30:01');
INSERT INTO `degrees` VALUES ('64', '8', 'Bachelor in Automotive Technology', 'BAT', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:30:10');
INSERT INTO `degrees` VALUES ('65', '8', 'B Technical Teachers Education', 'BTTE', '0', '4', '0', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `degrees` VALUES ('66', '9', 'Bachelor in Secondary Education (Filipino)', 'BSE (Fil)', '0', '4', '1', null, '0000-00-00 00:00:00', '2016-09-23 14:57:00');
INSERT INTO `degrees` VALUES ('67', '9', 'Bachelor in Secondary Education (MAPEH)', 'BSE (MAPEH)', '0', '4', '1', null, '0000-00-00 00:00:00', '2016-09-23 14:57:00');
INSERT INTO `degrees` VALUES ('68', '9', 'Bachelor in Secondary Education (SocStud)', 'BSE (SocStud)', '0', '4', '1', null, '0000-00-00 00:00:00', '2016-09-23 14:55:33');
INSERT INTO `degrees` VALUES ('69', '9', 'Bachelor in Secondary Education (TLE)', 'BSE (TLE)', '0', '4', '1', null, '0000-00-00 00:00:00', '2016-09-23 14:55:33');
INSERT INTO `degrees` VALUES ('70', '9', 'Bachelor in Secondary Education (BioSci)', 'BSE (BioSci)', '0', '4', '1', null, '0000-00-00 00:00:00', '2016-09-23 14:57:00');
INSERT INTO `degrees` VALUES ('71', '9', 'Bachelor in Secondary Education (Math)', 'BSE (Math)', '0', '4', '1', null, '0000-00-00 00:00:00', '2016-09-23 14:56:58');
INSERT INTO `degrees` VALUES ('72', '9', 'Bachelor in Secondary Education (PhysSc)', 'BSE (PhysSc)', '0', '4', '1', null, '0000-00-00 00:00:00', '2016-09-23 14:55:33');
INSERT INTO `degrees` VALUES ('73', '4', 'AB English Studies', 'BA ENGL', '0', '4', '0', null, '0000-00-00 00:00:00', '2016-09-28 09:13:12');
INSERT INTO `degrees` VALUES ('74', '10', 'Bachelor of Laws', 'LB', '0', '4', '1', null, '0000-00-00 00:00:00', '2016-09-23 14:57:06');
INSERT INTO `degrees` VALUES ('75', '5', 'BS in Business Administration (TM)', 'BSBA-TM', '0', '4', '0', '1', '0000-00-00 00:00:00', '2018-02-09 15:30:21');
INSERT INTO `degrees` VALUES ('76', '5', 'BS in Business Administration (M)', 'BSBA-MGT', '0', '4', '0', '1', '0000-00-00 00:00:00', '2018-02-09 15:30:21');
INSERT INTO `degrees` VALUES ('77', '5', 'BS in Business Administration (MA)', 'BSBA-MA', '0', '4', '0', '1', '0000-00-00 00:00:00', '2018-02-09 15:30:21');
INSERT INTO `degrees` VALUES ('78', '5', 'BS in Business Administration (Entrep)', 'BSBA-Entrep', '0', '4', '0', '1', '0000-00-00 00:00:00', '2018-02-09 15:30:22');
INSERT INTO `degrees` VALUES ('79', '6', 'BS in Meteorology Engineering', 'BSMetEng', '0', '5', '0', '1', '0000-00-00 00:00:00', '2018-02-09 15:30:22');
INSERT INTO `degrees` VALUES ('80', '4', 'AB in English Studies (ESL)', 'AB ENGL (ESL)', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:30:32');
INSERT INTO `degrees` VALUES ('81', '5', 'BS in Tourism Management (ISM)', 'BSTM-ISM', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:30:28');
INSERT INTO `degrees` VALUES ('82', '5', 'BS in Tourism Management (TTM)', 'BSTM-TTM', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:30:28');
INSERT INTO `degrees` VALUES ('83', '4', 'AB Communication', 'ABCOM', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:30:31');
INSERT INTO `degrees` VALUES ('84', '8', 'BS in Industrial Technology (Computer Technology)', 'BSIT-CT', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:30:37');
INSERT INTO `degrees` VALUES ('85', '8', 'BS in Industrial Technology (Garments Technology)', 'BSIT-GT', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:30:37');
INSERT INTO `degrees` VALUES ('86', '8', 'BS in Industrial Technology (Food Technology)', 'BSIT-FT', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:30:38');
INSERT INTO `degrees` VALUES ('87', '8', 'BS in Industrial Technology (Civil Technology)', 'BSIT-CivTech', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:30:38');
INSERT INTO `degrees` VALUES ('88', '8', 'BS in Industrial Technology (Electrical Technology)', 'BSIT-ELXT', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:30:38');
INSERT INTO `degrees` VALUES ('89', '8', 'BS in Industrial Technology (Electronics Technology)', 'BSIT-ELXT', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:30:39');
INSERT INTO `degrees` VALUES ('90', '8', 'Bachelor of Technical Teacher Education (Garments, Fashion and Design)', 'BTTE-GFD', '0', '4', '1', null, '0000-00-00 00:00:00', '2018-02-09 15:30:47');
INSERT INTO `degrees` VALUES ('91', '8', 'Bachelor of Technical Teacher Education (Drafting Technology)', 'BTTE-Drafting', '0', '4', '1', null, '0000-00-00 00:00:00', '2018-02-09 15:30:47');
INSERT INTO `degrees` VALUES ('92', '8', 'Bachelor of Technical Teacher Education (Computer Technology)', 'BTTE-CompTech', '0', '4', '1', null, '0000-00-00 00:00:00', '2018-02-09 15:30:48');
INSERT INTO `degrees` VALUES ('93', '8', 'Bachelor of Technical Teacher Education (Electronics Technology)', 'BTTE-ElectoTech', '0', '4', '1', null, '0000-00-00 00:00:00', '2018-02-09 15:30:48');
INSERT INTO `degrees` VALUES ('94', '8', 'Bachelor of Technical Teacher Education (Food and Service Management)', 'BTTE-FSM', '0', '4', '1', null, '0000-00-00 00:00:00', '2016-09-23 14:55:18');
INSERT INTO `degrees` VALUES ('95', '8', 'Bachelor of Technical Teacher Education (Automotive Technology)', 'BTTE-AT', '0', '4', '1', null, '0000-00-00 00:00:00', '2016-09-23 14:55:22');
INSERT INTO `degrees` VALUES ('96', '8', '-----', '-----', '0', '4', '0', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `degrees` VALUES ('97', '3', 'BS in Fisheries Major in Aquaculture', 'BSF-Aqua', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:30:57');
INSERT INTO `degrees` VALUES ('98', '3', 'BS in Fisheries Major in Marine Fisheries', 'BSF-MF', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:30:58');
INSERT INTO `degrees` VALUES ('99', '3', 'BS in Fisheries Major in Fish Processing', 'BSF-FP', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:30:58');
INSERT INTO `degrees` VALUES ('100', '2', 'Bachelor of Agriculture Tech. Major in Animal Production', 'BAgriT-AP', '0', '4', '0', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `degrees` VALUES ('101', '2', 'Bachelor of Agriculture Tech. Major in Crop Production', 'BAgriT-CP', '0', '4', '0', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `degrees` VALUES ('102', '2', 'BS in Agri Business', 'BSAB', '0', '4', '1', null, '0000-00-00 00:00:00', '2016-09-23 14:52:48');
INSERT INTO `degrees` VALUES ('103', '9', 'Bachelor in Elementary Education (SpEd)', 'BEEd (SpEd)', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:31:07');
INSERT INTO `degrees` VALUES ('104', '9', 'Bachelor in Elementary Education (Pre-School Ed)', 'BEEd (PSEd)', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:31:07');
INSERT INTO `degrees` VALUES ('105', '9', 'Bachelor in Elementary Education (Generalist)', 'BEEd (Gen)', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:31:09');
INSERT INTO `degrees` VALUES ('106', '8', 'BS in Industrial Technology (Ref AC Technology)', 'BSIT (RACT)', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:31:10');
INSERT INTO `degrees` VALUES ('108', '2', 'BS in Agriculture (Agricultural Ext)', 'BSA-AG EXT', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:31:12');
INSERT INTO `degrees` VALUES ('109', '2', 'BS in Agriculture (Animal Science)', 'BSA-AS', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:31:12');
INSERT INTO `degrees` VALUES ('110', '2', 'BS in Agriculture (Horticulture)', 'BSA-HORT', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:31:13');
INSERT INTO `degrees` VALUES ('111', '2', 'BS in Agriculture (Agronomy)', 'BSA-AGRO', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:31:13');
INSERT INTO `degrees` VALUES ('112', '2', 'BS in Agriculture (Soil Science)', 'BSA-SS', '0', '4', '1', '1', '0000-00-00 00:00:00', '2018-02-09 15:31:14');
INSERT INTO `degrees` VALUES ('113', '2', 'BS in Agriculture (Crop Protection)', 'BSA-CP', '0', '0', '0', null, null, '2016-09-28 08:58:49');
INSERT INTO `degrees` VALUES ('114', '11', 'Doctor of Medicine', 'MD', '0', '4', '1', null, null, null);
INSERT INTO `degrees` VALUES ('115', '8', 'BS in Industrial Technology (Ceramics Technology)', 'BSIT-CERT', '0', '4', '1', null, null, '2016-09-28 14:24:47');
INSERT INTO `degrees` VALUES ('116', '8', 'BS in Industrial Technology (Electornics and Comm Tech)', 'BSIT-ECT', '0', '4', '1', '1', null, '2018-02-09 15:31:27');
INSERT INTO `degrees` VALUES ('117', '8', 'BS in Industrial Technology (Drafting Technology)', 'BSIT-Drafting', '0', '4', '1', '1', null, '2018-02-09 15:31:31');
INSERT INTO `degrees` VALUES ('118', '8', 'Bachelor of Technical Teacher Education (Electrical Technology)', 'BTTE-ELEC', '0', '4', '1', '1', null, '2018-02-09 15:31:32');
INSERT INTO `degrees` VALUES ('119', '9', 'Professional Education', 'ProfEd', '0', '4', '1', null, null, '2016-12-07 09:35:56');
INSERT INTO `degrees` VALUES ('120', '9', 'TCP', 'TCP', '0', '5', '1', null, null, '2016-12-07 09:35:58');
INSERT INTO `degrees` VALUES ('121', '2', 'BS in Food Technology', 'BSFT', '0', '4', '1', null, null, null);
INSERT INTO `degrees` VALUES ('122', '1', 'Doctor of Education Major in Educational Management', 'EdD (Educ Mgt)', '2', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:57:21');
INSERT INTO `degrees` VALUES ('123', '1', 'Doctor of Philosophy in Linguistics (Specialization:Applied Linguistics)', 'PhD (Lingustics)', '2', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:57:22');
INSERT INTO `degrees` VALUES ('124', '1', 'Master in Science Major in Rural Development', 'MSRD', '1', '2', '1', null, null, '2017-07-27 13:57:24');
INSERT INTO `degrees` VALUES ('125', '1', 'Master in Information Technology', 'MIT', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:57:25');
INSERT INTO `degrees` VALUES ('126', '1', 'Master in Management Major in Strategic Management', 'MM (SM)', '1', '2', '1', null, null, '2017-07-27 13:57:26');
INSERT INTO `degrees` VALUES ('127', '1', 'Master in Management Major in Financial Management', 'MM (FM)', '1', '2', '1', null, null, '2017-07-27 13:57:28');
INSERT INTO `degrees` VALUES ('128', '1', 'Master of Arts in English and Literature', 'MA (Engl)', '1', '2', '1', null, null, '2017-07-27 13:57:29');
INSERT INTO `degrees` VALUES ('129', '1', 'Master of Arts in Mathematics', 'MA (Math)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:57:30');
INSERT INTO `degrees` VALUES ('130', '1', 'Master of Arts in Public Administration', 'MAPA', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:57:30');
INSERT INTO `degrees` VALUES ('131', '1', 'Master of Arts in Education Major in Biology', 'MAEd (Bio)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:57:31');
INSERT INTO `degrees` VALUES ('132', '1', 'Master of Arts in Education Major in Chemistry', 'MAEd (Chem)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:57:33');
INSERT INTO `degrees` VALUES ('133', '1', 'Master of Arts in Education Major in  Educational Management', 'MAEd (EdMgt)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:57:38');
INSERT INTO `degrees` VALUES ('134', '1', 'Master of Arts in Education Major in  Ilokano Studies', 'MAEd (IS)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:57:40');
INSERT INTO `degrees` VALUES ('135', '1', 'Master of Arts in Education Major in Language and Literature', 'MAEd (LL)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:57:40');
INSERT INTO `degrees` VALUES ('136', '1', 'Master of Arts in Education Major in Guidance Counseling', 'MAEd (GC)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:57:41');
INSERT INTO `degrees` VALUES ('137', '1', 'Master of Arts in Education Major in Mathematics', 'MAEd (Math)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:57:42');
INSERT INTO `degrees` VALUES ('138', '1', 'Master of Arts in Education Major in Physics', 'MAEd (Phys)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:57:43');
INSERT INTO `degrees` VALUES ('139', '1', 'Master of Arts in Education Major in Science Education', 'MAEd (SocSt)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:57:43');
INSERT INTO `degrees` VALUES ('140', '1', 'Master of Science in Engineering Major in Soil and Water Resources Engineering', 'MSE (SWRE)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:57:45');
INSERT INTO `degrees` VALUES ('141', '1', 'Master of Science in Engineering Major in Agricultural Engineering', 'MSE (AgEng)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:57:49');
INSERT INTO `degrees` VALUES ('142', '1', 'Master of Education Major in Early Childhood Education', 'MEd (EarlyCE)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:57:47');
INSERT INTO `degrees` VALUES ('143', '1', 'Master of Education Major in Wika at Panitikan', 'MEd (Wika)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:57:50');
INSERT INTO `degrees` VALUES ('144', '1', 'Master of Education Major in Library and Information Management', 'MEd (LIM)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:57:51');
INSERT INTO `degrees` VALUES ('145', '1', 'Master of Education Major in MSEPP / MSEPPK / PEHM', 'MEd (MSEP)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:57:52');
INSERT INTO `degrees` VALUES ('146', '1', 'Master of Education Major in Social Studies', 'MEd (SocSt)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:57:53');
INSERT INTO `degrees` VALUES ('147', '1', 'Master of Education Major in Technical-Vocational Education', 'MEd (TVS)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-29 11:34:44');
INSERT INTO `degrees` VALUES ('148', '1', 'Master of Education Major in Special Education', 'MEd (SpEd)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:57:56');
INSERT INTO `degrees` VALUES ('149', '1', 'Master of Education Major in Technology and Home Economics', 'MEd (THE)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:57:57');
INSERT INTO `degrees` VALUES ('150', '1', 'Master of Education Major in Technician Education', 'MEd (TechEd)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:57:58');
INSERT INTO `degrees` VALUES ('151', '1', 'Master of Arts in Nursing Major in Medical and Surgical Nursing', 'MAN (MSN)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:57:59');
INSERT INTO `degrees` VALUES ('152', '1', 'Master of Arts in Nursing Major in Maternal and Child Health Nursing', 'MAN (MCHN)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:57:59');
INSERT INTO `degrees` VALUES ('153', '1', 'Master of Nursing Major in Medical and Surgical Nursing', 'MN (MSN)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:58:00');
INSERT INTO `degrees` VALUES ('154', '1', 'Master of Nursing Major in Maternal and Child Health Nursing', 'MN (MCHN)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:58:01');
INSERT INTO `degrees` VALUES ('155', '1', 'Master of Science in Biology', 'MSBio', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:58:02');
INSERT INTO `degrees` VALUES ('156', '1', 'Master of Science in Mathematics', 'MSMath', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:58:03');
INSERT INTO `degrees` VALUES ('157', '1', 'Master of Science in Crop Science', 'MSCrpS', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:58:04');
INSERT INTO `degrees` VALUES ('158', '1', 'Master of Science in Animal Science', 'MSAS', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:58:09');
INSERT INTO `degrees` VALUES ('159', '1', 'Master of Agriculture Major in Crop Science', 'MAgri (CS)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:58:11');
INSERT INTO `degrees` VALUES ('160', '1', 'Master of Agriculture Major in Animal Science', 'MAgri (AS)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:58:12');
INSERT INTO `degrees` VALUES ('161', '1', 'Professional Science Masters (Renewable Energy Engineering)', 'ProdSM', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:58:13');
INSERT INTO `degrees` VALUES ('162', '1', 'Master of Arts in Education Major in Early Childhood Education', 'MAEd (EarlyCE)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:58:13');
INSERT INTO `degrees` VALUES ('163', '1', 'Master of Arts in Education Major in Wika at Panitikan', 'MAEd (Wika)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:58:14');
INSERT INTO `degrees` VALUES ('164', '1', 'Master of Arts in Education Major in Library and Information Management', 'MAEd (LIM)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:58:17');
INSERT INTO `degrees` VALUES ('165', '1', 'Master of Arts in Education Major in MSEPP / MSEPPK / PEHM', 'MAEd (MSEPP)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:58:17');
INSERT INTO `degrees` VALUES ('166', '1', 'Master of Arts in Education Major in Social Studies', 'MAEd (SocSt)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:58:18');
INSERT INTO `degrees` VALUES ('167', '1', 'Master of Arts in Education Major in Technical-Vocational School', 'MAEd (TVS)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:58:19');
INSERT INTO `degrees` VALUES ('168', '1', 'Master of Arts in Education Major in Special Education', 'MAEd (SpEd)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:58:20');
INSERT INTO `degrees` VALUES ('169', '1', 'Master of Arts in Education Major in Technology and Home Economics', 'MAEd (THE)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:58:21');
INSERT INTO `degrees` VALUES ('170', '1', 'Master of Arts in Education Major in Technician Education', 'MAEd (TechEd)', '1', '2', '1', '0', '2017-07-18 14:39:55', '2017-07-27 13:58:22');
INSERT INTO `degrees` VALUES ('171', '1', 'Master of Science in Agricultue Major in Crop Science', 'MSA-CrpS', '1', '2', '1', null, null, '2017-07-27 13:58:23');
INSERT INTO `degrees` VALUES ('172', '1', 'Master of Science in Agricultue Major in Animal Science', 'MSA-AS', '1', '2', '1', null, null, '2017-07-27 13:58:24');
INSERT INTO `degrees` VALUES ('173', '1', 'Master in Animal Science', 'MAS', '1', '2', '1', null, null, '2017-07-27 13:58:24');
INSERT INTO `degrees` VALUES ('174', '1', 'Master in Crop Science', 'MCrpS', '1', '2', '1', null, null, '2017-07-27 13:58:25');
