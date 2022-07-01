-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2022 at 09:08 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearningdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `attempts`
--

CREATE TABLE `attempts` (
  `id` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `LessonID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attempts`
--

INSERT INTO `attempts` (`id`, `UserID`, `LessonID`) VALUES
(41, 66, 34);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `BlogID` int(255) NOT NULL,
  `blog_title` varchar(255) DEFAULT NULL,
  `blog_desc` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `UserID` int(11) DEFAULT NULL,
  `timestand` datetime NOT NULL DEFAULT current_timestamp(),
  `short_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`BlogID`, `blog_title`, `blog_desc`, `status`, `UserID`, `timestand`, `short_desc`) VALUES
(100145, 'sssss', '<p>ssssssssssssssssssss</p>', 'approved', 74, '2022-05-08 01:30:21', 'sssssssssssss'),
(100146, 'Lorem ipsum dolor sit amet consectetur', ' adipisicing elit. Amet, voluptates? Lorem ipsum dolor sit amet consectetur adipisicing elit. adipisicing elit. Amet, voluptates? Lorem ipsum dolor sit amet consectetur adipisicing elit.\r\n\r\n adipisicing elit. Amet, voluptates? Lorem ipsum dolor sit amet consectetur adipisicing elit.\r\n\r\n adipisicing elit. Amet, voluptates? Lorem ipsum dolor sit amet consectetur adipisicing elit.\r\n\r\n adipisicing elit. Amet, voluptates? Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'approved', 67, '2022-05-09 14:21:53', ' adipisicing elit. Amet, voluptates? Lorem ipsum dolor sit amet consectetur adipisicing elit. adipisicing elit. Amet, voluptates? Lorem ipsum dolor sit amet consectetur adipisicing elit.'),
(100147, 'Lorem ipsum dolor sit amet consectetur', ' adipisicing elit. Amet, voluptates? Lorem ipsum dolor sit amet consectetur adipisicing elit. adipisicing elit. Amet, voluptates? Lorem ipsum dolor sit amet consectetur adipisicing elit.\r\n\r\n adipisicing elit. Amet, voluptates? Lorem ipsum dolor sit amet consectetur adipisicing elit.\r\n\r\n adipisicing elit. Amet, voluptates? Lorem ipsum dolor sit amet consectetur adipisicing elit.\r\n\r\n adipisicing elit. Amet, voluptates? Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'approved', 67, '2022-05-09 14:22:19', ' adipisicing elit. Amet, voluptates? Lorem ipsum dolor sit amet consectetur adipisicing elit. adipisicing elit. Amet, voluptates? Lorem ipsum dolor sit amet consectetur adipisicing elit.'),
(100148, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\n', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\n', 'approved', 68, '2022-05-09 14:23:06', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\n'),
(100149, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\n', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\n', 'approved', 68, '2022-05-09 14:23:09', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\n'),
(100150, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\n', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\n', 'approved', 69, '2022-05-09 14:23:50', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\n'),
(100151, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\n', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\n', 'approved', 73, '2022-05-09 14:23:50', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\n'),
(100153, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\n', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\n', 'approved', 73, '2022-05-09 14:23:54', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.\r\n\r\n'),
(100155, 's', '<p>s</p>', 'approved', 66, '2022-05-12 00:01:44', 's'),
(100156, 's', '<p>s</p>', 'approved', 66, '2022-05-12 00:01:44', 's'),
(100158, '1', '<p>wwwwwwww</p>', 'approved', 66, '2022-05-15 23:38:37', 'ww');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `CommentID` int(11) NOT NULL,
  `comment_content` text DEFAULT NULL,
  `BlogID` int(11) DEFAULT NULL,
  `LessonID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `timestand` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`CommentID`, `comment_content`, `BlogID`, `LessonID`, `UserID`, `timestand`) VALUES
(180, 'sd', 100155, NULL, 66, '2022-05-11 18:04:17'),
(181, 'zxc', 100155, NULL, 66, '2022-05-11 18:04:30'),
(182, 'xx', 100155, NULL, 66, '2022-05-11 18:04:43'),
(183, 'ssss', 100155, NULL, 66, '2022-05-11 18:06:25'),
(184, 'sss', 100155, NULL, 66, '2022-05-11 18:06:27'),
(185, 'sdf', NULL, 34, 66, '2022-05-15 17:26:39'),
(186, 'fd', NULL, 34, 66, '2022-05-15 17:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `CourseID` int(11) NOT NULL,
  `TeacherID` int(11) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `course_Description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `timastand` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`CourseID`, `TeacherID`, `course_title`, `course_Description`, `price`, `timastand`, `status`, `image`) VALUES
(36, 66, 'Java', '<p>erftetrrrrrrrrrrrr v hhhhhhhhhhhhh</p>', '132', '2022-05-15 17:17:14', 'approved', 'Java.jpg'),
(39, 66, 'JS', '<p>Done</p>', '24', '2022-05-15 17:20:44', 'approved', 'icon4.png');

-- --------------------------------------------------------

--
-- Table structure for table `enrolls`
--

CREATE TABLE `enrolls` (
  `EnrollID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `CourseID` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `points` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrolls`
--

INSERT INTO `enrolls` (`EnrollID`, `StudentID`, `CourseID`, `name`, `email`, `mobile`, `price`, `payment_status`, `points`) VALUES
(30, 66, 36, 'Admin', 'elearningpw2@gmail.com', '23432', 132, 'paid', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `LessonID` int(11) NOT NULL,
  `LessonNo` int(11) NOT NULL,
  `CourseID` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `video` varchar(255) NOT NULL,
  `timestand` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`LessonID`, `LessonNo`, `CourseID`, `title`, `content`, `video`, `timestand`) VALUES
(34, 1, 36, 'Lorem ipsum dolor, ', '<p>Lorem ipsum dolor,</p>', 'Lorem ipsum dolor, .mp4', '2022-05-15 23:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_status`
--

CREATE TABLE `lesson_status` (
  `id` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `LessonID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(15, 68, 67, 'Hello ');

-- --------------------------------------------------------

--
-- Table structure for table `moderators`
--

CREATE TABLE `moderators` (
  `ModeratorID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `CourseID` int(11) DEFAULT NULL,
  `timestand` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `moderators`
--

INSERT INTO `moderators` (`ModeratorID`, `UserID`, `CourseID`, `timestand`) VALUES
(24, 67, 36, '2022-05-15 23:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `n_by` int(11) DEFAULT NULL,
  `n_to` int(11) DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `timestand` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `n_by`, `n_to`, `path`, `content`, `status`, `timestand`) VALUES
(127, 67, 69, '/blog/article/?p=100152', '<b>Sajib Sutradhar</b> commented on your post', 0, '2022-05-10 14:22:02'),
(128, 66, 69, '/blog/article/?p=100152', '<b>Admin</b> commented on your post', 0, '2022-05-10 14:22:33'),
(135, 66, 69, '/blog/article/?p=100152', '<b>Admin</b> commented on your post', 0, '2022-05-10 15:33:54');

-- --------------------------------------------------------

--
-- Table structure for table `private_comment`
--

CREATE TABLE `private_comment` (
  `CommentID` int(11) NOT NULL,
  `LessonID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `comment` text NOT NULL,
  `timestand` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `QuizID` int(11) NOT NULL,
  `LessonID` int(11) DEFAULT NULL,
  `ques` varchar(255) NOT NULL,
  `a` varchar(255) NOT NULL,
  `b` varchar(255) NOT NULL,
  `c` varchar(255) NOT NULL,
  `d` varchar(255) NOT NULL,
  `ans` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`QuizID`, `LessonID`, `ques`, `a`, `b`, `c`, `d`, `ans`) VALUES
(23, 34, 'Lorem ipsum dolor, ?', '111', '222', '333', '444', '1');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `ReplyID` int(11) NOT NULL,
  `reply_content` text DEFAULT NULL,
  `CommentID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `timestand` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`ReplyID`, `reply_content`, `CommentID`, `UserID`, `timestand`) VALUES
(135, 's', 184, 66, '2022-05-12 00:06:29'),
(136, 's', 183, 66, '2022-05-12 00:06:32'),
(137, 'df', 185, 66, '2022-05-15 23:26:41');

-- --------------------------------------------------------

--
-- Table structure for table `subcriber`
--

CREATE TABLE `subcriber` (
  `id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcriber`
--

INSERT INTO `subcriber` (`id`, `email`) VALUES
(13, 'asdad@gmail.com'),
(14, 'elearningpw2@gmail.com'),
(11, 'sajibsd013@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `OTP` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'user',
  `active_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `username`, `email`, `mobile`, `password`, `dob`, `OTP`, `status`, `type`, `active_status`) VALUES
(66, 'Admin', 'elearningpw2@gmail.com', '23432', '$2y$10$GLQ1WUiwwY9s/kSIBnJi4ehRezludJj0p0Nu4B/QHKVGKX06WjMCC', '1999-01-01', '0', 'active', 'admin', 'Active now'),
(67, 'Sajib Sutradhar', 'sajibsd013@gmail.com', '01771147384', '$2y$10$a.DeeBO84JjuNCfNA8Cype8MP40CRHGjQUgsenJjh/tGCJsYvQUcK', '1999-01-25', '0', 'active', 'user', 'Offline now'),
(68, 'Farida Chy', 'faridachy0011@gmail.com', '01661777777', '$2y$10$amd18z55fl9LT.5GyJFRQ.DHhWf/Tt29Yuk7WoyesheUIGWd5ft8a', '1999-06-11', '0', 'active', 'user', ''),
(69, 'Nipa Talukdar', 'nipa1111@gmail.com', '0122332213', '$2y$10$ZQB8I7.PAH0/7V99mFKwaemXuWmKsyF4gUfIv2xaqrLoIAQ.LE5Hu', '1999-03-17', '0', 'active', 'user', ''),
(73, 'Ajhar Ali', 'azhar@gmail.com', '11111111', '$2y$10$Tvx5y808zIs22RsGsKdA5uk4ReV3lm5zXg7qhZ6BphUuJ4P51bDSe', '2022-03-03', '0', 'active', 'user', 'Active now'),
(74, 'Abcd1234', 'abcd1234@gmail.com', '12334243', '$2y$10$28Nn.6F2IZKB6Tx7vFf5V.p1D5d8P2GVtLlLwXNafxY3/Fcea9HsK', '2022-04-01', '0', 'active', 'user', ''),
(76, 'xyz abc', 'xyz@gmail.com', '21322343', '$2y$10$jArl6abeK62/QRr99jxmpuULiIh5yTrdQcNUalokEapBJvpvMjg1m', '2022-05-10', '0', 'active', 'user', 'Active now');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `VoteID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `BlogID` int(11) DEFAULT NULL,
  `CommentID` int(11) DEFAULT NULL,
  `ReplyID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`VoteID`, `UserID`, `BlogID`, `CommentID`, `ReplyID`) VALUES
(144, 66, 100145, NULL, NULL),
(145, 66, 100145, NULL, NULL),
(164, 66, 100146, NULL, NULL),
(165, 66, 100146, NULL, NULL),
(170, 67, 100146, NULL, NULL),
(171, 67, 100146, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attempts`
--
ALTER TABLE `attempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attempts_ibfk_1` (`UserID`),
  ADD KEY `attempts_ibfk_2` (`LessonID`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`BlogID`),
  ADD KEY `blog_ibfk_1` (`UserID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `comments_ibfk_1` (`BlogID`),
  ADD KEY `comments_ibfk_2` (`UserID`),
  ADD KEY `comments_ibfk_3` (`LessonID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`CourseID`),
  ADD KEY `courses_ibfk_1` (`TeacherID`);

--
-- Indexes for table `enrolls`
--
ALTER TABLE `enrolls`
  ADD PRIMARY KEY (`EnrollID`),
  ADD KEY `StudentID` (`StudentID`) USING BTREE,
  ADD KEY `enrolls_ibfk_2` (`CourseID`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`LessonID`),
  ADD KEY `lessons_ibfk_1` (`CourseID`);

--
-- Indexes for table `lesson_status`
--
ALTER TABLE `lesson_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_status_ibfk_1` (`UserID`),
  ADD KEY `lesson_status_ibfk_2` (`LessonID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `moderators`
--
ALTER TABLE `moderators`
  ADD PRIMARY KEY (`ModeratorID`),
  ADD KEY `moderators_ibfk_1` (`UserID`),
  ADD KEY `moderators_ibfk_2` (`CourseID`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_ibfk_1` (`n_by`),
  ADD KEY `notifications_ibfk_2` (`n_to`);

--
-- Indexes for table `private_comment`
--
ALTER TABLE `private_comment`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `LessonID` (`LessonID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`QuizID`),
  ADD KEY `quizzes_ibfk_1` (`LessonID`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`ReplyID`),
  ADD KEY `reply_ibfk_1` (`CommentID`),
  ADD KEY `reply_ibfk_2` (`UserID`);

--
-- Indexes for table `subcriber`
--
ALTER TABLE `subcriber`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`VoteID`),
  ADD KEY `votes_ibfk_1` (`UserID`),
  ADD KEY `votes_ibfk_2` (`BlogID`),
  ADD KEY `votes_ibfk_3` (`CommentID`),
  ADD KEY `votes_ibfk_4` (`ReplyID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attempts`
--
ALTER TABLE `attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `BlogID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100159;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `enrolls`
--
ALTER TABLE `enrolls`
  MODIFY `EnrollID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `LessonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `lesson_status`
--
ALTER TABLE `lesson_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `moderators`
--
ALTER TABLE `moderators`
  MODIFY `ModeratorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `private_comment`
--
ALTER TABLE `private_comment`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `QuizID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `ReplyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `subcriber`
--
ALTER TABLE `subcriber`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `VoteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attempts`
--
ALTER TABLE `attempts`
  ADD CONSTRAINT `attempts_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attempts_ibfk_2` FOREIGN KEY (`LessonID`) REFERENCES `lessons` (`LessonID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`BlogID`) REFERENCES `blog` (`BlogID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`LessonID`) REFERENCES `lessons` (`LessonID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`TeacherID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enrolls`
--
ALTER TABLE `enrolls`
  ADD CONSTRAINT `enrolls_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrolls_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`CourseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`CourseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lesson_status`
--
ALTER TABLE `lesson_status`
  ADD CONSTRAINT `lesson_status_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lesson_status_ibfk_2` FOREIGN KEY (`LessonID`) REFERENCES `lessons` (`LessonID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `moderators`
--
ALTER TABLE `moderators`
  ADD CONSTRAINT `moderators_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `moderators_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`CourseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`n_by`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`n_to`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `private_comment`
--
ALTER TABLE `private_comment`
  ADD CONSTRAINT `private_comment_ibfk_1` FOREIGN KEY (`LessonID`) REFERENCES `lessons` (`LessonID`),
  ADD CONSTRAINT `private_comment_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_ibfk_1` FOREIGN KEY (`LessonID`) REFERENCES `lessons` (`LessonID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`CommentID`) REFERENCES `comments` (`CommentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `votes_ibfk_2` FOREIGN KEY (`BlogID`) REFERENCES `blog` (`BlogID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `votes_ibfk_3` FOREIGN KEY (`CommentID`) REFERENCES `comments` (`CommentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `votes_ibfk_4` FOREIGN KEY (`ReplyID`) REFERENCES `reply` (`ReplyID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
