-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 12, 2014 at 12:52 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oss_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_profiles`
--

CREATE TABLE IF NOT EXISTS `company_profiles` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cct_id` int(11) NOT NULL,
  `pck_id` int(11) NOT NULL,
  `com_logo` varchar(150) NOT NULL,
  `com_found_date` date NOT NULL,
  `com_website` varchar(150) NOT NULL,
  `com_branch` varchar(200) NOT NULL,
  `com_describtion` varchar(1000) NOT NULL,
  `com_address` varchar(500) NOT NULL,
  `late` varchar(20) NOT NULL,
  `longitued` varchar(20) NOT NULL,
  `com_email` varchar(100) NOT NULL,
  `com_phone` varchar(50) NOT NULL,
  `com_enabled` tinyint(4) NOT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `company_profiles`
--

INSERT INTO `company_profiles` (`com_id`, `user_id`, `cct_id`, `pck_id`, `com_logo`, `com_found_date`, `com_website`, `com_branch`, `com_describtion`, `com_address`, `late`, `longitued`, `com_email`, `com_phone`, `com_enabled`) VALUES
(1, 2, 332, 322, 'itp.png', '2014-01-15', 'adfadfa.com', 'ITP Company', 'Hello wvery one so what is this os inner what', 'Phon Penh', '13.175771224423402', '105.1611328125', 'ada@gmail.com', '098788877', 1),
(2, 7, 332, 322, 'SAAB.jpg', '2014-01-15', 'adfadfa.com', 'SAAB Compoany', '', 'Phnom Phen', '', '', 'ada@gmail.com', '098788877', 1),
(3, 8, 332, 322, 'bmw.jpg', '2014-01-15', 'adfadfa.com', 'BMW Company', '', 'Takmaov', '', '', 'ada@gmail.com', '098788877', 1),
(9, 1, 0, 0, '1392050066Computer-icon.png', '0000-00-00', 'www.google.com', 'Kaka123', 'i am not u', 'Takeo', '11.754436756202463', '104.930419921875', 'mycom@gmail.com', '0988989894', 1),
(10, 4, 0, 0, '1.jpg', '0000-00-00', 'www.google.com', 'dara', '', '', '', '', '', '', 0),
(12, 5, 0, 0, '2.jpg', '0000-00-00', 'www.google.com', 'Anano', 'hello, my company were build in 1990 and have alote sof peolple in the wold like and motivate to study', 'Phnom Penh', '', '', '', '', 0),
(13, 6, 0, 0, '3.jpg', '0000-00-00', 'www.google.com', 'Anano', 'hello, my company were build in 1990 and have alote sof peolple in the wold like and motivate to study', 'Phnom Penh', '11.57337522528485', '', '', '', 0),
(14, 3, 0, 0, 'ce.png', '0000-00-00', 'www.google.com', 'Anano', 'hello, my company were build in 1990 and have alote sof peolple in the wold like and motivate to study', 'Phnom Penh', '11.57337522528485', '11.57337522528485', '', '', 0),
(18, 1, 0, 0, '1392050066Computer-icon.png', '0000-00-00', 'www.google.com', 'Kaka123', 'i am not u', 'Takeo', '11.754436756202463', '104.930419921875', 'mycom@gmail.com', '0988989894', 1),
(19, 1, 0, 0, '1392050066Computer-icon.png', '0000-00-00', 'www.google.com', 'Kaka123', 'i am not u', 'Takeo', '11.754436756202463', '104.930419921875', 'mycom@gmail.com', '0988989894', 1),
(16, 9, 0, 0, 'fg.png', '0000-00-00', 'www.google.com', 'Anano', 'hello, my company were build in 1990 and have alote sof peolple in the wold like and motivate to study', 'Phnom Penh', '11.57337522528485', '104.92080688476562', 'simsoboth@gmail.com', '', 1),
(17, 10, 0, 0, 'f.jpg', '0000-00-00', 'www.google.com', 'hello', 'I love u very much as i tell', 'Phnom Penh', '11.572155981008775', '104.92127895355225', 'ratha@gmail.com', '098998998/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menus_to_counters`
--

CREATE TABLE IF NOT EXISTS `menus_to_counters` (
  `utc_id` int(11) NOT NULL AUTO_INCREMENT,
  `men_id` int(11) NOT NULL,
  `ccm_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`utc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cc_department`
--

CREATE TABLE IF NOT EXISTS `tbl_cc_department` (
  `ccd_id` int(11) NOT NULL AUTO_INCREMENT,
  `ccd_name` varchar(100) NOT NULL,
  `ccd_phone` varchar(100) NOT NULL,
  `ccd_email` varchar(100) NOT NULL,
  `ccd_director` varchar(100) NOT NULL,
  `com_id` int(11) NOT NULL,
  PRIMARY KEY (`ccd_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat_message`
--

CREATE TABLE IF NOT EXISTS `tbl_chat_message` (
  `chm_id` int(11) NOT NULL AUTO_INCREMENT,
  `vis_id` int(11) NOT NULL,
  `reserve_key` varchar(100) NOT NULL,
  `chm_who` int(11) NOT NULL,
  `switch_id` tinyint(4) NOT NULL,
  `process_id` int(11) NOT NULL,
  `chm_msg` varchar(500) NOT NULL,
  `add_datetime` datetime NOT NULL,
  `chm_file` varchar(150) NOT NULL,
  `chm_filesize` int(11) NOT NULL,
  `ccm_id` int(11) NOT NULL,
  `rated` float NOT NULL,
  `reply_status` int(11) NOT NULL,
  PRIMARY KEY (`chm_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_chat_message`
--

INSERT INTO `tbl_chat_message` (`chm_id`, `vis_id`, `reserve_key`, `chm_who`, `switch_id`, `process_id`, `chm_msg`, `add_datetime`, `chm_file`, `chm_filesize`, `ccm_id`, `rated`, `reply_status`) VALUES
(1, 1, '4343faf43a4343fa443', 0, 2, 2, 'hello', '2014-01-21 00:00:00', 'abc.jpg', 322323, 2, 3, 0),
(2, 1, '4343faf43a4343fa443', 0, 2, 2, 'what is this?', '2014-01-21 00:00:00', 'abc.jpg', 322323, 2, 3, 0),
(3, 1, '4343faf43a4343fa443', 1, 2, 2, 'I love you more then sayafa', '2014-01-21 00:00:00', 'abc.jpg', 322323, 2, 5, 1),
(4, 2, '4343faf43a4343fa443', 0, 2, 2, 'I love you more then sayafad', '2014-01-21 00:00:00', 'abc.jpg', 322323, 2, 3, 0),
(5, 2, '4343faf43a4343fa443', 0, 2, 2, 'I adfalove you more then say', '2014-01-21 00:00:00', 'abc.jpg', 322323, 2, 0, 1),
(6, 3, '4343faf43a4343fa443', 1, 2, 2, 'I love you more then say', '2014-02-07 00:00:00', 'abc.jpg', 322323, 2, 3, 0),
(7, 3, '4343faf43a4343fa443', 0, 2, 2, 'I love you mo111re then say', '2014-02-03 00:00:00', 'abc.jpg', 322323, 2, 3, 0),
(8, 3, '4343faf43a4343fa443', 1, 2, 2, 'I love you 111re then say', '2014-02-12 00:00:00', 'abc.jpg', 322323, 2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_counter_companies`
--

CREATE TABLE IF NOT EXISTS `tbl_counter_companies` (
  `ccm_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `ccm_name` varchar(100) NOT NULL,
  `gender` varchar(12) NOT NULL,
  `ccm_address` varchar(150) NOT NULL,
  `ccm_email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ccm_phone` varchar(10) NOT NULL,
  `ccm_des` varchar(150) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `ccm_status` tinyint(4) NOT NULL,
  `add_datetime` datetime NOT NULL,
  `update_datetime` datetime NOT NULL,
  `delete_datetime` datetime NOT NULL,
  `chat_status` varchar(20) NOT NULL,
  `online_status` int(11) NOT NULL,
  PRIMARY KEY (`ccm_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `tbl_counter_companies`
--

INSERT INTO `tbl_counter_companies` (`ccm_id`, `user_id`, `ccm_name`, `gender`, `ccm_address`, `ccm_email`, `password`, `ccm_phone`, `ccm_des`, `photo`, `ccm_status`, `add_datetime`, `update_datetime`, `delete_datetime`, `chat_status`, `online_status`) VALUES
(2, '1', 'Sim soboth', '1', '', 'simsoboth@gmail.com', '202cb962ac59075b964b07152d234b70', '0987777665', '', '1392049181nny+pictures.jpg', 1, '2014-02-10 16:02:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', 0),
(39, '1', 'helo', '1', '', 'simsoboth@gmail.com', '202cb962ac59075b964b07152d234b70', '4334343', '', '05022014114436Funny-Humor-21.jpg', 0, '2014-02-05 11:02:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 0),
(40, '1', 'Hello', '1', '', 'simsoboth@gmail.com', '202cb962ac59075b964b07152d234b70', '0987777665', '', '139204915511_1444064799140577_2124072461_n.jpg', 1, '2014-02-10 16:02:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 0),
(37, '2', 'Sim soboth123', '1', '', 'sim@gmail.com', '202cb962ac59075b964b07152d234b70', '23424242', '', '09022014163750funny-Seal-animal-singer-head.jpg', 0, '2014-02-09 16:02:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', 0),
(41, '2', '''he', '1', '', 'simsoboth@gmail.com', '202cb962ac59075b964b07152d234b70', 'iu98u', '', '05022014114958adfaf.txt', 1, '2014-02-05 11:02:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(42, '', 'Meonko', '2', '', 'monko@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0978889874', '', '1392048096-side-of-Olympic-div-001.jpg', 0, '2014-02-10 16:02:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 0),
(45, '', 'Ratha', '1', '', 'simsoboth@gmail.com', '202cb962ac59075b964b07152d234b70', '0987777665', '', '139204891910_1438661606347563_2058229282_n.jpg', 1, '2014-02-10 16:02:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_knowledges`
--

CREATE TABLE IF NOT EXISTS `tbl_knowledges` (
  `kno_id` int(11) NOT NULL AUTO_INCREMENT,
  `kno_ques` varchar(1000) NOT NULL,
  `kno_ans` varchar(1000) NOT NULL,
  `type` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  PRIMARY KEY (`kno_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_knowledges`
--

INSERT INTO `tbl_knowledges` (`kno_id`, `kno_ques`, `kno_ans`, `type`, `com_id`) VALUES
(2, 'How can i chat to Company?', 'In Order to chat to company, first you go to home page and type the company name in search bar and click on it.. you will see the Company profile page, then chat button at the bottom page and click on it and fill email and fullname', 3, 2),
(3, 'How to buy the service of System?', 'you go to price page , and see the explain and price of each package.. and click on buy now.. fill all information and click buy now..', 1, 0),
(4, 'how to Controll my admin system?', 'you log in with correct user name and password it ok what you see on it..', 2, 0),
(5, 'how to track counter with service?', 'you just buy and login you will see what is the track of company.. it look easy', 3, 0),
(6, 'What is the benifit of service?', 'the benifite you can get alots of like best performent, security, good tracking counter', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menus`
--

CREATE TABLE IF NOT EXISTS `tbl_menus` (
  `men_id` int(11) NOT NULL AUTO_INCREMENT,
  `men_name` varchar(100) NOT NULL,
  `men_file` varchar(150) NOT NULL,
  `men_doc` varchar(150) NOT NULL,
  `men_des` varchar(500) NOT NULL,
  `men_status` tinyint(4) NOT NULL,
  `add_datetime` datetime NOT NULL,
  `update_datetime` datetime NOT NULL,
  `delete_datetime` datetime NOT NULL,
  PRIMARY KEY (`men_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_to_package`
--

CREATE TABLE IF NOT EXISTS `tbl_menu_to_package` (
  `mtp_id` int(11) NOT NULL AUTO_INCREMENT,
  `men_id` int(11) NOT NULL,
  `pck_id` int(11) NOT NULL,
  `sys_id` int(11) NOT NULL,
  `add_datetime` datetime NOT NULL,
  `update_datetime` datetime NOT NULL,
  PRIMARY KEY (`mtp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_occasions`
--

CREATE TABLE IF NOT EXISTS `tbl_occasions` (
  `occ_id` int(11) NOT NULL AUTO_INCREMENT,
  `occ_name_kh` varchar(100) NOT NULL,
  `occ_name_en` varchar(100) NOT NULL,
  `occ_duration` varchar(400) NOT NULL,
  `occ_start` date NOT NULL,
  `occ_type` varchar(100) NOT NULL,
  `occ_status` tinyint(4) NOT NULL,
  `use_id` int(11) NOT NULL,
  `add_datetime` datetime NOT NULL,
  `update_datetime` datetime NOT NULL,
  `delete_datetime` datetime NOT NULL,
  PRIMARY KEY (`occ_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packages`
--

CREATE TABLE IF NOT EXISTS `tbl_packages` (
  `pck_id` int(11) NOT NULL AUTO_INCREMENT,
  `pck_title` varchar(100) NOT NULL,
  `pck_company_num` int(11) NOT NULL,
  `pck_counter_num` int(11) NOT NULL,
  `pck_price` float NOT NULL,
  `pck_duration` int(11) NOT NULL,
  `pck_status` tinyint(4) NOT NULL,
  `add_datetime` datetime NOT NULL,
  `update_datetime` datetime NOT NULL,
  `delete_datetime` datetime NOT NULL,
  PRIMARY KEY (`pck_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_packages`
--

INSERT INTO `tbl_packages` (`pck_id`, `pck_title`, `pck_company_num`, `pck_counter_num`, `pck_price`, `pck_duration`, `pck_status`, `add_datetime`, `update_datetime`, `delete_datetime`) VALUES
(1, 'Free', 0, 3, 0, 3, 1, '2014-02-02 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Premium', 0, 20, 35, 12, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Individual', 0, 50, 59, 12, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promotions`
--

CREATE TABLE IF NOT EXISTS `tbl_promotions` (
  `prm_id` int(11) NOT NULL AUTO_INCREMENT,
  `occ_id` int(11) NOT NULL,
  `prm_image` varchar(150) NOT NULL,
  `describtion` varchar(1000) NOT NULL,
  `prm_status` tinyint(4) NOT NULL,
  `add_datetime` datetime NOT NULL,
  `update_datetime` datetime NOT NULL,
  `delete_datetime` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  PRIMARY KEY (`prm_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_promotions`
--

INSERT INTO `tbl_promotions` (`prm_id`, `occ_id`, `prm_image`, `describtion`, `prm_status`, `add_datetime`, `update_datetime`, `delete_datetime`, `com_id`) VALUES
(1, 2, '33.jpg', 'On Chinese New Year, our company have discount every product 30%...', 1, '2014-01-24 00:00:00', '2014-01-23 00:00:00', 0, 2),
(2, 2, 'promo.jpg', 'On Phum Penh, our company have discount every product 40%...', 1, '2014-01-24 00:00:00', '2014-01-23 00:00:00', 0, 2),
(3, 2, 'sale_discount.jpg', 'On Khmer New Year, our company have discount every product 20%...', 1, '2014-01-24 00:00:00', '2014-01-23 00:00:00', 0, 2),
(4, 2, 'abc.jpg', 'On Kakten, our company have discount every product 20%t...', 1, '2014-01-24 00:00:00', '2014-01-23 00:00:00', 0, 3),
(5, 0, '1391358775-Faces-Pictures1.jpg', 'hello world i love u, u a my spirit, u a my father, looking the back', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 9),
(6, 0, '1391358775-Faces-Pictures1.jpg', 'hello world i love u, u a my spirit, u a my father, looking the back', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 9),
(7, 0, '1391441601oad-Funny-Baby-Pictures-HD-Wallpaper-1080x607.jpg', 'haha, wonderfull day..', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 9),
(8, 0, '1392051409mer_Service_03.jpg', 'it the best service in Camboida', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 9),
(9, 0, '1392132180-Faces-Pictures1.jpg', 'ážáž áž·ážŸâ€‹â€‹áž·áž¶ážáŸ’áž¶áž€ážŠážáž¶â€‹ážáž¶â€‹áŸ’áž¶ážŠáž›ážáŸ’áž¶áž›ážŠáž€ážáŸ’áž¶â€‹áž¶áŸ’ážŠážáž¶áž›ážŠážáž¶ážŠáž', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(10, 0, '1392132211nny+pictures.jpg', 'áž¢áž¶áž áž¶ážšáž¼áž”áž€ážšážŽ', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sys_admins`
--

CREATE TABLE IF NOT EXISTS `tbl_sys_admins` (
  `sys_id` int(11) NOT NULL AUTO_INCREMENT,
  `sys_fname` varchar(100) NOT NULL,
  `sys_lname` varchar(100) NOT NULL,
  `sys_gender` varchar(6) NOT NULL,
  `sys_dob` date NOT NULL,
  `sys_pob` varchar(200) NOT NULL,
  `sys_marital_status` varchar(10) NOT NULL,
  `sys_phone` varchar(10) NOT NULL,
  `sys_email` varchar(100) NOT NULL,
  `sys_address` varchar(100) NOT NULL,
  `sys_photo` varchar(100) NOT NULL,
  `sys_username` varchar(100) NOT NULL,
  `sys_password` varchar(50) NOT NULL,
  `sys_personal_id` varchar(50) NOT NULL,
  `sys_status` tinyint(4) NOT NULL,
  `sys_expired_date` date NOT NULL,
  `add_datetime` datetime NOT NULL,
  `update_datetime` datetime NOT NULL,
  `delete_datetime` datetime NOT NULL,
  PRIMARY KEY (`sys_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_sys_admins`
--

INSERT INTO `tbl_sys_admins` (`sys_id`, `sys_fname`, `sys_lname`, `sys_gender`, `sys_dob`, `sys_pob`, `sys_marital_status`, `sys_phone`, `sys_email`, `sys_address`, `sys_photo`, `sys_username`, `sys_password`, `sys_personal_id`, `sys_status`, `sys_expired_date`, `add_datetime`, `update_datetime`, `delete_datetime`) VALUES
(1, 'soboth', 'sim', 'Male', '1990-01-08', 'Takeo', 'Sigle', '0122222222', 'soboth@gmail.com', 'theok Thla, Sen Sok, Phnom Penh', 'both.jpg', 'soboths', '202cb962ac59075b964b07152d234b70', '1', 1, '2014-01-31', '2014-01-22 00:00:00', '2014-01-14 00:00:00', '2014-01-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visitors`
--

CREATE TABLE IF NOT EXISTS `tbl_visitors` (
  `vis_id` int(11) NOT NULL AUTO_INCREMENT,
  `vis_name` varchar(100) NOT NULL,
  `vis_email` varchar(150) NOT NULL,
  `vis_phone` varchar(10) NOT NULL,
  `vis_ip` varchar(50) NOT NULL,
  `add_datetime` datetime NOT NULL,
  PRIMARY KEY (`vis_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_visitors`
--

INSERT INTO `tbl_visitors` (`vis_id`, `vis_name`, `vis_email`, `vis_phone`, `vis_ip`, `add_datetime`) VALUES
(1, 'Meng Kong', 'mengkong@gmail.com', '0988877788', '192.232.222.2', '2014-02-12 00:00:00'),
(2, 'Mok Make', 'mengafkong@gmail.com', '0988877788', '192.232.222.3', '2014-02-12 00:00:00'),
(3, 'Hean Sok', 'hensok@gmail.com', '0988877788', '192.232.222.3', '2014-02-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_counter_company_type`
--

CREATE TABLE IF NOT EXISTS `tb_counter_company_type` (
  `cct_id` int(11) NOT NULL AUTO_INCREMENT,
  `cct_name` varchar(100) NOT NULL,
  `cct_size` int(11) NOT NULL,
  `cct_des` varchar(1000) NOT NULL,
  `cct_status` tinyint(4) NOT NULL,
  `cst_id` int(11) NOT NULL,
  `add_datetime` datetime NOT NULL,
  `update_datetime` datetime NOT NULL,
  `delete_datetime` datetime NOT NULL,
  PRIMARY KEY (`cct_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(150) NOT NULL,
  `user_phone` varchar(10) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `expired_date` date NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `online_date_time` datetime NOT NULL,
  `offline_date_time` datetime NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `package` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_phone`, `user_email`, `password`, `user_type`, `status`, `expired_date`, `register_date`, `online_date_time`, `offline_date_time`, `ip_address`, `photo`, `package`) VALUES
(1, 'soboth', '098767659', 'simsoboth@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 1, '2014-01-31', '2014-02-08 17:29:31', '2014-01-31 00:00:00', '2014-01-23 00:00:00', '192.12.1..11', 'both_opt.jpg', 0),
(2, 'bothra', '098999989', 'simsoboth@gmail.com', '202cb962ac59075b964b07152d234b70', '', 1, '0000-00-00', '2014-02-08 17:29:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0),
(3, 'sim soboth', '', 'simsoboth43@gmail.com', '202cb962ac59075b964b07152d234b70', '', 1, '0000-00-00', '2014-02-05 12:34:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 1),
(4, 'sim soboth', '', 'simsoboth43@gmail.com', '202cb962ac59075b964b07152d234b70', '', 1, '0000-00-00', '2014-02-02 08:37:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 2),
(5, 'sim soboth', '', 'simsoboth43@gmail.com', '202cb962ac59075b964b07152d234b70', '', 1, '0000-00-00', '2014-02-02 08:37:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 2),
(6, 'hello', '', 'hello@gmail.com', '202cb962ac59075b964b07152d234b70', '', 1, '0000-00-00', '2014-02-08 17:29:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
