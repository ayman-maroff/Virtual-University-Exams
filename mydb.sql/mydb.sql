-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2022 at 08:08 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `center-test`
--

CREATE TABLE `center-test` (
  `id` int(11) NOT NULL,
  `Test_id` int(11) NOT NULL,
  `Test_center_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `mt_name` varchar(45) NOT NULL,
  `university_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `mt_name`, `university_id`) VALUES
(1, 'Maths', 1),
(2, 'Music', 1);

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

CREATE TABLE `option` (
  `id` int(11) NOT NULL,
  `correct` tinyint(4) NOT NULL,
  `text` varchar(45) NOT NULL,
  `testing_answers_paper_id` int(11) NOT NULL,
  `Question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`id`, `correct`, `text`, `testing_answers_paper_id`, `Question_id`) VALUES
(3, 1, '99', 1, 2),
(4, 0, '22', 1, 2),
(5, 0, '45', 1, 3),
(6, 1, '56', 1, 3),
(7, 0, '65', 1, 3),
(8, 0, '54', 1, 4),
(9, 0, '65', 1, 4),
(10, 1, '32', 1, 4),
(11, 0, '98', 1, 4),
(12, 1, '0.5', 1, 5),
(13, 0, '0.3', 1, 5),
(14, 0, '0', 1, 5),
(15, 1, '1', 1, 6),
(16, 0, '0.5', 1, 6),
(17, 0, '0', 1, 6),
(18, 1, 'ghjkl;', 1, 7),
(19, 0, 'ertyuio', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `perm` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `question_text` varchar(45) NOT NULL,
  `num_of_answers` int(11) NOT NULL,
  `the_correct_answer` varchar(45) NOT NULL,
  `question_mark` int(11) NOT NULL,
  `Topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question_text`, `num_of_answers`, `the_correct_answer`, `question_mark`, `Topic_id`) VALUES
(2, '11*9?', 2, '99', 5, 1),
(3, '8*7 ?', 3, '56', 5, 1),
(4, '4*8?', 4, '32', 5, 1),
(5, 'cos(60)=?', 3, '0.5', 5, 2),
(6, 'sin(30) =?', 3, '1', 5, 2),
(7, 'yghjkl', 2, 'ghjkl;', 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `question_test`
--

CREATE TABLE `question_test` (
  `idquestion-test` int(11) NOT NULL,
  `Question_id` int(11) NOT NULL,
  `Test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question_test`
--

INSERT INTO `question_test` (`idquestion-test`, `Question_id`, `Test_id`) VALUES
(1, 3, 3),
(2, 5, 3),
(3, 2, 3),
(4, 6, 3),
(5, 4, 3),
(6, 4, 4),
(7, 6, 4),
(8, 3, 4),
(9, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `roleName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `roleName`) VALUES
(1, 'Admin'),
(2, 'Testcenteradmin'),
(3, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `role-permission`
--

CREATE TABLE `role-permission` (
  `Permission_id` int(11) NOT NULL,
  `Role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `st_name` varchar(45) NOT NULL,
  `st_email` varchar(45) NOT NULL,
  `st_phone` varchar(45) DEFAULT NULL,
  `university_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `testing_answers_paper_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `full_mark` int(11) NOT NULL,
  `num_of_questions` int(11) NOT NULL,
  `time` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `Material_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `full_mark`, `num_of_questions`, `time`, `date`, `Material_id`) VALUES
(3, 50, 5, '60', '0000-00-00', 1),
(4, 40, 4, '60', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testing`
--

CREATE TABLE `testing` (
  `answers_paper_id` int(11) NOT NULL,
  `center-test_Test_center_id` int(11) NOT NULL,
  `center-test_Test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testing`
--

INSERT INTO `testing` (`answers_paper_id`, `center-test_Test_center_id`, `center-test_Test_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `test_center`
--

CREATE TABLE `test_center` (
  `id` int(11) NOT NULL,
  `address` varchar(45) NOT NULL,
  `Test_centercol` varchar(45) DEFAULT NULL,
  `university_id` int(11) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_center`
--

INSERT INTO `test_center` (`id`, `address`, `Test_centercol`, `university_id`, `capacity`) VALUES
(1, 'damas', NULL, 1, 50),
(2, 'tartous', NULL, 1, 60);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `tp_name` varchar(45) DEFAULT NULL,
  `Material_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id`, `tp_name`, `Material_id`) VALUES
(1, 'jabra', 1),
(2, 'analysis ', 1),
(3, 'jaz', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `midlename` varchar(45) NOT NULL,
  `phonenumber` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `hashedPasswd` varchar(45) NOT NULL,
  `Role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `email`, `lastname`, `midlename`, `phonenumber`, `gender`, `hashedPasswd`, `Role_id`) VALUES
(1, 'ayman', 'aymnmrf@gmail.com ', 'osama', 'osama', '9784651', 'male', 'c20ad4d76fe97759aa27a0c99bff6710', 1),
(2, 'ali', 'aymnmdlirddff@gmail.com', 'maroff', 'ahmad', '0992720466', 'Male', 'c20ad4d76fe97759aa27a0c99bff6710', 2),
(3, 'ahmad', 'ayddmnmrf@gmail.com', 'maroff', 'aag', '0992720466', 'Male', 'c20ad4d76fe97759aa27a0c99bff6710', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `center-test`
--
ALTER TABLE `center-test`
  ADD PRIMARY KEY (`id`,`Test_id`,`Test_center_id`),
  ADD KEY `fk_center-test_Test1_idx` (`Test_id`),
  ADD KEY `fk_center-test_Test_center1_idx` (`Test_center_id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `material_id_UNIQUE` (`id`);

--
-- Indexes for table `option`
--
ALTER TABLE `option`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_Option_testing1_idx` (`testing_answers_paper_id`),
  ADD KEY `fk_Option_Question1_idx` (`Question_id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `question_id_UNIQUE` (`id`),
  ADD KEY `fk_Question_Topic1_idx` (`Topic_id`);

--
-- Indexes for table `question_test`
--
ALTER TABLE `question_test`
  ADD PRIMARY KEY (`idquestion-test`,`Question_id`,`Test_id`),
  ADD UNIQUE KEY `idquestion-test_UNIQUE` (`idquestion-test`),
  ADD KEY `fk_question-test_Question1_idx` (`Question_id`),
  ADD KEY `fk_question-test_Test1_idx` (`Test_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role-permission`
--
ALTER TABLE `role-permission`
  ADD PRIMARY KEY (`Permission_id`,`Role_id`),
  ADD KEY `fk_role-permission_Permission_idx` (`Permission_id`),
  ADD KEY `fk_role-permission_Role1_idx` (`Role_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id_UNIQUE` (`id`),
  ADD KEY `fk_Student_testing1_idx` (`testing_answers_paper_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `test_id_UNIQUE` (`id`),
  ADD KEY `fk_Test_Material1_idx` (`Material_id`);

--
-- Indexes for table `testing`
--
ALTER TABLE `testing`
  ADD PRIMARY KEY (`answers_paper_id`,`center-test_Test_center_id`,`center-test_Test_id`);

--
-- Indexes for table `test_center`
--
ALTER TABLE `test_center`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `test_center_id_UNIQUE` (`id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idTopic_UNIQUE` (`id`),
  ADD KEY `fk_Topic_Material1_idx` (`Material_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_Role1_idx` (`Role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `center-test`
--
ALTER TABLE `center-test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `option`
--
ALTER TABLE `option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `question_test`
--
ALTER TABLE `question_test`
  MODIFY `idquestion-test` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test_center`
--
ALTER TABLE `test_center`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `center-test`
--
ALTER TABLE `center-test`
  ADD CONSTRAINT `fk_center-test_Test1` FOREIGN KEY (`Test_id`) REFERENCES `test` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_center-test_Test_center1` FOREIGN KEY (`Test_center_id`) REFERENCES `test_center` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `option`
--
ALTER TABLE `option`
  ADD CONSTRAINT `fk_Option_Question1` FOREIGN KEY (`Question_id`) REFERENCES `question` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Option_testing1` FOREIGN KEY (`testing_answers_paper_id`) REFERENCES `testing` (`answers_paper_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_Question_Topic1` FOREIGN KEY (`Topic_id`) REFERENCES `topic` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `question_test`
--
ALTER TABLE `question_test`
  ADD CONSTRAINT `fk_question-test_Question1` FOREIGN KEY (`Question_id`) REFERENCES `question` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_question-test_Test1` FOREIGN KEY (`Test_id`) REFERENCES `test` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `role-permission`
--
ALTER TABLE `role-permission`
  ADD CONSTRAINT `fk_role-permission_Permission` FOREIGN KEY (`Permission_id`) REFERENCES `permission` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_role-permission_Role1` FOREIGN KEY (`Role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_Student_testing1` FOREIGN KEY (`testing_answers_paper_id`) REFERENCES `testing` (`answers_paper_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `fk_Test_Material1` FOREIGN KEY (`Material_id`) REFERENCES `material` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `fk_Topic_Material1` FOREIGN KEY (`Material_id`) REFERENCES `material` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_Role1` FOREIGN KEY (`Role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
