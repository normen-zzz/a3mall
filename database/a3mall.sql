-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jan 2022 pada 13.43
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
-- Struktur dari tabel `category_product`
--

CREATE TABLE `category_product` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(50) NOT NULL,
  `describe_category` text DEFAULT NULL,
  `users` int(11) NOT NULL,
  `created_category` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `category_product`
--

INSERT INTO `category_product` (`id_category`, `name_category`, `describe_category`, `users`, `created_category`) VALUES
(1, 'Spring Bed', 'ini adalah category spring bed', 1, '2022-01-15 11:09:37'),
(2, 'Sofa', 'ini adalah category Sofa', 1, '2022-01-15 11:32:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaction`
--

CREATE TABLE `detail_transaction` (
  `id_detail_transaction` int(11) NOT NULL,
  `id_customers` int(11) NOT NULL,
  `name_customers` varchar(50) NOT NULL,
  `email_customers` varchar(50) NOT NULL,
  `telp_customers` varchar(20) NOT NULL,
  `address_customers` varchar(300) NOT NULL,
  `date_transaction` datetime DEFAULT NULL,
  `total_transaction` int(11) DEFAULT NULL,
  `payment_options` varchar(50) DEFAULT NULL,
  `kd_transaction` varchar(30) DEFAULT NULL,
  `status_bayar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_transaction`
--

INSERT INTO `detail_transaction` (`id_detail_transaction`, `id_customers`, `name_customers`, `email_customers`, `telp_customers`, `address_customers`, `date_transaction`, `total_transaction`, `payment_options`, `kd_transaction`, `status_bayar`) VALUES
(1, 3, 'normen', 'normanardian24@gmail.com', '085697780467', 'jalan lengkong gudang timur 4, rt.004. rw.003 no.77', '2022-01-21 09:19:45', 25000, 'midtrans', 'ref225', 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

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

--
-- Dumping data untuk tabel `midtrans`
--

INSERT INTO `midtrans` (`order_id`, `kd_transaction`, `gross_amount`, `payment_type`, `transaction_time`, `bank`, `va_number`, `pdf_url`, `status_code`) VALUES
('', '1', 25000, 'transfer', '', 'bca', '123456765432', NULL, '200');

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

--
-- Dumping data untuk tabel `photo_product`
--

INSERT INTO `photo_product` (`id_photoproduct`, `kd_product`, `photo_product`, `describe_photoproduct`, `users`, `created_photoproduct`) VALUES
(15, 'D23344', 'DYNASTY.png', NULL, 0, '2022-01-26 08:42:43'),
(16, 'D23345', '64_2.png', NULL, 0, '2022-01-26 08:43:32'),
(17, 'D23344', 'dynasty2.png', '', 1, '2022-01-26 08:58:25'),
(18, 'D23345', '05.png', '', 1, '2022-01-26 09:07:28');

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
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `kd_product` varchar(50) NOT NULL,
  `name_product` varchar(50) NOT NULL,
  `slug_product` varchar(50) NOT NULL,
  `price_product` varchar(20) NOT NULL,
  `describe_product` text DEFAULT NULL,
  `brand_product` varchar(50) NOT NULL,
  `category_product` int(11) NOT NULL,
  `users` int(11) NOT NULL,
  `created_product` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_product` varchar(10) DEFAULT NULL,
  `date_arrived` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_product`, `kd_product`, `name_product`, `slug_product`, `price_product`, `describe_product`, `brand_product`, `category_product`, `users`, `created_product`, `status_product`, `date_arrived`) VALUES
(1, 'D23344', 'Dynasty', 'dynasty', '2000000', 'Ini dynasty', 'Escon', 1, 1, '2022-01-26 08:42:43', 'active', '2022-01-27'),
(2, 'D23345', 'KasurBaru', 'kasur-baru', '2000000', 'Ini Kasur Baru', 'Escon', 1, 1, '2022-01-26 15:20:32', 'active', '2022-01-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` int(11) NOT NULL,
  `kd_transaction` varchar(50) NOT NULL,
  `users` int(11) NOT NULL,
  `code_product` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `date_transaction` datetime DEFAULT NULL,
  `date_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`id_transaction`, `kd_transaction`, `users`, `code_product`, `price`, `quantity`, `total_price`, `date_transaction`, `date_update`) VALUES
(1, 'ref225', 3, 'S23456', 25000, 1, 25000, '2022-01-21 09:18:21', '2022-01-21 02:18:27');

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
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `photo`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$10$KjhOcwUXBcyxRJsRx/hgz.Udvc1qP3wozPc71/55Q4IdMugWXpHqS', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1643256027, 1, 'Admin', 'istrator', 'ADMIN', '0', NULL),
(9, '::1', NULL, '$2y$10$OS9lm0vgQJT0I6BD4W9Gqu2tlri4iry9MQwpY5yaI29JFvRvGUDBi', 'firmanruhiyan@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1643257486, NULL, 1, 'firman', 'ruhiyan', NULL, NULL, 'firman ruhiyan.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id_category`);

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
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`kd_product`),
  ADD KEY `id_product` (`id_product`);

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
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_transaction`
--
ALTER TABLE `detail_transaction`
  MODIFY `id_detail_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `photo_product`
--
ALTER TABLE `photo_product`
  MODIFY `id_photoproduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `photo_unit`
--
ALTER TABLE `photo_unit`
  MODIFY `id_photounit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id_transfer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `unit_product`
--
ALTER TABLE `unit_product`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
