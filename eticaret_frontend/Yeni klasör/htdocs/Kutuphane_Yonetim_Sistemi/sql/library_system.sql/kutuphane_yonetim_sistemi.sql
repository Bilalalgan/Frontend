-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 May 2023, 13:54:01
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
(1, '', 'admin', '21232f297a57a5a743894a0e4a801fc3');

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
(1, 30, 70);

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
(20, 'Klasik'),
(21, 'Bilim Kurgu'),
(22, 'Tarih'),
(23, 'Biyografi'),
(24, 'Klasik Edebiyat'),
(25, 'Mizah'),
(26, 'Yemek Kitapları'),
(27, 'Macera'),
(28, 'Drama'),
(29, 'Polisiye'),
(30, 'Roman'),
(31, 'Psikoloji'),
(32, 'Romantik'),
(33, 'Çocuk Kitapları'),
(34, 'Genç Yetişkin'),
(35, 'Felsefe'),
(36, 'Seyahat'),
(37, 'İş ve Kariyer'),
(38, 'Sanat ve Tasarım'),
(39, 'Korku'),
(40, 'Klasik'),
(41, 'Bilim'),
(42, 'Fantastik'),
(43, 'Komedi'),
(44, 'Otobiyografi'),
(45, 'Edebiyat'),
(46, 'Güldürü'),
(47, 'Gastronomi'),
(48, 'Keşif'),
(49, 'Gerilim'),
(50, 'Aşk'),
(51, 'Sosyoloji'),
(52, 'Gerçeküstü'),
(53, 'Çizgi Roman'),
(54, 'Bilim Kurgu-Fantastik'),
(55, 'Mitoloji'),
(56, 'Eğitim'),
(57, 'Spor'),
(58, 'Müzik'),
(59, 'Doğa'),
(60, 'Kurgu');

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
(1, 'Harry Potter ve Felsefe Taşı', '41', '53', '10', 'N'),
(2, 'Charlie ve Çikolata Fabrikası', '21', '18', '7', 'N'),
(3, 'Hobbit', '39', '25', '6', 'N'),
(4, 'Alice Harikalar Diyarında', '14', '71', '10', 'N'),
(5, 'Küçük Prens', '11', '2', '32', 'N'),
(6, 'Pippi Uzun Çorap', '13', '72', '1', 'Y'),
(7, 'Tom Sawyer', '30', '78', '34', 'Y'),
(8, 'Pinokyo', '52', '83', '42', 'N'),
(9, 'Sonsuzluk Kıyısında', '49', '88', '22', 'Y'),
(10, 'Kızıl Ejder', '28', '7', '25', 'Y'),
(11, 'Şeker Portakalı', '53', '44', '18', 'Y'),
(12, '1984', '2', '18', '14', 'Y'),
(13, 'Sefiller', '30', '46', '16', 'Y'),
(14, 'Gözlerinde Son Gece', '22', '85', '36', 'Y'),
(15, 'Beyaz Diş', '18', '11', '8', 'Y'),
(16, 'Da Vinci Şifresi', '27', '75', '15', 'Y'),
(17, 'Harry Potter ve Felsefe Taşı', '20', '67', '7', 'Y'),
(18, 'Uğultulu Tepeler', '17', '16', '30', 'Y'),
(19, 'Suç ve Ceza', '24', '63', '5', 'Y'),
(20, 'Yabancı', '9', '83', '19', 'Y'),
(21, 'Otostopçunun Galaksi Rehberi', '33', '40', '38', 'Y'),
(22, 'Anna Karenina', '16', '44', '5', 'Y'),
(23, 'Alacakaranlık', '42', '9', '39', 'Y'),
(24, 'Simyacı', '41', '2', '8', 'Y'),
(25, 'İnce Memed', '19', '75', '8', 'Y'),
(26, 'Aşk-ı Memnu', '31', '92', '15', 'Y'),
(27, 'Dorian Grayin Portresi', '38', '50', '11', 'Y'),
(28, 'Fahrenheit 451', '36', '66', '7', 'Y'),
(29, 'Kırmızı Pazartesi', '5', '88', '3', 'Y'),
(30, 'İnci', '39', '56', '35', 'Y'),
(31, 'Diriliş', '56', '17', '37', 'Y'),
(32, 'Aylak Adam', '45', '8', '41', 'Y'),
(33, 'Yüzüklerin Efendisi', '56', '79', '7', 'Y'),
(34, 'Momo', '23', '2', '38', 'Y'),
(35, 'Satranç', '7', '48', '41', 'Y'),
(36, 'Yeraltından Notlar', '25', '50', '8', 'Y'),
(37, 'Sırça Fanus', '44', '14', '1', 'Y'),
(38, 'Bilinmeyen Bir Kadının Mektubu', '26', '13', '23', 'Y'),
(39, 'İnsan Neyle Yaşar?', '58', '22', '26', 'Y'),
(40, 'Tutunamayanlar', '31', '68', '21', 'Y'),
(41, 'Yüzyıllık Yalnızlık', '41', '91', '25', 'Y'),
(42, 'Deliliğe Övgü', '51', '68', '18', 'Y'),
(43, 'Fareler ve İnsanlar', '11', '65', '16', 'Y'),
(44, 'Nutuk', '23', '29', '27', 'Y'),
(45, 'Baba ve Piç', '21', '42', '2', 'Y'),
(46, 'İnsanlık Halleri', '37', '28', '11', 'Y'),
(47, 'Beyaz Zambaklar Ülkesinde', '59', '16', '9', 'Y'),
(48, 'Kırlangıç Çığlığı', '3', '86', '10', 'Y'),
(49, 'İçimizdeki Şeytan', '19', '12', '21', 'Y'),
(51, 'Martı', '25', '80', '34', 'Y'),
(52, 'Balıkçı ve Oğlu', '8', '85', '22', 'Y'),
(53, 'Eylül', '23', '4', '9', 'Y'),
(54, 'Damızlık Kızın Öyküsü', '32', '38', '19', 'Y'),
(55, 'Suçluyuz Biz', '29', '84', '24', 'Y'),
(56, 'İçimizdeki İstanbul', '51', '32', '24', 'Y'),
(57, 'Nehir', '44', '90', '2', 'Y'),
(58, 'Cell', '10', '79', '24', 'Y'),
(59, 'Karanlık Orman', '34', '34', '28', 'Y'),
(60, 'Labirent', '21', '22', '28', 'Y'),
(61, 'Gece Yarısı Kütüphanesi', '3', '10', '10', 'Y'),
(62, 'Gökteki Göz', '12', '75', '9', 'Y'),
(63, 'Kıyamet Gösterisi', '52', '69', '14', 'Y'),
(64, 'Kurtlar İmparatorluğu', '41', '28', '42', 'Y'),
(65, 'Ruhların Kaçışı', '47', '23', '42', 'Y'),
(66, 'Yalnız Gezgin', '55', '30', '39', 'Y'),
(67, 'Labirentin Sonu', '13', '82', '30', 'Y'),
(68, 'Dönüşüm', '19', '42', '33', 'Y'),
(69, 'Huzursuzluk', '55', '56', '29', 'Y'),
(70, 'Kuşlar Yasına Gider', '36', '60', '7', 'Y'),
(71, 'Görünmez Kentler', '15', '42', '29', 'Y'),
(72, 'Yabancılar', '26', '28', '40', 'Y'),
(73, 'Ejderhalarla Dans', '26', '14', '28', 'Y'),
(74, 'Babilde Ölüm İstanbulda Aşk', '52', '75', '20', 'Y'),
(75, 'Yaşlı Adamın Savaşı', '59', '60', '14', 'Y'),
(76, 'Beyaz Geceler', '20', '72', '9', 'Y'),
(77, 'Körlük', '41', '90', '4', 'Y'),
(78, 'Ay Işığı Sokağı', '26', '47', '35', 'Y'),
(79, 'Kızıl Nehirler', '5', '57', '35', 'Y'),
(80, 'Yediiklim Türkçe Sözlük', '9', '50', '28', 'Y'),
(81, 'Kurt Kanunu', '28', '82', '34', 'Y'),
(82, 'Aşk Her Yerde', '52', '72', '4', 'Y'),
(83, 'Güneşe Yolculuk', '56', '24', '42', 'Y'),
(84, 'Rüzgarın Adı', '4', '87', '31', 'Y'),
(85, 'Kuşlar da Gitti', '32', '85', '26', 'Y'),
(86, 'Ölü Canlar', '26', '71', '36', 'Y'),
(87, 'Zaman Makinesi', '34', '7', '19', 'Y'),
(88, 'Beyaz Gemi', '32', '8', '29', 'Y'),
(89, 'İblis', '56', '16', '1', 'Y'),
(90, 'Kan ve Gül', '6', '56', '4', 'Y'),
(91, 'Kırmızı Kapak', '38', '50', '17', 'Y'),
(92, 'Kurtlar Vadisi İrak', '54', '78', '28', 'Y'),
(93, 'Son Hafriyat', '35', '57', '4', 'Y'),
(94, 'Melekler ve Şeytanlar', '12', '50', '19', 'Y'),
(95, 'Zamanın Kısa Tarihi', '14', '79', '1', 'Y'),
(96, 'Bir Delinin Hatıra Defteri', '36', '60', '32', 'Y'),
(97, 'Bir Ömür Nasıl Yaşanır', '15', '63', '32', 'Y'),
(98, 'Olasılıksız', '27', '43', '18', 'Y'),
(99, 'Gün Olur Asra Bedel', '29', '23', '36', 'Y'),
(100, 'Beyaz Kale', '4', '79', '42', 'Y'),
(101, 'Küçük Kara Balık', '51', '50', '15', 'Y'),
(102, 'Sineklerin Tanrısı', '4', '10', '36', 'Y'),
(103, 'Saatleri Ayarlama Enstitüsü', '48', '86', '7', 'Y'),
(104, 'Bir Düğün Gecesi', '47', '29', '9', 'Y'),
(105, 'Kıyamet Gözlüğü', '28', '70', '23', 'Y'),
(106, 'Bir İdam Mahkûmunun Son Günü', '2', '81', '6', 'Y'),
(107, 'Baba', '42', '12', '1', 'Y'),
(108, 'Yalnızlık Paylaşılmaz', '27', '89', '27', 'Y'),
(109, 'Çalıkuşu', '6', '41', '7', 'Y'),
(110, 'İstanbul Hatırası', '8', '31', '37', 'Y'),
(111, 'Bir Kadının Gündüz Düşü', '20', '29', '39', 'Y'),
(112, 'Sessiz Ev', '18', '52', '40', 'Y'),
(113, 'Dokuzuncu Hariciye Koğuşu', '31', '81', '41', 'Y'),
(114, 'Yelkenli Gemi', '38', '64', '41', 'Y'),
(115, 'Yıldızlara İnecek Aşkın Kılavuzu', '39', '77', '39', 'Y'),
(116, 'İthakinin Düşleri', '18', '10', '30', 'Y'),
(117, 'Kırlangıçlar', '33', '2', '33', 'Y'),
(118, 'Bir Delinin Hatıra Defteri', '51', '70', '32', 'Y'),
(119, 'Beyaz Gemi', '35', '68', '18', 'Y'),
(120, 'Yolcu', '24', '39', '35', 'Y'),
(121, 'Bülbülü Öldürmek', '12', '80', '39', 'Y'),
(122, 'Yaban', '50', '7', '5', 'Y'),
(123, 'İstanbul: Hatıralar ve Şehir', '32', '71', '32', 'Y'),
(124, 'Bin Muhteşem Güneş', '8', '58', '20', 'Y'),
(125, 'Zamanın Kısa Tarihi', '6', '74', '3', 'Y'),
(126, 'Cesur Yeni Dünya', '6', '14', '41', 'Y'),
(127, 'Küçük Prens', '10', '33', '24', 'Y'),
(128, 'Dava', '32', '27', '40', 'Y'),
(129, 'Gece Yarısı Çıkmazı', '9', '39', '41', 'Y'),
(130, 'İnsan Ne İle Yaşar?', '10', '19', '4', 'Y'),
(131, 'Şeker Portakalı', '23', '71', '20', 'Y'),
(132, 'Kürk Mantolu Madonna', '23', '19', '5', 'Y'),
(133, 'Serenad', '45', '67', '7', 'Y'),
(134, 'Kendine Ait Bir Oda', '36', '92', '21', 'Y'),
(135, 'Martı Jonathan Livingston', '43', '75', '38', 'Y'),
(136, 'Gazap Üzümleri', '47', '6', '2', 'Y'),
(137, 'Bir Ömür Nasıl Yaşanır?', '46', '82', '22', 'Y'),
(138, 'Kuyucaklı Yusuf', '27', '23', '19', 'Y'),
(139, 'Sinekli Bakkal', '58', '51', '30', 'Y'),
(140, 'Beyaz Kale', '28', '2', '5', 'Y'),
(141, 'Tutunamayanlar', '25', '41', '22', 'Y'),
(142, 'İstanbul Hatırası', '42', '13', '10', 'Y'),
(143, 'Sonsuzluk Kıyısında', '15', '34', '27', 'Y'),
(144, 'Sessiz Ev', '8', '38', '18', 'Y'),
(145, 'Dokuzuncu Hariciye Koğuşu', '54', '86', '8', 'Y'),
(146, 'Yelkenli Gemi', '4', '42', '29', 'Y'),
(147, 'Yıldızlara İnecek Aşkın Kılavuzu', '41', '44', '37', 'Y'),
(148, 'Kendini Arayan Adam', '10', '91', '11', 'Y'),
(149, 'Kör Baykuş', '46', '48', '29', 'Y'),
(150, 'Beyaz Sessizlik', '19', '58', '26', 'Y'),
(151, 'Yerdeniz Serisi', '19', '55', '41', 'Y'),
(152, 'İyi Olan Kazansın', '38', '9', '4', 'Y'),
(153, 'İnce Memed', '13', '64', '19', 'Y'),
(154, 'Bir Kadının Yaşamından Yirmi Dört Saat', '8', '15', '2', 'Y'),
(155, 'Olasılıksız', '1', '67', '34', 'Y'),
(156, 'Kan ve Gül', '41', '12', '37', 'Y'),
(157, 'Zaman Makinesi', '21', '45', '1', 'Y'),
(158, 'Bir Kadının Gençlik Anıları', '43', '3', '20', 'Y'),
(159, 'Mürekkep Yürek', '30', '64', '10', 'Y'),
(160, 'Sırça Köşk', '20', '33', '32', 'Y'),
(161, 'Yürüyüş', '8', '64', '4', 'Y'),
(162, 'Moby Dick', '42', '38', '7', 'Y'),
(163, 'Bir Delinin Güncesi', '3', '90', '25', 'Y'),
(164, 'Suskunlar', '9', '60', '16', 'Y'),
(165, 'Aşk', '36', '29', '5', 'Y'),
(166, 'Kara Kule Serisi', '31', '56', '21', 'Y'),
(167, 'Yüzük Kardeşliği', '46', '7', '3', 'N'),
(168, 'Aşk ve Gurur', '20', '52', '35', 'Y'),
(169, 'Küçük Kara Balık', '19', '55', '39', 'Y'),
(170, 'Küçük Adam, Ne Oldu Sana', '33', '25', '6', 'Y'),
(171, 'Kırmızı ve Siyah', '50', '53', '40', 'Y'),
(172, 'Marslı', '30', '5', '13', 'Y'),
(173, 'Körlük', '1', '51', '27', 'Y'),
(174, 'Ekmek Arası', '32', '52', '14', 'Y'),
(175, 'Dokuz Kehanet', '39', '18', '29', 'Y'),
(176, 'Bir Suçlunun İtirafları', '37', '23', '18', 'Y'),
(177, 'Karanlığın Yüreği', '7', '61', '3', 'Y'),
(178, 'Yüzüklerin Efendisi: İki Kule', '1', '2', '1', 'Y');

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
(1, '10', '13', '2021-07-16', '2021-09-05', 'N', NULL, NULL),
(2, '14', '11', '2021-07-16', '2021-08-05', 'N', '2021-08-05', NULL),
(3, '9', '15', '2021-07-16', '2021-08-20', 'N', '2021-08-30', NULL),
(4, '13', '12', '2023-01-28', '2023-02-18', 'N', NULL, NULL),
(5, '11', '12', '2023-01-28', '2023-02-18', 'Y', '2023-04-28', NULL),
(6, '9', '11', '2023-04-28', '2023-05-18', 'Y', '2023-04-29', NULL),
(7, '11', '16', '2023-04-29', '2023-05-19', 'N', NULL, NULL),
(8, '11', '14', '2023-02-20', '2023-04-20', 'Y', '2023-03-30', NULL),
(9, '100', '14', '2023-04-30', '2023-05-20', 'Y', '2023-04-30', NULL),
(10, '90', '11', '2023-04-30', '2023-05-20', 'N', NULL, NULL),
(11, '22', '15', '2023-05-10', '2023-05-30', 'Y', '2023-05-10', NULL),
(12, '184', '167', '2023-03-07', '2023-04-27', 'N', NULL, NULL),
(13, '93', '8', '2023-05-13', '2023-06-02', 'N', NULL, NULL),
(14, '198', '91', '2023-05-13', '2023-06-02', 'Y', '2023-05-13', NULL),
(15, '4', '4', '2023-05-16', '2023-06-05', 'N', NULL, NULL),
(16, '1', '3', '2023-05-16', '2023-06-05', 'N', NULL, NULL),
(17, '4', '1', '2023-05-16', '2023-06-05', 'N', NULL, NULL),
(18, '3', '5', '2023-05-16', '2023-06-05', 'N', NULL, NULL),
(21, '4', '7', '2023-05-16', '2023-06-15', 'Y', '2023-05-16', NULL);

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
(1, 'Ali Yıldız', 'Mor Mahallesi, Gül Sokak No: 3, İstanbul, Türkiye', 'Erkek', '3. sınıf', 22, '0555 111 22', 'ali.yildiz@gmail.com'),
(2, 'Zeynep Ay', 'Turkuaz Mahallesi, Papatya Sokak No: 7, İzmir, Türkiye', 'Kadın', '2. sınıf', 23, '0533 222 33', 'zeynep.ay@gmail.com'),
(3, 'Ahmet Kaya', 'Turuncu Mahallesi, Menekşe Sokak No: 5, Ankara, Türkiye', 'Erkek', '4. sınıf', 24, '0555 444 55', 'ahmet.kaya@gmail.com'),
(4, 'Ayşe Demir', 'Yeşil Mahallesi, Pınar Sokak No: 12, İstanbul, Türkiye', 'Kadın', '1. sınıf', 19, '0533 333 44', 'ayse.demir@gmail.com'),
(5, 'Murat Akın', 'Kırmızı Mahallesi, Lale Sokak No: 9, Ankara, Türkiye', 'Erkek', '2. sınıf', 21, '0555 555 66', 'murat.akin@gmail.com'),
(6, 'Can Öztürk', 'Sarı Mahallesi, Menekşe Sokak No: 14, İstanbul, Türkiye', 'Erkek', '10. sınıf', 16, '0544 567 89', 'can.ozturk@gmail.com'),
(7, 'Selin Yılmaz', 'Yeşil Mahallesi, Zambak Sokak No: 7, Ankara, Türkiye', 'Kadın', '12. sınıf', 18, '0532 678 90', 'selin.yilmaz@gmail.com'),
(8, 'Emre Korkmaz', 'Turkuaz Mahallesi, Gül Sokak No: 20, İzmir, Türkiye', 'Erkek', '9. sınıf', 15, '0555 234 56', 'emre.korkmaz@gmail.com'),
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
(73, 'Zeynep Top', 'Atatürk Mahallesi, Güneş Sokak No: 234, Ankara', 'Kadın', '1. Sınıf', 19, '555-901-2345', 'zeynep.kaya@example.com'),
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
(101, 'ahmet kocaizmirli', 'Yeşil Mahallesi, Çınar Sokak No: 5, İstanbul, Türkiye', 'Erkek', '1.sınıf', 3523, '0555 123 45 ', 'ahmet.kocaizmirli@hotmail.com'),
(102, 'Mehmet Demir', 'Kırmızı Mahallesi, Güneş Sokak No: 15, İzmir, Türkiye', 'Erkek', '9. sınıf', 15, '0543 234 56', 'mehmet.demir@gmail.com'),
(103, 'Ahmet Can', 'Turuncu Mahallesi, Çam Sokak No: 20, İzmir, Türkiye', 'Erkek', '8. sınıf', 14, '0555 456 78', 'ahmet.can@gmail.com'),
(104, 'Ayşe Yılmaz', 'Mavi Mahallesi, Zeytin Sokak No: 10, Ankara, Türkiye', 'Kadın', '4. sınıf', 28, '0532 987 65', 'ayse.yilmaz@gmail.com'),
(105, 'Ahmet Koca', 'Mavi Mahallesi, Çınar Sokak No: 5, İstanbul, Türkiye', 'Erkek', '1. sınıf', 6, '0555 123 45', 'ahmet.koca@hotmail.com'),
(106, 'Ayşe Kılıç', 'Turuncu Mahallesi, Papatya Sokak No: 15, Ankara, Türkiye', 'Kadın', '3. sınıf', 8, '0533 345 67', 'ayse.kilic@gmail.com'),
(107, 'Mehmet Ay', 'Yeşil Mahallesi, Nil Sokak No: 12, İstanbul, Türkiye', 'Erkek', '2. sınıf', 7, '0555 456 78', 'mehmet.ay@gmail.com'),
(108, 'Ahmet Yılmaz', 'Kırmızı Mahallesi, Zambak Sokak No: 7, Ankara, Türkiye', 'Erkek', '2. sınıf', 22, '0532 567 89', 'ahmet.yilmaz@gmail.com'),
(109, 'Elif Korkmaz', 'Mor Mahallesi, Menekşe Sokak No: 5, İstanbul, Türkiye', 'Kadın', '4. sınıf', 24, '0555 678 90', 'elif.korkmaz@gmail.com'),
(110, 'Mehmet Aydın', 'Turkuaz Mahallesi, Lale Sokak No: 9, İzmir, Türkiye', 'Erkek', '3. sınıf', 25, '0543 789 01', 'mehmet.aydin@gmail.com'),
(111, 'Ayşe Demir', 'Sarı Mahallesi, Yasemin Sokak No: 3, Ankara, Türkiye', 'Kadın', '1. sınıf', 21, '0533 234 56', 'ayse.demir@gmail.com'),
(112, 'Murat Akın', 'Yeşil Mahallesi, Papatya Sokak No: 12, İstanbul, Türkiye', 'Erkek', '3. sınıf', 23, '0555 345 67', 'murat.akin@gmail.com'),
(113, 'Zeynep Öztürk', 'Turuncu Mahallesi, Menekşe Sokak No: 10, İzmir, Türkiye', 'Kadın', '2. sınıf', 24, '0543 456 78', 'zeynep.ozturk@gmail.com'),
(114, 'Ahmet Yıldız', 'Kırmızı Mahallesi, Gül Sokak No: 5, Ankara, Türkiye', 'Erkek', '2. sınıf', 26, '0555 567 89', 'ahmet.yildiz@gmail.com'),
(115, 'Elif Kaya', 'Mor Mahallesi, Nil Sokak No: 7, İstanbul, Türkiye', 'Kadın', '1. sınıf', 27, '0532 678 90', 'elif.kaya@gmail.com'),
(116, 'Mehmet Yılmaz', 'Turuncu Mahallesi, Zeytin Sokak No: 15, İzmir, Türkiye', 'Erkek', '3. sınıf', 25, '0532 789 01', 'mehmet.yilmaz@gmail.com'),
(117, 'Selin Korkmaz', 'Sarı Mahallesi, Menekşe Sokak No: 8, Ankara, Türkiye', 'Kadın', '1. sınıf', 22, '0555 890 12', 'selin.korkmaz@gmail.com'),
(118, 'Emre Aydın', 'Mavi Mahallesi, Lale Sokak No: 14, İstanbul, Türkiye', 'Erkek', '2. sınıf', 23, '0543 901 23', 'emre.aydin@gmail.com'),
(119, 'Zeynep Demir', 'Yeşil Mahallesi, Papatya Sokak No: 10, Ankara, Türkiye', 'Kadın', '4. sınıf', 24, '0533 012 34', 'zeynep.demir@gmail.com'),
(120, 'Ali Akın', 'Mor Mahallesi, Nil Sokak No: 12, İstanbul, Türkiye', 'Erkek', '4. sınıf', 25, '0555 123 45', 'ali.akin@gmail.com'),
(121, 'Ayşe Yıldız', 'Kırmızı Mahallesi, Zambak Sokak No: 5, Ankara, Türkiye', 'Kadın', '3. sınıf', 26, '0532 234 56', 'ayse.yildiz@gmail.com'),
(122, 'Murat Kaya', 'Sarı Mahallesi, Yasemin Sokak No: 3, İstanbul, Türkiye', 'Erkek', '4. sınıf', 27, '0555 345 67', 'murat.kaya@gmail.com'),
(123, 'Elif Öztürk', 'Mor Mahallesi, Papatya Sokak No: 10, İzmir, Türkiye', 'Kadın', '4. sınıf', 25, '0543 456 78', 'elif.ozturk@gmail.com'),
(124, 'Ahmet Yılmaz', 'Kırmızı Mahallesi, Gül Sokak No: 5, Ankara, Türkiye', 'Erkek', '3. sınıf', 28, '0555 567 89', 'ahmet.yilmaz@gmail.com'),
(125, 'Selin Kaya', 'Mor Mahallesi, Nil Sokak No: 7, İstanbul, Türkiye', 'Kadın', '2. sınıf', 27, '0532 678 90', 'selin.kaya@gmail.com'),
(126, 'Emre Demir', 'Turuncu Mahallesi, Zeytin Sokak No: 15, İzmir, Türkiye', 'Erkek', '4. sınıf', 26, '0532 789 01', 'emre.demir@gmail.com'),
(127, 'Zeynep Korkmaz', 'Sarı Mahallesi, Menekşe Sokak No: 8, Ankara, Türkiye', 'Kadın', '14. sınıf', 27, '0555 890 12', 'zeynep.korkmaz@gmail.com'),
(128, 'Ali Aydın', 'Mavi Mahallesi, Lale Sokak No: 14, İstanbul, Türkiye', 'Erkek', '1. sınıf', 28, '0543 901 23', 'ali.aydin@gmail.com'),
(129, 'Ayşe Demir', 'Yeşil Mahallesi, Papatya Sokak No: 10, Ankara, Türkiye', 'Kadın', '4. sınıf', 25, '0533 012 34', 'ayse.demir@gmail.com'),
(130, 'Murat Akın', 'Mor Mahallesi, Nil Sokak No: 12, İstanbul, Türkiye', 'Erkek', '4. sınıf', 26, '0555 123 45', 'murat.akin@gmail.com'),
(131, 'Selin Yıldız', 'Kırmızı Mahallesi, Zambak Sokak No: 5, Ankara, Türkiye', 'Kadın', '1. sınıf', 27, '0532 234 56', 'selin.yildiz@gmail.com'),
(132, 'Emre Kaya', 'Sarı Mahallesi, Yasemin Sokak No: 3, İstanbul, Türkiye', 'Erkek', '2. sınıf', 28, '0555 345 67', 'emre.kaya@gmail.com'),
(133, 'Ayşe Öztürk', 'Mor Mahallesi, Papatya Sokak No: 10, İzmir, Türkiye', 'Kadın', '3. sınıf', 26, '0543 456 78', 'ayse.ozturk@gmail.com'),
(134, 'Murat Yılmaz', 'Kırmızı Mahallesi, Gül Sokak No: 5, Ankara, Türkiye', 'Erkek', '3. sınıf', 25, '0555 567 89', 'murat.yilmaz@gmail.com'),
(135, 'Zeynep Kaya', 'Mor Mahallesi, Nil Sokak No: 7, İstanbul, Türkiye', 'Kadın', '4. sınıf', 26, '0532 678 90', 'zeynep.kaya@gmail.com'),
(141, 'Ali Yılmaz', 'Kırmızı Mahallesi, Zambak Sokak No: 5, Ankara, Türkiye', 'Erkek', '1. sınıf', 22, '0532 234 56', 'ali.yilmaz@gmail.com'),
(142, 'Ayşe Kaya', 'Sarı Mahallesi, Yasemin Sokak No: 3, İstanbul, Türkiye', 'Kadın', '4. sınıf', 26, '0555 345 67', 'ayse.kaya@gmail.com'),
(143, 'Murat Öztürk', 'Mor Mahallesi, Papatya Sokak No: 10, İzmir, Türkiye', 'Erkek', '3. sınıf', 24, '0543 456 78', 'murat.ozturk@gmail.com'),
(144, 'Zeynep Yılmaz', 'Kırmızı Mahallesi, Gül Sokak No: 5, Ankara, Türkiye', 'Kadın', '2. sınıf', 23, '0555 567 89', 'zeynep.yilmaz@gmail.com'),
(145, 'Emre Kaya', 'Mor Mahallesi, Nil Sokak No: 7, İstanbul, Türkiye', 'Erkek', '1. sınıf', 21, '0532 678 90', 'emre.kaya@gmail.com'),
(146, 'Ahmet Demir', 'Turuncu Mahallesi, Zeytin Sokak No: 15, İzmir, Türkiye', 'Erkek', '2. sınıf', 28, '0532 789 01', 'ahmet.demir@gmail.com'),
(147, 'Selin Korkmaz', 'Sarı Mahallesi, Menekşe Sokak No: 8, Ankara, Türkiye', 'Kadın', '3. sınıf', 22, '0555 890 12', 'selin.korkmaz@gmail.com'),
(148, 'Emre Aydın', 'Mavi Mahallesi, Lale Sokak No: 14, İstanbul, Türkiye', 'Erkek', '4. sınıf', 27, '0543 901 23', 'emre.aydin@gmail.com'),
(149, 'Zeynep Demir', 'Yeşil Mahallesi, Papatya Sokak No: 10, Ankara, Türkiye', 'Kadın', '1. sınıf', 25, '0533 012 34', 'zeynep.demir@gmail.com'),
(150, 'Murat Akın', 'Mor Mahallesi, Nil Sokak No: 12, İstanbul, Türkiye', 'Erkek', '2. sınıf', 23, '0555 123 45', 'murat.akin@gmail.com'),
(151, 'Ali Yılmaz', 'Kırmızı Mahallesi, Zambak Sokak No: 5, Ankara, Türkiye', 'Erkek', '3. sınıf', 26, '0532 234 56', 'ali.yilmaz@gmail.com'),
(152, 'Ayşe Kaya', 'Sarı Mahallesi, Yasemin Sokak No: 3, İstanbul, Türkiye', 'Kadın', '1. sınıf', 21, '0555 345 67', 'ayse.kaya@gmail.com'),
(153, 'Murat Öztürk', 'Mor Mahallesi, Papatya Sokak No: 10, İzmir, Türkiye', 'Erkek', '4. sınıf', 29, '0543 456 78', 'murat.ozturk@gmail.com'),
(154, 'Zeynep Yılmaz', 'Kırmızı Mahallesi, Gül Sokak No: 5, Ankara, Türkiye', 'Kadın', '2. sınıf', 27, '0555 567 89', 'zeynep.yilmaz@gmail.com'),
(155, 'Emre Kaya', 'Mor Mahallesi, Nil Sokak No: 7, İstanbul, Türkiye', 'Erkek', '1. sınıf', 20, '0532 678 90', 'emre.kaya@gmail.com'),
(156, 'Ahmet Demir', 'Turuncu Mahallesi, Zeytin Sokak No: 15, İzmir, Türkiye', 'Erkek', '3. sınıf', 22, '0532 789 01', 'ahmet.demir@gmail.com'),
(157, 'Selin Korkmaz', 'Sarı Mahallesi, Menekşe Sokak No: 8, Ankara, Türkiye', 'Kadın', '4. sınıf', 25, '0555 890 12', 'selin.korkmaz@gmail.com'),
(158, 'Emre Aydın', 'Mavi Mahallesi, Lale Sokak No: 14, İstanbul, Türkiye', 'Erkek', '1. sınıf', 28, '0543 901 23', 'emre.aydin@gmail.com'),
(159, 'Zeynep Demir', 'Yeşil Mahallesi, Papatya Sokak No: 10, Ankara, Türkiye', 'Kadın', '2. sınıf', 27, '0533 012 34', 'zeynep.demir@gmail.com'),
(160, 'Murat Akın', 'Mor Mahallesi, Nil Sokak No: 12, İstanbul, Türkiye', 'Erkek', '3. sınıf', 24, '0555 123 45', 'murat.akin@gmail.com'),
(161, 'Ali Yılmaz', 'Kırmızı Mahallesi, Zambak Sokak No: 5, Ankara, Türkiye', 'Erkek', '2. sınıf', 26, '0532 234 56', 'ali.yilmaz@gmail.com'),
(162, 'Ayşe Kaya', 'Sarı Mahallesi, Yasemin Sokak No: 3, İstanbul, Türkiye', 'Kadın', '1. sınıf', 23, '0555 345 67', 'ayse.kaya@gmail.com'),
(163, 'Murat Öztürk', 'Mor Mahallesi, Papatya Sokak No: 10, İzmir, Türkiye', 'Erkek', '4. sınıf', 29, '0543 456 78', 'murat.ozturk@gmail.com'),
(164, 'Zeynep Yılmaz', 'Kırmızı Mahallesi, Gül Sokak No: 5, Ankara, Türkiye', 'Kadın', '2. sınıf', 27, '0555 567 89', 'zeynep.yilmaz@gmail.com'),
(165, 'Emre Kaya', 'Mor Mahallesi, Nil Sokak No: 7, İstanbul, Türkiye', 'Erkek', '1. sınıf', 20, '0532 678 90', 'emre.kaya@gmail.com'),
(166, 'Ahmet Demir', 'Kırmızı Mahallesi, Zambak Sokak No: 5, Ankara, Türkiye', 'Erkek', '3. sınıf', 21, '0532 345 67', 'ahmet.demir@gmail.com'),
(167, 'Selin Korkmaz', 'Sarı Mahallesi, Menekşe Sokak No: 8, İstanbul, Türkiye', 'Kadın', '4. sınıf', 23, '0555 456 78', 'selin.korkmaz@gmail.com'),
(168, 'Emre Aydın', 'Mavi Mahallesi, Lale Sokak No: 14, İzmir, Türkiye', 'Erkek', '2. sınıf', 25, '0543 567 89', 'emre.aydin@gmail.com'),
(169, 'Zeynep Demir', 'Yeşil Mahallesi, Papatya Sokak No: 10, Ankara, Türkiye', 'Kadın', '3. sınıf', 26, '0533 678 90', 'zeynep.demir@gmail.com'),
(170, 'Murat Akın', 'Mor Mahallesi, Nil Sokak No: 12, İstanbul, Türkiye', 'Erkek', '1. sınıf', 28, '0555 789 01', 'murat.akin@gmail.com'),
(171, 'Elif Yılmaz', 'Kırmızı Mahallesi, Zambak Sokak No: 7, Ankara, Türkiye', 'Kadın', '4. sınıf', 29, '0532 890 12', 'elif.yilmaz@gmail.com'),
(172, 'Mehmet Kaya', 'Sarı Mahallesi, Yasemin Sokak No: 3, İstanbul, Türkiye', 'Erkek', '2. sınıf', 27, '0555 901 23', 'mehmet.kaya@gmail.com'),
(173, 'Ayşe Öztürk', 'Mor Mahallesi, Papatya Sokak No: 10, İzmir, Türkiye', 'Kadın', '1. sınıf', 22, '0543 012 34', 'ayse.ozturk@gmail.com'),
(174, 'Ali Yılmaz', 'Kırmızı Mahallesi, Gül Sokak No: 5, Ankara, Türkiye', 'Erkek', '3. sınıf', 24, '0555 123 45', 'ali.yilmaz@gmail.com'),
(175, 'Selin Kaya', 'Mor Mahallesi, Nil Sokak No: 7, İstanbul, Türkiye', 'Kadın', '4. sınıf', 26, '0532 234 56', 'selin.kaya@gmail.com'),
(176, 'Emre Demir', 'Kırmızı Mahallesi, Zambak Sokak No: 5, Ankara, Türkiye', 'Erkek', '2. sınıf', 23, '0532 345 67', 'emre.demir@gmail.com'),
(177, 'Selin Yılmaz', 'Sarı Mahallesi, Menekşe Sokak No: 8, İstanbul, Türkiye', 'Kadın', '3. sınıf', 27, '0555 456 78', 'selin.yilmaz@gmail.com'),
(178, 'Ahmet Aydın', 'Mavi Mahallesi, Lale Sokak No: 14, İzmir, Türkiye', 'Erkek', '1. sınıf', 25, '0543 567 89', 'ahmet.aydin@gmail.com'),
(179, 'Zeynep Korkmaz', 'Yeşil Mahallesi, Papatya Sokak No: 10, Ankara, Türkiye', 'Kadın', '4. sınıf', 29, '0533 678 90', 'zeynep.korkmaz@gmail.com'),
(180, 'Murat Demir', 'Mor Mahallesi, Nil Sokak No: 12, İstanbul, Türkiye', 'Erkek', '3. sınıf', 26, '0555 789 01', 'murat.demir@gmail.com'),
(181, 'Elif Aydın', 'Kırmızı Mahallesi, Zambak Sokak No: 7, Ankara, Türkiye', 'Kadın', '1. sınıf', 22, '0532 890 12', 'elif.aydin@gmail.com'),
(182, 'Mehmet Yılmaz', 'Sarı Mahallesi, Yasemin Sokak No: 3, İstanbul, Türkiye', 'Erkek', '2. sınıf', 24, '0555 901 23', 'mehmet.yilmaz@gmail.com'),
(183, 'Ayşe Kaya', 'Mor Mahallesi, Papatya Sokak No: 10, İzmir, Türkiye', 'Kadın', '4. sınıf', 28, '0543 012 34', 'ayse.kaya@gmail.com'),
(184, 'Ali Demir', 'Kırmızı Mahallesi, Gül Sokak No: 5, Ankara, Türkiye', 'Erkek', '1. sınıf', 20, '0555 123 45', 'ali.demir@gmail.com'),
(185, 'Selin Korkmaz', 'Mor Mahallesi, Nil Sokak No: 7, İstanbul, Türkiye', 'Kadın', '3. sınıf', 29, '0532 234 56', 'selin.korkmaz@gmail.com'),
(186, 'Emre Aydın', 'Kırmızı Mahallesi, Lale Sokak No: 14, İzmir, Türkiye', 'Erkek', '2. sınıf', 27, '0555 345 67', 'emre.aydin@gmail.com'),
(187, 'Zeynep Demir', 'Yeşil Mahallesi, Papatya Sokak No: 10, Ankara, Türkiye', 'Kadın', '1.sınıf', 23, '0533 456 78', 'zeynep.demir@gmail.com'),
(188, 'Murat Akın', 'Mor Mahallesi, Nil Sokak No: 12, İstanbul, Türkiye', 'Erkek', '4. sınıf', 26, '0555 567 89', 'murat.akin@gmail.com'),
(189, 'Elif Yılmaz', 'Kırmızı Mahallesi, Zambak Sokak No: 7, Ankara, Türkiye', 'Kadın', '2. sınıf', 25, '0532 678 90', 'elif.yilmaz@gmail.com'),
(190, 'Ahmet Kaya', 'Sarı Mahallesi, Yasemin Sokak No: 3, İstanbul, Türkiye', 'Erkek', '3. sınıf', 27, '0555 789 01', 'ahmet.kaya@gmail.com'),
(191, 'Zeynep Öztürk', 'Mor Mahallesi, Papatya Sokak No: 10, İzmir, Türkiye', 'Kadın', '1. sınıf', 21, '0543 890 12', 'zeynep.ozturk@gmail.com'),
(192, 'Murat Yılmaz', 'Kırmızı Mahallesi, Gül Sokak No: 5, Ankara, Türkiye', 'Erkek', '4. sınıf', 24, '0555 901 23', 'murat.yilmaz@gmail.com'),
(193, 'Elif Kaya', 'Mor Mahallesi, Nil Sokak No: 7, İstanbul, Türkiye', 'Kadın', '2. sınıf', 22, '0532 012 34', 'elif.kaya@gmail.com'),
(194, 'Mehmet Demir', 'Kırmızı Mahallesi, Lale Sokak No: 14, İzmir, Türkiye', 'Erkek', '3. sınıf', 28, '0555 123 45', 'mehmet.demir@gmail.com'),
(195, 'Ayşe Korkmaz', 'Sarı Mahallesi, Menekşe Sokak No: 8, İstanbul, Türkiye', 'Kadın', '1. sınıf', 23, '0533 234 56', 'ayse.korkmaz@gmail.com'),
(196, 'Ali Aydın', 'Mor Mahallesi, Papatya Sokak No: 10, İzmir, Türkiye', 'Erkek', '4. sınıf', 27, '0555 345 67', 'ali.aydin@gmail.com'),
(197, 'Selin Demir', 'Kırmızı Mahallesi, Zambak Sokak No: 5, Ankara, Türkiye', 'Kadın', '2. sınıf', 26, '0532 456 78', 'selin.demir@gmail.com'),
(198, 'Emre Kaya', 'Sarı Mahallesi, Yasemin Sokak No: 3, İstanbul, Türkiye', 'Erkek', '3. sınıf', 24, '0555 567 89', 'emre.kaya@gmail.com'),
(199, 'Zeynep Öztürk', 'Mor Mahallesi, Papatya Sokak No: 10, İzmir, Türkiye', 'Kadın', '1. sınıf', 22, '0532 890 12', 'zeynep.ozturk@gmail.com'),
(200, 'Elif Korkmaz', 'Mavi Mahallesi, Zambak Sokak No: 5, Ankara, Türkiye', 'Kadın', '4. sınıf', 29, '0532 678 90', 'elif.korkmaz@gmail.com'),
(201, 'Mehmet Aydın', 'Turkuaz Mahallesi, Lale Sokak No: 9, İzmir, Türkiye', 'Erkek', '1. sınıf', 20, '0543 789 01', 'mehmet.aydin@gmail.com'),
(202, 'Ayşe Demir', 'Yeşil Mahallesi, Papatya Sokak No: 10, Ankara, Türkiye', 'Kadın', '2. sınıf', 22, '0533 890 12', 'ayse.demir@gmail.com'),
(203, 'Ali Kaya', 'Mor Mahallesi, Nil Sokak No: 12, İstanbul, Türkiye', 'Erkek', '3. sınıf', 26, '0555 901 23', 'ali.kaya@gmail.com'),
(204, 'Selin Yılmaz', 'Kırmızı Mahallesi, Gül Sokak No: 5, Ankara, Türkiye', 'Kadın', '4. sınıf', 24, '0555 123 45', 'selin.yilmaz@gmail.com'),
(205, 'Emre Korkmaz', 'Mor Mahallesi, Nil Sokak No: 7, İstanbul, Türkiye', 'Erkek', '1. sınıf', 21, '0532 234 56', 'emre.korkmaz@gmail.com'),
(206, 'Zeynep Aydın', 'Kırmızı Mahallesi, Lale Sokak No: 14, İzmir, Türkiye', 'Kadın', '2. sınıf', 28, '0555 345 67', 'zeynep.aydin@gmail.com'),
(207, 'Murat Demir', 'Sarı Mahallesi, Yasemin Sokak No: 3, İstanbul, Türkiye', 'Erkek', '3. sınıf', 23, '0533 456 78', 'murat.demir@gmail.com'),
(208, 'Elif Kaya', 'Mor Mahallesi, Papatya Sokak No: 10, İzmir, Türkiye', 'Kadın', '4. sınıf', 27, '0555 567 89', 'elif.kaya@gmail.com'),
(209, 'Ahmet Aydın', 'Kırmızı Mahallesi, Zambak Sokak No: 5, Ankara, Türkiye', 'Erkek', '1. sınıf', 25, '0532 678 90', 'ahmet.aydin@gmail.com'),
(210, 'Zeynep Demir', 'Yeşil Mahallesi, Papatya Sokak No: 10, Ankara, Türkiye', 'Kadın', '2. sınıf', 24, '0555 789 01', 'zeynep.demir@gmail.com'),
(211, 'Murat Kaya', 'Mor Mahallesi, Nil Sokak No: 12, İstanbul, Türkiye', 'Erkek', '3. sınıf', 22, '0543 890 12', 'murat.kaya@gmail.com'),
(212, 'Selin Öztürk', 'Kırmızı Mahallesi, Gül Sokak No: 5, Ankara, Türkiye', 'Kadın', '4. sınıf', 26, '0555 901 23', 'selin.ozturk@gmail.com'),
(213, 'Emre Yılmaz', 'Mor Mahallesi, Nil Sokak No: 7, İstanbul, Türkiye', 'Erkek', '1. sınıf', 23, '0532 012 34', 'emre.yilmaz@gmail.com'),
(214, 'Ayşe Korkmaz', 'Sarı Mahallesi, Yasemin Sokak No: 3, İzmir, Türkiye', 'Kadın', '2. sınıf', 29, '0533 234 56', 'ayse.korkmaz@gmail.com'),
(215, 'Ali Aydın', 'Mor Mahallesi, Papatya Sokak No: 10, İzmir, Türkiye', 'Erkek', '3. sınıf', 25, '0555 345 67', 'ali.aydin@gmail.com'),
(216, 'Selin Kaya', 'Kırmızı Mahallesi, Lale Sokak No: 14, Ankara, Türkiye', 'Kadın', '4. sınıf', 27, '0532 456 78', 'selin.kaya@gmail.com'),
(217, 'Emre Yılmaz', 'Sarı Mahallesi, Menekşe Sokak No: 8, İstanbul, Türkiye', 'Erkek', '1. sınıf', 24, '0555 567 89', 'emre.yilmaz@gmail.com'),
(218, 'Zeynep Aydın', 'Mor Mahallesi, Nil Sokak No: 12, İzmir, Türkiye', 'Kadın', '2. sınıf', 26, '0533 678 90', 'zeynep.aydin@gmail.com'),
(219, 'Murat Demir', 'Kırmızı Mahallesi, Zambak Sokak No: 5, Ankara, Türkiye', 'Erkek', '3. sınıf', 28, '0555 789 01', 'murat.demir@gmail.com'),
(220, 'Elif Kaya', 'Mor Mahallesi, Papatya Sokak No: 10, İzmir, Türkiye', 'Kadın', '4. sınıf', 27, '0543 890 12', 'elif.kaya@gmail.com'),
(221, 'Ahmet Aydın', 'Kırmızı Mahallesi, Gül Sokak No: 5, Ankara, Türkiye', 'Erkek', '1. sınıf', 22, '0532 901 23', 'ahmet.aydin@gmail.com'),
(222, 'Zeynep Demir', 'Yeşil Mahallesi, Papatya Sokak No: 10, Ankara, Türkiye', 'Kadın', '2. sınıf', 29, '0555 012 34', 'zeynep.demir@gmail.com'),
(223, 'Murat Korkmaz', 'Mor Mahallesi, Nil Sokak No: 12, İstanbul, Türkiye', 'Erkek', '3. sınıf', 25, '0533234 56', 'murat.korkmaz@gmail.com'),
(224, 'Elif Aydın', 'Kırmızı Mahallesi, Gül Sokak No: 5, Ankara, Türkiye', 'Kadın', '4. sınıf', 26, '0555 345 67', 'elif.aydin@gmail.com'),
(225, 'Emre Kaya', 'Mor Mahallesi, Nil Sokak No: 7, İstanbul, Türkiye', 'Erkek', '1. sınıf', 23, '0532 456 78', 'emre.kaya@gmail.com'),
(226, 'Ayşe Yılmaz', 'Sarı Mahallesi, Yasemin Sokak No: 3, İzmir, Türkiye', 'Kadın', '2. sınıf', 27, '0555 567 89', 'ayse.yilmaz@gmail.com'),
(227, 'Ali Aydın', 'Mor Mahallesi, Papatya Sokak No: 10, İzmir, Türkiye', 'Erkek', '3. sınıf', 25, '0533 678 90', 'ali.aydin@gmail.com'),
(228, 'Selin Korkmaz', 'Kırmızı Mahallesi, Lale Sokak No: 14, Ankara, Türkiye', 'Kadın', '4. sınıf', 29, '0555 789 01', 'selin.korkmaz@gmail.com'),
(229, 'Emre Yılmaz', 'Sarı Mahallesi, Menekşe Sokak No: 8, İstanbul, Türkiye', 'Erkek', '1. sınıf', 22, '0532 890 12', 'emre.yilmaz@gmail.com'),
(230, 'Zeynep Aydın', 'Mor Mahallesi, Nil Sokak No: 12, İzmir, Türkiye', 'Kadın', '2. sınıf', 26, '0555 901 23', 'zeynep.aydin@gmail.com'),
(231, 'Murat Demir', 'Kırmızı Mahallesi, Zambak Sokak No: 5, Ankara, Türkiye', 'Erkek', '3. sınıf', 24, '0533 012 34', 'murat.demir@gmail.com'),
(232, 'Elif Kaya', 'Mor Mahallesi, Papatya Sokak No: 10, İzmir, Türkiye', 'Kadın', '4. sınıf', 28, '0555 123 45', 'elif.kaya@gmail.com'),
(233, 'Ahmet Aydın', 'Kırmızı Mahallesi, Gül Sokak No: 5, Ankara, Türkiye', 'Erkek', '1. sınıf', 25, '0532 234 56', 'ahmet.aydin@gmail.com'),
(234, 'Zeynep Demir', 'Yeşil Mahallesi, Papatya Sokak No: 10, Ankara, Türkiye', 'Kadın', '2. sınıf', 23, '0555 345 67', 'zeynep.demir@gmail.com'),
(235, 'Murat Korkmaz', 'Mor Mahallesi, Nil Sokak No: 12, İstanbul, Türkiye', 'Erkek', '3. sınıf', 26, '0533 456 78', 'murat.korkmaz@gmail.com'),
(236, 'Elif Aydın', 'Kırmızı Mahallesi, Gül Sokak No: 5, Ankara, Türkiye', 'Kadın', '4. sınıf', 27, '0555 567 89', 'elif.aydin@gmail.com'),
(237, 'Emre Kaya', 'Mor Mahallesi, Nil Sokak No: 7, İstanbul, Türkiye', 'Erkek', '1. sınıf', 24, '0532 678 90', 'emre.kaya@gmail.com'),
(238, 'Ayşe Yılmaz', 'Sarı Mahallesi, Yasemin Sokak No: 3, İzmir, Türkiye', 'Kadın', '2. sınıf', 28, '0555 789 01', 'ayse.yilmaz@gmail.com'),
(239, 'Ali Aydın', 'Mor Mahallesi, Papatya Sokak No: 10, İzmir, Türkiye', 'Erkek', '3. sınıf', 25, '0533 890 12', 'ali.aydin@gmail.com'),
(240, 'Selin Korkmaz', 'Kırmızı Mahallesi, Lale Sokak No: 14, Ankara, Türkiye', 'Kadın', '4. sınıf', 29, '0555 901 23', 'selin.korkmaz@gmail.com'),
(241, 'Emre Yılmaz', 'Sarı Mahallesi, Menekşe Sokak No: 8, İstanbul, Türkiye', 'Erkek', '1. sınıf', 22, '0532 012 34', 'emre.yilmaz@gmail.com'),
(242, 'Zeynep Aydın', 'Mor Mahallesi, Nil Sokak No: 12, İzmir, Türkiye', 'Kadın', '2. sınıf', 26, '0555 123 45', 'zeynep.aydin@gmail.com'),
(243, 'Murat Demir', 'Kırmızı Mahallesi, Zambak Sokak No: 5, Ankara, Türkiye', 'Erkek', '3. sınıf', 23, '0533 234 56', 'murat.demir@gmail.com'),
(244, 'Elif Kaya', 'Mor Mahallesi, Papatya Sokak No: 10, İzmir, Türkiye', 'Kadın', '4. sınıf', 27, '0555 345 67', 'elif.kaya@gmail.com'),
(245, 'Ahmet Aydın', 'Kırmızı Mahallesi, Gül Sokak No: 5, Ankara, Türkiye', 'Erkek', '1. sınıf', 25, '0532 456 78', 'ahmet.aydin@gmail.com'),
(246, 'Zeynep Demir', 'Yeşil Mahallesi, Papatya Sokak No: 10, Ankara, Türkiye', 'Kadın', '2. sınıf', 24, '0555 567 89', 'zeynep.demir@gmail.com'),
(247, 'Murat Korkmaz', 'Mor Mahallesi, Nil Sokak No: 12, İstanbul, Türkiye', 'Erkek', '3. sınıf', 28, '0533 678 90', 'murat.korkmaz@gmail.com'),
(248, 'Elif Aydın', 'Kırmızı Mahallesi, Gül Sokak No: 5, Ankara, Türkiye', 'Kadın', '4. sınıf', 29, '0555 789 01', 'elif.aydin@gmail.com'),
(249, 'Emre Kaya', 'Mor Mahallesi, Nil Sokak No: 7, İstanbul, Türkiye', 'Erkek', '1. sınıf', 22, '0532 890 12', 'emre.kaya@gmail.com'),
(250, 'Ayşe Yılmaz', 'Sarı Mahallesi, Yasemin Sokak No: 3, İzmir, Türkiye', 'Kadın', '2. sınıf', 27, '0555 901 23', 'ayse.yilmaz@gmail.com'),
(251, 'Ali Aydın', 'Mor Mahallesi, Papatya Sokak No: 10, İzmir, Türkiye', 'Erkek', '3. sınıf', 26, '0533 012 34', 'ali.aydin@gmail.com'),
(252, 'Selin Korkmaz', 'Kırmızı Mahallesi, Lale Sokak No: 14, Ankara, Türkiye', 'Kadın', '4. sınıf', 28, '0555 123 45', 'selin.korkmaz@gmail.com'),
(253, 'Emre Yılmaz', 'Sarı Mahallesi, Menekşe Sokak No: 8, İstanbul, Türkiye', 'Erkek', '1. sınıf', 23, '0532 234 56', 'emre.yilmaz@gmail.com'),
(254, 'Zeynep Aydın', 'Mor Mahallesi, Nil Sokak No: 12, İzmir, Türkiye', 'Kadın', '2. sınıf', 29, '0555 345 67', 'zeynep.aydin@gmail.com'),
(255, 'Murat Demir', 'Kırmızı Mahallesi, Zambak Sokak No: 5, Ankara, Türkiye', 'Erkek', '3. sınıf', 24, '0533 456 78', 'murat.demir@gmail.com'),
(256, 'Elif Kaya', 'Mor Mahallesi, Papatya Sokak No: 10, İzmir, Türkiye', 'Kadın', '4. sınıf', 27, '0555 567 89', 'elif.kaya@gmail.com'),
(257, 'Ahmet Aydın', 'Kırmızı Mahallesi, Gül Sokak No: 5, Ankara, Türkiye', 'Erkek', '1. sınıf', 25, '0532 678 90', 'ahmet.aydin@gmail.com'),
(258, 'Zeynep Demir', 'Yeşil Mahallesi, Papatya Sokak No: 10, Ankara, Türkiye', 'Kadın', '2. sınıf', 24, '0555 789 01', 'zeynep.demir@gmail.com'),
(259, 'Murat Korkmaz', 'Mor Mahallesi, Nil Sokak No: 12, İstanbul, Türkiye', 'Erkek', '3. sınıf', 26, '0533 890 12', 'murat.korkmaz@gmail.com'),
(260, 'Elif Aydın', 'Kırmızı Mahallesi, Gül Sokak No: 5, Ankara, Türkiye', 'Kadın', '4. sınıf', 27, '0555 901 23', 'elif.aydin@gmail.com'),
(261, 'Emre Kaya', 'Mor Mahallesi, Nil Sokak No: 7, İstanbul, Türkiye', 'Erkek', '1. sınıf', 24, '0532 012 34', 'emre.kaya@gmail.com'),
(262, 'Ayşe Yılmaz', 'Sarı Mahallesi, Yasemin Sokak No: 3, İzmir, Türkiye', 'Kadın', '2. sınıf', 29, '0555 123 45', 'ayse.yilmaz@gmail.com'),
(263, 'Ali Aydın', 'Mor Mahallesi, Papatya Sokak No: 10, İzmir, Türkiye', 'Erkek', '3. sınıf', 25, '0533 234 56', 'ali.aydin@gmail.com'),
(264, 'Selin Korkmaz', 'Kırmızı Mahallesi, Lale Sokak No: 14, Ankara, Türkiye', 'Kadın', '4. sınıf', 28, '0555 345 67', 'selin.korkmaz@gmail.com'),
(265, 'Emre Yılmaz', 'Sarı Mahallesi, Menekşe Sokak No: 8, İstanbul, Türkiye', 'Erkek', '1. sınıf', 23, '0532 456 78', 'emre.yilmaz@gmail.com'),
(266, 'Zeynep Aydın', 'Mor Mahallesi, Nil Sokak No: 12, İzmir, Türkiye', 'Kadın', '2. sınıf', 27, '0555 567 89', 'zeynep.aydin@gmail.com'),
(267, 'Murat Demir', 'Kırmızı Mahallesi, Zambak Sokak No: 5, Ankara, Türkiye', 'Erkek', '3. sınıf', 26, '0533 678 90', 'murat.demir@gmail.com'),
(268, 'Elif Kaya', 'Mor Mahallesi, Papatya Sokak No: 10, İzmir, Türkiye', 'Kadın', '4. sınıf', 29, '0555 789 01', 'elif.kaya@gmail.com'),
(269, 'Ahmet Aydın', 'Kırmızı Mahallesi, Gül Sokak No: 5, Ankara, Türkiye', 'Erkek', '1. sınıf', 22, '0532 890 12', 'ahmet.aydin@gmail.com'),
(270, 'Zeynep Demir', 'Yeşil Mahallesi, Papatya Sokak No: 10, Ankara, Türkiye', 'Kadın', '2. sınıf', 27, '0555 901 23', 'zeynep.demir@gmail.com'),
(271, 'Murat Korkmmaz', 'Mor Mahallesi, Nil Sokak No: 12, İstanbul, Türkiye', 'Erkek', '3. sınıf', 24, '0533 012 34', 'murat.korkmaz@gmail.com'),
(272, 'Elif Aydın', 'Kırmızı Mahallesi, Gül Sokak No: 5, Ankara, Türkiye', 'Kadın', '4. sınıf', 28, '0555 123 45', 'elif.aydin@gmail.com'),
(273, 'Emre Kaya', 'Mor Mahallesi, Nil Sokak No: 7, İstanbul, Türkiye', 'Erkek', '1. sınıf', 25, '0532 234 56', 'emre.kaya@gmail.com'),
(274, 'Ayşe Yılmaz', 'Sarı Mahallesi, Yasemin Sokak No: 3, İzmir, Türkiye', 'Kadın', '2. sınıf', 23, '0555 345 67', 'ayse.yilmaz@gmail.com'),
(275, 'Ali Aydın', 'Mor Mahallesi, Papatya Sokak No: 10, İzmir, Türkiye', 'Erkek', '3. sınıf', 27, '0533 456 78', 'ali.aydin@gmail.com'),
(276, 'Selin Korkmaz', 'Kırmızı Mahallesi, Lale Sokak No: 14, Ankara, Türkiye', 'Kadın', '4. sınıf', 29, '0555 567 89', 'selin.korkmaz@gmail.com'),
(277, 'Emre Yılmaz', 'Sarı Mahallesi, Menekşe Sokak No: 8, İstanbul, Türkiye', 'Erkek', '1. sınıf', 26, '0532 678 90', 'emre.yilmaz@gmail.com'),
(278, 'Zeynep Aydın', 'Mor Mahallesi, Nil Sokak No: 12, İzmir, Türkiye', 'Kadın', '2. sınıf', 24, '0555 789 01', 'zeynep.aydin@gmail.com'),
(279, 'Murat Demir', 'Kırmızı Mahallesi, Zambak Sokak No: 5, Ankara, Türkiye', 'Erkek', '3. sınıf', 28, '0533 890 12', 'murat.demir@gmail.com'),
(280, 'Elif Kaya', 'Mor Mahallesi, Papatya Sokak No: 10, İzmir, Türkiye', 'Kadın', '4. sınıf', 25, '0555 901 23', 'elif.kaya@gmail.com'),
(281, 'Ahmet Aydın', 'Kırmızı Mahallesi, Gül Sokak No: 5, Ankara, Türkiye', 'Erkek', '1. sınıf', 23, '0532 012 34', 'ahmet.aydin@gmail.com');

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
(21, 'İletişim Yayınları'),
(22, 'Metis Yayınları'),
(23, 'Can Yayınları'),
(24, 'İletişim Yayınları'),
(25, 'Doğan Kitap'),
(26, 'Yapı Kredi Yayınları'),
(27, 'Kırmızı Kedi Yayınevi'),
(28, 'Everest Yayınları'),
(29, 'İthaki Yayınları'),
(30, 'Furkan Yayınları'),
(31, 'Pegasus Yayınları'),
(32, 'Alfa Yayınları'),
(33, 'Remzi Kitabevi'),
(34, 'İnkılap Kitabevi'),
(35, 'Can Yayınları'),
(36, 'Metis Yayınları'),
(37, 'İletişim Yayınları'),
(38, 'Doğan Kitap'),
(39, 'Yapı Kredi Yayınları'),
(40, 'Kırmızı Kedi Yayınevi'),
(41, 'Everest Yayınları'),
(42, 'İthaki Yayınları');

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
(48, 'Ferit Edgü'),
(49, 'Neslihan Önderoğlu'),
(50, 'Kemal Varol'),
(51, 'Ece Temelkuran'),
(52, 'Alev Alatlı'),
(53, 'Ahmet Büke'),
(54, 'Yekta Kopan'),
(55, 'İsmail Saymaz'),
(56, 'Şebnem İşigüzel'),
(57, 'Hakan Günday'),
(58, 'Meltem Arıkan'),
(59, 'Emrah Serbes'),
(60, 'Ayşe Kulin'),
(61, 'Murat Uyurkulak'),
(62, 'Cemal Süreya'),
(63, 'Nihat Genç'),
(64, 'Cengiz Aytmatov'),
(65, 'Cemal Süreya'),
(66, 'Can Dündar'),
(67, 'Metin Eloğlu'),
(68, 'Tahsin Yücel'),
(69, 'İlhan Berk'),
(70, 'İsmet Özel'),
(71, 'Seyhan Erözçelik'),
(72, 'Ezgi Karakuş'),
(73, 'Cemal Süreya'),
(74, 'Melih Cevdet Anday'),
(75, 'Oğuz Atay'),
(76, 'Orhan Pamuk'),
(77, 'Murat Gülsoy'),
(78, 'Zülfü Livaneli'),
(79, 'Ahmet Ümit'),
(80, 'Yaşar Kemal'),
(81, 'Elif Şafak'),
(82, 'Orhan Kemal'),
(83, 'Peyami Safa'),
(84, 'Halide Edip Adıvar'),
(85, 'Adalet Ağaoğlu'),
(86, 'Murathan Mungan'),
(87, 'Sevim Ak'),
(88, 'Sezai Karakoç'),
(89, 'Mehmet Akif Ersoy'),
(90, 'Refik Halit Karay'),
(91, 'Sait Faik Abasıyanık'),
(92, 'Ahmet Hamdi Tanpınar');

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
-- Tablo döküm verisi `yonetim_paneli`
--

INSERT INTO `yonetim_paneli` (`yonetim_id`, `odunc_id`, `admin_id`, `yayinevi_id`, `yazar_id`, `kategori_id`, `ayarlar_id`, `ogrenci_id`, `kitap_id`) VALUES
(2, 1, 1, 10, 42, 34, 1, 106, 15),
(9, 2, 1, 3, 10, 23, 1, 108, 68),
(11, 2, 1, 3, 19, 11, 1, 198, 28),
(7, 11, 1, 27, 88, 56, 1, 107, 45),
(1, 17, 1, 32, 32, 59, 1, 105, 2),
(8, 17, 1, 33, 34, 41, 1, 10, 32);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Tablo için AUTO_INCREMENT değeri `kitap`
--
ALTER TABLE `kitap`
  MODIFY `kitap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- Tablo için AUTO_INCREMENT değeri `kitap_odunc_verme`
--
ALTER TABLE `kitap_odunc_verme`
  MODIFY `odunc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `ogrenciler`
--
ALTER TABLE `ogrenciler`
  MODIFY `ogrenci_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=284;

--
-- Tablo için AUTO_INCREMENT değeri `yayinevi`
--
ALTER TABLE `yayinevi`
  MODIFY `yayinevi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Tablo için AUTO_INCREMENT değeri `yazar`
--
ALTER TABLE `yazar`
  MODIFY `yazar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- Tablo için AUTO_INCREMENT değeri `yonetim_paneli`
--
ALTER TABLE `yonetim_paneli`
  MODIFY `yonetim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
