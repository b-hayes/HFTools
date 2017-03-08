DROP TABLE IF EXISTS results;
DROP TABLE IF EXISTS observations;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS runs;
DROP TABLE IF EXISTS days;
DROP TABLE IF EXISTS sessions;
DROP TABLE IF EXISTS clients_participants;
DROP TABLE IF EXISTS participants_roles;
DROP TABLE IF EXISTS roles;
DROP TABLE IF EXISTS participants;
DROP TABLE IF EXISTS clients;

CREATE TABLE `clients` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `address` VARCHAR(255),
    `client_number` VARCHAR(255) NOT NULL,
    `contact_number` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255),
    `contact_person` VARCHAR(255) NOT NULL,
    `acount_created` DATETIME DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE `participants` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `first_name` VARCHAR(255) NOT NULL,
    `last_name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255),
    `phone` VARCHAR(20)
);


CREATE TABLE `roles` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(20)  NOT NULL
);


CREATE TABLE `participants_roles` (
    `participant_id` INT UNSIGNED NOT NULL,
    `role_id` INT UNSIGNED NOT NULL,
    FOREIGN KEY (`participant_id`) REFERENCES participants(`id`),
    FOREIGN KEY (`role_id`) REFERENCES roles(`id`),
    PRIMARY KEY (`participant_id`, `role_id`)
);


CREATE TABLE `clients_participants` (
    `client_id` INT UNSIGNED NOT NULL,
    `participant_id` INT UNSIGNED NOT NULL,
    FOREIGN KEY (`client_id`) REFERENCES clients(`id`),
    FOREIGN KEY (`participant_id`) REFERENCES participants(`id`),
    PRIMARY KEY (`client_id`, `participant_id`)
);


CREATE TABLE `sessions` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255),
    `start_date` DATETIME(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
    `end_date` DATE NOT NULL,
    `client_id` INT UNSIGNED NOT NULL,
    FOREIGN KEY (`client_id`) REFERENCES clients(`id`)
);


CREATE TABLE `days` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `day_date` DATETIME(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
    `session_id` INT UNSIGNED NOT NULL,
    FOREIGN KEY (`session_id`) REFERENCES sessions(`id`)
);


CREATE TABLE `runs` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `day_id` INT UNSIGNED NOT NULL,
    `name` VARCHAR(355) NOT NULL,
    `description` VARCHAR(355),
    FOREIGN KEY (`day_id`) REFERENCES days(`id`)
);


CREATE TABLE `users` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `client_id` INT UNSIGNED UNIQUE,
    `username` VARCHAR(50) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `role` ENUM ('admin', 'client_admin', 'researcher') NOT NULL,
    `created` DATETIME(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
    `last_login` DATETIME(3) DEFAULT CURRENT_TIMESTAMP(3),
    `modified` DATETIME(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
    FOREIGN KEY (`client_id`) REFERENCES clients(`id`)
);

CREATE TABLE `observations` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `observer_id` INT UNSIGNED NOT NULL,
    `participant_id` INT UNSIGNED NOT NULL,
    `run_id` INT UNSIGNED NOT NULL,
    FOREIGN KEY (`observer_id`) REFERENCES participants(`id`),
    FOREIGN KEY (`participant_id`) REFERENCES participants(`id`),
    FOREIGN KEY (`run_id`) REFERENCES runs(`id`)
);


CREATE TABLE `results` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `observation_id` INT UNSIGNED NOT NULL,
    `q_key` VARCHAR(355) NOT NULL,
    `q_value` VARCHAR(355) NOT NULL,
    `img` VARCHAR(355),
    FOREIGN KEY (`observation_id`) REFERENCES observations(`id`)
);
