CREATE TABLE time_punch_entry (
   id INT NOT NULL AUTO_INCREMENT,
   user INT COMMENT '{"type":"select","from":"user"}',
   time_start DATETIME,
   time_end DATETIME,
   duration TIME COMMENT '{"type":"duration","start":"time_start","end":"time_end"}',
   employee_payment INT COMMENT '{"type":"select","from":"employee_payment"}',
   invoiced BOOLEAN DEFAULT 0,
   PRIMARY KEY (id)
) COMMENT = '{"whitelist":["admin"],"display":{"whitelist":["user_viewer","employee"]},"add":{"whitelist":["employee"]}}';

CREATE TABLE user_payroll_info (
   id INT NOT NULL AUTO_INCREMENT,
   user INT NOT NULL COMMENT '{"type":"select","from":"user"}',
   wage DECIMAL(10,4),
   PRIMARY KEY (id),
   UNIQUE INDEX (user)
) COMMENT = '{"whitelist":["admin"]}';

CREATE TABLE employee_payment (
   id INT NOT NULL AUTO_INCREMENT,
   employee INT NOT NULL COMMENT '{"type":"select","from":"user"}',
   date_paid DATE,
   amount DECIMAL(10,2),
   hours DECIMAL(10,4),
   wage DECIMAL(10,4),
   PRIMARY KEY (id)
) COMMENT = '{"whitelist":["admin"]}';

CREATE TABLE client (
   id INT NOT NULL AUTO_INCREMENT,
   name VARCHAR(32),
   PRIMARY KEY (id)
) COMMENT = '{"whitelist":["admin"]}';

CREATE TABLE labor_invoice (
   id INT NOT NULL AUTO_INCREMENT,
   client INT NOT NULL COMMENT '{"type":"select","from":"client"}',
   date_paid DATE,
   amount DECIMAL(10,2),
   mark_up DECIMAL(10,2),
   PRIMARY KEY (id)
) COMMENT = '{"whitelist":["admin"]}';
