-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 02 Haz 2023, 17:08:24
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `notdefteri`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici_tablosu`
--

CREATE TABLE `kullanici_tablosu` (
  `contact_id` int(11) NOT NULL COMMENT 'Primary Key',
  `name` varchar(255) NOT NULL,
  `kullanici_adi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sifre` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `kullanici_tablosu`
--

INSERT INTO `kullanici_tablosu` (`contact_id`, `name`, `kullanici_adi`, `email`, `sifre`) VALUES
(18, 'Kazim Can Ayik', 'kazim', 'kazimcanayik@gmail.com', '123456'),
(13, 'Ersin Cihat Bolel', 'Ersin', 'ersin@hotmail.com', '123456'),
(17, 'Berrinn', 'Berrinyildiz', 'berrin@gmail.com', '1111'),
(14, 'Semanur Pekdas', 'semanur', 'semanur@hotmail.com', '123456'),
(19, 'Simge', 'simge19', 'simge@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `not_tablosu`
--

CREATE TABLE `not_tablosu` (
  `notu_id` int(11) NOT NULL COMMENT 'Primary Key',
  `notu_adi` varchar(255) NOT NULL,
  `notu_konu` varchar(255) NOT NULL,
  `notu_tarihi` varchar(30) NOT NULL,
  `notu_yazi` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `not_tablosu`
--

INSERT INTO `not_tablosu` (`notu_id`, `notu_adi`, `notu_konu`, `notu_tarihi`, `notu_yazi`) VALUES
(59, 'Semanur', 'Yasa Bagli Görülen Göz Hastaliklari', '2023-07-27', 'Yasa bagli retina dejenerasyonu, Katarakt (lensin seffafligini kaybetmesi)'),
(57, 'Berrin', 'Yapilacaklar Listesi', '2023-06-08', 'Web Programlama Projesini Ekip Arkadaslarin ile Bitir.'),
(58, 'Ersin', 'Kalp Hastaliklari Nelerdir ', '2023-08-29', 'Dogustan gelen hastaliklar, Kalp ritminin bozuklugu ile ortaya çikan kalp hastaliklari'),
(61, 'Kazimcan', 'Kaliteli soz', '2023-07-04', 'Ne renk olursa olsun gözlerin, hepimizden dökülen gözyasi ayni renk…'),
(62, 'Simge Akpinar', 'Bilgisayar Muhendisligi', '2023-12-17', 'Bilgisayar mühendisligi temel olarak yazilim, programlama ve algoritma ile ilgilenir. ');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kullanici_tablosu`
--
ALTER TABLE `kullanici_tablosu`
  ADD PRIMARY KEY (`contact_id`);

--
-- Tablo için indeksler `not_tablosu`
--
ALTER TABLE `not_tablosu`
  ADD PRIMARY KEY (`notu_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kullanici_tablosu`
--
ALTER TABLE `kullanici_tablosu`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `not_tablosu`
--
ALTER TABLE `not_tablosu`
  MODIFY `notu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
