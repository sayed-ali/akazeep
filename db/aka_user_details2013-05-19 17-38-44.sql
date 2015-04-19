USE cake_akazeep;

CREATE TABLE `aka_user_details` (
  `id` varchar(36) COLLATE utf8_bin NOT NULL,
  `user_id` varchar(36) COLLATE utf8_bin NOT NULL,
  `position` float NOT NULL DEFAULT '1',
  `field` varchar(255) COLLATE utf8_bin NOT NULL,
  `value` text COLLATE utf8_bin,
  `input` varchar(16) COLLATE utf8_bin NOT NULL,
  `data_type` varchar(16) COLLATE utf8_bin NOT NULL,
  `label` varchar(128) COLLATE utf8_bin NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE_PROFILE_PROPERTY` (`field`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


