-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 07:14 PM
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
-- Database: `neptune`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `aname` varchar(20) NOT NULL,
  `aimage` varchar(255) NOT NULL,
  `aemail` varchar(25) NOT NULL,
  `datetime` datetime NOT NULL,
  `addedby` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `aname`, `aimage`, `aemail`, `datetime`, `addedby`) VALUES
(1, 'babalolajnr', 'password', 'Abdulqudduus Babalol', 'tiny.jpg', 'babalolajnr@gmail.com', '0000-00-00 00:00:00', 'Ironman');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Cid` int(20) NOT NULL,
  `CName` varchar(20) NOT NULL,
  `CAuthor` varchar(20) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Cid`, `CName`, `CAuthor`, `datetime`) VALUES
(1, 'Lifestyle', 'Abdulqudduus Babalol', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `clicks`
--

CREATE TABLE `clicks` (
  `id` int(20) NOT NULL,
  `post_id` int(20) NOT NULL,
  `count` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clicks`
--

INSERT INTO `clicks` (`id`, `post_id`, `count`) VALUES
(1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(20) NOT NULL,
  `datetime` datetime NOT NULL,
  `name` varchar(24) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `status` varchar(5) NOT NULL,
  `post_id` int(20) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `datetime`, `name`, `comment`, `status`, `post_id`, `email`) VALUES
(1, '0000-00-00 00:00:00', 'Abdulqudduus Babalola', 'Nice post', 'ON', 2, 'babalolajnr@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(20) NOT NULL,
  `datetime` datetime NOT NULL,
  `category` varchar(255) NOT NULL,
  `author` varchar(25) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `datetime`, `category`, `author`, `image`, `content`, `title`) VALUES
(1, '0000-00-00 00:00:00', 'Lifestyle', 'Abdulqudduus Babalol', 'honeycomb_volume_iron_167098_3840x2160.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut faucibus pulvinar elementum integer enim neque volutpat. Enim nec dui nunc mattis enim ut tellus. Orci a scelerisque purus semper eget duis at. Nulla at volutpat diam ut venenatis tellus in. Non tellus orci ac auctor. In hendrerit gravida rutrum quisque non. Sit amet facilisis magna etiam tempor orci. Convallis a cras semper auctor neque vitae tempus. Orci a scelerisque purus semper eget duis at. Nec sagittis aliquam malesuada bibendum. Est ante in nibh mauris. Vitae proin sagittis nisl rhoncus mattis rhoncus urna neque viverra. Fringilla ut morbi tincidunt augue interdum velit euismod. Pellentesque id nibh tortor id aliquet lectus proin nibh nisl. Tempor nec feugiat nisl pretium fusce id velit ut tortor.</p><p>Leo a diam sollicitudin tempor. Mattis aliquam faucibus purus in massa tempor nec feugiat nisl. Pulvinar mattis nunc sed blandit libero volutpat. Aliquam id diam maecenas ultricies mi eget. Adipiscing diam donec adipiscing tristique risus. Dignissim cras tincidunt lobortis feugiat vivamus at augue eget arcu. Congue nisi vitae suscipit tellus mauris a. Mauris in aliquam sem fringilla ut. Malesuada fames ac turpis egestas sed tempus urna et pharetra. Vulputate mi sit amet mauris commodo quis. Orci nulla pellentesque dignissim enim sit amet. Pretium vulputate sapien nec sagittis aliquam. Placerat orci nulla pellentesque dignissim enim sit amet venenatis. Scelerisque in dictum non consectetur. In arcu cursus euismod quis viverra nibh cras.</p><p>Nulla posuere sollicitudin aliquam ultrices. Enim nunc faucibus a pellentesque sit amet porttitor eget. Sed turpis tincidunt id aliquet risus feugiat in ante metus. Quis varius quam quisque id diam vel quam elementum pulvinar. Iaculis at erat pellentesque adipiscing commodo elit at imperdiet dui. Vel facilisis volutpat est velit egestas dui id ornare arcu. Eget lorem dolor sed viverra. Habitant morbi tristique senectus et netus et. Urna cursus eget nunc scelerisque. Cursus vitae congue mauris rhoncus aenean vel. Consectetur adipiscing elit pellentesque habitant morbi. Nisi est sit amet facilisis magna etiam tempor orci. Consequat nisl vel pretium lectus quam id leo in vitae. Eget lorem dolor sed viverra. Enim neque volutpat ac tincidunt vitae.</p><p>Eget velit aliquet sagittis id consectetur purus ut faucibus. Posuere sollicitudin aliquam ultrices sagittis orci a. Facilisi cras fermentum odio eu feugiat. Non arcu risus quis varius quam quisque id. Imperdiet nulla malesuada pellentesque elit. Purus in massa tempor nec feugiat. In hac habitasse platea dictumst quisque sagittis purus sit amet. Vulputate odio ut enim blandit volutpat maecenas volutpat blandit aliquam. Turpis massa tincidunt dui ut ornare. Amet massa vitae tortor condimentum lacinia quis vel eros. Enim nulla aliquet porttitor lacus luctus accumsan. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus vitae. Aliquam nulla facilisi cras fermentum. Integer feugiat scelerisque varius morbi enim nunc faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames. Ullamcorper velit sed ullamcorper morbi tincidunt ornare massa eget egestas. Aliquam sem et tortor consequat id porta nibh. Habitasse platea dictumst vestibulum rhoncus. Nunc lobortis mattis aliquam faucibus purus in massa tempor. Eleifend quam adipiscing vitae proin.</p><p>Bibendum at varius vel pharetra vel. Diam vel quam elementum pulvinar etiam non quam lacus. Tristique nulla aliquet enim tortor at. Pharetra sit amet aliquam id diam maecenas ultricies. Dignissim cras tincidunt lobortis feugiat vivamus. Egestas congue quisque egestas diam in arcu cursus. Aliquet lectus proin nibh nisl. Phasellus vestibulum lorem sed risus ultricies. Volutpat maecenas volutpat blandit aliquam etiam erat velit scelerisque in. Curabitur vitae nunc sed velit. Senectus et netus et malesuada fames ac turpis. Commodo quis imperdiet massa tincidunt nunc pulvinar sapien et ligula. Blandit turpis cursus in hac habitasse. Quis varius quam quisque id diam vel quam elementum pulvinar. Turpis egestas maecenas pharetra convallis posuere morbi leo urna molestie. Nisi est sit amet facilisis magna etiam tempor orci. Amet est placerat in egestas erat imperdiet sed. Ut faucibus pulvinar elementum integer enim. Tempus urna et pharetra pharetra massa massa ultricies. Nibh venenatis cras sed felis eget velit aliquet sagittis id.</p>', 'Broken'),
(2, '0000-00-00 00:00:00', 'Lifestyle', 'Abdulqudduus Babalol', 'paint_colorful_overlay_139992_3840x2160.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut faucibus pulvinar elementum integer enim neque volutpat. Enim nec dui nunc mattis enim ut tellus. Orci a scelerisque purus semper eget duis at. Nulla at volutpat diam ut venenatis tellus in. Non tellus orci ac auctor. In hendrerit gravida rutrum quisque non. Sit amet facilisis magna etiam tempor orci. Convallis a cras semper auctor neque vitae tempus. Orci a scelerisque purus semper eget duis at. Nec sagittis aliquam malesuada bibendum. Est ante in nibh mauris. Vitae proin sagittis nisl rhoncus mattis rhoncus urna neque viverra. Fringilla ut morbi tincidunt augue interdum velit euismod. Pellentesque id nibh tortor id aliquet lectus proin nibh nisl. Tempor nec feugiat nisl pretium fusce id velit ut tortor.</p><p>Leo a diam sollicitudin tempor. Mattis aliquam faucibus purus in massa tempor nec feugiat nisl. Pulvinar mattis nunc sed blandit libero volutpat. Aliquam id diam maecenas ultricies mi eget. Adipiscing diam donec adipiscing tristique risus. Dignissim cras tincidunt lobortis feugiat vivamus at augue eget arcu. Congue nisi vitae suscipit tellus mauris a. Mauris in aliquam sem fringilla ut. Malesuada fames ac turpis egestas sed tempus urna et pharetra. Vulputate mi sit amet mauris commodo quis. Orci nulla pellentesque dignissim enim sit amet. Pretium vulputate sapien nec sagittis aliquam. Placerat orci nulla pellentesque dignissim enim sit amet venenatis. Scelerisque in dictum non consectetur. In arcu cursus euismod quis viverra nibh cras.</p><p>Nulla posuere sollicitudin aliquam ultrices. Enim nunc faucibus a pellentesque sit amet porttitor eget. Sed turpis tincidunt id aliquet risus feugiat in ante metus. Quis varius quam quisque id diam vel quam elementum pulvinar. Iaculis at erat pellentesque adipiscing commodo elit at imperdiet dui. Vel facilisis volutpat est velit egestas dui id ornare arcu. Eget lorem dolor sed viverra. Habitant morbi tristique senectus et netus et. Urna cursus eget nunc scelerisque. Cursus vitae congue mauris rhoncus aenean vel. Consectetur adipiscing elit pellentesque habitant morbi. Nisi est sit amet facilisis magna etiam tempor orci. Consequat nisl vel pretium lectus quam id leo in vitae. Eget lorem dolor sed viverra. Enim neque volutpat ac tincidunt vitae.</p><p>Eget velit aliquet sagittis id consectetur purus ut faucibus. Posuere sollicitudin aliquam ultrices sagittis orci a. Facilisi cras fermentum odio eu feugiat. Non arcu risus quis varius quam quisque id. Imperdiet nulla malesuada pellentesque elit. Purus in massa tempor nec feugiat. In hac habitasse platea dictumst quisque sagittis purus sit amet. Vulputate odio ut enim blandit volutpat maecenas volutpat blandit aliquam. Turpis massa tincidunt dui ut ornare. Amet massa vitae tortor condimentum lacinia quis vel eros. Enim nulla aliquet porttitor lacus luctus accumsan. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus vitae. Aliquam nulla facilisi cras fermentum. Integer feugiat scelerisque varius morbi enim nunc faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames. Ullamcorper velit sed ullamcorper morbi tincidunt ornare massa eget egestas. Aliquam sem et tortor consequat id porta nibh. Habitasse platea dictumst vestibulum rhoncus. Nunc lobortis mattis aliquam faucibus purus in massa tempor. Eleifend quam adipiscing vitae proin.</p><p>Bibendum at varius vel pharetra vel. Diam vel quam elementum pulvinar etiam non quam lacus. Tristique nulla aliquet enim tortor at. Pharetra sit amet aliquam id diam maecenas ultricies. Dignissim cras tincidunt lobortis feugiat vivamus. Egestas congue quisque egestas diam in arcu cursus. Aliquet lectus proin nibh nisl. Phasellus vestibulum lorem sed risus ultricies. Volutpat maecenas volutpat blandit aliquam etiam erat velit scelerisque in. Curabitur vitae nunc sed velit. Senectus et netus et malesuada fames ac turpis. Commodo quis imperdiet massa tincidunt nunc pulvinar sapien et ligula. Blandit turpis cursus in hac habitasse. Quis varius quam quisque id diam vel quam elementum pulvinar. Turpis egestas maecenas pharetra convallis posuere morbi leo urna molestie. Nisi est sit amet facilisis magna etiam tempor orci. Amet est placerat in egestas erat imperdiet sed. Ut faucibus pulvinar elementum integer enim. Tempus urna et pharetra pharetra massa massa ultricies. Nibh venenatis cras sed felis eget velit aliquet sagittis id.</p>', 'Desert');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Cid`);

--
-- Indexes for table `clicks`
--
ALTER TABLE `clicks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Cid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clicks`
--
ALTER TABLE `clicks`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
