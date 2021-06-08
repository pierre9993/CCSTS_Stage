-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 08, 2021 at 02:23 PM
-- Server version: 5.7.11
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccstdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `actualite`
--

CREATE TABLE `actualite` (
  `actu_id` int(11) NOT NULL,
  `actu_img_un` varchar(100) DEFAULT NULL,
  `actu_titre` varchar(100) NOT NULL,
  `actu_paragraphe_un` varchar(500) NOT NULL,
  `actu_image_deux` varchar(100) DEFAULT NULL,
  `actu_description_image_deux` varchar(500) DEFAULT NULL,
  `actu_paragraphe_deux` varchar(500) DEFAULT NULL,
  `actu_image_trois` varchar(100) DEFAULT NULL,
  `actu_auteur` varchar(100) DEFAULT NULL,
  `actu_date_creation` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `actualite`
--

INSERT INTO `actualite` (`actu_id`, `actu_img_un`, `actu_titre`, `actu_paragraphe_un`, `actu_image_deux`, `actu_description_image_deux`, `actu_paragraphe_deux`, `actu_image_trois`, `actu_auteur`, `actu_date_creation`) VALUES
(1, 'image/actualiteImage/actualite03_23_2021_08_33_44.jpg', 'titra actu', 'para1', 'image/actualiteImage/actualite03_23_2021_08_33_44.png', 'desc img2', 'para2', 'image/actualiteImage/actualite03_23_2021_08_33_44.png', 'Yanis CHAMOUNIS', '2021-03-23'),
(2, 'image/actualiteImage/actualite03_24_2021_09_06_40.png', 'Titre actualitÃ©', 'PARA', 'image/actualiteImage/actualite03_24_2021_09_06_40.png', 'descddr', 'para', 'image/actualiteImage/actualite03_24_2021_09_06_40.jpg', 'billy', '2021-03-24'),
(3, 'image/actualiteImage/actualite03_24_2021_09_08_17.png', 'Titre actu', 'para1', '', 'dsc img 2', 'para2', 'image/actualiteImage/actualite03_24_2021_09_08_17.jpg', 'Jean Moulin', '2021-03-24'),
(4, 'image/actualiteImage/actualite03_24_2021_09_08_58.png', '2Titre actu', '2para1', '', '2dsc img 2', '2para2', '', 'Jean Rochefort', '2021-03-24'),
(5, 'image/actualiteImage/actualiteimg_un04_13_2021_02_05_04.jpg', '5Titre actu', '52para1', '', '62dsc img 2', '2para2', '', 'J.M Bigard', '2021-03-24'),
(6, 'image/actualiteImage/actualiteimg_un04_14_2021_09_24_29.jpg', 'ActualitÃ© NÂ°6: Nouveau Projet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam eos deleniti veniam quas impedit qui aliquid suscipit esse molestiae est! Cupiditate excepturi inventore laudantium nostrum veniam vel perferendis nesciunt eius possimus voluptate voluptatum minima, dolor suscipit consequatur libero tenetur obcaecati unde ipsam voluptatem repellat autem.', '', 'aaaa', 'aaaaa', '', 'aaaaa', '2021-03-24'),
(7, 'image/actualiteImage/actualiteimg_un04_14_2021_09_51_37.jpg', 'ActualitÃ© Nouvelle', 'Lorem un peu long histoire d\'avoir un semblant de paragraphe pour tester blabla ogaloasp pvkao laksodj ano ihs aoi oaihs popojpo a jpoifjs nik kklspdopz', '', 'zazaza', 'zazaza', '', 'billy boy', '2021-03-26'),
(9, 'image/actualiteImage/actualiteimg_un04_29_2021_05_00_39.PNG', 'RÃ©alisation Ã  Paris 12e', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae quibusdam in temporibus? Veritatis, ullam sapiente odio non itaque natus saepe ratione accusamus vero repellendus quas soluta quisquam eum debitis enim aspernatur dolore doloremque corrupti, nihil beatae totam est, sit aut neque? Blanditiis voluptatem laudantium atque omnis possimus dolorem commodi expedita, eos voluptatum. Cumque vel quas odit culpa ad, nesciunt amet.', 'image/actualiteImage/actualiteimg_deux04_29_2021_05_00_39.PNG', '', 'dsqdqsdqsdqs', 'image/actualiteImage/actualiteimg_trois04_29_2021_05_00_39.PNG', 'sqdsqdqsdq', '2021-04-07'),
(10, 'image/actualiteImage/actualiteimg_un05_23_2021_03_23_46.jpg', 'Grande NouveautÃ© !', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis adipisci, voluptatum porro, consequuntur nihil eius voluptate autem quam fuga quod facilis facere vitae nobis dignissimos dicta iure dolores veniam. Libero laudantium eveniet magnam nisi animi temporibus ullam, numquam dicta a accusantium beatae recusandae vero veritatis!', 'image/actualiteImage/actualiteimg_deux05_23_2021_03_23_46.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis adipisci, voluptatum porro, consequuntur nihil eius voluptate autem quam fuga quod facilis facere vitae nobis dignissimos dicta iure dolores veniam. Libero laudantium eveniet magnam nisi animi temporibus ullam, numquam dicta a accusantium beatae recusandae vero veritatis!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis adipisci, voluptatum porro, consequuntur nihil eius voluptate autem quam fuga quod facilis facere vitae nobis dignissimos dicta iure dolores veniam. Libero laudantium eveniet magnam nisi animi temporibus ullam, numquam dicta a accusantium beatae recusandae vero veritatis!', '', 'Daniel Ricardo', '2021-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `actu_real`
--

CREATE TABLE `actu_real` (
  `id_actu` int(11) NOT NULL,
  `id_real` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_login` varchar(50) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_login`, `admin_password`) VALUES
(1, 'test', '$2y$10$NeXjgRh7I/gxkpKkN4xKreQzyP/SPN4Q.xjlj3yP0AgTgTRTEwNgm');

-- --------------------------------------------------------

--
-- Table structure for table `concerne`
--

CREATE TABLE `concerne` (
  `id_real` int(11) NOT NULL,
  `id_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `concerne`
--

INSERT INTO `concerne` (`id_real`, `id_service`) VALUES
(7, 1),
(14, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(23, 1),
(3, 2),
(7, 2),
(14, 2),
(15, 2),
(18, 2),
(19, 2),
(20, 2),
(23, 2),
(15, 3),
(17, 3),
(18, 3),
(20, 3),
(23, 3),
(3, 4),
(7, 4),
(16, 4),
(19, 4),
(21, 4),
(23, 4);

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE `employe` (
  `employe_id` int(11) NOT NULL,
  `employe_nom` varchar(100) NOT NULL,
  `employe_prenom` varchar(100) DEFAULT NULL,
  `employe_image_un` varchar(100) DEFAULT NULL,
  `employe_titre` varchar(100) DEFAULT NULL,
  `employe_description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`employe_id`, `employe_nom`, `employe_prenom`, `employe_image_un`, `employe_titre`, `employe_description`) VALUES
(1, 'Marianne', 'Paladyr', 'image/employeImage/employeimage_un04_08_2021_10_24_29.jpg', 'Employe', 'description de l\'employÃ© / de son poste'),
(2, 'John', 'Calembour', 'image/employeImage/employe03_26_2021_11_26_47.PNG', 'Triple champion du monde de boomerang', 'Partie extrÃªmement importante de notre pÃ´le divertissement'),
(3, 'John ', 'Kennedy', 'image/employeImage/employeimage_un04_08_2021_10_25_05.png', 'IngÃ©nieur Informaticien', 'Sympa');

-- --------------------------------------------------------

--
-- Table structure for table `parle_de`
--

CREATE TABLE `parle_de` (
  `id_actu` int(11) NOT NULL,
  `id_real` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `realisation`
--

CREATE TABLE `realisation` (
  `real_id` int(11) NOT NULL,
  `real_titre` varchar(100) NOT NULL,
  `real_logo` varchar(100) DEFAULT NULL,
  `real_paragraphe_un` varchar(500) NOT NULL,
  `real_paragraphe_deux` varchar(500) DEFAULT NULL,
  `real_lieu` varchar(100) DEFAULT NULL,
  `real_cout` varchar(100) DEFAULT NULL,
  `real_date_debut` date DEFAULT NULL,
  `real_date_fin` date DEFAULT NULL,
  `real_img_un` varchar(100) DEFAULT NULL,
  `real_img_trois` varchar(100) DEFAULT NULL,
  `real_img_quatre` varchar(100) DEFAULT NULL,
  `real_img_cinq` varchar(100) DEFAULT NULL,
  `real_img_deux` varchar(100) DEFAULT NULL,
  `real_theme` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `realisation`
--

INSERT INTO `realisation` (`real_id`, `real_titre`, `real_logo`, `real_paragraphe_un`, `real_paragraphe_deux`, `real_lieu`, `real_cout`, `real_date_debut`, `real_date_fin`, `real_img_un`, `real_img_trois`, `real_img_quatre`, `real_img_cinq`, `real_img_deux`, `real_theme`) VALUES
(1, 'Titre', 'image/realisationImage/realisation03_23_2021_08_32_38.jpg', 'para1', 'para2', 'lieu', '860 â‚¬', '2021-03-04', '2021-03-11', 'image/realisationImage/realisation03_23_2021_08_32_38.png', '', '', '', 'image/realisationImage/realisation03_23_2021_08_32_38.png', 'eau'),
(2, '2Titre', 'image/realisationImage/realisation03_23_2021_08_32_38.jpg', '2para1', '2para2', '2lieu', '2860 â‚¬', '2021-03-04', '2021-03-11', 'image/realisationImage/realisation03_23_2021_08_32_38.png', '', '', '', 'image/realisationImage/realisation03_23_2021_08_32_38.png', 'eau'),
(3, 'aaa', 'image/realisationImage/realisation03_26_2021_03_17_52.png', 'sdfsdfsd', 'fsdfsdfsd', 'sdfsdf', '554', '2021-03-05', '2021-03-19', '', '', '', '', '', 'eau'),
(4, 'aaa', 'image/realisationImage/realisation03_23_2021_09_14_12.jpg', 'sdfsdfsd', 'fsdfsdfsd', 'sdfsdf', '554', '2021-03-05', '2021-03-19', '', '', '', '', '', 'eau'),
(5, 'aaa', 'image/realisationImage/realisation03_23_2021_09_17_19.jpg', 'sdfsdfsd', 'fsdfsdfsd', 'sdfsdf', '554', '2021-03-05', '2021-03-19', '', '', '', '', '', 'eau'),
(6, 'aaa', 'image/realisationImage/realisation03_23_2021_09_29_48.jpg', 'sdfsdfsd', 'fsdfsdfsd', 'sdfsdf', '554', '2021-03-05', '2021-03-19', '', '', '', '', '', 'eau'),
(7, 'tetet', 'image/realisationImage/realisation03_26_2021_03_18_22.png', 'para', 'para', 'villiers', '60', '2021-03-14', '2021-04-02', '', '', '', '', '', 'eau'),
(8, 'tetet', 'image/realisationImage/realisation03_23_2021_09_45_10.png', 'para', 'para', 'villiers', '60', '2021-03-14', '2021-04-02', 'image/realisationImage/realisation03_23_2021_09_45_10.png', '', '', '', '', 'eau'),
(9, 'tetet', 'image/realisationImage/realisation03_23_2021_09_45_24.png', 'para', 'para', 'villiers', '60', '2021-03-14', '2021-04-02', 'image/realisationImage/realisation03_23_2021_09_45_24.png', '', '', '', '', 'eau'),
(10, 'tetet', 'image/realisationImage/realisation03_23_2021_09_45_41.png', 'para', 'para', 'villiers', '60', '2021-03-14', '2021-04-02', 'image/realisationImage/realisation03_23_2021_09_45_41.png', '', '', '', '', 'eau'),
(11, 'tetet', 'image/realisationImage/realisation03_23_2021_09_46_01.png', 'para', 'para', 'villiers', '60', '2021-03-14', '2021-04-02', 'image/realisationImage/realisation03_23_2021_09_46_01.png', '', '', '', '', 'eau'),
(12, 'titretestcadinalite', 'image/realisationImage/realisation03_23_2021_10_30_43.jpg', 'fdfs', 'sdfsdf', 'sdfdsf', '255', '2021-03-03', '2021-03-05', '', '', '', '', '', 'eau'),
(13, 'titretestcadinalite', 'image/realisationImage/realisation03_23_2021_10_31_51.jpg', 'fdfs', 'sdfsdf', 'sdfdsf', '255', '2021-03-03', '2021-03-05', '', '', '', '', '', 'eau'),
(14, 'titretestcadinalite', 'image/realisationImage/realisation03_25_2021_09_08_13.png', 'fdfsjkdfwuhksqfqfqf', 'sdfsdfqefqfeqsfqsf', 'sdfdsfdqs', '255', '2021-03-05', '2021-04-02', 'image/realisationImage/realisation03_25_2021_09_08_13.jpg', 'image/realisationImage/realisation03_25_2021_09_08_13.jpg', 'image/realisationImage/realisation03_25_2021_09_08_13.png', 'image/realisationImage/realisation03_25_2021_09_08_13.jpg', 'image/realisationImage/realisation03_25_2021_09_08_13.jpg', 'environnement'),
(15, 'DRH', 'image/realisationImage/realisation03_23_2021_11_42_38.jpg', '546', 'gfdgdfg', 'dfgdf', '265', '2021-03-26', '2021-03-03', '', '', '', '', '', 'eau'),
(16, 'PDG', 'image/realisationImage/realisation03_26_2021_03_18_33.png', '546', 'gfdgdfg', 'dfgdf', '265', '2021-03-26', '2021-03-03', '', '', '', '', '', 'eau'),
(17, 'test', 'image/realisationImage/realisation03_23_2021_11_43_03.png', 'fdsf', 'dsfsdf', 'dsf', '98', '2021-03-03', '2021-04-07', '', '', '', '', '', 'eau'),
(18, 'test cardinalitÃ© multiple', 'image/realisationImage/realisationlogo04_21_2021_07_17_34.jpg', 'paragraphe1', 'paragraphe2', 'lieu', '9000', '2021-03-04', '2021-03-26', '', '', '', '', '', 'eau'),
(19, 'Dog Service', 'image/realisationImage/realisationlogo04_14_2021_10_20_28.jpg', 'aze qsdq dqs dqsd qs dq sdqsdaz edaghdfdqsqw dqs azaze', 'azraz sdqs d qsd qrazraz', 'azraz', '300', '2021-03-11', '2021-04-11', '', '', '', '', '', 'eau'),
(20, 'Realisation test', 'image/realisationImage/realisation04_07_2021_10_16_40000000.jpg', 'para1', 'para2', 'val-de-marne', '345646', '2021-03-06', '2021-03-30', 'image/realisationImage/realisation04_07_2021_10_16_40000000.PNG', '', '', '', '', 'eau'),
(21, 'Ile-de-France', 'image/realisationImage/realisationlogo04_14_2021_10_18_38.jpg', 'REMPLI', 'REMPLI', 'val-de-marne', 'aaaaa', '2021-04-06', '2021-04-30', '', '', '', '', '', 'eau'),
(23, 'Paris 12e', 'image/realisationImage/realisationlogo06_08_2021_02_22_43.jpg', 'Lorem ipsum dolor sit amet consectetur adipisniet magnam nisi animi temporibus ullam, numquam dicta a accusantium beatae recusandae vero veritatis!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis adipisci, voluptatum porro, consequuntur nihil eius voluptate autem quam fuga quod facilis facere vitae nobis dignissimos dicta iure dolores veniam. Libero laudantium eveniet magnam nisi animi temporibus ullam, numquam dicta a accusantium beatae recusandae vero veritatis!', 'val-de-marne', '5 PiÃ¨ces d\'or', '2021-04-06', '2021-04-30', 'image/realisationImage/realisationimg_un06_08_2021_02_22_43.jpg', '', '', '', 'image/realisationImage/realisationimg_deux06_08_2021_02_22_43.jpg', 'eau');

-- --------------------------------------------------------

--
-- Table structure for table `recrutement`
--

CREATE TABLE `recrutement` (
  `recrut_id` int(11) NOT NULL,
  `recrut_titre` varchar(100) NOT NULL,
  `recrut_image_un` varchar(100) DEFAULT NULL,
  `recrut_description` varchar(500) NOT NULL,
  `recrut_competence` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recrutement`
--

INSERT INTO `recrutement` (`recrut_id`, `recrut_titre`, `recrut_image_un`, `recrut_description`, `recrut_competence`) VALUES
(1, 'PDG', 'image/recrutementImage/recrutementimg05_31_2021_08_42_19.PNG', 'dsds', '- Un Bon PÃ©digrÃ©\r\n- Une motivation sans faille\r\n- La prÃ©sence de poil est un plus'),
(2, 'Recrutement d\'un designer ', 'image/recrutementImage/recrutementimg05_07_2021_11_29_57.jpg', 'Description poste', '- sait designer'),
(3, 'Un bon cuisinier', 'image/recrutementImage/recrutementimg05_31_2021_08_42_50.png', 'BLo', 'Savoir faire des croissants');

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE `reference` (
  `reference_id` int(11) NOT NULL,
  `reference_titre` varchar(100) NOT NULL,
  `reference_image_un` varchar(100) DEFAULT NULL,
  `reference_valeur` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reference`
--

INSERT INTO `reference` (`reference_id`, `reference_titre`, `reference_image_un`, `reference_valeur`) VALUES
(1, 'Date de crÃ©ation de l\'entreprise', '<i class="far fa-calendar-plus"></i>', ' 2004'),
(2, 'Nombre de chantier rÃ©alisÃ©s', '<i class="fas fa-briefcase"></i>', 'x chantiers'),
(3, 'Nombre de Collaborations', '<i class="far fa-handshake"></i>', 'x collaborations'),
(4, 'Nombre d\'heures de travail', '<i class="far fa-clock"></i>', 'x heures de travail');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_titre` varchar(100) NOT NULL,
  `service_image_un` varchar(100) DEFAULT NULL,
  `service_description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_titre`, `service_image_un`, `service_description`) VALUES
(1, 'Service 1', 'image/serviceImage/service03_23_2021_09_05_35.png', 'Description service 1'),
(2, 'Service 2', 'image/serviceImage/service03_23_2021_09_05_55.jpg', 'description service 2'),
(3, 'Service3', 'image/serviceImage/service03_23_2021_11_39_16.png', 'descrservice3'),
(4, 'Service Dogo', 'image/serviceImage/service03_26_2021_11_25_40.PNG', 'Le service Dogo existe, et c\'est dÃ©jÃ  pas mal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actualite`
--
ALTER TABLE `actualite`
  ADD PRIMARY KEY (`actu_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `concerne`
--
ALTER TABLE `concerne`
  ADD PRIMARY KEY (`id_real`,`id_service`),
  ADD KEY `id_service` (`id_service`);

--
-- Indexes for table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`employe_id`);

--
-- Indexes for table `parle_de`
--
ALTER TABLE `parle_de`
  ADD PRIMARY KEY (`id_actu`,`id_real`),
  ADD KEY `id_real` (`id_real`);

--
-- Indexes for table `realisation`
--
ALTER TABLE `realisation`
  ADD PRIMARY KEY (`real_id`);

--
-- Indexes for table `recrutement`
--
ALTER TABLE `recrutement`
  ADD PRIMARY KEY (`recrut_id`);

--
-- Indexes for table `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`reference_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actualite`
--
ALTER TABLE `actualite`
  MODIFY `actu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employe`
--
ALTER TABLE `employe`
  MODIFY `employe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `realisation`
--
ALTER TABLE `realisation`
  MODIFY `real_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `recrutement`
--
ALTER TABLE `recrutement`
  MODIFY `recrut_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reference`
--
ALTER TABLE `reference`
  MODIFY `reference_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `concerne`
--
ALTER TABLE `concerne`
  ADD CONSTRAINT `concerne_ibfk_1` FOREIGN KEY (`id_real`) REFERENCES `realisation` (`real_id`),
  ADD CONSTRAINT `concerne_ibfk_2` FOREIGN KEY (`id_service`) REFERENCES `service` (`service_id`);

--
-- Constraints for table `parle_de`
--
ALTER TABLE `parle_de`
  ADD CONSTRAINT `parle_de_ibfk_1` FOREIGN KEY (`id_actu`) REFERENCES `actualite` (`actu_id`),
  ADD CONSTRAINT `parle_de_ibfk_2` FOREIGN KEY (`id_real`) REFERENCES `realisation` (`real_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
