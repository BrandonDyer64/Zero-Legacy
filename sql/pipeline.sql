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

CREATE TABLE team_relationship (
  id INT NOT NULL AUTO_INCREMENT,
  team_from INT COMMENT '{"type":"select","from":"team"}',
  team_to INT COMMENT '{"type":"select","from":"team"}',
  PRIMARY KEY (id)
) COMMENT = '{"whitelist":["admin"]}';

CREATE TABLE project (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(32),
  pipeline INT COMMENT '{"type":"select","from":"pipeline"}',
  current_team INT COMMENT '{"type":"select","from":"team"}',
  proposal TEXT COMMENT '{"type":"link"}',
  repository TEXT COMMENT '{"type":"link"}',
  route TEXT COMMENT '{"type":"multi_select","from":"team"}',
  PRIMARY KEY (id)
) COMMENT = '{"whitelist":["admin"],"display":{"whitelist":["employee"]},"add":{"whitelist":["game_designer"]}}';

CREATE TABLE project_document (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(32),
  project INT COMMENT '{"type":"select","from":"project"}',
  document TEXT COMMENT '{"type":"markdown"}',
  PRIMARY KEY(id)
) COMMENT = '{"whitelist":["admin","game_designer"],"display":{"whitelist":["employee"]}}';
