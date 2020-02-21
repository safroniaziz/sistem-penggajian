-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.3.10-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_penggajian
CREATE DATABASE IF NOT EXISTS `db_penggajian` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_penggajian`;

-- Dumping structure for table db_penggajian.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_penggajian.migrations: ~2 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(5, '2014_10_12_000000_create_users_table', 1),
	(6, '2014_10_12_100000_create_password_resets_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table db_penggajian.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_penggajian.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table db_penggajian.tb_jabatan
CREATE TABLE IF NOT EXISTS `tb_jabatan` (
  `id_jabatan` int(9) NOT NULL AUTO_INCREMENT,
  `nm_jabatan` varchar(20) NOT NULL,
  `gaji_pokok` int(9) NOT NULL,
  `tunj_jabatan` int(9) NOT NULL,
  `uang_makan` int(9) NOT NULL,
  `tunj_akomodasi` int(9) NOT NULL,
  `tunj_pulsa` int(9) NOT NULL,
  `tunj_bbm` int(9) NOT NULL,
  `potongan` int(9) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table db_penggajian.tb_jabatan: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_jabatan` DISABLE KEYS */;
INSERT INTO `tb_jabatan` (`id_jabatan`, `nm_jabatan`, `gaji_pokok`, `tunj_jabatan`, `uang_makan`, `tunj_akomodasi`, `tunj_pulsa`, `tunj_bbm`, `potongan`) VALUES
	(3, 'Guru', 1000, 2000, 1000, 1000, 2000, 1000, 2000),
	(5, 'Dodon', 89991, 1000, 1000, 1000, 1000, 10001, 100);
/*!40000 ALTER TABLE `tb_jabatan` ENABLE KEYS */;

-- Dumping structure for table db_penggajian.tb_operator
CREATE TABLE IF NOT EXISTS `tb_operator` (
  `id_operator` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_operator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_operator`),
  UNIQUE KEY `tb_operator_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_penggajian.tb_operator: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_operator` DISABLE KEYS */;
INSERT INTO `tb_operator` (`id_operator`, `nm_operator`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Operator', 'operator', '$2y$10$vmZjv/pyv.1nZxw.INXxUuazi/jxZ0Z6.pWI11czkNaoPYwCcG8A.', NULL, '2018-12-06 04:45:03', '2018-12-06 04:45:03');
/*!40000 ALTER TABLE `tb_operator` ENABLE KEYS */;

-- Dumping structure for table db_penggajian.tb_pegawai
CREATE TABLE IF NOT EXISTS `tb_pegawai` (
  `nipy` int(8) NOT NULL,
  `nm_pegawai` varchar(35) NOT NULL,
  `id_jabatan` int(9) DEFAULT NULL,
  `masa_kerja` int(3) NOT NULL,
  `tunj_hari_raya` int(9) NOT NULL,
  `tunj_yayasan` int(9) NOT NULL,
  `bonus` int(9) NOT NULL,
  `tunj_keahlian` int(9) NOT NULL,
  `lembur` int(9) NOT NULL,
  PRIMARY KEY (`nipy`),
  KEY `id_jabatan` (`id_jabatan`),
  CONSTRAINT `tb_pegawai_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_penggajian.tb_pegawai: ~4 rows (approximately)
/*!40000 ALTER TABLE `tb_pegawai` DISABLE KEYS */;
INSERT INTO `tb_pegawai` (`nipy`, `nm_pegawai`, `id_jabatan`, `masa_kerja`, `tunj_hari_raya`, `tunj_yayasan`, `bonus`, `tunj_keahlian`, `lembur`) VALUES
	(178787, 'joniii', 3, 18, 81000, 10000, 1000, 899000, 2999),
	(9999898, 'HUNI', 3, 10000, 1000, 1000, 1000, 1000, 100),
	(10091919, 'Jujum', 3, 2, 10000, 10000, 10000, 10000, 10000),
	(2147483647, 'Joni', 3, 10, 1000, 100000, 10000, 0, 0);
/*!40000 ALTER TABLE `tb_pegawai` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
