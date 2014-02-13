-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 06, 2014 at 10:34 AM
-- Server version: 5.5.35
-- PHP Version: 5.4.6-1ubuntu1.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bimasco_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `beranda`
--

CREATE TABLE IF NOT EXISTS `beranda` (
  `id_beranda` int(100) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  PRIMARY KEY (`id_beranda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `beranda`
--

INSERT INTO `beranda` (`id_beranda`, `judul`, `isi`) VALUES
(1, 'Bimasco Cargo System', 'Should you require freight forwarding, customs clearance, transportation, warehousing, distribution, or project cargo shipments, there is only one company you can rely on.\r\nNo matter how big or small your cargo requirements are, we at Bimasco Cargo System offer a comprehensive world wide, door-to-door service for importers and exporters.\r\nSo no matter whether you require customs clearance, freight forwarding, transportation, warehousing, order packing, or door-to-door delivery of your cargo, we ensure your shipments will be delivered safely and on time using our integrated air, sea, and road networks.\r\nOur global service network covers key areas of world trade. Our domestic networks cover all points within Indonesia. We can pick up and deliver your goods anywhere anytime.');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE IF NOT EXISTS `galeri` (
  `id_galeri` int(100) NOT NULL AUTO_INCREMENT,
  `judul_galeri` varchar(255) NOT NULL,
  `nama_photo` varchar(255) NOT NULL,
  `ket_photo` varchar(255) NOT NULL,
  `size` int(50) NOT NULL,
  PRIMARY KEY (`id_galeri`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE IF NOT EXISTS `kontak` (
  `id_kontak` int(100) NOT NULL AUTO_INCREMENT,
  `nama_afiliasi` varchar(255) NOT NULL,
  `jenis_kantor` enum('Head Office','Brance Office') NOT NULL,
  `kota` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pic` varchar(150) NOT NULL,
  `hp` varchar(200) NOT NULL,
  PRIMARY KEY (`id_kontak`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama_afiliasi`, `jenis_kantor`, `kota`, `alamat`, `telepon`, `fax`, `email`, `pic`, `hp`) VALUES
(1, 'PT. Bimasco Cargo System', 'Head Office', 'Surabaya', 'Jl. Perak Barat 133 Surabaya 60177 Indonesia', '(62 -31) 353-6209', '(62-31) 353-5630 / 353-3660', 'yuri@bimasco.com', 'Mr. Yuri G Iskandar', '(62-81) 130-7186'),
(5, 'PT. Lorimas Tiara Mulia', 'Brance Office', 'Jakarta', 'Jl. Gading Kirana Timur IX Blok B-10 No.35 Kelapa Gading - Jakarta Utara 14242 Indonesia', '(62-21) 4584-7570 ', '(62-21) 4585-0644', 'ltm@centrin.net.id', 'Mr. Suparno', '(62-81) 2883-8899'),
(7, 'PT. Bimasco Cargo System', 'Head Office', 'Surabaya', 'Jl. Perak Barat 133 Surabaya 60177 Indonesia', '(62 -31) 353-6209', '(62-31) 353-5630 / 353-3660', 'yuri@bimasco.com', 'Mr. Yuri G Iskandar', '(62-81) 130-7186');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(100) NOT NULL AUTO_INCREMENT,
  `menu` varchar(255) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `menu`) VALUES
(1, 'Import Sea and Airfreight'),
(2, 'Export Sea and Airfreight'),
(3, 'Project Cargo'),
(4, 'Indonesian Customs Clearance'),
(6, 'Transportation'),
(7, 'Full Service Warehousing'),
(8, 'Insurance'),
(9, 'Products & Services');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id_service` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `judul_service` varchar(255) NOT NULL,
  `isi_service` text NOT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id_service`, `id_menu`, `judul_service`, `isi_service`) VALUES
(2, 9, 'Products & Services', '<p style="text-align: justify;">We at Bimasco Cargo System offer you the total solution to all your freight requirements. So no matter whether you require customs clearance, freight forwarding, transportation, warehousing, order picking, or door-to-door delivery of your cargo, we ensure your shipments are delivered safely and on time using our integrated air, sea, and road networks.</p>\r\n<p style="text-align: justify;">Our global service network covers key areas of world trade. Our domestic networks cover all points within Indonesia. We can pick up and deliver your goods anywhere anytime.</p>\r\n<p style="text-align: justify;">When it comes to providing you with all the answers Bimasco Cargo System is your doorway to the World.</p>'),
(3, 1, 'Import Sea and Airfreight', '<p>On time every time. We don''t make excuses. We deliver.</p>\r\n<p>No matter whether your freight is large or small or you need a regular service or just a one-off shipment, Bimasco Cargo System can meet your needs. We ensure your consignment arrives door-to-door, airport-to-airport or wharf-to-wharf by the most cost-effective route to almost anywhere in the world. Our experienced staff are always available to take your enquiries.</p>\r\n<p>Service is our business.</p>'),
(4, 2, 'Export Sea and Airfreight', '<p>Save on export costs.</p>\r\n<p>No matter whether your freight is large or small or you need a regular service or just a one-off shipment, Bimasco Cargo System can meet your needs. We can ensure your consignment travels door-to-door, airport-to-airport or wharf-to-wharf, by the most cost-effective route to almost anywhere in the world. If you have a large number of suppliers with small consignments destined for locations within Indonesia or overseas, we can help you save on costs.</p>\r\n<p>If your overall volume fills a container we will pick up the consignments and consolidate them in F.C.L shipping containers, coordinate the consignments and take care of the entire organisation saving you time and money. Plus, with all your cargo arriving in one FCL consignment, all your deliveries arrive at the same time at a reduced freight rate. Our experienced staff are always available to take your enquiries.</p>\r\n<p>Service is our business.</p>'),
(5, 3, 'Project Cargo', '<p>Take the hassle out of moving oversized, heavy, fragile or complex cargo to remote destinations within Indonesia or overseas</p>\r\n<p>If your overall volume fills a container we will pick up the consignments and consolidate them in F.C.L shipping containers, coordinate the consignments and take care of the entire organisation saving you time and money. Plus, with all your cargo arriving in one FCL consignment, all your deliveries arrive at the same time at a reduced freight rate. Our experienced staff are always available to take your enquiries.</p>\r\n<p>We have over twenty years experience in global project services. Our team of dedicated, project management professionals will assess your freight transport requirements and have your project cargo delivered on site, on time and on budget.</p>'),
(6, 4, 'Indonesian Customs Clearance', '<p>Don''t let a customs clearance problem cost your business time and money.</p>\r\n<p>Indonesian Customs formalities for the clearance of imports or exports consignments are highly regulated in Indonesia. The correct preparation and completion of the clearance procedures are critical, as heavy penalties may be applied if the correct procedures are not fulfilled.</p>\r\n<p>Bimasco Cargo System can ensure the appropriate documentation is filled out and the correct importing and exporting procedures followed to minimise clearance delays.</p>\r\n<p>Our systems are electronically linked to the Indonesian Customs Service.. This combined with our expert clearance personnel ensures our clearance service is second to none.</p>'),
(7, 6, 'Transportation', '<p>Choose the best in modern fleets when it comes to transporting your goods either by sea, land, air transports services.</p>\r\n<p>We operate our own fleet of flatbed trailers, which makes our door-to-door pick up and delivery service is fast, reliable and on time.</p>'),
(8, 7, 'Full Service Warehousing', '<p>Need a warehouse space but don''t want to buy or lease?</p>\r\n<p>Don''t have the time or the manpower to pack or unpack?</p>\r\n<p>Providing importers and exporters with a secure full service warehouse for both the short or long-term warehousing is just another reason why Bimasco Cargo System is one of Indonesia''s leading customs and forwarding agents.</p>\r\n<p>&nbsp;</p>\r\n<p>Our full service warehouse offers:</p>\r\n<ul class="warehousing">\r\n<li>Pick-up and Packing</li>\r\n<li>Pallet in / Pallet Out</li>\r\n<li>High Quality Security</li>\r\n<li>Long and Short term storage</li>\r\n<li>Delivery to Consignee</li>\r\n</ul>'),
(9, 8, 'Insurance', '<p>Can you afford not to insure?</p>\r\n<p>We take every care to ensure the safe handling and transport of your consignment. Despite this, we still recommend taking out insurance to cover your consignment against unforeseeable mishaps (e.g. theft or fire).</p>\r\n<p>We can arrange insurance for you or advise you on who to contact and what questions to ask. The choice is yours.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tentang`
--

CREATE TABLE IF NOT EXISTS `tentang` (
  `id_tentang` int(100) NOT NULL AUTO_INCREMENT,
  `judul_tentang` text NOT NULL,
  `isi_tentang` text NOT NULL,
  PRIMARY KEY (`id_tentang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tentang`
--

INSERT INTO `tentang` (`id_tentang`, `judul_tentang`, `isi_tentang`) VALUES
(1, 'About Us', '<p style="text-align: justify;"><strong>Our People</strong></p>\r\n<p style="text-align: justify;">Our team of highly trained professionals will give you expert advice and service on all matters relating to your importing and exporting needs. Our business is your business.</p>\r\n<p style="text-align: justify;"><strong>Mission Statement</strong></p>\r\n<p style="text-align: justify;">Bimasco Cargo System provides its valued customers with the highest level of service in freight forwarding, customs clearance, transportation, storage and distribution through our global network of service companies.</p>\r\n<p style="text-align: justify;">We provide efficient reliable service at competitive prices.</p>\r\n<p style="text-align: justify;"><strong>Service History</strong></p>\r\n<p style="text-align: justify;">Formed in 1995, Bimasco Cargo System has been successfully trading for over 11 years. Our continued growth is attributable to strong company management and financial stability. Our commitment to service excellence has established us as one of Indonesias leading freight service providers. In 2002, Bimasco Cargo System awarded as The Best 5 Freight Fowarding Companies in Surabaya-Indonesia.</p>\r\n<p style="text-align: justify;">Our working philosophy is to ensure that our customers always come first. We aim to become your business partner, offering expert advice and solutions to all your importing, exporting and warehousing needs.</p>\r\n<p style="text-align: justify;">Bimasco Cargo System has had no customs penalties issued against it or its clients and is well regarded by the Indonesian Customs Service.</p>\r\n<p style="text-align: justify;">The number of penalties issued against an importer, exporter or broker impacts on the way the Indonesian Customs Service treats particular shippers and brokers. Importers and brokers with no penalty history generally enjoy lower customs scrutiny and minimal delays in delivery.</p>\r\n<p style="text-align: justify;">Bimasco Cargo System offers a total service covering door-to-door shipping, freight forwarding to all parts of the World, customs clearance, transportation, storage and distribution and export documentation. So, no matter what your cargo needs are, or from where your business operates, our integrated air, sea, and road networks will ensure your shipments are delivered safely and on time, every time.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `status` enum('Superadmin','Administrator','User') NOT NULL,
  `last_login` varchar(50) NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `email`, `status`, `last_login`) VALUES
(1, 'admin', '4f208e87dbf1f6ded475ec7a7c8dea87', 'choyyima.aja@gmail.com', 'Superadmin', '4 February 2014 , 11:41 am'),
(2, 'admins', '200ceb26807d6bf99fd6f4f0d1ca54d4', '', 'Administrator', '6 February 2014 , 9:05 am'),
(3, 'nino', '17c4520f6cfd1ab53d8745e84681eb49', '', 'Superadmin', ''),
(4, 'taufiq', '6bed34366e1754b2704d6a4a608e211f', 'muhammadtaufik92@programmer.net', 'Administrator', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
