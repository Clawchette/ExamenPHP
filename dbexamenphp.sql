-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 18 mai 2020 à 17:49
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbexamenphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `apropos`
--

CREATE TABLE `apropos` (
  `id_apropos` int(1) NOT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `rue` varchar(40) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL,
  `codepostal` varchar(10) DEFAULT NULL,
  `telephone` varchar(14) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `cheminphoto` varchar(200) DEFAULT NULL,
  `lienlinkedin` varchar(100) DEFAULT NULL,
  `liengithub` varchar(100) DEFAULT NULL,
  `lientwitter` varchar(100) DEFAULT NULL,
  `lienfacebook` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `apropos`
--

INSERT INTO `apropos` (`id_apropos`, `prenom`, `nom`, `rue`, `ville`, `codepostal`, `telephone`, `email`, `description`, `cheminphoto`, `lienlinkedin`, `liengithub`, `lientwitter`, `lienfacebook`) VALUES
(1, 'Marie', 'Gonzalez', '12 Rue Anatole France', 'Nanterre', '92 000', '01 41 20 69 57', 'marie.gonzalez@ynov.com', 'Je souhaite un jour faire de ma passion pour l&#039;informatique et le d&eacute;veloppement mon m&eacute;tier.', 'LogoYnov.png', 'https://www.linkedin.com/school/ynov-paris', 'https://www.github.com/Clawchette/ExamenPHP', 'https://twitter.com/parisynovcampus', 'https://www.facebook.com/parisynovcampus');

-- --------------------------------------------------------

--
-- Structure de la table `competenceslang`
--

CREATE TABLE `competenceslang` (
  `id_complang` int(1) NOT NULL,
  `competencelang` varchar(40) DEFAULT NULL,
  `nivlang` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `competenceslang`
--

INSERT INTO `competenceslang` (`id_complang`, `competencelang`, `nivlang`) VALUES
(4, 'Fran&ccedil;ais', 'langue maternelle'),
(5, 'Anglais', 'bilingue'),
(6, 'Espagnol', 'niveau B2'),
(7, 'Allemand', 'niveau A2');

-- --------------------------------------------------------

--
-- Structure de la table `competenceslog`
--

CREATE TABLE `competenceslog` (
  `id_complog` int(1) NOT NULL,
  `competencelog` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `competenceslog`
--

INSERT INTO `competenceslog` (`id_complog`, `competencelog`) VALUES
(2, 'devicon-python-plain'),
(3, 'devicon-c-line'),
(4, 'devicon-csharp-line');

-- --------------------------------------------------------

--
-- Structure de la table `competencesweb`
--

CREATE TABLE `competencesweb` (
  `id_compweb` int(1) NOT NULL,
  `competenceweb` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `competencesweb`
--

INSERT INTO `competencesweb` (`id_compweb`, `competenceweb`) VALUES
(3, 'fab fa-html5'),
(4, 'fab fa-js-square'),
(5, 'fab fa-css3-alt'),
(6, 'fab fa-php'),
(7, 'devicon-mysql-plain');

-- --------------------------------------------------------

--
-- Structure de la table `education`
--

CREATE TABLE `education` (
  `id_education` int(3) NOT NULL,
  `ecole` varchar(40) DEFAULT NULL,
  `periode` varchar(100) DEFAULT NULL,
  `formation` varchar(40) DEFAULT NULL,
  `specialisation` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `education`
--

INSERT INTO `education` (`id_education`, `ecole`, `periode`, `formation`, `specialisation`) VALUES
(1, 'Ynov', 'De Septembre 2019 &agrave; aujourd&#039;hui', 'Bachelor Informatique', ''),
(2, 'UPEC', 'D&#039;Octobre 2016 &agrave; Mai 2019', 'Licence LLCER Anglais', 'Sp&eacute;cialit&eacute; : M&eacute;tiers de la traduction'),
(3, 'Lyc&eacute;e Simone Signoret', 'D&#039;Ao&ucirc;t 2012 &agrave; Juin 2016', 'Bac Scientifique', 'Sp&eacute;cialit&eacute; : Math&eacute;matiques');

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE `experiences` (
  `id_experience` int(3) NOT NULL,
  `emploi` varchar(40) DEFAULT NULL,
  `periode` varchar(100) DEFAULT NULL,
  `entreprise` varchar(40) DEFAULT NULL,
  `jobdescription` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `experiences`
--

INSERT INTO `experiences` (`id_experience`, `emploi`, `periode`, `entreprise`, `jobdescription`) VALUES
(1, 'Stagiaire', 'Novembre 2012', 'Paramat', 'J&#039;ai eu l&#039;occasion d&#039;&ecirc;tre en contact avec les clients en tant que caissi&egrave;re et de d&eacute;couvrir comment se d&eacute;roulent les livraisons de mat&eacute;riel.');

-- --------------------------------------------------------

--
-- Structure de la table `identification`
--

CREATE TABLE `identification` (
  `id_admin` int(1) NOT NULL,
  `pseudo` varchar(20) DEFAULT NULL,
  `mdp` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `identification`
--

INSERT INTO `identification` (`id_admin`, `pseudo`, `mdp`) VALUES
(1, 'admin', 'password');

-- --------------------------------------------------------

--
-- Structure de la table `interets`
--

CREATE TABLE `interets` (
  `id_interets` int(1) NOT NULL,
  `interet` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `interets`
--

INSERT INTO `interets` (`id_interets`, `interet`) VALUES
(1, 'Je suis passionn&eacute;e par l&#039;informatique, en particulier les jeux vid&eacute;os, l&#039;intelligence artificielle et Internet. \r\nJe m&#039;int&eacute;resse beaucoup &agrave; l&#039;art, en particulier le dessin traditionnel (que je pratique occasionnellement) et digital.');

-- --------------------------------------------------------

--
-- Structure de la table `recompenses`
--

CREATE TABLE `recompenses` (
  `id_recompense` int(3) NOT NULL,
  `recompense` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recompenses`
--

INSERT INTO `recompenses` (`id_recompense`, `recompense`) VALUES
(3, 'Baccalaur&eacute;at Scientifique - Sp&eacute;cialit&eacute; Math&eacute;matiques - Mention AB (2016)'),
(4, 'Licence LLCER Anglais - Sp&eacute;cialit&eacute; M&eacute;tiers de la traduction - Mention AB (2019)');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `apropos`
--
ALTER TABLE `apropos`
  ADD PRIMARY KEY (`id_apropos`);

--
-- Index pour la table `competenceslang`
--
ALTER TABLE `competenceslang`
  ADD PRIMARY KEY (`id_complang`);

--
-- Index pour la table `competenceslog`
--
ALTER TABLE `competenceslog`
  ADD PRIMARY KEY (`id_complog`);

--
-- Index pour la table `competencesweb`
--
ALTER TABLE `competencesweb`
  ADD PRIMARY KEY (`id_compweb`);

--
-- Index pour la table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id_education`);

--
-- Index pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id_experience`);

--
-- Index pour la table `identification`
--
ALTER TABLE `identification`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `interets`
--
ALTER TABLE `interets`
  ADD PRIMARY KEY (`id_interets`);

--
-- Index pour la table `recompenses`
--
ALTER TABLE `recompenses`
  ADD PRIMARY KEY (`id_recompense`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `competenceslang`
--
ALTER TABLE `competenceslang`
  MODIFY `id_complang` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `competenceslog`
--
ALTER TABLE `competenceslog`
  MODIFY `id_complog` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `competencesweb`
--
ALTER TABLE `competencesweb`
  MODIFY `id_compweb` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `education`
--
ALTER TABLE `education`
  MODIFY `id_education` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id_experience` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `recompenses`
--
ALTER TABLE `recompenses`
  MODIFY `id_recompense` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
