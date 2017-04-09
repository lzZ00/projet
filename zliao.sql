-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017-04-09 20:02:42
-- 服务器版本： 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zliao`
--

-- --------------------------------------------------------

--
-- 表的结构 `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prix` float(6,2) NOT NULL,
  `date_achat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `commandes`
--

INSERT INTO `commandes` (`id`, `user_id`, `prix`, `date_achat`, `etat_id`) VALUES
(1, 3, 50.00, '2017-04-09 13:33:18', 1),
(2, 3, 55.00, '2017-04-09 13:33:44', 1);

-- --------------------------------------------------------

--
-- 表的结构 `etats`
--

CREATE TABLE `etats` (
  `id` int(11) NOT NULL,
  `libelle` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `etats`
--

INSERT INTO `etats` (`id`, `libelle`) VALUES
(1, 'A preparer'),
(2, 'Expedie');

-- --------------------------------------------------------

--
-- 表的结构 `paniers`
--

CREATE TABLE `paniers` (
  `id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` float(6,2) NOT NULL,
  `dateAjoutPanier` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `commande_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `paniers`
--

INSERT INTO `paniers` (`id`, `quantite`, `prix`, `dateAjoutPanier`, `user_id`, `produit_id`, `commande_id`) VALUES
(1, 1, 20.00, '2017-04-09 13:33:13', 3, 5, 1),
(2, 1, 10.00, '2017-04-09 13:33:14', 3, 3, 1),
(3, 1, 20.00, '2017-04-09 13:33:16', 3, 1, 1),
(4, 1, 20.00, '2017-04-09 13:33:41', 3, 6, 2),
(5, 1, 15.00, '2017-04-09 13:33:42', 3, 2, 2),
(6, 1, 20.00, '2017-04-09 13:33:43', 3, 4, 2);

-- --------------------------------------------------------

--
-- 表的结构 `produits`
--

CREATE TABLE `produits` (
  `id` int(10) NOT NULL,
  `typeProduit_id` int(10) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prix` float(6,2) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `dispo` tinyint(4) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `produits`
--

INSERT INTO `produits` (`id`, `typeProduit_id`, `nom`, `prix`, `photo`, `dispo`, `stock`) VALUES
(1, 1, 'Eminem', 20.00, 'eminem.jpeg', 1, 5),
(2, 1, 'Nekfeu', 15.00, 'nekfeu.jpeg', 1, 4),
(3, 1, 'Cypress Hill', 10.00, 'cypresshill.jpeg', 1, 10),
(4, 1, 'Twopac', 20.00, 'twopac.jpeg', 1, 10),
(5, 1, '1995', 20.00, '1995.jpeg', 1, 10),
(6, 1, 'Gue Pequeno', 20.00, 'guepequeno.jpeg', 1, 10);

-- --------------------------------------------------------

--
-- 表的结构 `typeProduits`
--

CREATE TABLE `typeProduits` (
  `id` int(10) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `typeProduits`
--

INSERT INTO `typeProduits` (`id`, `libelle`) VALUES
(1, 'type 1'),
(2, 'type 2'),
(3, 'type 3');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `code_postal` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `droit` varchar(255) NOT NULL,
  `tel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `login`, `nom`, `code_postal`, `ville`, `adresse`, `droit`, `tel`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin', '', '', '', '', 'DROITadmin', ''),
(2, 'vendeur@gmail.com', 'vendeur', 'vendeur', '', '', '', '', 'DROITadmin', ''),
(3, 'client@gmail.com', 'client', 'client', '', '', '', '', 'DROITclient', ''),
(4, 'client2@gmail.com', 'client2', 'client2', '', '', '', '', 'DROITclient', ''),
(5, 'client3@gmail.com', 'client3', 'client3', '', '', '', '', 'DROITclient', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_commandes_users` (`user_id`),
  ADD KEY `fk_commandes_etats` (`etat_id`);

--
-- Indexes for table `etats`
--
ALTER TABLE `etats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paniers`
--
ALTER TABLE `paniers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_paniers_users` (`user_id`),
  ADD KEY `fk_paniers_produits` (`produit_id`),
  ADD KEY `fk_paniers_commandes` (`commande_id`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produits_typeProduits` (`typeProduit_id`);

--
-- Indexes for table `typeProduits`
--
ALTER TABLE `typeProduits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `etats`
--
ALTER TABLE `etats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `paniers`
--
ALTER TABLE `paniers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 限制导出的表
--

--
-- 限制表 `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `fk_commandes_etats` FOREIGN KEY (`etat_id`) REFERENCES `etats` (`id`),
  ADD CONSTRAINT `fk_commandes_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- 限制表 `paniers`
--
ALTER TABLE `paniers`
  ADD CONSTRAINT `fk_paniers_commandes` FOREIGN KEY (`commande_id`) REFERENCES `commandes` (`id`),
  ADD CONSTRAINT `fk_paniers_produits` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`),
  ADD CONSTRAINT `fk_paniers_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- 限制表 `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `fk_produits_typeProduits` FOREIGN KEY (`typeProduit_id`) REFERENCES `typeProduits` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
