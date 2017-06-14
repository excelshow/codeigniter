/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : xcx

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-06-14 21:19:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for administrator
-- ----------------------------
DROP TABLE IF EXISTS `administrator`;
CREATE TABLE `administrator` (
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of administrator
-- ----------------------------
INSERT INTO `administrator` VALUES ('admin', '$2y$10$J7vNXZVNx/Z893PLEDelReLaDCJCO675Z8LWCBCCUoG0gyYmM9FA6');

-- ----------------------------
-- Table structure for class
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `class` varchar(5) NOT NULL,
  PRIMARY KEY (`class`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of class
-- ----------------------------
INSERT INTO `class` VALUES ('水果');
INSERT INTO `class` VALUES ('蔬菜');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `prices` double(10,0) NOT NULL,
  `picture` varchar(30) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `num` int(5) NOT NULL,
  `show` bit(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('0001', '蔬菜', '1', '蔬菜.jpg', '我是蔬菜', '0', '\0');
INSERT INTO `goods` VALUES ('0004', 'wen', '12', 'wen.jpg', 'dsafadsf', '0', '\0');

-- ----------------------------
-- Table structure for map_class_id
-- ----------------------------
DROP TABLE IF EXISTS `map_class_id`;
CREATE TABLE `map_class_id` (
  `class` varchar(5) DEFAULT NULL,
  `id` int(4) unsigned zerofill DEFAULT NULL,
  KEY `id` (`id`) USING BTREE,
  KEY `class_id_map_ibfk_1` (`class`),
  CONSTRAINT `map_class_id_ibfk_1` FOREIGN KEY (`class`) REFERENCES `class` (`class`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `map_class_id_ibfk_2` FOREIGN KEY (`id`) REFERENCES `goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of map_class_id
-- ----------------------------
INSERT INTO `map_class_id` VALUES ('水果', '0004');
INSERT INTO `map_class_id` VALUES ('蔬菜', '0001');

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `order_id` varchar(20) NOT NULL COMMENT '年月日+用户编号+用户购买商品次数',
  `user_id` varchar(30) NOT NULL,
  `user_info` varchar(256) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('201706140000100000', 'oPWoL0QVtMJ8kuS2moGcrzgiCG34', '{\"userID\":\"oPWoL0QVtMJ8kuS2moGcrzgiCG34\",\"userAddress\":{\"userName\":\"张三\",\"postalCode\":\"510000\",\"provinceName\":\"广东省\",\"cityName\":\"广州市\",\"countyName\":\"天河区\",\"detailInfo\":\"某巷某号\",\"nationalCode\":\"510630\",\"telNumber\":\"18888888888\"}}');
INSERT INTO `order` VALUES ('201706140000100001', 'oPWoL0QVtMJ8kuS2moGcrzgiCG34', '{\"userID\":\"oPWoL0QVtMJ8kuS2moGcrzgiCG34\",\"userAddress\":{\"userName\":\"张三\",\"postalCode\":\"510000\",\"provinceName\":\"广东省\",\"cityName\":\"广州市\",\"countyName\":\"天河区\",\"detailInfo\":\"某巷某号\",\"nationalCode\":\"510630\",\"telNumber\":\"18888888888\"}}');
INSERT INTO `order` VALUES ('201706140000100002', 'oPWoL0QVtMJ8kuS2moGcrzgiCG34', '{\"userID\":\"oPWoL0QVtMJ8kuS2moGcrzgiCG34\",\"userAddress\":{\"userName\":\"张三\",\"postalCode\":\"510000\",\"provinceName\":\"广东省\",\"cityName\":\"广州市\",\"countyName\":\"天河区\",\"detailInfo\":\"某巷某号\",\"nationalCode\":\"510630\",\"telNumber\":\"18888888888\"}}');
INSERT INTO `order` VALUES ('201706140000100003', 'oPWoL0QVtMJ8kuS2moGcrzgiCG34', '{\"userID\":\"oPWoL0QVtMJ8kuS2moGcrzgiCG34\",\"userAddress\":{\"userName\":\"张三\",\"postalCode\":\"510000\",\"provinceName\":\"广东省\",\"cityName\":\"广州市\",\"countyName\":\"天河区\",\"detailInfo\":\"某巷某号\",\"nationalCode\":\"510630\",\"telNumber\":\"18888888888\"}}');
INSERT INTO `order` VALUES ('201706140000100004', 'oPWoL0QVtMJ8kuS2moGcrzgiCG34', '{\"userID\":\"oPWoL0QVtMJ8kuS2moGcrzgiCG34\",\"userAddress\":{\"userName\":\"张三\",\"postalCode\":\"510000\",\"provinceName\":\"广东省\",\"cityName\":\"广州市\",\"countyName\":\"天河区\",\"detailInfo\":\"某巷某号\",\"nationalCode\":\"510630\",\"telNumber\":\"18888888888\"}}');
INSERT INTO `order` VALUES ('201706140000100005', 'oPWoL0QVtMJ8kuS2moGcrzgiCG34', '{\"userID\":\"oPWoL0QVtMJ8kuS2moGcrzgiCG34\",\"userAddress\":{\"userName\":\"张三\",\"postalCode\":\"510000\",\"provinceName\":\"广东省\",\"cityName\":\"广州市\",\"countyName\":\"天河区\",\"detailInfo\":\"某巷某号\",\"nationalCode\":\"510630\",\"telNumber\":\"18888888888\"}}');
INSERT INTO `order` VALUES ('201706140000100006', 'oPWoL0QVtMJ8kuS2moGcrzgiCG34', '{\"userID\":\"oPWoL0QVtMJ8kuS2moGcrzgiCG34\",\"userAddress\":{\"userName\":\"张三\",\"postalCode\":\"510000\",\"provinceName\":\"广东省\",\"cityName\":\"广州市\",\"countyName\":\"天河区\",\"detailInfo\":\"某巷某号\",\"nationalCode\":\"510630\",\"telNumber\":\"18888888888\"}}');
INSERT INTO `order` VALUES ('201706140000100007', 'oPWoL0QVtMJ8kuS2moGcrzgiCG34', '{\"userID\":\"oPWoL0QVtMJ8kuS2moGcrzgiCG34\",\"userAddress\":{\"userName\":\"张三\",\"postalCode\":\"510000\",\"provinceName\":\"广东省\",\"cityName\":\"广州市\",\"countyName\":\"天河区\",\"detailInfo\":\"某巷某号\",\"nationalCode\":\"510630\",\"telNumber\":\"18888888888\"}}');
INSERT INTO `order` VALUES ('201706140000100008', 'oPWoL0QVtMJ8kuS2moGcrzgiCG34', '{\"userID\":\"oPWoL0QVtMJ8kuS2moGcrzgiCG34\",\"userAddress\":{\"userName\":\"张三\",\"postalCode\":\"510000\",\"provinceName\":\"广东省\",\"cityName\":\"广州市\",\"countyName\":\"天河区\",\"detailInfo\":\"某巷某号\",\"nationalCode\":\"510630\",\"telNumber\":\"18888888888\"}}');
INSERT INTO `order` VALUES ('201706140000100009', 'oPWoL0QVtMJ8kuS2moGcrzgiCG34', '{\"userID\":\"oPWoL0QVtMJ8kuS2moGcrzgiCG34\",\"userAddress\":{\"userName\":\"张三\",\"postalCode\":\"510000\",\"provinceName\":\"广东省\",\"cityName\":\"广州市\",\"countyName\":\"天河区\",\"detailInfo\":\"某巷某号\",\"nationalCode\":\"510630\",\"telNumber\":\"18888888888\"}}');
INSERT INTO `order` VALUES ('201706140000100010', 'oPWoL0QVtMJ8kuS2moGcrzgiCG34', '{\"userID\":\"oPWoL0QVtMJ8kuS2moGcrzgiCG34\",\"userAddress\":{\"userName\":\"张三\",\"postalCode\":\"510000\",\"provinceName\":\"广东省\",\"cityName\":\"广州市\",\"countyName\":\"天河区\",\"detailInfo\":\"某巷某号\",\"nationalCode\":\"510630\",\"telNumber\":\"18888888888\"}}');
INSERT INTO `order` VALUES ('201706140000100011', 'oPWoL0QVtMJ8kuS2moGcrzgiCG34', '{\"userID\":\"oPWoL0QVtMJ8kuS2moGcrzgiCG34\",\"userAddress\":{\"userName\":\"张三\",\"postalCode\":\"510000\",\"provinceName\":\"广东省\",\"cityName\":\"广州市\",\"countyName\":\"天河区\",\"detailInfo\":\"某巷某号\",\"nationalCode\":\"510630\",\"telNumber\":\"18888888888\"}}');
INSERT INTO `order` VALUES ('201706140000100012', 'oPWoL0QVtMJ8kuS2moGcrzgiCG34', '{\"userID\":\"oPWoL0QVtMJ8kuS2moGcrzgiCG34\",\"userAddress\":{\"userName\":\"张三\",\"postalCode\":\"510000\",\"provinceName\":\"广东省\",\"cityName\":\"广州市\",\"countyName\":\"天河区\",\"detailInfo\":\"某巷某号\",\"nationalCode\":\"510630\",\"telNumber\":\"18888888888\"}}');
INSERT INTO `order` VALUES ('201706140000100013', 'oPWoL0QVtMJ8kuS2moGcrzgiCG34', '{\"userID\":\"oPWoL0QVtMJ8kuS2moGcrzgiCG34\",\"userAddress\":{\"userName\":\"张三\",\"postalCode\":\"510000\",\"provinceName\":\"广东省\",\"cityName\":\"广州市\",\"countyName\":\"天河区\",\"detailInfo\":\"某巷某号\",\"nationalCode\":\"510630\",\"telNumber\":\"18888888888\"}}');
INSERT INTO `order` VALUES ('201706140000100014', 'oPWoL0QVtMJ8kuS2moGcrzgiCG34', '{\"userID\":\"oPWoL0QVtMJ8kuS2moGcrzgiCG34\",\"userAddress\":{\"userName\":\"张三\",\"postalCode\":\"510000\",\"provinceName\":\"广东省\",\"cityName\":\"广州市\",\"countyName\":\"天河区\",\"detailInfo\":\"某巷某号\",\"nationalCode\":\"510630\",\"telNumber\":\"18888888888\"}}');
INSERT INTO `order` VALUES ('201706140000100015', 'oPWoL0QVtMJ8kuS2moGcrzgiCG34', '{\"userID\":\"oPWoL0QVtMJ8kuS2moGcrzgiCG34\",\"userAddress\":{\"userName\":\"张三\",\"postalCode\":\"510000\",\"provinceName\":\"广东省\",\"cityName\":\"广州市\",\"countyName\":\"天河区\",\"detailInfo\":\"某巷某号\",\"nationalCode\":\"510630\",\"telNumber\":\"18888888888\"}}');
INSERT INTO `order` VALUES ('201706140000100016', 'oPWoL0QVtMJ8kuS2moGcrzgiCG34', '{\"userID\":\"oPWoL0QVtMJ8kuS2moGcrzgiCG34\",\"userAddress\":{\"userName\":\"张三\",\"postalCode\":\"510000\",\"provinceName\":\"广东省\",\"cityName\":\"广州市\",\"countyName\":\"天河区\",\"detailInfo\":\"某巷某号\",\"nationalCode\":\"510630\",\"telNumber\":\"18888888888\"}}');
INSERT INTO `order` VALUES ('201706140000100017', 'oPWoL0QVtMJ8kuS2moGcrzgiCG34', '{\"userID\":\"oPWoL0QVtMJ8kuS2moGcrzgiCG34\",\"userAddress\":{\"userName\":\"张三\",\"postalCode\":\"510000\",\"provinceName\":\"广东省\",\"cityName\":\"广州市\",\"countyName\":\"天河区\",\"detailInfo\":\"某巷某号\",\"nationalCode\":\"510630\",\"telNumber\":\"18888888888\"}}');
INSERT INTO `order` VALUES ('201706140000100018', 'oPWoL0QVtMJ8kuS2moGcrzgiCG34', '{\"userID\":\"oPWoL0QVtMJ8kuS2moGcrzgiCG34\",\"userAddress\":{\"userName\":\"张三\",\"postalCode\":\"510000\",\"provinceName\":\"广东省\",\"cityName\":\"广州市\",\"countyName\":\"天河区\",\"detailInfo\":\"某巷某号\",\"nationalCode\":\"510630\",\"telNumber\":\"18888888888\"}}');
INSERT INTO `order` VALUES ('201706140000100019', 'oPWoL0QVtMJ8kuS2moGcrzgiCG34', '{\"userID\":\"oPWoL0QVtMJ8kuS2moGcrzgiCG34\",\"userAddress\":{\"userName\":\"张三\",\"postalCode\":\"510000\",\"provinceName\":\"广东省\",\"cityName\":\"广州市\",\"countyName\":\"天河区\",\"detailInfo\":\"某巷某号\",\"nationalCode\":\"510630\",\"telNumber\":\"18888888888\"}}');
INSERT INTO `order` VALUES ('201706140000100020', 'oPWoL0QVtMJ8kuS2moGcrzgiCG34', '{\"userID\":\"oPWoL0QVtMJ8kuS2moGcrzgiCG34\",\"userAddress\":{\"userName\":\"张三\",\"postalCode\":\"510000\",\"provinceName\":\"广东省\",\"cityName\":\"广州市\",\"countyName\":\"天河区\",\"detailInfo\":\"某巷某号\",\"nationalCode\":\"510630\",\"telNumber\":\"18888888888\"}}');

-- ----------------------------
-- Table structure for order_content
-- ----------------------------
DROP TABLE IF EXISTS `order_content`;
CREATE TABLE `order_content` (
  `order_id` varchar(20) NOT NULL,
  `goods_id` int(4) unsigned zerofill NOT NULL,
  `select_num` int(11) NOT NULL,
  KEY `order_id` (`order_id`),
  KEY `goods_id` (`goods_id`),
  CONSTRAINT `order_content_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_content_ibfk_2` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_content
-- ----------------------------
INSERT INTO `order_content` VALUES ('201706140000100020', '0004', '1');
INSERT INTO `order_content` VALUES ('201706140000100020', '0001', '1');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_no` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `user_id` varchar(30) NOT NULL,
  `user_num` int(5) unsigned zerofill NOT NULL,
  PRIMARY KEY (`user_no`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('00001', 'oPWoL0QVtMJ8kuS2moGcrzgiCG34', '00021');
