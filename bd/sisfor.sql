/*
 Navicat Premium Data Transfer

 Source Server         : LocalHost
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : localhost:3306
 Source Schema         : sisfor

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 23/01/2019 17:33:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for comentarios
-- ----------------------------
DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios`  (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `fk_forum` int(11) NOT NULL,
  `fk_usuario` int(11) NOT NULL,
  `comentario` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime(0) NOT NULL,
  PRIMARY KEY (`id_comentario`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of comentarios
-- ----------------------------
INSERT INTO `comentarios` VALUES (1, 11, 1, 'dflçasjfçasl', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for foruns
-- ----------------------------
DROP TABLE IF EXISTS `foruns`;
CREATE TABLE `foruns`  (
  `id_forum` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_forum` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `descricao` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `fk_usuario` int(11) NOT NULL,
  `created_at` datetime(0) NOT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_forum`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of foruns
-- ----------------------------
INSERT INTO `foruns` VALUES (11, '123', '123', 1, '2019-01-23 17:09:46', NULL);
INSERT INTO `foruns` VALUES (12, '123', '12', 1, '2019-01-23 17:13:00', NULL);
INSERT INTO `foruns` VALUES (13, '123', '132', 1, '2019-01-23 17:13:04', NULL);

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario`  (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `genero` int(11) NOT NULL,
  `data_nasc` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `matricula` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `curso` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `periodo` int(20) NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_usuario`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES (1, 'Gabriel Durães', 0, '0000-00-00', '20141016034', 'gduraes10@gmail.com', 'Sistemas de Informação', 10, '$2y$10$/PWnyAO52WMFM1LWLkyUTOjzmLgHg/qB2IWOlcq2Sj.knKnlXHQhG', '2019-01-22 00:00:00', NULL);

SET FOREIGN_KEY_CHECKS = 1;
