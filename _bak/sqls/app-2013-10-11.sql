-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 10 月 11 日 12:24
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
-- 表的结构 `app_department`
--

CREATE TABLE IF NOT EXISTS `app_department` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '人事管理',
  `name` char(50) NOT NULL COMMENT '名称',
  `principal` char(50) NOT NULL COMMENT '负责人',
  `remarks` text COMMENT '备注',
  `create_time` int(11) unsigned NOT NULL COMMENT '创建时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态：-2删除。0启用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COMMENT='部门管理表' AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `app_department`
--

INSERT INTO `app_department` (`id`, `name`, `principal`, `remarks`, `create_time`, `status`) VALUES
(1, '董事会', '张倬赫', '董事会成员', 1381461275, 0),
(2, '企划部', '王兆辉', NULL, 1381461275, 0),
(3, '行政部', '韩福华', NULL, 1381461275, 0),
(4, '车辆管理中心', '宋晓航', NULL, 1381461275, 0),
(5, '秘书处', '韩艳艳', NULL, 1381461275, 0),
(6, '人力资源部', '谢舜娟', NULL, 1381461275, 0),
(7, '财务部', '周杨', NULL, 1381461275, 0),
(8, '客服部', '王兆辉', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdfffffffffffffffffffffffffffffffffffffffffffffffffffffafdsfsf', 1381461275, 0),
(9, '资产运营部', '沈君', NULL, 1381461275, 0),
(10, '营销中心', '蒋明', NULL, 1381461275, 0),
(11, '车神集团', '车神集团', NULL, 1381461275, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='组' AUTO_INCREMENT=31 ;

--
-- 转存表中的数据 `app_group`
--

INSERT INTO `app_group` (`id`, `pid`, `name`, `title`, `create_time`, `update_time`, `status`) VALUES
(1, 0, 'Admin', '管理系统', 1380957533, 1380957533, 0),
(2, 0, 'Home', '前台系统', 1380957553, 1380957553, 0),
(3, 0, 'Api', '接口系统', 1380957569, 1380957569, 0),
(15, 1, '人力资源部', '人力资源部', 1381493027, 1381493027, 0),
(25, 20, '懂事成员1', '懂事成员1', 1381493171, 1381493171, -2),
(24, 1, '车神集团', '车神集团', 1381493083, 1381493083, 0),
(23, 1, '资产运营部', '资产运营部', 1381493077, 1381493077, 0),
(22, 1, '财务部', '财务部', 1381493070, 1381493070, 0),
(21, 1, '行政部', '行政部', 1381493065, 1381493065, 0),
(20, 1, '董事会', '董事会', 1381493059, 1381493059, 0),
(19, 1, '营销中心', '营销中心', 1381493053, 1381493053, 0),
(18, 1, '秘书处', '秘书处', 1381493047, 1381493047, 0),
(17, 1, '客服部', '客服部', 1381493040, 1381493040, 0),
(16, 1, '企划部', '企划部', 1381493033, 1381493033, 0),
(26, 20, '懂事成员2', '懂事成员2', 1381493182, 1381493182, -2),
(27, 15, '人力员工部主管', '人力员工部主管', 1381493452, 1381493452, 0),
(28, 15, '私有信息组', '私有信息组', 1381493465, 1381493465, 0),
(29, 15, '基本信息组', '基本信息组', 1381493475, 1381493475, 0),
(30, 1, 'Public-(后台公开组)', '公开组', 1381493899, 1381493899, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='组与节点关系表' AUTO_INCREMENT=49 ;

--
-- 转存表中的数据 `app_group_node`
--

INSERT INTO `app_group_node` (`id`, `group_id`, `node_id`) VALUES
(48, 30, 19),
(47, 30, 17),
(41, 27, 21),
(42, 30, 1),
(39, 27, 23),
(46, 30, 18),
(45, 30, 15),
(43, 30, 14),
(44, 30, 16),
(40, 27, 24),
(38, 27, 22),
(33, 27, 1),
(36, 27, 20);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='组与用户关系表' AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `app_group_user`
--

INSERT INTO `app_group_user` (`id`, `group_id`, `user_id`) VALUES
(13, 27, 2),
(17, 28, 3),
(16, 29, 5),
(18, 30, 2),
(19, 30, 3),
(20, 30, 5);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='节点表(1项目、2模块、3方法)的关系' AUTO_INCREMENT=25 ;

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
(13, 4, 'group_user_edit', '管理系统-权限控制模块-用户与组管理编', NULL, 0, 3, 0),
(14, 1, 'Index', '管理系统-主页模块', NULL, 0, 2, 0),
(15, 14, 'index', '管理系统-主页模块-首页', NULL, 0, 3, 0),
(16, 1, 'Login', '管理系统-登陆模块', NULL, 0, 2, 0),
(17, 16, 'login', '管理系统-登陆模块-登陆页面', NULL, 0, 3, 0),
(18, 16, 'check_login', '管理系统-登陆模块-验证登陆', NULL, 0, 3, 0),
(19, 16, 'logout', '管理系统-登陆模块-退出登陆', NULL, 0, 3, 0),
(20, 1, 'Personnel', '管理系统-人事管理', NULL, 0, 2, 0),
(21, 20, 'department', '管理系统-部门管理-数据列表', NULL, 0, 3, 0),
(22, 20, 'department_edit', '管理系统-部门管理-部门编辑', NULL, 0, 3, 0),
(23, 20, 'occupation', '管理系统-部门管理-(职位管理-数据列表', NULL, 0, 3, 0),
(24, 20, 'occupation_edit', '管理系统-部门管理-(职位管理-编辑职位', NULL, 0, 3, 0);

-- --------------------------------------------------------

--
-- 表的结构 `app_occupation`
--

CREATE TABLE IF NOT EXISTS `app_occupation` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `department_id` smallint(5) unsigned NOT NULL COMMENT '部门id',
  `name` char(32) NOT NULL COMMENT '职位描述',
  `number` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '编制人数',
  `remarks` text COMMENT '职位备注',
  `create_time` int(11) unsigned NOT NULL COMMENT '创建时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：-2删除0正常',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='职位表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `app_occupation`
--

INSERT INTO `app_occupation` (`id`, `department_id`, `name`, `number`, `remarks`, `create_time`, `status`) VALUES
(1, 1, '职位一', 0, '职位一职位一1', 0, 0),
(3, 1, '职位三', 0, '职位三', 1381478106, 0),
(2, 2, '职位二', 0, '职位二职位二职位二职位二职位二职位二职位二职位二职位二职位二职位二职位二职位二职位二职位二职位二职位二职位二职位二职位二职位二职位二职位二职位二职位二职位二职位二职位二', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `app_staff`
--

CREATE TABLE IF NOT EXISTS `app_staff` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` char(50) NOT NULL COMMENT '员工姓名',
  `name_en` char(50) NOT NULL COMMENT '英文名称',
  `department_id` smallint(5) unsigned NOT NULL COMMENT '部门id',
  `occupation_id` smallint(6) unsigned NOT NULL COMMENT '职位id',
  `identity` char(18) NOT NULL COMMENT '身份号码',
  `identity_address` char(255) NOT NULL COMMENT '身份证件地址',
  `dwell_address` char(255) NOT NULL COMMENT '居住地址',
  `sex` char(1) NOT NULL COMMENT '性别',
  `marriage` char(10) NOT NULL COMMENT '婚姻状况',
  `birthday` date NOT NULL COMMENT '生日',
  `education` char(20) NOT NULL COMMENT '学历',
  `entry_date` date NOT NULL COMMENT '入职日期',
  `official` date DEFAULT NULL COMMENT '转正日期',
  `over_date` date DEFAULT NULL COMMENT '离职日期',
  `ancestral` char(50) DEFAULT NULL COMMENT '祖籍',
  `phone` char(20) DEFAULT NULL COMMENT '电话号码',
  `contact_person` char(20) DEFAULT NULL COMMENT '紧急联络人',
  `contact_phone` char(20) DEFAULT NULL COMMENT '紧急联络人电话',
  `contract_start` date DEFAULT NULL COMMENT '合同开始日期',
  `contract_stop` date DEFAULT NULL COMMENT '合同结束日期',
  `open_bank` char(30) DEFAULT NULL COMMENT '开户银行',
  `open_account` char(30) DEFAULT NULL COMMENT '银行账号',
  `on_job` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否在职:0在职1离职',
  `emarks` text COMMENT '备注',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：0正常，-2删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='员工表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `app_staff`
--

INSERT INTO `app_staff` (`id`, `name`, `name_en`, `department_id`, `occupation_id`, `identity`, `identity_address`, `dwell_address`, `sex`, `marriage`, `birthday`, `education`, `entry_date`, `official`, `over_date`, `ancestral`, `phone`, `contact_person`, `contact_phone`, `contract_start`, `contract_stop`, `open_bank`, `open_account`, `on_job`, `emarks`, `status`) VALUES
(1, '杰克1', 'jack', 1, 1, '000000000000000000', '证件地址、证件地址、证件地址、证件地址、', '居住地址、居住地址、居住地址、居住地址、', '男', '未婚', '2013-10-11', '本科', '2013-10-01', '2013-10-31', '2013-10-11', '上海', '123456789', '紧急联络人', '987654321', '2013-10-18', '2013-10-31', '工商银行', '123456789', 0, 'asdasd', 0),
(2, '杰克2', 'jack', 1, 2, '000000000000000000', '证件地址、证件地址、证件地址、证件地址、', '居住地址、居住地址、居住地址、居住地址、', '男', '未婚', '2013-10-11', '本科', '2013-10-01', '2013-10-31', '2013-10-11', '上海', '123456789', '紧急联络人', '987654321', '2013-10-18', '2013-10-31', '工商银行', '123456789', 0, 'asdasd', 0);

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
(1, 'admin', '管理员', 'e10adc3949ba59abbe56e057f20f883e', 1381494096, '192.168.0.55', 145, 1376561926, 1376561926, 0, 0),
(2, 'zhuguan', 'wade', 'e10adc3949ba59abbe56e057f20f883e', 1381494167, '192.168.0.55', 23, 1377506459, 1377506459, 1, 0),
(3, 'siyou', '', 'e10adc3949ba59abbe56e057f20f883e', 1381494035, '192.168.0.55', 5, 1377590474, 1377590474, 1, 0),
(5, 'jiben', '', 'e10adc3949ba59abbe56e057f20f883e', 1377847312, '192.168.1.27', 0, 1377847312, 1377847312, 1, 0),
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

-- --------------------------------------------------------

--
-- 表的结构 `csoa_role`
--

CREATE TABLE IF NOT EXISTS `csoa_role` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `remark` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`,`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `csoa_role`
--

INSERT INTO `csoa_role` (`id`, `name`, `pid`, `status`, `remark`) VALUES
(1, '董事会', 1, 1, '张倬赫'),
(2, '企划部', 2, 1, '王兆辉'),
(3, '行政部', 3, 1, '韩福华'),
(4, '车辆管理中心', 4, 1, '宋晓航'),
(5, '秘书处', 5, 1, '韩艳艳'),
(6, '人力资源部', 6, 0, '谢舜娟'),
(7, '财务部', 7, 0, '周杨'),
(8, '客服部', 8, 0, '王兆辉'),
(9, '资产运营部', 9, 0, '沈君'),
(10, '营销中心', 10, 0, '蒋明'),
(11, '车神集团', 0, 1, '车神集团');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
