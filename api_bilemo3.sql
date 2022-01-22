-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 22 jan. 2022 à 11:58
-- Version du serveur :  8.0.22
-- Version de PHP : 7.4.12

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

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C7440455E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `email`, `roles`, `password`, `created_at`, `updated_at`) VALUES
(9, 'cmoore@johnston.com', '[\"ROLE_USER\"]', '$2y$13$lnex/mFhyXzsXi9ZXQc7Hunimt9qYSc.1lQL2OHPtNqYGDAzzPfbS', '2022-01-22 11:50:47', '2022-01-22 11:50:47'),
(10, 'filomena.bode@yahoo.com', '[\"ROLE_USER\"]', '$2y$13$TTQA11oXzlMMsjUkqoJrDO.H/mm12StlQ01csA3exxrC.iFTEXAUS', '2022-01-22 11:50:47', '2022-01-22 11:50:47'),
(11, 'nona73@veum.com', '[\"ROLE_USER\"]', '$2y$13$9ec/cfDeAYhtUuZdJjixtOW7.w9K0nDgGNFlD5q/6jukxNLjtD5yy', '2022-01-22 11:50:48', '2022-01-22 11:50:48'),
(12, 'zreichel@hotmail.com', '[\"ROLE_USER\"]', '$2y$13$d29McFpKpYbj2R2TNTFsr.vZmbmmfT8PczvEaVF6sxCRrdpXnHTcK', '2022-01-22 11:50:48', '2022-01-22 11:50:48');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220113113842', '2022-01-13 11:39:21', 66),
('DoctrineMigrations\\Version20220113114517', '2022-01-13 11:45:54', 47),
('DoctrineMigrations\\Version20220121190731', '2022-01-21 19:08:11', 239),
('DoctrineMigrations\\Version20220121191815', '2022-01-21 19:18:34', 212);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `name`, `model`, `description`, `price`, `created_at`, `updated_at`) VALUES
(51, 'Jacques-André Torres', 'Et ut voluptatem eaque sit doloribus ipsa.', 'La mère Rolet lui avait passé sa blouse, pris son chapeau, d\'un mouvement brusque: -- Oui, murmurait-elle en grinçant des dents, il levait au ciel ses deux faces principales «un génie tenant une.', 569.85, '2021-05-21 22:17:18', '2022-01-22 11:50:48'),
(52, 'Andrée Auger-Brunel', 'Ut quasi voluptas quidem et nostrum.', 'Charles se remit en marche; puis, revenu à la dame, de faire à quelqu\'un d\'affligé que l\'on croit voir, et elle imaginait des hasards, des catastrophes individuelles arrivées en France ou à se jouer.', 1658.45, '2021-11-19 06:54:51', '2022-01-22 11:50:48'),
(53, 'Paulette Payet', 'Iusto omnis quia voluptatem.', 'Ainsi, prêtant à six pour cent, augmenté d\'un quart de commission, et les mélancolies de la côte, à la cour des Bertaux. Il entendait encore le rire des garçons en gaieté qui dansaient sous les.', 504.37, '2021-11-14 08:38:41', '2022-01-22 11:50:48'),
(54, 'Daniel Ribeiro', 'Quia repellendus et sit eum iste.', 'Chaque bête s\'agitait dans sa chambre, au coin de ciel noir entre des toits pointus. Elle se recula tremblante. Elle balbutiait: -- Oh! c\'est vrai! concéda le bonhomme soupira: -- Si je t\'aime!.', 1514.49, '2021-06-16 02:15:32', '2022-01-22 11:50:48'),
(55, 'Juliette Traore', 'Qui cum officiis accusantium ex ipsam eligendi voluptas quaerat.', 'Madame Bovary devint rouge; il se meurt!... J\'en perds la tête! Charles se réveillait en d\'autres jours, des phrases rapides. -- Ah! Elle se sentait, d\'ailleurs, plus irritée de lui. Elle avait lu.', 1337.94, '2021-04-22 15:18:51', '2022-01-22 11:50:48'),
(56, 'Danielle-Bernadette Rossi', 'Consequuntur mollitia nostrum aut est id et.', 'Ce fut donc avec joie qu\'elle aperçut, en arrivant chez la nourrice. Elle voulut apprendre l\'italien: elle acheta des dictionnaires, une grammaire, une provision de beurre à bon marché, et conclut.', 1456.27, '2021-02-07 16:47:29', '2022-01-22 11:50:48'),
(57, 'Sophie Petit', 'Sequi aperiam non est.', 'C\'est relativement à cette histoire de pistolets. Si elle te demande de mes anciens camarades, actuellement établi rue Malpalu) possède un chien hurlait: et la chambre dans la salle, il aperçut dans.', 1474.21, '2021-06-27 09:08:21', '2022-01-22 11:50:48'),
(58, 'Célina Poirier', 'Velit cum sit suscipit vero est.', 'Alors elle fit un devoir de l\'en défier, elle avala l\'eau-de-vie jusqu\'au bout. Malgré ses airs évaporés (c\'était le cadeau de noces du père Bovary, qui a passé par des forçats. Puis, les trois.', 1189.28, '2021-02-22 21:11:44', '2022-01-22 11:50:48'),
(59, 'Théodore Le Dufour', 'Dolores iusto quaerat assumenda officia sit est.', 'Puis, se calmant, elle finit par dire qu\'il demandait des ailes. Emma, de temps à autre, par crainte, disait-elle, d\'ennuyer M. Léon; disait le percepteur. -- Lesquelles? -- Moi, dit Binet, j\'ai vu.', 943.31, '2021-07-18 16:11:58', '2022-01-22 11:50:48'),
(60, 'Clémence Ruiz', 'Culpa qui aspernatur enim est aut est.', 'Ni Ambroise Paré, appliquant pour la relever, cassa le cordon de la soutenir. Puis, s\'adressant au villageois déjà blême: -- N\'ayez point peur, mon brave. -- Non, jamais! jamais! -- Si j\'étais à ta.', 1457.18, '2021-09-07 05:44:19', '2022-01-22 11:50:48'),
(61, 'Claude Gilbert', 'Officia et reprehenderit id voluptas inventore.', 'Seulement, vous l\'embrasserez bien! Adieu!... vous êtes bon! Mais tout va mieux. Tenez, regardez-la... Le confrère ne se quitteraient plus. Elle fut stoïque, le lendemain, à son espoir, un état.', 1710.73, '2021-06-26 05:17:28', '2022-01-22 11:50:48'),
(62, 'Anaïs Le Roux', 'Minima ducimus a fugiat distinctio aut.', 'Félicité nommait quelqu\'un, Emma répliquait: -- Est-ce possible! Ils ne voudront pas! -- Et qui donc? -- Et puis la vieille ferraille; et elle cherchait à savoir la grossesse de sa chemise de.', 870.82, '2021-07-28 11:25:07', '2022-01-22 11:50:48'),
(63, 'Anastasie Ledoux', 'Necessitatibus molestiae expedita sit harum dolorum eum dolores.', 'Bovary; il cria: -- Pas de faiblesse! Je reviendrai; et peut-être que, plus tard, elle s\'éprit de choses à Bovary. Laquelle? Cependant la nourrice était bien grand, bien bon; on devait tant de.', 1763.43, '2021-07-15 19:32:16', '2022-01-22 11:50:48'),
(64, 'Théophile-Jules Peltier', 'Officia aut molestias molestiae cupiditate aut at.', 'Elle se tourna vers la demeure de Rolet, qui se cabre, est son petit-fils Louis de Brézé, seigneur de la boîte dans l\'armoire une bouteille de bière au cabaret. Accoudé en face avec les dames, tout.', 1512.72, '2021-10-24 18:53:55', '2022-01-22 11:50:48'),
(65, 'Madeleine Texier-Descamps', 'Eos earum voluptates ipsa asperiores assumenda similique.', 'De grosses larmes s\'arrêtaient au coin des rues. En effet, dit Bovary. Continuez. -- Je vous en veux plus! Il ajouta même un grand demi-verre d\'eau-de-vie, et, comme Charles regardait le temps que.', 543.12, '2021-07-02 23:27:13', '2022-01-22 11:50:48'),
(66, 'Eugène Gosselin', 'Quibusdam voluptatum facilis maiores minus.', 'M. Binet, malgré son respect pour les défendre des poussins, qui viennent picorer, sur le port, en plein Walter Scott. Il lui envoyait un baiser; sa mère pour qu\'elle apparût comme un oiseau dans la.', 1591.08, '2022-01-03 17:50:59', '2022-01-22 11:50:48'),
(67, 'Constance de Gimenez', 'Illo non itaque quaerat quae voluptate.', 'Ce n\'est pas d\'ici? Madame désire voir les images. -- Sortez! fit-il impérieusement. Et ils sortirent. Il marcha d\'abord de sa capote à grains de jais; et, pour qu\'on ne les as pas!... J\'aurais dû.', 498.98, '2021-06-04 20:08:01', '2022-01-22 11:50:48'),
(68, 'Adélaïde du Normand', 'In maxime quis eius aliquam sunt voluptas eum.', 'Charles avait, de plus, le repas de ses tricots, rajustait sa cravate, ou jetait à la Miséricorde, prenaient des leçons de Lheureux. Charles, naïvement, lui demanda d\'un air bonhomme, on met tout ce.', 892.28, '2021-04-25 00:13:09', '2022-01-22 11:50:48'),
(69, 'Eugène Ledoux', 'Nostrum quia est dolore.', 'L\'église est de même façon et sans aucun rapport entre eux, subtilement, comme pour en déverser sur la moire tendue. Dans les premiers jours. Elle se rappela les grands bonnets des paysannes se.', 460.84, '2021-08-20 06:10:51', '2022-01-22 11:50:48'),
(70, 'Paul Perret', 'Quo voluptatem error dolores aut debitis et corrupti.', 'Cet amour sans libertinage était pour son épouse une fluxion de poitrine, avait donné à Madame une petite saignée, moins que Léon..., répliqua Charles, qui écoutait. -- Oui... peut-être... un peu.', 559.28, '2021-06-05 05:37:46', '2022-01-22 11:50:48'),
(71, 'Amélie Leconte', 'Consequatur reiciendis ipsam et quaerat amet qui dignissimos.', 'Franklin la liberté; Irma, peut-être, était une manière d\'hippodrome que formait une longue file de campagnardes, servantes en bas-bleus, à souliers plats, à bagues d\'argent, et engraisser de ma.', 1217.05, '2021-10-13 01:37:38', '2022-01-22 11:50:48'),
(72, 'Anastasie Rousseau', 'Est quia voluptatibus dolorum in maiores velit.', 'Ils mangeaient abondamment. Chacun s\'en donnait pour sa chambre à elle, une béatitude qui l\'engourdissait; et son existence ne fut point fâché de la saison, des étourdissements; elle demanda même.', 715.69, '2021-04-05 20:14:53', '2022-01-22 11:50:48'),
(73, 'Nicolas Huet', 'Dolorem aperiam laudantium possimus et dignissimos inventore.', 'Elle resta perdue de ses pas; puis, afin de se regarder dans la maison; les fournisseurs murmuraient; M. Lheureux, n\'est-ce pas vous rendre service, à vous? Et, prenant une figure rechignée, qui est.', 1893.51, '2021-08-04 12:07:52', '2022-01-22 11:50:48'),
(74, 'Augustin Teixeira', 'Cum voluptates dolore ea iste.', 'Il y avait toujours dans le sourd murmure des arbres plantés en ligne tout le clavier sans s\'interrompre. Ainsi secoué par elle, et de lugubre, qui semblait la tenir en joue. Il dépassait.', 1257.03, '2021-04-22 05:05:31', '2022-01-22 11:50:48'),
(75, 'Alfred-Joseph Allain', 'Ullam qui sit sunt.', 'Le pharmacien répondit: -- Chez mademoiselle Lempereur. -- J\'en ai assez, de vos signatures! -- Je ne veux pas faire le philosophe, disait même qu\'il pouvait bien aller tout nu, comme les.', 488.34, '2021-04-14 00:11:33', '2022-01-22 11:50:48');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userproduct_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8D93D64919EB6921` (`client_id`),
  KEY `IDX_8D93D6498F84AA3` (`userproduct_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `userproduct`
--

DROP TABLE IF EXISTS `userproduct`;
CREATE TABLE IF NOT EXISTS `userproduct` (
  `id` int NOT NULL AUTO_INCREMENT,
  `produit_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4F2BF813F347EFB` (`produit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D64919EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_8D93D6498F84AA3` FOREIGN KEY (`userproduct_id`) REFERENCES `userproduct` (`id`);

--
-- Contraintes pour la table `userproduct`
--
ALTER TABLE `userproduct`
  ADD CONSTRAINT `FK_4F2BF813F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
