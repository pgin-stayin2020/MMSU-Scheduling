/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50505
Source Host           : 192.168.56.101:3306
Source Database       : dbiusis16

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-02-15 16:11:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `curricula`
-- ----------------------------
DROP TABLE IF EXISTS `curricula`;
CREATE TABLE `curricula` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `degree_id` int(10) unsigned NOT NULL,
  `major_id` mediumint(9) NOT NULL,
  `minor_id` mediumint(9) NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cy_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `curricula_degree_id_foreign` (`degree_id`),
  KEY `curricula_cy_id_foreign` (`cy_id`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of curricula
-- ----------------------------
INSERT INTO `curricula` VALUES ('1', '21', '0', '0', 'EE Batch 2000', '11', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('6', '21', '0', '0', 'EE Batch 2002', '13', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('7', '21', '0', '0', 'For Batch 2005', '16', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('8', '24', '0', '0', 'For Batch 2000 CerE', '18', '0000-00-00 00:00:00', '2016-09-29 06:01:25');
INSERT INTO `curricula` VALUES ('9', '26', '0', '0', '2005 Curriculum', '16', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('12', '13', '0', '0', '2007 Curriculum', '18', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('13', '8', '0', '0', 'BSCS Curriculum', '22', '0000-00-00 00:00:00', '2017-01-05 06:01:35');
INSERT INTO `curricula` VALUES ('14', '25', '0', '0', 'BSCoE Curriculum', '14', '0000-00-00 00:00:00', '2016-11-28 05:12:46');
INSERT INTO `curricula` VALUES ('15', '58', '0', '0', '2012 BSAT Curriculum', '22', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('16', '4', '0', '0', 'BSDC 2013 Curriculum', '22', '0000-00-00 00:00:00', '2016-11-24 02:40:21');
INSERT INTO `curricula` VALUES ('17', '59', '0', '0', 'For ABEL', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('18', '12', '0', '0', 'For ABES (CA)', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('19', '11', '0', '0', 'For AB Sociology', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('20', '9', '0', '0', 'New BS Bio Curriculum', '24', '0000-00-00 00:00:00', '2016-11-24 03:03:47');
INSERT INTO `curricula` VALUES ('21', '54', '0', '0', 'For BS Chem', '22', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('22', '7', '0', '0', 'For BS Math', '18', '0000-00-00 00:00:00', '2016-11-24 02:05:12');
INSERT INTO `curricula` VALUES ('23', '61', '0', '0', '2011 Curriculum', '21', '0000-00-00 00:00:00', '2017-01-10 00:16:52');
INSERT INTO `curricula` VALUES ('24', '60', '0', '0', 'For BS Entrep', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('25', '63', '0', '0', 'For BSHM', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('26', '15', '0', '0', 'For 2011-2012', '21', '0000-00-00 00:00:00', '2017-01-06 00:29:58');
INSERT INTO `curricula` VALUES ('27', '17', '0', '0', 'For 2011-2012', '21', '0000-00-00 00:00:00', '2017-01-09 03:04:45');
INSERT INTO `curricula` VALUES ('28', '14', '0', '0', 'For BS Econ', '23', '0000-00-00 00:00:00', '2016-11-24 02:30:16');
INSERT INTO `curricula` VALUES ('29', '62', '0', '0', 'For BSTM', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('30', '23', '0', '0', 'For ChemE', '18', '0000-00-00 00:00:00', '2016-11-24 01:42:23');
INSERT INTO `curricula` VALUES ('31', '20', '0', '0', 'For BSCE-2008', '18', '0000-00-00 00:00:00', '2016-09-26 07:17:50');
INSERT INTO `curricula` VALUES ('32', '22', '0', '0', 'For BSME-2008', '18', '0000-00-00 00:00:00', '2016-09-26 07:26:10');
INSERT INTO `curricula` VALUES ('33', '52', '0', '0', 'For AHT', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('34', '53', '0', '0', 'For ATH', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('36', '16', '0', '0', 'For BSAgriTEch', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('37', '1', '0', '0', 'BSA new curriculum', '25', '0000-00-00 00:00:00', '2016-11-24 02:07:55');
INSERT INTO `curricula` VALUES ('38', '10', '0', '0', 'For 2011-2012', '21', '0000-00-00 00:00:00', '2017-01-06 06:54:35');
INSERT INTO `curricula` VALUES ('39', '3', '0', '0', 'For BSF', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('40', '5', '0', '0', 'For BSHT', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('41', '49', '0', '0', 'For DAT', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('42', '50', '0', '0', 'For Forest Ranger', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('43', '51', '0', '0', 'For Tech Homemaking', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('44', '2', '0', '0', 'For AgEng', '18', '0000-00-00 00:00:00', '2016-09-26 07:24:02');
INSERT INTO `curricula` VALUES ('45', '28', '0', '0', 'For BSN', '11', '0000-00-00 00:00:00', '2016-11-24 02:40:02');
INSERT INTO `curricula` VALUES ('46', '30', '0', '0', 'FOR 2010-2011', '20', '0000-00-00 00:00:00', '2017-01-05 07:57:27');
INSERT INTO `curricula` VALUES ('47', '29', '0', '0', 'For 2011-2012', '21', '0000-00-00 00:00:00', '2017-01-05 07:29:21');
INSERT INTO `curricula` VALUES ('48', '27', '0', '0', 'BSF 3rd and 4th year', '20', '0000-00-00 00:00:00', '2016-11-11 00:44:17');
INSERT INTO `curricula` VALUES ('49', '6', '0', '0', 'For BS Marine Bio', '17', '0000-00-00 00:00:00', '2016-09-27 05:05:50');
INSERT INTO `curricula` VALUES ('50', '64', '0', '0', 'For BAT', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('51', '65', '0', '0', 'For BTTE', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('52', '31', '0', '0', 'For BSIE', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('53', '32', '0', '0', 'For BSIT', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('54', '57', '0', '0', 'For Cert of Tech', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('55', '55', '0', '0', 'For Diploma of Tech', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('56', '56', '0', '0', 'For GRCO', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('57', '19', '0', '0', 'For BEEd', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('58', '18', '0', '0', 'For 2009-2010', '19', '0000-00-00 00:00:00', '2017-01-04 06:25:14');
INSERT INTO `curricula` VALUES ('59', '47', '0', '0', 'For Short Term Program', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('60', '66', '0', '0', 'For 2009-2010', '19', '0000-00-00 00:00:00', '2017-01-04 06:34:36');
INSERT INTO `curricula` VALUES ('61', '67', '0', '0', 'For 2009-2010', '19', '0000-00-00 00:00:00', '2017-01-05 00:30:47');
INSERT INTO `curricula` VALUES ('62', '68', '0', '0', 'For 2009-2010', '19', '0000-00-00 00:00:00', '2017-01-04 07:14:54');
INSERT INTO `curricula` VALUES ('63', '69', '0', '0', 'For 2009-2010', '19', '0000-00-00 00:00:00', '2017-01-04 07:13:07');
INSERT INTO `curricula` VALUES ('64', '70', '0', '0', 'For 2009-2010', '19', '0000-00-00 00:00:00', '2017-01-04 06:27:33');
INSERT INTO `curricula` VALUES ('65', '71', '0', '0', 'For 2009-2010', '19', '0000-00-00 00:00:00', '2017-01-04 05:58:25');
INSERT INTO `curricula` VALUES ('66', '72', '0', '0', 'FOR 2010-2011', '20', '0000-00-00 00:00:00', '2017-01-04 06:31:17');
INSERT INTO `curricula` VALUES ('67', '13', '0', '0', '2013 Curriculum', '23', '0000-00-00 00:00:00', '2016-11-24 02:30:00');
INSERT INTO `curricula` VALUES ('68', '58', '0', '0', '2013 Curriculum', '23', '0000-00-00 00:00:00', '2016-11-24 02:29:18');
INSERT INTO `curricula` VALUES ('69', '60', '0', '0', '2013 Curriculum', '23', '0000-00-00 00:00:00', '2016-11-24 01:59:14');
INSERT INTO `curricula` VALUES ('70', '61', '0', '0', '2013 Curriculum', '23', '0000-00-00 00:00:00', '2016-11-24 02:29:14');
INSERT INTO `curricula` VALUES ('71', '15', '0', '0', 'for 2014-2015', '24', '0000-00-00 00:00:00', '2017-01-06 00:29:48');
INSERT INTO `curricula` VALUES ('72', '81', '0', '0', '2013 Curriculum', '24', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('73', '82', '0', '0', '2013 Curriculum', '24', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('74', '83', '0', '0', '2014 Curriculum', '23', '0000-00-00 00:00:00', '2016-11-24 04:08:33');
INSERT INTO `curricula` VALUES ('75', '90', '0', '0', 'BTTE-Garments', '22', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('76', '91', '0', '0', 'BTTE-Drafting', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('77', '92', '0', '0', 'BTTE-Comp Tech', '21', '0000-00-00 00:00:00', '2016-09-28 01:23:12');
INSERT INTO `curricula` VALUES ('78', '93', '0', '0', 'BTTE-Electronics', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('79', '94', '0', '0', 'BTTE-FSM', '21', '0000-00-00 00:00:00', '2016-12-13 01:24:59');
INSERT INTO `curricula` VALUES ('80', '87', '0', '0', 'BSIT-CivilTech', '24', '0000-00-00 00:00:00', '2016-09-23 08:20:53');
INSERT INTO `curricula` VALUES ('81', '84', '0', '0', 'BSIT-CompTech', '18', '0000-00-00 00:00:00', '2016-09-28 03:02:25');
INSERT INTO `curricula` VALUES ('82', '85', '0', '0', 'BSIT-GT', '24', '0000-00-00 00:00:00', '2016-09-23 08:35:51');
INSERT INTO `curricula` VALUES ('83', '86', '0', '0', 'BSIT-FoodTech', '14', '0000-00-00 00:00:00', '2016-09-28 02:21:57');
INSERT INTO `curricula` VALUES ('84', '88', '0', '0', 'BSIT-Electrical', '14', '0000-00-00 00:00:00', '2016-12-09 01:58:47');
INSERT INTO `curricula` VALUES ('85', '89', '0', '0', 'BSIT-Electronics', '14', '0000-00-00 00:00:00', '2016-09-28 02:08:44');
INSERT INTO `curricula` VALUES ('86', '95', '0', '0', 'BTTE-AT', '21', '0000-00-00 00:00:00', '2016-12-09 02:50:31');
INSERT INTO `curricula` VALUES ('87', '102', '0', '0', 'BS Agribusiness', '25', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('88', '4', '0', '0', 'BSDC 2015 Curriculum', '25', '2016-09-23 07:31:36', '2016-11-24 02:39:59');
INSERT INTO `curricula` VALUES ('89', '87', '0', '0', 'Civil Tech Curriculum', '14', '2016-09-23 08:21:23', '2016-09-23 08:21:23');
INSERT INTO `curricula` VALUES ('90', '85', '0', '0', 'BSIT Garments technology', '14', '2016-09-23 08:36:16', '2016-09-23 08:36:16');
INSERT INTO `curricula` VALUES ('91', '106', '0', '0', 'BSIT Ref & AirCon Technology', '14', '2016-09-23 08:43:14', '2016-09-23 08:43:14');
INSERT INTO `curricula` VALUES ('92', '103', '0', '0', 'FOR 2010-2011', '20', '2016-09-26 00:51:02', '2017-01-05 00:18:16');
INSERT INTO `curricula` VALUES ('93', '104', '0', '0', 'FOR 2010-2011', '20', '2016-09-26 02:58:31', '2017-01-05 00:08:08');
INSERT INTO `curricula` VALUES ('94', '105', '0', '0', 'BEEd-Gen 2012-2013', '22', '2016-09-26 03:15:13', '2017-01-04 12:59:33');
INSERT INTO `curricula` VALUES ('95', '108', '0', '0', 'bsa-agricultural extension', '25', '2016-09-26 03:27:43', '2016-09-26 03:27:43');
INSERT INTO `curricula` VALUES ('96', '109', '0', '0', 'bsa-animal science', '25', '2016-09-26 03:36:49', '2016-09-26 03:36:49');
INSERT INTO `curricula` VALUES ('97', '110', '0', '0', 'bsa-horticulture', '25', '2016-09-26 03:44:35', '2016-09-26 03:44:35');
INSERT INTO `curricula` VALUES ('98', '111', '0', '0', 'bsa-agronomy', '25', '2016-09-26 05:01:06', '2016-09-26 05:01:06');
INSERT INTO `curricula` VALUES ('99', '112', '0', '0', 'bsa-soil science', '25', '2016-09-26 05:07:31', '2016-09-26 05:07:31');
INSERT INTO `curricula` VALUES ('100', '21', '0', '0', 'BSEE', '18', '2016-09-26 06:39:49', '2016-09-26 06:39:49');
INSERT INTO `curricula` VALUES ('101', '26', '0', '0', 'BS in Electronics and Comm Eng-2008', '18', '2016-09-26 08:20:57', '2016-09-26 08:21:11');
INSERT INTO `curricula` VALUES ('102', '25', '0', '0', 'BS Computer Engineering-2008', '18', '2016-09-26 08:29:12', '2016-09-26 08:29:22');
INSERT INTO `curricula` VALUES ('103', '48', '0', '0', 'BAT', '21', '2016-09-28 06:12:43', '2016-09-29 03:29:44');
INSERT INTO `curricula` VALUES ('104', '117', '0', '0', 'Drafting Tech.', '22', '2016-09-29 02:26:53', '2016-12-20 03:56:47');
INSERT INTO `curricula` VALUES ('105', '118', '0', '0', 'BTTE-Electrical Tech', '21', '2016-09-30 03:26:16', '2016-09-30 03:26:16');
INSERT INTO `curricula` VALUES ('106', '27', '0', '0', 'BSF 2nd year', '25', '2016-10-24 02:54:53', '2016-11-11 00:44:44');
INSERT INTO `curricula` VALUES ('107', '27', '0', '0', 'BSF 2016-2017', '26', '2016-11-10 06:28:14', '2016-11-10 06:28:14');
INSERT INTO `curricula` VALUES ('109', '105', '0', '0', 'BEEd-Gen 2015-2016', '25', '2016-11-23 01:11:31', '2017-01-04 13:00:08');
INSERT INTO `curricula` VALUES ('110', '104', '0', '0', 'For 2015-2016', '25', '2016-11-23 01:30:46', '2017-01-05 00:07:57');
INSERT INTO `curricula` VALUES ('111', '103', '0', '0', 'For 2015-2016', '25', '2016-11-23 01:38:07', '2017-01-05 00:17:42');
INSERT INTO `curricula` VALUES ('112', '18', '0', '0', 'For 2015-2016', '25', '2016-11-23 01:46:35', '2017-01-04 06:25:04');
INSERT INTO `curricula` VALUES ('113', '66', '0', '0', 'For 2015-2016', '25', '2016-11-23 02:01:38', '2017-01-04 06:34:29');
INSERT INTO `curricula` VALUES ('114', '67', '0', '0', 'For 2015-2016', '25', '2016-11-23 02:17:42', '2017-01-05 00:30:39');
INSERT INTO `curricula` VALUES ('115', '71', '0', '0', 'For 2015-2016', '25', '2016-11-23 02:32:39', '2017-01-04 05:58:01');
INSERT INTO `curricula` VALUES ('116', '72', '0', '0', 'For 2015-2016', '25', '2016-11-23 02:49:28', '2017-01-04 06:31:06');
INSERT INTO `curricula` VALUES ('117', '68', '0', '0', 'For 2015-2016', '25', '2016-11-23 03:03:07', '2017-01-04 07:14:46');
INSERT INTO `curricula` VALUES ('118', '69', '0', '0', 'For 2015-2016', '25', '2016-11-23 03:12:50', '2017-01-04 07:12:44');
INSERT INTO `curricula` VALUES ('119', '70', '0', '0', 'For 2015-2016', '25', '2016-11-23 03:25:58', '2017-01-04 06:27:25');
INSERT INTO `curricula` VALUES ('120', '9', '0', '0', 'old BS Bio curriculum', '16', '2016-11-24 02:03:10', '2016-11-24 03:04:32');
INSERT INTO `curricula` VALUES ('121', '1', '0', '0', 'BSA old curriculum', '23', '2016-11-24 02:06:59', '2016-11-24 02:06:59');
INSERT INTO `curricula` VALUES ('122', '28', '0', '0', 'BSN Curriculum Compliant to CMO. 14, s. 2009', '19', '2016-11-24 02:19:11', '2016-12-09 04:39:42');
INSERT INTO `curricula` VALUES ('123', '83', '0', '0', 'Effective First Semester 2015-2016', '25', '2016-11-24 04:09:26', '2016-11-24 04:09:26');
INSERT INTO `curricula` VALUES ('124', '10', '0', '0', 'For 2016-2017', '26', '2016-11-24 05:41:35', '2017-01-06 06:56:01');
INSERT INTO `curricula` VALUES ('125', '19', '0', '0', 'SPED', '20', '2016-11-25 04:52:38', '2016-11-25 04:52:38');
INSERT INTO `curricula` VALUES ('126', '19', '0', '0', 'BEEd PSED', '1', '2016-11-25 05:05:48', '2016-11-25 05:05:48');
INSERT INTO `curricula` VALUES ('127', '17', '0', '0', 'For 2015-2016', '25', '2016-12-06 01:34:28', '2017-01-09 03:04:26');
INSERT INTO `curricula` VALUES ('128', '119', '0', '0', 'Professional Education', '22', '2016-12-07 01:09:09', '2016-12-07 01:09:09');
INSERT INTO `curricula` VALUES ('129', '120', '0', '0', 'TCP 1st Sem', '22', '2016-12-07 01:24:51', '2016-12-07 01:24:51');
INSERT INTO `curricula` VALUES ('130', '116', '0', '0', 'BSIT-ECT', '14', '2016-12-09 02:13:02', '2016-12-09 02:13:02');
INSERT INTO `curricula` VALUES ('131', '117', '0', '0', 'BTTE-Drafting Tech.', '21', '2016-12-13 00:23:18', '2016-12-13 00:23:18');
INSERT INTO `curricula` VALUES ('132', '115', '0', '0', 'BSIT-CERT', '18', '2016-12-15 05:53:08', '2016-12-15 05:53:08');
INSERT INTO `curricula` VALUES ('133', '2', '0', '0', 'AE Curriculum', '18', '2016-12-18 21:16:00', '2016-12-18 21:16:00');
INSERT INTO `curricula` VALUES ('134', '110', '0', '0', 'BSA-Horticulture(2013-2014)', '23', '2016-12-20 01:58:48', '2016-12-21 22:04:50');
INSERT INTO `curricula` VALUES ('135', '74', '0', '0', 'For 2015-2016', '25', '2016-12-20 03:25:57', '2017-01-03 08:18:39');
INSERT INTO `curricula` VALUES ('136', '112', '0', '0', 'BSA-Soil Science(2013-2014)', '23', '2016-12-20 05:50:58', '2016-12-21 06:14:57');
INSERT INTO `curricula` VALUES ('137', '109', '0', '0', 'BSA-Animal Science (2013-2014)', '23', '2016-12-20 06:22:24', '2016-12-22 00:44:44');
INSERT INTO `curricula` VALUES ('138', '111', '0', '0', 'BSA-Agronomy (2013-2014)', '23', '2016-12-20 07:09:05', '2016-12-22 01:02:05');
INSERT INTO `curricula` VALUES ('139', '108', '0', '0', 'BSA-AGEXT(2013-2014)', '23', '2016-12-21 00:16:34', '2016-12-21 05:03:09');
INSERT INTO `curricula` VALUES ('140', '110', '0', '0', 'BSA-HORT(2015-2016)', '25', '2016-12-21 03:21:23', '2016-12-21 03:53:56');
INSERT INTO `curricula` VALUES ('141', '108', '0', '0', 'BSA-AGEXT(2015-2016)', '25', '2016-12-21 05:03:28', '2016-12-21 05:03:38');
INSERT INTO `curricula` VALUES ('142', '112', '0', '0', 'BSA-Soil Science(2015-2016)', '25', '2016-12-21 06:15:24', '2016-12-21 06:15:24');
INSERT INTO `curricula` VALUES ('143', '109', '0', '0', 'BSA-Animal Science (2015-2016)', '25', '2016-12-22 00:45:26', '2016-12-22 00:45:26');
INSERT INTO `curricula` VALUES ('144', '111', '0', '0', 'BSA-Agronomy (2015-2016)', '25', '2016-12-22 01:45:24', '2016-12-22 01:45:24');
INSERT INTO `curricula` VALUES ('145', '10', '0', '0', 'New Curriculum(2016-2017)', '26', '2016-12-27 03:14:52', '2016-12-27 03:14:52');
INSERT INTO `curricula` VALUES ('146', '74', '0', '0', 'For 2012-2013', '22', '2017-01-03 08:18:56', '2017-01-03 08:18:56');
INSERT INTO `curricula` VALUES ('147', '29', '0', '0', 'For 2015-2016', '25', '2017-01-09 06:21:45', '2017-01-09 06:22:14');
INSERT INTO `curricula` VALUES ('148', '114', '0', '0', 'For Medicine', '25', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('149', '4', '0', '0', '2015 Curriculum for Incoming 3rd Year SY 2017-2018', '27', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curricula` VALUES ('151', '122', '0', '0', 'EdD Educational Management', '20', '2017-07-18 06:44:59', '2017-07-18 06:44:59');
INSERT INTO `curricula` VALUES ('152', '131', '0', '0', 'FOR MAED MAJOR IN BIOLOGY', '27', '2017-07-18 06:54:39', '2017-07-18 06:54:39');
INSERT INTO `curricula` VALUES ('153', '132', '0', '0', 'for MAEd Major in Chemistry', '27', '2017-07-18 07:32:34', '2017-07-18 07:32:34');
INSERT INTO `curricula` VALUES ('154', '162', '0', '0', 'for MAEd MoE Major in Early Childhood Education', '27', '2017-07-18 07:51:04', '2017-07-18 07:51:04');
INSERT INTO `curricula` VALUES ('155', '133', '0', '0', 'for MAEd Major in Educational Management', '27', '2017-07-18 08:04:47', '2017-07-18 08:04:47');
INSERT INTO `curricula` VALUES ('156', '134', '0', '0', 'for MAEd Major in Ilokano studies', '27', '2017-07-18 08:12:47', '2017-07-18 08:12:47');
INSERT INTO `curricula` VALUES ('157', '142', '0', '0', 'for MEd Major in Early Childhood Education', '27', '2017-07-18 08:30:59', '2017-07-18 08:30:59');
INSERT INTO `curricula` VALUES ('158', '135', '0', '0', 'for MAEd Major in Language and Literature', '27', '2017-07-19 01:04:31', '2017-07-19 01:04:31');
INSERT INTO `curricula` VALUES ('159', '121', '0', '0', 'for Food Tech 2016-2017', '26', '2017-07-19 01:45:34', '2017-07-19 01:45:34');
INSERT INTO `curricula` VALUES ('160', '163', '0', '0', 'MAEd Major in Wika at Panitikan', '27', '2017-07-19 02:40:42', '2017-07-19 02:40:42');
INSERT INTO `curricula` VALUES ('161', '143', '0', '0', 'for MEd Major in Wika at Panitikan', '27', '2017-07-19 02:41:18', '2017-07-19 02:41:18');
INSERT INTO `curricula` VALUES ('162', '136', '0', '0', 'for MAEd Major in Guidance and Counseling (NEW)', '27', '2017-07-19 03:21:51', '2017-07-19 03:21:51');
INSERT INTO `curricula` VALUES ('163', '136', '0', '0', 'for MAEd Major in Guidance and Counseling (OLD)', '27', '2017-07-19 03:33:42', '2017-07-19 03:33:42');
INSERT INTO `curricula` VALUES ('164', '164', '0', '0', 'for MAED Major in Library and Information Management', '27', '2017-07-19 08:18:32', '2017-07-19 08:18:32');
INSERT INTO `curricula` VALUES ('165', '144', '0', '0', 'for MEd Major in Library and Information Management', '27', '2017-07-19 08:23:35', '2017-07-19 08:23:35');
INSERT INTO `curricula` VALUES ('166', '137', '0', '0', 'for MAEd Major in Mathematics (New)', '27', '2017-07-20 00:59:39', '2017-07-20 00:59:39');
INSERT INTO `curricula` VALUES ('167', '137', '0', '0', 'for MAEd Major in Mathematics (OLD)', '27', '2017-07-20 01:21:58', '2017-07-20 01:21:58');
INSERT INTO `curricula` VALUES ('168', '165', '0', '0', 'for MAEd Major in MSEPP/MSEPK/PEHM', '27', '2017-07-20 01:48:19', '2017-07-20 01:48:19');
INSERT INTO `curricula` VALUES ('169', '165', '0', '0', 'for MEd Major in MSEPP/MSEPK/PEHM', '27', '2017-07-20 02:17:54', '2017-07-20 02:17:54');
INSERT INTO `curricula` VALUES ('170', '138', '0', '0', 'for MAEd Major in Physics', '27', '2017-07-20 02:30:24', '2017-07-20 02:30:24');
INSERT INTO `curricula` VALUES ('171', '139', '0', '0', 'for MAEd Major in Science Education', '27', '2017-07-20 02:47:05', '2017-07-20 02:47:05');
INSERT INTO `curricula` VALUES ('172', '166', '0', '0', 'for MAEd Major i Social Studies', '27', '2017-07-20 03:03:48', '2017-07-20 03:03:48');
INSERT INTO `curricula` VALUES ('173', '146', '0', '0', 'for MEd Major in Social Studies', '27', '2017-07-20 03:13:23', '2017-07-20 03:13:23');
INSERT INTO `curricula` VALUES ('174', '167', '0', '0', 'for MAEd Major in Technical-Vocational Education', '27', '2017-07-20 03:16:54', '2017-07-20 03:16:54');
INSERT INTO `curricula` VALUES ('175', '147', '0', '0', 'for MEd Major in Technical-Vocational Education', '27', '2017-07-20 03:32:21', '2017-07-20 03:32:21');
INSERT INTO `curricula` VALUES ('176', '168', '0', '0', 'for MAEd Major in Special Education', '27', '2017-07-20 03:49:47', '2017-07-20 03:49:47');
INSERT INTO `curricula` VALUES ('177', '148', '0', '0', 'for MEd Major in Special Education', '27', '2017-07-20 05:57:24', '2017-07-20 05:57:24');
INSERT INTO `curricula` VALUES ('178', '169', '0', '0', 'for MAEd Major in Technology and Home Economics', '27', '2017-07-20 05:59:30', '2017-07-20 05:59:30');
INSERT INTO `curricula` VALUES ('179', '149', '0', '0', 'for MEd Major in Technology and Home Economics', '27', '2017-07-20 06:12:08', '2017-07-20 06:12:08');
INSERT INTO `curricula` VALUES ('180', '123', '0', '0', 'for Doctor of Philosophy in Linguistics(Specialization: Applied Linguistics)', '27', '2017-07-20 06:22:15', '2017-07-20 06:22:15');
INSERT INTO `curricula` VALUES ('181', '170', '0', '0', 'for MAEd Major in Technician Education', '27', '2017-07-20 07:10:28', '2017-07-20 07:10:28');
INSERT INTO `curricula` VALUES ('182', '150', '0', '0', 'for MEd Major in Technician Education', '27', '2017-07-20 07:12:14', '2017-07-20 07:12:14');
INSERT INTO `curricula` VALUES ('183', '130', '0', '0', 'for MA in public Administration (OLD)', '27', '2017-07-20 07:14:26', '2017-07-20 07:14:26');
INSERT INTO `curricula` VALUES ('184', '151', '0', '0', 'for MAEd Major in Medical-Surgical Nursing', '27', '2017-07-20 07:58:23', '2017-07-20 07:58:23');
INSERT INTO `curricula` VALUES ('185', '153', '0', '0', 'for MEd Major in Medical-Surgical Nursing', '27', '2017-07-20 08:00:18', '2017-07-20 08:00:18');
INSERT INTO `curricula` VALUES ('186', '152', '0', '0', 'MA Nursing Major in Maternal and Child Health Nursing', '27', '2017-07-20 08:18:25', '2017-07-20 08:18:25');
INSERT INTO `curricula` VALUES ('187', '154', '0', '0', 'Master of Nursing Major in Maternal and Child Health Nursing', '27', '2017-07-20 08:20:55', '2017-07-20 08:20:55');
INSERT INTO `curricula` VALUES ('188', '154', '0', '0', 'Master of Nursing Major in Maternal and Child Health Nursing', '27', '2017-07-20 08:21:23', '2017-07-20 08:21:23');
INSERT INTO `curricula` VALUES ('189', '124', '0', '0', 'for MS Major in Rural Development', '27', '2017-07-21 00:34:21', '2017-07-21 00:34:21');
INSERT INTO `curricula` VALUES ('190', '157', '0', '0', 'for MS in Agriculture Major in Crop Science', '27', '2017-07-21 01:13:44', '2017-07-21 01:13:44');
INSERT INTO `curricula` VALUES ('191', '159', '0', '0', 'for Master of Agriculture Major in Crop Science', '27', '2017-07-21 01:53:48', '2017-07-21 01:53:48');
INSERT INTO `curricula` VALUES ('192', '158', '0', '0', 'for MSA Major in Animal Science', '27', '2017-07-21 02:06:19', '2017-07-21 02:06:19');
INSERT INTO `curricula` VALUES ('193', '160', '0', '0', 'for MA Major in Animal Science', '27', '2017-07-21 02:11:31', '2017-07-21 02:11:31');
INSERT INTO `curricula` VALUES ('194', '155', '0', '0', 'for MS in Biology', '27', '2017-07-21 02:57:56', '2017-07-21 02:57:56');
INSERT INTO `curricula` VALUES ('195', '128', '0', '0', 'MA in ELL', '27', '2017-07-21 03:24:14', '2017-07-21 03:24:14');
INSERT INTO `curricula` VALUES ('196', '129', '0', '0', 'MA in Mathematics', '20', '2017-07-21 03:51:42', '2017-07-21 03:51:42');
INSERT INTO `curricula` VALUES ('197', '129', '0', '0', 'MA in Mathematics', '27', '2017-07-21 03:51:48', '2017-07-21 03:51:48');
INSERT INTO `curricula` VALUES ('198', '140', '0', '0', 'MS in Engineering Major in SWRE', '27', '2017-07-21 05:16:12', '2017-07-21 05:16:12');
INSERT INTO `curricula` VALUES ('199', '141', '0', '0', 'MSE Major in AE', '27', '2017-07-21 05:28:29', '2017-07-21 05:28:29');
INSERT INTO `curricula` VALUES ('200', '156', '0', '0', 'MS in Mathematics', '27', '2017-07-21 05:39:48', '2017-07-21 05:39:48');
INSERT INTO `curricula` VALUES ('201', '126', '0', '0', 'MM Major in Strategic Management', '27', '2017-07-21 06:01:12', '2017-07-21 06:01:12');
INSERT INTO `curricula` VALUES ('202', '127', '0', '0', 'MM Major in Financial Management', '27', '2017-07-21 06:19:11', '2017-07-21 06:19:11');
INSERT INTO `curricula` VALUES ('203', '127', '0', '0', 'MM Major in Financial Management', '27', '2017-07-21 06:38:06', '2017-07-21 06:38:06');
INSERT INTO `curricula` VALUES ('204', '161', '0', '0', 'PSM-REE Curriculum', '27', '2017-07-21 07:55:02', '2017-07-21 07:55:02');
INSERT INTO `curricula` VALUES ('205', '125', '0', '0', 'MIT', '27', '2017-07-21 08:22:01', '2017-07-21 08:22:01');
INSERT INTO `curricula` VALUES ('206', '171', '0', '0', 'for Master in Crop Science', '27', '2017-07-24 03:15:58', '2017-07-24 03:15:58');
INSERT INTO `curricula` VALUES ('207', '172', '0', '0', 'for Master in Animal Science', '27', '2017-07-24 03:20:00', '2017-07-24 03:20:00');
INSERT INTO `curricula` VALUES ('208', '33', '0', '0', 'PhD of Philosophy in Rural Development', '27', '2017-07-26 00:50:19', '2017-07-26 00:50:19');
INSERT INTO `curricula` VALUES ('209', '173', '0', '0', 'for Master in Animal Science', '27', '2017-07-26 03:43:22', '2017-07-26 03:43:22');
INSERT INTO `curricula` VALUES ('210', '174', '0', '0', 'for Master in Crop Science', '27', '2017-07-26 04:54:42', '2017-07-26 04:54:42');
INSERT INTO `curricula` VALUES ('211', '157', '0', '0', 'MS CRP SCI', '27', '2017-07-29 01:44:44', '2017-07-29 01:44:44');
INSERT INTO `curricula` VALUES ('212', '158', '0', '0', 'MS AN SCI', '27', '2017-07-29 04:26:52', '2017-07-29 04:26:52');
INSERT INTO `curricula` VALUES ('213', '123', '0', '0', 'PhD Linguistics', '27', '2017-07-29 05:26:46', '2017-07-29 05:26:46');
INSERT INTO `curricula` VALUES ('214', '130', '0', '0', 'for MA in public Administration (NEW)', '27', '2017-07-31 05:05:45', '2017-07-31 05:05:45');
INSERT INTO `curricula` VALUES ('215', '105', '0', '0', 'for BEED', '10', '2017-08-07 02:16:41', '2017-08-07 02:16:41');
INSERT INTO `curricula` VALUES ('216', '130', '0', '0', 'MPA', '10', '2017-08-12 01:14:57', '2017-08-12 01:14:57');
