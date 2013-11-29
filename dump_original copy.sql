SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `bdi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `bdi` ;

-- -----------------------------------------------------
-- Table `bdi`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdi`.`usuario` (
  `idusuario` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(15) NULL ,
  `sobrenome` VARCHAR(15) NULL ,
  `CPF` VARCHAR(12) NULL ,
  `email` VARCHAR(64) NULL ,
  `senha` VARCHAR(45) NULL ,
  `apelido` VARCHAR(15) NULL ,
  PRIMARY KEY (`idusuario`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdi`.`perfil`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdi`.`perfil` (
  `idperfil` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `usuario_idusuario` INT UNSIGNED NOT NULL ,
  `tipo_produto` VARCHAR(45) NULL ,
  `caracteristicas` VARCHAR(45) NULL ,
  PRIMARY KEY (`idperfil`, `usuario_idusuario`) ,
  INDEX `fk_perfil_usuario1_idx` (`usuario_idusuario` ASC) ,
  CONSTRAINT `fk_perfil_usuario1`
    FOREIGN KEY (`usuario_idusuario` )
    REFERENCES `bdi`.`usuario` (`idusuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdi`.`amizade`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdi`.`amizade` (
  `idamizade` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `usuario_idusuario` INT UNSIGNED NOT NULL ,
  `usuario_idamigo` INT UNSIGNED NOT NULL ,
  `grau` ENUM('Melhor Amigo', 'Amigo', 'Conhecido', 'Não Conheço') NULL ,
  PRIMARY KEY (`idamizade`, `usuario_idusuario`, `usuario_idamigo`) ,
  INDEX `fk_amigo_usuario_idx` (`usuario_idusuario` ASC) ,
  INDEX `fk_amizade_usuario1_idx` (`usuario_idamigo` ASC) ,
  CONSTRAINT `fk_amigo_usuario`
    FOREIGN KEY (`usuario_idusuario` )
    REFERENCES `bdi`.`usuario` (`idusuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_amizade_usuario1`
    FOREIGN KEY (`usuario_idamigo` )
    REFERENCES `bdi`.`usuario` (`idusuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdi`.`fabricante`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdi`.`fabricante` (
  `idfabricante` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL ,
  `nacionalidade` VARCHAR(45) NULL ,
  PRIMARY KEY (`idfabricante`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdi`.`fornecedor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdi`.`fornecedor` (
  `idfornecedor` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL ,
  PRIMARY KEY (`idfornecedor`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdi`.`loja`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdi`.`loja` (
  `idloja` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL ,
  `fisico` ENUM('Sim','Nao') NULL ,
  PRIMARY KEY (`idloja`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdi`.`produtoNote`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdi`.`produtoNote` (
  `idproduto` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(255) NULL ,
  `fabricante_idfabricante` INT UNSIGNED NOT NULL ,
  `fornecedor_idfornecedor` INT UNSIGNED NOT NULL ,
  `loja_idloja` INT UNSIGNED NOT NULL ,
  `marca_proc` INT(2) NOT NULL ,
  `vel_proc` INT(2) NOT NULL ,
  `memoria` INT(2) NOT NULL ,
  `preco` INT(2) NOT NULL ,
  PRIMARY KEY (`idproduto`, `fabricante_idfabricante`, `fornecedor_idfornecedor`, `loja_idloja`) ,
  INDEX `fk_produtoNote_fabricante1_idx` (`fabricante_idfabricante` ASC) ,
  INDEX `fk_produtoNote_fornecedor1_idx` (`fornecedor_idfornecedor` ASC) ,
  INDEX `fk_produtoNote_loja1_idx` (`loja_idloja` ASC) ,
  CONSTRAINT `fk_produtoNote_fabricante1`
    FOREIGN KEY (`fabricante_idfabricante` )
    REFERENCES `bdi`.`fabricante` (`idfabricante` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produtoNote_fornecedor1`
    FOREIGN KEY (`fornecedor_idfornecedor` )
    REFERENCES `bdi`.`fornecedor` (`idfornecedor` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produtoNote_loja1`
    FOREIGN KEY (`loja_idloja` )
    REFERENCES `bdi`.`loja` (`idloja` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdi`.`caracteristica`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdi`.`caracteristica` (
  `idcaracteristica` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL ,
  `codigo` VARCHAR(45) NULL ,
  `valor` VARCHAR(45) NULL ,
  `tipo_produto` VARCHAR(45) NULL ,
  PRIMARY KEY (`idcaracteristica`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdi`.`fabricante`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdi`.`fabricante` (
  `idfabricante` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL ,
  `nacionalidade` VARCHAR(45) NULL ,
  PRIMARY KEY (`idfabricante`) )
ENGINE = InnoDB;

USE `bdi` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
