DROP DATABASE IF EXISTS db_gradebook;
CREATE DATABASE db_gradebook;
USE db_gradebook;

GRANT SELECT, INSERT, UPDATE, DELETE on db_gradebook.* TO gradebookuser@localhost IDENTIFIED BY 'gradebook';

DROP TABLE IF EXISTS institutions;
CREATE TABLE institutions(
	institution_id int(10) unsigned NOT NULL AUTO_INCREMENT,
	institution_name VARCHAR(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	institution_phone VARCHAR(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	institution_email VARCHAR(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	institution_hashed_password VARCHAR(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	institution_address VARCHAR(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	institution_added_timestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	institution_database_name VARCHAR(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	institution_domain VARCHAR(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	PRIMARY KEY(institution_id)
);

DROP TABLE IF EXISTS administrators;
CREATE TABLE administrators(
	admin_id int(10) unsigned NOT NULL AUTO_INCREMENT,
	admin_username VARCHAR(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	admin_fullname VARCHAR(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	admin_password VARCHAR(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	admin_gender VARCHAR(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	admin_dob DATE DEFAULT NULL,
	admin_birth_place VARCHAR(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	admin_added_timestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY(admin_id)
);

DROP TABLE IF EXISTS register_requests;
CREATE TABLE register_requests(
	request_id int(10) unsigned NOT NULL AUTO_INCREMENT,
	request_timestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	content VARCHAR(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	PRIMARY KEY(request_id)
);

DROP TABLE IF EXISTS support_requests;
CREATE TABLE support_requests(
	request_id int(10) unsigned NOT NULL AUTO_INCREMENT,
	institution_id int(10) unsigned NOT NULL,
	user_id int(10) unsigned NOT NULL,
	request_timestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	content VARCHAR(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	PRIMARY KEY(request_id),
	CONSTRAINT fk_institution FOREIGN KEY(institution_id)
	REFERENCES institutions(institution_id)
);

DROP TABLE IF EXISTS quotes;
CREATE TABLE quotes(
	quote_id int(10) unsigned NOT NULL AUTO_INCREMENT,
	quote_content VARCHAR(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	quote_author VARCHAR(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	PRIMARY KEY(quote_id)
);