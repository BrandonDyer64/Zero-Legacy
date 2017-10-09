CREATE TABLE slave_table (
   id INT NOT NULL AUTO_INCREMENT,
   master VARCHAR(255),
   slave VARCHAR(255),
   table_field VARCHAR(255),
   field VARCHAR(255),
   PRIMARY KEY (id)
) COMMENT = '{"whitelist":["admin"]}';