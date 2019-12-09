-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 07 Ara 2019, 13:42:18
-- Sunucu sürümü: 5.7.26
-- PHP Sürümü: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `blog-scripti`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `etiketler`
--

DROP TABLE IF EXISTS `etiketler`;
CREATE TABLE IF NOT EXISTS `etiketler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yazi_id` int(11) NOT NULL,
  `etiket` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `etiket_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci ROW_FORMAT=COMPACT;

--
-- Tablo döküm verisi `etiketler`
--

INSERT INTO `etiketler` (`id`, `yazi_id`, `etiket`, `etiket_url`, `createdAt`, `updatedAt`) VALUES
(298, 14, '123', '123', '2019-12-07 13:41:12', '0000-00-00 00:00:00'),
(299, 14, '123', '123', '2019-12-07 13:41:12', '0000-00-00 00:00:00'),
(300, 14, '123', '123', '2019-12-07 13:41:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `genel_ayarlar`
--

DROP TABLE IF EXISTS `genel_ayarlar`;
CREATE TABLE IF NOT EXISTS `genel_ayarlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_title` text COLLATE utf8_turkish_ci NOT NULL,
  `site_description` text COLLATE utf8_turkish_ci NOT NULL,
  `site_keywords` text COLLATE utf8_turkish_ci NOT NULL,
  `site_logo` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_facebook` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_twitter` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_instagram` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_youtube` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_google_plus` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `anasayfa_yazi_sayisi` int(11) NOT NULL,
  `anasayfa_etiket_sayisi` int(11) NOT NULL,
  `arama_yazi_sayisi` int(11) NOT NULL,
  `enckokunan_yazi_sayisi` int(11) NOT NULL,
  `anasayfa_kategori_sayisi` int(11) NOT NULL,
  `updatedAt` datetime NOT NULL,
  `guncelleyen_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci ROW_FORMAT=COMPACT;

--
-- Tablo döküm verisi `genel_ayarlar`
--

INSERT INTO `genel_ayarlar` (`id`, `site_title`, `site_description`, `site_keywords`, `site_logo`, `site_facebook`, `site_twitter`, `site_instagram`, `site_youtube`, `site_google_plus`, `anasayfa_yazi_sayisi`, `anasayfa_etiket_sayisi`, `arama_yazi_sayisi`, `enckokunan_yazi_sayisi`, `anasayfa_kategori_sayisi`, `updatedAt`, `guncelleyen_id`) VALUES
(1, 'BDN Blog', 'Bir yazılımcı bloğu', 'Burak Dündar, yazılım, html, css, php, c#, jquery, javascript, blog, kişisel', '', 'https://www.facebook.com/#', 'https://www.twitter.com/#', 'https://www.instagram.com/#', 'https://www.youtube.com/#', 'https://plus.google.com/#', 4, 4, 4, 10, 4, '2019-01-01 09:13:58', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

DROP TABLE IF EXISTS `iletisim`;
CREATE TABLE IF NOT EXISTS `iletisim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gonderen_ad_soyad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `gonderen_email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `konu` text COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `iletisim_durum` int(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

DROP TABLE IF EXISTS `kategoriler`;
CREATE TABLE IF NOT EXISTS `kategoriler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_durum` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yazar_id` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayfalar`
--

DROP TABLE IF EXISTS `sayfalar`;
CREATE TABLE IF NOT EXISTS `sayfalar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sayfa_baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sayfa_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sayfa_icerik` longtext COLLATE utf8_turkish_ci NOT NULL,
  `sayfa_durum` int(11) NOT NULL,
  `yazar_id` int(11) NOT NULL,
  `goruntulenme_sayisi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

DROP TABLE IF EXISTS `uyeler`;
CREATE TABLE IF NOT EXISTS `uyeler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_soyad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `cinsiyet` int(1) NOT NULL,
  `sifre` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `isActive` int(1) NOT NULL,
  `user_role` int(1) NOT NULL,
  `ekleyen_id` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedat` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci ROW_FORMAT=COMPACT;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `ad_soyad`, `email`, `telefon`, `cinsiyet`, `sifre`, `isActive`, `user_role`, `ekleyen_id`, `createdAt`, `updatedat`) VALUES
(1, 'Admin', 'admin@admin.com', '05555555555', 1, '25f9e794323b453885f5181f1b624d0b', 1, 4, 1, '2018-07-28 07:50:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazilar`
--

DROP TABLE IF EXISTS `yazilar`;
CREATE TABLE IF NOT EXISTS `yazilar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yazi_baslik` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yazi_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yazi_icerik` longtext COLLATE utf8_turkish_ci,
  `yazi_resim` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yazi_durum` int(1) DEFAULT NULL,
  `yazi_goruntulenme` int(11) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `yazar_id` int(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazi_yorumlar`
--

DROP TABLE IF EXISTS `yazi_yorumlar`;
CREATE TABLE IF NOT EXISTS `yazi_yorumlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yazi_id` int(11) NOT NULL,
  `yorum_ad_soyad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yorum_email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yorum_icerik` longtext COLLATE utf8_turkish_ci NOT NULL,
  `yorum_durum` int(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci ROW_FORMAT=COMPACT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
