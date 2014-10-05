
DROP TABLE IF EXISTS cake_sessions;
CREATE TABLE cake_sessions (
id varchar(255) PRIMARY KEY default '',
data TEXT NOT NULL,
expires INT DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS users;
CREATE TABLE users (
id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
facebook_id BIGINT UNSIGNED UNIQUE DEFAULT NULL,
twitter_id BIGINT UNSIGNED UNIQUE DEFAULT NULL,
role TINYINT UNSIGNED NOT NULL DEFAULT 0,
email VARCHAR(100) NOT NULL UNIQUE,
first_name VARCHAR(100) NOT NULL,
last_name VARCHAR(100) NOT NULL,
password VARCHAR(100) DEFAULT NULL,
password_reset VARCHAR(100) DEFAULT NULL UNIQUE,
phone VARCHAR(100) DEFAULT NULL,
address VARCHAR(100) DEFAULT NULL,
gender TINYINT UNSIGNED DEFAULT NULL,
birthday DATE DEFAULT NULL,
created DATETIME NOT NULL,
modified DATETIME DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS goods;
CREATE TABLE `goods` (
  `id` int(10) unsigned PRIMARY KEY AUTO_INCREMENT,
  `owner` int(10) unsigned NOT NULL,
  `token` varchar(40) NOT NULL,
  `category` varchar(5) NOT NULL,
  `overview` varchar(1000) NOT NULL,
  `detail` text NOT NULL,
  `cond` tinyint(3) unsigned NOT NULL,
  `price` int(10) unsigned NOT NULL,
  `real_price` int(10) unsigned DEFAULT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `pickup_flag` tinyint(3) unsigned DEFAULT '0',
  `viewed` int(10) unsigned DEFAULT '0',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `keyword` text DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  KEY `category` (`category`),
  KEY `status` (`status`),
  KEY `owner` (`owner`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS goodedits;
CREATE TABLE `goodedits` (
  `id` int(10) unsigned NOT NULL,
  `category` varchar(5) NOT NULL,
  `overview` varchar(1000) NOT NULL,
  `detail` text NOT NULL,
  `cond` tinyint(3) unsigned NOT NULL,
  `price` int(10) unsigned NOT NULL,
  `real_price` int(10) unsigned DEFAULT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `pickup_flag` tinyint(3) unsigned DEFAULT '0',
  `token` varchar(40) NOT NULL,
  `options` text DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS clothes_clothes;
CREATE TABLE clothes_clothes(
id INT UNSIGNED PRIMARY KEY NOT NULL,
sex TINYINT UNSIGNED NOT NULL DEFAULT 2,
type TINYINT UNSIGNED NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS clothes_boots;
CREATE TABLE clothes_boots(
id INT UNSIGNED PRIMARY KEY NOT NULL,
sex TINYINT UNSIGNED NOT NULL DEFAULT 2,
type TINYINT UNSIGNED NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS clothes_accessories;
CREATE TABLE clothes_accessories(
id INT UNSIGNED PRIMARY KEY NOT NULL,
sex TINYINT UNSIGNED NOT NULL DEFAULT 2,
type TINYINT UNSIGNED NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS clothes_kids;
CREATE TABLE clothes_kids(
id INT UNSIGNED PRIMARY KEY NOT NULL,
sex TINYINT UNSIGNED NOT NULL DEFAULT 2,
type TINYINT UNSIGNED NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS clothes_others;
CREATE TABLE clothes_others(
id INT UNSIGNED PRIMARY KEY NOT NULL,
sex TINYINT UNSIGNED NOT NULL DEFAULT 2
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS mongolian_arts;
CREATE TABLE mongolian_arts(
id INT UNSIGNED PRIMARY KEY NOT NULL,
type TINYINT UNSIGNED NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS favorites;
CREATE TABLE favorites(
id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
user INT UNSIGNED NOT NULL,
good INT UNSIGNED NOT NULL,
created DATETIME NOT NULL,
modified DATETIME DEFAULT NULL,
KEY `user` (user)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS news;
CREATE TABLE news(
id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
token varchar(40) NOT NULL,
title varchar(100) NOT NULL,
content text NOT NULL,
publish_date DATETIME NOT NULL,
status TINYINT UNSIGNED NOT NULL DEFAULT 0,
created DATETIME DEFAULT NULL,
modified DATETIME DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;