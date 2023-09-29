-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 08, 2012 at 09:12 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `care_group_db`
--
CREATE DATABASE `care_group_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `care_group_db`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `password` varchar(45) NOT NULL,
  `Admin` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `password`, `Admin`) VALUES
(1, 'ADMIN123', 'ADMINISTRATOR');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `PaitentID` varchar(45) NOT NULL,
  `Docid` varchar(20) NOT NULL,
  `aDate` date NOT NULL,
  `Description` varchar(150) NOT NULL,
  `Title` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `FK_appointments_pat` (`PaitentID`),
  KEY `FK_appointments_doc` (`Docid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `PaitentID`, `Docid`, `aDate`, `Description`, `Title`) VALUES
(1, 'johndoe', 'CGDOC101', '2013-03-02', 'Monthly Medical check up', 'Medical CheckUP'),
(2, 'johndoe', 'CGDOC102', '2013-03-02', 'X-ray Scan', 'Scan'),
(3, 'janedoe', 'CGDOC101', '2013-02-02', 'follow up on previous appointment\r\n', 'Follow up'),
(4, 'janedoe', 'cgdoc103', '2013-03-05', 'Monthly Medical Test', 'Medical Test');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `Name` varchar(45) NOT NULL,
  `Headline` varchar(100) NOT NULL,
  `Content_Text` text NOT NULL,
  `Author` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `Name`, `Headline`, `Content_Text`, `Author`) VALUES
(1, 'Diabetes Treatments', 'Diabetes Could Be Reduced With Aggressive Treatment', 'Treating pre-diabetes early and aggressively with intensive lifestyle changes or medication could be an effective way to significantly reduce the chances of developing type 2 diabetes later. \r\n\r\nThis was the implication of a new study reported online first in The Lancet on Saturday that shows even when people with pre-diabetes achieved a temporary return to normal glucose levels, they were 56% less likely to develop type 2 diabetes 5.7 years later.\r\n\r\nThe Diabetes Prevention Program Outcomes Study (DPPOS) report is part of a Lancet theme issue on diabetes. Several of the papers were also presented at the American Diabetes Association 72nd Scientific Sessions, which is taking place at Philadelphia in the US between 8 and 12 June.\r\n\r\nPre-diabetes is considered a "high risk state" for overt type 2 diabetes. In pre-diabetes, blood glucose levels are higher than normal, but not as high as in diabetes.\r\n\r\nThe US Centers for Disease Control and Prevention (CDC) estimate that 79 million Americans, over a third of the adult population, have pre-diabetes. About one in ten people with pre-diabetes goes on to develop full blown diabetes. Thus finding new ways to successfully reduce pre-diabetes could slow the growth of the diabetes epidemic.\r\n\r\nThe DPPOS is a long term research programme that is continuing to monitor 3,000 patients that took part in the Diabetes Prevention Programme (DPP) in the US. All the patients had pre-diabetes and were therefore at high risk of developing type 2 diabetes.\r\n\r\nIn this analysis, the data covered patients randomized to one of three groups: 736 to intensive lifestyle intervention, 647 to the pre-diabetes drug metformin, and 607 to placebo.\r\n\r\nPrevious analysis of the data had already shown that changes to lifestyle and medication can effectively reduce the chance of pre-diabetes progressing to full blown disease.\r\n\r\nBut this latest study analyzed the data a step further: it looked at those patients who not only did not progress to diabetes, but whose glucose levels actually returned to normal at some point during the period they were being followed.\r\n\r\nThe results showed that those patients had a 56% reduction in progression to diabetes during 5.7 years of follow up. This was regardless of what caused the return to normal glucose, and the reduction was the same even when the return was only temporary. \r\n\r\nThey also showed that the intensive lifestyle intervention patients whose glucose levels never returned to normal were the ones most likely to develop diabetes, compared to the controls.\r\n\r\nThe authors conclude that:\r\n\r\n"... prediabetes is a high-risk state for diabetes, especially in patients who remain with prediabetes despite intensive lifestyle intervention. Reversion to normal glucose regulation, even if transient, is associated with a significantly reduced risk of future diabetes independent of previous treatment group."\r\n\r\nThe findings have important implications for policymakers and those who plan strategies for reducing diabetes. Lead author Dr Leigh Perreault of the University of Colorado Anschutz Medical Campus in the US, told the press:\r\n\r\n"This analysis draws attention to the significant long-term reduction in diabetes risk when someone with prediabetes returns to normal glucose regulation, supporting a shift in the standard of care to early and aggressive glucose-lowering treatment in patients at highest risk."\r\n\r\nIn a Comment article in the same issue of the journal, Dr Natalia Yakubovich of McMaster University, Canada, writes: \r\n\r\n"... identification of regression to normal glucose regulation could be an important way to stratify people into those at higher and lower risk of progression to diabetes. Such stratification could therefore identify individuals for whom additional treatment might be needed to prevent diabetes or to slow down disease progression."\r\n\r\nBut, Yakubovich also notes that these findings on their own are not enough, more work would be needed to cause a revision of diabetes prevention strategies:\r\n\r\n"Factors that predict regression to normal glucose regulation, what makes this regression temporary or sustained, and whether regression reduces long-term outcomes are all questions that need further research."\r\n\r\nHowever:\r\n\r\n"The results of such research might substantially change the therapeutic strategy from diabetes prevention and lifelong glucose lowering treatment to induction of regression and monitoring for relapse," she added.', 'Catharine Paddock PhD '),
(2, 'Junk Foods', 'Junk Food May Be More Appealing To Tired Brain', 'A new study that used brain scans of people who had not had enough sleep suggests junk food may be more appealing to tired brains. \r\n\r\nScientists found that when normal weight volunteers looked at unhealthy food during a period of sleep restriction, the reward centers in their brains were more active than when they looked at the pictures after having slept regularly.\r\n\r\nThe researchers, from St Lukes - Roosevelt Hospital Center and Columbia University in New York, were using functional magnetic resonance imaging (fMRI) to better understand the link between sleep restriction and obesity.\r\n\r\nThey compared brain scans of 25 male and female volunteers when they were shown images of healthy and unhealthy foods after five nights of sleep restriction (no more than four hours of sleep a night) and regular sleep (up to 9 hours a night).\r\n\r\nThe unhealthy foods included nutrient poor foods such as candy and pepperoni pizza, and the healthy foods included nutrient rich foods such as oatmeal, fruits and vegetables. \r\n\r\nThe study findings were presented last weekend at SLEEP 12, the 26th annual meeting of the Associated Professional Sleep Societies (APSS) in Boston.\r\n\r\nPrincipal investigator Dr Marie-Pierre St-Onge, a Research Associate with the New York Obesity Research Center, told the press:\r\n\r\n"The same brain regions activated when unhealthy foods were presented were not involved when we presented healthy foods."\r\n\r\n"The unhealthy food response was a neuronal pattern specific to restricted sleep. This may suggest greater propensity to succumb to unhealthy foods when one is sleep restricted," she added.\r\n\r\nSt-Onge said the findings support the idea that insufficient sleep affects appetite regulation and obesity.\r\n\r\nPrevious studies have already shown that restricted sleep makes people tend to eat more, and that people report a greater desire for sweet and salty food when they have been sleep-deprived. \r\n\r\nThe study also showed that participants ate more overall and ate more fat after restricted sleep than they did after regular sleep.\r\n\r\nFunds from the National Institutes of Health (NIH) helped pay for the study.', 'Catharine Paddock PhD');

-- --------------------------------------------------------

--
-- Table structure for table `doc_schedule`
--

CREATE TABLE `doc_schedule` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `DocID` varchar(20) NOT NULL,
  `Title` varchar(45) NOT NULL,
  `DateAP` date NOT NULL,
  `Description` varchar(150) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `FK_doc_schedule_1` (`DocID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `doc_schedule`
--

INSERT INTO `doc_schedule` (`id`, `DocID`, `Title`, `DateAP`, `Description`) VALUES
(23, 'cgdoc103', 'Medical Conference', '2012-08-03', 'Attending a Medical Confrence'),
(24, 'cgdoc103', 'Vacation', '2013-12-08', 'Goning on vaction'),
(25, 'cgdoc103', 'Vacation', '2013-12-08', 'Goning on vaction');

-- --------------------------------------------------------

--
-- Table structure for table `doc_types`
--

CREATE TABLE `doc_types` (
  `spec_id` varchar(30) NOT NULL,
  `Description` varchar(100) NOT NULL,
  PRIMARY KEY  (`spec_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc_types`
--

INSERT INTO `doc_types` (`spec_id`, `Description`) VALUES
('Allergist', 'These are the doctors who treat different types of allergies as well as disorders of the immune syst'),
('Andrologists', 'These are the doctors who diagnose and treat disorders of male reproductive system.'),
('Anesthesiologists', 'They are the doctors who are specialists in anesthesia. These doctors study and administer anestheti'),
('Audiologists', 'They are doctors who treat patients having different ear problems and help children with deafness an'),
('Cardiologist', 'They are doctors who are specialists of the heart. They diagnose and treat diseases of the heart alo'),
('Dentists', 'These doctors are specialized in tooth extraction and due to their methods; they are most feared by '),
('Dermatologists', 'They are doctors who study and treat the ailments related to skin. They study the structure, functio'),
('Endocrinologists', 'They are doctors who study diseases of the endocrine system as well as the glands such as thyroid pr'),
('Epidemiologists', 'They are also called â€˜disease detectivesâ€™. They study diseases and find ways to prevent diseases'),
('Family Practician', 'They are the friendly neighborhood doctors. They are general physicians who treat people of all ages'),
('Gastroenterologists', 'They are the doctors who are specialists of gastroenterology. They study and treat diseases related '),
('Gynecologists', 'They are the doctors who study and treat diseases related to female reproductive system.'),
('Hematologists', 'They are the doctors who study blood and related diseases'),
('Hepatologists', 'They are the doctors who study and treat liver diseases'),
('Immunologists', 'They are the doctors who study and treat the immune system and the diseases related to it'),
('Internists', 'They are the doctors who study the prevention and treatment of diseases which are adult in nature. T'),
('Microbiologists', 'They are the doctors who are specialized in infectious diseases and study the cause, diagnose and tr'),
('Neonatologist', 'They are the doctors who provide medical care for newborn babies who are premature and also critical'),
('Nephrologist', 'They are the doctors who treat diseases and problems of kidneys'),
('Oncologist', 'An oncologist is a doctor who treats cancer patients.'),
('Pediatricians', 'They are the doctors who study and treat diseases related to infants, children as well as adolescent'),
('Perinatologist', 'They are the doctors who are experts in the care and treatment of high risk pregnancies'),
('Physiologists', 'They are the doctors who are life science doctors specializing in physiology'),
('Plastic Surgeon', ' Such doctors perform cosmetic surgery in order to repair structural problems of skin that may alter'),
('Veterinarian', 'The veterinary doctors are the doctors who treat animals and their diseases. Many types of veterinar');

-- --------------------------------------------------------

--
-- Table structure for table `doctors_table`
--

CREATE TABLE `doctors_table` (
  `DocID` varchar(20) NOT NULL,
  `Location_ID` varchar(10) NOT NULL,
  `spec_id` varchar(30) NOT NULL,
  `Description` varchar(100) default NULL,
  `Password` varchar(45) NOT NULL default 'PASSWORD',
  PRIMARY KEY  (`DocID`),
  KEY `FK_doctors_spec` (`spec_id`),
  KEY `FK_doctors_location` (`Location_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors_table`
--

INSERT INTO `doctors_table` (`DocID`, `Location_ID`, `spec_id`, `Description`, `Password`) VALUES
('CGDOC101', 'ABJ', 'Allergist', 'Phd From Havard University', 'PASSWORD'),
('CGDOC102', 'LAG', 'Cardiologist', 'Graduated From the UCLA, Los Angeles', 'PASSWORD'),
('CGDOC103', 'PHC', 'Immunologists', 'Jason Gilmore is founder of W.J. Gilmore LLC An d has been active since early 1995', 'PASSWORD'),
('CGDOC104', 'NYC', 'Dentists', 'Keith Pope has over ten years of experience in medical science and\r\nhad a keen interest in skydiving', 'PASSWORD');

-- --------------------------------------------------------

--
-- Table structure for table `location_table`
--

CREATE TABLE `location_table` (
  `location_ID` varchar(10) NOT NULL,
  `Location_Name` varchar(45) NOT NULL,
  `Country` varchar(65) NOT NULL,
  PRIMARY KEY  (`location_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_table`
--

INSERT INTO `location_table` (`location_ID`, `Location_Name`, `Country`) VALUES
('ABJ', 'ABUJA', 'NIGERIA'),
('LAG', 'LAGOS', 'NIGERIA'),
('NYC', 'NEW YORK CITY', 'UNITED STATES'),
('PHC', 'PORT-HARCOURT', 'NIGERIA');

-- --------------------------------------------------------

--
-- Table structure for table `paitent_table`
--

CREATE TABLE `paitent_table` (
  `PaitentID` varchar(20) NOT NULL,
  `bloodgroup` varchar(25) default NULL,
  `genotype` varchar(45) default NULL,
  `height` varchar(45) default NULL,
  `weight` varchar(45) default NULL,
  `allergies` varchar(45) default NULL,
  `Password` varchar(45) NOT NULL,
  `Location_ID` varchar(10) default NULL,
  PRIMARY KEY  (`PaitentID`),
  KEY `FK_paitent_location` (`Location_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paitent_table`
--

INSERT INTO `paitent_table` (`PaitentID`, `bloodgroup`, `genotype`, `height`, `weight`, `allergies`, `Password`, `Location_ID`) VALUES
('janedoe', 'O', 'AS', '5.9', '110', 'NONE', 'PASSWORD', NULL),
('JohnDoe', 'O', 'AS', '5.7', '70', 'NONE', 'password', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `First_Name` varchar(45) NOT NULL,
  `Last_Name` varchar(45) NOT NULL,
  `Other_Names` varchar(45) NOT NULL,
  `Gender` varchar(8) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `Mobile_No` decimal(18,0) NOT NULL,
  `EmailAddy` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `DocID` varchar(20) default NULL,
  `PaitentID` varchar(20) default NULL,
  `User_Type` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `FK_users_doctor` (`DocID`),
  KEY `FK_users_table_1` (`EmailAddy`),
  KEY `FK_users_patient` (`PaitentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`id`, `First_Name`, `Last_Name`, `Other_Names`, `Gender`, `Address`, `Mobile_No`, `EmailAddy`, `DOB`, `DocID`, `PaitentID`, `User_Type`) VALUES
(6, 'John', 'Doe', '', 'Male', 'Lagos, Nigeria', '80123456789', 'johndoe@gmail.com', '1997-04-02', NULL, 'JohnDoe', 'USER'),
(7, 'Forrest', 'Lyman', 'Sinclair', 'Male', 'Reg, Offica Elite Auto House,\r\n54,Sir M Vasanji Toad', '400093', 'flyman@yahoo.com', '1966-03-04', 'CGDOC101', NULL, 'DOCTOR'),
(8, 'Wil', 'Sinclair', '', 'Female', 'U. A. E. DUBAI', '9001233568', 'wilsinclair@hotmail.com', '1977-12-13', 'CGDOC102', NULL, 'DOCTOR'),
(9, 'Jason', 'Gilmore', '', 'Male', '1373 Grandview Avenue, Suite 214\r\nColumbus, Ohio 43212', '70069822', 'jgil@hotmail.com', '1967-04-16', 'cgdoc103', NULL, 'DOCTOR'),
(10, 'Keith', 'Pope', '', 'Female', '32 Lincoln Road\r\nOlton\r\nBirmingham, B27 6PA, UK.', '800876543', 'pope_k@gmail.com', '1973-10-16', 'CGDOC104', NULL, 'DOCTOR'),
(11, 'John', 'Doe', 'Eve', 'Female', 'Lagos, Nigeira', '80123456789', 'johndoe@gmail.com', '1900-06-02', NULL, 'janedoe', 'USER');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `FK_appointments_doc` FOREIGN KEY (`Docid`) REFERENCES `doctors_table` (`DocID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_appointments_pat` FOREIGN KEY (`PaitentID`) REFERENCES `paitent_table` (`PaitentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doc_schedule`
--
ALTER TABLE `doc_schedule`
  ADD CONSTRAINT `FK_doc_schedule_1` FOREIGN KEY (`DocID`) REFERENCES `doctors_table` (`DocID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctors_table`
--
ALTER TABLE `doctors_table`
  ADD CONSTRAINT `FK_doctors_location` FOREIGN KEY (`Location_ID`) REFERENCES `location_table` (`location_ID`),
  ADD CONSTRAINT `FK_doctors_spec` FOREIGN KEY (`spec_id`) REFERENCES `doc_types` (`spec_id`);

--
-- Constraints for table `paitent_table`
--
ALTER TABLE `paitent_table`
  ADD CONSTRAINT `FK_paitent_location` FOREIGN KEY (`Location_ID`) REFERENCES `location_table` (`location_ID`);

--
-- Constraints for table `users_table`
--
ALTER TABLE `users_table`
  ADD CONSTRAINT `FK_users_doctor` FOREIGN KEY (`DocID`) REFERENCES `doctors_table` (`DocID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_users_paitent` FOREIGN KEY (`PaitentID`) REFERENCES `paitent_table` (`PaitentID`) ON DELETE CASCADE ON UPDATE CASCADE;
