-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 08 sep. 2022 à 19:11
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vosrecettes`
--
CREATE DATABASE IF NOT EXISTS `vosrecettes` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `vosrecettes`;

-- --------------------------------------------------------

--
-- Structure de la table `coutdelarecette`
--

DROP TABLE IF EXISTS `coutdelarecette`;
CREATE TABLE IF NOT EXISTS `coutdelarecette` (
  `idCout` int(11) NOT NULL AUTO_INCREMENT,
  `budget` varchar(11) NOT NULL,
  PRIMARY KEY (`idCout`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `coutdelarecette`
--

INSERT INTO `coutdelarecette` (`idCout`, `budget`) VALUES
(1, 'Bon_marche'),
(2, 'Cout_moyen'),
(3, 'Assez_cher');

-- --------------------------------------------------------

--
-- Structure de la table `etape`
--

DROP TABLE IF EXISTS `etape`;
CREATE TABLE IF NOT EXISTS `etape` (
  `idEtape` int(11) NOT NULL AUTO_INCREMENT,
  `idRecette` int(11) DEFAULT NULL,
  `descriptif` longtext,
  PRIMARY KEY (`idEtape`),
  KEY `idRecette` (`idRecette`)
) ENGINE=InnoDB AUTO_INCREMENT=305 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etape`
--

INSERT INTO `etape` (`idEtape`, `idRecette`, `descriptif`) VALUES
(1, NULL, 'bonjour'),
(2, NULL, 'salut'),
(9, 105, 'Couper au couteau de tous petits dÃ©s de saumon. Faire de mÃªme avec les noix de Saint-Jacques. MÃ©langer dans un saladier avec une cuillÃ¨re Ã  soupe d\'huile d\'olive, saler avec le sel et les deux poivres, couvrir d\'un film plastique, rÃ©server au frais.'),
(10, 105, 'Prendre 4 ou 5 feuilles de chaque herbe, sauf l\'aneth, hacher en petits morceaux, puis les mÃ©langer entre elles.'),
(23, 100, 'Pour la pÃ¢te Ã  choux:'),
(24, 100, 'PrÃ©chauffer le four Ã  210Â°C (Thermostat 7).'),
(25, 100, 'MÃ©langer sel, sucre, beurre et eau dans une casserole, et faire bouillir.'),
(26, 100, 'IntÃ©grer la farine, et remuer jusqu\'Ã  l\'obtention d\'une pÃ¢te compacte. La travailler jusqu\'Ã  ce qu\'elle soit suffisamment ferme'),
(27, 100, 'IntÃ©grer 4 oeufs, un Ã  un en veillant Ã  bien mÃ©langer entre chaque oeuf.'),
(28, 100, 'Travailler la pÃ¢te afin de la rendre ferme.'),
(29, 100, 'Sur un plaque allant au four prÃ©alablement huilÃ©e, rÃ©partir Ã  l\'aide de la poche Ã  douille une dizaine de boudins de pÃ¢te de 15 cm de long environ.'),
(30, 100, 'Badigeonner avec le jaune d\'Å“uf pour que la pÃ¢te soit dorÃ©e Ã  la cuisson .'),
(31, 100, 'Faire cuire 25 min Ã  four chaud et laisser reposer 10 min, four Ã©teint, pour Ã©viter que les choux ou les Ã©clairs ne dÃ©gonflent.'),
(32, 100, 'Pour la crÃ¨me:'),
(33, 100, 'Faire fondre 60 g de chocolat cassÃ© en morceaux dans le lait, Ã  feu doux .'),
(34, 100, 'Dans un bol, fouetter oeuf, jaune et sucre jusqu\'Ã  ce que le mÃ©lange soit mousseux.'),
(35, 100, 'Ajouter la farine et verser dans le lait chocolatÃ©.'),
(36, 100, 'Faire Ã©paissir sans cesser de remuer.'),
(37, 100, 'Hors du feu, intÃ©grer 20 g de beurre. Laisser refroidir.'),
(38, 100, 'Garnir de cette crÃ¨me les Ã©clairs coupÃ©s en 2 dans le sens de la longueur et faire fondre au bain-marie le reste du chocolat et du beurre.'),
(39, 100, 'Napper le dessus des Ã©clairs. Laisser durcir le glaÃ§age avant de dÃ©guster.'),
(40, 102, 'PrÃ©chauffez votre four Ã  180Â°C (thermostat 6).'),
(41, 102, 'Faites bouillir le lait. MÃ©langez dans une terrine les oeufs, les jaunes d\'oeufs, le sucre semoule et le sucre vanillÃ©.'),
(42, 102, 'Ajoutez le lait chaud en mÃ©langeant Ã©nergiquement.'),
(43, 102, 'RÃ©partir le flan dans des ramequins.'),
(44, 102, 'Placez au bain-marie, et laissez cuire 20 min au four.'),
(45, 102, 'Pour vÃ©rifier la cuisson du flan, piquez une aiguille au centre de celui-ci, elle doit ressortir sÃ¨che!'),
(46, 105, 'Couper au couteau de tous petits dÃ©s de saumon. Faire de mÃªme avec les noix de Saint-Jacques. MÃ©langer dans un saladier avec une cuillÃ¨re Ã  soupe d\'huile d\'olive, saler avec le sel et les deux poivres, couvrir d\'un film plastique, rÃ©server au frais.'),
(47, 105, 'Prendre 4 ou 5 feuilles de chaque herbe, sauf l\'aneth, hacher en petits morceaux, puis les mÃ©langer entre elles.'),
(48, 105, 'PrÃ©parer une vinaigrette avec le jus d\'un citron, de l\'huile d\'olive, des branches d\'aneth. Passer au robot Ã  vitesse maxi pour Ã©mulsionner. RÃ©server.'),
(49, 105, 'Couper les poivrons en 2, les Ã©pÃ©piner, les passer au mixer sÃ©parÃ©ment pour les rÃ©duire en coulis. Passer au chinois Ã©tamine.'),
(50, 105, 'Hacher au couteau les huitres, les incorporer a la vinaigrette avec leur jus.'),
(51, 105, 'Dans une assiette blanche ou en verre transparent, dresser le tartare en dÃ´me, arroser de vinaigrette d\'huÃ®tres, parsemer du mÃ©lange d\'herbes fraÃ®ches, dÃ©corer de baies roses.'),
(52, 105, 'Dessiner une rosace avec les 3 coulis autour du tartare. Servir aussitÃ´t.'),
(53, 103, 'PrÃ©chauffez votre four Ã  180Â°C (thermostat 6). Dans une casserole, faites fondre le chocolat et le beurre coupÃ© en morceaux Ã  feu trÃ¨s doux.'),
(54, 103, 'Dans un saladier, ajoutez le sucre, les oeufs, la farine. MÃ©langez.'),
(55, 103, 'Ajoutez le mÃ©lange chocolat/beurre. MÃ©langez bien.'),
(56, 103, 'Beurrez Ã  l\'aide d\'une feuille de papier essuie-tout et farinez votre moule puis y versez la pÃ¢te Ã  gÃ¢teau.'),
(57, 103, 'Faites cuire au four environ 20 minutes.'),
(58, 103, 'A la sortie du four le gÃ¢teau ne paraÃ®t pas assez cuit. C\'est normal, laissez-le refroidir puis dÃ©moulez- le.'),
(59, 110, 'PrÃ©paration de la pÃ¢te:'),
(60, 110, 'Ã‰miettez la levure puis, diluer dans la moitiÃ© de l\'eau tiÃ¨de. Laissez reposer 10 minutes.'),
(61, 110, 'Dans un grand saladier, dÃ©posez la farine et le sel puis mÃ©langez.'),
(62, 110, 'Ajoutez dans le saladier: l\'huile, la levure diluÃ©e et le reste d\'eau tiÃ¨de.'),
(63, 110, 'MÃ©langez bien les ingrÃ©dients Ã  l\'aide d\'une grosse cuillÃ¨re par exemple.'),
(64, 110, 'Farinez un large plan de travail puis dÃ©posez la pÃ¢te.'),
(65, 110, 'PÃ©trissez la pÃ¢te durant 10 minutes de maniÃ¨re Ã©nergique puis, frappez-lÃ  fort sur le plan de travail plusieurs fois.'),
(66, 110, 'Le rÃ©sultat: la pÃ¢te doit Ãªtre lisse, non collante et de petites bulles d\'air doivent apparaÃ®tre dans la pÃ¢te.'),
(67, 110, 'Laissez reposer une heure (4 heures serait le mieux) dans un saladier recouvert d\'un linge humide et chaud afin que la pÃ¢te ne croÃ»te pas et qu\'elle gonfle.'),
(68, 110, 'PrÃ©paration de la sauce napolitaine faÃ§on Gusteau:'),
(69, 110, 'Dans une casserole, faites revenir les oignons Ã©mincÃ©s finement dans de l\'huile d\'olive.'),
(70, 110, 'Une fois que les oignons ont bien suÃ©, ajoutez les tomates prÃ©alablement Ã©crasÃ©es Ã  la main dans un saladier.'),
(71, 110, 'Ajoutez les gousses d\'ail Ã©crasÃ©es, le thym, le laurier, le double concentrÃ© de tomates. Salez et poivrez.'),
(72, 110, 'Laissez mijoter Ã  feux doux jusqu\'Ã  ce que le mÃ©lange Ã©paississe puis, Ã  feux trÃ¨s doux, ajoutez le basilic frais bien nettoyÃ© et ciselÃ©.'),
(73, 110, 'Ajoutez le sucre (Une pierre de sucre pour ma part).'),
(74, 110, 'Laissez encore mijoter doucement quelques minutes pour que le basilic se diffuse sans la sauce.'),
(75, 110, 'Passez la prÃ©paration au mixeur Ã  soupe, lÃ©gÃ¨rement afin de ne pas rendre la prÃ©paration trop liquide. RÃ©servez.'),
(76, 110, 'PrÃ©paration des garnitures:'),
(77, 110, 'Coupez la mozzarella en fines tranches puis Ã©gouttez-lÃ  entre plusieurs feuilles d\'essuie-tout (Ceci afin qu\'elle ne rejette pas trop d\'eau lors de la cuisson).'),
(78, 110, 'Nettoyez les feuilles de basilic frais.'),
(79, 110, 'Rappez le parmigiano reggiano.'),
(80, 110, 'PrÃ©chauffez votre four Ã©lectrique au thermostat 9 (270Â°c), 30 minutes avant de commencer Ã  dresser vos pizzas. La chaleur doit Ãªtre statique et non tournante, une chaleur en bas et gril en haut.'),
(81, 110, 'Disposez une grille Ã  l\'Ã©tage le plus bas de votre four.'),
(82, 110, 'PrÃ©paration finale:'),
(83, 110, 'Farinez un large plan de travail, y dÃ©poser la pÃ¢te qui a doublÃ© de volume durant l\'heure de repos.'),
(84, 110, 'Ã‰crasez la pÃ¢te pour enlever l\'excÃ©dent d\'air.'),
(85, 110, 'Voici la dÃ©marche Ã  suivre prÃ©cisÃ©ment: d\'abord vous devez dÃ©limiter les bords avec le bout des doigts tout en Ã©tirant la pÃ¢te de faÃ§on Ã  crÃ©er les bords de la pizza afin d\'avoir une croÃ»te bien marquÃ©e comme on peut le voir sur la photo. Ensuite, Ã©tirez la pÃ¢te selon la mÃ©thode 12H/12H10'),
(86, 110, 'C\'est un coup de main Ã  prendre mais vous n\'Ãªtes pas obliger de faire voler la pizza si vous n\'y arrivez pas.'),
(87, 110, 'DÃ©posez votre pÃ¢te sur une plaque Ã  pizza.'),
(88, 110, 'DÃ©posez une louche de sauce napolitaine faÃ§on Gusteau puis, Ã©talez-lÃ  Ã  l\'aide de la louche. RÃ©partir la mozarella et le parmesan.'),
(89, 110, 'Ã€ l\'aide d\'un pinceau culinaire, badigeonnez rapidement d\'huile d\'olive les bords de la pizza afin qu\'ils dorent (En effet les fours de notre cuisine ne permettent pas d\'obtenir une croÃ»te bien brunie comme les fours Ã  pizzaÃ¯olo car nos four ne sont pas assez chauds).'),
(90, 110, 'Enfournez pour environ 8 Ã  10 minutes sans ouvrir.'),
(91, 110, 'Ã€ la sortie du four, disposez quelques feuilles de basilic.'),
(92, 110, 'La pÃ¢te doit Ãªtre fine et croustillante au milieu et plus Ã©paisse et moelleuse sur les bords (La pizza italienne se diffÃ©rencie donc de la pizza amÃ©ricaine qui est Ã©paisse partout comme on peut le retrouver avec les pizzas de fast-food).'),
(93, 110, 'Buon appetito !'),
(94, 111, 'Entailler les magrets cÃ´tÃ© peau, afin qu\'ils perdent le maximum de graisse lors de la cuisson'),
(95, 111, 'Faire chauffer une grande poÃªle antiadhÃ©sive. Cuire les magrets, d\'abord cÃ´tÃ© peau, Ã  feu vif, en prenant soin de se dÃ©barrasser de la graisse de cuisson (plusieurs fois si nÃ©cessaire).'),
(96, 111, 'AprÃ¨s avoir Ã©liminÃ© la graisse de cuisson, retourner les magrets cÃ´tÃ© chair, puis diminuer le feu.'),
(97, 111, 'Badigeonner la peau des magrets de miel et saupoudrer de mÃ©lange quatre-Ã©pices. Saler et poivrer.'),
(98, 111, 'Couvrir la poÃªle, et laisser cuire ainsi pendant environ 5 min (la viande doit rester saignante).'),
(99, 111, 'Retirer la viande et laisser reposer quelques minutes sur une planche Ã  dÃ©couper. La viande va perdre du sang.'),
(100, 111, 'Couper la viande en tranches assez fines, puis mettre celles-ci dans un plat. Maintenir Ã  four chaud (environ 120 Â°C) pour terminer la cuisson.'),
(101, 111, 'Pendant ce temps, dÃ©glacer la poÃªle de cuisson avec de l\'eau, du vinaigre au miel (ou du cognac si vous insistez), ou mÃªme le sang rÃ©cupÃ©rÃ© sur la planche Ã  dÃ©couper'),
(102, 111, 'Ajouter du miel, du mÃ©lange quatre-Ã©pices et laisser rÃ©duire Ã  feu doux, afin d\'obtenir une sauce au miel. Rectifier l\'assaisonnement.'),
(103, 111, 'Servir les magrets dans le plat ou sur assiette, avec leur sauce.'),
(104, 112, 'PrÃ©parer la farce : tremper la mie de pain dans le lait.'),
(105, 112, 'Faire fondre les Ã©chalotes hachÃ©es dans le beurre puis ajouter la chair Ã  saucisse et laisser colorer durant quelques minutes.'),
(106, 112, 'Incorporer la mie de pain essorÃ©e, les marrons, le thym, le persil, le cognac, du sel et du poivre.'),
(107, 112, 'En farcir la dinde et recoudre l\'ouverture.'),
(108, 112, 'Huiler la dinde et la dÃ©poser dans un plat. Saler, poivrer, ajouter le laurier et des noisettes de beurre. Verser le bouillon au fond du plat.'),
(109, 112, 'Mettre la dinde dans le four froid puis mettre sur 120Â°C (thermostat 4) pendant 1 heure. Arroser rÃ©guliÃ¨rement de jus de cuisson.'),
(110, 112, 'Augmenter le four Ã  165Â°C (thermostat 5-6) pour 1 heure de cuisson et terminer par 30 minutes de cuisson Ã  210Â°C (thermostat 7).'),
(111, 112, 'Ajouter alors les pommes de terre dans le jus de cuisson et poursuivre la cuisson durant 30 minutes.'),
(125, 114, 'La Marinade du tofu : dans un plat creux, mettre 6 Ã  8 cuillÃ¨res Ã  soupe de sauce de soja. Hacher un morceau de gingembre puis Ã©plucher et hacher lâ€™ail, les ajouter dans la sauce de soja. Ciseler 3 oignons verts et les ajouter Ã  la marinade, puis poivrer. Couper le tofu en dÃ©s, le mettre dans la marinade, ajouter 2 cuillÃ¨res Ã  soupe de miel, bien mÃ©langer. Laisser reposer pendant 2 heures.'),
(126, 114, 'La Marinade des lÃ©gumes : Laver et couper les poivrons , lâ€™oignon et le piment vert. Les ciseler en fines laniÃ¨res, puis les mettre Ã  mariner dans 4 cuillÃ¨res Ã  soupe dâ€™huile dâ€™olive et 2 cuillÃ¨res Ã  soupe de soja, et un peu de poivre.'),
(127, 114, 'La cuisson : Dans un wok, faire sauter les poivrons, oignon et piment, jusquâ€™Ã  ce quâ€™ils soient juste dorÃ©s. Les retirer du wok et les rÃ©server. Dans une grande casserole, porter Ã  Ã©bullition un grand volume dâ€™eau, puis y jeter la moitiÃ© des nouilles chinoises. Faire cuire pendant 2 minutes puis les Ã©goutter.'),
(128, 114, 'Faire sauter le tofu dans un wok avec un peu dâ€™huile chaude. Il faut que le tofu soir bien dorÃ©. Rajouter les lÃ©gumes, puis les nouilles. Faire sauter le tout, en ajoutant le reste de la marinade du tofu, pendant 5 Ã  6 minutes.'),
(129, 114, 'Dresser dans les assiettes, en parsemant de coriandre fraÃ®che hachÃ©e et dâ€™amandes concassÃ©es.'),
(130, 98, 'Couper les tomates et le concombre en petits morceaux. Mettre deux cuillÃ¨re Ã  cafÃ© de mayonnaise et mÃ©langer. Ajouter un petit peu de sel et de poivre. MÃ©langer.'),
(144, 99, 'Laver, Ã´tez le pÃ©doncule des tomates et coupez-les en 4. Mixez-les dans un robot. Disposez-les dans un saladier.'),
(145, 99, 'Ã‰pluchez le concombre, coupez-le en gros cubes et mixez-le dans le robot. Disposez-les avec les tomates.'),
(146, 99, 'Ã‰pluchez l\'oignon blanc, coupez-le en 4 et disposez-le dans le robot, ajoutez les feuilles de menthe et le jus de citron. Mixez et versez le mÃ©lange avec les tomates et le concombre.'),
(147, 99, 'Ajoutez le persil, le sel, le poivre et la semoule, Remuez bien, poser un couvercle dessus et laissez reposer 35 minutes au frigo pour permettre Ã  la semoule de gonfler.'),
(148, 99, 'Servir trÃ¨s frais.'),
(149, 117, 'PrÃ©chauffer le four Ã  180Â°C (thermostat 6).'),
(150, 117, 'Hacher l\'oignon et l\'ail.'),
(151, 117, 'Dans une cocotte en fonte, faire fondre le beurre, et ensuite dorer doucement l\'oignon et lâ€™ail.'),
(152, 117, 'Incorporer le boeuf hachÃ© et laisser cuire doucement 10 min.'),
(153, 117, 'MÃ©langer le chili, le cumin, le concentrÃ© de tomates, et incorporer le tout au boeuf. Ajouter les haricots, le bouillon, du sel et du poivre.'),
(154, 117, 'Couvrir et cuire 25 min au four.'),
(156, 145, 'PrÃ©chauffer le four th6 (180Â°C).'),
(157, 145, 'MÃ©langer dans une terrine, les oeufs avec la farine et le sucre.'),
(158, 145, 'Faire fondre le beurre avec le chocolat au bain-marie. Incorporer au mÃ©lange prÃ©cÃ©dent.'),
(159, 145, 'Verser la prÃ©paration obtenue dans des moules Ã  mini-muffins et dÃ©poser un carrÃ© de chocolat blanc dans chaque empreinte'),
(160, 145, 'Faire cuire 12 Ã  15 min. Laisser refroidir Ã  tempÃ©rature ambiante avant de tous les manger!'),
(161, 147, 'Piquer et faire prÃ©-cuire la pÃ¢te pendant 7 minutes au four Ã  180Â°C (thermostat 6).'),
(162, 147, 'Faire dÃ©congeler les myrtilles au micro-ondes.'),
(163, 147, 'MÃ©langer les oeufs, le sucre, la crÃ¨me et le rhum.'),
(164, 147, 'Mettre cette crÃ¨me dans le fond de tarte, puis ajouter les myrtilles.'),
(165, 147, 'Le tout au four pendant environ 25 minutes.'),
(166, 149, 'Mettre la pÃ¢te feuilletÃ©e dans un plat Ã  tarte, la piquer avec une fourchette, garnir avec les pommes coupÃ©es en morceaux.'),
(167, 149, 'MÃ©langer 90g sucre, les deux Å“ufs, le beurre fondu et verser sur la tarte.'),
(168, 149, 'Enfournez, thermostat 6-7 ( 200Â°) pendant 35 minutes environ.'),
(236, 136, 'Beurrez les 8 tranches de pain de mie sur une seule face. Posez 1 tranche de fromage sur chaque tranche de pain de mie. Posez 1 tranche de jambon pliÃ© en deux sur 4 tranches de pain de mie. Recouvrez avec les autres tartines (face non beurrÃ©e au dessus).'),
(237, 136, 'Dans un bol mÃ©langer le fromage rÃ¢pÃ© avec le lait, le sel, le poivre et la muscade.'),
(238, 136, 'RÃ©partissez le mÃ©lange sur le croque-monsieur'),
(239, 136, 'Placez sur une plaque au four sous le grill pendant 10 mn.'),
(240, 95, 'Laver les lÃ©gumes, couper les aubergines et les courgettes en tranches un peu Ã©paisses (1 cm) dans le sens de la longueur et sans les Ã©plucher.'),
(241, 95, 'DÃ©tailler ensuite ces tranches en bÃ¢tonnet de la mÃªme Ã©paisseur (1 cm)'),
(242, 95, 'Couper ensuite ces bÃ¢tonnets de faÃ§on Ã  vous retrouver avec des petits cubes de lÃ©gumes.'),
(243, 95, 'Vider les poivrons de leurs graines.'),
(244, 95, 'Les tailler en lamelles puis en morceaux (1 cm) pour vous retrouver avec des morceaux de forme Ã  peu prÃ¨s identiques Ã  ceux des courgettes et aubergines.'),
(245, 95, 'ProcÃ©der de la mÃªme maniÃ¨re pour les tomates.'),
(246, 95, 'Au final, vous vous retrouvez avec pleine de petits cubes de lÃ©gumes.'),
(247, 95, 'Trancher finement l\'ail et les olives noires.'),
(248, 95, 'DÃ©tailler en petits morceaux l\'oignon (ou les oignons frais avec le vert), puis mettre l\'huile d\'olive dans une sauteuse et faire revenir tous les lÃ©gumes Ã  feu moyen.'),
(249, 95, 'Saler, poivrer, ajouter le thym et faire mijoter Ã  feu doux, couvert, 20 min en surveillant que cela n\'accroche pas.'),
(250, 95, 'Servir chaud (accompagnÃ© tout simplement d\'Å“ufs au plat).'),
(251, 104, 'Ne pas Ã©plucher les courgettes.\r\n\r\n'),
(252, 104, 'Les couper en 2 (dans la longueur) et Ã´ter les graines centrales.'),
(253, 104, 'Avec un Ã©conome, faire de fines lamelles toujours dans le sens de la longueur.'),
(254, 104, ' Dans un saladier, mÃ©langer: vinaigre,huile, ail, sel, poivre et thym.'),
(255, 104, 'Ajouter les courgettes.'),
(256, 104, 'Couvrir et mettre au frais au moins 15 min.'),
(267, 202, 'PrÃ©chauffer le four Ã  180Â°C (thermostat 6) Etaler la pÃ¢te dans le moule Ã  tarte et la piquer Ã  l\'aide d\'une fourchette'),
(268, 202, 'Mettre un papier cuisson et des pois dessus puis enfourner pour 10 minutes de prÃ©cuisson'),
(269, 202, 'Dans un saladier mÃ©langer les oeufs, le sucre et la crÃ¨me fraÃ®che et verser le mÃ©lange dans le fond de tarte'),
(270, 202, 'Couper les prunes en deux et les disposer de faÃ§on circulaire.'),
(271, 202, 'Enfourner Ã  nouveau pour 30 minutes de cuisson.'),
(273, 205, 'Pour les coques :'),
(274, 205, 'Battre les blancs d\'oeufs Ã  vitesse moyenne. Quand la mousse fait des vagues, ajouter 45 g de sucre semoule. Continuer Ã  battre Ã  vitesse moyenne. Lorsque au retrait du mixeur, les blancs forment un bec d\'oiseau Ã  base large au bout du batteur, incorporer le reste du sucre et le colorant alimentaire. Puis battre les blancs Ã  vitesse maximum jusquâ€™Ã  obtention d\'une base lisse, brillante et homogÃ¨ne.'),
(275, 205, 'Ajouter ensuite le mÃ©lange poudre d\'amande - sucre glace, lentement en ramenant les bords Ã  la spatule, lentement. Former un mÃ©lange homogÃ¨ne, puis tester la prÃ©paration : lorsque vous lever la spatule, un ruban doit se former. Si ce n\'est pas le cas, Ã©craser la prÃ©paration avec la spatule par le milieu, re-tester et recommencer si nÃ©cessaire.'),
(276, 205, 'PrÃ©chauffer votre four Ã  150Â°C (thermostat 5). Chaleur tournante prÃ©fÃ©rable.'),
(277, 205, 'Mettre la prÃ©paration dans une poche Ã  douille et former la coque du macaron : environ 2 cm de diamÃ¨tre. Les espacer sur du papier sulfurisÃ© ou sur une plaque en silicone.'),
(278, 205, 'Enfourner 12 min. Laisser refroidir quelques minutes avant de les retirer de la plaque.'),
(279, 205, 'Vous avez fini les coques ! Ouf !'),
(280, 205, 'La garniture :'),
(281, 205, 'MÃ©langer les ingrÃ©dients dans une casserole a feu fort, porter Ã  Ã©bullition en remuant sans arrÃªt pendant 3 min. Sortir du feu, continuer a mÃ©langer. Quand le mÃ©lange Ã©paissit, appliquer 1/2 cuillÃ¨re Ã  cafÃ© sur la coque du bas, puis placer la coque du haut par dessus.'),
(282, 205, 'Laisser reposer les macarons, les conserver au rÃ©frigÃ©rateur.'),
(283, 206, 'Eplucher, laver et couper les pommes de terre en rondelles fines (NB : ne pas les laver APRES les avoir coupÃ©es, car l\'amidon est nÃ©cessaire Ã  une consistance correcte).'),
(284, 206, 'Hacher l\'ail trÃ¨s finement.'),
(285, 206, 'Porter Ã  Ã©bullition dans une casserole le lait, l\'ail, le sel, le poivre et la muscade puis y plonger les pommes de terre et laisser cuire 10 Ã  15 min, selon leur fermetÃ©.'),
(286, 206, 'PrÃ©chauffer le four Ã  180Â°C (thermostat 6) et beurrer un plat Ã  gratin Ã  l\'aide d\'une feuille de papier essuie-tout.'),
(287, 206, 'Placer les pommes de terre Ã©gouttÃ©es dans le plat. Les recouvrir de crÃ¨me, puis disposer des petites noix de beurre sur le dessus.'),
(288, 206, 'Enfourner pour 50 min Ã  1 heure de cuisson.'),
(289, 106, 'Pour 4 tartelettes ( ou une grande tarte mais je prÃ©fÃ¨re les tartelettes, la pÃ¢te sablÃ©e Ã©tant difficile Ã  couper :))'),
(290, 106, 'PrÃ©parer la pÃ¢te sablÃ©e :'),
(291, 106, 'Couper le beurre en petits morceaux.'),
(292, 106, 'Mettre tous les ingrÃ©dients dans un saladier et tout mÃ©langer Ã  la main ( ou au robot) jusqu\'Ã  former une boule homogÃ¨ne. La rÃ©server au frais au moins 1h pour pouvoir mieux l\'Ã©taler.'),
(293, 106, 'Pendant que la pÃ¢te sablÃ©es pose, prÃ©parer le rhubarb\'curd :'),
(294, 106, 'MÃ©langer le sucre avec le jus de rhubarbe sur feu doux, jusquâ€™Ã  ce que le sucre soit fondu.'),
(295, 106, 'A part, dans un bol (qui pourra aller au bain marie dans l\'Ã©tape suivante), battre la maÃ¯zena avec 1 oeuf. Lorsquâ€™elle est bien dissoute, incorporer les 2 autres oeufs, toujours en fouettant.'),
(296, 106, 'Incorporer ensuite le jus de rhubarbe chaud en fouettant bien, le mÃ©lange commence Ã  Ã©paissir. Placer le bol au bain marie et faire Ã©paissir sur feu doux tout en fouettant trÃ¨s rÃ©guliÃ¨rement.'),
(297, 106, 'Une fois quâ€™elle est bien Ã©paisse, transfÃ©rer dans un autre bol ou saladier pour la refroidir.'),
(298, 106, 'Pendant que le curd refroidit, cuire la pÃ¢te sablÃ©e Ã  blanc. Etaler la pÃ¢te sablÃ©e et la rÃ©partir dans les 4 moules Ã  tartelette (ou dans un grand moule Ã  tarte). Puis enfourner entre 10 et 15 min (en fonction de votre four) Ã  200Â°C (thermostat 6-7).'),
(299, 106, 'Laisser refroidir les fonds une bonne demi heure.'),
(300, 106, 'Monter les tartelettes :'),
(301, 106, '- mettre une couche de rhubarb\' curd dans les fonds de tarte'),
(302, 106, '- laver et Ã©queuter les fraises'),
(303, 106, '- les couper en 2 et les disposer sur le rhubarb\'curd.'),
(304, 106, '- conserver au frais avant de servir');

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE IF NOT EXISTS `ingredients` (
  `idIngredients` int(11) NOT NULL AUTO_INCREMENT,
  `nomIngredients` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`idIngredients`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ingredients`
--

INSERT INTO `ingredients` (`idIngredients`, `nomIngredients`) VALUES
(1, 'carotte'),
(2, 'courgette'),
(3, 'tomate'),
(4, 'poivron'),
(5, 'oignon'),
(6, 'ail'),
(7, 'persil'),
(8, 'poivre'),
(9, 'huile_olive'),
(10, 'sel'),
(11, 'vinaigre'),
(12, 'aubergine'),
(13, 'pomme_de_terre'),
(14, 'endive'),
(26, 'piment'),
(27, 'sauce_soja'),
(28, 'poulet'),
(29, 'fraise'),
(30, 'salade'),
(31, 'couscous'),
(32, 'chocolat'),
(34, 'oeufs'),
(35, 'pate_brisee'),
(36, 'lait'),
(37, 'beurre'),
(38, 'farine'),
(39, 'sucre'),
(40, 'saumon'),
(41, 'parmesan'),
(42, 'basilic'),
(43, 'mozzarella'),
(44, 'magret_de_canard'),
(45, 'pain_de_mie'),
(46, 'thym'),
(47, 'feuille_de_laurier'),
(48, 'cognac'),
(49, 'huilde_de_tournesol'),
(50, 'marron'),
(51, 'dinde'),
(52, 'levure_de_boulanger'),
(53, 'eau'),
(54, 'poivron_vert'),
(55, 'poivron_rouge'),
(56, 'coriandre'),
(57, 'gingembre'),
(58, 'amandes_entieres'),
(59, 'miel'),
(60, 'tofu'),
(61, 'nouilles_chinoises_aux_oeufs'),
(62, 'piment_vert'),
(74, 'mayonnaise'),
(75, 'jus_de_citron'),
(76, 'semoule'),
(77, 'concombre'),
(78, 'menthe'),
(79, 'chair_a_saucisse'),
(80, 'echalote'),
(81, 'bouillon'),
(82, 'chili_en_poudre'),
(83, 'cumin_en_poudre'),
(84, 'haricots_rouges'),
(85, 'concentre_de_tomates'),
(86, 'bouillon_de_boeuf'),
(87, 'boeuf_hache'),
(88, 'gruyere_rape'),
(89, 'muscade'),
(90, 'jambon'),
(91, 'toastinette'),
(92, 'chocolat_blanc'),
(93, 'chocolat_noir'),
(94, 'creme_fraiche'),
(95, 'rhum_blanc'),
(96, 'pate_sablee'),
(97, 'myrtilles_surgelees'),
(98, 'pomme'),
(99, 'pate_feuilletee'),
(100, 'jaune_oeuf'),
(101, 'huile'),
(102, 'sucre_semoule'),
(103, 'sucre_vanille'),
(104, 'chocolat_patissier'),
(105, 'tomates_pelees'),
(106, 'sirop_sucre_canne'),
(107, 'levure'),
(108, 'eau_minerale'),
(109, 'fleur_de_sel'),
(110, 'quatre_epice'),
(111, 'poivre_au_moulin'),
(112, 'olive_noire_denoyautees'),
(113, 'vinaigre_balsamique'),
(114, 'vinaigre_de_vin'),
(115, 'semoule_moyenne'),
(116, 'citron'),
(117, 'aneth'),
(118, 'poivron_jaune'),
(119, 'noix_saint_jacques'),
(120, 'ciboulette'),
(121, 'reine_claude'),
(124, 'nouille'),
(125, 'sucre_poudre'),
(126, 'coulis_de_framboise'),
(127, 'amande_en_poudre'),
(128, 'colorant_alimentaire'),
(129, 'blanc_oeuf'),
(130, 'creme'),
(131, 'maizena'),
(132, 'rhubarbe');

-- --------------------------------------------------------

--
-- Structure de la table `niveaudedifficultes`
--

DROP TABLE IF EXISTS `niveaudedifficultes`;
CREATE TABLE IF NOT EXISTS `niveaudedifficultes` (
  `idNiveauDeDifficultes` int(11) NOT NULL AUTO_INCREMENT,
  `Niveau` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`idNiveauDeDifficultes`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `niveaudedifficultes`
--

INSERT INTO `niveaudedifficultes` (`idNiveauDeDifficultes`, `Niveau`) VALUES
(1, 'Facile'),
(2, 'Moyen'),
(3, 'Difficile');

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

DROP TABLE IF EXISTS `recette`;
CREATE TABLE IF NOT EXISTS `recette` (
  `idRecette` int(11) NOT NULL AUTO_INCREMENT,
  `idNiveauDeDifficultes` int(11) DEFAULT NULL,
  `idCout` int(11) DEFAULT NULL,
  `Nom` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Photo` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `Decrire` text CHARACTER SET utf8,
  `TempsPreparation` text CHARACTER SET utf8,
  PRIMARY KEY (`idRecette`),
  KEY `idNiveauDeDifficultes` (`idNiveauDeDifficultes`),
  KEY `idCout` (`idCout`)
) ENGINE=InnoDB AUTO_INCREMENT=207 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`idRecette`, `idNiveauDeDifficultes`, `idCout`, `Nom`, `Photo`, `Decrire`, `TempsPreparation`) VALUES
(95, 1, 1, 'ratatouille mÃ©ridionale', 'assets/images/ratatouille.jpg', '	C\'est une recette pour4 personnes.', '55 minutes'),
(98, 1, 1, 'Salade de tomates et concombres', 'assets/images/saladeA.jpg', 'C\'est une recette pour deux personnes.', '10 minutes'),
(99, 1, 1, 'TaboulÃ© rapide', 'assets/images/taboulÃ©.jpg', '	C\'est une recette pour 6 personnes.', '20 minutes'),
(100, 2, 2, 'eclair', 'assets/images/eclairA.jpg', 'C\'est une recette pour 10 Ã©clairs.', '1 heure 30'),
(102, 2, 2, 'flan', 'assets/images/flanA.jpg', 'C\'est une recette pour 4 personnes.', '35 minutes'),
(103, 1, 1, 'gÃ¢teau au chocolat', 'assets/images/gateauAuChocolat.jpg', 'C\'est une recette pour 6 personnes.', '40 minutes'),
(104, 1, 1, 'salade de courgette crues Ã  la provenÃ§ale', 'assets/images/saladeDeCourgette.jpg', 'TrÃ¨s frais et trÃ¨s surprenant car la courgette est crue.C\'est une recette pour 4 personnes.', '10 minutes'),
(105, 1, 2, 'Tartare de saumon et Saint-Jacques aux herbes fraÃ®ches', 'assets/images/tartareDeSaumonA.jpg', 'C\'est une recette pour 4 personnes.', '20 minutes'),
(106, 1, 2, 'Tartelette aux fraises et rhubarb\'curd', 'assets/images/tartletteAuxFraisesA.jpg', 'Pour 4 personnes.Â« Si vous avez trop de rhubarb\'curd, il se garde une semaine au frais dans un pot fermÃ© et se dÃ©guste dans les yaourts, sur des tartines... Â»', '1 heure et 45 minutes'),
(110, 2, 1, 'la pizza margherita', 'assets/images/margarita.jpg', 'C\'est une recette rÃ©alisable Ã  la maison.C\'est pour une personne.', '1h10'),
(111, 2, 3, 'Magret de canard au miel et quatre Ã©pices', 'assets/images/magretDeCanard.jpg', '	C\'est une recette pour 4 personnes.', '30 minutes'),
(112, 2, 3, 'Dinde farcie aux marrons', 'assets/images/dinde.jpg', 'C\'est une recette pour 8 personnes', '\03 heures 25 minutes'),
(114, 1, 2, 'Nouilles chinoises au tofu Ã©picÃ©', 'assets/images/nouillesChinoisesAuTofu.jpg', 'C\'est une recette pour deux personnes.', '30 minutes'),
(117, 1, 1, 'Chili con carne', 'assets/images/chiliConCarneA.jpg', 'C\'est une recette pour 4 personnes le cout est bon marchÃ©.', '35 minutes'),
(136, 1, 1, 'croque-monsieur', 'assets/images/croqueMonsieur.jpg', 'C\'est pour 4 personnes.', '15  minutes'),
(145, 1, NULL, 'Muffins au chocolat', 'assets/images/muffin.jpg', 'C\'est une recette pour 12 mini muffins.', '22 minutes environ'),
(147, 1, 1, 'Tarte aux myrtilles facile parfumÃ©e au rhum', 'assets/images/tarte_aux_myrtilles.jpg', 'C\'est une recette pour 8 personnes.', '40 minutes'),
(149, 1, 1, 'Tarte aux pommes facile', 'assets/images/tarteAuxPommes.jpg', 'C\'est une recette pour 6 personnes.', '1 heure et 5 minutes'),
(202, 1, 2, 'Tarte aux prunes facile', 'assets/images/tartePrunes.jpg', 'C\'est une recette pour 6 personnes.', '55 minutes'),
(205, 2, 1, 'Macarons framboise', 'assets/images/macaronFramboise.jpg', 'C\'est une recette pour 24 piÃ¨ces.', '52 minutes'),
(206, 1, 1, 'Gratin Dauphinois', 'assets/images/gratinDauphinois.jpg', 'C\'est une recette pour 6 personnes.\r\nUn gratin rÃ©ussi se caractÃ©rise par des pommes de terre restÃ©es un peu fermes.', '1 heure 25 minutes');

-- --------------------------------------------------------

--
-- Structure de la table `recette_ingredients`
--

DROP TABLE IF EXISTS `recette_ingredients`;
CREATE TABLE IF NOT EXISTS `recette_ingredients` (
  `idRecetteEtIngredients` int(11) NOT NULL AUTO_INCREMENT,
  `idRecette` int(11) DEFAULT NULL,
  `idIngredients` int(11) DEFAULT NULL,
  `nombreIngredients` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`idRecetteEtIngredients`),
  KEY `idIngredients` (`idIngredients`),
  KEY `idRecette` (`idRecette`)
) ENGINE=InnoDB AUTO_INCREMENT=546 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recette_ingredients`
--

INSERT INTO `recette_ingredients` (`idRecetteEtIngredients`, `idRecette`, `idIngredients`, `nombreIngredients`) VALUES
(60, NULL, 4, ''),
(62, NULL, 4, ''),
(64, NULL, 4, ''),
(65, NULL, 4, ''),
(66, NULL, 7, ''),
(67, NULL, 7, ''),
(68, NULL, 13, ''),
(77, 98, 5, '1 demi'),
(78, 98, 7, '2'),
(82, 99, 7, '4 cuillÃ¨re Ã  soupe'),
(92, 103, 37, '100 g'),
(94, 103, 38, '50 g'),
(96, 104, 2, '4'),
(97, 104, 5, 'gousse'),
(98, 105, 9, '400 g'),
(100, 105, 27, '1'),
(101, 105, 40, '200 g'),
(103, 106, 37, '250 g'),
(104, 106, 38, '150 g'),
(106, 106, 39, '115 g'),
(122, 110, 42, '100 g'),
(123, 110, 9, '5 g'),
(124, 110, 43, '2 cuillÃ¨re Ã  soupe de double '),
(125, 110, 41, ''),
(130, 111, 44, '2'),
(131, 112, 37, '125 g'),
(132, 112, 48, '5 cl'),
(133, 112, 47, '1'),
(134, 112, 49, '2 cuillÃ§re Ã  soupe'),
(135, 112, 36, '15 cl'),
(136, 112, 45, '225 g'),
(138, 112, 46, ' 3kg de 1'),
(139, 112, 51, '300 g'),
(140, 112, 50, '1.5 kg'),
(142, 112, 13, '300 g'),
(151, 114, 6, '4 gousses'),
(152, 114, 58, '1 poignÃ©e'),
(153, 114, 56, '1 paquet'),
(154, 114, 57, '1 botte'),
(155, 114, 59, '1'),
(156, 114, 61, '1'),
(157, 114, 5, '1'),
(158, 114, 62, '1 bloc'),
(160, 114, 55, '2'),
(161, 114, 54, ''),
(162, 114, 60, ''),
(174, 98, 74, ''),
(175, 99, 5, '1'),
(176, 99, 8, '1 pincÃ©e'),
(177, 99, 75, '200 ml'),
(179, 99, 77, '6 branches'),
(180, 99, 78, '1 cuillÃ¨re'),
(181, 103, 39, '100 g'),
(182, 112, 79, '4'),
(183, 112, 80, '15 cl'),
(184, 112, 81, ''),
(215, 117, 6, '2 gousses '),
(216, 117, 37, '50 g'),
(217, 117, 87, '500 g'),
(218, 117, 86, '30 cl'),
(219, 117, 82, NULL),
(220, 117, 85, NULL),
(221, 117, 83, NULL),
(222, 117, 84, NULL),
(223, 117, 5, NULL),
(224, 117, 7, NULL),
(225, 117, 8, NULL),
(227, 136, 37, '1 pincÃ©e'),
(228, 136, 36, '4 tranches'),
(229, 136, 45, '8 tranches'),
(230, 136, 8, '1 pincÃ©e'),
(260, 145, 37, '95 g'),
(262, 145, 38, '50 g'),
(264, 145, 39, '75 g'),
(265, 136, 88, '8 tranches'),
(266, 136, 89, NULL),
(267, 136, 90, NULL),
(268, 136, 91, NULL),
(270, 147, 39, '80 g'),
(271, 149, 37, '60 g'),
(273, 149, 39, '90 g'),
(282, 145, 92, '12 carrÃ©s'),
(283, 145, 93, '80 g'),
(421, 147, 94, NULL),
(422, 147, 95, NULL),
(423, 147, 96, NULL),
(424, 147, 97, NULL),
(425, 149, 98, '5'),
(426, 149, 99, ''),
(427, 100, 37, '75 g'),
(428, 100, 53, '25 cl'),
(429, 100, 38, '150 g'),
(432, 100, 39, '1 cuillÃ¨re Ã  soupe'),
(433, 100, 100, '1'),
(434, 100, 101, NULL),
(435, 102, 100, '2'),
(436, 102, 36, '40 cl'),
(438, 102, 102, '120 g'),
(439, 102, 103, '1 sachet'),
(440, 102, 34, '2'),
(441, 103, 34, '3'),
(442, 103, 104, '200 g'),
(443, 110, 6, '1'),
(444, 110, 85, '235 g'),
(445, 110, 47, '9 cl'),
(446, 110, 9, '5 g'),
(447, 110, 5, NULL),
(448, 110, 8, NULL),
(450, 110, 46, NULL),
(451, 110, 105, NULL),
(452, 110, 106, NULL),
(454, 110, 108, NULL),
(455, 110, 109, NULL),
(456, 110, 38, NULL),
(457, 110, 52, NULL),
(458, 111, 59, '3 cuillÃ¨re Ã  soupe'),
(459, 111, 8, '1 cuillÃ¨re Ã  cafÃ©'),
(461, 111, 110, NULL),
(462, 111, 10, NULL),
(463, 114, 80, NULL),
(464, 114, 27, NULL),
(465, 114, 111, NULL),
(466, 95, 6, '3 gousses'),
(467, 95, 12, '2'),
(468, 95, 2, '2'),
(469, 95, 9, '6 cuillÃ¨re Ã  soupe'),
(470, 95, 5, '1'),
(471, 95, 8, '1'),
(472, 95, 55, '1'),
(473, 95, 54, '3'),
(474, 95, 10, '10'),
(475, 95, 46, NULL),
(477, 95, 112, NULL),
(478, 104, 6, NULL),
(479, 104, 9, NULL),
(480, 104, 8, NULL),
(481, 104, 10, NULL),
(482, 104, 46, NULL),
(483, 104, 113, NULL),
(484, 104, 114, NULL),
(485, 98, 77, NULL),
(486, 98, 3, NULL),
(487, 99, 10, '5'),
(488, 99, 3, '400 g'),
(489, 99, 115, NULL),
(490, 105, 109, NULL),
(491, 105, 7, NULL),
(492, 105, 111, NULL),
(493, 105, 55, NULL),
(494, 105, 54, NULL),
(495, 105, 116, NULL),
(496, 105, 117, NULL),
(497, 105, 118, NULL),
(498, 105, 119, NULL),
(499, 105, 120, NULL),
(519, 202, 94, '100 g'),
(520, 202, 34, '2'),
(521, 202, 35, '1'),
(522, 202, 121, '500 g'),
(523, 202, 39, '75 g'),
(526, 205, 125, '40 g'),
(527, 205, 126, '70 g'),
(528, 205, 127, '80 g'),
(529, 205, 128, '15 gouttes'),
(530, 205, 129, '75 g'),
(531, 205, 37, '30 g'),
(532, 205, 102, '90 g'),
(533, 206, 130, '30 centiLitre'),
(534, 206, 6, '2 gousses'),
(535, 206, 37, '100 g'),
(536, 206, 36, '1 litre'),
(537, 206, 89, ''),
(538, 206, 8, ''),
(539, 206, 13, '1.2 kg'),
(540, 206, 10, ''),
(541, 106, 34, '4'),
(542, 106, 10, 'une pincÃ©e'),
(543, 106, 131, 'une cuillÃ¨re Ã  soupe'),
(544, 106, 132, '20 cl'),
(545, 106, 29, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `recette_typesdeplats`
--

DROP TABLE IF EXISTS `recette_typesdeplats`;
CREATE TABLE IF NOT EXISTS `recette_typesdeplats` (
  `idRecetteEtTypesDePlats` int(11) NOT NULL AUTO_INCREMENT,
  `idRecette` int(11) NOT NULL,
  `idTypesDePlats` int(11) DEFAULT NULL,
  PRIMARY KEY (`idRecetteEtTypesDePlats`),
  KEY `idRecette` (`idRecette`),
  KEY `idTypesDePlats` (`idTypesDePlats`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recette_typesdeplats`
--

INSERT INTO `recette_typesdeplats` (`idRecetteEtTypesDePlats`, `idRecette`, `idTypesDePlats`) VALUES
(3, 98, 1),
(4, 99, 1),
(5, 100, 3),
(6, 102, 3),
(7, 103, 3),
(8, 104, 1),
(9, 105, 1),
(10, 106, 3),
(14, 110, 2),
(15, 111, 2),
(16, 112, 2),
(18, 114, 2),
(20, 117, 2),
(34, 136, 2),
(43, 145, 3),
(44, 147, 3),
(45, 149, 3),
(95, 202, 3),
(97, 205, 3),
(98, 206, 2);

-- --------------------------------------------------------

--
-- Structure de la table `recette_ustensiles`
--

DROP TABLE IF EXISTS `recette_ustensiles`;
CREATE TABLE IF NOT EXISTS `recette_ustensiles` (
  `idRecetteUstensile` int(11) NOT NULL AUTO_INCREMENT,
  `idRecette` int(11) NOT NULL,
  `idUstensiles` int(11) NOT NULL,
  PRIMARY KEY (`idRecetteUstensile`),
  KEY `idRecette` (`idRecette`),
  KEY `idUstensiles` (`idUstensiles`)
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recette_ustensiles`
--

INSERT INTO `recette_ustensiles` (`idRecetteUstensile`, `idRecette`, `idUstensiles`) VALUES
(1, 206, 3),
(2, 206, 4),
(3, 206, 5),
(4, 206, 6),
(5, 206, 7),
(6, 206, 8),
(7, 206, 9),
(8, 206, 10),
(47, 117, 13),
(48, 117, 10),
(49, 117, 11),
(50, 117, 4),
(51, 117, 1),
(52, 117, 7),
(53, 117, 9),
(58, 136, 19),
(59, 136, 16),
(60, 136, 1),
(61, 136, 7),
(62, 136, 18),
(63, 136, 20),
(64, 112, 10),
(65, 112, 6),
(66, 112, 7),
(67, 112, 21),
(74, 100, 10),
(75, 100, 19),
(76, 100, 6),
(77, 100, 1),
(78, 100, 24),
(79, 100, 7),
(80, 100, 23),
(81, 100, 22),
(82, 100, 20),
(88, 102, 7),
(89, 102, 25),
(90, 102, 20),
(92, 103, 10),
(93, 103, 6),
(94, 103, 24),
(95, 103, 7),
(96, 103, 20),
(97, 103, 29),
(98, 103, 30),
(99, 103, 31),
(100, 110, 10),
(101, 110, 6),
(102, 110, 7),
(103, 110, 23),
(104, 110, 20),
(105, 110, 32),
(106, 110, 33),
(107, 110, 34),
(108, 205, 10),
(109, 205, 6),
(110, 205, 1),
(111, 205, 24),
(112, 205, 7),
(113, 205, 32),
(114, 205, 22),
(115, 205, 20),
(116, 205, 35),
(117, 205, 36),
(118, 205, 37),
(119, 111, 4),
(120, 111, 13),
(121, 111, 7),
(122, 111, 23),
(123, 111, 9),
(124, 111, 21),
(125, 111, 20),
(126, 111, 38),
(127, 111, 39),
(128, 145, 10),
(129, 145, 6),
(130, 145, 1),
(131, 145, 7),
(132, 145, 29),
(133, 145, 20),
(134, 145, 40),
(135, 114, 6),
(136, 114, 4),
(137, 114, 1),
(138, 114, 5),
(139, 114, 32),
(140, 114, 21),
(141, 114, 41),
(142, 114, 42),
(143, 95, 4),
(144, 95, 34),
(145, 95, 5),
(146, 95, 21),
(147, 95, 38),
(148, 95, 43),
(149, 104, 4),
(150, 104, 13),
(151, 104, 1),
(152, 104, 5),
(153, 104, 37),
(154, 104, 20),
(155, 98, 4),
(156, 98, 1),
(157, 99, 13),
(158, 99, 2),
(159, 99, 20),
(160, 105, 39),
(161, 105, 4),
(162, 105, 13),
(163, 105, 1),
(164, 105, 34),
(165, 105, 32),
(166, 105, 2),
(167, 105, 20),
(168, 105, 44),
(169, 105, 45),
(170, 147, 10),
(171, 147, 1),
(172, 147, 7),
(173, 147, 46),
(174, 147, 47),
(175, 147, 48),
(176, 149, 10),
(177, 149, 1),
(178, 149, 7),
(179, 149, 47),
(180, 149, 46),
(181, 202, 4),
(182, 202, 1),
(183, 202, 7),
(184, 202, 47),
(185, 202, 46),
(186, 202, 36),
(187, 202, 20),
(188, 202, 49),
(189, 106, 10),
(190, 106, 19),
(191, 106, 4),
(192, 106, 1),
(193, 106, 24),
(194, 106, 7),
(195, 106, 46),
(196, 106, 2),
(197, 106, 49),
(198, 106, 20),
(199, 106, 50);

-- --------------------------------------------------------

--
-- Structure de la table `recuperationmotdepasse`
--

DROP TABLE IF EXISTS `recuperationmotdepasse`;
CREATE TABLE IF NOT EXISTS `recuperationmotdepasse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `token` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recuperationmotdepasse`
--

INSERT INTO `recuperationmotdepasse` (`id`, `email`, `token`) VALUES
(1, 'paulineaoucher1@gmail.com', '5uZ805rIla'),
(10, 'paulineaoucher3@gmail.com', 'BvBKr1D5Pe'),
(11, 'mariarobertaoucher@gmail.com', '0M8Cb1Yikg');

-- --------------------------------------------------------

--
-- Structure de la table `typesdeplats`
--

DROP TABLE IF EXISTS `typesdeplats`;
CREATE TABLE IF NOT EXISTS `typesdeplats` (
  `idTypesDePlats` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`idTypesDePlats`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typesdeplats`
--

INSERT INTO `typesdeplats` (`idTypesDePlats`, `categorie`) VALUES
(1, 'Entree'),
(2, 'Menu_Principal'),
(3, 'Dessert');

-- --------------------------------------------------------

--
-- Structure de la table `ustensiles`
--

DROP TABLE IF EXISTS `ustensiles`;
CREATE TABLE IF NOT EXISTS `ustensiles` (
  `idUstensiles` int(11) NOT NULL AUTO_INCREMENT,
  `nomUstensiles` varchar(50) NOT NULL,
  PRIMARY KEY (`idUstensiles`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ustensiles`
--

INSERT INTO `ustensiles` (`idUstensiles`, `nomUstensiles`) VALUES
(1, 'cuillere_en_bois'),
(2, 'robot_patissier'),
(3, 'plat_a_gratin'),
(4, 'couteau'),
(5, 'econome'),
(6, 'casserole'),
(7, 'four'),
(8, 'presse_ail'),
(9, 'planche_a_decouper'),
(10, 'balance_de_cuisine'),
(11, 'cocotte_en_font'),
(13, 'couvercle'),
(16, 'croque_monsieur'),
(18, 'rape'),
(19, 'bol'),
(20, 'saladier'),
(21, 'plat'),
(22, 'poche_a_douille'),
(23, 'pinceau'),
(24, 'fouet_cuisine'),
(25, 'ramequin'),
(28, 'autre'),
(29, 'grille_a_patisserie'),
(30, 'moule_a_manque'),
(31, 'maryse'),
(32, 'mixeur'),
(33, 'louche'),
(34, 'denoyauteur'),
(35, 'spatule'),
(36, 'papiers_sulfurises'),
(37, 'frigo'),
(38, 'poele'),
(39, 'assiette'),
(40, 'moule_muffins'),
(41, 'wok'),
(42, 'paire_de_ciseaux'),
(43, 'sauteuse'),
(44, 'cercle_a_patisserie'),
(45, 'chinois'),
(46, 'moule_a_tarte'),
(47, 'fourchette'),
(48, 'micro-onde'),
(49, 'rouleau_a_patisserie'),
(50, 'moule_a_tartelette');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Prenom` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Mail` varchar(255) CHARACTER SET utf8 NOT NULL,
  `MotDePasse` varchar(255) CHARACTER SET utf8 NOT NULL,
  `EstSuperAdmin` int(11) DEFAULT NULL,
  `Aleatoire` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `Valida` int(1) DEFAULT '0',
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `Nom`, `Prenom`, `Mail`, `MotDePasse`, `EstSuperAdmin`, `Aleatoire`, `Valida`) VALUES
(1, 'ROBERT', 'Elisa', 'elisaaki@gmail.com', 'fc899596852a645ebea90431822add2180cf2bd5', 1, 'valide', 1),
(2, 'ROBERT AOUCHER', 'AmÃ©lie', 'amelieaoucher@gmail.com', 'sdgsgg', 0, '', 0),
(4, 'MARTIN', 'sophie', 'sophie@gmail.com', '7b52009b64fd0a2a49e6d8a939753077792b0554', NULL, '', 0),
(6, 'AOUCHER', 'Hamid', 'hamid@gmail.com', '7b52009b64fd0a2a49e6d8a939753077792b0554', NULL, 'valide', 1),
(7, 'desgraves', 'agnÃ¨s', 'agnesROBERT@gmail.com', '6c0596b8ac609191181a90517d51c0b486f23799', NULL, 'valide', 1),
(8, 'AOUCHER', 'Nathan', 'nathanAoucher@gmail.com', 'bf3ccfa1706b61d8ff5a2f7dbb99a5abca63bbc1', NULL, '', 1),
(16, 'ROBERT', 'elisa', 'elisaaoucher4@gmail.com', '17318137393b737acb03fe377761a9c7b4b8553e', NULL, 'aDEEdgmtLp', 0),
(45, 'ROBERT AOUCHER', 'Pauline', 'paulineaoucher1@gmail.com', 'fc899596852a645ebea90431822add2180cf2bd5', NULL, 'valide', 1),
(51, 'Desgraves', 'Sophie', 'Sophiedesgraves@gmail.com', 'fc899596852a645ebea90431822add2180cf2bd5', 1, NULL, 0),
(52, 'Amour', 'amour', 'paulineaoucher@gmail.com', 'fc899596852a645ebea90431822add2180cf2bd5', 0, '60mpDBj8cE', 1),
(53, 'Amour', 'amour', 'paulineaoucher3@gmail.com', 'bd15bf31ba686feb74118cd8d1aee57ebf735838', 1, 'valide', 1),
(54, 'Amour', 'amour', 'justine4411110@gmail.com', 'fc899596852a645ebea90431822add2180cf2bd5', NULL, 'valide', 1),
(58, 'aoucher', 'elisa', 'corentin3@hotmail.com', 'fc899596852a645ebea90431822add2180cf2bd5', 0, NULL, 0),
(59, 'aoucher', 'elisa', 'elisabethROBERTAOUCHER@gmail.com', 'fc899596852a645ebea90431822add2180cf2bd5', 0, NULL, 0),
(60, 'aoucher', 'Nathan', 'nathan@hotmail.com', 'fc899596852a645ebea90431822add2180cf2bd5', 0, NULL, 0),
(61, 'aoucher', 'NathanLePlusaBeauBÃ©bÃ©', 'nathan1@gmail.com', 'fc899596852a645ebea90431822add2180cf2bd5', 0, NULL, 1),
(62, 'aoucher', 'Nathan', 'nathan2@gmail.com', 'fc899596852a645ebea90431822add2180cf2bd5', 0, NULL, 0),
(63, 'aoucher', 'Nathan', 'nathan3@gmail.com', 'fc899596852a645ebea90431822add2180cf2bd5', 0, 'valide', 1),
(64, 'aoucher', 'Nathan', 'nathan5@gmail.com', 'e4b4cd4210ee87c60da653c1b6a77d529c1a079d', 0, NULL, 0),
(71, 'ROBERT', 'elisa', 'elisaaou487@gmail.com', 'fc899596852a645ebea90431822add2180cf2bd5', NULL, 'valide', 1),
(72, 'ROBERT', 'elisa', 'elisabeaoucher@gmail.com', 'fc899596852a645ebea90431822add2180cf2bd5', NULL, 'valide', 1),
(73, 'robert', 'elisa', 'elisaaki_la@hotmail.com', '787dc097fe4149bb7aa886a686046132af79c9fd', NULL, 'sbMhWSoRTZ', 0),
(74, 'ROBERT AOUCHER', 'Elisa', 'elisaakila@gmail.com', '1041179cbdda366fd7b0347f09255f775170e103', NULL, 'Ejq5kI8acx', 0),
(77, 'ROBERT', 'Pauline', 'paulineT@gmail.com', 'fc899596852a645ebea90431822add2180cf2bd5', 1, NULL, 0),
(78, 'ROBERT', 'Benedicte', 'benedicte@gmail.fr', 'fc899596852a645ebea90431822add2180cf2bd5', 1, 'valide', 1),
(79, 'ROBERT', 'Benedicte', 'benedicte1@gmail.fr', '4a5fe2d99fe2500c0c38a47ccd61d838008080e5', 1, 'valide', 1),
(80, 'ROBERT', 'Francois', 'francois@gmail.fr', 'fc899596852a645ebea90431822add2180cf2bd5', 1, 'valide', 1),
(81, 'ROBERT', 'CorentinR', 'corentinR@gmail.com', 'fc899596852a645ebea90431822add2180cf2bd5', 1, 'valide', 1),
(82, 'ROBERT AOUCHER', 'AmÃ©lie', 'amelieEmma@gmail.com', 'fc899596852a645ebea90431822add2180cf2bd5', 1, 'valide', 1),
(83, 'AOUCHER', 'Olivia', 'Olivia@gmail.fr', 'fc899596852a645ebea90431822add2180cf2bd5', 0, 'valide', 1),
(85, 'Martin', 'JÃ©rÃ©mie', 'jeremieMartin@gmail.com', 'fc899596852a645ebea90431822add2180cf2bd5', 0, 'valide', 1),
(87, 'robert', 'maria', 'mariarobertaoucher@gmail.com', 'fc899596852a645ebea90431822add2180cf2bd5', NULL, 'valide', 1),
(88, 'robert', 'Olivia1', 'oliviua3@gmail.com', 'fc899596852a645ebea90431822add2180cf2bd5', NULL, 'PLMbUtE2g6', 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_recette`
--

DROP TABLE IF EXISTS `utilisateur_recette`;
CREATE TABLE IF NOT EXISTS `utilisateur_recette` (
  `idUtilisateurEtRecette` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilisateur` int(11) NOT NULL,
  `idRecette` int(11) NOT NULL,
  `favoris` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUtilisateurEtRecette`) USING BTREE,
  KEY `idUtilisateur` (`idUtilisateur`),
  KEY `idRecette` (`idRecette`)
) ENGINE=InnoDB AUTO_INCREMENT=552 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur_recette`
--

INSERT INTO `utilisateur_recette` (`idUtilisateurEtRecette`, `idUtilisateur`, `idRecette`, `favoris`) VALUES
(94, 61, 97, 97),
(501, 45, 97, 97),
(502, 45, 105, 105),
(505, 45, 109, 109),
(531, 61, 104, 104),
(532, 61, 96, 96),
(533, 61, 102, 102),
(535, 61, 98, 98),
(539, 1, 99, 99),
(544, 53, 102, 102),
(545, 53, 206, 206),
(547, 53, 99, 99),
(550, 53, 98, 98),
(551, 53, 110, 110);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etape`
--
ALTER TABLE `etape`
  ADD CONSTRAINT `etape_ibfk_1` FOREIGN KEY (`idRecette`) REFERENCES `recette` (`idRecette`);

--
-- Contraintes pour la table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `recette_ibfk_1` FOREIGN KEY (`idNiveauDeDifficultes`) REFERENCES `niveaudedifficultes` (`idNiveauDeDifficultes`),
  ADD CONSTRAINT `recette_ibfk_2` FOREIGN KEY (`idCout`) REFERENCES `coutdelarecette` (`idCout`);

--
-- Contraintes pour la table `recette_ingredients`
--
ALTER TABLE `recette_ingredients`
  ADD CONSTRAINT `recette_ingredients_ibfk_1` FOREIGN KEY (`idIngredients`) REFERENCES `ingredients` (`idIngredients`),
  ADD CONSTRAINT `recette_ingredients_ibfk_2` FOREIGN KEY (`idRecette`) REFERENCES `recette` (`idRecette`);

--
-- Contraintes pour la table `recette_ustensiles`
--
ALTER TABLE `recette_ustensiles`
  ADD CONSTRAINT `recette_ustensiles_ibfk_1` FOREIGN KEY (`idRecette`) REFERENCES `recette` (`idRecette`),
  ADD CONSTRAINT `recette_ustensiles_ibfk_2` FOREIGN KEY (`idUstensiles`) REFERENCES `ustensiles` (`idUstensiles`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
