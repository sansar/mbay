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
email VARCHAR(100) NOT NULL UNIQUE,
activate_code VARCHAR(100) DEFAULT NULL,
first_name VARCHAR(100) NOT NULL,
last_name VARCHAR(100) NOT NULL,
password VARCHAR(100) DEFAULT NULL,
password_reset VARCHAR(100) DEFAULT NULL,
phone VARCHAR(100) DEFAULT NULL,
address VARCHAR(100) DEFAULT NULL,
gender TINYINT UNSIGNED DEFAULT NULL,
birthday DATE DEFAULT NULL,
created DATETIME NOT NULL,
modified DATETIME DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS goods;
CREATE TABLE goods(
id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
owner INT UNSIGNED NOT NULL,
category TINYINT UNSIGNED NOT NULL,
overview VARCHAR(1000) NOT NULL,
detail TEXT NOT NULL,
cond TINYINT UNSIGNED NOT NULL,
price INT UNSIGNED NOT NULL,
quantity INT UNSIGNED NOT NULL,
end_date DATE DEFAULT NULL,
pickup_flag TINYINT UNSIGNED DEFAULT 0,
sale TINYINT DEFAULT 0,
sale_price INT UNSIGNED DEFAULT NULL,
status TINYINT UNSIGNED NOT NULL DEFAULT 0,
secret_number VARCHAR(40) NOT NULL,
created DATETIME NOT NULL,
modified DATETIME DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS clothes_accesorries;
CREATE TABLE clothes_accesorries(
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

DROP TABLE IF EXISTS arts;
CREATE TABLE arts(
id INT UNSIGNED PRIMARY KEY NOT NULL,
type TINYINT UNSIGNED NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;