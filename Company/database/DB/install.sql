CREATE TABLE `companies`
(
  `id` int
(11) NOT NULL AUTO_INCREMENT,
  `organisation_name` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organisation_alias` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_administrator_name` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_website` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int
(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON
UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY
(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `branches`
(
  `id` int
(11) NOT NULL AUTO_INCREMENT,
  `name` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line1` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line2` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_id_gst` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int
(11) NOT NULL DEFAULT '0',
  `state_id` int
(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON
UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY
(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `departments`
(
  `id` int
(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int
(11) NOT NULL,
  `name` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_email` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_name` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int
(11) NOT NULL DEFAULT '0',
  `state_id` int
(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON
UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY
(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `designations`
(
  `id` int
(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int
(11) NOT NULL,
  `department_id` int
(11) NOT NULL,
  `name` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notice_period` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `probation_period` varchar
(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int
(11) NOT NULL DEFAULT '0',
  `state_id` int
(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON
UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY
(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `branches`
ADD `ext` VARCHAR
(255) NULL DEFAULT NULL AFTER `telephone`;