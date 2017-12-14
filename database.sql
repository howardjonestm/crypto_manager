CREATE TABLE users (
id int(11) NOT NULL auto_increment,
email char(128) NOT NULL,
password char(128) NOT NULL,
user_salt varchar(50) NOT NULL,
PRIMARY KEY (`id`)
)
