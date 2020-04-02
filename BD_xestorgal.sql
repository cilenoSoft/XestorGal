SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- comentarios_tarefa
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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish_ci;

-- ----------------------------
-- equipos
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
-- estados_tarefa
-- ----------------------------
DROP TABLE IF EXISTS `estados_tarefa`;
CREATE TABLE `estados_tarefa`  (
  `ID` int(3) NOT NULL,
  `ESTADO` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `ESTADO`(`ESTADO`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish_ci;

-- ----------------------------
-- imputacion
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
-- rol
-- ----------------------------
DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol`  (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ROL` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `ROL`(`ROL`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish_ci;

-- ----------------------------
-- tarefas
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
-- usuarios
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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish_ci;

-- ----------------------------
-- usuarios_equipo
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
-- usuarios_tarefa
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

SET FOREIGN_KEY_CHECKS = 1;
