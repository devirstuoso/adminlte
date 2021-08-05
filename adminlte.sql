-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2021 at 08:18 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminlte`
--

-- --------------------------------------------------------

--
-- Table structure for table `home_slider`
--

CREATE TABLE `home_slider` (
  `id` varchar(30) NOT NULL,
  `slider_image` text DEFAULT NULL,
  `slider_header_text` text DEFAULT NULL,
  `slider_subheader_text` text DEFAULT NULL,
  `slider_description_text` text DEFAULT NULL,
  `slider_button` varchar(200) DEFAULT NULL,
  `slider_button_text` varchar(15) DEFAULT NULL,
  `slider_button_hide` tinyint(1) NOT NULL DEFAULT 0,
  `slider_hide` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_slider`
--

INSERT INTO `home_slider` (`id`, `slider_image`, `slider_header_text`, `slider_subheader_text`, `slider_description_text`, `slider_button`, `slider_button_text`, `slider_button_hide`, `slider_hide`) VALUES
('slider1', 'uploads/slider/slider1.png', 'An Institute of Eminence Change', 'University of Delhi is now', '<p style=\"\"></p><p style=\"\"><span style=\"color: rgb(214, 214, 231); font-family: &quot;Source Sans Pro&quot;; font-size: 20px;\">The&nbsp;</span><b style=\"color: rgb(214, 214, 231); font-family: sans-serif; font-size: 14px;\"><span style=\"font-size: 20px; font-family: &quot;Source Sans Pro&quot;;\">University of Delhi</span></b><span style=\"color: rgb(214, 214, 231); font-family: &quot;Source Sans Pro&quot;; font-size: 20px;\">, informally known as&nbsp;</span><b style=\"color: rgb(214, 214, 231); font-family: sans-serif; font-size: 14px;\"><span style=\"font-size: 20px; font-family: &quot;Source Sans Pro&quot;;\">Delhi University</span></b><span style=\"color: rgb(214, 214, 231); font-family: &quot;Source Sans Pro&quot;; font-size: 20px;\">&nbsp;(</span><b style=\"color: rgb(214, 214, 231); font-family: sans-serif; font-size: 14px;\"><span style=\"font-size: 20px; font-family: &quot;Source Sans Pro&quot;;\">DU</span></b><span style=\"color: rgb(214, 214, 231); font-family: &quot;Source Sans Pro&quot;; font-size: 20px;\">), is a&nbsp;</span><span style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(214, 214, 231); font-family: &quot;Source Sans Pro&quot;; font-size: 20px;\">collegiate</span><span style=\"color: rgb(214, 214, 231); font-family: &quot;Source Sans Pro&quot;; font-size: 20px;\">&nbsp;</span><span style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(214, 214, 231); font-family: &quot;Source Sans Pro&quot;; font-size: 20px;\">public</span><span style=\"color: rgb(214, 214, 231); font-family: &quot;Source Sans Pro&quot;; font-size: 20px;\">&nbsp;</span><span style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(214, 214, 231); font-family: &quot;Source Sans Pro&quot;; font-size: 20px;\">central university</span><span style=\"color: rgb(214, 214, 231); font-family: &quot;Source Sans Pro&quot;; font-size: 20px;\">&nbsp;located in&nbsp;</span><span style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(214, 214, 231); font-family: &quot;Source Sans Pro&quot;; font-size: 20px;\">New Delhi</span><span style=\"color: rgb(214, 214, 231); font-family: &quot;Source Sans Pro&quot;; font-size: 20px;\">,&nbsp;</span><span style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(214, 214, 231); font-family: &quot;Source Sans Pro&quot;; font-size: 20px;\">India</span><span style=\"color: rgb(214, 214, 231); font-family: &quot;Source Sans Pro&quot;; font-size: 20px;\">. It was founded in 1922 by an Act of the&nbsp;</span><span style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(214, 214, 231); font-family: &quot;Source Sans Pro&quot;; font-size: 20px;\">Central Legislative Assembly</span><span style=\"color: rgb(214, 214, 231); font-family: &quot;Source Sans Pro&quot;; font-size: 20px;\">&nbsp;and is recognized as an&nbsp;</span><a href=\"https://en.wikipedia.org/wiki/Institutes_of_Eminence\" title=\"\" style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif; font-size: 14px;\"><span style=\"font-size: 20px; font-family: &quot;Source Sans Pro&quot;;\"><font color=\"#b5a5d6\" style=\"\">Institute of Eminence</font></span></a><span style=\"color: rgb(181, 165, 214); font-family: &quot;Source Sans Pro&quot;; font-size: 20px;\">&nbsp;</span><span style=\"color: rgb(214, 214, 231); font-family: &quot;Source Sans Pro&quot;; font-size: 20px;\">(IoE) by the&nbsp;</span><a href=\"https://en.wikipedia.org/wiki/University_Grants_Commission_(India)\" title=\"University Grants Commission (India)\" style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif; font-size: 14px;\"><span style=\"font-size: 20px; font-family: &quot;Source Sans Pro&quot;;\"><font color=\"#b5a5d6\" style=\"\">University Grants Commission</font></span></a><span style=\"color: rgb(214, 214, 231); font-family: &quot;Source Sans Pro&quot;; font-size: 20px;\">&nbsp;(UGC).</span><br></p><p style=\"\"><span style=\"color: rgb(214, 214, 231); font-family: &quot;Source Sans Pro&quot;; font-size: 20px;\"><br></span><br></p>', 'about', 'Know more', 0, 1),
('slider2', 'uploads/slider/slider2.png', 'IOE-DU', 'Join us in achieving new milestones', '<blockquote style=\"line-height: 1;\" class=\"blockquote\"><font color=\"#cee7f7\"><b>Beginning of new era,&nbsp;</b></font><span style=\"font-family: &quot;Source Sans Pro&quot;; font-size: 20px; letter-spacing: 0.5px; text-align: justify;\"><b style=\"\"><font color=\"#cee7f7\" style=\"\">Institutions of Eminence scheme has been launched in order to implement the commitment of the Government to empower the Higher Educational Institutions and to help them become world class teaching and research institutions, as announced by the Hon’ble Finance Minister in his budget speech of 2016. Ten public and ten private institutions are to be identified to emerge as world-class Teaching and Research Institutions. This will enhance affordable access to high quality education for ordinary Indians.</font></b></span></blockquote>', '', '', 1, 0),
('slider3', 'uploads/slider/slider3.png', 'IOE-DU', 'Let be together', '<p><b><span style=\"font-family: &quot;Comic Sans MS&quot;;\"><font color=\"#ffffff\">Together we can achieve every milestones.</font></span></b></p>', '', '', 1, 0),
('slider4', NULL, '', '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1624815063),
('m130524_201442_init', 1624815066),
('m190124_110200_add_verification_token_column_to_user_table', 1624815066);

-- --------------------------------------------------------

--
-- Table structure for table `news_events`
--

CREATE TABLE `news_events` (
  `id` varchar(30) NOT NULL,
  `ne_type` varchar(10) NOT NULL,
  `ne_title` varchar(200) NOT NULL,
  `ne_link` varchar(300) DEFAULT NULL COMMENT '* Only for external news',
  `ne_image` varchar(300) DEFAULT NULL,
  `ne_paragraph` varchar(600) DEFAULT NULL,
  `ne_start_date` date NOT NULL,
  `ne_end_date` date NOT NULL,
  `ne_start_time` time NOT NULL,
  `ne_end_time` time NOT NULL,
  `ne_hide` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_events`
--

INSERT INTO `news_events` (`id`, `ne_type`, `ne_title`, `ne_link`, `ne_image`, `ne_paragraph`, `ne_start_date`, `ne_end_date`, `ne_start_time`, `ne_end_time`, `ne_hide`) VALUES
('newsevents1', 'events', 'Event 1', NULL, 'uploads/news_events/newsevents1.png', 'Hopes and dreams were dashed that day. It should have been expected,<b style=\"background-color: rgb(74, 16, 49);\"><font color=\"#ffffff\"> but it still came as a shock</font></b>. The warning signs had been ignored in favor of the possibility, however remote, that it could actually happen. That possibility had grown from hope to an undeniable belief it must be destiny. That was until it wasn\'t and the hopes and dreams came crashing down', '2021-07-22', '0000-00-00', '03:04:45', '03:04:45', 1),
('newsevents2', 'events', 'Event 2', NULL, 'uploads/news_events/newsevents2.png', '', '2021-07-24', '0000-00-00', '07:00:00', '00:00:00', 0),
('newsevents3', 'events', 'Event 2', NULL, 'uploads/news_events/newsevents3.png', 'Hopes and dreams were dashed that day. It should have been expected, but it still came as a shock. The warning signs had been ignored in favor of the possibility, however remote, that it could actually happen. That possibility had grown from hope to an undeniable belief it must be destiny. That was until it wasn\'t and the hopes and dreams came crashing down', '2021-07-17', '2021-07-31', '09:00:00', '12:00:00', 0),
('newsevents4', 'events', 'Event 4', NULL, 'uploads/news_events/newsevents4.png', '', '2021-07-31', '2021-08-03', '03:00:00', '07:00:00', 0),
('newsevents5', 'news', 'News1', NULL, 'uploads/news_events/newsevents5.png', '', '2021-07-22', '0000-00-00', '13:16:50', '13:16:50', 0),
('newsevents6', 'events', 'Event 5', NULL, 'uploads/news_events/newsevents6.png', '', '2021-08-07', '2021-08-19', '15:32:20', '15:32:20', 0),
('newsevents7', 'events', 'Event 6', NULL, 'uploads/news_events/newsevents7.png', '', '0000-00-00', '0000-00-00', '15:34:25', '15:34:25', 0),
('newsevents8', 'news', 'We are open for doctoral joining ', NULL, 'uploads/news_events/newsevents8.png', '', '2021-07-24', '2021-07-31', '14:37:35', '14:37:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `updates_panel`
--

CREATE TABLE `updates_panel` (
  `id` varchar(50) NOT NULL,
  `updates_title` varchar(200) NOT NULL,
  `updates_link` varchar(200) DEFAULT NULL,
  `updates_hide` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `updates_panel`
--

INSERT INTO `updates_panel` (`id`, `updates_title`, `updates_link`, `updates_hide`) VALUES
('updates1', 'SBI consortium sold Vijay Mallya’s shares worth Rs 5,825 crore, recovered 70% loss', NULL, 0),
('updates2', 'UK High Court refuses Nirav Modi’s application to appeal against extradition to India', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `updates_panel_content`
--

CREATE TABLE `updates_panel_content` (
  `id` varchar(30) NOT NULL,
  `update_id` varchar(30) NOT NULL,
  `updates_content_picture` varchar(200) NOT NULL,
  `updates_content_paragraph` text NOT NULL DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `updates_panel_content`
--

INSERT INTO `updates_panel_content` (`id`, `update_id`, `updates_content_picture`, `updates_content_paragraph`) VALUES
('updatesContent3', 'updates1', 'uploads/updates_content/updatesContent3.png', 'The leather jacked showed the scars of being his favorite for years. It wore those scars with pride, feeling that they enhanced his presence rather than diminishing it. The scars gave it character and had not overwhelmed to the point that it had become ratty. The jacket was in its prime and it knew it.'),
('updatesContent5', 'updates1', 'uploads/updates_content/updatesContent5.png', '\'updates-panel-content/create\' modified'),
('updatesContent8', 'updates2', 'uploads/updates_content/updatesContent8.png', 'Hopes and dreams were dashed that day. It should have been expected, but it still came as a shock. The warning signs had been ignored in favor of the possibility, however remote, that it could actually happen. That possibility had grown from hope to an undeniable belief it must be destiny. That was until it wasn\'t and the hopes and dreams came crashing down'),
('updatesContent9', 'updates2', 'uploads/updates_content/updatesContent9.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(2, 'devanshu', 'UIKRU2aWK6hqJhgPjrhQp--VbLKNo88q', '$2y$13$ouwxm4cAYaTI18hDxTYM0OxhsLRed0d5nAcJsSLwZEA3uin19yIpu', 'JFEUUeHq0OLs9TWDKlY3L_Yh12HFATb4_1626895234', 'devanshuverma158@gmail.com', 10, 0, 1626895234, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `home_slider`
--
ALTER TABLE `home_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `news_events`
--
ALTER TABLE `news_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `updates_panel`
--
ALTER TABLE `updates_panel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `updates_panel_content`
--
ALTER TABLE `updates_panel_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updates-content` (`update_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `updates_panel_content`
--
ALTER TABLE `updates_panel_content`
  ADD CONSTRAINT `updates-content` FOREIGN KEY (`update_id`) REFERENCES `updates_panel` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
