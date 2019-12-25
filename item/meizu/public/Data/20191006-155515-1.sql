
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='网站公告表';

-- -----------------------------
-- Records of `blog_notice`
-- -----------------------------
INSERT INTO `blog_notice` VALUES ('1', '111', '<p>111111<br/></p>', '0', '', '0', '1569680737', '1569680737');

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
  `remark` varchar(255) DEFAULT NULL COMMENT '备注信息',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(10) DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='用户表';

-- -----------------------------
-- Records of `blog_user`
-- -----------------------------
INSERT INTO `blog_user` VALUES ('1', 'test', '123456', '测试', '15976012214', '218688@qq.com', '', '0', '1550384771', '1550384771');
INSERT INTO `blog_user` VALUES ('2', 'zhangsan', '123456', '张三', '15976032214', '2825422688@qq.com', '', '0', '1550384771', '1550384771');
INSERT INTO `blog_user` VALUES ('3', '2019001', '888888', '', '13543813341', '1231@qq.com', '', '0', '0', '1550384');
INSERT INTO `blog_user` VALUES ('4', '2019002', '888888', '', '13543813340', '1232@qq.com', '', '0', '0', '1550384');
INSERT INTO `blog_user` VALUES ('5', '2019003', '888888', '', '13543813342', '1233@qq.com', '', '0', '0', '1550384');
INSERT INTO `blog_user` VALUES ('6', '2019004', '888888', '', '13543813343', '1234@qq.com', '', '0', '0', '1550384');
