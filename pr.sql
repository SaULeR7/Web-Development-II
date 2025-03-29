CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(30) NOT NULL,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE product (
id INT(4) PRIMARY KEY,
type VARCHAR(30) NOT NULL,
name VARCHAR(30) NOT NULL,
price VARCHAR(30) NOT NULL
);


ALTER TABLE purchase
MODIFY COLUMN id_user INT(6) UNSIGNED;

CREATE TABLE purchase (
id INT(4) PRIMARY KEY,
id_user INT(6),
id_product INT(4),
amount INT(3),
total_price numeric(10,2)
);


CREATE TABLE feedback (
id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name varchar(30),
email varchar(30),
subject varchar(30),
message varchar(30)
);

CREATE TABLE Newsletters (
id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email varchar(30)
);

INSERT INTO purchase (id_user, id_product, amount, total_price, purchase_group_id) VALUES
(1, 4, 2, 25.50, 2),
(1, 5, 1, 15.75, 2),
(1, 6, 3, 40.00, 2);

INSERT INTO product (id, type, name, price)
VALUES ('1', 'type1', 'name1', 10.0),
('2', 'type2', 'name2', 20),
('3', 'type3', 'name3', 30),
('4', 'type4', 'name4', 40),
('5', 'type5', 'name5', 10),
('6', 'type6', 'name6', 20),
('7', 'type7', 'name7', 30),
('8', 'type8', 'name8', 40);

SELECT purchase.purchase_group_id, 
                   GROUP_CONCAT(product.name ORDER BY product.name ASC) AS product_names,
                   SUM(purchase.amount) AS total_amount,
                   SUM(purchase.total_price) AS total_price
            FROM purchase
            JOIN product ON purchase.id_product = product.id
            WHERE purchase.id_user = 1
            GROUP BY purchase.purchase_group_id;
            
            
            
ALTER TABLE purchase ADD CONSTRAINT fk_purchase_users
    FOREIGN KEY purchase (id_user)
    REFERENCES users (id);
    
ALTER TABLE purchase ADD CONSTRAINT fk_purchase_product
    FOREIGN KEY purchase (id_product)
    REFERENCES product (id);