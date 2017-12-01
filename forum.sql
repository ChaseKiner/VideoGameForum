-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2017 at 05:46 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `FavoriteId` int(11) NOT NULL,
  `ParentTable` varchar(20) NOT NULL,
  `FavoritedId` int(11) NOT NULL,
  `UserWhoFavorited` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `MessageId` int(11) NOT NULL,
  `DatePosted` datetime NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Content` varchar(2000) NOT NULL,
  `Upvotes` int(11) NOT NULL DEFAULT '0',
  `Downvotes` int(11) NOT NULL DEFAULT '0',
  `Posts` int(11) NOT NULL,
  `Category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `ReplyId` int(11) NOT NULL,
  `DatePosted` datetime NOT NULL,
  `Content` varchar(2000) NOT NULL,
  `Upvotes` int(11) NOT NULL DEFAULT '0',
  `Downvotes` int(11) NOT NULL DEFAULT '0',
  `Sends` int(11) NOT NULL,
  `Attached` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserId` int(11) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(40) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(75) NOT NULL,
  `AccessLevel` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `videogames`
--

CREATE TABLE `videogames` (
  `GameId` int(11) NOT NULL,
  `Name` varchar(54) CHARACTER SET utf8 DEFAULT NULL,
  `Summary` varchar(2000) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videogames`
--

INSERT INTO `videogames` (`GameId`, `Name`, `Summary`) VALUES
(7329, 'Dead Island 2', 'Welcome to Zombie California! Slay and survive with style in this co-op playground. Explore the vast Golden State, from lush forests to sunny beaches. Wield a variety of over-the-top, hand-crafted weapons against human and undead enemies. Upgrade your vehicles, grab your friends, and take a permanent vacation to the zombie apocalypse. Paradise meets hell and you are the matchmaker!'),
(25300, 'Sky Break', 'Sky Break is an open-world game on a stormy abandoned planet filled with wild mechas. Learn to master this world and to hack the mechas if you want a chance to survive.'),
(25657, 'Destiny 2', 'In Destiny 2, the last safe city on Earth has fallen and lays in ruins, occupied by a powerful new enemy and his elite army, the Red Legion. Every player creates their own character called a “Guardian,” humanity’s chosen protectors. As a Guardian in Destiny 2, players must master new abilities and weapons to reunite the city’s forces, stand together and fight back to reclaim their home.  \r\n  \r\nIn Destiny 2 players will answer this call, embarking on a fresh story filled with new destinations around our solar system to explore, and an expansive amount of activities to discover. There is something for almost every type of gamer in Destiny 2, including gameplay for solo, cooperative and competitive players set within a vast, evolving and exciting universe.'),
(28204, 'Call of Duty: WWII', 'Call of Duty: WWII creates the definitive World War II next generation experience across three different game modes: Campaign, Multiplayer, and Co-Operative. Featuring stunning visuals, the Campaign transports players to the European theater as they engage in an all-new Call of Duty story set in iconic World War II battles. Multiplayer marks a return to original, boots-on-the ground Call of Duty gameplay. Authentic weapons and traditional run-and-gun action immerse you in a vast array of World War II-themed locations. The Co-Operative mode unleashes a new and original story in a standalone game experience full of unexpected, adrenaline-pumping moments.'),
(28540, 'Assassin’s Creed: Origins', 'For the last four years, the team behind Assassin’s Creed IV Black Flag has been crafting a new beginning for the Assassin’s Creed franchise. \r\n \r\nSet in Ancient Egypt, players will journey to the most mysterious place in history, during a crucial period that will shape the world and give rise to the Assassin’s Brotherhood. Plunged into a living, systemic and majestic open world, players are going to discover vibrant ecosystems, made of diverse and exotic landscapes that will provide them with infinite opportunities of pure exploration, adventures and challenges. \r\n \r\nPowered by a new fight philosophy, Assassin\'s Creed Originsembraces a brand new RPG direction where players level up, loot, and choose abilities to shape and customize their very own skilled Assassin as they grow in power and expertise while exploring the entire country of Ancient Egypt.'),
(36792, 'Pokémon Ultra Sun', '\"Take on the role of a Pokémon Trainer and uncover new tales, and unravel the mystery behind the two forms reminiscent of the Legendary Pokémon. With new story additions and features this earns Pokémon™ Ultra Sun and Pokémon Ultra Moon the name \"Ultra!\" Another adventure is about to begin! \r\n \r\nNew Pokémon forms have been discovered in the Aloha region in Pokémon Ultra Sun and Pokémon Ultra Moon! These forms are reminiscent of the Legendary Pokémon Solgaleo, Lunala, and Necrozma, first revealed in Pokémon Sun and Pokémon Moon. Head out on an epic journey as you solve the mystery behind these fascinating Pokémon! In this expanded adventure, get ready to explore more of the Alola region, catch more amazing Pokémon, and battle more formidable foes in Pokémon Ultra Sun and Pokémon Ultra Moon!\"'),
(36836, 'Little Nightmares: The Hideaway', 'The second of 3 DLCs that follows a new character, The Runaway Kid, during the events of the main game. \r\n \r\n\"The Kid has escaped the frying pan and is now in the fires of the engine room, where one wrong step can lead to his doom. Only by understanding tge Nomes does he have a chance of making head or tails of all the machinery barring his way out of the Maw. But why are so many Nomes hiding here?\"'),
(36926, 'Monster Hunter: World', 'Monster Hunter: World sees players take on the role of a hunter that completes various quests to hunt and slay monsters within a lively living and breathing eco-system full of predators…. and prey. In the video you can see some of the creatures you can expect to come across within the New World, the newly discovered continent where Monster Hunter: World is set, including the Great Jagras which has the ability to swallow its prey whole and one of the Monster Hunter series favourites, Rathalos. \r\n \r\nPlayers are able to utilise survival tools such as the slinger and Scoutfly to aid them in their hunt. By using these skills to their advantage hunters can lure monsters into traps and even pit them against each other in an epic fierce battle. Can our hunter successfully survive the fight and slay the Anjanath? He’ll need to select his weapon choice carefully from 14 different weapon classes and think strategically about how to take the giant foe down. Don’t forget to pack the camouflaging ghillie sui'),
(46451, 'Middle-earth: Shadow of War - The Desolation of Mordor', 'TBA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`FavoriteId`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`MessageId`),
  ADD KEY `Category` (`Category`),
  ADD KEY `Posts` (`Posts`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`ReplyId`),
  ADD KEY `reply_ibfk_1` (`Attached`),
  ADD KEY `Sends` (`Sends`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `videogames`
--
ALTER TABLE `videogames`
  ADD PRIMARY KEY (`GameId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `FavoriteId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `MessageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `ReplyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`Category`) REFERENCES `category` (`CategoryId`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`Posts`) REFERENCES `user` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`Attached`) REFERENCES `message` (`MessageId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`Sends`) REFERENCES `user` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
