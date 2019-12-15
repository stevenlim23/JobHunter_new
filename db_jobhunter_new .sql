-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2019 at 06:07 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jobhunter_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_application`
--

CREATE TABLE `tb_application` (
  `id_apply` int(50) NOT NULL,
  `id_hunter` int(50) NOT NULL,
  `id_job` int(50) NOT NULL,
  `id_placer` int(50) NOT NULL,
  `status` enum('active','closed','done') NOT NULL,
  `date_applied` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_application`
--

INSERT INTO `tb_application` (`id_apply`, `id_hunter`, `id_job`, `id_placer`, `status`, `date_applied`) VALUES
(1, 2, 3, 1, 'active', '2019-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hunter`
--

CREATE TABLE `tb_hunter` (
  `id_hunter` int(50) NOT NULL,
  `id_user` int(50) NOT NULL,
  `location` varchar(200) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `skills` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hunter`
--

INSERT INTO `tb_hunter` (`id_hunter`, `id_user`, `location`, `experience`, `skills`, `photo`) VALUES
(2, 6, 'Indonesia', '1', 'Website Development', 'Screenshot (49).jpg'),
(3, 16, 'Indonesia', '2', 'Android Development', 'testimonial-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_job`
--

CREATE TABLE `tb_job` (
  `id_job` int(50) NOT NULL,
  `id_placer` int(50) NOT NULL,
  `title` varchar(300) NOT NULL,
  `jobdesc` varchar(300) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `industry` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `postdate` date NOT NULL,
  `status` enum('active','closed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_job`
--

INSERT INTO `tb_job` (`id_job`, `id_placer`, `title`, `jobdesc`, `experience`, `salary`, `location`, `industry`, `profile`, `postdate`, `status`) VALUES
(1, 1, 'title1', 'desc1', '1230', '2000', 'loca1', 'inds1', 'profie1', '2019-12-11', 'active'),
(3, 1, 'UI UX Design For Company Website', 'making UI/UX Design prototype for our website company that we will use to make a website design developement for our company later', '2', '5000', 'Indonesia', 'Technology', 'Knowledge at Adobe XD , Adobe Illustrator , Adobe Photoshop , Knowledge at UI/UX Design composing', '2019-12-15', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tb_placer`
--

CREATE TABLE `tb_placer` (
  `id_placer` int(50) NOT NULL,
  `id_user` int(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `industry` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_placer`
--

INSERT INTO `tb_placer` (`id_placer`, `id_user`, `location`, `industry`, `address`, `profile`, `logo`) VALUES
(1, 14, 'indonesia', 'teknologi', 'batam', 'mantap', 'logo.png'),
(2, 15, '123', '123', '123', '123', 'Screenshot (32).png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(20) NOT NULL,
  `role` enum('none','jobhunter','jobplacer','admin') NOT NULL,
  `status` enum('active','pending','closed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `name`, `email`, `phone`, `role`, `status`) VALUES
(2, 'admin', 'admin', 'admin', 'admin@jobhunter.com', 123, 'admin', 'active'),
(6, 'jobsearch', '123', 'jobsearch', 'jobsearch@gmail.com', 123, 'jobhunter', 'closed'),
(14, 'jobplacer', '123', 'jobplacer', 'jobplacer@gmail.com', 123, 'jobplacer', 'closed'),
(15, 'jobplacer1', '123', 'jobplacer1', 'jobplacer1@gmail.com', 123, 'jobplacer', 'closed'),
(16, 'jobsearch1', '123', 'jobsearch1', 'jobsearch1@gmail.com', 2147483647, 'jobhunter', 'closed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_application`
--
ALTER TABLE `tb_application`
  ADD PRIMARY KEY (`id_apply`);

--
-- Indexes for table `tb_hunter`
--
ALTER TABLE `tb_hunter`
  ADD PRIMARY KEY (`id_hunter`);

--
-- Indexes for table `tb_job`
--
ALTER TABLE `tb_job`
  ADD PRIMARY KEY (`id_job`);

--
-- Indexes for table `tb_placer`
--
ALTER TABLE `tb_placer`
  ADD PRIMARY KEY (`id_placer`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_application`
--
ALTER TABLE `tb_application`
  MODIFY `id_apply` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_hunter`
--
ALTER TABLE `tb_hunter`
  MODIFY `id_hunter` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_job`
--
ALTER TABLE `tb_job`
  MODIFY `id_job` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_placer`
--
ALTER TABLE `tb_placer`
  MODIFY `id_placer` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
