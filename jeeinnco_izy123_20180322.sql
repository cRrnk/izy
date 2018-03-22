-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2018-03-22 10:41:51
-- 服务器版本： 5.5.58-cll
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jeeinnco_izy123`
--
CREATE DATABASE IF NOT EXISTS `jeeinnco_izy123` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jeeinnco_izy123`;

-- --------------------------------------------------------

--
-- 表的结构 `izy_cate_info`
--
-- 创建时间： 2017-04-11 14:27:16
-- 最后更新： 2018-03-17 13:57:17
--

DROP TABLE IF EXISTS `izy_cate_info`;
CREATE TABLE IF NOT EXISTS `izy_cate_info` (
  `cate_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pid` int(11) UNSIGNED DEFAULT '0',
  `cate_name` varchar(20) NOT NULL DEFAULT '' COMMENT '分类名称',
  `cate_color` char(6) DEFAULT '000000' COMMENT '文字颜色',
  `seo_title` varchar(50) DEFAULT NULL COMMENT 'seo标题',
  `seo_keyword` varchar(50) DEFAULT NULL COMMENT '关键字',
  `seo_desc` varchar(100) DEFAULT NULL COMMENT '描述',
  `data_num` int(11) UNSIGNED DEFAULT '0' COMMENT '链接数',
  `click_num` int(11) UNSIGNED DEFAULT '0' COMMENT '总点击数',
  `sort_order` int(11) UNSIGNED DEFAULT '0' COMMENT '排序',
  `status` enum('delete','online','offline') DEFAULT 'online' COMMENT '状态',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `izy_link_info`
--
-- 创建时间： 2017-04-11 14:27:16
-- 最后更新： 2018-03-21 13:06:41
--

DROP TABLE IF EXISTS `izy_link_info`;
CREATE TABLE IF NOT EXISTS `izy_link_info` (
  `link_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '分类',
  `title` varchar(10) NOT NULL DEFAULT '网站标题' COMMENT '网站标题',
  `title_color` char(6) DEFAULT '000000' COMMENT '标题颜色#000000',
  `link` varchar(500) NOT NULL DEFAULT '' COMMENT '链接地址',
  `intro` varchar(50) DEFAULT NULL COMMENT '简介',
  `sort_order` int(11) DEFAULT '0' COMMENT '排序值越大越靠前',
  `status` enum('delete','online','offline') DEFAULT 'offline' COMMENT '状态',
  `click_num` int(11) UNSIGNED DEFAULT '0' COMMENT '总点击数',
  `last_time` timestamp NULL DEFAULT NULL COMMENT '最后修改时间',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `izy_notice_table`
--
-- 创建时间： 2017-04-11 14:27:16
-- 最后更新： 2017-05-03 04:03:12
--

DROP TABLE IF EXISTS `izy_notice_table`;
CREATE TABLE IF NOT EXISTS `izy_notice_table` (
  `notice_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `notice` varchar(100) DEFAULT '这是一个公告！' COMMENT '公告',
  `notice_color` char(6) DEFAULT '000000',
  `link` varchar(500) DEFAULT '#' COMMENT '外链',
  `status` enum('delete','online','offline') DEFAULT 'online',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`notice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `izy_refer_info`
--
-- 创建时间： 2018-03-19 07:11:31
--

DROP TABLE IF EXISTS `izy_refer_info`;
CREATE TABLE IF NOT EXISTS `izy_refer_info` (
  `refer_id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(500) NOT NULL DEFAULT '',
  `md5` char(32) NOT NULL DEFAULT '',
  `title` varchar(20) NOT NULL DEFAULT '',
  `keywords` varchar(100) NOT NULL DEFAULT '',
  `description` varchar(200) NOT NULL DEFAULT '',
  `visit_total_num` int(11) NOT NULL DEFAULT '0',
  `visit_today_num` int(11) NOT NULL DEFAULT '0',
  `last_visit_time` datetime NOT NULL,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`refer_id`),
  UNIQUE KEY `refer_md5` (`md5`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COMMENT='自动来源信息';

-- --------------------------------------------------------

--
-- 表的结构 `izy_sys_info`
--
-- 创建时间： 2017-04-12 07:11:42
-- 最后更新： 2018-03-22 02:11:08
--

DROP TABLE IF EXISTS `izy_sys_info`;
CREATE TABLE IF NOT EXISTS `izy_sys_info` (
  `sys_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo_link` varchar(100) DEFAULT '/',
  `site_name` varchar(50) DEFAULT '爱资源导航站 - 有你需要的资源！',
  `site_keyword` varchar(50) DEFAULT '最新电影资源|在线工具',
  `site_desc` varchar(100) DEFAULT '一个日常必备寻找资源的导航站',
  `notice_limit` tinyint(4) UNSIGNED NOT NULL DEFAULT '3',
  `link_show_limit` tinyint(4) UNSIGNED NOT NULL DEFAULT '20' COMMENT '可展示链接数量',
  `per_page` tinyint(4) UNSIGNED DEFAULT '20' COMMENT '所有分页',
  `footer_info` varchar(50) DEFAULT NULL COMMENT '备案信息',
  `copy_right` varchar(50) DEFAULT NULL COMMENT '版权',
  `add_source` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否开启跳转链接添加本站来源参数',
  `cache_time` int(11) NOT NULL DEFAULT '0' COMMENT '全站缓存时间',
  PRIMARY KEY (`sys_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `izy_task_info`
--
-- 创建时间： 2017-04-11 14:27:16
-- 最后更新： 2017-04-11 14:27:16
--

DROP TABLE IF EXISTS `izy_task_info`;
CREATE TABLE IF NOT EXISTS `izy_task_info` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `izy_user_info`
--
-- 创建时间： 2018-03-16 07:06:24
-- 最后更新： 2018-03-16 07:06:45
--

DROP TABLE IF EXISTS `izy_user_info`;
CREATE TABLE IF NOT EXISTS `izy_user_info` (
  `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `type` enum('admin','normal','vip') DEFAULT 'normal',
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
