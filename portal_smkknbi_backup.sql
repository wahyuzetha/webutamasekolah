SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



DROP TABLE IF EXISTS `extracurricular_galleries`;
CREATE TABLE `extracurricular_galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `extracurricular_id` bigint unsigned NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `extracurricular_galleries_extracurricular_id_foreign` (`extracurricular_id`),
  CONSTRAINT `extracurricular_galleries_extracurricular_id_foreign` FOREIGN KEY (`extracurricular_id`) REFERENCES `extracurriculars` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `extracurricular_galleries` (`id`, `extracurricular_id`, `image_path`, `caption`, `caption_en`, `created_at`, `updated_at`) VALUES ('1', '1', 'extracurricular_galleries/ovSZNs7mfLX2qNRqQkti9oUIianKq5rgbhrQ0uj1.jpg', 'Trofeo VOCKA FC', 'VOCKA FC Trophy', '2026-06-21 01:38:00', '2026-06-21 03:44:53');
INSERT INTO `extracurricular_galleries` (`id`, `extracurricular_id`, `image_path`, `caption`, `caption_en`, `created_at`, `updated_at`) VALUES ('2', '1', 'extracurricular_galleries/VS3TumpX09HExXMKmKz1tjSBGv00lexq72Ht3xuh.jpg', 'Trofeo VOCKA FC 2', 'VOCKA FC Trophy 2', '2026-06-21 01:38:08', '2026-06-21 03:44:54');
INSERT INTO `extracurricular_galleries` (`id`, `extracurricular_id`, `image_path`, `caption`, `caption_en`, `created_at`, `updated_at`) VALUES ('3', '1', 'extracurricular_galleries/D5ulzHCefdRvb5ndiZ1iZw9jXTcRItDx8dCpofZs.jpg', 'Trofeo winong 1', 'Winong Trophy 1', '2026-06-21 01:38:21', '2026-06-21 03:44:55');
INSERT INTO `extracurricular_galleries` (`id`, `extracurricular_id`, `image_path`, `caption`, `caption_en`, `created_at`, `updated_at`) VALUES ('4', '1', 'extracurricular_galleries/MNiPi3U3HS9hA1awkHUzphh0Cbb4zGLWzOXo5u8X.jpg', 'Trofeo winong 2', 'Trofeo Winong 2', '2026-06-21 01:38:30', '2026-06-21 03:44:55');
INSERT INTO `extracurricular_galleries` (`id`, `extracurricular_id`, `image_path`, `caption`, `caption_en`, `created_at`, `updated_at`) VALUES ('5', '1', 'extracurricular_galleries/7pgGJP7LwE3hy9uY154QXAUrJZqMRKTkVFIEskXM.jpg', 'Trofeo butuh', 'Trofeo needed', '2026-06-21 01:38:43', '2026-06-21 03:44:56');
INSERT INTO `extracurricular_galleries` (`id`, `extracurricular_id`, `image_path`, `caption`, `caption_en`, `created_at`, `updated_at`) VALUES ('6', '1', 'extracurricular_galleries/iBw7HIFfVIkOxaCYxNEgthBjTUkkwcSjPTnnWFTS.jpg', 'kebongulo', 'kebongulo', '2026-06-21 01:46:01', '2026-06-21 03:44:56');
INSERT INTO `extracurricular_galleries` (`id`, `extracurricular_id`, `image_path`, `caption`, `caption_en`, `created_at`, `updated_at`) VALUES ('7', '1', 'extracurricular_galleries/hBWuR5XESLm4h4tZmmLwSQH9nhyALu0rA1kQeStn.jpg', 'troveo', 'troveo', '2026-06-21 02:00:04', '2026-06-21 03:44:57');
INSERT INTO `extracurricular_galleries` (`id`, `extracurricular_id`, `image_path`, `caption`, `caption_en`, `created_at`, `updated_at`) VALUES ('8', '1', 'extracurricular_galleries/7l7bvy9gsE6eTBd63XuRNXJ19nt9Y4WT2XX3yDOh.jpg', 'troveo', 'troveo', '2026-06-21 02:00:04', '2026-06-21 03:44:58');
INSERT INTO `extracurricular_galleries` (`id`, `extracurricular_id`, `image_path`, `caption`, `caption_en`, `created_at`, `updated_at`) VALUES ('9', '1', 'extracurricular_galleries/nzKyQJ1K84LV5zqIkAuGXfedyRtmP4u0YLJ7wZRm.jpg', 'troveo', 'troveo', '2026-06-21 02:00:04', '2026-06-21 03:44:58');
INSERT INTO `extracurricular_galleries` (`id`, `extracurricular_id`, `image_path`, `caption`, `caption_en`, `created_at`, `updated_at`) VALUES ('10', '1', 'extracurricular_galleries/l4daH3bwKn0EYjS77nxnmrB1WsTWV16rSS9kq6v2.jpg', 'troveo', 'troveo', '2026-06-21 02:00:04', '2026-06-21 03:44:59');
INSERT INTO `extracurricular_galleries` (`id`, `extracurricular_id`, `image_path`, `caption`, `caption_en`, `created_at`, `updated_at`) VALUES ('11', '2', 'extracurricular_galleries/pNeAQoM2grYDn7rGRl79AW8Sl8PjtJveb8dRQ0xF.jpg', 'Turnamen Futsal Antar SMK', 'Inter-Vocational Futsal Tournament', '2026-06-21 02:00:38', '2026-06-21 03:45:00');
INSERT INTO `extracurricular_galleries` (`id`, `extracurricular_id`, `image_path`, `caption`, `caption_en`, `created_at`, `updated_at`) VALUES ('12', '2', 'extracurricular_galleries/RIL5J90gyTC9FmQp5FGNhcR8J1keoV4hFLtDyv5R.jpg', 'Turnamen Futsal Antar SMK', 'Inter-Vocational Futsal Tournament', '2026-06-21 02:00:38', '2026-06-21 03:45:00');
INSERT INTO `extracurricular_galleries` (`id`, `extracurricular_id`, `image_path`, `caption`, `caption_en`, `created_at`, `updated_at`) VALUES ('13', '2', 'extracurricular_galleries/Nxs2FYvoP5t5v3BBL8tbly7nEozSncgzNwDmKwb6.jpg', 'Turnamen Futsal Antar SMK', 'Inter-Vocational Futsal Tournament', '2026-06-21 02:00:38', '2026-06-21 03:45:01');
INSERT INTO `extracurricular_galleries` (`id`, `extracurricular_id`, `image_path`, `caption`, `caption_en`, `created_at`, `updated_at`) VALUES ('14', '2', 'extracurricular_galleries/c4ij6ufiddWFPdtwERBTBMnJkMlPvyZMi1Ojz5ig.jpg', 'Turnamen Futsal Antar SMK', 'Inter-Vocational Futsal Tournament', '2026-06-21 02:00:38', '2026-06-21 03:45:01');
INSERT INTO `extracurricular_galleries` (`id`, `extracurricular_id`, `image_path`, `caption`, `caption_en`, `created_at`, `updated_at`) VALUES ('15', '2', 'extracurricular_galleries/mhAizr1ZfdTuLsREKY3WdRcQKAV7UuHuBm9zoqb8.jpg', 'Turnamen Futsal Antar SMK', 'Inter-Vocational Futsal Tournament', '2026-06-21 02:00:38', '2026-06-21 03:45:02');


DROP TABLE IF EXISTS `extracurriculars`;
CREATE TABLE `extracurriculars` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `extracurriculars_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `extracurriculars` (`id`, `name`, `name_en`, `slug`, `description`, `description_en`, `image_path`, `created_at`, `updated_at`) VALUES ('1', 'SEPAKBOLA', 'FOOTBALL', 'sepakbola', 'Ekstrakurikuler sepak bola dan futsal di SMK Karya Nugraha Boyolali (SMK KNBI) merupakan salah satu wadah pembinaan non-akademik yang sangat diminati oleh para siswa. Sebagai institusi pendidikan vokasi yang menyandang status SMK Pusat Keunggulan, SMK KNBI tidak hanya berfokus mencetak lulusan dengan keahlian teknis di program seperti Teknik Otomotif, Teknik Jaringan Komputer dan Telekomunikasi, serta Akuntansi, tetapi juga sangat peduli pada pengembangan karakter dan fisik siswanya.', 'The extracurricular football and futsal at SMK Karya Nugraha Boyolali (SMK KNBI) is one of the non-academic coaching platforms that is very popular with students. As a vocational education institution that holds the status of Vocational School Center of Excellence, KNBI Vocational School not only focuses on producing graduates with technical skills in programs such as Automotive Engineering, Computer Network and Telecommunications Engineering, and Accounting, but also really cares about the character and physical development of its students.', 'extracurriculars/uWm1SnEmr9wIj3MbXencKrqWAq7EkvUlUN52I8gL.jpg', '2026-06-21 01:24:52', '2026-06-21 03:43:46');
INSERT INTO `extracurriculars` (`id`, `name`, `name_en`, `slug`, `description`, `description_en`, `image_path`, `created_at`, `updated_at`) VALUES ('2', 'Futsal', 'Futsal', 'kanuby FC', 'Ekstrakurikuler Futsal di SMK Karya Nugraha Boyolali (SMK KNBI) merupakan salah satu primadona kegiatan non-akademik yang sangat digandrungi oleh para siswa. Berbeda dengan sepak bola lapangan besar, futsal menawarkan tempo permainan yang lebih cepat dan dinamis, sangat cocok dengan jiwa muda dan energi siswa SMK. Sebagai SMK Pusat Keunggulan, sekolah memfasilitasi kegiatan ini untuk menyalurkan bakat olahraga sekaligus membangun mentalitas juara.', 'Extracurricular Futsal at Karya Nugraha Boyolali Vocational School (SMK KNBI) is one of the excellent non-academic activities that is very popular with students. In contrast to large field soccer, futsal offers a faster and more dynamic game tempo, which is very suitable for the youth and energy of vocational school students. As a Vocational School Center of Excellence, the school facilitates this activity to channel sports talent while building a winning mentality.', 'extracurriculars/VuDwaxTSEjBBvupBOA5Rw7H29SEhbH1BezvIziLL.jpg', '2026-06-21 01:50:40', '2026-06-21 03:43:48');


DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



DROP TABLE IF EXISTS `features`;
CREATE TABLE `features` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



DROP TABLE IF EXISTS `majors`;
CREATE TABLE `majors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `majors_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `majors` (`id`, `name`, `name_en`, `slug`, `description`, `description_en`, `image_path`, `created_at`, `updated_at`) VALUES ('1', 'Teknik Kendaraan Ringan Otomotif', 'Automotive Light Vehicle Engineering', 'TKRO', 'Ini adalah salah satu jurusan atau program keahlian populer di Sekolah Menengah Kejuruan SMK Karya Nugraha Boyolali di bidang otomotif. Siswa mempelajari keterampilan perawatan, perbaikan, dan perakitan kendaraan roda empat atau lebih. Lulusannya dipersiapkan untuk menjadi teknisi ahli di bengkel resmi atau operator di industri manufaktur otomotif.', 'This is one of the popular majors or skills programs at the Vocational High School, Vocational School, Karya Nugraha Boyolali in the automotive field. Students learn maintenance, repair, and assembly skills for four- or more-wheeled vehicles. Graduates are prepared to become expert technicians in authorized workshops or operators in the automotive manufacturing industry.', 'majors/EhnV0DHwCSHc5tXoMjSgyUs8DnsdUxOKYzsqiYs2.png', '2026-06-16 13:00:17', '2026-06-21 03:43:34');
INSERT INTO `majors` (`id`, `name`, `name_en`, `slug`, `description`, `description_en`, `image_path`, `created_at`, `updated_at`) VALUES ('2', 'Teknik Bodi Kendaraan Ringan Otomotif', 'Automotive Light Vehicle Body Engineering', 'TBKRO', 'Konsentrasi Keahlian TBKR (Teknik Bodi Kendaraan Ringan adalah jurusan yang memberikan pengetahuan dan keterampilan kepada peserta didik tentang: \r\n\r\nDasar-Dasar tomotif\r\nPengecetan Bodi Otomotif\r\nPerbaikan Panel-Panel Bodi\r\nPerbaikan Kelistrikan Bodi dan Aksesoris\r\nPerbaikan dan Pemeliharaan Interior Mobil\r\nProduk Kreatif dan Kewirausahaan', 'TBKR Expertise Concentration (Light Vehicle Body Engineering) is a major that provides knowledge and skills to students regarding: \r\n\r\nAutomotive Basics\r\nAutomotive Body Painting\r\nRepair of Body Panels\r\nBody Electrical Repair and Accessories\r\nCar Interior Repair and Maintenance\r\nCreative Products and Entrepreneurship', 'majors/UOionQ1eni9MAFPY5REp6M50YPvpR7TkxHJgJ9JB.png', '2026-06-16 13:01:34', '2026-06-21 03:43:36');
INSERT INTO `majors` (`id`, `name`, `name_en`, `slug`, `description`, `description_en`, `image_path`, `created_at`, `updated_at`) VALUES ('3', 'Teknik Bisnis Sepeda Motor', 'Motorcycle Business Engineering', 'TBSM', 'Jurusan Teknik Sepeda Motor (TSM)—yang kini sering disebut sebagai jurusan Teknik dan Bisnis Sepeda Motor (TBSM) pada Kurikulum Merdeka—adalah salah satu program keahlian favorit di Sekolah Menengah Kejuruan (SMK). Jurusan ini berfokus pada keterampilan teknis mekanik, perawatan, perbaikan, serta pengelolaan bisnis sepeda motor.', 'The Motorcycle Engineering Department (TSM)—which is now often referred to as the Motorcycle Engineering and Business Department (TBSM) in the Independent Curriculum—is one of the favorite skills programs at Vocational High Schools (SMK). This major focuses on technical mechanical skills, maintenance, repair, and management of motorbike businesses.', 'majors/29iz3QM2bvrFrH3gc1jfpmK3DLpdGulUlm64hOnb.png', '2026-06-16 13:03:07', '2026-06-21 03:43:38');
INSERT INTO `majors` (`id`, `name`, `name_en`, `slug`, `description`, `description_en`, `image_path`, `created_at`, `updated_at`) VALUES ('4', 'Teknik Komputer dan Jaringan', 'Computer and Network Engineering', 'TKJ', 'Jurusan TKJ (Teknik Komputer dan Jaringan) adalah program keahlian di tingkat Sekolah Menengah Kejuruan (SMK) yang mempelajari seluk-beluk perakitan komputer, instalasi sistem operasi, pengelolaan jaringan internet, serta administrasi server.', 'The TKJ (Computer and Network Engineering) major is a skills program at the Vocational High School (SMK) level that studies the ins and outs of computer assembly, operating system installation, internet network management, and server administration.', 'majors/u7qe789AICUHxYzDF53q37ErtmhJDpd98skeVPSC.png', '2026-06-16 13:05:15', '2026-06-21 03:43:39');
INSERT INTO `majors` (`id`, `name`, `name_en`, `slug`, `description`, `description_en`, `image_path`, `created_at`, `updated_at`) VALUES ('5', 'Teknik Komputer dan Jaringan dan Tata Busana', 'Computer and Network Engineering and Fashion Design', 'TKJ +', 'Jurusan TKJ (Teknik Komputer dan Jaringan) adalah program keahlian di tingkat Sekolah Menengah Kejuruan (SMK) yang mempelajari seluk-beluk perakitan komputer, instalasi sistem operasi, pengelolaan jaringan internet, serta administrasi server.', 'The TKJ (Computer and Network Engineering) major is a skills program at the Vocational High School (SMK) level that studies the ins and outs of computer assembly, operating system installation, internet network management, and server administration.', 'majors/5kJUgeYc48nKG50uyrs2apfTijV4nhalpbqT67nZ.png', '2026-06-16 13:05:41', '2026-06-21 03:43:41');
INSERT INTO `majors` (`id`, `name`, `name_en`, `slug`, `description`, `description_en`, `image_path`, `created_at`, `updated_at`) VALUES ('6', 'Perbankan Syariah', 'Sharia Banking', 'PSY', 'Jurusan Perbankan Syariah adalah program studi yang mempelajari ilmu keuangan, akuntansi, dan operasional perbankan yang dijalankan berdasarkan prinsip-prinsip hukum Islam (syariah)', 'The Sharia Banking Department is a study program that studies finance, accounting and banking operations which are carried out based on the principles of Islamic law (shariah).', 'majors/Fc8BNcPM48nmnD9ZTM8jhQPX8UVpHPMmPrTBEzlz.png', '2026-06-16 13:06:16', '2026-06-21 03:43:43');
INSERT INTO `majors` (`id`, `name`, `name_en`, `slug`, `description`, `description_en`, `image_path`, `created_at`, `updated_at`) VALUES ('7', 'teknik Transmisi dan Telekomunikasi', 'Transmission and Telecommunications engineering', 'TTT', 'Jurusan Teknik Transmisi Telekomunikasi adalah program keahlian tingkat SMK yang secara khusus mempelajari teknologi pengiriman data, suara, video, dan informasi melalui berbagai media komunikasi jarak jauh', 'The Telecommunication Transmission Engineering Department is a vocational level skills program that specifically studies data, voice, video and information transmission technology via various long-distance communication media.', 'majors/CcK9ng4X4jztMgCJfgx6aU7XbvPdQXlDjTR778eY.png', '2026-06-16 13:06:57', '2026-06-21 03:43:45');


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('1', '0001_01_01_000000_create_users_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('2', '0001_01_01_000001_create_cache_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('3', '0001_01_01_000002_create_jobs_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('4', '2026_06_15_190233_create_posts_table', '2');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('5', '2026_06_16_032720_create_sliders_table', '3');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('6', '2026_06_16_032721_create_majors_table', '3');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('7', '2026_06_16_032721_create_settings_table', '3');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('8', '2026_06_16_090637_create_teachers_table', '4');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('9', '2026_06_16_092657_add_details_to_teachers_table', '5');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('10', '2026_06_16_103000_create_features_table', '6');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('11', '2026_06_20_165000_create_extracurriculars_table', '7');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('12', '2026_06_21_013000_create_extracurricular_galleries_table', '8');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('13', '2026_06_21_021500_add_english_columns_to_all_tables', '9');


DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_en` longtext COLLATE utf8mb4_unicode_ci,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_author_id_foreign` (`author_id`),
  CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `posts` (`id`, `title`, `title_en`, `slug`, `content`, `content_en`, `image_path`, `author_id`, `created_at`, `updated_at`) VALUES ('1', 'MikroTik Academy SMK Karya Nugraha Boyolali – Kolaborasi Bersama Axioo Class Program', 'MikroTik Academy SMK Karya Nugraha Boyolali – Collaboration with Axioo Class Program', 'mikrotik-academy-smk-karya-nugraha-boyolali-kolaborasi-bersama-axioo-class-program', 'SMK Karya Nugraha Boyolali menghadirkan program unggulan MikroTik Academy sebagai bentuk komitmen dalam mencetak lulusan yang kompeten di bidang jaringan komputer dan telekomunikasi. Program ini diselenggarakan melalui kerja sama strategis dengan Axioo Class Program (ACP), yang berfokus pada penguatan keterampilan berbasis industri.\r\n\r\nMikroTik Academy merupakan program resmi yang memberikan pembelajaran mendalam mengenai konfigurasi dan manajemen jaringan menggunakan perangkat MikroTik. Siswa tidak hanya mempelajari teori, tetapi juga mendapatkan pengalaman praktik langsung melalui laboratorium jaringan yang mendukung pembelajaran berbasis proyek (project-based learning).\r\n\r\nMelalui kolaborasi dengan Axioo Class Program, siswa memperoleh tambahan nilai berupa kurikulum yang selaras dengan kebutuhan dunia kerja, pembekalan soft skill, serta peluang sertifikasi yang diakui secara internasional. Program ini juga didukung oleh tenaga pengajar yang telah tersertifikasi dan berpengalaman di bidang jaringan.\r\n\r\nDengan adanya MikroTik Academy di SMK Karya Nugraha Boyolali, diharapkan lulusan mampu:\r\n\r\nMenguasai konfigurasi jaringan berbasis MikroTik\r\nMemiliki kompetensi yang siap bersaing di dunia industri\r\nMendapatkan sertifikasi sebagai nilai tambah profesional\r\nBeradaptasi dengan perkembangan teknologi jaringan terkini\r\n\r\nProgram ini menjadi langkah nyata sekolah dalam menjembatani dunia pendidikan dengan kebutuhan industri, sehingga siswa siap kerja, siap bersaing, dan siap berkarya di era digital.\r\n\r\nsmk_karya_nugraha_boyolali\r\nEmail : Smkknbi@gmail.com', 'Vocational School Karya Nugraha Boyolali presents the flagship MikroTik Academy program as a form of commitment to producing graduates who are competent in the fields of computer networks and telecommunications. This program is held in strategic collaboration with the Axioo Class Program (ACP), which focuses on strengthening industry-based skills.\r\n\r\nMikroTik Academy is an official program that provides in-depth learning about network configuration and management using MikroTik devices. Students not only learn theory, but also gain direct practical experience through network laboratories that support project-based learning.\r\n\r\nThrough collaboration with the Axioo Class Program, students gain additional value in the form of a curriculum that is aligned with the needs of the world of work, soft skills provision, and internationally recognized certification opportunities. This program is also supported by teaching staff who are certified and experienced in the field of networking.\r\n\r\nWith the MikroTik Academy at Karya Nugraha Boyolali Vocational School, it is hoped that graduates will be able to:\r\n\r\nMastering MikroTik-based network configuration\r\nHave competencies that are ready to compete in the industrial world\r\nObtaining certification as a professional added value\r\nAdapt to the latest network technology developments\r\n\r\nThis program is a real step for the school to bridge the world of education with industrial needs, so that students are ready to work, ready to compete, and ready to work in the digital era.\r\n\r\nsmk_karya_nugraha_boyolali\r\nEmail: Smkknbi@gmail.com', 'posts/g4NwMEIzjIeE2Caf2OD22eBp2ltopK4lNSQC0QgS.png', '1', '2026-06-16 11:55:26', '2026-06-21 03:43:28');
INSERT INTO `posts` (`id`, `title`, `title_en`, `slug`, `content`, `content_en`, `image_path`, `author_id`, `created_at`, `updated_at`) VALUES ('2', 'SMK Karya Nugraha Boyolali Siap Berkompetisi di LKS Provinsi Jawa Tengah 2026 Banyumas', 'Karya Nugraha Boyolali Vocational School Ready to Compete in LKS Central Java Province 2026 Banyumas', 'smk-karya-nugraha-boyolali-siap-berkompetisi-di-lks-provinsi-jawa-tengah-2026-banyumas', 'LKS Provinsi Jawa Tengah 2026 yang digelar di Banyumas pada April ini menjadi salah satu momentum strategis dalam pemetaan kompetensi siswa kejuruan di Jawa Tengah. Sebagai ajang seleksi resmi menuju LKS Nasional, kompetisi ini mengadopsi standar penilaian yang selaras dengan kualifikasi industri dan kerangka kualifikasi nasional (KKNI).\r\n\r\nTiga Bidang, Tiga Spesialisasi\r\nKetiga perwakilan SMK Karya Nugraha turun di bidang yang menuntut ketelitian, kecepatan, dan pemahaman teknis mendalam:\r\n\r\nInformation Network Cabling (INC)\r\nBidang ini menguji kemampuan peserta dalam merancang, memasang, menguji, dan melakukan troubleshooting jaringan kabel data sesuai standar internasional (TIA/EIA & ISO/IEC). Peserta dituntut menguasai topologi jaringan, terminasi kabel, pengujian sinyal, serta dokumentasi teknis yang rapi dan terukur.\r\nCar Repair (Perawatan & Perbaikan Kendaraan Ringan)\r\nKompetensi ini berfokus pada diagnosa kerusakan, perawatan berkala, dan perbaikan sistem kendaraan roda empat. Peserta harus mampu bekerja dengan prosedur keselamatan kerja (K3), menggunakan alat ukur presisi, membaca wiring diagram, serta menyelesaikan tantangan perbaikan sesuai standar pabrikan dalam waktu terbatas.\r\nTeknik Sepeda Motor\r\nBidang ini menguji kompetensi dalam perawatan, perbaikan, dan penyetelan sepeda motor, mencakup sistem mesin, kelistrikan, chasis, suspensi, serta pengendalian emisi. Peserta harus menunjukkan kemampuan analitis, penggunaan alat bengkel modern, serta efisiensi waktu dalam menyelesaikan modul kompetensi.\r\nPersiapan Matang dan Dukungan Penuh\r\nKetiga siswa perwakilan telah melalui proses seleksi ketat di tingkat Kabupaten Boyolali. Selama beberapa bulan terakhir, SMK Karya Nugraha menggelar program intensif berupa simulasi kompetisi, pendalaman teori, praktik bengkel terstruktur, serta pembinaan mental dan manajemen waktu. Fasilitas laboratorium jaringan dan bengkel otomotif sekolah juga telah dioptimalkan untuk mendukung latihan berbasis standar LKS.\r\n\r\nDukungan tidak hanya datang dari internal sekolah. Dinas Pendidikan dan Kebudayaan Kabupaten Boyolali, serta sejumlah mitra industri otomotif dan TI setempat, turut memberikan fasilitas pelatihan, akses modul kompetensi terkini, dan pendampingan teknis. Kepala SMK Karya Nugraha menegaskan bahwa partisipasi di LKS 2026 bukan sekadar mengejar medali, melainkan bagian dari upaya nyata menyiapkan lulusan yang industry-ready.\r\n\r\n“LKS adalah laboratorium nyata. Di sini siswa belajar menghadapi tekanan waktu, standar industri, dan evaluasi objektif. Apapun hasilnya, pengalaman ini akan membentuk profesional muda yang siap bersaing di dunia kerja maupun wirausaha,” ujar Kepala SMK Karya Nugraha.\r\n\r\nHarapan dan Dampak Jangka Panjang\r\nKeikutsertaan ketiga perwakilan ini diharapkan dapat memicu motivasi siswa SMK lain di Boyolali untuk mengasah kompetensi teknis sejak dini. Selain itu, partisipasi di LKS Provinsi juga menjadi sarana jejaring dengan pembimbing, assesor, dan praktisi industri dari berbagai daerah di Jawa Tengah.\r\n\r\nDengan tekad kuat, persiapan terstruktur, dan dukungan ekosistem pendidikan vokasi yang solid, kontingen SMK Karya Nugraha siap menyumbangkan performa terbaik bagi Kabupaten Boyolali di panggung LKS Provinsi Jawa Tengah 2026 Banyumas. Langkah mereka menjadi bukti nyata bahwa keterampilan teknis, disiplin, dan inovasi adalah modal utama generasi muda Indonesia dalam menghadapi era transformasi industri dan digital.', 'The 2026 Central Java Province LKS which was held in Banyumas in April became a strategic momentum in mapping the competencies of vocational students in Central Java. As an official selection event for the National LKS, this competition adopts assessment standards that are in line with industry qualifications and the national qualifications framework (KKNI).\r\n\r\nThree Fields, Three Specializations\r\nThe three representatives from Karya Nugraha Vocational School took part in fields that require precision, speed and in-depth technical understanding:\r\n\r\nInformation Network Cabling (INC)\r\nThis field tests participants\' abilities in designing, installing, testing and troubleshooting data cable networks according to international standards (TIA/EIA & ISO/IEC). Participants are required to master network topology, cable termination, signal testing, as well as neat and measurable technical documentation.\r\nCar Repair (Light Vehicle Maintenance & Repair)\r\nThis competency focuses on damage diagnosis, regular maintenance and repair of four-wheeled vehicle systems. Participants must be able to work with work safety procedures (K3), use precision measuring tools, read wiring diagrams, and complete repair challenges according to manufacturer standards within a limited time.\r\nMotorcycle Engineering\r\nThis field tests competency in maintenance, repair and adjustment of motorbikes, including engine, electrical, chassis, suspension and emission control systems. Participants must demonstrate analytical skills, use of modern workshop tools, and time efficiency in completing competency modules.\r\nThorough Preparation and Full Support\r\nThe three representative students have gone through a strict selection process at the Boyolali Regency level. Over the past few months, Karya Nugraha Vocational School has held an intensive program in the form of competition simulations, theoretical deepening, structured workshop practice, as well as mental development and time management. The school\'s networked laboratory and automotive workshop facilities have also been optimized to support LKS standards-based exercises.\r\n\r\nSupport does not only come from within the school. The Boyolali Regency Education and Culture Office, as well as a number of local automotive and IT industry partners, also provide training facilities, access to the latest competency modules, and technical assistance. The Head of Vocational School Karya Nugraha emphasized that participation in LKS 2026 is not just about chasing medals, but is part of a real effort to prepare graduates who are industry-ready.\r\n\r\n\"LKS is a real laboratory. Here students learn to deal with time pressure, industry standards and objective evaluations. Whatever the results, this experience will form young professionals who are ready to compete in the world of work and entrepreneurship,\" said the Head of Vocational School Karya Nugraha.\r\n\r\nExpectations and Long-Term Impact\r\nIt is hoped that the participation of these three representatives will motivate other vocational school students in Boyolali to hone their technical competencies from an early age. Apart from that, participation in the Provincial LKS also provides a means of networking with mentors, assessors and industry practitioners from various regions in Central Java.\r\n\r\nWith strong determination, structured preparation, and support from a solid vocational education ecosystem, the Karya Nugraha Vocational School contingent is ready to contribute the best performance to Boyolali Regency on the 2026 Banyumas Central Java Province LKS stage. Their steps are clear proof that technical skills, discipline and innovation are the main capital for Indonesia\'s young generation in facing the era of industrial and digital transformation.', 'posts/ghe6IHFsmBIV8h7sku2imieVM2XdxBIFzGdF34rN.jpg', '1', '2026-06-16 11:56:39', '2026-06-21 03:43:31');
INSERT INTO `posts` (`id`, `title`, `title_en`, `slug`, `content`, `content_en`, `image_path`, `author_id`, `created_at`, `updated_at`) VALUES ('3', 'Selamat Hari Raya Idul Adha 1447 H', 'Happy Eid al-Adha 1447 H', 'selamat-hari-raya-idul-adha-1447-h', 'Keluarga besar SMK Karya Nugraha Boyolali dengan penuh rasa syukur mengucapkan Selamat Hari Raya Idul Adha 1447 H kepada seluruh umat Muslim, khususnya bagi para siswa, guru, staf, serta wali murid. Momentum hari raya kurban ini senantiasa mengingatkan kita akan esensi sejati dari keikhlasan, pengorbanan, dan ketaatan tanpa batas yang telah diteladani oleh Nabi Ibrahim AS beserta putranya, Nabi Ismail AS. Melalui perayaan tahun ini, sekolah mengajak seluruh warga sekolah untuk merenungkan kembali nilai-nilai luhur tersebut dan menjadikannya sebagai kompas moral dalam menjalani kehidupan sehari-hari, baik di lingkungan pendidikan maupun di tengah masyarakat.\r\n\r\nDi era modern ini, SMK Karya Nugraha Boyolali berkomitmen untuk tidak hanya mencetak generasi yang unggul secara kompetensi dan teknologi, tetapi juga berkarakter religius serta humanis. Semangat berbagi yang tercermin dari ibadah kurban diharapkan dapat mempererat tali silaturahmi, menumbuhkan rasa empati sosial yang tinggi, serta memperkokoh rasa kepedulian antar sesama. Semoga keikhlasan kita dalam berkurban tahun ini menjadi berkah yang melimpah, menguatkan keteguhan iman, dan senantiasa menginspirasi kita untuk terus saling membantu serta bergotong-royong dalam kebaikan demi kemajuan bersama.', 'The extended family of SMK Karya Nugraha Boyolali gratefully wishes all Muslims a Happy Eid al-Adha 1447 H, especially students, teachers, staff and parents. The momentum of this sacrificial holiday always reminds us of the true essence of sincerity, sacrifice and unlimited obedience that was exemplified by Prophet Ibrahim AS and his son, Prophet Ismail AS. Through this year\'s celebration, the school invites all school members to reflect on these noble values ​​and use them as a moral compass in living their daily lives, both in the educational environment and in society.\r\n\r\nIn this modern era, Karya Nugraha Boyolali Vocational School is committed to not only producing a generation that is superior in competence and technology, but also has a religious and humanist character. It is hoped that the spirit of sharing reflected in the sacrificial service can strengthen ties of friendship, foster a high sense of social empathy, and strengthen feelings of caring for each other. May our sincerity in sacrificing this year be an abundant blessing, strengthen the steadfastness of our faith, and always inspire us to continue to help each other and work together in goodness for mutual progress.', 'posts/9OHXj5Htq0gwLVDxKM7dw7bpTC5BTzPIvw4Iy5Y6.png', '1', '2026-06-16 11:57:27', '2026-06-21 03:43:33');


DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('54JOSCRCYKDgpEezsTPpx1t8F3eLRX9BUUDdSLuQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJWVXljVmZBWVJoazlHNDlDbzFoUDN1cVNvdzkxaHpsd2NES2xaOWdTIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BvcnRhbC1zbWtrbmJpLnRlc3RcLz9oZXJkPXByZXZpZXciLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', '1782011207');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('8tCynjKLl7Yvicb8DqqwgRHQfmq7V1aKLrslxRqt', '1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJIaUI4ZkhwdTlwa0FudEJUR0ZldnZqcnJLTVBRTlluYmN0QWhSY2oyIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BvcnRhbC1zbWtrbmJpLnRlc3QiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJ1cmwiOltdLCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MSwibG9jYWxlIjoiZW4ifQ==', '1782017858');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('b07yhkxejFH6cC0cYMeAvB9nJy8LAiyWyQQXDfbQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJpTWZramlqM2VnRk9pdFRQWEVJYlVrN2lUYThrdzRxQ1pnN2ttNWROIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BvcnRhbC1zbWtrbmJpLnRlc3RcLz9oZXJkPXByZXZpZXciLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', '1782012854');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('DR8jnNQj4viOxA6450YIRy8ppne8TpNH49eXEgyG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJUWW90QjJEUHJsdW9EYnZBWjU0VjZBemFpOXA2SnM1Ym0xTXdLeGFFIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BvcnRhbC1zbWtrbmJpLnRlc3RcLz9oZXJkPXByZXZpZXciLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', '1782011253');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('EdALTxobzsIP384YLI0IfL9VHzphRzOHMOqWeIRq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJSWGp5ZXdaOGc3eE8zOFdqVXhQclBnQlp3Q3BUY3VTbHhiRGJ6TG1oIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BvcnRhbC1zbWtrbmJpLnRlc3RcLz9oZXJkPXByZXZpZXciLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', '1782011068');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('GUpISY4PbtpAFXuY1URFLSKACdyPTFxxpTwvM0Yz', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJtSllXMmdjNktmcWlCU2hrOVVZeHhHR2hEWW1lY1A3V2pXMWYwdldaIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BvcnRhbC1zbWtrbmJpLnRlc3RcLz9oZXJkPXByZXZpZXciLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', '1782011100');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('mTs3w8Lm8FJ0Uhak4beC7gmjZVKgBFuvqe0zwXDo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiI1ZnFQUWtqS1FCYTRrQ1JoemRHV1hNdDRSQUNDMUZZTjQ2ZHBCNHBDIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BvcnRhbC1zbWtrbmJpLnRlc3RcLz9oZXJkPXByZXZpZXciLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', '1782011021');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('nXLGyqRABizNl3V0ADp2RcRXN2xH4laYDtExnUdN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJXMGtzSzhlaXlwZlRnNVZpcDJ4c3FOMkcwS2JrSWVrWGVBR3dIN0FJIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BvcnRhbC1zbWtrbmJpLnRlc3RcLz9oZXJkPXByZXZpZXciLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', '1782011227');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('R6POLxXa3UuizGrFbV9goGa4UVwsIhLrmeNEML7G', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJ3QTZsVTBHQ05nYzlsZGJTT01mem02ekdyMnFhZEFPanFTRU5LcDV5IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BvcnRhbC1zbWtrbmJpLnRlc3RcLz9oZXJkPXByZXZpZXciLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', '1782013087');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('RMaFo4qUUgn7y9HLBRNgNYOzBnEC1jXTdH3jpzLe', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJDTHhyemtKRmpndDBnNTkwamk5ckVoUG9PblpHOXJIeU5JTVVnSk5UIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BvcnRhbC1zbWtrbmJpLnRlc3RcLz9oZXJkPXByZXZpZXciLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', '1782014732');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('scpH6U9N5t3M2gIBEC1CjsnSSFuwt0UrDLS2jIdD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJXZklzeHlWVldFN0hab21tS1FrTnNDb3l1REhkUXp0bER1encwRXkxIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BvcnRhbC1zbWtrbmJpLnRlc3RcLz9oZXJkPXByZXZpZXciLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', '1782013752');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('SIqxk1QMrMU3sPM9OLsWwgpp1UcXpNRAIRuKtvuv', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJNTjRENGs0Z01tb0xISHBzYk1oYU95OGdTVXFNdHFOU1dkSWJxY3NoIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BvcnRhbC1zbWtrbmJpLnRlc3RcLz9oZXJkPXByZXZpZXciLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', '1782011321');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('U1o9MNQq456TOGunXWtWWb4B4OjlVR6cctR9X3Y1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJQRnlDSzYwZDdZcGxTaVkwZlZ2NWlNOURFSXN1SjdHOUNBdFhNeEdMIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BvcnRhbC1zbWtrbmJpLnRlc3RcLz9oZXJkPXByZXZpZXciLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', '1782011177');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('UsXFnCLgk2BAhnCTxTd5kgPPHsJKMcDywGAUkq1s', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJpQ2NTOVk4SG1McDNzR2lJQXNXa2t4QTh4ZU9PRndPRGxNeG9nc290IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BvcnRhbC1zbWtrbmJpLnRlc3RcLz9oZXJkPXByZXZpZXciLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', '1782011356');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('VG8Yzc1QvckqDJqJW7GmSsvWipmiebcMG2FJQSoT', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiI3VzJCREt3ZlA2QzV4WVgwUTBlWXV0cVJLSEJuaVgyMWluTHlPMmdLIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BvcnRhbC1zbWtrbmJpLnRlc3RcLz9oZXJkPXByZXZpZXciLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', '1782017858');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('WcHIsP0bJs25nen4dnIUTCXZxvYAMOiZaZy99rzd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJ2RURDM28yV0s2VW92aGlRVUpQb29QTExVcDJuTkc0d0Y4SllBZ1ZsIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BvcnRhbC1zbWtrbmJpLnRlc3RcLz9oZXJkPXByZXZpZXciLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', '1782011130');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('WGbj50R3ooEF9PXeQVUBQFc2yhRf3cSGFKIzqiFL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiIxblJoME1sUERXY0o0WkpWQTJIWEZNdVRqajFaWXNnc2VON0ZGYmJCIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BvcnRhbC1zbWtrbmJpLnRlc3RcLz9oZXJkPXByZXZpZXciLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', '1782011304');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('WQvBwc6SYr0tjqzamau0grbUAFExNk9RDY8WGzuM', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJHeHlmOUl4dDlmcjV1MUhVODViTGhWcDVlNjE5alg0Qjg2dmdTdXJEIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BvcnRhbC1zbWtrbmJpLnRlc3RcLz9oZXJkPXByZXZpZXciLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', '1782011394');


DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('1', 'school_name', 'SMK KARYA NUGRAHA BOYOLALI', '2026-06-16 08:59:06', '2026-06-16 08:59:06');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('2', 'school_phone', '(0276) 321749', '2026-06-16 08:59:06', '2026-06-16 08:59:06');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('3', 'school_email', 'smkknbi@gmail.com', '2026-06-16 08:59:06', '2026-06-16 08:59:06');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('4', 'school_facebook', NULL, '2026-06-16 08:59:06', '2026-06-16 08:59:06');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('5', 'school_instagram', 'https://www.instagram.com/smkknbiofficial/', '2026-06-16 08:59:06', '2026-06-16 08:59:06');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('6', 'school_youtube', 'https://www.youtube.com/@officialsmkkaryanugrahaboy8425', '2026-06-16 08:59:06', '2026-06-16 08:59:06');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('7', 'school_address', 'Jl. Sandang Lawe No.42, Dusun 3, Karanggeneng, Kec. Boyolali, Kabupaten Boyolali', '2026-06-16 08:59:06', '2026-06-16 08:59:06');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('8', 'school_about', 'SMKS Karya Nugraha Boyolali adalah sekolah menengah kejuruan swasta unggulan di Kabupaten Boyolali yang berfokus pada teknologi dan industri.', '2026-06-16 08:59:06', '2026-06-16 08:59:06');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('9', 'top_phone', '+62 812 3456 7890', '2026-06-16 11:13:20', '2026-06-16 11:13:20');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('10', 'top_email', 'info@smkknbi.sch.id', '2026-06-16 11:13:20', '2026-06-16 11:13:20');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('11', 'top_cta_text', 'MAU JADI SISWA?', '2026-06-16 11:13:20', '2026-06-16 11:13:20');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('12', 'top_cta_link', '#', '2026-06-16 11:13:20', '2026-06-16 11:13:20');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('13', 'about_title', 'Selamat Datang di SMKS Karya Nugraha Boyolali', '2026-06-16 11:13:20', '2026-06-16 11:13:20');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('14', 'about_description', 'Assalamu’alaikum warahmatullahi wabarakatuh.\r\n\r\nPertama-tama, marilah kita panjatkan puji dan syukur ke hadirat Allah SWT, Tuhan Yang Maha Esa, karena atas rahmat dan karunia-Nya kita dapat berkumpul di tempat ini dalam keadaan sehat dan penuh semangat.\r\n\r\nPada kesempatan yang berbahagia ini, izinkan saya, selaku kepala sekolah, menyampaikan rasa syukur dan kebanggaan atas terselenggaranya acara ini. Acara ini merupakan bagian dari upaya kita bersama dalam meningkatkan mutu pendidikan, membangun karakter, dan menumbuhkan semangat kebersamaan di lingkungan sekolah yang kita cintai.\r\n\r\nSekolah bukan hanya tempat belajar akademik, tetapi juga tempat untuk membentuk kepribadian, kedisiplinan, dan nilai-nilai kehidupan. Oleh karena itu, saya mengajak seluruh warga sekolah, baik guru, siswa, maupun orang tua, untuk terus bersinergi dalam menciptakan lingkungan belajar yang kondusif, inspiratif, dan penuh semangat.\r\n\r\nSaya juga ingin menyampaikan apresiasi yang setinggi-tingginya kepada seluruh pihak yang telah berkontribusi dalam kegiatan ini. Semoga apa yang kita lakukan hari ini dapat memberikan manfaat yang besar dan menjadi langkah nyata menuju kemajuan pendidikan di sekolah kita.\r\n\r\nAkhir kata, marilah kita jadikan kegiatan ini sebagai momentum untuk terus bergerak maju, berinovasi, dan memberikan yang terbaik untuk generasi masa depan.\r\n\r\nWassalamu’alaikum warahmatullahi wabarakatuh.', '2026-06-16 11:13:20', '2026-06-18 14:28:24');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('15', 'about_cta_text', 'Profil Sekolah', '2026-06-16 11:13:20', '2026-06-16 11:13:20');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('16', 'about_cta_link', '#', '2026-06-16 11:13:20', '2026-06-16 11:13:20');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('17', 'about_image_path', 'settings/iz3QLsJeyFxDJvmTcc3s3H7y0cOnBxWBaFkx9fFR.png', '2026-06-16 11:13:20', '2026-06-16 11:13:20');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('18', 'stat_siswa', '1365', '2026-06-18 11:40:34', '2026-06-18 11:40:34');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('19', 'stat_guru', '85', '2026-06-18 11:40:34', '2026-06-18 11:40:34');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('20', 'stat_rombel', '37', '2026-06-18 11:40:34', '2026-06-18 11:40:34');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('21', 'stat_jurusan', '7', '2026-06-18 11:40:34', '2026-06-18 11:40:34');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('22', 'video_profil_url', 'https://youtu.be/pT05wMzCqFw?si=ve4IIPCRtnPwb18J', '2026-06-18 14:15:36', '2026-06-18 14:15:36');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('23', 'visi_sekolah', 'Berdaya Guna sebagai pencetak Wirausahawan, SDM terampil untuk memenuhi kebutuhan\r\nindustri di era global dengan dilandasi Iman dan Taqwa kepada Allah SWT', '2026-06-18 14:28:24', '2026-06-18 14:28:24');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('24', 'misi_sekolah', 'Menyelenggarakan Diklat yang dapat :\r\n1. Menyiapkan wirausahawan-wirausahawan yang potensi\r\n2. Mengembangkan Teaching factory dan jasa yang profesional dengan berbagai usaha yang\r\ndapat menunjang penyelenggaraan Diklat.\r\n3. Menumbuhkan semangat keunggulan dan kompetitif secara intensif kepada seluruh warga\r\nsekolah.\r\n4. Melaksanakan Proses Pembelajaran secara optimal yang berkualitas dengan pendekatan\r\nbahasa asing sebagai pengantar\r\n5. Membentuk tamatan yang berkepribadian luhur, yang berakar pada sistem nilai , adat istiadat,\r\nbudaya masyarakat dengan tetap mengikuti perkembangan dunia luar.\r\n6. Menghasilkan tenaga terampil dan profesional yang handal yang mampu bersaing di lapangan\r\nkerja di era global.\r\n7. Menumbuh kembangkan potensi dan kapasitas guru karyawan agar mampu melaksanakan\r\npembaharuan secara terus menerus.\r\n8. Mengembangkan dan mengintensifkan hubungan sekolah dengan DU/DI dan institusi lain yang\r\ntelah memiliki reputasi nasional dan internasional, sebagai perwujudan dari prinsip demand\r\ndriven\r\n9. Menyiapkan kader kader muda yang memiliki akhlak mulia yang beriman dan bertaqwa kepada\r\nAllah SWT. Dengan melaksanakan amalan ahli sunah wal jamaah annahdliyah', '2026-06-18 14:28:24', '2026-06-18 14:28:24');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('25', 'school_x_twitter', NULL, '2026-06-20 16:01:46', '2026-06-20 16:01:46');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('26', 'school_linkedin', NULL, '2026-06-20 16:01:46', '2026-06-20 16:01:46');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('27', 'school_tiktok', NULL, '2026-06-20 16:01:46', '2026-06-20 16:01:46');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('28', 'footer_logo_path', 'settings/T2ulYFOpDzFdqlFF87ePZ9q3hHbPKGlnxFp4KLS7.png', '2026-06-20 16:01:47', '2026-06-20 16:06:12');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('29', 'about_title_en', 'Welcome to Karya Nugraha Boyolali Vocational School', '2026-06-21 03:45:02', '2026-06-21 03:45:02');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('30', 'about_description_en', 'Peace be upon you, and Allah\'s mercy and blessings.\r\n\r\nFirst of all, let us offer praise and gratitude to the presence of Allah SWT, the Almighty God, because by His mercy and grace we can gather in this place in good health and full of enthusiasm.\r\n\r\nOn this happy occasion, allow me, as the school principal, to express my gratitude and pride for holding this event. This event is part of our joint efforts to improve the quality of education, build character, and foster a spirit of togetherness in the school environment that we love.\r\n\r\nSchool is not only a place for academic learning, but also a place to shape personality, discipline and life values. Therefore, I invite all school members, including teachers, students and parents, to continue to work together in creating a learning environment that is conducive, inspiring and full of enthusiasm.\r\n\r\nI also want to express my highest appreciation to all parties who have contributed to this activity. Hopefully what we do today can provide great benefits and become a real step towards educational progress in our schools.\r\n\r\nFinally, let us use this activity as momentum to continue moving forward, innovate and provide the best for future generations.\r\n\r\nWassalamu\'alaikum warahmatullahi wabarakatuh.', '2026-06-21 03:45:03', '2026-06-21 03:45:03');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('31', 'visi_sekolah_en', 'Empowered as an entrepreneur, skilled human resources to meet needs\r\nindustry in the global era based on faith and devotion to Allah SWT', '2026-06-21 03:45:04', '2026-06-21 03:45:04');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('32', 'misi_sekolah_en', 'Organizing training that can:\r\n1. Preparing potential entrepreneurs\r\n2. Developing a teaching factory and professional services with various businesses\r\ncan support the implementation of training.\r\n3. Intensively foster a spirit of excellence and competitiveness among all citizens\r\nschool.\r\n4. Implementing an optimal learning process with quality approaches\r\nforeign language as an introduction\r\n5. Forming graduates who have noble personalities, who are rooted in a system of values, customs,\r\ncommunity culture while keeping abreast of developments in the outside world.\r\n6. Produce skilled and reliable professional staff who are able to compete in the field\r\nworking in the global era.\r\n7. Develop the potential and capacity of employee teachers so they are able to implement\r\ncontinuous updates.\r\n8. Develop and intensify school relations with DU/DI and other institutions\r\nhas had a national and international reputation, as the embodiment of the demand principle\r\ndriven\r\n9. Preparing a cadre of young cadres who have noble morals who believe and are devoted to\r\nAllah SWT. By carrying out the practices of Ahli Sunnah Wal Jamaah Annahdliyah', '2026-06-21 03:45:05', '2026-06-21 03:45:05');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('33', 'school_address_en', 'Jl. Clothing Lawe No.42, Dusun 3, Karanggeneng, Kec. Boyolali, Boyolali Regency', '2026-06-21 03:45:06', '2026-06-21 03:45:06');


DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sliders` (`id`, `title`, `title_en`, `subtitle`, `subtitle_en`, `image_path`, `button_text`, `button_link`, `order`, `created_at`, `updated_at`) VALUES ('1', 'Selamat datang di SMK Karya Nugraha Boyolali', 'Welcome to Karya Nugraha Boyolali Vocational School', 'Mari Bergabung Bersama Kami', 'Come join us', 'sliders/rE8XyhJnV73fUIvjkGzkLBOJ4oRoan8iEqm4O55h.jpg', 'Daftar Sekarang', 'https://spmb.smkknbi.sch.id/', '1', '2026-06-16 08:37:31', '2026-06-21 03:44:48');
INSERT INTO `sliders` (`id`, `title`, `title_en`, `subtitle`, `subtitle_en`, `image_path`, `button_text`, `button_link`, `order`, `created_at`, `updated_at`) VALUES ('2', 'Sekolah Pusat Keunggulan', 'School Center of Excellence', NULL, NULL, 'sliders/sRj0vbM91uV3SNC1T78YC7aRxCjrFojuMHkhbCEq.png', 'Daftar Sekarang', 'https://spmb.smkknbi.sch.id/', '2', '2026-06-16 08:44:05', '2026-06-21 03:44:49');
INSERT INTO `sliders` (`id`, `title`, `title_en`, `subtitle`, `subtitle_en`, `image_path`, `button_text`, `button_link`, `order`, `created_at`, `updated_at`) VALUES ('4', 'Selamat Datang DI SMK Karya Nugraha Boyolali', 'Welcome to Karya Nugraha Boyolali Vocational School', 'Keingintahuan adalah sumbu dalam lilin pembelajaran', 'Curiosity is the wick in the candle of learning', 'sliders/BrO0mSATs6RlbHXW77prNtmxnN3FzzxYzL2SRvZa.jpg', 'Mari Gabung Bersama kami', 'https://spmb.smkknbi.sch.id/', '3', '2026-06-16 08:55:07', '2026-06-21 04:43:35');
INSERT INTO `sliders` (`id`, `title`, `title_en`, `subtitle`, `subtitle_en`, `image_path`, `button_text`, `button_link`, `order`, `created_at`, `updated_at`) VALUES ('5', 'Sekolah Berbasis Industri', 'Industry Based School', 'Pendidikan adalah senjata paling mematikan di dunia, karena dengan pendidikan, Anda dapat mengubah dunia', 'Education is the most powerful weapon in the world, because with education, you can change the world', 'sliders/pg2HZyOUSTA2Ka2QU7KByjjx1ibyfQGqld9ZIlGL.png', 'Daftar Sekarang', 'https://spmb.smkknbi.sch.id/', '4', '2026-06-21 04:34:35', '2026-06-21 04:42:23');


DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nuptk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `teachers_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `teachers` (`id`, `name`, `slug`, `position`, `position_en`, `nuptk`, `nip`, `tempat_lahir`, `agama`, `jenis_kelamin`, `status_pegawai`, `phone`, `email`, `alamat`, `image_path`, `facebook`, `instagram`, `linkedin`, `created_at`, `updated_at`) VALUES ('1', 'NUR WAKHID RHOMDONI, SE', 'nur-wakhid-rhomdoni-se', 'kepala Sekolah', 'headmaster', '-', '-', 'Simo', 'Islam', 'Laki-laki', 'GTT', '08946346946', 'nur@gmail.com', 'simo', 'teachers/vR0JRnhPxSamZdjNEFzLeuSeR1jdATxEscRfOBkJ.png', NULL, NULL, NULL, '2026-06-16 09:21:29', '2026-06-21 03:44:50');
INSERT INTO `teachers` (`id`, `name`, `slug`, `position`, `position_en`, `nuptk`, `nip`, `tempat_lahir`, `agama`, `jenis_kelamin`, `status_pegawai`, `phone`, `email`, `alamat`, `image_path`, `facebook`, `instagram`, `linkedin`, `created_at`, `updated_at`) VALUES ('2', 'dRS. WAGIMAN', 'drs-wagiman', 'Guru Produktif TKR', 'TKR Productive Teacher', '58546856856', '-', NULL, 'Islam', 'Laki-laki', NULL, NULL, NULL, NULL, 'teachers/lNObkzXC7sV4Fn69HAskIKXKeNDbbaSb5H6EXiHl.png', NULL, NULL, NULL, '2026-06-16 09:50:24', '2026-06-21 03:44:51');
INSERT INTO `teachers` (`id`, `name`, `slug`, `position`, `position_en`, `nuptk`, `nip`, `tempat_lahir`, `agama`, `jenis_kelamin`, `status_pegawai`, `phone`, `email`, `alamat`, `image_path`, `facebook`, `instagram`, `linkedin`, `created_at`, `updated_at`) VALUES ('3', 'Sarbiyanto, S.Pd', 'sarbiyanto-spd', 'Guru Produktif TKR', 'TKR Productive Teacher', '0338741643200013', '-', 'Boyolali', 'Islam', 'Laki-laki', 'GTT', NULL, NULL, NULL, 'teachers/OihZg4tdIwvbDtUfF9OJt40478hQ3vLY5DQVotZo.png', NULL, NULL, NULL, '2026-06-16 09:54:54', '2026-06-21 03:44:51');
INSERT INTO `teachers` (`id`, `name`, `slug`, `position`, `position_en`, `nuptk`, `nip`, `tempat_lahir`, `agama`, `jenis_kelamin`, `status_pegawai`, `phone`, `email`, `alamat`, `image_path`, `facebook`, `instagram`, `linkedin`, `created_at`, `updated_at`) VALUES ('4', 'Joko Apriyanto, ST', 'joko-apriyanto-st', 'Waka WMM', 'Deputy WMM', '6747758659200000', '-', 'Boyolali', 'Islam', 'Laki-laki', NULL, NULL, NULL, NULL, 'teachers/J02o6QdTA2HBZMnk63NXm9ArVgGCgbHhBA9uHl6l.png', NULL, NULL, NULL, '2026-06-16 09:55:52', '2026-06-21 03:44:52');
INSERT INTO `teachers` (`id`, `name`, `slug`, `position`, `position_en`, `nuptk`, `nip`, `tempat_lahir`, `agama`, `jenis_kelamin`, `status_pegawai`, `phone`, `email`, `alamat`, `image_path`, `facebook`, `instagram`, `linkedin`, `created_at`, `updated_at`) VALUES ('5', 'Sri Mumpuni, S.Si', 'sri-mumpuni-ssi', 'Waka Kurikulum', 'Deputy Head of Curriculum', '4646753655300050', '-', 'Klatwn', 'Islam', 'Perempuan', 'GTT', NULL, NULL, NULL, 'teachers/rJa0ozmV2k1OZHyJO2X7XsCq1taWYAfDoV7daarh.png', NULL, NULL, NULL, '2026-06-16 09:57:03', '2026-06-21 03:44:53');


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES ('1', 'Administrator', 'admin@smkknboyolali.sch.id', NULL, '$2y$12$xMUJUVcpKQ2J4sJavgSU2.5gFLR2c9qagqa5BS6FnA2LSa.bpl9Jm', NULL, '2026-06-16 03:08:28', '2026-06-16 03:08:28');


SET FOREIGN_KEY_CHECKS=1;
