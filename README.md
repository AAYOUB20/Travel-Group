# prova
if you want to try my website just add these files into htdocs 
and create tables using mysql 
ofc also you need to create db name and pass inside the server (phpmyadmin)
*database name : user*

CREATE TABLE `user` (
  `name` char(50) DEFAULT NULL,
  `lastname` char(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(255) DEFAULT NULL,
  `expiration_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `booking` (
  `username` varchar(255) NOT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `promoCode` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Indexes for table `reset_tokens`
--
ALTER TABLE `reset_tokens`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);
