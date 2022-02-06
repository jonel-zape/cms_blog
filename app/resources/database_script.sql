CREATE TABLE `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(1024) DEFAULT NULL,
  `photo_url` varchar(1024) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `failed_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username_used` varchar(45) DEFAULT NULL,
  `password_used` varchar(45) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `other_info` varchar(512) DEFAULT '',
  PRIMARY KEY (`id`)
);

CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1024) DEFAULT NULL,
  `summary` varchar(1024) DEFAULT NULL,
  `cover_photo_url` varchar(1024) DEFAULT NULL,
  `content` text,
  `author_id` int(11) DEFAULT NULL,
  `is_published` int(11) DEFAULT '0',
  `date` date DEFAULT NULL,
  `is_featured` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ix_is_published` (`is_published`),
  KEY `ix_is_featured` (`is_featured`),
  KEY `ix_deleted_at` (`deleted_at`)
);

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(512) DEFAULT '',
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(512) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ix_username` (`username`)
);

INSERT INTO `user` VALUES (1,'Admin','admin','$2y$10$vKYwy/VgmgMTYFluvFJhdu0HuvYejNLTD83dbcwNffQejoniu1Ika','2019-12-15 21:22:54','2019-12-15 21:22:54',NULL);
