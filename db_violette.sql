/*
Navicat MySQL Data Transfer

Source Server         : koneksi
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : db_violette

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2016-02-08 14:00:09
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `barang`
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(255) DEFAULT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of barang
-- ----------------------------
INSERT INTO `barang` VALUES ('1', 'S-001', 'Sweater Maroon', '100000', '1');
INSERT INTO `barang` VALUES ('2', 'P-001', 'Green Tea Powder 1kg', '40000', '1');

-- ----------------------------
-- Table structure for `detail_transaksi`
-- ----------------------------
DROP TABLE IF EXISTS `detail_transaksi`;
CREATE TABLE `detail_transaksi` (
  `id_detail_trans` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_trans` bigint(20) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_detail_trans` int(11) NOT NULL,
  PRIMARY KEY (`id_detail_trans`),
  KEY `fk_id_trans` (`id_trans`),
  KEY `fk_id_barang` (`id_barang`),
  CONSTRAINT `fk_id_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  CONSTRAINT `fk_id_trans` FOREIGN KEY (`id_trans`) REFERENCES `transaksi` (`id_trans`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detail_transaksi
-- ----------------------------

-- ----------------------------
-- Table structure for `dropshipper`
-- ----------------------------
DROP TABLE IF EXISTS `dropshipper`;
CREATE TABLE `dropshipper` (
  `id_dropshipper` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dropshipper` varchar(255) NOT NULL,
  `no_hp_dropshipper` varchar(255) NOT NULL,
  `alamat_dropshipper` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_dropshipper`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dropshipper
-- ----------------------------
INSERT INTO `dropshipper` VALUES ('1', 'Dafiq Dropshipper', '085722211105', 'Bandung', '1');

-- ----------------------------
-- Table structure for `transaksi`
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `id_trans` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_dropshipper` int(11) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `tgl_trans` date NOT NULL,
  `total_harga` bigint(20) DEFAULT NULL,
  `no_resi` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_trans`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
