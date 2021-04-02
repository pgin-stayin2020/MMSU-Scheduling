/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50505
Source Host           : 192.168.56.101:3306
Source Database       : dbiusis16

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-02-15 16:12:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `bldgs`
-- ----------------------------
DROP TABLE IF EXISTS `bldgs`;
CREATE TABLE `bldgs` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `bldg` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bldgs
-- ----------------------------
INSERT INTO `bldgs` VALUES ('1', 'GS');
INSERT INTO `bldgs` VALUES ('2', 'CAFSD');
INSERT INTO `bldgs` VALUES ('3', 'CASAT');
INSERT INTO `bldgs` VALUES ('4', 'CAS');
INSERT INTO `bldgs` VALUES ('5', 'CBEA');
INSERT INTO `bldgs` VALUES ('6', 'COE');
INSERT INTO `bldgs` VALUES ('7', 'CHS');
INSERT INTO `bldgs` VALUES ('8', 'CIT');
INSERT INTO `bldgs` VALUES ('9', 'CTE');
INSERT INTO `bldgs` VALUES ('10', 'COL');
INSERT INTO `bldgs` VALUES ('11', 'CETC');
INSERT INTO `bldgs` VALUES ('12', 'ITC');
INSERT INTO `bldgs` VALUES ('13', 'MANGASEP');
INSERT INTO `bldgs` VALUES ('14', 'UHS');
INSERT INTO `bldgs` VALUES ('15', 'BOAG');
INSERT INTO `bldgs` VALUES ('16', 'TEATRO');
INSERT INTO `bldgs` VALUES ('17', 'CIT-PAOAY');
INSERT INTO `bldgs` VALUES ('18', 'CAF-DINGRAS');
INSERT INTO `bldgs` VALUES ('19', 'GYM');
INSERT INTO `bldgs` VALUES ('20', 'BM');
INSERT INTO `bldgs` VALUES ('21', 'CCourt');
INSERT INTO `bldgs` VALUES ('22', 'CL');
INSERT INTO `bldgs` VALUES ('23', 'UTC');
INSERT INTO `bldgs` VALUES ('24', 'CODA');
