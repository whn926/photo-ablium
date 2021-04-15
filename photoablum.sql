-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2021 年 01 月 03 日 08:17
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `photoablum`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `ablum`
-- 

CREATE TABLE `ablum` (
  `ablum_id` int(3) NOT NULL auto_increment,
  `ablum_name` varchar(100) NOT NULL,
  `account` varchar(100) NOT NULL,
  PRIMARY KEY  (`ablum_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

-- 
-- 导出表中的数据 `ablum`
-- 

INSERT INTO `ablum` VALUES (17, 'mingxing', '13627470909');
INSERT INTO `ablum` VALUES (28, 'maboqian', '1');
INSERT INTO `ablum` VALUES (21, 'wuyifan', '1');
INSERT INTO `ablum` VALUES (19, 'mimi', '23213');
INSERT INTO `ablum` VALUES (12, 'yangmi', '1');
INSERT INTO `ablum` VALUES (25, 'sightseeing', '1');
INSERT INTO `ablum` VALUES (24, 'cartoon', '1');
INSERT INTO `ablum` VALUES (30, 'xinjian', '1');

-- --------------------------------------------------------

-- 
-- 表的结构 `imginfo`
-- 

CREATE TABLE `imginfo` (
  `img_id` int(3) NOT NULL auto_increment,
  `account` varchar(11) NOT NULL,
  `ablum_name` varchar(20) NOT NULL,
  `pic_path` varchar(100) NOT NULL,
  PRIMARY KEY  (`img_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=115 ;

-- 
-- 导出表中的数据 `imginfo`
-- 

INSERT INTO `imginfo` VALUES (90, '1', 'yangmi', '.upload_img/yangmi/160604726777933.jpg');
INSERT INTO `imginfo` VALUES (89, '23213', 'mimi', '.upload_img/mimi/160602573295805.jpg');
INSERT INTO `imginfo` VALUES (85, '1', 'yangmi', '.upload_img/yangmi/160597538864280.jpg');
INSERT INTO `imginfo` VALUES (102, '1', 'wuyifan', '.upload_img/wuyifan/160638999059809.jpg');
INSERT INTO `imginfo` VALUES (100, '1', 'sightseeing', '.upload_img/sightseeing/160604806392172.jpg');
INSERT INTO `imginfo` VALUES (98, '1', 'cartoon', '.upload_img/cartoon/160604798615696.jpg');
INSERT INTO `imginfo` VALUES (99, '1', 'wuyifan', '.upload_img/wuyifan/160604804920752.jpg');
INSERT INTO `imginfo` VALUES (57, '1', 'cartoon', '.upload_img/cartoon/160594064237696.jpg');
INSERT INTO `imginfo` VALUES (56, '1', 'cartoon', '.upload_img/cartoon/160594063193751.jpg');
INSERT INTO `imginfo` VALUES (92, '1', 'yangmi', '.upload_img/yangmi/160604728857318.jpg');
INSERT INTO `imginfo` VALUES (88, '23213', 'mimi', '.upload_img/mimi/160602572220590.jpg');
INSERT INTO `imginfo` VALUES (69, '1', 'yangmi', '.upload_img/yangmi/160594073724672.jpg');
INSERT INTO `imginfo` VALUES (70, '1', 'yangmi', '.upload_img/yangmi/160594074448493.jpg');
INSERT INTO `imginfo` VALUES (71, '1', 'yangmi', '.upload_img/yangmi/160594075233109.jpg');
INSERT INTO `imginfo` VALUES (72, '1', 'yangmi', '.upload_img/yangmi/160594076092004.jpg');
INSERT INTO `imginfo` VALUES (73, '13627470909', 'mingxing', '.upload_img/mingxing/160594811159232.jpg');
INSERT INTO `imginfo` VALUES (74, '13627470909', 'mingxing', '.upload_img/mingxing/160594811814465.jpg');
INSERT INTO `imginfo` VALUES (75, '13627470909', 'mingxing', '.upload_img/mingxing/160594812568180.jpg');
INSERT INTO `imginfo` VALUES (76, '13627470909', 'mingxing', '.upload_img/mingxing/160594813666631.jpg');
INSERT INTO `imginfo` VALUES (77, '13627470909', 'mingxing', '.upload_img/mingxing/160594949153244.jpg');
INSERT INTO `imginfo` VALUES (78, '13627470909', 'mingxing', '.upload_img/mingxing/160594949842448.jpg');
INSERT INTO `imginfo` VALUES (93, '1', 'yangmi', '.upload_img/yangmi/160604745344063.jpg');
INSERT INTO `imginfo` VALUES (101, '1', 'wuyifan', '.upload_img/wuyifan/160638996341967.jpg');
INSERT INTO `imginfo` VALUES (95, '1', 'yangmi', '.upload_img/yangmi/160604747016503.png');
INSERT INTO `imginfo` VALUES (96, '1', 'cartoon', '.upload_img/cartoon/160604792918506.jpg');
INSERT INTO `imginfo` VALUES (110, '1', 'maboqian', '.upload_img/maboqian/160846314868112.jpg');
INSERT INTO `imginfo` VALUES (104, '1', 'wuyifan', '.upload_img/wuyifan/160639010540396.jpg');
INSERT INTO `imginfo` VALUES (106, '1', 'sightseeing', '.upload_img/sightseeing/160639013274522.jpg');
INSERT INTO `imginfo` VALUES (112, '1', 'maboqian', '.upload_img/maboqian/160888348240467.jpg');
INSERT INTO `imginfo` VALUES (113, '1', 'maboqian', '.upload_img/maboqian/160888349241030.jpg');

-- --------------------------------------------------------

-- 
-- 表的结构 `user`
-- 

CREATE TABLE `user` (
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `account` varchar(11) NOT NULL,
  `ablumSum` int(2) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `user`
-- 

INSERT INTO `user` VALUES ('1212', '12', '1223', '1223', 0);
INSERT INTO `user` VALUES ('小燕子', '1', '23213', '23213', 1);
INSERT INTO `user` VALUES ('hahaha', '116', '18288128983', '13627470909', 1);
INSERT INTO `user` VALUES ('heiheihei', '1', '18612939505', '1', 6);
INSERT INTO `user` VALUES ('afsd', 'asdf', 'adsf', 'adsf', 0);
INSERT INTO `user` VALUES ('user', 'user', '123', '123', 0);
