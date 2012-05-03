-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 03, 2012 at 10:13 PM
-- Server version: 5.5.22
-- PHP Version: 5.3.10-1ubuntu3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skeleton_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `short_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `intro` text CHARACTER SET utf8 COLLATE utf8_bin,
  `content` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `foot` text CHARACTER SET utf8 COLLATE utf8_bin,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `short_title`, `title`, `keywords`, `description`, `intro`, `content`, `foot`, `created`, `updated`) VALUES
(1, 'Rooms', '... private en-suite rooms...', 'bedroom, bunk room, dorm room', 'Wake up and start the day with a cup of coffee and a lazy morning in bed - come back later to wind down after a long hard day, then get dressed up for a night on the town. At the end of the day (or the start of the next one) curl up in bed with a mug of h', 'Wake up and start the day with a cup of coffee and a lazy morning in bed - come back later to wind down after a long hard day, then get dressed up for a night on the town. At the end of the day (or the start of the next one) curl up in bed with a mug of hot chocolate, then get a good night''s sleep ready for the day ahead.', '*Rooms at a glance...*\r\n\r\n* Egyptian cotton bedding & large towels\r\n* LCD TV & Freeview\r\n* Tea & coffee making facilities\r\n* En-suite bathroom (shower, sink & W.C.)\r\n* Long mirror\r\n* Plenty of sockets', '"bedroom details...":/Rooms', '2012-05-03 20:24:25', '2012-05-03 20:24:25'),
(2, 'Breakfast', '... breakfast when you want it...', 'breakfast, self service, continental', 'Start the day with a pot of fresh coffee and some chunky toast cut from a fresh loaf - eat breakfast where the mood takes you, sat around the kitchen table or lazing in the lounge, grab a tray and have breakfast in bed, or sit outside and watch the world ', 'Start the day with a pot of fresh coffee and some chunky toast cut from a fresh loaf - eat breakfast where the mood takes you, sat around the kitchen table or lazing in the lounge, grab a tray and have breakfast in bed, or sit outside and watch the world go by - maybe come back later, for a danish or muffin and a cup of coffee.', '*Breakfast at a glance...*\r\n\r\n* Available ''till gone noon\r\n* Kellogg''s cereals\r\n* Fruit juice, fresh fruit & yogurt\r\n* Toast with jam, honey, marmalade & Marmite\r\n* Filter coffee and breakfast tea\r\n* Something naughty; crumpets, muffins, waffles...', NULL, '2012-05-03 20:27:49', '2012-05-03 20:27:49'),
(3, 'Lounge', '... a home away from home...', 'lounge, relax, chat, socialise', 'Have a chat around the table at breakfast - pull up a giant beanbag, or curl up on a pile of cushions in the lounge - relax and spend time with the friends you arrived with, or meet new people and make new friends.', 'Have a chat around the table at breakfast - pull up a giant beanbag, or curl up on a pile of cushions in the lounge - relax and spend time with the friends you arrived with, or meet new people and make new friends.', '*Lounge at a glance...*\r\n\r\n* Large LCD TV\r\n* SKY+\r\n* DVD/CD player\r\n* Magazines, books, games, DVDs & CDs\r\n* Giant beanbags', NULL, '2012-05-03 20:29:34', '2012-05-03 20:29:34'),
(4, 'Kitchen', '... a real kitchen for real meals...', 'kitchen, self catering', 'Rustle up a pot noodle for a quick snack (in a bowl with a little grated cheese on top makes all the difference), or pull down a a recipe book and be inspired by a top chef - with a dishwasher on hand there''s no need to fight over who''s doing the washing ', 'Rustle up a pot noodle for a quick snack (in a bowl with a little grated cheese on top makes all the difference), or pull down a a recipe book and be inspired by a top chef - with a dishwasher on hand there''s no need to fight over who''s doing the washing up.', '*Kitchen at a glance...*\r\n\r\n* 5-Ring Gas Hob\r\n* Electric Double Oven\r\n* Microwave\r\n* Dishwasher\r\n* Fridge\r\n* Cupboards with Storage Boxes\r\n* Utensils\r\n* Pots & Pans\r\n* Kitchen Knives\r\n* Chopping Boards\r\n* Recipe Books\r\n* Condiments, Herbs & Spices', NULL, '2012-05-03 20:31:50', '2012-05-03 20:31:50'),
(5, 'Location', '... a truly unique location...', NULL, NULL, NULL, 'Goofys is nestled between Fistral Bay, Newquay Golf Course and the Atlantic - the ocean so close you can hear the waves, the Red Lion Pub on your doorstep, and the town centre a stone''s throw away - what more could you ask for?', '"Maps and directions...":/Location', '2012-05-03 20:33:01', '2012-05-03 20:33:01'),
(6, 'Your Stay', '... during your stay.', NULL, 'Goofys facilities at a glance...', 'Goofys facilities at a glance...', '* Free Internet terminal & wireless internet\r\n* Hot drinks available all day\r\n* Decked sun trap & Bar-B-Q\r\n* Secure board & wetsuit store\r\n* 24 hour access\r\n* Ironing facilities & hairdrier', 'More about "Newquay":/Newquay and "Sufing":/Surfing...', '2012-05-03 20:34:19', '2012-05-03 20:34:19');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
