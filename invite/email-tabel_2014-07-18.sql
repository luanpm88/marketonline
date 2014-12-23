-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 18, 2014 at 09:34 AM
-- Server version: 5.5.38
-- PHP Version: 5.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `invite`
--

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
`id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pic` varchar(2000) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `email`, `name`, `pic`) VALUES
(1, 's.shivasurya@gmail.com', 's.shivasurya', 'https://m.ak.fbcdn.net/profile.ak/hprofile-ak-xap1/t1.0-1/p160x160/10486960_671723516241669_2945008877565247746_n.jpg'),
(2, 'papa@gmail.com', 'pinkupapa', ''),
(3, 'cscvenkatmadurai@gmail.com', 'venkat', 'https://m.ak.fbcdn.net/profile.ak/hprofile-ak-xpf1/t1.0-1/p160x160/10463989_879160788765192_7157367088263314025_n.jpg'),
(4, 'rahul.keerthivasan@gmail.com', 'keerthi', 'https://m.ak.fbcdn.net/profile.ak/hprofile-ak-xfp1/t1.0-1/c0.0.160.160/p160x160/10462658_540313462743820_4875494656446764879_n.jpg'),
(5, 'haileyjaden@gmail.com', 'sai yuva', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email`
--
ALTER TABLE `email`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
