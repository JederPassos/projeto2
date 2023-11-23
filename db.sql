-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema DB_oficial
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema DB_oficial
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `DB_oficial` DEFAULT CHARACTER SET utf8 ;
USE `DB_oficial` ;

-- -----------------------------------------------------
-- Table `DB_oficial`.`Funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_oficial`.`Funcionario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(150) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_oficial`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_oficial`.`Cliente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Telefone` INT NULL,
  `Email` VARCHAR(100) NULL,
  `Nome` VARCHAR(45) NOT NULL,
  `Senha` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_CPF_cliente_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_oficial`.`Veiculo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_oficial`.`Veiculo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Marca` VARCHAR(100) NOT NULL,
  `Modelo` VARCHAR(100) NOT NULL,
  `Placa` VARCHAR(45) NULL,
  `Cliente_id_CPF_cliente` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_placa_veiculo_UNIQUE` (`id` ASC),
  INDEX `fk_veiculo_Cliente1_idx` (`Cliente_id_CPF_cliente` ASC),
  CONSTRAINT `fk_veiculo_Cliente1`
    FOREIGN KEY (`Cliente_id_CPF_cliente`)
    REFERENCES `DB_oficial`.`Cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_oficial`.`Ordem_Servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_oficial`.`Ordem_Servico` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Data` DATE NOT NULL,
  `Situacao` TINYINT NULL,
  `Descricao` VARCHAR(150) NULL,
  `Valor` DECIMAL NULL,
  `id_veiculo` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Ordem_Servico_veiculo1_idx` (`id_veiculo` ASC),
  CONSTRAINT `fk_Ordem_Servico_veiculo1`
    FOREIGN KEY (`id_veiculo`)
    REFERENCES `DB_oficial`.`Veiculo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_oficial`.`Alocar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_oficial`.`Alocar` (
  `Funcionario_id` INT NOT NULL,
  `Ordem_Servico_id` INT NOT NULL,
  INDEX `fk_Alocar_Funcionario1_idx` (`Funcionario_id` ASC),
  INDEX `fk_Alocar_Ordem_Servico1_idx` (`Ordem_Servico_id` ASC),
  CONSTRAINT `fk_Alocar_Funcionario1`
    FOREIGN KEY (`Funcionario_id`)
    REFERENCES `DB_oficial`.`Funcionario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Alocar_Ordem_Servico1`
    FOREIGN KEY (`Ordem_Servico_id`)
    REFERENCES `DB_oficial`.`Ordem_Servico` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_oficial`.`Tipo_de_Servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_oficial`.`Tipo_de_Servico` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_oficial`.`Possui`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_oficial`.`Possui` (
  `id_tipo_servico` INT NOT NULL,
  `id_ordem_servico` INT NOT NULL,
  INDEX `fk_possui_Serviço1_idx` (`id_tipo_servico` ASC),
  INDEX `fk_Possui_Tipo_de_Servico1_idx` (`id_ordem_servico` ASC),
  CONSTRAINT `fk_possui_Serviço1`
    FOREIGN KEY (`id_tipo_servico`)
    REFERENCES `DB_oficial`.`Ordem_Servico` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Possui_Tipo_de_Servico1`
    FOREIGN KEY (`id_ordem_servico`)
    REFERENCES `DB_oficial`.`Tipo_de_Servico` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DB_oficial`.`Reserva`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_oficial`.`Reserva` (
  `id_veiculo` INT NOT NULL,
  `Data` DATETIME NOT NULL,
  INDEX `fk_Reserva_veiculos1_idx` (`id_veiculo` ASC),
  UNIQUE INDEX `Data_UNIQUE` (`Data` ASC),
  CONSTRAINT `fk_Reserva_veiculos1`
    FOREIGN KEY (`id_veiculo`)
    REFERENCES `DB_oficial`.`Veiculo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `DB_oficial` ;

-- -----------------------------------------------------
-- Placeholder table for view `DB_oficial`.`view1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DB_oficial`.`view1` (`id` INT);

-- -----------------------------------------------------
-- View `DB_oficial`.`view1`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `DB_oficial`.`view1`;
USE `DB_oficial`;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
