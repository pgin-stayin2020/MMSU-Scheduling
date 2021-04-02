/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50505
Source Host           : 192.168.56.101:3306
Source Database       : dbiusis16

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-02-15 16:11:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cys`
-- ----------------------------
DROP TABLE IF EXISTS `cys`;
CREATE TABLE `cys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cy` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cys
-- ----------------------------
INSERT INTO `cys` VALUES ('10', '2000-2001');
INSERT INTO `cys` VALUES ('11', '2001-2002');
INSERT INTO `cys` VALUES ('12', '2002-2003');
INSERT INTO `cys` VALUES ('13', '2003-2004');
INSERT INTO `cys` VALUES ('14', '2004-2005');
INSERT INTO `cys` VALUES ('15', '2005-2006');
INSERT INTO `cys` VALUES ('16', '2006-2007');
INSERT INTO `cys` VALUES ('17', '2007-2008');
INSERT INTO `cys` VALUES ('18', '2008-2009');
INSERT INTO `cys` VALUES ('19', '2009-2010');
INSERT INTO `cys` VALUES ('20', '2010-2011');
INSERT INTO `cys` VALUES ('21', '2011-2012');
INSERT INTO `cys` VALUES ('22', '2012-2013');
INSERT INTO `cys` VALUES ('23', '2013-2014');
INSERT INTO `cys` VALUES ('24', '2014-2015');
INSERT INTO `cys` VALUES ('25', '2015-2016');
INSERT INTO `cys` VALUES ('26', '2016-2017');
INSERT INTO `cys` VALUES ('27', '2017-2018');
INSERT INTO `cys` VALUES ('28', '2018-2019');
INSERT INTO `cys` VALUES ('29', '2019-2020');
