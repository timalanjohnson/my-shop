-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2019 at 10:13 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Manuel', 'Pellegrini', 'mp@whu.com', 'P@55w0rd!'),
(2, 'Mark', 'Noble', 'mnoble@whu.com', 'P@55w0rd!'),
(3, 'Declan', 'Rice', 'drice@whu.com', 'P@55w0rd!'),
(4, 'Manuel', 'Lanzini', 'mlanzini@whu.com', 'P@55w0rd!'),
(5, 'Felipe', 'Anderson', 'fanderson@whu.com', 'P@55w0rd!'),
(6, 'Issa', 'Diop', 'idiop@whu.com', 'P@55w0rd!'),
(7, 'Lukasz', 'Fabianski', 'lfabianski@whu.com', 'P@55w0rd!'),
(8, 'Robert', 'Snodgrass', 'rsnodgrass@whu.com', 'P@55w0rd!'),
(9, 'Aaron', 'Cresswell', 'acresswell@whu.com', 'P@55w0rd!'),
(10, 'Fabian', 'Balbuena', 'fbalbuena@whu.com', 'P@55w0rd!'),
(11, 'Pablo', 'Zabaleta', 'pzabaleta@whu.com', 'P@55w0rd!'),
(12, 'Marko', 'Arnautovic', 'marnautovic@whu.com', 'P@55w0rd!'),
(13, 'Charles', 'Leclerc', 'cl@ferrari.com', 'P@55w0rd!'),
(14, 'Sebastian', 'Vettel', 'sb@ferrari.com', 'P@55w0rd!'),
(15, 'Lewis', 'Hamilton', 'lh@mercedes.com', 'P@55w0rd!'),
(16, 'Valtteri', 'Bottas', 'vb@mercedes.com', 'P@55w0rd!'),
(17, 'Daniel', 'Riccardo', 'dr@renault.com', 'P@55w0rd!'),
(18, 'Nico', 'Hulkenburg', 'nh@renault.com', 'P@55w0rd!'),
(19, 'Lando', 'Norris', 'ln@mclaren.com', 'P@55w0rd!'),
(20, 'Carlos', 'Sainz', 'cs@mclaren.com', 'P@55w0rd!'),
(21, 'Max', 'Verstappen', 'mv@redbullracing.com', 'P@55w0rd!'),
(22, 'Pierre', 'Gasly', 'pg@redbullracing.com', 'P@55w0rd!'),
(23, 'Jose', 'Mourinho', 'jm@mou.com', 'P@55w0rd!'),
(24, 'Zindine', 'Zidane', 'zz@realmadrid.com', 'P@55w0rd!'),
(25, 'Jurgen', 'Klopp', 'jk@lfc.com', 'P@55w0rd!'),
(26, 'Neil', 'Warnock', 'nw@cardiff.com', 'P@55w0rd!'),
(27, 'Unai', 'Emery', 'ue@gunners.com', 'P@55w0rd!'),
(28, 'Diego', 'Simeone', 'cholo@atleti.com', 'P@55w0rd!'),
(29, 'Lionel', 'Messi', 'goat@barca.com', 'P@55w0rd!'),
(30, 'Pep', 'Guardiola', 'pg@mancity.com', 'P@55w0rd!');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `sell_price` int(11) NOT NULL,
  `cost_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`id`, `name`, `description`, `sell_price`, `cost_price`, `quantity`) VALUES
(1, 'xf_10-24mm', 'Fujinon XF 10-24mm Lense', 1250, 1000, 23),
(2, 'xf_16-55mm', 'Fujinon XF 16-55mm Lense', 1650, 1400, 3),
(3, 'xf_16mm', 'Fujinon XF 16mm f/2.8 Lense', 1250, 700, 26),
(4, 'xf_16mm_fast', 'Fujinon XF 16mm f/1.4 Lense', 3250, 3000, 11),
(5, 'xf_18-135mm', 'Fujinon XF 18-135mm Lense', 1950, 1600, 26),
(6, 'xf_23mm', 'Fujinon XF 23mm f/2 Lense', 1250, 1040, 33),
(7, 'xf_35mm', 'Fujinon XF 35mm f/2 Lense', 1350, 1200, 7),
(8, 'xf_35mm_fast', 'Fujinon XF 35mm f/1.4 Lense', 1650, 1350, 38),
(9, 'xf_50-140mm', 'Fujinon XF 50-140mm Lense', 1250, 500, 9),
(10, 'xf_50mm', 'Fujinon XF 50mm Lense', 1750, 1300, 23),
(11, 'xf_56mm', 'Fujinon XF 56mm Lense', 1050, 700, 25),
(12, 'xf_60mm', 'Fujinon XF 60mm Lense', 2550, 2000, 13),
(13, 'xf_80mm', 'Fujinon XF 80mm Lense', 1250, 800, 7),
(14, 'xf_90mm', 'Fujinon XF 90mm Lense', 650, 450, 18),
(15, 'xf_100-400mm', 'Fujinon XF 100-400mm Lense', 1950, 1500, 23),
(16, 'xf_10-24mm', 'Fujinon XF 10-24mm Lense (pre-owned)', 1200, 1000, 23),
(17, 'xf_16-55mm', 'Fujinon XF 16-55mm Lense (pre-owned)', 1600, 1400, 3),
(18, 'xf_16mm', 'Fujinon XF 16mm f/2.8 Lense (pre-owned)', 1200, 700, 26),
(19, 'xf_16mm_fast', 'Fujinon XF 16mm f/1.4 Lense (pre-owned)', 3200, 3000, 11),
(20, 'xf_18-135mm', 'Fujinon XF 18-135mm Lense (pre-owned)', 1900, 1600, 26),
(21, 'xf_23mm', 'Fujinon XF 23mm f/2 Lense (pre-owned)', 1200, 1040, 33),
(22, 'xf_35mm', 'Fujinon XF 35mm f/2 Lense (pre-owned)', 1300, 1200, 7),
(23, 'xf_35mm_fast', 'Fujinon XF 35mm f/1.4 Lense (pre-owned)', 1600, 1350, 38),
(24, 'xf_50-140mm', 'Fujinon XF 50-140mm Lense (pre-owned)', 1200, 500, 9),
(25, 'xf_50mm', 'Fujinon XF 50mm Lense (pre-owned)', 1700, 1300, 23),
(26, 'xf_56mm', 'Fujinon XF 56mm Lense (pre-owned)', 1000, 700, 25),
(27, 'xf_60mm', 'Fujinon XF 60mm Lense (pre-owned)', 2500, 2000, 13),
(28, 'xf_80mm', 'Fujinon XF 80mm Lense (pre-owned)', 1200, 800, 7),
(29, 'xf_90mm', 'Fujinon XF 90mm Lense (pre-owned)', 600, 450, 18),
(30, 'xf_100-400mm', 'Fujinon XF 100-400mm Lense (pre-owned)', 1900, 1500, 23);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `order_date` varchar(45) NOT NULL,
  `tbl_customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `order_date`, `tbl_customer_id`) VALUES
(1, '07-04-2019', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_item`
--

CREATE TABLE `tbl_order_item` (
  `id` int(11) NOT NULL,
  `tbl_order_id` int(11) NOT NULL,
  `tbl_order_tbl_customer_id` int(11) NOT NULL,
  `tbl_item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_item`
--

INSERT INTO `tbl_order_item` (`id`, `tbl_order_id`, `tbl_order_tbl_customer_id`, `tbl_item_id`) VALUES
(1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`,`tbl_customer_id`),
  ADD KEY `fk_tbl_order_tbl_customer_idx` (`tbl_customer_id`);

--
-- Indexes for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  ADD PRIMARY KEY (`id`,`tbl_order_id`,`tbl_order_tbl_customer_id`,`tbl_item_id`),
  ADD KEY `fk_tbl_order_item_tbl_order1_idx` (`tbl_order_id`,`tbl_order_tbl_customer_id`),
  ADD KEY `fk_tbl_order_item_tbl_item1_idx` (`tbl_item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;
--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `fk_tbl_order_tbl_customer` FOREIGN KEY (`tbl_customer_id`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  ADD CONSTRAINT `fk_tbl_order_item_tbl_item1` FOREIGN KEY (`tbl_item_id`) REFERENCES `tbl_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tbl_order_item_tbl_order1` FOREIGN KEY (`tbl_order_id`,`tbl_order_tbl_customer_id`) REFERENCES `tbl_order` (`id`, `tbl_customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
