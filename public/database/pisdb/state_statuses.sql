/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50505
Source Host           : 192.168.56.101:3306
Source Database       : pisdb

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-02-15 16:10:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `state_statuses`
-- ----------------------------
DROP TABLE IF EXISTS `state_statuses`;
CREATE TABLE `state_statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `state_status` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of state_statuses
-- ----------------------------
INSERT INTO `state_statuses` VALUES ('1', 'Active', '2016-02-15 09:33:01', '0000-00-00 00:00:00');
INSERT INTO `state_statuses` VALUES ('2', 'Suspended', '2016-02-15 09:33:01', '0000-00-00 00:00:00');
INSERT INTO `state_statuses` VALUES ('3', 'On Study Leave', '2016-02-15 09:33:22', '0000-00-00 00:00:00');
INSERT INTO `state_statuses` VALUES ('4', 'Retired', '2016-02-15 09:33:22', '0000-00-00 00:00:00');
INSERT INTO `state_statuses` VALUES ('5', 'Resigned', '2016-02-15 09:33:39', '0000-00-00 00:00:00');
INSERT INTO `state_statuses` VALUES ('6', 'Terminated', '2016-02-15 09:33:39', '0000-00-00 00:00:00');
INSERT INTO `state_statuses` VALUES ('7', 'Deceased', '2016-02-15 09:33:45', '0000-00-00 00:00:00');
