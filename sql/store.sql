CREATE DATABASE store DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

use store;

create TABLE customer(
    id int AUTO_INCREMENT PRIMARY KEY NOT NULL ,
    name VARCHAR(100) NOT NULL ,
    address VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    cdate timestamp DEFAULT CURRENT_TIMESTAMP,
    mdate timestamp null
);

create TABLE invoices(
    id int AUTO_INCREMENT PRIMARY KEY NOT NULL ,
    date timestamp null ,
    customer_id int NOT NULL,
    cdate timestamp DEFAULT CURRENT_TIMESTAMP,
    mdate timestamp null,
    FOREIGN KEY (customer_id) REFERENCES customer(id)
);

create TABLE products(
    id int AUTO_INCREMENT PRIMARY KEY NOT NULL ,
    name VARCHAR(100) NOT NULL UNIQUE ,
    qty int NOT NULL,
    price FLOAT NOT NULL,
    cdate timestamp DEFAULT CURRENT_TIMESTAMP,
    mdate timestamp null
);

create TABLE invoice_lines(
    id int AUTO_INCREMENT PRIMARY KEY NOT NULL ,
    invoice_id int NOT NULL ,
    product_id int NOT NULL,
    qty int NOT NULL,
    unit_price VARCHAR(10) NOT NULL,
    FOREIGN KEY (invoice_id) REFERENCES invoices(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);




INSERT INTO customer (name,address,email) VALUES
("Nguyễn Văn A","Thanh Hóa","nguyenvana@gmail.com"),
("Nguyễn Văn B","Hà Nội","nguyenvanb@gmail.com"),
("Nguyễn Văn C","TP HCM","nguyenvanc@gmail.com");

INSERT INTO products (name,qty,price) VALUES
("sp1","3",15000),
("sp2","2",14000),
("sp3","5",13000),
("sp4","4",12000),
("sp5","6",11000);

INSERT INTO invoices (date,customer_id) VALUES
("2011-01-11",1),
("2012-02-22",3),
("2013-03-03",2),
("2014-04-04",2),
("2016-06-06",1),
("2015-05-07",1),
("2017-05-08",1),
("2018-05-09",1),
("2020-05-10",1),
("2021-05-11",1),
("2019-12-12",1);

INSERT INTO invoice_lines (invoice_id,product_id,qty,unit_price) VALUES
(1,2,3,"vnd"),
(1,2,3,"usd"),
(1,2,3,"usd"),
(1,2,3,"usd"),
(1,2,3,"usd"),
(1,2,3,"vnd"),
(1,2,3,"usd"),
(1,2,3,"vnd"),
(1,2,3,"usd"),
(1,2,3,"vnd"),
(1,2,3,"vnd");

-- 1	Liệt kê danh sách khách hàng	
SELECT * FROM customer;
-- 2	Liệt kê danh sách sản phẩm được tạo trong tháng	
SELECT * from products where month(cdate)=06;
-- 3	Liệt kê số lượng khách hàng được tạo mới trong từng tháng của năm 2017	
SELECT  *, COUNT(cdate) AS SOLUONG FROM customer  WHERE year(cdate)=2017 GROUP BY cdate
-- 4	Liệt kê danh sách 10 KH có tổng tiền mua hàng lớn nhất	
SELECT customer.name ,sum(invoice_lines.qty*invoice_lines.unit_price)  as total FROM invoice_lines
INNER JOIN invoices on invoice_lines.invoice_id = invoices.id
INNER JOIN customer on customer.id = invoices.id
GROUP by name
ORDER by total DESC
LIMIT 10;
-- 5	Liệt kê danh sách 10 sản phẩm được mua nhiều nhất	
SELECT products.name , invoice_lines.qty from 	invoice_lines
INNER JOIN products on invoice_lines.product_id = products.id
GROUP BY invoice_lines.qty 
ORDER BY invoice_lines.qty DESC
limit 10

-- 6	Liệt kê danh sách KH cùng số lần mua hàng của họ	
SELECT customer.name ,invoice_lines.qty FROM invoice_lines
INNER JOIN invoices on invoice_lines.invoice_id = invoices.id
INNER JOIN customer on customer.id = invoices.id
GROUP BY invoice_lines.qty
-- 7	Thống kê tổng tiền thu được trong từng tháng của năm 2017	
SELECT  invoices.date , sum(invoice_lines.qty*invoice_lines.unit_price) as totalMoth FROM invoice_lines
INNER JOIN invoices on invoice_lines.invoice_id =invoices.id
WHERE  year(cdate)=2017
GROUP BY month(invoices.date)

-- 8	Tìm số sản phẩm bán được trong tháng 3 năm 2018 mà có thời gian tạo trong năm 2017	
SELECT invoice_lines.qty  FROM invoice_lines
INNER JOIN invoices on invoice_lines.invoice_id = invoices.id
INNER JOIN customer on customer.id = invoices.id
WHERE month(invoices.date)=03 and year(invoices.date)=2018 and year(invoices.cdate)=2017
GROUP by invoices.date

-- 9	Liệt kê danh sách các KH mà không mua hàng trong 6 tháng gần nhất		
SELECT customer.name from invoices
INNER JOIN customer on invoices.customer_id = customer.id
where DATEDIFF(CURRENT_DATE(),invoices.date)>30
GROUP by name;

