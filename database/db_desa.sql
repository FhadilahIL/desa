-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2021 at 11:54 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  `date_created` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `email`, `password`, `nama`, `foto`, `date_created`, `status`) VALUES
(1, 'arisrepliga16@gmail.com', '$2y$10$rLkKz0JoO0I3A/Df55Oba.RTdf0z4.m0NN5kDeoaZmfc1Ia/pUnOO', 'Aris Indrawan', 'b331f9871b0e93c7259f8aeac949757a.jpg', '2020-12-08 08:22:45', 1),
(3, 'ilhammahier@gmail.com', '$2y$10$72MVUlljG3uI2FKzrSmhi.wxIyiFPk6mtccmkW2a3AXOVdwmu75MK', 'Muhammad Ilham Fhadilah', 'f26f47d6852279d6a3438c8714f69d12.jpg', '2020-12-08 07:09:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` text NOT NULL,
  `gambar_berita` text NOT NULL,
  `id_admin` int(11) NOT NULL,
  `isi_berita` text NOT NULL,
  `news_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `judul_berita`, `gambar_berita`, `id_admin`, `isi_berita`, `news_created`) VALUES
(10, 'kepala-desa-jayanti-resmikan-sekretariat-karang-taruna-desa-jayanti', 'e464ad00d1203484656a7860d4e7f8e5.jpg', 1, 'Kabupaten Tangerang, Aktualnews.co - Kepala Desa (Kades) Jayanti, Misri Rahayu meresmikan kantor Sekretariat Karang Taruna Desa Jayanti yang berada di Jl. Pasiriab – Warudoyong, Kamis, 14 Januari 2021 dengan memotong pita.\r\nKetua Karang Taruna Desa Jayanti, Wahyu menuturkan, Karang Taruna di Desa Jayanti kini sudah memiliki Kantor Sekretariat.\r\n“Syukur alhamdulillah sudah memiliki kantor Sekretariat sendiri yang lokasinya persis di pinggir jalan desa yang sebelum Kantor Desa Jayanti menuju Kantor UPT BLK Kabubaten Tangerang dan Panti Dinas Sosial Kabupaten Tangerang. Keberadaannya bagi kami cukup membuat kami bahagia dan bangga,” pungkasnya.\r\n“Sekretariat ini juga tujuannya untuk memupuk karakteristik pemuda-pemudi yang kratif dan inovatif, terbukti di Sekretariat kami tersedia pula jajanan, karya seni, bahkan segala bentuk hasil dari kegiatan Karang Taruna yang dibuat sedemikian rupa, layaknya stand-stand kebanyakan dengan bertujuan bisa menjadi sebuat wadah para kepengurusan dan anggota Karang Taruna Desa Jayanti yang ke depannya kami budayakan,” jelasnya.\r\nSementara itu Kepala Desa Jayanti Musti Rahayu mengatakan Dengan di resmikannya sekretariat Karang Taruna Desa Jayanti mudah-mudahan dijadikan motivasi dan semangat untuk menjalankan roda organisasi Karang taruna Desa Jayanti.\r\n\"Semoga program-program apa yang dicanangkan oleh karang taruna Desa Jayanti dalam memupuk karakterisitik pemuda-pemudi Jayanti yang kreatif dan inovatif seni bertambah semangat, Kami selaku Pemerintahan Desa Jayanti akan terus mendukung program yang dicanangkan oleh Karang Taruna Jayanti\"Ungkapnya.\r\nSaatdimintai tanggapannya H. Rebo Muhidin selaku Pembina Desa Jayanti Mengatakan, Berharap dengan diresmikannya Kantor Sekretariat Karang Taruna DesaJayanti menjadi sebuah wadah inovasi menuju pemuda-pemudi yang mampu bersinergi dengan jajaran Pemerintah Desa.\r\n\"KarangTaruna Desa merupakan satu kesatuan lembaga yang dituntut untuk bisa membesarkan nama Desa Jayanti dengan kegiatan-kegiatan yang bersifat positif, terutama pembinaan kepemudaan, sosial, pendidikan karakter pemuda, olahraga, seni budaya dan masih banyak lagi. Semua itu merupakan PR bagi Karang Taruna untuk menjalankan program-program kegiatannya,” tuturnya.', '2021-01-20 22:17:48'),
(11, 'gmj-minta-camat-jayanti-jangan-ciptakan-perpecahan', 'ccf248562a45d262f314d1d0c0683b63.jpg', 1, 'Gerakan Muda Jayanti (GMJ) meminta Yandri Permana selaku Camat Jayanti untuk tidak mencipta perpecahan di tubuh pemuda. Terutama jelang suksesi Karang Taruna.\r\n\r\nGMJ berharap Camat bisa menjadi penengah atas kisruh yang sedang terjadi. Karena jika didiamkan akan berdampak buruk bagi masa depan Pemuda Jayanti.\r\n\r\nKepada Vinus, Ketua Umum GMJ Lucky Alamsyah menyampaikan, pihak kecamatan harus mempertemukan antara pengurus lama dengan caretaker sebelum temu karya diselenggarakan.\r\n“Kita dari pemuda, meminta Camat Jayanti untuk menyelesaikan persoalan yang sedang terjadi. Jangan sampai niatnya untuk regenerasi kepemimpinan malah memecah belah para pemuda Jayanti,” ungkapnya pada Kamis, (14/01).\r\n\r\nLebih lanjut, Lucky berharap, panitia temu karya harus hati-hati dalam bertindak. Jangan sampai cacat administrasi.\r\n\r\n“Saya mewakili anak muda Jayanti, berharap temu karya menghasilkan kepemimpinan yang progresif dan visioner. Pemimpin yang bisa menyatukan pemuda Jayanti,” ujar Lucky.\r\nSementara itu, Camat Jayanti Yandri Permana menyampaikan, berdasarkan laporan ketua caretaker, Wakil Ketua Karang Taruna Kabupaten Tangerang dengan MPKT kecamatan sudah bertemu dan bersepakat.\r\n\r\n“Dari mereka tidak ada masalah terkait proses tahapan temu karya. Jadi akan tetap dilanjutkan sesuai jadwal,” tuturnya.\r\n\r\nMasih menurut Yandri Permana, soal mempertemukan caretaker dengan pengurus lama, sudah menyerahkan sepenuhnya ke caretaker.\r\n\r\n“Sudah saya serahkan sepenuhnya ke caretaker. Jadi kalau pengurus lama mau bertemu dengan caretaker, dipersilakan,” pungkas Yandri.\r\n\r\nUntuk informasi, jadwal tahapan Temu Karya Karang Taruna Kecamatan Jayanti akan digelar pada tanggal 20 Januari 2021. Namun, jadwal yang dibuat tim caretaker tersebut disoal pengurus lama.', '2021-01-20 22:22:49'),
(12, 'jika-temu-karya-tetap-dilaksanakan,-pengurus-lama-akan-bawa-ke-jalur-hukum', '17d231aa7f7b184f7a2fd1cfb293fff2.jpg', 1, 'Polemik soal SK caretaker dan jadwal tahapan Temu Karya Karang Taruna Kecamatan Jayanti kian memanas. Kali ini giliran pengurus lama yang angkat bicara.\r\n\r\nKepada Vinus, Ketua Karang Taruna Kecamatan Jayanti Cecep Abdul Kodir Zaelani membantah pihaknya telah diajak duduk bersama dalam permohonan caretaker dan penyusunan jadwal tahapan.\r\n\r\nSelain itu, menurut Cepi sapaan akrab Cecep Abdul Kodir Zaelani ini, menyayangkan langkah kecamatan yang terburu-buru dalam bersikap tanpa menelusuri terlebih dahulu fakta di lapangan.\r\n\r\n“Saya khawatir dengan sikap camat yang tidak hati-hati ini akan menimbulkan gejolak dikalangan pemuda Jayanti,” ungkapnya.\r\n\r\nSoal SK caretaker, lanjut Cepi, juga terlihat janggal dan dipertanyakan keabsahannya. Terbukti ada beda sikap soal pernyataan pengurus kabupaten dan pihak kecamatan terkait SK tersebut.\r\n\r\nNamun demikian, sambung Cepi, pihaknya akan memperkarakan persoalan tersebut ke jalur hukum jika penyelenggaraan temu karya itu tetap dilaksanakan.\r\n“Biar tidak ada gejolak atau gesekan, sebaiknya ditunda dulu tahapan itu sampai ada titik temu,” harapnya.\r\n\r\nSementara itu, ketika Vinus hendak mengkonfirmasi terkait jadwal tahapan ke salah satu nomor kontak yang tertera di surat pemberitahuan, panitia menjawab dengan singkat. “langsung hubungi Ketua Caretaker saja ya,” singkatnya.\r\n\r\nUntuk Informasi, jadwal tahapan temu karya Karang Taruna Kecamatan Jayanti telah resmi dikeluarkan oleh tim caretaker. Namun, jadwal dan penunjukan caretaker tersebut menimbulkan kontroversi di tataran pengurus lama.', '2021-01-20 22:26:10'),
(13, 'miris,-blt-pusat-terindikasi-diselewengkan-aparat-kelurahan-sukamulya', '9c374b8618c31879281abe51397fd897.jpg', 1, 'Merasa janggal terkait undangan pencairan Bantuan Langsung Tunai (BLT) yang bersumber dari APBN melalui Kantor Pos, Siti Aminah mempertanyakan bantuan yang hendak diterimanya itu.\r\n\r\nPasalnya, bantuan dari tahap 1-8 tidak diterima oleh warga Kelurahan Sukamulya Kecamatan Cikupa Kabupaten Tangerang Provinsi Banten ini.\r\n\r\nKepada Vinus, Siti Aminah mengatakan, bantuan yang mestinya Ia terima dari tahap satu sampai tahap sembilan. Namun undangan pencairan baru diterima, itu pun untuk satu tahap.\r\n“Ngerasa aneh saja, kok undangan yang Saya terima pencairan tahap sembilan. Sedangkan tahap 1-8 tidak tahu siapa yang ambil,” ujarnya saat diwawancara pada Sabtu, (28/11).\r\n\r\nMenurut Siti Aminah, bantuan tersebut sangat dibutuhkan, apalagi saat ekonomi yang serba susah akibat virus corona. ” Tega yah, mengambil yang bukan haknya,” ucap Siti Aminah.\r\n\r\nDi tempat terpisah, penanggung jawab lapangan penyaluran BLT Kantor Pos Tigaraksa Sartaji membenarkan, Ibu Siti Aminah tercatat sebagai penerima bantuan yang bersumber dari APBN.\r\n\r\n“Setelah saya cek tahap satu sampai delapan sudah terdistribusikan dan diserahkan ke pihak kelurahan. Coba konfirmasi saja ke Pak Sairi beliau penanggung jawab untuk Kelurahan Sukamulya,” kata Sartaji.\r\nSementara itu, ketika dikonfirmasi perihal kejadian tersebut, Sairi salah satu pegawai Kelurahan Sukamulya mengatakan, dalam pendistribusian undangan pihaknya kesulitan menemukan alamat yang bersangkutan, sehingga tidak sampai.\r\n\r\n“Kami sudah berupaya mencari alamat Ibu Siti Aminah, tapi tidak ditemukan,” kilahnya.\r\n\r\nNamun ketika ditanya indikasi penyelewengan bantuan. Ia cuma menjawab, “Semua kegiatan terkoordinasi dengan Pak Lurah, silahkan konfirmasi langsung ke beliau,” sambungnya.\r\n\r\nUntuk informasi, penyaluran bantuan langsung tunai (BLT) yang bersumber dari APBN memasuki tahap kesembilan. Di beberapa wilayah pencairannya sedang berlangsung.', '2021-01-20 22:30:59'),
(14, 'lemahnya-penegakan-perbup-tangerang-no-47,-mahasiswa-angkat-bicara', '2fa6856869cdfa2e7a4167834b0c75ed.jpg', 1, 'Setelah ramai pemberitaan pesepeda terlindas truk tanah pada Minggu (29/11) sore, aktivis mahasiswa Kabupaten Tangerang angkat bicara.\r\n\r\nDia mempersoalkan Peraturan Bupati Tangerang Nomor 47 Tahun 2018 tentang pembatasan jam operasional angkutan tambang.\r\n\r\nKepada media, Firmansyah selaku aktivis mahasiswa mengatakan, sejak payung hukum tersebut di tetapkan 2 tahun lalu, implementasinya dinilai gagal. Banyak truk yang masih melanggar.\r\n\r\n\"Bupati Tangerang telah gagal dalam mengimplementasikan peraturannya sendiri. Kejadian pesepeda terlindas truk di Cisoka kemarin, merupakan bukti Perbup 47 mandul,\" ujarnya pada Senin, (30/11).\r\n\r\nLebih lanjut, dirinya menyayangkan kejadian tersebut. Padahal belum lama ini viral soal truk tanah beroperasi sore hari, mengerjakan proyek Pemda.\r\n\r\n\"Padahal belum lama ini ramai pemberitaan truk tanah melanggar Perbup 47. Parahnya, truk itu mengerjakan proyek Pemda, yaitu pembangunan jalan Kantor Pos-Pasar Gudang Tigaraksa,\" ungkapnya.\r\n\r\nDirinya juga meminta Bupati Tangerang harus menegakkan supremasi hukum yang jelas. Jangan tutup mata atas banyaknya korban jiwa akibat pelanggaran Perbup 47.\r\n\r\n\"Bupati Tangerang harus turun langsung dalam menggelar operasi penertiban truk tanah tersebut. Jangan korbankan warganya sendiri demi menguntungkan satu pihak,\" tegas Firmansyah.\r\n\r\nSekedar informasi, dalam Perbup Nomor 47 Tahun 2018 disebutkan truk tanah dilarang melintas mulai pukul 05.00 hingga 22.00 WIB. Sementara itu, seorang pesepeda tewas terlindas truk tahan pada Minggu pagi, di jalan Cisoka-Adiyasa Kabupaten Tangerang.', '2021-01-20 22:32:19'),
(15, 'jelang-suksesi-karang-taruna-jayanti,-sarnaja:-ini-hajat-kecamatan,-kabupaten-jangan-ikut-campur', '0b3471c538cb5e98c9b7153e4f381e48.jpg', 1, 'Melalui akun media sosial Facebook Info Jayanti, jadwal tahapan Temu Karya Karang Taruna Kecamatan Jayanti segera digelar pada tanggal 20 Januari. Namun demikian, jadwal tersebut menuai kontroversi.\r\n\r\nPasalnya, dalam penyusunan jadwal tahapan tidak melibatkan pengurus sebelumnya, dan terkesan ada campur tangan dari pengurus kabupaten dengan mengcaretaker pengurus lama.\r\n\r\nKepada Vinus, salah satu tokoh pemuda asal Jayanti Sarnaja mengatakan, tidak dilibatkannya pengurus lama dalam hal temu karya menimbulkan kegaduhan di kalangan pemuda terlebih di tataran para pengurus.\r\n\r\nSikap tersebut, lanjut Sarnaja, menandakan ketidakseriusan pihak kecamatan dalam membangun dan menghadirkan kondusifitas di wilayahnya.\r\nSelain itu, menurut Sarnaja, adannya intervensi dari pengurus kabupaten menambah rumit dan gaduh terhadap persoalan tersebut.\r\n\r\n“Ini kan hajatan kecamatan. Jangan juga pengurus kabupaten ini ikut campur. Baca dulu deh Permensos 25 tahun 2019 kalau tidak salah ada di Pasal 20,” pintanya.\r\n\r\nSementara itu, di tempat terpisah, Ketua Karang Taruna Kabupaten Tangerang M. Hasan mengatakan, terkait temu karya Kecamatan Jayanti pihaknya sebatas mensupport dan merespons surat dari kecamatan.\r\n\r\nSoal caretaker, lanjut Hasan, bukan merupakan intervensi secara langsung, tetapi tindakan tersebut atas permohonan dari pemerintah kecamatan melalui surat resmi.\r\n\r\n“Sebagai pembina, kami selalu melakukan diskusi dan komunikasi. Jadi tidak ada sama sekali intervensi. Kami melakukannya sesuai dengan fungsi dan amanat organisasi,” ungkapnya saat diwawancara.\r\nSelain itu, menurutnya, kewajiban melibatkan satu tingkat di atasnya dalam hal pelaksanaan temu karya merupakan amanat Permensos.\r\n\r\n“Tujuan kami jelas. Membangun dan membesarkan lembaga yang kami banggakan. Tidak lebih,” tegas Hasan.\r\n\r\nSementara saat ditanya soal penerbitan SK caretaker, Hasan menjawab dengan singkat. “SK belum saya tanda tangan. Untuk lebih jelasnya tanya Sekjend,” kata Hasan.\r\n\r\nSementara itu, ketika dikonfirmasi soal surat permohonan caretaker, Camat Jayanti Yandri Permana membenarkan surat permohonan tersebut. Ia berdalih surat itu dikirim berdasarkan hasil komunikasinya dengan pengurus lama.\r\n\r\n“Pengurus lama yang meminta saya untuk mengajukan surat permohonan kepada pengurus Karang Taruna Kabupaten Tangerang. SK caretaker sudah ada dan sudah saya terima,” pungkasnya.', '2021-01-20 22:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaduan`
--

CREATE TABLE `tb_pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `jenis_pengaduan` varchar(50) NOT NULL,
  `isi_pengaduan` text NOT NULL,
  `status` int(11) NOT NULL,
  `waktu_pengaduan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_reply_pengaduan`
--

CREATE TABLE `tb_reply_pengaduan` (
  `id_reply_pengaduan` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `reply_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id_surat` int(11) NOT NULL,
  `nama_surat` varchar(100) NOT NULL,
  `file_surat` text NOT NULL,
  `id_admin` int(11) NOT NULL,
  `upload_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_surat`
--

INSERT INTO `tb_surat` (`id_surat`, `nama_surat`, `file_surat`, `id_admin`, `upload_time`) VALUES
(5, 'surat-keterangan-izin-cuti', 'surat-keterangan-izin-cuti.docx', 1, '2021-01-20 21:59:07'),
(6, 'surat-belum-memiliki-rumah', 'surat-belum-memiliki-rumah.docx', 1, '2021-01-20 21:59:26'),
(7, 'surat-keterangan-belum-menikah', 'surat-keterangan-belum-menikah.docx', 1, '2021-01-20 21:59:41'),
(8, 'surat-keterangan-kelahiran', 'surat-keterangan-kelahiran.docx', 1, '2021-01-20 21:59:58'),
(9, 'surat-keterangan-kematian', 'surat-keterangan-kematian.docx', 1, '2021-01-20 22:00:15'),
(10, 'surat-keterangan-domisili', 'surat-keterangan-domisili.docx', 1, '2021-01-20 22:00:34'),
(11, 'surat-pengantar-skck', 'surat-pengantar-skck.docx', 1, '2021-01-20 22:00:48'),
(12, 'surat-keterangan-usaha', 'surat-keterangan-usaha.docx', 1, '2021-01-20 22:01:07'),
(13, 'surat-keterangan-domisili-lsm', 'surat-keterangan-domisili-lsm.docx', 1, '2021-01-20 22:01:29'),
(14, 'surat-izin-keramaian', 'surat-izin-keramaian.docx', 1, '2021-01-20 22:02:26'),
(15, 'surat-keterangan-kehilangan', 'surat-keterangan-kehilangan.docx', 1, '2021-01-20 22:02:42'),
(16, 'surat-keterangan-menikah', 'surat-keterangan-menikah.docx', 1, '2021-01-20 22:02:57'),
(17, 'surat-keterangan-tidak-mampu', 'surat-keterangan-tidak-mampu.docx', 1, '2021-01-20 22:03:16'),
(18, 'surat-keterangan-warisan', 'surat-keterangan-warisan.docx', 1, '2021-01-20 22:03:34'),
(19, 'surat-keterangan-yatim-piatu', 'surat-keterangan-yatim-piatu.docx', 1, '2021-01-20 22:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_warga`
--

CREATE TABLE `tb_warga` (
  `id_warga` int(11) NOT NULL,
  `nama_warga` varchar(50) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `email_warga` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(3) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_warga`
--

INSERT INTO `tb_warga` (`id_warga`, `nama_warga`, `nik`, `email_warga`, `password`, `alamat`, `rt`, `status`) VALUES
(1, 'Muhammad Ilham Fhadilah', '3674010801990005', 'mahier.fh@gmail.com', '$2y$10$7qmjWmGkwYiNBWDImqDQ0OGCQ4G7NIiVaFQvkmV0cuUJYKHDfXzOe', 'Kp. Cikande', '02', 1),
(2, 'Fhadilah Ilham', '3674010801990006', 'ilhamelmahier21@gmail.com', '$2y$10$72MVUlljG3uI2FKzrSmhi.wxIyiFPk6mtccmkW2a3AXOVdwmu75MK', 'Kp. Jayanti', '01', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `id_warga` (`id_warga`);

--
-- Indexes for table `tb_reply_pengaduan`
--
ALTER TABLE `tb_reply_pengaduan`
  ADD PRIMARY KEY (`id_reply_pengaduan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `tb_warga`
--
ALTER TABLE `tb_warga`
  ADD PRIMARY KEY (`id_warga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_reply_pengaduan`
--
ALTER TABLE `tb_reply_pengaduan`
  MODIFY `id_reply_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_surat`
--
ALTER TABLE `tb_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_warga`
--
ALTER TABLE `tb_warga`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD CONSTRAINT `tb_berita_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  ADD CONSTRAINT `tb_pengaduan_ibfk_1` FOREIGN KEY (`id_warga`) REFERENCES `tb_warga` (`id_warga`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tb_reply_pengaduan`
--
ALTER TABLE `tb_reply_pengaduan`
  ADD CONSTRAINT `tb_reply_pengaduan_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_reply_pengaduan_ibfk_3` FOREIGN KEY (`id_pengaduan`) REFERENCES `tb_pengaduan` (`id_pengaduan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD CONSTRAINT `tb_surat_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
