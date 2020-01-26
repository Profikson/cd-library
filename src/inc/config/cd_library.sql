-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 26, 2020 at 02:31 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cd_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `name`) VALUES
(1, 'Borec');

-- --------------------------------------------------------

--
-- Table structure for table `cd`
--

CREATE TABLE `cd` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `picture_link` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cd`
--

INSERT INTO `cd` (`id`, `title`, `genre`, `year`, `price`, `picture_link`, `artist`) VALUES
(5, 'fear of the dark', 'Rock', 1992, 11, 'https://img.discogs.com/d6zfBY5NWrhu0Zd-BsrURy8xluA=/fit-in/600x600/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-408154-1281331335.jpeg.jpg', 'Iron Maiden'),
(6, 'Crazy Train', 'Rock', 1980, 10, 'https://img.discogs.com/2b_aSeRTSxQBq7xf5eZev3-derI=/fit-in/600x607/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-1604193-1356946818-8009.jpeg.jpg', 'Ozzy Osbourne, Blizzard Of Ozz'),
(7, 'dark side of the moon', 'Rock', 1973, 10, 'https://img.discogs.com/jKTmuxcsYe2TqcahU3QqVXJLssU=/fit-in/600x600/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-1873013-1471100381-3022.jpeg.jpg', 'Pink Floyd'),
(8, 'London Calling', 'Rock', 1979, 15, 'https://img.discogs.com/h68VySaLpts6mIomNT0rfpvLpIU=/fit-in/600x600/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-470912-1248752385.jpeg.jpg', 'The Clash'),
(9, 'kiss destroyer', 'Rock', 1970, 10, 'https://img.discogs.com/QbqTk5Puecd3saChfnZm4xkafp4=/fit-in/600x609/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-9567782-1515372715-3298.jpeg.jpg', 'Kiss'),
(10, 'best of stratovarius', 'Rock', 2000, 20, 'https://img.discogs.com/aqJ7SPtIvTRUukw_jAaIMPa7lCA=/fit-in/600x536/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-2080728-1267429298.jpeg.jpg', 'Stratovarius'),
(11, 'nothing else matters', 'Rock', 1992, 20, 'https://img.discogs.com/zZ1P1XGxyeeJzeP457ITVtkE5dI=/fit-in/599x523/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-473287-1362494520-1121.jpeg.jpg', 'Metallica'),
(12, 'best of led zeppelin', 'Rock', 1999, 19, 'https://img.discogs.com/IzFlh7fzCkNmXwe7mMvS-Iy4oeA=/fit-in/600x587/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-575244-1195753874.jpeg.jpg', 'Led Zeppelin'),
(13, 'bon jovi', 'Rock', 1984, 15, 'https://img.discogs.com/FhvBz7H4R1sHp51XVyZb5XEEHHU=/fit-in/600x602/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-2079831-1383636268-5693.jpeg.jpg', 'Bon Jovi'),
(14, 'killers', 'Rock', 1981, 10, 'https://img.discogs.com/dBELWkrnL5_520MQ_q5eyDfjaFY=/fit-in/600x600/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-1538759-1579910245-4930.jpeg.jpg', 'Iron Maiden'),
(15, 'breaking the law', 'Rock', 1980, 10, 'https://img.discogs.com/Zh703ydLzLVmQxhAkxrRScifQkE=/fit-in/500x494/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-1223148-1239584221.jpeg.jpg', 'Judas Priest'),
(16, 'back in black', 'Rock', 1980, 15, 'https://img.discogs.com/hjVtzok-FcDgxnJQw4q2RwqWxUM=/fit-in/600x600/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-400591-1537035829-1391.jpeg.jpg', 'AC/DC'),
(17, 'iron', 'Rock', 1980, 11, 'https://img.discogs.com/G1P9qVNkAaw4PAtMUf-ThjyeWqk=/fit-in/600x597/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-1466027-1440420386-7656.jpeg.jpg', 'Iron Maiden'),
(18, 'fear of the dark', 'Rock', 1992, 10, 'https://img.discogs.com/d6zfBY5NWrhu0Zd-BsrURy8xluA=/fit-in/600x600/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-408154-1281331335.jpeg.jpg', 'Iron Maiden');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `cd_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `stars`, `cd_id`) VALUES
(13, 4, 6),
(14, 4, 6),
(17, 4, 7),
(18, 3, 6),
(19, 4, 5),
(20, 4, 13),
(21, 3, 13),
(22, 5, 13),
(23, 2, 13),
(24, 2, 13),
(25, 2, 13),
(26, 2, 13),
(27, 4, 5),
(28, 3, 5),
(29, 3, 5),
(30, 2, 5),
(31, 4, 5),
(32, 1, 5),
(33, 3, 6),
(34, 3, 6),
(35, 2, 6),
(36, 5, 6),
(37, 4, 7),
(38, 5, 7),
(39, 2, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cd`
--
ALTER TABLE `cd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cd_id` (`cd_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cd`
--
ALTER TABLE `cd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`cd_id`) REFERENCES `cd` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
