-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 11:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_stock`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `calculateTotalCount` (`itemID` INT) RETURNS INT(11)  BEGIN
    DECLARE total INT DEFAULT 0;
    
    SET total := calculateTotalWorkingCount(itemID) + calculateTotalDefectCount(itemID);

    -- Return the total count
    RETURN total;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `calculateTotalDefectCount` (`itemID` INT) RETURNS INT(11)  BEGIN
    DECLARE total INT DEFAULT 0;
    
    -- Calculate the total working count for the given itemID
    SELECT COALESCE(SUM(count_defect), 0) INTO total 
    FROM tracker 
    WHERE item_id = itemID;

    -- Return the total count
    RETURN total;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `calculateTotalWorkingCount` (`itemID` INT) RETURNS INT(11)  BEGIN
    DECLARE total INT DEFAULT 0;
    
    -- Calculate the total working count for the given itemID
    SELECT COALESCE(SUM(count_working), 0) INTO total 
    FROM tracker 
    WHERE item_id = itemID;

    -- Return the total count
    RETURN total;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `item_description` varchar(50) NOT NULL,
  `item_purchase_price` decimal(10,0) NOT NULL,
  `item_purchase_year` year(4) NOT NULL,
  `item_depreciation_rate` decimal(10,0) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_description`, `item_purchase_price`, `item_purchase_year`, `item_depreciation_rate`, `image`) VALUES
(7, 'Table', 'Four-legged', 1000, '2012', 17, ''),
(10, 'Fan', 'three legged fan', 3450, '2024', 12, ''),
(13, 'AC', '5 star Onida', 2000, '2024', 12, '');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `location_name`) VALUES
(1, 'GFL'),
(2, 'SFL'),
(3, 'TFL'),
(4, 'GPU Lab'),
(5, 'Research Scholars La');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_no` int(11) DEFAULT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`user_id`, `user_name`, `email`, `phone_no`, `password`) VALUES
(101, 'Niranjan', 'niranjank.desktop@gmail.com', 0, 'smartstock');

-- --------------------------------------------------------

--
-- Table structure for table `tracker`
--

CREATE TABLE `tracker` (
  `location_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `count_working` int(11) NOT NULL,
  `count_defect` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tracker`
--

INSERT INTO `tracker` (`location_id`, `item_id`, `count_working`, `count_defect`) VALUES
(3, 7, 10, 10),
(5, 7, 40, 40),
(1, 13, 20, 20),
(5, 10, 15, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tracker`
--
ALTER TABLE `tracker`
  ADD KEY `tracker_items_FK` (`item_id`),
  ADD KEY `tracker_locations_FK` (`location_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tracker`
--
ALTER TABLE `tracker`
  ADD CONSTRAINT `tracker_items_FK` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tracker_locations_FK` FOREIGN KEY (`location_id`) REFERENCES `locations` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
DELIMITER //

CREATE TRIGGER before_items_update
BEFORE UPDATE ON items
FOR EACH ROW
BEGIN
    DECLARE new_description VARCHAR(255);
    DECLARE new_purchase_year INT;
    DECLARE new_purchase_value DECIMAL(10, 2);
    DECLARE new_depreciation_rate DECIMAL(5, 2);
    DECLARE new_count_working INT;
    DECLARE new_count_defect INT;

    SET new_description = NEW.item_description;
    SET new_purchase_year = NEW.item_purchase_year;
    SET new_purchase_value = NEW.item_purchase_value;
    SET new_depreciation_rate = NEW.item_depreciation_rate;
    SET new_count_working = NEW.count_working;
    SET new_count_defect = NEW.count_defect;

    IF OLD.item_description != new_description THEN
        UPDATE tracker
        SET item_description = new_description
        WHERE item_id = OLD.item_id;
    END IF;

    IF OLD.item_purchase_year != new_purchase_year THEN
        UPDATE tracker
        SET item_purchase_year = new_purchase_year
        WHERE item_id = OLD.item_id;
    END IF;

    IF OLD.item_purchase_value != new_purchase_value THEN
        UPDATE tracker
        SET item_purchase_value = new_purchase_value
        WHERE item_id = OLD.item_id;
    END IF;

    IF OLD.item_depreciation_rate != new_depreciation_rate THEN
        UPDATE tracker
        SET item_depreciation_rate = new_depreciation_rate
        WHERE item_id = OLD.item_id;
    END IF;

    IF OLD.count_working != new_count_working THEN
        UPDATE tracker
        SET count_working = new_count_working
        WHERE item_id = OLD.item_id;
    END IF;

    IF OLD.count_defect != new_count_defect THEN
        UPDATE tracker
        SET count_defect = new_count_defect
        WHERE item_id = OLD.item_id;
    END IF;

END//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE GetItemDetails()
BEGIN
    SELECT item_name, image, tcount
    FROM items
    NATURAL JOIN tracker
    NATURAL JOIN locations;
END //

DELIMITER ;

