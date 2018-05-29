-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 29 Mai 2018 à 13:39
-- Version du serveur :  10.0.34-MariaDB-0ubuntu0.16.04.1
-- Version de PHP :  7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `xe_transfer`
--

-- --------------------------------------------------------

--
-- Structure de la table `destinataire`
--

CREATE TABLE `destinataire` (
  `id_destinataire` int(11) NOT NULL,
  `mail_destinataire` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `destinataire`
--

INSERT INTO `destinataire` (`id_destinataire`, `mail_destinataire`, `message`) VALUES
(1, 'testmaildest@gmail.com', '');

-- --------------------------------------------------------

--
-- Structure de la table `file`
--

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL,
  `name_file` varchar(255) NOT NULL,
  `url_file` varchar(255) NOT NULL,
  `file_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `file`
--

INSERT INTO `file` (`id_file`, `name_file`, `url_file`, `file_date`) VALUES
(1, 'users.svg', 'other/users.svg', '2018-05-29 11:36:37');

-- --------------------------------------------------------

--
-- Structure de la table `send`
--

CREATE TABLE `send` (
  `id_send` int(11) NOT NULL,
  `id_user_send` int(11) NOT NULL,
  `id_destinataire` int(11) NOT NULL,
  `id_file` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_send` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `send`
--

INSERT INTO `send` (`id_send`, `id_user_send`, `id_destinataire`, `id_file`, `message`, `date_send`) VALUES
(1, 1, 1, 1, 'Voici un exemple de transfert ', '2018-05-28 09:15:47');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `mail_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `mail_user`) VALUES
(1, 'testuser@gmail.com');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `destinataire`
--
ALTER TABLE `destinataire`
  ADD PRIMARY KEY (`id_destinataire`);

--
-- Index pour la table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`);

--
-- Index pour la table `send`
--
ALTER TABLE `send`
  ADD PRIMARY KEY (`id_send`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `destinataire`
--
ALTER TABLE `destinataire`
  MODIFY `id_destinataire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `send`
--
ALTER TABLE `send`
  MODIFY `id_send` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
