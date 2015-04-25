/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50542
Source Host           : localhost:3306
Source Database       : nobetcieczaneler

Target Server Type    : MYSQL
Target Server Version : 50542
File Encoding         : 65001

Date: 2015-04-25 12:47:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for eczaneler
-- ----------------------------
DROP TABLE IF EXISTS `eczaneler`;
CREATE TABLE `eczaneler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ilce_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `eczane_adi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `eczaci_adi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `adres` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `telefon` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `fax` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  `harita` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=234 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for ilceler
-- ----------------------------
DROP TABLE IF EXISTS `ilceler`;
CREATE TABLE `ilceler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ilce` varchar(255) DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin5;
