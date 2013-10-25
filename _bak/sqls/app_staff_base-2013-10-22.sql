-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 10 月 22 日 09:37
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
-- 表的结构 `app_staff_base`
--

CREATE TABLE IF NOT EXISTS `app_staff_base` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `serial` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '员工编号',
  `jobs` char(20) NOT NULL COMMENT '应聘岗位',
  `name` char(50) NOT NULL COMMENT '员工姓名',
  `name_en` char(50) DEFAULT NULL COMMENT '英文名称',
  `company_id` smallint(5) unsigned NOT NULL COMMENT '隶属区域',
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
  `remarks` text COMMENT '备注',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：0正常，-2删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='员工基本信息表' AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `app_staff_base`
--

INSERT INTO `app_staff_base` (`id`, `serial`, `jobs`, `name`, `name_en`, `company_id`, `department_id`, `occupation_id`, `ethnic`, `identity`, `identity_address`, `dwell_address`, `sex`, `blood`, `height`, `marriage`, `birthday`, `education`, `major`, `ancestral`, `politics`, `email`, `social_num`, `phone`, `contact_person`, `contact_phone`, `contact_relation`, `contact_company`, `open_bank`, `open_account`, `on_job`, `remarks`, `status`) VALUES
(7, 1007, 'aaa', '员工1', 'cccc', 1, 1, 1, '', '130503670401001', '', '', '男', '', '', '', '1967-04-01', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 0, '', 0),
(6, 1006, 'qweqwe', '员工2', 'qweqwe', 2, 1, 1, '', '342401199201208174', '', '', '男', '', '', '未婚', '1992-01-20', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 0, '123', 0),
(5, 1005, '董事', '员工3', '英文姓名*', 1, 1, 3, '', '130503670401001', '', '', '男', '', '', '未婚', '1967-04-01', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 0, '', 0),
(1, 1001, '管理员', '管理员', 'admin', 1, 0, 0, NULL, '', '', NULL, '', NULL, NULL, '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, -2),
(8, 1008, '保密', '奥秘', '保密', 0, 0, 0, NULL, '', '', NULL, '男', NULL, NULL, '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0),
(9, 1009, '都是', '地方', '是的飞', 1, 1, 3, NULL, '', '', NULL, '男', NULL, NULL, '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0),
(10, 10010, '测试', '测试账号', '测试账号', 1, 1, 1, NULL, '', '', NULL, '男', NULL, NULL, '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
