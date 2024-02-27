-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 04:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpusdigitalroby`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_buku`
--

CREATE TABLE `t_buku` (
  `bukuID` int(11) NOT NULL,
  `kd_buku` varchar(10) NOT NULL,
  `gambarBuku` varchar(255) DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `kategoriID` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahunTerbit` int(11) NOT NULL,
  `stok` int(255) DEFAULT NULL,
  `tgl_buku_dibuat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_buku`
--

INSERT INTO `t_buku` (`bukuID`, `kd_buku`, `gambarBuku`, `judul`, `kategoriID`, `deskripsi`, `penulis`, `penerbit`, `tahunTerbit`, `stok`, `tgl_buku_dibuat`) VALUES
(1, 'BK001', 'komi.jpg', 'Komi Sulit Berkomunikasi 18', 2, 'Festival budaya telah usai, sehingga semangat Komi dan kawan-kawan kembali ke temperatur normal. Tapi ajaibnya, keseharian biasa mereka tampak sedikit lebih berwarna. Ada juga kisah lain di balik festival budaya serta kisah terbentuknya band Nakanaka. Juga kisah misteri teka-teki di rumah Otori, serta kisah Komi dan Tadano yang terkunci berdua di gudang gimnasium. Kegalauan seputar teman, orangtua, dan masalah cinta.... Semuanya sama-sama maju selangkah. Rumit, tapi hangat. Sulit, tapi seru. Komunikasi terus bergulir seiring berjalannya musim. Inilah jilid 18 dari kisah sang gadis cantik yang sulit berkomunikasi, yang perasaan “ingin menyampaikan”-nya kian menggerakkan sesuatu.', 'Tomohito Oda', 'Elex Media Komputindo', 2023, 50, '2024-02-20 13:52:20'),
(3, 'BK003', 'melangkah.jpg', 'Melangkah', 1, 'Novel karya J. S Khairen yang berjudul Melangkah bertemakan tentang petualangan di Indonesia. Tidak hanya itu, cerita dalam novel ini juga mengutamakan kisah pahlawan. Berbeda dari karya-karya yang sebelumnya, di novel ini Khairen memberi sedikit imajinasi yang ia tanamkan. Terdapat 36 episode dan 5 babak.\n\nSinopsis buku\n\nListrik padam di seluruh Jawa dan Bali secara misterius. Ancaman nyata kekuatan baru yang hendak menaklukkan Nusantara.\n\nSaat yang sama, empat sahabat mendarat di Sumba, hanya untuk mendapati nasib ratusan juta manusia ada di tangan mereka! Empat mahasiswa ekonomi ini, harus bertarung melawan pasukan berkuda yang bisa melontarkan listrik! Semua dipersulit oleh seorang buronan tingkat tinggi bertopeng pahlawan yang punya rencana mengerikan.\n\nTernyata pesan arwah nenek moyang itu benar-benar terwujud. “Akan datang kegelapan yang berderap, bersama ribuan kuda raksasa di kala malam. Mereka bangun setelah sekian lama, untuk menghancurkan Nusantara. Seorang lelaki dan seorang perempuan ditakdirkan membaurkan air di lautan dan api di pegunungan. Menyatukan tanah yang menghujam, dan udara yang terhampar.”\n\nKisah tentang persahabatan, tentang jurang ego anak dan orangtua, tentang menyeimbangkan logika dan perasaan. Juga tentang melangkah menuju masa depan. Bahwa, apa pun yang menjadi luka masa lalu, biarlah mengering bersama waktu.', 'J.S. Khairen', 'Gramedia Widiasarana Indonesia', 2023, 50, '2024-02-20 16:44:46'),
(4, 'BK004', 'lelap.jpg', 'Lelap dalam Lautan Bintang (To Sleep in a Sea of Stars#1)', 4, 'Kira Navárez, ahli xenologi dari Bumi, bermimpi tentang hidup di dunia baru. Namun, mimpi buruklah yang dialaminya. Di tengah pekerjaannya menjelajahi galaksi, meneliti planet tak berpenghuni yang mungkin memiliki tanda-tanda kehidupan, Kira menemukan relik alien. Awalnya dia senang, tapi penemuan itu membuat dunianya runtuh. Kehilangan orang-orang terkasih, menghadapi selubung &quot;hidup&quot; yang melekat di tubuhnya, bertemu alien yang tak terbayangkan, semua itu menjerumuskan Kira dalam pertempuran di antara bintang-bintang.\r\n\r\nPertempuran yang akan menentukan nasib umat manusia. Paolini mengisi universe ini dengan berbagai tokoh menarik serta realistis, dan bisa dibilang berhasil menghindari stereotipe orang jahat/baik, membuat kisahnya memiliki kedalaman emosi yang terasa nyata. ―Booklist, starred review\r\n\r\nProlog:\r\nRaksasa gas jingga itu, Zeus, menggantung rendah di atas cakrawala, tampak agung dan berat dan memancarkan cahaya kemerahan. Di sekelilingnya hamparan bintang berkilau, cemerlang berlatar hitam angkasa, sementara di bawah tatapan waspada sang raksasa, terbentang gurun kelabu bertabur batu. Segugus kecil bangunan berdiri tegak di bentangan tandus itu. Sejumlah kubah, terowongan, dan dinding berjendela, satu-satunya kehangatan dan kehidupan di tengah lingkungan asing tadi.\r\n\r\nDi dalam laboratorium sempit di kompleks tersebut, Kira berusaha keras mengeluarkan alat pengurut gen dari ceruknya di dinding. Alatnya tidak besar, tetapi berat, dan dia tidak bisa memeganginya dengan benar. ”Brengsek,” gerutu Kira, dan memperbaiki posisi berdirinya. Sebagian besar peralatan mereka akan ditinggalkan di Adrasteia, bulan seukuran Bumi yang mereka teliti selama empat bulan terakhir. Sebagian besar, tidak semuanya.\r\n\r\nMesin pengurut gen adalah bagian dari perlengkapan dasar ahli xenobiologi, yang akan dibawanya ke mana pun dia pergi. Lagi pula, koloni-koloni yang tak lama lagi tiba di Shakti-Uma-Sati akan membawa model yang lebih baru dan lebih canggih, bukan jenis ringkas murah meriah yang diberikan perusahaan kepadanya.', 'Christopher Paolini', 'Gramedia Pustaka Utama', 2024, 20, '2024-02-21 02:07:59'),
(5, 'BK005', 'wishmeluck.jpg', 'Metropop: Wish Me Luck', 4, 'Sinopsis Buku Metropop: Wish Me Luck:\r\nKarier Sekar sebagai Risk Head sebuah bank ternama sedang menanjak ketika Banyu Agraprana muncul dalam hidupnya. Entah mengapa Sekar merasa kesialan demi kesialan muncul seiring ajakan kencan dari Banyu. Mendadak saja, rekan kerja Sekar terlibat kasus fraud, kinerja timnya berantakan, hingga kecelakaan-kecelakaan ganjil yang mulai melukai orang-orang terdekatnya.\r\nSekar ingin menyalahkan Banyu atas semua yang menimpanya, tetapi di sisi lain dia tidak bisa mengabaikan hatinya yang perlahan luluh dengan segala perhatian pria itu.\r\nDan ketika seseorang dari masa lalu Sekar datang kembali ke kehidupannya dengan sosok baru yang tak dia kenali, Sekar mulai bertanya-tanya. Apakah benar Banyu yang membawa kesialan-kesialan itu kepada Sekar? Atau sebenarnya kehadiran Banyu justru ingin menyelamatkan Sekar dari sosok yang menghantuinya selama ini?\r\n\r\nTentang Pengarang:\r\nRanieva adalah seorang Scorpio tulen yang galau MBTI-nya ekstrover atau introver. Selain menulis, ranieva juga dikenal sebagai full time banker untuk sekarang, karena belum ada niat resign. Suka membaca cerita thriller, tapi akhir-akhir ini terjebak di urban romance dan teenlit yang cute nan manis.\r\nJangan lupa sapa penulis di Wattpad, GWP, storial, dan cabaca dengan username @ranieva. Mampir juga ke instagram @ranevadewi atau @redwine.author', 'RANIEVA', 'Gramedia Pustaka Utama', 2023, 40, '2024-02-21 02:18:00'),
(6, 'BK006', 'bakteri.jpg', 'Ensiklopedia Anak Funtastic - Bakteria', 3, 'Tahukah kamu kalau bakteri pertama muncul sekitar 3,6 milyar tahun yang lalu, jauh sebelum manusia ada? Atau ada satu jenis bakteri yang menakjubkan yang tiga kali lebih lengket daripada lem super? Ayo kita lihat lebih dekat berbagai mikroba seperti bakteri, virus, dan kuman di buku tentang mikrobiologi yang mengasyikkan ini! Banyak informasi menarik yang membuatmu ingin tahu lebih banyak lagi!', 'STEVE MOULD', 'm&amp;c!', 2023, 30, '2024-02-21 07:43:32'),
(7, 'BK007', 'lifehack.jpg', 'Life Hack', 4, 'Ini kisah lima puluh tahun mendatang, ketika kehidupan manusia berdampingan dengan robot dan artificial intelligence. Semenjak Ellie siuman dari koma berkepanjangan, dia tidak memiliki banyak teman di sekolah. Satu-satu pelariannya hanyalah gim daring. Melalui gim itulah, Ellie menciptakan avatar dirinya bernama Ada. Namun, pada suatu hari, Ellie menemukan seorang gadis yang berparas mirip dengannya, bernama Ada. Kehadiran gadis yang tiba-tiba itu merebut segala apa yang dimiliki Ellie, termasuk gebetan, rumah, bahkan ayah Ellie satu-satunya. Siapakah Ada sebenarnya? Bagaimana kehidupan Ellie pasca diambil alih oleh Ada? Namun yang lebih penting, bagaimana jika robot dan AI mengambil alih hidup manusia sepenuhnya?', 'JUNE PERRY', 'Bhuana Ilmu Populer', 2023, 20, '2024-02-21 11:06:36'),
(8, 'BK008', 'pudar.jpg', 'Pudar', 4, '❝Sudah lama aku menyadari bahwa perasaanmu tidak lagi utuh seperti dulu. Kini, aku hanya bisa menerka-nerka masih adakah namaku di hatimu.❞\n\nAku akan menunggu jika kamu pinta. Aku akan pergi jika memang kamu yang mau. Beri tahu aku, haruskah aku pergi? Haruskah aku menetap? Sungguh, aku lelah berjalan dalam keabu-abuan. Berlalu ataupun bertahan—di akhir kisah—menggenggam tangan dan merangkul diriku sendiri lebih dulu adalah sebuah jawaban.', 'FITRIA ELISA', 'Transmedia', 2021, 36, '2024-02-21 11:08:16'),
(9, 'BK009', 'komunikasitraveling.jpg', 'Komunikasi Traveling', 6, 'Traveling merupakan sebuah cara untuk menghilangkan penat atau menambah wawasan atau mengeksplorasi atau juga sebagai bentuk self-reward seseorang. Di era saat ini, traveling menjadi sebuah lifestyle bagi sebagian besar masyarakat. Kesibukan di ruang kerja dan aktivitas perkuliahan misalnya, mendesak banyak orang untuk keluar sejenak dalam rangka refreshing.', 'Sihabuddin, S.I.Kom, M.I.Kom', 'Selaksa Media', 2023, 79, '2024-02-21 11:23:48'),
(10, 'BK010', 'jatuhbangun.jpg', 'Jatuh-Bangun Elon Musk', 6, 'Pada 2 Agustus 2008, mata Elon Musk menatap layar monitor dengan perasaan harap-harap cemas. Hari itu adalah kali ketiga SpaceX mencoba meluncurkan Falcon 1 menuju orbit. Elon kembali pada ingatan masa kecilnya. Sejak masih bocah, ia bercita-cita ingin membangun sesuatu yang bermanfaat bagi umat manusia. Sudah sejak lama ia meyakini bahwa suatu saat nanti, bumi kehancuran, entah karena\r\n\r\nyang kita tinggali ini akan mengalami perang nuklir, kerusakan alam, atau serangan alien.\r\n\r\nUntuk menjamin kelangsungan hidup manusia, seseorang harus bisa menemukan alternatif tempat tinggal bagi umat manusia. Layaknya kebanyakan tokoh pahlawan fiksi yang sering dibacanya sejak kecil, Elon mengambil tanggung jawab ini secara personal. la merasa sudah menjadi kewajiban dalam hidupnya untuk menyelamatkan manusia dari ancaman kepunahan.\r\nSebagai awal dari upayanya itu, ia mencoba menerbangkan roket Falcon 1 ke orbit bumi melalui perusahaan luar angkasa swasta miliknya, SpaceX. Bukan hal yang mudah, karena selama ini, misi pergi ke luar angkasa dikenal memiliki biaya yang tinggi dan tingkat kerumitan yang super. Itulah sebabnya hanya NASA di Amerika Serikat dan Rusia yang dianggap mampu menerbangkan manusia ke luar angkasa.\r\n\r\nSaat Elon Musk membangun SpaceX dan mengumumkan ambisinya untuk menjadi perusahaan swasta yang bergerak di bidang antariksa, banyak orang mencibir. Elon dituduh tak bisa membedakan mana dunia fiksi dan mana dunia nyata.\r\n\r\nNamun, Elon tak peduli. Sudah menjadi sifatnya untuk berkeras hati mewujudkan semua yang dicita-citakannya.\r\n\r\nBukan berarti ia tak memiliki keraguan. Bagaimanapun, kegagalannya dalam dua percobaan sebelumnya menerbangkan Falcon 1 masih membekas dalam ingatannya. Setelah penantian lama, Falcon 1 akhirnya siap diluncurkan pada 24 Maret 2006. Hampir semua kru SpaceX memegang kepala, tak percaya. Roket kebanggaan mereka terbakar dan jatuh hanya setelah 41 detik diluncurkan.\r\n\r\nBukan Elon namanya jika ia begitu mudah menyerah. Elon berusaha membangkitkan semangat timnya untuk merencanakan peluncuran kedua.\r\n\r\nSegala kesalahan dipelajari. Para insinyur berupaya keras mempersiapkan Falcon 1 agar tidak mengalami kejadian tragis untuk kedua kalinya. Berbagai upaya dikorbankan. Bahkan Elon Musk harus menelan pil pahit saat rumah tangganya hancur berantakan. Terlalu sibuk mengurus pekerjaan membuat Elon melalaikan tugasnya sebagai kepala keluarga.\r\n\r\nNamun, itu semua bukan halangan bagi Elon untuk menyiapkan peluncuran kedua Falcon 1. Hari H telah ditetapkan.', 'A. YOGASWARA -', 'Checklist', 2023, 30, '2024-02-21 11:27:18'),
(11, 'BK011', 'charlotte5.jpeg', 'Charlotte 5', 2, 'Sangat sedikit remaja laki-laki dan perempuan yang memiliki kemampuan khusus. Yuu Otosaka menggunakan kemampuannya tanpa diketahui orang lain untuk menjalani kehidupan sekolah yang memuaskan. Dan kemudian, seorang gadis bernama Nao Tomori tiba-tiba muncul di hadapannya. Pertemuan mereka mengungkapkan takdir bagi pemilik kemampuan khusus.', 'Jun Maeda', 'ASCII Media Works', 2015, 100, '2024-02-21 11:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `t_kategoribuku`
--

CREATE TABLE `t_kategoribuku` (
  `kategoriID` int(11) NOT NULL,
  `namaKategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_kategoribuku`
--

INSERT INTO `t_kategoribuku` (`kategoriID`, `namaKategori`) VALUES
(1, 'Novel'),
(2, 'Komik'),
(3, 'Ensiklopedia'),
(4, 'Fiksi Ilmiah'),
(6, 'Ilmu Sosial');

-- --------------------------------------------------------

--
-- Table structure for table `t_peminjaman`
--

CREATE TABLE `t_peminjaman` (
  `peminjamanID` int(11) NOT NULL,
  `kodePinjam` varchar(10) NOT NULL,
  `userID` int(11) NOT NULL,
  `bukuID` int(11) NOT NULL,
  `tgl_peminjaman` datetime DEFAULT NULL,
  `tgl_pengembalian` datetime DEFAULT NULL,
  `maxtgl_pengembalian` datetime DEFAULT NULL,
  `statusPeminjaman` enum('antri','dipinjam','dikembalikan','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_peminjaman`
--

INSERT INTO `t_peminjaman` (`peminjamanID`, `kodePinjam`, `userID`, `bukuID`, `tgl_peminjaman`, `tgl_pengembalian`, `maxtgl_pengembalian`, `statusPeminjaman`) VALUES
(2, 'PM001', 3, 1, '2024-02-21 01:10:36', '2024-02-21 01:13:14', '2024-02-28 01:10:36', 'dikembalikan'),
(3, 'PM002', 3, 1, '2024-02-21 08:05:57', '2024-02-21 08:07:22', '2024-02-28 08:05:57', 'dikembalikan'),
(4, 'PM003', 5, 1, '2024-02-21 19:04:06', '2024-02-21 21:21:46', '2024-02-28 19:04:06', 'dikembalikan'),
(5, 'PM003', 5, 9, '2024-02-21 19:04:14', '2024-02-21 21:21:49', '2024-02-28 19:04:14', 'dikembalikan'),
(11, 'PM004', 6, 8, '2024-02-22 10:08:41', '2024-02-23 10:11:56', '2024-02-29 10:08:41', 'dikembalikan'),
(13, 'PM005', 4, 3, '2024-02-23 10:11:51', '2024-02-23 10:17:51', '2024-03-01 10:11:51', 'dikembalikan'),
(14, 'PM005', 4, 5, '2024-02-23 10:12:00', '2024-02-23 10:17:57', '2024-03-01 10:12:00', 'dikembalikan'),
(16, 'PM006', 4, 1, '2024-02-24 10:31:18', '2024-02-24 10:32:30', '2024-03-02 10:31:18', 'dikembalikan'),
(17, 'PM006', 4, 8, '2024-02-24 10:31:27', '2024-02-24 10:32:35', '2024-03-02 10:31:27', 'dikembalikan'),
(18, 'PM007', 4, 3, '2024-02-24 11:08:52', '2024-02-24 11:17:35', '2024-03-02 11:08:52', 'dikembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `t_ulasanbuku`
--

CREATE TABLE `t_ulasanbuku` (
  `ulasanID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `bukuID` int(11) NOT NULL,
  `ulasan` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_ulasanbuku`
--

INSERT INTO `t_ulasanbuku` (`ulasanID`, `userID`, `bukuID`, `ulasan`, `rating`) VALUES
(1, 4, 5, 'Bagus, menarik, WAJIB coba baca minimal sekali seumur hidup', 9),
(2, 6, 6, 'Mudah dipahami! ', 10),
(3, 4, 1, 'Seru, Wajib baca', 10),
(4, 6, 3, 'Mantap', 6);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `userID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telp` varchar(14) NOT NULL,
  `namaLengkap` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `level` enum('admin','petugas','peminjam','') NOT NULL,
  `tgl_akun_dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`userID`, `username`, `password`, `email`, `telp`, `namaLengkap`, `alamat`, `level`, `tgl_akun_dibuat`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'pyrexpairz321@gmail.com', '089506495890', 'Roby Rachmat Firdaus', 'Kab. Bandung Barat, Batujajar, Jl. Sukawargi, RT 3 RW 8 No.80', 'admin', '2024-01-20'),
(3, 'peminjam', '202cb962ac59075b964b07152d234b70', 'ayonima@gmail.com', '089544442222', 'Abdul Kasir', 'Kab. Bandung Barat, Kec. Cipeundeuy, Jl. Simpang 3 Garuda No. 03 RT 1 RW 2 Desa Sirnaraja', 'peminjam', '2024-02-16'),
(4, 'robyrf', '202cb962ac59075b964b07152d234b70', 'sayayamabuki04@gmail.com', '089506493333', 'Roby Rachmat Firdaus', 'Jawa Barat, Kab. Bandung Barat, Batujajar, Jl. Sukawargi, RT 3 RW 8 No.80', 'peminjam', '2024-02-21'),
(5, 'ahmad', '202cb962ac59075b964b07152d234b70', 'ahmadkasir@gmail.com', '089476352745', 'Ahmad Kasir', 'Jl. Raya Batujajar G3 No.07 timur', 'peminjam', '2024-02-21'),
(6, 'insan', '202cb962ac59075b964b07152d234b70', 'iluvcat@gmail.com', '086544553366', 'Muhammad Insan Putra', 'Jl. Ciseupan', 'peminjam', '2024-02-22'),
(7, 'petugas', '202cb962ac59075b964b07152d234b70', 'petugas@gmail.com', '086655889944', 'Zackar Amri', 'Jl. Penuh Rintangan', 'petugas', '2024-02-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_buku`
--
ALTER TABLE `t_buku`
  ADD PRIMARY KEY (`bukuID`),
  ADD KEY `kategoriID` (`kategoriID`);

--
-- Indexes for table `t_kategoribuku`
--
ALTER TABLE `t_kategoribuku`
  ADD PRIMARY KEY (`kategoriID`);

--
-- Indexes for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  ADD PRIMARY KEY (`peminjamanID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `bukuID` (`bukuID`);

--
-- Indexes for table `t_ulasanbuku`
--
ALTER TABLE `t_ulasanbuku`
  ADD PRIMARY KEY (`ulasanID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `bukuID` (`bukuID`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_buku`
--
ALTER TABLE `t_buku`
  MODIFY `bukuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t_kategoribuku`
--
ALTER TABLE `t_kategoribuku`
  MODIFY `kategoriID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  MODIFY `peminjamanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `t_ulasanbuku`
--
ALTER TABLE `t_ulasanbuku`
  MODIFY `ulasanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_buku`
--
ALTER TABLE `t_buku`
  ADD CONSTRAINT `fk_kategoriID_t_buku` FOREIGN KEY (`kategoriID`) REFERENCES `t_kategoribuku` (`kategoriID`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_buku_ibfk_1` FOREIGN KEY (`kategoriID`) REFERENCES `t_kategoribuku` (`kategoriID`);

--
-- Constraints for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  ADD CONSTRAINT `fk_bukuID_t_peminjaman` FOREIGN KEY (`bukuID`) REFERENCES `t_buku` (`bukuID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_userID_t_peminjaman` FOREIGN KEY (`userID`) REFERENCES `t_user` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `t_ulasanbuku`
--
ALTER TABLE `t_ulasanbuku`
  ADD CONSTRAINT `fk_bukuID_t_ulasanbuku` FOREIGN KEY (`bukuID`) REFERENCES `t_buku` (`bukuID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_userID_t_ulasanBuku` FOREIGN KEY (`userID`) REFERENCES `t_user` (`userID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
