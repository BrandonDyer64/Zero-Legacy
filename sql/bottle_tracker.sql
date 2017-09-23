CREATE TABLE bottling_record (
  id INT NOT NULL AUTO_INCREMENT,
  bottling_date DATE,
  product INT COMMENT '{"type":"select","from":"product"}',
  PRIMARY KEY (id)
)COMMENT = '{"whitelist":["admin"],"display":{"whitelist":["employee"]},"add":{"whitelist":["employee"]]}}';

CREATE TABLE bottling_snapshot (
  id INT NOT NULL AUTO_INCREMENT,
  snap_time DATETIME,
  bottling_record INT COMMENT '{"type":"select","from":"bottling_record"}',
  bottles INT,
  PRIMARY KEY (id)
)COMMENT = '{"whitelist":["admin"],"display":{"whitelist":["employee"]},"add":{"whitelist":["employee"]]}}';