-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2023 at 07:48 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libraryku`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` char(36) NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `release_date` date NOT NULL,
  `author` varchar(100) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `abstract` varchar(2500) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `article_title`, `release_date`, `author`, `category_id`, `abstract`, `pdf`, `created_at`, `updated_at`) VALUES
('07362828-6bc1-4ddc-b35e-e1b9857aa5ed', 'PERANCANGAN SISTEM INFORMASI MANAGEMENT SISWA BERPRESTASI BERBASIS ANDROID PADA SMK PGRI RAWALUMBU', '2020-09-02', 'Bagus Tri Mahardika', 3, 'Sistem informasi adalah kombinasi dari teknologi informasi dan aktivitas orang yang menggunakan teknologi itu untuk mendukung operasi dan manajemen. Dalam arti yang luas, istilah sistem informasi sering digunakan merujuk kepada interaksi antara orang, proses algoritmik, data, dan teknologi. Dengan adanya sistem informasi ini dapat mempermudah aktivitas atau tugas orang yang menggunakannya. Karena pada sistem informasi biasanya akan menghasilkan suatu informasi yang dibutuhkan oleh pengguna tersebut. Pada sistem informasi ini diharapkan dapat membantu guru dalam menentukan siswa berprestasi. Sehingga tugas guru dapat lebih ringan dan berkurang dan juga para siswa dapat mendapat informasi tentang kegiatan belajar mengajar dengan mudah. Agar siswa dan guru dapat lebih efektif dalam mengerjakan tugas masing–masing dan bisa lebih efisien dalam mengerjakannya. Adapun Bahasa pemrograman yang digunakan dalam membuat sistem tersebut adalah JAVA, PHP, dan Firebase sebagai penyimpanan datanya. Penyusunan penelitian ini dimulai dengan merumuskan masalah, mengidentifikasi masalah, penentuan tujuan dan manfaat. Dapat disimpulkan aplikasi ini ditujukan untuk mempermudah siswa dalam mengetahui informasi kegiatan belajar mengajar dan guru dalam menentukan siswa berprestasi.', 'pdfArticle/article (14).pdf', NULL, NULL),
('12265c17-a30c-4501-af20-9a5b822b48e2', 'THE EFFECT OF PLANTING MEDIA AND TYPES OF CUTTING MATERIAL ON THE GROWTH OF TURNERA SUBULATA', '2023-03-15', 'Ahmad Nasir Daulay', 1, 'The research was conducted at KP2 of the Institut Pertanian Stiper located in Maguwoharjo Village, Depok District, Sleman Regency, DIY. With an elevation of 118 mpl. The research was conducted from August 4, 2022, to November 1, 2022. The research was carried out using a factorial design that was arranged in a completely randomized design (CRD) and consisted of two factors. The first factor was the planting medium, which consisted of 4 levels: M0, regosol soil (control); M1, soil + cow manure (2:1); M2, soil + rice husk (2:1); and M3, soil + cow manure + rice husk (1:1:1). The second factor is the origin of the cutting material, which consists of 3 levels, namely the top of the segment (B1), the middle stem of the segment (B2), and the rootstock of the segment (B3), and each is 15 cm long. So that 4 x 3 = 12 combinations are obtained. Each treatment was repeated five times, resulting in the acquisition of 60 units. Experiment The research data were analyzed by analysis of variance (Anova) at the 5% level. If there is a significant effect, a DMRT follow-up test is carried out at the 5% level. The planting medium and cutting material interacted with plant height, number of shoots, number of leaves, fresh weight of roots, and dry weight of plants. Meanwhile, for fresh weight of plants, dry weight of roots, and leaf width, there was no interaction between the planting medium and the cutting material', 'pdfArticle/article (3).pdf', NULL, NULL),
('21f84f8d-b5bf-4024-a8c6-3ca7cdaf273c', 'Perancangan Sistem Informasi Penjualan Berbasis Desktop pada Distro IDCL', '2023-05-03', 'Muhamad Aziz Pebriansyah', 3, 'Distro IDCL merupakan suatu usaha kecil menengah yang bergerak dibidang fashion antara lain jaket dan sweater tren untuk sehari-hari. Proses pengolahan data penjualan, pembelian, stok barang maupun pembuatan laporan masih menggunakan cara manual yaitu dengan proses pencatatan pada buku yang sangat rentan mengalami masalah kehilangan data dan kesulitan dalam mencari data. Tujuan dari penelitian ini ialah untuk membuat sebuah perancangan aplikasi berbasis desktop yang terintegrasi dalam proses penjualan, pembelian, stok barang dan pembuatan laporan yang lebih mudah dalam menginput data dan mengimplementasikan nya. Aplikasi ini dirancang dengan metode pendekatan sistem berorientasi objek dan metode pengembangan sistem Prototype, dengan bahasa pemograman Java Netbeans dan MySQL sebagai media penyimpanan data. Dengan dibuatnya aplikasi ini diharapkan dapat membantu semua pihak yang ada dalam melakukan proses penjualan, pembelian, stok data dan pembuatan laporan di distro.', 'pdfArticle/article (8).pdf', NULL, NULL),
('224b6f74-ad01-4371-86c6-ea2941636104', 'GROWTH OF LEAF CUTTING OF ORANGE LEMON (Citrus limon L. \r\nOsbeck) WITH RED ONION EXTRACT TREATMENT', '2023-03-15', 'Siti Fatonah', 1, 'Cultivation of lemons needs to be increased due to the increasing demand for lemons. This requires a large amount of seedling. One alternative material for cuttings for lemongrass nurseries with lots of supplies is leaf cuttings. The aims of this study were to determine the effect of onion extract concentration on the growth of leaf cuttings and to determine the best concentration of shallot extract on the growth of leaf cuttings. The experimental research was in the form of extract treatment, which consisted of 5 levels, namely control (without immersion), immersion in water, 10% onion extract, 20% onion extract and 30% shallot extract. Leaf cuttings were soaked in onion extract at various concentrations for 2 hours. The observed variables included the percentage of living cuttings, the percentage of roots formed, the number of roots, the length of the roots, the percentage of damaged leaves, the percentage of shoots formed and the length of shoots. All treatments showed 100% survival rate and root formation percentage. Treatment of 20% onion extract can increase the number of roots, root length, percentage of shoots formed and shoot length from lemon lime leaf cuttings at 60 days after observation. The results of this study provide information that cuttings from leaves can be used as an alternative in the vegetative propagation of lemon and onion extracts as an alternative to growth regulators.', 'pdfArticle/article (1).pdf', NULL, NULL),
('248538d7-0d09-4f7b-a2cd-8991dc0c37b0', 'PERANCANGAN APLIKASI PEMESANAN DAN PEMBAYARAN BERBASIS DESKTOP PADA PERCETAKAN UD. AZKA GEMILANG MENGGUNAKAN METODE PROTOTYPE', '2018-09-03', 'Abdul Karim Syahputra', 3, 'Aplikasi berbasis desktop merupakan teknologi berbasis komputer yang berguna untuk memberikan kemudahan dalam mengelola data sehingga mampu menghasilkan sebuah laporan yang cepat, tepat dan akurat. Percetakan UD. Azka Gemilang adalah jasa percetakan yang terus berkembang di Kota Kisaran yang menerima berbagai jenis pemesanan cetakan. Karena harga jasanya yang terjangkau menjadikannya mulai dikenal masyarakat kalangan menengah ke bawah sehingga mengharuskannya menerima pemesanan yang cukup banyak. Tentu, hal ini akan menjadi sebuah masalah ketika pengelolaan data pemesanan hingga pembayaran tidak dikerjakan dengan baik. Apalagi selama ini pengelolaannya masih bersifat manual sehingga karyawan harus bekerja lebih teliti dalam mencatat pemesanan hingga pembayaran, mencari data pesanan, serta laporan-laporan yang diperlukan. Untuk itu, perlu dilakukan sebuah pengimplementasian sebuah aplikasi berbasis desktop dalam mengelola data tersebut. Pada penelitian ini akan dirancang dan dibangun sebuah aplikasi berbasis desktop untuk mengelola data pemesanan dan pembayaran menggunakan software Visual Studio 2010. Diharapkan dengan aplikasi berbasis desktop yang dibangun dapat membantu dalam mengelola data pemesanan dan pembayaran oleh pemilik dan karyawan percetakan UD. Azka Gemilang Kisaran.', 'pdfArticle/article (11).pdf', NULL, NULL),
('2533c8ed-adbb-4aed-a302-03c45c7e057a', 'Perancangan dan Pembuatan Perangkat Lunak Aplikasi Android untuk Pengolahan Data Transaksi pada Perusahaan Telekomunikasi \"X\" dengan menggunakan Pentaho', '2013-05-03', 'Fanji Hastomo', 3, 'Perusahaan telekomunikasi “X” adalah perusahaan yang bergerak di bidang jasa telekomunikasi seluler di Indonesia, salah satu layanan utamanya adalah Call dan SMS(Short Message Service). Sistem secara otomatis mencatat pada database transaksinya jika terjadi transaksi Call maupun SMS. Kebutuhan akan informasi mengenai jumlah transaksi Call dan SMS berdasarkan lokasi dan waktu tertentu menjadi bagian penting dalam proses pengambilan keputusan. Sistem yang ada sebelumnya belum dapat digunakan untuk mendapatkan informasi secara cepat dan mudah. Diperlukan sebuah aplikasi untuk mengumpulkan, meringkas data, dan memudahkan akses informasi mengenai jumlah transaksi Call dan SMS yang dapat diakses melalui perangkat bergerak. Untuk membantu manajer melakukan analisis data transaksi, informasi tersebut perlu disajikan dalam bentuk grafik. Pada artikel ini menjelaskan tentang pembuatan suatu aplikasi bergerak berbasis Android untuk menampilkan informasi di atas. Data transaksi yang kompleks terlebih dahulu dilakukan proses ETL (Extract,Transform, dan Load) dengan menggunakan Kettle Pentaho untuk mengubah database sumber menjadi data mart. Grafik pada Android dibuat dengan memanfaatkan pustaka AChartEngine. Hasil pengujian menunjukkan bahwa aplikasi dapat menampilkan informasi mengenai jumlah transaksi Calldan SMS dalam bentuk grafik melalui perangkat bergerak berbasis Android. Kemudian untuk pengujian dengan pengisian kuisioner, hasilnya menunjukkan 67,00% menilai baik, 33,67% menilai cukup, dan 0,33% memilih kurang. Berdasarkan hasil tersebut dapat disimpulkan bahwa responden menilai aplikasi secara umum memiliki nilai yang baik.', 'pdfArticle/article (12).pdf', NULL, NULL),
('73a1359e-464a-47a5-ba15-b19322e49331', 'WATER CONTENT AND WEIGHT LOSS CHANGES OF WHITE OYSTERS MUSHROOM (Pleurotus ostreatus) DURING STORAGE', '2023-04-02', 'Ias Marroha Doli Siregar', 1, 'White oyster mushroom is one type of mushroom that is popular in Indonesia. This study aims to determine the rate of change in water content and weight loss of white oyster mushrooms during storage. This study used a Completely Randomized Factorial Design with two treatments with 3 replications. The first treatment (A) was the difference in storage temperature (10, 20 and 30oC) and the second factor (B) was the difference in CO2 gas concentration (control, 20, 30 and 40%). Parameters observed were water content and weight loss. The results showed that the water content before storage was 90.47%, after storage at a temperature of 10oC for 10 days increased in the range 92.71% - 93.81%. The temperature 20oC for 8 days increased in the range 93.54% - 94.02%, while at 30oC for 3 days it increased 94.36%. White oyster mushroom weight before storage ranged from 100.00 g - 110.00 g after storage at 10oC for 10 days weight loss in the range of 2.04% - 2.1%. Storage temperature of 20oC for 8 days decreased in the range of 2.37% - 2.90%, while at 30oC for 3 days it experienced 4.01%. The Q10 value of the highest water content change was obtained at the addition of 30% CO2 with a value of 3.00. The Q10 value of the highest weight loss change was obtained at the addition of 0% CO2 with a value of 1.18.', 'pdfArticle/article (5).pdf', NULL, NULL),
('b952f470-c3cc-4f7b-a7d4-bddb7fe28bbf', 'Optimizing the Growth of Porang Plants (Amorphophallus Muelleri) using a Combination of Market Waste Compost and Growmore Fertilizer', '2023-03-15', 'Indra Purnama', 1, 'Porang (Amorphophallus Muelleri) is a tuber plant from the Araceae family that easily lives in various types and soil conditions. In the food industry porang flour is used as a thickening agent, emulsion stabilizer and gel former, while in the pharmaceutical industry it is used as a coating material. This was do the increased in demand for exports of porang tubers in the form of flour and chips. The increasing demand for porang, so that porang cultivation has economic value. The selection of the appropriate fertilizer is one of the efforts to increase porang productivity. Therefore, the aim of this research was to obtain the scientific data about interaction of organic waste market fertilizers and Growmore fertilizer toward of vegetative growth of porang plants. This research used RAL Factorial have 2 factor with 3 treatments level each others were the first factor is doses of organic waste market fertilizer (0g/polybag, 200 g/polybag and 400 g/polybag) and the second factor is doses of growmore fertilizer (0 g/l, 1 g/l and 2 g/l). The parameters in this research were plant height, petiole diameter, number of petioles and number of lateral roots of porang plant. The result of this research showed that interaction of organic waste market fertilizer and growmore fertilizer was significantly affected by plant height, petiole diameter and number of lateral roots, but did not significantly affect the number of porang petioles. The best treatment obtained from interaction of organic waste market fertilizer at dosage 400g/polybag and growmore fertilizer at a dosage 1g/l.', 'pdfArticle/article (2).pdf', NULL, NULL),
('bbd81ddf-2f72-4b19-910c-be802d628930', 'PRODUKSI FITOHORMON (IAA DAN GA3) ISOLAT CENDAWAN RHIZOSFER TANAMAN BAWANG MERAH (Allium ascolonicum L) SEBAGAI BIOSTIMULAN', '2023-04-15', 'Hikmahwati', 1, 'Plants that are symbiotic with microbes will produce phytohormones optimally, increasing plant tolerance to abiotic and biotic stress, including plant pathogens, so it is necessary to investigate the rhizosphere mushroom of onion plants in Enrekang regency and test the production of phytohormones (IAA and GA3) to determine its potential as a biostimulant in Shallot. This study used soil samples of shallot rhizosphere soil collected at the shallot farming center in Enrekang regency, as well as hormone isolation and testing at Hasanuddin University laboratory of plant diseases. The results obtained are 20 isolates with IAA hormone production ranging from 0.125-3,609 mg / L, with isolate 3 and 7 having the highest IAA production, while GA3 hormone production ranges from 0.991-3,440 mg/L, GA3 production is released in isolates 8, 17, and 19. This demonstrates the high potential of rhizosphere mushrooms as biostimulants.', 'pdfArticle/article (6).pdf', NULL, NULL),
('fa2252b1-6746-4efd-a4eb-8912a90d9a8b', 'VARIASI TINGKAT KANDUNGAN ANTOSIANIN PADA EMPAT VARIETAS LOKAL PADI BERAS HITAM (Oryza sativa L.) INDONESIA', '2023-03-15', 'Abdul Basith', 1, 'Anthocyanin in black rice is a type of pigment that is classified as a flavonoid compound and has a beneficial role as an antioxidant. This study focused on assessing the anthocyanin content level of four local varieties of black rice from Indonesia, specifically Cempo Ireng from Yogyakarta, Wojalaka and Manggarai from East Nusa Tenggara, and Toraja from South Sulawesi. Analysis of total anthocyanin content was carried out based on the absorbance value of rice flour extract at a wavelength of 535 nm with a spectrophotometer. Furthermore, this study was conducted in a randomized group design with varieties as groups and 20 replications of each. The total anthocyanin content measured using a UV-Vis spectrophotometer with an absorbance length of 550 nm and 700 nm. The results of this study showed that there was a significant difference in the level of total anthocyanin content of the four varieties of black rice. Based on the ranking of the average of anthocyanin content level from the lowest to the highest in the four black rice varieties are Toraja (117.2 ppm), Wojalaka (435.38 ppm), Cempo Ireng (734.86 ppm), and Manggarai (1508.89 ppm). Based on the combination with the result of previous study, it shows that the level of anthocyanin content of the varieties of black rice in Indonesia is at the range of 117.29 ppm to 6503.70 ppm.', 'pdfArticle/article (7).pdf', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` varchar(20) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `release_date` date NOT NULL,
  `author` varchar(100) NOT NULL,
  `page` int(11) NOT NULL,
  `synopsis` varchar(2500) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `search_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `publisher`, `category_id`, `release_date`, `author`, `page`, `synopsis`, `cover`, `pdf`, `search_count`, `created_at`, `updated_at`) VALUES
('978-602-02-8701-0', 'Ototidak Belajar Pemograman untuk pemula', 'Kompas Gramedia', 3, '2016-07-13', 'Jubilee Enterprise', 16, 'Buku teks siswa ini terdiri atas tujuh bab. Setiap bab diawali dengan fenomena atau penggunaan teknologi yang mudah ditemukan oleh peserta didik dalam kehidupan sehari-hari. Keterkaitan dunia nyata dengan konsep dan prinsip isika yang sedang dipelajari selalu ditunjukkan. dalam pembahasan materi pembelajaran. Peserta didik dibiasakan untuk melakukan penyelidikan ilmiah agar menemukan konsep isika atau memperdalam pemahaman konsep. Peserta didik juga diajak untuk memiliki kesadaran sebagai warganegara yang bertanggung jawab dalam menanggapi isu-isu global. Bab 1 membahas tentang vektor dimana besaran isika direpresentasikan sebagai bentuk geometri untuk memudahkan dalam memahami isika dan fenomenanya di alam. Bab 2 membahas tentang kinematika yang menjelaskan bagaimana gerak benda tanpa meninjau penyebabnya. Bab 3 membahas tentang dinamika yang menjelaskan bagaimana benda bergerak dan penyebabnya. Bab 4 menjelaskan tentang luida statis dan dinamis. Bab 5 menjelaskan tentang fenomena gelombang pada gelombang cahaya dan gelombang bunyi. Bab 6 menjelaskan tentang kalor sebagai dasar untuk memahami lebih lanjut konsep-konsep termodinamika yang dipelajari pada bab 7.', 'cover/vfhVxL4jDjaGCwXQTH8Nd9O9oIgbPMV1qDTKpARF.jpg', 'pdfBook/b0MOCd5QEPsiaTAHvnM1BPHiJsFuZXxob9Q2LUFP.pdf', 0, '2023-05-29 16:27:07', '2023-05-29 16:27:07'),
('978-612-23-8902-7', 'Burung Kecil Yang Selalu Cemeberut', 'Pratham Books', 4, '2021-07-30', 'Reena I, Puri.', 24, 'Buku ini hadir dengan mengungkapkan konsep-konsep dasar ilmu pendidikan, Landasan Pendidikan, Asas-Asas Pendidikan, Permasalahan dalam Penerapan Asas-asas Pendidikan, dan Pengembangan Penerapan Asas-Asas Pendidikan, Pendidikan Sebagai Suatu Sistem, Komponen-komponen Pendidikan, Penyelenggaraan\r\nSistem Pendidikan Nasional, Beberapa Pemikiran Tentang Pendidikan, Permasalahan-permasalahan Pendidikan, Upaya Penanggulangan Permasalahan Pendidikan, dan Pendidikan Di Era Globalisasi.', 'cover/TyPZc2IiRKpCNujwCxnirwLKjPTiZwVDExyDSSYG.jpg', 'pdfBook/ByzS2DxK1yFgTQfw5va2m24jIgsx4cvjzsw5EMkp.pdf', 0, '2023-05-29 16:36:19', '2023-05-29 16:36:19'),
('978-623-228-221-6', 'Web Programming', 'Graha Ilmu', 3, '2019-08-30', 'Ani Oktariani Sari', 96, 'Buku Web Programing belajar mengenai dasar-dasar pemrograman web disusun untuk keperluan mahasiswa atau siapapun yang ingin belajar mengenai dasar-dasar pemrograman web. Pada buku ini berisi bagaimana dapat membuat membuat website dan belajar dasar-dasar pemrograman web dengan mudah, praktis dan cepat disertakan contoh latihan-latihan.', 'cover/aqoxQK35LMJEce78XSWLhsjNpVkA5brmPtgvZsiP.jpg', 'pdfBook/RJRsU8KYCXSGbT9qoJa8aNjMK9b15A0rgvPkprGj.pdf', 0, '2023-05-29 16:29:16', '2023-05-29 16:29:16'),
('978-623-472-720-3', 'Fisika SMA/MA Kelas XI', 'Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi', 2, '2022-06-30', 'Marianna Magdalena Radjawane', 248, 'Buku teks siswa ini terdiri atas tujuh bab. Setiap bab diawali dengan fenomena atau penggunaan teknologi yang mudah ditemukan oleh peserta didik dalam kehidupan sehari-hari. Keterkaitan dunia nyata dengan konsep dan prinsip isika yang sedang dipelajari selalu ditunjukkan. dalam pembahasan materi pembelajaran. Peserta didik dibiasakan untuk melakukan penyelidikan ilmiah agar menemukan konsep isika atau memperdalam pemahaman konsep. Peserta didik juga diajak untuk memiliki kesadaran sebagai warganegara yang bertanggung jawab dalam menanggapi isu-isu global. Bab 1 membahas tentang vektor dimana besaran isika direpresentasikan sebagai bentuk geometri untuk memudahkan dalam memahami isika dan fenomenanya di alam. Bab 2 membahas tentang kinematika yang menjelaskan bagaimana gerak benda tanpa meninjau penyebabnya. Bab 3 membahas tentang dinamika yang menjelaskan bagaimana benda bergerak dan penyebabnya. Bab 4 menjelaskan tentang luida statis dan dinamis. Bab 5 menjelaskan tentang fenomena gelombang pada gelombang cahaya dan gelombang bunyi. Bab 6 menjelaskan tentang kalor sebagai dasar untuk memahami lebih lanjut konsep-konsep termodinamika yang dipelajari pada bab 7.', 'cover/2ihQwL5es1rqLyquUs2Kl2Z5Dgl1awgLnpUfaPyf.png', 'pdfBook/E8oZwjfLziRH4vfBvd33MJjoXCKxMNAPsRRib0G6.pdf', 0, '2023-05-29 16:24:08', '2023-05-29 16:24:08'),
('978-623-90653-8-6', 'Ilmu Pendidikan', 'Lembaga Peduli Pengembangan Pendidikan Indonesia', 2, '2019-09-11', 'Dr. Rahmat Hidayat, MA', 338, 'Buku ini hadir dengan mengungkapkan konsep-konsep dasar ilmu pendidikan, Landasan Pendidikan, Asas-Asas Pendidikan, Permasalahan dalam Penerapan Asas-asas Pendidikan, dan Pengembangan Penerapan Asas-Asas Pendidikan, Pendidikan Sebagai Suatu Sistem, Komponen-komponen Pendidikan, Penyelenggaraan Sistem Pendidikan Nasional, Beberapa Pemikiran Tentang Pendidikan, Permasalahan-permasalahan Pendidikan, Upaya Penanggulangan Permasalahan Pendidikan, dan Pendidikan Di Era Globalisasi.', 'cover/tqgUOMc4AFtbP658dGuRnRgG3iDRWvBxRbCmeyPu.jpg', 'pdfBook/J918hpnEFDr5Xs4OjWKjfsbFjMSdEd427LWZNHu8.pdf', 0, '2023-05-29 16:33:31', '2023-05-29 16:33:31'),
('978-689-6775-45-3', 'Berani Mimpi Berani Aksi', 'Lembaga Kemahasiswaan ITB', 4, '2009-01-30', 'Idham Padmaya Mahatma', 125, 'Kuliah di Perguruan Tinggi Negeri, dalam hal ini \r\nberkuliah di Institut Teknologi Bandung, saya yakini merupakan cita-cita besar dari banyak anak negeri, baik yang tinggal di kota maupun desa, di Jawa maupun luar Jawa, baik dari kalangan bangsawan ataupun rakyat biasa, baik dari yang berkemampuan ekonomi tinggi maupun yang ‗kurang mampu‘. Karena itu, ketika kita mendapatkan kesempatan untuk belajar di sana, hal itu merupakan suatu anugerah yang luar biasa yang diberikan oleh Tuhan YME, dan di saat yang bersamaan juga merupakan amanah dari orang tua kita, keluarga kita, masyarakat kita dan seluruh rakyat dan bangsa Indonesia kepada kita.', 'cover/KbJrqMaggKv70p54IUNXTHLhQwimrb50VIfrfgO4.jpg', 'pdfBook/tfBCX1kYljGnN5EhR8q7OTm3gDjVmxVSzIJg1ZyK.pdf', 0, '2023-05-29 15:57:08', '2023-05-29 15:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `categoryName` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `categoryName`, `created_at`, `updated_at`) VALUES
(1, 'Science', NULL, NULL),
(2, 'Education', NULL, NULL),
(3, 'Technology', NULL, NULL),
(4, 'Entertaiment', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` char(36) NOT NULL,
  `book_id` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '1_2023_05_28_094442_create_categories_table', 1),
(2, '1_2023_05_29_132105_create_statuses_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_05_26_101309_create_books_table', 1),
(8, '2023_05_26_150233_create_collections_table', 1),
(9, '2023_05_27_094505_create_articles_table', 1),
(10, '2023_05_28_032643_create_reservation_details_table', 1),
(11, '2023_05_29_125614_create_reservations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` char(36) NOT NULL,
  `reser_detail_id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `reservation_date` date NOT NULL,
  `return_date` date NOT NULL,
  `name` varchar(100) NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_details`
--

CREATE TABLE `reservation_details` (
  `reser_detail_id` char(36) NOT NULL,
  `book_id` varchar(20) NOT NULL,
  `library_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `status_name` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`status_id`, `status_name`, `created_at`, `updated_at`) VALUES
(0, 'Ongoing', NULL, NULL),
(1, 'Returned', NULL, NULL),
(2, 'Overdue', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` char(36) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `username`, `dob`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
('33de4992-dae4-4fc2-a359-a6c7715aa123', 'Muhammad', 'Kurniawan', 'ilham', '2023-06-14', 'muhammadilhamkurniawan14@gmail.com', '$2y$10$2LhQ0tRTbg4c1W9IR6Ag3ey0AO0UARCgv.LTZlr/G7EQY2XgDAFWS', 'admin', NULL, '2023-06-13 20:45:02', '2023-06-13 20:45:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `articles_category_id_foreign` (`category_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `books_category_id_foreign` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collections_user_id_foreign` (`user_id`),
  ADD KEY `collections_book_id_foreign` (`book_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`),
  ADD KEY `reservations_reser_detail_id_foreign` (`reser_detail_id`),
  ADD KEY `reservations_status_id_foreign` (`status_id`);

--
-- Indexes for table `reservation_details`
--
ALTER TABLE `reservation_details`
  ADD PRIMARY KEY (`reser_detail_id`),
  ADD KEY `reservation_details_book_id_foreign` (`book_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `status_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `collections`
--
ALTER TABLE `collections`
  ADD CONSTRAINT `collections_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `collections_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_reser_detail_id_foreign` FOREIGN KEY (`reser_detail_id`) REFERENCES `reservation_details` (`reser_detail_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`status_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `reservation_details`
--
ALTER TABLE `reservation_details`
  ADD CONSTRAINT `reservation_details_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
