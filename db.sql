-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 03, 2023 at 03:06 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b3_object_movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

DROP TABLE IF EXISTS `characters`;
CREATE TABLE `characters` (
  `id` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(50) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`id`, `createdAt`, `modifiedAt`, `name`, `movie_id`) VALUES
(1, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Charlie Chaplin', 1),
(2, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Mécanicien de l\'usine', 1),
(3, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Scarlett O\'Hara', 2),
(4, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Rhett Butler', 2),
(5, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Dorothy Gale', 3),
(6, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Le Lion Peureux', 3),
(7, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Alicia Huberman', 4),
(8, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'T.R. Devlin', 4),
(9, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Harry Powell', 5),
(10, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Rachel Cooper', 5),
(11, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Holly Martins', 6),
(12, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Harry Lime', 6),
(13, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'John Ferguson', 7),
(14, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Madeleine Elster', 7),
(15, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Blondin', 8),
(16, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Le Truand', 8),
(17, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Alex DeLarge', 9),
(18, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Dim', 9),
(19, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Don Vito Corleone', 10),
(20, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Michael Corleone', 10),
(21, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Luke Skywalker', 11),
(22, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Princesse Leia', 11),
(23, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Chef Martin Brody', 12),
(24, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Quint', 12),
(25, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Elliott', 13),
(26, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'E.T.', 13),
(27, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Marty McFly', 14),
(28, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Doc Brown', 14),
(29, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Clarice Starling', 15),
(30, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Hannibal Lecter', 15),
(31, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Dr. Alan Grant', 16),
(32, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'John Hammond', 16),
(33, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Jack Dawson', 17),
(34, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Rose DeWitt Bukater', 17),
(35, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Neo', 18),
(36, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Trinity', 18),
(37, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Frodo Baggins', 19),
(38, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Gandalf', 19),
(39, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Maximus', 20),
(40, '2023-11-03 16:06:14', '2023-11-03 16:06:14', 'Commode', 20);

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

DROP TABLE IF EXISTS `genders`;
CREATE TABLE `genders` (
  `id` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `createdAt`, `modifiedAt`, `name`) VALUES
(1, '2023-11-03 16:02:46', '2023-11-03 16:02:46', 'Action'),
(2, '2023-11-03 16:02:46', '2023-11-03 16:02:46', 'Comédie'),
(3, '2023-11-03 16:02:46', '2023-11-03 16:02:46', 'Drame'),
(4, '2023-11-03 16:02:46', '2023-11-03 16:02:46', 'Science-fiction'),
(5, '2023-11-03 16:02:46', '2023-11-03 16:02:46', 'Horreur'),
(6, '2023-11-03 16:02:46', '2023-11-03 16:02:46', 'Aventure'),
(7, '2023-11-03 16:02:46', '2023-11-03 16:02:46', 'Fantaisie'),
(8, '2023-11-03 16:02:46', '2023-11-03 16:02:46', 'Romance'),
(9, '2023-11-03 16:02:46', '2023-11-03 16:02:46', 'Thriller'),
(10, '2023-11-03 16:02:46', '2023-11-03 16:02:46', 'Animation');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `title` varchar(150) NOT NULL,
  `imdb` varchar(20) NOT NULL,
  `gender_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `createdAt`, `modifiedAt`, `title`, `imdb`, `gender_id`) VALUES
(1, '2023-11-03 16:03:12', '2023-11-03 16:03:12', 'Les Temps Modernes', 'tt0027977', 1),
(2, '2023-11-03 16:03:12', '2023-11-03 16:03:12', 'Autant en emporte le vent', 'tt0031381', 3),
(3, '2023-11-03 16:03:12', '2023-11-03 16:03:12', 'Le Magicien d\'Oz', 'tt0032138', 4),
(4, '2023-11-03 16:03:12', '2023-11-03 16:03:12', 'Les Enchaînés', 'tt0036969', 6),
(5, '2023-11-03 16:03:12', '2023-11-03 16:03:12', 'La Nuit du chasseur', 'tt0048424', 5),
(6, '2023-11-03 16:03:12', '2023-11-03 16:03:12', 'Le Troisième Homme', 'tt0041959', 7),
(7, '2023-11-03 16:03:12', '2023-11-03 16:03:12', 'Sueurs froides', 'tt0052357', 7),
(8, '2023-11-03 16:03:12', '2023-11-03 16:03:12', 'Le Bon, la Brute et le Truand', 'tt0060196', 6),
(9, '2023-11-03 16:03:12', '2023-11-03 16:03:12', 'Orange mécanique', 'tt0066921', 8),
(10, '2023-11-03 16:03:12', '2023-11-03 16:03:12', 'Le Parrain', 'tt0068646', 2),
(11, '2023-11-03 16:03:12', '2023-11-03 16:03:12', 'Star Wars : Episode IV - Un nouvel espoir', 'tt0076759', 8),
(12, '2023-11-03 16:03:12', '2023-11-03 16:03:12', 'Les Dents de la mer', 'tt0073195', 5),
(13, '2023-11-03 16:03:12', '2023-11-03 16:03:12', 'E.T. l\'extra-terrestre', 'tt0083866', 8),
(14, '2023-11-03 16:03:12', '2023-11-03 16:03:12', 'Retour vers le futur', 'tt0088763', 8),
(15, '2023-11-03 16:03:12', '2023-11-03 16:03:12', 'Le Silence des agneaux', 'tt0102926', 2),
(16, '2023-11-03 16:03:12', '2023-11-03 16:03:12', 'Jurassic Park', 'tt0107290', 8),
(17, '2023-11-03 16:03:12', '2023-11-03 16:03:12', 'Titanic', 'tt0120338', 9),
(18, '2023-11-03 16:03:12', '2023-11-03 16:03:12', 'Matrix', 'tt0133093', 8),
(19, '2023-11-03 16:03:12', '2023-11-03 16:03:12', 'Le Seigneur des Anneaux : La Communauté de l\'Anneau', 'tt0120737', 1),
(20, '2023-11-03 16:03:12', '2023-11-03 16:03:12', 'Gladiator', 'tt0172495', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
