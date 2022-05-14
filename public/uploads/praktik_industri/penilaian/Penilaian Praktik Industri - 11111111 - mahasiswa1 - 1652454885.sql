/*
 Navicat Premium Data Transfer

 Source Server         : lokal
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : yayasan

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 07/05/2022 22:00:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for barang
-- ----------------------------
-- DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang`  (
  -- `id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nm_barang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `hpp` bigint(20) NULL DEFAULT NULL,
  `harga_jual` bigint(20) NOT NULL,
  `expired_date` date NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `a_aktif` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  -- PRIMARY KEY (`id`) USING BTREE,
  -- INDEX `FK_KATEGORI_BARANG`(`kategori_id`) USING BTREE,
  -- INDEX `FK_BRANCH_BARANG`(`branch_id`) USING BTREE,
  -- CONSTRAINT `FK_BRANCH_BARANG` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  -- CONSTRAINT `FK_KATEGORI_BARANG` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for branch
-- ----------------------------
-- DROP TABLE IF EXISTS `branch`;
CREATE TABLE `branch`  (
  -- `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_branch` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `a_aktif` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `no_hp` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  -- PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for detail_pembelian
-- ----------------------------
-- DROP TABLE IF EXISTS `detail_pembelian`;
CREATE TABLE `detail_pembelian`  (
  -- `id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pembelian_id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `barang_id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  -- PRIMARY KEY (`id`) USING BTREE,
  -- INDEX `FK_PEMBELIAN_DETAIL`(`pembelian_id`) USING BTREE,
  -- INDEX `FK_BARANG_DETAIL`(`barang_id`) USING BTREE,
  -- CONSTRAINT `FK_BARANG_DETAIL` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  -- CONSTRAINT `FK_PEMBELIAN_DETAIL` FOREIGN KEY (`pembelian_id`) REFERENCES `pembelian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for detail_penjualan
-- ----------------------------
-- DROP TABLE IF EXISTS `detail_penjualan`;
CREATE TABLE `detail_penjualan`  (
  -- `id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `penjualan_id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `barang_id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  -- PRIMARY KEY (`id`) USING BTREE,
  -- INDEX `FK_PENJUALAN_DETAIL`(`penjualan_id`) USING BTREE,
  -- INDEX `FK_BARANG_DETAILPENJUALAN`(`barang_id`) USING BTREE,
  -- CONSTRAINT `FK_BARANG_DETAILPENJUALAN` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  -- CONSTRAINT `FK_PENJUALAN_DETAIL` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
-- DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  -- `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kategori` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  -- PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for konsumen
-- ----------------------------
-- DROP TABLE IF EXISTS `konsumen`;
CREATE TABLE `konsumen`  (
  -- `id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nm_konsumen` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `no_hp` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  -- PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for kurir
-- ----------------------------
-- DROP TABLE IF EXISTS `kurir`;
CREATE TABLE `kurir`  (
  -- `id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nm_kurir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_hp` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `a_aktif` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  -- PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for kurir_pengiriman
-- ----------------------------
-- DROP TABLE IF EXISTS `kurir_pengiriman`;
CREATE TABLE `kurir_pengiriman`  (
  -- `id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `penjualan_id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kurir_id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `waktu_pengantaran` time NULL DEFAULT NULL,
  `waktu_selesai` time NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  -- PRIMARY KEY (`id`) USING BTREE,
  -- INDEX `FK_PENJUALAN_KURIRPENGIRIMAN`(`penjualan_id`) USING BTREE,
  -- INDEX `FK_KURIR_KURIRPENGIRIMAN`(`kurir_id`) USING BTREE,
  -- CONSTRAINT `FK_KURIR_KURIRPENGIRIMAN` FOREIGN KEY (`kurir_id`) REFERENCES `kurir` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  -- CONSTRAINT `FK_PENJUALAN_KURIRPENGIRIMAN` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for pembayaran
-- ----------------------------
-- DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran`  (
  -- `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_pembayaran` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_pembayaran` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `a_aktif` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  -- PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for pembelian
-- ----------------------------
-- DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE `pembelian`  (
  -- `id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pengguna_id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `branch_id` int(11) NOT NULL,
  `no_faktur` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_pembelian` timestamp NOT NULL,
  `total` bigint(20) NOT NULL,
  `status` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `a_aktif` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  -- PRIMARY KEY (`id`) USING BTREE,
  -- INDEX `FK_PENGGUNA_PENJUALAN`(`pengguna_id`) USING BTREE,
  -- INDEX `FK_BRANCH_PENJUALAN`(`branch_id`) USING BTREE,
  -- CONSTRAINT `FK_BRANCH_PENJUALAN` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  -- CONSTRAINT `FK_PENGGUNA_PENJUALAN` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for pengguna
-- ----------------------------
-- DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna`  (
  -- `id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nm_pengguna` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `isAdmin` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `peran_id` int(11) NULL DEFAULT NULL,
  `branch_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updater_id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  -- PRIMARY KEY (`id`) USING BTREE,
  -- INDEX `FK_PERAN_PENGGUNA`(`peran_id`) USING BTREE,
  -- INDEX `FK_BRANCH_PENGGUNA`(`branch_id`) USING BTREE,
  -- CONSTRAINT `FK_BRANCH_PENGGUNA` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  -- CONSTRAINT `FK_PERAN_PENGGUNA` FOREIGN KEY (`peran_id`) REFERENCES `peran` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for pengiriman
-- ----------------------------
-- DROP TABLE IF EXISTS `pengiriman`;
CREATE TABLE `pengiriman`  (
  -- `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_pengiriman` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `a_aktif` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  -- PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for penjualan
-- ----------------------------
-- DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE `penjualan`  (
  -- `id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_penjualan` timestamp NULL DEFAULT NULL,
  `konsumen_id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pembayaran_id` int(11) NOT NULL,
  `pengiriman_id` int(11) NULL DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  `tgl_pembayaran` timestamp NULL DEFAULT NULL,
  `total` bigint(20) NULL DEFAULT NULL,
  `status` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updater_id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  -- PRIMARY KEY (`id`) USING BTREE,
  -- INDEX `FK_KONSUMEN_PENJUALAN`(`konsumen_id`) USING BTREE,
  -- INDEX `FK_PEMBAYARAN_PENJUALAN`(`pembayaran_id`) USING BTREE,
  -- INDEX `FK_PENGIRIMAN_PENJUALAN`(`pengiriman_id`) USING BTREE,
  -- INDEX `FK_BRANCH_PENJUALANID`(`branch_id`) USING BTREE,
  -- CONSTRAINT `FK_BRANCH_PENJUALANID` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  -- CONSTRAINT `FK_KONSUMEN_PENJUALAN` FOREIGN KEY (`konsumen_id`) REFERENCES `konsumen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  -- CONSTRAINT `FK_PEMBAYARAN_PENJUALAN` FOREIGN KEY (`pembayaran_id`) REFERENCES `pembayaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  -- CONSTRAINT `FK_PENGIRIMAN_PENJUALAN` FOREIGN KEY (`pengiriman_id`) REFERENCES `pengiriman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for peran
-- ----------------------------
-- DROP TABLE IF EXISTS `peran`;
CREATE TABLE `peran`  (
  -- `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_peran` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  -- PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- SET FOREIGN_KEY_CHECKS = 1;
