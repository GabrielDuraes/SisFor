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

 Date: 22/01/2019 17:31:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for foruns
-- ----------------------------
DROP TABLE IF EXISTS `foruns`;
CREATE TABLE `foruns`  (
  `id_forum` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_forum` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `descricao` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `fk_usuário` int(11) NOT NULL,
  PRIMARY KEY (`id_forum`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of foruns
-- ----------------------------
INSERT INTO `foruns` VALUES (1, 'Teste', 'Teste', 1);

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
