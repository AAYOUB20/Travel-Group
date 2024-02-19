CREATE TABLE `booking` (
  `email` varchar(255) NOT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `promoCode` varchar(50) DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `Name` char(128) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Messages` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`Name`, `Email`, `Messages`, `timestamp`) VALUES
('123123', '123@gmail.com', '123', '2024-01-11 22:29:22'),
('123123', '5012251@studenti.unige.it', '123', '2024-01-11 22:29:22'),
('wer', 'wer@gmail.com', 'werw', '2024-01-11 22:29:22'),
('ibra', 'hahaha@gmail.com', 'hi', '2024-01-11 22:29:22'),
('2eee', 'eeeee', 'eeee', '2024-01-11 22:34:12'),
('juuds', 'djfksdjk', 'sdfdsf', '2024-01-11 23:37:22'),
('jjjj', 'dddd', 'ffff', '2024-01-16 20:39:43'),
('eeeee', 'dfff', 'ffff', '2024-01-17 22:15:48'),
('123', '123@123', '123', '2024-01-23 18:18:39'),
('ggg', 'ffff@fff', '123', '2024-01-24 20:15:17');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `id` int(11) NOT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `date` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`date`)),
  `price` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`price`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`id`, `destination`, `date`, `price`) VALUES
(1, 'Rome', '[\"10/02/2024\", \"17/02/2024\", \"24/02/2024\"]', '[\"100$\", \"70$\", \"50$\"]'),
(2, 'Thailand', '[\"10/02/2024\", \"17/02/2024\", \"24/02/2024\"]', '[\"100$\", \"70$\", \"50$\"]'),
(3, 'Sri Lanka', '[\"10/02/2024\", \"17/02/2024\", \"24/02/2024\"]', '[\"100$\", \"70$\", \"50$\"]'),
(4, NULL, NULL, NULL),
(5, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `firstname` char(50) DEFAULT NULL,
  `lastname` char(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(255) DEFAULT NULL,
  `expiration_time` datetime DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`firstname`, `lastname`, `email`, `password`, `admin`, `remember_token`, `expiration_time`, `profile_picture`) VALUES
(NULL, '', '', '$2y$10$Gx0ejr40/rCw23Ip7IDji.Gtb39W6DeO0shk1borA7BnUmkblv4We', 0, NULL, NULL, NULL),
('ddsdf', 'sdfsdf', '123@1233', '$2y$10$8O5/GMtpQKrUYdrwuX/.8uw9p/fYEalVjJyMJePlqw1Kcwp9xAl3e', 0, NULL, NULL, NULL),
('1', '1', '1@1.com', '$2y$10$TXEkVazZE2OU.IYHZ2rgvueFognRJTwvQRan7/qO2HuTR7E.1.gU6', 1, NULL, NULL, NULL),
('ibrahim', 'hamade', 'brahim2001hmd@icloud.com', '$2y$10$Gq2B04uXGPIA4mOhl633ZuP9C03c5VSJ9.tknlxVWPc8uaARZLdMy', 1, 'b762a1f583abec2212ce641a3e977285def42e60243170d956bdc05f62eeda7a', '2024-02-08 22:26:42', NULL),
('Idksgimba', 'Tirhnvwzj', 'fnspj@mpxbutiwfe.uor', '$2y$10$1rn3CKBoy1yeercs4Rq.dubIa9OYiXrdN0iBYF3PaUuqIXBANmTi2', 0, NULL, NULL, NULL),
('ibraa', 'ddd', 'ibrahim@gmail.com', '$2y$10$Xo6IUWVQ5YaL3Bkdzlxlyu4SIor8WlNHFwvK8Ho2uTB7dqShteHfa', 1, 'fec16689810b3d9a00fd54fb4d3580f744a984b2df309354e8e5c23ba2c685f1', '2024-01-11 23:38:56', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking` ADD FULLTEXT KEY `ft_index_destination_date` (`destination`,`date`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
