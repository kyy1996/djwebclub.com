/*
 Navicat Premium Data Transfer

 Source Server         : 本地
 Source Server Type    : MariaDB
 Source Server Version : 100208
 Source Host           : localhost
 Source Database       : webmaster

 Target Server Type    : MariaDB
 Target Server Version : 100208
 File Encoding         : utf-8

 Date: 10/28/2017 22:22:30 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `ws_about`
-- ----------------------------
DROP TABLE IF EXISTS `ws_about`;
CREATE TABLE `ws_about` (
  `name` varchar(50) NOT NULL,
  `value` varchar(2000) NOT NULL DEFAULT '',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `ws_about`
-- ----------------------------
BEGIN;
INSERT INTO `ws_about` VALUES ('advance_list', '[{\"title\":\"\\u5b9e\\u529b\",\"content\":\"\\u4e13\\u6ce8\\u4e8eWEB\\u5f00\\u53d1\\u516d\\u5e74\\uff0c\\u627f\\u63a5\\u8fc7PHP\\u3001H5\\u6e38\\u620f\\u3001\\u6570\\u636e\\u5e93\\u7b49\\u7a0b\\u5e8f\\u7684\\u5f00\\u53d1\\u3002\\u5747\\u83b7\\u5f97\\u5ba2\\u6237\\u597d\\u8bc4\\u3002\",\"more\":\"\"},{\"title\":\"\\u4e13\\u4e1a\",\"content\":\"\\u4f5c\\u4e3a\\u7f51\\u7ad9\\u65b9\\u9762\\u7684\\u6280\\u672f\\u578b\\u793e\\u56e2\\uff0c\\u793e\\u56e2\\u4e3b\\u8981\\u8d1f\\u8d23\\u4eba\\u4e0e\\u8bb2\\u5e08\\u638c\\u63e1\\u4e13\\u4e1a\\u7684\\u7f51\\u7ad9\\u8bbe\\u8ba1\\u5f00\\u53d1\\u6280\\u672f\\uff0c\\u5728\\u5916\\u957f\\u65f6\\u95f4\\u4ece\\u4e8b\\u7f51\\u7ad9\\u5f00\\u53d1\\u7684\\u5de5\\u4f5c\\uff0c\\u6709\\u4e30\\u5bcc\\u7684\\u7ecf\\u9a8c\\u3002\",\"more\":\"\"},{\"title\":\"\\u6548\\u7387\",\"content\":\"\\u6211\\u4eec\\u6709\\u81ea\\u5df1\\u7684\\u7f51\\u7ad9\\u4e0eQQ\\u7fa4\\uff0c\\u540c\\u5b66\\u4eec\\u53ef\\u5728\\u7f51\\u7ad9\\u6216QQ\\u4e0a\\u76f4\\u63a5\\u63d0\\u95ee\\uff0c\\u5927\\u5bb6\\u53ef\\u4ee5\\u4e00\\u8d77\\u4e3a\\u540c\\u5b66\\u4eec\\u7b54\\u7591\\u89e3\\u96be\\u3002\",\"more\":\"\"}]'), ('advance_title', '我们的优势'), ('history_content', '聚集了来自不同专业的，对网页制作感兴趣的同学，大家一起讨论HTML、CSS、JS等网页技术。 每周五，大家都会聚集在信息学院楼机房中，由社长主持一些讨论会，当场做实验。社团内部，还开设了“网页基础教学”、“PHP程序设计”、“前端技术”等课程，由社员自愿报名，学习相关知识，提升自身的技能。'), ('history_img', 'http://cdn.djwebclub.com/images/14878663457.png'), ('history_subtitle', '网页客研究会是由上海电机学院计算机1512班的孔元元于2015年创立的。'), ('history_title', '我们的历史'), ('team_list', '[{\"photo\":\"http:\\/\\/cdn.djwebclub.com\\/images\\/14878665957.png\",\"name\":\"\\u5b8b\\u6653\\u52c7\\u8001\\u5e08\",\"brief\":\"\\u4e0a\\u6d77\\u7535\\u673a\\u5b66\\u9662\\u7535\\u5b50\\u4fe1\\u606f\\u5b66\\u9662\\u6559\\u5e08\\uff0c\\u8bb2\\u6388\\u8ba1\\u7b97\\u673a\\u57fa\\u7840\\u3001\\u9ad8\\u7ea7\\u8bed\\u8a00\\u7a0b\\u5e8f\\u8bbe\\u8ba1\\u7b49\\u8bfe\\u7a0b\\uff0c\\u672c\\u793e\\u56e2\\u6307\\u5bfc\\u6559\\u5e08\\u3002\\u8fd1\\u4e9b\\u5e74\\u627f\\u62c5\\u6821\\u5185\\u5916\\u6a2a\\u5411\\u8bfe\\u9898\\u591a\\u9879\\uff0c\\u6709\\u4e30\\u5bcc\\u7684\\u7f51\\u7ad9\\u5f00\\u53d1\\u7ecf\\u9a8c\\u3002\",\"more\":\"\"},{\"photo\":\"http:\\/\\/cdn.djwebclub.com\\/images\\/14878665957.png\",\"name\":\"\\u5b54\\u5143\\u5143\",\"brief\":\"\\u6765\\u81ea\\u7535\\u5b50\\u4fe1\\u606f\\u5b66\\u9662\\u8ba1\\u7b97\\u673a1512\\u73ed\\u30022015\\u5e7410\\u6708\\u521b\\u7acb\\u672c\\u793e\\u56e2\\uff0c\\u586b\\u8865\\u4e86\\u7535\\u5b50\\u4fe1\\u606f\\u5b66\\u9662\\u6ca1\\u6709\\u8ba1\\u7b97\\u673a\\u4e13\\u4e1a\\u793e\\u56e2\\u7684\\u7a7a\\u767d\\u3002\\u7cbe\\u901aHTML\\u3001JS\\u3001CSS\\u3001PHP\\u7b49\\u7f51\\u7ad9\\u76f8\\u5173\\u6280\\u672f\\u3002\\u5728\\u793e\\u56e2\\u4e2d\\u8d1f\\u8d23\\u6559\\u6388\\u9ad8\\u7ea7\\u524d\\u7aef\\u6280\\u672f\\u4e0e\\u540e\\u53f0\\u7a0b\\u5e8f\\u5f00\\u53d1\\u3002\\u540c\\u65f6\\uff0c\\u4e0e\\u540c\\u5b66\\u4eec\\u4e00\\u8d77\\u4e3a\\u6821\\u5185\\u5916\\u7684\\u793e\\u56e2\\u3001\\u7ec4\\u7ec7\\u3001\\u516c\\u53f8\\u5f00\\u53d1\\u7f51\\u7ad9\\u3002\",\"more\":\"\"},{\"photo\":\"http:\\/\\/cdn.djwebclub.com\\/images\\/14878665957.png\",\"name\":\"\\u738b\\u4e00\\u5e05\",\"brief\":\"\\u6765\\u81ea\\u7535\\u5b50\\u4fe1\\u606f\\u5b66\\u9662\\u8ba1\\u7b97\\u673a1512\\u73ed\\u3002\\u4ece\\u793e\\u56e2\\u521b\\u7acb\\u8d77\\u52a0\\u5165\\u793e\\u56e2\\u3002\\u5728\\u793e\\u957f\\u7684\\u4e00\\u5e74\\u57f9\\u517b\\u4e0b\\uff0c\\u638c\\u63e1HTML\\u3001CSS\\u7b49\\u524d\\u7aef\\u6280\\u672f\\u3002\\u73b0\\u62c5\\u4efb\\u793e\\u56e2\\u57f9\\u8bad\\u90e8\\u524d\\u7aef\\u8bb2\\u5e08\\u3002\",\"more\":\"\"}]'), ('team_title', '我们的团队');
COMMIT;

-- ----------------------------
--  Table structure for `ws_activities`
-- ----------------------------
DROP TABLE IF EXISTS `ws_activities`;
CREATE TABLE `ws_activities` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `hide` int(1) NOT NULL DEFAULT 0,
  `pause` int(1) NOT NULL DEFAULT 0,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) DEFAULT '普通活动',
  `location` varchar(100) DEFAULT '信息楼407机房',
  `host` varchar(20) DEFAULT NULL COMMENT '主持人',
  `available` int(5) NOT NULL DEFAULT 50 COMMENT '活动容量',
  `signup_amount` int(6) NOT NULL DEFAULT 0 COMMENT '已选人数',
  `time` varchar(20) NOT NULL DEFAULT '周三18:00',
  `comment` text DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `ws_activities`
-- ----------------------------
BEGIN;
INSERT INTO `ws_activities` VALUES ('1', '1', '1', 'HTML基础教学', '教学活动', '信息楼407机房', '孔元元', '50', '0', '周三18:00', '', null, null, null), ('2', '1', '0', '晚自习', '晚自习', '寝室', '孔元元', '50', '8', '周四18:00', '', null, null, null), ('3', '1', '1', 'JS项目实战', '教学活动', '群视频', '孔元元', '350', '17', '周五21:00', '', null, null, null), ('4', '1', '1', '前端基础', '教学活动', '信息楼407机房', '孔元元', '50', '0', '周三18:00', '', null, null, null), ('6', '1', '0', '前端基础培训', '教学活动', '信息楼407机房', '王一帅', '40', '27', '周二18:00', '', null, null, null), ('7', '1', '0', '前端基础培训', '教学活动', '信息楼407机房', '王一帅', '40', '28', '周三18:00', '', null, null, null), ('8', '1', '0', '前端基础培训', '教学活动', '群视频', '孔元元', '350', '14', '周六21:00', '', null, null, null), ('9', '1', '0', 'JS与面向对象基础', '教学活动', '群视频', '孔元元', '350', '19', '周日13:00', '', null, null, null), ('10', '1', '0', '狼人杀', '线下游戏', '学生事务中心210活动室', '孔元元', '20', '6', '周一18:00', '', null, null, null), ('11', '1', '0', '设计沙龙', '教学活动', '信息楼407机房', '李汇豫', '40', '25', '周四18:30', '', null, null, null), ('12', '1', '0', 'PHP入门', '教学活动', '群视频', '孔元元', '500', '0', '周五21:00', '', null, null, null), ('13', '1', '0', '服务器运维基础', '教学活动', '群视频', '孔元元', '500', '0', '周六21:00', '', null, null, null), ('14', '1', '0', 'js与jQuery高级培训', '教学活动', '信息楼411机房', '王一帅', '50', '9', '周四18:00', '', null, '2017-09-20 17:12:44', null), ('15', '1', '0', 'js与jQuery高级培训', '教学活动', '信息楼411机房', '王一帅', '50', '7', '周三18:00', '', null, '2017-09-20 17:12:43', null), ('16', '1', '0', 'PHP框架开发', '教学活动', '群视频', '孔元元', '350', '13', '周五20:00', '', null, '2017-09-20 17:12:43', null), ('17', '1', '0', 'C语言课程辅导', '教学活动', '信息楼411机房', '宋晓勇老师', '50', '4', '周一20:00', '', null, null, null), ('18', '1', '0', '小游戏开发培训', '教学活动', '信息楼411机房', '麦思科技', '60', '0', '周三18:00', '', null, null, null), ('19', '1', '0', '9.25 搭建自己的第一个技术博客', '教学活动', '信息楼411机房', '王一帅', '50', '3', '周一20:00', '', null, '2017-10-15 14:14:41', null), ('20', '0', '0', 'HTML/CSS基础', '教学活动', '信息楼411机房', '王一帅/陈作栋', '50', '18', '周三20:00-21:00', '', '2017-10-15 13:56:19', '2017-10-15 13:56:19', null), ('21', '0', '0', 'HTML/CSS/JS基础', '教学活动', '信息楼411机房', '王一帅/陈作栋', '50', '18', '周四20:00-21:00', '', '2017-10-15 13:57:35', '2017-10-15 13:57:35', null), ('22', '0', '0', 'HTML/CSS/JS基础', '教学活动', '群视频', '王一帅/陈作栋', '50', '21', '周五21:00-22:00', '周三周四没来的可以通过直播补上，来了的可以复习巩固', '2017-10-15 14:21:29', '2017-10-15 14:21:29', null), ('23', '0', '0', 'PHP基础', '教学活动', '群视频', '王一帅', '50', '17', '周六21:00-22:00', '', '2017-10-15 14:22:34', '2017-10-15 14:22:34', null);
COMMIT;

-- ----------------------------
--  Table structure for `ws_activities_comment`
-- ----------------------------
DROP TABLE IF EXISTS `ws_activities_comment`;
CREATE TABLE `ws_activities_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_id` int(11) NOT NULL DEFAULT 0,
  `parent_id` int(11) DEFAULT 0,
  `uid` int(11) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `create_time` varchar(11) DEFAULT NULL,
  `update_time` varchar(11) DEFAULT NULL,
  `delete_time` varchar(11) DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `ws_advance`
-- ----------------------------
DROP TABLE IF EXISTS `ws_advance`;
CREATE TABLE `ws_advance` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `more` varchar(1024) DEFAULT NULL,
  `index` int(2) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `ws_advance`
-- ----------------------------
BEGIN;
INSERT INTO `ws_advance` VALUES ('1', '专业', '作为网站方面的技术型社团，社团主要负责人与讲师掌握专业的网站设计开发技术，在外长时间从事网站开发的工作，有丰富的经验。', '', '99'), ('2', '效率', '我们有自己的网站与QQ群，同学们可在网站或QQ上直接提问，大家可以一起为同学们答疑解难。', '', '0');
COMMIT;

-- ----------------------------
--  Table structure for `ws_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `ws_auth_group`;
CREATE TABLE `ws_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户组id,自增主键',
  `module` varchar(20) NOT NULL DEFAULT '' COMMENT '用户组所属模块',
  `type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '组类型',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '用户组中文名称',
  `description` varchar(80) NOT NULL DEFAULT '' COMMENT '描述信息',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '用户组状态：为1正常，为0禁用,-1为删除',
  `rules` varchar(500) NOT NULL DEFAULT '' COMMENT '用户组拥有的规则id，多个规则 , 隔开',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Records of `ws_auth_group`
-- ----------------------------
BEGIN;
INSERT INTO `ws_auth_group` VALUES ('1', 'admin', '1', '超级管理员', '', '1', '1,2,38,3,4,40,41,115,5,114,6,113,7,8,53,9,11,51,52,12,57,58,13,60,61,16,17,65,66,68,69,18,70,71,72,19,74,75,20,77,78,79,21,109,116,222,223,22,23,81,83,24,86,87,227,25,220,221,26,30,217,219,31,34,225,226,230,32,27,33,28,29,100,101,35,36,224,229,247,123,214,215,110,111,112,117,118,121,122,119,120,216,218'), ('6', 'admin', '0', '观光团', '', '1', '1,2,3,4,5,6,7,8,11,12,13,16,17,18,19,20,21,22,23,24,25,26,30,31,27,28,29,35,36,110,117,118,119,120,216,218'), ('4', 'admin', '0', '内容管理员', '', '1', '1,3,4,40,41,115,5,114,6,113,7,8,53,9,11,51,52,12,57,58,13,60,61,28,29,100,101,110,111,112,216,218'), ('5', 'admin', '0', '活动管理员', '', '1', '1,16,17,65,66,68,69,18,70,71,72,19,74,75,20,77,78,79,21,109,116,222,223,22,23,81,83,24,86,87,227,216,218');
COMMIT;

-- ----------------------------
--  Table structure for `ws_auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `ws_auth_group_access`;
CREATE TABLE `ws_auth_group_access` (
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `group_id` mediumint(8) unsigned NOT NULL COMMENT '用户组id',
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- ----------------------------
--  Records of `ws_auth_group_access`
-- ----------------------------
BEGIN;
INSERT INTO `ws_auth_group_access` VALUES ('1', '1');
COMMIT;

-- ----------------------------
--  Table structure for `ws_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `ws_auth_rule`;
CREATE TABLE `ws_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '规则id,自增主键',
  `module` varchar(20) NOT NULL COMMENT '规则所属module',
  `type` tinyint(2) NOT NULL DEFAULT 1 COMMENT '1-url;2-主菜单',
  `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一英文标识',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则中文描述',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '是否有效(0:无效,1:有效)',
  `condition` varchar(300) NOT NULL DEFAULT '' COMMENT '规则附加条件',
  PRIMARY KEY (`id`),
  KEY `module` (`module`,`status`,`type`)
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Records of `ws_auth_rule`
-- ----------------------------
BEGIN;
INSERT INTO `ws_auth_rule` VALUES ('1', 'admin', '2', 'Admin/Index/index', '控制台概览', '1', ''), ('2', 'admin', '2', 'Admin/Common/index', '全局设置', '1', ''), ('3', 'admin', '2', 'Admin/Page/index', '页面设置', '1', ''), ('4', 'admin', '2', 'Admin/Page/index', '首页', '1', ''), ('5', 'admin', '2', 'Admin/Page/contact', '联系我们', '1', ''), ('6', 'admin', '2', 'Admin/Page/about', '关于', '1', ''), ('7', 'admin', '2', 'Admin/Blog/index', '部落格', '1', ''), ('8', 'admin', '2', 'Admin/Blog/index', '浏览', '1', ''), ('9', 'admin', '2', 'Admin/Blog/update', '发表/更新文章', '1', ''), ('10', 'admin', '2', 'Admin/Blog/category', '分类管理', '1', ''), ('11', 'admin', '2', 'Admin/Blog/comment', '博文评论管理', '1', ''), ('12', 'admin', '2', 'Admin/Comment/index', '留言板', '1', ''), ('13', 'admin', '2', 'Admin/Gallery/index', '画廊', '1', ''), ('14', 'admin', '2', 'Admin/Gallery/index', '图片管理', '1', ''), ('15', 'admin', '2', 'Admin/Gallery/category', '分类', '1', ''), ('16', 'admin', '2', 'Admin/Activity/index', '社团活动', '1', ''), ('17', 'admin', '2', 'Admin/Activity/index', '活动管理', '1', ''), ('18', 'admin', '2', 'Admin/Activity/checkin', '签到管理', '1', ''), ('19', 'admin', '2', 'Admin/Activity/blacklist', '黑名单', '1', ''), ('20', 'admin', '2', 'Admin/Activity/signup', '报名情况', '1', ''), ('21', 'admin', '2', 'Admin/Activity/comment', '活动评价', '1', ''), ('22', 'admin', '2', 'Admin/JoinUs/index', '招募令', '1', ''), ('23', 'admin', '2', 'Admin/JoinUs/index', '招募管理', '1', ''), ('24', 'admin', '2', 'Admin/JoinUs/apply', '报名管理', '1', ''), ('25', 'admin', '2', 'Admin/Menu/index', '菜单与权限节点管理', '1', ''), ('26', 'admin', '2', 'Admin/UserGroup/index', '用户组管理', '1', ''), ('27', 'admin', '2', 'Admin/Auth/index', '权限管理', '1', ''), ('28', 'admin', '2', 'Admin/Statistic/index', '统计系统', '1', ''), ('29', 'admin', '2', 'Admin/Seo/index', 'Seo相关', '1', ''), ('30', 'admin', '1', 'Admin/User/index', '用户列表', '1', ''), ('31', 'admin', '1', 'Admin/UserGroup/index', '用户组列表', '1', ''), ('32', 'admin', '1', 'Admin/UserGroup/users', '用户分配', '1', ''), ('33', 'admin', '1', 'Admin/Auth/save', '保存', '1', ''), ('34', 'admin', '1', 'Admin/UserGroup/save', '保存', '1', ''), ('35', 'admin', '2', 'Admin/Develop/index', '开发工具', '1', ''), ('36', 'admin', '1', 'Admin/Reflection/index', '反射器', '1', ''), ('37', 'admin', '1', 'Admin/Common/index', '全局设置', '1', ''), ('38', 'admin', '1', 'Admin/Common/update', '保存', '1', ''), ('39', 'admin', '1', 'Admin/Page/getBanner', '得到Banner新闻列表', '1', ''), ('40', 'admin', '1', 'Admin/Page/updateBanner', '保存Banner信息', '1', ''), ('41', 'admin', '1', 'Admin/Page/delBanner', '删除Banner信息', '1', ''), ('42', 'admin', '1', 'Admin/Page/UploadBannerImg', '上传Banner图片', '1', ''), ('43', 'admin', '1', 'Admin/Page/uploadHistoryImg', '上传历史图片', '1', ''), ('44', 'admin', '1', 'Admin/Page/getTeam', '得到团队列表', '1', ''), ('45', 'admin', '1', 'Admin/Page/updateTeam', '保存团队信息', '1', ''), ('46', 'admin', '1', 'Admin/Page/delTeam', '删除团队', '1', ''), ('47', 'admin', '1', 'Admin/Page/getAdvance', '得到优势信息', '1', ''), ('48', 'admin', '1', 'Admin/Page/delAdvance', '删除优势信息', '1', ''), ('49', 'admin', '1', 'Admin/Page/updateAdvance', '更新优势信息', '1', ''), ('50', 'admin', '1', 'Admin/Blog/UploadImg', '上传图像', '1', ''), ('51', 'admin', '1', 'Admin/Blog/replyComment', '回复评论', '1', ''), ('52', 'admin', '1', 'Admin/Blog/delComment', '删除评论', '1', ''), ('53', 'admin', '1', 'Admin/Blog/del', '删除博文', '1', ''), ('54', 'admin', '1', 'Admin/Blog/updateCategory', '更新分类', '1', ''), ('55', 'admin', '1', 'Admin/Blog/delCategory', '删除分类', '1', ''), ('56', 'admin', '1', 'Admin/Blog/getCategory', '得到分类信息', '1', ''), ('57', 'admin', '1', 'Admin/Comment/replyComment', '回复留言', '1', ''), ('58', 'admin', '1', 'Admin/Comment/delComment', '删除留言', '1', ''), ('59', 'admin', '1', 'Admin/Comment/list_to_media', '显示留言树', '1', ''), ('60', 'admin', '1', 'Admin/Gallery/update', '更新图片', '1', ''), ('61', 'admin', '1', 'Admin/Gallery/del', '删除图片', '1', ''), ('62', 'admin', '1', 'Admin/Gallery/updateCategory', '更新分类信息', '1', ''), ('63', 'admin', '1', 'Admin/Gallery/delCategory', '删除分类', '1', ''), ('64', 'admin', '1', 'Admin/Gallery/getCategory', '得到分类信息', '1', ''), ('65', 'admin', '1', 'Admin/Activity/update', '更新', '1', ''), ('66', 'admin', '1', 'Admin/Activity/del', '删除', '1', ''), ('67', 'admin', '1', 'Admin/Activity/ajaxGetActivity', 'AJAX得到活动信息', '1', ''), ('68', 'admin', '1', 'Admin/Activity/ajaxGetQrcode', 'AJAX得到签到二维码', '1', ''), ('69', 'admin', '1', 'Admin/Activity/showQrcode', '显示签到二维码', '1', ''), ('70', 'admin', '1', 'Admin/Activity/checkin_print', '打印签到信息', '1', ''), ('71', 'admin', '1', 'Admin/Activity/updateCheckin', '更新签到信息', '1', ''), ('72', 'admin', '1', 'Admin/Activity/delCheckin', '删除签到', '1', ''), ('73', 'admin', '1', 'Admin/Activity/ajaxGetCheckin', 'AJAX得到签到信息', '1', ''), ('74', 'admin', '1', 'Admin/Activity/delBlacklist', '删除黑名单', '1', ''), ('75', 'admin', '1', 'Admin/Activity/updateBlacklist', '更新黑名单', '1', ''), ('76', 'admin', '1', 'Admin/Activity/ajaxGetBlacklist', 'AJAX得到黑名单信息', '1', ''), ('77', 'admin', '1', 'Admin/Activity/updateSignup', '更新报名信息', '1', ''), ('78', 'admin', '1', 'Admin/Activity/delSignup', '删除报名信息', '1', ''), ('79', 'admin', '1', 'Admin/Activity/signup_print', '打印报名列表', '1', ''), ('80', 'admin', '1', 'Admin/Activity/ajaxGetSignup', 'AJAX得到报名信息', '1', ''), ('81', 'admin', '1', 'Admin/JoinUs/update', '更新', '1', ''), ('82', 'admin', '1', 'Admin/JoinUs/ajaxGetJob', 'AJAX得到招募信息', '1', ''), ('83', 'admin', '1', 'Admin/JoinUs/del', '删除', '1', ''), ('84', 'admin', '1', 'Admin/JoinUs/enableJob', '启用招募', '1', ''), ('85', 'admin', '1', 'Admin/JoinUs/disableJob', '关闭招募', '1', ''), ('86', 'admin', '1', 'Admin/JoinUs/apply_print', '打印报名信息', '1', ''), ('87', 'admin', '1', 'Admin/JoinUs/updateApply', '更新报名信息', '1', ''), ('88', 'admin', '1', 'Admin/JoinUs/delApply', '删除报名信息', '1', ''), ('89', 'admin', '1', 'Admin/JoinUs/ajaxGetApply', 'AJAX得到报名信息', '1', ''), ('90', 'admin', '1', 'Admin/JoinUs/ajaxApprove', 'AJAX通过申请', '1', ''), ('91', 'admin', '1', 'Admin/JoinUs/ajaxReject', 'AJAX拒绝申请', '1', ''), ('92', 'admin', '1', 'Admin/Menu/save', '保存', '1', ''), ('93', 'admin', '1', 'Admin/Menu/tree', '显示节点树', '1', ''), ('94', 'admin', '1', 'Admin/Menu/del', '删除', '1', ''), ('95', 'admin', '1', 'Admin/Auth/tree', '显示节点树', '1', ''), ('96', 'admin', '1', 'Admin/Statistic/update', '更新', '1', ''), ('97', 'admin', '1', 'Admin/Statistic/del', '删除', '1', ''), ('98', 'admin', '1', 'Admin/Seo/commit', '提交链接', '1', ''), ('99', 'admin', '1', 'Admin/Seo/commitAll', '提交全部链接', '1', ''), ('100', 'admin', '1', 'Admin/Seo/update', '更新', '1', ''), ('101', 'admin', '1', 'Admin/Seo/delete', '删除', '1', ''), ('102', 'admin', '1', 'Admin/User/getInfo', '得到用户信息', '1', '');
COMMIT;

-- ----------------------------
--  Table structure for `ws_banner_text`
-- ----------------------------
DROP TABLE IF EXISTS `ws_banner_text`;
CREATE TABLE `ws_banner_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `button_white` varchar(255) DEFAULT NULL,
  `button_red` varchar(255) DEFAULT NULL,
  `index` tinyint(2) NOT NULL DEFAULT 0 COMMENT '排序',
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `ws_banner_text`
-- ----------------------------
BEGIN;
INSERT INTO `ws_banner_text` VALUES ('1', '盒子模型讨论会', '孔元元社长组织了一次盒子模型讨论会', '在周五，孔元元带领同学来到信息学院楼405机房进行了盒子模型讨论会，与大家分享了DIV+CSS盒子模型的特点与相关CSS属性。 特别是对现代网页的布局方式及其特点做了详细的阐述，对同学提出的效果使用了多种不同的方式实现，使同学对盒子模型有了初步的认识。 ', '', '', '0', '1460956493'), ('2', '百团大战', '2016年百团大战大获全胜', '2016年9月27日中午，社长带领着社员们来到学校半月广场，开始了百团大战。虽然社团摊位位于偏僻的一食堂侧门，但前来报名参加社团的同学络绎不绝。本次百团大战为社团新添了近70多位社员，其中不乏精通网站设计的同学，这为社团的发展增添了活力。', '', '', '0', '1475126816');
COMMIT;

-- ----------------------------
--  Table structure for `ws_blacklist`
-- ----------------------------
DROP TABLE IF EXISTS `ws_blacklist`;
CREATE TABLE `ws_blacklist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stu_no` bigint(15) unsigned NOT NULL,
  `class` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `create_time` int(12) unsigned DEFAULT NULL,
  `update_time` varchar(12) DEFAULT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `valid` int(1) unsigned DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `uid` int(15) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`,`stu_no`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `stu_no_UNIQUE` (`stu_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `ws_blog`
-- ----------------------------
DROP TABLE IF EXISTS `ws_blog`;
CREATE TABLE `ws_blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `create_time` int(12) NOT NULL,
  `class` int(11) NOT NULL DEFAULT 0,
  `hide` tinyint(1) NOT NULL DEFAULT 0,
  `uid` int(11) NOT NULL DEFAULT 1,
  `cover_img` varchar(255) DEFAULT '',
  `comment_count` int(10) DEFAULT 0,
  `read_count` int(12) NOT NULL DEFAULT 0,
  `ip` varchar(15) DEFAULT NULL,
  `delete_time` int(12) DEFAULT NULL,
  `update_time` int(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `ws_blog`
-- ----------------------------
BEGIN;
INSERT INTO `ws_blog` VALUES ('1', '本社团正式成立', '&lt;p&gt;　　今日社长孔元元参加了由社团联举行的新社团成立答辩会，向几位五星社团社长以及社管部的同学介绍了网页客研究会的职能、成员组成以及未来规划。社管部同学批准了申请。&lt;/p&gt;\r\n', '1444824000', '4', '0', '1', 'http://cdn.djwebclub.com/images/14877739378.jpg', '0', '892', '116.230.44.214', null, null), ('2', '网页基础组培训课', '&lt;p&gt;由社长孔元元带领同学来到信息学院楼405机房，向大家介绍了不同的CSS选择器与盒子模型的基本概念。 这节课从十二点半开始一直持续到三点。课后也对同学们提出的问题进行答疑。&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; height=&quot;3120&quot; src=&quot;http://cdn.djwebclub.com/images/158ada0c6c0b43.jpg&quot; width=&quot;4208&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; height=&quot;3120&quot; src=&quot;http://cdn.djwebclub.com/images/158ada0d4a5128.jpg&quot; width=&quot;4208&quot; /&gt;&lt;/p&gt;\r\n', '1448539200', '4', '0', '1', 'http://cdn.djwebclub.com/images/14877739201.jpg', '0', '272', '124.77.97.53', null, null), ('3', '新学期，新计划', '&lt;p&gt;小伙伴们，新学期到啦！无目标，无理想。作为一个有理想，有抱负的好社团，该展望一下这学期的目标咯！&lt;/p&gt;&lt;p&gt;1. 院社团联在九月底会有一个晚会，每个社团出一个节目。大家有兴趣想展示一下自己的可以跟活动部说，然后董事会审核。欢迎大家踊跃报名！&lt;/p&gt;&lt;p&gt;2. 日常活动肯定不能太单调了，举办一点游戏技能大赛吧（网上有一个用js代码来相互PK的坦克大战）。&lt;/p&gt;&lt;p&gt;3. 日常活动的主讲我得换人了，王一帅主讲html基础和盒子模型。我线上授课讲js。需要其他语言讲解的，可以统计人数，单独开班线上授课。&lt;/p&gt;&lt;p&gt;4. 这学期会举办一个校级的网页制作大赛，主题可以由大家一起来共同决定。&lt;/p&gt;&lt;p&gt;5. 我们的口号是：搞事！搞事！搞事！&lt;/p&gt;', '1473335698', '4', '0', '1', '', '0', '604', '180.169.48.113', null, null), ('4', '选课啦！选课啦！', '&lt;p&gt;大胸弟们！准备好让老司机带领你们飙车了嘛！是不是已经选完了学校的课，但却感觉时间依旧得不到充分地利用呢？想不想抓紧大学的时间来学习一门新技术呢？那就快来报名参加我们社团的课程吧！&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=&quot;font-size:14px&quot;&gt;报名指南：每个人可报名参加的活动数量不限，但时间不能发生冲突。确认报名参加活动后，若改变主意了，请联系教导主任进行退选。活动开始后，禁止无故缺席。缺席四次及以上的同学将被强制退选。&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=&quot;font-size:14px&quot;&gt;PS: 大家可以自由选择不同的讲师、地点与时间的活动哦~&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=&quot;font-size:14px&quot;&gt;社团活动选课系统已经开通，请大家进入社团网站根据自己的时间安排进行选课&lt;br /&gt;\r\n每门课程的主讲教师、时间与地点都不相同&lt;br /&gt;\r\n线上活动从本周开始，线下活动从下周开始，请各位关注&lt;br /&gt;\r\n&lt;a href=&quot;http://www.djwebclub.com/Activity/index.html&quot; style=&quot;outline: 0px; widows: auto;&quot; target=&quot;_blank&quot;&gt;http://www.djwebclub.com/Activity/index.html&lt;/a&gt;&lt;/span&gt;&lt;/p&gt;\r\n', '1473337225', '4', '0', '1', 'http://cdn.djwebclub.com/images/14877738436.jpg', '0', '1299', '116.230.44.214', null, null), ('5', '【社团活动】新生见面会！', '&lt;p&gt;昨天晚上九点社长在一食堂二楼举行了鲜肉见面会。大家都相互介绍自己，一起憧憬着未来。&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; height=&quot;1382&quot; src=&quot;http://cdn.djwebclub.com/images/158ada06230a54.jpg&quot; width=&quot;1843&quot; /&gt;&lt;img alt=&quot;&quot; height=&quot;1382&quot; src=&quot;http://cdn.djwebclub.com/images/158ada06d88047.jpg&quot; width=&quot;1843&quot; /&gt;&lt;/p&gt;\r\n', '1473729753', '4', '0', '1', 'http://cdn.djwebclub.com/images/14877738216.jpg', '0', '2653', '180.160.142.179', null, null), ('6', '【社团活动】9.27日周二活动', '&lt;p&gt;今天是百团大战胜利后的第一天，讲师王一帅带领近50位同学在信息楼407机房进行了第一次正式活动。经过这次的活动，同学们对于HTML概念、HTML标签与网页的本质有了基础的了解。&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;王一帅正在授课&quot; src=&quot;http://cdn.djwebclub.com/images/158ad9f21ba494.jpg&quot; width=&quot;1024&quot; /&gt;&lt;/p&gt;\r\n', '1475317326', '4', '0', '1', 'http://cdn.djwebclub.com/images/14877737234.jpg', '0', '10633', '180.154.9.147', null, '1488782816'), ('7', '【社团活动】新学期，新活动', '&lt;p&gt;2016/2017学年第二学期到了，社团也要进行新学期的活动了。&lt;/p&gt;\r\n\r\n&lt;p&gt;本学期为大家精心准备了jQuery基础、PHP面向对象、MVC框架开发、PHP整站开发等高端课程，而且还会安排老师进行C语言辅导答疑的活动。&lt;/p&gt;\r\n\r\n&lt;p&gt;欢迎感兴趣的各位在网站上选课~&lt;/p&gt;\r\n\r\n&lt;p&gt;社团选课网址：&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;a href=&quot;http://www.djwebclub.com/activity/index.html&quot;&gt;http://www.djwebclub.com/activity/index.html&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;各位尽情期待咯~祝大家新学期取得更好的成绩~&lt;/p&gt;\r\n', '1488781776', '4', '0', '1', '', '0', '319', '180.169.48.113', null, '1488782938'), ('8', '【PHP框架开发】第一讲 PHP框架导论', '# 何为PHP框架\r\n\r\nPHP框架是一套集成了数据库操作模块、URL路由模块、浏览器请求模块等各种常用代码的PHP程序集。\r\n\r\n# 为何使用PHP框架开发网站\r\n\r\nPHP框架中集成了我们开发网站所需的大部分代码，例如：数据库操作、文件访问、请求分析、MVC引擎等。我们可以直接使用框架中提供的函数、对象、方法等来实现快速我们的网站，为我们省下了开发基础功能的时间。\r\n\r\n# 常见的PHP框架\r\n\r\n*   laravel\r\n*   ~~Yii~~\r\n*   ThinkPHP\r\n*   CodeIgniter\r\n*   Symfony\r\n*   ...\r\n\r\n_Yii这个框架使用者逐年下降，它的开发方法太繁琐了，前端和后端捆绑过于紧密，我不推荐用。但可以学习它的实现思路。_\r\n\r\n# MVC简介\r\n\r\n## MVC起源\r\n\r\n初学者常见的网站开发流程\r\n\r\n![初学者常见的网站开发流程](http://www.kyy1996.com/diagrams/PHP%E6%A1%86%E6%9E%B6%E5%BC%80%E5%8F%91-%E7%AC%AC%E4%B8%80%E8%AE%B2%20PHP%E6%A1%86%E6%9E%B6%E5%AF%BC%E8%AE%BA-diagram-0.png)\r\n\r\n大部分初学者都喜欢在页面中编写PHP语句。例如在MySQL数据库中有数据表`user`\r\n\r\n| id | user | password |\r\n|:---:|:---:|:---:|\r\n| 1 | alen | 123456 |\r\n| 2 | root | 123456 |\r\n\r\n现要在一张网页中展示这张数据表。编写代码如下\r\n\r\n```php\r\n&lt;table&gt;\r\n    &lt;tr&gt;\r\n        &lt;th&gt;uid&lt;/th&gt;\r\n        &lt;th&gt;用户名&lt;/th&gt;\r\n        &lt;th&gt;密码&lt;/th&gt;\r\n    &lt;/tr&gt;\r\n    &lt;?php\r\n    $db_link = require(&quot;db.php&quot;);//引入数据库连接，并得到连接ID\r\n    $sql = &quot;SELECT * FROM user;&quot;;//这是一条从user数据表中获取所有行的SQL语句\r\n    $query = mysqli_query($db_link, $sql);//执行SQL语句，返回结果集\r\n    if(!$query) die(&quot;数据库连接失败&quot;);//查询失败，程序结束\r\n    while($row = mysqli_fetch_assoc($query)){//循环结果集，得到每一行数据\r\n    ?&gt;\r\n    &lt;tr&gt;\r\n        &lt;td&gt;\r\n            &lt;?=$row[\'id\']?&gt;\r\n        &lt;/td&gt;\r\n        &lt;td&gt;\r\n            &lt;?=$row[\'name\']?&gt;\r\n        &lt;/td&gt;\r\n        &lt;td&gt;\r\n            &lt;?=$row[\'password\']?&gt;\r\n        &lt;/td&gt;\r\n    &lt;/tr&gt;\r\n    &lt;?php\r\n    }\r\n    mysqli_free_result($query);//释放结果集\r\n    mysqli_close($db_link);//释放连接\r\n    ?&gt;\r\n&lt;/table&gt;\r\n\r\n```\r\n\r\n&gt; `mysqli_query`函数用来在`$db_link`数据库中指定执行SQL语句 `mysqli_fetch_assoc`函数用来从`$query`查询结果中取出结果数组 **结果数组** 是查询得到的结果集中的一列数组。数组元素的索引名是数据表的字段名 `mysqli_free_result` 函数用来从内存中释放查询得到的结果集 `mysqli_close` 函数用来关闭数据库连接，释放连接资源\r\n\r\n这段程序运行起来没有问题，但如果有很多数据需要展示的话，就需要写很多这样的代码。 而且，如果有一天我需要大幅度更换页面样式了，由于代码中数据库操作部分的代码与页面html交杂在一起，导致整张页面都需要重写，最终导致的就是**可维护性差**。 问题的解决方法就是使数据库操作代码与HTML页面展示代码**分开**。\r\n\r\n## MVC定义\r\n\r\n使业务逻辑（也就是数据库操作、数据判断等代码）与页面代码（HTML）分开开发的软件开发模式叫MVC。 其中，M指_模型（Model）_，V指_视图（View）_，C指_控制器（Controller）_。\r\n\r\n## 网站开发中的MVC\r\n\r\n在网站开发中，模型通常用来操作数据库与实现数据判断逻辑；控制器则用来处理用户提交的表单并把数据提交给模型，并把处理结果返回给视图；视图则是一张成型的HTML网页，只不过挖去了数据部分。\r\n\r\n## PHP中的MVC\r\n\r\n在PHP中，一个小模块对应一个控制器类，其中有实现各种操作的方法，例如修改用户、新增博客文章、删除评论、展示首页等等。小模块例如：用户中心、博客、首页、留言板等。\r\n\r\n而Model，则是一张数据表对应一个模型类s，模型名是数据表名。例如上文中的user数据表，其模型名就是User。\r\n\r\n&gt; 每个模型共用的add、update、delete、get方法，即对数据库的增删改查操作由框架实现。 框架提供一个Model类，其使用框架的方法，实现了增删改查操作，每个模型类继承这个类。\r\n\r\nView，是一个HTML页面模板，其中有写好的页面样式。通常是一个控制器的一个操作方法对应一个视图模板。\r\n\r\n通常视图会由视图模板引擎来渲染输出到浏览器\r\n\r\n## MVC扩展\r\n\r\n对于一些大型网站系统来说，Model模型会被细分为Service服务层、Logic逻辑层与Model数据模型层。\r\n\r\n此时，Model模型层就只负责操作数据库，例如增删改查，业务逻辑代码则被放置在了Logic逻辑层中。而Service服务层，则用来存放多个模块公用的代码。例如一套网站系统的用户系统、文件系统。网站的前台和后台都需要操作用户系统与文件系统。这两套系统同时为网站的前台与后台服务，所以这一层叫服务层。\r\n\r\n当然，MVC架构很灵活，可以任意变动。对于小网站来说，甚至可以不需要Model模型层，只留下Controller与View。业务逻辑代码在Controller中实现。\r\n\r\n# PHP框架运行流程\r\n\r\n![框架的运行流程](http://www.kyy1996.com/diagrams/PHP%E6%A1%86%E6%9E%B6%E5%BC%80%E5%8F%91-%E7%AC%AC%E4%B8%80%E8%AE%B2%20PHP%E6%A1%86%E6%9E%B6%E5%AF%BC%E8%AE%BA-diagram-1.png)\r\n\r\n## URL调度\r\n\r\n对于地址：`http://admin.djwebclub.com/Admin/Signup/index.html`\r\n\r\n&gt; **URL构成** 协议://主机名:端口号/资源路径 在http协议中，端口号默认为80\r\n\r\n框架先把地址拆开，得到数组\r\n\r\n```\r\n$url = [\r\n    \'scheme\'    =&gt;  &quot;http&quot;, //协议\r\n    \'host\'      =&gt;  &quot;admin.djwebclub.com&quot;, //主机名\r\n    &quot;path&quot;      =&gt;  &quot;/Admin/Signup/index.html&quot;, //资源地址\r\n    &quot;port&quot;      =&gt;  80, //端口号\r\n    &quot;filename&quot;  =&gt;  &quot;index.html&quot;, //文件名\r\n    &quot;basename&quot;  =&gt;  &quot;index&quot; //文件主名称\r\n];\r\n\r\n```\r\n\r\nThinkPHP路由规则： `/模块名/控制器名/操作名.html` 框架根据路由规则进行URL调度，结果为\r\n\r\n```\r\n$dispatch = [\r\n    \'module\'        =&gt;  &quot;Admin&quot;,\r\n    \'controller\'    =&gt;  &quot;Signup&quot;,\r\n    \'action\'        =&gt;  &quot;index&quot;,\r\n];\r\n\r\n```\r\n\r\n欢迎来社长博客阅读更多技术文章 [http://www.kyy1996.com/2017/03/10/PHP%E6%A1%86%E6%9E%B6%E5%BC%80%E5%8F%91-%E7%AC%AC%E4%B8%80%E8%AE%B2%20PHP%E6%A1%86%E6%9E%B6%E5%AF%BC%E8%AE%BA/](http://www.kyy1996.com/2017/03/10/PHP%E6%A1%86%E6%9E%B6%E5%BC%80%E5%8F%91-%E7%AC%AC%E4%B8%80%E8%AE%B2%20PHP%E6%A1%86%E6%9E%B6%E5%AF%BC%E8%AE%BA/)', '1489201412', '5', '0', '1', '', '0', '347', '119.61.27.50', null, '1500646864'), ('9', '【PHP框架开发】第二讲 PHP面向对象', '面向对象的编程理念是世间万物都为对象。\r\n\r\n面向对象的基础是类。\r\n\r\n# 面向过程与面向对象\r\n\r\n上一讲开头出现的那段代码，就是面向过程编程。它讲究编程中的细节。例如保存SQL、保存查询结果、执行查询、变量赋值、输出结果等操作。\r\n\r\nC语言就是典型的面向过程语言。\r\n\r\n而面向对象则讲究程序的架构，又可以说是程序模块的客观规律，或者是小功能的代码集合。\r\n\r\n举个现实中的例子，人是一个对象。人可以走、跑跳、打架、说话、写代码……。而做菜就是面向过程，先让人拿锅子、拿原料、点火、倒油、放原料……\r\n\r\n在面向对象中，必然包括面向过程。\r\n&lt;!--more--&gt;\r\n\r\n# 面向对象的好处与缺点\r\n\r\n使用面向对象方法来做开发，能实现代码复用。同时，可以让程序结构更清晰，易于维护，便于在后期进行扩展开发，增加程序功能。\r\n\r\n但是，使用面向对象思想来开发程序会延长开发周期。而面向过程能更快地实现功能，开发效率比面向对象高。\r\n\r\n在实际开发中，两种思想相辅相成。对于简单的小程序，甚至可以不需要面向对象。\r\n\r\n所以，面向对象与面向过程之间，没有孰优孰劣之分。没有最好的，只有最合适的。\r\n\r\n# 类与对象的区别\r\n\r\n类是现实生活中的一个物种，而对象则是这个物种的具体动物。 例如，人类 是类，爸爸是对象，狗是类，家里的宠物狗是对象。\r\n\r\n对象是类的一个实例。\r\n\r\n# PHP面向对象的历史\r\n\r\nPHP刚诞生的时候，是不支持面向对象的。那时候如果要用PHP开发模块化程序，就要把不同的功能、模块程序写在不同的文件中。index.php或其它入口程序就要灵活地使用require()、include()函数，在需要使用对应模块的地方引用其他php程序。\r\n\r\n自从PHP升级到5.0之后，开始慢慢支持面向对象。直到PHP5.4，其已经有较完善的面向对象语法。同时，它还进化出了自己独有的代码复用结构。\r\n\r\n# 面向对象的相关语言结构\r\n\r\nPHP提供了丰富的面向对象方法。整理起来，有如下结构：\r\n\r\n- 定义 `class`\r\n- 公开 `public`\r\n- 私有 `private`\r\n- 保护 `protected`\r\n- 友好访问属性 `var`\r\n- 命名空间 `namespace`\r\n- 实例化 `new`\r\n- 静态 `static`\r\n- 继承 `extends`\r\n- 抽象类 `abstract`\r\n- 最终类 `final`\r\n- 接口定义 `interface`\r\n- 接口实现 `implement`\r\n- 代码碎片 `trait`\r\n- 引用代码 `use...(as)...(instead of)...`\r\n\r\n鉴于内容太多，本章中就先介绍前7个基本结构。\r\n\r\n## class 定义类\r\n\r\n使用class能定义一个类。作为创世主的你可以随意创造一个物种。例如创造一个Dog物种。\r\n```php\r\n&lt;?php\r\nclass Dog {\r\n    public function bark() {\r\n        echo &quot;I barked.&quot;;\r\n    }\r\n}\r\n\r\n$pet = new Dog();\r\n$pet-&gt;bark();\r\n```\r\n程序输出 `I barked.`\r\n\r\n代码中我先定义了一个类，名字叫*Dog*。它有一个公开方法*bark*。然后，实例Dog类，赋值给变量`$pet`。调用`$pet`对象的公开方法`bark()`。\r\n\r\n## public、private、protected与var\r\n\r\n每个人都会有属于自己的小秘密，当然也有只给部分朋友看的半公开秘密，剩下的就是完全对外展示的特质。\r\n\r\n在面向对象中，这四个关键字就是用来体现这种属性与方法的公开程度。\r\n\r\n### private\r\n\r\n`private` 私有方法最小气，只允许**自己**访问。\r\n```php\r\n&lt;?php\r\nclass Cat {\r\n    private $heart = &quot;warm&quot;;\r\n\r\n    private function smile() {\r\n        echo $this-&gt;heart;\r\n    }\r\n\r\n    public function eat() {\r\n        $this-&gt;smile();\r\n    }\r\n}\r\n\r\n$cat = new Cat();\r\n$cat-&gt;smile();//报错：致命错误(Fatal Error)：尝试执行了一个私有方法smile。\r\n\r\n$cat-&gt;eat();//运行正常，输出warm\r\n\r\necho $cat-&gt;heart;//报错：致命错误：尝试访问私有变量。\r\n```\r\n\r\n### var\r\n\r\n`var` 则是用来定义一个局部访问属性，并且**只能用来定义属性**。它表示这个属性能给**当前文件**访问。\r\n类中定义方法时，若直接写`function`，不加修饰符，则也表示这种局部访问范围。\r\n\r\n&gt; 在JAVA中，这种局部访问范围也叫friendly。\r\n\r\n### protected\r\n\r\n`protected` 保护是用来表示这个属性或方法只能给**自己**、**儿子**、**孙子**等自己的**派生类**访问。就像家族遗传一样，爸爸的东西，也是儿子的东西。\r\n\r\n&gt; 所谓的儿子就是当前类的派生类，即使用extends直接或间接继承了当前类的类。参阅本章extends节。\r\n\r\n### public\r\n\r\n`public` 最慷慨，表示这个属性或方法能给所有人访问。\r\n\r\n## namespace 命名空间\r\n\r\n`namespace` 命名空间是程序的文件夹，表示程序在哪个文件夹中。\r\n\r\n只有相同命名空间的程序之间，才能相互访问。\r\n不同命名空间的程序要想互访，就需要在实例化时写全命名空间，或者在开头使用use引入其他命名空间的程序。\r\n\r\n文件a.php\r\n```php\r\nnamespace utils;\r\n\r\nclass A {\r\n    var $name = 123;\r\n}\r\n```\r\n\r\n文件b.php\r\n```\r\n&lt;?php\r\ninclude &quot;a.php&quot;;\r\n\r\nnamespace system\\utils;\r\n\r\nclass B {\r\n    var $name = 456;\r\n\r\n    public function execute(){\r\n        $a = new \\utils\\A(); //程序运行正常\r\n        $a = new utils\\A(); //程序报错：类 system\\utils\\utils\\A 不存在\r\n        $a = new A(); //程序报错：类 system\\utils\\A 不存在\r\n    }\r\n}\r\n\r\n$b = new B;\r\n$b-&gt;execute();\r\n```\r\n\r\n由此可见，命名空间也会有相对路径这一说法。要想从根命名空间开始引用，一定要在开头写**反斜杠**。\r\n\r\n## 实例化\r\n\r\n通常，程序中，若要使用类，就必须把类`实例化`成`对象`。\r\n\r\n```\r\n&lt;?php\r\nclass human {\r\n    public function talk($word) {\r\n        echo $word;\r\n    }\r\n}\r\n\r\n$man = new human();\r\n$man-&gt;talk(&quot;社长最帅&quot;);\r\n```\r\n`new` 可以实例化一个类。\r\n\r\n## 静态\r\n\r\n通常，类是需要被实例化之后才能使用的。但有时候，我只想使用类中的一个常量、变量或方法。这个时候，就需要使用 `static` 静态属性方法了。\r\n\r\n```php\r\n&lt;?php\r\nclass Cat {\r\n    const NAME = &quot;stephen&quot;;//常量\r\n	public static $age = 11;\r\n    public static function age(){\r\n    	self::$age++;\r\n    }\r\n}\r\n\r\necho Cat::$age;\r\nCat::age();\r\necho Cat::$age;\r\nCat::age();\r\necho Cat::$age;\r\nvar_dump(Cat::NAME);\r\n```\r\n\r\n程序运行结果：`111213string(7) &quot;stephen&quot;`\r\n\r\n由此可见，**静态属性**或**方法**，还有**常量**，可以在类没有被实例化时直接访问。当然，实例化后进行访问也可以，只是需要使用`::`操作符。\r\n\r\n## 继承\r\n继承是代码复用的一种体现。子代类可以拥有父代类所有的属性、方法，同时它还能扩展、重载父代中原有的方法。\r\n\r\n子代类可以通过`parent`关键字来访问父代的常量、属性、方法与当前方法。\r\n\r\n```php\r\n&lt;?php\r\nclass A {\r\n	protected $name = &quot;common&quot;;\r\n    \r\n	public function eat(){\r\n    	echo (&quot;A eat&lt;br&gt;&quot;);\r\n    }\r\n}\r\n\r\nclass B extends A {\r\n	public function eat(){\r\n    	echo (&quot;B eat.&lt;br&gt;&quot;) . $this-&gt;name;\r\n        parent::eat();\r\n    }\r\n}\r\n\r\n$b = new B();\r\n$b-&gt;eat();\r\n```', '1500640255', '5', '0', '1', '', '0', '44', '119.61.27.50', null, '1500646864'), ('10', '【PHP框架开发】第三讲 面向对象trait与路由器实现原理', '# 面向对象之trait\r\n\r\nPHP是一门单继承的面向对象语言。也就是说，一个类只能有一个直接的爸爸。例如\r\n\r\n```php\r\n&lt;?php\r\nclass A {}\r\n\r\nclass B extends A {}\r\n\r\nclass C extends A,B {} //报错：遇到意外的 , ，期望遇到 {。\r\n```\r\n&gt; 多继承是指 一个类可以用有多个爸爸。例如 `A extends B, C` 这样。但在这种情况下，会使一个类的结构变得复杂，也很难判断一个类是不是属于某个爸爸。\r\n\r\n然而，在这样的情况下，我怎样实现 A 与 B 共有代码呢？\r\n\r\n ## trait 定义\r\n\r\n如同普通的类一样，可以通过 `trait` 关键字来定义trait。\r\n```php\r\n&lt;?php\r\ntrait common{\r\n    public function update() {\r\n        echo(&quot;执行了&quot;.__CLASS__.&quot;中的&quot;.__METHOD__.&quot;方法&quot;);\r\n    }\r\n\r\n    public function name() {\r\n        echo $this-&gt;name;\r\n    }\r\n}\r\n```\r\n\r\n&gt; 注：在PHP中，双下划线包围的标识符通常是魔术常量。代码中的 `__CLASS__`表示当前对象的类名，而`__METHOD__`则表示当前方法名。\r\nPHP中还有很多魔术方法和魔术常量，这个在之后会慢慢讲到。\r\n\r\n## 使用trait\r\n\r\n```php\r\n&lt;?php\r\nclass Pet {\r\n    protected $name = &quot;George&quot;;\r\n    use common;\r\n}\r\n\r\n$my_pet = new Pet();\r\n$my_pet-&gt;name();//输出：George\r\n$my_pet-&gt;update();//输出：执行了Pet中的common::update方法\r\n```\r\n&gt; 注：`trait`与`class`一样，也是有`命名空间`概念的。在`use`的时候，需要注意当前类与`trait`是不是在同一个命名空间中。\r\n\r\n## 实例\r\n```php\r\n&lt;?php\r\ntrait computer {\r\n	public function code()\r\n	{\r\n		echo(&quot;我能写代码&quot;);\r\n	}\r\n\r\n	public function query()\r\n	{\r\n		echo(&quot;我能查资料&quot;);\r\n	}\r\n}\r\n\r\nclass Human {\r\n	use computer;//人类使用了computer，所以人可以写代码，查资料\r\n}\r\n\r\nclass Cat{\r\n//猫没使用computer，所以猫不会写代码，不会查资料\r\n}\r\n\r\n$dog = new Human;\r\n\r\n$dog-&gt;code();\r\n$dog-&gt;query();\r\n\r\n$cat = new Cat();\r\n$cat-&gt;code();//报错：code未定义\r\n$cat-&gt;query();//报错：query未定义\r\n```\r\n\r\n# 现实中的路由器\r\n\r\n再大的互联网，也是由一个个小局域网组成的。每个局域网中至少包含一个路由器和n台主机。\r\n\r\n我们传统意识中，路由器的作用是让我们上网。这个只是表象。\r\n\r\n也许老师教过我们192.168.0.1这个地址中，192.168.0是网络地址，而最后的1是主机地址。其实这是错误的。\r\n\r\n主机地址和网络地址的范围是根据*子网掩码*来确定的。这个就是路由器对**ip地址**与**子网掩码地址**进行二进制位操作得到的结果来确定的。\r\n\r\n当然，以前老师也告诉过我们，网络地址不同的主机之间，是不能够相互访问的。其实这也是错误的。应该说是不能**直接访问**。\r\n\r\n借助路由器的**路由表**，就可以使不同网络的机器相互访问。\r\n\r\n路由器会根据**路由表**中**目标网络地址**的路由器在**当前网络**中的地址，来转发数据包。这样就实现了不同网络间的主机互访。\r\n\r\n我们框架中的路由器就是实现一个类似的功能。只不过是把url地址，通过一定的规则（路由表），解析成要访问的控制器、方法。\r\n\r\n# 框架路由器执行流程\r\n\r\n```flow\r\nstart=&gt;start: 开始\r\nbind_url=&gt;subroutine: 绑定路由规则至路由表\r\ninput_url=&gt;inputoutput: 输入URL地址\r\nscan_table=&gt;operation: 扫描路由表\r\nrule_exists=&gt;condition: 路由规则是否存在\r\nthrow_error=&gt;operation: 抛出错误：页面不存在\r\ndispatch=&gt;inputoutput: 生成匹配结果并返回\r\nend=&gt;end: 结束\r\n\r\nstart-&gt;input_url-&gt;scan_table-&gt;rule_exists\r\nrule_exists(yes)-&gt;dispatch-&gt;end\r\nrule_exists(no)-&gt;throw_error-&gt;end\r\nstart-&gt;bind_url\r\nbind_url(left)-&gt;input_url\r\nbind_url(right)-&gt;input_url\r\n```\r\n\r\n# 路由器实现\r\n\r\n## HTTP请求方法\r\n\r\nHTTP请求分为好几种方法，不同的方法有不同的使用场景。正常访问网站使用`GET`方法；像注册、登录、提交问卷等场景则使用`POST`方法。这两种是常用的请求方法。但对于一些高级的系统来说，还会用到其他方法。例如`DELETE`方法用来删除指定资源，`HEAD`方法用来得到请求头等。\r\n\r\n我们的路由器后期会扩展成分方法绑定地址的规则。也就是说只有方法匹配的请求才会被正确调度。例如，我绑定了`get`操作，访问地址是`User/index`，控制器是`UserController@index`，那么如果我用`POST`方法提交给`User/index`地址时，路由器会抛出错误：地址不存在。\r\n\r\n## 路由表定义机制\r\n\r\n这里使用一个简化的路由表分析算法。我们默认一个规则，也是常用于ThinkPHP框架的路由规则：访问地址为`控制器`/`方法名`。也就是说，用户访问地址是 `http://127.0.0.1/User/index`时，路由器会调度到`User控制器`的`index`方法。\r\n\r\n## 路由器实现\r\n\r\n```php\r\n&lt;?php\r\nclass Router{\r\n	const DEFAULT_CONTROLLER = &quot;Home&quot;;//预定义一个常量，表示默认控制器为Home\r\n    const DEFAULT_ACTION = &quot;index&quot;;//预定义一个常量，表示默认操作index\r\n\r\n	public static function getUrl(){\r\n		return $_SERVER[\'PHP_SELF\'];//得到访问的路径，即：/User/index这部分\r\n    }\r\n    \r\n    /**\r\n     * 路由规则：控制器名/操作名/额外参数\r\n     **/\r\n    public static function parseUri($uri){\r\n		$uri = (array)explode(&quot;/&quot;, $uri);//把拿到的URI以&quot;/&quot;为分隔符展开成数组，即使不是数组也会被强制转换成Array。\r\n    	$result = [];//创建一个用来保存结果的\r\n        $result[\'controller\'] = ucfirst(array_shift($uri)) ? : static::DEFAULT_CONTROLLER;//拿到“/”前的第一个字符串，将首字母大写并保存到controller索引中。如果拿到的值为空，则使用预定义的默认控制器名称。\r\n        $result[\'action\'] = array_shift($uri) ? : static::DEFAULT_ACTION;//得到“/”后的第一个字符串，并保存到action索引中。如果拿到的值为空，则使用预定义的默认操作名称。\r\n        $result[\'param\'] = $uri;//将剩下的数据保存到param索引中，作为额外的访问参数\r\n        return $result;//将解析结果返回\r\n    }\r\n\r\n    public static function handle(){\r\n    	$dispatch = static::parseUri(static::getUri());//通过之前定义的两个方法来得到调度结果\r\n        return $dispatch;//返回调度结果\r\n    }\r\n}\r\n```\r\n一个简单的Router路由器就这样完成了。等到PHP熟练之后，可以加上 *定义路由表* 的功能。由于目前各位刚起步，所以就不为难大家了。\r\n\r\n# 路由器测试\r\n新建一个**PHP文件**，名字为`index.php`。保存到**网站根目录**。\r\n```php\r\n&lt;?php\r\ninclude(&quot;Router.php&quot;);\r\nvar_dump(Router::handle());\r\n```\r\n浏览器访问[http://127.0.0.1](http://127.0.0.1)，页面输出：\r\n```\r\narray(3) {\r\n	&quot;controller&quot; =&gt; &quot;Home&quot;,\r\n    &quot;action&quot; =&gt; &quot;index&quot;,\r\n    &quot;param&quot; =&gt; []\r\n}\r\n```', '1500641322', '5', '0', '1', '', '0', '67', '119.61.27.50', null, '1500646864'), ('11', '【PHP框架开发】第四讲 PHP魔术方法与配置管理模块的开发', '# PHP的魔术常量与魔术方法\r\n\r\nPHP自带了很多魔术方法与魔术常量。这些**魔术方法**与**魔术常量**可以实现**动态地**定义属性或方法。这种动态机制也叫**重载**。\r\n\r\n&gt; PHP中的&quot;重载&quot;与其它绝大多数面向对象语言不同。传统的&quot;重载&quot;是用于提供多个同名的类方法，但各方法的参数类型和个数不同。\r\n\r\n当调用当前环境下**未定义**或**不可见**的**类属性**或**方法**时，类中的重载方法会被调用。\r\n\r\n所有的魔术常量与方法都是以**__（两根下划线）**开头。所以自己在编写代码时，**不要以__双下划线开头**。\r\n&lt;!--more--&gt;\r\n## 魔术方法\r\n\r\nPHP提供的魔术方法有：\r\n- \\_\\_construct()	构造函数\r\n- \\_\\_destruct()	析构函数\r\n- \\_\\_call()		方法调用函数\r\n- \\_\\_callStatic()	静态方法调用函数\r\n- \\_\\_get()		属性调用函数\r\n- \\_\\_set()		属性设置函数\r\n- \\_\\_isset()		属性或方法的isset检查函数\r\n- \\_\\_unset()		属性或方法的unset释放函数\r\n- \\_\\_sleep()		序列化函数\r\n- \\_\\_wakeup()	反序列化函数\r\n- \\_\\_toString()	转字符串\r\n- \\_\\_invoke()	模拟函数调用\r\n- \\_\\_set\\_state()	var\\_export导出函数\r\n- \\_\\_clone()		clone复制函数\r\n- \\_\\_debugInfo()	var\\_dump调试导出函数\r\n\r\n这里只介绍前六个常用的魔术方法，其他方法请参阅[PHP手册-魔术方法](http://php.net/manual/zh/language.oop5.magic.php)\r\n\r\n## 魔术常量\r\n\r\nPHP中的常量大部分都是不变的，但是有8个常量会随着他们所在代码位置的变化而变化，这8个常量被称为**魔术常量**。\r\n\r\n魔术常量总是以**双下划线开头，双下划线结尾**的**全大写**英文。\r\n\r\nPHP提供的魔术常量有：\r\n\r\n- \\_\\_LINE\\_\\_	文件中的当前行号。\r\n- \\_\\_FILE\\_\\_	当前文件的完整路径和文件名。\r\n- \\_\\_DIR\\_\\_	当前文件所在的目录。\r\n- \\_\\_FUNCTION\\_\\_	当前函数名称\r\n- \\_\\_CLASS\\_\\_	当前类的名称\r\n- \\_\\_TRAIT\\_\\_	Trait 的名字\r\n- \\_\\_METHOD\\_\\_	当前方法名\r\n- \\_\\_NAMESPACE\\_\\_	当前命名空间的名称\r\n\r\n\r\n\r\n# 常用的魔术方法\r\n\r\n**所有魔术方法的可见度都必须被声明为public。**\r\n\r\n## __construct()\r\n\r\n类在被new实例化时，如果定义了`__construct()`构造函数，则会**立即执行**`__construct()`方法。\r\n\r\n```php\r\n&lt;?php\r\nclass A{\r\n	public function __construct(){\r\n    	echo(__CLASS__);\r\n    }\r\n}\r\n\r\n$t = new A; //程序输出：A\r\n```\r\n&gt; 这里的`__CLASS__`就是一个魔术常量，值是当前类名**A**\r\n\r\n当然，构造函数也可以接受参数。\r\n\r\n```php\r\n&lt;?php\r\nclass A{\r\n	protected $name;\r\n	public function __construct($name){\r\n    	$this-&gt;name = $name;\r\n        echo(__METHOD__ . $this-&gt;name);\r\n    }\r\n}\r\n\r\n$t = new A; //报错：__construct函数缺少一个必须参数。\r\n$t = new A(&quot;君の名は&quot;); //程序输出：A::__construct君の名は\r\n```\r\n\r\n&gt; 这里的`__METHOD__`魔术常量的值是**包含类名的方法名**。\r\n\r\n构造函数是PHP面向对象中举足轻重的技术。在后期开发时几乎每个小模块都需要用到构造函数。\r\n\r\n## __destruct()\r\n\r\n程序都有生命周期，类也是。在类被销毁时，无论以哪种方式，只要定义了`__destruct()`析构函数，它就会被执行。\r\n\r\n```php\r\n\r\n&lt;?php\r\nclass A{\r\n    public function __destruct(){\r\n	    echo(__CLASS__.&quot; has been destroyed&quot;);\r\n    }\r\n}\r\n\r\n$t = new A;\r\n```\r\n\r\n程序输出：*A has been destroyed*\r\n\r\n你们会问，程序中只有`new A`实例化语句，没有销毁命令，为什么类被销毁了？因为执行到实例化语句后，没有更多的代码了，所以主程序执行完毕。在退出前，PHP会进行内存清理，这时会释放所有被实例化的对象。这样就触发了对象的`__destruct()`函数。\r\n\r\n手工释放对象：\r\n```php\r\n\r\n&lt;?php\r\nclass A{\r\n    public function __destruct(){\r\n	    echo(__CLASS__.&quot; has been destroyed&quot;);\r\n    }\r\n}\r\n\r\n$t = new A;\r\nunset($t);\r\necho(123);\r\n```\r\n程序输出：`A has been destroyed123`\r\n\r\n由于\\$t变量被注销，所以对象被析构，触发了`destruct()`函数。之后程序执行了`echo(123)`语句，输出了`123`。\r\n\r\n## __call()\r\n\r\n当尝试调用对象实例中**不可访问**的方法时，会触发`__call()`方法，传入的参数是访问的方法名。\r\n\r\n```php\r\n&lt;?php\r\n\r\n&lt;?php\r\nclass A {\r\n    public function __call($name,$param){\r\n    	var_dump($name,$param);\r\n    }\r\n}\r\n\r\n$t = new A;\r\n$t-&gt;test(123);\r\n$t-&gt;test2();\r\n```\r\n程序输出：\r\n```\r\nstring(4) &quot;test&quot;\r\narray(1) {\r\n  [0]=&gt;\r\n  int(123)\r\n}\r\nstring(4) &quot;test&quot;\r\narray(2) {\r\n  [0]=&gt;\r\n  int(123)\r\n  [1]=&gt;\r\n  string(15) &quot;第二个参数&quot;\r\n}\r\nstring(5) &quot;test2&quot;\r\narray(0) {\r\n}\r\n\r\n```\r\n\r\n`__call()`方法接受两个参数。第一个是访问的函数名（`test`），第二个是传入的参数列表数组（`[123]`）。若没有调用的参数，则参数列表数组是一个空数组（`[]`）。\r\n\r\n## __callStatic()\r\n\r\n`__call()`方法只能处理被实例化的对象方法调用问题，对于静态访问的对象方法就要用`__callStatic()`来处理了。它的用法与`__call()`类似，只不过只能处理静态放问。\r\n\r\n```php\r\n&lt;?php\r\nclass A{\r\n    public function __call($name, $param){\r\n   		var_dump(&quot;用__call处理了方法：{$name}&quot;);\r\n    }\r\n    public static function __callStatic($name, $param){\r\n    	var_dump(&quot;用__callStatic处理了方法：{$name}&quot;);\r\n    }\r\n}\r\n\r\n$t = new A;\r\n$t-&gt;test(123);\r\nA::test();\r\n```\r\n\r\n程序输出：\r\n```\r\nstring(31) &quot;用__call处理了方法：test&quot;\r\nstring(37) &quot;用__callStatic处理了方法：test&quot;\r\n```\r\n\r\n&gt; 这里值得注意的是，由于`__callStatic()`方法只能处理**静态方法**，所以其本身也必须被声明为**静态类型**。\r\n\r\n```php\r\nclass A{\r\n    public function __callStatic($name, $param){\r\n    	var_dump(&quot;用__callStatic处理了方法：{$name}&quot;);\r\n    }\r\n}\r\n```\r\n程序报错：`魔术方法__callStatic()必须有public可见度，并且是静态的。`\r\n\r\n## __get()\r\n\r\n当尝试访问类中**不可访问**的**属性**时，会调用`__get()`方法。\r\n\r\n```php\r\n&lt;?php\r\nclass A{\r\n    public function __get($name){\r\n	    return (&quot;访问了&quot;.$name);\r\n    }\r\n}\r\n$t = new A;\r\necho $t-&gt;test;;\r\n```\r\n程序输出：`访问了test`\r\n\r\n`__get()`方法接受一个参数，传入的值为**被访问的属性名**。当然，其也要有一个返回值，返回**被访问的属性值**。\r\n\r\n当然，如果被访问的属性确实不存在，那么我们可以在`__get()`方法中抛出错误。\r\n\r\n```php\r\n&lt;?php\r\nclass A {\r\n	protected $arr = [&quot;name&quot;=&gt;123];\r\n\r\n	public function __get($name) {\r\n		if(!key_exists($name, $this-&gt;arr))\r\n			throw new Exception(&quot;$name 不存在&quot;);\r\n		return $this-&gt;arr[$name];\r\n	}\r\n}\r\n$t = new A;\r\nvar_dump($t-&gt;name);\r\nvar_dump($t-&gt;test);\r\n```\r\n程序报错：`未捕获的异常\'Exception\'，消息\'test 不存在\'。`\r\n\r\n注释最后一行代码，程序则输出：`123`。\r\n\r\n&gt; 即使定义了`__get()`方法，也不能使用**静态操作访问**不可访问的**静态属性**。\r\n\r\n## __set()\r\n\r\n在尝试修改不可访问的属性值时，会调用`__set()`方法。其接受两个参数，第一是**属性名**，第二是**属性值**。\r\n\r\n```php\r\n&lt;?php\r\nclass A {\r\n	protected $arr = [&quot;name&quot;=&gt;123];\r\n\r\n	public function __set($name, $value) {\r\n		if(!key_exists($name, $this-&gt;arr))\r\n			throw new Exception(&quot;$name 不存在&quot;);\r\n$this-&gt;arr[$name] = $value;\r\n		return true;\r\n	}\r\n}\r\n$t = new A;\r\nvar_dump($t-&gt;test=789);\r\nvar_dump($t-&gt;name=456);\r\n```\r\n程序报错：`未捕获的异常\'Exception\'，消息\'test 不存在\'。`\r\n\r\n注释掉倒数第二行语句，程序输出`int(456)`。\r\n\r\n# 配置管理模块的开发\r\n\r\n```php\r\nclass Config\r\n{\r\n    protected $config = [];\r\n\r\n    public function __construct($config = [])\r\n    {\r\n    	//在new实例化Config类时，接受一个数组，表示一个简单的配置数组\r\n        $this-&gt;config = (array)$config;\r\n    }\r\n\r\n    public function __get($name)\r\n    {\r\n        if (!key_exists($name, $this-&gt;config)) return null;//配置项不存在，则返回null空\r\n        return $this-&gt;config[$name];//配置项存在，则返回值\r\n    }\r\n\r\n    public function __set($name, $value)\r\n    {\r\n        return $this-&gt;config[$name] = $value;//设置配置\r\n    }\r\n}\r\n```\r\n\r\n通过这个`Config`类，我们可以实现用面向对象的操作来访问配置数组。例如\r\n```php\r\n&lt;?php\r\n$config = [\r\n	\'host\' =&gt; &quot;127.0.0.1&quot;,\r\n    \'username\' =&gt; \'root\'\r\n    \'password\' =&gt; \'\'\r\n];\r\n$config = new Config($config);\r\n\r\necho $config-&gt;host; //输出 127.0.0.1\r\necho $config-&gt;username; //输出 root\r\necho $config-&gt;password; //输出空\r\necho $config-&gt;test_null; //输出空\r\n```\r\n\r\n当然，这样的Config类是不完善的。等到框架大致开发完毕时，我们再来探讨怎么样来优化。', '1500643498', '5', '0', '1', '', '0', '71', '119.61.27.50', null, '1500646865'), ('12', 'JS面向对象程序设计基础', '# JS面向对象程序设计基础\r\n### 1.数组：\r\n#### 1.1数组的定义\r\n\r\n&gt; 1).字面量定义\r\n```javascript\r\nvar  arr  =  [1,2,3];\r\n```\r\n2)对象定义（数组的构造函数）\r\n```javascript\r\nvar  arr  =  new Array(参数);\r\n```\r\n`补：字面量`\r\n`固定的值，让你从“字面上”理解其含义。`\r\n\r\n#### 1.2数组的操作\r\n1)求数组的长度\r\n```javascript\r\n&gt;数组的长度 =  数组名.length；\r\n```\r\n2)获取数组中的元素\r\n```javascript\r\n&gt;数组中的指定元素 = 数组名[索引值];\r\n```\r\n\r\n#### 1.3遍历数组（获取并操作数组中的每一个元素）\r\n```javascript\r\nvar arr = [1,2,3];\r\nfor(var i = 0;i&lt;arr.length;i++){\r\n    arr[i]  //如此操作数组中的每一个元素\r\n}\r\n```\r\n### 2调试（打断点）\r\n&gt;过去的调试（锻炼逻辑能力）\r\nalert(变量);     console.log(变量);\r\n设置断点（项目太大，使用断点方便，清晰\r\n\r\n### 3.函数定义\r\n##### 3.1函数声明（自定义声明）\r\n```javascript\r\n\r\n  function f(a,b) {\r\n        return a + b; }\r\n  console.log(f(5,6));\r\n```\r\n#### 3.2函数表达式\r\n```javascript\r\nvar myFun = function (a,b){\r\n        return a + b;\r\n    }\r\n    console.log(myFun(6,7));\r\n```\r\n#### 3.3函数声明和函数表达式的区别\r\n```javascript\r\nnew:\r\n	1.开辟内存空间，存储新创建的对象（ new Object() ）\r\n	2.把this设置为当前对象\r\n	3.执行内部代码，设置对象属性和方法\r\n	4.返回新创建的对象\r\n```\r\n```javascript\r\n函数声明\r\n //此处的代码执行没有问题，JavaScript解析器首先会把当前作用域的函数声明提前到整个作用域的最前面。\r\n   console.log(f(5,6));\r\n    function f(a,b) {\r\n        return a + b;\r\n    }\r\n函数表达式\r\n    //报错：myFun is not a function\r\n    //这是为什么呢\r\n   myFun(6,7);\r\n    var myFun = function (a,b){\r\n        return a + b;\r\n    }\r\n```\r\n\r\n#### 3.3变量和作用域（隐式全局变量和变量声明提升）\r\n变量和作用域（函数中的变量需要函数执行后才能使用）\r\n`一、全局变量（成员变量）`\r\n哪里都可以访问到的变量。\r\n（进入script立即定义的变量和没有var的变量）\r\n`二、局部变量`\r\n函数内部的变量，只有函数内部可以访问到。\r\n（函数内部用var定义的变量和形参）\r\n\r\n&gt;**参考:**\r\n块级作用域\r\n在其它语言中，任何一对花括号中的语句都属于一个块，在这之中定义的所有变量在代码块外都是不可见的\r\nJavaScript中没有块级作用域\r\n全局变量\r\n定义在script或者不属于某个函数的变量\r\n局部变量\r\n定义在函数内部的变量\r\n其它\r\n函数内部可以访问到该函数所属的外部作用域的变量(作用域链)\r\n不使用var声明的变量是全局变量，不推荐使用。\r\n变量退出作用域之后会销毁，全局变量关闭网页或浏览器才会销毁\r\n\r\n#### 3.4隐式全局变量\r\n```javascript\r\nfunction  fn（）{\r\nvar  a  =  b  =  c  =  1;   // b和c就是隐式全局变量\r\n}\r\n//注意:\r\nfunction  fn（）{\r\nvar  a  =  b  =  c  =  1;   // b和c就是隐式全局变量（等号）\r\nvar  a = 1;  b = 2;  c = 3;     // b和c就是隐式全局变量（分号）\r\nvar  a = 1 ,  b = 2 ,  c = 3;    // b和c就不是隐式全局变量（逗号）\r\n}\r\n```\r\n#### 3.5变量声明提升（出现原因：预解析）\r\n函数中，定义变量在使用变量之后。\r\n值提升变量名，不提升变量值，容易出现undefined。计算后形成NaN。\r\n```javascript\r\nfunction fn(){\r\n// var aaa;\r\nconsole.log(aaa);\r\nvar aaa = 1;\r\n}\r\n//提前看一眼这个习惯叫什么呢？  预解析！\r\n//变量声明提升：在预解析的时候，成员变量和函数，被提升到最高位置，方便其他程序访问。\r\n//变量声明提升特点：成员变量只提升变量名，不提升变量值。但是，函数是所有内容全部提升。（function直接定义的）\r\n//函数范围内照样会出现变量声明提升\r\n//什么情况容易出现变量声明提升：使用变量在定义变量之前。\r\n```\r\n\r\n**变量提升**\r\n定义变量的时候，变量的声明会被提升到作用域的最上面，变量的赋值不会提升。\r\n**函数提升(稍后讲)**\r\nJavaScript解析器首先会把当前作用域的函数声明提前到整个作用域的最前面`\r\n\r\n#### 3.6小知识\r\n&gt;函数不调用不执行\r\n&gt;\r\n&gt;函数名就等于（整个函数）\r\n&gt;\r\n&gt;加载函数的时候，只加载函数名，不加载函数体\r\n&gt;\r\n&gt;参数相当于局部变量\r\n&gt;\r\n&gt;就近原则使用变量\r\n&gt;\r\n&gt;两个平级的函数中的变量不会相互影响（可以使&gt;\r\n&gt;用同样的形参名）\r\n\r\n### 4函数高级\r\n#### 4.1匿名函数\r\n定义：匿名函数就是没有名字的函数。\r\n**作用：**\r\n1.不需要定义函数名的时候。（群众演员没必要起名，百万雄师下江南）\r\n2.书写起来更简便。\r\n匿名函数的调用有三种方法：\r\n一、直接调用或自调用。(function(){alert(1)})()\r\n二、事件绑定。\r\n三、定时器。\r\n```javascript\r\n匿名函数：没有命名的函数\r\n作用：一般用在绑定事件的时候\r\n语法\r\nfunction () {}\r\n自调用函数\r\n(function(){alert(&quot;hello&quot;)})();\r\n```\r\n\r\n\r\n#### 4.2函数是一种类型（了解）\r\n`函数作为方法的参数\r\n函数作为方法的返回值`\r\n都是可以的\r\n#### 4.3函数作为参数（了解）\r\n&gt;什么是回调函数？\r\n简单理解就是函数做为参数。（这样的......）\r\n复杂理解：回调函数就是一个通过函数调用的函数。如果你把函数的指针（地址）作为参数传递给另一个函数，当这个指针被用来调用其所指向的函数时，我们就说这是回调函数。\r\n```javascript\r\nfunction dosomething(damsg, callback){\r\n  alert(damsg);\r\n  if(typeof callback == &quot;function&quot;)\r\n  callback();\r\n }\r\ndosomething(&quot;回调函数&quot;, function(){\r\n  alert(&quot;我是回调函数耶!&quot;);\r\n });\r\n```\r\n\r\n#### 4.4递归（理解）\r\n`递归：就是函数自己调用自己。（懂得）`\r\n*必须有跳出条件。*\r\n`什么是递归？\r\n方法自身调用，一般还要有结束的提交\r\n案例：\r\n从前有座庙，庙里有个老和尚\r\n求n个数的累加`\r\n\r\n### 5对象和面向对象\r\n```markdown\r\n什么是对象\r\n生活中的对象，一个车、一个手机\r\n对象具有特征和行为\r\n面向对象和基于对象\r\n面向对象：可以创建自定义的类型、很好的支持继承和多态。面向对象的语言c++/java/c#...\r\n面向对象的特征：封装、继承、多态\r\n万物皆对象：世间的一切事物都可以用对象来描述\r\n基于对象：无法创建自定义的类型、不能很好的支持继承和多态。基于对象的语言JavaScript\r\n```\r\n\r\n`部分 ！！！偏高级（可以看看热闹）！！！\r\n理解不了可不必理解！可不必理解！可不必理解！`\r\n**看清楚是：部分！！部分！！部分！！**\r\n\r\n#### 5.1JS中的对象（Object）\r\n```javascript\r\n\r\n//创建空白对象\r\nvar  obj  =  new  Object();\r\n```\r\n#### 5.2构造函数（就是为了创建对象实例）\r\n&gt;一、可以创建对象实例的函数。\r\n\r\n1)区别与普通函数，首字母大写\r\n\r\n2)构造函数并没有显式返回任何东西。\r\nnew 操作符会自动创建给定的类型并返回他们，当调用构造函数时，new会自动创建this对象，且类型就是构造函数类型。\r\n```javascript\r\nfunction Person( name){\r\n       this.name =name;\r\n     }\r\n      var p1=new Person(\'John\');\r\n```\r\n等同于\r\n```javascript\r\nfunction person(name ){\r\n     Object obj =new Object();\r\n     obj.name =name;\r\n      return obj;\r\n   }\r\n    var p1= person(&quot;John&quot;);\r\n```\r\n4)因为构造函数也是函数，所以可以直接被调用，但是它的返回值为undefine，此时构造函数里面的this对象等于全局this对象。this.name其实就是创建一个全局的变量name。在严格模式下，当你补通过new 调用Person构造函数会出现错误。\r\n\r\n5)也可以在构造函数中用Object.defineProperty()方法来帮助我们初始化：\r\n```javascript\r\nfunction Person( name){\r\n      Object.defineProperty(this, &quot;name&quot;{\r\n        get :function(){\r\n           return name;\r\n        },\r\n         set:function (newName){\r\n          name =newName;\r\n        },\r\n        enumerable :true, //可枚举，默认为false\r\n         configurable:true //可配置\r\n       });\r\n    }  \r\n     var p1=new Person(\'John\');\r\n```\r\n\r\n6)在构造函数中使用原型对象\r\n```javascript\r\n//比直接在构造函数中写的效率要高的多\r\n      Person.prototype.sayName= function(){\r\n        console.log(this.name);\r\n     };\r\n```\r\n但是如果方法比较多的话，大多人会采用一种更简洁的方法：直接使用一个对象字面形式替换原型对象，如下：   \r\n```javascript\r\nPerson.prototype ={\r\n       sayName :function(){\r\n          console.log(this.name);\r\n       },\r\n       toString :function(){\r\n          return &quot;[Person &quot;+ this.name+&quot;]&quot; ;\r\n       }\r\n     };\r\n```\r\n![Alt text](http://www.kyy1996.com/images/1490168095866.png)\r\n\r\n使用字面量形式改写了原型对象改变了构造函数的属性，因此他指向Object而不是Person。这是因为原型对象具有一个constructor属性，这是其他对象实例所没有的。当一个函数被创建时，它的prototype属性也被创建，且该原型对象的constructor属性指向该函数。当使用对象字面量形式改写原型对象时，其constructor属性将被置为泛用对象Object.为了避免这一点，需要在改写原型对象的时候手动重置constructor,如下：\r\n```javascript\r\nPerson.prototype ={\r\n       constructor :Person,\r\n        \r\n       sayName :function(){\r\n          console.log(this.name);\r\n       },        \r\n       toString :function(){\r\n          return &quot;[Person &quot;+ this.name+&quot;]&quot; ;\r\n       }\r\n     };\r\n```\r\n再次测试\r\n```javascript\r\np1.constructor===Person\r\ntrue \r\np1.constructor===Object\r\nfalse\r\np1 instanceof Person\r\ntrue\r\n```\r\n\r\n#### 5.3创建自定义对象\r\n```javascript\r\nThis\r\n一、this只出现在函数中。\r\n二、谁调用函数，this就指的是谁。\r\nnew People();   People中的this代指被创建的对象实例。\r\n```\r\n### 6对象和面向对象2\r\n\r\n#### 6.1对象字面量个JSON\r\n```javascript\r\nvar obj = {aaa: 111};		var json = {“aaa”:111};\r\n```\r\n&gt;对象字面量定义方法和json很像，只有一点不同，json的key要求必须加“”;\r\n\r\n#### 6.2Json组成\r\nVar json = {“aaa”: 1,“bbb”: 2,“ccc”: 3,“ddd”: 4}\r\nJson由{}和key:value以及逗号组成，三部分。（只有一个键值对key:value时,可以没有逗号）\r\n#### 6.3For...in...\r\n```javascript\r\nVar json = {“aaa”: 1,“bbb”: 2,“ccc”: 3,“ddd”: 4}\r\nfor(var key in json){\r\n//key代表aaa,bbb.....等\r\n//json[key]代表1,2,3....等\r\n}\r\n```\r\n\r\n```javascript\r\nvar obj = {\r\n &quot;key1&quot;:&quot;value1&quot;,\r\n &quot;key2&quot;:&quot;value2&quot;,\r\n &quot;key3&quot;:&quot;value3&quot;\r\n};\r\nfunction EnumaKey(){\r\n for(var key in obj ){\r\n  alert(key);\r\n }\r\n}\r\nfunction EnumaVal(){\r\n for(var key in obj ){\r\n  alert(obj[key]);\r\n }\r\n}\r\nEnumaKey(obj);\r\n//key1 key2 key3\r\nEnumaVal(obj);\r\n//value1 value2 value3\r\n```\r\n#### 6.4构造函数复习\r\n```markdown\r\nnew Object()\r\nnew后面调用函数，我们称为构造函数。Object() 我们把他视为一个构造函数，构造函数的本质就是一个函数，只不过构造函数的目的是为了创建新对象，为新对象进行初始化(设置对象的属性)\r\n```\r\n\r\n#### 6.5参数和传值问题\r\n\r\n&gt;一、简单类型数据做参数，函数内部对参数的修改不应影响外部变量\r\n简单类型传数值。\r\n二、复杂类型数据做参数，函数内部对参数的修改会应影响外部变量\r\n      复杂类型传地址。\r\n\r\n#### 6.6数组高级API\r\n`学习API的方法`\r\n&gt;侧重点（四点）\r\n调用者：谁调用的。					参数：有无，几个。		\r\n返回值：有无，什么类型。			功能：干什么用的。\r\n\r\n`自学方法：`\r\n&gt;一、离线\r\na)离线文档(群里有)\r\n二、在线\r\na)W3C	（前端标准W3CSchool）\r\nb)MDN  （开发者网站）[https://developer.mozilla.org/zh-CN/](https://developer.mozilla.org/zh-CN/)\r\n百度/谷歌/搜狗\r\n\r\n#### 6.7Array的内置方法\r\n`判断数组和转换数组:`\r\n```javascript\r\nInstanceof:  是一个关键字。	判断A是否是B类型。\r\n布尔类型值 = A Instanceof B ;\r\nArray.isArray()	//HTML5中新增    判断是不是数组\r\n布尔类型值 = Array.isArray(变量) ;\r\n调用者：Array			参数：变量(被检测值)		返回值：布尔类型	\r\ntoString()		//把数组转换成字符串，每一项用,分割\r\n字符串  =  数组.toString();\r\nvalueOf()		//返回数组对象本身\r\n数组本身 = 数组.valueOf();\r\nJoin			//根据每个字符把数组元素连起来变成字符串\r\n字符串  =  数组.join(变量);\r\n变量可以有可以没有。不写默认用逗号分隔，无缝连接用空字符串。\r\n```\r\n\r\n`数组增删和换位置（原数组讲被修改）`\r\n```javascript\r\npush()  //在数组最后面插入项，返回数组的长度\r\n数组1改后的长度  =  数组1.push(元素1);\r\n\r\npop()    //取出数组中的最后一项，返回最后一项\r\n被删除的元素  =  数组1.pop();\r\n\r\nunshift()   //在数组最前面插入项，返回数组的长度\r\n数组1改后的长度  =  数组1.unshift(元素1);\r\n\r\nshift()        //取出数组中的第一个元素，返回最后一项\r\n被删除的元素  =  数组1.shift();\r\n\r\nreverse()	//翻转数组（原数组讲呗反转，返回值也是被反转后的数组）\r\n反转后的数组  =  数组1.reverse();\r\n\r\nsort();    //给数组排序，返回排序后的数组。如何排序看参数。\r\n从小到大排序后的数组  =  数组1.sort(function(a,b){\r\n                                  return a-b;\r\n});\r\n`无参：按照数组元素的首字符对应的Unicode编码值从小到大排列数组元素。\r\n带参：必须为函数（回调函数--callback）。函数中带有两个参数，代表数组中的		前后元素。如果计算后（a-b），返回值为负数，a排b前面。等于0不动。		返回值为正数，a排b后面。`\r\n```\r\n\r\n`了解方法`\r\n```javascript\r\nconcat()  //把参数拼接到当前数组\r\n新数组 = 数组1.concat(数组2);\r\nslice() //从当前数组中截取一个新的数组，不影响原来的数组，参数start从0开始,end从1开始\r\n新数组 = 数组1.slice(索引1，索引2);\r\nsplice()//删除或替换当前数组的某些项目，参数start,deleteCount,options(要替换的项目)\r\n新数组 = 数组1.splice(起始索引，结束索引，替换内容);\r\nindexOf()、lastIndexOf()   //如果没找到返回-1\r\n索引值 = 数组.indexOf/lastIndexOf(数组中的元素);\r\n\r\n迭代方法 不会修改原数组\r\nevery()、filter()、forEach()、map()、some()\r\n数组/boolean/无 = 数组.every/filter/forEach/map/some(\r\n                            function(element,index,arr){\r\n        									程序和返回值；				          \r\n   }\r\n);\r\n//对数组中每一项运行以下函数，如果都返回true，every返回true，如果有一项返回false，则停止遍历 every返回false；不写默认返回false\r\narray.every(function(item,index,arr) {\r\n})\r\n//对数组中每一项运行以下函数，该函数返回结果是true的项组成的新数组\r\nvar arr = array.filter(function(item,index,arr) {\r\n});\r\nconsole.log(arr);  \r\n//遍历数组\r\narray.forEach(function(item,index,arr){\r\n});\r\n//对数组中每一项运行以下函数，返回该函数的结果组成的新数组\r\nvar arr = array.map(function(item,index,arr) {\r\n    return &quot;\\&quot;&quot; + item + &quot;\\&quot;&quot;;\r\n})\r\n//对数组中每一项运行以下函数，如果该函数对某一项返回true，则some返回true\r\nvar b =  array.some(function(item,index,arr) {\r\n    if (item == &quot;ww&quot;) {\r\n        return true;\r\n    }\r\n    return false;\r\n});\r\n```\r\n', '1500645637', '6', '0', '1', '', '0', '91', '119.61.27.50', null, '1500646843'), ('13', '【PHP基础】安装与语法', '# PHP与MySQL的安装\r\n## 下载XAMPP\r\n\r\n1. 打开[下载地址](https://www.apachefriends.org/zh_cn/download.html)\r\n2. 选择7.1.1 / PHP 7.1.1\r\n3. 点击Download\r\n\r\n![下载xampp](http://cdn.djwebclub.com/images/159720c73228cb.png &quot;下载xampp&quot;)\r\n\r\n4. 等待下载完成\r\n\r\n## 安装XAMPP\r\n\r\n1. 运行下载的exe\r\n2. 选择要安装的组件。建议全选。\r\n\r\n![选择组件](http://cdn.djwebclub.com/images/159720c9408e05.png &quot;选择组件&quot;)\r\n\r\n2. 选择一个**不包含空格**的**英文**目录（比如`D:\\xampp`）\r\n3. 点击安装\r\n3. 完成\r\n\r\n## 安装服务\r\n\r\n1. 开始菜单-&gt;运行xampp control panel\r\n2. 首次运行会弹出语言选择框。选英国国旗。\r\n2. 点击Apache和MySQL前Service栏的红叉按钮，安装apache与mysql服务\r\n\r\n![安装服务](http://cdn.djwebclub.com/images/159720cb4409ae.png &quot;安装服务&quot;)\r\n\r\n&gt; 由于我未安装MySQL组件，所以MySQL这一栏为灰色不可用。\r\n\r\n3. 点击Apache和MySQL的Start按钮，启动服务\r\n\r\n&gt; Module栏，Apache与MySQL字样的底色变绿表示服务启动成功，否则查看下方的日志\r\n\r\n## 安装完成\r\n\r\n浏览器中打开[http://127.0.0.1/phpmyadmin](http://127.0.0.1/phpmyadmin)\r\n出现phpMyAdmin页面，表示安装成功\r\n\r\n![PHPMyAdmin](http://cdn.djwebclub.com/images/159720cca6bc6c.png &quot;PHPMyAdmin&quot;)\r\n\r\n若出现页面无法访问，请检查xampp控制面板是否启动了apache与mysql服务。查看软件下方的日志来得到错误信息。\r\n\r\n# Hello World\r\n\r\n这里我们写一个PHP的Hello World程序来了解PHP程序的运行方式。\r\n\r\n1. 打开*Sublime Text*或其他代码编辑软件（不用使用记事本，因为会遇到UTF-8 Bom编码问题）。\r\n2. 输入代码\r\n```PHP\r\n&lt;?php\r\necho(&quot;&lt;h2&gt;Hello World&lt;/h2&gt;&quot;);\r\nphpinfo();\r\n?&gt;\r\n```\r\n3. 保存文件至目录`D:\\xampp\\htdocs`，文件名为`hello.php`。其中`D:\\xampp`为你安装**xampp的目录**。\r\n4. 浏览器中打开[http://127.0.0.1/hello.php](http://127.0.0.1/hello.php)\r\n\r\n![Hello World](http://cdn.djwebclub.com/images/159720ce0a36e3.png &quot;Hello World&quot;)\r\n\r\n若提示文件不存在，请检查你的文件名、保存路径和xampp控制台有无出错。\r\n\r\n由此可见，`D:\\xampp\\htdocs`为Apache网站服务器的**根目录**，之后调试程序都保存在此目录中。访问`http://127.0.0.1/你的文件名` 就可以运行你的PHP程序。\r\n\r\nPHP程序保存的文件**后缀名**必须是**.php**。\r\n\r\n从PHP程序输出的文本都是**纯html**，可以直接使用`&lt;h2&gt;&lt;/h2&gt;`这样的标签。\r\n\r\n# PHP基础语法\r\nPHP的语法与C语言很像，又是弱类型的，所以上手起来很快。\r\n## PHP标签\r\n所有的PHP代码都可以轻松地嵌入到HTML页面中。PHP程序必须写在`&lt;?php ... ?&gt;`组成的标签中。其中是各种PHP语句。\r\n\r\n对于代码中只有PHP语句的文件，`?&gt;`结束标签可以省略。\r\n\r\n```php\r\n&lt;!doctype html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n&lt;meta charset=&quot;utf-8&quot;&gt;\r\n&lt;title&gt;random&lt;/title&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n&lt;h1&gt;随机数：&lt;?=rand(0,100)?&gt;&lt;/h1&gt;\r\n&lt;/body&gt;\r\n&lt;/html&gt;\r\n```\r\n保存至网站根目录中，到浏览器中打开。页面显示：\r\n```\r\n随机数：20\r\n```\r\n这里使用了`rand`函数，参数为`0`与`100`。表示生成一个0-100范围内的随机数。\r\n\r\n这里使用了一种缩写语法，`&lt;?=变量表列?&gt;`等于`&lt;?php echo 变量表列?&gt;`\r\n\r\n&gt; 这里的变量表列可以先当成一个变量名。为什么要叫表列会在后期介绍`echo`输出语言结构时解释。\r\n\r\n## PHP变量\r\nPHP变量名以\\$为前缀，字母、下划线开头，由字母、数字、下划线组成\r\n例如 `$1PHP` 就是一个错误的变量名；`$name`、`$col_name`、`$_list_1` 这些则是正确的变量名。\r\n\r\n## PHP语句\r\nPHP程序的基本单位是语句。语句必须由**分号**结尾。这个与C语言是一致的。\r\n\r\n```php\r\n&lt;?php\r\n$name = &quot;Alen虫&quot;;\r\necho($name);\r\n```\r\n浏览器中运行结果：\r\n```\r\nAlen虫\r\n```\r\n\r\n这段程序作用是先初始化一个变量`$name`，赋值为`&quot;Alen虫&quot;`，随后输出变量`$name`。\r\n\r\n这段程序也在最后省略了`?&gt;`结束标签，因为文件内容是以php程序结尾。\r\n\r\n## PHP注释\r\nPHP程序中的注释语法与C语言、JS等大部分语言一样，`//` 开头为单行注释，`/* */` 包围多行注释\r\n\r\n## PHP运算符\r\nPHP程序中有很多运算符。除了在其他语言中常见的加减乘除外，还有一些PHP自己的运算符。\r\n- 算术（数组）运算符：+、-、*、/\r\n- 三元运算符：? :\r\n- 赋值运算符：=、+=、-=、/=\r\n- 位运算符：  &lt;&lt;、&gt;&gt;、^、&amp;、|、~\r\n- 逻辑运算符：||、&amp;&amp;、or、and、xor（异或）\r\n- 比较运算符：&lt;、&gt;、==、===、!=\r\n- 非运算符：!\r\n- 对象属性运算符：-&gt;\r\n- 字符串连接运算符：.\r\n- instanceof运算符：instanceof\r\n- 执行运算符：\\`\\`\r\n- 错误控制运算符：@\r\n\r\n这里罗列了常用的几种运算符，这些在C语言中也使用过。PHP所有的运算符使用说明请参阅[PHP手册](http://php.net/manual/zh/language.operators.precedence.php)\r\n\r\n面向对象相关的运算符例如：*对象属性运算符*、*instanceof运算符* 在本章中暂不介绍，到学习面向对象时再一并介绍。这里仅介绍错误控制运算符、字符串连接运算符与执行运算符。\r\n\r\n### 错误控制运算符\r\n这个运算符能够使紧跟其后的第一个表达式不报错。\r\n```php\r\n&lt;?php\r\necho $name;\r\necho @$organization + 6;\r\n```\r\n运行这段程序，页面输出\r\n```\r\n6PHP Notice:  Undefined variable: name in /usercode/file.php on line 2\r\n```\r\n意思是说，文件第二行有一个提示性错误：`name变量未定义`。但第二个`echo`语句却被执行了，页面开头显示了`6`。因为有`@`错误控制运算符的存在，所以阻止了PHP报错：`organization变量未定义`。\r\n\r\n### 字符串连接运算符\r\n`.`英文句号就是字符串连接运算符。其作用是连接两个字符串。\r\n```php\r\n&lt;?php\r\n$name = &quot;My name is &quot;;\r\necho $name . &quot;Alen虫&quot;;\r\n```\r\n\r\n程序运行结果：\r\n```\r\nMy name is Alen虫\r\n```\r\n\r\n程序第二行通过`.`将变量`$name`与字符串`Alen虫`连接了起来，生成了新的字符串`My name is Alen虫`。\r\n\r\n### 执行运算符\r\n**\\` \\`** 两个英文反引号就是**执行运算符**，表示在控制台运行命令并返回命令的输出。\r\n\r\n```php\r\n&lt;?php\r\n$output = `dir /w`;\r\necho &quot;&lt;pre&gt;$output&lt;/pre&gt;&quot;;\r\n```\r\n程序运行结果是`输出了你的htdocs目录下的文件列表`。\r\n\r\nphp先去shell执行了`dir /w`命令，并将运行结果赋值给`$output`变量，随后输出。\r\n\r\n这里使用了双引号中的变量使用。在双引号的字符串中可以直接写`$`符号开头的来引用相关变量。', '1500646657', '7', '0', '1', '', '0', '101', '119.61.27.50', null, '1500646837');
COMMIT;

-- ----------------------------
--  Table structure for `ws_blog_comment`
-- ----------------------------
DROP TABLE IF EXISTS `ws_blog_comment`;
CREATE TABLE `ws_blog_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT 0,
  `uid` int(11) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `delete_time` int(12) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_id` (`blog_id`),
  CONSTRAINT `blog_id` FOREIGN KEY (`blog_id`) REFERENCES `ws_blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `ws_blog_copy`
-- ----------------------------
DROP TABLE IF EXISTS `ws_blog_copy`;
CREATE TABLE `ws_blog_copy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `create_time` int(12) NOT NULL,
  `class` int(11) NOT NULL DEFAULT 0,
  `hide` tinyint(1) NOT NULL DEFAULT 0,
  `uid` int(11) NOT NULL DEFAULT 1,
  `cover_img` varchar(255) DEFAULT '',
  `comment_count` int(10) DEFAULT 0,
  `ip` varchar(15) DEFAULT NULL,
  `delete_time` int(12) DEFAULT NULL,
  `update_time` int(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `ws_blog_copy`
-- ----------------------------
BEGIN;
INSERT INTO `ws_blog_copy` VALUES ('1', '本社团正式成立', '　　今日社长孔元元参加了由社团联举行的新社团成立答辩会，向几位五星社团社长以及社管部的同学介绍了网页客研究会的职能、成员组成以及未来规划。社管部同学批准了申请。&lt;br&gt;&lt;br&gt;', '1444824000', '4', '0', '1', 'http://cdn.djwebclub.com/images/14877739378.jpg', '0', '116.230.44.214', null, null), ('2', '网页基础组培训课', '&lt;p&gt;由社长孔元元带领同学来到信息学院楼405机房，向大家介绍了不同的CSS选择器与盒子模型的基本概念。 这节课从十二点半开始一直持续到三点。课后也对同学们提出的问题进行答疑。&lt;/p&gt;&lt;p&gt;&lt;img style=&quot;width: 1444px;&quot; src=&quot;/Uploads/blog/images/2016-05-07/572dfaa3d9620.jpg&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;img style=&quot;width: 1444px;&quot; src=&quot;/Uploads/blog/images/2016-05-07/572dfabc8b100.jpg&quot;&gt;&lt;br&gt;&lt;/p&gt;', '1448539200', '4', '0', '1', 'http://cdn.djwebclub.com/images/14877739201.jpg', '0', '124.77.97.53', null, null), ('3', '新学期，新计划', '&lt;p&gt;小伙伴们，新学期到啦！无目标，无理想。作为一个有理想，有抱负的好社团，该展望一下这学期的目标咯！&lt;/p&gt;&lt;p&gt;1. 院社团联在九月底会有一个晚会，每个社团出一个节目。大家有兴趣想展示一下自己的可以跟活动部说，然后董事会审核。欢迎大家踊跃报名！&lt;/p&gt;&lt;p&gt;2. 日常活动肯定不能太单调了，举办一点游戏技能大赛吧（网上有一个用js代码来相互PK的坦克大战）。&lt;/p&gt;&lt;p&gt;3. 日常活动的主讲我得换人了，王一帅主讲html基础和盒子模型。我线上授课讲js。需要其他语言讲解的，可以统计人数，单独开班线上授课。&lt;/p&gt;&lt;p&gt;4. 这学期会举办一个校级的网页制作大赛，主题可以由大家一起来共同决定。&lt;/p&gt;&lt;p&gt;5. 我们的口号是：搞事！搞事！搞事！&lt;/p&gt;', '1473335698', '4', '0', '1', '', '0', '180.169.48.113', null, null), ('4', '选课啦！选课啦！', '&lt;p style=&quot;line-height: 1.5;&quot;&gt;&lt;span style=&quot;line-height: 1.5;&quot;&gt;大胸弟们！准备好让老司机带领你们飙车了嘛！是不是已经选完了学校的课，但却感觉时间依旧得不到充分地利用呢？想不想抓紧大学的时间来学习一门新技术呢？那就快来报名参加我们社团的课程吧！&lt;/span&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;line-height: 1.5;&quot;&gt;&lt;span style=&quot;font-size: 14px;&quot;&gt;报名指南：每个人可报名参加的活动数量不限，但时间不能发生冲突。确认报名参加活动后，若改变主意了，请联系教导主任进行退选。活动开始后，禁止无故缺席。缺席四次及以上的同学将被强制退选。&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;line-height: 1.5;&quot;&gt;&lt;span style=&quot;font-size: 14px;&quot;&gt;PS: 大家可以自由选择不同的讲师、地点与时间的活动哦~&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;line-height: 1.5;&quot;&gt;&lt;span style=&quot;font-size: 14px;&quot;&gt;&lt;span style=&quot;widows: auto;&quot;&gt;社团活动选课系统已经开通，请大家进入社团网站根据自己的时间安排进行选课&lt;/span&gt;&lt;br style=&quot;widows: auto;&quot;&gt;&lt;span style=&quot;widows: auto;&quot;&gt;每门课程的主讲教师、时间与地点都不相同&lt;/span&gt;&lt;br style=&quot;widows: auto;&quot;&gt;&lt;span style=&quot;widows: auto;&quot;&gt;线上活动从本周开始，线下活动从下周开始，请各位关注&lt;/span&gt;&lt;br style=&quot;widows: auto;&quot;&gt;&lt;a href=&quot;http://www.djwebclub.com/Activity/index.html&quot; target=&quot;_blank&quot; style=&quot;outline: 0px; widows: auto;&quot;&gt;http://www.djwebclub.com/Activity/index.html&lt;/a&gt;&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', '1473337225', '4', '0', '1', 'http://cdn.djwebclub.com/images/14877738436.jpg', '0', '116.230.44.214', null, null), ('5', '【社团活动】新生见面会！', '&lt;p&gt;昨天晚上九点社长在一食堂二楼举行了鲜肉见面会。大家都相互介绍自己，一起憧憬着未来。&lt;/p&gt;&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;/Uploads/blog/images/2016-09-13/57d75430be891.jpg&quot; style=&quot;width: 1444px;&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;/Uploads/blog/images/2016-09-13/57d754946da02.jpg&quot; style=&quot;width: 1444px;&quot;&gt;&lt;br&gt;&lt;/p&gt;', '1473729753', '4', '0', '1', 'http://cdn.djwebclub.com/images/14877738216.jpg', '0', '180.160.142.179', null, null), ('6', '【社团活动】9.27日周二活动', '&lt;p style=&quot;text-indent: 2em;&quot;&gt;今天是百团大战胜利后的第一天，讲师王一帅带领近50位同学在信息楼407机房进行了第一次正式活动。经过这次的活动，同学们对于HTML概念、HTML标签与网页的本质有了基础的了解。&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/Uploads/blog/images/2016-10-01/57ef8d8a8c598.jpg&quot; alt=&quot;王一帅正在授课&quot;&gt;&lt;br&gt;&lt;/p&gt;', '1475317326', '4', '0', '1', 'http://cdn.djwebclub.com/images/14877737234.jpg', '0', '180.154.9.147', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `ws_category`
-- ----------------------------
DROP TABLE IF EXISTS `ws_category`;
CREATE TABLE `ws_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(11) NOT NULL DEFAULT '1' COMMENT '1-博文/2-图片/3-视频/4-音频',
  `pid` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `ws_category`
-- ----------------------------
BEGIN;
INSERT INTO `ws_category` VALUES ('1', 'Blog', '0', '谈技术'), ('2', 'Blog', '0', '谈人生'), ('3', 'Blog', '0', '谈理想'), ('4', 'Blog', '0', '谈社团'), ('5', 'Blog', '0', 'PHP框架开发'), ('6', 'Blog', '0', '前端基础'), ('7', 'Blog', '0', 'PHP基础');
COMMIT;

-- ----------------------------
--  Table structure for `ws_checkin`
-- ----------------------------
DROP TABLE IF EXISTS `ws_checkin`;
CREATE TABLE `ws_checkin` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `activity_id` int(12) unsigned NOT NULL DEFAULT 1,
  `uid` int(15) unsigned DEFAULT 0,
  `stu_no` bigint(12) NOT NULL,
  `class` varchar(12) NOT NULL,
  `name` varchar(20) NOT NULL,
  `create_time` int(15) NOT NULL DEFAULT 0,
  `update_time` int(15) DEFAULT 0,
  `ip` varchar(15) NOT NULL DEFAULT '0.0.0.0',
  `ua` text DEFAULT NULL,
  `valid` int(1) NOT NULL DEFAULT 1 COMMENT '是否有效',
  `comment` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `activity_id` (`activity_id`),
  CONSTRAINT `activity_id` FOREIGN KEY (`activity_id`) REFERENCES `ws_activities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;


-- ----------------------------
--  Table structure for `ws_comment`
-- ----------------------------
DROP TABLE IF EXISTS `ws_comment`;
CREATE TABLE `ws_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) NOT NULL DEFAULT 0,
  `nickname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `content` text NOT NULL,
  `ip` varchar(15) NOT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `update_time` datetime DEFAULT '0000-00-00 00:00:00',
  `delete_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `ws_common`
-- ----------------------------
DROP TABLE IF EXISTS `ws_common`;
CREATE TABLE `ws_common` (
  `name` varchar(50) NOT NULL,
  `value` varchar(500) NOT NULL DEFAULT '',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `ws_common`
-- ----------------------------
BEGIN;
INSERT INTO `ws_common` VALUES ('bottom_banner_img', 'http://cdn.djwebclub.com/images/14882071370.jpg'), ('bottom_banner_text', '2016科技魅影之夜2016科技魅影之夜2016科技魅影之夜2016科技魅影之夜2016科技魅影之夜2016科技魅影之夜2016科技魅影之夜2016科技魅影之夜2016科技魅影之夜2016科技魅影之夜2016科技魅影之夜2016科技魅影之夜2016科技魅影之夜2016科技魅影之夜2016科技魅影之夜2016科技魅影之夜2016科技魅影之夜2016科技魅影之夜2016科技魅影之夜2016科技魅影之夜2016科技魅影之夜2016科技魅影之夜2016科技魅影之夜2016科技魅影之夜2016科技魅影之夜2016科技魅影之夜2016科技魅影之夜2016科技魅影之夜'), ('bottom_banner_text_background', '#4a91ff'), ('bottom_banner_title', '2016科技魅影之夜'), ('left_text', '上海电机学院电子信息学院\r\n上海市浦东新区橄榄路1350号'), ('left_title', '地址'), ('map_address', '上海市橄榄路1350号'), ('mid_text', '497522352'), ('mid_title', 'QQ群'), ('other_text', ''), ('other_title', ''), ('qq', '438644808'), ('right_text', 'system@kyy1996.com'), ('right_title', 'E-Mail'), ('website_address', '上海电机学院电子信息学院网页客研究会'), ('website_email', 'system@kyy1996.com'), ('website_mobile', 'QQ群: 497522352'), ('website_title', '网页客研究会'), ('welcome_img', 'http://cdn.djwebclub.com/images/14882071370.jpg'), ('welcome_subtitle', '欢迎来到上海电机学院电子信息学院网页客研究会'), ('welcome_text', '网页客研究会是由上海电机学院计算机1512班的孔元元于2015年创立的。聚集了来自不同专业的，对网页制作感兴趣的同学，大家一起讨论HTML、CSS、JS等网页技术。 每周五，大家都会聚集在信息学院楼机房中，由社长主持一些讨论会，当场做实验。社团内部，还开设了“网页基础教学”、“PHP程序设计”、“前端技术”等课程，由社员自愿报名，学习相关知识，提升自身的技能。'), ('welcome_title', '欢迎');
COMMIT;

-- ----------------------------
--  Table structure for `ws_contact`
-- ----------------------------
DROP TABLE IF EXISTS `ws_contact`;
CREATE TABLE `ws_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `map_address` text DEFAULT NULL,
  `left_title` varchar(255) DEFAULT NULL,
  `left_text` text DEFAULT NULL,
  `mid_title` varchar(255) DEFAULT NULL,
  `mid_text` text DEFAULT NULL,
  `right_title` varchar(255) DEFAULT NULL,
  `right_text` text DEFAULT NULL,
  `other_title` varchar(255) DEFAULT NULL,
  `other_text` text DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `ws_contact`
-- ----------------------------
BEGIN;
INSERT INTO `ws_contact` VALUES ('1', '上海市橄榄路1350号', '地址', '上海电机学院电子信息学院\r\n上海市浦东新区橄榄路1350号', 'QQ群', '497522352', 'Email', 'system@kyy1996.com', 'Email', 'system@kyy1996.com', '1473487989');
COMMIT;

-- ----------------------------
--  Table structure for `ws_gallery`
-- ----------------------------
DROP TABLE IF EXISTS `ws_gallery`;
CREATE TABLE `ws_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1024) DEFAULT NULL,
  `url` varchar(1024) DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(1024) DEFAULT NULL,
  `create_time` varchar(11) DEFAULT '0',
  `update_time` varchar(11) DEFAULT '0',
  `delete_time` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `ws_gallery`
-- ----------------------------
BEGIN;
INSERT INTO `ws_gallery` VALUES ('1', '社团成立答辩会', 'http://cdn.djwebclub.com/images/14877809366.jpg', null, '社团活动', 'http://cdn.djwebclub.com/images/14877809366.jpg', '1460957110', '0', null), ('2', '活动结束', 'http://cdn.djwebclub.com/images/14877809973.jpg', null, '社团活动', 'http://cdn.djwebclub.com/images/14877809973.jpg', '1460957144', '0', null), ('3', '社长请同学吃饭', 'http://cdn.djwebclub.com/images/14877810092.jpg', null, '社团活动', 'http://cdn.djwebclub.com/images/14877810092.jpg', '1460957170', '0', null), ('4', '网页基础课', 'http://cdn.djwebclub.com/images/14877810440.jpg', null, '社团活动', 'http://cdn.djwebclub.com/images/14877810440.jpg', '1460957196', '0', null), ('5', '网页基础课', 'http://cdn.djwebclub.com/images/14877810666.jpg', null, '社团活动', 'http://cdn.djwebclub.com/images/14877810666.jpg', '1475337584', '0', null), ('7', '网页基础课', 'http://cdn.djwebclub.com/images/14877810866.jpg', null, '社团活动', 'http://cdn.djwebclub.com/images/14877810866.jpg', '1460957330', '0', null), ('8', '网页基础课', 'http://cdn.djwebclub.com/images/14877810989.jpg', null, '社团活动', 'http://cdn.djwebclub.com/images/14877810989.jpg', '1460957395', '0', null), ('9', '9.27 社团活动', 'http://cdn.djwebclub.com/images/14877811168.jpg', null, '社团活动', 'http://cdn.djwebclub.com/images/14877811168.jpg', '1475337279', '0', null), ('10', '正在授课的王一帅', 'http://cdn.djwebclub.com/images/14877810265.jpg', null, '社团活动', 'http://cdn.djwebclub.com/images/14877810265.jpg', '1475337322', '0', null);
COMMIT;

-- ----------------------------
--  Table structure for `ws_job`
-- ----------------------------
DROP TABLE IF EXISTS `ws_job`;
CREATE TABLE `ws_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `requirement` varchar(255) NOT NULL,
  `create_time` int(15) NOT NULL,
  `update_time` int(15) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `uid` int(15) NOT NULL,
  `ip` varchar(15) NOT NULL DEFAULT '0.0.0.0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `ws_job`
-- ----------------------------
BEGIN;
INSERT INTO `ws_job` VALUES ('1', '内容管理员', '宣传部宣传中心', '宣传部宣传中心现招募微信管理员与网站内容管理员。主要负责社团微信公众号与社团网站的内容更新工作。更新频率在一周一次。', '有责任心，踏实肯学', '1476548791', '1476548888', '1', '1', '180.154.9.147'), ('2', '平面设计师', '宣传部设计中心', '平面设计师平时的任务不多，主要为社团举办的大型活动制作海报。', '会PS，有责任心，踏实肯学', '1476548991', '1476550051', '1', '1', '180.154.9.147'), ('3', '前端工程师', '技术部', '前端工程师主要负责社团网站的前台页面开发维护工作。很锻炼大家的前端技术的。', '已参加社团前端基础培训课程，掌握HTML基础知识。有责任心，踏实肯学。', '1476549108', '1476549160', '1', '1', '180.154.9.147'), ('5', '后台程序工程师', '技术部', '后台程序工程师主要负责社团网站核心系统的开发与维护工作。很有技术含量的。', '对程序设计感兴趣，曾经学过至少一门编程语言，有责任心，踏实肯学。', '1476549356', '1476549356', '1', '1', '180.154.9.147'), ('6', '活动管理员', '活动部', '活动部主要负责社团活动的组织与考勤工作，活动结束后也需要写出本次活动的通讯稿。', '会用word或wps，有责任心，踏实肯学', '1476549483', '1476549674', '1', '1', '180.154.9.147'), ('7', '会计', '财务部', '财务部负责社团财产的保管工作。每学年末都要上交一份年度财务报表并公示。', '会用excel或WPS表格，会数钱，有责任心，踏实肯学。', '1476549643', '1476549643', '1', '1', '180.154.9.147'), ('8', '业务员', '外联部', '外联部负责与其他社团、组织沟通，协助董事会完成协调任务。', '口才好，有责任心，踏实肯学。', '1476549799', '1476549799', '1', '1', '180.154.9.147'), ('9', '讲师', '培训部', '培训部负责培训社员的技能。有网页基础组、前端组、后台程序组、其他程序组等教学小组。', '精通网站开发，能独立完成页面编写工作，有责任心，踏实肯学。', '1476550025', '1476550025', '1', '1', '180.154.9.147');
COMMIT;

-- ----------------------------
--  Table structure for `ws_job_applications`
-- ----------------------------
DROP TABLE IF EXISTS `ws_job_applications`;
CREATE TABLE `ws_job_applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `stu_no` varchar(15) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `qq` varchar(255) DEFAULT NULL,
  `resume` text DEFAULT NULL,
  `create_time` int(15) DEFAULT NULL,
  `update_time` int(15) DEFAULT NULL,
  `status` int(2) DEFAULT 0,
  `ip` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `job_id` (`job_id`),
  CONSTRAINT `job_id` FOREIGN KEY (`job_id`) REFERENCES `ws_job` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;


-- ----------------------------
--  Table structure for `ws_member`
-- ----------------------------
DROP TABLE IF EXISTS `ws_member`;
CREATE TABLE `ws_member` (
  `uid` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(1) NOT NULL DEFAULT 1 COMMENT '1-普通用户/2-管理员',
  `avatar` text DEFAULT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT 0,
  `create_time` int(15) unsigned DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '账户状态/1-启用/0-停用',
  `ip` varchar(15) DEFAULT '0.0.0.0',
  `update_time` int(15) DEFAULT NULL,
  `delete_time` int(15) DEFAULT NULL,
  PRIMARY KEY (`uid`,`email`,`mobile`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `ws_member`
-- ----------------------------
BEGIN;
INSERT INTO `ws_member` VALUES ('1', '2', '/Admin/images/user-4.png', 'system@kyy1996.com', '123456', '18101858837', '1', '1482361069', '1', '0.0.0.0', '1500886323', null)
COMMIT;

-- ----------------------------
--  Table structure for `ws_member_profile`
-- ----------------------------
DROP TABLE IF EXISTS `ws_member_profile`;
CREATE TABLE `ws_member_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(15) unsigned NOT NULL,
  `stu_no` varchar(255) NOT NULL DEFAULT '',
  `school` varchar(255) NOT NULL DEFAULT '',
  `class` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `delete_time` timestamp NULL DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  CONSTRAINT `ws_member_profile_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `ws_member` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `ws_menu`
-- ----------------------------
DROP TABLE IF EXISTS `ws_menu`;
CREATE TABLE `ws_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文档ID',
  `module` varchar(255) DEFAULT 'admin' COMMENT '规则所属模块',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
  `pid` int(10) unsigned NOT NULL DEFAULT 0 COMMENT '上级分类ID',
  `type` tinyint(2) DEFAULT 1 COMMENT '1-url;2-主菜单',
  `sort` int(10) unsigned NOT NULL DEFAULT 0 COMMENT '排序（同级有效）',
  `url` char(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `hide` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT '是否隐藏',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '提示',
  `group` varchar(50) DEFAULT '' COMMENT '分组',
  `icon_class` varchar(50) DEFAULT 'fa-cogs',
  `is_dev` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT '是否仅开发者模式可见',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '状态',
  `condition` varchar(300) DEFAULT '' COMMENT '规则附加条件',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `ws_menu`
-- ----------------------------
BEGIN;
INSERT INTO `ws_menu` VALUES ('1', 'admin', '控制台概览', '0', '1', '0', 'admin/index/index', '0', '', '', 'fa-tachometer', '1', '1', ''), ('2', 'admin', '全局设置', '0', '1', '0', 'admin/common/index', '0', '', '', 'fa-wrench', '1', '1', ''), ('3', 'admin', '页面设置', '0', '1', '0', 'admin/page/index', '0', '', '', 'fa-file-o', '1', '1', ''), ('4', 'admin', '首页', '3', '1', '0', 'admin/page/index', '0', '', '', 'fa-caret-right', '1', '1', ''), ('5', 'admin', '联系我们', '3', '1', '0', 'admin/page/contact', '0', '', '', 'fa-caret-right', '1', '1', ''), ('6', 'admin', '关于', '3', '1', '0', 'admin/page/about', '0', '', '', 'fa-caret-right', '1', '1', ''), ('7', 'admin', '部落格', '0', '1', '0', 'admin/blog/index', '0', '', '', 'fa-files-o', '1', '1', ''), ('8', 'admin', '浏览', '7', '1', '0', 'admin/blog/index', '0', '', '', 'fa-caret-right', '1', '1', ''), ('9', 'admin', '发表/更新文章', '7', '1', '0', 'admin/blog/update', '1', '', '', 'fa-caret-right', '1', '1', ''), ('11', 'admin', '博文评论管理', '7', '1', '0', 'admin/blog_comment/index', '0', '', '', 'fa-caret-right', '1', '1', ''), ('12', 'admin', '留言板', '0', '1', '0', 'admin/comment/index', '0', '', '', 'fa-comments-o', '1', '1', ''), ('13', 'admin', '画廊', '0', '1', '0', 'admin/gallery/index', '0', '', '', 'fa-camera', '1', '1', ''), ('16', 'admin', '社团活动', '0', '1', '0', 'admin/activity/index', '0', '', '', 'fa-group', '1', '1', ''), ('17', 'admin', '活动管理', '16', '1', '0', 'admin/activity/index', '0', '', '', 'fa-caret-right', '1', '1', ''), ('18', 'admin', '签到管理', '16', '1', '0', 'admin/checkin/index', '0', '', '', 'fa-caret-right', '1', '1', ''), ('19', 'admin', '黑名单', '16', '1', '0', 'admin/blacklist/index', '0', '', '', 'fa-caret-right', '1', '1', ''), ('20', 'admin', '报名情况', '16', '1', '0', 'admin/signup/index', '0', '', '', 'fa-caret-right', '1', '1', ''), ('21', 'admin', '活动评价', '16', '1', '0', 'admin/activity_comment/index', '0', '', '', 'fa-caret-right', '1', '1', ''), ('22', 'admin', '招募令', '0', '1', '0', 'admin/job/index', '0', '', '', 'fa-group', '1', '1', ''), ('23', 'admin', '招募管理', '22', '1', '0', 'admin/job/index', '0', '', '', 'fa-caret-right', '1', '1', ''), ('24', 'admin', '报名管理', '22', '1', '0', 'admin/job_apply/index', '0', '', '', 'fa-caret-right', '1', '1', ''), ('25', 'admin', '菜单与权限节点管理', '0', '1', '0', 'admin/menu/index', '0', '', '', 'fa-reorder', '1', '1', ''), ('26', 'admin', '用户系统', '0', '1', '0', 'admin/user_group/index', '0', '', '', 'fa-users', '1', '1', ''), ('27', 'admin', '权限管理', '0', '1', '0', 'admin/auth_manager/index', '0', '', '', 'fa-lock', '1', '1', ''), ('28', 'admin', '统计系统', '0', '1', '0', 'admin/statistic/index', '0', '', '', 'fa-eye', '1', '1', ''), ('29', 'admin', 'Seo相关', '0', '1', '0', 'admin/seo/index', '0', '', '', 'fa-google', '1', '1', ''), ('30', 'admin', '用户列表', '26', '1', '0', 'admin/user/index', '0', '', '', 'fa-caret-right', '1', '1', ''), ('31', 'admin', '用户组列表', '26', '1', '0', 'admin/user_group/index', '0', '', '', 'fa-caret-right', '1', '1', ''), ('32', 'admin', '用户分配', '26', '1', '0', 'admin/user_group/users', '0', '', '', 'fa-caret-right', '1', '1', ''), ('33', 'admin', '保存', '27', '1', '0', 'admin/auth_manager/update', '1', '', '', 'fa-caret-right', '1', '1', ''), ('34', 'admin', '保存', '31', '1', '0', 'admin/user_group/update', '1', '', '', 'fa-caret-right', '1', '1', ''), ('35', 'admin', '开发工具', '0', '1', '0', 'admin/development/index', '0', '', '', 'fa-wrench', '1', '1', ''), ('36', 'admin', '反射器', '35', '1', '0', 'admin/reflection/index', '0', '', '', 'fa-caret-right', '1', '1', ''), ('38', 'admin', '保存', '2', '1', '0', 'admin/common/update', '1', '', '', 'fa-caret-right', '1', '1', ''), ('40', 'admin', '保存Banner信息', '4', '1', '0', 'admin/page/updateBanner', '1', '', '', 'fa-caret-right', '1', '1', ''), ('41', 'admin', '删除Banner信息', '4', '1', '0', 'admin/page/delBanner', '1', '', '', 'fa-caret-right', '1', '1', ''), ('51', 'admin', '回复评论', '11', '1', '0', 'admin/blog_comment/update', '1', '', '', 'fa-caret-right', '1', '1', ''), ('52', 'admin', '删除评论', '11', '1', '0', 'admin/blog_comment/delete', '1', '', '', 'fa-caret-right', '1', '1', ''), ('53', 'admin', '删除博文', '8', '1', '0', 'admin/blog/delete', '1', '', '', 'fa-caret-right', '1', '1', ''), ('57', 'admin', '回复留言', '12', '1', '0', 'admin/comment/update', '1', '', '', 'fa-caret-right', '1', '1', ''), ('58', 'admin', '删除留言', '12', '1', '0', 'admin/comment/delete', '1', '', '', 'fa-caret-right', '1', '1', ''), ('60', 'admin', '更新图片', '13', '1', '0', 'admin/gallery/update', '1', '', '', 'fa-caret-right', '1', '1', ''), ('61', 'admin', '删除图片', '13', '1', '0', 'admin/gallery/delete', '1', '', '', 'fa-caret-right', '1', '1', ''), ('65', 'admin', '更新', '17', '1', '0', 'admin/activity/update', '1', '', '', 'fa-caret-right', '1', '1', ''), ('66', 'admin', '删除', '17', '1', '0', 'admin/activity/delete', '1', '', '', 'fa-caret-right', '1', '1', ''), ('68', 'admin', 'AJAX得到签到二维码', '17', '1', '0', 'admin/activity/ajaxGetQrCode', '1', '', '', 'fa-caret-right', '1', '1', ''), ('69', 'admin', '显示签到二维码', '17', '1', '0', 'admin/activity/showQrCode', '1', '', '', 'fa-caret-right', '1', '1', ''), ('70', 'admin', '导出签到信息', '18', '1', '0', 'admin/checkin/export', '1', '', '', 'fa-caret-right', '1', '1', ''), ('71', 'admin', '更新签到信息', '18', '1', '0', 'admin/checkin/update', '1', '', '', 'fa-caret-right', '1', '1', ''), ('72', 'admin', '删除签到', '18', '1', '0', 'admin/checkin/delete', '1', '', '', 'fa-caret-right', '1', '1', ''), ('74', 'admin', '删除黑名单', '19', '1', '0', 'admin/blacklist/delete', '1', '', '', 'fa-caret-right', '1', '1', ''), ('75', 'admin', '更新黑名单', '19', '1', '0', 'admin/blacklist/update', '1', '', '', 'fa-caret-right', '1', '1', ''), ('77', 'admin', '更新报名信息', '20', '1', '0', 'admin/signup/update', '1', '', '', 'fa-caret-right', '1', '1', ''), ('78', 'admin', '删除报名信息', '20', '1', '0', 'admin/signup/delete', '1', '', '', 'fa-caret-right', '1', '1', ''), ('79', 'admin', '导出报名列表', '20', '1', '0', 'admin/signup/export', '1', '', '', 'fa-caret-right', '1', '1', ''), ('81', 'admin', '更新', '23', '1', '0', 'admin/job/update', '1', '', '', 'fa-caret-right', '1', '1', ''), ('83', 'admin', '删除', '23', '1', '0', 'admin/job/delete', '1', '', '', 'fa-caret-right', '1', '1', ''), ('86', 'admin', '导出报名信息', '24', '1', '0', 'admin/job_apply/export', '1', '', '', 'fa-caret-right', '1', '1', ''), ('87', 'admin', '更新报名信息', '24', '1', '0', 'admin/job_apply/update', '1', '', '', 'fa-caret-right', '1', '1', ''), ('100', 'admin', '更新', '29', '1', '0', 'admin/seo/update', '1', '', '', 'fa-caret-right', '1', '1', ''), ('101', 'admin', '删除', '29', '1', '0', 'admin/seo/delete', '1', '', '', 'fa-caret-right', '1', '1', ''), ('109', 'admin', '删除', '21', '1', '0', 'admin/activity_comment/delete', '0', '', '', 'fa-caret-right', '0', '1', ''), ('110', 'admin', '分类管理', '0', '1', '0', 'admin/category/index', '0', '', '', 'fa-tags', '0', '1', ''), ('111', 'admin', '更新', '110', '1', '0', 'admin/category/update', '1', '', '', 'fa-caret-right', '0', '1', ''), ('112', 'admin', '删除', '110', '1', '0', 'admin/category/delete', '1', '', '', 'fa-caret-right', '0', '1', ''), ('113', 'admin', '更新关于', '6', '1', '0', 'admin/page/updateAbout', '0', '', '', 'fa-caret-right', '0', '1', ''), ('114', 'admin', '更新联系我们', '5', '1', '0', 'admin/page/updateContact', '0', '', '', 'fa-caret-right', '0', '1', ''), ('115', 'admin', '更新首页', '4', '1', '0', 'admin/page/updateIndex', '0', '', '', 'fa-caret-right', '0', '1', ''), ('116', 'admin', '社员照片', '16', '1', '0', 'admin/user_photo/index', '0', '', '', 'fa-caret-right', '0', '1', ''), ('117', 'admin', 'OAuth2.0', '0', '1', '0', 'admin/oauth2_app/index', '0', '', '', 'fa-database', '0', '1', ''), ('118', 'admin', '已注册的应用', '117', '1', '0', 'admin/oauth2_app/index', '0', '', '', 'fa-caret-right', '0', '1', ''), ('119', 'admin', '各应用授权用户管理', '117', '1', '0', 'admin/oauth2_user/index', '0', '', '', 'fa-caret-right', '0', '1', ''), ('120', 'admin', 'OAuth2.0测试平台', '117', '1', '0', 'admin/oauth2_tester/index', '0', '', '', 'fa-caret-right', '0', '1', ''), ('121', 'admin', '更新', '118', '1', '0', 'admin/oauth2_app/update', '1', '', '', 'fa-caret-right', '0', '1', ''), ('122', 'admin', '删除', '118', '1', '0', 'admin/oauth2_app/delete', '1', '', '', 'fa-caret-right', '0', '1', ''), ('123', 'admin', '数据表结构', '35', '1', '0', 'admin/tools/structure', '0', '', '', 'fa-caret-right', '0', '1', ''), ('214', 'admin', '显示菜单', '123', '1', '0', 'admin/tools/showMenu', '1', '', '', 'fa-cogs', '0', '1', ''), ('215', 'admin', '显示数据表信息', '123', '1', '0', 'admin/tools/showTable', '1', '', '', 'fa-cogs', '0', '1', ''), ('216', 'admin', '用户登录', '0', '1', '0', 'admin/user/login', '1', '', '', 'fa-cogs', '0', '1', ''), ('217', 'admin', '修改用户', '30', '1', '0', 'admin/user/update', '1', '', '', 'fa-cogs', '0', '1', ''), ('218', 'admin', '注销', '0', '1', '0', 'admin/user/logout', '1', '', '', 'fa-cogs', '0', '1', ''), ('219', 'admin', '删除', '30', '1', '0', 'admin/user/delete', '1', '', '', 'fa-cogs', '0', '1', ''), ('220', 'admin', '删除', '25', '1', '0', 'admin/menu/delete', '1', '', '', 'fa-cogs', '0', '1', ''), ('221', 'admin', '修改', '25', '1', '0', 'admin/menu/update', '1', '', '', 'fa-cogs', '0', '1', ''), ('222', 'admin', '显示照片', '116', '1', '0', 'admin/user_photo/photo', '1', '', '', 'fa-cogs', '0', '1', ''), ('223', 'admin', '查看班级照片', '116', '1', '0', 'admin/user_photo/classPhoto', '1', '', '', 'fa-cogs', '0', '1', ''), ('224', 'admin', '生成菜单与权限节点', '36', '1', '0', 'admin/reflection/generateMenu', '1', '', '', 'fa-cogs', '0', '0', ''), ('225', 'admin', '添加用户至用户组', '31', '1', '0', 'admin/user_group/userUpdate', '1', '', '', 'fa-cogs', '0', '1', ''), ('226', 'admin', '从用户组删除用户', '31', '1', '0', 'admin/user_group/userDelete', '1', '', '', 'fa-cogs', '0', '1', ''), ('227', 'admin', '删除', '24', '1', '0', 'admin/job_apply/delete', '1', '', '', 'fa-caret-right', '0', '1', ''), ('229', 'admin', '校验各节点是否存在', '36', '1', '0', 'admin/reflection/generateDatabase', '0', '', '', 'fa-cogs', '0', '1', ''), ('230', 'admin', '删除', '31', '1', '0', 'admin/user_group/delete', '0', '', '', 'fa-cogs', '0', '1', ''), ('247', 'admin', '修改/删除节点数据', '36', '1', '0', 'admin/reflection/modifyMenu', '1', '', '', 'fa-cogs', '0', '1', '');
COMMIT;

-- ----------------------------
--  Table structure for `ws_migrations`
-- ----------------------------
DROP TABLE IF EXISTS `ws_migrations`;
CREATE TABLE `ws_migrations` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `ws_migrations`
-- ----------------------------
BEGIN;
INSERT INTO `ws_migrations` VALUES ('20170703104356', 'CreateMemberProfile', '2017-07-03 19:37:53', '2017-07-03 19:37:53', '0');
COMMIT;

-- ----------------------------
--  Table structure for `ws_oauth_access_tokens`
-- ----------------------------
DROP TABLE IF EXISTS `ws_oauth_access_tokens`;
CREATE TABLE `ws_oauth_access_tokens` (
  `access_token` varchar(40) NOT NULL,
  `client_id` varchar(80) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `expires` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `scope` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`access_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `ws_oauth_authorization_codes`
-- ----------------------------
DROP TABLE IF EXISTS `ws_oauth_authorization_codes`;
CREATE TABLE `ws_oauth_authorization_codes` (
  `authorization_code` varchar(40) NOT NULL,
  `client_id` varchar(80) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `redirect_uri` varchar(2000) DEFAULT NULL,
  `expires` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `scope` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`authorization_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `ws_oauth_clients`
-- ----------------------------
DROP TABLE IF EXISTS `ws_oauth_clients`;
CREATE TABLE `ws_oauth_clients` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` varchar(80) NOT NULL,
  `client_secret` varchar(80) DEFAULT NULL,
  `redirect_uri` varchar(2000) NOT NULL,
  `grant_types` varchar(80) DEFAULT NULL,
  `scope` varchar(100) DEFAULT NULL,
  `user_id` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`,`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `ws_oauth_clients`
-- ----------------------------
BEGIN;
INSERT INTO `ws_oauth_clients` VALUES ('1', 'app_tester', 'app_secret', '', 'authorization_code client_credentials refresh_token password', 'basic', '');
COMMIT;

-- ----------------------------
--  Table structure for `ws_oauth_jwt`
-- ----------------------------
DROP TABLE IF EXISTS `ws_oauth_jwt`;
CREATE TABLE `ws_oauth_jwt` (
  `client_id` varchar(80) NOT NULL,
  `subject` varchar(80) DEFAULT NULL,
  `public_key` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `ws_oauth_refresh_tokens`
-- ----------------------------
DROP TABLE IF EXISTS `ws_oauth_refresh_tokens`;
CREATE TABLE `ws_oauth_refresh_tokens` (
  `refresh_token` varchar(40) NOT NULL,
  `client_id` varchar(80) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `expires` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `scope` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`refresh_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;


-- ----------------------------
--  Table structure for `ws_oauth_scopes`
-- ----------------------------
DROP TABLE IF EXISTS `ws_oauth_scopes`;
CREATE TABLE `ws_oauth_scopes` (
  `scope` text DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `ws_oauth_users`
-- ----------------------------
DROP TABLE IF EXISTS `ws_oauth_users`;
CREATE TABLE `ws_oauth_users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(2000) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `ws_seo`
-- ----------------------------
DROP TABLE IF EXISTS `ws_seo`;
CREATE TABLE `ws_seo` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `value` varchar(500) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `ws_seo`
-- ----------------------------
BEGIN;
INSERT INTO `ws_seo` VALUES ('3', 'keywords', '网页客研究会,网站设计,前端,技术交流,社团,上海电机学院'), ('4', 'description', '网页客研究会是由上海电机学院计算机1512班的孔元元于2015年创立的。聚集了来自不同专业的，对网页制作感兴趣的同学，大家一起讨论HTML、CSS、JS等网页技术。 每周五，大家都会聚集在信息学院楼机房中，由社长主持一些讨论会，当场做实验。社团内部，还开设了“网页基础教学”、“PHP程序设计”、“前端技术”等课程，由社员自愿报名，学习相关知识，提升自身的技能。');
COMMIT;

-- ----------------------------
--  Table structure for `ws_seo_commit`
-- ----------------------------
DROP TABLE IF EXISTS `ws_seo_commit`;
CREATE TABLE `ws_seo_commit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controller` varchar(50) NOT NULL DEFAULT '''''',
  `uid` int(11) NOT NULL DEFAULT 0,
  `url` varchar(255) NOT NULL DEFAULT '''''',
  `engine` varchar(50) NOT NULL DEFAULT '百度',
  `time` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='SEO提交记录';

-- ----------------------------
--  Records of `ws_seo_commit`
-- ----------------------------
BEGIN;
INSERT INTO `ws_seo_commit` VALUES ('1', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Index/index.html', 'baidu', '1475831859'), ('2', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Index/about.html', 'baidu', '1475831859'), ('3', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Index/contact.html', 'baidu', '1475831859'), ('4', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/index.html', 'baidu', '1475831859'), ('5', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Activity/index.html', 'baidu', '1475831859'), ('6', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Gallery/index.html', 'baidu', '1475831859'), ('7', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Comment/index.html', 'baidu', '1475831859'), ('8', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/1.html', 'baidu', '1475831859'), ('9', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/2.html', 'baidu', '1475831859'), ('10', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/3.html', 'baidu', '1475831859'), ('11', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/4.html', 'baidu', '1475831859'), ('12', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/5.html', 'baidu', '1475831859'), ('13', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/6.html', 'baidu', '1475831859'), ('14', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Index/index.html', 'baidu', '1475850675'), ('15', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Index/about.html', 'baidu', '1475850675'), ('16', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Index/contact.html', 'baidu', '1475850675'), ('17', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/index.html', 'baidu', '1475850675'), ('18', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Activity/index.html', 'baidu', '1475850675'), ('19', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Gallery/index.html', 'baidu', '1475850675'), ('20', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Comment/index.html', 'baidu', '1475850675'), ('21', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/1.html', 'baidu', '1475850675'), ('22', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/2.html', 'baidu', '1475850675'), ('23', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/3.html', 'baidu', '1475850675'), ('24', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/4.html', 'baidu', '1475850675'), ('25', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/5.html', 'baidu', '1475850675'), ('26', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/6.html', 'baidu', '1475850675'), ('27', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Index/index.html', 'baidu', '1476364029'), ('28', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Index/about.html', 'baidu', '1476364029'), ('29', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Index/contact.html', 'baidu', '1476364029'), ('30', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/index.html', 'baidu', '1476364029'), ('31', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Activity/index.html', 'baidu', '1476364029'), ('32', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Gallery/index.html', 'baidu', '1476364029'), ('33', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Comment/index.html', 'baidu', '1476364029'), ('34', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/1.html', 'baidu', '1476364029'), ('35', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/2.html', 'baidu', '1476364029'), ('36', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/3.html', 'baidu', '1476364029'), ('37', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/4.html', 'baidu', '1476364029'), ('38', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/5.html', 'baidu', '1476364029'), ('39', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/6.html', 'baidu', '1476364029'), ('40', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Index/index.html', 'baidu', '1476665761'), ('41', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Index/about.html', 'baidu', '1476665761'), ('42', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Index/contact.html', 'baidu', '1476665761'), ('43', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/index.html', 'baidu', '1476665761'), ('44', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Activity/index.html', 'baidu', '1476665761'), ('45', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Gallery/index.html', 'baidu', '1476665761'), ('46', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Comment/index.html', 'baidu', '1476665761'), ('47', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/1.html', 'baidu', '1476665761'), ('48', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/2.html', 'baidu', '1476665761'), ('49', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/3.html', 'baidu', '1476665761'), ('50', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/4.html', 'baidu', '1476665761'), ('51', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/5.html', 'baidu', '1476665761'), ('52', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/6.html', 'baidu', '1476665761'), ('53', '/admin.php?s=/Blog', '1', 'http://webmaster.kyy1996.com/Blog/show/id/7.html', 'baidu', '1477118712'), ('54', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Index/index.html', 'baidu', '1477118843'), ('55', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Index/about.html', 'baidu', '1477118843'), ('56', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Index/contact.html', 'baidu', '1477118843'), ('57', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/index.html', 'baidu', '1477118843'), ('58', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Activity/index.html', 'baidu', '1477118843'), ('59', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Gallery/index.html', 'baidu', '1477118843'), ('60', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Comment/index.html', 'baidu', '1477118843'), ('61', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/1.html', 'baidu', '1477118843'), ('62', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/2.html', 'baidu', '1477118843'), ('63', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/3.html', 'baidu', '1477118843'), ('64', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/4.html', 'baidu', '1477118843'), ('65', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/5.html', 'baidu', '1477118843'), ('66', '/admin.php?s=/Seo', '1', 'http://webmaster.kyy1996.com/Blog/show/id/6.html', 'baidu', '1477118843'), ('67', '/admin.php?s=/Seo', '1', 'http://www.djwebclub.com/Index/index.html', 'baidu', '1481185258'), ('68', '/admin.php?s=/Seo', '1', 'http://www.djwebclub.com/Index/about.html', 'baidu', '1481185258'), ('69', '/admin.php?s=/Seo', '1', 'http://www.djwebclub.com/Index/contact.html', 'baidu', '1481185258'), ('70', '/admin.php?s=/Seo', '1', 'http://www.djwebclub.com/Blog/index.html', 'baidu', '1481185258'), ('71', '/admin.php?s=/Seo', '1', 'http://www.djwebclub.com/Activity/index.html', 'baidu', '1481185258'), ('72', '/admin.php?s=/Seo', '1', 'http://www.djwebclub.com/Gallery/index.html', 'baidu', '1481185258'), ('73', '/admin.php?s=/Seo', '1', 'http://www.djwebclub.com/Comment/index.html', 'baidu', '1481185258'), ('74', '/admin.php?s=/Seo', '1', 'http://www.djwebclub.com/Blog/show/id/1.html', 'baidu', '1481185258'), ('75', '/admin.php?s=/Seo', '1', 'http://www.djwebclub.com/Blog/show/id/2.html', 'baidu', '1481185258'), ('76', '/admin.php?s=/Seo', '1', 'http://www.djwebclub.com/Blog/show/id/3.html', 'baidu', '1481185258'), ('77', '/admin.php?s=/Seo', '1', 'http://www.djwebclub.com/Blog/show/id/4.html', 'baidu', '1481185258'), ('78', '/admin.php?s=/Seo', '1', 'http://www.djwebclub.com/Blog/show/id/5.html', 'baidu', '1481185258'), ('79', '/admin.php?s=/Seo', '1', 'http://www.djwebclub.com/Blog/show/id/6.html', 'baidu', '1481185258');
COMMIT;

-- ----------------------------
--  Table structure for `ws_signup`
-- ----------------------------
DROP TABLE IF EXISTS `ws_signup`;
CREATE TABLE `ws_signup` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `activity_id` int(12) unsigned NOT NULL DEFAULT 1,
  `stu_no` bigint(12) NOT NULL,
  `class` varchar(12) NOT NULL,
  `name` varchar(20) NOT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `create_time` int(15) NOT NULL DEFAULT 0,
  `update_time` int(15) DEFAULT 0,
  `ip` varchar(15) NOT NULL DEFAULT '0.0.0.0',
  `ua` text DEFAULT NULL,
  `valid` int(1) NOT NULL DEFAULT 1 COMMENT '是否有效',
  `comment` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_id2` (`activity_id`),
  CONSTRAINT `activity_id2` FOREIGN KEY (`activity_id`) REFERENCES `ws_activities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;


-- ----------------------------
--  Table structure for `ws_statistic`
-- ----------------------------
DROP TABLE IF EXISTS `ws_statistic`;
CREATE TABLE `ws_statistic` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) NOT NULL,
  `time` varchar(16) NOT NULL,
  `uid` int(15) NOT NULL,
  `module` varchar(20) DEFAULT 'Home',
  `controller` varchar(20) NOT NULL,
  `action` varchar(100) NOT NULL,
  `param_id` int(15) NOT NULL DEFAULT 0,
  `ua` varchar(255) DEFAULT NULL,
  `referer` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `ws_subscriber`
-- ----------------------------
DROP TABLE IF EXISTS `ws_subscriber`;
CREATE TABLE `ws_subscriber` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `uid` int(20) NOT NULL DEFAULT 0,
  `status` tinyint(1) unsigned DEFAULT 1 COMMENT '订阅状态',
  `create_time` int(15) NOT NULL,
  `update_time` int(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `ws_team`
-- ----------------------------
DROP TABLE IF EXISTS `ws_team`;
CREATE TABLE `ws_team` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `brief` text DEFAULT NULL,
  `more` varchar(1024) DEFAULT NULL,
  `photo` varchar(1024) DEFAULT NULL,
  `index` int(2) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `ws_team`
-- ----------------------------
BEGIN;
INSERT INTO `ws_team` VALUES ('1', '孔元元', '来自电子信息学院计算机1512班。2015年10月创立本社团，填补了电子信息学院没有计算机专业社团的空白。精通HTML、JS、CSS、PHP等网站相关技术。在社团中负责教授高级前端技术与后台程序开发。同时，与同学们一起为校内外的社团、组织、公司开发网站。', '', '/Public/Home/images/photo.png', '1'), ('2', '王一帅', '来自电子信息学院计算机1512班。从社团创立起加入社团。在社长的一年培养下，掌握HTML、CSS等前端技术。现担任社团培训部前端讲师。', '', '/Public/Home/images/photo.png', '3'), ('3', '宋晓勇老师', '上海电机学院电子信息学院教师，讲授计算机基础、高级语言程序设计等课程，本社团指导教师。近些年承担校内外横向课题多项，有丰富的网站开发经验。', '', '/Public/Home/images/photo.png', '0');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
