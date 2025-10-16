/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : eyoucms_develop

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-09-13 14:30:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for #@__weapp_rjypay
-- ----------------------------
DROP TABLE IF EXISTS `#@__weapp_usersconcern`;
CREATE TABLE `#@__weapp_usersconcern` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(10) DEFAULT NULL,
  `cn_users_id` int(10) DEFAULT NULL,
  `lang` varchar(50) DEFAULT '' COMMENT '语言标识',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态(1=已关注，0=未关注)',
  `add_time` int(11) DEFAULT '0' COMMENT '新增时间',
  `update_time` int(11) DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;