-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2021 at 01:20 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brief6_vuejs_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `rendez-vous`
--

CREATE TABLE `rendez-vous` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `typeConsultation` text NOT NULL,
  `horaire` varchar(50) NOT NULL,
  `reference` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rendez-vous`
--

INSERT INTO `rendez-vous` (`id`, `date`, `typeConsultation`, `horaire`, `reference`) VALUES
(1, '2021-06-01', 'With BootstrapVue you can build responsive, mobile-first, and ARIA accessible projects on the web using Vue.js and the world\'s most popular front-end CSS library.', '2 - 4', 'AZE123'),
(6, '2028-06-18', 'AAA', '8 - 22', 'AZE123'),
(7, '2028-06-18', 'AAA', '8 - 22', 'AZE123'),
(12, '2021-06-18', 'AZERTY', '8 - 9', 'AZE124'),
(13, '0000-00-00', '', '', ''),
(14, '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `reference` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tel` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`reference`, `nom`, `prenom`, `age`, `email`, `tel`) VALUES
('', '', '', 0, '', 0),
('111', 'othmane', 'rhazlani', 111, 'othmane@gmail.com', 1111),
('1234', 'othmane', 'rhazlani', 22, 'othmane2@gmail.com', 0),
('1235', 'othmane', 'rhazlani', 22, 'othmane@gmail.com', 123456789),
('AZE123', 'othmane', 'rhazlani', 22, 'othmane@gmail.com', 0),
('AZE124', 'othmane', 'rhazlani', 22, 'othmane2@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rendez-vous`
--
ALTER TABLE `rendez-vous`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ref_fk` (`reference`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`reference`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rendez-vous`
--
ALTER TABLE `rendez-vous`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rendez-vous`
--
ALTER TABLE `rendez-vous`
  ADD CONSTRAINT `ref_fk` FOREIGN KEY (`reference`) REFERENCES `user` (`reference`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
