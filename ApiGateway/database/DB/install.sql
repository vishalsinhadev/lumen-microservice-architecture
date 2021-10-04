CREATE TABLE `users`
(
  `id` int
(11) NOT NULL AUTO_INCREMENT,
  `name` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '91',
  `phone` varchar
(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `status` tinyint NOT NULL DEFAULT '1',
  `remember_token` varchar
(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int
(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON
UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY
(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
