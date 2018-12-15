-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `listacli` DEFAULT CHARACTER SET utf8mb4 ;
USE `listacli` ;

CREATE TABLE IF NOT EXISTS `listacli`.`materials` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NULL,
  `deleted` DATETIME NULL,
  `nome` VARCHAR(100) NOT NULL,
  `descricao` VARCHAR(255) NULL,
  `imagem` BLOB NULL,
  `saldo_atual` DECIMAL(10,2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`));

CREATE TABLE IF NOT EXISTS `listacli`.`compra_materials` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NULL,
  `deleted` DATETIME NULL,
  `data_compra` DATETIME NOT NULL DEFAULT NOW(),
  `data_chegada` DATETIME NULL,
  `observacao` TEXT NULL,
  `preco` DECIMAL(10,2) NULL,
  `material_id` INT NOT NULL,
  `quantidade`DECIMAL(10,2) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_compra_materials_materials1_idx` (`material_id` ASC),
  CONSTRAINT `fk_compra_materials_materials1`
    FOREIGN KEY (`material_id`)
    REFERENCES `listacli`.`materials` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `listacli`.`material_clientes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NULL,
  `deleted` DATETIME NULL,
  `data_entrega` DATETIME NULL,
  `cliente_id` INT NOT NULL,
  `material_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_material_clientes_clientes1_idx` (`cliente_id` ASC),
  INDEX `fk_material_clientes_materials1_idx` (`material_id` ASC),
  CONSTRAINT `fk_material_clientes_clientes1`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `listacli`.`clientes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_material_clientes_materials1`
    FOREIGN KEY (`material_id`)
    REFERENCES `listacli`.`materials` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

