DROP DATABASE IF EXISTS db_gradebook;
CREATE DATABASE db_gradebook;
USE db_gradebook;

GRANT SELECT, INSERT, UPDATE, DELETE on db_gradebook.* TO gradebookuser@localhost IDENTIFIED BY 'gradebook';

/*
* Stores quotes of the day which are later displayed in a home view.
*/
DROP TABLE IF EXISTS quotes;
CREATE TABLE quotes(
	quote_id int(10) unsigned NOT NULL AUTO_INCREMENT,
	quote_content VARCHAR(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	quote_author VARCHAR(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	PRIMARY KEY(quote_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*
* Stores institution details
*/
DROP TABLE IF EXISTS institutions;
CREATE TABLE institutions(
	institution_id int(10) unsigned NOT NULL AUTO_INCREMENT,
	institution_name VARCHAR(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	institution_phone VARCHAR(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	institution_email VARCHAR(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	institution_address VARCHAR(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	institution_added_timestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY(institution_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;