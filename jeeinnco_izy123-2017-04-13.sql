-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- 主机: localhost:3306
-- 生成日期: 2017-04-13 13:42:44
-- 服务器版本: 5.5.54-cll
-- PHP 版本: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `jeeinnco_izy123`
--

-- --------------------------------------------------------

--
-- 表的结构 `izy_apply_table`
--

CREATE TABLE IF NOT EXISTS `izy_apply_table` (
  `apply_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(20) DEFAULT NULL COMMENT '网站名',
  `link` varchar(500) DEFAULT NULL COMMENT '网址',
  `intro` varchar(200) DEFAULT NULL COMMENT '简介',
  `contact` varchar(50) DEFAULT NULL COMMENT '联系方式',
  `friend_link` varchar(500) DEFAULT NULL COMMENT '友链地址',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('delete','online','offline') DEFAULT 'online',
  PRIMARY KEY (`apply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `izy_cate_info`
--

CREATE TABLE IF NOT EXISTS `izy_cate_info` (
  `cate_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned DEFAULT '0',
  `cate_name` varchar(20) NOT NULL DEFAULT '' COMMENT '分类名称',
  `cate_color` char(6) DEFAULT '000000' COMMENT '文字颜色',
  `seo_title` varchar(50) DEFAULT NULL COMMENT 'seo标题',
  `seo_keyword` varchar(50) DEFAULT NULL COMMENT '关键字',
  `seo_desc` varchar(100) DEFAULT NULL COMMENT '描述',
  `data_num` int(11) unsigned DEFAULT '0' COMMENT '链接数',
  `click_num` int(11) unsigned DEFAULT '0' COMMENT '总点击数',
  `sort_order` int(11) unsigned DEFAULT '0' COMMENT '排序',
  `status` enum('delete','online','offline') DEFAULT 'online' COMMENT '状态',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `izy_cate_info`
--

INSERT INTO `izy_cate_info` (`cate_id`, `pid`, `cate_name`, `cate_color`, `seo_title`, `seo_keyword`, `seo_desc`, `data_num`, `click_num`, `sort_order`, `status`, `create_time`) VALUES
(1, 0, '电影资源', '000000', '电影资源', '最新电影,电视剧,美剧,韩剧,日剧,邪恶动漫', '网罗最新电影网站', 0, 0, 0, 'online', '2017-04-06 22:21:58'),
(2, 0, '网络工具', '000000', '在线实用工具', '在线,实用工具', '收集实用、好玩的网络在线工具', 0, 0, 0, 'online', '2017-04-07 02:39:07'),
(3, 0, '热站推荐', 'EE3D11', '本站排行最火热的网站', '热门搜索,顶级推荐,站点排行榜,izy123', '爱资源导航，为您推荐本站最火热的高质量链接', 0, 0, 20, 'online', '2017-04-08 05:26:14'),
(4, 0, 'VIP分享', '0000d0', '汇集各种VIP分享站点信息', 'VIP分享导航,VIP分享站,会员分享大全', 'VIP分享大全', 0, 0, 0, 'online', '2017-04-08 05:45:18');

-- --------------------------------------------------------

--
-- 表的结构 `izy_link_info`
--

CREATE TABLE IF NOT EXISTS `izy_link_info` (
  `link_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '分类',
  `title` varchar(10) NOT NULL DEFAULT '网站标题' COMMENT '网站标题',
  `title_color` char(6) DEFAULT '000000' COMMENT '标题颜色#000000',
  `link` varchar(500) NOT NULL DEFAULT '' COMMENT '链接地址',
  `intro` varchar(50) DEFAULT NULL COMMENT '简介',
  `sort_order` int(11) DEFAULT '0' COMMENT '排序值越大越靠前',
  `status` enum('delete','online','offline') DEFAULT 'offline' COMMENT '状态',
  `click_num` int(11) unsigned DEFAULT '0' COMMENT '总点击数',
  `last_time` timestamp NULL DEFAULT NULL COMMENT '最后修改时间',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- 转存表中的数据 `izy_link_info`
--

INSERT INTO `izy_link_info` (`link_id`, `cate_id`, `title`, `title_color`, `link`, `intro`, `sort_order`, `status`, `click_num`, `last_time`, `create_time`) VALUES
(1, 3, '一本道', 'f00000', 'http://www.yibend.com/', '一本道电影网站', 20, 'offline', 0, '2017-04-12 05:14:45', '2017-04-06 22:26:10'),
(2, 1, '电影天堂', '000000', 'http://www.dytt8.net/', '电影天堂吧', 20, 'online', 0, '2017-04-11 06:00:08', '2017-04-06 22:26:57'),
(3, 1, '天天影院', '005000', 'http://www.ttyy.tv/', '老牌电影网站', 19, 'online', 0, '2017-04-11 06:03:12', '2017-04-07 02:36:10'),
(4, 1, '影视资源吧', '000000', 'http://www.yszy8.com/', '日剧韩剧美剧下载', 18, 'online', 0, '2017-04-11 06:03:19', '2017-04-08 05:23:21'),
(5, 1, '迅影网', '000000', 'http://www.xunyingwang.com/', '程序自动收集最新电影', 17, 'online', 0, '2017-04-11 06:04:35', '2017-04-08 05:29:48'),
(6, 1, '电影狗', '000000', 'http://www.dydog.org/', '提供最新电影和电视剧全集影视资源BT种子', 16, 'online', 0, '2017-04-11 06:05:49', '2017-04-08 05:42:43'),
(7, 1, '小片网', '000000', 'http://www.xiaopian.com/', '又名小调网', 15, 'online', 0, '2017-04-11 06:08:55', '2017-04-08 05:49:15'),
(8, 1, '中国高清网', '005000', 'http://www.gaoqing.la/', '蓝光原盘高清电影', 14, 'online', 0, '2017-04-11 06:09:53', '2017-04-08 05:51:20'),
(9, 2, 'IP地理位置', '000000', 'http://www.ip.cn/', '地理位置收集归属地查询', 20, 'online', 0, '2017-04-11 06:11:06', '2017-04-08 05:55:30'),
(10, 2, '6度短网址', '000000', 'http://www.6du.in/', '带统计的短网址', 19, 'online', 0, '2017-04-11 06:12:37', '2017-04-08 05:57:50'),
(11, 2, 'IT工具箱', '000000', 'http://www.tool.lu/', '程序员的工具箱', 18, 'online', 0, '2017-04-11 06:13:43', '2017-04-08 05:58:26'),
(12, 2, '宅男磁力', '000000', 'http://www.zncili.com/', '最懂宅男的磁力搜索', 17, 'online', 0, '2017-04-11 06:14:57', '2017-04-08 05:59:31'),
(13, 2, '鸠摩搜书', '000000', 'https://www.jiumodiary.com/', '电子书搜索引擎工具', 16, 'online', 0, '2017-04-11 06:16:47', '2017-04-08 06:10:19'),
(14, 2, '文章排版', '000000', 'http://paiban.gaodun.com/', '在线文字发布排版网站', 15, 'online', 0, '2017-04-11 06:29:50', '2017-04-08 06:12:20'),
(15, 4, 'VIP分享网', '000000', 'http://vip.vipfenxiang.com/', '分享各大影视网站VIP', 20, 'online', 0, '2017-04-11 06:31:25', '2017-04-08 06:15:24'),
(16, 4, 'VIP大全', '000000', 'http://www.vipdaquan.com/', '专注于提供优酷会员账号以及优酷VIP账号分享服务', 19, 'online', 0, '2017-04-11 06:33:44', '2017-04-08 06:18:45'),
(17, 4, '老冰棍', '000000', 'http://www.laobinggun.com/', '迅雷账号分享', 18, 'online', 0, '2017-04-11 06:36:11', '2017-04-08 06:25:09'),
(18, 4, '爱奇艺免费', '000000', 'http://www.zqnf.com/iqiyimianfeihuiyuan.htm', '爱奇艺免费VIP', 17, 'online', 0, '2017-04-11 06:37:07', '2017-04-08 06:28:28'),
(19, 4, '521迅雷', '000000', 'http://521xunlei.com/', '迅雷会员帐号分享平台-爱密码网 ', 16, 'online', 0, '2017-04-11 06:45:14', '2017-04-08 06:42:32'),
(20, 4, '爱讯网', '000000', 'http://www.wljx.net/', '爱奇艺会员账号共享-爱讯分享网  ', 15, 'online', 0, '2017-04-11 06:46:33', '2017-04-09 18:48:17'),
(21, 1, '有家影院', '000000', 'http://www.youjiady.com/', '手机电影在线观看', 14, 'online', 0, '2017-04-11 06:48:18', '2017-04-09 18:48:37'),
(22, 4, '分享大师', '000000', 'http://www.fenxiangdashi.com/', '专注分享', 14, 'online', 0, '2017-04-11 07:09:15', '2017-04-09 18:48:58'),
(23, 1, '飘花电影', '000000', 'http://www.piaohua.com/', '飘花电影资源网', 13, 'online', 0, '2017-04-11 07:10:54', '2017-04-09 18:49:40'),
(24, 3, '网址导航', '080000', 'http://www.2345.com/?kxieyunwei', '2345网址导航', 19, 'online', 0, '2017-04-11 07:13:32', '2017-04-09 18:50:16'),
(25, 3, '360导航', 'fa0000', 'https://hao.360.cn/?src=lm&ls=n1892da8591', '360导航搜索', 18, 'online', 0, '2017-04-11 07:14:43', '2017-04-09 18:50:54'),
(26, 3, '邪恶微漫画', '00da89', 'http://www.mh8.com/', '成人漫画', 16, 'online', 0, '2017-04-11 07:40:12', '2017-04-10 23:21:08');

-- --------------------------------------------------------

--
-- 表的结构 `izy_notice_table`
--

CREATE TABLE IF NOT EXISTS `izy_notice_table` (
  `notice_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `notice` varchar(100) DEFAULT '这是一个公告！' COMMENT '公告',
  `notice_color` char(6) DEFAULT '000000',
  `link` varchar(500) DEFAULT '#' COMMENT '外链',
  `status` enum('delete','online','offline') DEFAULT 'online',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`notice_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `izy_notice_table`
--

INSERT INTO `izy_notice_table` (`notice_id`, `notice`, `notice_color`, `link`, `status`, `create_time`) VALUES
(1, '这是一个公告！', 'ff0000', '#', 'online', '2017-04-07 19:47:52');

-- --------------------------------------------------------

--
-- 表的结构 `izy_sys_info`
--

CREATE TABLE IF NOT EXISTS `izy_sys_info` (
  `sys_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `logo_link` varchar(100) DEFAULT '/',
  `site_name` varchar(50) DEFAULT '爱资源导航站 - 有你需要的资源！',
  `site_keyword` varchar(50) DEFAULT '最新电影资源|在线工具',
  `site_desc` varchar(100) DEFAULT '一个日常必备寻找资源的导航站',
  `notice_limit` tinyint(4) unsigned NOT NULL DEFAULT '3',
  `link_show_limit` tinyint(4) unsigned NOT NULL DEFAULT '20' COMMENT '可展示链接数量',
  `per_page` tinyint(4) unsigned DEFAULT '20' COMMENT '所有分页',
  `footer_info` varchar(50) DEFAULT NULL COMMENT '备案信息',
  `copy_right` varchar(50) DEFAULT NULL COMMENT '版权',
  `add_source` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否开启跳转链接添加本站来源参数',
  `cache_time` int(11) NOT NULL DEFAULT '0' COMMENT '全站缓存时间',
  PRIMARY KEY (`sys_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `izy_sys_info`
--

INSERT INTO `izy_sys_info` (`sys_id`, `logo_link`, `site_name`, `site_keyword`, `site_desc`, `notice_limit`, `link_show_limit`, `per_page`, `footer_info`, `copy_right`, `add_source`, `cache_time`) VALUES
(1, '/', '爱资源导航站 - 你想要的这都有！', '找资源,最新电影,宅男福利,在线工具,vip会员共享,izy123.com', '一个日常必备寻找各种资源的导航站！', 3, 18, 15, '备案信息：京ICP证030173号', '2015-2017 izy123.com', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `izy_task_info`
--

CREATE TABLE IF NOT EXISTS `izy_task_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `izy_user_info`
--

CREATE TABLE IF NOT EXISTS `izy_user_info` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `type` enum('admin','normal','vip') DEFAULT 'normal',
  `status` enum('delete','online','offline') DEFAULT 'online',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `izy_user_info`
--

INSERT INTO `izy_user_info` (`user_id`, `username`, `password`, `type`, `status`, `create_time`) VALUES
(1, 'thinkwei', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 'online', '2017-04-09 20:08:35');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
