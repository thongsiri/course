/*
Navicat MySQL Data Transfer

Source Server         : Local_Connection
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : db_course

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2015-06-18 22:00:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cms_courses`
-- ----------------------------
DROP TABLE IF EXISTS `cms_courses`;
CREATE TABLE `cms_courses` (
  `ID` int(11) NOT NULL auto_increment,
  `course_cateID` int(11) NOT NULL,
  `create_by_member` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `number` int(2) NOT NULL,
  `status` char(1) NOT NULL,
  `create` datetime NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_courses
-- ----------------------------
INSERT INTO `cms_courses` VALUES ('1', '1', '4', 'PHP Programming', 'สอน PHP', '2016-06-02', '2016-06-30', '10:10:00', '12:20:00', '101', '1', '2015-06-01 10:00:00');
INSERT INTO `cms_courses` VALUES ('2', '1', '4', 'HTML', 'สอน HTML', '2015-06-01', '2015-06-10', '10:00:00', '12:00:00', '20', '1', '2015-06-01 11:00:00');
INSERT INTO `cms_courses` VALUES ('3', '2', '3', 'Photoshop', 'สอน Photoshop', '2015-07-02', '2015-07-31', '13:00:00', '15:00:00', '10', '1', '2015-06-01 09:00:00');

-- ----------------------------
-- Table structure for `cms_course_categories`
-- ----------------------------
DROP TABLE IF EXISTS `cms_course_categories`;
CREATE TABLE `cms_course_categories` (
  `ID` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_course_categories
-- ----------------------------
INSERT INTO `cms_course_categories` VALUES ('1', 'Programming');
INSERT INTO `cms_course_categories` VALUES ('2', 'Graphic Designer');
INSERT INTO `cms_course_categories` VALUES ('3', 'Database');

-- ----------------------------
-- Table structure for `cms_members`
-- ----------------------------
DROP TABLE IF EXISTS `cms_members`;
CREATE TABLE `cms_members` (
  `ID` int(11) NOT NULL auto_increment,
  `roleID` int(11) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(255) default NULL,
  `lastname` varchar(255) default NULL,
  `nickname` varchar(50) default NULL,
  `birthday` date default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of cms_members
-- ----------------------------
INSERT INTO `cms_members` VALUES ('1', '1', 'stu1', '1beb31cdcc5374b64ba3007821c46bcc ', 'student1', '_lastname1', 'test1', '1985-02-14');
INSERT INTO `cms_members` VALUES ('2', '1', 'stu2', '390a0458823dd1a2ec0608e252631f66 ', 'student2', 'lastname2', 'test2', '1984-01-01');
INSERT INTO `cms_members` VALUES ('3', '2', 'ins1', 'f062cb4f0c127c62bdfe0218c8ca3132 ', 'Instructor1', '_lastname1', 'teacher1', '1985-10-04');
INSERT INTO `cms_members` VALUES ('4', '2', 'ins2', '3a3cb6d3229b4c52a5ed6dcbc1c78a7c ', 'Instructor2', 'lastname2', 'teacher2', '1980-10-01');

-- ----------------------------
-- Table structure for `cms_roles`
-- ----------------------------
DROP TABLE IF EXISTS `cms_roles`;
CREATE TABLE `cms_roles` (
  `ID` int(11) NOT NULL auto_increment,
  `rolename` varchar(50) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_roles
-- ----------------------------
INSERT INTO `cms_roles` VALUES ('1', 'Student');
INSERT INTO `cms_roles` VALUES ('2', 'Instructor');
