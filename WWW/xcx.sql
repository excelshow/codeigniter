/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1_3306
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : xcx

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-06-27 22:15:09
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
  `origin` varchar(50) DEFAULT NULL,
  `num` int(5) NOT NULL,
  `show` bit(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('0005', '黄瓜', '9', '黄瓜.jpg', '广东花都', '5', '');
INSERT INTO `goods` VALUES ('0006', '杨梅', '16', '杨梅.jpg', '湖南宜章', '6', '');

-- ----------------------------
-- Table structure for goods_content
-- ----------------------------
DROP TABLE IF EXISTS `goods_content`;
CREATE TABLE `goods_content` (
  `goods_id` int(4) unsigned zerofill NOT NULL,
  `eat` text,
  `function` text,
  `save` text,
  KEY `goods_id` (`goods_id`),
  CONSTRAINT `goods_content_ibfk_1` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods_content
-- ----------------------------
INSERT INTO `goods_content` VALUES ('0005', '1、糖醋黄瓜片黄瓜500克，精盐、白糖、白醋各适量。先将黄瓜去籽洗净，切成薄片，精盐腌渍30分钟；用冷开水洗去黄瓜的部分咸味，水控干后，加精盐、糖、醋腌1小时即成。此菜肴酸甜可口，具有清热开胃，生津止渴的功效，适用于烦渴，口腻，脘痞等病症，暑天食之尤佳。\r\n2、紫菜黄瓜汤黄瓜150克，紫菜15克，海米适量。先将黄瓜洗净切成菱形片状，紫菜、海米亦洗净；锅内加入清汤，烧沸后，投入黄瓜、海米、精盐、酱油，煮沸后撇浮沫，下入紫菜，淋上香油，撒入味精，调匀即成。此汤具有清热益肾之功，适用于妇女更年期肾虚烦热之患者食之。\r\n3、山楂汁拌黄瓜嫩黄瓜5 条，山植30克，白糖50克。先将黄瓜去皮心及两头，洗净切成条状；山楂洗净，入锅中加水200毫升，煮约15分钟，取汁液100毫升；黄瓜条入锅中加水煮熟，捞出；山楂汁中放入白糖，在文火上慢熬，待糖融化，投入已控干水的黄瓜条拌匀即成。此菜肴具有清热降脂，减肥消积的作用，肥胖症、高血压、咽喉肿痛者食之有效。\r\n4、黄瓜蒲公英粥黄瓜、大米各50克，新鲜蒲公英30克。先将黄瓜洗净切片，蒲公英洗净切碎；大米淘洗先入锅中，加水 1000毫升，如常法煮粥，待粥熟时，加入黄瓜、蒲公英，再煮片刻，即可食之。本粥具有清热解暑，利尿消肿之功效。适用于热毒炽盛，咽喉肿痛，风热眼疾，小便短赤等病症。\r\n', '1.抗肿瘤\r\n黄瓜中含有的葫芦素C具有提高人体免疫功能的作用，达到抗肿瘤目的。此外，该物质还可治疗慢性肝炎和迁延性肝炎，对原发性肝癌患者有延长生存期作用。\r\n2.抗衰老\r\n黄瓜中含有丰富的维生素E，可起到延年益寿，抗衰老的作用;黄瓜中的黄瓜酶，有很强的生物活性，能有效地促进机体的新陈代谢。用黄瓜捣汁涂擦皮肤，有润肤，舒展皱纹功效。\r\n3.防酒精中毒\r\n黄瓜中所含的丙氨酸、精氨酸和谷胺酰胺对肝脏病人，特别是对酒精性肝硬化患者有一定辅助治疗作用，可防治酒精中毒。\r\n4.降血糖\r\n黄瓜中所含的葡萄糖甙、果糖等不参与通常的糖代谢，故糖尿病人以黄瓜代淀粉类食物充饥，血糖非但不会升高，甚至会降低。\r\n5.减肥强体\r\n黄瓜中所含的丙醇二酸，可抑制糖类物质转变为脂肪。此外，黄瓜中的纤维素对促进人体肠道内腐败物质的排除和降低胆固醇有一定作用，能强身健体。\r\n6.健脑安神\r\n含有维生素B1，对改善大脑和神经系统功能有利，能安神定志，辅助治疗失眠症。\r\n', '黄瓜晾干，用保险袋包好，扎好袋口后放入冰箱能保存长久。');
INSERT INTO `goods_content` VALUES ('0006', '1.食用杨梅后应及时漱口或刷牙，以免损坏牙齿。\r\n2.淡盐水泡10分钟之后再吃，或食用时蘸少许盐则更加鲜美可口。\r\n3.可以制作成杨梅烧酒、杨梅罐头、杨梅干，杨梅蜜饯等食用。也可以煎汤服用。还可以与其他食品一起做成杨梅粥食用\r\n', '1.助消化增食欲\r\n杨梅含有多种有机酸，维生素C的含量也十分丰富，鲜果味酸，食之可增加胃中酸度，消化食物，促进食欲。\r\n2.收敛消炎止泻\r\n杨梅性味酸涩，具有收敛消炎作用，加之其对大肠杆菌、痢疾杆菌等细菌有抑制作用，故能治痢疾腹痛，对下痢不止者有良效。\r\n3.防癌抗癌\r\n杨梅中含有维生素C、B，对防癌抗癌有积极作用。杨梅果仁中所含的氰氨类、脂肪油等也有抑制癌细胞的作用。\r\n4.祛暑生津\r\n杨梅鲜果能和中消食，生津止渴，是夏季祛暑之良品，可以预防中暑，去痧，解除烦渴。所含的果酸既能开胃生津，消食解暑，又有阻止体内的糖向脂肪转化的功能，有助于减肥。\r\n', '放在0-0.5℃的冰箱冷藏室中，在相对湿度为85%-90%的环境下保存。\r\n提醒：杨梅千万不能清洗之后贮藏。\r\n');

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
INSERT INTO `map_class_id` VALUES ('蔬菜', '0005');
INSERT INTO `map_class_id` VALUES ('水果', '0006');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `order_id` varchar(20) NOT NULL COMMENT '年月日+用户编号+用户购买商品次数',
  `status` int(1) unsigned zerofill NOT NULL DEFAULT '0',
  `user_id` varchar(30) NOT NULL,
  `user_info` varchar(256) NOT NULL,
  `money` double(5,0) unsigned NOT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1243', '0', 'oPWoL0QVtMJ8kuS2moGcrzgiCG34', '2124', '2', null);
INSERT INTO `orders` VALUES ('234432', '0', 'oPWoL0QVtMJ8kuS2moGcrzgiCG34', '外贸总监', '0', null);

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
  CONSTRAINT `order_content_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_content_ibfk_2` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_content
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_no` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `user_name` varchar(10) DEFAULT NULL,
  `user_id` varchar(30) NOT NULL,
  `user_num` int(5) unsigned NOT NULL,
  `user_phone` varchar(20) DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`user_no`,`user_id`),
  UNIQUE KEY `user_id_2` (`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('00001', '李勤思', 'oPWoL0QVtMJ8kuS2moGcrzgiCG34', '22', '13537167846', '');
DROP TRIGGER IF EXISTS `add`;
DELIMITER ;;
CREATE TRIGGER `add` AFTER INSERT ON `orders` FOR EACH ROW BEGIN 
	update user set user_num=user_num+1 where user_id=NEW.user_id;
END
;;
DELIMITER ;
