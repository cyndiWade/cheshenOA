-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost:3306
-- 生成日期: 2013 年 10 月 05 日 11:45
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `app`
--

-- --------------------------------------------------------

--
-- 表的结构 `app_group`
--

CREATE TABLE IF NOT EXISTS `app_group` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `pid` smallint(6) unsigned NOT NULL COMMENT '父id',
  `name` char(20) NOT NULL COMMENT '组名',
  `title` char(255) DEFAULT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0启用1禁用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='组' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `app_group`
--

INSERT INTO `app_group` (`id`, `pid`, `name`, `title`, `create_time`, `update_time`, `status`) VALUES
(1, 0, 'Admin', '管理组', 1380957533, 1380957533, 0),
(2, 0, 'User', '用户组', 1380957553, 1380957553, 0),
(3, 0, 'Public', '公开组', 1380957569, 1380957569, 0);

-- --------------------------------------------------------

--
-- 表的结构 `app_group_node`
--

CREATE TABLE IF NOT EXISTS `app_group_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` smallint(6) unsigned NOT NULL COMMENT '组id',
  `node_id` smallint(6) unsigned NOT NULL COMMENT '节点id',
  PRIMARY KEY (`id`),
  KEY `groupId` (`group_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='组与节点关系表' AUTO_INCREMENT=33 ;

--
-- 转存表中的数据 `app_group_node`
--

INSERT INTO `app_group_node` (`id`, `group_id`, `node_id`) VALUES
(22, 1, 14),
(2, 1, 2),
(21, 1, 1),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 8),
(8, 1, 9),
(9, 1, 11),
(10, 1, 7),
(11, 1, 12),
(12, 1, 10),
(13, 1, 13),
(20, 2, 14),
(18, 2, 1),
(19, 2, 15),
(23, 1, 15),
(24, 1, 3),
(25, 1, 16),
(26, 1, 17),
(27, 1, 18),
(28, 1, 19),
(29, 2, 16),
(30, 2, 17),
(31, 2, 18),
(32, 2, 19);

-- --------------------------------------------------------

--
-- 表的结构 `app_group_user`
--

CREATE TABLE IF NOT EXISTS `app_group_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `group_id` smallint(6) unsigned NOT NULL COMMENT '组id',
  `user_id` int(10) unsigned NOT NULL COMMENT '用户id',
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='组与用户关系表' AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `app_group_user`
--

INSERT INTO `app_group_user` (`id`, `group_id`, `user_id`) VALUES
(9, 1, 1),
(7, 2, 2);

-- --------------------------------------------------------

--
-- 表的结构 `app_node`
--

CREATE TABLE IF NOT EXISTS `app_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `pid` smallint(6) unsigned NOT NULL COMMENT '父id',
  `name` char(20) NOT NULL COMMENT '名称',
  `title` char(20) DEFAULT NULL,
  `remark` char(255) DEFAULT NULL COMMENT '备注',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '等级:1分组、2模块、3方法',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0启用1禁用',
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='节点表(1项目、2模块、3方法)的关系' AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `app_node`
--

INSERT INTO `app_node` (`id`, `pid`, `name`, `title`, `remark`, `sort`, `level`, `status`) VALUES
(1, 0, 'Admin', '管理系统', NULL, 0, 1, 0),
(2, 0, 'Home', '前台系统', NULL, 0, 1, 0),
(3, 0, 'Api', '接口系统', NULL, 0, 1, 0),
(4, 1, 'Rbac', '管理系统-权限控制模块', NULL, 0, 2, 0),
(5, 4, 'rbac_node', '管理系统-权限控制模块-节点管理', NULL, 0, 3, 0),
(6, 4, 'node_edit', '管理系统-权限控制模块-编辑节点', NULL, 0, 3, 0),
(7, 4, 'node_status', '管理系统-权限控制模块-节点状态管理', NULL, 0, 3, 0),
(8, 4, 'group_node', '管理系统-权限控制模块-组与节点关系', NULL, 0, 3, 0),
(9, 4, 'edit_group_node', '管理系统-权限控制模块-组与节点关系编辑', NULL, 0, 3, 0),
(10, 4, 'group', '管理系统-权限控制模块-组管理', NULL, 0, 3, 0),
(11, 4, 'groupEdit', '管理系统-权限控制模块-组编辑', NULL, 0, 3, 0),
(12, 4, 'group_user', '管理系统-权限控制模块-分配组用户管理', NULL, 0, 3, 0),
(13, 4, 'group_user_edit', '管理系统-权限控制模块- 用户与组管理编', NULL, 0, 3, 0),
(14, 1, 'Index', '管理系统-主页模块', NULL, 0, 2, 0),
(15, 14, 'index', '管理系统-主页模块-首页', NULL, 0, 3, 0),
(16, 1, 'Login', '管理系统-登陆模块', NULL, 0, 2, 0),
(17, 16, 'login', '管理系统-登陆模块-登陆页面', NULL, 0, 3, 0),
(18, 16, 'check_login', '管理系统-登陆模块-验证登陆', NULL, 0, 3, 0),
(19, 16, 'logout', '管理系统-登陆模块-退出登陆', NULL, 0, 3, 0);

-- --------------------------------------------------------

--
-- 表的结构 `app_users`
--

CREATE TABLE IF NOT EXISTS `app_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account` char(11) NOT NULL,
  `nickname` char(20) DEFAULT NULL COMMENT '称呢',
  `password` char(32) NOT NULL,
  `last_login_time` int(11) unsigned NOT NULL DEFAULT '0',
  `last_login_ip` char(20) DEFAULT NULL,
  `login_count` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '登陆次数',
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `type` tinyint(1) unsigned NOT NULL COMMENT '用户类型:0管理员',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0正常、1待审核、-2删除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `account` (`account`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='用户账号表' AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `app_users`
--

INSERT INTO `app_users` (`id`, `account`, `nickname`, `password`, `last_login_time`, `last_login_ip`, `login_count`, `create_time`, `update_time`, `type`, `status`) VALUES
(1, 'admin', '管理员', 'e10adc3949ba59abbe56e057f20f883e', 1380973435, '127.0.0.1', 138, 1376561926, 1376561926, 0, 0),
(2, '13761951734', 'wade', 'e10adc3949ba59abbe56e057f20f883e', 1380973407, '127.0.0.1', 22, 1377506459, 1377506459, 1, 0),
(3, '18516146011', '', '202cb962ac59075b964b07152d234b70', 1377592012, '192.168.1.11', 4, 1377590474, 1377590474, 1, 0),
(5, '13761951735', '', 'd41d8cd98f00b204e9800998ecf8427e', 1377847312, '192.168.1.27', 0, 1377847312, 1377847312, 1, 0),
(6, '13761951739', '', 'd41d8cd98f00b204e9800998ecf8427e', 1377847970, '192.168.1.27', 0, 1377847970, 1377847970, 1, 0),
(7, '13761951738', '', 'd41d8cd98f00b204e9800998ecf8427e', 1377852591, '192.168.1.27', 0, 1377852591, 1377852591, 2, 0),
(8, '15912345678', '', 'd41d8cd98f00b204e9800998ecf8427e', 1377875285, '192.168.1.100', 0, 1377875285, 1377875285, 2, 0);

-- --------------------------------------------------------

--
-- 表的结构 `app_user_info`
--

CREATE TABLE IF NOT EXISTS `app_user_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `user_id` int(10) unsigned NOT NULL COMMENT '用户id',
  `director_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '隶属客户经理',
  `file_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户头像',
  `age` tinyint(3) unsigned DEFAULT NULL COMMENT '年龄',
  `sex` char(1) DEFAULT NULL COMMENT '性别',
  `email` char(50) DEFAULT NULL COMMENT '邮箱',
  `province` char(10) DEFAULT NULL COMMENT '省份',
  `city` char(10) DEFAULT NULL COMMENT '城市',
  `street` varchar(150) DEFAULT NULL COMMENT '街道地址',
  `interest` char(100) DEFAULT NULL COMMENT '兴趣爱好',
  `purchase` varchar(100) DEFAULT NULL COMMENT '已购买的产品',
  `remarks` varchar(500) DEFAULT NULL COMMENT '客户备注',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户详细资料' AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `app_user_info`
--

INSERT INTO `app_user_info` (`id`, `user_id`, `director_id`, `file_id`, `age`, `sex`, `email`, `province`, `city`, `street`, `interest`, `purchase`, `remarks`) VALUES
(1, 1, 0, 3, 21, '男', 'ucdchina@gmail.com', '广东省', '深圳市', '111号', '理财产品', '无', '这是管理员aaeqweqe'),
(2, 2, 0, 4, 21, '男', 'lin@qq.com', '上海', '上海市', '陆家嘴', '期货产品', '无', '<u><b>dadasa<strike>sdasdas</strike></b></u>'),
(3, 3, 7, 0, 22, '女', 'wuzhiyong', '上海', '上海市', '陆家嘴', '暂无', '无', NULL),
(5, 5, 0, 0, 7, '男', 'aaaaa@qq.com', 'bbbb', 'ccc', 'ddde', 'eee', 'fff', 'ggggggggg~'),
(6, 100, 0, 0, 6, '女', '', '', '', '', '', '', ''),
(10, 6, 8, 0, 6, '女', '12313123@qq.com', '12312312bb', '22222222', '', '', '', ''),
(11, 7, 0, 0, 5, '男', 'zzz@qq.com', '13123', '2423', '423423', '3245', '234234', '5'),
(12, 8, 0, 0, 7, '女', '', '', '', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
