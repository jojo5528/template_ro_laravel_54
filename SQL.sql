/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : rowoe_main

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-03-24 03:34:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for devkurov_failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `devkurov_failed_jobs`;
CREATE TABLE `devkurov_failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of devkurov_failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for devkurov_migrations
-- ----------------------------
DROP TABLE IF EXISTS `devkurov_migrations`;
CREATE TABLE `devkurov_migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of devkurov_migrations
-- ----------------------------
INSERT INTO `devkurov_migrations` VALUES ('1', '2020_03_24_003523_devkurov_failed_jobs', '1');
INSERT INTO `devkurov_migrations` VALUES ('2', '2020_03_24_004149_WoeCastles', '1');

-- ----------------------------
-- Table structure for devkurov_woe_castles
-- ----------------------------
DROP TABLE IF EXISTS `devkurov_woe_castles`;
CREATE TABLE `devkurov_woe_castles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `castle_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of devkurov_woe_castles
-- ----------------------------
INSERT INTO `devkurov_woe_castles` VALUES ('1', '0', 'Neuschwanstein');
INSERT INTO `devkurov_woe_castles` VALUES ('2', '1', 'Hohenschwangau');
INSERT INTO `devkurov_woe_castles` VALUES ('3', '2', 'Nuernberg');
INSERT INTO `devkurov_woe_castles` VALUES ('4', '3', 'Wuerzburg');
INSERT INTO `devkurov_woe_castles` VALUES ('5', '4', 'Rothenburg');
INSERT INTO `devkurov_woe_castles` VALUES ('6', '5', 'Repherion');
INSERT INTO `devkurov_woe_castles` VALUES ('7', '6', 'Eeyolbriggar');
INSERT INTO `devkurov_woe_castles` VALUES ('8', '7', 'Yesnelph');
INSERT INTO `devkurov_woe_castles` VALUES ('9', '8', 'Bergel');
INSERT INTO `devkurov_woe_castles` VALUES ('10', '9', 'Mersetzdeitz');
INSERT INTO `devkurov_woe_castles` VALUES ('11', '10', 'Bright Arbor');
INSERT INTO `devkurov_woe_castles` VALUES ('12', '11', 'Scarlet Palace');
INSERT INTO `devkurov_woe_castles` VALUES ('13', '12', 'Holy Shadow');
INSERT INTO `devkurov_woe_castles` VALUES ('14', '13', 'Sacred Altar');
INSERT INTO `devkurov_woe_castles` VALUES ('15', '14', 'Bamboo Grove Hill');
INSERT INTO `devkurov_woe_castles` VALUES ('16', '15', 'Kriemhild');
INSERT INTO `devkurov_woe_castles` VALUES ('17', '16', 'Swanhild');
INSERT INTO `devkurov_woe_castles` VALUES ('18', '17', 'Fadhgridh');
INSERT INTO `devkurov_woe_castles` VALUES ('19', '18', 'Skoegul');
INSERT INTO `devkurov_woe_castles` VALUES ('20', '19', 'Gondul');
INSERT INTO `devkurov_woe_castles` VALUES ('21', '20', 'Earth');
INSERT INTO `devkurov_woe_castles` VALUES ('22', '21', 'Air');
INSERT INTO `devkurov_woe_castles` VALUES ('23', '22', 'Water');
INSERT INTO `devkurov_woe_castles` VALUES ('24', '23', 'Fire');
INSERT INTO `devkurov_woe_castles` VALUES ('25', '24', 'Himinn');
INSERT INTO `devkurov_woe_castles` VALUES ('26', '25', 'Andlangr');
INSERT INTO `devkurov_woe_castles` VALUES ('27', '26', 'Viblainn');
INSERT INTO `devkurov_woe_castles` VALUES ('28', '27', 'Hljod');
INSERT INTO `devkurov_woe_castles` VALUES ('29', '28', 'Skidbladnir');
INSERT INTO `devkurov_woe_castles` VALUES ('30', '29', 'Mardol');
INSERT INTO `devkurov_woe_castles` VALUES ('31', '30', 'Cyr');
INSERT INTO `devkurov_woe_castles` VALUES ('32', '31', 'Horn');
INSERT INTO `devkurov_woe_castles` VALUES ('33', '32', 'Gefn');
INSERT INTO `devkurov_woe_castles` VALUES ('34', '33', 'Bandis');
INSERT INTO `devkurov_woe_castles` VALUES ('35', '34', 'Kafragarten 1');
INSERT INTO `devkurov_woe_castles` VALUES ('36', '35', 'Kafragarten 2');
INSERT INTO `devkurov_woe_castles` VALUES ('37', '36', 'Kafragarten 3');
INSERT INTO `devkurov_woe_castles` VALUES ('38', '37', 'Kafragarten 4');
INSERT INTO `devkurov_woe_castles` VALUES ('39', '38', 'Kafragarten 5');
INSERT INTO `devkurov_woe_castles` VALUES ('40', '39', 'Gloria 1');
INSERT INTO `devkurov_woe_castles` VALUES ('41', '40', 'Gloria 2');
INSERT INTO `devkurov_woe_castles` VALUES ('42', '41', 'Gloria 3');
INSERT INTO `devkurov_woe_castles` VALUES ('43', '42', 'Gloria 4');
INSERT INTO `devkurov_woe_castles` VALUES ('44', '43', 'Gloria 5');
