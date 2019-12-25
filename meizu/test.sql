/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2019-11-21 18:26:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blog_admin
-- ----------------------------
DROP TABLE IF EXISTS `blog_admin`;
CREATE TABLE `blog_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL COMMENT '用户名',
  `password` varchar(40) DEFAULT NULL COMMENT '密码',
  `nickname` varchar(20) DEFAULT NULL COMMENT '用户名',
  `phone` varchar(15) DEFAULT NULL COMMENT '手机号',
  `email` varchar(30) DEFAULT NULL COMMENT '邮箱',
  `heading` varchar(60) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL COMMENT '备注信息',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(10) DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='用户表';

-- ----------------------------
-- Records of blog_admin
-- ----------------------------
INSERT INTO `blog_admin` VALUES ('1', '111', '123456', '测试', '15976012214', '2868813344444@qq.com', null, null, '0', '1550384771', '1550384771');
INSERT INTO `blog_admin` VALUES ('2', 'zhangsan', '123456', '张三', '15976032214', '2822268812@qq.com', null, null, '0', '1550384771', '1550384771');
INSERT INTO `blog_admin` VALUES ('3', 'lisi', '12345', 'lisi', '1352838848', '34@qq.com', null, null, '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('4', '2222', '888888', null, '15976021214', '286863096@qq.com', null, null, '0', '1568550720', '1568550720');

-- ----------------------------
-- Table structure for blog_article
-- ----------------------------
DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` tinyint(1) NOT NULL DEFAULT '0' COMMENT '文章类型',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '网站编辑id',
  `title` varchar(255) NOT NULL COMMENT '文章标题',
  `cover_img` varchar(255) DEFAULT NULL COMMENT '文章封面',
  `describe` varchar(255) DEFAULT NULL COMMENT '文章描述',
  `content` mediumtext NOT NULL COMMENT '文章内容',
  `recommend` int(10) DEFAULT '0' COMMENT '推荐级别',
  `praise` int(11) DEFAULT '0' COMMENT '点赞量',
  `clicks` int(10) DEFAULT '0' COMMENT '点击量',
  `sort` int(10) DEFAULT '0' COMMENT '排序',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `price` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `index_article_title` (`title`) USING BTREE,
  KEY `index_article_sort` (`sort`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='博客文章表';

-- ----------------------------
-- Records of blog_article
-- ----------------------------

INSERT INTO `blog_article` VALUES ('59', '4', '2', '魅族1', 'articleuploads/20191020/7.jpg', null, '<p>&lt;p&gt;gagagagagagagagagagagagagaga&lt;/p&gt;</p>', '0', '0', '0', '0', '999999999', '0', '1573722494', '1574331560', '999');
INSERT INTO `blog_article` VALUES ('60', '5', '1', 'gggu', 'articleuploads/20191121/3afa753a2535398f8bf4d392e1fb3a96.jpg', '', '<p>这是初始的文本</p>', '0', '0', '0', '0', '', '0', '1574325223', '1574325223', null);
INSERT INTO `blog_article` VALUES ('61', '5', '1', '19', 'articleuploads/20191121/741dee7fb3431b66d7901782514440bf.jpg', '1999', '<p>&lt;p&gt;这是初始的文双方都是本&lt;/p&gt;</p>', '0', '0', '0', '0', '19', '0', '1574326825', '1574331634', null);
INSERT INTO `blog_article` VALUES ('62', '3', '1', '魅族15', '', '123', '<p>&lt;p&gt;45644&lt;/p&gt;&lt;br/&gt;</p>', '0', '0', '0', '0', '1888', '0', '1574329226', '1574331507', null);

-- ----------------------------
-- Table structure for blog_category
-- ----------------------------
DROP TABLE IF EXISTS `blog_category`;
CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL COMMENT '栏目标题',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态(0：正常，1：禁用)',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `index_nav_title` (`title`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='网站栏目表';

-- ----------------------------
-- Records of blog_category
-- ----------------------------
INSERT INTO `blog_category` VALUES ('1', '耳机', null, '0', '0', '1572231387', '1572231387');
INSERT INTO `blog_category` VALUES ('2', '社区', null, '0', '0', '1572231392', '1572231392');
INSERT INTO `blog_category` VALUES ('3', '钢化膜', null, '0', '0', '1572231397', '1573720871');
INSERT INTO `blog_category` VALUES ('6', '123', null, '0', '0', '1574329284', '1574329284');

-- ----------------------------

-- Table structure for blog_minghua
-- ----------------------------
DROP TABLE IF EXISTS `blog_minghua`;
CREATE TABLE `blog_minghua` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `liupai_id` tinyint(1) NOT NULL DEFAULT '0' COMMENT '文章类型',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '网站编辑id',
  `title` varchar(255) NOT NULL COMMENT '文章标题',
  `cover_img` varchar(255) DEFAULT NULL COMMENT '文章封面',
  `describe` varchar(255) DEFAULT NULL COMMENT '文章描述',
  `content` mediumtext NOT NULL COMMENT '文章内容',
  `recommend` int(10) DEFAULT '0' COMMENT '推荐级别',
  `praise` int(11) DEFAULT '0' COMMENT '点赞量',
  `clicks` int(10) DEFAULT '0' COMMENT '点击量',
  `sort` int(10) DEFAULT '0' COMMENT '排序',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `index_article_title` (`title`) USING BTREE,
  KEY `index_article_sort` (`sort`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='博客文章表';


-- Table structure for blog_notice
-- ----------------------------
DROP TABLE IF EXISTS `blog_notice`;
CREATE TABLE `blog_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` tinyint(1) NOT NULL DEFAULT '0' COMMENT '文章类型',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '网站编辑id',
  `title` varchar(255) NOT NULL COMMENT '文章标题',
  `cover_img` varchar(255) DEFAULT NULL COMMENT '文章封面',
  `describe` varchar(255) DEFAULT NULL COMMENT '文章描述',
  `content` mediumtext NOT NULL COMMENT '文章内容',
  `recommend` int(10) DEFAULT '0' COMMENT '推荐级别',
  `praise` int(11) DEFAULT '0' COMMENT '点赞量',
  `clicks` int(10) DEFAULT '0' COMMENT '点击量',
  `sort` int(10) DEFAULT '0' COMMENT '排序',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `index_article_title` (`title`) USING BTREE,
  KEY `index_article_sort` (`sort`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='博客文章表';

-- ----------------------------
-- Records of blog_notice
-- ----------------------------
INSERT INTO `blog_notice` VALUES ('1', '0', '0', '46666666666', null, null, '<p>这是初始的文本644446</p>', '0', '0', '0', '0', null, '0', '1574256001', '1574256001');

-- ----------------------------
-- Table structure for blog_user
-- ----------------------------
DROP TABLE IF EXISTS `blog_user`;
CREATE TABLE `blog_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL COMMENT '用户名',
  `password` varchar(40) DEFAULT NULL COMMENT '密码',
  `nickname` varchar(20) DEFAULT NULL COMMENT '用户名',
  `phone` varchar(15) DEFAULT NULL COMMENT '手机号',
  `email` varchar(30) DEFAULT NULL COMMENT '邮箱',
  `heading` varchar(60) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL COMMENT '备注信息',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(10) DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='用户表';

-- ----------------------------
-- Records of blog_user
-- ----------------------------
INSERT INTO `blog_user` VALUES ('1', 'admin', 'admin', '测试', '15976012214', '2868813344444@qq.com', null, null, '0', '1550384771', '1550384771');
INSERT INTO `blog_user` VALUES ('2', 'admin', '123', '123', null, null, null, null, '0', '0', null);

-- ----------------------------
-- Table structure for edu_login
-- ----------------------------
DROP TABLE IF EXISTS `edu_login`;
CREATE TABLE `edu_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of edu_login
-- ----------------------------

