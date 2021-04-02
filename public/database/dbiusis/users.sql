/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50505
Source Host           : 192.168.56.101:3306
Source Database       : dbiusis16

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-02-15 16:13:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `degree_id` int(10) unsigned NOT NULL,
  `dept_id` int(10) unsigned zerofill DEFAULT NULL,
  `chair_id` int(10) unsigned DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Arman A. Barruga', 'aabarruga323@gmail.com', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '8', null, null, 'OBBiVooENjuvwVM1U9jLESxBlLuUac409VVs5rf2NaKkIscOv8m91jS8wdsu', '2015-03-07 08:07:06', '2017-07-28 06:52:50');
INSERT INTO `users` VALUES ('5', 'BS CompSci', 'cas-cs@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '8', '0000000001', '970', '1wkdLXemTk2lKbzvP4iCvpGPrB8CRK3EdMfabyStJ8QQsNn4XvljCkjbHvy3', '2015-04-20 01:32:19', '2017-11-21 02:25:52');
INSERT INTO `users` VALUES ('6', 'BS Accounting Tech', 'cbea-bsat@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '58', '0000000034', '294', 'Y0gHkEJ2jBlHTEkTBPDZhSBCHm5rEbUlYds9MlLowb0TKccTiAnU4m7agnBk', '2015-04-20 01:33:36', '2017-07-26 06:03:12');
INSERT INTO `users` VALUES ('7', 'BS Accountancy', 'cbea-bsacc@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '13', '0000000034', '294', 'tcbZBGXDPocd1lkauEMC4O5G9YNZDpushUwVs0eyh7Wkkgs09e24H8lqDPER', '2015-04-20 01:34:05', '2017-11-15 08:46:19');
INSERT INTO `users` VALUES ('8', 'BS DevCom', 'cafsd-devcom@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '4', '0000000028', '504', 'uP9fP4zneVZuUTq2K5m6r9F2OUNmlkQNRVYZYtCRdYVbjX5XgsxaroVKQ2Tv', '2015-04-20 01:34:42', '2017-07-26 05:59:20');
INSERT INTO `users` VALUES ('9', 'Com Eng', 'coe-comeng@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '25', '0000000012', '867', '8LjU0bdaQFTwcv0UWm0OkOWKo5ro0zmjxRbeShJB6XziXwSAMryugqgWvXsI', '2015-04-20 01:35:10', '2017-08-01 00:17:42');
INSERT INTO `users` VALUES ('10', 'BS PT', 'chs-pt@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '29', '0000000040', '925', 'OpXNfluYQt09yyTlj1mi3MBkEZp7yGuEoJophBwChaxdo5IqjxGXUNgi8g1i', '2015-04-20 01:35:49', '2017-07-27 23:08:44');
INSERT INTO `users` VALUES ('11', 'BS Pharm', 'chs-pharma@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '30', '0000000041', '332', 'g8eF0lepzzdi3LT4AkMPsAfHzg0PnnNfLUpdBLV7OabzndRpAfCOL1nEgmtV', '2015-04-20 01:36:29', '2017-08-04 07:15:14');
INSERT INTO `users` VALUES ('12', 'BS Econ', 'cbea-econ@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '14', '0000000036', '1001', 'rqh0q2PtvxKGOIGj8M7jw0xZZow30zGp66FVhwUhjUw2dhV3jZuFl3Kkxh7M', '2015-04-20 01:36:47', '2017-09-06 02:05:39');
INSERT INTO `users` VALUES ('13', 'Mech Eng', 'coe-me@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '22', '0000000010', '388', 'H1UCjBtXvDJ9UJkcTArRyS3kkileeGCdcLQkk7PHNaEuw3FyMyJijP3bYHUL', '2015-04-20 01:37:16', '2017-11-20 02:50:03');
INSERT INTO `users` VALUES ('14', 'BS Chemistry', 'cas-chem@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '54', '0000000006', '365', 'zHVuPfJnN2i7LK2IW7pld1hKpmuKed0g85j7Pi0f4lPrBvbxMwDpPCh6ZQeb', '2015-04-20 01:37:48', '2017-07-26 00:16:56');
INSERT INTO `users` VALUES ('15', 'Cer Eng', 'coe-cere@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '24', '0000000014', '382', 'WA9c2P99oUXbGRootpv1iFbkOK0mdSoTlQWpVzt8A6bIzU52DCidV13eFJsC', '2015-04-20 01:38:20', '2017-10-13 07:23:14');
INSERT INTO `users` VALUES ('16', 'Electrical Eng', 'coe-ee@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '21', '0000000015', '367', 'KhgpWE0kcd2CchoQLGxu6MW2PAANDlK3ydepcfgdc8PeB5Z74vOjevrnL4lj', '2015-04-20 01:38:40', '2017-11-21 07:41:29');
INSERT INTO `users` VALUES ('17', 'AB EL', 'cas-abel@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '59', '0000000002', '1157', 'RK4Wa42TZDHIUulHQqXLn1nYP4iowjKMQ2KslShsbCI3MtoVsVU6tkJyBAfE', '2015-04-20 01:39:06', '2017-08-01 06:30:28');
INSERT INTO `users` VALUES ('18', 'AB ES', 'cas-abes@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '12', '0000000002', '1157', 'mLxyNCLkuWVcjrQOhgH3kd6dDTUqPc6w8u2BE3MTbg5G096xhylq3vC4yOzv', '2015-04-20 01:39:44', '2017-01-17 06:33:27');
INSERT INTO `users` VALUES ('19', 'Marine Biology', 'casat-mb@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '6', '0000000033', '0', '37YnVvZH6bXv36Xh2qCPJ14lSM377SMD3MKsdo8Jt9GnHpxJO9HURvDzRAZv', '2015-04-20 01:40:16', '2017-10-19 08:21:16');
INSERT INTO `users` VALUES ('20', 'BS Fisheries', 'casat-bsf@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '27', '0000000032', '0', 'yzb9l2fgKNaf00XfcDeAJLoVSYaGs3zLPlQ5SEYN5TJROHkOKsdm49rs65YQ', '2015-04-20 01:40:37', '2017-04-03 05:37:12');
INSERT INTO `users` VALUES ('21', 'Chem Eng 2', 'coe-cheme@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '23', '0000000013', '398', '7ZBvAlpjrOUA3OmoUWY96PXtvLq6FpWOWK62p51Wi0aFYWl76mdwMk8oTPpc', '2015-04-20 01:41:05', '2017-09-08 11:49:18');
INSERT INTO `users` VALUES ('22', 'Chem Eng', 'coe-cheme-dc@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '23', '0000000013', '398', 'TZfLmGtNoXb40xIgKtbwZo916tTF8ImOn091lt7etMwxJsGqNRY0DOIXqtge', '2015-04-20 01:41:34', '2017-09-08 11:50:42');
INSERT INTO `users` VALUES ('23', 'BS Entrep', 'cbea-entrep@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '60', null, null, 'j97ibf9syBQp8xhBrANOZ5uqZrTReyxTdxSvPP0glJQwYhReeGsW3UapxKHO', '2015-04-20 01:42:26', '2017-07-26 06:06:24');
INSERT INTO `users` VALUES ('24', 'Coop Mgt', 'cbea-cm@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '17', null, null, 'ouhTmAhRGzVIXAb5e2cWquU1DIxp3eZA54D0wk4seVVbzc7QB5YG0COP0fvm', '2015-04-20 01:42:53', '2017-07-26 06:05:31');
INSERT INTO `users` VALUES ('25', 'MM', 'cbea-bsbamm@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '15', '0000000035', '261', 'm5czZKOj2lSgzeL1dyl6z7GLIMYxcI6bysSiThzzkSWg8gdnYDr8GNFmUikN', '2015-04-20 01:43:14', '2017-11-20 04:40:38');
INSERT INTO `users` VALUES ('26', 'HRDM', 'cbea-bsbahrdm@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '61', '0000000035', '261', 'QUAZFZrZlyqWetk0PGJkl7KUBywwSQu544VQoUcaREPYDtP9Bu2Xi1Tnjudy', '2015-04-20 01:43:39', '2017-07-26 06:03:48');
INSERT INTO `users` VALUES ('27', 'Tourism Management', 'cbea-tm@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '62', '0000000078', '1026', 'bWEEB20IrzlyxelVWOZtWAXOri7n8V8VorWyBKeu8RsR3yvnPiwk9hdMtbJe', '2015-04-20 01:44:08', '2017-01-11 06:48:11');
INSERT INTO `users` VALUES ('28', 'Hospitality Management', 'cbea-hm@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '63', '0000000078', '1026', '9CTrzgfaeMh4LRgpgKJs8kmIAtUGvl6xCY0CtKghkGeOpivl1cJdnJ2SmVqn', '2015-04-20 01:44:37', '2017-07-26 06:06:48');
INSERT INTO `users` VALUES ('29', 'BA Agriculture', 'cafsd-bsa@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '1', '0000000026', '1114', 'yF9lVmDwwHo70iD1SdTDJovu08miOUv6GlulSHYfoX79tsUBN7cFOTxthaOw', '2015-04-20 01:45:01', '2017-07-26 05:57:26');
INSERT INTO `users` VALUES ('30', 'BS EnviSci', 'cafsd-bses@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '10', '0000000008', '582', '81ypm68t8rXzZnTK6tG9I1UZePPV53Eyx5ad6WPMRKPngcgxeW9IF2sHlKUK', '2015-04-20 01:45:23', '2017-08-01 06:10:41');
INSERT INTO `users` VALUES ('31', 'BS Math', 'mathdept@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '7', '0000000004', '816', 'rRnWtX1GSx8yAPMLMWMsaXmzQUC9PtW2GqdaR4ULD5fAUYUt3ppN5wQszsJs', '2015-04-20 01:45:51', '2017-07-26 05:55:56');
INSERT INTO `users` VALUES ('32', 'AB Socio', 'cas-socio@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '11', '0000000068', '549', 'Rbls7zsVPteoCZOlPxsRv5Nwh1ZkWzIICDHTNB9gOreE9kyBCNmqQ8EjtGSM', '2015-04-20 01:46:21', '2017-07-26 05:55:11');
INSERT INTO `users` VALUES ('33', 'BS Biology', 'cas-bio@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '9', '0000000007', '567', 'NE0qwMLtUoqpqdD07BcRtCnxbSwezq2zwXcmntDvV3zeI6XmOVAu4NAVGcqg', '2015-04-20 01:46:41', '2017-07-26 05:54:08');
INSERT INTO `users` VALUES ('34', 'CIT-BAT', 'cit-bat@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '64', '0000000073', '1203', 'ZuIhYQVqEuoMXYlGbjpFjuphZPQGPEps821YlNkSi6Z0j1Bnr1Zjjpz9MuO2', '2015-04-20 01:47:15', '2017-09-25 02:50:05');
INSERT INTO `users` VALUES ('35', 'BSIT', 'cit-bsit@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '32', '0000000038', '1222', '21mfbXgllqVwXLHX2Zk411RH0uzWDw2ccIqtJYufYBDhYc5oahdha3i5H2ly', '2015-04-20 01:47:46', '2017-05-30 13:05:08');
INSERT INTO `users` VALUES ('36', 'BTTE', 'cit-btte@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '65', '0000000074', '595', 'aeGRxO0waJccwKJRQNplmf3vpF6XKNHweKlXEkTRtJdxytCaoXjgMuklQP8t', '2015-04-20 01:48:14', '2017-06-03 06:54:52');
INSERT INTO `users` VALUES ('37', 'BS Forestry', 'cafsd-bsf@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '3', '0000000029', '541', 'IHa4qgUxyd8nXXizTIrNLi4Laa5n0DbcoTPtSBL5t6tMgpkhNbADcsDJXBJv', '2015-04-20 01:48:39', '2017-07-26 05:58:45');
INSERT INTO `users` VALUES ('38', 'Demandante, Sosima', 'cafsd-bat@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '48', '0000000025', '434', 'Fj2cK6p5Q71iMyMWGgxLhn4eFvvaf6U7Rgl18Xfp27482r62bqtx1r43V3oQ', '2015-04-20 01:49:12', '2017-07-26 05:56:52');
INSERT INTO `users` VALUES ('39', 'Electronics Eng', 'coe-ece@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '26', '0000000009', '372', 'qqc57dokwKb4AQ1nCDDKJ0CBDw0KaHG0Ct2qX0A71ml7E6nypGeErhl2HXEa', '2015-04-20 01:49:38', '2017-07-27 04:48:01');
INSERT INTO `users` VALUES ('40', 'BS Nursing', 'chs-bsn@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '28', '0000000039', '715', 'bsQ4ScVu7P9PNne8MCZt6f9XNZDbz6rDL1O5yDlqcGvIx7kBgRM32ZIvcTdM', '2015-04-20 01:50:02', '2017-08-02 09:05:05');
INSERT INTO `users` VALUES ('41', 'Civil Eng', 'coe-ce@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '20', '0000000011', '1067', '9w18ra2mlsXrWtU5rcaXigZZLlHrZTr1B4CQlZA5yB0T8r0XhSwlGpFXVZdR', '2015-04-20 01:50:28', '2017-08-01 06:24:41');
INSERT INTO `users` VALUES ('42', 'BSEd', 'cte-bsed@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '18', '0000000070', '725', '219fLUbiVy3YLDJcaRLslNKhHdw4WlMEU0VC0v7NK6zKBGrqOKukkXMHOEl5', '2015-04-20 01:50:55', '2017-08-22 00:34:30');
INSERT INTO `users` VALUES ('43', 'BEEd', 'cte-beed@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '19', '0000000069', '44', '1Dw9npSZOSnLgfrkwe4fPs070p8UtnJXKMPtZ2jdjYXFkgYqgILQyfYsj5N5', '2015-04-20 01:51:14', '2017-08-22 00:28:22');
INSERT INTO `users` VALUES ('44', 'BS AgEng', 'coe-ae@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '2', '0000000072', '509', 'VmaXk0kzDh8SsUZOT8xewyfyOQNQetsZXMM35MK7TjmwLZnU91oBL1AVV4GN', '2015-04-20 01:51:35', '2017-11-21 07:46:07');
INSERT INTO `users` VALUES ('45', 'BS AgEng 2', 'coe-ae2@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '2', '0000000072', '509', 'asOqLUoOhccd3oBFMHIUyBVjRBsc5pseFclhuEf8I1WENggQbAfoCDiZ8U6d', '2015-04-20 01:51:58', '2015-05-26 00:40:41');
INSERT INTO `users` VALUES ('46', 'BSED-Biology', 'cte-bsed-bio@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '70', '0000000070', '725', 'Dbm7ZKjpq90zyAFJ8QAzl0nldK2wzv5OwFwVKLRwjg9vlFFH5iS3d7A6x6in', '2015-04-20 01:52:21', '2017-06-14 08:39:51');
INSERT INTO `users` VALUES ('47', 'BSED-English', 'cte-bsed-engl@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '18', '0000000070', '725', 'xPh5lqIgwCXhFsTrrbSOaLd72lft4EXdBl6y14HeAe7TcrsHgCH2pEdcaXfN', '2015-04-20 01:52:45', '2017-09-13 03:59:18');
INSERT INTO `users` VALUES ('48', 'BSED-Filipino', 'cte-bsed-fil@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '66', '0000000070', '725', 'wCU1QlBVLX2N34VMAjqggmsG84Vw7B35eMbhVRfxB6OscogWGzjCqidHeDN4', '2015-04-20 01:53:31', '2017-09-13 04:00:01');
INSERT INTO `users` VALUES ('49', 'BSED-Mapeh', 'cte-bsed-mapeh@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '67', '0000000070', '725', '1SmXqOQweZAUM0pfMSFk4SOITL4VmC6huVtXyGh3yhA2Mmq3u2KL9QLyMY4U', '2015-04-20 01:53:55', '2017-09-13 04:01:50');
INSERT INTO `users` VALUES ('50', 'BSED-Math', 'cte-bsed-math@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '71', '0000000070', '725', 'RfBkziuNChmUCgcY78QSF8PckPXupMk3Ja0miosUH27czE4sV9EA7ZCfhj8t', '2015-04-20 01:54:14', '2017-09-13 03:58:37');
INSERT INTO `users` VALUES ('51', 'BSED-Physical Science', 'cte-bsed-physc@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '72', '0000000070', '725', 'DKaJKEFtrAgTe53BxDuNf4aKodXTeHCQzBLD0iTeLSB1pcTWQe9EthPDpMSN', '2015-04-20 01:54:42', '2017-08-10 06:37:05');
INSERT INTO `users` VALUES ('52', 'BSED-Social Science', 'cte-bsed-socsc@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '68', '0000000070', '725', 'XRp1VdN6nRzfINnCAZyvdmLzeE28c9B4wJlU3qIK3gvhi4074gVgMGCehnYu', '2015-04-20 01:55:06', '2017-07-26 06:16:13');
INSERT INTO `users` VALUES ('53', 'BSED-TLE', 'cte-bsed-tle@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '69', '0000000070', '725', 'EfUGN66ZKRL0tASLN0gFtXG8sWYY83unkmRctm1iTGvA1cdBu9UE0rVU8TOj', '2015-04-20 01:55:25', '2017-07-26 06:15:03');
INSERT INTO `users` VALUES ('54', 'BSTM-ISM', 'cbea-bstmism@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '81', '0000000078', '1026', 'hzVzkNDatIAvsdyAOHTCyOy0zAEvTMCdgZ2Idg7aLn22hTAQv0j7Pdeg1VNh', '2015-04-20 01:55:47', '2017-07-26 06:04:43');
INSERT INTO `users` VALUES ('55', 'BSTM-TTM', 'cbea-bstmttm@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '82', '0000000078', '1026', 'QkYmYgAfOW4LyIAaOYp8Cu4ZfmQ3tRu0lyHFzplUsEbsBXOqVt9fmEyQY913', '2015-04-20 01:56:09', '2017-08-01 08:05:50');
INSERT INTO `users` VALUES ('56', 'AB Comm', 'cas-comm@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '83', '0000000002', '1157', '3eQOq0FAucF2wQkcTSN5WYhheF87VZxe9QRfDXOHFBPvn29b5z4s5iXt4PsV', '2015-04-20 01:56:53', '2017-07-26 05:54:37');
INSERT INTO `users` VALUES ('57', 'Barruga, Arman', 'admin@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '0', null, null, 'hnlkmVN1Ltom5nqCT2rpSz4Knc98w7SDalikamCAURuSBcuL2zf1kCcxVzLh', '2015-04-20 01:57:20', '2016-09-21 07:49:34');
INSERT INTO `users` VALUES ('58', 'BSIT-Comp Tech', 'cit-bsit-ct@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '84', '0000000038', '1222', 'Rn3NE5wJHUwskFbwrR814u9HciqnVH0hEWJpVDDkVdy4kzyFmy6XHraF95lB', '2015-04-20 01:58:49', '2017-06-07 02:57:46');
INSERT INTO `users` VALUES ('59', 'BSIT-GT', 'cit-bsit-gt@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '85', '0000000038', '1222', 'l9jx9dWRout6sGk9VU4Ttw95AC5xJXCBDYMiMqJ9GtPMJoLurP5EkVc814HE', '2015-04-20 01:59:25', '2017-06-08 04:04:12');
INSERT INTO `users` VALUES ('60', 'BSIT-Food Tech', 'cit-bsit-ft@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '86', '0000000038', '1222', 'WEefHfak2JvYIDNfeOJaM5D9hHAiyS8Qmm6tnjTSEu7TqLMvkwks5M9eoZVK', '2015-04-20 01:59:47', '2017-06-05 04:45:30');
INSERT INTO `users` VALUES ('61', 'BSIT-Civil Tech', 'cit-bsit-civtech@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '87', '0000000038', '1222', 'BpJvj3S2gZnaZph9KD3pz5TbAWx9gyDpl2fJtw9S308G1pnlZrWlTdambyyA', '2015-04-20 02:00:12', '2017-06-05 08:58:58');
INSERT INTO `users` VALUES ('62', 'BSIT-Electical', 'cit-bsit-electri@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '88', '0000000038', '1222', 'zsfAVGYCKaWe2jBwdZcZ27DSSWMgxAW1vI2BbHTy84atsdMf5uQo2eRGkQEW', '2015-04-20 02:00:32', '2017-08-17 01:34:35');
INSERT INTO `users` VALUES ('63', 'BSIT-Electronics', 'cit-bsit-electro@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '89', '0000000038', '1222', 'bLaHGMrG6XP2G9eGQ3MzB5xXOZPf2qGv6Uu3HRBEcY6nE2EclGF4zIiM9UuR', '2015-04-20 02:00:51', '2017-08-03 05:36:17');
INSERT INTO `users` VALUES ('64', 'BTTE-GFD', 'btte-gfd@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '90', '0000000074', '595', 'A1MkkVceRkqioPaKHK1OrWTwWxtBykwtXLslanwRFghB3uSAxqEMvJiC9nxA', '2015-04-20 02:01:16', '2017-03-31 05:27:27');
INSERT INTO `users` VALUES ('65', 'BTTE-DT', 'btte-dt@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '91', '0000000074', '595', '8UWTHb3pn4MbTf2KBoan9sMGb2RFb353f7rI9U5qF8Z5dUDGeOWug2xUvTrG', '2015-04-20 02:01:36', '2017-06-08 03:30:09');
INSERT INTO `users` VALUES ('66', 'BTTE-Comp Tech', 'btte-ct@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '92', '0000000074', '595', 'qQE7fqXMynUlUX8ovSZEdV0Lxea7WLNBub7QJNtxkAd7oTDcuoouQ6oC0a8c', '2015-04-20 02:02:07', '2017-07-31 07:38:06');
INSERT INTO `users` VALUES ('67', 'BTTE-ET', 'btte-et@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '93', '0000000074', '595', 'rr19emyGWA6ntCj7vn8qoGIoQaC1Ze4eNKv44OKWDROYxBHFOL5CDHf3lrO8', '2015-04-20 02:02:28', '2017-03-31 05:13:27');
INSERT INTO `users` VALUES ('68', 'BTTE-FSM', 'btte-fsm@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '94', '0000000074', '595', 'ykGwqwbYrMW0eCczPxJ1vo6Ldo7c7gJQOBMdtjczoKkqR1gFYc1YXDe4HtYe', '2015-04-20 02:02:57', '2017-06-08 03:26:54');
INSERT INTO `users` VALUES ('69', 'BTTE-AT', 'btte-at@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '95', '0000000074', '595', 'P2admz9r6IoOfCNTn9viOZXOi75kOZ1bHgEr0O3h3HWOe4I4vIxPWJoThJf2', '2015-04-20 02:03:23', '2017-05-30 18:55:49');
INSERT INTO `users` VALUES ('70', 'BS AgriBusiness', 'cafsd-bsab@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '102', '0000000079', '512', 'MwDthdlOPq6VLwpZmeRXjr3pSNJmxi8yZqcRfdtiN0s30kj8HgkM9vikQm3j', '2015-04-20 03:47:58', '2017-07-26 05:57:55');
INSERT INTO `users` VALUES ('72', 'Special Education', 'cte-beed-sped@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '103', '0000000069', '44', 'NjlN5eJjynZGBSk8DWo2E6guA72ATXHscAcjdVzMXqShPj6Sz14038Bi9fQB', '0000-00-00 00:00:00', '2017-07-31 06:08:09');
INSERT INTO `users` VALUES ('73', 'Pre School Education', 'cte-beed-pse@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '104', '0000000069', '44', 'JdYIdax0ZydOKs82tEPkALMO82RXVgSyVsT9y7Ss7J4fnUQFXUkRM2Ji2aOJ', '0000-00-00 00:00:00', '2017-07-26 06:14:10');
INSERT INTO `users` VALUES ('74', 'Generalist', 'cte-beed-gen@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '105', '0000000069', '44', 'Lh62BMVDOwRNFjgRToLiBWXuP62xpsSPF76do0b83M0cQcxau0VFMrxxB262', '0000-00-00 00:00:00', '2017-07-31 07:15:03');
INSERT INTO `users` VALUES ('76', 'Ref AC Technology', 'cit-bsit-ract@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '106', '0000000038', '1222', 'f3yN9OfKVOHKsba6F3TyIRloMDMrFP3LQiESUoMvTF8ViF3KpoxpRTAbUE1f', '0000-00-00 00:00:00', '2017-03-31 05:51:41');
INSERT INTO `users` VALUES ('77', 'Agri Extension', 'cafsd-bsa-agext@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '108', '0000000026', '1114', 're8DnIml92vRsf6Ldrs3IbzC4AhJtm6N2wG7qI4Y9j3KUU6umCtf563Syrwc', '0000-00-00 00:00:00', '2017-07-26 05:59:51');
INSERT INTO `users` VALUES ('78', 'Animal Science', 'cafsd-bsa-as@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '109', '0000000026', '1114', 'XyzqahnpBFmIuQjSdfRAH1IcqRIVlfvXna93TgRwyUcxKP8OKvkxoeZnOscN', '0000-00-00 00:00:00', '2017-07-26 06:00:21');
INSERT INTO `users` VALUES ('79', 'Horticulture', 'cafsd-bsa-hort@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '110', '0000000026', '1114', 'fgiFyqyUfFG7DeD9c7F8Bx1kojMKm1wMSfR3H00G1YtfTqC0JeX7K1MfkY7f', '0000-00-00 00:00:00', '2017-07-26 06:00:50');
INSERT INTO `users` VALUES ('80', 'Agronomy', 'cafsd-bsa-agro@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '111', '0000000026', '1114', 'cFkwF5hbOiFdTShaqk0TVXHrvXiwIEtGUBbTyzWjQCVYkQoBhqOvYU478xvn', '0000-00-00 00:00:00', '2017-07-26 06:01:20');
INSERT INTO `users` VALUES ('81', 'Soil Science', 'cafsd-bsa-ss@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '112', '0000000026', '1114', 'GpHzAuC9djTo8mfSA5h2GpA4FSIPGCkl6rrljTKFCp084jpV7W5t3tfvjf7i', '0000-00-00 00:00:00', '2017-07-26 06:02:23');
INSERT INTO `users` VALUES ('82', 'BSIT-CERT', 'cit-bsit-cert@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '115', '0000000038', '1222', '0icftLZN4A46TP74eQNYKdwqs7RL2D9iYJcJkQDwohkCeS2Zx3Ij6uJS6RAm', '0000-00-00 00:00:00', '2017-01-17 08:30:34');
INSERT INTO `users` VALUES ('83', 'BSIT-ECT', 'cit-bsit-ect@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '116', '0000000038', '1222', '3NRNflid0CPR1knoknFBJm5UsSrNhRX4S2Cs150Fu0i6kdeiUSsGHtyVLM7E', '0000-00-00 00:00:00', '2017-01-17 08:34:11');
INSERT INTO `users` VALUES ('84', 'BSIT-Drafting', 'cit-bsit-dt@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '117', '0000000038', '1222', '8JOOplrkqv81mZLXOKQRgnjSpikMF9UpavfaoZwi4C0Lb8rK3bOdGvx9ail9', '0000-00-00 00:00:00', '2017-04-03 02:02:06');
INSERT INTO `users` VALUES ('85', 'BTTE-Electrical Technology', 'btte-elec@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '118', '0000000074', '595', 'PTPLIUrX7LV6IrnfB7ZV858pJxTNG2UerVTxe9D5aLVvW53kyEFa0YL9gEWZ', '0000-00-00 00:00:00', '2017-03-31 05:40:43');
INSERT INTO `users` VALUES ('86', 'PE Department', 'cas-pe@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '0', '0000000067', '605', 'Z2XR3GBHnPVyCswdSGEzDSvhuTiPke2Tpo9pfxeETWVmQTse1iVu3jTVpGyp', '0000-00-00 00:00:00', '2017-03-29 05:34:17');
INSERT INTO `users` VALUES ('87', 'Accounting1', 'accounting1@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '0', '0000000000', null, 'dmxIWGVLaLT5vnfadNifCpaSCvvLoy4HlmvsiJ9oXBwyvW7ViYhLjRLur6Iw', '0000-00-00 00:00:00', '2017-12-01 04:11:29');
INSERT INTO `users` VALUES ('88', 'TCP', 'cte-tcp@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '120', '0000000070', '725', '9htA9pgKRnhgaxxQR18gafhP5mh2hGJhDlE3yVrWv3IvkqBpJBbRIwtYEefe', '0000-00-00 00:00:00', '2017-06-05 03:39:23');
INSERT INTO `users` VALUES ('89', 'ProfEd', 'cte-profed@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '119', '0000000070', '725', 'iPd7lYzZSzfkYUSFS2BpTsd5shSEiTajW0X9b0ZUfHI6MFQI1ED8GA9HNAUW', '0000-00-00 00:00:00', '2017-03-15 02:18:45');
INSERT INTO `users` VALUES ('90', 'Bachelor of Laws', 'col-lb@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '74', '0000000074', '595', 'C1uCM0oHmDu48BFACwnWpeml3SVDiBc5GQ5EjSZ8D1Aag4k9P8ZHpgNGZT8g', '0000-00-00 00:00:00', '2017-08-07 02:32:26');
INSERT INTO `users` VALUES ('91', 'Accounting2', 'accounting2@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '0', '0000000000', null, 'RZ0fhdqu7XL00JsuBfS0IJ1XA5JEJnB0uuB8m2IYJEP4CdSacuMCQyapnSF5', '0000-00-00 00:00:00', '2017-09-20 08:28:23');
INSERT INTO `users` VALUES ('92', 'Accounting3', 'accounting3@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '0', '0000000000', null, 'fmo4esTy83K2uIzu2AzYfJ0AySOJrWvDird1G1t2fiFoNlAEDgMBuePJRJlu', '0000-00-00 00:00:00', '2017-01-05 00:38:50');
INSERT INTO `users` VALUES ('93', 'Accounting4', 'accounting4@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '0', '0000000000', null, 'aDecIVV9ZOgUBcTSeC9D6fi1BzkpZb73x6NHBuYYmoApGQDMVTKK6jieILx1', '0000-00-00 00:00:00', '2017-01-05 06:20:46');
INSERT INTO `users` VALUES ('94', 'Registrar', 'registrar@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '0', '0000000000', null, '6Ab7tF4LXa6pVbQlBTh7FIxQMFZyUYL1NOjRByYuRPh1OAK0NAnox5ttCOtV', '0000-00-00 00:00:00', '2017-11-20 06:27:03');
INSERT INTO `users` VALUES ('95', 'CIT', 'cit-re@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '0', '0000000000', null, 'Mw8SsCwdn5X43BVjv4iEDkRkFXb3rrKpreZUFG9iBM2x272Liw75K6vxB0Kj', '0000-00-00 00:00:00', '2017-06-23 03:03:10');
INSERT INTO `users` VALUES ('96', 'Medicine', 'com-md@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '114', '0000000082', '1354', 'd1kjZg3zPI33nG1bJsLG5nimj2IYOB6ZrJbohScWHQ2DQNBB5fpQiOHq6YMx', '0000-00-00 00:00:00', '2017-08-08 01:21:03');
INSERT INTO `users` VALUES ('97', 'Anatomy', 'com-anatomy@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '114', '0000000082', '1354', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('100', 'Physiology', 'com-phys@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '114', '0000000082', '1354', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('101', 'Research and Epi', 'com-research@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '114', '0000000082', '1354', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('102', 'Biochemistry and Molecular Biology', 'com-biochem@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '114', '0000000082', '1354', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('103', 'Family and Community', 'com-fam@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '114', '0000000082', '1354', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('104', 'Surgery', 'com-surgery@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '114', '0000000082', '1354', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('105', 'Internal Medicine', 'com-internal@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '114', '0000000082', '1354', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('106', 'Microbiology, Parasitology', 'com-micro@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '114', '0000000082', '1354', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('107', 'Pharmcology', 'com-pharm@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '114', '0000000082', '1354', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('108', 'Psychiatry', 'com-psy@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '114', '0000000082', '1354', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('109', 'Pathology', 'com-path@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '114', '0000000082', '1354', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('110', 'Pediatrics', 'com-pedia@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '114', '0000000082', '1354', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('111', 'MEd-LIM', 'gs-med-lim@mmsu.edu.ph', '$2y$10$cBiBFkLu0UrZdBMqnkNW1uWurjm1KukhdVDriQjGT9UeulE0L0KHm', '144', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('112', 'MA Math', 'gs-ma-math@mmsu.edu.ph', '', '129', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('113', 'MA English', 'gs-ma-engl@mmsu.edu.ph', '', '128', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('117', 'MM Financial Statement', 'gs-mm-fs@mmsu.edu.ph', '', '127', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('118', 'MM Strat Management', 'gs-mm-sm@mmsu.edu.ph', '', '126', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('119', 'MIT', 'gs-mit@mmsu.edu.ph', '', '125', '0000000095', '1045', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('120', 'MS Rural Dev', 'gs-msrd@mmsu.edu.ph', '', '124', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('121', 'PhD Linguistic', 'gs-phd-ling@mmsu.edu.ph', '', '123', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('122', 'EdD Educational Mngt', 'gs-edd-em@mmsu.edu.ph', '', '122', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('123', 'MEd Wika', 'gs-med-wika@mmsu.edu.ph', '', '143', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('124', 'MAPA', 'gs-mapa@mmsu.edu.ph', '', '130', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('125', 'MAEd Biology', 'gs-maed-bio@mmsu.edu.ph', '', '131', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('126', 'MAEd Language and Lit.', 'gs-maed-ll@mmsu.edu.ph', '', '135', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('127', 'MAEd GC', 'gs-maed-gc@mmsu.edu.ph', '', '136', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('128', 'MAEd Math', 'gs-maed-math@mmsu.edu.ph', '', '137', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('129', 'MAEd Physics', 'gs-maed-physics@mmsu.edu.ph', '', '138', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('130', 'MAEd Educational Mngt.', 'gs-maed-em@mmsu.edu.ph', '', '133', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('131', 'MSE SWRE', 'gs-mse-swre@mmsu.edu.ph', '', '140', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('132', 'MSE AgEng', 'gs-mse-ageng@mmsu.edu.ph', '', '141', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('133', 'MEd Early CE', 'gs-med-earlyce@mmsu.edu.ph', '', '142', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('134', 'MAEd Chem', 'gs-maed-chem@mmsu.edu.ph', '', '132', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('135', 'MAEd Science Educ.', 'gs-maed-scied@mmsu.edu.ph', '', '139', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('136', 'M Crop Science', 'gs-m-cropsci@mmsu.edu.ph', '', '174', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('137', 'MS AnSci', 'gs-ms-ansci@mmsu.edu.ph', '', '158', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('138', 'MAgri Crop Sci', 'gs-magri-cropsci@mmsu.edu.ph', '', '159', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('139', 'MAgri Animal Science', 'gs-magri-as@mmsu.edu.ph', '', '160', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('140', 'PSM', 'gs-psm@mmsu.edu.ph', '', '161', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('141', 'MAEd Early CE', 'gs-maed-earlyce@mmsu.edu.ph', '', '162', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('143', 'MAEd Wika at Pan.', 'gs-maed-wika@mmsu.edu.ph', '', '163', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('145', 'MAEd LIM', 'gs-maed-lim@mmsu.edu.ph', '', '164', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('146', 'MAEd MSEPPK', 'gs-maed-mseppk@mmsu.edu.ph', '', '165', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('147', 'MAEd SocStud', 'gs-maed-socstud@mmsu.edu.ph', '', '166', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('148', 'MAEd TVS', 'gs-maed-tvs@mmsu.edu.ph', '', '167', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('149', 'MAEd SPED', 'gs-maed-sped@mmsu.edu.ph', '', '168', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('150', 'MAEd THE', 'gs-maed-the@mmsu.edu.ph', '', '169', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('151', 'MAEd TechEd', 'gs-maed-teched@mmsu.edu.ph', '', '170', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('152', 'MSA Crop Sci', 'gs-msa-cropsci@mmsu.edu.ph', '', '171', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('153', 'MSA AnSci', 'gs-msa-ansci@mmsu.edu.ph', '', '172', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('154', 'M AnSci', 'gs-m-ansci@mmsu.edu.ph', '', '173', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('155', 'MS Crop Sci', 'gs-ms-cropsci@mmsu.edu.ph', '', '157', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('156', 'MS Math', 'gs-ms-math@mmsu.edu.ph', '', '156', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('157', 'PhD Rural Devt', 'gs-phd-ruraldevt@mmsu.edu.ph', '', '33', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('158', 'MEd MSEP', 'gs-med-msepp@mmsu.edu.ph', '', '145', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('159', 'MEd Soc Stud', 'gs-med-socstud@mmsu.edu.ph', '', '146', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('160', 'MEd TVS', 'gs-med-tvs@mmsu.edu.ph', '', '147', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('161', 'MEd SPED', 'gs-med-sped@mmsu.edu.ph', '', '148', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('162', 'MEd THE', 'gs-med-the@mmsu.edu.ph', '', '149', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('163', 'MEd TechEd', 'gs-med-teched@mmsu.edu.ph', '', '150', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('164', 'MAN MSN', 'gs-man-msn@mmsu.edu.ph', '', '151', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('165', 'MAN MCHN', 'gs-man-mchn@mmsu.edu.ph', '', '152', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('166', 'MN MSN', 'gs-mn-msn@mmsu.edu.ph', '', '154', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('167', 'MS Biology', 'gs-ms-bio@mmsu.edu.ph', '', '155', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('168', 'MN MCHN', 'gs-mn-mchn@mmsu.edu.ph', '', '153', null, null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
