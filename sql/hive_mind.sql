CREATE TABLE hive_mind_question (
   id INT NOT NULL AUTO_INCREMENT,
   title VARCHAR(50) NOT NULL,
   question TEXT,
   user INT COMMENT '{"type":"select","from":"user"}',
   PRIMARY KEY (id)
) COMMENT = '{"whitelist":["admin"],"self":"user"}';

CREATE TABLE hive_mind_answer (
   id INT NOT NULL AUTO_INCREMENT,
   answer TEXT,
   user INT COMMENT '{"type":"select","from":"user"}',
   question TEXT COMMENT '{"type":"select","from":"hive_mind_question"}',
   thumbs TEXT COMMENT '{"type":"multi_select":"from":"user"}',
   PRIMARY KEY (id)
) COMMENT = '{"whitelist":["admin"]}';

INSERT INTO slave_table (master, slave, field) VALUES ('hive_mind_question','hive_mind_answer','question');