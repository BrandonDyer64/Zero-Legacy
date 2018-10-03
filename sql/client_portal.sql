CREATE TABLE client_portal (
   id INT NOT NULL AUTO_INCREMENT,
   date_recorded DATE,
   client INT COMMENT '{"type":"select","from":"client"}',
   your_password VARCHAR(32) COMMENT '{"type":"password","help":"This is used to create the special URL."}',
   username VARCHAR(32),
   client_password VARCHAR(32) COMMENT '{"type":"password"}',
   PRIMARY KEY (id)
) COMMENT = '{"whitelist":["admin"]}';

CREATE TABLE shipment_request (
   id INT NOT NULL AUTO_INCREMENT,
   date_requested DATE,
   client INT COMMENT '{"type":"select","from":"client"}',
   product INT COMMENT '{"type":"select","from":"product"}',
   cases INT,
   PRIMARY KEY (id)
) COMMENT = '{"whitelist":["admin"]}';