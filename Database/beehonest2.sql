-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2021 at 01:35 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beehonest2`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_content`
--

CREATE TABLE `about_content` (
  `idAbout` int(11) NOT NULL,
  `titleAbout` text NOT NULL,
  `isiParagraf1` text NOT NULL,
  `isiParagraf2` text NOT NULL,
  `linkYoutube` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_content`
--

INSERT INTO `about_content` (`idAbout`, `titleAbout`, `isiParagraf1`, `isiParagraf2`, `linkYoutube`) VALUES
(1, 'BeeHonest', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi ut voluptatum eveniet doloremque autem excepturi eaque, sit laboriosam voluptatem nisi delectus. Facere explicabo hic minus accusamus alias fuga nihil dolorum quae.Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi ut voluptatum eveniet doloremque autem excepturi eaque, sit laboriosam voluptatem nisi delectus. Facere explicabo hic minus accusamus alias fuga nihil dolorum quae.', 'Lorem ipsum dolor sit amet com eveniet doloremque autem excepturi eaque, sit laboriosam voluptatem nisi delectus. Facere explicabo hic minus accusamus alias fuga nihil dolorum quae.Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi ut voluptatum eveniet doloremque autem excepturi eaque.', 'https://www.youtube.com/watch?v=dhnNqwukGMw');

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `idAlamat` int(11) NOT NULL,
  `ig` text NOT NULL,
  `twitter` text NOT NULL,
  `fb` text NOT NULL,
  `linkedin` text NOT NULL,
  `namaPerusahaan` text NOT NULL,
  `alamatPerusahaan` text NOT NULL,
  `email` text NOT NULL,
  `no_telpPerusahaan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`idAlamat`, `ig`, `twitter`, `fb`, `linkedin`, `namaPerusahaan`, `alamatPerusahaan`, `email`, `no_telpPerusahaan`) VALUES
(1, 'https://www.instagram.com/beehonest.idn/?utm_medium=copy_link', 'https://twitter.com', 'https://www.facebook.com/', 'https://linkedin.com', 'Beehonest', 'Jakarta - pusat, Jl. Serdang Baru XII', 'BeeHonest20@gmail.com', '6289623085349');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(3) NOT NULL,
  `cat_id` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `tag` text NOT NULL,
  `admin` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `rate` tinyint(2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `quote` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `cat_id`, `title`, `content`, `tag`, `admin`, `status`, `rate`, `image`, `date`, `quote`) VALUES
(48, 3, 'Security Release: Laravel 6.18.35, 7.24.0', 'column that is being updated with an actual list of database columns that exist on the database table. We retrieve this column list using Laravelcolumn that is being updated with an actual list of database columns that exist on the database table. We retrieve this column list using Laravelcolumn that is being updated with an actual list of database columns that exist on the database table. We retrieve this column list using Laravelcolumn that is being updated with an actual list of database columns that exist on the database table. We retrieve this column list using Laravelcolumn that is being updated with an actual list of database columns that exist on the database table. We retrieve this column list using Laravelolumn that is being updated with an actual list of database columns that exist on the database table. We retrieve this column list using Laravelcolumn that is being updated with an actual list of database columns that exist on the database table. We retrieve this column list using Laravelcolumn that is being updated with an actual list of database columns that exist on the database table. We retrieve this column list using Laravelcolumn that is being updated with an actual list of database columns that exist on the database table. We retrieve this column list using Laravelcolumn that is being updated with an actual list of database columns that exist on the database table. We retrieve this column list using Laravelolumn that is being updated with an actual list of database columns that exist on the database table. We retrieve this column list using Laravelcolumn that is being updated with an actual list of database columns that exist on the database table. We retrieve this column list using Laravelcolumn that is being updated with an actual list of database columns that exist on the database table. We retrieve this column list using Laravelcolumn that is being updated with an actual list of database columns that exist on the database table. We retrieve this column list using Laravelcolumn that is being updated with an actual list of database columns that exist on the database table. We retrieve this column list using Laravelolumn that is being updated with an actual list of database columns that exist on the database table. We retrieve this column list using Laravelcolumn that is being updated with an actual list of database columns that exist on the database table. We retrieve this column list using Laravelcolumn that is being updated with an actual list of database columns that exist on the database table. We retrieve this column list using Laravelcolumn that is being updated with an actual list of database columns that exist on the database table. We retrieve this column list using Laravelcolumn that is being updated with an actual list of database columns that exist on the database table. We retrieve this column list using Laravel', 'php , laravel', 'admin', 0, 1, '370085.jpg', '2020-08-12 04:42:41', ''),
(59, 22, 'What is Lorem Ipsum?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat numquam esse nisi optio officiis aliquam dolorem consequatur praesentium distinctio unde possimus tempore, beatae labore ullam omnis non, voluptas facere obcaecati?', 'Test', 'arif_widagdo1998', 1, 1, '633859.jfif', '2021-10-11 12:56:35', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat numquam esse nisi optio officiis aliquam dolorem consequatur praesentium distinctio unde possimus tempore, beatae labore ullam omnis non, voluptas facere obcaecati?</p>');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(2) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `status`, `create_time`, `admin_name`) VALUES
(1, 'Coktails', 1, '2020-08-09 08:59:19', 'admin'),
(20, 'Cokies', 1, '2020-08-11 10:39:40', 'admin'),
(22, 'Pure Honey', 1, '2020-08-14 14:06:59', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id_faq` int(11) NOT NULL,
  `judul_pertanyaan` varchar(255) NOT NULL,
  `deskripsi_pertanyaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id_faq`, `judul_pertanyaan`, `deskripsi_pertanyaan`) VALUES
(6, 'What is Lorem Ipsum?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat numquam esse nisi optio officiis aliquam dolorem consequatur praesentium distinctio unde possimus tempore, beatae labore ullam omnis non, voluptas facere obcaecati?'),
(7, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat numquam esse nisi optio officiis aliquam dolorem consequatur praesentium distinctio unde possimus tempore, beatae labore ullam omnis non, voluptas facere obcaecati?');

-- --------------------------------------------------------

--
-- Table structure for table `gambarproduk`
--

CREATE TABLE `gambarproduk` (
  `idgambarproduk` int(11) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `gambar1` text CHARACTER SET latin1 NOT NULL,
  `namaproduk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambarproduk`
--

INSERT INTO `gambarproduk` (`idgambarproduk`, `idproduk`, `idCategory`, `gambar1`, `namaproduk`) VALUES
(72, 109, 20, '../../produk/subProduk/168XnJFRrMNoA.png', 'Madu Mawar2');

-- --------------------------------------------------------

--
-- Table structure for table `home_content`
--

CREATE TABLE `home_content` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `deskripsi_title` text NOT NULL,
  `fileGambar` text NOT NULL,
  `gambarGedung` text NOT NULL,
  `span_deskrip` text NOT NULL,
  `btn_nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_content`
--

INSERT INTO `home_content` (`id`, `title`, `deskripsi_title`, `fileGambar`, `gambarGedung`, `span_deskrip`, `btn_nama`) VALUES
(1, 'Start your day with a BeeHonest', 'Ordering your invigorating honey right now. Make your life healthier with Beehonest', 'slider-1-1600x900.jpg', 'banner.png', '#About', 'Shopping Now');

-- --------------------------------------------------------

--
-- Table structure for table `home_content1`
--

CREATE TABLE `home_content1` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `deskripsi_title` text NOT NULL,
  `fileGambar` text NOT NULL,
  `gambarGedung` text NOT NULL,
  `span_deskrip` text NOT NULL,
  `btn_nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_content1`
--

INSERT INTO `home_content1` (`id`, `title`, `deskripsi_title`, `fileGambar`, `gambarGedung`, `span_deskrip`, `btn_nama`) VALUES
(1, 'Title2', 'deskrip2', 'slider-1-1600x900.jpg', 'kisspng-smiley-emoticon-clip-art-cartoon-sun-5ad137db8d2309.7719969315236607635781 (1).png', '#about', 'Shopping Now <i class=\"fa fa-shopping-bag\"                 aria-hidden=\"true\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `linksmarketplace`
--

CREATE TABLE `linksmarketplace` (
  `idlinksmarket` int(11) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `idmarketplace` int(11) NOT NULL,
  `namaproduk` text NOT NULL,
  `linkmarket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `id` int(5) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(3) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `marketplace`
--

CREATE TABLE `marketplace` (
  `idmarketplace` int(11) NOT NULL,
  `namamarketplace` varchar(50) CHARACTER SET latin1 NOT NULL,
  `gambarmarketplace` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marketplace`
--

INSERT INTO `marketplace` (`idmarketplace`, `namamarketplace`, `gambarmarketplace`) VALUES
(19, 'TokoPedia', 'logotokopedia-38840.png'),
(20, 'Olx', 'OLX_New_Logo.png'),
(21, 'Shopee', 'shopee-logo-31408.png'),
(22, 'BukaLapak', 'HP-Logo-Bukalapak-01-300x300.png'),
(23, 'Lazada', 'logo-lazada.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `metodepembayaran`
--

CREATE TABLE `metodepembayaran` (
  `id` int(11) NOT NULL,
  `metode` varchar(25) NOT NULL,
  `norek` varchar(25) NOT NULL,
  `logo` text DEFAULT NULL,
  `an` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metodepembayaran`
--

INSERT INTO `metodepembayaran` (`id`, `metode`, `norek`, `logo`, `an`) VALUES
(11, 'Mandiri', '0000', 'mandiri.jpg', 'Beehonest'),
(13, 'sad', 'asd', 'logobca.jpg', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(100) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `bio` text NOT NULL,
  `gambar_profile` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`, `bio`, `gambar_profile`, `date`) VALUES
(16, '123@123', '456', '123', '123213213', '123321321', 'Bio bio', 'uploads/userprofile/16VoT3rB1Z.3g.jpg', '2021-10-10 17:55:49'),
(22, '456@456', '456@456', '456@456', '456@456', '456@456', '', '', '2021-10-12 22:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(50) NOT NULL,
  `totalberat` int(11) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `distrik` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `kodepos` varchar(255) NOT NULL,
  `ekspedisi` varchar(255) NOT NULL,
  `paket` varchar(255) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `estimasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(46, 38, 109, 1, 'Madu Mawar', 400000, 800, 800, 400000),
(47, 39, 109, 1, 'Madu Mawar', 400000, 800, 800, 400000),
(48, 40, 109, 1, 'Madu Mawar', 400000, 800, 800, 400000),
(49, 41, 109, 1, 'Madu Mawar', 400000, 800, 800, 400000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `namaproduk` text NOT NULL,
  `gambar` text CHARACTER SET latin1 NOT NULL,
  `deskripsi` text NOT NULL,
  `rate` int(11) NOT NULL,
  `hargabefore` int(255) NOT NULL,
  `hargaafter` int(255) NOT NULL,
  `tgldibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `berat` int(11) NOT NULL,
  `stok_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idproduk`, `idCategory`, `namaproduk`, `gambar`, `deskripsi`, `rate`, `hargabefore`, `hargaafter`, `tgldibuat`, `berat`, `stok_produk`) VALUES
(109, 20, 'Madu Beehonest', '../../produk/168EvdDKoHw7k.png', 'Ini Madu Enak Sekali Rasa Mawar', 5, 490000, 400000, '2021-09-29 08:04:12', 800, 1);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(2) NOT NULL,
  `email_id` int(2) NOT NULL,
  `user` varchar(50) NOT NULL,
  `reply` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `email_id`, `user`, `reply`, `date`) VALUES
(1, 17, 'admin', 'ffff', '2020-08-14 05:22:05'),
(2, 17, 'admin', 'ccc', '2020-08-14 05:25:39'),
(3, 17, 'admin', 'dddaaa', '2020-08-14 05:26:34'),
(4, 16, 'admin', 'ok done', '2020-08-14 05:28:35'),
(5, 15, 'admin', 'g', '2020-08-14 05:32:46'),
(6, 20, 'admin', 'ok done', '2020-08-14 05:36:26'),
(7, 20, 'admin', 'ok done', '2020-08-14 14:13:51'),
(8, 21, 'asik', 'ok ', '2020-08-15 14:26:53'),
(9, 25, 'admin', 'this id demo reply', '2020-08-15 15:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `id` int(2) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `footer` varchar(255) NOT NULL,
  `postdisplay` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `logo`, `title`, `footer`, `postdisplay`) VALUES
(1, 'logo.png', 'Blog website using PHP OOP', '2020 © Developed by : ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` int(2) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `github` varchar(255) NOT NULL,
  `footerlink` varchar(255) NOT NULL,
  `footertxt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `facebook`, `twitter`, `instagram`, `linkedin`, `github`, `footerlink`, `footertxt`) VALUES
(1, 'https://www.linkedin.com/in/anisur-rahaman-shahin-31295b186/', 'https://www.linkedin.com/in/anisur-rahaman-shahin-31295b186/', 'https://www.linkedin.com/in/anisur-rahaman-shahin-31295b186/', 'https://www.linkedin.com/in/anisur-rahaman-shahin-31295b186/', 'https://www.linkedin.com/in/anisur-rahaman-shahin-31295b186/', 'https://www.linkedin.com/in/anisur-rahaman-shahin-31295b186/', 'AR ShaHin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `role` tinyint(5) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `alamat` text NOT NULL,
  `telepone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `password`, `image`, `bio`, `role`, `date`, `alamat`, `telepone`) VALUES
(6, 'arif', 'widagdo', 'arif_widagdo1998', 'arifwidagdo24@gmail.com', 'Bobmarley', '549375.png', '\"Saya memiliki keyakinan besar akan pentingnya lebah, bukan hanya untuk madu mereka, yang merupakan makanan penyembuhan dan lezat, tetapi juga kebutuhan koloni lebah yang penting bagi kesehatan planet ini.\"                                                                                                                                                                                                                                                                                         ', 1, '2020-08-14 14:36:53', '', ''),
(15, '', '', 'arif.widagdo', 'arif.widagdo@yahoo.com', 'Bobmarley1998', '', '', 1, '2021-10-12 23:30:07', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_content`
--
ALTER TABLE `about_content`
  ADD PRIMARY KEY (`idAbout`);

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`idAlamat`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_name` (`category_name`) USING BTREE;

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `gambarproduk`
--
ALTER TABLE `gambarproduk`
  ADD PRIMARY KEY (`idgambarproduk`),
  ADD KEY `idproduk` (`idproduk`),
  ADD KEY `idCategory` (`idCategory`);

--
-- Indexes for table `home_content`
--
ALTER TABLE `home_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_content1`
--
ALTER TABLE `home_content1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `linksmarketplace`
--
ALTER TABLE `linksmarketplace`
  ADD PRIMARY KEY (`idlinksmarket`),
  ADD KEY `idproduk` (`idproduk`),
  ADD KEY `idmarketplace` (`idmarketplace`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketplace`
--
ALTER TABLE `marketplace`
  ADD PRIMARY KEY (`idmarketplace`);

--
-- Indexes for table `metodepembayaran`
--
ALTER TABLE `metodepembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`),
  ADD KEY `idCategory` (`idCategory`),
  ADD KEY `idmarketplace` (`idCategory`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_content`
--
ALTER TABLE `about_content`
  MODIFY `idAbout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `idAlamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gambarproduk`
--
ALTER TABLE `gambarproduk`
  MODIFY `idgambarproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `home_content`
--
ALTER TABLE `home_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_content1`
--
ALTER TABLE `home_content1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `linksmarketplace`
--
ALTER TABLE `linksmarketplace`
  MODIFY `idlinksmarket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `marketplace`
--
ALTER TABLE `marketplace`
  MODIFY `idmarketplace` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `metodepembayaran`
--
ALTER TABLE `metodepembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gambarproduk`
--
ALTER TABLE `gambarproduk`
  ADD CONSTRAINT `produk_ibck_2` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`idproduk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produk_ibck_3` FOREIGN KEY (`idCategory`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `linksmarketplace`
--
ALTER TABLE `linksmarketplace`
  ADD CONSTRAINT `produk_market_2` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`idproduk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produk_market_3` FOREIGN KEY (`idmarketplace`) REFERENCES `marketplace` (`idmarketplace`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
