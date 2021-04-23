-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 23, 2021 at 10:34 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobsge3`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_en` varchar(255) DEFAULT NULL,
  `category_ru` varchar(255) DEFAULT NULL,
  `filename` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_en`, `category_ru`, `filename`) VALUES
(1, 'House master', 'Домашний мастер', 'icon_1.png'),
(2, 'Finishing work', 'Отделочные работы', 'icon_2.png'),
(3, 'Courier services', 'Курьерские услуги', 'icon_3.png'),
(4, 'Construction works', 'Строительные работы', 'icon_4.png'),
(10, 'test category', 'test category ru', 'icon_10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

DROP TABLE IF EXISTS `chats`;
CREATE TABLE IF NOT EXISTS `chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sent_at` int(11) NOT NULL,
  `new` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=188 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `from_id`, `to_id`, `message`, `sent_at`, `new`) VALUES
(38, 3, 1, 'y 3 dummy text of the printing and typesetting industry. Lorem Ipsum has been t', 1618487136, 0),
(37, 2, 4, 'y dummy text of the printing and typesetting industry. Lorem Ipsum has been t', 1618487126, 0),
(36, 2, 4, 'y dummy text of the printing and typesetting industry. Lorem Ipsum has been t', 1618487110, 0),
(34, 3, 2, 'y dummy text of the printing and typesetting industry. Lorem Ipsum has been t', 1618487102, 0),
(35, 4, 3, 'y dummy text of the printing and typesetting industry. Lorem Ipsum has been t', 1618487106, 0),
(33, 3, 1, '3 y dummy text of the printing and typesetting industry. Lorem Ipsum has been t', 1618487100, 0),
(32, 4, 4, 'y dummy text of the printing and typesetting industry. Lorem Ipsum has been t', 1618487596, 0),
(31, 3, 2, 'y dummy text of the printing and typesetting industry. Lorem Ipsum has been t', 1618487592, 0),
(30, 2, 4, 'y dummy text of the printing and typesetting industry. Lorem Ipsum has been t', 1618487590, 0),
(29, 2, 1, 'y 2 dummy text of the printing and typesetting industry. Lorem Ipsum has been t', 1618487580, 0),
(28, 1, 4, 'y 4 dummy text of the printing and typesetting industry. Lorem Ipsum has been t', 1618487575, 0),
(27, 3, 2, 'y dummy text of the printing and typesetting industry. Lorem Ipsum has been t', 1618487570, 0),
(26, 2, 3, 'predefined chunks as necessary, making this the first true generator on the Internet.industry. Lorem Ipsum has been t', 1618487560, 0),
(25, 4, 3, 'y dummy text of the printing and typesetting industry. Lorem Ipsum has been t', 1618487558, 0),
(24, 3, 2, 'y dummy text of the printing and typesetting industry. Lorem Ipsum has been t', 1618487554, 0),
(23, 9, 1, '9 predefined chunks as necessary, making this the first true generator on the Internet.em Ipsum has been t', 1618487550, 0),
(22, 4, 4, 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. industry. Lorem Ipsum has been t', 1618487550, 0),
(21, 3, 2, 'y dummy text of the printing and typesetting industry. Lorem Ipsum has been t', 1618487547, 0),
(20, 2, 3, 'y dummy text of the printing and typesetting industry. Lorem Ipsum has been t', 1618487545, 0),
(19, 2, 1, 'The 2 standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.', 1618487544, 0),
(18, 1, 4, 'ng 4 and typesetting indy dummy text of the printiustry. Lorem Ipsum has been t', 1618487542, 0),
(16, 2, 3, 'y dummy text of the printing and typesetting industry. Lorem Ipsum has been t', 1618487539, 0),
(17, 2, 3, 'y dummy text of the printing and typesetting industry. Lorem Ipsum has been t', 1618487540, 0),
(15, 2, 4, 'going through the cites of the word in classicaIpsum has been t', 1618487537, 0),
(14, 4, 3, 'predefined chunks as necessary, making this the first true generator on the Internet. Lorem Ipsum has been t', 1618487532, 0),
(13, 3, 2, 'y dummy text of the printing and typesetting industry. Lorem Ipsum has been t', 1618487528, 0),
(12, 7, 1, 'predefined chunks as necessary, making this the first true generator on the Internet.industry. Lorem Ipsum has been t', 1618487525, 0),
(11, 8, 1, 'y 8 dummy text of the printing and typesetting industry. Lorem Ipsum has been t', 1618487520, 0),
(10, 3, 2, 'rinting and typesy dummy text of the petting industry. Lorem Ipsum has been t', 1618487517, 0),
(9, 3, 2, 'y dummy text of the printing and typesetting industry. Lorem Ipsum has been t', 1618487512, 0),
(8, 6, 1, 'y duhe primmy text of tnting and typesetting industry. Lorem Ipsum has been t', 1618487510, 0),
(7, 1, 4, '4 going through the cites of the word in classicadustry. Lorem Ipsum has been t', 1618487508, 0),
(6, 3, 3, 'y dummy text of the printing and typesetting industry. Lorem Ipsum has been t', 1618487504, 0),
(5, 2, 4, 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. industry. Lorem Ipsum has been t', 1618487502, 0),
(4, 1, 4, 'y 4 dummy text of the printing and typesetting industry. Lorem Ipsum has been t', 1618487501, 0),
(3, 1, 2, 'going through the cites of the word in classicaindustry. Lorem Ipsum has been t', 1618487536, 0),
(2, 1, 2, 'y dummy text of the printing and typesetting industry. Lorem Ipsum has been t', 1618487536, 0),
(131, 1, 4, 'Hiiiii 4', 1618737173, 0),
(132, 1, 4, 'Helllo 4', 1618740478, 0),
(133, 1, 4, 'Are you here? 4', 1618740493, 0),
(136, 4, 1, 'Yeeah 4', 1618742428, 0),
(138, 6, 1, '6 asd aasjjhasgd', 1618742576, 0),
(144, 2, 1, 'true?', 1618743024, 0),
(145, 1, 2, '1-2yeah that\'s true 2', 1618743048, 0),
(146, 4, 2, 'I knew about it too', 1618743071, 0),
(147, 2, 1, '2-1Test Test2 ', 1618743212, 0),
(148, 4, 1, 'Test Test4 ', 1618743220, 0),
(152, 2, 1, '2-1kjadsh kjashd laskdj 2', 1618743810, 0),
(153, 2, 1, ' 2-1sdfksjdhf kjsldhf 2', 1618743817, 0),
(154, 1, 8, ' df;lgk \'dk ddflkgkdl;jf ;dfklgj ;dlfkgj 8', 1618756081, 1),
(156, 1, 7, 's 7 dkfjh lksjdhf lskdjfh lsdkjfh', 1618756100, 1),
(157, 1, 3, 'Hello Admin 3', 1618756110, 0),
(158, 2, 1, '2-1asdf sd ffsd', 1618802760, 0),
(159, 1, 2, 'ajksdh sdfkljs', 1618804722, 0),
(160, 11, 1, 'as sdf sd;lk', 1618804731, 0),
(161, 12, 1, 'test message from user 12', 1618804771, 0),
(162, 2, 1, ' sdkfjh skdjf', 1618811676, 0),
(163, 1, 2, ' fdg dfg df', 1618811685, 0),
(164, 5, 1, 'message from user 5', 1618811725, 0),
(165, 2, 1, ' sdf sdlfksd', 1618812206, 0),
(166, 2, 1, 'a', 1618817389, 0),
(167, 1, 2, 'as', 1618817443, 0),
(168, 1, 2, 'dfg', 1618817465, 0),
(169, 1, 2, 'ფგჰ', 1618818161, 0),
(170, 1, 2, 'დგფგდფგდფგ', 1618818185, 0),
(171, 1, 2, 'სდფსდ', 1618818306, 0),
(172, 1, 2, 'დფგდფგ დფგ დფგდ', 1618818370, 0),
(173, 1, 2, 'წრტ რტერტ ერტერ', 1618818379, 0),
(174, 1, 2, 'სდფ სდფ', 1618818459, 0),
(175, 1, 2, 'სდფ სდფ სდფსდ', 1618818469, 0),
(176, 1, 2, 'dfg dfg dfgdf', 1618818538, 0),
(177, 2, 4, 'fg ffgh', 1618823298, 1),
(178, 2, 5, 'sfd sd sdkjfhsdjk', 1618825411, 1),
(179, 2, 8, ' gfh fgh fgh', 1618825606, 1),
(180, 2, 9, 'sdfsdf', 1618825896, 1),
(181, 2, 10, ' lkdsfj ;lsdkf', 1618826333, 0),
(182, 2, 10, ' dslkfj ;sdlk', 1618826345, 0),
(183, 10, 2, 's dflfsd', 1618826492, 0),
(184, 2, 10, 's fsdfsd', 1618826539, 0),
(185, 1, 2, 'f sdf', 1618826680, 0),
(186, 1, 2, 'asaaaaaaaaaa', 1618826741, 0),
(187, 1, 2, 'sdf sdfkljsd', 1618826803, 0);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `filename`, `description`) VALUES
(1, 'maincover.jpg', 'Main page image'),
(2, 'jobscover.jpg', 'Jobs page image'),
(3, 'logo.png', 'Site logo'),
(4, 'favicon.ico', 'Favicon');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `job_type` int(11) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `company` varchar(200) DEFAULT NULL,
  `location_id` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `shorttext_en` varchar(255) DEFAULT NULL,
  `shorttext_ru` varchar(255) DEFAULT NULL,
  `largetext_en` text DEFAULT NULL,
  `largetext_ru` text DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `imgfilename1` varchar(255) DEFAULT NULL,
  `imgfilename2` varchar(255) DEFAULT NULL,
  `imgfilename3` varchar(255) DEFAULT NULL,
  `imgfilename4` varchar(255) DEFAULT NULL,
  `imgfilename5` varchar(255) DEFAULT NULL,
  `submitedrenewal` tinyint(1) DEFAULT 0,
  `created_at` int(11) DEFAULT NULL,
  `expiring_at` int(11) DEFAULT NULL,
  `isinitial` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `job_type`, `fullname`, `phone`, `email`, `website`, `company`, `location_id`, `address`, `zipcode`, `category_id`, `subcategory_id`, `shorttext_en`, `shorttext_ru`, `largetext_en`, `largetext_ru`, `slug`, `imgfilename1`, `imgfilename2`, `imgfilename3`, `imgfilename4`, `imgfilename5`, `submitedrenewal`, `created_at`, `expiring_at`, `isinitial`, `status`) VALUES
(64, 2, 3, 'jemal bagashvili', '34534534', 'jemala@gmail.com', 'www.joemal.ji', '', '4', 'circucause occasionally msta 56', '54645645', 3, 11, 'cause occasionally circumstances occur in which toil a', '', 'ed by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur t', '', 'cause-occasionally-circumstances-occur-in-which-toil-a', 'JOB00000641.jpg', 'JOB00000642.jpg', NULL, NULL, NULL, 1, 1616424137, 1624200137, 1, 1),
(62, 1, 3, 'jondo jaani', '342234', 'jondo@gmail.com', 'www.sdfss.sd', NULL, '5', 'sdfsd fsdfsd', '534534', 2, 8, 'ficia deserunt mollitia animi, id est laborum et do', '', 'acilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciend', '', 'fdsfsd-sdf', 'JOB00000621.jpg', NULL, NULL, NULL, NULL, 0, 1616739926, 1656051926, 1, 1),
(63, 1, 3, 'jondo jaani', '342234', 'jondo@gmail.com', 'www.sdfss.sd', NULL, '5', 'Section 110.33 of de Finibus', '534534', 2, 7, 'upiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facil', '', 'o fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains', '', 'upiditate-non-provident-similique-sunt-in-culpa-qui-officia-deserunt-mollitia-animi-id-est-laborum-et-dolorum-fuga-et-harum-quidem-rerum-facil', 'JOB00000631.jpg', 'JOB00000632.jpg', NULL, NULL, NULL, 0, 1616740041, 1648276041, 1, 1),
(61, 1, 2, 'jondo jaani', '89423423', 'jondo@gmail.com', 'www.jsadfki.or', NULL, '14', 'sdfsdf sdf sdf sdf sdf', '34534', 3, 15, 'sum was as recent as the 20th century. The 1914 Loeb Classical Library Edition ran', '', 'As an alternative theory, (and because Latin scholars do this sort of thing) someone tracked down a 1914 Latin edition of De Finibus which challenges McClintock\'s 15th century claims and suggests that the dawn of lorem ipsum was as recent as the 20th century. The 1914 Loeb Classical Library Edition ran out of room on page 34 for the Latin phrase “dolorem ipsum” (sorrow in itself). Thus, the truncated phrase leaves one page dangling with “d', '', 'sum-was-as-recent-as-the-20th-century-the-1914-loeb-classical-library-edition-ran', 'JOB00000611.jpg', 'JOB00000612.jpg', NULL, 'JOB00000614.jpg', 'JOB00000615.jpg', 0, 1616654112, 1624430112, 1, 1),
(59, 1, 2, 'jondo jaani', '2423477', 'jondo@gmail.com', 'www.jeasd.er', NULL, '9', 'ipsum dolor sit amet..', '4353488', 2, 8, 'This book is a treatise on the theory of ethics, very popular duringa', '', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham. test', '', 'this-book-is-a-treatise-on-the-theory-of-ethics-very-popular-duringa', NULL, 'JOB00000592.jpg', NULL, NULL, NULL, 0, 1616650711, 1624426711, 1, 1),
(60, 1, 2, 'jondo jaani', '2342978', 'jondo@gmail.com', 'www.dois.ge', '', '1', 'There are many variations of passages of Lorem Ipsum 56', '3453', 1, 4, 'There are many variations of pass ageThere are many variations of passages of Lorem Ipsum', '', 'you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the<b> Internet tend to repeat predefine</b>d chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is', '', 'there-are-many-variations-of-pass-agethere-are-many-variations-of-passages-of-lorem-ipsum', 'JOB00000601.jpg', 'JOB00000602.jpeg', NULL, 'JOB00000604.jpg', NULL, 0, 1616651370, 1624427370, 1, 1),
(57, 1, 3, 'jondo jaani', '4545645', 'jondo@gmail.com', 'www.sdf.sdf', NULL, '1', 'reproduced below for those interested. Sections 1.10.3', '45654', 1, 2, '\"de Finibusa Bonorum et Malorum\" by Cicero are also', '', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', '', '-de-finibus-bonorum-et-malorum-by-cicero-are-also', 'JOB00000571.png', 'JOB00000572.jpeg', NULL, NULL, NULL, 0, 1616650102, 1648186102, 1, 1),
(58, 1, 3, 'jondo jaani', '4545645', 'jondo@gmail.com', 'www.sdf.sdf', '', '1', 'reproduced below for those interested. Sections 1.10.3', '45654', 1, 2, 'de Finibus Bonorum et Malorum', '', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use <b>a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. orm</b>, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle o', '', 'de-finibus-bonorum-et-malorum', 'JOB00000581.jpg', NULL, 'JOB00000583.png', NULL, NULL, 1, 1616650126, 1634715413, 1, 1),
(55, 1, 1, 'jondo jaani', '4545645', 'jondo@gmail.com', 'www.sdf.sdf', NULL, '1', 'reproduced below for those interested. Sections 1.10.3', '45654', 1, 2, 'de Finibus Bonorum et Malorum\" by Cicero are also', '', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', '', '-de-finibus-bonorum-et-malorum-by-cicero-are-also', NULL, NULL, NULL, NULL, NULL, 0, 1616649995, 1619241995, 1, 1),
(50, 1, 3, 'jondo jaani', '743589475', 'jondo@gmail.com', 'www.jondo.de', NULL, '14', 'dasdasd asdasdas asdas', '534345', 3, 13, 'literature, discovered the undoubtable source. finibusa Lorem Ipsum comes from sections 1.10.32 and 1.10.33', '', 'irginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '', 'literature-discovered-the-undoubtable-source-lorem-ipsum-comes-from-sections-1-10-32-and-1-10-33', 'JOB00000501.jpg', NULL, 'JOB00000503.jpg', NULL, 'JOB00000505.jpg', 0, 1615448873, 1646984873, 1, 1),
(51, 1, 2, 'jondo jaani', '534534353', 'jondo@gmail.com', 'www.jondo.io', '', '1', 'The standard chunk, Ipsum used since the 1500', '35634345', 3, 14, 'Sections 1.10.32 and 1.10.33 from', '', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '', 'sections-1-10-32-and-1-10-33-from', 'JOB00000511.jpg', 'JOB00000512.png', 'JOB00000513.jpg', NULL, NULL, 0, 1616449281, 1624225281, 1, 1),
(43, 1, 1, 'jondo jaani', '3245234234', 'jondo@gmail.com', 'www.gondo.ge', NULL, '5', 'Sed ut perspiciatis unde 45', '345345', 3, 13, 'qui dolorem ipsum quia dolor sit amet, consectetur, adipisci ius modi tempo', '', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '', 'qui-dolorem-ipsum-quia-dolor-sit-amet-consectetur-adipisci-ius-modi-tempo', 'JOB00000431.jpg', NULL, NULL, NULL, NULL, 0, 1616081597, 1658479376, 1, 1),
(46, 1, 1, 'jondo jaani', '438590834', 'jondo@gmail.com', 'www.jondo.de', 'hskdjf sddf342', '1', 'imply dummy text, of the printing and typesetting 34', '4566', 2, 7, '##when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but al', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. @@', '', '-when-an-unknown-printer-took-a-galley-of-type-and-scrambled-it-to-make-a-type-specimen-book-it-has-survived-not-only-five-centuries-but-al', 'JOB00000461.JPG', NULL, NULL, NULL, NULL, 0, 1616648145, 1619240145, 1, 1),
(67, 2, 1, 'jemal bagashvili', '56464654654', 'jemala@gmail.com', 'www.jemala.com', NULL, '13', 'us id quod maxime placeat facere possimus, om 45', '345543', 4, 20, 'uod maxime placeat facere possimus, omnis voluptas assume', '', 'dio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapie', '', 'uod-maxime-placeat-facere-possimus-omnis-voluptas-assume', 'JOB00000671.jpg', NULL, NULL, NULL, NULL, 0, 1616068997, 1618300997, 1, 1),
(68, 2, 3, 'jemal bagashvili', '4853095', 'jemala@gmail.com', 'www.jemala.com', NULL, '11', 'ces that are extremely pai', '34534', 4, 17, 'occasionally circumstances occur in which toil and pain can procure him some great pleas', '', 'nd expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequenc', '', 'occasionally-circumstances-occur-in-which-toil-and-pain-can-procure-him-some-great-pleas', NULL, NULL, NULL, NULL, NULL, 1, 1616870752, 1648406752, 1, 1),
(69, 2, 3, 'jemal bagashvili', '4853095', 'jemala@gmail.com', 'www.jemala.com', NULL, '11', 'ces that are extremely pai', '34534', 4, 16, 'occasionally circumstances occur in which toil and pain can procure him some great pleas', '', 'nd expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequenc', '', 'occasionally-circumstances-occur-in-which-toil-and-pain-can-procure-him-some-great-pleas', NULL, NULL, NULL, NULL, NULL, 1, 1616870955, 1648406955, 1, 1),
(70, 2, 2, 'jemal bagashvili', '34534534', 'jemala@gmail.com', 'www.asdas.ds', NULL, '14', 'Et harum quidem rerum facilis est et expedita dist', '4534', 3, 13, 'impedit quo minus id quod maxime placeat facere possimus, omnis volupta', '', 'estias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente del', '', 'impedit-quo-minus-id-quod-maxime-placeat-facere-possimus-omnis-volupta', 'JOB00000701.jpg', 'JOB00000702.jpg', NULL, NULL, NULL, 0, 1616871372, 1624647372, 1, 1),
(71, 2, 3, 'jemal bagashvili', '34534534', 'jemala@gmail.com', 'www.asdas.ds', NULL, '4', 'Et harum quidem rerum facilis est et expedita dist', '4534', 3, 13, 'mely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which t', '', 'tem, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a p', '', 'mely-painful-nor-again-is-there-anyone-who-loves-or-pursues-or-desires-to-obtain-pain-of-itself-because-it-is-pain-but-because-occasionally-circumstances-occur-in-which-t', 'JOB00000711.jpg', 'JOB00000712.jpg', NULL, NULL, NULL, 1, 1616471454, 1648007454, 1, 1),
(73, 2, 3, 'jemal bagashvili', '34534534', 'jemala@gmail.com', 'www.asdas.ds', NULL, '14', 'Et harum quidem rerum facilis est et expedita dist', '4534', 4, 19, 'because it is pleasure, but because those who do not know how to pursue pleasure', '', 'git, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"', '', 'because-it-is-pleasure-but-because-those-who-do-not-know-how-to-pursue-pleasure', 'JOB00000731.jpg', 'JOB00000732.jpg', NULL, 'JOB00000734.png', NULL, 0, 1613471737, 1645007737, 1, 1),
(74, 2, 3, 'jemal bagashvili', '7898753948', 'jemala@gmail.com', 'www.jemala.com', NULL, '13', 'maxime placeat facere possimus, omnis voluptas assu', '345', 3, 11, 'm necessitatibus saepe eveniet ut et voluptates repudiandae sint', '', 'sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur', '', 'm-necessitatibus-saepe-eveniet-ut-et-voluptates-repudiandae-sint', 'JOB00000741.jpg', 'JOB00000742.jpg', NULL, 'JOB00000744.jpg', NULL, 0, 1617024479, 1648560479, 1, 1),
(75, 2, 3, 'jemal bagashvili', '345345345345', 'jemala@gmail.com', 'www.jemal.com', NULL, '14', 'because it is pleasure, but because those who do not 45', '3456', 1, 5, 'xyz because it is pleasure, but because those who do not', '', 're veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"', '', 'xyz-because-it-is-pleasure-but-because-those-who-do-not', 'JOB00000751.JPG', 'JOB00000752.png', NULL, 'JOB00000754.jpg', NULL, 1, 1617025575, 1648561575, 1, 1),
(76, 2, 2, 'jemal bagashvili', '324234234', 'jemala@gmail.com', 'www.jemal.ro', NULL, '15', 'mistaken idea of denouncing pleasure and pr 76', '53434', 1, 2, 'vaa ur that pleasures have to be repudiated and annoyances accepted. The wise man therefore', '', 'er hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection', '', 'vaa-ur-that-pleasures-have-to-be-repudiated-and-annoyances-accepted-the-wise-man-therefore', 'JOB00000761.jpg', 'JOB00000762.png', 'JOB00000763.jpg', 'JOB00000764.JPG', NULL, 0, 1617025888, 1648561888, 1, 1),
(77, 2, 3, 'jemal bagashvili', '45656456', 'jemala@gmail.com', 'www.jlkajsdlk.re', NULL, '1', 'ng through the cites of the word in classical literature,67', '345343', 2, 9, 'opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing ge edi', '', 'majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reaso', '', 'opposed-to-using-content-here-content-here-making-it-look-like-readable-english-many-desktop-publishing-ge-edi', 'JOB00000771.jpg', 'JOB00000772.png', 'JOB00000773.jpg', 'JOB00000774.jpg', NULL, 0, 1617026405, 1648562405, 1, 1),
(78, 11, 2, 'accusantium doloremque', '43534 53453', 'accus@gmail.com', 'www.top.ge', '', '1', 'ith content hourly on the day of going live. Hoe', '34234', 1, 3, 'ith content hourly on the day of going live. However, reviewers tend to be distracted by comprehensible content, say, a random text copied from a ne', '', 'In a professional context it often happens that private or corporate clients corder a publication to be made and presented with the actual content still not being ready. Think of a news blog that\'s filled with content hourly on the day of going live. However, reviewers tend to be distracted by comprehensible content, say, a random text copied from a newspaper or the internet. The are likely to focus on the text, disregarding the layout and its elements. Besides, random text risks to be unintendedly humorous or offensive, an unacceptable risk in corporate environments. Lorem ipsum and its many variants have been employed since the early 1960ies, and quite likely since the sixteenth century', '', 'ith-content-hourly-on-the-day-of-going-live-however-reviewers-tend-to-be-distracted-by-comprehensible-content-say-a-random-text-copied-from-a-ne', 'JOB00000781.jpg', 'JOB00000782.jpg', 'JOB00000783.png', 'JOB00000784.jpg', NULL, 0, 1617649728, 1625425728, 1, 1),
(79, 1, 1, 'jondo jaani', '4580349', 'jondo@gmail.com', 'www.mycompany.fd', 'mycompany', '9', 'nsectetur in classical Latin searched for citings of co 56', '38400', 3, 12, 'searched for citings of consectetur in classical Latin', '', '<span xss=removed>In a professional context it often happens that private or corporate clients corder a publication to be made and presented w</span><span xss=removed><font color=\"#000000\">ith the actual content still not being ready. Think of a news blog that\'s filled with content hourly on the day of going live. </font><font color=\"#ff0000\">However, reviewers tend to be distracted by comprehensible content, say, a random text copied from a newspaper or the internet. The are likely to focus o</font></span><span xss=removed><font color=\"#ff0000\">n the text</font><font color=\"#000000\">, disregarding the layout and its elements. Besides, </font><b xss=removed>random text risks to be unintendedly humorous or offensive</b><font color=\"#000000\">, an unacceptable risk in corporate environments. </font></span><strong xss=removed>Lorem ipsum</strong><span xss=removed> and its many variants have been employed since the early 1960ies, and quite likely since the sixteenth century</span>', '', 'searched-for-citings-of-consectetur-in-classical-latin', 'JOB00000791.jpg', 'JOB00000792.jpg', NULL, NULL, NULL, 0, 1617730704, 1620322704, 1, 1),
(93, 1, 3, 'jondo jaani', '45334534', 'jondo@gmail.com', 'www.bricklaying.com', 'shdfkjsdhfkj', '8', 'e and time (in almost any standard', '4355', 4, 20, 'e and time (in almost any standard e and time (in almost any standard', '', '<p>e and time (in almost adard e and time (in almost any stan ny standard e and time (in almost any standard e and time (in almost any standard e and time (in almost any standard e and time (in almost any standard e and time (in almost any standard e and time (in almard e and time (in almost any standard e and time (in almost any standard e and time (in alm ost any stand st any stan dard e and time (in almost any standard e and time (in almost any standard e and time (in almost any standard </p>', '', 'e-and-time-in-almost-any-standard-e-and-time-in-almost-any-standard', 'JOB00000931.png', 'JOB00000932.png', 'JOB00000933.png', 'JOB00000934.png', NULL, 0, 1619169063, 1682241138, 1, 1),
(94, 1, 3, 'jondo jaani', '534534', 'jondo@gmail.com', 'www.top.ge', 'hkjfhksdjh', '8', 'um has been the industry\'s standard dummy text ever since the 150', '46456', 3, 14, 'to make a type specimen book. It has survived not only five centuries, but also the le', '', '<span xss=removed>sum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '', 'to-make-a-type-specimen-book-it-has-survived-not-only-five-centuries-but-also-the-le', 'JOB00000941.jpg', 'JOB00000942.jpg', 'JOB00000943.jpg', 'JOB00000944.jpg', NULL, 0, 1619173232, 1650709232, 1, 0),
(91, 2, 3, 'jemal bagashvili', '8450938', 'jemala@gmail.com', 'www.brick.co', 'brick co', '5', 'ndard dummy text ever since the 15', '456', 4, 20, 'it to make a type specimen book. It has survived not only five centuries, bu', '', '<span xss=removed>it to make a type specimen book. I<b>t has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It</b> was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem</span>', '', 'it-to-make-a-type-specimen-book-it-has-survived-not-only-five-centuries-bu', 'JOB00000911.png', 'JOB00000912.jpg', 'JOB00000913.jpg', NULL, NULL, 0, 1619101501, 1650637501, 1, 0),
(92, 1, 2, 'jondo jaani', '345645098', 'jondo@gmail.com', 'www.couriers.com', 'couriers co', '8', 'noted above, be careful when manipulating the DateT', '567', 3, 14, 'nove, be careful when manoted abipulating the 56', '', 'It should be noted above, be careful when manipulating the DateTime object with unix timestamps.&nbsp;In the above examples you will get varying results dependent on your current timezone, method used, and version of PHP.It should be noted above, be careful when manipulating the DateTime object with unix timestamps.&nbsp;In the above examples you will get varying results dependent on your current timezone, method used, and version of PHP.&nbsp; varying results dependent on your current timezone, method used, and version of PHP.It should be noted above,&nbsp;&nbsp;&nbsp;varying results dependent on your current timezone, method used, and version of PHP.It should be noted above,&nbsp;', '', 'nove-be-careful-when-manoted-abipulating-the-56', 'JOB00000921.jpg', 'JOB00000922.jpg', 'JOB00000923.jpg', 'JOB00000924.jpg', NULL, 0, 1619168509, 1658480509, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobtypes`
--

DROP TABLE IF EXISTS `jobtypes`;
CREATE TABLE IF NOT EXISTS `jobtypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_type_en` varchar(255) DEFAULT NULL,
  `job_type_ru` varchar(255) DEFAULT NULL,
  `initial_price` int(11) DEFAULT NULL,
  `initial_period` int(11) DEFAULT NULL,
  `renewal_price` int(11) NOT NULL,
  `renewal_period` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobtypes`
--

INSERT INTO `jobtypes` (`id`, `job_type_en`, `job_type_ru`, `initial_price`, `initial_period`, `renewal_price`, `renewal_period`) VALUES
(1, 'Job seeker', 'Трудоустраивающийся', 0, 2592000, 100, 31536000),
(2, 'Silver application', 'Серебряная приложения', 0, 7776000, 200, 31536000),
(3, 'Gold application', 'Золотое приложение', 400, 31536000, 400, 31536000);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location`) VALUES
(1, 'Alabama'),
(2, 'Alaska'),
(3, 'Arizona'),
(4, 'California'),
(5, 'Georgia'),
(6, 'Illinois'),
(7, 'Kansas'),
(8, 'Louisiana'),
(9, 'Montana'),
(10, 'New York'),
(11, 'Ohio'),
(12, 'Texas'),
(13, 'Utah'),
(14, 'Vermont'),
(15, 'Wisconsin'),
(16, 'Nebraska');

-- --------------------------------------------------------

--
-- Table structure for table `pageviews`
--

DROP TABLE IF EXISTS `pageviews`;
CREATE TABLE IF NOT EXISTS `pageviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `viewed_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=422 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pageviews`
--

INSERT INTO `pageviews` (`id`, `job_id`, `ip`, `viewed_at`) VALUES
(421, 94, '::1', 1619173247),
(420, 93, '::1', 1619169083),
(419, 92, '::1', 1619168524),
(418, 58, '::1', 1619084483),
(417, 58, '::1', 1619081977),
(416, 86, '::1', 1619068822),
(415, 86, '::1', 1619068807),
(414, 86, '::1', 1619068806),
(413, 86, '::1', 1619068463),
(412, 86, '::1', 1619068450),
(411, 84, '::1', 1619067778),
(410, 83, '::1', 1619067665),
(409, 82, '::1', 1619067427),
(408, 81, '::1', 1619067411),
(407, 81, '::1', 1619067327),
(406, 81, '::1', 1619067094),
(405, 79, '127.0.0.1', 1618915644),
(404, 79, '127.0.0.1', 1618915627),
(403, 79, '127.0.0.1', 1618915617),
(402, 64, '127.0.0.1', 1618905271),
(401, 64, '127.0.0.1', 1618905262),
(400, 71, '127.0.0.1', 1618905258),
(399, 71, '127.0.0.1', 1618905245),
(398, 71, '127.0.0.1', 1618905240),
(397, 71, '127.0.0.1', 1618905217),
(396, 71, '127.0.0.1', 1618765753),
(395, 46, '::1', 1618757465),
(394, 46, '::1', 1618228990),
(393, 46, '::1', 1618227888),
(392, 46, '::1', 1618210566),
(391, 46, '::1', 1618210545),
(390, 46, '::1', 1618139271),
(389, 46, '::1', 1618139258),
(388, 77, '127.0.0.1', 1618076304),
(387, 76, '::1', 1618076033),
(386, 76, '::1', 1618076028),
(385, 76, '::1', 1618076024),
(384, 76, '::1', 1618076010),
(383, 76, '::1', 1618076004);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `title` enum('Activation','Renewal') COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `transaction_id`, `user_id`, `job_id`, `title`, `amount`, `date`) VALUES
(2, '4AM06844MP272382N', 1, 58, 'Activation', '400.00', 1619163413),
(3, '1F571070FL861693V', 1, 58, 'Renewal', '400.00', 1619163611),
(4, '9G179050T55870215', 1, 62, 'Renewal', '400.00', 1619165778),
(5, '25528382WX833125H', 1, 43, 'Renewal', '100.00', 1619166957),
(6, '5T577718E6785490D', 1, 43, 'Renewal', '100.00', 1619167376),
(7, '0S777555L9894300M', 1, 43, 'Renewal', '100.00', 1619167870),
(8, '3DM96663C8097962B', 1, 43, 'Renewal', '100.00', 1619168058),
(9, '9R652308KB615441J', 1, 43, 'Renewal', '100.00', 1619168363),
(10, '2XY46628FR4438304', 1, 92, 'Renewal', '200.00', 1619168786),
(11, '41Y033734E2942123', 1, 93, 'Activation', '400.00', 1619169138),
(12, '1GA10814X96698915', 1, 93, 'Renewal', '400.00', 1619169213);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `status`) VALUES
(1, 'Computer', 'computer.jpg', 1.05, 1),
(2, 'Tablet', 'shdfk.jpg', 1.07, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) DEFAULT NULL,
  `ip` varchar(30) NOT NULL,
  `stars` int(11) DEFAULT NULL,
  `rated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=183 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `job_id`, `ip`, `stars`, `rated_at`) VALUES
(182, 79, '127.0.0.1', 3, 1618915623),
(181, 71, '127.0.0.1', 3, 1618905225),
(180, 46, '::1', 3, 1618139265),
(179, 76, '::1', 4, 1618076508),
(178, 75, '::1', 2, 1618075723),
(177, 64, '::1', 3, 1618075079),
(176, 58, '::1', 3, 1618074329),
(175, 57, '::1', 2, 1618074305),
(174, 70, '::1*70*1', 1, 1618072209),
(173, 70, '::1*70*3', 3, 1618072202),
(172, 70, '::1*70*2', 2, 1618072196),
(171, 51, '::1*51*4', 4, 1618072143),
(170, 61, '::1*61*5', 5, 1618072132),
(169, 50, '::1*50*3', 3, 1618072117),
(168, 64, '::1*64*3', 3, 1618071777),
(167, 71, '::1*71*5', 5, 1618071685),
(166, 71, '::1*71*1', 1, 1618071677),
(165, 71, '::1*71*1', 1, 1618071601),
(164, 71, '::1*71*3', 3, 1618071579),
(163, 74, '::1*74*1', 1, 1618071444),
(162, 74, '::1*74*1', 1, 1618071432),
(161, 74, '::1*74*1', 1, 1618071427),
(160, 74, '::1*74*1', 1, 1618071410),
(159, 74, '::1*74*4', 4, 1618071403),
(158, 74, '::1*74*1', 1, 1618071221),
(157, 74, '::1*74*5', 5, 1618071207),
(156, 74, '::1*74*4', 4, 1618071088),
(155, 74, '::1*74*2', 2, 1618071038),
(154, 61, '::1*61*4', 4, 1618070602),
(152, 61, '::1*61*3', 3, 1618070456),
(153, 61, '::1*61*2', 2, 1618070480);

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

DROP TABLE IF EXISTS `socials`;
CREATE TABLE IF NOT EXISTS `socials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facebook` varchar(100) DEFAULT NULL,
  `instagram` varchar(250) DEFAULT NULL,
  `linkedin` varchar(250) DEFAULT NULL,
  `google` varchar(250) DEFAULT NULL,
  `twitter` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `facebook`, `instagram`, `linkedin`, `google`, `twitter`) VALUES
(1, 'www.facebook.com/asjdlkasjalskdjdd', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_en` varchar(255) DEFAULT NULL,
  `subcategory_ru` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_en`, `subcategory_ru`) VALUES
(1, 1, 'Plumber', 'Сантехник'),
(2, 1, 'Electician', 'Электрик'),
(3, 1, 'Man for hour', 'Муж на час'),
(4, 1, 'Carpenter', 'Столяр'),
(5, 1, 'Locksmith', 'Слесарь'),
(6, 1, 'Installation of household appliances', 'Установка бытовой техники'),
(7, 2, 'Maintenance', 'Ремонт квартир'),
(8, 2, 'Laying tiles', 'Укладка плитки'),
(9, 2, 'Plastering works', 'Штукатурные работы'),
(10, 2, 'Warming of premises', 'Утепление помещений'),
(11, 3, 'Express delivery', 'Курьерская доставка'),
(12, 3, 'Delivery of products', 'Доставка продуктов'),
(13, 3, 'Delivery of ready meals', 'Доставка готовой еды'),
(14, 3, 'Delivery of medicines', 'Доставка лекарств'),
(15, 3, 'Car courier', 'Курьер на авто'),
(16, 4, 'Handymen', 'Разнорабочие'),
(17, 4, 'Welding works', 'Сварочные работы'),
(18, 4, 'Turning works', 'Токарные работы'),
(19, 4, 'Carpenter', 'Плотник'),
(20, 4, 'Bricklaying', 'Кладка кирпича'),
(25, 4, 'lesva-en', 'lesva-ru'),
(27, 8, 'super cleaning', 'super cleaning'),
(29, 10, 'test sub category en 2', 'test sub category ru2');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `c_sc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `category_id`, `subcategory_id`, `c_sc`) VALUES
(6, 1, 3, 12, 1),
(5, 1, 1, 19, 2),
(7, 1, 2, 0, 1),
(13, 1, 3, 0, 1),
(14, 1, 4, 0, 1),
(15, 1, 1, 5, 2),
(20, 1, 1, 3, 2),
(19, 1, 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dt` datetime NOT NULL DEFAULT current_timestamp(),
  `ts` timestamp NOT NULL DEFAULT current_timestamp(),
  `txt` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `dt`, `ts`, `txt`) VALUES
(1, '2021-03-18 12:44:51', '2021-03-18 08:14:51', 'asdas');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `recoverystring` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT 2,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `recoverystring`, `role`, `created_at`) VALUES
(1, 'jondo jaani', 'user01@gmail.com', '$2y$10$c8n0Nq.zVoJ8b2/7Ss4che0S2EtaHsGr4z7QXB9YUIkerafuFewJO', NULL, 2, NULL),
(2, 'jemal bagashvili', 'user02@gmail.com', '$2y$10$c8n0Nq.zVoJ8b2/7Ss4che0S2EtaHsGr4z7QXB9YUIkerafuFewJO', '3Vvzvylt09dlUWjGH0TnJ7z1438rJ1M2zXyxtdvVMvEr1DDeBUY76QbHgg4oBQSLJaGxBpPJ8sI1iL3nFWVYr3s7IctpHTT2BxvaanNPxwYBDof90K3lB6YpmMnvrxPd', 2, NULL),
(3, 'Admin', 'admin@admin.com', '$2y$10$c8n0Nq.zVoJ8b2/7Ss4che0S2EtaHsGr4z7QXB9YUIkerafuFewJO', NULL, 1, NULL),
(4, 'jiork', 'jiork@gmail.com', '$2y$10$c8n0Nq.zVoJ8b2/7Ss4che0S2EtaHsGr4z7QXB9YUIkerafuFewJO', NULL, 2, NULL),
(5, 'sdfsdfsd sdfsdf', 'user03@gmail.com', '$2y$10$c8n0Nq.zVoJ8b2/7Ss4che0S2EtaHsGr4z7QXB9YUIkerafuFewJO', NULL, 2, NULL),
(6, 'hg fgh fgh fgh', 'vndassb@admin.com', '$2y$10$c8n0Nq.zVoJ8b2/7Ss4che0S2EtaHsGr4z7QXB9YUIkerafuFewJO', '', 2, NULL),
(7, 'werwe wer  yrtrtyrtrt', 'user04@gmail.com', '$2y$10$c8n0Nq.zVoJ8b2/7Ss4che0S2EtaHsGr4z7QXB9YUIkerafuFewJO', NULL, 2, NULL),
(8, 'sdfsdf sdfdfyjhvbn ', 'user05@gmail.com', '$2y$10$c8n0Nq.zVoJ8b2/7Ss4che0S2EtaHsGr4z7QXB9YUIkerafuFewJO', NULL, 2, NULL),
(9, 'gioh jull', 'jull@gmail.com', '$2y$10$c8n0Nq.zVoJ8b2/7Ss4che0S2EtaHsGr4z7QXB9YUIkerafuFewJO', NULL, 2, NULL),
(10, 'tiaon', 'tiaon@gmail.com', '$2y$10$c8n0Nq.zVoJ8b2/7Ss4che0S2EtaHsGr4z7QXB9YUIkerafuFewJO', NULL, 2, NULL),
(11, 'accusantium doloremque', 'accus@gmail.com', '$2y$10$c8n0Nq.zVoJ8b2/7Ss4che0S2EtaHsGr4z7QXB9YUIkerafuFewJO', NULL, 2, NULL),
(12, 'ilia dzidzishvili', 'ilia.dzidzishvili@gmail.com', '$2y$10$c8n0Nq.zVoJ8b2/7Ss4che0S2EtaHsGr4z7QXB9YUIkerafuFewJO', NULL, 2, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
