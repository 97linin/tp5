
-- -----------------------------
-- Table structure for `blog_dictionary`
-- -----------------------------
DROP TABLE IF EXISTS `blog_dictionary`;
CREATE TABLE `blog_dictionary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(30) NOT NULL COMMENT '词语',
  `explanation` varchar(255) DEFAULT NULL COMMENT '名词解释',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态(0：正常，1：禁用)',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='词典';

-- -----------------------------
-- Records of `blog_dictionary`
-- -----------------------------
INSERT INTO `blog_dictionary` VALUES ('1', 'dictionary', 'n. 字典；词典', '0', '1550384771', '1550384771');
INSERT INTO `blog_dictionary` VALUES ('2', '考试', 'examinationexamexamine', '0', '1550384771', '1550384771');
INSERT INTO `blog_dictionary` VALUES ('3', '测验', '1.用仪器或其他办法检验。2.考查学习成绩等：算术～。时事～。', '0', '1550384771', '1550384771');

-- -----------------------------
-- Table structure for `blog_notice`
-- -----------------------------
DROP TABLE IF EXISTS `blog_notice`;
CREATE TABLE `blog_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL COMMENT '标题',
  `content` mediumtext COMMENT '内容',
  `sort` int(10) DEFAULT '0' COMMENT '排序',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `index_notice_title` (`title`) USING BTREE,
  KEY `index_notice_sort` (`sort`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='网站公告表';


-- -----------------------------
-- Table structure for `blog_user`
-- -----------------------------
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='用户表';

-- -----------------------------
-- Records of `blog_user`
-- -----------------------------
INSERT INTO `blog_user` VALUES ('1', 'test', '123456', '测试', '15976012214', '2868813344444@qq.com', '', '', '0', '1550384771', '1550384771');
INSERT INTO `blog_user` VALUES ('2', 'zhangsan', '123456', '张三', '15976032214', '2822268812@qq.com', '', '', '0', '1550384771', '1550384771');
