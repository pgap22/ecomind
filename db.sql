-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema ecomind
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ecomind
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ecomind` DEFAULT CHARACTER SET utf8 ;
USE `ecomind` ;

-- -----------------------------------------------------
-- Table `ecomind`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecomind`.`usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(110) NOT NULL,
  `usuario` VARCHAR(110) NOT NULL,
  `email` VARCHAR(110) NOT NULL,
  `password` VARCHAR(110) NOT NULL,
  `imagen_url` VARCHAR(110) NOT NULL,
  `rol` VARCHAR(45) NOT NULL DEFAULT 'usuario',
  `estado` VARCHAR(45) NOT NULL DEFAULT 'normal',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecomind`.`blog`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecomind`.`blog` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(110) NOT NULL,
  `subtitulo` VARCHAR(110) NOT NULL,
  `id_usuario` INT(11) NOT NULL,
  `contenido` LONGTEXT NOT NULL,
  `imagen_url` VARCHAR(110) NOT NULL,
  `fecha_creacion` DATETIME NULL DEFAULT NULL,
  `imagen_usuario` VARCHAR(110) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_blog_usuarios` (`id_usuario` ASC),
  CONSTRAINT `fk_blog_usuarios`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `ecomind`.`usuarios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecomind`.`foros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecomind`.`foros` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `imagen_url` VARCHAR(110) NOT NULL,
  `descripcion` VARCHAR(110) NOT NULL,
  `id_usuario` INT(11) NOT NULL,
  `nombre` VARCHAR(110) NOT NULL,
  `fecha_creacion` DATETIME NULL DEFAULT NULL,
  `imagen_usuario` VARCHAR(110) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_foros_usuarios` (`id_usuario` ASC),
  CONSTRAINT `fk_foros_usuarios`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `ecomind`.`usuarios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecomind`.`forosmensaje`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecomind`.`forosmensaje` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_foro` INT(11) NOT NULL,
  `id_usuario` INT(11) NOT NULL,
  `mensaje` TEXT NOT NULL,
  `creado` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `oculto` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  INDEX `fk_forosMensaje_foros` (`id_foro` ASC),
  INDEX `fk_forosMensaje_usuarios` (`id_usuario` ASC),
  CONSTRAINT `fk_forosMensaje_foros`
    FOREIGN KEY (`id_foro`)
    REFERENCES `ecomind`.`foros` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_forosMensaje_usuarios`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `ecomind`.`usuarios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecomind`.`reportescuentas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecomind`.`reportescuentas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` INT(11) NOT NULL,
  `id_usuarioReportado` INT(11) NOT NULL,
  `motivo` VARCHAR(45) NOT NULL,
  `id_mensaje` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_reportesCuentas_usuarios` (`id_usuario` ASC),
  INDEX `fkUsuarioReportado_idx` (`id_usuarioReportado` ASC),
  INDEX `fkMensajeUsuarioReport_idx` (`id_mensaje` ASC),
  CONSTRAINT `fkMensajeUsuarioReport`
    FOREIGN KEY (`id_mensaje`)
    REFERENCES `ecomind`.`forosmensaje` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fkUsuarioReportado`
    FOREIGN KEY (`id_usuarioReportado`)
    REFERENCES `ecomind`.`usuarios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_reportesCuentas_usuarios`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `ecomind`.`usuarios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecomind`.`usuariosforos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecomind`.`usuariosforos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_foro` INT(11) NOT NULL,
  `id_usuario` INT(11) NOT NULL,
  `fecha_inscripcion` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_usuarioFOros_idx` (`id_usuario` ASC),
  INDEX `fk_forosUsuarios_idx` (`id_foro` ASC),
  CONSTRAINT `fk_forosUsuarios`
    FOREIGN KEY (`id_foro`)
    REFERENCES `ecomind`.`foros` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_usuarioFOros`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `ecomind`.`usuarios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;

INSERT INTO `usuarios`(nombre, usuario, email, password, imagen_url,rol,estado) VALUES('Moderador','moderador','moderador@ecomind.com','123123','/avatars/default.png','admin','normal');

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

