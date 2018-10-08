CREATE TABLE wiki_page (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(32),
  parent INT COMMENT '{"type":"select","from":"wiki_page"}',
  content TEXT COMMENT '{"type":"markdown"}',
  PRIMARY KEY (id),
  UNIQUE KEY(name)
) COMMENT = '{"whitelist":["admin","employee"]}';
