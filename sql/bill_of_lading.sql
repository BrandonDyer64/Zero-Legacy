CREATE TABLE bill_of_lading (
   id INT NOT NULL AUTO_INCREMENT,
   date_recorded DATE,
   shipping_address INT COMMENT '{"type":"select","from":"shipping_address"}',
   info_lines TEXT,
   carrier INT COMMENT '{"type":"select","from":"shipping_carrier"}',
   route VARCHAR(255),
   vehicle_number VARCHAR(32),
   scac VARCHAR(255),
   freight_charges_prepaid BOOLEAN,
   freight_charges_collect BOOLEAN,
   remit_c_o_d_to_address VARCHAR(255),
   c_o_d_amount DECIMAL(10,2),
   c_o_d_fee_prepaid BOOLEAN,
   c_o_d_fee_collect BOOLEAN,
   total_charges DECIMAL(10,2),
   PRIMARY KEY (id)
) COMMENT = '{"whitelist":["admin"]}';
ALTER TABLE bill_of_lading AUTO_INCREMENT = 1000;

CREATE TABLE shipping_address (
   id INT NOT NULL AUTO_INCREMENT,
   name VARCHAR(255),
   street VARCHAR(255),
   city VARCHAR(255),
   zip VARCHAR(12),
   PRIMARY KEY (id)
) COMMENT = '{"whitelist":["admin","employee"]}';

CREATE TABLE shipping_carrier (
   id INT NOT NULL AUTO_INCREMENT,
   name VARCHAR(255),
   PRIMARY KEY (id)
) COMMENT = '{"whitelist":["admin","employee"]}';