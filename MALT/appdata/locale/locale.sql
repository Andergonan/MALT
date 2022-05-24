CREATE DATABASE IF NOT EXISTS malt;

CREATE TABLE IF NOT EXISTS `users`(
    `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
    `firstname` VARCHAR(50) NOT NULL,
    `surename` VARCHAR(50) NOT NULL,
    `nickname` VARCHAR(50) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `create_datetime` datetime NOT NULL,
    PRIMARY KEY (`id`)
);