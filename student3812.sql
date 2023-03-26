-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2023 at 09:16 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `subject` varchar(128) NOT NULL,
  `mainText` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Each row of this table will represent an announcement.';

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `date`, `subject`, `mainText`) VALUES
(1, '2023-02-10', 'Υποβλήθηκε η εργασία 2', 'Η 2η εργασία έχει ανακοινωθεί στην ιστοσελίδα<a href=\'/PHP code/Main pages/homework.php\'>«Εργασίες»</a>.');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `fileName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Each row of this table will represent a document.';

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `title`, `description`, `fileName`) VALUES
(1, 'Αρχιτεκτονική DBMS ', 'Εισαγωγή, σύνδεση με τα προηγούμενα, βασικές έννοιες ΒΔ, φυσική οργάνωση, θέματα που αφορούν στο φυσικό επίπεδο της ΒΔ, διαχείριση απομονωτικής μνήμης(buffer management).', 'files/file1.doc'),
(2, 'Δενδρικές μέθοδοι προεπέλασης', 'Επεξεργασία βασικών πράξεων, χρήση καταλόγων για αποδοτικότερη εκτέλεση ερωτημάτων,Β-trees και B+-trees.', 'files/file2.doc');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `targets` text NOT NULL,
  `fileName` varchar(255) NOT NULL,
  `filesToSend` text NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Each row of this table will represent a project.';

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `targets`, `fileName`, `filesToSend`, `deadline`) VALUES
(1, '1.Υλοποίηση μιας δομής R tree.\r\n2.Εξηκειωση με την γλώσσα προγραμματισμού Java.\r\n3.Συνεργατική δουλειά.', 'files/ergasia1.doc', '1.Γραπτή αναφορά σε word.\r\n2.Αρχειο με τον πηγαίο κώδικα.', '2023-02-23'),
(2, '1.Υλοποίηση μιας δομής R tree.\r\n2.Εξηκειωση με την γλώσσα προγραμματισμού Java.\r\n3.Συνεργατική δουλειά.', 'files/ergasia2.doc', '1.Γραπτή αναφορά σε word.\r\n2.Αρχειο με τον πηγαίο κώδικα.', '2023-02-15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `surname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Each row of this table will represent a signed user.';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `role`) VALUES
(1, 'tutorName', 'tutorSurname', 'tutor@gmail.com', '123', 'tutor'),
(2, 'student1', 'surname1', 'student1@gmail.com', '123', 'student'),
(3, 'student2', 'surname2', 'student2@gmail.com', '123', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
