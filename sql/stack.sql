CREATE TABLE stack_question (
   id INT NOT NULL AUTO_INCREMENT,
   title VARCHAR(50) NOT NULL,
   question TEXT COMMENT '{"type":"markdown"}',
   votes INT DEFAULT 0 COMMENT '{"groups":["admin"]}',
   PRIMARY KEY (id)
) COMMENT = '{"whitelist":["admin"],"display":{"whitelist":["employee"]},"add":{"whitelist":"employee"}}';
