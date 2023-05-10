-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 10 mai 2023 à 04:49
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `youthspace`
--

-- --------------------------------------------------------

--
-- Structure de la table `answers`
--

CREATE TABLE `answers` (
  `idAnswer` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `date_publication` datetime NOT NULL,
  `id_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `chaine`
--

CREATE TABLE `chaine` (
  `nom` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `langue` varchar(255) NOT NULL,
  `manager` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `chaine`
--

INSERT INTO `chaine` (`nom`, `photo`, `cat`, `langue`, `manager`) VALUES
('SSD', '', 'valorant', 'francais', 'foued beji '),
('SSDddd', '', 'chess', 'français', 'cc');

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

CREATE TABLE `club` (
  `idclub` int(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `fondateur` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `club`
--

INSERT INTO `club` (`idclub`, `titre`, `type`, `fondateur`, `date`) VALUES
(9, 'ookk UPDATE', 'nbn', ',,,', '2023-05-30'),
(10, 'club dance', 'type', 'yfz', '2023-02-01'),
(11, 'aaa', 'zzz', 'zzz', '2023-05-11');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `descriptions` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `nom`, `descriptions`, `genre`, `prix`, `img`, `product_id`) VALUES
(22, 'mghirbi', 'hhhhh', 'ttttttt', '78', 'gitar.jpg', 19),
(23, 'meriem', 'mmmmelekfjjn', 'peinture', '15.5', 'tabmeau1.jpg', 20),
(24, 'mghirbi', 'hhhhh', 'ttttttt', '78', 'gitar.jpg', 19),
(25, 'meriem', 'mmmmelekfjjn', 'peinture', '15.5', 'tabmeau1.jpg', 20),
(26, 'mghirbi', 'hhhhh', 'ttttttt', '78', 'gitar.jpg', 19),
(27, 'meriem', 'mmmmelekfjjn', 'peinture', '15.5', 'tabmeau1.jpg', 20),
(28, 'meriem', 'mmmmelekfjjn', 'peinture', '15.5', 'tabmeau1.jpg', 20),
(29, 'mghirbi', 'hhhhh', 'ttttttt', '78', 'gitar.jpg', 19),
(30, 'rana', 'belle', 'peinture', '5.5', 'tabmeau1.jpg', 22);

-- --------------------------------------------------------

--
-- Structure de la table `defi`
--

CREATE TABLE `defi` (
  `j2` varchar(100) NOT NULL,
  `datess` date NOT NULL,
  `jeu` varchar(100) NOT NULL,
  `recompance` varchar(100) NOT NULL,
  `detail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `defi`
--

INSERT INTO `defi` (`j2`, `datess`, `jeu`, `recompance`, `detail`) VALUES
('aaa', '2020-02-02', '22', '1000', '1v1 '),
('ilyesHTC', '0000-00-00', 'valorant', '222', '1v1 '),
('iquii', '0000-00-00', 'league of legends ', '1000', '1v1 ');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id_event` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `prix` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `id_organ` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_event`, `nom`, `date_debut`, `date_fin`, `prix`, `description`, `id_organ`, `image`) VALUES
(6655, 'ded', '2023-04-20', '2023-04-15', 7454, 'dede', 8755, 'Capture2.PNG'),
(8888, 'bchir', '0000-00-00', '0000-00-00', 215, 'fffffff', 2158, '9.png');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `descriptions` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `total` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `nom`, `descriptions`, `genre`, `prix`, `img`, `product_id`, `total`) VALUES
(20, 'meriem', 'mmmmelekfjjn', 'peinture', '15.5', 'tabmeau1.jpg', 20, '144.50'),
(22, 'mghirbi', 'hhhhh', 'ttttttt', '78', 'gitar.jpg', 19, '144.50'),
(24, 'rana', 'belle', 'peinture', '5.5', 'tabmeau1.jpg', 22, '144.50'),
(25, 'eya', 'belle', 'music', '45.5', 'gitar.jpg', 21, '144.50');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `descriptions` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `descriptions`, `genre`, `prix`, `img`) VALUES
(19, 'mghirbi', 'hhhhh', 'ttttttt', 78, 'gitar.jpg'),
(20, 'meriem', 'mmmmelekfjjn', 'peinture', 15.5, 'tabmeau1.jpg'),
(21, 'eya', 'belle', 'music', 45.5, 'gitar.jpg'),
(22, 'rana', 'belle', 'peinture', 5.5, 'tabmeau1.jpg'),
(24, 'ahmed', 'yyyyyyy', 'test', 7954, 'enfant');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `idQuestion` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `contenu` text NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `date_publication` datetime NOT NULL,
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`idQuestion`, `titre`, `contenu`, `id_auteur`, `date_publication`, `likes`, `dislikes`) VALUES
(41, 'rbviu', 'rjkvbij', 8, '2023-08-16 01:53:41', 0, 0),
(42, 'lkgroz', 'elernv²', 8, '2023-05-01 02:05:20', 0, 0),
(43, 'nigga', 'hello motherfucker ', 1, '2023-05-01 03:15:37', 0, 0),
(44, 'balls dildo', 'hello', 1, '2023-03-07 03:10:59', 0, 0),
(45, 'rgfre', 'balls', 7, '2023-04-10 03:12:27', 0, 0),
(46, 'abbo normal', ' kzei', 1, '2023-05-05 23:50:20', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `rate`
--

CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rate`
--

INSERT INTO `rate` (`id`, `rating`, `product_id`) VALUES
(4, '5', 19),
(5, '3', 20),
(6, '2', 21),
(7, '2', 22),
(8, '2', 24),
(9, '5', 20),
(10, '4', 19),
(11, '3', 20),
(12, '5', 21),
(13, '4', 22),
(14, '5', 24);

-- --------------------------------------------------------

--
-- Structure de la table `reports`
--

CREATE TABLE `reports` (
  `idReport` int(11) NOT NULL,
  `idQuestion` int(11) NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `cause` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `roles` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `roles`) VALUES
(11, 'admin'),
(16, 'Enfant'),
(15, 'Parent');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `idsalle` int(255) NOT NULL,
  `bloc` varchar(255) NOT NULL,
  `numero` int(255) NOT NULL,
  `etage` int(255) NOT NULL,
  `idclub` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`idsalle`, `bloc`, `numero`, `etage`, `idclub`) VALUES
(9, 'p', 5, 5, 11),
(10, 'a', 0, 7, 10);

-- --------------------------------------------------------

--
-- Structure de la table `sponsor`
--

CREATE TABLE `sponsor` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `secteur_activite` varchar(255) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `montant_sponsoring` decimal(10,2) DEFAULT NULL,
  `description_sponsorship` text DEFAULT NULL,
  `logo_sponsor` varchar(255) DEFAULT NULL,
  `id_event` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sponsor`
--

INSERT INTO `sponsor` (`id`, `nom`, `secteur_activite`, `date_debut`, `date_fin`, `montant_sponsoring`, `description_sponsorship`, `logo_sponsor`, `id_event`) VALUES
(112, 'zee', 'info', '2023-04-20', '2023-04-30', '785.00', 'jggur', '7.PNG', 8888);

-- --------------------------------------------------------

--
-- Structure de la table `stream`
--

CREATE TABLE `stream` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `flux` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idu` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `sexe` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `roleu` int(11) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT 0,
  `token` varchar(255) DEFAULT NULL,
  `tokene` varchar(255) DEFAULT NULL,
  `tokenp` varchar(255) DEFAULT NULL,
  `tokenverif` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idu`, `nom`, `prenom`, `age`, `sexe`, `email`, `mdp`, `roleu`, `etat`, `token`, `tokene`, `tokenp`, `tokenverif`) VALUES
(1, 'sboui', 'wael', 22, 'homme', 'sbouiwael09@gmail.com', '9512368740', 11, 1, '6343327370', NULL, NULL, NULL),
(7, 'test', 'text', 11, 'homme', 'te@tsx.com', '5555555555555555555555', 16, 0, NULL, NULL, NULL, NULL),
(16, 'benslimene', 'bechir', 21, 'homme', 'bechir.benslimene@esprit.tn', 'mmmmmmmm', 16, 0, NULL, NULL, NULL, NULL),
(17, 'sboui', 'wael', 22, 'homme', 'wael.sboui@esprit.tn', '123456789', 16, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `votes`
--

CREATE TABLE `votes` (
  `idVote` int(11) NOT NULL,
  `idQuestion` int(11) DEFAULT NULL,
  `id_auteur` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `date_vote` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `votes`
--

INSERT INTO `votes` (`idVote`, `idQuestion`, `id_auteur`, `type`, `date_vote`) VALUES
(107, 42, 1, 1, '2023-05-01 03:08:03'),
(112, 46, 1, 1, '2023-05-03 11:10:59');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`idAnswer`),
  ADD KEY `id_question` (`id_question`);

--
-- Index pour la table `chaine`
--
ALTER TABLE `chaine`
  ADD PRIMARY KEY (`nom`);

--
-- Index pour la table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`idclub`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `defi`
--
ALTER TABLE `defi`
  ADD PRIMARY KEY (`j2`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_event`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`idQuestion`);

--
-- Index pour la table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`idReport`),
  ADD KEY `idQuestion` (`idQuestion`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles` (`roles`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`idsalle`),
  ADD KEY `sc` (`idclub`);

--
-- Index pour la table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_event` (`id_event`);

--
-- Index pour la table `stream`
--
ALTER TABLE `stream`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idu`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `roleu` (`roleu`);

--
-- Index pour la table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`idVote`),
  ADD KEY `idQuestion` (`idQuestion`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `answers`
--
ALTER TABLE `answers`
  MODIFY `idAnswer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `club`
--
ALTER TABLE `club`
  MODIFY `idclub` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `idQuestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `reports`
--
ALTER TABLE `reports`
  MODIFY `idReport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `idsalle` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `stream`
--
ALTER TABLE `stream`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `votes`
--
ALTER TABLE `votes`
  MODIFY `idVote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `questions` (`idQuestion`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `rate_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`idQuestion`) REFERENCES `questions` (`idQuestion`);

--
-- Contraintes pour la table `salle`
--
ALTER TABLE `salle`
  ADD CONSTRAINT `sc` FOREIGN KEY (`idclub`) REFERENCES `club` (`idclub`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `sponsor`
--
ALTER TABLE `sponsor`
  ADD CONSTRAINT `sponsor_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `evenement` (`id_event`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleu`) REFERENCES `roles` (`id`);

--
-- Contraintes pour la table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`idQuestion`) REFERENCES `questions` (`idQuestion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
