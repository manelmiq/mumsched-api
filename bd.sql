-- MySQL Script generated by MySQL Workbench
-- Sun Mar 17 18:51:39 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`entries`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`entries` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `date` DATETIME NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  `created_at` TIMESTAMP(0) NULL,
  `updated_at` TIMESTAMP(0) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`students`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`students` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `firstName` VARCHAR(45) NOT NULL,
  `lastName` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `id_entry` INT NOT NULL,
  `nacionality` VARCHAR(45) NOT NULL,
  `track_type` VARCHAR(45) NULL,
  `registration_number` INT NOT NULL,
  `starting_course` VARCHAR(45) NULL,
  `created_at` TIMESTAMP(0) NULL,
  `updated_at` TIMESTAMP(0) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_students_entries_idx` (`id_entry` ASC),
  CONSTRAINT `fk_students_entries`
    FOREIGN KEY (`id_entry`)
    REFERENCES `mydb`.`entries` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`courses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`courses` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `code` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  `course_level` VARCHAR(45) NOT NULL,
  `on_campus` TINYINT NULL,
  `created_at` TIMESTAMP(0) NULL,
  `update_at` TIMESTAMP(0) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `code_UNIQUE` (`code` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`blocks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`blocks` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `start_date` DATETIME NOT NULL,
  `end_date` DATETIME NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  `on_campus` TINYINT NULL,
  `created_at` TIMESTAMP(0) NULL,
  `updated_at` TIMESTAMP(0) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`faculties`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`faculties` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `created_at` TIMESTAMP(0) NULL,
  `updated_at` TIMESTAMP(0) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`sections`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`sections` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_course` INT NOT NULL,
  `id_block` INT NOT NULL,
  `seats_available` INT NULL,
  `id_faculty` INT NULL,
  `created_at` TIMESTAMP(0) NULL,
  `updated_at` TIMESTAMP(0) NULL,
  INDEX `fk_courses_has_blocks_blocks1_idx` (`id_block` ASC),
  INDEX `fk_courses_has_blocks_courses1_idx` (`id_course` ASC),
  PRIMARY KEY (`id`),
  INDEX `fk_blocks_has_courses_faculty1_idx` (`id_faculty` ASC),
  CONSTRAINT `fk_blocks_courses_courses`
    FOREIGN KEY (`id_course`)
    REFERENCES `mydb`.`courses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_blocks_courses_blocks`
    FOREIGN KEY (`id_block`)
    REFERENCES `mydb`.`blocks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_blocks_courses_faculty`
    FOREIGN KEY (`id_faculty`)
    REFERENCES `mydb`.`faculties` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`admins`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`admins` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `created_at` TIMESTAMP(0) NULL,
  `updated_at` TIMESTAMP(0) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`students_courses_registrations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`students_courses_registrations` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_section` INT NOT NULL,
  `id_student` INT NOT NULL,
  `created_at` TIMESTAMP(0) NULL,
  `updated_at` TIMESTAMP(0) NULL,
  INDEX `fk_students_schedules_has_blocks_has_courses_blocks_has_cou_idx` (`id_section` ASC),
  PRIMARY KEY (`id`),
  INDEX `fk_students_schedule_students1_idx` (`id_student` ASC),
  CONSTRAINT `fk_students_courses_registration_block_courses`
    FOREIGN KEY (`id_section`)
    REFERENCES `mydb`.`sections` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_courses_registration_block_students`
    FOREIGN KEY (`id_student`)
    REFERENCES `mydb`.`students` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`faculty_blocks_preferences`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`faculty_blocks_preferences` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_faculty` INT NOT NULL,
  `id_block` INT NOT NULL,
  `created_at` TIMESTAMP(0) NULL,
  `updated_at` TIMESTAMP(0) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_faculty_block_preferences_faculty1_idx` (`id_faculty` ASC),
  INDEX `fk_faculty_preferences_blocks1_idx` (`id_block` ASC),
  CONSTRAINT `fk_faculty_blocks_preferences_faculty`
    FOREIGN KEY (`id_faculty`)
    REFERENCES `mydb`.`faculties` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_faculty_blocks_preferences_blocks`
    FOREIGN KEY (`id_block`)
    REFERENCES `mydb`.`blocks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`prerequisites`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`prerequisites` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_course` INT NOT NULL,
  `code` VARCHAR(45) NOT NULL,
  `created_at` TIMESTAMP(0) NULL,
  `updated_at` TIMESTAMP(0) NULL,
  INDEX `fk_pre_requisits_courses1_idx` (`id_course` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_pre_requisits_courses`
    FOREIGN KEY (`id_course`)
    REFERENCES `mydb`.`courses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`faculty_courses_preferences`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`faculty_courses_preferences` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_faculty` INT NOT NULL,
  `id_course` INT NOT NULL,
  `created_at` TIMESTAMP(0) NULL,
  `updated_at` TIMESTAMP(0) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_faculty_courses_preferences_faculty1_idx` (`id_faculty` ASC),
  INDEX `fk_faculty_courses_preferences_courses1_idx` (`id_course` ASC),
  CONSTRAINT `fk_faculty_courses_preferences_faculty`
    FOREIGN KEY (`id_faculty`)
    REFERENCES `mydb`.`faculties` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_faculty_courses_preferences_courses`
    FOREIGN KEY (`id_course`)
    REFERENCES `mydb`.`courses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`student_blocks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`student_blocks` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_student` INT NOT NULL,
  `id_block` INT NOT NULL,
  `created_at` TIMESTAMP(0) NULL,
  `updated_at` TIMESTAMP(0) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_student_blocks_on_campus_students1_idx` (`id_student` ASC),
  INDEX `fk_student_blocks_on_campus_blocks1_idx` (`id_block` ASC),
  CONSTRAINT `fk_student_blocks_students`
    FOREIGN KEY (`id_student`)
    REFERENCES `mydb`.`students` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_blocks_blocks`
    FOREIGN KEY (`id_block`)
    REFERENCES `mydb`.`blocks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=0;
SET FOREIGN_KEY_CHECKS=0;
SET UNIQUE_CHECKS=0;
