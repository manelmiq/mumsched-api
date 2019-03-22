# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.25)
# Database: mydb
# Generation Time: 2019-03-21 00:44:49 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admins
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;

INSERT INTO `admins` (`id`, `firstName`, `lastName`, `email`, `password`, `created_at`, `updated_at`)
VALUES
	(10,'admin','admin','admin','admin',NULL,NULL),
	(11,'Department chief','chief','deptochief@mum.edu','12345','2019-03-21 00:05:14','2019-03-21 00:05:14');

/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table blocks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `blocks`;

CREATE TABLE `blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `description` varchar(45) NOT NULL,
  `on_campus` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `blocks` WRITE;
/*!40000 ALTER TABLE `blocks` DISABLE KEYS */;

INSERT INTO `blocks` (`id`, `start_date`, `end_date`, `description`, `on_campus`, `created_at`, `updated_at`)
VALUES
	(6,'2018-11-01 00:00:00','2018-11-30 00:00:00','November 2018',1,'2019-03-21 00:07:25','2019-03-21 00:07:25'),
	(7,'2018-12-01 00:00:00','2018-12-30 00:00:00','December 2018',1,'2019-03-21 00:08:37','2019-03-21 00:08:37'),
	(8,'2019-01-01 00:00:00','2019-01-31 00:00:00','January 2019',1,'2019-03-21 00:09:35','2019-03-21 00:09:35');

/*!40000 ALTER TABLE `blocks` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table courses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `courses`;

CREATE TABLE `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `course_level` varchar(45) NOT NULL,
  `on_campus` tinyint(4) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_UNIQUE` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;

INSERT INTO `courses` (`id`, `code`, `name`, `description`, `course_level`, `on_campus`, `updated_at`, `created_at`)
VALUES
	(8,'CS201','Software Engineering','Software Engineering','400',1,'2019-03-21 00:13:13','2019-03-21 00:13:13'),
	(9,'CS202','WAP','Web application','500',1,'2019-03-21 00:14:46','2019-03-21 00:14:46'),
	(10,'CS203','MWP','Modern Web Application','500',1,'2019-03-21 00:16:25','2019-03-21 00:16:25'),
	(11,'CS204','SA','Software Architecture','500',1,'2019-03-21 00:17:09','2019-03-21 00:17:09'),
	(12,'CS100','FPP','FPP','200',1,'2019-03-21 00:18:19','2019-03-21 00:18:19'),
	(13,'CS200','MPP','MPP','200',1,'2019-03-21 00:18:34','2019-03-21 00:18:34');

/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table entries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `entries`;

CREATE TABLE `entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `description` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `entries` WRITE;
/*!40000 ALTER TABLE `entries` DISABLE KEYS */;

INSERT INTO `entries` (`id`, `date`, `description`, `created_at`, `updated_at`)
VALUES
	(8,'2018-11-01 00:00:00','November 2018','2019-03-20 23:46:33','2019-03-20 23:46:33'),
	(9,'2019-02-01 00:00:00','February 2019','2019-03-20 23:47:37','2019-03-20 23:49:15'),
	(10,'2019-05-01 00:00:00','May 2019','2019-03-20 23:49:08','2019-03-20 23:49:08'),
	(11,'2019-08-01 00:00:00','August 2019','2019-03-20 23:50:13','2019-03-20 23:50:13');

/*!40000 ALTER TABLE `entries` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table faculties
# ------------------------------------------------------------

DROP TABLE IF EXISTS `faculties`;

CREATE TABLE `faculties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `faculties` WRITE;
/*!40000 ALTER TABLE `faculties` DISABLE KEYS */;

INSERT INTO `faculties` (`id`, `firstName`, `lastName`, `email`, `password`, `created_at`, `updated_at`)
VALUES
	(6,'Emdad','Khan','emdadkhan@mum.edu','12345','2019-03-21 00:01:36','2019-03-21 00:01:36'),
	(7,'Joseph','Lerman','josephlerman@mum.edu','12345','2019-03-21 00:02:14','2019-03-21 00:02:14'),
	(8,'Paul','Korazza','paulkorazza@mum.edu','12345','2019-03-21 00:03:07','2019-03-21 00:03:07');

/*!40000 ALTER TABLE `faculties` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table faculty_blocks_preferences
# ------------------------------------------------------------

DROP TABLE IF EXISTS `faculty_blocks_preferences`;

CREATE TABLE `faculty_blocks_preferences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_faculty` int(11) NOT NULL,
  `id_block` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_faculty_block_preferences_faculty1_idx` (`id_faculty`),
  KEY `fk_faculty_preferences_blocks1_idx` (`id_block`),
  CONSTRAINT `fk_faculty_blocks_preferences_blocks` FOREIGN KEY (`id_block`) REFERENCES `blocks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_faculty_blocks_preferences_faculty` FOREIGN KEY (`id_faculty`) REFERENCES `faculties` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `faculty_blocks_preferences` WRITE;
/*!40000 ALTER TABLE `faculty_blocks_preferences` DISABLE KEYS */;

INSERT INTO `faculty_blocks_preferences` (`id`, `id_faculty`, `id_block`, `created_at`, `updated_at`)
VALUES
	(11,6,6,NULL,NULL),
	(12,6,7,NULL,NULL),
	(13,6,8,NULL,NULL),
	(15,7,6,NULL,NULL),
	(16,7,7,NULL,NULL);

/*!40000 ALTER TABLE `faculty_blocks_preferences` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table faculty_courses_preferences
# ------------------------------------------------------------

DROP TABLE IF EXISTS `faculty_courses_preferences`;

CREATE TABLE `faculty_courses_preferences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_faculty` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_faculty_courses_preferences_faculty1_idx` (`id_faculty`),
  KEY `fk_faculty_courses_preferences_courses1_idx` (`id_course`),
  CONSTRAINT `fk_faculty_courses_preferences_courses` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_faculty_courses_preferences_faculty` FOREIGN KEY (`id_faculty`) REFERENCES `faculties` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `faculty_courses_preferences` WRITE;
/*!40000 ALTER TABLE `faculty_courses_preferences` DISABLE KEYS */;

INSERT INTO `faculty_courses_preferences` (`id`, `id_faculty`, `id_course`, `created_at`, `updated_at`)
VALUES
	(16,6,8,NULL,NULL),
	(17,6,11,NULL,NULL),
	(18,6,13,NULL,NULL),
	(19,7,13,NULL,NULL);

/*!40000 ALTER TABLE `faculty_courses_preferences` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table prerequisites
# ------------------------------------------------------------

DROP TABLE IF EXISTS `prerequisites`;

CREATE TABLE `prerequisites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_course_prerequesite` int(11) NOT NULL,
  `id_course` varchar(45) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pre_requisits_courses1_idx` (`id_course_prerequesite`),
  CONSTRAINT `fk_pre_requisits_courses` FOREIGN KEY (`id_course_prerequesite`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table sections
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sections`;

CREATE TABLE `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_course` int(11) NOT NULL,
  `id_block` int(11) NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `id_faculty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_courses_has_blocks_blocks1_idx` (`id_block`),
  KEY `fk_courses_has_blocks_courses1_idx` (`id_course`),
  KEY `fk_blocks_has_courses_faculty1_idx` (`id_faculty`),
  CONSTRAINT `fk_blocks_courses_blocks` FOREIGN KEY (`id_block`) REFERENCES `blocks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_blocks_courses_courses` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_blocks_courses_faculty` FOREIGN KEY (`id_faculty`) REFERENCES `faculties` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;

INSERT INTO `sections` (`id`, `id_course`, `id_block`, `capacity`, `id_faculty`, `created_at`, `updated_at`)
VALUES
	(10,11,7,30,6,'2019-03-21 00:19:14','2019-03-21 00:35:40'),
	(11,13,7,30,7,'2019-03-21 00:22:21','2019-03-21 00:37:59'),
	(12,8,8,20,6,'2019-03-21 00:22:34','2019-03-21 00:35:47');

/*!40000 ALTER TABLE `sections` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table student_blocks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `student_blocks`;

CREATE TABLE `student_blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_student` int(11) NOT NULL,
  `id_block` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_blocks_on_campus_students1_idx` (`id_student`),
  KEY `fk_student_blocks_on_campus_blocks1_idx` (`id_block`),
  CONSTRAINT `fk_student_blocks_blocks` FOREIGN KEY (`id_block`) REFERENCES `blocks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_blocks_students` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `student_blocks` WRITE;
/*!40000 ALTER TABLE `student_blocks` DISABLE KEYS */;

INSERT INTO `student_blocks` (`id`, `id_student`, `id_block`, `created_at`, `updated_at`)
VALUES
	(41,19,6,'2019-03-21 00:27:33','2019-03-21 00:27:33'),
	(42,19,7,'2019-03-21 00:27:33','2019-03-21 00:27:33'),
	(43,19,8,'2019-03-21 00:27:33','2019-03-21 00:27:33');

/*!40000 ALTER TABLE `student_blocks` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table students
# ------------------------------------------------------------

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `id_entry` int(11) NOT NULL,
  `nacionality` varchar(45) NOT NULL,
  `track_type` varchar(45) DEFAULT NULL,
  `registration_number` int(11) NOT NULL,
  `starting_course` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `fk_students_entries_idx` (`id_entry`),
  CONSTRAINT `fk_students_entries` FOREIGN KEY (`id_entry`) REFERENCES `entries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;

INSERT INTO `students` (`id`, `firstName`, `lastName`, `email`, `password`, `id_entry`, `nacionality`, `track_type`, `registration_number`, `starting_course`, `created_at`, `updated_at`)
VALUES
	(19,'ADRIANO','MARRA','adrianomarra90@gmail.com','12345',8,'BRA','CPT',986812,NULL,'2019-03-20 23:52:14','2019-03-20 23:52:14'),
	(20,'Emmanuell','Nogueira','emmanuell@mum.edu','12345',8,'BRA','CPT',986783,NULL,'2019-03-20 23:53:30','2019-03-20 23:53:30'),
	(21,'Romulo','Costa','romulo@mum.edu','12345',8,'BRA','CPT',32411,NULL,'2019-03-20 23:54:10','2019-03-20 23:54:10'),
	(22,'Tyler','Lao','tyler@mum.edu','12345',8,'CAM','CPT',654654,NULL,'2019-03-20 23:59:00','2019-03-20 23:59:00');

/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table students_courses_registrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `students_courses_registrations`;

CREATE TABLE `students_courses_registrations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_section` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_students_schedules_has_blocks_has_courses_blocks_has_cou_idx` (`id_section`),
  KEY `fk_students_schedule_students1_idx` (`id_student`),
  CONSTRAINT `fk_students_courses_registration_block_courses` FOREIGN KEY (`id_section`) REFERENCES `sections` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_courses_registration_block_students` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
