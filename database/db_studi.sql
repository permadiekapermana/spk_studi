-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2020 at 08:22 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_studi`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_admin`
--

CREATE TABLE `mst_admin` (
  `username` varchar(50) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_admin`
--

INSERT INTO `mst_admin` (`username`, `pass`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `mst_knowledge`
--

CREATE TABLE `mst_knowledge` (
  `id_knowledge` varchar(11) NOT NULL,
  `jurusan_know` varchar(35) NOT NULL,
  `NLsub1_know` varchar(11) NOT NULL,
  `NLsub2_know` varchar(11) NOT NULL,
  `NLsub3_know` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_knowledge`
--

INSERT INTO `mst_knowledge` (`id_knowledge`, `jurusan_know`, `NLsub1_know`, `NLsub2_know`, `NLsub3_know`) VALUES
('KNOW.000001', 'Bahasa', 'TEST.000008', 'TEST.000007', 'TEST.000001'),
('KNOW.000002', 'Sains Pendidikan', 'TEST.000002', 'TEST.000003', 'TEST.000001'),
('KNOW.000003', 'Sains Terapan', 'TEST.000003', 'TEST.000002', 'TEST.000004'),
('KNOW.000004', 'Administrasi dan Manajemen', 'TEST.000001', 'TEST.000002', 'TEST.000004'),
('KNOW.000005', 'Kedokteran', 'TEST.000001', 'TEST.000002', 'TEST.000003'),
('KNOW.000006', 'Mesin, Elektro, dan Informatika', 'TEST.000002', 'TEST.000003', 'TEST.000005'),
('KNOW.000007', 'Psikologi dan Fisip', 'TEST.000003', 'TEST.000007', 'TEST.000001'),
('KNOW.000008', 'Arsitek dan Animasi', 'TEST.000002', 'TEST.000003', 'TEST.000006');

-- --------------------------------------------------------

--
-- Table structure for table `mst_question`
--

CREATE TABLE `mst_question` (
  `que_id` varchar(11) NOT NULL,
  `test_id` varchar(11) DEFAULT NULL,
  `que_desc` varchar(150) DEFAULT NULL,
  `ans1` varchar(75) DEFAULT NULL,
  `ans2` varchar(75) DEFAULT NULL,
  `ans3` varchar(75) DEFAULT NULL,
  `ans4` varchar(75) DEFAULT NULL,
  `true_ans` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_question`
--

INSERT INTO `mst_question` (`que_id`, `test_id`, `que_desc`, `ans1`, `ans2`, `ans3`, `ans4`, `true_ans`) VALUES
('QUES.000001', 'TEST.000001', '[Soal Sinonim 1-5] Kuliner = ', 'Mantap', 'Jalan-jalan', 'Santai', 'Masakan', '4'),
('QUES.000002', 'TEST.000001', 'Ekstensi = ', 'Perluasan', 'Penggabungan', 'Pendidikan', 'Kelembagaan', '1'),
('QUES.000003', 'TEST.000001', 'Tentatif = ', 'Pasti', 'Belum pasti', 'Niscaya', 'Kekal', '2'),
('QUES.000004', 'TEST.000001', 'Kontemporer = ', 'Aneh', 'Kuno', 'Pada masa kini', 'Abstrak', '3'),
('QUES.000005', 'TEST.000001', 'Rabat =', 'Jera', 'Keuntungan', 'Potongan', 'Pembayaran', '3'),
('QUES.000006', 'TEST.000001', '[Soal Antonim 6-10] Remisi ><', 'Pengurangan', 'Penambahan', 'Penetapan', 'Pembetulan', '2'),
('QUES.000007', 'TEST.000001', 'Ambigu >< ', 'Tidak jelas', 'Terang', 'Samar-samar', 'Kabur', '2'),
('QUES.000008', 'TEST.000001', 'Mufakat >< ', 'Kompromi', 'Berunding', 'Musyawarah', 'Tidak setuju', '4'),
('QUES.000009', 'TEST.000001', 'Nomaden >< ', 'Menetap', 'Mapan', 'Sesuai Norma', 'Reposisi', '1'),
('QUES.000010', 'TEST.000001', 'Mandiri >< ', 'Senang', 'Tenggang Rasa', 'Bergantung', 'Antipati', '3'),
('QUES.000011', 'TEST.000001', '[Soal Analogi 11-15] Knot : Kecepatan | | ', 'Meter : Panjang', 'Pohon : Buah', 'Pipa : Asap', 'Kapal : Pelabuhan', '1'),
('QUES.000012', 'TEST.000001', 'Panggung : Aktor | | ', 'Perpustakaan : Dosen', 'Keamanan : Polisi', 'Ring : Petinju', 'Bengkel : Motor', '3'),
('QUES.000013', 'TEST.000001', 'Tablet : Obat | | ', 'Pasir : Batu', 'Koin : Logam', 'Emas : Cincin', 'Kertas : Buku', '2'),
('QUES.000014', 'TEST.000001', 'Kuman : Penyakit | | ', 'Ayam : Telur', 'Ayah : Anak', 'Kapur : Guru', 'Api : Kebakaran', '4'),
('QUES.000015', 'TEST.000001', 'Kulit : Raba | | ', 'Hidung : Isap', 'Beras : Padi', 'Obat : Batuk', 'Telinga : Dengar', '4'),
('QUES.000016', 'TEST.000001', '[Soal Acak Kata 16-20] Kaki    [ . . . . ]    Kanan', 'Tangan', 'Alas', 'Kiri', 'Langit', '1'),
('QUES.000017', 'TEST.000001', 'Tangan    [ . . . . ]    Tua', 'Kanan', 'Kiri', 'Besi', 'Panjang', '3'),
('QUES.000018', 'TEST.000001', 'Kutu    [ . . . . ]    Harian', 'Kanan', 'Kiri', 'Panjang', 'Buku', '4'),
('QUES.000019', 'TEST.000001', 'TERLELAP [LATAR] RANJANG, MELOTOT [ . . . . ] MONITOR', 'TOMAR', 'LOTOR', 'TOMOM', 'TONOS', '3'),
('QUES.000020', 'TEST.000001', 'DUNIA [DABON] BONEKA, SERDADU [ . . . . ] TERLAMBAT', 'SUTER', 'SULAM', 'SERAM', 'SABAT', '1'),
('QUES.000021', 'TEST.000002', '4, 12, 28, 60, 124, 252,', '504', '508', '512', '516', '2'),
('QUES.000022', 'TEST.000002', '½, 1, 1, 3, 9, 13, 65, 71, ', '378', '492', '497', '515', '3'),
('QUES.000023', 'TEST.000002', '4, 5, 11, 13, 25, 29, 46,', '49', '51', '52', '53', '4'),
('QUES.000024', 'TEST.000002', '5, 8, 13, 21, 34, 55, 89, 144,', '213', '223', '233', '243', '3'),
('QUES.000025', 'TEST.000002', '0.25, 5/8, 1, 1,375,', '1 3/4', '15/8', '2', '2.375', '1'),
('QUES.000026', 'TEST.000002', '6, 11, 21, ..., 81, 9, 14, 24, 44, ...', '31 dan 64', '36 dan 74', '41 dan 84', '46 dan 94', '3'),
('QUES.000027', 'TEST.000002', '3, 6, 6, 10, 10, 14, 15, ', '17', '18', '19', '20', '2'),
('QUES.000028', 'TEST.000002', '17, 25, 42, 67, 109, 176, ', '255', '265', '275', '285', '4'),
('QUES.000029', 'TEST.000002', '168, 161, 164, 82, 75, 78, 39, 32, ', '25', '28', '35', '70', '3'),
('QUES.000030', 'TEST.000002', '5, 11, 23, 47, ..., 191, 383, 767, 1535', '120', '105', '95', '85', '3'),
('QUES.000031', 'TEST.000002', '1, 9, 25, 49,', '70', '72', '76', '81', '4'),
('QUES.000032', 'TEST.000002', '21,4; ...; 17,4; 4,5; 13,4; 7,5; ...; 11,5.', '5,4 dan 9,4', '2,5 dan 9,4', '5,4 dan 5,5', '6,5 dan 7,4', '2'),
('QUES.000033', 'TEST.000002', '2, 4, 8, 14, 14, 24, 20, ', '34', '44', '54', '64', '1'),
('QUES.000034', 'TEST.000002', '1, 2, 4, 6, 7, 10, ', '13', '12', '11', '15', '1'),
('QUES.000035', 'TEST.000002', '2, 2, 4, 6, 10, ', '14', '15', '16', '17', '3'),
('QUES.000036', 'TEST.000002', '1, 5, 6, 11, 17, 28, ', '46', '45', '55', '65', '2'),
('QUES.000037', 'TEST.000002', '10, 20, 25, 35, 40, ..., 55', '50', '60', '55', '65', '1'),
('QUES.000038', 'TEST.000002', '2, 4, 12, 48, 240, ', '1500', '1640', '1440', '1444', '3'),
('QUES.000039', 'TEST.000002', '3, 9, 18, 54, 108, ..., 648', '344', '600', '348', '324', '4'),
('QUES.000040', 'TEST.000002', '60, 30, 90, 45, 135, ..., 202.5', '125.5', '150', '67.5', '70.5', '3'),
('QUES.000041', 'TEST.000003', 'x', 'x', 'x', 'x', 'x', '1'),
('QUES.000042', 'TEST.000003', 'x', 'x', 'x', 'x', 'x', '2'),
('QUES.000043', 'TEST.000003', 'x', 'x', 'x', 'x', 'x', '3'),
('QUES.000044', 'TEST.000003', 'x', 'x', 'x', 'x', 'x', '4'),
('QUES.000045', 'TEST.000003', 'x', 'x', 'x', 'x', 'x', '1'),
('QUES.000046', 'TEST.000003', 'x', 'x', 'x', 'x', 'x', '2'),
('QUES.000047', 'TEST.000003', 'x', 'x', 'x', 'x', 'x', '3'),
('QUES.000048', 'TEST.000003', 'x', 'x', 'x', 'x', 'x', '4'),
('QUES.000049', 'TEST.000003', 'x', 'x', 'x', 'x', 'x', '1'),
('QUES.000050', 'TEST.000003', 'x', 'x', 'x', 'x', 'x', '2'),
('QUES.000051', 'TEST.000003', 'x', 'x', 'x', 'x', 'x', '3'),
('QUES.000052', 'TEST.000003', 'x', 'x', 'x', 'x', 'x', '4'),
('QUES.000053', 'TEST.000003', 'x', 'x', 'x', 'x', 'x', '1'),
('QUES.000054', 'TEST.000003', 'x', 'x', 'x', 'x', 'x', '2'),
('QUES.000055', 'TEST.000003', 'x', 'x', 'x', 'x', 'x', '3'),
('QUES.000056', 'TEST.000003', 'x', 'x', 'x', 'x', 'x', '4'),
('QUES.000057', 'TEST.000003', 'x', 'x', 'x', 'x', 'x', '1'),
('QUES.000058', 'TEST.000003', 'x', 'x', 'x', 'x', 'x', '2'),
('QUES.000059', 'TEST.000003', 'x', 'x', 'x', 'x', 'x', '3'),
('QUES.000060', 'TEST.000003', 'x', 'x', 'x', 'x', 'x', '4'),
('QUES.000061', 'TEST.000004', '', 'achomphlista', 'achomphlista', 'achomphlista', 'achomplista', '4'),
('QUES.000062', 'TEST.000004', '', 'triatmaja', 'triatmadja', 'triatmadja', 'triatmadja', '1'),
('QUES.000063', 'TEST.000004', '', 'hadikusuma', 'hadikusuma', 'habikusuma', 'hadikusuma', '3'),
('QUES.000064', 'TEST.000004', '', 'struktur', 'struktur', 'straktur', 'struktur', '3'),
('QUES.000065', 'TEST.000004', '', 'weather', 'weather', 'weather', 'weathers', '4'),
('QUES.000066', 'TEST.000004', '', 'kembalikan', 'kembalikan', 'kembaliken', 'kembalikan', '3'),
('QUES.000067', 'TEST.000004', '', 'champion', 'champion', 'champion', 'champione', '4'),
('QUES.000068', 'TEST.000004', '', 'puncutasion', 'puncutation', 'puncutation', 'puncutation', '1'),
('QUES.000069', 'TEST.000004', '', 'progresif', 'progresif', 'progrecif', 'progresif', '3'),
('QUES.000070', 'TEST.000004', '', 'intensifies', 'intensifies', 'intensifies', 'intensiflies', '4'),
('QUES.000071', 'TEST.000004', '', 'klarifikasi', 'klarrifikasi', 'klarifikasi', 'klarifikasi', '2'),
('QUES.000072', 'TEST.000004', '', 'abcjdklm', 'abcjidklm', 'abcjdklm', 'abcjdklm', '2'),
('QUES.000073', 'TEST.000004', '', 'pertarugan', 'pertarungan', 'pertarungan', 'pertarungan', '1'),
('QUES.000074', 'TEST.000004', '', '34hj495kj273', '34hj495kj273', '34hj495kj273', '34kj495kj273', '4'),
('QUES.000075', 'TEST.000004', '', 'iregular', 'iregular', 'irregular', 'iregular', '3'),
('QUES.000076', 'TEST.000004', '', 'interpretasi', 'interpretasi', 'interpretasi', 'interprestasi', '4'),
('QUES.000077', 'TEST.000004', '', '19754e54we', '19754e54we', '19754e54w', '19754e54we', '3'),
('QUES.000078', 'TEST.000004', '', '01824645i5e', '0182464515e ', '0182464515e ', '0182464515e ', '1'),
('QUES.000079', 'TEST.000004', '', 'bx1578input', 'bx1578Input', 'bx1578input', 'bx1578input', '2'),
('QUES.000080', 'TEST.000004', '', '82945315ax', '82945315ax', '82945315ax', '82945375ax', '4'),
('QUES.000081', 'TEST.000005', 'x', 'x', 'x', 'x', 'x', '1'),
('QUES.000082', 'TEST.000005', 'x', 'x', 'x', 'x', 'x', '2'),
('QUES.000083', 'TEST.000005', 'x', 'x', 'x', 'x', 'x', '3'),
('QUES.000084', 'TEST.000005', 'x', 'x', 'x', 'x', 'x', '4'),
('QUES.000085', 'TEST.000005', 'x', 'x', 'x', 'x', 'x', '1'),
('QUES.000086', 'TEST.000005', 'x', 'x', 'x', 'x', 'x', '2'),
('QUES.000087', 'TEST.000005', 'x', 'x', 'x', 'x', 'x', '3'),
('QUES.000088', 'TEST.000005', 'x', 'x', 'x', 'x', 'x', '4'),
('QUES.000089', 'TEST.000005', 'x', 'x', 'x', 'x', 'x', '1'),
('QUES.000090', 'TEST.000005', 'x', 'x', 'x', 'x', 'x', '2'),
('QUES.000091', 'TEST.000005', 'x', 'x', 'x', 'x', 'x', '3'),
('QUES.000092', 'TEST.000005', 'x', 'x', 'x', 'x', 'x', '4'),
('QUES.000093', 'TEST.000005', 'x', 'x', 'x', 'x', 'x', '1'),
('QUES.000094', 'TEST.000005', 'x', 'x', 'x', 'x', 'x', '2'),
('QUES.000095', 'TEST.000005', 'x', 'x', 'x', 'x', 'x', '3'),
('QUES.000096', 'TEST.000005', 'x', 'x', 'x', 'x', 'x', '4'),
('QUES.000097', 'TEST.000005', 'x', 'x', 'x', 'x', 'x', '1'),
('QUES.000098', 'TEST.000005', 'x', 'x', 'x', 'x', 'x', '2'),
('QUES.000099', 'TEST.000005', 'x', 'x', 'x', 'x', 'x', '3'),
('QUES.000100', 'TEST.000005', 'x', 'x', 'x', 'x', 'x', '4'),
('QUES.000101', 'TEST.000006', 'x', 'x', 'x', 'x', 'x', '1'),
('QUES.000102', 'TEST.000006', 'x', 'x', 'x', 'x', 'x', '2'),
('QUES.000103', 'TEST.000006', 'x', 'x', 'x', 'x', 'x', '3'),
('QUES.000104', 'TEST.000006', 'x', 'x', 'x', 'x', 'x', '4'),
('QUES.000105', 'TEST.000006', 'x', 'x', 'x', 'x', 'x', '1'),
('QUES.000106', 'TEST.000006', 'x', 'x', 'x', 'x', 'x', '2'),
('QUES.000107', 'TEST.000006', 'x', 'x', 'x', 'x', 'x', '3'),
('QUES.000108', 'TEST.000006', 'x', 'x', 'x', 'x', 'x', '4'),
('QUES.000109', 'TEST.000006', 'x', 'x', 'x', 'x', 'x', '1'),
('QUES.000110', 'TEST.000006', 'x', 'x', 'x', 'x', 'x', '2'),
('QUES.000111', 'TEST.000006', 'x', 'x', 'x', 'x', 'x', '3'),
('QUES.000112', 'TEST.000006', 'x', 'x', 'x', 'x', 'x', '4'),
('QUES.000113', 'TEST.000006', 'x', 'x', 'x', 'x', 'x', '1'),
('QUES.000114', 'TEST.000006', 'x', 'x', 'x', 'x', 'x', '2'),
('QUES.000115', 'TEST.000006', 'x', 'x', 'x', 'x', 'x', '3'),
('QUES.000116', 'TEST.000006', 'x', 'x', 'x', 'x', 'x', '4'),
('QUES.000117', 'TEST.000006', 'x', 'x', 'x', 'x', 'x', '1'),
('QUES.000118', 'TEST.000006', 'x', 'x', 'x', 'x', 'x', '2'),
('QUES.000119', 'TEST.000006', 'x', 'x', 'x', 'x', 'x', '3'),
('QUES.000120', 'TEST.000006', 'x', 'x', 'x', 'x', 'x', '4'),
('QUES.000121', 'TEST.000007', 'Kata yang ejaannya salah adalah', 'Absorsi', 'Aerobik', 'Aerofon', 'Alternatif', '1'),
('QUES.000122', 'TEST.000007', 'Kata yang ejaannya salah adalah', 'Amendemen', 'Amputasi', 'Analisis', 'Atmosfir', '4'),
('QUES.000123', 'TEST.000007', 'Kata yang ejaannya salah adalah', 'Atlet', 'Autentik', 'Adzan', 'Bagasi', '3'),
('QUES.000124', 'TEST.000007', 'Kata yang ejaannya salah adalah', 'Praktik', 'Resiko', 'Antre', 'Nasihat', '2'),
('QUES.000125', 'TEST.000007', 'Kata yang ejaannya salah adalah', 'Bujet', 'Bungalo', 'Cidera', 'Dahsyat', '3'),
('QUES.000126', 'TEST.000007', 'Kata yang ejaannya salah adalah', 'Dekret', 'Definisi', 'Desain', 'Deterjen', '4'),
('QUES.000127', 'TEST.000007', 'Kata yang ejaannya salah adalah', 'Disertasi', 'Eksport', 'Ekstensif', 'Ekspedisi', '2'),
('QUES.000128', 'TEST.000007', 'Kata yang ejaannya salah adalah', 'Ekstrim', 'Ekuivalen', 'Elite', 'Energi', '1'),
('QUES.000129', 'TEST.000007', 'Kata yang ejaannya salah adalah', 'Februari', 'Fleksibel', 'Frustasi', 'Frekuensi', '3'),
('QUES.000130', 'TEST.000007', 'Kata yang ejaannya salah adalah', 'Ikhwal', 'Ikhlas', 'Instrumen', 'Jenazah', '1'),
('QUES.000131', 'TEST.000007', 'Kata yang ejaannya salah adalah', 'Interogasi', 'Imaginasi', 'Kanker', 'Kayangan', '2'),
('QUES.000132', 'TEST.000007', 'Kata yang ejaannya salah adalah', 'Karier', 'Kharisma', 'Hierarki', 'Lembap', '2'),
('QUES.000133', 'TEST.000007', 'Kata yang ejaannya salah adalah', 'Nakhoda', 'Hipotesa', 'Kompleks', 'Mantra', '2'),
('QUES.000134', 'TEST.000007', 'Kata yang ejaannya salah adalah', 'Katolik', 'Otobiografi', 'Perangko', 'Rezeki', '3'),
('QUES.000135', 'TEST.000007', 'Kata yang ejaannya salah adalah', 'Syahdu', 'Sistem', 'Zaman', 'Omzet', '1'),
('QUES.000136', 'TEST.000007', 'Kata yang ejaannya salah adalah', 'Keraton', 'Dhuhur', 'Ventilasi', 'Rapor', '2'),
('QUES.000137', 'TEST.000007', 'Kata yang ejaannya salah adalah', 'Khazanah', 'Utang', 'Refleks', 'Faksinasi', '4'),
('QUES.000138', 'TEST.000007', 'Kata yang ejaannya salah adalah', 'Terampil', 'Sekadar', 'Sketsa', 'Ustadz', '4'),
('QUES.000139', 'TEST.000007', 'Kata yang ejaannya salah adalah', 'Sintesa', 'Khalayak', 'Subjek', 'Vital', '1'),
('QUES.000140', 'TEST.000007', 'Kata yang ejaannya salah adalah', 'Survei', 'Taxi', 'Teoretis', 'Relaks', '2'),
('QUES.000141', 'TEST.000008', 'Proses afikasi yang tidak sesuai dengan kaidah tata bahasa terdapat pada kata ....', 'petenis', 'pesuruh', 'pendatang', 'pembom', '4'),
('QUES.000142', 'TEST.000008', 'Kata benda perawat diturunkan dari kata kerja merawat.\r\nKata benda yang diturunkan berdasarkan pola di atas adalah ....', 'pembantu, perusak, pengacau', 'petatar, pesuluh, pesuruh', 'pedagang, pekerja, pesilat', 'pembangkang, petani, penatar', '3'),
('QUES.000143', 'TEST.000008', 'Penggunaan imbuhan pe-an pada kata bercetak miring dalam kalimat berikut yang tepat adalah ....', 'permasalahan itu masih dalam pemprosesan di tingkat pusat', 'pengklasifikasian masalah ini akan segera selesai', 'kita semua harus mendukung program pensuksesan wajar 9 tahun', 'tindakan pemboman tempat pemukiman penduduk sipil tidak dapat dibenarkan', '2'),
('QUES.000144', 'TEST.000008', 'Bukan harta benda, melainkan kesengsaraan yang diwariskan kepada anak cucunya.\r\nMakna ke-an pada kata kesengsaraan pada kalimat di atas tidak sama den', 'musibah yang berturut-turut menyebabkan kesusahan yang berkepanjangan bagi ', 'kecemasan yang diungkapkannya itu tidak beralasan', 'rumah kemasukan pencuri', 'penyebab kecelakaan itu masih dalam penyelidikan', '3'),
('QUES.000145', 'TEST.000008', 'Bentuk -nya yang berfungsi sebagai pembentuk kata benda terdapat dalam kalimat ....', 'rupanya hari ini akan turun hujan', 'Ayah menitipkan uang itu kepadanya', 'rumahnya sedang diperbaiki', 'indahnya Pantai Kuta menarik wisatawan', '4'),
('QUES.000146', 'TEST.000008', 'Kedatangan tamu disambut dengan upacara adat. Kalimat di atas sama dengan fungsi -nya dalam kalimat ....', 'buku itu berjudul Lahirnya Pancasila', 'ia menyanyi dengan sangat merdunya', 'rumahnya dicat dengan warna putih', 'rupanya dia tidak mengerti maksud saya', '1'),
('QUES.000147', 'TEST.000008', 'â€œSaya tidak tahu pukul berapa akan tiba, tetapi sedapat mungkin tidak terlambat,â€ kata Mila kepadaku.\r\nMakna kata sedapat dalam kalimat di atas sa', 'setahuku, ia tidak begitu suka mendengarkan musik klasik', 'orang sekampung sudah mengetahui dia yang membunuh sopir taksi itu', 'para relawan langsung sibuk bekerja setibanya di Banda Aceh', 'saya mencari anjingku yang hilang di segenap penjuru', '1'),
('QUES.000148', 'TEST.000008', 'Kita tidak ... beratnya sanksi bagi pelanggar ... lalu lintas karena hal itu ... bukan merupakan sumber masalah.\r\nKata yang tepat untuk melengkapi bag', 'dipersoalkan, pengaturan, pembenarannya', 'mempersoalkan, peraturan, sebenarnya', 'dipersoalkan, peraturan, sebenar-benarnya ', 'mempersoali, peraturan, dibenarannya', '2'),
('QUES.000149', 'TEST.000008', 'Kata berlatih dalam kalimat Mereka sedang berlatih untuk mempersiapkan pertandingan tandang mempunyai makna yang sama dengan kata dalam kalimat ....', 'ia berhasil masuk perguruan tinggi yang dicita-citakan karena kerja kerasny', 'mereka berjalan bersama beriring-iringan menelusuri jalan setapak untuk men', 'jika tidak bermaksud seperti itu, mengapa pula meraka berkata seperti itu', 'saya berterima kasih kepada kalian karena telah membantu saya dengan sunggu', '2'),
('QUES.000150', 'TEST.000008', 'Pembentukan kata benda dengan konfiks per-an yang maknanya berkaitan dengan kata kerja berawalan ber- adalah ....', 'perjanjian, perjalanan, permintaan', 'perpindahan, perjuangan, pergerakan', 'perjalanan, pertemuan, perkalian', 'perlawanan, permintaan, perjalanan', '2'),
('QUES.000151', 'TEST.000008', 'Banyak orang Jawa yang bermukim di daerah imigrasi, khususnya di daerah Kalimantan. Lahan pertanian di wilayah ... mereka sangat subur.\r\n\r\nKata yang t', 'pemukiman', 'permukiman', 'bermukimnya', 'mukiman', '2'),
('QUES.000152', 'TEST.000008', 'Makna imbuhan pe-an dan ke-an yang menyatakan tempat pada kalimat ....', 'pemakaman jenazah itu akan dilakukan besok dan diberangkatkan dari keluraha', 'pemandangan di pantai itu menimbulkan keindahan yang hakiki', 'pemandian umum di seluruh kecamatan Cililin akan diperbaiki', 'penculikan para aktivis itu disertai dengan kekerasan', '3'),
('QUES.000153', 'TEST.000008', 'Pemakaian awalan me- yang menyatakan makna menyerupai terdapat dalam kalimat ....', 'kita harus menghargai sesama teman', 'manusia menyemut di lapangan, menyaksikan pertunjukan itu', 'adat itu sudah mendarah daging baginya', 'sebagai seorang nelayan, pekerjaannya melaut', '2'),
('QUES.000154', 'TEST.000008', 'Akhiran â€“i pada kata mengelilingi dalam kalimat Setiap Minggu pagi saya mengelilingi Mesjid dengan berjalan sama dengan akhiran â€“i pada kalimat ..', 'seorang ibu yang bijak harus mau menyusui anaknya', 'polisi memasuki sarang penyamun dengan senjata api', 'sering kita temukan pelajar yang tidak menghormati gurunya', 'dia pantang menyakiti hewan piaraannya', '2'),
('QUES.000155', 'TEST.000008', 'Pemakaian akhiran â€“an yang tidak benar terdapat dalam kalimat ....', 'simpulan yang diambilnya kurang tepat', 'semua barang sediaan sudah habis terjual', 'soal-soal latihan yang diberikannya terlalu mudah bagi saya', 'pimpinan perusahaan itu harus segera diganti', '4'),
('QUES.000156', 'TEST.000008', 'Pemakaian bentuk kata yang mempunyai pertalian makna yang benar terdapat dalam kalimat ....', 'petani itu bertani di ladang pertanian yang kurang baik', 'pemersatu berusaha mempersatuan bangsa Indonesia sehingga terjadi kesatuan ', 'dia mengubah sistem yang ada agar terjadi perubahan yang diharapkan', 'dia memasukkan siswa sebanyak mungkin, tetapi pemasukannya kurang berkualit', '1'),
('QUES.000157', 'TEST.000008', 'Pemakaian kata ulang yang benar terdapat dalam kalimat ....', 'gedung tinggi-tinggi memagari jalan-jalan di kota besar', 'sungguh banyak pemuda-pemuda yang sudah tercerabut dari akar budaya Indones', 'rumah sakit-rumah sakit penuh dijejali korban bencana alam yang terjadi bar', 'kami akan datang sekali-kali ke rumah mu', '3'),
('QUES.000158', 'TEST.000008', 'Penggunaan kata ulang dalam kalimat berikut yang menunjukkan makna intensitas adalah ....', 'â€œTenang, sebentar lagi mereka datang!â€ katanya sambil mengetuk-ngetukka', 'janganlah sekali-kali kamu datang ke rumahku', 'di sana anak-anak bermain-main sepuas hatinya', 'sesama warga kita harus selalu hormat menghormati', '1'),
('QUES.000159', 'TEST.000008', 'Si Gilang itu, kecil-kecil sudah kuat mendaki Gunung Bromo.\r\n\r\nKata ulang pada kalimat di atas semakna dengan kata ulang pada ....', 'tingkah laku Krisna kebelanda-belandaan', 'jauh-jauh kami tetap akan datang', 'dalam membangun rumah, mereka bahu-membahu', 'mereka dilarang untuk berteriak-teriak', '2'),
('QUES.000160', 'TEST.000008', 'Setelah 5 tahun di Eropa, cara bergaulnya kebarat-baratan. Karena sikapnya itu, teman-temannya mulai menjauhi dia.\r\n\r\nMakna perulangan pada kata kebar', 'buku-buku di perpustakaan disusun dengan rapi', 'mereka duduk berdekat-dekatan dalam ruangan itu', 'umurnya cukup dewasa, tetapi cara berpikirnya masih kekanak-kanakan', 'kedua orang itu saling bersalamsalaman di hadapan tamunya', '3');

-- --------------------------------------------------------

--
-- Table structure for table `mst_result`
--

CREATE TABLE `mst_result` (
  `id_result` varchar(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `test_id` varchar(11) DEFAULT NULL,
  `test_date` date DEFAULT NULL,
  `score` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_subject`
--

CREATE TABLE `mst_subject` (
  `sub_id` varchar(11) NOT NULL,
  `sub_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_subject`
--

INSERT INTO `mst_subject` (`sub_id`, `sub_name`) VALUES
('SUBJ.000001', 'Penalaran Verbal '),
('SUBJ.000002', 'Kemampuan Angka '),
('SUBJ.000003', 'Penalaran Abstrak '),
('SUBJ.000004', 'Kecepatan Klerikal '),
('SUBJ.000005', 'Penalaran Mekanikal '),
('SUBJ.000006', 'Relasi Ruang '),
('SUBJ.000007', 'Bahasa: Mengeja'),
('SUBJ.000008', 'Bahasa: Tata Bahasa');

-- --------------------------------------------------------

--
-- Table structure for table `mst_test`
--

CREATE TABLE `mst_test` (
  `test_id` varchar(11) NOT NULL,
  `sub_id` varchar(11) DEFAULT NULL,
  `test_name` varchar(30) DEFAULT NULL,
  `total_que` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_test`
--

INSERT INTO `mst_test` (`test_id`, `sub_id`, `test_name`, `total_que`) VALUES
('TEST.000001', 'SUBJ.000001', 'Tes Penalaran Verbal', '20'),
('TEST.000002', 'SUBJ.000002', 'Tes Kemampuan Angka', '20'),
('TEST.000003', 'SUBJ.000003', 'Tes Penalaran Abstrak', '20'),
('TEST.000004', 'SUBJ.000004', 'Tes Kecepatan Klerikal', '20'),
('TEST.000005', 'SUBJ.000005', 'Tes Penalaran Mekanikal', '20'),
('TEST.000006', 'SUBJ.000006', 'Tes Relasi Ruang', '20'),
('TEST.000007', 'SUBJ.000007', 'Tes Mengeja', '20'),
('TEST.000008', 'SUBJ.000008', 'Tes Tata Bahasa', '20');

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE `mst_user` (
  `username` varchar(50) NOT NULL,
  `pass` varchar(32) DEFAULT NULL,
  `nama_lengkap` varchar(30) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(15) DEFAULT NULL,
  `birth` date NOT NULL,
  `phone` int(12) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`username`, `pass`, `nama_lengkap`, `address`, `city`, `birth`, `phone`, `email`) VALUES
('firman', '74bfebec67d1a87b161e5cbcf6f72a4a', 'Firman Arr', 'Jl.Suka Rasa', 'Indonesia', '2020-01-01', 2147483647, 'Fir@man.com'),
('haidar96', '4402fbbafefac07aa24b61bd8b7cefc6', 'Haidar', 'Sumber', 'Cirebon', '2020-01-01', 878123987, 'haidar1996@yahoo.com'),
('pep', '0c36948d4a0ffc05ddc7b9f2f7918cbd', 'pep', 'pep', 'pep', '2020-01-01', 2147483647, 'permadiekapermana@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `mst_useranswer`
--

CREATE TABLE `mst_useranswer` (
  `sess_id` varchar(80) NOT NULL,
  `test_id` varchar(11) DEFAULT NULL,
  `que_des` varchar(200) DEFAULT NULL,
  `ans1` varchar(50) DEFAULT NULL,
  `ans2` varchar(50) DEFAULT NULL,
  `ans3` varchar(50) DEFAULT NULL,
  `ans4` varchar(50) DEFAULT NULL,
  `true_ans` int(11) DEFAULT NULL,
  `your_ans` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_valueakred`
--

CREATE TABLE `mst_valueakred` (
  `id_akre` varchar(11) NOT NULL,
  `id_knowledge` varchar(11) NOT NULL,
  `bawah_akre` int(3) NOT NULL,
  `tengah_akre` int(3) NOT NULL,
  `atas_akre` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_valueakred`
--

INSERT INTO `mst_valueakred` (`id_akre`, `id_knowledge`, `bawah_akre`, `tengah_akre`, `atas_akre`) VALUES
('AKRE.000001', 'KNOW.000001', 65, 75, 85),
('AKRE.000002', 'KNOW.000002', 65, 75, 85),
('AKRE.000003', 'KNOW.000003', 65, 75, 85),
('AKRE.000004', 'KNOW.000004', 65, 75, 85),
('AKRE.000005', 'KNOW.000005', 75, 85, 95),
('AKRE.000006', 'KNOW.000006', 65, 75, 85),
('AKRE.000007', 'KNOW.000007', 65, 75, 85),
('AKRE.000008', 'KNOW.000008', 65, 75, 85);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_admin`
--
ALTER TABLE `mst_admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `mst_knowledge`
--
ALTER TABLE `mst_knowledge`
  ADD PRIMARY KEY (`id_knowledge`),
  ADD KEY `NLsub1_know` (`NLsub1_know`),
  ADD KEY `NLsub2_know` (`NLsub2_know`),
  ADD KEY `NLsub3_know` (`NLsub3_know`);

--
-- Indexes for table `mst_question`
--
ALTER TABLE `mst_question`
  ADD PRIMARY KEY (`que_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `mst_result`
--
ALTER TABLE `mst_result`
  ADD PRIMARY KEY (`id_result`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `mst_subject`
--
ALTER TABLE `mst_subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `mst_test`
--
ALTER TABLE `mst_test`
  ADD PRIMARY KEY (`test_id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `mst_useranswer`
--
ALTER TABLE `mst_useranswer`
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `mst_valueakred`
--
ALTER TABLE `mst_valueakred`
  ADD PRIMARY KEY (`id_akre`),
  ADD KEY `id_knowledge` (`id_knowledge`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mst_knowledge`
--
ALTER TABLE `mst_knowledge`
  ADD CONSTRAINT `mst_knowledge_ibfk_1` FOREIGN KEY (`NLsub1_know`) REFERENCES `mst_test` (`test_id`),
  ADD CONSTRAINT `mst_knowledge_ibfk_2` FOREIGN KEY (`NLsub2_know`) REFERENCES `mst_test` (`test_id`),
  ADD CONSTRAINT `mst_knowledge_ibfk_3` FOREIGN KEY (`NLsub3_know`) REFERENCES `mst_test` (`test_id`);

--
-- Constraints for table `mst_question`
--
ALTER TABLE `mst_question`
  ADD CONSTRAINT `mst_question_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `mst_test` (`test_id`);

--
-- Constraints for table `mst_result`
--
ALTER TABLE `mst_result`
  ADD CONSTRAINT `mst_result_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `mst_test` (`test_id`),
  ADD CONSTRAINT `mst_result_ibfk_2` FOREIGN KEY (`username`) REFERENCES `mst_user` (`username`);

--
-- Constraints for table `mst_test`
--
ALTER TABLE `mst_test`
  ADD CONSTRAINT `mst_test_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `mst_subject` (`sub_id`);

--
-- Constraints for table `mst_useranswer`
--
ALTER TABLE `mst_useranswer`
  ADD CONSTRAINT `mst_useranswer_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `mst_test` (`test_id`);

--
-- Constraints for table `mst_valueakred`
--
ALTER TABLE `mst_valueakred`
  ADD CONSTRAINT `mst_valueakred_ibfk_1` FOREIGN KEY (`id_knowledge`) REFERENCES `mst_knowledge` (`id_knowledge`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
