CREATE TABLE user (
   id INT NOT NULL AUTO_INCREMENT,
   username VARCHAR(50) NOT NULL,
   password VARCHAR(32) NOT NULL COMMENT '{"type":"password"}',
   email VARCHAR(255) NOT NULL,
   user_groups TEXT COMMENT '{"type":"multi_select","from":"user_group"}',
   use_2fa BOOLEAN,
   salt_2fa VARCHAR(32) COMMENT '{"type":"password"}',
   PRIMARY KEY (id),
   UNIQUE INDEX (username)
) COMMENT = '{"whitelist":["admin","user_manager"],"display":{"whitelist":["user_viewer"]},"add":{"whitelist":"all"}}';

CREATE TABLE user_group (
   id INT NOT NULL AUTO_INCREMENT,
   name VARCHAR(50) NOT NULL,
   PRIMARY KEY (id),
   UNIQUE INDEX (name)
);

INSERT INTO user_group (name) VALUES ('admin');        # 1
INSERT INTO user_group (name) VALUES ('user');         # 2
INSERT INTO user_group (name) VALUES ('employee');     # 3
INSERT INTO user_group (name) VALUES ('user_manager'); # 4
INSERT INTO user_group (name) VALUES ('user_viewer');  # 5

CREATE TABLE quick_link (
  id INT NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  user INT NOT NULL COMMENT '{"type":"select","from":"user"}',
  url varchar(255) NOT NULL,
  PRIMARY KEY (id)
) COMMENT = '{"whitelist":["admin","user_manager"],"display":{"whitelist":["user_viewer"]},"add":{"whitelist":[]}}';

CREATE TABLE nav_tab (
  id INT NOT NULL AUTO_INCREMENT,
  name varchar(52) NOT NULL,
  user_groups TEXT COMMENT '{"type":"multi_select","from":"user_group"}',
  url varchar(255) NOT NULL,
  sort_order INT,
  PRIMARY KEY (id)
)COMMENT = '{"whitelist":["admin","user_manager"],"display":{"whitelist":["user_viewer"]},"add":{"whitelist":[]]}}';

INSERT INTO nav_tab (name,user_groups,url) VALUES ('Home','2,1','?p=home');
INSERT INTO nav_tab (name,user_groups,url) VALUES ('Users','1,4,5','?p=list&t=user');
INSERT INTO nav_tab (name,user_groups,url) VALUES ('Zero','2,1','http://zerodatabase.com');
