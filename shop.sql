-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 01:11 PM
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
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(1000) DEFAULT NULL,
  `character_image_url` varchar(1000) DEFAULT NULL,
  `carousel_img` varchar(500) DEFAULT NULL,
  `logo_img` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image_url`, `character_image_url`, `carousel_img`, `logo_img`) VALUES
(5, 'Red Dead Redemptions 2', 'Red Dead Redemption 2 is a 2018 action-adventure game developed and published by Rockstar Games. The game is the third entry in the Red Dead series and a prequel to the 2010 game Red Dead Redemption.', 30.00, 'https://wallpapers.com/images/hd/red-dead-redemption-ii-phone-posse-silhouette-gnvmb4cdp2utjeha.jpg', 'https://pngimg.com/d/red_dead_redemption_PNG58.png', 'images\\reddeadredemption2\\rdr2.jpg', 'images\\reddeadredemption2\\rdrlogo.png\"'),
(7, 'GTA V', 'Grand Theft Auto V (GTA V) is an open-world action-adventure video game set in the fictional state of San Andreas. Players control three protagonists—Michael, Franklin, and Trevor—each with their own storylines and abilities. The game features a vast open world with various activities, including missions, heists, and multiplayer modes. Praised for its immersive world, engaging story, and diverse gameplay, GTA V is one of the best-selling video games of all time.', 10.00, 'https://lh3.googleusercontent.com/proxy/SHPFh6KYspBL68EHy1u_sT3jVYodhrKPQ8jUO9g35eGYQMrflDvr6J_PBNL57sbAZqpRJCvT09oEPEFUjpzItwaeXpiR5ZxPzK8dbTmSlhLGDDsELJAy45xtW2nUDXUSiPaP0MT0xuk', 'https://freepngimg.com/save/169411-gta-characters-png-image-high-quality/589x851', 'images\\gtav\\gtav3.jpg', 'images\\gtav\\gtavlogo.png'),
(8, 'FarCry 6', 'Far Cry 6 is a thrilling action-adventure shooter game by Ubisoft. Set in the Caribbean on the fictional island of Yara, players become Dani Rojas, a guerrilla fighter fighting against the oppressive rule of dictator Anton Castillo. With its immersive open world and intense gameplay, Far Cry 6 delivers an adrenaline-fueled experience that keeps players on the edge of their seats.', 15.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT61vPL4KxCVgtIvek9f3fNEWGRXDprqeDsLhvz4DfDXQ&s', 'https://staticctf.ubisoft.com/J3yJr34U2pZ2Ieem48Dwy9uqj5PNUQTn/6oePZvcbq4cIJhVIkQlye2/e92e977214dca5e0c5a54879908384b3/Fc6_img_mobile.png', 'images\\farcry\\farcry2.jpg', 'images\\farcry\\farcrylogo.png'),
(9, 'Marvel\'s Spider man 2', 'Marvel\'s Spider-Man 2 is an upcoming action-adventure game by Insomniac Games and Sony Interactive Entertainment. Players swing through New York City as Spider-Man, battling villains and navigating Peter Parker\'s personal life. With improved mechanics and a captivating story, it promises an exciting experience for fans of the superhero genre.', 12.00, 'https://lh4.googleusercontent.com/proxy/iqeCuHaMzDoTgqiQ9-G7LRCnv0Qmyhz9F1dj_0sU5tGRNmMGoLvnI5E4Uqn7VnUsySMMafP8hEpC3YUHM4oNCBwe99miKwdA3k-B_Gxg1pxWB0QgIWdxKDamsVrfvG53VytgmC6X2TIO9OnoK8xbJ7DBUAAeow', 'https://i.pinimg.com/originals/2e/6a/b0/2e6ab0ae742c21987f378f38b01f8208.png', 'images\\spiderman\\spiderman3.jpg', 'images\\spiderman\\spidermanlogo.png'),
(11, 'God of War', 'God of War is an action-adventure game franchise created by David Jaffe and developed by Sony\'s Santa Monica Studio. It began in 2005 on the PlayStation 2 video game console and has become a flagship series for PlayStation, consisting of nine installments across multiple platforms.', 18.00, 'https://www.bhmpics.com/downloads/4k-god-of-war-mobile-Wallpapers/11.wp6128865.jpg', 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/553df392-fcf3-4041-9062-8aaf58f6fab5/dghb9a1-9395af12-081f-438e-aae9-54899c1b93f2.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzU1M2RmMzkyLWZjZjMtNDA0MS05MDYyLThhYWY1OGY2ZmFiNVwvZGdoYjlhMS05Mzk1YWYxMi0wODFmLTQzOGUtYWFlOS01NDg5OWMxYjkzZjIucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.-1P1GOlg4WU5uTe_eahS832PTVWVsfY1j2nxzpy0uBY', 'images\\godofwar\\godofwar3.jpg', 'images\\godofwar\\godofwarlogo.png'),
(12, 'Cyberpunk 2077', 'FCyberpunk 2077 is a 2020 action role-playing video game developed by CD Projekt Red, and published by CD Projekt, and based on Mike Pondsmith\'s Cyberpunk tabletop game series. The plot is set in the fictional metropolis of Night City, California, within the dystopian Cyberpunk universe.', 20.00, 'https://i.redd.it/ndy5mcrsd06b1.png', 'https://static.tvtropes.org/pmwiki/pub/images/johnny_silverhand_body.png', 'images\\cyberpunk\\cyberpunk1.jpg', 'images\\cyberpunk\\cyberpunklogo.png'),
(13, 'Last of us', 'The Last of Us Part II is a 2020 action-adventure game developed by Naughty Dog and published by Sony Interactive Entertainment.', 8.00, 'https://i.redd.it/ge1apik2mud51.jpg', 'images/cliparet/lstofus.png', 'images\\lastofus\\lastofus3.jpg', 'images\\lastofus\\lastofuslogo.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'pasindu', '$2y$10$KPtF/PKGJ7FK4cwuIojruuIT638wlcNGDCjLe5WzsCLXC8wdEKCvy', '2024-06-07 08:30:05'),
(2, 'lakmal', '$2y$10$24i4hZdV4KLOSvTThxAFjOnew09uvxUJCOlrrhUP.RX4ktnzT2bbi', '2024-06-07 09:13:11'),
(3, 'asd', '$2y$10$iNeurC1SNtqudXfTXuIiEehdm7KXGKaTX8qmAJmjd5CLohJ4/T9t6', '2024-06-07 09:16:26'),
(4, 'qwe', '$2y$10$VFp74rA37jU6tZLOlzFTs.zar7hRkuXW2mcJfAYJTCgi9JmUNSwXi', '2024-06-07 11:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
