/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3308
 Source Schema         : admin_lte

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 02/02/2020 23:37:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status`  (
  `status_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_const` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `color_code` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES (1, 'Active', 'ACTIVE', NULL);
INSERT INTO `status` VALUES (2, 'Deactive', 'DEACTIVE', NULL);
INSERT INTO `status` VALUES (3, 'Pending', 'PENDING', NULL);
INSERT INTO `status` VALUES (4, 'Reject', 'REJECT', NULL);
INSERT INTO `status` VALUES (5, 'yes', 'YES', NULL);
INSERT INTO `status` VALUES (6, 'no', 'NO', NULL);
INSERT INTO `status` VALUES (7, 'info', 'INFI', NULL);
INSERT INTO `status` VALUES (8, 'Admin View', 'STATUS_ADMIN_VIEW', NULL);

-- ----------------------------
-- Table structure for sys_image
-- ----------------------------
DROP TABLE IF EXISTS `sys_image`;
CREATE TABLE `sys_image`  (
  `sys_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `sys_image_name` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`sys_image_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_image
-- ----------------------------
INSERT INTO `sys_image` VALUES (1, '1.jpg');
INSERT INTO `sys_image` VALUES (2, '2.jpg');
INSERT INTO `sys_image` VALUES (3, '3.jpg');

-- ----------------------------
-- Table structure for sys_module
-- ----------------------------
DROP TABLE IF EXISTS `sys_module`;
CREATE TABLE `sys_module`  (
  `module_id` int(11) UNSIGNED NOT NULL,
  `module` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `module_const` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `application_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `parent_module_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`module_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_module
-- ----------------------------
INSERT INTO `sys_module` VALUES (50, 'Manage User Permissions', 'USR_MANAGER', 1, 0);
INSERT INTO `sys_module` VALUES (51, 'User List Viwe', 'SYS_USER_LIST_VIWE', 1, 50);
INSERT INTO `sys_module` VALUES (52, 'Add New User', 'SYS_USER_ADD_NEW_PAGE', 1, 50);
INSERT INTO `sys_module` VALUES (53, 'Edit User', 'SYS_USER_EDIT', 1, 50);
INSERT INTO `sys_module` VALUES (54, 'User Group', 'SYS_USER_GROUP', 1, 50);
INSERT INTO `sys_module` VALUES (55, 'User Group Set Permission', 'SYS_USER_GROUP_SET_PERMISSION', 1, 50);
INSERT INTO `sys_module` VALUES (56, 'User Group Set Permission Save', 'SYS_USER_GROUP_SET_PERMISSION_SAVE', 1, 50);
INSERT INTO `sys_module` VALUES (57, 'Add New User Group', 'SYS_USER_GROUP_ADD', 1, 50);
INSERT INTO `sys_module` VALUES (100, 'Manage Loan Permissions', 'SYS_LOANS', 1, 0);
INSERT INTO `sys_module` VALUES (101, 'Edit Loans', 'SYS_EDIT_LOANS', 1, 100);

-- ----------------------------
-- Table structure for sys_user
-- ----------------------------
DROP TABLE IF EXISTS `sys_user`;
CREATE TABLE `sys_user`  (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `email` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_id` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_user
-- ----------------------------
INSERT INTO `sys_user` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'buddhimal@gmail.com', 1, 'Buddhimal');
INSERT INTO `sys_user` VALUES (2, 'Buddhimal', '21232f297a57a5a743894a0e4a801fc3', 1, 'buddhimal@afisol.com', 1, 'Buddhimal Gunasekara');
INSERT INTO `sys_user` VALUES (3, 'bnawg', '4ec5a513ef5b9d937ea7416309a33d0d', 1, 'bnawgunasekara@gmail.com', 1, 'Buddhimal Gunasekara');

-- ----------------------------
-- Table structure for sys_user_group
-- ----------------------------
DROP TABLE IF EXISTS `sys_user_group`;
CREATE TABLE `sys_user_group`  (
  `user_group_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_group` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sys_user_group_id` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `company_id` int(4) UNSIGNED NOT NULL DEFAULT 0,
  `const` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_group_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_user_group
-- ----------------------------
INSERT INTO `sys_user_group` VALUES (1, 'ROOT', 1, 1, NULL);
INSERT INTO `sys_user_group` VALUES (2, 'OFFICER', 2, 1, NULL);
INSERT INTO `sys_user_group` VALUES (3, 'abc', 3, 0, NULL);

-- ----------------------------
-- Table structure for sys_user_group_module
-- ----------------------------
DROP TABLE IF EXISTS `sys_user_group_module`;
CREATE TABLE `sys_user_group_module`  (
  `module_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`module_id`, `user_group_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_user_group_module
-- ----------------------------
INSERT INTO `sys_user_group_module` VALUES (6, 1);
INSERT INTO `sys_user_group_module` VALUES (6, 2);
INSERT INTO `sys_user_group_module` VALUES (6, 3);
INSERT INTO `sys_user_group_module` VALUES (51, 1);
INSERT INTO `sys_user_group_module` VALUES (52, 1);
INSERT INTO `sys_user_group_module` VALUES (53, 1);
INSERT INTO `sys_user_group_module` VALUES (54, 1);
INSERT INTO `sys_user_group_module` VALUES (55, 1);
INSERT INTO `sys_user_group_module` VALUES (56, 1);
INSERT INTO `sys_user_group_module` VALUES (57, 1);
INSERT INTO `sys_user_group_module` VALUES (101, 1);

-- ----------------------------
-- Table structure for sys_user_login_history
-- ----------------------------
DROP TABLE IF EXISTS `sys_user_login_history`;
CREATE TABLE `sys_user_login_history`  (
  `user_id` int(11) UNSIGNED NULL DEFAULT NULL,
  `ip` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `timestamp` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_user_login_history
-- ----------------------------
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '09/26/2019 11:25:38 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '10/03/2019 11:29:20 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '10/03/2019 11:29:26 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '10/12/2019 10:51:49 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '10/12/2019 10:57:51 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '10/12/2019 10:58:03 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '10/12/2019 10:58:21 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '10/13/2019 12:19:23 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '10/13/2019 12:19:27 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '10/13/2019 12:19:39 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '10/13/2019 12:20:47 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '10/13/2019 12:21:12 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '10/13/2019 12:21:23 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '10/13/2019 12:58:54 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '10/13/2019 12:59:13 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '10/13/2019 12:59:25 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '10/13/2019 12:59:25 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '10/13/2019 12:59:26 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '10/13/2019 2:43:06 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '11/15/2019 12:37:11 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '12/02/2019 11:23:15 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '12/09/2019 10:01:47 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '12/15/2019 10:56:07 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '12/16/2019 11:08:36 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '12/22/2019 9:16:56 AM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '12/22/2019 10:03:19 AM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '12/23/2019 9:55:33 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '12/24/2019 9:12:28 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '12/25/2019 8:15:05 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '12/25/2019 8:16:44 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '12/25/2019 8:20:31 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '12/25/2019 8:22:22 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '12/28/2019 8:39:38 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '12/28/2019 9:24:25 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '12/29/2019 12:16:00 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '12/29/2019 12:19:08 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '12/29/2019 12:19:09 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '12/29/2019 8:05:11 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/04/2020 9:51:55 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/05/2020 9:23:53 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/05/2020 11:33:19 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/05/2020 11:33:31 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/05/2020 11:34:12 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/06/2020 10:54:54 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/06/2020 11:04:45 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/09/2020 10:57:43 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/10/2020 1:07:31 AM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/10/2020 1:09:44 AM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/10/2020 2:41:27 AM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/10/2020 3:10:01 AM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/10/2020 3:11:41 AM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/10/2020 3:37:49 AM');
INSERT INTO `sys_user_login_history` VALUES (3, '::1', '01/10/2020 9:48:57 PM');
INSERT INTO `sys_user_login_history` VALUES (3, '::1', '01/10/2020 9:49:07 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/10/2020 9:50:08 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/10/2020 9:50:08 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/10/2020 9:50:08 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/10/2020 9:50:15 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/10/2020 9:50:56 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/10/2020 9:51:14 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/11/2020 2:15:03 AM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/11/2020 2:26:20 AM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/11/2020 2:26:28 AM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/11/2020 10:10:57 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/11/2020 10:21:47 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/11/2020 10:22:14 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/11/2020 10:22:19 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/11/2020 10:22:23 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/11/2020 10:22:34 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/11/2020 10:22:34 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/11/2020 10:22:34 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/11/2020 10:23:09 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/11/2020 10:23:09 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/11/2020 10:24:39 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/11/2020 10:26:11 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/11/2020 10:26:43 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/11/2020 10:29:17 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/11/2020 10:29:37 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/11/2020 10:29:51 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/11/2020 10:31:58 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/11/2020 10:32:34 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/11/2020 10:33:00 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/11/2020 10:34:39 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/11/2020 10:36:41 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/12/2020 12:46:00 AM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '01/12/2020 11:18:21 PM');
INSERT INTO `sys_user_login_history` VALUES (1, '::1', '02/02/2020 11:21:00 PM');

-- ----------------------------
-- View structure for vw_user_count_group
-- ----------------------------
DROP VIEW IF EXISTS `vw_user_count_group`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_user_count_group` AS select `sys_user_group`.`user_group_id` AS `user_group_id`,`sys_user_group`.`user_group` AS `user_group`,count(`sys_user`.`user_id`) AS `user_count` from (`sys_user_group` left join `sys_user` on((`sys_user`.`user_group_id` = `sys_user_group`.`user_group_id`))) group by `sys_user_group`.`user_group_id` order by `sys_user_group`.`user_group`;

-- ----------------------------
-- View structure for vw_user_group_module
-- ----------------------------
DROP VIEW IF EXISTS `vw_user_group_module`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_user_group_module` AS select `sys_module`.`module_id` AS `module_id`,`sys_module`.`module` AS `module`,`sys_user_group`.`user_group_id` AS `user_group_id`,`sys_user_group`.`user_group` AS `user_group`,`sys_module`.`parent_module_id` AS `parent_module_id` from ((`sys_user_group` join `sys_user_group_module` on((`sys_user_group_module`.`user_group_id` = `sys_user_group`.`user_group_id`))) join `sys_module` on((`sys_module`.`module_id` = `sys_user_group_module`.`module_id`)));

SET FOREIGN_KEY_CHECKS = 1;
