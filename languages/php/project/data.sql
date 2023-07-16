-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 12 月 07 日 03:13
-- 服务器版本: 5.5.8
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `data`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pwd` char(32) NOT NULL,
  `last_login_ip` int(11) NOT NULL,
  `last_login_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `name`, `pwd`, `last_login_ip`, `last_login_time`) VALUES
(1, 'aa', '4124bc0a9335c27f086f24ba207a4912', 2130706433, 1417916496);

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `name`, `sort_order`, `parentid`) VALUES
(1, '手机', 50, 0),
(2, '二手手机', 50, 1),
(3, '三手手机', 50, 1),
(4, '首饰', 50, 0),
(5, '项链', 50, 4),
(6, '手镯', 50, 4);

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `goodsid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品编号',
  `name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img_ori` varchar(200) DEFAULT NULL,
  `img_thumb` varchar(200) DEFAULT NULL,
  `categoryid` int(11) NOT NULL,
  `status` set('best','new','hot') NOT NULL,
  `goods_desc` tinytext NOT NULL,
  PRIMARY KEY (`goodsid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`goodsid`, `name`, `price`, `img_ori`, `img_thumb`, `categoryid`, `status`, `goods_desc`) VALUES
(1, 'aa', '140.00', '5483bcf844675.jpg', NULL, 2, 'best,new', '很好'),
(2, '诺基亚2100', '22.00', '5483c42161bec.jpg', NULL, 2, 'new,hot', '真好');

-- --------------------------------------------------------

--
-- 表的结构 `sess`
--

CREATE TABLE IF NOT EXISTS `sess` (
  `sess_id` varchar(32) NOT NULL,
  `sess_value` text NOT NULL,
  `sess_expires` int(11) DEFAULT NULL,
  PRIMARY KEY (`sess_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sess`
--

INSERT INTO `sess` (`sess_id`, `sess_value`, `sess_expires`) VALUES
('h5pi4jj7hsrm855h3iac5vo963', 'code|s:4:"4N3B";admin|a:5:{s:2:"id";s:1:"1";s:4:"name";s:2:"aa";s:3:"pwd";s:32:"4124bc0a9335c27f086f24ba207a4912";s:13:"last_login_ip";s:10:"2130706433";s:15:"last_login_time";s:10:"1417833904";}', 1417921569);
