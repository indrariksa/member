/*
 Navicat Premium Data Transfer

 Source Server         : LOCAL (No PASSWORD)
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : member

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 07/11/2020 18:47:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for form_amwal
-- ----------------------------
DROP TABLE IF EXISTS `form_amwal`;
CREATE TABLE `form_amwal`  (
  `id_amwal` int(11) NOT NULL AUTO_INCREMENT,
  `no_id` int(15) NULL DEFAULT NULL,
  `bulan_amwal` date NULL DEFAULT NULL,
  `mbi_amwal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `in_amwal` int(15) NULL DEFAULT NULL,
  `zm_amwal` int(15) NULL DEFAULT NULL,
  `sh_amwal` int(15) NULL DEFAULT NULL,
  `ze_amwal` int(15) NULL DEFAULT NULL,
  `ln_amwal` int(15) NULL DEFAULT NULL,
  PRIMARY KEY (`id_amwal`) USING BTREE,
  INDEX `fk_amwal`(`no_id`) USING BTREE,
  CONSTRAINT `fk_amwal` FOREIGN KEY (`no_id`) REFERENCES `form_member` (`no_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of form_amwal
-- ----------------------------
INSERT INTO `form_amwal` VALUES (1, 18050747, '2020-08-13', 'A', 1000000, 1000, 0, 0, 500000);
INSERT INTO `form_amwal` VALUES (2, 18050747, '2020-09-24', 'C', 1000000, 0, 4000000, 0, 0);
INSERT INTO `form_amwal` VALUES (3, 18050747, '2020-10-14', 'X', 0, 500000, 600000, 0, 1000000);
INSERT INTO `form_amwal` VALUES (4, 18050747, '2020-11-07', 'Ccd', 6000000, 10000000, 5000000, 50000000, 100000000);
INSERT INTO `form_amwal` VALUES (7, 2147483647, '2020-04-08', 'A10', 9000000, 0, 5000000, 800000, 0);
INSERT INTO `form_amwal` VALUES (8, 1111111111, '2020-06-04', 'A10', 9000000, 10000000, 4000000, 800000, 0);
INSERT INTO `form_amwal` VALUES (9, 1111111111, '2020-05-07', 'A10', 0, 0, 600000, 0, 100000000);

-- ----------------------------
-- Table structure for form_member
-- ----------------------------
DROP TABLE IF EXISTS `form_member`;
CREATE TABLE `form_member`  (
  `no` int(12) NOT NULL AUTO_INCREMENT,
  `no_id` int(15) NOT NULL,
  `rt` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pkl` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jenis_kelamin` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_telp` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pendidikan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pekerjaan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `usia` int(12) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `umur` int(12) NULL DEFAULT NULL,
  PRIMARY KEY (`no`) USING BTREE,
  UNIQUE INDEX `unique`(`no_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of form_member
-- ----------------------------
INSERT INTO `form_member` VALUES (1, 18050747, 'R4', 'R41', 'Fadillah Firdaus', 'laki-laki', '089609038966', 'Jl Tegalega Barat No. 193/95', 'Sudah Nikah Istri 5', 'SMA', '42', '1997-11-25', 22, '2018-05-03', NULL);
INSERT INTO `form_member` VALUES (2, 2147483647, 'R20', 'A100', 'Toni Sucipta', 'laki-laki', '08122224121', 'Sumedang', 'Single', 'S3', '46', '1990-03-09', 30, '2009-08-07', NULL);
INSERT INTO `form_member` VALUES (4, 1111111111, 'R21', 'A50', 'Carline Debora', 'perempuan', '08122222111', 'Jalan Pejuang Cinta No. 666', 'Single', 'S2', '16', '1993-08-26', 27, '2012-03-16', NULL);

-- ----------------------------
-- Table structure for form_member_2
-- ----------------------------
DROP TABLE IF EXISTS `form_member_2`;
CREATE TABLE `form_member_2`  (
  `no` int(12) NOT NULL AUTO_INCREMENT,
  `no_id` int(12) NOT NULL,
  `rt` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pkl` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `usia` int(12) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `umur` int(12) NOT NULL,
  `l/p` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sgm` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kls` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `k_sl` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mbi` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`no`) USING BTREE,
  UNIQUE INDEX `no_id`(`no_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for form_qurban
-- ----------------------------
DROP TABLE IF EXISTS `form_qurban`;
CREATE TABLE `form_qurban`  (
  `id_qurban` int(15) NOT NULL AUTO_INCREMENT,
  `no_id` int(15) NULL DEFAULT NULL,
  `tgl_qurban` date NULL DEFAULT NULL,
  `jenis_qurban` enum('Harta','Domba','Sapi') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kelas_qurban` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nominal_qurban` int(15) NULL DEFAULT NULL,
  PRIMARY KEY (`id_qurban`) USING BTREE,
  INDEX `fk_qurban`(`no_id`) USING BTREE,
  CONSTRAINT `fk_qurban` FOREIGN KEY (`no_id`) REFERENCES `form_member` (`no_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of form_qurban
-- ----------------------------
INSERT INTO `form_qurban` VALUES (2, 18050747, '2020-11-07', 'Harta', 'Kaya', 50000000);
INSERT INTO `form_qurban` VALUES (3, 18050747, '2020-11-08', 'Sapi', 'Limosin', 120000000);

-- ----------------------------
-- Table structure for form_zakat_fitrah
-- ----------------------------
DROP TABLE IF EXISTS `form_zakat_fitrah`;
CREATE TABLE `form_zakat_fitrah`  (
  `id_zakat_fitrah` int(15) NOT NULL AUTO_INCREMENT,
  `no_id` int(15) NULL DEFAULT NULL,
  `tgl_zakat_fitrah` date NULL DEFAULT NULL,
  `status_zakat_fitrah` enum('Dewasa','Anak-anak') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `muzaki_zakat_fitrah` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nominal_zakat_fitrah` int(15) NULL DEFAULT NULL,
  PRIMARY KEY (`id_zakat_fitrah`) USING BTREE,
  INDEX `fk_zakat_fitrah`(`no_id`) USING BTREE,
  CONSTRAINT `fk_zakat_fitrah` FOREIGN KEY (`no_id`) REFERENCES `form_member` (`no_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of form_zakat_fitrah
-- ----------------------------
INSERT INTO `form_zakat_fitrah` VALUES (1, 18050747, '2020-11-07', 'Dewasa', 'Fadillah Firdaus', 10000000);
INSERT INTO `form_zakat_fitrah` VALUES (2, 18050747, '2020-11-07', 'Anak-anak', 'Abanda Herman', 1500000);
INSERT INTO `form_zakat_fitrah` VALUES (5, 1111111111, '2020-08-12', 'Dewasa', 'Carline Debora', 5500000);

-- ----------------------------
-- Table structure for pekerjaan
-- ----------------------------
DROP TABLE IF EXISTS `pekerjaan`;
CREATE TABLE `pekerjaan`  (
  `id_pekerjaan` int(15) NOT NULL AUTO_INCREMENT,
  `nama_pekerjaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_pekerjaan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 90 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pekerjaan
-- ----------------------------
INSERT INTO `pekerjaan` VALUES (1, 'BELUM/TIDAK BEKERJA');
INSERT INTO `pekerjaan` VALUES (2, 'MENGURUS RUMAH TANGGA');
INSERT INTO `pekerjaan` VALUES (3, 'PELAJAR/MAHASISWA');
INSERT INTO `pekerjaan` VALUES (4, 'PENSIUNAN');
INSERT INTO `pekerjaan` VALUES (5, 'PEGAWAI NEGERI SIPIL (PNS)');
INSERT INTO `pekerjaan` VALUES (6, 'TENTARA NASIONAL INDONESIA (TNI)');
INSERT INTO `pekerjaan` VALUES (7, 'KEPOLISIAN RI');
INSERT INTO `pekerjaan` VALUES (8, 'PERDAGANGAN');
INSERT INTO `pekerjaan` VALUES (9, 'PETANI/PEKEBUN');
INSERT INTO `pekerjaan` VALUES (10, 'PETERNAK');
INSERT INTO `pekerjaan` VALUES (11, 'NELAYAN/PERIKANAN');
INSERT INTO `pekerjaan` VALUES (12, 'INDUSTRI');
INSERT INTO `pekerjaan` VALUES (13, 'KONSTRUKSI');
INSERT INTO `pekerjaan` VALUES (14, 'TRANSPORTASI');
INSERT INTO `pekerjaan` VALUES (15, 'KARYAWAN SWASTA');
INSERT INTO `pekerjaan` VALUES (16, 'KARYAWAN BUMN');
INSERT INTO `pekerjaan` VALUES (17, 'KARYAWAN BUMD');
INSERT INTO `pekerjaan` VALUES (18, 'KARYAWAN HONORER');
INSERT INTO `pekerjaan` VALUES (19, 'BURUH HARIAN LEPAS');
INSERT INTO `pekerjaan` VALUES (20, 'BURUH TANI/PERKEBUNAN');
INSERT INTO `pekerjaan` VALUES (21, 'BURUH NELAYAN/PERIKANAN');
INSERT INTO `pekerjaan` VALUES (22, 'BURUH PETERNAKAN');
INSERT INTO `pekerjaan` VALUES (23, 'PEMBANTU RUMAH TANGGA');
INSERT INTO `pekerjaan` VALUES (24, 'TUKANG CUKUR');
INSERT INTO `pekerjaan` VALUES (25, 'TUKANG LISTRIK');
INSERT INTO `pekerjaan` VALUES (26, 'TUKANG BATU');
INSERT INTO `pekerjaan` VALUES (27, 'TUKANG KAYU');
INSERT INTO `pekerjaan` VALUES (28, 'TUKANG SOL SEPATU');
INSERT INTO `pekerjaan` VALUES (29, 'TUKANG LAS/PANDAI BESI');
INSERT INTO `pekerjaan` VALUES (30, 'TUKANG JAHIT');
INSERT INTO `pekerjaan` VALUES (31, 'TUKANG GIGI');
INSERT INTO `pekerjaan` VALUES (32, 'PENATA RIAS');
INSERT INTO `pekerjaan` VALUES (33, 'PENATA BUSANA');
INSERT INTO `pekerjaan` VALUES (34, 'PENATA RAMBUT');
INSERT INTO `pekerjaan` VALUES (35, 'MEKANIK');
INSERT INTO `pekerjaan` VALUES (36, 'SENIMAN');
INSERT INTO `pekerjaan` VALUES (37, 'TABIB');
INSERT INTO `pekerjaan` VALUES (38, 'PARAJI');
INSERT INTO `pekerjaan` VALUES (39, 'PERANCANG BUSANA');
INSERT INTO `pekerjaan` VALUES (40, 'PENTERJEMAH');
INSERT INTO `pekerjaan` VALUES (41, 'IMAM MESJID');
INSERT INTO `pekerjaan` VALUES (42, 'PENDETA');
INSERT INTO `pekerjaan` VALUES (43, 'PASTOR');
INSERT INTO `pekerjaan` VALUES (44, 'WARTAWAN');
INSERT INTO `pekerjaan` VALUES (45, 'USTADZ/MUBALIGH');
INSERT INTO `pekerjaan` VALUES (46, 'JURU MASAK');
INSERT INTO `pekerjaan` VALUES (47, 'PROMOTOR ACARA');
INSERT INTO `pekerjaan` VALUES (48, 'ANGGOTA DPR-RI');
INSERT INTO `pekerjaan` VALUES (49, 'ANGGOTA DPD');
INSERT INTO `pekerjaan` VALUES (50, 'ANGGOTA BPK');
INSERT INTO `pekerjaan` VALUES (51, 'PRESIDEN');
INSERT INTO `pekerjaan` VALUES (52, 'WAKIL PRESIDEN');
INSERT INTO `pekerjaan` VALUES (53, 'ANGGOTA MAHKAMAH KONSTITUSI');
INSERT INTO `pekerjaan` VALUES (54, 'ANGGOTA KABINET/KEMENTERIAN');
INSERT INTO `pekerjaan` VALUES (55, 'DUTA BESAR');
INSERT INTO `pekerjaan` VALUES (56, 'GUBERNUR');
INSERT INTO `pekerjaan` VALUES (57, 'WAKIL GUBERNUR');
INSERT INTO `pekerjaan` VALUES (58, 'BUPATI');
INSERT INTO `pekerjaan` VALUES (59, 'WAKIL BUPATI');
INSERT INTO `pekerjaan` VALUES (60, 'WALIKOTA');
INSERT INTO `pekerjaan` VALUES (61, 'WAKIL WALIKOTA');
INSERT INTO `pekerjaan` VALUES (62, 'ANGGOTA DPRD PROVINSI');
INSERT INTO `pekerjaan` VALUES (63, 'ANGGOTA DPRD KABUPATEN/KOTA');
INSERT INTO `pekerjaan` VALUES (64, 'DOSEN');
INSERT INTO `pekerjaan` VALUES (65, 'GURU');
INSERT INTO `pekerjaan` VALUES (66, 'PILOT');
INSERT INTO `pekerjaan` VALUES (67, 'PENGACARA');
INSERT INTO `pekerjaan` VALUES (68, 'NOTARIS');
INSERT INTO `pekerjaan` VALUES (69, 'ARSITEK');
INSERT INTO `pekerjaan` VALUES (70, 'AKUNTAN');
INSERT INTO `pekerjaan` VALUES (71, 'KONSULTAN');
INSERT INTO `pekerjaan` VALUES (72, 'DOKTER');
INSERT INTO `pekerjaan` VALUES (73, 'BIDAN');
INSERT INTO `pekerjaan` VALUES (74, 'PERAWAT');
INSERT INTO `pekerjaan` VALUES (75, 'APOTEKER');
INSERT INTO `pekerjaan` VALUES (76, 'PSIKIATER/PSIKOLOG');
INSERT INTO `pekerjaan` VALUES (77, 'PENYIAR TELEVISI');
INSERT INTO `pekerjaan` VALUES (78, 'PENYIAR RADIO');
INSERT INTO `pekerjaan` VALUES (79, 'PELAUT');
INSERT INTO `pekerjaan` VALUES (80, 'PENELITI');
INSERT INTO `pekerjaan` VALUES (81, 'SOPIR');
INSERT INTO `pekerjaan` VALUES (82, 'PIALANG');
INSERT INTO `pekerjaan` VALUES (83, 'PARANORMAL');
INSERT INTO `pekerjaan` VALUES (84, 'PEDAGANG');
INSERT INTO `pekerjaan` VALUES (85, 'PERANGKAT DESA');
INSERT INTO `pekerjaan` VALUES (86, 'KEPALA DESA');
INSERT INTO `pekerjaan` VALUES (87, 'BIARAWATI');
INSERT INTO `pekerjaan` VALUES (88, 'WIRASWASTA');
INSERT INTO `pekerjaan` VALUES (89, 'LAINNYA');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_user` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email_user` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telp_user` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `level_id` int(11) NOT NULL,
  `status_user` int(5) NOT NULL COMMENT '1=Aktif, 0=Non Aktif',
  PRIMARY KEY (`id_user`) USING BTREE,
  INDEX `fk_user_1`(`level_id`) USING BTREE,
  CONSTRAINT `fk_user_1` FOREIGN KEY (`level_id`) REFERENCES `user_level` (`level_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Indra Riksa', 'indra@riksa.com', '081212124264', 1, 1);
INSERT INTO `user` VALUES (2, 'asep', 'dc855efb0dc7476760afaa1b281665f1', 'Asep Pamungkas', 'ujang@kasep.com', '081213444900', 2, 1);
INSERT INTO `user` VALUES (3, 'fadilfrds', '8d90d3b4702c9df2567603dfb1c26978', 'Fadillah Firdaus', 'fadilfrds@gmail.com', '089609038966', 1, 1);
INSERT INTO `user` VALUES (4, 'salah', '2a07e3ff3df21b226d0cd044d4a7cc83', 'Salah Benerudin', 'salah.b@gmail.com', '081222188976', 3, 1);

-- ----------------------------
-- Table structure for user_level
-- ----------------------------
DROP TABLE IF EXISTS `user_level`;
CREATE TABLE `user_level`  (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `deskripsi_level` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`level_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_level
-- ----------------------------
INSERT INTO `user_level` VALUES (1, 'Admin', 'Super Admin');
INSERT INTO `user_level` VALUES (2, 'CS', 'Customer Service');
INSERT INTO `user_level` VALUES (3, 'ADM', 'Admin');

SET FOREIGN_KEY_CHECKS = 1;
