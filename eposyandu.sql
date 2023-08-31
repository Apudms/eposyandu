-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: eposyandu
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `anaks`
--

DROP TABLE IF EXISTS `anaks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anaks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `anak_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imunisasi_id` bigint unsigned NOT NULL,
  `dusun_id` bigint unsigned NOT NULL,
  `namaAnak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatLahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalLahir` date NOT NULL,
  `namaIbu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaAyah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenisKelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `anaks_imunisasi_id_foreign` (`imunisasi_id`),
  KEY `anaks_dusun_id_foreign` (`dusun_id`),
  CONSTRAINT `anaks_dusun_id_foreign` FOREIGN KEY (`dusun_id`) REFERENCES `dusuns` (`id`) ON DELETE CASCADE,
  CONSTRAINT `anaks_imunisasi_id_foreign` FOREIGN KEY (`imunisasi_id`) REFERENCES `imunisasis` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anaks`
--

LOCK TABLES `anaks` WRITE;
/*!40000 ALTER TABLE `anaks` DISABLE KEYS */;
/*!40000 ALTER TABLE `anaks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dusuns`
--

DROP TABLE IF EXISTS `dusuns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dusuns` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `namaDusun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dusuns_namadusun_unique` (`namaDusun`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dusuns`
--

LOCK TABLES `dusuns` WRITE;
/*!40000 ALTER TABLE `dusuns` DISABLE KEYS */;
INSERT INTO `dusuns` VALUES (1,'Posyandu Mawar','2023-08-30 20:15:17','2023-08-30 20:15:17'),(2,'Posyandu Melati','2023-08-30 20:15:17','2023-08-30 20:15:17'),(3,'Posyandu Nusa Indah','2023-08-30 20:15:17','2023-08-30 20:15:17'),(4,'Posyandu Kenanga','2023-08-30 20:15:17','2023-08-30 20:15:17');
/*!40000 ALTER TABLE `dusuns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ibu_hamils`
--

DROP TABLE IF EXISTS `ibu_hamils`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ibu_hamils` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ibuHamil_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dusun_id` bigint unsigned NOT NULL,
  `namaIbuHamil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatLahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalLahir` date NOT NULL,
  `namaSuami` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalDaftar` date NOT NULL,
  `noTelp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ibu_hamils_dusun_id_foreign` (`dusun_id`),
  CONSTRAINT `ibu_hamils_dusun_id_foreign` FOREIGN KEY (`dusun_id`) REFERENCES `dusuns` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ibu_hamils`
--

LOCK TABLES `ibu_hamils` WRITE;
/*!40000 ALTER TABLE `ibu_hamils` DISABLE KEYS */;
/*!40000 ALTER TABLE `ibu_hamils` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imunisasis`
--

DROP TABLE IF EXISTS `imunisasis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imunisasis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `jenisImun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `imunisasis_jenisimun_unique` (`jenisImun`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imunisasis`
--

LOCK TABLES `imunisasis` WRITE;
/*!40000 ALTER TABLE `imunisasis` DISABLE KEYS */;
INSERT INTO `imunisasis` VALUES (1,'DPT I','2023-08-30 20:15:17','2023-08-30 20:15:17'),(2,'DPT II','2023-08-30 20:15:17','2023-08-30 20:15:17'),(3,'DPT III','2023-08-30 20:15:17','2023-08-30 20:15:17'),(4,'Polio I','2023-08-30 20:15:17','2023-08-30 20:15:17'),(5,'Polio II','2023-08-30 20:15:17','2023-08-30 20:15:17'),(6,'Polio III','2023-08-30 20:15:17','2023-08-30 20:15:17'),(7,'Campak','2023-08-30 20:15:17','2023-08-30 20:15:17'),(8,'MR (Booster)','2023-08-30 20:15:17','2023-08-30 20:15:17');
/*!40000 ALTER TABLE `imunisasis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kaders`
--

DROP TABLE IF EXISTS `kaders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kaders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kader_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dusun_id` bigint unsigned NOT NULL,
  `namaKader` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` enum('Ketua','Sekretaris','Bendahara','Anggota') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Anggota',
  `tempatLahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalLahir` date NOT NULL,
  `noTelp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kaders_dusun_id_foreign` (`dusun_id`),
  CONSTRAINT `kaders_dusun_id_foreign` FOREIGN KEY (`dusun_id`) REFERENCES `dusuns` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kaders`
--

LOCK TABLES `kaders` WRITE;
/*!40000 ALTER TABLE `kaders` DISABLE KEYS */;
/*!40000 ALTER TABLE `kaders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kontrasepsis`
--

DROP TABLE IF EXISTS `kontrasepsis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kontrasepsis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `jenisKontrasepsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kontrasepsis_jeniskontrasepsi_unique` (`jenisKontrasepsi`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kontrasepsis`
--

LOCK TABLES `kontrasepsis` WRITE;
/*!40000 ALTER TABLE `kontrasepsis` DISABLE KEYS */;
INSERT INTO `kontrasepsis` VALUES (1,'IUD','2023-08-30 20:15:17','2023-08-30 20:15:17'),(2,'Suntik','2023-08-30 20:15:17','2023-08-30 20:15:17'),(3,'Implan','2023-08-30 20:15:17','2023-08-30 20:15:17'),(4,'Kondom','2023-08-30 20:15:17','2023-08-30 20:15:17'),(5,'Vasektomi / Tubektomi','2023-08-30 20:15:17','2023-08-30 20:15:17'),(6,'Spermisida','2023-08-30 20:15:17','2023-08-30 20:15:17'),(7,'Diapragma','2023-08-30 20:15:17','2023-08-30 20:15:17'),(8,'Cervical Cap','2023-08-30 20:15:17','2023-08-30 20:15:17'),(9,'Kalender','2023-08-30 20:15:17','2023-08-30 20:15:17');
/*!40000 ALTER TABLE `kontrasepsis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_06_10_203108_create_imunisasis_table',1),(6,'2022_06_10_203126_create_kontrasepsis_table',1),(7,'2022_06_10_203144_create_dusuns_table',1),(8,'2022_06_11_202849_create_anaks_table',1),(9,'2022_06_11_203036_create_ibu_hamils_table',1),(10,'2022_06_11_203052_create_peserta_k_b_s_table',1),(11,'2022_06_12_012816_create_kaders_table',1),(12,'2022_06_18_081912_create_posts_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peserta_k_b_s`
--

DROP TABLE IF EXISTS `peserta_k_b_s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `peserta_k_b_s` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pesertaKB_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontrasepsi_id` bigint unsigned NOT NULL,
  `dusun_id` bigint unsigned NOT NULL,
  `namaPeserta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatLahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalLahir` date NOT NULL,
  `namaPasangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalDaftar` date NOT NULL,
  `noTelp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `peserta_k_b_s_kontrasepsi_id_foreign` (`kontrasepsi_id`),
  KEY `peserta_k_b_s_dusun_id_foreign` (`dusun_id`),
  CONSTRAINT `peserta_k_b_s_dusun_id_foreign` FOREIGN KEY (`dusun_id`) REFERENCES `dusuns` (`id`) ON DELETE CASCADE,
  CONSTRAINT `peserta_k_b_s_kontrasepsi_id_foreign` FOREIGN KEY (`kontrasepsi_id`) REFERENCES `kontrasepsis` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peserta_k_b_s`
--

LOCK TABLES `peserta_k_b_s` WRITE;
/*!40000 ALTER TABLE `peserta_k_b_s` DISABLE KEYS */;
/*!40000 ALTER TABLE `peserta_k_b_s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` enum('Banner','Tentang','Anak','Bumil','Peserta') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Banner',
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'Posyandu Merayakan Hari Kemerdekaan','Tanggal 17 Agustus merupakan hari berbahagia seluruh rakyat Indonesia, lantaran pada tahun 1945, Indonesia berhasil memproklamasikan kedaulatannya dari jajahan Jepang. Peringatan Hari Kemerdekaan Republik Indonesia ke 75 tahun ini, berbeda dengan tahun-tahun sebelumnya, pasalnya di tahun ini kita merayakan momentum kemerdekaan ditengah masa pandemi corona.\r\n\r\nSesuai dengan Pedoman Peringatan Hari Ulang Tahun ke 75 Kemerdekaan Republik Indonesia Tahun 2020 yang dikeluarkan oleh Menteri Sekretaris Negara Republik Indonesia, sehubung dengan situasi pandemic corona, penyelenggaraan upacara dilaksanakan secara sederhan dan khidmat, sangat minimalis dan mematuhi protokol kesehatan.','Banner','foto-posts/lfyeCEfvA6cmvPz7uBayxrUJ6vjx0IAT0TT2Rm6U.jpg','2023-08-30 20:25:15','2023-08-30 20:25:15'),(2,'Tentang Posyandu Purworejo','Posyandu atau Pos Pelayanan Terpadu merupakan tempat kegiatan masyarakat yang memiliki peran sangat penting.\r\n\r\nPosyandu dinilai mampu membantu mendekatkan pelayanan kesehatan kepada masyarakat.\r\n\r\nSelain itu, posyandu juga mampu memberdayakan para ibu dan memperhatikan kesehatan anak dan keluarga.\r\n\r\nMenurut Cessnasari (2005), posyandu adalah kegiatan dasar yang diselenggarakan dari, oleh dan untuk masyarakat yang dibantu oleh petugas kesehatan.\r\n\r\nSementara menurut Kemenkes R1 (2006), posyandu merupakan wadah pemeliharaan kesehatan yang dilakukan dari, oleh, dan untuk masyarakat dibimbing oleh petugas terkait.\r\n\r\nAdvertisement by\r\nPosyandu biasanya dilakukan satu bulan sekali sesuai hari yang ditentukan oleh pihak terkait.\r\n\r\nPosyandu juga dibagi menjadi beberapa macam, mulai dari posyandu balita, posyandu lansia hingga posyandu remaja.','Tentang','foto-posts/fPKwJC1Vj5xZ0es00T2rEEwhv1s7qHCPWdWwluKW.jpg','2023-08-30 20:29:53','2023-08-30 20:29:53'),(3,'Program Kesehatan Bayi dan Anak Balita','Salah satu program utama posyandu adalah menyelenggarakan pemeriksaan bayi dan balita secara rutin. Hal ini penting dilakukan untuk memantau tumbuh kembang anak dan mendeteksi gangguan tumbuh kembang anak sejak dini.\r\n\r\nJenis pelayanan yang diselenggarakan posyandu untuk balita mencakup penimbangan berat badan, pengukuran tinggi badan dan lingkar kepala anak, evaluasi tumbuh kembang, serta penyuluhan dan konseling tumbuh kembang.\r\n\r\nHasil pemeriksaan tersebut kemudian dicatat di dalam buku KIA (kesehatan ibu dan anak) atau KMS (kartu menuju sehat).','Anak','foto-posts/2rYJXNKcQbEmSwSDOTgAtD9foPv3iOfPZ9wNbe2V.jpg','2023-08-30 20:34:25','2023-08-30 20:34:25'),(4,'Program Kesehatan Ibu Hamil dan Menyusui','Pelayanan yang diberikan posyandu kepada ibu hamil mencakup pemeriksaan kehamilan dan pemantauan gizi. Tak hanya pemeriksaan, ibu hamil juga dapat melakukan konsultasi terkait persiapan persalinan dan pemberian ASI.\r\n\r\nAgar kondisi kehamilan tetap terjaga, ibu hamil bisa mendapatkan vaksin TT untuk mencegah penyakit tetanus yang masih umum terjadi di negara berkembang seperti Indonesia.\r\n\r\nSetelah melahirkan, ibu juga akan mendapatkan suplemen vitamin A dan tablet zat besi yang baik dikonsumsi selama masa menyusui. Tak hanya itu, pemasangan alat kontrasepsi (KB) pascapersalinan juga bisa dilakukan ibu di posyandu jika memungkinkan.','Bumil','foto-posts/5ay1g6vYADXdgDyvyqaHpsuHCdN7wQafdKpjfIXq.jpg','2023-08-30 20:35:46','2023-08-30 20:35:46'),(5,'Keluarga Berencana (KB)','Pelayanan KB di posyandu umumnya diberikan oleh kader dalam bentuk pemberian kondom dan pil KB. Sedangkan, suntik KB hanya dapat diberikan oleh tenaga medis puskesmas. Apabila tersedia ruangan dan peralatan yang menunjang serta tenaga yang terlatih, di posyandu juga dapat dilakukan pemasangan IUD dan implan.','Peserta','foto-posts/LwE3UhpGL7gp8heJG1ptK9c44RYZfIKzJbQ15wl1.jpg','2023-08-30 20:36:49','2023-08-30 20:42:25');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','kaderanak','kaderibuhamil','kaderpesertakb') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'kaderanak',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@gmail.com','admin',NULL,'$2y$10$aFklIJrnu1IUoBZuRdzCAufo5xU4imn1eU6VyzkJKr5fWXXtLsOrW','w3tfn2bVsphVXna2YmZlfXnhXYGTz70MDGPvzMrsFQapVXKZI6F3KuQDlhon','2023-08-30 20:15:17','2023-08-30 20:15:17'),(2,'Kader Data Anak','kaderanak@gmail.com','kaderanak',NULL,'$2y$10$P3zfHnyyzuegKWfAeyxixOBBLalswG/0LXWuwuRrd3SkIEPLz8jQa','1WrQacwLue4MixRXZCsV','2023-08-30 20:15:17','2023-08-30 20:15:17'),(3,'Kader Data Ibu Hamil','kaderbumil@gmail.com','kaderibuhamil',NULL,'$2y$10$GMLqJxAz41DFe7WlOgY1aOKguNDcLs3guaYBbs8akXtP6/SeZcB6q','zPsNnW5h4TRAm6I5zULo','2023-08-30 20:15:17','2023-08-30 20:15:17'),(4,'Kader Data Peserta KB','kaderpesertakb@gmail.com','kaderpesertakb',NULL,'$2y$10$mSDi2nzwsUEtun3lMAzltuaiEwCwvm7c.Bcko5X3N7FZmD94Y8vWC','Kxyng5lK3bs9M6plMNcT','2023-08-30 20:15:17','2023-08-30 20:15:17');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-31 11:36:45
