-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2017 at 03:54 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id_bagian` int(11) NOT NULL,
  `bagian` varchar(20) NOT NULL,
  `id_department` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id_bagian`, `bagian`, `id_department`) VALUES
(1, 'Vokalis', 1),
(2, 'Guitar', 1),
(3, 'Bass', 1),
(4, 'Drummer', 1),
(5, 'Soundman', 3),
(6, 'Driver', 2);

-- --------------------------------------------------------

--
-- Table structure for table `departmen`
--

CREATE TABLE `departmen` (
  `id_departmen` int(11) NOT NULL,
  `departmen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departmen`
--

INSERT INTO `departmen` (`id_departmen`, `departmen`) VALUES
(1, 'Musik'),
(2, 'Transportasi'),
(3, 'Sound');

-- --------------------------------------------------------

--
-- Table structure for table `detail_tampil`
--

CREATE TABLE `detail_tampil` (
  `id_tampil` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `bayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `nama_event` varchar(50) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `tayang` date NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `jam_mulai`, `jam_akhir`, `tayang`, `id_wilayah`, `status`) VALUES
(3, 'Coloni Cafe', '12:00:00', '14:00:00', '2017-12-04', 1, 1),
(4, 'Cyber Cafe', '15:00:00', '17:00:00', '2017-12-04', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_koor`
--

CREATE TABLE `login_koor` (
  `id_loginKoor` int(11) NOT NULL,
  `id_koor` int(11) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_koor`
--

INSERT INTO `login_koor` (`id_loginKoor`, `id_koor`, `password`, `level`) VALUES
(1, 1, 'fajarsakti', 0),
(2, 5, 'niddle', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(30) NOT NULL,
  `total` int(11) NOT NULL,
  `no_rek` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `total`, `no_rek`, `status`, `id_bagian`, `level`) VALUES
(1, 'Ekky Ryno', 0, 815553, 1, 6, 1),
(2, 'Adn Agung', 0, 854652, 1, 4, 0),
(3, 'Ardian Kurniawan', 0, 847546, 1, 2, 0),
(4, 'David Leonardo', 0, 854656, 1, 5, 0),
(5, 'Bryan Niddle', 0, 456212, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `wilayah` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `wilayah`, `status`) VALUES
(1, 'Malang', 1),
(2, 'Surabaya', 1),
(3, 'Jakarta', 1),
(4, 'Bandung', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id_bagian`),
  ADD KEY `id_department` (`id_department`);

--
-- Indexes for table `departmen`
--
ALTER TABLE `departmen`
  ADD PRIMARY KEY (`id_departmen`);

--
-- Indexes for table `detail_tampil`
--
ALTER TABLE `detail_tampil`
  ADD PRIMARY KEY (`id_tampil`),
  ADD KEY `id_event` (`id_event`),
  ADD KEY `id_member` (`id_member`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `id_wilayah` (`id_wilayah`);

--
-- Indexes for table `login_koor`
--
ALTER TABLE `login_koor`
  ADD PRIMARY KEY (`id_loginKoor`),
  ADD KEY `id_koor` (`id_koor`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`),
  ADD KEY `id_koor` (`level`),
  ADD KEY `id_status` (`status`),
  ADD KEY `id_bagian` (`id_bagian`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id_wilayah`),
  ADD KEY `id_status` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `departmen`
--
ALTER TABLE `departmen`
  MODIFY `id_departmen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detail_tampil`
--
ALTER TABLE `detail_tampil`
  MODIFY `id_tampil` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `login_koor`
--
ALTER TABLE `login_koor`
  MODIFY `id_loginKoor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bagian`
--
ALTER TABLE `bagian`
  ADD CONSTRAINT `bagian_ibfk_1` FOREIGN KEY (`id_department`) REFERENCES `departmen` (`id_departmen`);

--
-- Constraints for table `detail_tampil`
--
ALTER TABLE `detail_tampil`
  ADD CONSTRAINT `detail_tampil_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`),
  ADD CONSTRAINT `detail_tampil_ibfk_2` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id_wilayah`);

--
-- Constraints for table `login_koor`
--
ALTER TABLE `login_koor`
  ADD CONSTRAINT `login_koor_ibfk_1` FOREIGN KEY (`id_koor`) REFERENCES `member` (`id_member`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_5` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
