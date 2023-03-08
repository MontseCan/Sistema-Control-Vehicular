/*
 Navicat Premium Data Transfer

 Source Server         : test
 Source Server Type    : MariaDB
 Source Server Version : 100421
 Source Host           : localhost:3306
 Source Schema         : siscv

 Target Server Type    : MariaDB
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 21/02/2023 01:26:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment`  (
  `item_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`item_name`, `user_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_assignment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('admEmp', 5, 1676486651);
INSERT INTO `auth_assignment` VALUES ('administradores', 2, 1675318670);
INSERT INTO `auth_assignment` VALUES ('controlarias', 4, 1675318219);
INSERT INTO `auth_assignment` VALUES ('encargados', 3, 1673583707);
INSERT INTO `auth_assignment` VALUES ('encargados', 9, 1676013997);

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item`  (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `rule_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `data` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  `group_code` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE,
  INDEX `rule_name`(`rule_name`) USING BTREE,
  INDEX `idx-auth_item-type`(`type`) USING BTREE,
  INDEX `fk_auth_item_group_code`(`group_code`) USING BTREE,
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_auth_item_group_code` FOREIGN KEY (`group_code`) REFERENCES `auth_item_group` (`code`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('//*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('//controller', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('//crud', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('//extension', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('//form', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('//index', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('//model', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('//module', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/asset/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/asset/compress', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/asset/template', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/cache/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/cache/flush', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/cache/flush-all', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/cache/flush-schema', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/cache/index', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/debug/*', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/debug/default/*', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/debug/default/db-explain', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/debug/default/download-mail', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/debug/default/index', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/debug/default/toolbar', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/debug/default/view', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/debug/user/*', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/debug/user/reset-identity', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/debug/user/set-identity', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/detalle/*', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/detalle/create', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/detalle/delete', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/detalle/index', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/detalle/pdf', 3, NULL, NULL, NULL, 1675317879, 1675317879, NULL);
INSERT INTO `auth_item` VALUES ('/detalle/update', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/detalle/view', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/empresa/*', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/empresa/create', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/empresa/delete', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/empresa/index', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/empresa/update', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/empresa/upload', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/empresa/view', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/encargado/*', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/encargado/create', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/encargado/delete', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/encargado/index', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/encargado/info-usuario', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/encargado/update', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/encargado/upload', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/encargado/view', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/fixture/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/fixture/load', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/fixture/unload', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/gii/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/gii/default/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/gii/default/action', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/gii/default/diff', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/gii/default/index', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/gii/default/preview', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/gii/default/view', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/gridview/*', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/gridview/export/*', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/gridview/export/download', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/gridview/grid-edited-row/*', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/gridview/grid-edited-row/back', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/hello/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/hello/index', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/help/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/help/index', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/llanta/*', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/llanta/create', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/llanta/delete', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/llanta/index', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/llanta/update', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/llanta/view', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/message/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/message/config', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/message/extract', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/migrate/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/migrate/create', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/migrate/down', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/migrate/history', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/migrate/mark', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/migrate/new', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/migrate/redo', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/migrate/to', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/migrate/up', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/registro/*', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/registro/create', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/registro/delete', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/registro/index', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/registro/pdf', 3, NULL, NULL, NULL, 1675317879, 1675317879, NULL);
INSERT INTO `auth_item` VALUES ('/registro/update', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/registro/view', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/servicio/*', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/servicio/create', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/servicio/delete', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/servicio/index', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/servicio/pdf', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/servicio/update', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/servicio/upload', 3, NULL, NULL, NULL, 1675812943, 1675812943, NULL);
INSERT INTO `auth_item` VALUES ('/servicio/view', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/site/*', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/site/about', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/site/captcha', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/site/contact', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/site/error', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/site/index', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/site/login', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/site/logout', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/tipo/*', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/tipo/create', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/tipo/delete', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/tipo/index', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/tipo/update', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/tipo/view', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/unidad/*', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/unidad/create', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/unidad/delete', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/unidad/detail-view-demo', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/unidad/index', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/unidad/pdf', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/unidad/update', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/unidad/view', 3, NULL, NULL, NULL, 1673229775, 1673229775, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth-item-group/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth-item-group/bulk-activate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth-item-group/bulk-deactivate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth-item-group/bulk-delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth-item-group/create', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth-item-group/delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth-item-group/grid-page-size', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth-item-group/grid-sort', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth-item-group/index', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth-item-group/toggle-attribute', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth-item-group/update', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth-item-group/view', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth/captcha', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth/change-own-password', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth/confirm-email', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth/confirm-email-receive', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth/confirm-registration-email', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth/login', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth/logout', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth/password-recovery', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth/password-recovery-receive', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/auth/registration', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/bulk-activate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/bulk-deactivate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/bulk-delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/create', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/grid-page-size', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/grid-sort', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/index', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/refresh-routes', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/set-child-permissions', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/set-child-routes', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/toggle-attribute', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/update', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/permission/view', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/bulk-activate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/bulk-deactivate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/bulk-delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/create', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/grid-page-size', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/grid-sort', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/index', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/set-child-permissions', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/set-child-roles', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/toggle-attribute', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/update', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/role/view', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-permission/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-permission/set', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-permission/set-roles', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-visit-log/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-visit-log/bulk-activate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-visit-log/bulk-deactivate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-visit-log/bulk-delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-visit-log/create', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-visit-log/delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-visit-log/grid-page-size', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-visit-log/grid-sort', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-visit-log/index', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-visit-log/toggle-attribute', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-visit-log/update', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user-visit-log/view', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user/bulk-activate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user/bulk-deactivate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user/bulk-delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user/change-password', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user/create', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user/delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user/grid-page-size', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user/grid-sort', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user/index', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user/toggle-attribute', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user/update', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('/user-management/user/view', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL);
INSERT INTO `auth_item` VALUES ('admEmp', 1, 'administrador de empresas', NULL, NULL, 1676486498, 1676486498, NULL);
INSERT INTO `auth_item` VALUES ('admEmpresa', 2, 'Administrador de empresa', NULL, NULL, 1676486548, 1676486548, NULL);
INSERT INTO `auth_item` VALUES ('administrador', 2, 'Administrador', NULL, NULL, 1675317863, 1675317863, NULL);
INSERT INTO `auth_item` VALUES ('administradores', 1, 'Administrador', NULL, NULL, 1675317811, 1675317811, NULL);
INSERT INTO `auth_item` VALUES ('assignRolesToUsers', 2, 'Assign roles to users', NULL, NULL, 1426062189, 1426062189, 'userManagement');
INSERT INTO `auth_item` VALUES ('bindUserToIp', 2, 'Bind user to IP', NULL, NULL, 1426062189, 1426062189, 'userManagement');
INSERT INTO `auth_item` VALUES ('changeOwnPassword', 2, 'Change own password', NULL, NULL, 1426062189, 1426062189, 'userCommonPermissions');
INSERT INTO `auth_item` VALUES ('changeUserPassword', 2, 'Change user password', NULL, NULL, 1426062189, 1426062189, 'userManagement');
INSERT INTO `auth_item` VALUES ('commonPermission', 2, 'Common permission', NULL, NULL, 1426062188, 1426062188, NULL);
INSERT INTO `auth_item` VALUES ('controlaria', 2, 'Controlaria', NULL, NULL, 1675318057, 1675318717, NULL);
INSERT INTO `auth_item` VALUES ('controlarias', 1, 'Controlaria', NULL, NULL, 1675318177, 1675318749, NULL);
INSERT INTO `auth_item` VALUES ('createUsers', 2, 'Create users', NULL, NULL, 1426062189, 1426062189, 'userManagement');
INSERT INTO `auth_item` VALUES ('deleteUsers', 2, 'Delete users', NULL, NULL, 1426062189, 1426062189, 'userManagement');
INSERT INTO `auth_item` VALUES ('editUserEmail', 2, 'Edit user email', NULL, NULL, 1426062189, 1426062189, 'userManagement');
INSERT INTO `auth_item` VALUES ('editUsers', 2, 'Edit users', NULL, NULL, 1426062189, 1426062189, 'userManagement');
INSERT INTO `auth_item` VALUES ('encargado', 2, 'Encargado', NULL, NULL, 1673583632, 1673583632, NULL);
INSERT INTO `auth_item` VALUES ('encargados', 1, 'Encargado', NULL, NULL, 1673583690, 1673583690, NULL);
INSERT INTO `auth_item` VALUES ('viewRegistrationIp', 2, 'View registration IP', NULL, NULL, 1426062189, 1426062189, 'userManagement');
INSERT INTO `auth_item` VALUES ('viewUserEmail', 2, 'View user email', NULL, NULL, 1426062189, 1426062189, 'userManagement');
INSERT INTO `auth_item` VALUES ('viewUserRoles', 2, 'View user roles', NULL, NULL, 1426062189, 1426062189, 'userManagement');
INSERT INTO `auth_item` VALUES ('viewUsers', 2, 'View users', NULL, NULL, 1426062189, 1426062189, 'userManagement');
INSERT INTO `auth_item` VALUES ('viewVisitLog', 2, 'View visit log', NULL, NULL, 1426062189, 1426062189, 'userManagement');

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child`  (
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`parent`, `child`) USING BTREE,
  INDEX `child`(`child`) USING BTREE,
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('admEmp', 'changeOwnPassword');
INSERT INTO `auth_item_child` VALUES ('admEmpresa', '/empresa/index');
INSERT INTO `auth_item_child` VALUES ('admEmpresa', '/empresa/update');
INSERT INTO `auth_item_child` VALUES ('admEmpresa', '/empresa/upload');
INSERT INTO `auth_item_child` VALUES ('admEmpresa', '/empresa/view');
INSERT INTO `auth_item_child` VALUES ('admEmpresa', '/registro/*');
INSERT INTO `auth_item_child` VALUES ('admEmpresa', '/servicio/*');
INSERT INTO `auth_item_child` VALUES ('admEmpresa', '/servicio/create');
INSERT INTO `auth_item_child` VALUES ('admEmpresa', '/servicio/index');
INSERT INTO `auth_item_child` VALUES ('admEmpresa', '/servicio/pdf');
INSERT INTO `auth_item_child` VALUES ('admEmpresa', '/servicio/update');
INSERT INTO `auth_item_child` VALUES ('admEmpresa', '/servicio/upload');
INSERT INTO `auth_item_child` VALUES ('admEmpresa', '/servicio/view');
INSERT INTO `auth_item_child` VALUES ('admEmpresa', '/site/*');
INSERT INTO `auth_item_child` VALUES ('admEmpresa', '/site/about');
INSERT INTO `auth_item_child` VALUES ('admEmpresa', '/site/captcha');
INSERT INTO `auth_item_child` VALUES ('admEmpresa', '/site/contact');
INSERT INTO `auth_item_child` VALUES ('admEmpresa', '/site/error');
INSERT INTO `auth_item_child` VALUES ('admEmpresa', '/site/index');
INSERT INTO `auth_item_child` VALUES ('admEmpresa', '/site/login');
INSERT INTO `auth_item_child` VALUES ('admEmpresa', '/site/logout');
INSERT INTO `auth_item_child` VALUES ('admEmpresa', '/unidad/create');
INSERT INTO `auth_item_child` VALUES ('admEmpresa', '/unidad/pdf');
INSERT INTO `auth_item_child` VALUES ('admEmpresa', '/unidad/update');
INSERT INTO `auth_item_child` VALUES ('admEmpresa', '/unidad/view');
INSERT INTO `auth_item_child` VALUES ('admEmpresa', 'changeOwnPassword');
INSERT INTO `auth_item_child` VALUES ('administrador', '/detalle/create');
INSERT INTO `auth_item_child` VALUES ('administrador', '/detalle/delete');
INSERT INTO `auth_item_child` VALUES ('administrador', '/detalle/index');
INSERT INTO `auth_item_child` VALUES ('administrador', '/detalle/update');
INSERT INTO `auth_item_child` VALUES ('administrador', '/detalle/view');
INSERT INTO `auth_item_child` VALUES ('administrador', '/empresa/create');
INSERT INTO `auth_item_child` VALUES ('administrador', '/empresa/index');
INSERT INTO `auth_item_child` VALUES ('administrador', '/empresa/update');
INSERT INTO `auth_item_child` VALUES ('administrador', '/empresa/view');
INSERT INTO `auth_item_child` VALUES ('administrador', '/encargado/create');
INSERT INTO `auth_item_child` VALUES ('administrador', '/encargado/index');
INSERT INTO `auth_item_child` VALUES ('administrador', '/encargado/info-usuario');
INSERT INTO `auth_item_child` VALUES ('administrador', '/encargado/update');
INSERT INTO `auth_item_child` VALUES ('administrador', '/encargado/view');
INSERT INTO `auth_item_child` VALUES ('administrador', '/registro/create');
INSERT INTO `auth_item_child` VALUES ('administrador', '/registro/index');
INSERT INTO `auth_item_child` VALUES ('administrador', '/registro/update');
INSERT INTO `auth_item_child` VALUES ('administrador', '/registro/view');
INSERT INTO `auth_item_child` VALUES ('administrador', '/servicio/create');
INSERT INTO `auth_item_child` VALUES ('administrador', '/servicio/index');
INSERT INTO `auth_item_child` VALUES ('administrador', '/servicio/update');
INSERT INTO `auth_item_child` VALUES ('administrador', '/servicio/view');
INSERT INTO `auth_item_child` VALUES ('administrador', '/site/index');
INSERT INTO `auth_item_child` VALUES ('administrador', '/unidad/create');
INSERT INTO `auth_item_child` VALUES ('administrador', '/unidad/index');
INSERT INTO `auth_item_child` VALUES ('administrador', '/unidad/update');
INSERT INTO `auth_item_child` VALUES ('administrador', '/unidad/view');
INSERT INTO `auth_item_child` VALUES ('administrador', 'changeOwnPassword');
INSERT INTO `auth_item_child` VALUES ('administradores', 'administrador');
INSERT INTO `auth_item_child` VALUES ('administradores', 'changeOwnPassword');
INSERT INTO `auth_item_child` VALUES ('assignRolesToUsers', '/user-management/user-permission/set');
INSERT INTO `auth_item_child` VALUES ('assignRolesToUsers', '/user-management/user-permission/set-roles');
INSERT INTO `auth_item_child` VALUES ('assignRolesToUsers', 'viewUserRoles');
INSERT INTO `auth_item_child` VALUES ('assignRolesToUsers', 'viewUsers');
INSERT INTO `auth_item_child` VALUES ('changeOwnPassword', '/user-management/auth/change-own-password');
INSERT INTO `auth_item_child` VALUES ('changeUserPassword', '/user-management/user/change-password');
INSERT INTO `auth_item_child` VALUES ('changeUserPassword', 'viewUsers');
INSERT INTO `auth_item_child` VALUES ('controlaria', '/detalle/index');
INSERT INTO `auth_item_child` VALUES ('controlaria', '/detalle/view');
INSERT INTO `auth_item_child` VALUES ('controlaria', '/empresa/index');
INSERT INTO `auth_item_child` VALUES ('controlaria', '/empresa/view');
INSERT INTO `auth_item_child` VALUES ('controlaria', '/registro/index');
INSERT INTO `auth_item_child` VALUES ('controlaria', '/registro/view');
INSERT INTO `auth_item_child` VALUES ('controlaria', '/servicio/index');
INSERT INTO `auth_item_child` VALUES ('controlaria', '/servicio/view');
INSERT INTO `auth_item_child` VALUES ('controlaria', '/site/index');
INSERT INTO `auth_item_child` VALUES ('controlaria', '/unidad/index');
INSERT INTO `auth_item_child` VALUES ('controlaria', '/unidad/view');
INSERT INTO `auth_item_child` VALUES ('controlaria', 'changeOwnPassword');
INSERT INTO `auth_item_child` VALUES ('controlarias', 'changeOwnPassword');
INSERT INTO `auth_item_child` VALUES ('controlarias', 'controlaria');
INSERT INTO `auth_item_child` VALUES ('createUsers', '/user-management/user/create');
INSERT INTO `auth_item_child` VALUES ('createUsers', 'viewUsers');
INSERT INTO `auth_item_child` VALUES ('deleteUsers', '/user-management/user/bulk-delete');
INSERT INTO `auth_item_child` VALUES ('deleteUsers', '/user-management/user/delete');
INSERT INTO `auth_item_child` VALUES ('deleteUsers', 'viewUsers');
INSERT INTO `auth_item_child` VALUES ('editUserEmail', 'viewUserEmail');
INSERT INTO `auth_item_child` VALUES ('editUsers', '/user-management/user/bulk-activate');
INSERT INTO `auth_item_child` VALUES ('editUsers', '/user-management/user/bulk-deactivate');
INSERT INTO `auth_item_child` VALUES ('editUsers', '/user-management/user/update');
INSERT INTO `auth_item_child` VALUES ('editUsers', 'viewUsers');
INSERT INTO `auth_item_child` VALUES ('encargado', '/detalle/*');
INSERT INTO `auth_item_child` VALUES ('encargado', '/detalle/create');
INSERT INTO `auth_item_child` VALUES ('encargado', '/detalle/delete');
INSERT INTO `auth_item_child` VALUES ('encargado', '/detalle/index');
INSERT INTO `auth_item_child` VALUES ('encargado', '/detalle/update');
INSERT INTO `auth_item_child` VALUES ('encargado', '/detalle/view');
INSERT INTO `auth_item_child` VALUES ('encargado', '/encargado/*');
INSERT INTO `auth_item_child` VALUES ('encargado', '/encargado/create');
INSERT INTO `auth_item_child` VALUES ('encargado', '/encargado/delete');
INSERT INTO `auth_item_child` VALUES ('encargado', '/encargado/index');
INSERT INTO `auth_item_child` VALUES ('encargado', '/encargado/info-usuario');
INSERT INTO `auth_item_child` VALUES ('encargado', '/encargado/update');
INSERT INTO `auth_item_child` VALUES ('encargado', '/encargado/upload');
INSERT INTO `auth_item_child` VALUES ('encargado', '/encargado/view');
INSERT INTO `auth_item_child` VALUES ('encargado', '/gridview/*');
INSERT INTO `auth_item_child` VALUES ('encargado', '/gridview/export/*');
INSERT INTO `auth_item_child` VALUES ('encargado', '/gridview/export/download');
INSERT INTO `auth_item_child` VALUES ('encargado', '/gridview/grid-edited-row/*');
INSERT INTO `auth_item_child` VALUES ('encargado', '/gridview/grid-edited-row/back');
INSERT INTO `auth_item_child` VALUES ('encargado', '/registro/*');
INSERT INTO `auth_item_child` VALUES ('encargado', '/registro/create');
INSERT INTO `auth_item_child` VALUES ('encargado', '/registro/delete');
INSERT INTO `auth_item_child` VALUES ('encargado', '/registro/index');
INSERT INTO `auth_item_child` VALUES ('encargado', '/registro/update');
INSERT INTO `auth_item_child` VALUES ('encargado', '/registro/view');
INSERT INTO `auth_item_child` VALUES ('encargado', '/servicio/create');
INSERT INTO `auth_item_child` VALUES ('encargado', '/servicio/delete');
INSERT INTO `auth_item_child` VALUES ('encargado', '/servicio/index');
INSERT INTO `auth_item_child` VALUES ('encargado', '/servicio/update');
INSERT INTO `auth_item_child` VALUES ('encargado', '/servicio/upload');
INSERT INTO `auth_item_child` VALUES ('encargado', '/servicio/view');
INSERT INTO `auth_item_child` VALUES ('encargado', '/site/index');
INSERT INTO `auth_item_child` VALUES ('encargado', '/unidad/create');
INSERT INTO `auth_item_child` VALUES ('encargado', '/unidad/delete');
INSERT INTO `auth_item_child` VALUES ('encargado', '/unidad/index');
INSERT INTO `auth_item_child` VALUES ('encargado', '/unidad/update');
INSERT INTO `auth_item_child` VALUES ('encargado', '/unidad/view');
INSERT INTO `auth_item_child` VALUES ('encargado', 'changeOwnPassword');
INSERT INTO `auth_item_child` VALUES ('encargados', 'encargado');
INSERT INTO `auth_item_child` VALUES ('viewUsers', '/user-management/user/grid-page-size');
INSERT INTO `auth_item_child` VALUES ('viewUsers', '/user-management/user/index');
INSERT INTO `auth_item_child` VALUES ('viewUsers', '/user-management/user/view');
INSERT INTO `auth_item_child` VALUES ('viewVisitLog', '/user-management/user-visit-log/grid-page-size');
INSERT INTO `auth_item_child` VALUES ('viewVisitLog', '/user-management/user-visit-log/index');
INSERT INTO `auth_item_child` VALUES ('viewVisitLog', '/user-management/user-visit-log/view');

-- ----------------------------
-- Table structure for auth_item_group
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_group`;
CREATE TABLE `auth_item_group`  (
  `code` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`code`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_item_group
-- ----------------------------
INSERT INTO `auth_item_group` VALUES ('userCommonPermissions', 'User common permission', 1426062189, 1426062189);
INSERT INTO `auth_item_group` VALUES ('userManagement', 'User management', 1426062189, 1426062189);

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule`  (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `data` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for detalle
-- ----------------------------
DROP TABLE IF EXISTS `detalle`;
CREATE TABLE `detalle`  (
  `det_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `det_comentario` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Comentarios ',
  `det_asiento` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Asientos',
  `det_cinturon` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Cinturones de seguridad',
  `det_claxon` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Claxon',
  `det_tablero` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Tablero estereo',
  `det_clima` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Sistema de aire acondicionado',
  `det_antena` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Antena',
  `det_encendedor` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Encendedor y cenicero',
  `det_tapete` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Tapetes',
  `det_carroceria` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Carrocería',
  `det_trasera` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Facia trasera',
  `det_delantera` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Facia delantera',
  `det_tapon` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Tapón de combustible',
  `det_parabrisa` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Parabrisas ',
  `det_limparabrisa` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Limpia parabrisas',
  `det_aceite` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Nivel de aceite de motor',
  `det_rines` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Rines',
  `det_retrovisores` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Espejos retrovisores',
  `det_liqfreno` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Nivel de líquido de freno',
  `det_anticongelante` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Nivel de anticongelante',
  `det_hidraulico` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Nivel de líquido hidráulico',
  `det_combustible` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Combustible',
  `det_luces` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Luces Altas, bajas y niebla',
  `det_lucDelantera` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Luces Cuartos delanteros, traseros y laterales',
  `det_lucDireccional` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Luces Direccionales e intermitentes',
  `det_reversa` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Frenos y Reversa',
  `det_lucInterior` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Luces Interiores',
  `det_encendido` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Encendido de motor	\r\n',
  `det_velocidad` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Sistema de avance y velocidades',
  `det_freno` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Sistema de frenos',
  `det_mano` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Freno de mano',
  `det_sensor` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Sensor de reversa',
  `det_fecha` date NOT NULL COMMENT 'Fecha',
  `det_fkunidad` int(11) NOT NULL COMMENT 'Unidad',
  PRIMARY KEY (`det_id`) USING BTREE,
  INDEX `det_fkcomentario`(`det_comentario`(1024)) USING BTREE,
  INDEX `detalle_ibfk_3`(`det_fkunidad`) USING BTREE,
  CONSTRAINT `detalle_ibfk_3` FOREIGN KEY (`det_fkunidad`) REFERENCES `unidad` (`uni_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detalle
-- ----------------------------
INSERT INTO `detalle` VALUES (9, '', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Lleno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', '2023-02-10', 12);
INSERT INTO `detalle` VALUES (10, 'Se le realizó cambio de mofle, estaba caído', 'Bueno', 'Bueno', 'Bueno', 'No aplica', 'No aplica', 'Malo', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Lleno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Malo', 'Malo', 'Bueno', '2023-02-10', 12);

-- ----------------------------
-- Table structure for empresa
-- ----------------------------
DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa`  (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `emp_nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Nombre',
  `emp_correo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Correo electrónico',
  `emp_rfc` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'RFC',
  `emp_logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Logo',
  `emp_fiscal` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Dirección fiscal',
  `emp_comercial` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Dirección comercial',
  PRIMARY KEY (`emp_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of empresa
-- ----------------------------
INSERT INTO `empresa` VALUES (12, 'Equipamiento y Servicios a Pozos', 'admin@eyspozos.com.mx', 'EYZS20230113V', '', 'Periferico Arco Noreste S/N', 'Avenida Río Mezcalapa');
INSERT INTO `empresa` VALUES (16, 'Mayacaste', 'mayacaste@hotmail.com', 'MAYACASTE1234', 'uploads/empresa/1676022337_3135768.png', 'Villahermosa, Tabasco.', 'Villahermosa, Tabasco.');
INSERT INTO `empresa` VALUES (17, 'MCS', 'montsecan47@gmail.com', 'MCS20001015', 'uploads/empresa/1676268463_3135768.png', 'Villahermosa, Tab.', 'Villahermosa, Tab.');

-- ----------------------------
-- Table structure for encargado
-- ----------------------------
DROP TABLE IF EXISTS `encargado`;
CREATE TABLE `encargado`  (
  `enc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `enc_foto` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Foto',
  `enc_nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Nombre',
  `enc_paterno` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Apellido Paterno',
  `enc_materno` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Apellido Materno',
  `enc_telefono` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Teléfono',
  `enc_fkempresa` int(11) NOT NULL COMMENT 'Empresa',
  `enc_fkuser` int(11) NOT NULL COMMENT 'Usuarios',
  PRIMARY KEY (`enc_id`) USING BTREE,
  INDEX `encargado_ibfk_1`(`enc_fkempresa`) USING BTREE,
  INDEX `enc_fkuser`(`enc_fkuser`) USING BTREE,
  CONSTRAINT `encargado_ibfk_1` FOREIGN KEY (`enc_fkempresa`) REFERENCES `empresa` (`emp_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `encargado_ibfk_2` FOREIGN KEY (`enc_fkuser`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of encargado
-- ----------------------------
INSERT INTO `encargado` VALUES (4, '3DMd_PNgzI_elz-upBfAMjG5-zBUQ3UP.png', 'Montserrat', 'Can', 'Salazar', '937-103-6653', 12, 9);

-- ----------------------------
-- Table structure for registro
-- ----------------------------
DROP TABLE IF EXISTS `registro`;
CREATE TABLE `registro`  (
  `reg_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `reg_entradaFecha` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Fecha y hora de Entrada',
  `reg_salidaFecha` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Fecha y hora de Salida',
  `reg_conductor` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Conductor',
  `reg_fkunidad` int(11) NOT NULL COMMENT 'Unidad',
  `reg_fkdetalleE` int(11) NULL DEFAULT NULL COMMENT 'Detalles Entrada',
  `reg_fkdetalleS` int(11) NOT NULL COMMENT 'Detalles Salida',
  PRIMARY KEY (`reg_id`) USING BTREE,
  INDEX `reg_fkunidad`(`reg_fkunidad`) USING BTREE,
  INDEX `reg_fkdetalle`(`reg_fkdetalleE`) USING BTREE,
  INDEX `registro_ibfk_3`(`reg_fkdetalleS`) USING BTREE,
  CONSTRAINT `registro_ibfk_1` FOREIGN KEY (`reg_fkunidad`) REFERENCES `unidad` (`uni_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `registro_ibfk_2` FOREIGN KEY (`reg_fkdetalleE`) REFERENCES `detalle` (`det_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `registro_ibfk_3` FOREIGN KEY (`reg_fkdetalleS`) REFERENCES `detalle` (`det_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of registro
-- ----------------------------
INSERT INTO `registro` VALUES (10, '', '24-Feb-2023 14:50 ', 'Montserrat Can Salazar', 12, 10, 9);
INSERT INTO `registro` VALUES (15, '14-Feb-2023 09:45 ', '15-Feb-2023 13:00 ', 'Jose Armando', 12, 9, 9);
INSERT INTO `registro` VALUES (16, '', '23-Feb-2023 09:45 ', 'Montserrat Can Salazar', 12, 10, 10);
INSERT INTO `registro` VALUES (17, '13-Feb-2023 13:45 ', '15-Feb-2023 09:45 ', 'Juan Carlos Bodoque', 12, 10, 9);

-- ----------------------------
-- Table structure for servicio
-- ----------------------------
DROP TABLE IF EXISTS `servicio`;
CREATE TABLE `servicio`  (
  `ser_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `ser_nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Nombre',
  `ser_fecha` date NOT NULL COMMENT 'Fecha',
  `ser_lugar` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Lugar',
  `ser_precio` decimal(20, 3) NOT NULL COMMENT 'Precio',
  `ser_kilometraje` int(50) NOT NULL COMMENT 'Kilometraje',
  `ser_proximo` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Próximo servicio',
  `ser_tipo` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Tipo de servicio',
  `ser_cotizacion` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Cotización',
  `ser_factura` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Factura',
  `ser_fkunidad` int(11) NOT NULL COMMENT 'Unidad',
  PRIMARY KEY (`ser_id`) USING BTREE,
  INDEX `ser_id`(`ser_id`, `ser_fkunidad`) USING BTREE,
  INDEX `ser_fkunidad`(`ser_fkunidad`) USING BTREE,
  INDEX `ser_fktipo`(`ser_tipo`) USING BTREE,
  CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`ser_fkunidad`) REFERENCES `unidad` (`uni_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of servicio
-- ----------------------------
INSERT INTO `servicio` VALUES (30, 'Cambio de aceite', '2023-02-15', 'Villahermosa, Tabasco', 10000.000, 111, '', 'Mantenimiento', 'uploads/servicio/cotizacion/1676457700_Presentación.pdf', 'uploads/servicio/factura/1676484371_Formato de Acreditación_.pdf', 12);

-- ----------------------------
-- Table structure for unidad
-- ----------------------------
DROP TABLE IF EXISTS `unidad`;
CREATE TABLE `unidad`  (
  `uni_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `uni_foto` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Fotos ',
  `uni_tarjeta` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Tarjeta de circulación',
  `uni_descripcion` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Descripción',
  `uni_modelo` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Modelo',
  `uni_marca` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Marca',
  `uni_serie` varchar(17) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Número de serie del vehículo',
  `uni_motor` varchar(17) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Número de serie del motor',
  `uni_anio` year NOT NULL COMMENT 'Año',
  `uni_color` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Color',
  `uni_placa` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Placas',
  `uni_tenencia` year NOT NULL COMMENT 'Año de tenencia',
  `uni_comentario` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Comentarios adicionales',
  `uni_extintor` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Extintor',
  `uni_cruz` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Cruz para birlos',
  `uni_gato` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Gato',
  `uni_manual` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Manual de usuario',
  `uni_cable` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Cable pasa corriente',
  `uni_rines` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Rines',
  `uni_fkempresa` int(11) NOT NULL COMMENT 'Empresa',
  PRIMARY KEY (`uni_id`) USING BTREE,
  INDEX `unidad_ibfk_1`(`uni_fkempresa`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of unidad
-- ----------------------------
INSERT INTO `unidad` VALUES (12, 'uploads/unidad/foto/1676484218_3135768.png', 'uploads/unidad/tarjeta/1676484243_Normas APA Sexta Edición.pdf', '-Unidad ligera de una cabina \r\n-Dos pasajeros\r\n-Con batea', 'Saveiro Robust', 'Volkswagen', '9VWKV45U9KP021497', 'CFZT81971', 2019, 'white', 'VS6697', 2000, 'Está roto el cristal delantero', 'Bueno', 'Bueno', 'Malo', 'Bueno', 'Malo', 'Bueno', 12);
INSERT INTO `unidad` VALUES (35, 'uploads/unidad/foto/1676703439_1742897.jpg', 'uploads/unidad/tarjeta/1676703449_CASOS DE USO DEL PROYECTO.pdf', 'Camioneta cerrada', 'Sportage', 'Kia', '123456789QE', '123456789', 2015, 'red', 'WE-HD-WE', 2000, '', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 12);
INSERT INTO `unidad` VALUES (36, NULL, NULL, 'Automovil para 5 pasajeros', 'Aveo', 'Nissan', '1122334455JH', '1122334455', 1990, 'yellow', 'IF-FD-SD', 2000, '', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 'Bueno', 12);
INSERT INTO `unidad` VALUES (37, 'uploads/unidad/foto/1676873119_ؘ on Twitter.jpg', 'uploads/unidad/tarjeta/1676873122_CASOS DE USO DEL PROYECTO.pdf', '- 4 pasajeros', 'Aveo', 'Nissan', 'DFCGHJTY4783', 'QWSEDR123T45', 2007, 'red', 'WE-GH-SA', 2004, '', 'Bueno', 'Bueno', 'Bueno', 'No aplica', 'Bueno', 'Bueno', 12);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `confirmation_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `superadmin` smallint(1) NULL DEFAULT 0,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `registration_ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `bind_to_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email_confirmed` smallint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'superadmin', 'kz2px152FAWlkHbkZoCiXgBAd-S8SSjF', '$2y$13$MhlYe12xkGFnSeK0sO2up.Y9kAD9Ct6JS1i9VLP7YAqd1dFsSylz2', NULL, 1, 1, 1426062188, 1426062188, NULL, NULL, NULL, 0);
INSERT INTO `user` VALUES (2, 'Administrador', 'UevH0nmlfY3EbKMwuctc2k2PIILcoW31', '$2y$13$tE3y8hJ2eUEHyuVBstVuV.i3bPLiil8IlmKXPeIlOBPg56E2r5lCC', NULL, 1, 0, 1673574655, 1673574655, '127.0.0.1', '', '', 0);
INSERT INTO `user` VALUES (3, 'Encargado', '9UykPdNqAz6gdEQizpGyppwtKr4J7SEi', '$2y$13$rnzfMUm6IbXZ9UqcgCMSIef1JSXCFdZvvw9WoImpqQ8rCi0rapboe', NULL, 1, 0, 1673574694, 1673574694, '127.0.0.1', '', '', 0);
INSERT INTO `user` VALUES (4, 'Controlaria', 'KK31OO2Yh1Y-lNCAIi-MNaGqwqMR7FPb', '$2y$13$nxUhPUtAHYZaTIcSo3Lsku5NXjiNDqq6zCSTenZbjC6grx9k5i262', NULL, 1, 0, 1673574760, 1675318818, '127.0.0.1', '', '', 0);
INSERT INTO `user` VALUES (5, 'adminequipa', 'iH7lgqFfkvo5PycrcCqGmmqyJOmwTdlW', '$2y$13$iEqEJr/tVsGCu5ovRYHANepz58X8t1swtHQQ50gkB3bOI5uA2cGgS', NULL, 1, 0, 1673635952, 1675194262, '127.0.0.1', '', 'administracion@eyspozos.com.mx', 0);
INSERT INTO `user` VALUES (9, 'MCS', 'BRdY94Q6VMvThQJdX9kikqUQVTkcMIgL', '$2y$13$iK3vZ7PvZU15rGUyrS6fde5Po2JJIeoRKU988Xm8RBtb1rJLfrKIq', NULL, 1, 0, 1676013997, 1676489141, '127.0.0.1', '', 'montsecan47@gmail.com', 0);

-- ----------------------------
-- Table structure for user_visit_log
-- ----------------------------
DROP TABLE IF EXISTS `user_visit_log`;
CREATE TABLE `user_visit_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `language` char(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `visit_time` int(11) NOT NULL,
  `browser` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `os` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `user_visit_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 199 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_visit_log
-- ----------------------------
INSERT INTO `user_visit_log` VALUES (1, '633110648fff1', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 1, 1664159844, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (2, '633112ca5cfc4', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 1, 1664160458, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (3, '633112fe04b24', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 1, 1664160510, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (4, '633121afd6fd4', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 1, 1664164271, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (5, '633662f58da2c', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 1, 1664508661, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (6, '6336fbc992066', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 1, 1664547785, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (7, '6337223f28aa1', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 1, 1664557631, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (8, '633b4a6bb9a6c', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 1, 1664830059, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (9, '633db7b8e0bdc', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 1, 1664989112, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (10, '634ed0dd137cd', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 1, 1666109661, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (11, '635186de11f02', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 1, 1666287326, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (12, '63580f2d7c08c', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 1, 1666715437, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (13, '63598d18bee3c', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 1, 1666813208, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (14, '63598e7411d83', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 1, 1666813556, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (15, '6359989948c74', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 1, 1666816153, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (16, '635acc2ab9be8', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 1, 1666894890, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (17, '635acc397cd03', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 1, 1666894905, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (18, '635f024d21fcb', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 1, 1667170893, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (19, '63695f09769d7', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 1, 1667849993, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (20, '636962cd93489', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 1, 1667850957, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (21, '636964fb36fd6', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 1, 1667851515, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (22, '636a7f79140dc', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 1, 1667923833, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (23, '636ab35bea038', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 1, 1667937115, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (24, '636ac83684149', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 1, 1667942454, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (25, '636b0366acc28', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 1, 1667957606, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (26, '636bc16d22e71', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 1, 1668006253, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (27, '636bd347c2e7a', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 1, 1668010823, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (28, '636d166e62743', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 1, 1668093550, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (29, '636d864e5235b', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 1, 1668122190, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (30, '636d86b1dfb02', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 1, 1668122289, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (31, '637268e911856', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 1, 1668442345, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (32, '637510b6787b2', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 1, 1668616374, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (33, '63ba5ec78ea82', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673158343, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (34, '63bb74fa6dd0e', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673229562, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (35, '63c08aabf2f1d', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673562796, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (36, '63c090693edbb', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673564265, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (37, '63c091dd87789', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673564637, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (38, '63c0957658ee2', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673565558, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (39, '63c0bcf5ce166', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 4, 1673575669, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (40, '63c0bd14506af', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 2, 1673575700, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (41, '63c0bd245e536', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673575716, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (42, '63c0bd63be13c', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 2, 1673575779, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (43, '63c0bdae819b5', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673575854, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (44, '63c0c7dc73f25', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 3, 1673578460, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (45, '63c0c7e93f46c', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673578473, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (46, '63c0c87bce0c0', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 2, 1673578619, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (47, '63c0c9b76d8fa', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673578935, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (48, '63c0ca32b2175', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 4, 1673579058, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (49, '63c0ca3da1174', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673579069, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (50, '63c0ca5225ef7', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 3, 1673579090, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (51, '63c0ca5ba6950', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673579099, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (52, '63c0cacb23cc9', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673579211, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (53, '63c0cad63cd55', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 3, 1673579222, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (54, '63c0cae2f15e0', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673579234, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (55, '63c0caf66fcc5', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 3, 1673579254, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (56, '63c0caff9c452', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673579263, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (57, '63c0cb19ce489', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 3, 1673579289, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (58, '63c0cb2407f97', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 4, 1673579300, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (59, '63c0cb311237f', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 2, 1673579313, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (60, '63c0cb4c548de', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673579340, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (61, '63c0cbb78cebe', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 4, 1673579447, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (62, '63c0cbc5d2692', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673579461, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (63, '63c0cc4601efa', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 2, 1673579590, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (64, '63c0cee7a08e1', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673580263, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (65, '63c0d90cdcbc4', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 4, 1673582860, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (66, '63c0d919c8f28', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673582873, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (67, '63c0d98561c1f', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 4, 1673582981, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (68, '63c0d9998e6d6', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 3, 1673583001, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (69, '63c0d9b2e8feb', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 2, 1673583026, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (70, '63c0d9c6f17b5', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 2, 1673583046, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (71, '63c0d9d31dc2d', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673583059, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (72, '63c0da24c5ebf', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 3, 1673583140, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (73, '63c0da400d8a5', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 2, 1673583168, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (74, '63c0da4cbde7e', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673583180, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (75, '63c0dab3ee902', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673583283, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (76, '63c0dad2ee69c', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 3, 1673583314, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (77, '63c0dae6bfd44', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673583334, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (78, '63c0db0d1f4ce', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 3, 1673583373, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (79, '63c0db1992a98', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673583385, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (80, '63c0dba02ca07', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 3, 1673583520, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (81, '63c0dbee0dfee', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673583598, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (82, '63c0dc67091c5', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 3, 1673583719, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (83, '63c0dcc21f492', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673583810, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (84, '63c0dcdb7be54', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 3, 1673583835, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (85, '63c0dd0c46d36', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673583884, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (86, '63c0dd616c576', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 3, 1673583969, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (87, '63c0dd6bcd768', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673583979, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (88, '63c0e2fa8658e', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 3, 1673585402, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (89, '63c0e30cb4785', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673585420, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (90, '63c0e44986945', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 2, 1673585737, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (91, '63c0e44fa2646', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673585743, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (92, '63c0e477b2bed', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 2, 1673585783, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (93, '63c0e48230f70', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1673585794, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (94, '63c0fd64c6e00', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 3, 1673592164, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (95, '63c177f4a6611', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1673623540, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (96, '63c1a0827f0d2', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1673633922, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (97, '63c1a8a643dc1', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 3, 1673636006, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (98, '63c1aa046bef6', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 4, 1673636356, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (99, '63c1aa1b000ae', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1673636379, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (100, '63c6f72d50b75', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1673983789, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (101, '63cf49a36be49', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1674529187, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (102, '63d0dc76940c5', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1674632310, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (103, '63d21c8027f13', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1674714240, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (104, '63d414ec8664a', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1674843372, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (105, '63d414fa7aa4a', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1674843386, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (106, '63d5b6959b503', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1674950293, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (107, '63d977ead9a5a', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 3, 1675196394, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (108, '63d97805906ae', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1675196421, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (109, '63d9e6eaaf745', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1675224810, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (110, '63db3e2c876eb', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1675312684, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (111, '63db423c2efd8', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1675313724, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (112, '63db43186e625', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 3, 1675313944, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (113, '63db46e4b8080', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1675314916, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (114, '63db4708d3c2d', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 3, 1675314952, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (115, '63db4c5226cd0', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 3, 1675316306, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (116, '63db4c6a2d50b', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1675316330, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (117, '63db4c96c597d', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 3, 1675316374, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (118, '63db4caa273d2', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 2, 1675316394, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (119, '63db4cbcb1d8a', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1675316412, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (120, '63db4d3dad69c', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 2, 1675316541, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (121, '63db4d6084fbf', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1675316576, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (122, '63db4d71bdd8c', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 3, 1675316593, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (123, '63db4e2738aa6', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1675316775, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (124, '63db4e5499e9a', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 3, 1675316820, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (125, '63db4e9fdc4c9', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 3, 1675316895, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (126, '63db4eb126d39', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1675316913, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (127, '63db4fdca048e', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 3, 1675317212, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (128, '63db4ff10a6a7', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1675317233, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (129, '63db50737660a', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 3, 1675317363, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (130, '63db509c7730a', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 2, 1675317404, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (131, '63db50c1a9549', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1675317441, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (132, '63db515bd1357', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 2, 1675317595, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (133, '63db5188547e1', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1675317640, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (134, '63db53eda7983', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 4, 1675318253, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (135, '63db54819ab73', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1675318401, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (136, '63db54e0b0892', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 4, 1675318496, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (137, '63db55180fcda', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1675318552, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (138, '63db554cd45ca', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 2, 1675318604, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (139, '63db5564adc38', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1675318628, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (140, '63db55969560e', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 2, 1675318678, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (141, '63db55ab9d2b6', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1675318699, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (142, '63db563bf17e5', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 4, 1675318843, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (143, '63db589a0b96e', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 2, 1675319450, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (144, '63db58d876dd3', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 3, 1675319512, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (145, '63db5c8911377', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 2, 1675320457, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (146, '63db5d35ecf08', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1675320629, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (147, '63dc2a3bd9b3f', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1675373115, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (148, '63dc3e43845eb', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 3, 1675378243, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (149, '63dc553757604', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 3, 1675384119, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (150, '63dc554705965', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1675384135, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (151, '63e1f4632c96b', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1675752547, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (152, '63e1f4830f97a', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1675752579, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (153, '63e1f4dd17cb2', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', NULL, 1675752669, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (154, '63e1f4efded6b', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1675752687, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (155, '63e1f50b08f93', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', NULL, 1675752715, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (156, '63e1f53958dd1', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1675752761, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (157, '63e5fd74391a0', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 9, 1676017012, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (158, '63e5fd8924f0a', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1676017033, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (159, '63e5fe00e7c6b', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 9, 1676017152, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (160, '63e5fee32825e', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 2, 1676017379, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (161, '63e5fef34cd75', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, 1676017395, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (162, '63e63bf5afa4c', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1676033013, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (163, '63e643b7403bc', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 3, 1676034999, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (164, '63e64a4f66777', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1676036687, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (165, '63e68c897294c', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1676053641, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (166, '63e68d39870a1', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 3, 1676053817, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (167, '63e68d4c8ccdf', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 3, 1676053836, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (168, '63e690536b1bf', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1676054611, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (169, '63e6905453952', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1676054612, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (170, '63e6907554003', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 3, 1676054645, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (171, '63e6a44956738', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 2, 1676059721, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (172, '63e6a4ca39368', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1676059850, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (173, '63e9d1e262991', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1676268002, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (174, '63ec909e27b34', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 9, 1676447902, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (175, '63ec90bb4cf26', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1676447931, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (176, '63ec91248f782', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 2, 1676448036, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (177, '63ec955d1cd93', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 2, 1676449117, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (178, '63ec956913da2', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1676449129, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (179, '63ec96af6220f', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 3, 1676449455, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (180, '63eca7e4716a2', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1676453860, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (181, '63eca81cc69bb', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 3, 1676453916, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (182, '63eca853ccbd7', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 2, 1676453971, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (183, '63eca8607c787', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 3, 1676453984, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (184, '63ecbf5c06e77', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1676459868, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (185, '63ed1e1e3e694', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1676484126, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (186, '63ed1ed2a3368', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1676484306, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (187, '63ed273e590a2', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 5, 1676486462, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (188, '63ed289526636', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 9, 1676486805, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (189, '63ed3200019b5', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 9, 1676489216, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (190, '63ed3228684fe', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 9, 1676489256, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (191, '63ed324966725', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1676489289, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (192, '63ed324a57521', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1676489290, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (193, '63eedf20dd7e4', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1676599072, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (194, '63ef22931846a', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1676616339, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (195, '63efa4b39f069', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1676649651, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (196, '63f0760316db0', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1676703235, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (197, '63f082f9b6644', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1676706553, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` VALUES (198, '63f303e14fd2e', '127.0.0.1', 'es', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 3, 1676870625, 'Chrome', 'Windows');

SET FOREIGN_KEY_CHECKS = 1;
