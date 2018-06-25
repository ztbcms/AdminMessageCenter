DROP TABLE IF EXISTS `cms_admin_msg`;
CREATE TABLE `cms_admin_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL COMMENT '内容',
  `is_read` tinyint(1) NOT NULL COMMENT '是否已读',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `read_time` int(11) NOT NULL COMMENT '阅读时间',
  `target_type` varchar(255) NOT NULL COMMENT '消息来源',
  `target` varchar(255) NOT NULL COMMENT '消息来源',
  `type` varchar(255) NOT NULL DEFAULT '' COMMENT '消息类型',
  `url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;