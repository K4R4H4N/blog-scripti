/*
 Navicat Premium Data Transfer

 Source Server         : LOCALHOST
 Source Server Type    : MySQL
 Source Server Version : 100125
 Source Host           : localhost:3306
 Source Schema         : bdnblog

 Target Server Type    : MySQL
 Target Server Version : 100125
 File Encoding         : 65001

 Date: 01/01/2019 11:26:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for brkdndr_etiketler
-- ----------------------------
DROP TABLE IF EXISTS `brkdndr_etiketler`;
CREATE TABLE `brkdndr_etiketler`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yazi_id` int(11) NOT NULL,
  `etiket` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `etiket_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `createdAt` datetime(0) NOT NULL,
  `updatedAt` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 298 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Compact;
-- ----------------------------
-- Table structure for brkdndr_genel_ayarlar
-- ----------------------------
DROP TABLE IF EXISTS `brkdndr_genel_ayarlar`;
CREATE TABLE `brkdndr_genel_ayarlar`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_title` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `site_description` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `site_keywords` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `site_logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `site_facebook` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `site_twitter` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `site_instagram` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `site_youtube` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `site_google_plus` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `anasayfa_yazi_sayisi` int(11) NOT NULL,
  `anasayfa_etiket_sayisi` int(11) NOT NULL,
  `arama_yazi_sayisi` int(11) NOT NULL,
  `enckokunan_yazi_sayisi` int(11) NOT NULL,
  `anasayfa_kategori_sayisi` int(11) NOT NULL,
  `updatedAt` datetime(0) NOT NULL,
  `guncelleyen_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of brkdndr_genel_ayarlar
-- ----------------------------
INSERT INTO `brkdndr_genel_ayarlar` VALUES (1, 'BDN Blog', 'Bir yazılımcı bloğu', 'Burak Dündar, yazılım, html, css, php, c#, jquery, javascript, blog, kişisel', '', 'https://www.facebook.com/#', 'https://www.twitter.com/#', 'https://www.instagram.com/#', 'https://www.youtube.com/#', 'https://plus.google.com/#', 4, 4, 4, 10, 4, '2019-01-01 09:13:58', 1);

-- ----------------------------
-- Table structure for brkdndr_iletisim
-- ----------------------------
DROP TABLE IF EXISTS `brkdndr_iletisim`;
CREATE TABLE `brkdndr_iletisim`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gonderen_ad_soyad` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `gonderen_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `konu` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `iletisim_durum` int(1) NOT NULL,
  `createdAt` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for brkdndr_kategoriler
-- ----------------------------
DROP TABLE IF EXISTS `brkdndr_kategoriler`;
CREATE TABLE `brkdndr_kategoriler`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_adi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kategori_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kategori_durum` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `yazar_id` int(11) NOT NULL,
  `createdAt` datetime(0) NOT NULL,
  `updatedAt` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for brkdndr_sayfalar
-- ----------------------------
DROP TABLE IF EXISTS `brkdndr_sayfalar`;
CREATE TABLE `brkdndr_sayfalar`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sayfa_baslik` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sayfa_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sayfa_icerik` longtext CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sayfa_durum` int(11) NOT NULL,
  `yazar_id` int(11) NOT NULL,
  `goruntulenme_sayisi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `createdAt` datetime(0) NOT NULL,
  `updatedAt` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for brkdndr_uyeler
-- ----------------------------
DROP TABLE IF EXISTS `brkdndr_uyeler`;
CREATE TABLE `brkdndr_uyeler`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_soyad` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(15) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `cinsiyet` int(1) NOT NULL,
  `sifre` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `isActive` int(1) NOT NULL,
  `user_role` int(1) NOT NULL,
  `ekleyen_id` int(11) NOT NULL,
  `createdAt` datetime(0) NOT NULL,
  `updatedat` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of brkdndr_uyeler
-- ----------------------------
INSERT INTO `brkdndr_uyeler` VALUES (1, 'Admin', 'admin@admin.com', '05555555555', 1, '25f9e794323b453885f5181f1b624d0b', 1, 4, 1, '2018-07-28 07:50:11', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for brkdndr_yazi_yorumlar
-- ----------------------------
DROP TABLE IF EXISTS `brkdndr_yazi_yorumlar`;
CREATE TABLE `brkdndr_yazi_yorumlar`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yazi_id` int(11) NOT NULL,
  `yorum_ad_soyad` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `yorum_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `yorum_icerik` longtext CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `yorum_durum` int(1) NOT NULL,
  `createdAt` datetime(0) NOT NULL,
  `updatedAt` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for brkdndr_yazilar
-- ----------------------------
DROP TABLE IF EXISTS `brkdndr_yazilar`;
CREATE TABLE `brkdndr_yazilar`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yazi_baslik` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `yazi_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `yazi_icerik` longtext CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL,
  `yazi_resim` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `yazi_durum` int(1) NULL DEFAULT NULL,
  `yazi_goruntulenme` int(11) NULL DEFAULT NULL,
  `kategori_id` int(11) NULL DEFAULT NULL,
  `yazar_id` int(11) NULL DEFAULT NULL,
  `createdAt` datetime(0) NULL DEFAULT NULL,
  `updatedAt` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
