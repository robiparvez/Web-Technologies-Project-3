
--
-- Database: `wfc`
--
CREATE DATABASE `wfc`;
USE `wfc`;
-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `course_id`, `date`) VALUES
(1, 2, '2015-11-03'),
(2, 2, '2015-11-05'),
(3, 2, '2015-11-07'),
(4, 2, '2015-11-09'),
(5, 2, '2015-11-11'),
(6, 2, '2015-10-01'),
(8, 2, '2016-11-19'),
(19, 4, '2015-11-05'),
(20, 4, '2015-11-14'),
(21, 2, '2015-11-26');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`) VALUES
(2, 'PL 1'),
(3, 'algorithm'),
(4, 'atp1');

-- --------------------------------------------------------

--
-- Table structure for table `student_attended_class`
--

CREATE TABLE IF NOT EXISTS `student_attended_class` (
  `student_id` varchar(512) NOT NULL,
  `class_id` int(11) NOT NULL,
  `attendance` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_attended_class`
--

INSERT INTO `student_attended_class` (`student_id`, `class_id`, `attendance`) VALUES
('12-21238-2', 1, 1),
('12-21238-2', 2, 1),
('12-21238-2', 3, 1),
('12-21238-2', 4, 0),
('12-21238-2', 5, 0),
('12-21238-2', 6, 1),
('12-21238-2', 7, 0),
('12-21238-2', 8, 0),
('12-21238-21', 9, 0),
('12-21238-21', 10, 0),
('12-21238-21', 11, 0),
('12-21238-21', 12, 0),
('12-21238-21', 13, 0),
('12-21238-21', 14, 0),
('12-21238-21', 15, 0),
('12-21238-21', 16, 0),
('12-21238-21', 17, 0),
('12-21238-21', 18, 0),
('12-21238-21', 19, 1),
('12-21238-21', 20, 0),
('12-21238-21', 6, 0),
('12-21238-21', 1, 0),
('12-21238-21', 2, 0),
('12-21238-21', 3, 0),
('12-21238-21', 4, 0),
('12-21238-21', 5, 0),
('12-21238-21', 8, 0),
('12-21238-2', 21, 0),
('12-21238-21', 21, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_has_course`
--

CREATE TABLE IF NOT EXISTS `student_has_course` (
  `student_id` varchar(512) NOT NULL,
  `course_id` int(11) NOT NULL,
  `quiz1` int(11) NOT NULL,
  `quiz2` int(11) NOT NULL,
  `quiz3` int(11) NOT NULL,
  `improvementQuiz` int(11) NOT NULL,
  `term` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_has_course`
--

INSERT INTO `student_has_course` (`student_id`, `course_id`, `quiz1`, `quiz2`, `quiz3`, `improvementQuiz`, `term`) VALUES
('12-21238-2', 2, 112, 1231231, 123123, 123, 123),
('12-21238-21', 2, 123123, 123123, 0, 0, 0),
('12-21238-21', 4, 12, 11, 13, 14, 15);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` varchar(512) NOT NULL,
  `name` varchar(512) NOT NULL,
  `password` varchar(512) NOT NULL,
  `type` int(11) NOT NULL,
  `address` varchar(512) NOT NULL,
  `phone` varchar(512) NOT NULL,
  `email` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `type`, `address`, `phone`, `email`) VALUES
('12-21238-2', 'Annoor', '', 2, '', '', ''),
('12-21238-21', 'a', '', 2, '', '', ''),
('123-1231-23', 'Kuddus Ali', '', 1, '', '', ''),
('2131254124', 'Sojib sir', '', 1, '', '', ''),
('admin', 'boka manush', '', 0, '', '', ''),
('hafizsir', 'asd', '', 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_teaches_course`
--

CREATE TABLE IF NOT EXISTS `user_teaches_course` (
  `user_id` varchar(512) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_teaches_course`
--

INSERT INTO `user_teaches_course` (`user_id`, `course_id`) VALUES
('123-1231-23', 2),
('2131254124', 3),
('hafizsir', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
