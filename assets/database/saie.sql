/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : saie

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-06-16 14:28:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for alimentos
-- ----------------------------
DROP TABLE IF EXISTS `alimentos`;
CREATE TABLE `alimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Alimento` varchar(40) NOT NULL,
  `Cantidad` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of alimentos
-- ----------------------------
INSERT INTO `alimentos` VALUES ('1', 'Harina', '9');
INSERT INTO `alimentos` VALUES ('2', 'Azucar', '3');
INSERT INTO `alimentos` VALUES ('3', 'Arroz', '10');
INSERT INTO `alimentos` VALUES ('4', 'Pasta', '1');
INSERT INTO `alimentos` VALUES ('5', 'Cafe', '2');
INSERT INTO `alimentos` VALUES ('6', 'Margarina', '1');
INSERT INTO `alimentos` VALUES ('7', 'Caraotas', '10');
INSERT INTO `alimentos` VALUES ('8', 'Pan', '6');
INSERT INTO `alimentos` VALUES ('9', 'Uvas', '9');

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `clasificacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES ('1', 'Dinero');
INSERT INTO `categorias` VALUES ('2', 'Materiales');
INSERT INTO `categorias` VALUES ('3', 'Alimento');

-- ----------------------------
-- Table structure for dinero
-- ----------------------------
DROP TABLE IF EXISTS `dinero`;
CREATE TABLE `dinero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_donadores` int(11) NOT NULL,
  `id_estipendio` int(11) NOT NULL,
  `cantidad` varchar(40) CHARACTER SET latin1 NOT NULL,
  `mensaje` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of dinero
-- ----------------------------
INSERT INTO `dinero` VALUES ('1', '23463249', '1', '1', 'ew', '0000-00-00');
INSERT INTO `dinero` VALUES ('2', '87654321', '7', '346466', 'fefa', '0000-00-00');

-- ----------------------------
-- Table structure for donadores
-- ----------------------------
DROP TABLE IF EXISTS `donadores`;
CREATE TABLE `donadores` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Apellido` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of donadores
-- ----------------------------
INSERT INTO `donadores` VALUES ('14123456', 'Nuevo', 'Ramon');
INSERT INTO `donadores` VALUES ('14525552', 'ol', 'ol');
INSERT INTO `donadores` VALUES ('23463244', 'Alexander', 'Mendez');
INSERT INTO `donadores` VALUES ('23463249', 'Adrian', 'Mendez');
INSERT INTO `donadores` VALUES ('87654321', 'Fulano', 'Perencejo');

-- ----------------------------
-- Table structure for egresos
-- ----------------------------
DROP TABLE IF EXISTS `egresos`;
CREATE TABLE `egresos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `cantidad_dinero` int(11) NOT NULL,
  `cantidad_alimento` int(11) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of egresos
-- ----------------------------

-- ----------------------------
-- Table structure for estipendio
-- ----------------------------
DROP TABLE IF EXISTS `estipendio`;
CREATE TABLE `estipendio` (
  `id` int(11) NOT NULL,
  `Tipo` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of estipendio
-- ----------------------------
INSERT INTO `estipendio` VALUES ('1', 'Matrimonio');
INSERT INTO `estipendio` VALUES ('2', 'Misa Comunitaria');
INSERT INTO `estipendio` VALUES ('3', 'Misa Institucional');
INSERT INTO `estipendio` VALUES ('4', 'Misa Unintencional');
INSERT INTO `estipendio` VALUES ('5', 'Bautizo');
INSERT INTO `estipendio` VALUES ('6', 'Confirmacion');
INSERT INTO `estipendio` VALUES ('7', 'Elab. de Exp. Matrimonial');
INSERT INTO `estipendio` VALUES ('8', 'Exequia');
INSERT INTO `estipendio` VALUES ('9', 'Fe de Bautismo');
INSERT INTO `estipendio` VALUES ('10', 'Alquiler');
INSERT INTO `estipendio` VALUES ('11', 'Donacion');

-- ----------------------------
-- Table structure for ingrersos
-- ----------------------------
DROP TABLE IF EXISTS `ingrersos`;
CREATE TABLE `ingrersos` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `id_donadores` int(2) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_dinero` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `id_estipendio` int(11) NOT NULL,
  `id_material` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `id_alimento` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad_alimento` int(11) NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of ingrersos
-- ----------------------------
INSERT INTO `ingrersos` VALUES ('1', '23463249', '1', '1', '1', '', '', '0', 'ew', '2016-06-14');
INSERT INTO `ingrersos` VALUES ('2', '87654321', '1', '2', '7', '', '', '0', 'fefa', '2016-06-14');

-- ----------------------------
-- Table structure for ingresos
-- ----------------------------
DROP TABLE IF EXISTS `ingresos`;
CREATE TABLE `ingresos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `donador_id` int(11) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `type` enum('alimentos','materiales','dinero') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ingresos
-- ----------------------------
INSERT INTO `ingresos` VALUES ('1', '21382657', 'desc', '2016-06-16 13:37:25', 'alimentos');
INSERT INTO `ingresos` VALUES ('2', '21382657', 'desc', '2016-06-16 13:37:43', 'alimentos');

-- ----------------------------
-- Table structure for ingresos_alimentos
-- ----------------------------
DROP TABLE IF EXISTS `ingresos_alimentos`;
CREATE TABLE `ingresos_alimentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ingreso_id` int(10) unsigned DEFAULT NULL,
  `alimento_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ingresos_alimentos
-- ----------------------------
INSERT INTO `ingresos_alimentos` VALUES ('1', '1', '1', '2', '2016-06-16 13:37:25');
INSERT INTO `ingresos_alimentos` VALUES ('2', '1', '3', '2', '2016-06-16 13:37:25');
INSERT INTO `ingresos_alimentos` VALUES ('3', '2', '1', '2', '2016-06-16 13:37:43');
INSERT INTO `ingresos_alimentos` VALUES ('4', '2', '3', '2', '2016-06-16 13:37:44');

-- ----------------------------
-- Table structure for mteriales
-- ----------------------------
DROP TABLE IF EXISTS `mteriales`;
CREATE TABLE `mteriales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_donadores` int(11) NOT NULL,
  `material` varchar(40) NOT NULL,
  `cantidad` int(40) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mteriales
-- ----------------------------
INSERT INTO `mteriales` VALUES ('2', '23463244', 'cepillo', '343', 'dfdfa', '2016-06-02');
INSERT INTO `mteriales` VALUES ('3', '23463244', 'machete', '2', 'asf', '2016-06-11');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Administrador del Sistema');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` int(8) NOT NULL,
  `appellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `id_rol` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla de usuarios';

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', '23463244', 'Mendez Bermudez', 'Alexander Jose', 'Administrador', 'prueba', '1234', '1');
INSERT INTO `usuarios` VALUES ('2', '20726618', 'Cardenas Ramires', 'Angel Arturo', 'operador', 'usuario1', '1234', '0');
INSERT INTO `usuarios` VALUES ('3', '23463244', 'Mendez Bermudez', 'Alexander Jose', 'Administrador', 'Admin', '1234', '1');
