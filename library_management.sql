-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2024 at 04:43 PM
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
-- Database: `library_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `ISBN` int(20) NOT NULL,
  `TITLE` varchar(255) NOT NULL,
  `AUTHOR_NAME` varchar(255) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `FACULTY` enum('FCI','FOE','FCM','FOM') NOT NULL,
  `COVER` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ISBN`, `TITLE`, `AUTHOR_NAME`, `DESCRIPTION`, `FACULTY`, `COVER`) VALUES
(1, 'Introduction to Computer Science Using Python', 'Charles Dierbach', 'Introduction to Computer Science Using Python: A Computational Problem-Solving Focus,recommended by Guido van Rossum, the creator of Python (â€œThis is not your average Python bookâ€¦I think this book is a great text for anyone teaching CS1â€). With a focus on computational problem solving from Chapter 1, this text provides numerous hands-on exercises and examples, each chapter ending with a significant-size program demonstrating the step-by-step process of program development, testing, and debugging. A final chapter includes the history of computing, starting with Charles Babbage, containing over 65 historical images. An end-of-book Python 3 Programmersâ€™ Reference is also included for quick lookup of Python details. Extensive instructor materials are provided for those adopting for classroom use, including an instructorsâ€™ manual, over 1,000 well-developed slides covering all fundamental topics of each chapter, source code, and test bank.', 'FCI', 'fci1.jpg'),
(2, ' The Hidden Language of Computer Hardware and Software', 'Charles Petzold', 'What do flashlights, the British invasion, black cats, and seesaws have to do with computers? In CODE, they show us the ingenious ways we manipulate language and invent new means of communicating with each other. And through CODE, we see how this ingenuity and our very human compulsion', 'FCI', 'fci1.jpg'),
(3, 'JavaScript: The Good Parts', 'Douglas Crockford |', 'Most programming languages contain good and bad parts, but JavaScript has more than its share of the bad, having been developed and released in a hurry before it could be refined. This authoritative book scrapes away these bad features to reveal a subset of JavaScript that\'s more reliable,', 'FCI', 'fci3.jpg'),
(4, 'The Elements of Computing Systems: Building a Modern Computer from First Principles', 'Noam Nisan; Shimon Schocken', 'In the early days of computer science, the interactions of hardware, software, compilers, and operating system were simple enough to allow students to see an overall picture of how computers worked. With the increasing complexity of computer technology and the resulting specialization of knowledge, such clarity is often lost. Unlike other texts that cover only one aspect of the field, The Elements of Computing Systems gives students an integrated and rigorous picture of applied computer science, as its comes to play in the construction of a simple yet powerful computer system.', 'FCI', 'fci4.jpg'),
(5, ' The Pragmatic Programmer', 'Andrew Hunt; David Thomas ', 'What others in the trenches say about The Pragmatic Programmer...\"The cool thing about this book is that it\'s great for keeping the programming process fresh. The book helps you to continue to grow and clearly comes from people who have been there.\" --Kent Beck, author of Extreme Programming Explained: Embrace Change \"I found this book to be a great mix of solid advice and wonderful analogies!\" --Martin Fowler, author of Refactoring and UML Distilled \"I would buy a copy, read it twice, then tell all my colleagues to run out and grab a copy.', 'FCI', 'fci5.jpg'),
(6, 'Elon Musk: Tesla, SpaceX, and the Quest for a Fantastic Future', 'ASHLEE VANGE', 'With this book, you can dive into Elon Musk’s relentless drive and creative vision and better understand Silicon Valley’s most audacious entrepreneur. Spending more than 30 hours in conversation with Musk and interviewing nearly 300 people, technology journalist Ashlee Vance created an exceptionally well-prepared work for you.', 'FOE', 'foe1.jpg'),
(7, 'Cracking the Coding Interview ', 'Gayle Laakmann McDowell', 'As software engineers, you are probably familiar with being asked to whip up intelligent algorithms on the spot or want to be able to do so if asked. With 189 programming questions and solutions, this book can help you with that.', 'FOE', 'foe2.jpg'),
(8, ' The Art of Doing Science and Engineering', 'Richard W. Hamming', 'A great read piece by the great mathematician Richard Hamming who suggests that practical thinking can be learned. By studying how great scientists think, you can also gradually believe like them.', 'FOE', 'foe3.jpg'),
(9, ' Design Patterns', 'Erich Gamma', 'This book offers timeless and elegant solutions to common problems in software design and describes patterns for the various phenomena from managing object creation to coordinating control flow between objects. Design Patterns is a classic of object-oriented development.  ', 'FOE', 'foe4.jpg'),
(10, 'Introduction to Algorithms ', 'Thomas H. Cormen', 'Another great piece for software engineers. In a time where growth in data amount and computing application diversity is exploding, practical algorithms are needed now more than ever. Covering the full spectrum of modern algorithms, this comprehensive textbook can be a great companion for you throughout your learning journey. ', 'FOE', 'foe5.jpg'),
(11, 'The Bookshop: A History of the American Bookstore', 'Evan Friss', 'An affectionate and engaging history of the American bookstore and its central place in American cultural life, from department stores to indies, from highbrow dealers trading in first editions to sidewalk vendors, and from chains to special-interest community destinations', 'FOM', 'fom1.jpg'),
(12, 'Foreign Agents: How American Lobbyists and Lawmakers Threaten Democracy Around the World', 'Casey Michel\r\n', 'A stunning investigation and indictment of the United States\' foreign lobbying industry and the threat it poses to democracy.\r\n\r\nFor years, one group of Americans has worked as foot-soldiers for the most authoritarian regimes around the planet. In the process, they\'ve not only entrenched dictatorships and spread kleptocratic networks, but they\'ve secretly guided U.S. policy without the rest of America even being aware. And now, they\'ve begun turning their sights on American democracy itself.', 'FOM', 'fom2.jpg'),
(13, 'Mastering AI: A Survival Guide to Our Superpowered Futur', 'Jeremy Kahn', 'A Fortune magazine journalist draws on his expertise and extensive contacts among the companies and scientists at the forefront of artificial intelligence to offer dramatic predictions of AI’s impact over the next decade, from reshaping our economy and the way we work, learn, and create to unknitting our social fabric, jeopardizing our democracy, and fundamentally altering the way we think.\r\n\r\nWithin the next five years, Jeremy Kahn predicts, AI will disrupt almost every industry and enterprise, with vastly increased efficiency and productivity. It will restructure the workforce, making AI copilots a must for every knowledge worker. It will revamp education, meaning children around the world can have personal, portable tutors. It will revolutionize health care, making individualized, targeted pharmaceuticals more affordable. It will compel us to reimagine how we make art, compose music, and write and publish books. The potential of generative AI to extend our skills, talents, and creativity as humans is undeniably exciting and promising.\r\n\r\nBut while this new technology has a bright future, it also casts a dark and fearful shadow. AI will provoke pervasive, disruptive, potentially devastating knock-on effects. Leveraging his unrivaled access to the leaders, scientists, futurists, and others who are making AI a reality, Kahn will argue that if not carefully designed and vigilantly regulated AI will deepen income inequality, depressing wages while imposing winner-take-all markets across much of the economy. AI risks undermining democracy, as truth is overtaken by misinformation, racial bias, and harmful stereotypes. Continuing a process begun by the internet, AI will rewire our brains, likely inhibiting our ability to think critically, to remember, and even to get along with one another—unless we all take decisive action to prevent this from happening.\r\n\r\nMuch as Michael Lewis’s classic The New New Thing offered a prescient, insightful, and eminently readable account of life inside the dot-com bubble, Mastering AI delivers much-needed guidance for anyone eager to understand the AI boom—and what comes next.\r\n', 'FOM', 'fom3.jpg'),
(14, 'Talking to Strangers: What We Should Know About the People We Don\'t Know\r\n\r\n', 'Malcolm Gladwell', 'Malcolm Gladwell, host of the podcast Revisionist History and author of the #1 New York Times bestseller Outliers, offers a powerful examination of our interactions with strangers -- and why they often go wrong.', 'FOM', 'fom4.jpg'),
(15, 'Think Again: The Power of Knowing What You Don\'t Know', 'Adam M. Grant', 'Think Again is a book about the benefit of doubt, and about how we can get better at embracing the unknown and the joy of being wrong. Evidence has shown that creative geniuses are not attached to one identity, but constantly willing to rethink their stances and that leaders who admit they don\'t know something and seek critical feedback lead more productive and innovative teams.', 'FOM', 'fom5.jpg'),
(16, '\r\nMultimedia: Computing, Communications and Applications (Innovative Technology)', 'Ralf Steinmetz (Author) Klara Nahrstedt (Author)', 'Providing an overview of the most current research and development areas in multimedia, as well as current ongoing project applications, this book takes a world view of the technology, discussing developments in the U.S., the Far East, as well as Europe.', 'FCM', 'fcm1.jpg'),
(17, 'Image and Video Compression for Multimedia', 'Yun-Qing Shi, Huifang Sun', 'The latest edition provides a comprehensive foundation for image and video compression. It covers HEVC/H.265 and future video coding activities, in addition to Internet Video Coding. The book features updated chapters and content, along with several new chapters and sections. It adheres to the current international standards, including the JPEG standard.', 'FCM', 'fcm2.jpg'),
(18, 'Multimedia Storytelling for Digital Communicators in a Multiplatform World\r\n', 'Seth Gitner', 'Now in its second edition, Multimedia Storytelling for Digital Communicators in a Multiplatform World is a trusted guide for all students who need to master visual communication through multiple media and platforms.\r\n\r\nIncorporating how-to’s on everything from website and social media optimization to screenwriting, this textbook provides readers with the tools for successfully merging new multimedia technology with very old and deep-rooted storytelling concepts. ', 'FCM', 'fcm3.jpg'),
(19, '3rd Edition\r\n\r\nMultimedia Foundations\r\nCore Concepts for Digital Design\r\n', ' Vic Costello', 'Whether you are working using text, graphics, photography, sound, motion, or video, Multimedia Foundations covers the skills necessary to be an effective modern storyteller.\r\n\r\nPresented in full color with hundreds of vibrant illustrations, this book trains readers in the principles and skills common to all forms of digital media production, enabling the creation of successful, engaging content, no matter what tools are used. ', 'FCM', 'fcm4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_books`
--

CREATE TABLE `borrowed_books` (
  `ISBN` varchar(11) NOT NULL,
  `BORROW DATE` date NOT NULL,
  `RETURN DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrowed_books`
--

INSERT INTO `borrowed_books` (`ISBN`, `BORROW DATE`, `RETURN DATE`) VALUES
('1', '2024-09-29', '2024-10-05'),
('18', '2024-09-30', '2024-10-04'),
('19', '2024-09-29', '2024-09-30'),
('2', '2024-09-01', '2024-10-03'),
('4', '2024-09-30', '2024-10-04'),
('6', '2024-09-29', '2024-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `MESSAGE` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`ID`, `NAME`, `EMAIL`, `MESSAGE`) VALUES
(1, 'Hervin', 'jrhervin@gmail.com', 'facilities?'),
(2, 'NEERAJ', 'neeraj@gmail.com', 'BOOKS?'),
(3, 'Hervin', 'hervinkumar60@gmail.com', 'book details'),
(4, 'Hervin', 'hervinkumar60@gmail.com', 'book details'),
(5, 'thivaan', 't1@gmail.com', 'return book?'),
(6, 'HerviKima', 'kima@hervin.com', 'Hello'),
(7, 'Hervin Kumar Not', 'jumbalak@baloogmail.com', 'Hello'),
(8, 'Hervin Kumar Not', 'jumbalak@baloogmail.com', 'Hello'),
(9, 'Shah', 'shah@gmail.com', 'Hellooo'),
(10, 'Shah', 'shah@gmail.com', 'Hellooo'),
(11, 'Shah', 'shah@gmail.com', 'Hellooo'),
(12, 'Shah', 'shah@gmail.com', 'Hellooo'),
(13, 'Shah', 'shah@gmail.com', 'Hellooo'),
(14, 'Shah', 'shah@gmail.com', 'Hellooo'),
(15, 'Hervin', 'jrhervin@gmail.com', 'admin'),
(16, 'Hervin', 'jrhervin@gmail.com', 'admin'),
(17, 'Hervin', 'jrhervin@gmail.com', 'admin'),
(18, 'PAGS', 'pags@gmail.com', 'library id?');

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE `student_registration` (
  `NAME` varchar(15) NOT NULL,
  `USERNAME` varchar(15) NOT NULL,
  `STUDENT ID` int(15) NOT NULL,
  `EMAIL` varchar(40) NOT NULL,
  `FACULTY` varchar(15) NOT NULL,
  `GENDER` enum('MALE','FEMALE') NOT NULL,
  `PASSWORD` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_registration`
--

INSERT INTO `student_registration` (`NAME`, `USERNAME`, `STUDENT ID`, `EMAIL`, `FACULTY`, `GENDER`, `PASSWORD`) VALUES
('Hervin', 'hervink', 1, 'jrhervin@gmail.com', 'fci', 'MALE', '0403'),
('NEERAJ', 'neerajl', 3, 'neeraj@gmail.com', 'fci', 'MALE', '1234'),
('1221103173', 'thivaan', 5, 'shah@gmail.com', 'foe', 'MALE', 't1-41-'),
('10', 'pragash', 6, 'pags@gmail.com', 'fom', 'MALE', 'pags10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD UNIQUE KEY `ISBN` (`ISBN`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student_registration`
--
ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`STUDENT ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `ISBN` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `student_registration`
--
ALTER TABLE `student_registration`
  MODIFY `STUDENT ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
