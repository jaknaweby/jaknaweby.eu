/* ---------------------------------------------------------------------- */
/* Before running comands bellow, create a table with name 'jaknaweby.eu' */
/* ---------------------------------------------------------------------- */

/* Database creation */
CREATE DATABASE 'jaknaweby.eu';

/* Users table initalization */
CREATE TABLE 'jaknaweby.eu'.'users' ('id' INT NOT NULL AUTO_INCREMENT , 'username' VARCHAR(255) NOT NULL , 'password' CHAR(255) NOT NULL , 'salt' CHAR(5) NOT NULL , 'isAdmin' INT NOT NULL DEFAULT '0' , PRIMARY KEY ('id'), UNIQUE ('username')) ENGINE = InnoDB;

/* HTML articles table initalization */
CREATE TABLE 'jaknaweby.eu'.'articles_html' ('id' INT NOT NULL AUTO_INCREMENT , 'title' VARCHAR(255) NOT NULL , 'url' VARCHAR(255) NOT NULL , 'published' BOOLEAN NOT NULL DEFAULT FALSE , PRIMARY KEY ('id'), UNIQUE ('title'), UNIQUE ('url')) ENGINE = InnoDB;
INSERT INTO 'articles_html' ('id', 'title', 'url') VALUES (NULL, 'Co je to HTML', '');

/* CSS articles table initalization */
CREATE TABLE 'jaknaweby.eu'.'articles_css' ('id' INT NOT NULL AUTO_INCREMENT , 'title' VARCHAR(255) NOT NULL , 'url' VARCHAR(255) NOT NULL , 'published' BOOLEAN NOT NULL DEFAULT FALSE , PRIMARY KEY ('id'), UNIQUE ('title'), UNIQUE ('url')) ENGINE = InnoDB;
INSERT INTO 'articles_css' ('id', 'title', 'url') VALUES (NULL, 'Co je to CSS', '');

/* JavaScript articles table initalization */
CREATE TABLE 'jaknaweby.eu'.'articles_js' ('id' INT NOT NULL AUTO_INCREMENT , 'title' VARCHAR(255) NOT NULL , 'url' VARCHAR(255) NOT NULL , 'published' BOOLEAN NOT NULL DEFAULT FALSE , PRIMARY KEY ('id'), UNIQUE ('title'), UNIQUE ('url')) ENGINE = InnoDB;
INSERT INTO 'articles_js' ('id', 'title', 'url') VALUES (NULL, 'Co je to JavaScript', '');

/* PHP articles table initalization */
CREATE TABLE 'jaknaweby.eu'.'articles_php' ('id' INT NOT NULL AUTO_INCREMENT , 'title' VARCHAR(255) NOT NULL , 'url' VARCHAR(255) NOT NULL , 'published' BOOLEAN NOT NULL DEFAULT FALSE , PRIMARY KEY ('id'), UNIQUE ('title'), UNIQUE ('url')) ENGINE = InnoDB;
INSERT INTO 'articles_php' ('id', 'title', 'url') VALUES (NULL, 'Co je to PHP', '');

/* SQL articles table initalization */
CREATE TABLE 'jaknaweby.eu'.'articles_sql' ('id' INT NOT NULL AUTO_INCREMENT , 'title' VARCHAR(255) NOT NULL , 'url' VARCHAR(255) NOT NULL , 'published' BOOLEAN NOT NULL DEFAULT FALSE , PRIMARY KEY ('id'), UNIQUE ('title'), UNIQUE ('url')) ENGINE = InnoDB;
INSERT INTO 'articles_sql' ('id', 'title', 'url') VALUES (NULL, 'Co je to SQL', '');





/* New articles table initialization */
CREATE TABLE 'jaknaweby.eu'.'articles' ('id' INT NOT NULL AUTO_INCREMENT , 'pagename' VARCHAR(255) NOT NULL , 'title' VARCHAR(255) NOT NULL , 'language' VARCHAR(4) NOT NULL , 'published' BOOLEAN NOT NULL DEFAULT FALSE , PRIMARY KEY ('id')) ENGINE = InnoDB;
INSERT INTO 'articles' ('title', 'filename', 'language') VALUES ('Co je to HTML', 'index.php', 'html');
INSERT INTO 'articles' ('title', 'filename', 'language') VALUES ('Co je to CSS', 'index.php', 'css');
INSERT INTO 'articles' ('title', 'filename', 'language') VALUES ('Co je to JavaScript', 'index.php', 'jss');
INSERT INTO 'articles' ('title', 'filename', 'language') VALUES ('Co je to PHP', 'index.php', 'php');
INSERT INTO 'articles' ('title', 'filename', 'language') VALUES ('Co je to SQL', 'index.php', 'sql');