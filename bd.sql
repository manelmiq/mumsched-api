-- MySQL Script generated by MySQL Workbench
-- Wed Mar 13 19:48:19 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mumsched
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mumsched
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mumsched` DEFAULT CHARACTER SET utf8 ;
USE `mumsched` ;

-- -----------------------------------------------------
-- Table `mumsched`.`entries`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mumsched`.`entries` (
  `id_entry` INT NOT NULL,
  `date` DATETIME NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_entry`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mumsched`.`students`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mumsched`.`students` (
  `id_student` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `id_entry` INT NOT NULL,
  `nacionality` VARCHAR(45) NOT NULL,
  `track_type` VARCHAR(45) NULL,
  `registration_number` INT NOT NULL,
  `starting_course` VARCHAR(45) NULL,
  PRIMARY KEY (`id_student`),
  INDEX `fk_students_entries_idx` (`id_entry` ASC),
  CONSTRAINT `fk_students_entries`
    FOREIGN KEY (`id_entry`)
    REFERENCES `mumsched`.`entries` (`id_entry`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mumsched`.`courses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mumsched`.`courses` (
  `id_course` INT NOT NULL,
  `code` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  `course_level` VARCHAR(45) NOT NULL,
  `on_campus` TINYINT NULL,
  PRIMARY KEY (`id_course`),
  UNIQUE INDEX `code_UNIQUE` (`code` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mumsched`.`blocks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mumsched`.`blocks` (
  `id_block` INT NOT NULL,
  `start_date` DATETIME NOT NULL,
  `end_date` DATETIME NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  `on_campus` TINYINT NULL,
  PRIMARY KEY (`id_block`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mumsched`.`faculty`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mumsched`.`faculty` (
  `id_faculty` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_faculty`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mumsched`.`blocks_courses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mumsched`.`blocks_courses` (
  `id_block_course` INT NOT NULL,
  `id_course` INT NOT NULL,
  `id_block` INT NOT NULL,
  `seats_available` INT NULL,
  `id_faculty` INT NULL,
  INDEX `fk_courses_has_blocks_blocks1_idx` (`id_block` ASC),
  INDEX `fk_courses_has_blocks_courses1_idx` (`id_course` ASC),
  PRIMARY KEY (`id_block_course`),
  INDEX `fk_blocks_has_courses_faculty1_idx` (`id_faculty` ASC),
  CONSTRAINT `fk_blocks_courses_courses`
    FOREIGN KEY (`id_course`)
    REFERENCES `mumsched`.`courses` (`id_course`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_blocks_courses_blocks`
    FOREIGN KEY (`id_block`)
    REFERENCES `mumsched`.`blocks` (`id_block`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_blocks_courses_faculty`
    FOREIGN KEY (`id_faculty`)
    REFERENCES `mumsched`.`faculty` (`id_faculty`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mumsched`.`system_admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mumsched`.`system_admin` (
  `id_system_admin` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_system_admin`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mumsched`.`students_courses_registration`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mumsched`.`students_courses_registration` (
  `id_student_course_registration` VARCHAR(45) NOT NULL,
  `id_block_course` INT NOT NULL,
  `id_student` INT NOT NULL,
  INDEX `fk_students_schedules_has_blocks_has_courses_blocks_has_cou_idx` (`id_block_course` ASC),
  PRIMARY KEY (`id_student_course_registration`),
  INDEX `fk_students_schedule_students1_idx` (`id_student` ASC),
  CONSTRAINT `fk_students_courses_registration_block_courses`
    FOREIGN KEY (`id_block_course`)
    REFERENCES `mumsched`.`blocks_courses` (`id_block_course`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_courses_registration_block_students`
    FOREIGN KEY (`id_student`)
    REFERENCES `mumsched`.`students` (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mumsched`.`faculty_blocks_preferences`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mumsched`.`faculty_blocks_preferences` (
  `id_faculty_block_preference` INT NOT NULL,
  `id_faculty` INT NOT NULL,
  `id_block` INT NOT NULL,
  PRIMARY KEY (`id_faculty_block_preference`),
  INDEX `fk_faculty_block_preferences_faculty1_idx` (`id_faculty` ASC),
  INDEX `fk_faculty_preferences_blocks1_idx` (`id_block` ASC),
  CONSTRAINT `fk_faculty_blocks_preferences_faculty`
    FOREIGN KEY (`id_faculty`)
    REFERENCES `mumsched`.`faculty` (`id_faculty`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_faculty_blocks_preferences_blocks`
    FOREIGN KEY (`id_block`)
    REFERENCES `mumsched`.`blocks` (`id_block`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mumsched`.`pre_requisits`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mumsched`.`pre_requisits` (
  `id_pre_requesit` VARCHAR(45) NOT NULL,
  `id_course` INT NOT NULL,
  `code` VARCHAR(45) NOT NULL,
  INDEX `fk_pre_requisits_courses1_idx` (`id_course` ASC),
  PRIMARY KEY (`id_pre_requesit`),
  CONSTRAINT `fk_pre_requisits_courses`
    FOREIGN KEY (`id_course`)
    REFERENCES `mumsched`.`courses` (`id_course`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mumsched`.`faculty_courses_preferences`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mumsched`.`faculty_courses_preferences` (
  `id_faculty_course_preference` INT NOT NULL,
  `id_faculty` INT NOT NULL,
  `id_course` INT NOT NULL,
  PRIMARY KEY (`id_faculty_course_preference`),
  INDEX `fk_faculty_courses_preferences_faculty1_idx` (`id_faculty` ASC),
  INDEX `fk_faculty_courses_preferences_courses1_idx` (`id_course` ASC),
  CONSTRAINT `fk_faculty_courses_preferences_faculty`
    FOREIGN KEY (`id_faculty`)
    REFERENCES `mumsched`.`faculty` (`id_faculty`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_faculty_courses_preferences_courses`
    FOREIGN KEY (`id_course`)
    REFERENCES `mumsched`.`courses` (`id_course`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mumsched`.`students_courses_preferences`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mumsched`.`students_courses_preferences` (
  `id_students_courses_preferences` INT NOT NULL,
  `id_student` INT NOT NULL,
  `preference_number` INT NOT NULL,
  `id_block_course` INT NOT NULL,
  `id_block` INT NOT NULL,
  PRIMARY KEY (`id_students_courses_preferences`),
  INDEX `fk_students_courses_preferences_students1_idx` (`id_student` ASC),
  INDEX `fk_students_courses_preferences_blocks_courses1_idx` (`id_block_course` ASC),
  INDEX `fk_students_courses_preferences_blocks1_idx` (`id_block` ASC),
  CONSTRAINT `fk_students_courses_preferences_students`
    FOREIGN KEY (`id_student`)
    REFERENCES `mumsched`.`students` (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_courses_preferences_blocks_courses`
    FOREIGN KEY (`id_block_course`)
    REFERENCES `mumsched`.`blocks_courses` (`id_block_course`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_courses_preferences_blocks1`
    FOREIGN KEY (`id_block`)
    REFERENCES `mumsched`.`blocks` (`id_block`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mumsched`.`student_blocks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mumsched`.`student_blocks` (
  `id_student_blocks` INT NOT NULL,
  `id_student` INT NOT NULL,
  `id_block` INT NOT NULL,
  PRIMARY KEY (`id_student_blocks`),
  INDEX `fk_student_blocks_on_campus_students1_idx` (`id_student` ASC),
  INDEX `fk_student_blocks_on_campus_blocks1_idx` (`id_block` ASC),
  CONSTRAINT `fk_student_blocks_students`
    FOREIGN KEY (`id_student`)
    REFERENCES `mumsched`.`students` (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_blocks_blocks`
    FOREIGN KEY (`id_block`)
    REFERENCES `mumsched`.`blocks` (`id_block`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=1;
SET FOREIGN_KEY_CHECKS=1;
SET UNIQUE_CHECKS=1;