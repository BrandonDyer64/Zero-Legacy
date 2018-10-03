CREATE TABLE user (
   id INT NOT NULL AUTO_INCREMENT,
   username VARCHAR(50) NOT NULL,
   password VARCHAR(32) NOT NULL COMMENT '{"type":"password"}',
   email VARCHAR(255) NOT NULL,
   PRIMARY KEY (id),
   UNIQUE INDEX (username)
);

CREATE TABLE quick_links (
   id INT NOT NULL AUTO_INCREMENT,
   name VARCHAR(50) NOT NULL,
   url VARCHAR(255) NOT NULL,
   PRIMARY KEY (id)
);

CREATE TABLE user_group (
   id INT NOT NULL AUTO_INCREMENT,
   name VARCHAR(255) NOT NULL,
   PRIMARY KEY (id),
   UNIQUE INDEX (name)
);