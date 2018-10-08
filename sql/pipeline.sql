CREATE TABLE pipeline (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(32),
  PRIMARY KEY (id)
) COMMENT = '{"whitelist":["admin"]}';

CREATE TABLE team (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(32),
  pipeline INT COMMENT '{"type":"select","from":"pipeline"}',
  sort_order INT,
  PRIMARY KEY (id)
) COMMENT = '{"whitelist":["admin"],"order_by":"sort_order ASC"}';

CREATE TABLE j_user_team (
  id INT NOT NULL AUTO_INCREMENT,
  user INT COMMENT '{"type":"select","from":"user"}',
  team INT COMMENT '{"type":"select","from":"team"}',
  PRIMARY KEY (id)
) COMMENT = '{"whitelist":["admin"]}';

CREATE TABLE project (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(32),
  pipeline INT COMMENT '{"type":"select","from":"pipeline"}',
  current_team INT DEFAULT 1 COMMENT '{"type":"select","from":"team","groups":["admin"]}',
  route TEXT COMMENT '{"type":"multi_select","from":"team"}',
  PRIMARY KEY (id)
) COMMENT = '{"whitelist":["admin"]}';

CREATE TABLE project_team_transfer (
  id INT NOT NULL AUTO_INCREMENT,
  project INT COMMENT '{"type":"select","from":"project"}',
  team_from INT COMMENT '{"type":"select","from":"team"}',
  team_to INT COMMENT '{"type":"select","from":"team"}',
  user INT COMMENT '{"type":"select","from":"user"}',
  date_of_transfer DATE,
  PRIMARY KEY (id)
) COMMENT = '{"whitelist":["admin"]}';

CREATE TABLE project_document (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(32),
  project INT COMMENT '{"type":"select","from":"project"}',
  document TEXT COMMENT '{"type":"markdown"}',
  PRIMARY KEY(id)
) COMMENT = '{"whitelist":["admin","game_designer"],"display":{"whitelist":["employee"]}}';
