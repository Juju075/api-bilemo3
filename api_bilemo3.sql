-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 04 mars 2022 à 14:37
-- Version du serveur : 8.0.22
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `api_bilemo3`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `email`, `roles`, `password`, `created_at`, `updated_at`) VALUES
(309, 'ohudson@yahoo.com', '[\"ROLE_CLIENT\"]', '$2y$13$vgba9sq8wTLSXmv0ntIl2.Y7vDNdm5hNHhVQnZ2niThAEl4z5ihFa', '2022-02-16 10:57:06', '2022-02-16 10:57:06'),
(310, 'antonio75@yahoo.com', '[\"ROLE_CLIENT\"]', '$2y$13$KuN2wPOWYUzr0mmPxtCr5.oIr9p5KZJ4.BAywikiv3Z2gPuvZV4ye', '2022-02-16 10:57:06', '2022-02-16 10:57:06'),
(311, 'lehner.rocky@yahoo.com', '[\"ROLE_CLIENT\"]', '$2y$13$GA8lbvkwpBofEQ6jEJurk.Ebx/quaZH04ci43DBefIQxWLCZ0Twhy', '2022-02-16 10:57:06', '2022-02-16 10:57:06'),
(312, 'rafaela.erdman@jenkins.com', '[\"ROLE_CLIENT\"]', '$2y$13$LeQ/4eEI8byFqGWSYNliXeZxE8yJ4JLOIs/euXVPep7zCosvfBI.6', '2022-02-16 10:57:07', '2022-02-16 10:57:07');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220113113842', '2022-01-13 11:39:21', 66),
('DoctrineMigrations\\Version20220113114517', '2022-01-13 11:45:54', 47),
('DoctrineMigrations\\Version20220121190731', '2022-01-21 19:08:11', 239),
('DoctrineMigrations\\Version20220121191815', '2022-01-21 19:18:34', 212),
('DoctrineMigrations\\Version20220122144048', '2022-01-22 14:41:06', 165),
('DoctrineMigrations\\Version20220124121440', '2022-01-24 12:15:01', 354);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `name`, `model`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1026, 'Madame Bovary jeune redoutait les accidents pour son mari! L\'apothicaire reprenait: -- La fille au.', 'Ut placeat nulla nostrum impedit.', 'Il s\'enflamma plus vite afin d\'éviter sa rencontre. Emma était pâle. Elle marchait vite. -- Lisez! dit-elle en riant. Emma pleurait, et il les humait délicatement. Elle les retira vite de sa tête.', 1777.25, '2021-07-09 22:06:28', '2022-02-16 10:57:07'),
(1027, 'Il vous appelle. On vous cherche. Emma ne savait que répondre; il respectait sa mère, et il leur.', 'Explicabo explicabo et autem velit soluta.', 'Lheureux courut à sa maman; Emma, lui prouvant d\'un mot qu\'il se trompait, le renvoyait à ses côtés, elle se détournait; il la laissa se dévorer de rage à l\'idée soudaine de rencontrer dans un geste.', 1442.01, '2021-08-02 05:00:52', '2022-02-16 10:57:07'),
(1028, 'Girard, que j\'ai pu pourtant! -- Oui..., peut-être! -- Tu t\'exagères le mal. Peut-être qu\'avec un.', 'Laborum fugit officia delectus nostrum praesentium.', 'Le Marquis ouvrit la fenêtre pour le Fanal, sans compter les visites inattendues qu\'il faisait pour la voir en face, passer des hommes à figure blanche et longue, sur les cloches d\'argent; les.', 1857.85, '2021-09-28 10:53:21', '2022-02-16 10:57:07'),
(1029, 'Bovary, il était venu simplement avec une liasse de papiers et de les avoir, ajoutant que ce n\'est.', 'Voluptatem illo maiores et maiores dolor.', 'Il s\'acheta deux statuettes chic Pompadour, pour décorer l\'appartement, accrochée à un autre. -- Mais tu as peur de ne pas perdre une seule écharpe de couleur, qui ondulait dans la clarté des.', 1989.27, '2021-07-14 18:04:06', '2022-02-16 10:57:07'),
(1030, 'Allons, calme-toi, disait l\'apothicaire, l\'exercice de ses lèvres sur le dos, souriant et.', 'Quos vitae qui occaecati ut non.', 'Berthe, ne voulant pas se désespérer, pensa-t-il. En effet, il se prit à pousser des cris, comme s\'ils avaient déjà senti dans leurs châssis quand la cloche du couvent. Que faisaient-elles.', 1526.73, '2021-08-06 20:48:37', '2022-02-16 10:57:07'),
(1031, 'M. Lieuvain se rassit alors; M. Derozerays se leva, commençant un autre homme. C\'est lui plutôt.', 'Voluptatem corporis dignissimos quod voluptatibus quasi.', 'De quel monde êtes-vous? dit la vieille diligence l\'Hirondelle, qui descendait jusqu\'aux jarrets en déroulant ses anneaux noirs, ce fut d\'abord un tronçon de colonne avec une branche de buis.', 1425.6, '2021-10-26 20:58:06', '2022-02-16 10:57:07'),
(1032, 'Charles se promit de faire ses fantaisies. Pourtant il apprendrait vite, s\'il le voulait, car il.', 'Eaque labore inventore assumenda corporis aspernatur voluptatem.', 'La conversation de Charles avec deux témoins, se présenta chez elle avec des myosotis sur sa croix. Elle essaya, par mortification, de rester là, tout debout à la figure, tandis qu\'à travers le.', 897.72, '2022-01-15 14:45:48', '2022-02-16 10:57:07'),
(1033, 'D\'ailleurs, sa timidité s\'était usée au contact de ses hanches comme une auréole de topazes tout.', 'Exercitationem in ducimus commodi eligendi.', 'Espérons que, tout comme eux, son nom propre les poursuites qu\'il fallait, ne voulant pas se désespérer, pensa-t-il. En effet, quelqu\'un avait envoyé à la fois des lanternes qui coupaient comme un.', 632.64, '2021-07-01 19:50:57', '2022-02-16 10:57:07'),
(1034, 'Charles arrivèrent à la fois de suite ses paupières roses s\'abaissèrent, elle abandonna ses mains.', 'Eligendi molestiae aut aut dolor.', 'Homais: -- Non, pourquoi? Et cependant il trouvait toujours une place confuse où expirait son rêve. Elle s\'acheta un prie-Dieu gothique, et elle l\'écoutait silencieusement, se mêlant comme une.', 1674.85, '2021-05-18 05:49:04', '2022-02-16 10:57:07'),
(1035, 'Place, parut un grand soupir. -- Comme tu as pleuré! dit-il. Pourquoi? Elle éclata en sanglots.', 'Non voluptatem est nihil sint voluptatum enim nemo.', 'Ils étaient en fleur, et le haut de l\'escalier, il s\'arrêta, tant il était triste, et madame Bovary fut étonnée de la salir. Le notaire reprit d\'un ton paterne, tu négligeais un peu colorée par le.', 1058.42, '2021-04-30 22:01:56', '2022-02-16 10:57:07'),
(1036, 'Il sortait de l\'hirondelle. La ville alors s\'éveillait. Des commis, en bonnet de laine à houppes.', 'Voluptas non fugit esse voluptas.', 'Depuis la mort de sa mère une longue énumération de toutes leurs agitations. Vers le milieu sur deux lignes parallèles, les remises et les abonnés, s\'apercevant de loin, les avait mal reçus.', 991.92, '2022-02-07 03:36:07', '2022-02-16 10:57:07'),
(1037, 'Pour se faire de l\'argent, elle se mit à fureter sur le dos, elle poussait un cri, Charles.', 'Voluptas nostrum ipsam consequuntur est dicta eum.', 'Ce fut moins par le bas, s\'éraflait au pantalon; leurs jambes entraient l\'une dans l\'autre; il baissait le menton baissé, les narines et répétait: -- Pourquoi, mon Dieu! non, non, mille fois non!.', 592.14, '2021-10-01 05:54:02', '2022-02-16 10:57:07'),
(1038, 'La mairie se trouvant à une fort longue échéance. Puis il prenait avec lui ses deux jambes, qui se.', 'Quod quaerat laboriosam molestiae et et.', 'Et il fit tomber un livre une idée gothique, digne de ces derniers, rappelait la Saint-Barthélemy à propos du monde, il s\'enferma dès l\'âge de quarante-cinq ans, dégoûté des hommes, celle qui porte.', 1678.59, '2021-05-12 00:33:07', '2022-02-16 10:57:07'),
(1039, 'Il la traita sans façon. Il en survenait d\'autres, continuellement. Il exigea l\'arriéré.', 'Repellendus hic vitae placeat.', 'Rodolphe! Rodolphe!... Ah! Rodolphe, cher petit Rodolphe! Minuit sonna. -- Minuit! dit-elle. Allons, c\'est demain! encore un jour! Il se tut par convenance, à cause de la place. Le petit cimetière.', 1726.9, '2021-06-24 18:35:21', '2022-02-16 10:57:07'),
(1040, 'Emma, vêtue d\'un peignoir en basin, appuyait son chignon tremblait sur une petite vieille femme de.', 'Error et consequatur aut labore ratione corporis dolores.', 'M. et madame Bovary s\'étant avisée de prétendre que les officiers de santé le déshonorassent. Enfin, revenant au malade, il en versa les trois portails, comme un ruisseau qui coule; une étincelle.', 1452.01, '2022-01-04 03:22:20', '2022-02-16 10:57:07'),
(1041, 'Emma continuait avec des licous pour les tourtes et les chanteurs entonnèrent le sextuor. Edgar.', 'Rerum distinctio odit aut laudantium.', 'Il monta. Elle ne demandait qu\'à s\'appuyer sur quelque grand coeur solide, alors la foule la poussait à des feuilles et appliqué dessus son oeil pour y mieux voir, et l\'apothicaire aidait lui- même.', 1968.22, '2021-09-19 13:12:07', '2022-02-16 10:57:07'),
(1042, 'Ah! je vous en faut une autre se fût réciproquement échappé, de leurs pignons faire pétiller des.', 'Voluptas nam quaerat reiciendis est voluptatibus totam.', 'Bovary, boire un peu les jours de distribution de prix, où elle se voyait déshonoré, ruiné, perdu! Et son imagination, assaillie par une claire-voie, apparaît une maison démeublée; et, les volets.', 1166.85, '2021-04-03 10:27:13', '2022-02-16 10:57:07'),
(1043, 'Justin ne répondait pas, la bonne dame s\'emporta, déclarant qu\'à moins de place; la religion de.', 'Laudantium id autem molestias officiis tenetur dolores.', 'Un grand frisson lui secouait les épaules, et elle recherchait la solitude, afin de rester tout un mois, Hivert transporta pour lui rien d\'original. Emma ressemblait à une licitation ou à.', 1667.91, '2021-12-24 10:16:56', '2022-02-16 10:57:07'),
(1044, 'Turcs. On sentait une invincible envie d\'y porter ses lèvres. L\'abbé Bournisien, apprenant qu\'il.', 'Dolores tenetur fuga a inventore qui et.', 'C\'est qu\'il est en labour. La prairie s\'allonge sous un sourire tellement froid, que la présente vous trouvera en bonne santé et que je ne veux pas faire le malheur de votre petite, qui venait par.', 1820.7, '2022-01-15 02:37:15', '2022-02-16 10:57:07'),
(1045, 'Charles regarda; et, à chaque bout du perron; des panonceaux brillent à la bataille de Montlhéry.', 'Deleniti veritatis in tempora in qui dolor rerum.', 'Puis ce fut sans en vouloir bouger, menaçait quelquefois de rompre la devanture de la journée. On ne risquait rien, Charles se tourna vite en lui poussant le coude, je crois en l\'Être suprême, à un.', 1185.63, '2021-02-16 14:31:19', '2022-02-16 10:57:07'),
(1046, 'Tout en lui disant: -- Tout est-il prêt? lui demanda-t-elle. -- Oui, c\'est cela. «Votre ami.» Il.', 'Praesentium sit vel molestiae nemo.', 'J\'étouffe! s\'écria-t-elle en se reculant. Et Emma quotidiennement attendait, avec une grande explosion d\'amour. Il obéit donc; mais la grande route à la porte par où il s\'était détourné sur le.', 1285.84, '2022-01-06 15:16:28', '2022-02-16 10:57:07'),
(1047, 'Madame, ses civilités à Monsieur, dit qu\'il était charmé d\'avoir pu leur rendre quelque service.', 'Fugit veritatis illo aut dolorem et magni molestiae.', 'Il s\'indigna plus fort qu\'elle la portât relevée par la route d\'Abbeville et celle du fanatisme. De cette tragédie, par exemple, elle s\'emporta contre sa poitrine les marques d\'une écuellée de.', 1432.71, '2022-02-14 06:50:33', '2022-02-16 10:57:07'),
(1048, 'Mais elle demande à connaître la facture. Quand ils furent arrivés devant son miroir. Il arriva un.', 'Qui non ab enim deserunt.', 'Je commence à devenir trop grosse. Elle est toute en fonte, elle... Léon fuyait; car il allait faire des préparatifs de la mairie, sur un piano d\'Érard, dans un coin, à gauche, des minarets tartares.', 1414.45, '2021-08-01 12:35:22', '2022-02-16 10:57:07'),
(1049, 'La cour allait en montant; plantée d\'arbres symétriquement espacés, et le curé lui conta tout.', 'Voluptatem rerum sed modi.', 'Justin les accompagnait, et il dissimulait son malaise sous un même niveau d\'amour qui les a tués cet hiver. -- Ah! tenez, n\'en parlons plus... Où sont les calvinistes, monsieur, qui vous êtes. Je.', 772.19, '2021-05-13 16:47:59', '2022-02-16 10:57:07'),
(1050, 'Ils avaient le teint de la veuve était maigre; elle avait pu placer sa vie comme l\'inauguration.', 'Voluptatum earum dignissimos et omnis quasi et.', 'Longueville et Saint- Victor. La nuit s\'épaississait sur les fourneaux bourgeois, un besoin général sur des feuilles de vigne, et ordonna tout de même les paupières pour la campagne. Le sol sous ses.', 1211.06, '2021-08-22 18:15:24', '2022-02-16 10:57:07');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `client_id` int NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `client_id`, `prenom`, `nom`, `created_at`, `updated_at`) VALUES
(471, 309, 'Pauline', 'Valentin', '2022-01-20 07:27:37', '2022-02-16 10:57:07'),
(472, 309, 'Astrid', 'Delaunay', '2022-01-18 00:59:17', '2022-02-16 10:57:07'),
(473, 309, 'Roland', 'Martel', '2022-01-20 16:35:16', '2022-02-16 10:57:07'),
(474, 309, 'Adrien', 'Chevallier', '2022-01-22 03:13:48', '2022-02-16 10:57:07'),
(475, 310, 'Danielle', 'Launay', '2022-02-02 20:53:36', '2022-02-16 10:57:07'),
(476, 310, 'Augustin', 'Schmitt', '2022-01-29 01:45:35', '2022-02-16 10:57:07'),
(477, 310, 'Alain', 'Faivre', '2022-01-27 19:53:48', '2022-02-16 10:57:07'),
(478, 310, 'Claudine', 'Roger', '2022-01-27 17:14:18', '2022-02-16 10:57:07'),
(479, 311, 'Margot', 'Dias', '2022-01-23 07:28:11', '2022-02-16 10:57:07'),
(480, 311, 'Gérard', 'Grondin', '2022-01-22 22:07:49', '2022-02-16 10:57:07'),
(481, 311, 'Grégoire', 'Briand', '2022-01-26 18:27:23', '2022-02-16 10:57:07'),
(482, 311, 'Maggie', 'Berger', '2022-01-30 13:06:22', '2022-02-16 10:57:07'),
(483, 312, 'Léon', 'Roche', '2022-02-11 12:48:25', '2022-02-16 10:57:07'),
(484, 312, 'Patricia', 'Hebert', '2022-02-02 20:45:19', '2022-02-16 10:57:07'),
(485, 312, 'Thierry', 'Roux', '2022-01-17 12:29:41', '2022-02-16 10:57:07'),
(486, 312, 'Bernadette', 'Jacquet', '2022-02-12 03:48:00', '2022-02-16 10:57:07'),
(487, 309, 'correctionprenom', 'correctionnom', '2022-02-16 11:01:09', '2022-02-16 11:01:09'),
(488, 309, 'correctionprenom1', 'correctionnom1', '2022-02-16 11:02:00', '2022-02-16 11:02:00'),
(489, 309, 'correctionprenom2', 'correctionnom2', '2022-02-16 11:10:48', '2022-02-16 11:10:48');

-- --------------------------------------------------------

--
-- Structure de la table `user_produit`
--

CREATE TABLE `user_produit` (
  `user_id` int NOT NULL,
  `produit_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_produit`
--

INSERT INTO `user_produit` (`user_id`, `produit_id`) VALUES
(471, 1046),
(472, 1045),
(473, 1040),
(474, 1027),
(475, 1038),
(476, 1040),
(477, 1029),
(478, 1027),
(479, 1032),
(480, 1044),
(481, 1045),
(482, 1043),
(483, 1049),
(484, 1048),
(485, 1035),
(486, 1031);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_C7440455E7927C74` (`email`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8D93D64919EB6921` (`client_id`);

--
-- Index pour la table `user_produit`
--
ALTER TABLE `user_produit`
  ADD PRIMARY KEY (`user_id`,`produit_id`),
  ADD KEY `IDX_71A8F22DA76ED395` (`user_id`),
  ADD KEY `IDX_71A8F22DF347EFB` (`produit_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1051;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=490;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D64919EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `user_produit`
--
ALTER TABLE `user_produit`
  ADD CONSTRAINT `FK_71A8F22DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_71A8F22DF347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
