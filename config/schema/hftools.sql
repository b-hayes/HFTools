-- noinspection SqlNoDataSourceInspectionForFile

-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: hftools
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `answers`
--


DROP TABLE IF EXISTS `answers`;
CREATE TABLE `answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(10) unsigned NOT NULL,
  `answer_text` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
    CONSTRAINT `fk_a_question1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(355) NOT NULL,
  `address` varchar(355) DEFAULT NULL,
  `client_number` varchar(355) NOT NULL,
  `contact_number` varchar(355) NOT NULL,
  `email` varchar(355) DEFAULT NULL,
  `contact_person` varchar(355) NOT NULL,
  `acount_created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Table structure for table `clients_participants`
--

DROP TABLE IF EXISTS `clients_participants`;
CREATE TABLE `clients_participants` (
  `client_id` int(10) unsigned NOT NULL,
  `participant_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`client_id`,`participant_id`),
  KEY `fk_cp_participant2` (`participant_id`),
  CONSTRAINT `fk_cp_client1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `fk_cp_participant2` FOREIGN KEY (`participant_id`) REFERENCES `participants` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `observations`
--

DROP TABLE IF EXISTS `observations`;
CREATE TABLE `observations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `observer_id` int(10) unsigned NOT NULL,
  `participant_id` int(10) unsigned NOT NULL,
  `run_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_o_obs1` (`observer_id`),
  KEY `fk_o_run2` (`run_id`),
  CONSTRAINT `fk_o_obs1` FOREIGN KEY (`observer_id`) REFERENCES `participants` (`id`),
  CONSTRAINT `fk_o_participant1` FOREIGN KEY (`participant_id`) REFERENCES `participants` (`id`),
  CONSTRAINT `fk_o_run2` FOREIGN KEY (`run_id`) REFERENCES `runs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Table structure for table `answers_observations`
--

DROP TABLE IF EXISTS `answers_observations`;
CREATE TABLE `answers_observations` (
  `observation_id` int(10) unsigned NOT NULL,
  `answer_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`observation_id`, `answer_id`),
  KEY `fk_op_answer2` (`answer_id`),
  CONSTRAINT `fk_op_observation1` FOREIGN KEY (`observation_id`) REFERENCES `observations` (`id`),
  CONSTRAINT `fk_op_answer2` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
CREATE TABLE `participants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(355) NOT NULL,
  `last_name` varchar(355) NOT NULL,
  `email` varchar(355) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;



--
-- Table structure for table `participants_roles`
--

DROP TABLE IF EXISTS `participants_roles`;
CREATE TABLE `participants_roles` (
  `participant_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`participant_id`,`role_id`),
  KEY `fk_pr_role2` (`role_id`),
  CONSTRAINT `fk_pr_participant1` FOREIGN KEY (`participant_id`) REFERENCES `participants` (`id`),
  CONSTRAINT `fk_pr_role2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `participants_sessions`
--

DROP TABLE IF EXISTS `participants_sessions`;
CREATE TABLE `participants_sessions` (
  `participant_id` int(10) unsigned NOT NULL,
  `session_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`participant_id`,`session_id`),
  KEY `fk_sp_session2` (`session_id`),
  CONSTRAINT `fk_sp_participant1` FOREIGN KEY (`participant_id`) REFERENCES `participants` (`id`),
  CONSTRAINT `fk_sp_session2` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `questionnaires`
--

DROP TABLE IF EXISTS `questionnaires`;
CREATE TABLE `questionnaires` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(355) NOT NULL,
  `description` varchar(355) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `section_id` int(10) unsigned NOT NULL,
  `text` varchar(355) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_q_section1` (`section_id`),
  CONSTRAINT `fk_q_section1` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(355) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Table structure for table `runs`
--

DROP TABLE IF EXISTS `runs`;
CREATE TABLE `runs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` int(10) unsigned NOT NULL,
  `run_date` date NOT NULL,
  `name` varchar(355) NOT NULL,
  `description` varchar(355) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_r_session1` (`session_id`),
  CONSTRAINT `fk_r_session1` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
CREATE TABLE `sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `questionnaire_id` int(10) unsigned NOT NULL,
  `name` varchar(355) NOT NULL,
  `description` varchar(355) DEFAULT NULL,
  `buttontype_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_s_questionnaire1` (`questionnaire_id`),
  CONSTRAINT `fk_s_questionnaire1` FOREIGN KEY (`questionnaire_id`) REFERENCES `questionnaires` (`id`),
  FOREIGN KEY `fk_s_buttontype2` (`buttontype_id`) REFERENCES `buttontypes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(355) NOT NULL,
  `description` varchar(355) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_s_client1` (`client_id`),
  CONSTRAINT `fk_s_client1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL  AUTO_INCREMENT,
  `username` varchar(355) NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `password` varchar(355) NOT NULL,
  `role` varchar(355) NOT NULL,
  `created` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `last_login` datetime(3) DEFAULT CURRENT_TIMESTAMP(3),
  `modified` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_u_client1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `buttontypes`;
CREATE TABLE `buttontypes` (
  `id` int(10) unsigned NOT NULL  AUTO_INCREMENT,
  `text` varchar(355) NOT NULL,
  `type` varchar(355) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `buttonvalues`;
CREATE TABLE `buttonvalues` (
  `id` int(10) unsigned NOT NULL  AUTO_INCREMENT,
  `text_label` varchar(355) NOT NULL,
  `text_value` varchar(355) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `buttontypes_buttonvalues`;
CREATE TABLE `buttontypes_buttonvalues` (
  `buttontype_id` int(10) unsigned NOT NULL,
  `buttonvalue_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`buttontype_id`, `buttonvalue_id`),
FOREIGN KEY (`buttontype_id`) REFERENCES `buttontypes` (`id`),
FOREIGN KEY (`buttonvalue_id`) REFERENCES `buttonvalues` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
