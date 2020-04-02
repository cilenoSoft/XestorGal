
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Estructura -> comentarios_tarefa
-- ----------------------------
DROP TABLE IF EXISTS `comentarios_tarefa`;
CREATE TABLE `comentarios_tarefa`  (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TAREFA` int(11) NOT NULL,
  `LOGIN_USUARIO` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `COMENTARIO` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `ID_EQUIPO` int(11) NULL DEFAULT NULL,
  `FECHA` datetime(0) NULL DEFAULT NULL,
  `ESTADO` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `FK_ID_TAREFA`(`ID_TAREFA`) USING BTREE,
  INDEX `FK_ID_USUARIO`(`LOGIN_USUARIO`) USING BTREE,
  INDEX `FK_ESTADO_HIST`(`ESTADO`) USING BTREE,
  INDEX `fk_comentarios_tarefa_comentarios_tarefa_3`(`ID_EQUIPO`) USING BTREE,
  CONSTRAINT `fk_comentarios_tarefa_comentarios_tarefa_1` FOREIGN KEY (`ID_TAREFA`) REFERENCES `tarefas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_comentarios_tarefa_comentarios_tarefa_2` FOREIGN KEY (`LOGIN_USUARIO`) REFERENCES `usuarios` (`LOGIN`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_comentarios_tarefa_comentarios_tarefa_3` FOREIGN KEY (`ID_EQUIPO`) REFERENCES `equipos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_comentarios_tarefa_comentarios_tarefa_4` FOREIGN KEY (`ESTADO`) REFERENCES `estados_tarefa` (`ESTADO`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish_ci;

-- ----------------------------
-- Rexistros -> comentarios_tarefa
-- ----------------------------
INSERT INTO `comentarios_tarefa` VALUES (1, 1, 'diego', 'Comentario proba 1.', 2, '2020-03-08 12:44:03', 'EN PROCESO');
INSERT INTO `comentarios_tarefa` VALUES (2, 3, 'diego', 'Comezo desarrollo da tarefa.', 2, '2020-03-08 14:23:42', 'EN PROCESO');
INSERT INTO `comentarios_tarefa` VALUES (3, 3, 'diego', 'Deseño da estructura de clases.', 2, '2020-03-09 21:01:00', 'EN PROCESO');
INSERT INTO `comentarios_tarefa` VALUES (4, 1, 'diego', 'Comentario proba 2.', 2, '2020-03-29 08:58:07', 'EN PROCESO');
INSERT INTO `comentarios_tarefa` VALUES (5, 1, 'diego', 'Comentario de proba 3.', 2, '2020-03-29 14:00:37', 'PENDENTE');
INSERT INTO `comentarios_tarefa` VALUES (6, 7, 'diego', 'Tarefa finalizada.', 2, '2020-04-01 18:20:37', 'FINALIZADA');

-- ----------------------------
-- Estructura -> equipos
-- ----------------------------
DROP TABLE IF EXISTS `equipos`;
CREATE TABLE `equipos`  (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `USUARIO_XESTOR` int(11) NOT NULL,
  PRIMARY KEY (`ID`, `USUARIO_XESTOR`) USING BTREE,
  INDEX `ID`(`ID`) USING BTREE,
  INDEX `FK_user`(`USUARIO_XESTOR`) USING BTREE,
  CONSTRAINT `fk_equipos_equipos_1` FOREIGN KEY (`USUARIO_XESTOR`) REFERENCES `usuarios` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish_ci;

-- ----------------------------
-- Rexistros -> equipos
-- ----------------------------
INSERT INTO `equipos` VALUES (2, 'XestorGal', 3);
INSERT INTO `equipos` VALUES (3, 'Equipo 2', 3);
INSERT INTO `equipos` VALUES (4, 'Equipo 3', 3);
INSERT INTO `equipos` VALUES (5, 'Equipo Proba', 3);
INSERT INTO `equipos` VALUES (6, 'Equi', 3);

-- ----------------------------
-- Estructura -> estados_tarefa
-- ----------------------------
DROP TABLE IF EXISTS `estados_tarefa`;
CREATE TABLE `estados_tarefa`  (
  `ID` int(3) NOT NULL,
  `ESTADO` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `ESTADO`(`ESTADO`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish_ci;

-- ----------------------------
-- Rexistros -> estados_tarefa
-- ----------------------------
INSERT INTO `estados_tarefa` VALUES (1, 'EN PROCESO');
INSERT INTO `estados_tarefa` VALUES (2, 'FINALIZADA');
INSERT INTO `estados_tarefa` VALUES (3, 'PENDENTE');
INSERT INTO `estados_tarefa` VALUES (4, 'SEN ASIGNAR');

-- ----------------------------
-- Estructura -> imputacion
-- ----------------------------
DROP TABLE IF EXISTS `imputacion`;
CREATE TABLE `imputacion`  (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TITULO_TAREFA` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NULL DEFAULT NULL,
  `ESTADO_TAREFA` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NULL DEFAULT NULL,
  `COMENTARIO_IMP` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NULL DEFAULT NULL,
  `TEMPO_ACTIVIDADE` int(12) NULL DEFAULT NULL,
  `FECHA` datetime(0) NULL DEFAULT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `NOMBRE_EQUIPO` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `fk_usuario`(`ID_USUARIO`) USING BTREE,
  INDEX `fk_equipo`(`NOMBRE_EQUIPO`) USING BTREE,
  CONSTRAINT `fk_usuario` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish_ci;

-- ----------------------------
-- Rexistros -> imputacion
-- ----------------------------
INSERT INTO `imputacion` VALUES (2, 'Tarefa de proba 1', 'EN PROCESO', 'Comezo desarrollo da tarefa.', 2, '2020-03-08 12:44:03', 3, 'XestorGal');
INSERT INTO `imputacion` VALUES (3, 'Tarefa de proba 1', 'EN PROCESO', 'Comezo desarrollo da tarefa.', 2, '2020-03-08 12:44:03', 3, 'XestorGal');
INSERT INTO `imputacion` VALUES (19, 'Tarefa de proba 1', 'EN PROCESO', 'Proba rexistro imputacion', 2, '2020-03-08 00:00:00', 3, 'XestorGal');
INSERT INTO `imputacion` VALUES (20, 'Tarefa Proba 2', 'EN PROCESO', 'Rexitro num 2', 2, '2020-03-08 00:00:00', 3, 'XestorGal');
INSERT INTO `imputacion` VALUES (21, 'Tarefa de proba 1', 'En proceso', 'creamos nova funcionalidade', 1, '2020-03-15 00:00:00', 3, 'XestorGal');

-- ----------------------------
-- Estructura -> rol
-- ----------------------------
DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol`  (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ROL` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `ROL`(`ROL`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish_ci;

-- ----------------------------
-- Rexistros -> rol
-- ----------------------------
INSERT INTO `rol` VALUES (1, 'MASTER');
INSERT INTO `rol` VALUES (2, 'USER');

-- ----------------------------
-- Estructura -> tarefas
-- ----------------------------
DROP TABLE IF EXISTS `tarefas`;
CREATE TABLE `tarefas`  (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TITULO` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `DESCRIPCION` varchar(1000) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `COMENTARIO` varchar(1000) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `ESTADO` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `USUARIO_ULTIMO_ESTADO` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `USUARIO_CREADOR` int(3) NOT NULL,
  `FECHA_CREACION` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `FECHA_ULTIMA_MODIFICACION` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `FECHA_FINALIZACION` datetime(0) NULL DEFAULT NULL,
  `FECHA_ENTREGA` datetime(0) NULL DEFAULT NULL,
  `EQUIPO` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `FK_USUARIO_CREADOR`(`USUARIO_CREADOR`) USING BTREE,
  INDEX `FK_USUARIO_ULTIMO_ESTADO`(`USUARIO_ULTIMO_ESTADO`) USING BTREE,
  INDEX `FK_ESTADO`(`ESTADO`) USING BTREE,
  INDEX `fk_tarefas_tarefas_4`(`EQUIPO`) USING BTREE,
  CONSTRAINT `fk_tarefas_tarefas_1` FOREIGN KEY (`USUARIO_ULTIMO_ESTADO`) REFERENCES `usuarios` (`LOGIN`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_tarefas_tarefas_2` FOREIGN KEY (`EQUIPO`) REFERENCES `equipos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_tarefas_tarefas_3` FOREIGN KEY (`USUARIO_CREADOR`) REFERENCES `usuarios` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_tarefas_tarefas_4` FOREIGN KEY (`ESTADO`) REFERENCES `estados_tarefa` (`ESTADO`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish_ci;

-- ----------------------------
-- Rexistros -> tarefas
-- ----------------------------
INSERT INTO `tarefas` VALUES (1, 'Tarefa de proba 1', 'Tarefa de proba.', '', 'SEN ASIGNAR', 'diego', 3, '2020-04-02 08:48:08', '2020-04-02 08:48:08', NULL, NULL, 2);
INSERT INTO `tarefas` VALUES (2, 'Tarefa Proba 2', 'Tarefa Proba 2', '', 'FINALIZADA', 'diego', 3, '2020-03-07 21:05:24', '2020-03-07 21:05:24', '2020-03-07 21:05:24', NULL, 2);
INSERT INTO `tarefas` VALUES (3, 'Tarefa de proba 3', 'Tarefa de proba 3.', '', 'EN PROCESO', 'diego', 3, '2020-03-29 14:09:09', '2020-03-29 14:09:09', NULL, NULL, 2);
INSERT INTO `tarefas` VALUES (4, 'Tarefa de proba 4', 'Descripción da tarefa...', '', 'PENDENTE', 'diego', 3, '2020-03-09 20:08:49', '2020-03-09 20:08:49', NULL, NULL, 2);
INSERT INTO `tarefas` VALUES (5, 'Tarefa de proba 5', 'Descripción de proba 5...', '', 'PENDENTE', 'diego', 3, '2020-03-09 20:27:25', '2020-03-09 20:27:25', NULL, NULL, 2);
INSERT INTO `tarefas` VALUES (6, 'Tarefa de proba 6', 'Descripción de proba 6, tarefa sen asignar...', '', 'SEN ASIGNAR', NULL, 3, '2020-03-09 20:28:06', '2020-03-09 20:28:06', NULL, NULL, 2);
INSERT INTO `tarefas` VALUES (7, 'Tarefa de proba 5', 'Deseño e implementación.', '', 'FINALIZADA', 'diego', 3, '2020-04-01 18:20:37', '2020-04-01 18:20:37', '2020-04-01 18:20:37', NULL, 2);
INSERT INTO `tarefas` VALUES (8, 'TarProba', 'Outra proba.', '', 'PENDENTE', 'diego', 3, '2020-04-02 10:25:02', '2020-04-02 10:25:02', NULL, NULL, 2);

-- ----------------------------
-- Estructura -> usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LOGIN` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `PASS` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `EMAIL` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ROL` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `FECHA_REXISTRO` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `ruta_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`, `LOGIN`) USING BTREE,
  INDEX `FK_ROL`(`ROL`) USING BTREE,
  INDEX `ID`(`ID`) USING BTREE,
  INDEX `LOGIN`(`LOGIN`) USING BTREE,
  CONSTRAINT `fk_usuarios_usuarios_1` FOREIGN KEY (`ROL`) REFERENCES `rol` (`ROL`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish_ci;

-- ----------------------------
-- Rexistros -> usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (3, 'diego', '$2y$10$vg9mM57s61VMxpHdQZDrL.niLRliYmVjmjq1HktnAvwE.yD2LkhCy', 'diego.vaz.rod@gmail.com', 'MASTER', '2020-04-02 14:14:26', '../../imgUsuarios/diego.jpeg');
INSERT INTO `usuarios` VALUES (4, 'juan', '$2y$10$wRChV9wGWkep10UUPhogFurgRbdjmv4XstN/65AAxWyDlZ9Q/cr1a', 'juan@gm.com', 'USER', '2020-04-01 17:28:05', '../../imgUsuarios/default.png');
INSERT INTO `usuarios` VALUES (5, 'Pepe', '$2y$10$wrvJ131g8EWu2gegTYlur.MQgH05XWEge7AorKbEtPRdv1ETvOWQa', 'pepe@gm.com', 'USER', '2020-04-01 17:28:08', '../../imgUsuarios/default.png');
INSERT INTO `usuarios` VALUES (6, 'Manu', '$2y$10$O6zdEug0DsPvHV72CjjlLeLOplzOEuBj7dPXxQpcuCzXLRQOs9qHa', 'manu@gm.com', 'USER', '2020-04-01 17:28:10', '../../imgUsuarios/default.png');
INSERT INTO `usuarios` VALUES (7, 'David', '$2y$10$DEvYdgu7ZL5UmGwmaGk0q.ouFURkAsZDvP6H5syIbDw/cD3qHXKiS', 'david@gm.com', 'USER', '2020-04-01 17:28:15', '../../imgUsuarios/default.png');
INSERT INTO `usuarios` VALUES (8, 'carlos', '$2y$10$.R0MeUb/TVclshxtdzagc.bxmAOK9NxWaYZtAG56RFie/gJ4rOpbG', 'carlos@gm.com', 'USER', '2020-04-01 17:28:15', '../../imgUsuarios/default.png');
INSERT INTO `usuarios` VALUES (12, 'Paco', '$2y$10$FlVm1/YdKwiVkr6yavX/pO76b9H1WueXovBwsiqZ.qV7Wuqgiw/RG', 'paco@gm.com', 'USER', '2020-04-01 17:28:15', '../../imgUsuarios/default.png');
INSERT INTO `usuarios` VALUES (13, 'Juanillo', '$2y$10$njisbLxr1SqFr6M5zINY3ex/Kl0dNVZymAboxeuUd7gsLENBYskkS', 'jm@gmail.com', 'USER', '2020-04-01 17:28:15', '../../imgUsuarios/default.png');
INSERT INTO `usuarios` VALUES (14, 'Maria', '$2y$10$Ad6kw4hG6qMmG2l6x3b9UORAUQirBcAw5xajqDwgFRovhzJ8phyPu', 'maria@gmai.com', 'USER', '2020-04-01 17:28:15', '../../imgUsuarios/default.png');

-- ----------------------------
-- Estructura -> usuarios_equipo
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_equipo`;
CREATE TABLE `usuarios_equipo`  (
  `ID_EQUIPO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  PRIMARY KEY (`ID_EQUIPO`, `ID_USUARIO`) USING BTREE,
  INDEX `FK_ID_USUARIO_EQ`(`ID_USUARIO`) USING BTREE,
  CONSTRAINT `fk_usuarios_equipo_usuarios_equipo_1` FOREIGN KEY (`ID_EQUIPO`) REFERENCES `equipos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_usuarios_equipo_usuarios_equipo_2` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish_ci;

-- ----------------------------
-- Rexistros -> usuarios_equipo
-- ----------------------------
INSERT INTO `usuarios_equipo` VALUES (2, 3);
INSERT INTO `usuarios_equipo` VALUES (2, 4);
INSERT INTO `usuarios_equipo` VALUES (2, 5);
INSERT INTO `usuarios_equipo` VALUES (2, 6);
INSERT INTO `usuarios_equipo` VALUES (2, 7);
INSERT INTO `usuarios_equipo` VALUES (2, 8);
INSERT INTO `usuarios_equipo` VALUES (2, 12);
INSERT INTO `usuarios_equipo` VALUES (2, 13);
INSERT INTO `usuarios_equipo` VALUES (2, 14);
INSERT INTO `usuarios_equipo` VALUES (3, 3);
INSERT INTO `usuarios_equipo` VALUES (4, 4);
INSERT INTO `usuarios_equipo` VALUES (5, 3);
INSERT INTO `usuarios_equipo` VALUES (5, 7);
INSERT INTO `usuarios_equipo` VALUES (5, 8);
INSERT INTO `usuarios_equipo` VALUES (6, 3);
INSERT INTO `usuarios_equipo` VALUES (6, 13);

-- ----------------------------
-- Estructura -> usuarios_tarefa
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_tarefa`;
CREATE TABLE `usuarios_tarefa`  (
  `ID_TAREFA` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  PRIMARY KEY (`ID_TAREFA`) USING BTREE,
  INDEX `FK_ID_USUARIO_TAR`(`ID_USUARIO`) USING BTREE,
  CONSTRAINT `fk_usuarios_tarefa_usuarios_tarefa_1` FOREIGN KEY (`ID_TAREFA`) REFERENCES `tarefas` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_usuarios_tarefa_usuarios_tarefa_2` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish_ci;

-- ----------------------------
-- Rexistros -> usuarios_tarefa
-- ----------------------------
INSERT INTO `usuarios_tarefa` VALUES (1, 3);
INSERT INTO `usuarios_tarefa` VALUES (2, 3);
INSERT INTO `usuarios_tarefa` VALUES (3, 3);
INSERT INTO `usuarios_tarefa` VALUES (7, 3);
INSERT INTO `usuarios_tarefa` VALUES (8, 3);
INSERT INTO `usuarios_tarefa` VALUES (4, 4);
INSERT INTO `usuarios_tarefa` VALUES (5, 7);

SET FOREIGN_KEY_CHECKS = 1;
