-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 10 月 17 日 09:48
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `cheshenoa`
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='部门管理表' AUTO_INCREMENT=13 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='组与节点关系表' AUTO_INCREMENT=121 ;

--
-- 转存表中的数据 `app_group_node`
--

INSERT INTO `app_group_node` (`id`, `group_id`, `node_id`) VALUES
(81, 27, 23),
(77, 27, 25),
(91, 27, 34),
(80, 27, 22),
(74, 27, 1),
(88, 27, 28),
(70, 15, 1),
(99, 28, 25),
(79, 27, 21),
(48, 30, 19),
(69, 15, 20),
(47, 30, 17),
(78, 27, 20),
(83, 27, 33),
(42, 30, 1),
(85, 27, 31),
(46, 30, 18),
(89, 27, 27),
(68, 15, 25),
(45, 30, 15),
(43, 30, 14),
(44, 30, 16),
(84, 27, 32),
(82, 27, 24),
(87, 27, 29),
(86, 27, 30),
(90, 27, 26),
(92, 27, 35),
(95, 28, 1),
(113, 28, 26),
(98, 28, 35),
(101, 28, 33),
(102, 28, 34),
(103, 28, 31),
(104, 28, 32),
(105, 29, 1),
(106, 29, 25),
(107, 29, 35),
(108, 29, 26),
(109, 29, 29),
(110, 29, 30),
(111, 29, 28),
(112, 29, 27),
(120, 1, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='组与用户关系表' AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `app_group_user`
--

INSERT INTO `app_group_user` (`id`, `group_id`, `user_id`) VALUES
(13, 27, 2),
(17, 28, 3),
(16, 29, 5),
(18, 30, 2),
(19, 30, 3),
(20, 30, 5),
(24, 15, 5),
(22, 15, 2),
(23, 15, 3);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='节点表(1项目、2模块、3方法)的关系' AUTO_INCREMENT=36 ;

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
(20, 1, 'Personnel', '管理系统-人事管理(部门管理模块)', NULL, 0, 2, 0),
(21, 20, 'department', '管理系统-部门管理-部门列表', NULL, 0, 3, 0),
(22, 20, 'department_edit', '管理系统-部门管理-部门编辑', NULL, 0, 3, 0),
(23, 20, 'occupation', '管理系统-部门管理-职位列表', NULL, 0, 3, 0),
(24, 20, 'occupation_edit', '管理系统-部门管理-职位编辑', NULL, 0, 3, 0),
(25, 1, 'Staff', '管理系统-人事管理(员工管理模块)', NULL, 0, 2, 0),
(26, 25, 'index', '管理系统-员工管理-员工列表', NULL, 0, 3, 0),
(27, 25, 'staff_base_look', '管理系统-员工管理-基本信息查看', NULL, 0, 3, 0),
(28, 25, 'staff_base_edit', '管理系统-员工管理-基本信息编辑', NULL, 0, 3, 0),
(29, 25, 'staff_vitae_look', '管理系统-员工管理-履历信息查看', NULL, 0, 3, 0),
(30, 25, 'staff_vitae_edit', '管理系统-员工管理-履历信息编辑', NULL, 0, 3, 0),
(31, 25, 'staff_contract_look', '管理系统-员工管理-合同信息查看', NULL, 0, 3, 0),
(32, 25, 'staff_contract_edit', '管理系统-员工管理-合同信息编辑', NULL, 0, 3, 0),
(33, 25, 'staff_salary_look', '管理系统-员工管理-薪资信息查看', NULL, 0, 3, 0),
(34, 25, 'staff_salary_edit', '管理系统-员工管理-薪资信息编辑', NULL, 0, 3, 0),
(35, 25, 'staff_edit', '管理系统-员工管理-员工编辑页面', NULL, 0, 3, 0);

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
-- 表的结构 `app_staff_alteration`
--

CREATE TABLE IF NOT EXISTS `app_staff_alteration` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `base_id` smallint(6) NOT NULL COMMENT '基本信息id',
  `data_time` char(20) DEFAULT NULL COMMENT '日期',
  `incident` char(255) DEFAULT NULL COMMENT '事件',
  `bonus` decimal(9,2) DEFAULT NULL COMMENT '奖金',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：0正常，-2删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='员工异动事件表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `app_staff_alteration`
--

INSERT INTO `app_staff_alteration` (`id`, `base_id`, `data_time`, `incident`, `bonus`, `status`) VALUES
(1, 6, '2013-10-20', '12345', '100.00', 0);

-- --------------------------------------------------------

--
-- 表的结构 `app_staff_base`
--

CREATE TABLE IF NOT EXISTS `app_staff_base` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `serial` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '员工编号',
  `jobs` char(20) NOT NULL COMMENT '岗位',
  `name` char(50) NOT NULL COMMENT '员工姓名',
  `name_en` char(50) DEFAULT NULL COMMENT '英文名称',
  `department_id` smallint(5) unsigned NOT NULL COMMENT '部门id',
  `occupation_id` smallint(6) unsigned NOT NULL COMMENT '职位id',
  `ethnic` char(10) DEFAULT NULL COMMENT '名族',
  `identity` char(18) NOT NULL COMMENT '身份号码',
  `identity_address` char(255) NOT NULL COMMENT '身份证件地址',
  `dwell_address` char(255) DEFAULT NULL COMMENT '居住地址',
  `sex` char(1) NOT NULL COMMENT '性别',
  `blood` char(5) DEFAULT NULL COMMENT '血型',
  `height` char(10) DEFAULT NULL COMMENT '身高',
  `marriage` char(10) NOT NULL COMMENT '婚姻状况',
  `birthday` date NOT NULL COMMENT '生日',
  `education` char(20) NOT NULL COMMENT '学历',
  `major` char(10) DEFAULT NULL COMMENT '专业',
  `ancestral` char(50) DEFAULT NULL COMMENT '祖籍',
  `politics` char(10) DEFAULT NULL COMMENT '政治面貌',
  `email` char(30) DEFAULT NULL COMMENT '电子邮箱',
  `social_num` char(20) DEFAULT NULL COMMENT '社保电脑号',
  `phone` char(20) DEFAULT NULL COMMENT '电话号码',
  `contact_person` char(20) DEFAULT NULL COMMENT '紧急联络人',
  `contact_phone` char(20) DEFAULT NULL COMMENT '紧急联络人电话',
  `contact_relation` char(10) DEFAULT NULL COMMENT '联系人关系',
  `contact_company` char(30) DEFAULT NULL COMMENT '紧急联系人的单位',
  `open_bank` char(30) DEFAULT NULL COMMENT '开户银行',
  `open_account` char(30) DEFAULT NULL COMMENT '银行账号',
  `on_job` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否在职:0在职1离职',
  `emarks` text COMMENT '备注',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：0正常，-2删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='员工基本信息表' AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `app_staff_base`
--

INSERT INTO `app_staff_base` (`id`, `serial`, `jobs`, `name`, `name_en`, `department_id`, `occupation_id`, `ethnic`, `identity`, `identity_address`, `dwell_address`, `sex`, `blood`, `height`, `marriage`, `birthday`, `education`, `major`, `ancestral`, `politics`, `email`, `social_num`, `phone`, `contact_person`, `contact_phone`, `contact_relation`, `contact_company`, `open_bank`, `open_account`, `on_job`, `emarks`, `status`) VALUES
(7, 1007, 'aaa', 'sdfsdfdbbb', 'cccc', 1, 1, NULL, '', '', NULL, '男', NULL, NULL, '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0),
(6, 1006, 'qweqwe', 'qwewqe', 'qweqwe', 1, 1, '', '342401199201208174', '', '', '男', '', '', '未婚', '1992-01-20', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 0, '', 0),
(5, 1005, '董事', '姓名', '英文姓名*', 1, 3, '', '130503670401001', '', '', '男', '', '', '未婚', '1967-04-01', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 0, '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `app_staff_contract`
--

CREATE TABLE IF NOT EXISTS `app_staff_contract` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `base_id` smallint(6) unsigned NOT NULL COMMENT '基本信息id',
  `entry_time` char(20) DEFAULT NULL COMMENT '入职日期',
  `official_time` char(20) DEFAULT NULL COMMENT '转正日期',
  `dimission_time` char(20) DEFAULT NULL COMMENT '离职日期',
  `contract_start` char(20) DEFAULT NULL COMMENT '合同起始日期',
  `contract_over` char(20) DEFAULT NULL COMMENT '合同结束日期',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态:0正常，-2删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='员工合同信息' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `app_staff_contract`
--

INSERT INTO `app_staff_contract` (`id`, `base_id`, `entry_time`, `official_time`, `dimission_time`, `contract_start`, `contract_over`, `status`) VALUES
(1, 6, '2013-1-20a', '2013-1-21a', '2013-1-22a', '2013-1-23a', '2013-1-24a', 0);

-- --------------------------------------------------------

--
-- 表的结构 `app_staff_education`
--

CREATE TABLE IF NOT EXISTS `app_staff_education` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `base_id` smallint(6) unsigned NOT NULL COMMENT '基本表id',
  `school` char(50) DEFAULT NULL COMMENT '毕业学校',
  `major` char(50) DEFAULT NULL COMMENT '专业-主修',
  `data_time` char(50) DEFAULT NULL COMMENT '起止日期',
  `certificate` char(50) DEFAULT NULL COMMENT '证书',
  `witness` char(50) DEFAULT NULL COMMENT '证明人以及电话',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：0正常，-2删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='员工教育经历表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `app_staff_education`
--

INSERT INTO `app_staff_education` (`id`, `base_id`, `school`, `major`, `data_time`, `certificate`, `witness`, `status`) VALUES
(1, 6, '123456', '123456', '123', '456', '456', 0),
(2, 5, '毕业院校/教育机构*1', '专业*', '起止日期*', '证书', '证明人以及电话', 0),
(3, 5, '毕业院校/教育机构*2', '专业*2', '起止日期*23', '证书2', '证明人以及电话2', 0);

-- --------------------------------------------------------

--
-- 表的结构 `app_staff_family`
--

CREATE TABLE IF NOT EXISTS `app_staff_family` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `base_id` smallint(5) unsigned NOT NULL COMMENT '基本信息id',
  `relation` char(20) DEFAULT NULL COMMENT '关系',
  `name` char(20) DEFAULT NULL COMMENT '姓名',
  `company` char(50) DEFAULT NULL COMMENT '工作单位',
  `address` char(50) DEFAULT NULL COMMENT '住址以及电话号码',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：0正常，-2删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='员工家庭成员' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `app_staff_family`
--

INSERT INTO `app_staff_family` (`id`, `base_id`, `relation`, `name`, `company`, `address`, `status`) VALUES
(1, 6, 'a关系1', '姓名1', '工作单位1', '住址及号码1', 0);

-- --------------------------------------------------------

--
-- 表的结构 `app_staff_salary`
--

CREATE TABLE IF NOT EXISTS `app_staff_salary` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `base_id` smallint(6) unsigned NOT NULL COMMENT '基本信息id',
  `open_bank` char(30) NOT NULL COMMENT '开户银行',
  `open_account` char(50) NOT NULL COMMENT '银行账号',
  `start_time` char(20) NOT NULL COMMENT '起始日期',
  `stop_time` char(20) NOT NULL COMMENT '终止日期',
  `pay` decimal(9,2) NOT NULL COMMENT '工资',
  `remarks` char(255) DEFAULT NULL COMMENT '备注',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：0正常，-2删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='工资信息表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `app_staff_salary`
--

INSERT INTO `app_staff_salary` (`id`, `base_id`, `open_bank`, `open_account`, `start_time`, `stop_time`, `pay`, `remarks`, `status`) VALUES
(1, 6, '开户银行1', '银行账号2', '起始日期2', '结束日期3', '123.10', 'adsad3', -2);

-- --------------------------------------------------------

--
-- 表的结构 `app_staff_work`
--

CREATE TABLE IF NOT EXISTS `app_staff_work` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `base_id` smallint(5) unsigned NOT NULL COMMENT '基本信息id',
  `company` char(50) DEFAULT NULL COMMENT '公司',
  `data_time` char(50) DEFAULT NULL COMMENT '起止日期',
  `position` char(50) DEFAULT NULL COMMENT '职位',
  `responsibility` char(50) DEFAULT NULL COMMENT '职责',
  `salary` char(20) DEFAULT NULL COMMENT '工资',
  `dimission` char(50) NOT NULL COMMENT '离职原因',
  `witness` char(50) DEFAULT NULL COMMENT '证明人',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：0正常，-2删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='员工工作经历表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `app_staff_work`
--

INSERT INTO `app_staff_work` (`id`, `base_id`, `company`, `data_time`, `position`, `responsibility`, `salary`, `dimission`, `witness`, `status`) VALUES
(1, 6, '工作单位1', '起止日期1', '职位1', '职责1', '薪资1', '离职原因1', '证明人及联系电话1', 0);

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
(1, 'admin', '管理员', 'e10adc3949ba59abbe56e057f20f883e', 1381993902, '192.168.1.102', 156, 1376561926, 1376561926, 0, 0),
(2, 'zhuguan', 'wade', 'e10adc3949ba59abbe56e057f20f883e', 1381562688, '192.168.0.55', 27, 1377506459, 1377506459, 1, 0),
(3, 'siyou', '', 'e10adc3949ba59abbe56e057f20f883e', 1381562821, '192.168.0.55', 12, 1377590474, 1377590474, 1, 0),
(5, 'jiben', '', 'e10adc3949ba59abbe56e057f20f883e', 1381562759, '192.168.0.55', 4, 1377847312, 1377847312, 1, 0),
(6, '13761951739', '', 'd41d8cd98f00b204e9800998ecf8427e', 1377847970, '192.168.1.27', 0, 1377847970, 1377847970, 1, 0),
(7, '13761951738', '', 'd41d8cd98f00b204e9800998ecf8427e', 1377852591, '192.168.1.27', 0, 1377852591, 1377852591, 2, 0),
(8, '15912345678', '', 'd41d8cd98f00b204e9800998ecf8427e', 1377875285, '192.168.1.100', 0, 1377875285, 1377875285, 2, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
