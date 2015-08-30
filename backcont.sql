/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50619
Source Host           : localhost:3306
Source Database       : backcont

Target Server Type    : MYSQL
Target Server Version : 50619
File Encoding         : 65001

Date: 2015-08-30 20:17:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `back_access`
-- ----------------------------
DROP TABLE IF EXISTS `back_access`;
CREATE TABLE `back_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `node_id` int(10) unsigned NOT NULL,
  `level` int(1) NOT NULL,
  `module` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of back_access
-- ----------------------------
INSERT INTO `back_access` VALUES ('1', '3', '5', '3', '', '2');

-- ----------------------------
-- Table structure for `back_node`
-- ----------------------------
DROP TABLE IF EXISTS `back_node`;
CREATE TABLE `back_node` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `remark` varchar(255) DEFAULT NULL,
  `sort` int(6) unsigned DEFAULT NULL,
  `pid` int(3) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL COMMENT '1:表示应用（模块）；2:表示控制器；3：表示方法',
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of back_node
-- ----------------------------
INSERT INTO `back_node` VALUES ('1', 'Developer', '开发者', '1', null, null, '7', '2');
INSERT INTO `back_node` VALUES ('2', 'Admin', '管理员', '1', null, null, '7', '2');
INSERT INTO `back_node` VALUES ('3', 'User', '用户', '1', null, null, '7', '2');
INSERT INTO `back_node` VALUES ('4', 'Visiter', '游客', '1', null, null, '7', '2');
INSERT INTO `back_node` VALUES ('5', 'userController', '用户管理', '1', null, null, '2', '3');
INSERT INTO `back_node` VALUES ('6', 'userDate', '用户数据', '1', null, null, '2', '3');
INSERT INTO `back_node` VALUES ('7', 'app', '项目', '1', null, null, '0', '0');

-- ----------------------------
-- Table structure for `back_role`
-- ----------------------------
DROP TABLE IF EXISTS `back_role`;
CREATE TABLE `back_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` int(1) NOT NULL DEFAULT '1',
  `status` int(1) unsigned NOT NULL,
  `remark` varchar(255) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of back_role
-- ----------------------------
INSERT INTO `back_role` VALUES ('1', 'developer', '0', '1', '网站开发者', '2015-08-30 09:37:30', '2015-08-30 09:37:35');
INSERT INTO `back_role` VALUES ('2', 'admin', '1', '1', '管理员', '2015-08-30 09:38:31', '2015-08-30 09:38:34');
INSERT INTO `back_role` VALUES ('4', 'visiter', '3', '1', '游客', '2015-08-30 09:39:50', '2015-08-30 09:39:55');
INSERT INTO `back_role` VALUES ('3', 'user', '2', '1', '用户', '2015-08-30 09:39:47', '2015-08-30 09:39:53');

-- ----------------------------
-- Table structure for `back_role_user`
-- ----------------------------
DROP TABLE IF EXISTS `back_role_user`;
CREATE TABLE `back_role_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` char(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of back_role_user
-- ----------------------------
INSERT INTO `back_role_user` VALUES ('1', '1', '1');
INSERT INTO `back_role_user` VALUES ('2', '2', '2');
INSERT INTO `back_role_user` VALUES ('3', '3', '3');
INSERT INTO `back_role_user` VALUES ('4', '3', '4');

-- ----------------------------
-- Table structure for `back_user`
-- ----------------------------
DROP TABLE IF EXISTS `back_user`;
CREATE TABLE `back_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nick_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bind_user_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` datetime NOT NULL,
  `login_time` int(11) NOT NULL,
  `qq` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `verify` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of back_user
-- ----------------------------
INSERT INTO `back_user` VALUES ('1', 'develop', '开发者', '123123', null, '2015-08-30 18:48:42', '0', '123456', '1', null);
INSERT INTO `back_user` VALUES ('2', 'admin', '管理员1', '123456', null, '2015-08-30 19:58:14', '3', '0', '1', null);
INSERT INTO `back_user` VALUES ('3', 'user1', '用户1', '123456', '4', '2015-08-30 19:52:42', '1', '0', '1', null);
INSERT INTO `back_user` VALUES ('4', 'user2', '用户2', '123456', null, '2015-08-30 14:37:14', '0', '0', '1', null);
