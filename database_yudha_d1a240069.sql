-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2025 at 05:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_yudha_d1a240069`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `id_about` int(2) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`id_about`, `about`) VALUES
(4, 'saya yudha adi nugraha seorang mahasiswa unsub');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_artikel`
--

CREATE TABLE `tbl_artikel` (
  `id_artikel` int(5) NOT NULL,
  `nama_artikel` text NOT NULL,
  `isi_artikel` text NOT NULL,
  `gambar_artikel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_artikel`
--

INSERT INTO `tbl_artikel` (`id_artikel`, `nama_artikel`, `isi_artikel`, `gambar_artikel`) VALUES
(7, 'Biodata Hindia Baskara Putra dan Perjalanan Kariernya', 'Daniel Baskara Putra, yang dikenal sebagai Hindia, adalah seorang penyanyi, penulis lagu, komposer, dan produser musik ternama asal Indonesia. Ia merupakan alumni Fakultas Ilmu Sosial dan Ilmu Politik di Universitas Indonesia.\r\nHindia mulai belajar memainkan alat musik saat masih duduk di bangku SMA bersama teman-temannya. Namun, kebersamaan mereka dalam bermusik harus berakhir karena masing-masing melanjutkan pendidikan di universitas yang berbeda.\r\nNama panggung Hindia bukan hanya digunakan untuk pekerjaan, tetapi juga sebagai cara untuk memisahkan persona panggungnya dari kehidupan pribadi. Lewat karya musiknya, ia berharap dapat menyampaikan semangat dan dukungan kepada para pendengarnya di mana pun mereka berada. Hindia telah menjadi salah satu figur penting dalam industri musik Indonesia dengan lagu yang penuh makna dan inovatif.\r\n', NULL),
(8, 'Kisah Ngenes Baskara Putra Sebelum Tenar', 'Namanya Baskara Putra. Ia merupakan musisi dengan berbagai proyek musik. Sebut saja .feast, Hindia, dan Lomba Sihir. Di Spotify, jumlah pendengar bulanan lagu-lagunya dengan moniker Hindia mencapai 6,3 juta. \r\nBaskara Putra kini merasakan ketenaran. Namun, untuk sampai ke posisinya saat ini, dipenuhi lika-liku. Bahkan, di awal karier, ia pernah merasakan pengalaman ngenes. \r\nSalah satu pengalaman ngenes yang Baskara rasakan ialah pernah mengeluarkan sejumlah uang supaya bisa main di sebuah acara. \r\nDi Jakarta, band yang bayar untuk main di sebuah gigs atau acara kecil-kecilan biasa disebut sebagai band regist.\r\n\"Waktu itu gue belum fokus nge-band, tapi beberapa kali bantuin teman nge-band gitu, dan ya ngerasain juga kayak bayar sendiri, nonton sendiri, main sendiri gitu,\" kata Baskara kepada kumparan di kawasan Cipete, Jakarta Selatan, beberapa waktu lalu. Baskara juga mengingat awal mula ketika .feast baru memulai perjalanannya di dunia tarik suara. Di .feast, Baskara mengisi posisi sebagai vokalis. \r\nBersama .feast, Baskara pernah merasakan hanya ditonton segelintir orang. Momen itu terjadi ketika mereka main dibar. \"Ya, namanya band baru. Pernah main di bar yang nonton cuma bartender sama teman kita empat orang,\" tutur Baskara. Pernah juga .feast tampil bersama beberapa band. Penampilan mereka saat itu disaksikan oleh para personel band lain.  \"Jadi di situ ada 20 atau 30 penonton, tapi ya teman-teman band lain,\" ucap Baskara. Baskara mengatakan pengalaman yang ia rasakan saat meniti karier di dunia musik tentu pernah dirasakan oleh para musisi lainnya. \r\nJika mengenang kembali perjalanannya saat meniti karier, Baskara tidak merindukan momen ketika tak ada penonton yang menyaksikan penampilannya. \r\n\"Cuma rasanya akan kangen kayak gimana prosesnya, dari bawa alat sendiri ke panggung, manggung tanpa ada yang nonton, ya suatu hari akan kangen juga,\" ujarnya. ', NULL),
(9, 'Kisah Feast, Band Pelontar Kritik', 'Feast terbentuk ketika para anggotanya masih menjadi mahasiswa Fakultas Ilmu Sosial dan Ilmu Politik (FISIP) Universitas Indonesia pada 2013. Setahun kemudian, mereka merilis singel perdana ”Camkan”, sebuah lagu penuh kemarahan tentang kritik mengenai kebebasan beragama di Indonesia. Selanjutnya, mereka merilis album perdana Multiverses pada 2017 yang berisi banyak genre dalam balutan musik rock.\r\n”Album Multiverses tidak mengambil batasan genre. Apakah genre masih relevan sekarang, padahal kita bisa membuat kayak gini, misalnya. Jadi, kami ingin bermusik tanpa membatasi diri sendiri,” tutur Bodat. \r\n\r\nPosisi Feast semakin terdeteksi radar ketika merilis singel ”Peradaban” (2018), di mana lagu ini kerap menjadi mars perjuangan dalam aksi-aksi demonstrasi. Bagaimana tidak, lagu bernuansa penuh semangat ini mengawinkan dentuman drum, petikan mandolin, serta seruan pemacu gelora. \r\n”Peradaban” kemudian dirilis dalam mini album ”Beberapa Orang Memaafkan” (2018) bersama lima lagu lainnya, termasuk ”Berita Kehilangan”. ”Berita Kehilangan” juga kerap digunakan oleh aktivis HAM. Feast merilis ”Dalam Hitungan”, ”Tarian Penghancur Raya”, dan ”Luar Jaringan” selama 2019-2020. Lagu-lagu ini merupakan bagian dari album baru bertajuk ’Membangun dan Menghancurkan’. Belakangan, lagu-lagu baru Feast terlihat lebih sering menggunakan bahasa Indonesia ketimbang album Multiverses yang mayoritas berbahasa Inggris. \r\n”Waktu itu gue merasa lebih nyaman menulis lagu dalam bahasa Inggris karena bacaannya lebih ke itu, terus secara suku kata bahasa Indonesia tidak terlalu efisien. Tetapi, kalau ngomong topik sosial, kemanusiaan, politik, lagu Feast di ruang publik harus bisa accessible, jadi dibuat dalam bahasa Indonesia,” ucap Baskara. \r\nPada dasarnya, karya Feast tidak menawarkan suatu terobosan baru. Namun, Feast membawa angin segar pada waktu yang tepat. Tidak hanya karena menyuguhkan musik rock di tengah dominasi musik EDM atau pop saat ini, karya mereka juga berorientasi pada isu masyarakat yang relevan ketika musisi lain ramai-ramai membawakan lagu cinta.\r\n”Kami nge-band dan membuat lagu yang memiliki nilai personal masing-masing. Kami gak memaksa orang lain karena apa yang kita rasakan belum tentu sama. Tetapi, yang penting buat gue, kalau ada kebaikan, kenapa enggak disebarkan,” kata Bodat.\r\nKehadiran Feast semoga dapat semakin menggugah agar anak muda melek terhadap isu dan penegakan HAM. Apalagi, dunia baru saja merayakan Hari Internasional untuk Hak Atas Kebenaran dan Martabat Korban Pelanggaran Berat HAM pada 24 Maret 2020. https://www.kompas.id/baca/hiburan/2020/03/26/kisah-feast-band-pelontar-kritik', NULL),
(11, 'Peran Media Massa dalam Pemberantasan Pungutan Liar', 'Pungutan liar (pungli) memang berkelindan dengan korupsi. Mereka serupa tapi tak sama, ada tapi tak kasat mata, merajalela tapi tetap dimaklumkan, seolah hal tersebut sudah biasa terjadi. \r\n\r\nSelama masyarakat tidak keberatan ‘menghibahkan’ sebagian kecil hartanya bagi para pemungut, masyarakat akan tetap diam. Tentu saja pemakluman yang terus menerus ini berimbas pada kepercayaan dan kualitas terhadap institusi terkait.\r\n\r\nBeda cerita ketika pungutan itu terjadi di sebuah institusi yang lebih besar dari segi fungsi dan kedudukannya terhadap negara. Secara otomatis hal ini akan menyedot perhatian yang lebih besar pula. Terlebih jika institusi tersebut ‘tertangkap basah’ oleh presiden, seperti yang beberapa waktu lalu terjadi di Kementerian Perhubungan. Jumlahnya pun fantastis, hingga mencapai milyaran rupiah.\r\n\r\nBelum lagi deretan kasus-kasus pungli lainnya baik yang masih tersembunyi ataupun yang sudah terungkap. Pungli dapat dikatakan menjadi sesuatu yang lumrah demi mendapatkan pelayanan terbaik.  Tidak dapat dipungkiri, pungli disini juga melibatkan struktur kedudukan maupun institusi, dari tingkat rendah sampai ke tingkat tinggi.\r\n\r\nMiris ketika fakta menunjukan bahwa pungli bahkan telah menggerogoti badan sekelas kementerian. Artinya suprastruktur dan infrastruktur di Indonesia belum berjalan dengan baik, yang kemudian bersinggungan dengan stabilitas negara yang belum memadai. \r\n\r\nSensor media massa dan masyarakat pun seperti baru diaktifkan, karena mendadak menyorot dan memberitakan kasus pungli dalam kuantitas dan ruang yang lebih besar. Pungli menjadi isu yang bertransformasi menjadi opini publik dan menjadi trending topic untuk beberapa waktu.\r\n\r\nPermasalahan dan penyelesaiannya baru akan dipikirkan bersama-sama setelah dampak pungli dirasa akan mendegradasi bangsa dari berbagai macam aspek seperti mental, pendidikan, dan ekonomi. Ketika isu tersebut redup, bukan tidak mungkin pengawasan terhadap pungli menjadi menipis, bahkan hilang sama sekali.\r\n\r\nBill Kovach dan Tom Rosenstiel pernah mengemukakan sembilan elemen jurnalisme. Satu diantaranya adalah jurnalisme sebagai pelayan masyarakat dan pemantau terhadap kekuasaan, atau lebih sering dikenal dengan istilah watchdog. Di sini jurnalisme yang diaplikasikan dalam media massa diharapkan dapat mengimplementasikan secara nyata perihal pengawasan dan pengawalan terhadap pemberantasan pungli. \r\n\r\nMedia massa perlu membungkus isu ini menjadi hal yang krusial dan perlu dicermati agar masyarakat hingga jajaran pemerintahan semakin sadar akan dampak negatif terhadap pungli. Jaksa Agung M. Prasetyo mengemukakan dampak negatif tersebut. Diantaranya adalah pungli akan memberatkan masyarakat, iklim investasi akan terpengaruh dalam dunia usaha, dan pungli juga akan berpengaruh pada merosotnya wibawa hukum. \r\n\r\nMedia massa dikenal sebagai pemberi informasi terhadap masyarakat. Oleh sebab itu, masyarakat tentu memiliki kepercayaan khusus kepada media massa demi terciptanya keadilan dan kebenaran. Tentunya peran masyarakat juga dibutuhkan demi memperkuat pengawasan, karena biasanya masyarakat yang mengalami langsung tindakan pungli tersebut. ', NULL),
(12, 'Pentingnya Pendidikan sebagai Fondasi Pembangunan Bangsa', 'Pendidikan merupakan pilar utama dalam pembangunan suatu bangsa. Pendidikan dipahami secara luas sebagai proses belajar terus menerus sepanjang hayat, maka pendidikan menjadi komponen penting. Melalui pengalaman hidup sehari-hari, proses ini alami, langsung atau tidak langsung. \r\n\r\nPendidikan bertujuan untuk menggali dan memanfaatkan potensi keunikan individu dan menjadikannya berguna bagi diri sendiri dan lingkungan. Hal ini juga berarti bahwa pendidikan membantu manusia menemukan potensi dan bakatnya sendiri, serta mengembangkannya sesuai dengan keunikan dan keahliannya. Oleh karena itu, dapat dikatakan bahwa pendidikan adalah hak setiap orang.\r\n\r\nPendidikan tidak hanya sebatas belajar di sekolah. Demikian pula sistem pendidikan tidak hanya eksis dalam bentuk formal yang dikenal dan berkembang di masyarakat. Artikel ini akan membahas mengenai pentingnya pendidikan dalam membentuk masyarakat yang cerdas, produktif, dan berdaya saing, serta peranannya dalam menciptakan masa depan yang lebih baik bagi generasi mendatang.\r\n\r\n \r\n\r\nPendidikan sebagai Investasi dalam Masa Depan\r\n\r\nPendidikan bukan sekadar proses pembelajaran, tetapi juga merupakan investasi dalam masa depan individu dan negara. Melalui pendidikan, seseorang dapat mengembangkan potensi dan bakatnya, meningkatkan keterampilan, dan memperluas wawasan. Secara kolektif, pendidikan memberikan fondasi yang kuat bagi pembangunan ekonomi, sosial, dan budaya suatu bangsa.\r\n\r\n \r\n\r\nManfaat Pendidikan bagi Individu\r\n\r\nPendidikan membantu meningkatkan pengetahuan dan keterampilan yang diperlukan untuk bekerja dan meraih kesuksesan.\r\nPendidikan meningkatkan peluang kerja dan memungkinkan individu mendapatkan pekerjaan yang lebih baik dengan gaji yang lebih tinggi.\r\nPendidikan membantu meningkatkan taraf hidup individu dan keluarganya.\r\nPendidikan membantu individu mengembangkan potensi diri dan mencapai cita-citanya.\r\nPendidikan memperkaya kehidupan individu dengan memberikan pengetahuan dan pengalaman baru.\r\n \r\n\r\nManfaat Pendidikan bagi Masyarakat\r\n\r\nPendidikan meningkatkan kualitas sumber daya manusia, yang merupakan kunci kemajuan bangsa.\r\nPendidikan meningkatkan produktivitas masyarakat dan mendorong pertumbuhan ekonomi.\r\nPendidikan membantu mengurangi kemiskinan dan meningkatkan kesejahteraan masyarakat.\r\nPendidikan membantu memperkuat demokrasi dengan meningkatkan kesadaran masyarakat akan hak dan kewajibannya.\r\nPendidikan mendorong toleransi dan perdamaian antarumat beragama dan kelompok etnis.\r\n \r\n\r\nManfaat Pendidikan bagi Bangsa\r\n\r\nPendidikan membantu memperkuat daya saing bangsa di era globalisasi.\r\nPendidikan mendorong kemajuan teknologi dan inovasi.\r\nPendidikan membantu membangun bangsa yang maju, sejahtera, dan bermartabat.\r\n \r\n\r\nAkses Pendidikan untuk Semua\r\n\r\nSetiap individu berhak atas akses yang adil dan merata terhadap pendidikan. Ini termasuk anak-anak dari keluarga kurang mampu, kelompok minoritas, dan daerah terpencil yang seringkali menghadapi tantangan aksesibilitas dan keuangan. Upaya untuk memastikan akses pendidikan yang inklusif dan merata adalah langkah penting dalam memastikan kesetaraan dan keadilan dalam masyarakat.\r\n\r\n \r\n\r\nPeran Guru dalam Membentuk Generasi Mendatang\r\n\r\nGuru memainkan peran kunci dalam membentuk karakter, nilai-nilai, dan pengetahuan siswa. Mereka tidak hanya menyampaikan materi pelajaran, tetapi juga menjadi contoh dan teladan bagi siswa dalam hal integritas, kerja keras, dan rasa hormat. Investasi dalam pelatihan dan pengembangan guru merupakan investasi jangka panjang dalam kualitas pendidikan dan pembangunan manusia.\r\n\r\n \r\n\r\nPendidikan sebagai Motor Perubahan Sosial serta Tantangan Dunia Pendidikan\r\n\r\nPendidikan memiliki kekuatan untuk mengubah pola pikir, sikap, dan perilaku masyarakat. Dengan memberikan akses pendidikan yang berkualitas, kita dapat mengurangi tingkat kemiskinan, meningkatkan kesehatan, mengurangi ketimpangan gender, dan mempromosikan perdamaian dan keadilan sosial. Pendidikan adalah kunci untuk menciptakan masyarakat yang inklusif, berdaya saing, dan berkelanjutan.\r\n\r\nMeskipun pendidikan memiliki peran yang sangat penting, masih banyak tantangan yang dihadapi dalam mencapai pendidikan berkualitas untuk semua. Ini termasuk kurangnya dana, kurikulum yang tidak relevan, infrastruktur yang tidak memadai, dan kesenjangan dalam aksesibilitas dan kualitas pendidikan. Oleh karena itu, diperlukan inovasi dalam pendidikan, termasuk penggunaan teknologi digital, pembelajaran berbasis proyek, dan peningkatan pelatihan guru.\r\n\r\nPendidikan adalah investasi yang paling berharga yang dapat dilakukan oleh suatu bangsa. Dengan memberikan akses pendidikan yang berkualitas untuk semua, kita dapat membentuk masyarakat yang cerdas, produktif, dan berdaya saing dalam era globalisasi ini. Mari bersama-sama menjadikan pendidikan sebagai prioritas utama dalam pembangunan bangsa dan menciptakan masa depan yang lebih baik bagi generasi mendatang.', NULL),
(13, 'Pengaruh Kualitas Tidur terhadap Fungsi Kognitif pada Orang Dewasa Tua', 'Seiring dengan bertambahnya usia populasi, pemahaman terhadap faktor-faktor yang mempengaruhi fungsi kognitif pada orang dewasa tua menjadi semakin penting. Kualitas tidur telah lama diakui sebagai faktor penentu utama kesehatan kognitif. Namun, hubungan yang tepat antara tidur dan fungsi kognitif pada orang dewasa tua masih menjadi topik penelitian yang terus berkembang.\r\n\r\nArtikel ini akan mengeksplorasi studi terbaru yang meneliti pengaruh kualitas tidur terhadap fungsi kognitif pada orang dewasa tua dan menyoroti temuan dan implikasi penting.\r\n\r\n \r\n\r\nDesain Studi dan Metodologi\r\n\r\nBeberapa studi terbaru telah menggunakan desain longitudinal dan lintas lintang untuk menguji hubungan antara kualitas tidur dan fungsi kognitif pada orang dewasa tua. Studi-studi ini sering kali menggunakan pengukuran objektif kualitas tidur, seperti aktigrafi atau polisomnografi, bersamaan dengan penilaian kognitif standar untuk mengevaluasi berbagai domain fungsi kognitif, termasuk ingatan, perhatian, dan fungsi eksekutif.\r\n\r\nSelain itu, beberapa studi menggabungkan pengukuran kualitas tidur yang dilaporkan sendiri dan keluhan kognitif subjektif untuk memberikan pemahaman yang komprehensif tentang hubungan antara tidur dan kesehatan kognitif.\r\n\r\n \r\n\r\nTemuan Utama\r\n\r\nTemuan dari studi-studi ini secara konsisten menunjukkan hubungan yang signifikan antara kualitas tidur yang buruk dan penurunan kognitif pada orang dewasa tua. Studi longitudinal telah mengungkapkan bahwa individu dengan kualitas tidur yang buruk berisiko lebih tinggi mengalami gangguan kognitif dan demensia dari waktu ke waktu.\r\n\r\nSelain itu, kualitas tidur yang buruk telah dikaitkan dengan defisit dalam domain kognitif tertentu, seperti ingatan episodik dan fungsi eksekutif, yang penting untuk fungsi sehari-hari dan kehidupan mandiri pada orang dewasa tua. Hal yang penting, hubungan antara tidur dan fungsi kognitif tampaknya bersifat dua arah, dengan bukti yang menunjukkan bahwa penurunan kognitif juga dapat berkontribusi terhadap gangguan tidur pada orang dewasa tua.\r\n\r\n \r\n\r\nImplikasi dan Arah Penelitian Mendatang\r\n\r\nTemuan dari studi-studi ini memiliki implikasi penting untuk promosi kesehatan kognitif dan pencegahan penurunan kognitif terkait usia. Intervensi yang bertujuan untuk meningkatkan kualitas tidur, seperti terapi perilaku kognitif untuk insomnia (CBT-I) atau pengobatan farmakologis, dapat menjadi solusi untuk mempertahankan fungsi kognitif pada orang dewasa tua.\r\n\r\nSelain itu, penanganan faktor risiko yang dapat diubah untuk tidur buruk, seperti sleep apnea, depresi, dan perilaku yang kurang aktif, dapat menawarkan jalur tambahan untuk meningkatkan kesehatan kognitif pada populasi lanjut usia. Penelitian mendatang harus terus menyelidiki mekanisme yang mendasari hubungan antara tidur dan fungsi kognitif serta mengeksplorasi intervensi baru untuk mengoptimalkan hasil tidur dan kognitif pada orang dewasa tua.\r\n\r\n \r\n\r\nKesimpulan\r\n\r\nSecara keseluruhan, bukti dari penelitian terbaru menegaskan pentingnya kualitas tidur dalam mempertahankan fungsi kognitif pada orang dewasa tua. Dengan mengidentifikasi dan menangani gangguan tidur pada awal proses penuaan, kita dapat mengurangi risiko penurunan kognitif dan meningkatkan kualitas hidup secara keseluruhan pada populasi lanjut usia.\r\n\r\nUpaya berkelanjutan untuk memahami interaksi kompleks antara tidur dan fungsi kognitif sangat penting untuk mengembangkan intervensi yang efektif untuk mempromosikan penuaan yang sehat dan mempertahankan vitalitas kognitif pada masa tua.', NULL),
(14, '3 Teknologi Pembelajaran Jarak Jauh untuk Anak Belajar di Rumah', 'Ketika penerapan belajar di rumah resmi diumumkan oleh beberapa pemerintah daerah terkait pandemi COVID-19 ini, membuat orang tua dan guru harus berpikir bagaimana melakukan kegiatan belajar dengan jarak jauh. Di era berbasis digital seperti saat ini, rasanya orang tua perlu mengetahui teknologi pembelajaran jarak jauh yang bisa mengoptimalkan kegiatan belajar anak di rumah.\r\n\r\nPaling tidak ada 3 teknologi pembelajaran jarak jauh yang orang tua bisa pahami. Apa saja? Berikut penjelasannya.\r\n\r\n \r\n\r\n1. Zoom\r\n\r\nSetelah dicanangkannya belajar dari rumah, aplikasi ini menjadi salah satu aplikasi favorit untuk mempermudah kegiatan belajar mengajak. Zoom merupakan aplikasi video conference untuk melakukan koordinasi. Aplikasi ini memudahkan anak untuk melakukan diskusi dengan temannya. Hal memungkinkan melakukan kerjasama jika ditugaskan oleh guru untuk melakukan kerja kelompok.\r\n\r\nAplikasi ini memiliki keunggulan seperti bisa menampung hingga 100 orang peserta dalam 1 sesi video. Selain itu, ada fitur sharing screen yang bisa memudahkan semua peserta dalam video tersebut saling melihat layar yang dibagikan oleh salah satu peserta. Hanya saja, kekurangan aplikasi ini ialah durasi maksimal untuk satu kali melakukan video conference ialah 40 menit dalam sekali sesi.\r\n\r\n \r\n\r\n2. Google Classroom\r\n\r\nMesin pencari nomor 1 di dunia ini bukan hanya menyediakan informasi yang Anda butuhkan. Untuk kegiatan pembelajaran jarak jauh, Google sudah menyediakan Google Classroom. Aplikasi ini bisa diunduh secara gratis dan pastinya sangat efektif.\r\n\r\nAplikasi ini memudahkan guru untuk membuat kegiatan belajar jarak jauh menjadi efektif. Tidak seperti aplikasi Zoom, Google Classrom memungkinkan bagi guru untuk melakukan kegiatan belajar layaknya di kelas tanpa batas waktu maksimal. Biasanya, guru lebih senang menggunakan aplikasi ini karena sudah terintegrasi dengan layanan Google lainnya seperti Google Dokumen dan Google Drive.\r\n\r\n \r\n\r\n3. Ruangbelajar\r\n\r\nProduk unggulan Ruangguru yang pastinya sudah tidak asing di telinga Anda, bukan? Banyak fitur canggih yang bisa dimanfaatkan oleh anak Anda untuk memahami berbagai macam konsep pelajaran. Fitur-fitur canggih tersebut antara lain video belajar dengan animasi, rangkuman yang lengkap, dan tentunya bank soal untuk latihan.\r\n\r\nBicara soal harga, mungkin Anda sudah tahu bahwa biaya langganan ruangbelajar itu sangat murah jika dibandingkan bimbingan belajar baik online atau pun konvensional. Banyak diskon yang ditawarkan tentunya menjadi alternatif pendamping kegiatan anak belajar di rumah.\r\n\r\nItulah 3 teknologi pembelajaran jarak jauh yang digunakan anak dalam kegiatan belajar di rumah. Mari dampingi anak Anda dalam kegiatan pembelajaran jarak jauh dengan menggunakan aplikasi belajar yang tepat.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id_gallery` int(5) NOT NULL,
  `judul` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id_gallery`, `judul`, `foto`) VALUES
(13, 'poster everything u are', 'everything u are hindia baskara poster_.png'),
(14, 'band .feast', 'THIS IS _Feast.png'),
(16, 'baskara', 'download.jpeg'),
(17, 'anak hindi', 'anak hindieeee 💫.jpeg'),
(18, 'naik becak', 'WIN_20250624_15_16_51_Pro.jpg'),
(19, 'OTW MAKRAB', 'WhatsApp Image 2024-12-31 at 15.50.54.jpeg'),
(20, 'di cafe sejati', 'IMG-20250705-WA0014.jpg'),
(21, 'lomba desain ', 'IMG-20250705-WA0001.jpg'),
(22, 'yudha', 'IMG-20250705-WA0002.jpg'),
(23, 'curug', 'IMG-20250705-WA0003.jpg'),
(24, 'puncak upas', 'IMG-20250705-WA0004.jpg'),
(25, 'main bl dulu', 'IMG-20250705-WA0005.jpg'),
(26, 'di jalan asia africa', 'IMG-20250705-WA0006.jpg'),
(27, 'jeung barudaks', 'IMG-20250705-WA0007.jpg'),
(28, '🌼🤍', 'IMG-20250705-WA0010.jpg'),
(29, '🐼🖤', 'IMG-20250705-WA0013.jpg'),
(30, 'yudha', 'IMG-20250705-WA0008.jpg'),
(31, 'mantai', 'IMG-20250705-WA0009.jpg'),
(32, 'ngopi sambil nugas', 'IMG-20250705-WA0011.jpg'),
(33, 'bukber teman sma', 'IMG-20250705-WA0012.jpg'),
(34, 'bukber himasi', 'IMG-20250705-WA0016.jpg'),
(35, '0,5', 'IMG-20250705-WA0015.jpg'),
(36, 'yudha', 'WhatsApp Image 2025-01-10 at 16.14.54.jpeg'),
(37, 'abis uas', 'Screenshot 2025-07-05 091424.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_musik`
--

CREATE TABLE `tbl_musik` (
  `id_musik` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `artis` varchar(255) NOT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `durasi` varchar(8) DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `cover_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_musik`
--

INSERT INTO `tbl_musik` (`id_musik`, `judul`, `artis`, `genre`, `tahun`, `durasi`, `file_path`, `cover_path`) VALUES
(3, 'dj', 'dj', 'dj', '2025', '2:40', '../musik/DJ I DONT KNOW WHY FULL BEAT VIRAL TIKTOK.mp3', '../cover/0 (3).jpg'),
(4, 'Feast - o,Tuan', '.feast', 'rock', '2024', '5:47', '../musik/6863d57fc28df.mp3', '../cover/6863d57fc28e5.jpg'),
(5, 'Feast - Nina (Koplo is Me Remix)', '.feast', 'Koplo', '2024', '2:32', '../musik/6867e81b204c7.mp3', '../cover/6867e81b204d1.jpg'),
(6, 'Hindia - everything u are', 'Hindia', 'hindi', '2025', '3:56', '../musik/6867e8a4c7d42.mp3', '../cover/6867e8a4c7d47.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`username`, `password`) VALUES
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indexes for table `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `tbl_musik`
--
ALTER TABLE `tbl_musik`
  ADD PRIMARY KEY (`id_musik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `id_about` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  MODIFY `id_artikel` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id_gallery` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_musik`
--
ALTER TABLE `tbl_musik`
  MODIFY `id_musik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
