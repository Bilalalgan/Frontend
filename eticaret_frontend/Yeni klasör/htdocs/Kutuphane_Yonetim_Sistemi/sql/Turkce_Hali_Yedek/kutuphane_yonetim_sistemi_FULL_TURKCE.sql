-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 10 May 2023, 23:04:30
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kutuphane_yonetim_sistemi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_adi` varchar(50) NOT NULL,
  `kullanici_adi` varchar(30) NOT NULL,
  `sifre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `admin_adi`, `kullanici_adi`, `sifre`) VALUES
(13, '', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `iade_suresi` int(11) NOT NULL,
  `ceza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `iade_suresi`, `ceza`) VALUES
(1, 20, 50);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_adi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_adi`) VALUES
(1, 'Bilim Kurgu'),
(2, 'Tarih'),
(3, 'Biyografi'),
(4, 'klasik edebiyat'),
(5, 'Mizah'),
(6, 'Yemek Kitapları'),
(7, 'Macera'),
(8, 'Drama'),
(9, 'Polisiye'),
(10, 'Roman'),
(11, 'Psikoloji'),
(12, 'Romantik'),
(13, 'Çocuk Kitapları'),
(14, 'Genç Yetişkin'),
(15, 'Felsefe'),
(16, 'Seyahat'),
(17, 'İş ve Kariyer'),
(18, 'Sanat ve Tasarım'),
(19, 'Korku'),
(20, 'Klasik');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitap`
--

CREATE TABLE `kitap` (
  `kitap_id` int(11) NOT NULL,
  `kitap_adi` varchar(50) NOT NULL,
  `kitap_kategorisi` varchar(30) NOT NULL,
  `kitap_yazari` varchar(50) NOT NULL,
  `kitap_yayinevi` varchar(40) NOT NULL,
  `kitap_durum` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kitap`
--

INSERT INTO `kitap` (`kitap_id`, `kitap_adi`, `kitap_kategorisi`, `kitap_yazari`, `kitap_yayinevi`, `kitap_durum`) VALUES
(11, 'Kuyucaklı Yusuf', '7', '15', '7', 'N'),
(12, 'İstanbul Hatırası', '10', '16', '8', 'N'),
(13, 'Sessiz Ev', '11', '17', '9', 'N'),
(14, 'Kardeşimin Hikayesi', '9', '18', '10', 'Y'),
(15, 'Beyaz Kale', '8', '19', '11', 'Y'),
(16, 'Dokuzuncu Hariciye Koğuşu', '1', '1', '1', 'N'),
(19, 'Yelkenli Gemi', '12', '17', '12', 'Y'),
(21, 'Yıldızlara İnecek Aşkın Kılavuzu', '1', '1', '1', 'Y');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitap_odunc_verme`
--

CREATE TABLE `kitap_odunc_verme` (
  `odunc_id` int(11) NOT NULL,
  `odunc_adi` varchar(50) NOT NULL,
  `odunc_kitap` varchar(40) NOT NULL,
  `odunc_verme_tarihi` date DEFAULT NULL,
  `odunc_geri_alma_tarihi` date DEFAULT NULL,
  `odunc_durum` varchar(10) NOT NULL,
  `ogrencinin_kitabi_teslim_ettigi_tarih` date DEFAULT NULL,
  `ceza` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kitap_odunc_verme`
--

INSERT INTO `kitap_odunc_verme` (`odunc_id`, `odunc_adi`, `odunc_kitap`, `odunc_verme_tarihi`, `odunc_geri_alma_tarihi`, `odunc_durum`, `ogrencinin_kitabi_teslim_ettigi_tarih`, `ceza`) VALUES
(37, '10', '13', '2021-07-16', '2021-09-05', 'N', NULL, NULL),
(38, '14', '11', '2021-07-16', '2021-08-05', 'Y', '2023-04-28', NULL),
(39, '9', '15', '2021-07-16', '2021-07-15', 'Y', '2023-04-30', NULL),
(40, '13', '12', '2023-04-28', '2023-05-18', 'Y', '2023-04-28', NULL),
(41, '11', '12', '2023-01-28', '2023-02-18', 'N', NULL, NULL),
(42, '9', '11', '2023-04-28', '2023-05-18', 'Y', '2023-04-29', NULL),
(43, '11', '16', '2023-04-29', '2023-05-19', 'N', NULL, NULL),
(45, '11', '14', '2023-02-20', '2023-04-20', 'Y', '2023-03-30', NULL),
(46, '100', '14', '2023-04-30', '2023-05-20', 'Y', '2023-04-30', NULL),
(47, '90', '11', '2023-04-30', '2023-05-20', 'N', NULL, NULL),
(48, '22', '15', '2023-05-10', '2023-05-30', 'Y', '2023-05-10', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenciler`
--

CREATE TABLE `ogrenciler` (
  `ogrenci_id` int(11) NOT NULL,
  `ogrenci_adi` varchar(50) NOT NULL,
  `ogrenci_adresi` varchar(100) NOT NULL,
  `ogrenci_cinsiyeti` varchar(10) NOT NULL,
  `ogrenci_sinifi` varchar(30) NOT NULL,
  `ogrenci_yas` int(11) NOT NULL,
  `ogrenci_telefon` varchar(12) NOT NULL,
  `ogrenci_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `ogrenciler`
--

INSERT INTO `ogrenciler` (`ogrenci_id`, `ogrenci_adi`, `ogrenci_adresi`, `ogrenci_cinsiyeti`, `ogrenci_sinifi`, `ogrenci_yas`, `ogrenci_telefon`, `ogrenci_email`) VALUES
(9, 'Elif Demir', 'İstanbul Mahallesi, Atatürk Caddesi No: 123, İzmir', 'Kadın', '2. Sınıf', 22, '555 123 4567', 'elif.demir@hotmail.com'),
(10, 'Ahmet Yılmaz', 'Ankara Mahallesi, Cumhuriyet Sokak No: 45, Ankara', 'Erkek', '1. Sınıf', 19, '555 987 6543', 'ahmet.yilmaz@hotmail.com'),
(11, 'Mehmet Arslan', 'Bursa Mahallesi, Orman Caddesi No: 56, Bursa', 'Erkek', '4. Sınıf', 27, '555 369 2584', 'mehmet.arslan@hotmail.com'),
(12, 'Ayşe Kaya', 'İzmir Mahallesi, Bahçe Sokak No: 78, İstanbul', 'kadın', '4. Sınıf', 30, '555 246 8135', 'ayse.kaya@hotmail.com'),
(13, 'Zeynep Şahin', 'Antalya Mahallesi, Sahil Sokak No: 32, Antalya', 'Kadın', '3.Sınıf', 28, '555 741 8529', 'zeynep.sahin@hotmail.com'),
(14, 'Ali Tekin', 'İzmit Mahallesi, Park Caddesi No: 9, Kocaeli', 'Erkek', '2. Sınıf', 30, '555 628 3749', 'ali.tekin@hotmail.com'),
(17, 'Ahmet Hakan', 'Gazi Mahallesi, Kaplan Caddesi No: 957, İzmir', 'Kadın', '3. Sınıf', 33, '555-123-4567', 'Ahmet.hakan@hotmail.com'),
(18, 'Ahmet Hakan', 'Gazi Mahallesi, Kaplan Caddesi No: 957, İzmir', 'Erkek', '3. Sınıf', 33, '555-123-4567', 'Ahmet.hakan@hotmail.com'),
(19, 'Mehmet Özkan', 'Atatürk Mahallesi, İstanbul Caddesi No: 123, Ankara', 'Erkek', '4. Sınıf', 11, '555-234-5678', 'mehmet.ozkan@example.com'),
(20, 'Ayşe Kaya', 'Gül Mahallesi, Çınar Caddesi No: 456, Bursa', 'Kadın', '2. Sınıf', 8, '555-345-6789', 'ayse.kaya@example.com'),
(21, 'Ali Yılmaz', 'Bahçe Mahallesi, Çiçek Sokak No: 789, Antalya', 'Erkek', '4. Sınıf', 10, '555-456-7890', 'ali.yilmaz@example.com'),
(22, 'Fatma Şahin', 'İnci Mahallesi, Zeytin Caddesi No: 012, İzmir', 'Kadın', '1. Sınıf', 19, '555-567-8901', 'fatma.sahin@example.com'),
(23, 'Ahmet Demir', 'Kaplan Mahallesi, Manolya Caddesi No: 345, Ankara', 'Erkek', '3. Sınıf', 28, '555-678-9012', 'ahmet.demir@example.com'),
(24, 'Selin Avcı', 'Başak Mahallesi, Elma Sokak No: 678, İstanbul', 'Kadın', '2. Sınıf', 22, '555-789-0123', 'selin.avci@example.com'),
(25, 'Ayşe Özler', 'Gece Mahallesi, Halil Sokak No: 587, Çanakkale', 'Kadın', '4. Sınıf', 26, '555-789-0123', 'selin.avci@example.com'),
(26, 'Kemal Güneş', 'Yıldız Mahallesi, Güneş Caddesi No: 901, Ankara', 'Erkek', '2. Sınıf', 25, '555-890-1234', 'kemal.gunes@example.com'),
(27, 'Ebru Yıldırım', 'Palmiye Mahallesi, Zambak Sokak No: 234, İzmir', 'Kadın', '4. Sınıf', 22, '555-901-2345', 'ebru.yildirim@example.com'),
(28, 'Emre Kılıç', 'Nar Mahallesi, Papatya Caddesi No: 567, İstanbul', 'Erkek', '1. Sınıf', 19, '555-012-3456', 'emre.kilic@example.com'),
(29, 'Aysun Kara', 'Menekşe Mahallesi, Leylak Sokak No: 890, Bursa', 'Kadın', '4. Sınıf', 24, '555-123-4567', 'aysun.kara@example.com'),
(30, 'Eren Öztürk', 'Gül Mahallesi, Yasemin Caddesi No: 123, Antalya', 'Erkek', '3. Sınıf', 29, '555-234-5678', 'eren.ozturk@example.com'),
(31, 'Derya Yılmaz', 'Çınar Mahallesi, Zeytin Caddesi No: 456, İzmir', 'Kadın', '1. Sınıf', 20, '555-345-6789', 'derya.yilmaz@example.com'),
(32, 'Derya Yılmaz', 'Çınar Mahallesi, Zeytin Caddesi No: 456, İzmir', 'Kadın', '1. Sınıf', 19, '555-345-6789', 'derya.yilmaz@example.com'),
(33, 'Caner Arslan', 'Atatürk Mahallesi, Gül Sokak No: 789, Ankara', 'Erkek', '4. Sınıf', 21, '555-456-7890', 'caner.arslan@example.com'),
(34, 'Sena Aksoy', 'Yıldız Mahallesi, Ay Çiçeği Caddesi No: 012, İstanbul', 'Kadın', '4. Sınıf', 27, '555-567-8901', 'sena.aksoy@example.com'),
(35, 'Burak Yıldız', 'Gazi Mahallesi, Zambak Sokak No: 345, İzmir', 'Erkek', '4. Sınıf', 29, '555-678-9012', 'burak.yildiz@example.com'),
(36, 'Sude Avcı', 'Kaplan Mahallesi, Menekşe Caddesi No: 678, Bursa', 'Kadın', '2. Sınıf', 23, '555-789-0123', 'sude.avci@example.com'),
(37, 'Cemal Güneş', 'Bahçe Mahallesi, Leylak Sokak No: 901, Ankara', 'Erkek', '1. Sınıf', 22, '555-890-1234', 'cemal.gunes@example.com'),
(38, 'Hakan Yılmaz', 'Atatürk Mahallesi, Gazi Caddesi No: 957, İzmir', 'Erkek', '3. Sınıf', 33, '555-123-4567', 'hakan.yilmaz@example.com'),
(39, 'Özlem Kaya', 'Gül Mahallesi, Çınar Caddesi No: 123, Ankara', 'Kadın', '1. Sınıf', 21, '555-234-5678', 'ozlem.kaya@example.com'),
(40, 'Ayşe Güneş', 'Menekşe Mahallesi, Zeytin Sokak No: 456, Bursa', 'Kadın', '2. Sınıf', 28, '555-345-6789', 'ayse.gunes@example.com'),
(41, 'Ali Demir', 'Bahçe Mahallesi, Çiçek Caddesi No: 789, Antalya', 'Erkek', '4. Sınıf', 20, '555-456-7890', 'ali.demir@example.com'),
(42, 'Fatma Şahin', 'İnci Mahallesi, Zeytin Caddesi No: 012, İzmir', 'Kadın', '1. Sınıf', 19, '555-567-8901', 'fatma.sahin@example.com'),
(43, 'Mehmet Kaya', 'Kaplan Mahallesi, Manolya Caddesi No: 345, Ankara', 'Erkek', '3. Sınıf', 28, '555-678-9012', 'mehmet.kaya@example.com'),
(44, 'Selin Öztürk', 'Başak Mahallesi, Elma Sokak No: 678, İstanbul', 'Kadın', '2. Sınıf', 22, '555-789-0123', 'selin.ozturk@example.com'),
(45, 'Emre Güneş', 'Yıldız Mahallesi, Güneş Caddesi No: 901, Ankara', 'Erkek', '2. Sınıf', 25, '555-890-1234', 'emre.gunes@example.com'),
(46, 'Ebru Yıldırım', 'Palmiye Mahallesi, Zambak Sokak No: 234, İzmir', 'Kadın', '5. Sınıf', 22, '555-901-2345', 'ebru.yildirim@example.com'),
(47, 'Kadir Kılıç', 'Nar Mahallesi, Papatya Caddesi No: 567, İstanbul', 'Erkek', '1. Sınıf', 19, '555-012-3456', 'kadir.kilic@example.com'),
(48, 'Aysun Çelik', 'Menekşe Mahallesi, Leylak Sokak No: 890, Bursa', 'Kadın', '4. Sınıf', 24, '555-123-4567', 'aysun.celik@example.com'),
(49, 'Eren Şahin', 'Gül Mahallesi, Yasemin Caddesi No: 123, Antalya', 'Erkek', '3. Sınıf', 29, '555-234-5678', 'eren.sahin@example.com'),
(50, 'Derya Yıldız', 'Çınar Mahallesi, Zeytin Caddesi No: 456, İzmir', 'Kadın', '1. Sınıf', 20, '555-345-6789', 'derya.yildiz@example.com'),
(51, 'Derya Yılmaz', 'Çınar Mahallesi, Zeytin Caddesi No: 456, İzmir', 'Kadın', '1. Sınıf', 19, '555-345-6789', 'derya.yilmaz@example.com'),
(52, 'Caner Arslan', 'Atatürk Mahallesi, Gül Sokak No: 789, Ankara', 'Erkek', '4. Sınıf', 21, '555-456-7890', 'caner.arslan@example.com'),
(53, 'Sena Yılmaz', 'Yıldız Mahallesi, Ay Çiçeği Caddesi No: 012, İstanbul', 'Kadın', '4. Sınıf', 27, '555-567-8901', 'sena.yilmaz@example.com'),
(54, 'Burak Aksoy', 'Gazi Mahallesi, Zambak Sokak No: 345, İzmir', 'Erkek', '4. Sınıf', 29, '555-678-9012', 'burak.aksoy@example.com'),
(55, 'Sude Çelik', 'Kaplan Mahallesi, Menekşe Caddesi No: 678, Bursa', 'Kadın', '2. Sınıf', 23, '555-789-0123', 'sude.celik@example.com'),
(56, 'Cemal Aydın', 'Bahçe Mahallesi, Leylak Sokak No: 901, Ankara', 'Erkek', '1. Sınıf', 22, '555-890-1234', 'cemal.aydin@example.com'),
(57, 'Ayşe Korkmaz', 'Atatürk Mahallesi, Güneş Caddesi No: 123, Ankara', 'Kadın', '3. Sınıf', 26, '555-123-4567', 'ayse.korkmaz@example.com'),
(58, 'Ahmet Öztürk', 'Bahçe Mahallesi, Çiçek Sokak No: 456, Antalya', 'Erkek', '2. Sınıf', 23, '555-234-5678', 'ahmet.ozturk@example.com'),
(59, 'Mehmet Kaya', 'Gül Mahallesi, Zeytin Caddesi No: 789, İzmir', 'Erkek', '1. Sınıf', 21, '555-345-6789', 'mehmet.kaya@example.com'),
(60, 'Ali Şahin', 'İnci Mahallesi, Manolya Caddesi No: 012, İstanbul', 'Erkek', '4. Sınıf', 29, '555-456-7890', 'ali.sahin@example.com'),
(61, 'Fatma Demir', 'Kaplan Mahallesi, Elma Sokak No: 345, Bursa', 'Kadın', '3. Sınıf', 25, '555-567-8901', 'fatma.demir@example.com'),
(62, 'Ayşe Avcı', 'Başak Mahallesi, Papatya Caddesi No: 678, Ankara', 'Kadın', '1. Sınıf', 20, '555-678-9012', 'ayse.avci@example.com'),
(63, 'Kemal Güneş', 'Yıldız Mahallesi, Menekşe Sokak No: 901, İstanbul', 'Erkek', '4. Sınıf', 28, '555-789-0123', 'kemal.gunes@example.com'),
(64, 'Selin Kılıç', 'Palmiye Mahallesi, Zambak Caddesi No: 234, İzmir', 'Kadın', '2. Sınıf', 19, '555-901-2345', 'selin.kilic@example.com'),
(65, 'Ebru Arslan', 'Atatürk Mahallesi, Gül Sokak No: 567, Ankara', 'Kadın', '1. Sınıf', 20, '555-012-3456', 'ebru.arslan@example.com'),
(66, 'Emre Yıldırım', 'Gül Mahallesi, Yasemin Caddesi No: 123, İstanbul', 'Erkek', '3. Sınıf', 23, '555-123-4567', 'emre.yildirim@example.com'),
(67, 'Aysun Yılmaz', 'Bahçe Mahallesi, Zeytin Sokak No: 456, Antalya', 'Kadın', '4. Sınıf', 30, '555-234-5678', 'aysun.yilmaz@example.com'),
(68, 'Eren Kara', 'İnci Mahallesi, Elma Caddesi No: 789, İzmir', 'Erkek', '2. Sınıf', 22, '555-345-6789', 'eren.kara@example.com'),
(69, 'Derya Öztürk', 'Kaplan Mahallesi, Manolya Sokak No: 012, Bursa', 'Kadın', '3. Sınıf', 24, '555-456-7890', 'derya.ozturk@example.com'),
(70, 'Caner Korkmaz', 'Başak Mahallesi, Papatya Caddesi No: 345, Ankara', 'Erkek', '4. Sınıf', 27, '555-567-8901', 'caner.korkmaz@example.com'),
(71, 'Sena Yılmaz', 'Yıldız Mahallesi, Menekşe Sokak No: 678, İstanbul', 'Kadın', '2. Sınıf', 21, '555-678-9012', 'sena.yilmaz@example.com'),
(72, 'Berkay Arslan', 'Palmiye Mahallesi, Gül Caddesi No: 901, İzmir', 'Erkek', '4. Sınıf', 29, '555-789-0123', 'berkay.arslan@example.com'),
(73, 'Zeynep Kaya', 'Atatürk Mahallesi, Güneş Sokak No: 234, Ankara', 'Kadın', '1. Sınıf', 19, '555-901-2345', 'zeynep.kaya@example.com'),
(74, 'Emir Şahin', 'Gül Mahallesi, Çiçek Caddesi No: 567, Antalya', 'Erkek', '3. Sınıf', 25, '555-012-3456', 'emir.sahin@example.com'),
(75, 'Esra Demir', 'İnci Mahallesi, Zeytin Sokak No: 890, İzmir', 'Kadın', '2. Sınıf', 23, '555-123-4567', 'esra.demir@example.com'),
(76, 'Cem Yıldız', 'Kaplan Mahallesi, Elma Caddesi No: 123, Bursa', 'Erkek', '4. Sınıf', 27, '555-234-5678', 'cem.yildiz@example.com'),
(77, 'Gizem Avcı', 'Başak Mahallesi, Papatya Sokak No: 456, Ankara', 'Kadın', '1. Sınıf', 20, '555-345-6789', 'gizem.avci@example.com'),
(78, 'Mert Güneş', 'Yıldız Mahallesi, Menekşe Caddesi No: 789, İstanbul', 'Erkek', '3. Sınıf', 26, '555-456-7890', 'mert.gunes@example.com'),
(79, 'Elif Kılıç', 'Palmiye Mahallesi, Gül Sokak No: 012, İzmir', 'Kadın', '2. Sınıf', 22, '555-567-8901', 'elif.kilic@example.com'),
(80, 'Umut Arslan', 'Atatürk Mahallesi, Güneş Caddesi No: 345, Ankara', 'Erkek', '1. Sınıf', 19, '555-678-9012', 'umut.arslan@example.com'),
(81, 'Aslı Yılmaz', 'Gül Mahallesi, Çiçek Sokak No: 678, Antalya', 'Kadın', '3. Sınıf', 24, '555-789-0123', 'asli.yilmaz@example.com'),
(82, 'Deniz Kaya', 'İnci Mahallesi, Zeytin Caddesi No: 901, İzmir', 'Erkek', '4. Sınıf', 29, '555-901-2345', 'deniz.kaya@example.com'),
(83, 'Ayşe Şahin', 'Kaplan Mahallesi, Elma Sokak No: 234, Bursa', 'Kadın', '3. Sınıf', 25, '555-012-3456', 'ayse.sahin@example.com'),
(84, 'Cemre Öztürk', 'Başak Mahallesi, Papatya Caddesi No: 567, Ankara', 'Kadın', '1. Sınıf', 20, '555-123-4567', 'cemre.ozturk@example.com'),
(85, 'Kaan Demir', 'Yıldız Mahallesi, Menekşe Sokak No: 890, İstanbul', 'Erkek', '4. Sınıf', 27, '555-234-5678', 'kaan.demir@example.com'),
(86, 'Yasemin Yılmaz', 'Palmiye Mahallesi, Gül Caddesi No: 123, İzmir', 'Kadın', '2. Sınıf', 21, '555-345-6789', 'yasemin.yilmaz@example.com'),
(87, 'Murat Arslan', 'Atatürk Mahallesi, Güneş Sokak No: 456, Ankara', 'Erkek', '1. Sınıf', 19, '555-456-7890', 'murat.arslan@example.com'),
(88, 'Ece Kılıç', 'Gül Mahallesi, Çiçek Caddesi No: 789, Antalya', 'Kadın', '3. Sınıf', 24, '555-567-8901', 'ece.kilic@example.com'),
(89, 'Ahmet Yılmaz', 'İnci Mahallesi, Zeytin Sokak No: 012, İzmir', 'Erkek', '4. Sınıf', 29, '555-678-9012', 'ahmet.yilmaz@example.com'),
(90, 'Beyza Şahin', 'Kaplan Mahallesi, Elma Caddesi No: 345, Bursa', 'Kadın', '3. Sınıf', 25, '555-789-0123', 'beyza.sahin@example.com'),
(91, 'Can Öztürk', 'Başak Mahallesi, Papatya Sokak No: 678, Ankara', 'Erkek', '1. Sınıf', 20, '555-901-2345', 'can.ozturk@example.com'),
(92, 'İrem Demir', 'Yıldız Mahallesi, Menekşe Caddesi No: 901, İstanbul', 'Kadın', '4. Sınıf', 27, '555-012-3456', 'irem.demir@example.com'),
(93, 'Oğuz Kılıç', 'Palmiye Mahallesi, Gül Sokak No: 234, İzmir', 'Erkek', '2. Sınıf', 21, '555-123-4567', 'oguz.kilic@example.com'),
(94, 'Ezgi Arslan', 'Atatürk Mahallesi, Güneş Caddesi No: 567, Ankara', 'Kadın', '1. Sınıf', 19, '555-234-5678', 'ezgi.arslan@example.com'),
(95, 'Kerem Yıldırım', 'Gül Mahallesi, Çiçek Sokak No: 890, Antalya', 'Erkek', '3. Sınıf', 24, '555-345-6789', 'kerem.yildirim@example.com'),
(96, 'Nazlı Kaya', 'İnci Mahallesi, Zeytin Caddesi No: 012, İzmir', 'Kadın', '4. Sınıf', 29, '555-456-7890', 'nazli.kaya@example.com'),
(97, 'Uğur Şahin', 'Kaplan Mahallesi, Elma Sokak No: 345, Bursa', 'Erkek', '3. Sınıf', 25, '555-567-8901', 'ugur.sahin@example.com'),
(98, 'Ela Öztürk', 'Başak Mahallesi, Papatya Caddesi No: 678, Ankara', 'Kadın', '1. Sınıf', 20, '555-678-9012', 'ela.ozturk@example.com'),
(99, 'Efe Demir', 'Yıldız Mahallesi, Menekşe Sokak No: 901, İstanbul', 'Erkek', '4. Sınıf', 27, '555-748-2215', 'efe.demir@example.com'),
(100, 'sevil çetin', 'Selimiye Mahallesi, Bahadır Sokak No: 22, Çanakkale, Türkiye', 'Kadın', '3. sınıf', 26, '555-748-2215', 'sevil.cetin44@gmail.com'),
(101, 'ahmet kocaizmirli', 'Yeşil Mahallesi, Çınar Sokak No: 5, İstanbul, Türkiye', 'Erkek', '1.sınıf', 3523, '0555 123 45 ', 'ahmet.kocaizmirli@hotmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yayinevi`
--

CREATE TABLE `yayinevi` (
  `yayinevi_id` int(11) NOT NULL,
  `yayinevi_adi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `yayinevi`
--

INSERT INTO `yayinevi` (`yayinevi_id`, `yayinevi_adi`) VALUES
(1, 'Can Yayınları'),
(2, 'İletişim Yayınları'),
(3, 'Doğan Kitap'),
(4, 'Yapı Kredi Yayınları'),
(5, 'Kırmızı Kedi Yayınevi'),
(6, 'Everest Yayınları'),
(7, 'İthaki Yayınları'),
(8, 'Furkan Yayınları'),
(9, 'Doğan Kitap'),
(10, 'Everest Yayınları'),
(11, 'Yapı Kredi Yayınları'),
(12, 'Pegasus Yayınları'),
(13, 'deneme'),
(14, 'Alfa Yayınları'),
(15, 'Remzi Kitabevi'),
(16, 'İthaki Yayınları'),
(17, 'Yapı Kredi Yayınları'),
(18, 'Everest Yayınları'),
(19, 'İnkılap Kitabevi'),
(20, 'Kırmızı Kedi Yayınevi'),
(21, 'İletişim Yayınları');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazar`
--

CREATE TABLE `yazar` (
  `yazar_id` int(11) NOT NULL,
  `yazar_adi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `yazar`
--

INSERT INTO `yazar` (`yazar_id`, `yazar_adi`) VALUES
(1, 'Yaşar Kemal'),
(2, 'Necip Fazıl Kısakürek'),
(3, 'Ahmet Ümit'),
(4, 'Orhan Kemal'),
(5, 'Peyami Safa'),
(6, 'Cemal Süreya'),
(7, 'Halide Edip Adıvar'),
(8, 'Adalet Ağaoğlu'),
(9, 'Murathan Mungan'),
(10, 'Sevim Ak'),
(11, 'Sezai Karakoç'),
(12, 'Mehmet Akif Ersoy'),
(13, 'Refik Halit Karay'),
(14, 'Sait Faik Abasıyanık'),
(15, 'Ahmet Hamdi Tanpınar'),
(16, 'Elif Şafak'),
(17, 'Oğuz Atay'),
(18, 'Orhan Pamuk'),
(19, 'Nazım Hikmet'),
(20, 'Sabahattin Ali'),
(21, 'Bilge Karasu'),
(22, 'Hasan Ali Toptaş'),
(23, 'Ayşe Kulin'),
(24, 'Sunay Akın'),
(25, 'Orhan Veli Kanık'),
(26, 'Attila İlhan'),
(27, 'İhsan Oktay Anar'),
(28, 'Nâzım Hikmet'),
(29, 'Ahmet Hamdi Tanpınar'),
(30, 'Zülfü Livaneli'),
(31, 'Necati Cumalı'),
(32, 'Ahmet Hamdi Gökbayrak'),
(33, 'Aşık Veysel'),
(34, 'Ahmet Arif'),
(35, 'Ataol Behramoğlu'),
(36, 'Can Yücel'),
(37, 'Oruç Aruoba'),
(38, 'Asım Bezirci'),
(39, 'Nihat Behram'),
(40, 'Fazıl Hüsnü Dağlarca'),
(41, 'Ahmet Hamdi Gökbayrak'),
(42, 'Ayşe Kulin'),
(43, 'İhsan Oktay Anar'),
(44, 'Barış Bıçakçı'),
(45, 'İpek Ongun'),
(46, 'Pınar Kür'),
(47, 'Erendiz Atasü'),
(48, 'Ferit Edgü');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetim_paneli`
--

CREATE TABLE `yonetim_paneli` (
  `yonetim_id` int(11) NOT NULL,
  `odunc_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `yayinevi_id` int(11) NOT NULL,
  `yazar_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `ayarlar_id` int(11) NOT NULL,
  `ogrenci_id` int(11) NOT NULL,
  `kitap_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `kitap`
--
ALTER TABLE `kitap`
  ADD PRIMARY KEY (`kitap_id`);

--
-- Tablo için indeksler `kitap_odunc_verme`
--
ALTER TABLE `kitap_odunc_verme`
  ADD PRIMARY KEY (`odunc_id`);

--
-- Tablo için indeksler `ogrenciler`
--
ALTER TABLE `ogrenciler`
  ADD PRIMARY KEY (`ogrenci_id`);

--
-- Tablo için indeksler `yayinevi`
--
ALTER TABLE `yayinevi`
  ADD PRIMARY KEY (`yayinevi_id`);

--
-- Tablo için indeksler `yazar`
--
ALTER TABLE `yazar`
  ADD PRIMARY KEY (`yazar_id`);

--
-- Tablo için indeksler `yonetim_paneli`
--
ALTER TABLE `yonetim_paneli`
  ADD PRIMARY KEY (`yonetim_id`),
  ADD KEY `issue_id` (`odunc_id`,`admin_id`,`yayinevi_id`,`yazar_id`,`kategori_id`,`ayarlar_id`,`ogrenci_id`,`kitap_id`),
  ADD KEY `category_id` (`kategori_id`),
  ADD KEY `publisher_id` (`yayinevi_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `book_id` (`kitap_id`),
  ADD KEY `setting_id` (`ayarlar_id`),
  ADD KEY `author_id` (`yazar_id`),
  ADD KEY `ogrenci_id` (`ogrenci_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `kitap`
--
ALTER TABLE `kitap`
  MODIFY `kitap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `kitap_odunc_verme`
--
ALTER TABLE `kitap_odunc_verme`
  MODIFY `odunc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Tablo için AUTO_INCREMENT değeri `ogrenciler`
--
ALTER TABLE `ogrenciler`
  MODIFY `ogrenci_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Tablo için AUTO_INCREMENT değeri `yayinevi`
--
ALTER TABLE `yayinevi`
  MODIFY `yayinevi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `yazar`
--
ALTER TABLE `yazar`
  MODIFY `yazar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Tablo için AUTO_INCREMENT değeri `yonetim_paneli`
--
ALTER TABLE `yonetim_paneli`
  MODIFY `yonetim_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `yonetim_paneli`
--
ALTER TABLE `yonetim_paneli`
  ADD CONSTRAINT `yonetim_paneli_ibfk_1` FOREIGN KEY (`odunc_id`) REFERENCES `kitap_odunc_verme` (`odunc_id`),
  ADD CONSTRAINT `yonetim_paneli_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`),
  ADD CONSTRAINT `yonetim_paneli_ibfk_3` FOREIGN KEY (`yayinevi_id`) REFERENCES `yayinevi` (`yayinevi_id`),
  ADD CONSTRAINT `yonetim_paneli_ibfk_4` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `yonetim_paneli_ibfk_5` FOREIGN KEY (`kitap_id`) REFERENCES `kitap` (`kitap_id`),
  ADD CONSTRAINT `yonetim_paneli_ibfk_6` FOREIGN KEY (`ogrenci_id`) REFERENCES `ogrenciler` (`ogrenci_id`),
  ADD CONSTRAINT `yonetim_paneli_ibfk_7` FOREIGN KEY (`ayarlar_id`) REFERENCES `ayarlar` (`id`),
  ADD CONSTRAINT `yonetim_paneli_ibfk_8` FOREIGN KEY (`yazar_id`) REFERENCES `yazar` (`yazar_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
