CREATE TABLE IF NOT EXISTS `twitts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `twid` varchar(24) NOT NULL,
  `text` varchar(255) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `profile_image_url` varchar(256) NOT NULL,
  `from_user` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM ;
