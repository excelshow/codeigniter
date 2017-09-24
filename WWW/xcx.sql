/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : xcx

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-09-24 17:08:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for administrator
-- ----------------------------
DROP TABLE IF EXISTS `administrator`;
CREATE TABLE `administrator` (
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for deliver
-- ----------------------------
DROP TABLE IF EXISTS `deliver`;
CREATE TABLE `deliver` (
  `deliver_id` varchar(3) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `account` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `status` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`deliver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `prices` double(5,2) NOT NULL,
  `origin` varchar(20) DEFAULT NULL,
  `show` bit(1) NOT NULL COMMENT '是否显示？',
  `filenum` int(1) DEFAULT '0' COMMENT '商品文件个数',
  `have` int(5) DEFAULT '0' COMMENT '商品实际库存',
  `pre_input` int(5) NOT NULL COMMENT '预入库库存',
  `num` int(5) NOT NULL COMMENT '前台显示库存',
  `spec` varchar(3) NOT NULL DEFAULT '',
  `odd` int(1) NOT NULL DEFAULT '0' COMMENT '特供',
  PRIMARY KEY (`id`),
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for goods_class
-- ----------------------------
DROP TABLE IF EXISTS `goods_class`;
CREATE TABLE `goods_class` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `class` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for goods_comment
-- ----------------------------
DROP TABLE IF EXISTS `goods_comment`;
CREATE TABLE `goods_comment` (
  `comment_id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `user_id` varchar(30) NOT NULL,
  `goods_id` int(4) unsigned NOT NULL,
  `comment` varchar(100) DEFAULT NULL,
  `reply` varchar(100) DEFAULT NULL,
  `show` bit(1) NOT NULL DEFAULT b'1',
  `time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`),
  KEY `goods_id` (`goods_id`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `goods_comment_ibfk_1` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goods_comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for goods_content
-- ----------------------------
DROP TABLE IF EXISTS `goods_content`;
CREATE TABLE `goods_content` (
  `goods_id` int(4) unsigned NOT NULL,
  `eat` text,
  `function` text,
  `save` text,
  KEY `goods_id` (`goods_id`) USING BTREE,
  CONSTRAINT `goods_content_ibfk_1` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for map_class_id
-- ----------------------------
DROP TABLE IF EXISTS `map_class_id`;
CREATE TABLE `map_class_id` (
  `class` int(4) DEFAULT NULL,
  `id` int(4) unsigned DEFAULT NULL,
  KEY `id` (`id`) USING BTREE,
  KEY `class_id_map_ibfk_1` (`class`) USING BTREE,
  CONSTRAINT `map_class_id_ibfk_1` FOREIGN KEY (`class`) REFERENCES `goods_class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `map_class_id_ibfk_2` FOREIGN KEY (`id`) REFERENCES `goods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for map_delive_order
-- ----------------------------
DROP TABLE IF EXISTS `map_delive_order`;
CREATE TABLE `map_delive_order` (
  `deliver_id` varchar(3) NOT NULL,
  `order_id` varchar(16) NOT NULL,
  KEY `deliver_id` (`deliver_id`) USING BTREE,
  KEY `order_id` (`order_id`) USING BTREE,
  CONSTRAINT `map_delive_order_ibfk_1` FOREIGN KEY (`deliver_id`) REFERENCES `deliver` (`deliver_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `map_delive_order_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `user_id` varchar(30) NOT NULL,
  `num` int(2) unsigned NOT NULL DEFAULT '0',
  KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for must_address
-- ----------------------------
DROP TABLE IF EXISTS `must_address`;
CREATE TABLE `must_address` (
  `NO` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `address` varchar(30) NOT NULL,
  PRIMARY KEY (`NO`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `order_id` varchar(16) NOT NULL COMMENT '年月日+用户编号+用户购买商品次数',
  `user_id` varchar(30) NOT NULL,
  `money` double(5,2) unsigned NOT NULL,
  `datetime` bigint(20) DEFAULT NULL,
  `orderInfo` text,
  `status` int(1) NOT NULL DEFAULT '0',
  `pay_way` varchar(5) DEFAULT NULL,
  `orderTime` bigint(20) DEFAULT NULL,
  `comment` varchar(100) DEFAULT NULL,
  `reply` varchar(100) DEFAULT NULL,
  `type` bit(1) NOT NULL DEFAULT b'1' COMMENT '1:定点自取；0：送货上门；',
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for order_content
-- ----------------------------
DROP TABLE IF EXISTS `order_content`;
CREATE TABLE `order_content` (
  `order_id` varchar(16) NOT NULL,
  `goods_id` int(4) unsigned zerofill NOT NULL,
  `select_num` int(11) NOT NULL,
  `stocked` bit(1) NOT NULL DEFAULT b'0' COMMENT '是否备货？',
  `act_num` double(5,2) unsigned DEFAULT NULL,
  KEY `order_id` (`order_id`) USING BTREE,
  KEY `goods_id` (`goods_id`) USING BTREE,
  CONSTRAINT `order_content_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_content_ibfk_2` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_no` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `user_name` varchar(10) DEFAULT NULL,
  `user_id` varchar(30) NOT NULL,
  `user_num` int(3) unsigned zerofill NOT NULL,
  `user_estate` varchar(20) DEFAULT NULL,
  `user_address` varchar(20) DEFAULT NULL,
  `user_phone` varchar(20) DEFAULT NULL,
  `status` bit(1) DEFAULT b'0',
  PRIMARY KEY (`user_no`),
  UNIQUE KEY `user_id_2` (`user_id`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for user_address
-- ----------------------------
DROP TABLE IF EXISTS `user_address`;
CREATE TABLE `user_address` (
  `NO` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `address` varchar(30) NOT NULL,
  PRIMARY KEY (`NO`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- View structure for goods_comment_view
-- ----------------------------
DROP VIEW IF EXISTS `goods_comment_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `goods_comment_view` AS select `goods`.`name` AS `name`,`goods`.`num` AS `num`,`goods_comment`.`goods_id` AS `goods_id`,`goods_comment`.`comment` AS `comment`,`goods_comment`.`reply` AS `reply`,`goods_comment`.`show` AS `show`,`user`.`user_name` AS `user_name`,`user`.`user_id` AS `user_id`,`goods_comment`.`comment_id` AS `comment_id`,`goods`.`id` AS `id` from ((`goods` join `goods_comment` on((`goods_comment`.`goods_id` = `goods`.`id`))) join `user` on((`goods_comment`.`user_id` = `user`.`user_id`))) ;

-- ----------------------------
-- View structure for goods_detail_view
-- ----------------------------
DROP VIEW IF EXISTS `goods_detail_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `goods_detail_view` AS select `goods`.`id` AS `id`,`goods`.`name` AS `name`,`goods`.`prices` AS `prices`,`goods`.`origin` AS `origin`,`goods`.`num` AS `num`,`goods`.`show` AS `show`,`goods`.`filenum` AS `filenum`,`goods`.`have` AS `have`,`goods_content`.`eat` AS `eat`,`goods_content`.`function` AS `function`,`goods_content`.`save` AS `save`,`goods`.`pre_input` AS `pre_input`,`map_class_id`.`class` AS `class` from ((`goods` join `goods_content` on((`goods_content`.`goods_id` = `goods`.`id`))) join `map_class_id` on((`map_class_id`.`id` = `goods`.`id`))) ;

-- ----------------------------
-- View structure for goods_view
-- ----------------------------
DROP VIEW IF EXISTS `goods_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `goods_view` AS select `goods`.`id` AS `id`,`goods`.`name` AS `name`,`goods`.`prices` AS `prices`,`goods`.`origin` AS `origin`,`goods`.`show` AS `show`,`goods`.`filenum` AS `filenum`,`goods`.`have` AS `have`,`goods`.`pre_input` AS `pre_input`,`goods`.`num` AS `num`,`goods`.`spec` AS `spec`,`goods_class`.`class` AS `class`,`goods_class`.`id` AS `class_id`,`goods`.`odd` AS `odd` from ((`map_class_id` join `goods` on((`map_class_id`.`id` = `goods`.`id`))) join `goods_class` on((`map_class_id`.`class` = `goods_class`.`id`))) ;

-- ----------------------------
-- View structure for order_view
-- ----------------------------
DROP VIEW IF EXISTS `order_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `order_view` AS select `orders`.`order_id` AS `order_id`,`orders`.`user_id` AS `user_id`,`orders`.`money` AS `money`,`orders`.`datetime` AS `datetime`,`orders`.`orderInfo` AS `orderInfo`,`orders`.`status` AS `status`,`orders`.`pay_way` AS `pay_way`,`orders`.`orderTime` AS `orderTime`,`order_content`.`goods_id` AS `goods_id`,`order_content`.`select_num` AS `select_num`,`order_content`.`stocked` AS `stocked`,`order_content`.`act_num` AS `act_num`,`map_delive_order`.`deliver_id` AS `deliver_id` from ((`orders` join `order_content` on((`order_content`.`order_id` = `orders`.`order_id`))) join `map_delive_order` on((`map_delive_order`.`order_id` = `orders`.`order_id`))) ;
DROP TRIGGER IF EXISTS `change_num`;
DELIMITER ;;
CREATE TRIGGER `change_num` BEFORE UPDATE ON `goods` FOR EACH ROW BEGIN
	 set new.num = new.pre_input + new.have;
end
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `add`;
DELIMITER ;;
CREATE TRIGGER `add` AFTER INSERT ON `orders` FOR EACH ROW BEGIN 
	update user set user_num=user_num+1 where user_id=NEW.user_id;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `sub_goods`;
DELIMITER ;;
CREATE TRIGGER `sub_goods` AFTER INSERT ON `order_content` FOR EACH ROW begin
  update goods set have = have - new.select_num where id = new.goods_id;
end
;;
DELIMITER ;
