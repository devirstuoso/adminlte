-- -------------------------------------------
SET AUTOCOMMIT=0;
START TRANSACTION;
SET SQL_QUOTE_SHOW_CREATE = 1;
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
-- -------------------------------------------
-- -------------------------------------------
-- START BACKUP
-- -------------------------------------------
-- -------------------------------------------
-- TABLE `auth_assignment`
-- -------------------------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `auth_item`
-- -------------------------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `auth_item_child`
-- -------------------------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `auth_rule`
-- -------------------------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `career`
-- -------------------------------------------
DROP TABLE IF EXISTS `career`;
CREATE TABLE IF NOT EXISTS `career` (
  `id` varchar(30) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `content` text NOT NULL,
  `download_link` varchar(300) NOT NULL,
  `apply_link` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------
-- TABLE `contact_form`
-- -------------------------------------------
DROP TABLE IF EXISTS `contact_form`;
CREATE TABLE IF NOT EXISTS `contact_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------
-- TABLE `gov_council`
-- -------------------------------------------
DROP TABLE IF EXISTS `gov_council`;
CREATE TABLE IF NOT EXISTS `gov_council` (
  `id` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(300) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------
-- TABLE `home_slider`
-- -------------------------------------------
DROP TABLE IF EXISTS `home_slider`;
CREATE TABLE IF NOT EXISTS `home_slider` (
  `id` varchar(30) NOT NULL,
  `slider_image` text DEFAULT NULL,
  `slider_header_text` text DEFAULT NULL,
  `slider_subheader_text` text DEFAULT NULL,
  `slider_description_text` text DEFAULT NULL,
  `slider_button` varchar(200) DEFAULT NULL,
  `slider_button_text` varchar(15) DEFAULT NULL,
  `slider_button_hide` tinyint(1) NOT NULL DEFAULT 0,
  `slider_hide` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------
-- TABLE `leadership`
-- -------------------------------------------
DROP TABLE IF EXISTS `leadership`;
CREATE TABLE IF NOT EXISTS `leadership` (
  `id` varchar(10) NOT NULL,
  `photograph` varchar(100) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `postition` varchar(30) NOT NULL,
  `description` text NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------
-- TABLE `migration`
-- -------------------------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------
-- TABLE `news_events`
-- -------------------------------------------
DROP TABLE IF EXISTS `news_events`;
CREATE TABLE IF NOT EXISTS `news_events` (
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
  `ne_hide` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------
-- TABLE `school_committee`
-- -------------------------------------------
DROP TABLE IF EXISTS `school_committee`;
CREATE TABLE IF NOT EXISTS `school_committee` (
  `id` varchar(30) NOT NULL,
  `school_id` varchar(30) NOT NULL,
  `name` varchar(300) NOT NULL,
  `position` varchar(500) NOT NULL,
  `sort_order` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------
-- TABLE `school_gov_council`
-- -------------------------------------------
DROP TABLE IF EXISTS `school_gov_council`;
CREATE TABLE IF NOT EXISTS `school_gov_council` (
  `id` varchar(30) NOT NULL,
  `school_id` varchar(30) NOT NULL,
  `name` varchar(300) NOT NULL,
  `position` varchar(500) NOT NULL,
  `sort_order` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------
-- TABLE `school_home`
-- -------------------------------------------
DROP TABLE IF EXISTS `school_home`;
CREATE TABLE IF NOT EXISTS `school_home` (
  `id` varchar(30) NOT NULL,
  `school_id` varchar(30) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `sort_order` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------
-- TABLE `school_obj`
-- -------------------------------------------
DROP TABLE IF EXISTS `school_obj`;
CREATE TABLE IF NOT EXISTS `school_obj` (
  `id` varchar(30) NOT NULL,
  `school_id` varchar(30) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `sort_order` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------
-- TABLE `school_office`
-- -------------------------------------------
DROP TABLE IF EXISTS `school_office`;
CREATE TABLE IF NOT EXISTS `school_office` (
  `id` varchar(30) NOT NULL,
  `school_id` varchar(30) NOT NULL,
  `name` varchar(300) NOT NULL,
  `photograph` varchar(300) DEFAULT NULL,
  `position` varchar(300) NOT NULL,
  `description` varchar(10000) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------
-- TABLE `school_slider`
-- -------------------------------------------
DROP TABLE IF EXISTS `school_slider`;
CREATE TABLE IF NOT EXISTS `school_slider` (
  `id` varchar(30) NOT NULL,
  `school_id` varchar(30) NOT NULL,
  `image` varchar(300) NOT NULL,
  `heading` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------
-- TABLE `schools`
-- -------------------------------------------
DROP TABLE IF EXISTS `schools`;
CREATE TABLE IF NOT EXISTS `schools` (
  `id` varchar(30) NOT NULL,
  `school_id` varchar(30) NOT NULL,
  `title` varchar(300) NOT NULL,
  `school_logo` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------
-- TABLE `signup`
-- -------------------------------------------
DROP TABLE IF EXISTS `signup`;
CREATE TABLE IF NOT EXISTS `signup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------
-- TABLE `updates_panel`
-- -------------------------------------------
DROP TABLE IF EXISTS `updates_panel`;
CREATE TABLE IF NOT EXISTS `updates_panel` (
  `id` varchar(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `link` varchar(200) DEFAULT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT 0,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------
-- TABLE `updates_panel_content`
-- -------------------------------------------
DROP TABLE IF EXISTS `updates_panel_content`;
CREATE TABLE IF NOT EXISTS `updates_panel_content` (
  `id` varchar(30) NOT NULL,
  `update_id` varchar(30) NOT NULL,
  `updates_content_picture` varchar(200) DEFAULT NULL,
  `updates_content_paragraph` text NOT NULL DEFAULT ' ',
  PRIMARY KEY (`id`),
  KEY `updates-content` (`update_id`),
  CONSTRAINT `updates-content` FOREIGN KEY (`update_id`) REFERENCES `updates_panel` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------
-- TABLE `user`
-- -------------------------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`),
  KEY `email` (`email`) USING BTREE,
  KEY `username` (`username`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `val_demo`
-- -------------------------------------------
DROP TABLE IF EXISTS `val_demo`;
CREATE TABLE IF NOT EXISTS `val_demo` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------
-- TABLE DATA auth_assignment
-- -------------------------------------------
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`status`,`created_at`) VALUES
('admin','1','10','');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`status`,`created_at`) VALUES
('admin','78','0','');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`status`,`created_at`) VALUES
('admin','79','9','');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`status`,`created_at`) VALUES
('admin','80','9','');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`status`,`created_at`) VALUES
('admin','81','0','');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`status`,`created_at`) VALUES
('admin','82','0','');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`status`,`created_at`) VALUES
('create','0','10','');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`status`,`created_at`) VALUES
('create','78','0','');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`status`,`created_at`) VALUES
('create','80','9','');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`status`,`created_at`) VALUES
('delete','78','0','');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`status`,`created_at`) VALUES
('school','0','10','');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`status`,`created_at`) VALUES
('school','2','10','');



-- -------------------------------------------
-- TABLE DATA auth_item
-- -------------------------------------------
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('admin','0','allow all the operations','','','','');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('create','1','allow user to create the content','','','','');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('delete','3','allow user to delete the content','','','','');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('school','4','allow all the schools related operations','','','','');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('school-create','5','allow user to create the schools assets','','','','');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('school-delete','7','allow user to delete the schools assets','','','','');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('school-update','6','allow user to update the schools assets','','','','');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('update','2','allow user to update the content','','','','');



-- -------------------------------------------
-- TABLE DATA auth_item_child
-- -------------------------------------------
INSERT INTO `auth_item_child` (`parent`,`child`) VALUES
('admin','create');
INSERT INTO `auth_item_child` (`parent`,`child`) VALUES
('admin','delete');
INSERT INTO `auth_item_child` (`parent`,`child`) VALUES
('admin','school');
INSERT INTO `auth_item_child` (`parent`,`child`) VALUES
('admin','update');
INSERT INTO `auth_item_child` (`parent`,`child`) VALUES
('school','school-create');
INSERT INTO `auth_item_child` (`parent`,`child`) VALUES
('school','school-delete');
INSERT INTO `auth_item_child` (`parent`,`child`) VALUES
('school','school-update');



-- -------------------------------------------
-- TABLE DATA career
-- -------------------------------------------
INSERT INTO `career` (`id`,`title`,`description`,`content`,`download_link`,`apply_link`) VALUES
('career0001','Post Doctoral Fellowships','The Institution of Eminence (IoE), University of Delhi invites applications from eligible Indian and overseas nationals with excellent publication record for Maharishi Kanad Post-Doctoral Fellowships in the areas of Public Health, Climate Change & Sustainability, Public Policy & Governance, Transnational Affairs and Skill Enhancement & Entrepreneurship Development. The last date to submit the online application for “Maharishi Kanad Post-Doctoral Fellowship” has been extended till 15th September, 2021.','<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif; text-align: left;\">The Institution of Eminence (IoE), University of Delhi invites applications from eligible Indian and overseas nationals with excellent publication record for Maharishi Kanad Post-Doctoral Fellowships in the areas of Public Health, Climate Change &amp; Sustainability, Public Policy &amp; Governance, Transnational Affairs and Skill Enhancement &amp; Entrepreneurship Development.</p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif; text-align: left;\"><strong style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Eligibility</strong></p>
<ol style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px 35px; padding: 0px; list-style-position: initial; list-style-image: initial; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px; text-align: left;\">
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">The applicant should have completed Ph.D. from any Indian/Foreign University in the relevant specializations as mentioned below.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">The applicant should possess a good academic record and an excellent research profile as evident from quality publications in reputed journals of the relevant specialization.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">The applicant should not have exceeded six years from the date of award of Ph.D. at the time of applying for the fellowship.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">An applicant having research experience that demonstrates an independent research capability will receive preference.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">A duly filled application form should be accompanied by a brief research proposal (not more than 2000 words) along with the application, outlining the objectives, brief methodology, deliverables, and the timeline to achieve the stated objectives.</li>
</ol>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif; text-align: left;\"><strong style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Nature &amp; Duration of Support</strong></p>
<ol style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px 35px; padding: 0px; list-style-position: initial; list-style-image: initial; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px; text-align: left;\">
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">The Fellowship carries a consolidated remuneration of Rs. 1.00 lakh per month. The IoE will also provide the Fellows an annual research grant of up to Rs. 2.00 lakhs (Sciences) and up to Rs. 1.00 lakh (Humanities, Social Sciences, Law, Management, etc.).</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">The duration of the fellowship will be initially for a period of two years, which may further be extended by one or two years, subject to availability of funds and satisfactory performance of the Fellow, evaluated by an Expert Review Committee.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">There is no provision for an official accommodation for the selected candidates.</li>
</ol>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif; text-align: left;\"><strong style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Expectations</strong></p>
<ol style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px 35px; padding: 0px; list-style-position: initial; list-style-image: initial; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px; text-align: left;\">
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">The Fellow may initiate a novel research project with the promising outcome or research work culminating in high-quality peer reviewed research publications/patents /prototypes, etc. or collaborate with a faculty member&rsquo;s on-going research programme at the IoE/University of Delhi.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">The research proposal must establish an intellectual inquiry that can progress according to the plan she/he has outlined and also a product/patent/policy/research publication(s).</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">In addition to research assignments, the fellow may have to undertake teaching/design and execute courses and any other responsibility as assigned by the IoE.</li>
</ol>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif; text-align: left;\"><strong style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Number of Fellowships and Specializations</strong></p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif; text-align: left;\">The Maharishi Kanad Post-Doctoral Fellowships are available in the following areas of specialization:</p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif; text-align: left;\"><strong style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">1. Public Health (6 positions)</strong></p>
<ul style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px 35px; padding: 0px; list-style-position: initial; list-style-image: initial; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px; text-align: left;\">
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Public Health Epidemiology.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Genetics, Genomics, Proteomics, Metabolomics technology, Immunology and Cell Biology for Molecular Epidemiology.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">System biologist with a strong background in mathematical modeling, and computational and big data analysis.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Innovation and design of novel diagnostic, therapeutic and prognostic product, tools and techniques.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Social issues in Public Health.</li>
</ul>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif; text-align: left;\"><strong style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">2. Climate Change &amp; Sustainability (6 positions)</strong></p>
<ul style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px 35px; padding: 0px; list-style-position: initial; list-style-image: initial; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px; text-align: left;\">
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Climate change studies -Ocean-atmosphere interactions</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Climate Change &amp; water resources sustainability</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Natural hazards and disasters and climate change</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Ecology, biodiversity conservation and climate change</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Food and nutritional security (future crops) and climate change</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Human health impacts of climate change</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Climate change and livelihood challenges (socio-economic &amp; cultural)</li>
</ul>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif; text-align: left;\"><strong style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">3. Public Policy &amp; Governance (5 positions)</strong></p>
<ul style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px 35px; padding: 0px; list-style-position: initial; list-style-image: initial; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px; text-align: left;\">
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Regulatory mechanisms and regimes</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Political economy</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Public governance and delivery</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Technology in public governance</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Law and social transformation</li>
</ul>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif; text-align: left;\"><strong style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">4. Transnational Affairs (5 positions)</strong></p>
<ul style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px 35px; padding: 0px; list-style-position: initial; list-style-image: initial; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px; text-align: left;\">
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Diplomacy &amp; foreign policy</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Defence &amp; international security</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Global governance &amp; multilateralism</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Human rights, environment &amp; global Justice</li>
</ul>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif; text-align: left;\"><strong style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">5. Skill Enhancement &amp; Entrepreneurship Development (3 positions)</strong></p>
<ul style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px 35px; padding: 0px; list-style-position: initial; list-style-image: initial; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px; text-align: left;\">
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Technologies and policies for Drug (small and large molecules) Discovery and Development; Technologies for production and analytical characterization, and clinical trials and regulatory aspects (Bench-to-Bed).</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Genomic. Proteomic and Metabolomic technologies for human health and plant sciences.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">IPR Laws, processes, technology transfer, commercialization, defining skill gaps to create interaction between University and Industry for training, research and Innovation leading to entrepreneurship.</li>
</ul>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif; text-align: left;\"><strong style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Fellowship Conditions</strong></p>
<ol style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px 35px; padding: 0px; list-style-position: initial; list-style-image: initial; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px; text-align: left;\">
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">The Fellows shall be deemed to have accepted the terms and conditions of the scheme as laid down in the advertisement and shall in no way be entitled to any extension of the award or benefits of any other kind than those that are part of the offer.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">The selected Fellows shall not relinquish the fellowships before two years of appointment unless in case of accepting a permanent position in this or any other institution.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">The fellowship is a full-time position, and the selected fellow shall not be allowed to pursue any other assignment/ studies.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">These are contractual positions, which may be terminated at any point of time on the ground of non-performance/ unsatisfactory performance without giving any prior notice.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">The outcome of research under this fellowship which may result in a product/patent/policy/research publication(s)/technology/knowhow or in any other form shall be the sole property of the IoE, University of Delhi.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">The Fellow shall be governed by the existing conduct and discipline rules and regulations of the University of Delhi.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">This position does not entitle the fellow for a claim for any permanent position as may be advertised by the University.</li>
</ol>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif; text-align: left;\"><strong style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">General Instructions</strong></p>
<ul style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px 35px; padding: 0px; list-style-position: initial; list-style-image: initial; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px; text-align: left;\">
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Applicants should carefully read the requisite minimum essential qualifications, eligibility, job description, etc. laid down in the advertisement before applying for this post. Since all the applications received will be screened based on information provided by the applicant, in the application form, they must satisfy themselves of their suitability for the position applied.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">The applicant must submit a detailed curriculum vitae, in addition to the details sought in the online application form.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">An applicant can apply in more than one broad area of specialization by submitting separate applications.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\"><span style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; margin: 0px; padding: 0px; color: #ff0000;\"><strong style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">There is a mandatory fee (non-refundable) of Rs.1000/- for each application. However, women applicants and those belonging to SC, ST, and PwD categories are exempted from paying the application fee.</strong></span></li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">The applicant must clearly mention the preference for likely mentor(s) not exceeding two, who is/are Faculty employed at the University of Delhi in its different Faculty/Departments/Centres/Schools, and who have proven publication research credentials in the area of applicant&rsquo;s current and future research interests.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">If, at any stage during the recruitment and selection process, it is found that an applicant has furnished wrong or misleading information, the candidature will stand rejected without any notice.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Mere fulfillment of minimum educational qualifications and eligibility shall not entitle an applicant to be shortlisted.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Application once submitted cannot be altered/resubmitted and refund of application fee is not admissible in any circumstances.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">The applicants are required to apply ONLINE as displayed on the IoE website.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">All relevant educational qualifications, experience certificates, research proposal and the detailed curriculum-vitae should be submitted ONLINE.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">The number and nature of positions advertised may vary depending on the number of applications received, availability of candidates, screening criteria and recommendation of the selection committee.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">IoE/University reserves the right to reject the candidature of applicant/s without assigning any reason.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">IoE/ University reserves the right not to fill in or otherwise, any or all the advertised posts.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">IoE/University reserves the right to cancel or partially modify the advertisement at any point of time at its discretion. Corrigendum/addendum or modification, if any, would be displayed only on the IoE website and shall not be published in any Newspaper. The applicants are advised to check the IoE website&nbsp;<a style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; margin: 0px; padding: 0px; text-decoration-line: none; transition: background 300ms ease 0s, color 300ms ease 0s, border-color 300ms ease 0s; color: #545454;\" href=\"http://ioe.du.ac.in/\"><span style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; margin: 0px; padding: 0px; color: #000000;\">http://ioe.du.ac.in</span></a>&nbsp;regularly for updates.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Canvassing of any kind will result in disqualification of candidature.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Reservation policy shall be followed as per the University/GOI norms.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Incomplete application or application without payment of fee, where applicable, will be rejected.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">The fee has to be paid online using the following link&nbsp;<span style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; margin: 0px; padding: 0px; color: #000000;\"><a style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; margin: 0px; padding: 0px; text-decoration-line: none; transition: background 300ms ease 0s, color 300ms ease 0s, border-color 300ms ease 0s; color: #000000;\" href=\"http://fee.du.ac.in/index.php/fee/fee-payment-miscellaneous/register\" target=\"_blank\" rel=\"noopener\">http://fee.du.ac.in/index.php/fee/fee-payment-miscellaneous/register</a></span>. While making the payment under the head&nbsp;<strong style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Fee</strong>, select the Category &ldquo;<strong style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Maharishi Kanad Post-doctoral Fellowship</strong>&rdquo; from the drop down menu.</li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">The last date to submit the online application for &ldquo;Maharishi Kanad Post-Doctoral Fellowship&rdquo; has been extended till 15th September, 2021.</li>
</ul>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif; text-align: left;\">&nbsp;</p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif; text-align: left;\"><em style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\"><strong style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">Note: NO INTERIM ENQUIRIES WILL BE ENTERTAINED.</strong></em></p>','uploads/files/career0001_PDF_ADVERTISEMENT_Final.pdf','http://forms.du.ac.in/mac/view.php?id=49915');
INSERT INTO `career` (`id`,`title`,`description`,`content`,`download_link`,`apply_link`) VALUES
('career0002','Demo career','some paragraph','<h3 style=\"margin: 15px 0px; padding: 0px; font-size: 14px; font-family: \'Open Sans\', Arial, sans-serif; background-color: #ffffff;\">The standard Lorem Ipsum passage, used since the 1500s</h3>
<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p>
<h3 style=\"margin: 15px 0px; padding: 0px; font-size: 14px; font-family: \'Open Sans\', Arial, sans-serif; background-color: #ffffff;\">Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</h3>
<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p>
<h3 style=\"margin: 15px 0px; padding: 0px; font-size: 14px; font-family: \'Open Sans\', Arial, sans-serif; background-color: #ffffff;\">1914 translation by H. Rackham</h3>
<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"</p>
<h3 style=\"margin: 15px 0px; padding: 0px; font-size: 14px; font-family: \'Open Sans\', Arial, sans-serif; background-color: #ffffff;\">Section 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</h3>
<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"</p>
<h3 style=\"margin: 15px 0px; padding: 0px; font-size: 14px; font-family: \'Open Sans\', Arial, sans-serif; background-color: #ffffff;\">1914 translation by H. Rackham</h3>
<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"</p>','uploads/files/career0002_IMG_0002.pdf','www.google.com');



-- -------------------------------------------
-- TABLE DATA gov_council
-- -------------------------------------------
INSERT INTO `gov_council` (`id`,`name`,`designation`,`image`) VALUES
('govcouncil0001','Prof.  P.C. Joshi','Vice Chancellor (Acting), University of Delhi','');
INSERT INTO `gov_council` (`id`,`name`,`designation`,`image`) VALUES
('govcouncil0002','Prof. Maharaj K. Pandit','Chief Executive Officer, IoE, University of Delhi','');
INSERT INTO `gov_council` (`id`,`name`,`designation`,`image`) VALUES
('govcouncil0003','Prof. Ashutosh Bhardwaj','OSD, IoE, University of Delhi','');
INSERT INTO `gov_council` (`id`,`name`,`designation`,`image`) VALUES
('govcouncil0004','Prof. Ashok Prasad','Dean, Faculty of Science','');
INSERT INTO `gov_council` (`id`,`name`,`designation`,`image`) VALUES
('govcouncil0005','Prof. Neeta Sehgal','Proctor, University of Delhi','');
INSERT INTO `gov_council` (`id`,`name`,`designation`,`image`) VALUES
('govcouncil0006','Prof. R.N.K. Bamezai','Honorary Director, DSPH','');
INSERT INTO `gov_council` (`id`,`name`,`designation`,`image`) VALUES
('govcouncil0007','Prof. Vijay K. Chaudhury','Honorary Director, DSEED','');
INSERT INTO `gov_council` (`id`,`name`,`designation`,`image`) VALUES
('govcouncil0008','Prof. V.S. Chauhan','Former Director, SCGB','');
INSERT INTO `gov_council` (`id`,`name`,`designation`,`image`) VALUES
('govcouncil0009','Prof. R.K. Chadha','Head, Department of Psychiatry, AIIMS','');
INSERT INTO `gov_council` (`id`,`name`,`designation`,`image`) VALUES
('govcouncil0010','Ms. Bharti Ramola Gupta','Eminent Alumni, University of Delhi','');
INSERT INTO `gov_council` (`id`,`name`,`designation`,`image`) VALUES
('govcouncil0011','Mr. Rajesh Relan','Eminent Alumni, University of Delhi','');
INSERT INTO `gov_council` (`id`,`name`,`designation`,`image`) VALUES
('govcouncil0012','Prof. Kavita Sharma','Treasurer, University of Delhi','');
INSERT INTO `gov_council` (`id`,`name`,`designation`,`image`) VALUES
('govcouncil0013','Finance Officer','University of Delhi','');
INSERT INTO `gov_council` (`id`,`name`,`designation`,`image`) VALUES
('govcouncil0014','Registrar','University of Delhi – Member Secretary','');



-- -------------------------------------------
-- TABLE DATA home_slider
-- -------------------------------------------
INSERT INTO `home_slider` (`id`,`slider_image`,`slider_header_text`,`slider_subheader_text`,`slider_description_text`,`slider_button`,`slider_button_text`,`slider_button_hide`,`slider_hide`) VALUES
('slider0001','uploads/slider/slider1.png','An Institute of Eminence','University of Delhi is now','<p>&nbsp;</p>
<p><span style=\"color: #d6d6e7; font-family: \'Source Sans Pro\'; font-size: 20px;\">The&nbsp;</span><strong style=\"color: #d6d6e7; font-family: sans-serif; font-size: 14px;\"><span style=\"font-size: 20px; font-family: \'Source Sans Pro\';\">University of Delhi</span></strong><span style=\"color: #d6d6e7; font-family: \'Source Sans Pro\'; font-size: 20px;\">, informally known as&nbsp;</span><strong style=\"color: #d6d6e7; font-family: sans-serif; font-size: 14px;\"><span style=\"font-size: 20px; font-family: \'Source Sans Pro\';\">Delhi University</span></strong><span style=\"color: #d6d6e7; font-family: \'Source Sans Pro\'; font-size: 20px;\">&nbsp;(</span><strong style=\"color: #d6d6e7; font-family: sans-serif; font-size: 14px;\"><span style=\"font-size: 20px; font-family: \'Source Sans Pro\';\">DU</span></strong><span style=\"color: #d6d6e7; font-family: \'Source Sans Pro\'; font-size: 20px;\">), is a&nbsp;</span><span style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: #d6d6e7; font-family: \'Source Sans Pro\'; font-size: 20px;\">collegiate</span><span style=\"color: #d6d6e7; font-family: \'Source Sans Pro\'; font-size: 20px;\">&nbsp;</span><span style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: #d6d6e7; font-family: \'Source Sans Pro\'; font-size: 20px;\">public</span><span style=\"color: #d6d6e7; font-family: \'Source Sans Pro\'; font-size: 20px;\">&nbsp;</span><span style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: #d6d6e7; font-family: \'Source Sans Pro\'; font-size: 20px;\">central university</span><span style=\"color: #d6d6e7; font-family: \'Source Sans Pro\'; font-size: 20px;\">&nbsp;located in&nbsp;</span><span style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: #d6d6e7; font-family: \'Source Sans Pro\'; font-size: 20px;\">New Delhi</span><span style=\"color: #d6d6e7; font-family: \'Source Sans Pro\'; font-size: 20px;\">,&nbsp;</span><span style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: #d6d6e7; font-family: \'Source Sans Pro\'; font-size: 20px;\">India</span><span style=\"color: #d6d6e7; font-family: \'Source Sans Pro\'; font-size: 20px;\">. It was founded in 1922 by an Act of the&nbsp;</span><span style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: #d6d6e7; font-family: \'Source Sans Pro\'; font-size: 20px;\">Central Legislative Assembly</span><span style=\"color: #d6d6e7; font-family: \'Source Sans Pro\'; font-size: 20px;\">&nbsp;and is recognized as an&nbsp;</span><a style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif; font-size: 14px;\" title=\"\" href=\"https://en.wikipedia.org/wiki/Institutes_of_Eminence\"><span style=\"font-size: 20px; font-family: \'Source Sans Pro\';\"><span style=\"color: #b5a5d6;\">Institute of Eminence</span></span></a><span style=\"color: #b5a5d6; font-family: \'Source Sans Pro\'; font-size: 20px;\">&nbsp;</span><span style=\"color: #d6d6e7; font-family: \'Source Sans Pro\'; font-size: 20px;\">(IoE) by the&nbsp;</span><a style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif; font-size: 14px;\" title=\"University Grants Commission (India)\" href=\"https://en.wikipedia.org/wiki/University_Grants_Commission_(India)\"><span style=\"font-size: 20px; font-family: \'Source Sans Pro\';\"><span style=\"color: #b5a5d6;\">University Grants Commission</span></span></a><span style=\"color: #d6d6e7; font-family: \'Source Sans Pro\'; font-size: 20px;\">&nbsp;(UGC).</span></p>
<p><span style=\"color: #d6d6e7; font-family: \'Source Sans Pro\'; font-size: 20px;\">&nbsp;</span></p>','site/about','Know more','0','0');
INSERT INTO `home_slider` (`id`,`slider_image`,`slider_header_text`,`slider_subheader_text`,`slider_description_text`,`slider_button`,`slider_button_text`,`slider_button_hide`,`slider_hide`) VALUES
('slider0002','uploads/slider/slider2.png','IOE-DU','Join us in achieving new milestones','<blockquote style=\"line-height: 1;\" class=\"blockquote\"><font color=\"#cee7f7\"><b>Beginning of new era,&nbsp;</b></font><span style=\"font-family: &quot;Source Sans Pro&quot;; font-size: 20px; letter-spacing: 0.5px; text-align: justify;\"><b style=\"\"><font color=\"#cee7f7\" style=\"\">Institutions of Eminence scheme has been launched in order to implement the commitment of the Government to empower the Higher Educational Institutions and to help them become world class teaching and research institutions, as announced by the Hon’ble Finance Minister in his budget speech of 2016. Ten public and ten private institutions are to be identified to emerge as world-class Teaching and Research Institutions. This will enhance affordable access to high quality education for ordinary Indians.</font></b></span></blockquote>','','','1','0');
INSERT INTO `home_slider` (`id`,`slider_image`,`slider_header_text`,`slider_subheader_text`,`slider_description_text`,`slider_button`,`slider_button_text`,`slider_button_hide`,`slider_hide`) VALUES
('slider0003','uploads/slider/slider0003.png','IOE-DU','Let be together','<p><strong><span style=\"font-family: \'Comic Sans MS\';\"><span style=\"color: #ffffff;\">Together we can achieve every milestones.</span></span></strong></p>','site/about','PDF','0','1');
INSERT INTO `home_slider` (`id`,`slider_image`,`slider_header_text`,`slider_subheader_text`,`slider_description_text`,`slider_button`,`slider_button_text`,`slider_button_hide`,`slider_hide`) VALUES
('slider0004','uploads/slider/slider0004.png','Post Doctorate Fellowship','Work with us','<span style=\"font-family: terminal, monaco, monospace; color: #8f9db6; font-size: 24pt;\"><strong><span style=\"color: #ffffff;\">Registrations are open for this opportunity.</span><br /><br /></strong></span>','/site/career-1?id=career0001','Know more','0','0');



-- -------------------------------------------
-- TABLE DATA migration
-- -------------------------------------------
INSERT INTO `migration` (`version`,`apply_time`) VALUES
('m000000_000000_base','1624815063');
INSERT INTO `migration` (`version`,`apply_time`) VALUES
('m130524_201442_init','1624815066');
INSERT INTO `migration` (`version`,`apply_time`) VALUES
('m140506_102106_rbac_init','1633328413');
INSERT INTO `migration` (`version`,`apply_time`) VALUES
('m170907_052038_rbac_add_index_on_auth_assignment_user_id','1633328414');
INSERT INTO `migration` (`version`,`apply_time`) VALUES
('m180523_151638_rbac_updates_indexes_without_prefix','1633328414');
INSERT INTO `migration` (`version`,`apply_time`) VALUES
('m190124_110200_add_verification_token_column_to_user_table','1624815066');
INSERT INTO `migration` (`version`,`apply_time`) VALUES
('m200409_110543_rbac_update_mssql_trigger','1633328414');



-- -------------------------------------------
-- TABLE DATA news_events
-- -------------------------------------------
INSERT INTO `news_events` (`id`,`ne_type`,`ne_title`,`ne_link`,`ne_image`,`ne_paragraph`,`ne_start_date`,`ne_end_date`,`ne_start_time`,`ne_end_time`,`ne_hide`) VALUES
('newsevents0001','events','Event 1','','uploads/news_events/newsevents1.png','Hopes and dreams were dashed that day. It should have been expected,<strong style=\"background-color: #4a1031;\"><span style=\"color: #ffffff;\"> but it still came as a shock</span></strong>. The <span style=\"background-color: #ff0000;\">warning</span> signs had been ignored in favor of the possibility, however remote, that it could actually happen. <span style=\"color: #085294;\">That possibility had grown from hope to an undeniable belief it must be destiny. That was until it wasn\'t and the hopes and dreams came crashing down wefewwe</span>','2021-07-30','0000-00-00','03:04:45','03:04:45','1');
INSERT INTO `news_events` (`id`,`ne_type`,`ne_title`,`ne_link`,`ne_image`,`ne_paragraph`,`ne_start_date`,`ne_end_date`,`ne_start_time`,`ne_end_time`,`ne_hide`) VALUES
('newsevents0002','events','Event 2','','uploads/news_events/newsevents2.png','','2021-07-24','0000-00-00','07:00:00','00:00:00','0');
INSERT INTO `news_events` (`id`,`ne_type`,`ne_title`,`ne_link`,`ne_image`,`ne_paragraph`,`ne_start_date`,`ne_end_date`,`ne_start_time`,`ne_end_time`,`ne_hide`) VALUES
('newsevents0003','events','Event 2','','uploads/news_events/newsevents3.png','Hopes and dreams were dashed that day. It should have been expected, but it still came as a shock. The warning signs had been ignored in favor of the possibility, however remote, that it could actually happen. That possibility had grown from hope to an undeniable belief it must be destiny. That was until it wasn\'t and the hopes and dreams came crashing down','2021-07-17','2021-07-31','09:00:00','12:00:00','0');
INSERT INTO `news_events` (`id`,`ne_type`,`ne_title`,`ne_link`,`ne_image`,`ne_paragraph`,`ne_start_date`,`ne_end_date`,`ne_start_time`,`ne_end_time`,`ne_hide`) VALUES
('newsevents0004','events','Event 4','','uploads/news_events/newsevents4.png','','2021-07-31','2021-08-03','03:00:00','07:00:00','0');
INSERT INTO `news_events` (`id`,`ne_type`,`ne_title`,`ne_link`,`ne_image`,`ne_paragraph`,`ne_start_date`,`ne_end_date`,`ne_start_time`,`ne_end_time`,`ne_hide`) VALUES
('newsevents0005','news','News1','','uploads/news_events/newsevents5.png','','2021-07-22','0000-00-00','13:16:50','13:16:50','0');
INSERT INTO `news_events` (`id`,`ne_type`,`ne_title`,`ne_link`,`ne_image`,`ne_paragraph`,`ne_start_date`,`ne_end_date`,`ne_start_time`,`ne_end_time`,`ne_hide`) VALUES
('newsevents0006','events','Event 5','','uploads/news_events/newsevents6.png','','2021-08-07','2021-08-19','15:32:20','15:32:20','0');
INSERT INTO `news_events` (`id`,`ne_type`,`ne_title`,`ne_link`,`ne_image`,`ne_paragraph`,`ne_start_date`,`ne_end_date`,`ne_start_time`,`ne_end_time`,`ne_hide`) VALUES
('newsevents0007','events','Event 6','','uploads/news_events/newsevents7.png','','0000-00-00','0000-00-00','15:34:25','15:34:25','0');
INSERT INTO `news_events` (`id`,`ne_type`,`ne_title`,`ne_link`,`ne_image`,`ne_paragraph`,`ne_start_date`,`ne_end_date`,`ne_start_time`,`ne_end_time`,`ne_hide`) VALUES
('newsevents0009','news','We are open for post doctoral fellowship joining ','','uploads/news_events/newsevents9.png','','0000-00-00','0000-00-00','00:00:00','00:00:00','0');
INSERT INTO `news_events` (`id`,`ne_type`,`ne_title`,`ne_link`,`ne_image`,`ne_paragraph`,`ne_start_date`,`ne_end_date`,`ne_start_time`,`ne_end_time`,`ne_hide`) VALUES
('newsevents0010','news','News1','','uploads/news_events/newseventt0.png','','0000-00-00','0000-00-00','00:00:00','00:00:00','0');
INSERT INTO `news_events` (`id`,`ne_type`,`ne_title`,`ne_link`,`ne_image`,`ne_paragraph`,`ne_start_date`,`ne_end_date`,`ne_start_time`,`ne_end_time`,`ne_hide`) VALUES
('newsevents0013','news','News1','','uploads/news_events/newsevents0013.png','','0000-00-00','0000-00-00','15:21:30','15:21:30','0');



-- -------------------------------------------
-- TABLE DATA school_committee
-- -------------------------------------------
INSERT INTO `school_committee` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0001','school_ph','Prof. Debi Sarkar, Biochemistry, University of Delhi, South Campus','Chairperson','1');
INSERT INTO `school_committee` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0003','school_ph','Prof. Yogendra Singh Zoology, University of Delhi','Member','3');
INSERT INTO `school_committee` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0004','school_ph','Prof. Pradeep Burma, Genetics, University of Delhi, South Campus','Member','3');
INSERT INTO `school_committee` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0005','school_ph','Prof. Shrikant Gupta, Economics, University of Delhi','Member','3');
INSERT INTO `school_committee` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0006','school_ph','Prof. Neera Agnimitra, Social Work, University of Delhi','Member','3');
INSERT INTO `school_committee` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0007','school_ph','Prof. Akhilesh Verma, Chemistry, University of Delhi','Member','3');
INSERT INTO `school_committee` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0008','school_ph','Prof. Rama V. Baru, JNU, New Delhi','Member','3');
INSERT INTO `school_committee` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0009','school_ph','Dr. Geeta Trilok Kumar, Principal, IHE, University of Delhi','Member','3');
INSERT INTO `school_committee` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0010','school_ph','Dr. Vipin Gupta, Department of Anthropology','Member','3');
INSERT INTO `school_committee` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0011','school_ph','Dr. Prashant Pradhan, ANDC, University of Delhi','Member','3');
INSERT INTO `school_committee` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0012','school_ph','Dr. Roopali Goyanka, Indraparastha College for Women, University of Delhi','Member','3');
INSERT INTO `school_committee` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0013','school_ccs','Prof. Ram Singh, Economics, University of Delhi','Chairperson','1');
INSERT INTO `school_committee` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0014','school_ccs','Prof. V. K. Ahuja, Law Faculty (DU) & VC, NLU, Assam','Member','3');
INSERT INTO `school_committee` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0015','school_ccs','Prof. Ranita Nagar, Gujarat National Law, Gandhi Nagar','Member','3');
INSERT INTO `school_committee` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0016','school_ccs','Dr. Nita Chowdhury, former Secretary, Govt. of India','Member','3');
INSERT INTO `school_committee` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0017','school_ccs','Mr. A. P. Maheshwari, IPS (Retd.), former DG, BPRD','Member','3');
INSERT INTO `school_committee` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0018','school_ccs','Prof. Pushpa Kumar, Law Faculty, University of Delhi','Member','3');
INSERT INTO `school_committee` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0019','school_ccs','Prof. Ranita Nagar, NLU, Gandhinagar, Gujarat','Member','3');
INSERT INTO `school_committee` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0020','school_ccs','Dr. Krishanu Karmakar, Jindal School of Govt. & Public Policy, JGU','Member','3');
INSERT INTO `school_committee` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0021','school_ccs','Dr. Siddharth Mishra, Law Faculty, University of Delhi','Member','3');
INSERT INTO `school_committee` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0022','school_ccs','Dr. Ajay Sonawane, Law Faculty, University of Delhi','Member','3');
INSERT INTO `school_committee` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0023','school_ccs','Dr. Ashutosh Mishra, OSD, DSPP&G, University of Delhi','Convenor','5');
INSERT INTO `school_committee` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0024','school_ph','Prof. Daman Saluja, Jt. Director, DSPH, IoE','Convenor','5');



-- -------------------------------------------
-- TABLE DATA school_gov_council
-- -------------------------------------------
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0001','school_ph','Prof. K. Srinath Reddy','Chairperson','1');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0002','school_ph','Prof. Maharaj K. Pandit','Co-Chairperson','2');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0003','school_ph','Finance Officer','Member','3');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0004','school_ph','Registrar','Member','3');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0005','school_ph','Dean, Social Science','Member','3');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0006','school_ph','Prof. Madhukar Pai, Canada Research Chair in Translational Epidemiology and Global Health Director, McGill Global Health Programs and Director, Mc. Gill International TB Centre Dept. TB Centre Dept. of Epidemiology, Bio-statistics and Occupational Health McGill University, Montreal, Canada.','Member','3');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0007','school_ph','Prof. Anil Tyagi, Former Vice- Chancellor, GGSIP University','Member','3');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0008','school_ph','Prof. Tulika Seth, Department of Hematology, AIIMS, New Delhi','Member','3');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0009','school_ph','Prof. Raj Kumar, Director, VP Chest Institute, University of Delhi','Member','3');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0010','school_ph','Dr. Harshad P Thakur, Director NIHFW','Member','3');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0011','school_ph','Dr. M. Vishnu Vardhana Rao, Director, National Institute of Medical Statistics (NIMS), ICMR, New Delhi','Member','3');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0012','school_ph','Prof. R.N.K. Bamezai/Prof. Daman Saluja, Hon. Director/Joint Director','Member Secretary','4');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0013','school_ccs','Amb. Shyam Saran','Chairperson','1');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0015','school_ccs','Finance Officer','Member','3');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0016','school_ccs','Registrar','Member','3');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0017','school_ccs','Dean, Social Science','Member','3');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0018','school_ccs','Prof. Kamal S. Bawa, Distinguish Professor, Prof. of Conservation Biology, University of Massachusetts, Boston, MA, USA','Member','3');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0019','school_ccs','Prof. S.P. Singh, Former Vice-Chancellor, HNB Garhwal University Chair, CEDAR','Member','3');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0020','school_ccs','Prof. A.D. Rao, Centre for Atmospheric Sciences, IIT Delhi','Member','1');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0021','school_ccs','Dr. R.V. Sonti, Former Director, National Institute of Plant Genome Research (NIPGR)','Member','3');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0022','school_ccs','Dr. Akhilesh Gupta, DST GOI','Member','3');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0023','school_ccs','Shri Vijay Sethi, Chief Information Officer, Chief Human Resources Officer & Head Corporate Social Responsibility, Hero MotoCorp Ltd. New Delhi 110070','Member','3');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0024','school_ccs','Prof. Devesh Sinha/Prof. Interjit Singh, Director','Member Secretary','4');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0025','school_ppg','Justice Dipak Mishra','Chairperson','1');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0026','school_ppg','Prof. Maharaj K. Pandit','Co-Chairperson','2');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0027','school_ppg','Finance Officer','Member','3');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0028','school_ppg','Registrar','Member','3');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0029','school_ppg','Dean, Social Science','Member','3');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0030','school_ppg','Prof. Mukul Asher, Lee Kuan Yew School of Public Policy','Member','3');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0031','school_ppg','Prof. C. Raj Kumar, Vice Chancellor, O.P. Jindal Global University','Member','3');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0032','school_ppg','Dr. Error D. Souza, Director, IIM Ahmedabad','Member','3');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0033','school_ppg','Dr. Siva Umapathy, Director, IISER, Bhopal','Member','3');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0034','school_ppg','Dr. Subhash Chandra Pandey, Former Special Secretary, Min of Commerce and Industries, Govt. of India','Member','3');
INSERT INTO `school_gov_council` (`id`,`school_id`,`name`,`position`,`sort_order`) VALUES
('schoolsgov0035','school_ppg','Shri Shakti Sinha/Prof. V.K. Ahuja Hon. Director/Joint Director','Member Secretary','4');



-- -------------------------------------------
-- TABLE DATA school_home
-- -------------------------------------------
INSERT INTO `school_home` (`id`,`school_id`,`content`,`sort_order`) VALUES
('schoolshom0001','school_ph','<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif; text-align: justify;\"><span style=\"font-size: 14pt;\">DSPH envisages launching of integrated M.Sc.-Ph.D. program emphasizing the role of Biomedical Sciences, Systems Biology, Environmental Pollution and Human Health, Functional Genomics, Community Health: Economics, Interventions &amp; Engagement and Medical Technology to understand the diversity in Public Health. The motto of the School will be development of better strategies and technologies, and their social impacts to achieve &ldquo;Health for All&rdquo;. The overarching aim of the School is to encourage the students to undergo a choice based learning experience by offering them a plethora of subjects of interdisciplinary nature and relevance which are neither available at present in this or any other institution. This novel human resource development project will be jointly taken up by Departments of the University of Delhi.</span></p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif; text-align: justify;\"><span style=\"font-size: 14pt;\">With this background a new institution, namely Delhi School of Public Health (DSPH) is being proposed where a number of sub-themes intertwined with the major theme&ndash; Public Health: Science, Technology &amp; policy will help unravel the intricacies of public health on one hand and aim to develop technologies for better public health. The courses of sub-themes thus developed would involve learning outcomes with direct impact on community health and policy. The institution shall aim at research and teaching of an inter disciplinary nature to continue and nurture the aptitude for science for society so that high quality human resource is recruited and trained for carrying out public health research programmes in the country and the related technologies. The University through its academic Departments/Centres must continue to meet the demands of the changing health science research scenario and to strengthen the Research and Development in diverse dimensions of Public Health related fields and technology.</span><br /><span style=\"font-size: 14pt;\"><span style=\"background-color: transparent; color: #293a5b; letter-spacing: 0px;\"><br /><span style=\"font-size: 18pt;\">The Need</span><br /></span><span style=\"background-color: transparent;\">The primary aim of the School and the theme is to inspire students and encourage them to pursue a career in integrated Health Sciences programme. We expect a well-qualified and adequately trained human resource that is dedicated to understanding, researching and developing technologies for public health using basic and translational research. This century is an exciting era for biomedical sciences, likely to witness great strides in the area of molecular medicine and the health sciences. The society and market at national and international levels today needs knowledgeable and well-trained human resource for research in health sciences. There is also the great concern that the number of students choosing sciences as a career option is decreasing rapidly. To keep the young talent coming to basic and applied science research has to match with the emerging needs of our society. The paucity of trained molecular epidemiologists is another futuristic dimension, learnt through the COVID-19 experience.</span></span></p>','1');
INSERT INTO `school_home` (`id`,`school_id`,`content`,`sort_order`) VALUES
('schoolshom0002','school_ph','<div class=\"gdlr-core-pbf-element\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px; padding: 0px; clear: both; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px;\">
<div id=\"curriculum\" class=\"gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px 20px 45px; zoom: 1;\">
<div class=\"gdlr-core-title-item-title-wrap clearfix\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; zoom: 1; position: relative;\">
<h3 class=\"gdlr-core-title-item-title gdlr-core-skin-title \" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; line-height: 1.2; font-size: 24px; color: #293a5b; display: inline-block; letter-spacing: 0px; transition: color 200ms ease 0s; float: left;\"><span style=\"font-size: 18pt;\">Research Plan</span></h3>
</div>
</div>
</div>
<div class=\"gdlr-core-pbf-element\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px; padding: 0px; clear: both; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px;\">
<div class=\"gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px 20px 10px;\">
<div class=\"gdlr-core-text-box-item-content\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 20px; padding: 0px; font-size: inherit; line-height: 1.7; text-align: justify;\"><span style=\"font-size: 14pt;\">The research plan focuses on current niche area(s) of expertise and the proposed plan in pursuit of excellence and attending to gap areas in Public health. Some of these are highlighted below:</span></p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 20px; padding: 0px; font-size: inherit; line-height: 1.7; text-align: justify;\"><span style=\"font-size: 14pt;\">The Biomedical Sciences unit, based on its existing expertise in chronic disease, diagnosis and treatment, including research in diabetes, cardiovascular disease, respiratory disease and obesity, shall add Public Health related dimensions of molecular epidemiology and cost-effective diagnosis and prevention in the said diseases.</span></p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 20px; padding: 0px; font-size: inherit; line-height: 1.7; text-align: justify;\"><span style=\"font-size: 14pt;\">Maternal and child health, particularly during pregnancy and newborn care including research about domestic violence. Surveys looking for tangible outcomes for prevention would be the focus.</span></p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 20px; padding: 0px; font-size: inherit; line-height: 1.7; text-align: justify;\"><span style=\"font-size: 14pt;\">Similar approach as mentioned would be adopted in the studies related to: Ageing, including dementia. Disability and mental health, including research in eating disorders, and physical wellbeing.</span></p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 20px; padding: 0px; font-size: inherit; line-height: 1.7; text-align: justify;\"><span style=\"font-size: 14pt;\">Neurological health, including therapy for people with stroke; research in neurological diseases, such as motor neuron disease.</span></p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 20px; padding: 0px; font-size: inherit; line-height: 1.7; text-align: justify;\"><span style=\"font-size: 14pt;\">Musculoskeletal health, including support for people peri- and post-operative; back pain; amputee research. Cancer, including diagnosis and therapy research, and lifestyle factors during treatment and post treatment, prophylactic rehabilitation to minimize treatment morbidity.</span></p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 20px; padding: 0px; font-size: inherit; line-height: 1.7; text-align: justify;\"><span style=\"font-size: 14pt;\">Most of the above mentioned diseases along with few others would be studied with an emphasis on epidemiology, molecular epidemiology, marker establishments, cost-effective diagnosis, working out of approaches in different tiers of society for intervention and prevention through simulation and modelling with most modern approaches of computational biology.</span></p>
</div>
</div>
</div>','2');
INSERT INTO `school_home` (`id`,`school_id`,`content`,`sort_order`) VALUES
('schoolshom0004','school_ccs','<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif; text-align: justify;\"><span style=\"font-size: 14pt;\">The World Bank Group Climate Change Action Plan (2016-2020) highlights some of the key challenges the world faces today. It identifies climate change as the most critical driver that influences development. The Action Plan recognizes the enormous task before us to feed 9 billon humans and provide housing for additional 2 billion urban population. Two of the biggest risks to human development come from availability of and access to sustainable energy and water resources. The climate change related risks from natural disasters which are already on the increase are a grim reminder that the issue needs to be discussed and dealt with not only at the government level, but equally at the community level. The COP 21 Paris Agreement identified the need for concrete actions to be taken by each nation and to deliver on the promises and set targets. These nationally determined contributions (NDCs) underline the need for sustainable and clean energy generation, transport, sustainable agriculture and sustainable urban ecosystems. In order to achieve the set ambitious goals, a cadre of qualified professionals and practitioners needs to be built, who are adequately skilled and empowered to deliver the desired results.</span></p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif; text-align: justify;\"><span style=\"font-size: 14pt;\">In recent years, climate change has emerged as both a potent threat and challenge to the human communities and biodiversity. Climate reconstructions have shown 19th century to be the century with highest rates of warming in Earth&rsquo;s history (Jones and Mann 2004; Moberg et al. 2005). The annual global mean surface temperature of the Earth have reportedly warmed by about 0.61 &plusmn; 0.16&deg;C between 1861 and 2000 (Folland et al. 2001). Such enhanced levels of climate change and global warming has significantly affected changes in glacial cover, agriculture, crop productivity, disease outbreaks, human health, human livelihoods, water availability, species phenology, species geographic ranges, vegetation structure and community composition (Telwala et al. 2013; Pandit et al. 2014; Manish et al. 2016). Under five broad sub-themes, &ldquo;Critical Zone Studies&rdquo;, &ldquo;Climate Change &amp; Agriculture Sustainability&rdquo;, &ldquo;Climate Change, Food &amp; Nutritional Sustainability&rdquo;, &ldquo;Resilient Lives &amp; Livelihoods&rdquo;, and &ldquo;Sustainable Energy&rdquo;, the Delhi School of Climate &amp; Sustainability would aim to encourage students to take up climate change focused inter-disciplinary courses with cutting-edge curriculums and research as potential career avenues in order to provide sustainable climate change solutions for India in the forthcoming century</span></p>','1');
INSERT INTO `school_home` (`id`,`school_id`,`content`,`sort_order`) VALUES
('schoolshom0005','school_ccs','<div class=\"gdlr-core-pbf-element\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px; padding: 0px; clear: both; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px;\">
<div id=\"curriculum\" class=\"gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px 20px 45px; zoom: 1;\">
<div class=\"gdlr-core-title-item-title-wrap clearfix\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; zoom: 1; position: relative;\">
<h3 class=\"gdlr-core-title-item-title gdlr-core-skin-title \" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; line-height: 1.2; font-size: 24px; color: #293a5b; display: inline-block; letter-spacing: 0px; transition: color 200ms ease 0s; float: left;\">Participating Institutions</h3>
</div>
<span class=\"gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 10px 0px 0px; padding: 0px; font-style: italic; display: block; color: #747474; font-size: 14pt;\">The proposed Delhi School of Climate &amp; Sustainability would be established with the active involvement and participation of the following existing Departments/Centres of the University:</span></div>
</div>
<div class=\"gdlr-core-pbf-element\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px; padding: 0px; clear: both; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px;\">
<div class=\"gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix  gdlr-core-left-align\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px 20px 25px; zoom: 1;\">
<ul style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; list-style: none;\">
<li class=\" gdlr-core-skin-divider clearfix\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 22px; padding: 0px; zoom: 1;\">
<div class=\"gdlr-core-icon-list-content-wrap\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; overflow: hidden;\"><span class=\"gdlr-core-icon-list-content\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; font-size: 14pt; display: block;\">Department of Environmental Studies</span></div>
</li>
<li class=\" gdlr-core-skin-divider clearfix\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 22px; padding: 0px; zoom: 1;\">
<div class=\"gdlr-core-icon-list-content-wrap\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; overflow: hidden;\"><span class=\"gdlr-core-icon-list-content\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; font-size: 14pt; display: block;\">Department of Chemistry</span></div>
</li>
<li class=\" gdlr-core-skin-divider clearfix\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 22px; padding: 0px; zoom: 1;\">
<div class=\"gdlr-core-icon-list-content-wrap\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; overflow: hidden;\"><span class=\"gdlr-core-icon-list-content\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; font-size: 14pt; display: block;\">Department of Geology</span></div>
</li>
<li class=\" gdlr-core-skin-divider clearfix\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 22px; padding: 0px; zoom: 1;\">
<div class=\"gdlr-core-icon-list-content-wrap\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; overflow: hidden;\"><span class=\"gdlr-core-icon-list-content\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; font-size: 14pt; display: block;\">Department of Economics</span></div>
</li>
<li class=\" gdlr-core-skin-divider clearfix\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 22px; padding: 0px; zoom: 1;\">
<div class=\"gdlr-core-icon-list-content-wrap\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; overflow: hidden;\"><span class=\"gdlr-core-icon-list-content\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; font-size: 14pt; display: block;\">Department of Plant Molecular Biology</span></div>
</li>
<li class=\" gdlr-core-skin-divider clearfix\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 22px; padding: 0px; zoom: 1;\">
<div class=\"gdlr-core-icon-list-content-wrap\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; overflow: hidden;\"><span class=\"gdlr-core-icon-list-content\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; font-size: 14pt; display: block;\">Department of Social Work</span></div>
</li>
<li class=\" gdlr-core-skin-divider clearfix\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 22px; padding: 0px; zoom: 1;\">
<div class=\"gdlr-core-icon-list-content-wrap\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; overflow: hidden;\"><span class=\"gdlr-core-icon-list-content\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; font-size: 14pt; display: block;\">Centre for Inter-disciplinary Studies of Mountain &amp; Hill Environment</span></div>
</li>
<li class=\" gdlr-core-skin-divider clearfix\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 22px; padding: 0px; zoom: 1;\">
<div class=\"gdlr-core-icon-list-content-wrap\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; overflow: hidden;\"><span class=\"gdlr-core-icon-list-content\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; font-size: 14pt; display: block;\">Department of Physics</span></div>
</li>
</ul>
</div>
</div>','2');
INSERT INTO `school_home` (`id`,`school_id`,`content`,`sort_order`) VALUES
('schoolshom0006','school_ppg','<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif; text-align: justify;\"><span style=\"font-size: 14pt;\">There is a felt need for a specialized teaching-research programme that addresses the various necessities and challenges of governance and policy-making. The proposed programmes in the School will be steered by professionals who have the requisite expertise and experience in public and private organizations such as government, academic, business and NGOs. It is aimed to equip students and researchers with practical understanding and high research standards and skills of governance and policy formulations in a rapidly developing world. The teaching-learning process in the programme will have a number of degree and short term courses with interdisciplinary and problem-solving focus. The teaching and research will lay emphasis on analytical reasoning and critical thinking to address the demands of governance and policy. The University envisages active involvement and participation of leaders engaged currently or in the recent past with government, academia and private sector in order to provide hands-on learning on the functioning of governments and policy planners. The School will generate a stream of tomorrow&rsquo;s leaders, who are able, enabled and effective in bringing long lasting positive change in our nation and the world.</span></p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif; text-align: justify;\"><span style=\"font-size: 14pt;\">School of Governance and Public Policy aims to provide high quality post-graduate training to young academics and professionals who wish to pursue a career in public service, including government agencies, international organizations and the non-profit sector. Drawn from political science, economics, sociology, public administration and law, its inter disciplinary curriculum, combining theoretical rigour and practical skills, is designed to meet the demands of complex public policy making.</span></p>','1');
INSERT INTO `school_home` (`id`,`school_id`,`content`,`sort_order`) VALUES
('schoolshom0007','school_ppg','<div class=\"gdlr-core-pbf-element\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px; padding: 0px; clear: both; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px;\">
<div id=\"curriculum\" class=\"gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px 20px 45px; zoom: 1;\">
<div class=\"gdlr-core-title-item-title-wrap clearfix\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; zoom: 1; position: relative;\">
<h3 class=\"gdlr-core-title-item-title gdlr-core-skin-title \" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; line-height: 1.2; font-size: 24px; color: #293a5b; display: inline-block; letter-spacing: 0px; transition: color 200ms ease 0s; float: left;\">Institutional Architecture</h3>
</div>
</div>
</div>
<div class=\"gdlr-core-pbf-element\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px; padding: 0px; clear: both; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px;\">
<div class=\"gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix  gdlr-core-left-align\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px 20px 25px; zoom: 1;\">
<ul style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; list-style: none;\">
<li class=\" gdlr-core-skin-divider clearfix\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 22px; padding: 0px; zoom: 1;\">
<div class=\"gdlr-core-icon-list-content-wrap\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; overflow: hidden;\"><span class=\"gdlr-core-icon-list-content\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; font-size: 14pt; display: block;\">Primarily designed as an inter-disciplinary School in the University, it will draw academics and teachers from across the Faculties of Social Sciences, Humanities and Law.</span></div>
</li>
<li class=\" gdlr-core-skin-divider clearfix\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 22px; padding: 0px; zoom: 1;\">
<div class=\"gdlr-core-icon-list-content-wrap\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; overflow: hidden;\"><span class=\"gdlr-core-icon-list-content\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; font-size: 14pt; display: block;\">It will also provide an interface between the academia and policy making by drawing upon working professionals in the governmental as well as non-governmental sectors including industry for short-term teaching and research engagements.</span></div>
</li>
<li class=\" gdlr-core-skin-divider clearfix\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 22px; padding: 0px; zoom: 1;\">
<div class=\"gdlr-core-icon-list-content-wrap\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; overflow: hidden;\"><span class=\"gdlr-core-icon-list-content\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; font-size: 14pt; display: block;\">It also envisages tie-ups with these sectors to provide internship opportunities for its students.</span></div>
</li>
</ul>
</div>
</div>','2');
INSERT INTO `school_home` (`id`,`school_id`,`content`,`sort_order`) VALUES
('schoolshom0008','school_ta','<span style=\"color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 14pt; text-align: justify; background-color: #ffffff;\">The School is to bring together scholars and students from the global South into a dialogue on transnational issues, as well as to increase opportunities for engagement and networking for scholars and students worldwide. The school aims to provide a platform for dialogue between global justice theorists, political scientists, economists, philosophers, sociologists, lawyers, development scholars and NGO representatives from South and North countries to share their views and work on key transnational issues.</span>','1');
INSERT INTO `school_home` (`id`,`school_id`,`content`,`sort_order`) VALUES
('schoolshom0009','school_ta','<div class=\"gdlr-core-accordion-item-tab clearfix  gdlr-core-active\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px; padding: 0px; zoom: 1; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px;\">
<div class=\"gdlr-core-accordion-item-content-wrapper\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; overflow: hidden;\">
<h4 class=\"gdlr-core-accordion-item-title gdlr-core-js \" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 17px 0px 27px; padding: 0px; line-height: 1.2; font-size: 14px; color: #660066; text-transform: uppercase; cursor: pointer; letter-spacing: 1px;\"><span style=\"font-size: 18pt;\">THE THEMES</span></h4>
<div class=\"gdlr-core-accordion-item-content\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 5px 0px 15px;\">
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 20px; padding: 0px; font-size: inherit; line-height: 1.7;\"><br style=\"box-sizing: inherit; border-color: #e6e6e6;\" /><span style=\"font-size: 14pt;\">Environmental Challenges</span></p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 20px; padding: 0px; font-size: inherit; line-height: 1.7;\"><span style=\"font-size: 14pt;\">Global Justice</span></p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 20px; padding: 0px; font-size: inherit; line-height: 1.7;\"><span style=\"font-size: 14pt;\">Transnational Organized Crime</span></p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 20px; padding: 0px; font-size: inherit; line-height: 1.7;\"><span style=\"font-size: 14pt;\">International Migration</span></p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 20px; padding: 0px; font-size: inherit; line-height: 1.7;\"><span style=\"font-size: 14pt;\">International Economic Relations</span></p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 20px; padding: 0px; font-size: inherit; line-height: 1.7;\"><span style=\"font-size: 14pt;\">Cyber Security</span></p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 20px; padding: 0px; font-size: inherit; line-height: 1.7;\"><span style=\"font-size: 14pt;\">Dialogue Among Civilizations</span></p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 20px; padding: 0px; font-size: inherit; line-height: 1.7;\"><span style=\"font-size: 14pt;\">Political Violence and Terrorism</span></p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 20px; padding: 0px; font-size: inherit; line-height: 1.7;\"><span style=\"font-size: 14pt;\">Arms Control</span></p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 20px; padding: 0px; font-size: inherit; line-height: 1.7;\"><span style=\"font-size: 14pt;\">Rule of International Law</span></p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 20px; padding: 0px; font-size: inherit; line-height: 1.7;\"><span style=\"font-size: 14pt;\">Conflict Resolution</span></p>
</div>
</div>
</div>
<div class=\"gdlr-core-accordion-item-tab clearfix \" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px; padding: 0px; zoom: 1; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px;\">
<div class=\"gdlr-core-accordion-item-content-wrapper\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; overflow: hidden;\">
<h4 class=\"gdlr-core-accordion-item-title gdlr-core-js \" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 17px 0px 27px; padding: 0px; line-height: 1.2; font-size: 14px; color: #660066; text-transform: uppercase; cursor: pointer; letter-spacing: 1px;\"><span style=\"font-size: 18pt;\">INSTITUTIONAL ARCHITECTURE</span></h4>
</div>
</div>','2');
INSERT INTO `school_home` (`id`,`school_id`,`content`,`sort_order`) VALUES
('schoolshom0010','school_seed','<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif; text-align: justify;\"><span style=\"font-size: 14pt;\">The &ldquo;DU-InSEED&rdquo; aims to fill the gap in the current knowledge delivery at DU for meeting the immediate and the future challenges with ever-evolving programs involving all streams of education with training across faculties including Sciences (Biological Chemical and Physical, Mathematical and Informatics), Humanities, Social sciences, Commerce and Economics, Finance and Management.</span></p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif; text-align: justify;\"><span style=\"font-size: 14pt;\">Thus, wherever possible, all the Skill training courses proposed by different departments/Faculty/Centre of the University will be operated under the ambit of DU-InSEED. The Du-InSEED will take entire administrative responsibility and provide all the facilities, including Classrooms, Laboratory space, equipment and Technical manpower etc. The departments/Faculty/Centre shall prepare the programme in consultation with the team of Coordinators and will organize for the availability of teaching experts and the resource material. The proposer and the experts will be paid honorarium.</span><br /><br /></p>
<div class=\"gdlr-core-pbf-element\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px; padding: 0px; clear: both; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px;\">
<div id=\"curriculum\" class=\"gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px 20px 45px; zoom: 1;\">
<div class=\"gdlr-core-title-item-title-wrap clearfix\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; zoom: 1; position: relative;\">
<h3 class=\"gdlr-core-title-item-title gdlr-core-skin-title \" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; line-height: 1.2; font-size: 24px; color: #161616; display: inline-block; letter-spacing: 0px; transition: color 200ms ease 0s; float: left;\"><span style=\"font-size: 14pt;\">Structure of DU-InSEED</span></h3>
</div>
</div>
</div>
<div class=\"gdlr-core-pbf-element\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px; padding: 0px; clear: both; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px;\">
<div class=\"gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px 20px 10px;\">
<div class=\"gdlr-core-text-box-item-content\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">
<ul style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 20px 35px; padding: 0px; list-style-position: initial; list-style-image: initial;\">
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; text-align: justify;\"><span style=\"font-size: 14pt;\">DU-InSEED envisages a 2-part institute located at the North Campus and South Campus to leverage the expertise available in both campuses and with resource sharing between the two campuses.</span></li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; text-align: justify;\"><span style=\"font-size: 14pt;\">DU-InSEED (South Campus) may develop programs involving Biological and Informatics Sciences, and some part of Social sciences, Finance and Management.</span></li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; text-align: justify;\"><span style=\"font-size: 14pt;\">DU-InSEED (North Campus) may develop programs involving Physical, Chemical and Mathematical sciences, Humanities, Social sciences, Commerce, Economics, Finance and Management.</span></li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; text-align: justify;\"><span style=\"font-size: 14pt;\">DU-InSEED shall also take responsibility of IPR, IPR-Protection, technology transfer / licensing activities for all the faculties of University of Delhi.</span></li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; text-align: justify;\"><span style=\"font-size: 14pt;\">In-SEED will execute programs for skill enhancement, entrepreneurship development, incubation</span><br style=\"box-sizing: inherit; border-color: #e6e6e6;\" /><span style=\"font-size: 14pt;\">of ideas and start-ups, and protection of IPR.</span></li>
</ul>
</div>
</div>
</div>
<div class=\"gdlr-core-pbf-element\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px; padding: 0px; clear: both; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px;\">
<div id=\"curriculum\" class=\"gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px 20px 45px; zoom: 1;\">
<div class=\"gdlr-core-title-item-title-wrap clearfix\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; zoom: 1; position: relative;\">
<h3 class=\"gdlr-core-title-item-title gdlr-core-skin-title \" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; line-height: 1.2; font-size: 24px; color: #161616; display: inline-block; letter-spacing: 0px; transition: color 200ms ease 0s; float: left;\"><span style=\"font-size: 14pt;\">Skill Enhancement</span></h3>
</div>
</div>
</div>
<div class=\"gdlr-core-pbf-element\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px; padding: 0px; clear: both; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px;\">
<div class=\"gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px 20px 10px;\">
<div class=\"gdlr-core-text-box-item-content\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">
<ul style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 20px 35px; padding: 0px; list-style-position: initial; list-style-image: initial;\">
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\"><span style=\"font-size: 14pt;\">The aim for skill enhancement will be to impart training for learning beyond the conventional syllabus, and to empower the learner to meet challenges while seeking a job or for undertaking research to answer complex questions.</span></li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\"><span style=\"font-size: 14pt;\">The skill training will be open to all age groups having basic knowledge in the area. There may be several tiers of skill courses starting from basic to advance so that any one can enter to acquire the desired skill. Skill Enhancement courses shall include both theory and hands-on training.</span></li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\"><span style=\"font-size: 14pt;\">These courses shall be of 1-4 credits (16-64 contact hours of theory to be covered in 1-4 weeks with a test or 32-128 contact hours for hands-on courses to be completed in 1-4 weeks). There may be provision of late hours / weekend courses for in-service persons. The University may accredit the courses.</span></li>
<li style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\"><span style=\"font-size: 14pt;\">The DU-InSEED will partner with government and private funding agencies like NSDC to</span><br style=\"box-sizing: inherit; border-color: #e6e6e6;\" /><span style=\"font-size: 14pt;\">provide financial support to course participants and run high-end programs.</span></li>
</ul>
</div>
</div>
</div>','1');
INSERT INTO `school_home` (`id`,`school_id`,`content`,`sort_order`) VALUES
('schoolshom0011','school_seed','<div class=\"gdlr-core-pbf-element\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px; padding: 0px; clear: both; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px;\">
<div id=\"curriculum\" class=\"gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px 20px 45px; zoom: 1;\">
<div class=\"gdlr-core-title-item-title-wrap clearfix\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; zoom: 1; position: relative;\">
<h3 class=\"gdlr-core-title-item-title gdlr-core-skin-title \" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; line-height: 1.2; font-size: 24px; color: #293a5b; display: inline-block; letter-spacing: 0px; transition: color 200ms ease 0s; float: left;\"><span style=\"font-size: 18pt;\">Incubation</span></h3>
</div>
</div>
</div>
<div class=\"gdlr-core-pbf-element\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px; padding: 0px; clear: both; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px;\">
<div class=\"gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px 20px 10px;\">
<div class=\"gdlr-core-text-box-item-content\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 20px; padding: 0px; font-size: inherit; line-height: 1.7; text-align: justify;\"><span style=\"font-size: 14pt;\">Incubation is a very important activity to apply the knowledge with skills to be on the path of entrepreneurship. The hallmark of all incubations will be not only the availability of facilities such as space, utilities and instrumentation, but world-class mentoring by University faculty. The DU-InSEED will offer several types of Incubation possibilities.</span></p>
</div>
</div>
</div>
<div class=\"gdlr-core-pbf-element\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px; padding: 0px; clear: both; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px;\">
<div class=\"gdlr-core-accordion-item gdlr-core-item-pdlr gdlr-core-item-pdb  gdlr-core-accordion-style-box-icon\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px 20px 30px;\">
<div class=\"gdlr-core-accordion-item-tab clearfix gdlr-core-active\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; zoom: 1;\">
<div class=\"gdlr-core-accordion-item-content-wrapper\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; overflow: hidden;\">
<h4 class=\"gdlr-core-accordion-item-title gdlr-core-js \" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 17px 0px 27px; padding: 0px; line-height: 1.2; font-size: 14px; color: #660066; text-transform: uppercase; cursor: pointer; letter-spacing: 1px;\">STUDENT INCUBATION SCHEME:</h4>
<div class=\"gdlr-core-accordion-item-content\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 5px 0px 15px;\">
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 20px; padding: 0px; font-size: inherit; line-height: 1.7;\"><span style=\"font-size: 14pt;\">Students of Delhi University can incubate their ideas while carrying out studies or after completing the studies. The In-SEED will facilitate availability of infrastructure and minimal funds for taking forward of ideas. The students will also benefit from mentoring available from University faculty members.</span></p>
</div>
</div>
</div>
<div class=\"gdlr-core-accordion-item-tab clearfix\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; zoom: 1;\">
<div class=\"gdlr-core-accordion-item-content-wrapper\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; overflow: hidden;\">
<h4 class=\"gdlr-core-accordion-item-title gdlr-core-js \" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 17px 0px 27px; padding: 0px; line-height: 1.2; font-size: 14px; color: #660066; text-transform: uppercase; cursor: pointer; letter-spacing: 1px;\">TEACHER INCUBATION SCHEME:</h4>
</div>
</div>
<div class=\"gdlr-core-accordion-item-tab clearfix\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; zoom: 1;\">
<div class=\"gdlr-core-accordion-item-content-wrapper\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; overflow: hidden;\">
<h4 class=\"gdlr-core-accordion-item-title gdlr-core-js \" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 17px 0px 27px; padding: 0px; line-height: 1.2; font-size: 14px; color: #660066; text-transform: uppercase; cursor: pointer; letter-spacing: 1px;\">START UP / ENTREPRENEURS/ INDUSTRY INCUBATION SCHEME:</h4>
</div>
</div>
<div class=\"gdlr-core-accordion-item-tab clearfix\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; zoom: 1;\">
<div class=\"gdlr-core-accordion-item-content-wrapper\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; overflow: hidden;\">
<h4 class=\"gdlr-core-accordion-item-title gdlr-core-js \" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 17px 0px 27px; padding: 0px; line-height: 1.2; font-size: 14px; color: #660066; text-transform: uppercase; cursor: pointer; letter-spacing: 1px;\">ENTREPRENEURSHIP</h4>
</div>
</div>
</div>
</div>','2');
INSERT INTO `school_home` (`id`,`school_id`,`content`,`sort_order`) VALUES
('schoolshom0012','school_ph','<p style=\"padding-left: 40px;\"><span style=\"color: #660066; font-size: 14px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase;\"><span style=\"font-size: 14pt;\">PARTICIPATING DEPARTMENTS</span><br /><br /></span>Ambedkar Centre for Biomedical Research</p>
<p style=\"padding-left: 40px;\">Department of Biochemistry</p>
<p style=\"padding-left: 40px;\">Department of Chemistry</p>
<p style=\"padding-left: 40px;\">Department of Environmental Studies</p>
<p style=\"padding-left: 40px;\">Department of Genetics</p>
<p style=\"padding-left: 40px;\">Department of Microbiology</p>
<p style=\"padding-left: 40px;\">Department of Physics (High Energy Physics Group/Material Science Group)</p>
<p style=\"padding-left: 40px;\">Department of Physics (Biophysics Group)</p>
<p style=\"padding-left: 40px;\">VP Chest Institute</p>
<p style=\"padding-left: 40px;\">Department of Zoology<br /><br /><span style=\"color: #660066; font-size: 18.6667px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase;\">Cross-cutting themes<br /><br /></span><span style=\"color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px; background-color: #ffffff;\">Health literacy, particularly among culturally and linguistically diverse communities.<br /><br /></span><span style=\"color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px; background-color: #ffffff;\">Integrated care, supporting allied health integrated care, including community based interventions, hospital avoidance.<br /><br /></span><span style=\"color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px; background-color: #ffffff;\">Health services, research into models of care, health economics, and allied health service provision.<br /><br /></span><span style=\"color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px; background-color: #ffffff;\">Pollution-related health risks &ndash; pulmonary, cardiovascular, life style, psychological disorders, impact on pregnancy and new-born children, socio-economic burden of diseases; technological, social and administrative interventions.</span><span style=\"color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px; background-color: #ffffff;\"><br /></span><br /><span style=\"color: #660066; font-size: 18.6667px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase;\">Teaching plan<br /><br /></span><span style=\"color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px; background-color: #ffffff;\">The School plans to start a number of interdisciplinary teaching/training programmes and courses. Some of the proposed courses that will be taught in the School are:<br /><br /></span></p>
<div style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px 0px 0px 40px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif;\">Five-year integrated B.Sc.-M.Sc. Programme in Biomedical Sciences</div>
<div style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px 0px 0px 40px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif;\">Five-year integrated M.Sc.-Ph.D. Programme in Biomedical Sciences</div>
<div style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px 0px 0px 40px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif;\">Five-year integrated B.Sc.-M.Sc. Programme in Functional Genomics &amp; Systems Biology</div>
<div style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px 0px 0px 40px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif;\">Five-year integrated M.Sc.-Ph.D. Programme in Functional Genomics &amp; Systems Biology</div>
<div style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px 0px 0px 40px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif;\">Masters and Doctoral Programme in Pollution, Toxicology &amp; Health</div>
<div style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px 0px 0px 40px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif;\">Five-year integrated M.Sc.-Ph.D. Programme in Nano-medicine and Medical Biotechnology</div>
<div style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px 0px 0px 40px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif;\">Masters Progarmme in Community Health, Economics &amp; Intervention<br /><br /><span style=\"color: #660066; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Oxygen, Ubuntu, Cantarell, \'Open Sans\', \'Helvetica Neue\', sans-serif; font-size: 18.6667px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase;\">Skill enhancement &amp; developement courses<br /></span><br />
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; margin: 0px 0px 20px; padding: 0px; line-height: 1.7;\">A number of short term Diploma/Certificate Courses on the various identified sub-themes will be started at the School. These courses will normally run for 1 year for students who have completed M.Sc.<br style=\"box-sizing: inherit; border-color: #e6e6e6;\" /><br style=\"box-sizing: inherit; border-color: #e6e6e6;\" />Grant writing for funding and Research</p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; margin: 0px 0px 20px; padding: 0px; line-height: 1.7;\">Research communication and editing</p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; margin: 0px 0px 20px; padding: 0px; line-height: 1.7;\">Animal handling and animal house maintenance</p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; margin: 0px 0px 20px; padding: 0px; line-height: 1.7;\">Rehabilitation practices</p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; margin: 0px 0px 20px; padding: 0px; line-height: 1.7;\">Patent laws and regulatory policies</p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; margin: 0px 0px 20px; padding: 0px; line-height: 1.7;\">Medical laboratory techniques</p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; margin: 0px 0px 20px; padding: 0px; line-height: 1.7;\">Analytical Tools I (Optical techniques)</p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; margin: 0px 0px 20px; padding: 0px; line-height: 1.7;\">Analytical techniques II (Separation techniques)</p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; margin: 0px 0px 20px; padding: 0px; line-height: 1.7;\">Analytical Tools III (High end equipment)</p>
</div>
<div style=\"padding-left: 80px;\"><span style=\"color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px; background-color: #ffffff;\"><br /><br /></span></div>','3');



-- -------------------------------------------
-- TABLE DATA school_obj
-- -------------------------------------------
INSERT INTO `school_obj` (`id`,`school_id`,`content`,`sort_order`) VALUES
('schoolsobj0001','school_ph','<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif; text-align: justify;\"><span style=\"font-size: 14pt;\">Delhi School of Public Health (DSPH) will be an umbrella institution dedicated to studying and imparting training in the area of public health in varied dimensions &ndash; science, technology and policy in an integrated manner. DSPH will draw strength from the existing university faculties of Science, Medicine and Social Sciences to deliver and meet its stated objectives. DSPH is aimed to become the premier organization in the country and also globally to start teaching/ research/ outreach programmes that are aimed at carrying out cutting-edge research in the field of public health science, creation of bio-medial technologies and taking the products to the society, industry and the market with the help of social scientists working in tandem with science &amp; technology experts.</span></p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px 0px 20px; padding: 0px; font-size: 16px; line-height: 1.7; color: #6b6b6b; font-family: Poppins, sans-serif; text-align: justify;\"><span style=\"font-size: 14pt;\">DSPH envisages integrated M.Sc.-Ph.D. Programmes in Public Health in areas such as Biomedical Sciences, Systems Biology, Environmental Pollution and Human Health, Functional Genomics, Community Health: Economics, Interventions &amp; Engagement and Medical Technology. The motto of the School will be development of better strategies and technologies, and their social impacts to achieve &ldquo;Health for All&rdquo;. The overarching aim of the School is to encourage the students to undergo a choice based learning experience by offering them a plethora of subjects of interdisciplinary nature and relevance which are neither available at present in this or any other institution. This novel human resource development project will be jointly taken up by Departments of the University of Delhi.</span></p>','1');
INSERT INTO `school_obj` (`id`,`school_id`,`content`,`sort_order`) VALUES
('schoolsobj0002','school_ccs','<span style=\"color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px; text-align: justify; background-color: #ffffff;\">The World Bank Group Climate Change Action Plan (2016-2020) highlights some of the key challenges the world faces today. It identifies climate change as the most critical driver that influences development. The Action Plan recognizes the enormous task before us to feed 9 billon humans and provide housing for additional 2 billion urban population. Two of the biggest risks to human development come from availability of and access to sustainable energy and water resources. The climate change related risks from natural disasters which are already on the increase are a grim reminder that the issue needs to be discussed and dealt with not only at the government level, but equally at the community level. The COP 21 Paris Agreement identified the need for concrete actions to be taken by each nation and to deliver on the promises and set targets. These nationally determined contributions (NDCs) underline the need for sustainable and clean energy generation, transport, sustainable agriculture and sustainable urban ecosystems. In order to achieve the set ambitious goals, a cadre of qualified professionals and practitioners needs to be built, who are adequately skilled and empowered to deliver the desired results.</span>','1');
INSERT INTO `school_obj` (`id`,`school_id`,`content`,`sort_order`) VALUES
('schoolsobj0003','school_ppg','<div class=\"gdlr-core-pbf-element\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px; padding: 0px; clear: both; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px;\">
<div id=\"curriculum\" class=\"gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px 20px 45px; zoom: 1;\">
<div class=\"gdlr-core-title-item-title-wrap clearfix\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; zoom: 1; position: relative;\">
<h3 class=\"gdlr-core-title-item-title gdlr-core-skin-title \" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; line-height: 1.2; font-size: 24px; color: #293a5b; display: inline-block; letter-spacing: 0px; transition: color 200ms ease 0s; float: left;\">Vision</h3>
</div>
</div>
</div>
<div class=\"gdlr-core-pbf-element\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px; padding: 0px; clear: both; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px;\">
<div class=\"gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px 20px 10px;\">
<div class=\"gdlr-core-text-box-item-content\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px;\">
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 20px; padding: 0px; font-size: inherit; line-height: 1.7; text-align: justify;\">A well-designed public policy and effective governance are crucial for a country to realize its socio-economic objectives. The Delhi School of Public Policy and Governance (DSP&amp;G) is the University&rsquo;s endeavor to contribute to the quality of policymaking and governance in an increasingly complex and challenging world. The vision of the school is to provide an interdisciplinary platform for learning and research on Public Policy and Governance. The School will serve as forum where the academic rigour blends with empirical evidence and the practical experience to promote the knowledge about processes of policymaking and governance. The objective is to contribute to the design and implementation of the public policy by providing context relevant policy inputs to the policymakers. The School will serve as a springboard of purposive discourse on effective and equitable governance from the developing world view-point.</p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 20px; padding: 0px; font-size: inherit; line-height: 1.7; text-align: justify;\">Along with the formal rules and regulations, the research and learning programmes at the DSP&amp;G will cover the informal social institutions, which are salient features of the governance in a developing country like India. Accordingly, the School is envisioned as a world class institution on Public Policy and Governance in the context of developing countries. The objective is to equip the lawmakers, policymakers and researchers with the knowledge and skill-sets to address the Public Policy and Governance challenges of the developing world.</p>
<p style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px 0px 20px; padding: 0px; font-size: inherit; line-height: 1.7; text-align: justify;\">The School shall be under the overall administrative and financial supervision of the Executive Council of the University of Delhi.</p>
</div>
</div>
</div>','1');
INSERT INTO `school_obj` (`id`,`school_id`,`content`,`sort_order`) VALUES
('schoolsobj0004','school_ppg','<div class=\"gdlr-core-pbf-element\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: #ffffff; margin: 0px; padding: 0px; clear: both; color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px;\">
<div id=\"curriculum\" class=\"gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px 20px 45px; zoom: 1;\">
<div class=\"gdlr-core-title-item-title-wrap clearfix\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; zoom: 1; position: relative;\">
<p class=\"gdlr-core-title-item-title gdlr-core-skin-title \" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 0px; padding: 0px; line-height: 1.2; font-size: 24px; color: #293a5b; display: inline-block; letter-spacing: 0px; transition: color 200ms ease 0s; float: left;\">Objectives</p>
</div>
<p><span class=\"gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption\" style=\"box-sizing: inherit; border: 0px #e6e6e6; outline: 0px; vertical-align: baseline; background: transparent; margin: 10px 0px 0px; padding: 0px; font-style: italic; display: block; color: #747474;\">The objectives of the School shall be as follows:<br /><br /><span style=\"background-color: transparent; font-size: 17px; color: #6b6b6b;\">To initiate and develop basic philosophy of governance and policy-making, contextualized in Indian values of ethics, individual morality, righteousness and truth, and align these with international best practices.<br /><br /></span><span style=\"background-color: transparent; font-size: 17px; color: #6b6b6b;\">To provide a platform for state-of-the-art teaching, research and outreach programmes on issues related to the Public Policy and Governance, as may be identified by the Governing Body and its designated body from time to time.<br /><br /></span><span style=\"background-color: transparent; font-size: 17px; color: #6b6b6b;\">To promote research on Public Policy and Governance relating to such identified areas and issues.<br /><br /></span><span style=\"background-color: transparent; font-size: 17px; color: #6b6b6b;\">To establish networks for dialogue and cooperation among scholars, policymakers, policy professionals, the regulators and those involved in the process of governance.<br /><br /></span><span style=\"background-color: transparent; font-size: 17px; color: #6b6b6b;\">To evolve and mobilize new, online technologies for training scholars in Public Policy and Governance.<br /><br /></span><span style=\"background-color: transparent; font-size: 17px; color: #6b6b6b;\">To organize national and international seminars, workshops and conferences on issues related to the Public Policy and Governance.<br /></span><span style=\"background-color: transparent; font-size: 17px; color: #6b6b6b;\">To organize documentation of resource materials on issues of Public Policy and Governance.<br /><br /></span><span style=\"background-color: transparent; font-size: 17px; color: #6b6b6b;\">To evolve new pedagogical tools for learning and training on issues related to Public Policy and Governance.<br /><br /></span><span style=\"background-color: transparent; font-size: 17px; color: #6b6b6b;\">To provide platform to students and scholars to share and debate ideas related to Public Policy and Governance.<br /><br /></span><span style=\"background-color: transparent; font-size: 17px; color: #6b6b6b;\">To publish research papers, books, newsletters and online journal in the broad area of Public Policy and Governance.<br /><br /></span><span style=\"background-color: transparent; font-size: 17px; color: #6b6b6b;\">To introduce and run academic programmes in the field of Public Policy and Governance.<br /><br /></span><span style=\"background-color: transparent; font-size: 17px; color: #6b6b6b;\">To generate financial resources from public and private sources both at the national and international level; and<br /><br /></span><span style=\"background-color: transparent; font-size: 17px; color: #6b6b6b;\">To undertake such other activities as decided upon by the Governing Body from time to time.</span></span></p>
</div>
</div>','2');



-- -------------------------------------------
-- TABLE DATA school_office
-- -------------------------------------------
INSERT INTO `school_office` (`id`,`school_id`,`name`,`photograph`,`position`,`description`) VALUES
('schoolsoff0001','school_ph','Prof. R.N.K. Bamezai','uploads/schooloffice/schoolsoff0001.png','Director','<span style=\"color: #6b6b6b; font-family: Poppins, sans-serif; font-size: 16px; text-align: justify; background-color: #ffffff;\">Prof. RNK Bamezai, did his Ph.D. from All India Institute of Medical Sciences (AIIMS), New Delhi; and served as Faculty (first at Institute of Medical Sciences, IMS, BHU and then at Jawaharlal Nehru University, JNU) since 1980. He was Dean, School of Life Sciences (SLS); and School of Computational and Integrative Sciences (SCIS); Coordinator, National Centre of Applied Human Genetics (NCAHG) at SLS and Bioinformatics, JNU; and served as Vice Chancellor, SMVDU, Katra, Jammu, J&amp;K. Credited with around 40 years&rsquo; experience of teaching and guiding research and more than 140 papers published in journals, like: JBC, Eur. J. Human Genetics, Human Genetics, PLoS Pathogens, PLoS Genetics, CELL, Nucleic Acid Research, Journal of Molecular Modeling, Briefings in Bioinformatics, (Nature)Scientific Reports, he has trained &amp; 400 students; guided ~40 Ph.D. students and facilitated in creation of Human Genetics/Genomics related advanced research in different universities across the country. He also served JNU as: Cluster Director, Trans-disciplinary Cluster; Chairman, Intellectual Property Management Cell; Founder &amp; Chairman of the Institutional Ethics Review Board. Professor Bamezai has been on the advisory councils, academic and executive councils and task forces of several institutions and scientific bodies and continues to be associated with international and national research journals as an editor-in-chief, associate editor or as an editorial board member. Apart from associating with mentoring programmes of students and young faculty in the country, he has contributed to the growth of higher education and the management of Indian science for development and self- reliance. His concern in Public Health and creating genomic literates within the society has resulted in establishing Genomics and Public (GAP) Health Foundation in Dehradun; and Delhi School of Public Health, University of Delhi as its Founder Hon. Director. In recognition of the contributions in research and institution building, he has received many awards, delivered several orations, and has been a Fellow of NASI, NAMS, INSA, besides receiving Padma Shri (by the President of India, in the area of Science and Engineering, in the year 2012).</span>');
INSERT INTO `school_office` (`id`,`school_id`,`name`,`photograph`,`position`,`description`) VALUES
('schoolsoff0002','school_ph','Prof. Daman Saluja','uploads/schooloffice/schoolsoff0002.png','Joint Director','');
INSERT INTO `school_office` (`id`,`school_id`,`name`,`photograph`,`position`,`description`) VALUES
('schoolsoff0003','school_ccs','Prof. Devesh K Sinha','uploads/schooloffice/schoolsoff0003.png','Director','<span style=\"color: #8c8c8c; font-family: Poppins, sans-serif; font-size: 16px; text-align: justify; background-color: #ffffff;\">Prof. Devesh K Sinha is at present, Hon. Director, Delhi School of Climate Change and Sustainability Institution of Eminence) and Professor of Oceanography and Marine Geology in the Department of Geology, Centre of Advanced Study at Delhi University. He was also Head of the Department and Dean, Faculty of Science. He held one of the top administrative positions in the University of Delhi and worked as Dean of Colleges from 2016-2018. Prof. Sinha obtained his Graduate and Post-Graduate degrees in Geology from Banaras Hindu University with a specialization in Micropaleontology and Paleoceanography.</span>');
INSERT INTO `school_office` (`id`,`school_id`,`name`,`photograph`,`position`,`description`) VALUES
('schoolsoff0004','school_ppg','Mr. Shakti Sinha','uploads/schooloffice/schoolsoff0004.png','Honorary Director','');
INSERT INTO `school_office` (`id`,`school_id`,`name`,`photograph`,`position`,`description`) VALUES
('schoolsoff0005','school_ta','Prof. Harsh Pant','uploads/schooloffice/schoolsoff0005.png','Director','');
INSERT INTO `school_office` (`id`,`school_id`,`name`,`photograph`,`position`,`description`) VALUES
('schoolsoff0006','school_seed','Prof. Vijay K. Chaudhary','uploads/schooloffice/schoolsoff0006.png','Director','<span style=\"color: #8c8c8c; font-family: Poppins, sans-serif; font-size: 16px; background-color: #ffffff;\">Dr. Vijay Kumar Chaudhary is a Professor at the Department of Biochemistry at University of Delhi South Campus since 1996. He completed Ph.D. in Biochemistry from V.P. Chest Institute, University of Delhi in 1983. He served as Clinical Biochemist at Escorts Medical Centre, Faridabad during 1981-85. During 1985-90, while working at National Institutes of Health (NIH), Bethesda, Maryland, USA, under Dr. Ira Pastan, he pioneered the design and production of the world&rsquo;s first recombinant immunotoxins for targeted therapy of cancer and AIDS, which won him NIH Directors&rsquo; Award in 1991.</span>');
INSERT INTO `school_office` (`id`,`school_id`,`name`,`photograph`,`position`,`description`) VALUES
('schoolsoff0007','school_ppg','Professor V. K. Ahuja','uploads/schooloffice/schoolsoff0007.png','Joint Director','<span style=\"color: #8c8c8c; font-family: Poppins, sans-serif; font-size: 16px; background-color: #ffffff;\">Professor, Faculty of Law, University of Delhi</span>');
INSERT INTO `school_office` (`id`,`school_id`,`name`,`photograph`,`position`,`description`) VALUES
('schoolsoff0008','school_ppg','Dr. Ashutosh Mishra','uploads/schooloffice/schoolsoff0008.png','Officer on Special Duty (OSD)','<span style=\"color: #8c8c8c; font-family: Poppins, sans-serif; font-size: 16px; background-color: #ffffff;\">Assistant Professor, Faculty of Law,</span><br style=\"box-sizing: inherit; border-color: #e6e6e6; color: #8c8c8c; font-family: Poppins, sans-serif; font-size: 16px; background-color: #ffffff;\" /><span style=\"color: #8c8c8c; font-family: Poppins, sans-serif; font-size: 16px; background-color: #ffffff;\">University of Delhi</span>');



-- -------------------------------------------
-- TABLE DATA school_slider
-- -------------------------------------------
INSERT INTO `school_slider` (`id`,`school_id`,`image`,`heading`) VALUES
('school_gh0001','school_gh','uploads/schoolslider/school_gh0001.png','Qwe');
INSERT INTO `school_slider` (`id`,`school_id`,`image`,`heading`) VALUES
('school_ppg0001','school_ppg','uploads/schoolslider/school_ppg0001.png','Public Policy & Governance');
INSERT INTO `school_slider` (`id`,`school_id`,`image`,`heading`) VALUES
('school_ppg0002','school_ppg','uploads/schoolslider/school_ppg0002.png','Public Policy & Governance');



-- -------------------------------------------
-- TABLE DATA schools
-- -------------------------------------------
INSERT INTO `schools` (`id`,`school_id`,`title`,`school_logo`) VALUES
('school0001','school_ph','Public Health','<g><path d=\"m457.328 80-61.579-32.661-7.5 14.135 63.338 33.593a8 8 0 0 0 3.749.933h40v-16z\"></path><path d=\"m454.614 160.033-48.1 4.372a72.337 72.337 0 0 1 -60.037-23.538l-24.886-27.653a24 24 0 0 1 -1.082-30.814l42.391 28.26a8 8 0 1 0 8.875-13.312l-48-32-.015-.011-.01-.006a8.012 8.012 0 0 0 -4.45-1.331h-87.957a39.378 39.378 0 0 1 -38.666-32h140l39.57 20.988 7.5-14.135-41.327-21.92a7.993 7.993 0 0 0 -3.749-.933h-150.666a8 8 0 0 0 -8 7.889 55.342 55.342 0 0 0 55.338 56.111h71.946a40.005 40.005 0 0 0 6.413 43.918l24.886 27.652a88.468 88.468 0 0 0 65.512 29.13q3.923 0 7.862-.356l47.738-4.344h39.637v-16h-40c-.237 0-.483.011-.723.033z\"></path><path d=\"m280.657 432h-32.657v16h32.657a39.378 39.378 0 0 1 38.666 32h-140l-118.912-63.067a8 8 0 0 0 -3.749-.933h-40v16h38.01l118.908 63.067a7.993 7.993 0 0 0 3.749.933h150.671a8 8 0 0 0 8-7.889 55.342 55.342 0 0 0 -55.343-56.111z\"></path><path d=\"m57.386 351.967 48.1-4.372a72.329 72.329 0 0 1 60.037 23.538l24.886 27.653a24 24 0 0 1 1.085 30.818l-42.394-28.26a8 8 0 1 0 -8.875 13.312l48 32 .015.011.011.007a7.988 7.988 0 0 0 4.409 1.326h39.34v-16h-23.29a40 40 0 0 0 -6.412-43.918l-24.886-27.652a88.417 88.417 0 0 0 -73.377-28.77l-47.735 4.34h-39.638v16h40c.238 0 .484-.011.724-.033z\"></path><path d=\"m288 152h-64a8 8 0 0 0 -8 8v56h-16v16h24a8 8 0 0 0 8-8v-56h48v56a8 8 0 0 0 8 8h56v48h-56a8 8 0 0 0 -8 8v56h-48v-56a8 8 0 0 0 -8-8h-56v-48h16v-16h-24a8 8 0 0 0 -8 8v64a8 8 0 0 0 8 8h56v56a8 8 0 0 0 8 8h64a8 8 0 0 0 8-8v-56h56a8 8 0 0 0 8-8v-64a8 8 0 0 0 -8-8h-56v-56a8 8 0 0 0 -8-8z\"></path><path d=\"m104 256a151.266 151.266 0 0 0 8.447 50l15.105-5.275a135.311 135.311 0 0 1 -7.552-44.725c0-74.991 61.009-136 136-136a137.73 137.73 0 0 1 15.118.834l1.764-15.9a153.459 153.459 0 0 0 -16.882-.934c-83.813 0-152 68.187-152 152z\"></path><path d=\"m256 392a137.73 137.73 0 0 1 -15.118-.834l-1.764 15.9a153.472 153.472 0 0 0 16.882.934c83.813 0 152-68.187 152-152a151.266 151.266 0 0 0 -8.447-50l-15.105 5.275a135.316 135.316 0 0 1 7.552 44.725c0 74.991-61.009 136-136 136z\"></path><path d=\"m428.916 201.57a8 8 0 0 0 -2.964 8.512 176.3 176.3 0 0 1 -85.784 200.527l7.664 14.046a192.293 192.293 0 0 0 97.647-199.824l22.275 13.949 8.492-13.56-38.324-24a8 8 0 0 0 -9.006.35z\"></path><path d=\"m76.359 304a8 8 0 0 0 7.811-9.731 176.109 176.109 0 0 1 95.312-196.812l-6.964-14.4a192.27 192.27 0 0 0 -106.889 198.043l-29.822-16.136-7.614 14.072 44.36 24a7.985 7.985 0 0 0 3.806.964z\"></path>
                              </g>');
INSERT INTO `schools` (`id`,`school_id`,`title`,`school_logo`) VALUES
('school0002','school_ccs','Climate Change & Sustainability','<g><path d=\"m 63 119 c 30.877 0 56 -25.123 56 -56 c 0 -8.792 -2.093 -17.087 -5.726 -24.507 c 7.721 -10.836 20.286 -17.493 33.726 -17.493 c 19.88 0 36.946 14.448 40.593 33.817 c -1.33 0.735 -2.625 1.526 -3.878 2.394 c -8.568 -5.229 -18.452 -8.211 -28.518 -8.211 h -1.197 v 14 h 1.197 c 6.272 0 12.46 1.547 18.06 4.305 c -0.581 0.763 -1.197 1.477 -1.736 2.282 l -2.352 3.528 l 11.648 7.763 l 2.352 -3.528 c 5.999 -8.981 16.03 -14.35 26.831 -14.35 c 7.721 0 14 6.279 14 14 s -6.279 14 -14 14 h -49 c -7.721 0 -14 -6.279 -14 -14 h -14 c 0 15.442 12.558 28 28 28 h 175 c 15.442 0 28 -12.558 28 -28 s -12.558 -28 -28 -28 c -3.311 0 -6.545 0.42 -9.709 1.099 c -8.113 -25.361 -31.794 -43.099 -59.01 -43.099 c -24.843 0 -47.222 14.749 -57.008 37.583 l -1.939 4.522 c -2.492 0.091 -4.942 0.385 -7.35 0.861 c -5.74 -24.794 -28.161 -42.966 -53.984 -42.966 c -16.184 0 -31.416 7.238 -41.846 19.257 c -10.269 -11.774 -25.34 -19.257 -42.154 -19.257 c -30.877 0 -56 25.123 -56 56 s 25.123 56 56 56 z m 204.281 -98 c 21.329 0 39.732 14.119 45.787 34.139 c -1.141 0.651 -2.275 1.316 -3.353 2.065 c -8.575 -5.222 -18.452 -8.204 -28.518 -8.204 h -1.197 v 14 h 1.197 c 6.265 0 12.46 1.547 18.06 4.305 c -0.581 0.763 -1.197 1.477 -1.736 2.282 l -2.352 3.528 l 11.648 7.763 l 2.352 -3.528 c 5.999 -8.981 16.03 -14.35 26.831 -14.35 c 7.721 0 14 6.279 14 14 s -6.279 14 -14 14 h -101.892 c 2.408 -4.137 3.892 -8.876 3.892 -14 c 0 -10.997 -6.426 -20.433 -15.666 -25.011 l 0.812 -1.89 c 7.574 -17.675 24.899 -29.099 44.135 -29.099 z m -204.281 0 c 23.163 0 42 18.837 42 42 s -18.837 42 -42 42 s -42 -18.837 -42 -42 s 18.837 -42 42 -42 z m 399 259 v -31.5 l 28 -21 v -17.5 h -14 v 10.5 l -14 10.5 v -35 h -14 v 49 l -14 -10.5 v -10.5 h -14 v 17.5 l 28 21 v 17.5 h -70 v -45.5 l 28 -21 v -17.5 h -14 v 10.5 l -14 10.5 v -32.102 l 11.949 -11.949 l -9.898 -9.898 l -16.051 16.051 v 51.898 l -14 -10.5 v -10.5 h -14 v 17.5 l 28 21 v 31.5 h -98 v -8.953 l 3.472 -1.155 c 23.044 -7.686 38.528 -29.162 38.528 -53.452 c 0 -15.043 -5.859 -29.197 -16.499 -39.837 l -32.501 -32.501 l -26.775 26.775 c -2.73 -5.614 -6.272 -10.822 -10.724 -15.281 l -32.501 -32.494 l -32.501 32.501 c -10.64 10.64 -16.499 24.794 -16.499 39.837 c 0 24.29 15.484 45.766 38.521 53.445 l 3.479 1.155 v 29.96 h -113.967 l 3.43 13.713 c 24.773 99.085 113.407 168.287 215.537 168.287 s 190.764 -69.202 215.537 -168.287 l 3.43 -13.713 z m -191.548 43.806 l 8.015 12.019 c 1.001 1.498 1.533 3.248 1.533 5.054 c 0 5.033 -4.088 9.121 -9.121 9.121 h -107.758 c -5.033 0 -9.121 -4.088 -9.121 -9.121 c 0 -1.806 0.532 -3.556 1.533 -5.061 l 8.022 -12.026 c 2.905 -4.368 4.445 -9.457 4.445 -14.707 c 0 -5.39 -1.722 -10.675 -4.767 -15.085 h 107.534 c -3.045 4.417 -4.767 9.695 -4.767 15.085 c 0 5.25 1.54 10.339 4.452 14.721 z m -11.452 -159.908 l 22.603 22.603 c 7.994 7.994 12.397 18.634 12.397 29.939 c 0 17.899 -11.228 33.719 -28 39.767 v -8.302 l 18.949 -18.949 l -9.898 -9.898 l -9.051 9.044 v -15.204 l 11.949 -11.949 l -9.898 -9.898 l -16.051 16.051 v 49.098 c -16.772 -6.041 -28 -21.854 -28 -39.76 c 0 -11.305 4.403 -21.945 12.397 -29.939 z m -105 31.542 c 0 -11.305 4.403 -21.945 12.397 -29.939 l 22.603 -22.603 l 22.603 22.603 c 4.662 4.662 8.071 10.367 10.143 16.597 c -7.588 9.8 -11.746 21.742 -11.746 34.342 c 0 3.248 0.322 6.426 0.854 9.548 c -4.263 4.067 -9.303 7.238 -14.854 9.233 v -44.1 l 12.824 -19.236 l -11.648 -7.763 l -9.261 13.895 l -7.966 -7.966 l -9.898 9.898 l 11.949 11.949 v 15.204 l -9.051 -9.051 l -9.898 9.898 l 18.949 18.949 v 8.302 c -16.772 -6.041 -28 -21.854 -28 -39.76 z m 42 54.607 l 3.472 -1.155 c 5.775 -1.925 11.123 -4.872 15.967 -8.512 c 6.412 13.636 18.102 24.514 33.082 29.505 l 3.479 1.155 v 8.96 h -56 z m -51.898 43.953 l 6.23 6.23 c 2.331 2.331 3.668 5.565 3.668 8.855 c 0 2.478 -0.728 4.886 -2.1 6.951 l -8.015 12.019 c -2.541 3.808 -3.885 8.246 -3.885 12.824 c 0 12.754 10.367 23.121 23.121 23.121 h 107.765 c 12.747 0 23.114 -10.367 23.114 -23.121 c 0 -4.578 -1.344 -9.016 -3.885 -12.824 l -8.015 -12.012 c -1.372 -2.065 -2.1 -4.473 -2.1 -6.958 c 0 -3.297 1.337 -6.531 3.668 -8.862 l 6.23 -6.23 h 47.852 c -1.12 2.695 -1.75 5.642 -1.75 8.729 c 0 10.444 7.077 19.516 17.213 22.043 l 29.54 7.385 c 5.446 1.372 9.247 6.237 9.247 11.851 c 0 5.019 -3.01 9.471 -7.672 11.326 l -43.925 17.577 c -11.179 4.473 -18.403 15.141 -18.403 27.174 c 0 10.472 5.649 20.216 14.749 25.41 l 19.005 10.857 c -21.028 7.343 -43.505 11.347 -66.759 11.571 l -35.602 -23.737 c -0.868 -0.574 -1.393 -1.547 -1.393 -2.597 c 0 -1.533 1.099 -2.828 2.618 -3.08 l 24.045 -4.004 c 8.883 -1.491 15.337 -9.114 15.337 -18.13 c 0 -10.129 -8.239 -18.368 -18.368 -18.368 h -144.235 c -20.923 -23.569 -36.792 -52.01 -45.402 -84 z m 101.521 141.834 l 15.61 10.409 c -44.303 -5.488 -84.735 -24.836 -116.249 -54.243 h 130.648 c 2.408 0 4.368 1.96 4.368 4.368 c 0 2.149 -1.533 3.955 -3.647 4.312 l -24.038 4.004 c -8.295 1.386 -14.315 8.484 -14.315 16.898 c 0 5.733 2.849 11.067 7.623 14.252 z m 126.721 -6.125 l -28.651 -16.373 c -4.746 -2.716 -7.693 -7.791 -7.693 -13.258 c 0 -6.279 3.773 -11.844 9.604 -14.175 l 43.925 -17.577 c 10.003 -3.997 16.471 -13.545 16.471 -24.325 c 0 -12.047 -8.162 -22.498 -19.845 -25.424 l -29.54 -7.385 c -3.899 -0.98 -6.615 -4.459 -6.615 -8.47 c 0 -4.809 3.913 -8.722 8.722 -8.722 h 129.276 c -16.632 61.796 -59.955 110.698 -115.654 135.709 z z z z h -14 z z m 357 119 h 14 v 14 h -14 z\">
                              </g>');
INSERT INTO `schools` (`id`,`school_id`,`title`,`school_logo`) VALUES
('school0003','school_ppg','Public Policy & Governance','<path d=\"m 441 79.674 v -30.674 c 0 -15.442 -12.558 -28 -28 -28 h -1.288 c -2.898 -8.127 -10.598 -14 -19.712 -14 h -27.979 c -5.621 0 -10.899 2.191 -14.861 6.167 c -3.969 3.969 -6.146 9.254 -6.139 14.854 l -0.014 118.979 h -45.22 c -3.71 0 -7.371 0.987 -10.584 2.863 l -73.787 43.043 c -6.426 3.745 -10.416 10.696 -10.416 18.137 v 19.782 c -9.233 -5.418 -19.131 -9.534 -29.505 -12.474 l -1.596 -4.788 c 16.086 -6.342 28.007 -20.944 30.541 -38.57 h 0.56 c 15.442 0 28 -12.558 28 -28 c 0 -6.657 -2.429 -12.691 -6.321 -17.5 l 5.642 -33.859 c 0.455 -2.667 0.679 -5.418 0.679 -8.162 c 0 -17.57 -9.429 -33.992 -24.612 -42.854 l -49.798 -29.05 c -9.618 -5.607 -20.58 -8.568 -31.71 -8.568 c -19.222 0 -37.135 8.61 -49.133 23.618 l -2.793 3.486 c -6.762 8.449 -8.75 19.628 -5.334 29.897 c 0.847 2.534 0.196 5.278 -1.687 7.161 l -7.259 7.259 c -6.237 6.251 -9.674 14.546 -9.674 23.373 c 0 2.709 0.336 5.411 0.994 8.015 l 5.019 20.069 c -3.71 4.746 -6.013 10.647 -6.013 17.122 c 0 15.442 12.558 28 28 28 h 0.56 c 2.541 17.626 14.455 32.221 30.541 38.57 l -1.582 4.753 c -51.184 14.49 -87.941 59.171 -91.896 112.518 l -8.162 110.159 h 434.539 v -280 c 0 -7.721 -6.279 -14 -14 -14 h -14 v -37.674 l 14 7 v 16.674 h 14 v -16.674 c 0 -5.341 -2.968 -10.136 -7.735 -12.523 l -11.613 -5.803 l 11.606 -5.803 c 4.774 -2.387 7.742 -7.182 7.742 -12.523 z m -52.808 165.326 h -20.384 l -8.4 -28 h 37.184 z m -4.2 14 l -3.689 12.292 c -0.616 2.044 -3.99 2.044 -4.606 0 l -3.689 -12.292 z m -26.992 -56 l 0.014 -98 h 41.986 v 98 z m 2.065 -179.949 c 1.323 -1.323 3.08 -2.051 4.956 -2.051 h 27.979 c 3.864 0 7 3.143 7 7 v 63 h -41.986 l 0.007 -62.993 c 0 -1.869 0.721 -3.626 2.044 -4.956 z m -81.732 148.778 l -14.602 29.085 c -8.4 -3.227 -17.395 -4.914 -26.383 -4.914 h -0.448 z m -74.333 255.171 h -46.102 l 25.732 -25.732 l -28.392 -134.855 l 3.248 -9.758 l 22.428 13.454 l 6.447 -32.221 c 5.81 2.688 11.333 5.95 16.639 9.618 z m -91.679 -195.517 l 14.14 7.07 l -15.547 9.331 l -3.024 -15.106 c 1.463 -0.462 2.947 -0.882 4.431 -1.295 z m 57.33 0.014 c 1.498 0.406 2.968 0.875 4.445 1.344 l -3.01 15.05 l -15.547 -9.331 z m -28.651 14.665 l 5.194 3.115 l -3.241 9.723 h -3.913 l -3.241 -9.716 z m -1.323 26.838 h 2.646 l 26.047 123.732 l -27.37 27.37 l -27.37 -27.37 z m 64.323 -112 v -28 c 7.721 0 14 6.279 14 14 s -6.279 14 -14 14 z m -140 -14 c 0 -7.721 6.279 -14 14 -14 v 28 c -7.721 0 -14 -6.279 -14 -14 z m 28 21 v -63 c 0 -7.721 6.279 -14 14 -14 v -14 c -15.442 0 -28 12.558 -28 28 v 14 c -3.465 0 -6.748 0.714 -9.821 1.869 l -3.612 -14.469 c -0.378 -1.498 -0.567 -3.045 -0.567 -4.606 c 0 -5.089 1.981 -9.877 5.579 -13.475 l 7.252 -7.245 c 5.663 -5.656 7.609 -13.888 5.075 -21.497 c -1.911 -5.747 -0.798 -11.998 2.982 -16.73 l 2.793 -3.486 c 9.331 -11.669 23.254 -18.361 38.199 -18.361 c 8.652 0 17.178 2.303 24.654 6.664 l 49.798 29.05 c 10.899 6.356 17.668 18.144 17.668 30.758 c 0 1.967 -0.161 3.934 -0.483 5.852 l -4.543 27.279 c -2.835 -0.966 -5.817 -1.603 -8.974 -1.603 h -0.182 c -0.91 -11.788 -8.68 -21.994 -20.041 -25.788 c -13.027 -4.34 -21.777 -16.485 -21.777 -30.212 h -14 c 0 19.761 12.6 37.24 31.353 43.498 c 6.37 2.121 10.647 8.064 10.647 14.777 v 46.725 c 0 19.299 -15.701 35 -35 35 h -28 c -19.299 0 -35 -15.701 -35 -35 z m 35 49 h 28 c 1.421 0 2.828 -0.091 4.221 -0.217 l 1.225 3.668 l -19.446 9.723 l -19.439 -9.716 l 1.225 -3.668 c 1.386 0.119 2.793 0.21 4.214 0.21 z m -97.419 114.863 c 3.073 -41.426 28.399 -76.972 65.065 -93.926 l 6.44 32.172 l 22.428 -13.454 l 3.248 9.758 l -28.392 134.855 l 25.732 25.732 h -46.102 v -119 h -14 v 119 h -41.461 z m 398.419 -170.863 v 266 h -210 v -215.957 c 0 -0.357 0.084 -0.693 0.14 -1.043 h 19.208 c 9.163 0 18.333 2.163 26.523 6.265 l 6.251 3.122 l 29.309 -58.387 h 44.569 v 47.971 c 0 1.337 0.189 2.674 0.588 4.025 l 18.697 62.307 c 2.065 6.888 8.526 11.697 15.715 11.697 c 7.196 0 13.657 -4.816 15.715 -11.69 l 18.711 -62.356 c 0.385 -1.309 0.574 -2.646 0.574 -3.983 v -47.971 z\"></path>

');
INSERT INTO `schools` (`id`,`school_id`,`title`,`school_logo`) VALUES
('school0004','school_ta','Transnational Affairs','<g><g><path d=\"M423.503,121.912c3.248-11.015,4.944-22.429,5.04-33.912c-0.057-48.577-39.423-87.943-88-88    c-18.358,0.001-36.25,5.784-51.136,16.528C170.252-17.214,46.305,52.026,12.563,171.181    c-33.742,119.154,35.498,243.102,154.653,276.844c119.154,33.742,243.102-35.498,276.844-154.653    C460.372,235.766,452.971,174.029,423.503,121.912z M436.279,224h-76.296c23.156-23.866,42.142-51.45,56.168-81.6    C428.343,167.947,435.192,195.714,436.279,224z M340.543,16c39.765,0,72,32.235,72,72c0,56.976-54.488,115.56-72,132.92    c-17.528-17.344-72-75.856-72-132.92C268.543,48.235,300.778,16,340.543,16z M236.543,24.296    c12.998,0.462,25.924,2.142,38.608,5.016C260.609,45.401,252.553,66.313,252.543,88c0.092,10.82,1.617,21.581,4.536,32h-20.536    V24.296z M236.543,136h25.768c14.007,32.706,33.939,62.54,58.792,88h-84.56V136z M236.543,240h95.896    c-0.431,29.69-4.351,59.226-11.68,88h-61.352c-2.913-11.202-11.662-19.951-22.864-22.864V240z M220.543,24.696V120h-79.248    C158.703,66.696,187.935,29.92,220.543,24.696z M125.743,262.536c10.658-3.219,18.868-11.759,21.664-22.536h73.136v65.136    c-11.202,2.913-19.951,11.662-22.864,22.864h-61.136c-5.615-21.455-9.238-43.383-10.824-65.504L125.743,262.536z M116.543,248    c-8.837,0-16-7.163-16-16s7.163-16,16-16s16,7.163,16,16S125.379,248,116.543,248z M147.407,224    c-2.812-10.767-11.031-19.292-21.688-22.496c1.586-22.121,5.209-44.049,10.824-65.504h84v88H147.407z M175.503,30.88    c-21.36,19.52-39.168,50.584-51.04,89.12H53.407C81.54,76.08,125.098,44.286,175.503,30.88z M44.111,136h75.888    c-5.284,21.263-8.715,42.944-10.256,64.8c-11.744,2.596-21.04,11.559-24.064,23.2H20.743C21.89,193.294,29.873,163.23,44.111,136z     M20.743,240h64.936c3.011,11.657,12.31,20.637,24.064,23.24c1.543,21.842,4.975,43.51,10.256,64.76H44.111    C29.873,300.77,21.89,270.706,20.743,240z M53.407,344h71.056c11.872,38.536,29.688,69.6,51.04,89.12    C125.098,419.714,81.54,387.92,53.407,344z M220.543,439.304c-32.608-5.224-61.84-42-79.248-95.304h56.384    c2.913,11.202,11.662,19.951,22.864,22.864V439.304z M228.543,352c-8.837,0-16-7.163-16-16s7.163-16,16-16s16,7.163,16,16    S237.379,352,228.543,352z M236.543,439.32v-72.456c11.202-2.913,19.951-11.662,22.864-22.864h56.704    C298.943,397.448,269.943,434.216,236.543,439.32z M282.455,432.872C303.743,413.32,321.287,382.4,332.927,344h70.752    C375.709,387.649,332.497,419.329,282.455,432.872z M412.975,328h-75.632c6.977-28.826,10.699-58.344,11.096-88h87.904    C435.196,270.706,427.213,300.77,412.975,328z\"></path>
                </g>
              </g><g><g><path d=\"M340.543,32c-30.928,0-56,25.072-56,56c0.04,30.911,25.089,55.96,56,56c30.928,0,56-25.072,56-56    C396.543,57.072,371.471,32,340.543,32z M340.543,128c-22.091,0-40-17.909-40-40c0.026-22.08,17.92-39.974,40-40    c22.091,0,40,17.909,40,40S362.634,128,340.543,128z\"></path>
              </g>
            </g><g><g><rect x=\"332.543\" y=\"160\" width=\"16\" height=\"16\"></rect>
            </g>
          </g>');
INSERT INTO `schools` (`id`,`school_id`,`title`,`school_logo`) VALUES
('school0005','school_seed','Skill Enhancement & Entrepreneurship Development','<g><path d=\"m385.274 281.22c19.185 8.5 31.581 27.55 31.581 48.53v25.366c0 4.142 3.358 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-25.366c0-26.909-15.899-51.341-40.588-62.28l-81.336-34.854c.002-.205.018-.412.018-.616v-32.373c16.751-14.899 27.331-36.593 27.331-60.72l.025-62.665c0-16.666-5.012-32.688-14.494-46.335-9.262-13.331-22.115-23.493-37.169-29.39-2.929-1.146-6.261-.345-8.348 2.008l-11.309 12.757c-6.612 7.313-16.053 11.507-25.9 11.507h-22.254c-23.782 0-43.131 19.346-43.131 43.126v40.546.001s0 0 0 .001v28.443c0 24.139 10.59 45.843 27.356 60.742v32.352c0 .308.023.617.029.925l-80.257 34.887c-25.318 10.655-41.678 35.286-41.678 62.752v24.553c0 4.142 3.358 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-24.553c0-21.414 12.755-40.618 32.577-48.96l39.862-17.327c6.581 15.934 17.288 29.706 31.321 40.154 16.6 12.359 36.337 18.892 57.081 18.892 16.399 0 32.584-4.222 46.803-12.21 2.002-1.125 3.992-2.339 5.914-3.61 3.455-2.285 4.404-6.938 2.119-10.393s-6.938-4.404-10.393-2.119c-1.621 1.072-3.298 2.096-4.987 3.044-11.981 6.73-25.625 10.288-39.457 10.288-33.116 0-62.323-19.843-74.651-50.023l23.204-10.086c6.936 22.063 27.579 37.727 51.46 37.727 24.05 0 44.736-15.795 51.557-38.021l23.247 9.962c-2.336 5.781-5.338 11.278-8.975 16.403-2.397 3.378-1.603 8.06 1.775 10.457 1.317.935 2.833 1.384 4.334 1.384 2.348 0 4.66-1.1 6.123-3.16 4.254-5.994 7.772-12.421 10.528-19.177zm-195.574-142.314v-21.632c3.399-.669 6.696-1.816 9.766-3.413 4.547-2.365 8.635-5.755 11.82-9.805 2.562-3.255 1.999-7.971-1.256-10.532-3.256-2.563-7.971-2-10.532 1.256-1.878 2.387-4.283 4.383-6.954 5.772-.964.501-1.917.9-2.844 1.22v-31.857c0-15.509 12.62-28.126 28.131-28.126h22.254c14.08 0 27.576-5.995 37.076-16.502l7.747-8.739c22.881 11.033 37.397 33.936 37.397 59.693v15.323c-9.407 3.482-19.309 5.266-29.489 5.266-22.17 0-43.168-8.475-59.125-23.864-2.981-2.875-7.729-2.789-10.605.192-2.875 2.982-2.79 7.729.192 10.605 18.768 18.1 43.464 28.067 69.538 28.067 10.09 0 19.958-1.476 29.445-4.397.025.45.019 31.473.019 31.473 0 36.547-29.738 66.28-66.29 66.28s-66.29-29.733-66.29-66.28zm66.302 132.034c-19.651 0-36.267-14.681-38.652-34.158-.195-1.58-.294-3.189-.294-4.783v-21.763c11.569 6.339 24.837 9.95 38.934 9.95 14.107 0 27.384-3.617 38.959-9.965v21.779c0 1.514-.09 3.044-.271 4.567-2.276 19.596-18.902 34.373-38.676 34.373z\"></path><path d=\"m318.11 420.617-36.593-5.317-16.365-33.154c-1.72-3.484-5.201-5.648-9.087-5.648s-7.367 2.165-9.086 5.648l-16.365 33.155-36.594 5.317c-3.845.559-6.98 3.202-8.18 6.898-1.2 3.695-.217 7.675 2.565 10.386l26.479 25.807-6.251 36.44c-.656 3.829.888 7.626 4.031 9.91 3.143 2.283 7.231 2.58 10.671.772l32.73-17.206 32.731 17.206c1.495.786 3.113 1.174 4.723 1.174 2.092 0 4.171-.656 5.947-1.946 3.143-2.284 4.688-6.081 4.031-9.911l-6.251-36.439 26.478-25.807c2.783-2.711 3.766-6.691 2.566-10.386-1.199-3.696-4.334-6.339-8.18-6.899zm-66.408-31.832.005.011c-.002-.004-.004-.008-.005-.011-.001 0-.001 0 0 0zm33.243 65.968c-2.389 2.329-3.478 5.682-2.914 8.969l5.017 29.243-26.268-13.808c-2.954-1.552-6.478-1.551-9.43 0l-26.267 13.808 5.017-29.243c.564-3.288-.525-6.641-2.915-8.97l-21.248-20.709 29.364-4.266c3.303-.48 6.156-2.553 7.63-5.543l13.134-26.608 13.132 26.605c1.476 2.993 4.329 5.066 7.631 5.545l29.365 4.267z\"></path><path d=\"m149.699 420.617-36.593-5.317-16.365-33.154c-1.72-3.484-5.201-5.648-9.087-5.648s-7.367 2.165-9.086 5.648l-16.365 33.155-36.594 5.317c-3.845.559-6.98 3.202-8.18 6.898-1.2 3.695-.217 7.675 2.565 10.386l26.479 25.807-6.251 36.44c-.656 3.829.888 7.626 4.031 9.91 3.143 2.283 7.231 2.58 10.671.772l32.73-17.206 32.731 17.206c1.495.786 3.113 1.174 4.723 1.174 2.092 0 4.171-.656 5.947-1.946 3.143-2.284 4.688-6.081 4.031-9.911l-6.251-36.439 26.478-25.807c2.783-2.711 3.766-6.691 2.566-10.386-1.199-3.696-4.334-6.339-8.18-6.899zm-66.409-31.832.005.011c-.001-.004-.003-.008-.005-.011zm33.244 65.968c-2.389 2.329-3.478 5.682-2.914 8.969l5.017 29.243-26.268-13.808c-2.953-1.551-6.477-1.551-9.43 0l-26.267 13.808 5.017-29.243c.564-3.288-.525-6.641-2.915-8.97l-21.248-20.709 29.364-4.266c3.303-.48 6.156-2.553 7.63-5.543l13.134-26.608 13.132 26.605c1.476 2.993 4.329 5.066 7.631 5.545l29.365 4.267z\"></path><path d=\"m494.577 427.515c-1.2-3.696-4.335-6.339-8.181-6.898l-36.593-5.317-16.365-33.154c-1.72-3.484-5.201-5.648-9.087-5.648s-7.367 2.165-9.086 5.648l-16.365 33.155-36.594 5.317c-3.845.559-6.98 3.202-8.18 6.898-1.2 3.695-.217 7.675 2.565 10.386l26.479 25.807-6.251 36.44c-.656 3.829.888 7.626 4.031 9.91 3.143 2.283 7.231 2.58 10.671.772l32.73-17.206 32.731 17.206c1.495.786 3.113 1.174 4.723 1.174 2.092 0 4.171-.656 5.947-1.946 3.143-2.284 4.688-6.081 4.031-9.911l-6.251-36.439 26.478-25.807c2.783-2.712 3.767-6.691 2.567-10.387zm-74.59-38.73.005.011c-.002-.004-.004-.008-.005-.011-.001 0-.001 0 0 0zm33.243 65.968c-2.389 2.329-3.478 5.682-2.914 8.969l5.017 29.243-26.268-13.808c-2.953-1.551-6.477-1.551-9.43 0l-26.267 13.808 5.017-29.243c.564-3.288-.525-6.641-2.915-8.97l-21.248-20.709 29.364-4.266c3.303-.48 6.156-2.553 7.63-5.543l13.134-26.608 13.132 26.605c1.476 2.993 4.329 5.066 7.631 5.545l29.365 4.267z\"></path>
          </g>');
INSERT INTO `schools` (`id`,`school_id`,`title`,`school_logo`) VALUES
('school0006','school_icd','Informatics, Computing & Data Analytics','<path d=\"m 434 203 a 90.909 90.909 90 0 0 -148.26 -70.63 a 76.594 76.594 90 0 0 1.26 -13.37 a 7 7 90 0 0 -7 -7 h -63 v -63 a 7 7 90 0 0 -7 -7 a 77.077 77.077 90 0 0 -73.99 56 h -38.01 a 35 35 90 0 0 -35 35 v 182 a 35 35 90 0 0 35 35 h 98 v 42 h -21 a 21.063 21.063 90 0 0 -21 21 v 14 a 7 7 90 0 0 7 7 h 126 a 7 7 90 0 0 7 -7 v -14 a 21.063 21.063 90 0 0 -21 -21 h -21 v -42 h 56 v 49 a 35 35 90 0 0 70 0 v -84 a 7 7 90 0 0 -7 -7 h -7 v -16.52 a 91.175 91.175 90 0 0 70 -88.48 z m -231 -146.58 v 62.58 a 7 7 90 0 0 7 7 h 62.58 a 63 63 90 1 1 -69.58 -69.58 z m 70 349.58 a 7 7 90 0 1 7 7 v 7 h -112 v -7 a 7 7 90 0 1 7 -7 z m -63 -14 v -42 h 28 v 42 z m 105 -84 a 7 7 90 0 0 -7 7 v 21 h -210 a 21.063 21.063 90 0 1 -21 -21 v -7 h 217 v -14 h -217 v -161 a 21.063 21.063 90 0 1 21 -21 h 35.35 c -0.21 2.31 -0.35 4.62 -0.35 7 a 76.923 76.923 90 0 0 121.66 62.65 a 89.6 89.6 90 0 0 -2.66 21.35 a 91.175 91.175 90 0 0 70 88.48 v 16.52 z m 49 91 a 21 21 90 0 1 -42 0 v -77 h 42 z m -28 -91 v -14.35 c 2.31 0.14 4.62 0.35 7 0.35 s 4.69 -0.21 7 -0.35 v 14.35 z m 7 -28 a 77 77 90 1 1 77 -77 A 77.049 77.049 90 0 1 343 280 z z z z z z\"></path>
');
INSERT INTO `schools` (`id`,`school_id`,`title`,`school_logo`) VALUES
('school0007','school_che','Culture & Heritage Education','<g><path d=\"m284.878 170.39c-3.835-1.563-8.212.279-9.775 4.115s.279 8.212 4.115 9.775c27.57 11.235 45.384 37.72 45.384 67.475 0 40.168-32.679 72.847-72.847 72.847s-72.847-32.679-72.847-72.847c0-19.278 7.459-37.448 21.003-51.162 13.531-13.701 31.581-21.392 50.824-21.657 4.142-.057 7.453-3.461 7.396-7.603s-3.454-7.46-7.603-7.396c-23.208.32-44.975 9.594-61.291 26.116-16.334 16.54-25.331 38.453-25.331 61.702 0 48.439 39.408 87.847 87.847 87.847s87.847-39.408 87.847-87.847c.002-35.881-21.478-67.819-54.722-81.365z\"></path><path d=\"m193.909 251.755c0 31.897 25.95 57.847 57.847 57.847s57.847-25.95 57.847-57.847-25.95-57.847-57.847-57.847-57.847 25.95-57.847 57.847zm100.693 0c0 23.626-19.221 42.847-42.847 42.847s-42.847-19.221-42.847-42.847 19.221-42.847 42.847-42.847 42.847 19.221 42.847 42.847z\"></path><path d=\"m501.567 171.844 1.862-16.302c.487-4.272-1.229-8.424-4.591-11.104l-12.826-10.228c-2.953-2.355-6.089-4.573-9.322-6.592-3.513-2.196-8.141-1.125-10.334 2.388-2.195 3.513-1.125 8.14 2.388 10.334 2.747 1.716 5.41 3.599 7.916 5.598l11.703 9.332-1.699 14.872c-2.563 22.43-14.145 42.895-31.659 56.718-4.483-36.821-18.778-70.652-40.183-98.801 8.756-.956 17.678-.558 26.304 1.223 4.054.838 8.024-1.771 8.862-5.829.837-4.056-1.772-8.024-5.829-8.862-13.293-2.746-27.183-2.712-40.455.052-4.004-4.433-8.204-8.684-12.576-12.753 6.404-29.063-.635-59.885-19.235-83.283l-10.208-12.842c-2.677-3.368-6.826-5.092-11.1-4.608l-16.302 1.837c-29.288 3.301-55.856 19.733-71.97 44.265-3.497-.178-7.016-.269-10.557-.269-2.505 0-4.996.061-7.479.151-16.029-25.027-42.772-41.807-72.432-45.196l-16.299-1.862c-4.272-.487-8.425 1.227-11.107 4.59l-10.229 12.825c-18.401 23.074-25.562 53.531-19.566 82.308-4.431 4.002-8.681 8.2-12.748 12.571-12.37-2.743-24.999-3.09-37.611-1.011-4.087.674-6.854 4.533-6.181 8.62.674 4.087 4.536 6.852 8.62 6.181 7.967-1.314 15.942-1.488 23.826-.533-21.845 27.86-36.624 61.504-41.649 98.213-17.163-13.846-28.505-34.154-31-56.298l-1.676-14.874 11.717-9.314c3.177-2.525 6.579-4.847 10.11-6.9 3.581-2.082 4.796-6.672 2.714-10.253s-6.674-4.796-10.253-2.714c-4.157 2.417-8.162 5.15-11.905 8.125l-12.843 10.207c-3.368 2.677-5.09 6.827-4.608 11.1l1.837 16.302c3.3 29.287 19.732 55.855 44.265 71.971-.178 3.497-.269 7.016-.269 10.557 0 2.506.061 4.997.151 7.481-25.027 16.028-41.807 42.77-45.196 72.431l-1.862 16.301c-.487 4.272 1.229 8.424 4.59 11.104l12.827 10.229c17.73 14.139 39.819 21.647 62.156 21.647 6.732 0 13.486-.694 20.151-2.083 4.004 4.434 8.204 8.686 12.577 12.755-6.404 29.063.635 59.885 19.235 83.284l10.209 12.843c2.38 2.993 5.923 4.687 9.683 4.687.469 0 .942-.026 1.416-.08l16.302-1.837c29.288-3.3 55.856-19.732 71.97-44.265 3.497.178 7.016.269 10.557.269 2.505 0 4.996-.061 7.479-.151 16.028 25.027 42.772 41.807 72.432 45.196l16.299 1.862c.48.055.959.082 1.434.082 3.753 0 7.292-1.687 9.673-4.672l10.228-12.826c18.401-23.075 25.562-53.531 19.566-82.308 4.434-4.005 8.686-8.205 12.755-12.578 7.037 1.55 14.175 2.325 21.289 2.325 22.263 0 44.261-7.463 61.994-21.559l12.841-10.208c3.368-2.677 5.09-6.827 4.608-11.1l-1.837-16.302c-3.3-29.287-19.732-55.855-44.265-71.971.178-3.497.269-7.016.269-10.557 0-2.505-.061-4.995-.151-7.479 25.028-16.028 41.808-42.771 45.197-72.432zm-162.835 248.538c4.622-13.102 6.804-26.971 6.499-40.809 5.995 1.11 12.065 1.684 18.165 1.684 1.596 0 3.194-.038 4.793-.114 6.135-.293 11.042-5.137 11.415-11.267.447-7.359.058-14.718-1.118-21.988 1.354.048 2.707.086 4.062.086 12.19 0 24.371-1.935 35.996-5.766-18.164 33.356-46.045 60.686-79.812 78.174zm-201.467-55.629c-.112-7.05.665-14.063 2.286-20.939 4.848-.775 9.654-1.856 14.382-3.262 2.248 2.475 4.592 4.861 7.019 7.159-1.6 5-2.842 10.095-3.732 15.243-6.578 1.379-13.262 1.991-19.955 1.799zm1.492-227.488c7.044-.111 14.053.664 20.925 2.284.775 4.849 1.871 9.655 3.276 14.384-2.475 2.248-4.861 4.592-7.159 7.02-5-1.6-10.095-2.842-15.243-3.731-1.379-6.581-1.991-13.265-1.799-19.957zm281.625 27.514c-13.101-4.621-26.968-6.803-40.804-6.499 1.397-7.563 1.933-15.248 1.565-22.957-.292-6.135-5.136-11.043-11.267-11.416-7.355-.447-14.711-.073-21.977 1.1.474-13.533-1.436-27.129-5.692-40.039 33.358 18.162 60.687 46.044 78.175 79.811zm-55.629 201.467c-7.045.118-14.054-.661-20.925-2.282-.775-4.85-1.871-9.656-3.277-14.385 2.485-2.258 4.881-4.612 7.188-7.051 4.992 1.598 10.073 2.859 15.212 3.752 1.382 6.582 1.995 13.27 1.802 19.966zm-112.998 2.685c-64.611 0-117.175-52.564-117.175-117.175s52.565-117.176 117.175-117.176 117.175 52.564 117.175 117.175-52.564 117.176-117.175 117.176zm94.535-228.375c6.58-1.379 13.265-1.993 19.956-1.798.112 7.046-.667 14.055-2.289 20.926-4.847.775-9.651 1.87-14.378 3.275-2.248-2.475-4.592-4.861-7.02-7.159 1.6-5.001 2.842-10.096 3.731-15.244zm11.96 189.393c11.849-16.095 20.144-34.959 23.712-55.427 18.601 11.665 33.091 29.388 40.646 50.087-20.19 8.888-43.043 10.704-64.358 5.34zm25.523-71.78c.102-2.125.158-4.263.158-6.413 0-1.229-.02-2.454-.054-3.676 4.644-2.396 9.104-5.11 13.354-8.108 5.628 3.678 10.787 7.971 15.383 12.839-4.903 5.061-10.407 9.468-16.411 13.182-3.959-2.869-8.113-5.482-12.43-7.824zm-1.361-26.466c-3.145-20.574-11.054-39.599-22.557-55.919 21.42-4.92 44.228-2.63 64.227 6.674-7.983 20.54-22.834 37.966-41.67 49.245zm-52.45-86.433c-16.098-11.854-34.966-20.152-55.44-23.721 11.664-18.6 29.388-33.091 50.088-40.646 8.888 20.191 10.718 43.049 5.352 64.367zm-71.793-25.532c-2.126-.102-4.263-.158-6.414-.158-1.229 0-2.454.02-3.675.053-2.395-4.642-5.107-9.1-8.104-13.348 3.676-5.63 7.966-10.792 12.835-15.389 5.061 4.903 9.469 10.407 13.182 16.411-2.868 3.96-5.482 8.113-7.824 12.431zm-26.449 1.358c-20.588 3.144-39.625 11.059-55.952 22.571-4.923-21.422-2.614-44.237 6.691-64.239 20.54 7.984 37.98 22.831 49.261 41.668zm-86.447 52.449c-11.861 16.106-20.162 34.985-23.729 55.471-18.604-11.665-33.085-29.411-40.642-50.114 20.193-8.889 43.053-10.724 64.371-5.357zm-25.535 71.797c-.102 2.126-.158 4.263-.158 6.414 0 1.229.02 2.454.054 3.676-4.644 2.396-9.104 5.11-13.354 8.108-5.628-3.677-10.787-7.97-15.383-12.839 4.903-5.061 10.407-9.468 16.411-13.182 3.959 2.867 8.112 5.481 12.43 7.823zm1.361 26.469c3.146 20.578 11.058 39.607 22.566 55.928-21.422 4.922-44.235 2.618-64.236-6.687 7.982-20.539 22.835-37.963 41.67-49.241zm52.451 86.43c16.104 11.859 34.981 20.158 55.465 23.725-11.666 18.603-29.409 33.086-50.113 40.642-8.889-20.191-10.718-43.049-5.352-64.367zm71.792 25.532c2.125.102 4.263.158 6.413.158 1.229 0 2.454-.02 3.675-.053 2.396 4.644 5.11 9.104 8.108 13.354-3.677 5.627-7.971 10.786-12.84 15.383-5.06-4.903-9.468-10.407-13.181-16.41 2.869-3.961 5.483-8.115 7.825-12.432zm26.449-1.359c20.59-3.144 39.63-11.061 55.958-22.576 4.922 21.424 2.608 44.241-6.698 64.243-20.54-7.982-37.98-22.829-49.26-41.667zm160.725-72.877c-5.998-12.55-14.269-23.916-24.281-33.497 6.336-4.361 12.151-9.414 17.343-15.125 4.13-4.544 4.175-11.438.104-16.038-4.884-5.517-10.358-10.446-16.327-14.754 9.921-9.248 18.195-20.231 24.32-32.39 5.096 17.13 7.847 35.26 7.847 54.023 0 20.14-3.166 39.553-9.006 57.781zm-96.554-291.638 14.874-1.676 9.314 11.717c14.07 17.699 20.347 40.401 17.706 62.592-27.858-21.837-61.497-36.612-98.2-41.635 13.847-17.162 34.16-28.502 56.306-30.998zm-26.425 53.096c-12.554 6-23.922 14.274-33.505 24.289-4.358-6.339-9.406-12.159-15.119-17.352l-.537-.487c-4.237-3.853-10.667-3.895-14.955-.099l-.545.482c-5.516 4.884-10.453 10.35-14.762 16.317-9.246-9.917-20.227-18.188-32.383-24.31 17.13-5.096 35.26-7.847 54.023-7.847 20.143.001 39.556 3.167 57.783 9.007zm-163.599-44.145 9.332-11.702 14.873 1.699c22.428 2.562 42.885 14.147 56.707 31.659-36.82 4.485-70.651 18.781-98.8 40.189-2.379-21.962 3.97-44.391 17.888-61.845zm18.841 56.279c-4.621 13.101-6.803 26.968-6.499 40.805-7.564-1.401-15.248-1.935-22.957-1.566-6.135.292-11.043 5.136-11.416 11.267-.447 7.354-.07 14.71 1.1 21.976-13.533-.474-27.129 1.436-40.038 5.691 18.162-33.356 46.043-60.686 79.81-78.173zm-93.784 110.844c5.998 12.55 14.268 23.915 24.28 33.496-6.339 4.357-12.149 9.415-17.34 15.125l-.882.97c-3.629 3.992-3.669 10.048-.092 14.089l.868.98c4.884 5.517 10.355 10.448 16.324 14.756-9.919 9.247-18.193 20.23-24.317 32.388-5.096-17.13-7.847-35.26-7.847-54.023 0-20.14 3.166-39.553 9.006-57.781zm-44.144 163.601-11.703-9.333 1.699-14.871c2.563-22.431 14.143-42.901 31.658-56.724 4.483 36.826 18.78 70.663 40.19 98.815-21.962 2.379-44.391-3.969-61.844-17.887zm56.282-18.835c12.297 4.337 25.271 6.529 38.261 6.528.852 0 1.703-.034 2.555-.052-1.404 7.569-1.949 15.259-1.581 22.974.293 6.135 5.137 11.042 11.267 11.415 2.027.123 4.054.185 6.081.185 5.323 0 10.633-.435 15.896-1.284-.474 13.533 1.436 27.129 5.692 40.039-33.355-18.162-60.683-46.041-78.171-79.805zm84.415 146.873-14.874 1.676-9.314-11.717c-14.069-17.698-20.34-40.398-17.699-62.588 27.854 21.833 61.488 36.604 98.184 41.628-13.845 17.162-34.152 28.505-56.297 31.001zm26.425-53.096c12.551-5.998 23.918-14.271 33.5-24.283 4.361 6.336 9.411 12.153 15.123 17.345 2.293 2.084 5.185 3.128 8.078 3.128 2.84 0 5.683-1.007 7.96-3.023 5.517-4.884 10.442-10.361 14.75-16.33 9.248 9.922 20.233 18.198 32.394 24.323-17.13 5.096-35.26 7.847-54.023 7.847-20.141-.002-39.554-3.167-57.782-9.007zm163.6 44.144-9.332 11.703-14.872-1.699c-22.428-2.563-42.886-14.148-56.709-31.66 36.817-4.485 70.644-18.778 98.791-40.182 2.379 21.961-3.961 44.386-17.878 61.838zm128.039-140.698 1.676 14.874-11.717 9.314c-17.7 14.069-40.404 20.347-62.593 17.706 21.838-27.858 36.612-61.497 41.635-98.2 17.164 13.847 28.503 34.161 30.999 56.306z\"></path>
      </g>');
INSERT INTO `schools` (`id`,`school_id`,`title`,`school_logo`) VALUES
('school0008','school_pa','Performing Arts','<g><path d=\"m417.754 293.834c12.931 0 25.862-4.922 35.706-14.767 2.929-2.929 2.929-7.678 0-10.607s-7.678-2.929-10.606 0c-13.84 13.84-36.359 13.84-50.199 0-2.929-2.929-7.678-2.929-10.606 0-2.929 2.929-2.929 7.678 0 10.607 9.843 9.844 22.774 14.767 35.705 14.767z\"></path><path d=\"m351.666 324.216c-45.947 0-83.328 37.381-83.328 83.328v.204c.013 5.426 3.729 10.083 9.035 11.324 5.296 1.238 10.691-1.283 13.108-6.136 11.644-23.387 35.088-37.914 61.185-37.914 26.096 0 49.541 14.528 61.185 37.915 2.005 4.026 6.057 6.449 10.407 6.449.892 0 1.798-.102 2.701-.313 5.307-1.241 9.022-5.898 9.035-11.342v-.185c0-45.949-37.381-83.33-83.328-83.33zm0 35.805c-26.831 0-51.362 12.591-66.908 33.629 6.437-31.036 33.992-54.434 66.908-54.434s60.471 23.397 66.908 54.434c-15.546-21.039-40.077-33.629-66.908-33.629z\"></path><path d=\"m69.25 138.177c13.84-13.84 36.359-13.84 50.199 0 1.464 1.464 3.384 2.197 5.303 2.197s3.839-.732 5.303-2.197c2.929-2.929 2.929-7.678 0-10.606-19.688-19.688-51.724-19.688-71.412 0-2.929 2.929-2.929 7.678 0 10.606 2.93 2.929 7.679 2.929 10.607 0z\"></path><path d=\"m262.233 127.571c-19.689-19.688-51.724-19.688-71.413 0-2.929 2.929-2.929 7.678 0 10.606 2.929 2.929 7.678 2.929 10.606 0 6.705-6.704 15.618-10.396 25.1-10.396s18.395 3.692 25.1 10.396c1.464 1.464 3.384 2.197 5.303 2.197s3.839-.732 5.303-2.197c2.93-2.929 2.93-7.678.001-10.606z\"></path><path d=\"m160.438 304.174c53.795 0 97.56-43.765 97.56-97.559l-.001-.135-7.499.025 7.499-.128c-.014-5.789-3.98-10.756-9.644-12.082-5.66-1.323-11.41 1.368-13.988 6.544-14.069 28.257-42.396 45.811-73.928 45.811s-59.859-17.554-73.928-45.811c-2.578-5.176-8.33-7.867-13.988-6.544-5.663 1.325-9.629 6.293-9.644 12.1v.22c.001 53.794 43.766 97.559 97.561 97.559zm0-42.525c33.545 0 64.021-16.811 81.894-44.524-5.178 40.58-39.93 72.049-81.894 72.049s-76.716-31.469-81.894-72.049c17.874 27.713 48.349 44.524 81.894 44.524z\"></path><path d=\"m35.483 40.713c1.335-3.119 3.969-5.456 7.226-6.412 77.019-22.598 158.439-22.598 235.458 0 3.256.956 5.89 3.293 7.226 6.413 4.087 9.546 7.618 19.423 10.492 29.357 1.152 3.978 5.312 6.27 9.289 5.12 3.979-1.151 6.271-5.311 5.12-9.29-3.045-10.522-6.784-20.983-11.112-31.092-3.104-7.25-9.225-12.681-16.792-14.901-79.782-23.408-164.123-23.409-243.906 0-7.567 2.221-13.687 7.652-16.791 14.901-31.31 73.116-28.622 155.749 7.376 226.71 1.322 2.606 3.959 4.108 6.694 4.108 1.141 0 2.3-.261 3.387-.813 3.694-1.874 5.17-6.388 3.295-10.082-33.981-66.989-36.519-144.996-6.962-214.019z\"></path><path d=\"m490.41 175.699c-3.104-7.249-9.224-12.68-16.792-14.901-24.709-7.25-50.217-12.316-75.814-15.058-4.116-.442-7.815 2.54-8.256 6.659s2.54 7.815 6.659 8.256c24.711 2.646 49.335 7.537 73.189 14.536 3.257.956 5.891 3.294 7.227 6.413 21.472 50.142 26.182 104.701 13.619 157.781-12.563 53.079-41.228 99.74-82.898 134.938-32.261 27.25-79.092 27.249-111.353-.001-38.215-32.279-65.646-74.509-79.586-122.404 3.224-2.146 6.367-4.473 9.391-7.027 18.185-15.361 34.185-33.061 47.619-52.526 3.998.989 8.061 1.486 12.106 1.486 13.179 0 26.132-5.149 35.765-14.783 2.929-2.929 2.929-7.678 0-10.607s-7.678-2.929-10.606 0c-7.57 7.569-18.055 11.181-28.419 10.223 8.854-14.659 16.316-30.175 22.229-46.339 8.596-23.499 13.822-48.064 15.615-72.872 14.346-1.083 28.85-1.432 43.196-1.034 4.143.092 7.59-3.148 7.706-7.289.115-4.14-3.148-7.59-7.289-7.706-14.259-.398-28.668-.074-42.94.944.25-15.633-.865-31.297-3.365-46.788-.66-4.09-4.515-6.871-8.599-6.209-4.089.66-6.869 4.51-6.209 8.599 6.876 42.598 2.656 86.584-12.202 127.203-15.062 41.175-40.75 77.912-74.286 106.24-3.895 3.29-8.007 6.174-12.276 8.67-.087.051-.174.102-.258.157-31.046 18.005-70.532 15.067-98.819-8.826-17.773-15.013-33.363-32.356-46.337-51.549-2.319-3.432-6.981-4.332-10.414-2.013-3.432 2.32-4.333 6.982-2.013 10.414 13.746 20.335 30.26 38.707 49.085 54.608 18.935 15.994 42.146 23.991 65.356 23.991 14.539 0 29.077-3.14 42.564-9.415 15.057 49.354 43.72 92.876 83.308 126.314 18.935 15.994 42.145 23.991 65.355 23.991s46.421-7.997 65.356-23.991c44.141-37.285 74.507-86.714 87.815-142.941 13.306-56.232 8.317-114.029-14.429-167.144z\"></path>
        </g>');
INSERT INTO `schools` (`id`,`school_id`,`title`,`school_logo`) VALUES
('school0009','school_gh','Centre For Global History','<g><path d=\"M438.4,364.8A8,8,0,0,0,432,352H343.2A40.069,40.069,0,0,0,304,320H280V300.708a158.99,158.99,0,0,0,75.339-38.055l15,15,11.314-11.314-15.009-15.008a160.994,160.994,0,0,0,11.834-14.7l-13.035-9.277a144.827,144.827,0,0,1-10.128,12.644l-11.377-11.377A127.927,127.927,0,0,0,163.371,48.058L151.994,36.68a144.754,144.754,0,0,1,12.645-10.127l-9.278-13.036a161.03,161.03,0,0,0-14.695,11.835L125.657,10.343,114.343,21.657l15,15C72.54,99.385,74.376,196.65,134.862,257.137A159.252,159.252,0,0,0,232,303.123V320H208a40.045,40.045,0,0,0-40,40,8,8,0,0,0,8,8h28.919a61.954,61.954,0,0,0,0,48H110.881a45.64,45.64,0,0,1,0-48H152V352H58.667a8,8,0,0,0-6.4,3.2,61.649,61.649,0,0,0,0,73.6,8,8,0,0,0,6.4,3.2H76.919a61.714,61.714,0,0,0,7.348,60.8,8,8,0,0,0,6.4,3.2H464a8,8,0,0,0,6.4-12.8,45.569,45.569,0,0,1,0-54.4A8,8,0,0,0,464,416H436.214A45.6,45.6,0,0,1,438.4,364.8ZM418.249,368a61.5,61.5,0,0,0-4.3,16H272.77a45.114,45.114,0,0,1,6.111-16ZM292.919,480H254.881a45.64,45.64,0,0,1,0-48h38.038A61.954,61.954,0,0,0,292.919,480ZM142.881,432h94.038a61.954,61.954,0,0,0,0,48H142.881A45.64,45.64,0,0,1,142.881,432ZM360,144a112.453,112.453,0,0,1-1.148,16h-20.43L320,147.719V120a8.009,8.009,0,0,0-1.14-4.116L296,77.784V42.821A112.141,112.141,0,0,1,360,144ZM280,36.666V80a8.009,8.009,0,0,0,1.14,4.116l22.86,38.1V152a8,8,0,0,0,3.562,6.656l24,16A8,8,0,0,0,336,176h19.334a112,112,0,0,1-218.186-48h16.606l6.485,25.94A8,8,0,0,0,168,160h24v24a8,8,0,0,0,1.344,4.438L208,210.422V232a8,8,0,0,0,8,8h32a8,8,0,0,0,6.247-3l32-40A8,8,0,0,0,280,184H264V152a8,8,0,0,0-8-8H208V130.422L220.281,112H248a8,8,0,0,0,7.155-11.578l-16-32A8,8,0,0,0,232,64H208V39.39a112,112,0,0,1,72-2.724ZM256,200h7.355l-19.2,24H224V208a8,8,0,0,0-1.344-4.438L208,181.578V160h40v32A8,8,0,0,0,256,200ZM192,47.035V72a8,8,0,0,0,8,8h27.056l8,16H216a8,8,0,0,0-6.656,3.562l-16,24A8,8,0,0,0,192,128v16H174.246l-6.485-25.94A8,8,0,0,0,160,112H140.666A112.516,112.516,0,0,1,192,47.035Zm-51.321.958,11.379,11.378A127.927,127.927,0,0,0,332.629,239.942l11.378,11.379c-56.47,50.577-143.583,48.749-197.83-5.5S90.1,104.462,140.679,47.993ZM248,303.925q8.012,0,16-.8V320H248ZM208,336h96a24.042,24.042,0,0,1,22.629,16H185.371A24.042,24.042,0,0,1,208,336Zm14.881,32h38.038a61.954,61.954,0,0,0,0,48H222.881A45.64,45.64,0,0,1,222.881,368Zm-160,0H92.919a61.954,61.954,0,0,0,0,48H62.877A45.644,45.644,0,0,1,62.877,368Zm32,64h30.042a61.954,61.954,0,0,0,0,48H94.877A45.644,45.644,0,0,1,94.877,432Zm216,48a45.114,45.114,0,0,1-6.111-16H445.946a61.5,61.5,0,0,0,4.3,16Zm135.065-32H304.77a45.114,45.114,0,0,1,6.111-16H450.249A61.5,61.5,0,0,0,445.946,448ZM278.881,416a45.114,45.114,0,0,1-6.111-16H413.946a61.5,61.5,0,0,0,4.3,16Z\"></path>
      </g>');



-- -------------------------------------------
-- TABLE DATA signup
-- -------------------------------------------
INSERT INTO `signup` (`id`,`username`,`email`,`password`) VALUES
('1','','','');



-- -------------------------------------------
-- TABLE DATA updates_panel
-- -------------------------------------------
INSERT INTO `updates_panel` (`id`,`title`,`link`,`hide`,`content`) VALUES
('updates0001','Eating raw fish didn\'t sound like a good idea. \"It\'s a delicacy in Japan,\" didn\'t seem to make it any more appetizing. Raw fish is raw fish, delicacy or not.','google.com','0','');
INSERT INTO `updates_panel` (`id`,`title`,`link`,`hide`,`content`) VALUES
('updates0002','There was only one way to do things in the Statton house.','','0','<div><img class=\"mt-5\" style=\"float: left; margin-right: 50px; border-style: solid; margin-top: 10px; border-width: 3px;\" src=\"http://localhost/adminlte/backend/web/post/../img/tinymce_uploads/images.jpg\" alt=\"\" width=\"356\" height=\"232\" />
<div style=\"text-align: justify;\">There was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.There was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.There was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.There was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.There was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.There was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.There was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.There was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.There was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.There was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.There was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today. There was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.There was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.There was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.There was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.There was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.</div>
<img style=\"float: right; margin-top: 50px; margin-left: 50px;\" src=\"http://localhost/adminlte/backend/web/post/../img/tinymce_uploads/download (1).jpg\" alt=\"\" width=\"370\" height=\"370\" />
<div style=\"text-align: justify;\">There&nbsp;was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.There was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.There was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.There was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.There was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.There was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.There&nbsp;was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.There was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.There was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.There was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.There was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.There was only one way to do things in the Statton house. That one way was to do exactly what the father, Charlie, demanded. He made the decisions and everyone else followed without question. That was until today.</div>
</div>');
INSERT INTO `updates_panel` (`id`,`title`,`link`,`hide`,`content`) VALUES
('updates0003','dev','','0','');



-- -------------------------------------------
-- TABLE DATA user
-- -------------------------------------------
INSERT INTO `user` (`id`,`username`,`profile`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`verification_token`) VALUES
('0','devanshu','','UIKRU2aWK6hqJhgPjrhQp--VbLKNo88q','$2y$13$ouwxm4cAYaTI18hDxTYM0OxhsLRed0d5nAcJsSLwZEA3uin19yIpu','nytOyYlrZ2044G7BZmkV3OMxlpY9YxD6_1632392392','devanshuverma158@gmail.com','10','0','1633947612','');
INSERT INTO `user` (`id`,`username`,`profile`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`verification_token`) VALUES
('1','admin','','admin@auth','$2y$13$bVO7tyPnWnIwnxuEXWG/Lur1WGXxrp8xloYAm7VRK7b1OqmdRA9yy','','admin@ioe.com','10','62408','62408','');
INSERT INTO `user` (`id`,`username`,`profile`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`verification_token`) VALUES
('2','schoolop','','schoolop@auth','$2y$13$ouwxm4cAYaTI18hDxTYM0OxhsLRed0d5nAcJsSLwZEA3uin19yIpu','','schoolop@ioe.com','10','0','0','');
INSERT INTO `user` (`id`,`username`,`profile`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`verification_token`) VALUES
('78','dev_verma','','sfo4zBWAOqq6_63JWjjsLHrZCPWz24z7','$2y$13$qbKxyc.6EvxLxrbhECr6Ye1up1hptXMBwG3uUkKZOGM8w/VXD5Yui','','devverma158@gmail.com','0','1634016696','1634021051','4ltxIIQk5xFrkH3uxf-uR3AqvWZWqaY2_1634016696');
INSERT INTO `user` (`id`,`username`,`profile`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`verification_token`) VALUES
('80','dev_verma','header.png','4RhJpMSQNVTHKrh3xcFc-vEJ0koZC3Ls','$2y$13$M3402kI4zHXMXxwHoHv0LOM928QWlu3jPhZp/hjiM8T5sQtr70exy','','dev_verma158@gmail.com','9','1634021143','1634021143','jVDSd7eXEOIsKRZHxHHxkDZ1Ijs_nKAd_1634021143');
INSERT INTO `user` (`id`,`username`,`profile`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`verification_token`) VALUES
('81','deeksha','ashutosh-bhardwaj-300x300.jpg','krnev3Ol_dEYYtiPKwdk8Jcw5ozMCBlz','$2y$13$YcisGp6iGoyuH2NQ9xGcReoKO/EPdTdf6O.4ghkxL7OoRqt1ZuRQe','','deeksha@gmail.com','0','1634022283','1634023530','2GG2s5FoITygDPqAWh3CKMukl5GYY2PX_1634022283');
INSERT INTO `user` (`id`,`username`,`profile`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`verification_token`) VALUES
('82','dd','','vt7UTIygk0cGR4pzVjiBAM8QY4ygjbVa','$2y$13$Ip4LWZCOIbSto5Ijoxwq2uVZerHyGfe4CSGvukAe0kUtPQ1dwioGW','','d@q.c','0','1634023516','1634023524','59aYB2-7WFzlub7Gs5G2I558SKtwOYRU_1634023516');



-- -------------------------------------------
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
COMMIT;
-- -------------------------------------------
-- -------------------------------------------
-- END BACKUP
-- -------------------------------------------