-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Mar 2022 pada 13.52
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a3mall`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat`
--

CREATE TABLE `alamat` (
  `id_alamat` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_alamat` varchar(50) NOT NULL,
  `telp_alamat` varchar(15) NOT NULL,
  `provinsi_alamat` int(30) NOT NULL,
  `kabupaten_alamat` int(30) NOT NULL,
  `kecamatan_alamat` int(30) NOT NULL,
  `pos_alamat` int(11) NOT NULL,
  `detail_alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id_blog` int(11) NOT NULL,
  `title_blog` varchar(50) NOT NULL,
  `slug_blog` varchar(50) NOT NULL,
  `photo_blog` varchar(50) NOT NULL,
  `content_blog` text NOT NULL,
  `writer_blog` varchar(50) NOT NULL,
  `created_blog` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `see_blog` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `brand_product`
--

CREATE TABLE `brand_product` (
  `id_brand` int(11) NOT NULL,
  `name_brand` varchar(50) NOT NULL,
  `created_brand` timestamp NULL DEFAULT NULL,
  `describe_brand` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `carousel`
--

CREATE TABLE `carousel` (
  `id_carousel` int(11) NOT NULL,
  `photo_carousel` varchar(50) NOT NULL,
  `created_carousel` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cashback`
--

CREATE TABLE `cashback` (
  `id_cashback` int(11) NOT NULL,
  `percent_cashback` int(11) NOT NULL,
  `level_referal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `catalogue`
--

CREATE TABLE `catalogue` (
  `id_catalogue` int(11) NOT NULL,
  `name_catalogue` varchar(50) NOT NULL,
  `describe_catalogue` text NOT NULL,
  `created_catalogue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `photo_catalogue` varchar(50) NOT NULL,
  `slug_catalogue` varchar(50) NOT NULL,
  `pdf_catalogue` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `category_product`
--

CREATE TABLE `category_product` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(50) NOT NULL,
  `describe_category` text DEFAULT NULL,
  `users` int(11) NOT NULL,
  `created_category` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_catalogue`
--

CREATE TABLE `detail_catalogue` (
  `id_detail_catalogue` int(11) NOT NULL,
  `slug_catalogue` varchar(50) NOT NULL,
  `name_detail_catalogue` varchar(50) NOT NULL,
  `describe_detail_catalogue` text DEFAULT NULL,
  `photo_detail_catalogue` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaction`
--

CREATE TABLE `detail_transaction` (
  `id_detail_transaction` int(11) NOT NULL,
  `kd_transaction` varchar(30) DEFAULT NULL,
  `email_users` varchar(50) NOT NULL,
  `name_customers` varchar(50) NOT NULL,
  `telp_customers` varchar(20) NOT NULL,
  `address_customers` varchar(300) NOT NULL,
  `date_transaction` datetime DEFAULT NULL,
  `total_quantity` int(11) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `total_transaction` int(11) DEFAULT NULL,
  `payment_options` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `order_id` varchar(20) DEFAULT NULL,
  `potongan_saldo` int(11) DEFAULT NULL,
  `total_payment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `income_referal`
--

CREATE TABLE `income_referal` (
  `id_income` int(11) NOT NULL,
  `referal` varchar(50) NOT NULL,
  `kd_transaction` varchar(50) NOT NULL,
  `income` int(11) NOT NULL,
  `tax_income` int(11) NOT NULL,
  `total_income` int(11) NOT NULL,
  `date_income` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id` varchar(10) NOT NULL,
  `nama_kabupaten` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` varchar(10) NOT NULL,
  `nama_kecamatan` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id` varchar(10) NOT NULL,
  `nama_kelurahan` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `midtrans`
--

CREATE TABLE `midtrans` (
  `order_id` char(20) NOT NULL,
  `kd_transaction` varchar(13) NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `transaction_time` varchar(19) NOT NULL,
  `bank` varchar(20) DEFAULT NULL,
  `va_number` varchar(30) DEFAULT NULL,
  `pdf_url` text DEFAULT NULL,
  `status_code` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `npwp_be`
--

CREATE TABLE `npwp_be` (
  `id_npwp` int(11) NOT NULL,
  `npwp` varchar(100) NOT NULL,
  `email_npwp` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `photo_product`
--

CREATE TABLE `photo_product` (
  `id_photoproduct` int(11) NOT NULL,
  `kd_product` varchar(50) NOT NULL,
  `photo_product` varchar(50) NOT NULL,
  `describe_photoproduct` text DEFAULT NULL,
  `users` int(11) NOT NULL,
  `created_photoproduct` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `photo_unit`
--

CREATE TABLE `photo_unit` (
  `id_photounit` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `describe_photounit` text DEFAULT NULL,
  `users` int(11) NOT NULL,
  `created_photounit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `popup`
--

CREATE TABLE `popup` (
  `id_popup` int(11) NOT NULL,
  `photo_popup` varchar(50) NOT NULL,
  `buttonlink_popup` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `kd_product` varchar(50) NOT NULL,
  `name_product` varchar(50) NOT NULL,
  `slug_product` varchar(50) NOT NULL,
  `describe_product` text DEFAULT NULL,
  `brand_product` int(11) NOT NULL,
  `category_product` int(11) NOT NULL,
  `users` int(11) NOT NULL,
  `created_product` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_product` varchar(10) DEFAULT NULL,
  `date_arrived` date DEFAULT NULL,
  `subbutton_name` varchar(30) DEFAULT NULL,
  `subbutton_link` varchar(100) DEFAULT NULL,
  `discount` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id` varchar(10) NOT NULL,
  `nama_provinsi` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `referal`
--

CREATE TABLE `referal` (
  `id_referal` int(11) NOT NULL,
  `code_referal` varchar(50) NOT NULL,
  `users_email_referal` varchar(50) NOT NULL,
  `level_referal` int(11) NOT NULL,
  `describe` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo_be`
--

CREATE TABLE `saldo_be` (
  `id_saldobe` int(11) NOT NULL,
  `email_be` varchar(50) NOT NULL,
  `saldo` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tax_be`
--

CREATE TABLE `tax_be` (
  `id_tax` int(11) NOT NULL,
  `kd_transaction` varchar(50) NOT NULL,
  `nama_be` varchar(50) NOT NULL,
  `email_be` varchar(50) NOT NULL,
  `code_referal` varchar(50) NOT NULL,
  `amount_tax` int(11) NOT NULL,
  `date_tax` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` int(11) NOT NULL,
  `kd_transaction` varchar(50) NOT NULL,
  `users` varchar(50) NOT NULL,
  `code_product` varchar(50) NOT NULL,
  `variation` int(11) NOT NULL,
  `kd_unit` varchar(50) DEFAULT NULL,
  `name_unit` varchar(50) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `date_transaction` datetime DEFAULT NULL,
  `date_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ongkir` int(11) DEFAULT NULL,
  `name_product` varchar(50) DEFAULT NULL,
  `photo_product` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transfer`
--

CREATE TABLE `transfer` (
  `id_transfer` int(11) NOT NULL,
  `kd_transaction` varchar(10) NOT NULL,
  `date_transaction` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `amount_transaction` int(15) NOT NULL,
  `photo_proof` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_product`
--

CREATE TABLE `unit_product` (
  `id_unit` int(11) NOT NULL,
  `kd_unit` varchar(50) NOT NULL,
  `kd_product` varchar(50) NOT NULL,
  `name_unit` varchar(50) NOT NULL,
  `price_unit` int(13) NOT NULL,
  `users` int(11) NOT NULL,
  `photo_unit` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  `saldo` int(11) DEFAULT 0,
  `referal` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `variation_product`
--

CREATE TABLE `variation_product` (
  `id_variation` int(11) NOT NULL,
  `kd_product` varchar(30) NOT NULL,
  `name_variation` varchar(30) NOT NULL,
  `price_variation` int(20) NOT NULL,
  `length_variation` int(11) DEFAULT NULL,
  `width_variation` int(11) DEFAULT NULL,
  `weight_variation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `visitor`
--

CREATE TABLE `visitor` (
  `ip` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `online` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Indeks untuk tabel `brand_product`
--
ALTER TABLE `brand_product`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indeks untuk tabel `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id_carousel`);

--
-- Indeks untuk tabel `cashback`
--
ALTER TABLE `cashback`
  ADD PRIMARY KEY (`id_cashback`);

--
-- Indeks untuk tabel `catalogue`
--
ALTER TABLE `catalogue`
  ADD PRIMARY KEY (`id_catalogue`);

--
-- Indeks untuk tabel `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `detail_catalogue`
--
ALTER TABLE `detail_catalogue`
  ADD PRIMARY KEY (`id_detail_catalogue`);

--
-- Indeks untuk tabel `detail_transaction`
--
ALTER TABLE `detail_transaction`
  ADD PRIMARY KEY (`id_detail_transaction`);

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `income_referal`
--
ALTER TABLE `income_referal`
  ADD PRIMARY KEY (`id_income`);

--
-- Indeks untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `midtrans`
--
ALTER TABLE `midtrans`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `npwp_be`
--
ALTER TABLE `npwp_be`
  ADD PRIMARY KEY (`id_npwp`);

--
-- Indeks untuk tabel `photo_product`
--
ALTER TABLE `photo_product`
  ADD PRIMARY KEY (`id_photoproduct`);

--
-- Indeks untuk tabel `photo_unit`
--
ALTER TABLE `photo_unit`
  ADD PRIMARY KEY (`id_photounit`);

--
-- Indeks untuk tabel `popup`
--
ALTER TABLE `popup`
  ADD PRIMARY KEY (`id_popup`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`kd_product`),
  ADD KEY `id_product` (`id_product`);

--
-- Indeks untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `referal`
--
ALTER TABLE `referal`
  ADD PRIMARY KEY (`id_referal`);

--
-- Indeks untuk tabel `saldo_be`
--
ALTER TABLE `saldo_be`
  ADD PRIMARY KEY (`id_saldobe`);

--
-- Indeks untuk tabel `tax_be`
--
ALTER TABLE `tax_be`
  ADD PRIMARY KEY (`id_tax`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indeks untuk tabel `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id_transfer`);

--
-- Indeks untuk tabel `unit_product`
--
ALTER TABLE `unit_product`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indeks untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indeks untuk tabel `variation_product`
--
ALTER TABLE `variation_product`
  ADD PRIMARY KEY (`id_variation`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id_alamat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `brand_product`
--
ALTER TABLE `brand_product`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id_carousel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cashback`
--
ALTER TABLE `cashback`
  MODIFY `id_cashback` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `catalogue`
--
ALTER TABLE `catalogue`
  MODIFY `id_catalogue` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_catalogue`
--
ALTER TABLE `detail_catalogue`
  MODIFY `id_detail_catalogue` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_transaction`
--
ALTER TABLE `detail_transaction`
  MODIFY `id_detail_transaction` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `income_referal`
--
ALTER TABLE `income_referal`
  MODIFY `id_income` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `npwp_be`
--
ALTER TABLE `npwp_be`
  MODIFY `id_npwp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `photo_product`
--
ALTER TABLE `photo_product`
  MODIFY `id_photoproduct` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `photo_unit`
--
ALTER TABLE `photo_unit`
  MODIFY `id_photounit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `popup`
--
ALTER TABLE `popup`
  MODIFY `id_popup` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `referal`
--
ALTER TABLE `referal`
  MODIFY `id_referal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `saldo_be`
--
ALTER TABLE `saldo_be`
  MODIFY `id_saldobe` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tax_be`
--
ALTER TABLE `tax_be`
  MODIFY `id_tax` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id_transfer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `unit_product`
--
ALTER TABLE `unit_product`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `variation_product`
--
ALTER TABLE `variation_product`
  MODIFY `id_variation` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
